<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        $rooms = Room::all();
        return view('reservations.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validation = true;
        // Validaciones de entrada
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date',
        ]);

        $start_time = new \Carbon\Carbon($request->start_time);
        $end_time = (clone $start_time)->addHour();

        //se buscan todas las reservas para ese dia y si hay algunas verificamos que no haya solape
        $existingReservations = Reservation::whereYear('start_time', $start_time->year)
        ->whereMonth('start_time', $start_time->month)
        ->whereDay('start_time', $start_time->day)
        ->get();

        //algoritmo especifico para evitar solapes para exactamente una hora
        foreach($existingReservations as $existingReservation){
            $existingStartTime = new \Carbon\Carbon($existingReservation->start_time);
            $existingEndTime = (clone $existingStartTime)->addHour();

            if($start_time->between($existingStartTime, $existingEndTime) || $end_time->between($existingStartTime, $existingEndTime)){
                $validation = false;
                break;
            }
        }
        // Si hay una reserva existente que solapa el horario de la nueva reserva
        if ($validation == false) {
            return back()->withErrors(['message' => 'La sala ya está reservada en ese horario.']);
        }

        // Crear la nueva reserva
        Reservation::create([
            'user_id' => auth()->id(),
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservación creada correctamente.');
    }
    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'rooms'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected'
        ]);

        $reservation->update($request->only('status'));
        return redirect()->route('rooms.show', $reservation->room->id)->with('success', 'Reservación editada correctamente.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('rooms.index')->with('success', 'Reservación eliminada correctamente.');
    }
}

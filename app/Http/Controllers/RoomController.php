<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy("created_at", "DESC")->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        try {
            // Validación de datos de entrada
            $request->validate([
                'name' => 'required|string|max:255|unique:rooms,name', // Verifica que el nombre sea único en la tabla 'rooms'
                'description' => 'nullable|string',
            ]);
            // Crea una nueva sala utilizando solo los campos necesarios
            Room::create($request->only(['name', 'description']));
            // Redirige a la lista de salas con un mensaje de éxito
            return redirect()->route('rooms.index')->with('success', 'Sala creada correctamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Manejo de errores de validación
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $th) {
            // Manejo de errores generales (p. ej., errores de base de datos)
            return redirect()->back()->with('error', 'Ocurrió un error al crear la sala.')->withInput();
        }
    }
    

    public function show(Room $room)
    {
        $reservations = $room->reservations()->orderBy('start_time', 'DESC')->get();
        return view('rooms.view', compact('room', 'reservations'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Sala editada correctamente.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Sala eliminada correctamente.');
    }
}

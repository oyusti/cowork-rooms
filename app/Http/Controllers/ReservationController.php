<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('user','room')->latest('id')->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Busco todas las horas con minutos en cero
        $hours = [];
        for ($i = 0; $i < 24; $i++) {
            $hours[] = sprintf('%02d:00', $i);
        }

        //Busco todas las rooms
        $rooms = Room::all();
        return view('reservations.create', compact('rooms', 'hours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the data
        $request->validate([
            'room_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        // Verificar si ya existe una reserva con la misma sala, fecha y hora
        $existingReservation = Reservation::where('room_id', $request->room_id)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->first();

        if ($existingReservation) {
            //Store a message in session
            session()->flash('swal', [
                'icon'  => 'wrong',
                'title' => 'No disponible',
                'text'  => 'La reserva ya esta ocupada para este horario'
            ]);

            //redirect user
            return redirect()->route('reservations.create');
        }

        //save the data
        $reservation = Reservation::create([
            'room_id' => $request->room_id,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => 1
        ]);

        //Store a message in session
        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'la reservacion ha sido creada correctamente'
        ]);

        //redirect user
        return redirect()->route('reservations.index', $reservation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //Busco todas las horas con minutos en cero
        $hours = [];
        for ($i = 0; $i < 24; $i++) {
            $hours[] = sprintf('%02d:00', $i);
        }

        //Busco todas las rooms
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation','rooms','hours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //validate the data
        $request->validate([
            'room_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        // Verificar si ya existe una reserva con la misma sala, fecha y hora
        $existingReservation = Reservation::where('room_id', $request->room_id)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->first();

        if ($existingReservation) {
            //Store a message in session
            session()->flash('swal', [
                'icon'  => 'wrong',
                'title' => 'No disponible',
                'text'  => 'La reserva ya esta ocupada para este horario'
            ]);

            //redirect user
            return redirect()->route('reservations.edit');
        }

        //save the data
        $reservation->update($request->all());

        //Store a message in session
        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'la reservacion ha sido actualizada correctamente'
        ]);

        //redirect user
        return redirect()->route('reservations.index', $reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        //Store a message in session
        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Bien Hecho',
            'text'  => 'la reservacion ha sido eliminada correctamente'
        ]);

        //redirect user
        return redirect()->route('reservations.index');
    }
}

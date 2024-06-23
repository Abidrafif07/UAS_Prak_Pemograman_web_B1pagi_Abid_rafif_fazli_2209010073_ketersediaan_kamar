<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\Pasien;


class controlpasien extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_ruangan' => 'required|exists:ruangans,id',
            'admission_date' => 'required|date'
        ]);

        $room = Room::find($request->room_id);

        if (!$room->is_available) {
            return response()->json(['error' => 'Room is not available'], 400);
        }

        $patient = Patient::create([
            'name' => $request->name,
            'id_ruangan' => $request->id_ruangan,
            'tanggal_checkin' => $request->tanggal_checkin
        ]);

        $room->is_available = false;
        $room->save();

        return response()->json($patient, 201);
    }
    public function discharge(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->discharge_date = now();
        $patient->save();

        $room = Room::find($patient->room_id);
        $room->is_available = true;
        $room->save();

        return response()->json($patient, 200);
    }
}
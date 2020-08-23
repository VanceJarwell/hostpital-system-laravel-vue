<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function getRoomData()
    {
        return Room::all();
    }
    
    public function addRoom(Request $request)
    {
        $room = new Room();

        $room->building_id = $request->building_id;

        $room->floor_number = $request->floor_number;

        $room->room_number = $request->room_number;

        $room->room_type = $request->room_type;

        $room->beds = $request->beds;
        
        $room->availability = $request->availability;

        $room->save();
    }

    public function deleteRoom(Request $request)
    {
        $room = Room::find($request->id);
        
        $room->delete();
    }
}

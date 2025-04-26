<?php
// admin/RoomController.php

namespace App\Controllers;

use App\Models\Room;

class RoomController
{
    // Display all rooms available for booking
    public function showAvailableRooms()
    {
        $rooms = Room::where('status', 'available')->get();  // Fetch available rooms
        require_once 'views/user/home.php';  // Load the home view with room listings
    }

    // Display details of a single room
    public function showRoomDetails($id)
    {
        $room = Room::find($id);  // Find the room by ID
        require_once 'views/user/room_details.php';  // Load room details view
    }

    // Add a new room (admin functionality)
    public function addRoom()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_type = $_POST['room_type'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $features = $_POST['features'];

            // Save the new room to the database
            $room = new Room();
            $room->room_type = $room_type;
            $room->price = $price;
            $room->status = $status;
            $room->features = $features;
            $room->save();

            // Redirect back to the room management page
            header("Location: /admin/manage-rooms");
        }
    }
}

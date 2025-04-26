# hackathon
#<?php
// Admin controller for room management
include_once('../models/Room.php');

class RoomController {
    public function __construct() {
        $this->roomModel = new Room();
    }

    // List all rooms
    public function index() {
        $rooms = $this->roomModel->getAllRooms();
        include('../views/manage_rooms.php');
    }

    // Add a new room
    public function addRoom() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_data = $_POST;
            $this->roomModel->addRoom($room_data);
            header("Location: manage_rooms.php");
        }
        include('../views/add_room.php');
    }

    // Edit room
    public function editRoom($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_data = $_POST;
            $this->roomModel->updateRoom($id, $room_data);
            header("Location: manage_rooms.php");
        }
        $room = $this->roomModel->getRoomById($id);
        include('../views/edit_room.php');
    }

    // Delete room
    public function deleteRoom($id) {
        $this->roomModel->deleteRoom($id);
        header("Location: manage_rooms.php");
    }
}
?>
2. BookingController.php (Admin Panel)
php
Copy
<?php
// Admin controller for booking management
include_once('../models/Booking.php');

class BookingController {
    public function __construct() {
        $this->bookingModel = new Booking();
    }

    // List all bookings
    public function index() {
        $bookings = $this->bookingModel->getAllBookings();
        include('../views/manage_bookings.php');
    }

    // View booking details
    public function viewBooking($id) {
        $booking = $this->bookingModel->getBookingById($id);
        include('../views/view_booking.php');
    }

    // Cancel booking
    public function cancelBooking($id) {
        $this->bookingModel->cancelBooking($id);
        header("Location: manage_bookings.php");
    }
}
?>

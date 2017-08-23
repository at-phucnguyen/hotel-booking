<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Reservation;
use App\Model\User;
use App\Model\Guest;
use App\Model\Room;
use App\Model\Hotel;

class ReservationController extends Controller
{
    /**
     * Display a listing of booking room
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            'reservations.id',
            'status',
            'room_id',
            'target',
            'checkin_date',
            'checkout_date'
        ];
        $reservations = Reservation::select($columns)
                    ->with(['bookingroom' => function ($query) {
                        $query->select('rooms.id', 'name');
                    }])
                    ->orderby('reservations.id', 'DESC')
                    ->paginate(Reservation::ROW_LIMIT);
        return view('backend.bookings.index', compact('reservations'));
    }

    /**
     * Display a page show detail a booking rooms.
     *
     * @param int $id of reservation
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $columns = [
            'reservations.id',
            'status',
            'room_id',
            'target',
            'target_id',
            'checkin_date',
            'checkout_date'
        ];
        $reservation = Reservation::select($columns)
            ->with(['bookingroom' => function ($query) {
                $query->select('rooms.id', 'name', 'rooms.hotel_id');
            }])
        ->findOrFail($id);
        dd($reservation);
        $hotelId = $reservation->bookingroom->hotel_id;
        $hotel = Hotel::select('name')
                    ->where('id', $hotelId)
                    ->firstOrFail();
        // if ($reservation->target == 'user') {
            // $user = User::select('full_name', 'email', 'phone')
            //             ->where('id', $reservation->target_id)
            //             ->firstOrFail();
            // dd($user);
        // } else {
        //     $user = Guest::select('full_name', 'email', 'phone')
        //                 ->where('id', $reservation->target_id)
        //                 ->firstOrFail();
        // }
        return view('backend.bookings.show', compact('reservation', 'hotel'));
    }
}

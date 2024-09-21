<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Services\BookingService;
use App\Services\EventService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $eventService;
    protected $bookingService;

    public function __construct(
        EventService $eventService,
        BookingService $bookingService
    )
    {
        $this->eventService = $eventService;
        $this->bookingService = $bookingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['event', 'user']);
        if(auth()->id() != 1){
            $bookings = $bookings->where('user_id', auth()->id());
        }
        $bookings = $bookings->orderBy('id', 'desc')->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bookNow($id)
    {
        $event = $this->eventService->findById($id);
        return view('bookings.create', compact('event'));
    }

    public function storeBooking(BookingRequest $request, $id)
    {
        $event = $this->eventService->findById($id);
        if($request->seats_booked > $event->available_seats){
            return redirect()->back()->with('error', 'Whoops! Your requested seats are not available.');
        }

        return $this->bookingService->store($request->all(), $id);
    }
}

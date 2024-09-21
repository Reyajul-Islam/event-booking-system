<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use DB;

class BookingRepository implements BookingInterface
{
    public function store(array $attribute, $id)
    {
        DB::beginTransaction();
        try{
            $attribute['event_id'] = $id;
            $attribute['user_id'] = auth()->id();
            Booking::create($attribute);
            $event = Event::find($id);
            $available_seats = $event->available_seats - $attribute['seats_booked'];
            $event->update(['available_seats' => $available_seats]);

            DB::commit();
            return redirect()->back()->with('success', 'Seat booked successfully.');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Warning! '. $e->getMessage());
        }
    }
}
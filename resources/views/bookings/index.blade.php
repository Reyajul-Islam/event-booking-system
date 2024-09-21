@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ url('/') }}">{{ __('Booking List') }}</a>
    </h2>
@stop

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Event Name</th>
                            <th>User Name</th>
                            <th>Seats Booked</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $key => $booking)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $booking->event->name }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->seats_booked }}</td>
                                <td>{{ Date('d F, Y H:i a', strtotime($booking->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

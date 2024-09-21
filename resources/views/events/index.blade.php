@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ url('/') }}">{{ __('Events List') }}</a>
    </h2>
@stop

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(auth()->id() == 1)
                    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>
                    @endif

                    @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date & Time</th>
                            <th>Total Seats</th>
                            <th>Available Seats</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $key => $event)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->description }}</td>
                                <td style="width: 10%"> {{ Date('d F, Y H:i a', strtotime($event->date)) }}</td>
                                <td>{{ $event->total_seats }}</td>
                                <td>{{ $event->available_seats }}</td>
                                <td style="width: 10%">
                                    @if(auth()->id() == 1)
                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                    @endif
                                    @if($event->available_seats != 0)
                                        <a href="{{ route('bookings.booknow', $event->id) }}" class="btn btn-success mt-2">Book Now</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

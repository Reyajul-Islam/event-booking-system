@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Book Now - ') }} {{ $event->name }}
    </h2>
@stop

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('bookings.storeBooking', $event->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Event Name</label>
                            <input type="text" class="form-control" value="{{ $event->name }}" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="">Available Seats</label>
                            <input type="text" class="form-control" value="{{ $event->available_seats }}" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="seats_booked">Total Seat for Book</label>
                            <input type="number" name="seats_booked" id="seats_booked" class="form-control" placeholder="Total Seat for Book" value="{{ old('seats_booked') }}" required/>
                            @foreach($errors->get('seats_booked') as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group"><br>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

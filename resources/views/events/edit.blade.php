@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Event') }}
    </h2>
@stop

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('events.update', $event->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method", value="put">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Event Name" value="{{ $event->name }}" required/>
                            @foreach($errors->get('name') as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Description" required>{{ $event->description }}</textarea>
                            @foreach($errors->get('description') as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="date">Event Date</label>
                            <input type="datetime-local" name="date" id="date" class="form-control" value="{{ $event->date }}" required/>
                            @foreach($errors->get('date') as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="total_seats">Total Seats</label>
                            <input type="number" name="total_seats" id="total_seats" class="form-control" placeholder="Total Seats" value="{{ $event->total_seats }}" required/>
                            @foreach($errors->get('total_seats') as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="available_seats">Available seats</label>
                            <input type="number" name="available_seats" id="available_seats" class="form-control" placeholder="Available seats" value="{{ $event->available_seats }}" required/>
                            @foreach($errors->get('available_seats') as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group"><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

<?php

namespace App\Services;

use App\Repositories\BookingRepository;

class BookingService
{
    protected $bookingRepository;
    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function store(array $attribute, $id)
    {
        return $this->bookingRepository->store($attribute, $id);
    }
}
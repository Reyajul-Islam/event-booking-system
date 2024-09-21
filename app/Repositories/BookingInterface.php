<?php

namespace App\Repositories;

interface BookingInterface
{
    public function store(array $attribute, $id);
}
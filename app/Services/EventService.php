<?php

namespace App\Services;
use App\Repositories\EventRepository;

class EventService
{
    protected $eventRepository;
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function store(array $attribute)
    {
        return $this->eventRepository->store($attribute);
    }

    public function findById($id)
    {
        return $this->eventRepository->findById($id);
    }

    public function update(array $attribute, $id)
    {
        return $this->eventRepository->update($attribute, $id);
    }
}
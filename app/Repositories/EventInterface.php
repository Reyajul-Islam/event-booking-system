<?php

namespace App\Repositories;

interface EventInterface
{
    public function store(array $attribute);
    public function findById($id);
    public function update(array $attribute, $id);
}
<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use DB;

class EventRepository implements EventInterface
{
    public function store(array $attribute)
    {
        DB::beginTransaction();
        try{
            Event::create($attribute);

            DB::commit();
            return redirect()->back()->with('success', 'Data saved successfully.');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Warning! '. $e->getMessage());
        }
    }

    public function findById($id)
    {
        return Event::find($id);
    }

    public function update(array $attribute, $id)
    {
        DB::beginTransaction();
        try{
            Event::find($id)->update($attribute);

            DB::commit();
            return redirect()->route('events.index')->with('success', 'Data updated successfully.');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Warning! '. $e->getMessage());
        }
    }
}
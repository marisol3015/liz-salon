<?php

namespace multiventas\Http\Controllers\Admin;

use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;
use Calendar;
use multiventas\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => '',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
   return view('admin.calendario.fullcalender', compact('calendar'));
    }
}
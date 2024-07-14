<?php

namespace App\Http\Controllers;
use App\Models\FollowUp;
use App\Events\MyEvent;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'follow_up_at' => 'required|date',
        ]);

        $followUp = FollowUp::create([
            'follow_up_at' => $request->input('follow_up_at'),
        ]);

        // Broadcast event
     //   event(new MyEvent('New follow-up scheduled for ' . $followUp->follow_up_at));
     event(new MyEvent('New follow-up scheduled for ' . $followUp->follow_up_at, $followUp->follow_up_at));

        return redirect()->back()->with('success', 'Follow-Up Date and Time Saved!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('meets.index');
    }

    public function events()
    {
        $meetings = \App\Models\Meeting::all();
        $events = $meetings->map(function ($meeting) {
            return [
                'id' => $meeting->id,
                'title' => $meeting->title,
                'start' => $meeting->start_time,
                'end' => $meeting->end_time,
                'allDay' => false, // Can be dynamic if we add that field later
            ];
        });
        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\AdminUser::all();
        return view('meets.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'chairman_id' => 'required|exists:admin_users,id',
            'recorder_id' => 'required|exists:admin_users,id',
            'members' => 'nullable|array',
            'members.*' => 'exists:admin_users,id',
        ]);

        $meeting = \App\Models\Meeting::create([
            'title' => $validated['title'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'status' => 0,
        ]);

        // Add Chairman
        \App\Models\MeetingMember::create([
            'meeting_id' => $meeting->id,
            'user_id' => $validated['chairman_id'],
            'role' => \App\Models\MeetingMember::ROLE_CHAIRMAN,
        ]);

        // Add Recorder
        \App\Models\MeetingMember::create([
            'meeting_id' => $meeting->id,
            'user_id' => $validated['recorder_id'],
            'role' => \App\Models\MeetingMember::ROLE_RECORDER,
        ]);

        // Add Members
        if (!empty($validated['members'])) {
            foreach ($validated['members'] as $member_id) {
                // Prevent duplicate addition if chairman/recorder is also selected as member, though UI should handle this
                if ($member_id != $validated['chairman_id'] && $member_id != $validated['recorder_id']) {
                     \App\Models\MeetingMember::create([
                        'meeting_id' => $meeting->id,
                        'user_id' => $member_id,
                        'role' => \App\Models\MeetingMember::ROLE_MEMBER,
                    ]);
                }
            }
        }

        return redirect()->route('meets.index')->with('success', 'Meeting scheduled successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $meet = \App\Models\Meeting::with('members')->findOrFail($id);
        $users = \App\Models\AdminUser::all();
        return view('meets.edit', compact('meet', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meeting = \App\Models\Meeting::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'chairman_id' => 'required|exists:admin_users,id',
            'recorder_id' => 'required|exists:admin_users,id',
            'members' => 'nullable|array',
            'members.*' => 'exists:admin_users,id',
        ]);

        $meeting->update([
            'title' => $validated['title'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'description' => $validated['description'],
            'location' => $validated['location'],
        ]);

        // Sync Members logic is complex due to roles.
        // Simplest strategy: Delete all members and recreate relevant ones.
        // (Optimized approach would be syncing pivot execution but members table has 'role' column)
        
        $meeting->members()->delete();

         // Add Chairman
         \App\Models\MeetingMember::create([
            'meeting_id' => $meeting->id,
            'user_id' => $validated['chairman_id'],
            'role' => \App\Models\MeetingMember::ROLE_CHAIRMAN,
        ]);

        // Add Recorder
        \App\Models\MeetingMember::create([
            'meeting_id' => $meeting->id,
            'user_id' => $validated['recorder_id'],
            'role' => \App\Models\MeetingMember::ROLE_RECORDER,
        ]);

        // Add Members
        if (!empty($validated['members'])) {
            foreach ($validated['members'] as $member_id) {
                if ($member_id != $validated['chairman_id'] && $member_id != $validated['recorder_id']) {
                     \App\Models\MeetingMember::create([
                        'meeting_id' => $meeting->id,
                        'user_id' => $member_id,
                        'role' => \App\Models\MeetingMember::ROLE_MEMBER,
                    ]);
                }
            }
        }

        return redirect()->route('meets.index')->with('success', 'Meeting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meeting = \App\Models\Meeting::findOrFail($id);
        $meeting->delete();

        return redirect()->route('meets.index')->with('success', 'Meeting cancelled successfully.');
    }
}

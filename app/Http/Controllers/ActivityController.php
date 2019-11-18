<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $path = $request->image->store('activities/images');
        Activity::create(
            ['name' => $request->name, 'path' => $path]
        );
        return redirect('/activities');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $path = $request->image->store('activities/images');
        $activity->update(
            ['name' => $request->name, 'path' => $path]
        );

        return redirect('/activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect('/activities');
    }
}

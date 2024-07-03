<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class CalendarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $user_id = Auth::user()->id;
        $tag_calendars = Calendar::where('user_id', $user_id)->get('type');

        if (!empty($keyword)) {
            $calendars = Calendar::where('title', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('all_day', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('time_start', 'LIKE', "%$keyword%")
                ->orWhere('time_end', 'LIKE', "%$keyword%")
                ->orWhere('training_id', 'LIKE', "%$keyword%")
                ->orWhere('appointment_id', 'LIKE', "%$keyword%")
                ->orWhere('activity_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $calendars = Calendar::latest()->paginate($perPage);
        }

        return view('calendars.index', compact('calendars','tag_calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('calendars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Calendar::create($requestData);

        return redirect('calendars')->with('flash_message', 'Calendar added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $calendar = Calendar::findOrFail($id);

        return view('calendars.show', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $calendar = Calendar::findOrFail($id);

        return view('calendars.edit', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $calendar = Calendar::findOrFail($id);
        $calendar->update($requestData);

        return redirect('calendars')->with('flash_message', 'Calendar updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Calendar::destroy($id);

        return redirect('calendars')->with('flash_message', 'Calendar deleted!');
    }

    public function add_calendar(Request $request)
    {
        $requestData = $request->all();

        $calendar = Calendar::create($requestData);


        // Return response
        return response()->json($calendar);
    }

    function delete_data_calendar($id){
        Calendar::destroy($id);
        return 'success';
    }

}

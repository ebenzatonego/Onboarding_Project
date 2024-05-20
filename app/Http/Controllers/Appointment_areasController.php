<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Appointment_area;
use Illuminate\Http\Request;

class Appointment_areasController extends Controller
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

        if (!empty($keyword)) {
            $appointment_areas = Appointment_area::where('area', 'LIKE', "%$keyword%")
                ->orWhere('sub_area', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $appointment_areas = Appointment_area::latest()->paginate($perPage);
        }

        return view('appointment_areas.index', compact('appointment_areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('appointment_areas.create');
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
        
        Appointment_area::create($requestData);

        return redirect('appointment_areas')->with('flash_message', 'Appointment_area added!');
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
        $appointment_area = Appointment_area::findOrFail($id);

        return view('appointment_areas.show', compact('appointment_area'));
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
        $appointment_area = Appointment_area::findOrFail($id);

        return view('appointment_areas.edit', compact('appointment_area'));
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
        
        $appointment_area = Appointment_area::findOrFail($id);
        $appointment_area->update($requestData);

        return redirect('appointment_areas')->with('flash_message', 'Appointment_area updated!');
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
        Appointment_area::destroy($id);

        return redirect('appointment_areas')->with('flash_message', 'Appointment_area deleted!');
    }
}

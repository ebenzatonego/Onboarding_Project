<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Activity_type;
use Illuminate\Http\Request;

class Activity_typesController extends Controller
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
            $activity_types = Activity_type::where('name_type', 'LIKE', "%$keyword%")
                ->orWhere('number_menu', 'LIKE', "%$keyword%")
                ->orWhere('check_highlight', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activity_types = Activity_type::latest()->paginate($perPage);
        }

        return view('activity_types.index', compact('activity_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('activity_types.create');
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
        
        Activity_type::create($requestData);

        return redirect('activity_types')->with('flash_message', 'Activity_type added!');
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
        $activity_type = Activity_type::findOrFail($id);

        return view('activity_types.show', compact('activity_type'));
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
        $activity_type = Activity_type::findOrFail($id);

        return view('activity_types.edit', compact('activity_type'));
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
        
        $activity_type = Activity_type::findOrFail($id);
        $activity_type->update($requestData);

        return redirect('activity_types')->with('flash_message', 'Activity_type updated!');
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
        Activity_type::destroy($id);

        return redirect('activity_types')->with('flash_message', 'Activity_type deleted!');
    }

    function get_data_activity_type(){
        $data = Activity_type::orderBy('number_menu', 'ASC')->get();
        return $data ;
    }
}

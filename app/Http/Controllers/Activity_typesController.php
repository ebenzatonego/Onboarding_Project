<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Activity;
use App\Models\Activity_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    function get_data_number_menu_of_activitys(){
        $data = Activity_type::orderByRaw("CASE 
                WHEN number_menu IS NOT NULL THEN 1
                ELSE 2
                END, 
                number_menu ASC, 
                id DESC")
            ->get();
        return $data ;
    }

    function change_number_menu_of_activitys($type_id, $number){

        $number_old = Activity_type::where('number_menu', $number)->first();
        $number_select = Activity_type::where('id', $type_id)->first();

        $data = [];

        if( !empty($number_select->id) ){
            $data['old_change_to'] = $number_select->number_menu;
        }
        else{
            $data['old_change_to'] = null;
        }

        if( !empty($number_old->id) ){
            $data['old_id'] = $number_old->id;

            DB::table('activity_types')
                ->where([ 
                        ['id', $data['old_id']],
                    ])
                ->update([
                        'number_menu' => $data['old_change_to'],
                    ]);
        }

        DB::table('activity_types')
            ->where([ 
                    ['id', $type_id],
                ])
            ->update([
                    'number_menu' => $number,
                ]);

        return 'success';
    }

    function delete_activitys_type($activity_type_id){
        $data = Activity_type::where('id', $activity_type_id)->first();
        Activity::where('activity_type_id', $activity_type_id)->delete();

        if( !empty($data->id) ){
            $data->delete();
        }

        return 'success';

    }
}

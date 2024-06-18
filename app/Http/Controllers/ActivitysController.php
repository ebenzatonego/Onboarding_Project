<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Activity_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActivitysController extends Controller
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
            $activitys = Activity::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('activity_type_id', 'LIKE', "%$keyword%")
                ->orWhere('all_day', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('time_start', 'LIKE', "%$keyword%")
                ->orWhere('time_end', 'LIKE', "%$keyword%")
                ->orWhere('location_detail', 'LIKE', "%$keyword%")
                ->orWhere('link_map', 'LIKE', "%$keyword%")
                ->orWhere('user_like', 'LIKE', "%$keyword%")
                ->orWhere('user_dislike', 'LIKE', "%$keyword%")
                ->orWhere('user_share', 'LIKE', "%$keyword%")
                ->orWhere('user_fav', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->orWhere('sum_rating', 'LIKE', "%$keyword%")
                ->orWhere('log_rating', 'LIKE', "%$keyword%")
                ->orWhere('highlight_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activitys = Activity::latest()->paginate($perPage);
        }

        return view('activitys.index', compact('activitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $data_activity_type = Activity_type::orderBy('name_type' , 'ASC')->get();
        return view('activitys.create', compact('data_activity_type'));
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

        if( !empty($requestData['activity_type_id']) ){
            $check_activity_type = Activity_type::where('name_type' , $requestData['activity_type_id'])->first();

            if( empty($check_activity_type->id) ){

                $data_create = [];
                $data_create['name_type'] = $requestData['activity_type_id'];
                $new_data_type = Activity_type::create($data_create);

                $requestData['activity_type_id'] = $new_data_type->id ;
            }
            else{
                $requestData['activity_type_id'] = $check_activity_type->id ;
            }
        }
        
        Activity::create($requestData);

        return redirect('activitys')->with('flash_message', 'Activity added!');
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
        $activity = Activity::findOrFail($id);

        return view('activitys.show', compact('activity'));
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
        $activity = Activity::findOrFail($id);

        return view('activitys.edit', compact('activity'));
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
        
        $activity = Activity::findOrFail($id);
        $activity->update($requestData);

        return redirect('activitys')->with('flash_message', 'Activity updated!');
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
        Activity::destroy($id);

        return redirect('activitys')->with('flash_message', 'Activity deleted!');
    }

    function update_user_view_activity($user_id,$activity_id){
        $data_activity = Activity::where('id' , $activity_id)->first();
        $array_log = array();

        if( empty($data_activity->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_activity->user_view, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('activitys')
            ->where([ 
                    ['id', $activity_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;
    }

    function get_data_activitys($activity_type_id){

        if($activity_type_id == 'all'){
            $data_activity = Activity::orderByRaw("CASE 
                            WHEN highlight_number IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            highlight_number ASC, 
                            id DESC")
                        ->get();

        }
        else{
            $data_activity = Activity::orderByRaw("CASE 
                            WHEN highlight_of_type IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            highlight_of_type ASC, 
                            id DESC")
                        ->where('activity_type_id' , $activity_type_id)
                        ->get();
        }

        return $data_activity ;

    }
}

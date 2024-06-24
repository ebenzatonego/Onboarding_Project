<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Career_path;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Career_pathsController extends Controller
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
            $career_paths = Career_path::where('name_rank', 'LIKE', "%$keyword%")
                ->orWhere('number_story', 'LIKE', "%$keyword%")
                ->orWhere('title_story', 'LIKE', "%$keyword%")
                ->orWhere('description_story', 'LIKE', "%$keyword%")
                ->orWhere('photo_story', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $career_paths = Career_path::latest()->paginate($perPage);
        }

        return view('career_paths.index', compact('career_paths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('career_paths.create');
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
        
        Career_path::create($requestData);

        return redirect('career_paths')->with('flash_message', 'Career_path added!');
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
        $career_path = Career_path::findOrFail($id);

        return view('career_paths.show', compact('career_path'));
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
        $career_path = Career_path::findOrFail($id);

        return view('career_paths.edit', compact('career_path'));
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
        
        $career_path = Career_path::findOrFail($id);
        $career_path->update($requestData);

        return redirect('career_paths')->with('flash_message', 'Career_path updated!');
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
        Career_path::destroy($id);

        return redirect('career_paths')->with('flash_message', 'Career_path deleted!');
    }

    function update_title_story_career_path(Request $request)
    {
        $requestData = $request->all();

        if( !empty($requestData['photo_story']) ){

            DB::table('career_paths')
                ->where([ 
                        ['name_rank', $requestData['name_rank']],
                        ['number_story', $requestData['number_story']],
                    ])
                ->update([
                        'title_story' => $requestData['title_story'],
                        'description_story' => $requestData['description_story'],
                        'photo_story' => $requestData['photo_story'],
                    ]);
        }
        else{
            DB::table('career_paths')
                ->where([ 
                        ['name_rank', $requestData['name_rank']],
                        ['number_story', $requestData['number_story']],
                    ])
                ->update([
                        'title_story' => $requestData['title_story'],
                        'description_story' => $requestData['description_story'],
                    ]);
        }


        return 'success' ;

    }

    function get_data_story_career_paths(){
        $data = Career_path::get();
        return $data;
    }

    function update_user_view_career_paths_head($user_id,$career_paths_id){
        $data_career_paths = Career_path::where('id' , $career_paths_id)->first();
        $array_log = array();

        if( empty($data_career_paths->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_career_paths->user_view, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $career_path_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$career_path_round]['datetime'] = date("d/m/Y H:i");
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('career_paths')
            ->where([ 
                    ['id', $career_paths_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;

    }
}

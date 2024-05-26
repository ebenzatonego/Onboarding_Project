<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Video_congrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Video_congrats_type_rank;

class Video_congratsController extends Controller
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
            $video_congrats = Video_congrat::where('name_video', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('for_rank', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('log', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $video_congrats = Video_congrat::latest()->paginate($perPage);
        }

        return view('video_congrats.index', compact('video_congrats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('video_congrats.create');
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

        if($requestData['status'] == "Yes"){
            DB::table('video_congrats')
                ->where([ 
                        ['type', 'Video_Congrats'],
                        ['for_rank', $requestData['for_rank']],
                        ['status', 'Yes'],
                    ])
                ->update([
                        'status' => null,
                    ]);

            DB::table('video_congrats_type_ranks')
                ->where([ 
                        ['name_rank', $requestData['for_rank']],
                    ])
                ->update([
                        'check_active' => "Yes",
                    ]);
        }
        
        Video_congrat::create($requestData);

        $check_type_rank = Video_congrats_type_rank::where('name_rank',$requestData['for_rank'])->first();

        if( empty($check_type_rank->id) ){
            $data_add = [];
            $data_add['name_rank'] = $requestData['for_rank'];

            if($requestData['status'] == "Yes"){
                $data_add['check_active'] = "Yes";
            }

            Video_congrats_type_rank::create($data_add);
        }

        return redirect('/manage_video_congrats');
        // return redirect('video_congrats')->with('flash_message', 'Video_congrat added!');
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
        $video_congrat = Video_congrat::findOrFail($id);

        return view('video_congrats.show', compact('video_congrat'));
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
        $video_congrat = Video_congrat::findOrFail($id);

        return view('video_congrats.edit', compact('video_congrat'));
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
        
        $video_congrat = Video_congrat::findOrFail($id);
        $video_congrat->update($requestData);

        return redirect('video_congrats')->with('flash_message', 'Video_congrat updated!');
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
        Video_congrat::destroy($id);

        return redirect('video_congrats')->with('flash_message', 'Video_congrat deleted!');
    }

    function manage_video_congrats(){
        return view('video_congrats.manage_video_congrats');
    }

    function create_video_congrats(){
        $type_rank = Video_congrats_type_rank::get();

        return view('video_congrats.create', compact('type_rank'));
    }

    function view_video_congrats($id){
        
        $video_congrats = Video_congrat::findOrFail($id);
        $data_user = User::where('id', $video_congrats->user_id)->first();
        $name_creator = $data_user->name ;

        return view('video_congrats.view_video_congrats', compact('video_congrats','name_creator'));
    }

    function show_video_congrats(Request $request)
    {
        $fromPage = $request->query('from');
        return view('video_congrats', compact('fromPage'));
    }
}

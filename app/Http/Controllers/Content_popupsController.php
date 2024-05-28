<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Content_popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class Content_popupsController extends Controller
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
            $content_popups = Content_popup::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('log_video', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $content_popups = Content_popup::latest()->paginate($perPage);
        }

        return view('content_popups.index', compact('content_popups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('content_popups.create');
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
            DB::table('content_popups')
                ->where([ 
                        ['status', 'Yes'],
                    ])
                ->update([
                        'status' => null,
                    ]);
        }
        
        Content_popup::create($requestData);


        if( !empty($requestData['reset_check_content_popup']) ){
            DB::table('users')
            ->where([ 
                    ['check_content_popup', "Yes"],
                ])
            ->update([
                    'check_content_popup' => null,
                ]);
        }

        return redirect('/manage_content_popups');
        // return redirect('content_popups')->with('flash_message', 'Content_popup added!');
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
        $content_popup = Content_popup::findOrFail($id);

        return view('content_popups.show', compact('content_popup'));
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
        $content_popup = Content_popup::findOrFail($id);

        return view('content_popups.edit', compact('content_popup'));
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
        
        $content_popup = Content_popup::findOrFail($id);
        $content_popup->update($requestData);

        return redirect('content_popups')->with('flash_message', 'Content_popup updated!');
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
        Content_popup::destroy($id);

        return redirect('content_popups')->with('flash_message', 'Content_popup deleted!');
    }

    function manage_content_popups(){
        return view('content_popups.manage_content');
    }

    function create_content_popups(){
        return view('content_popups.create');
    }

    function view_content_popup($id){
        
        $content_popups = Content_popup::findOrFail($id);
        $data_user = User::where('id', $content_popups->user_id)->first();
        $name_creator = $data_user->name ;

        return view('content_popups.view_content_popup', compact('content_popups','name_creator'));
    }
}

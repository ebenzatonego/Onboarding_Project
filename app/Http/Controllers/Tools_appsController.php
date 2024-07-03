<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Tools_app;
use Illuminate\Http\Request;

class Tools_appsController extends Controller
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
            $tools_apps = Tools_app::where('name', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('photo_icon', 'LIKE', "%$keyword%")
                ->orWhere('link_ios', 'LIKE', "%$keyword%")
                ->orWhere('click_link_ios', 'LIKE', "%$keyword%")
                ->orWhere('link_android', 'LIKE', "%$keyword%")
                ->orWhere('click_link_android', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tools_apps = Tools_app::latest()->paginate($perPage);
        }

        return view('tools_apps.index', compact('tools_apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tools_apps.create');
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
        
        Tools_app::create($requestData);

        return redirect('/manage_tools_apps');

        // return redirect('tools_apps')->with('flash_message', 'Tools_app added!');
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
        $tools_app = Tools_app::findOrFail($id);

        return view('tools_apps.show', compact('tools_app'));
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
        $tools_app = Tools_app::findOrFail($id);

        return view('tools_apps.edit', compact('tools_app'));
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
        
        $tools_app = Tools_app::findOrFail($id);
        $tools_app->update($requestData);

        return redirect('tools_apps')->with('flash_message', 'Tools_app updated!');
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
        Tools_app::destroy($id);

        return redirect('tools_apps')->with('flash_message', 'Tools_app deleted!');
    }

    function manage_tools_apps(){

        return view('tools_apps.manage_tools_apps');
    }

    function get_data_tools_apps(){
        $tools_app = Tools_app::orderByRaw("CASE 
                        WHEN number IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        number ASC, 
                        id ASC")
            ->get();
            
        return $tools_app ;
    }
}

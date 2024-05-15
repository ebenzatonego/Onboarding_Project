<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Log_video_tools_tutorial;
use Illuminate\Http\Request;

class Log_video_tools_tutorialsController extends Controller
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
            $log_video_tools_tutorials = Log_video_tools_tutorial::where('tools_tutorial_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('log', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $log_video_tools_tutorials = Log_video_tools_tutorial::latest()->paginate($perPage);
        }

        return view('log_video_tools_tutorials.index', compact('log_video_tools_tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('log_video_tools_tutorials.create');
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
        
        Log_video_tools_tutorial::create($requestData);

        return redirect('log_video_tools_tutorials')->with('flash_message', 'Log_video_tools_tutorial added!');
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
        $log_video_tools_tutorial = Log_video_tools_tutorial::findOrFail($id);

        return view('log_video_tools_tutorials.show', compact('log_video_tools_tutorial'));
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
        $log_video_tools_tutorial = Log_video_tools_tutorial::findOrFail($id);

        return view('log_video_tools_tutorials.edit', compact('log_video_tools_tutorial'));
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
        
        $log_video_tools_tutorial = Log_video_tools_tutorial::findOrFail($id);
        $log_video_tools_tutorial->update($requestData);

        return redirect('log_video_tools_tutorials')->with('flash_message', 'Log_video_tools_tutorial updated!');
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
        Log_video_tools_tutorial::destroy($id);

        return redirect('log_video_tools_tutorials')->with('flash_message', 'Log_video_tools_tutorial deleted!');
    }
}

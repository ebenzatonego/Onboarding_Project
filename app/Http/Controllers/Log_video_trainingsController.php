<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Log_video_training;
use Illuminate\Http\Request;

class Log_video_trainingsController extends Controller
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
            $log_video_trainings = Log_video_training::where('training_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('log', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $log_video_trainings = Log_video_training::latest()->paginate($perPage);
        }

        return view('log_video_trainings.index', compact('log_video_trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('log_video_trainings.create');
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
        
        Log_video_training::create($requestData);

        return redirect('log_video_trainings')->with('flash_message', 'Log_video_training added!');
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
        $log_video_training = Log_video_training::findOrFail($id);

        return view('log_video_trainings.show', compact('log_video_training'));
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
        $log_video_training = Log_video_training::findOrFail($id);

        return view('log_video_trainings.edit', compact('log_video_training'));
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
        
        $log_video_training = Log_video_training::findOrFail($id);
        $log_video_training->update($requestData);

        return redirect('log_video_trainings')->with('flash_message', 'Log_video_training updated!');
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
        Log_video_training::destroy($id);

        return redirect('log_video_trainings')->with('flash_message', 'Log_video_training deleted!');
    }
}

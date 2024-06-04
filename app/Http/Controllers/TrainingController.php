<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Training;
use App\Models\Training_type;
use Illuminate\Http\Request;

class TrainingController extends Controller
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
            $training = Training::where('name_article', 'LIKE', "%$keyword%")
                ->orWhere('type_article', 'LIKE', "%$keyword%")
                ->orWhere('start_date', 'LIKE', "%$keyword%")
                ->orWhere('end_date', 'LIKE', "%$keyword%")
                ->orWhere('start_time', 'LIKE', "%$keyword%")
                ->orWhere('end_time', 'LIKE', "%$keyword%")
                ->orWhere('check_all_day_start', 'LIKE', "%$keyword%")
                ->orWhere('check_all_day_end', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('link_video', 'LIKE', "%$keyword%")
                ->orWhere('link_lms', 'LIKE', "%$keyword%")
                ->orWhere('like', 'LIKE', "%$keyword%")
                ->orWhere('fav', 'LIKE', "%$keyword%")
                ->orWhere('share', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $training = Training::latest()->paginate($perPage);
        }

        return view('training.index', compact('training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $type_article = Training_type::get();
        return view('training.create', compact('type_article'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        Training::create($requestData);

        // return redirect('training_create/article')->with('flash_message', 'Training added!');
        return redirect('/manage_training');
        
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
        $training = Training::findOrFail($id);

        return view('training.show', compact('training'));
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
        $training = Training::findOrFail($id);

        return view('training.edit', compact('training'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $training = Training::findOrFail($id);
        $training->update($requestData);

        return redirect('training')->with('flash_message', 'Training updated!');
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
        Training::destroy($id);

        return redirect('training')->with('flash_message', 'Training deleted!');
    }

    function manage_training(){
        return view('training.manage_training');
    }
}

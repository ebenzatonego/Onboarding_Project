<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Career_path;
use Illuminate\Http\Request;

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
}

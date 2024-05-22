<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Career_path_content;
use Illuminate\Http\Request;

class Career_path_contentsController extends Controller
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
            $career_path_contents = Career_path_content::where('career_path_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('icon', 'LIKE', "%$keyword%")
                ->orWhere('read', 'LIKE', "%$keyword%")
                ->orWhere('recommend', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('number', 'LIKE', "%$keyword%")
                ->orWhere('user_download_pdf', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->orWhere('log_video', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $career_path_contents = Career_path_content::latest()->paginate($perPage);
        }

        return view('career_path_contents.index', compact('career_path_contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('career_path_contents.create');
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
        
        Career_path_content::create($requestData);

        return redirect('career_path_contents')->with('flash_message', 'Career_path_content added!');
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
        $career_path_content = Career_path_content::findOrFail($id);

        return view('career_path_contents.show', compact('career_path_content'));
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
        $career_path_content = Career_path_content::findOrFail($id);

        return view('career_path_contents.edit', compact('career_path_content'));
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
        
        $career_path_content = Career_path_content::findOrFail($id);
        $career_path_content->update($requestData);

        return redirect('career_path_contents')->with('flash_message', 'Career_path_content updated!');
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
        Career_path_content::destroy($id);

        return redirect('career_path_contents')->with('flash_message', 'Career_path_content deleted!');
    }
}
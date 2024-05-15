<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Video_welcome_page;
use Illuminate\Http\Request;

class Video_welcome_pageController extends Controller
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
            $video_welcome_page = Video_welcome_page::where('name_video', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('log', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $video_welcome_page = Video_welcome_page::latest()->paginate($perPage);
        }

        return view('video_welcome_page.index', compact('video_welcome_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('video_welcome_page.create');
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
        
        Video_welcome_page::create($requestData);

        return redirect('video_welcome_page')->with('flash_message', 'Video_welcome_page added!');
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
        $video_welcome_page = Video_welcome_page::findOrFail($id);

        return view('video_welcome_page.show', compact('video_welcome_page'));
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
        $video_welcome_page = Video_welcome_page::findOrFail($id);

        return view('video_welcome_page.edit', compact('video_welcome_page'));
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
        
        $video_welcome_page = Video_welcome_page::findOrFail($id);
        $video_welcome_page->update($requestData);

        return redirect('video_welcome_page')->with('flash_message', 'Video_welcome_page updated!');
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
        Video_welcome_page::destroy($id);

        return redirect('video_welcome_page')->with('flash_message', 'Video_welcome_page deleted!');
    }
}

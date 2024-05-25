<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Video_congrats_type_rank;
use Illuminate\Http\Request;

class Video_congrats_type_ranksController extends Controller
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
            $video_congrats_type_ranks = Video_congrats_type_rank::where('name_rank', 'LIKE', "%$keyword%")
                ->orWhere('check_active', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $video_congrats_type_ranks = Video_congrats_type_rank::latest()->paginate($perPage);
        }

        return view('video_congrats_type_ranks.index', compact('video_congrats_type_ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('video_congrats_type_ranks.create');
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
        
        Video_congrats_type_rank::create($requestData);

        return redirect('video_congrats_type_ranks')->with('flash_message', 'Video_congrats_type_rank added!');
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
        $video_congrats_type_rank = Video_congrats_type_rank::findOrFail($id);

        return view('video_congrats_type_ranks.show', compact('video_congrats_type_rank'));
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
        $video_congrats_type_rank = Video_congrats_type_rank::findOrFail($id);

        return view('video_congrats_type_ranks.edit', compact('video_congrats_type_rank'));
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
        
        $video_congrats_type_rank = Video_congrats_type_rank::findOrFail($id);
        $video_congrats_type_rank->update($requestData);

        return redirect('video_congrats_type_ranks')->with('flash_message', 'Video_congrats_type_rank updated!');
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
        Video_congrats_type_rank::destroy($id);

        return redirect('video_congrats_type_ranks')->with('flash_message', 'Video_congrats_type_rank deleted!');
    }
}

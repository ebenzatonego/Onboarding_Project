<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Tools_tutorial;
use Illuminate\Http\Request;

class Tools_tutorialsController extends Controller
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
            $tools_tutorials = Tools_tutorial::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tools_tutorials = Tools_tutorial::latest()->paginate($perPage);
        }

        return view('tools_tutorials.index', compact('tools_tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tools_tutorials.create');
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
        
        Tools_tutorial::create($requestData);

        return redirect('tools_tutorials')->with('flash_message', 'Tools_tutorial added!');
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
        $tools_tutorial = Tools_tutorial::findOrFail($id);

        return view('tools_tutorials.show', compact('tools_tutorial'));
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
        $tools_tutorial = Tools_tutorial::findOrFail($id);

        return view('tools_tutorials.edit', compact('tools_tutorial'));
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
        
        $tools_tutorial = Tools_tutorial::findOrFail($id);
        $tools_tutorial->update($requestData);

        return redirect('tools_tutorials')->with('flash_message', 'Tools_tutorial updated!');
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
        Tools_tutorial::destroy($id);

        return redirect('tools_tutorials')->with('flash_message', 'Tools_tutorial deleted!');
    }
}

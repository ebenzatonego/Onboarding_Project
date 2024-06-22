<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Log_delete_content;
use Illuminate\Http\Request;

class Log_delete_contentController extends Controller
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
            $log_delete_content = Log_delete_content::where('type', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('news_name', 'LIKE', "%$keyword%")
                ->orWhere('training_name', 'LIKE', "%$keyword%")
                ->orWhere('product_name', 'LIKE', "%$keyword%")
                ->orWhere('appointment_name', 'LIKE', "%$keyword%")
                ->orWhere('activity_name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $log_delete_content = Log_delete_content::latest()->paginate($perPage);
        }

        return view('log_delete_content.index', compact('log_delete_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('log_delete_content.create');
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
        
        Log_delete_content::create($requestData);

        return redirect('log_delete_content')->with('flash_message', 'Log_delete_content added!');
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
        $log_delete_content = Log_delete_content::findOrFail($id);

        return view('log_delete_content.show', compact('log_delete_content'));
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
        $log_delete_content = Log_delete_content::findOrFail($id);

        return view('log_delete_content.edit', compact('log_delete_content'));
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
        
        $log_delete_content = Log_delete_content::findOrFail($id);
        $log_delete_content->update($requestData);

        return redirect('log_delete_content')->with('flash_message', 'Log_delete_content updated!');
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
        Log_delete_content::destroy($id);

        return redirect('log_delete_content')->with('flash_message', 'Log_delete_content deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Training_type;
use Illuminate\Http\Request;

class Training_typeController extends Controller
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
            $training_type = Training_type::where('type_article', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $training_type = Training_type::latest()->paginate($perPage);
        }

        return view('training_type.index', compact('training_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('training_type.create');
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
        
        Training_type::create($requestData);

        return redirect('training_type')->with('flash_message', 'Training_type added!');
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
        $training_type = Training_type::findOrFail($id);

        return view('training_type.show', compact('training_type'));
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
        $training_type = Training_type::findOrFail($id);

        return view('training_type.edit', compact('training_type'));
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
        
        $training_type = Training_type::findOrFail($id);
        $training_type->update($requestData);

        return redirect('training_type')->with('flash_message', 'Training_type updated!');
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
        Training_type::destroy($id);

        return redirect('training_type')->with('flash_message', 'Training_type deleted!');
    }
}

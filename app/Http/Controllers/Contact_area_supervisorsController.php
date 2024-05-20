<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Contact_area_supervisor;
use Illuminate\Http\Request;

class Contact_area_supervisorsController extends Controller
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
            $contact_area_supervisors = Contact_area_supervisor::where('area', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('nickname', 'LIKE', "%$keyword%")
                ->orWhere('account', 'LIKE', "%$keyword%")
                ->orWhere('organization_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contact_area_supervisors = Contact_area_supervisor::latest()->paginate($perPage);
        }

        return view('contact_area_supervisors.index', compact('contact_area_supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact_area_supervisors.create');
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
        
        Contact_area_supervisor::create($requestData);

        return redirect('contact_area_supervisors')->with('flash_message', 'Contact_area_supervisor added!');
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
        $contact_area_supervisor = Contact_area_supervisor::findOrFail($id);

        return view('contact_area_supervisors.show', compact('contact_area_supervisor'));
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
        $contact_area_supervisor = Contact_area_supervisor::findOrFail($id);

        return view('contact_area_supervisors.edit', compact('contact_area_supervisor'));
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
        
        $contact_area_supervisor = Contact_area_supervisor::findOrFail($id);
        $contact_area_supervisor->update($requestData);

        return redirect('contact_area_supervisors')->with('flash_message', 'Contact_area_supervisor updated!');
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
        Contact_area_supervisor::destroy($id);

        return redirect('contact_area_supervisors')->with('flash_message', 'Contact_area_supervisor deleted!');
    }
}

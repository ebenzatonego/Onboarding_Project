<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Contact_group_manager;
use Illuminate\Http\Request;

class Contact_group_managersController extends Controller
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
            $contact_group_managers = Contact_group_manager::where('name', 'LIKE', "%$keyword%")
                ->orWhere('nickname', 'LIKE', "%$keyword%")
                ->orWhere('account', 'LIKE', "%$keyword%")
                ->orWhere('organization_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contact_group_managers = Contact_group_manager::latest()->paginate($perPage);
        }

        return view('contact_group_managers.index', compact('contact_group_managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact_group_managers.create');
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
        
        Contact_group_manager::create($requestData);

        return redirect('contact_group_managers')->with('flash_message', 'Contact_group_manager added!');
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
        $contact_group_manager = Contact_group_manager::findOrFail($id);

        return view('contact_group_managers.show', compact('contact_group_manager'));
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
        $contact_group_manager = Contact_group_manager::findOrFail($id);

        return view('contact_group_managers.edit', compact('contact_group_manager'));
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
        
        $contact_group_manager = Contact_group_manager::findOrFail($id);
        $contact_group_manager->update($requestData);

        return redirect('contact_group_managers')->with('flash_message', 'Contact_group_manager updated!');
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
        Contact_group_manager::destroy($id);

        return redirect('contact_group_managers')->with('flash_message', 'Contact_group_manager deleted!');
    }
}

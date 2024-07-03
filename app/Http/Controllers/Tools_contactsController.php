<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Tools_contact;
use Illuminate\Http\Request;

class Tools_contactsController extends Controller
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
            $tools_contacts = Tools_contact::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('mail', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tools_contacts = Tools_contact::latest()->paginate($perPage);
        }

        return view('tools_contacts.index', compact('tools_contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data_type = Tools_contact::groupBy('type')->select('type')->get();
        
        return view('tools_contacts.create', compact('data_type'));
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
        
        Tools_contact::create($requestData);

        return redirect('tools_contacts')->with('flash_message', 'Tools_contact added!');
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
        $tools_contact = Tools_contact::findOrFail($id);

        return view('tools_contacts.show', compact('tools_contact'));
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
        $tools_contact = Tools_contact::findOrFail($id);
        $data_type = Tools_contact::groupBy('type')->select('type')->get();

        return view('tools_contacts.edit', compact('tools_contact','data_type'));
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
        
        $tools_contact = Tools_contact::findOrFail($id);
        $tools_contact->update($requestData);

        return redirect('tools_contacts')->with('flash_message', 'Tools_contact updated!');
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
        Tools_contact::destroy($id);

        return redirect('tools_contacts')->with('flash_message', 'Tools_contact deleted!');
    }

    function get_data_show_tools_contact(){
        $data = Tools_contact::get();
        return $data ;
    }
}

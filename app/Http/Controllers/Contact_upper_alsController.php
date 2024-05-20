<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Contact_upper_al;
use Illuminate\Http\Request;

class Contact_upper_alsController extends Controller
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
            $contact_upper_als = Contact_upper_al::where('name', 'LIKE', "%$keyword%")
                ->orWhere('nickname', 'LIKE', "%$keyword%")
                ->orWhere('account', 'LIKE', "%$keyword%")
                ->orWhere('organization_name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contact_upper_als = Contact_upper_al::latest()->paginate($perPage);
        }

        return view('contact_upper_als.index', compact('contact_upper_als'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact_upper_als.create');
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
        
        Contact_upper_al::create($requestData);

        return redirect('contact_upper_als')->with('flash_message', 'Contact_upper_al added!');
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
        $contact_upper_al = Contact_upper_al::findOrFail($id);

        return view('contact_upper_als.show', compact('contact_upper_al'));
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
        $contact_upper_al = Contact_upper_al::findOrFail($id);

        return view('contact_upper_als.edit', compact('contact_upper_al'));
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
        
        $contact_upper_al = Contact_upper_al::findOrFail($id);
        $contact_upper_al->update($requestData);

        return redirect('contact_upper_als')->with('flash_message', 'Contact_upper_al updated!');
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
        Contact_upper_al::destroy($id);

        return redirect('contact_upper_als')->with('flash_message', 'Contact_upper_al deleted!');
    }
}

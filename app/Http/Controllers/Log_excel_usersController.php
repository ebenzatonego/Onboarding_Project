<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Log_excel_user;
use Illuminate\Http\Request;

class Log_excel_usersController extends Controller
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
            $log_excel_users = Log_excel_user::where('name_file', 'LIKE', "%$keyword%")
                ->orWhere('link_file', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $log_excel_users = Log_excel_user::latest()->paginate($perPage);
        }

        return view('log_excel_users.index', compact('log_excel_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('log_excel_users.create');
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
        
        Log_excel_user::create($requestData);

        return redirect('log_excel_users')->with('flash_message', 'Log_excel_user added!');
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
        $log_excel_user = Log_excel_user::findOrFail($id);

        return view('log_excel_users.show', compact('log_excel_user'));
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
        $log_excel_user = Log_excel_user::findOrFail($id);

        return view('log_excel_users.edit', compact('log_excel_user'));
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
        
        $log_excel_user = Log_excel_user::findOrFail($id);
        $log_excel_user->update($requestData);

        return redirect('log_excel_users')->with('flash_message', 'Log_excel_user updated!');
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
        Log_excel_user::destroy($id);

        return redirect('log_excel_users')->with('flash_message', 'Log_excel_user deleted!');
    }
}

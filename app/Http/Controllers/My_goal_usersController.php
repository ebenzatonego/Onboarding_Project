<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\My_goal_user;
use Illuminate\Http\Request;
use Carbon\Carbon;

class My_goal_usersController extends Controller
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
            $my_goal_users = My_goal_user::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('my_goals_type_id', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('period', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $my_goal_users = My_goal_user::latest()->paginate($perPage);
        }

        return view('my_goal_users.index', compact('my_goal_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('my_goal_users.create');
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
        
        My_goal_user::create($requestData);

        return redirect('my_goal_users')->with('flash_message', 'My_goal_user added!');
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
        $my_goal_user = My_goal_user::findOrFail($id);

        return view('my_goal_users.show', compact('my_goal_user'));
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
        $my_goal_user = My_goal_user::findOrFail($id);

        return view('my_goal_users.edit', compact('my_goal_user'));
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
        
        $my_goal_user = My_goal_user::findOrFail($id);
        $my_goal_user->update($requestData);

        return redirect('my_goal_users')->with('flash_message', 'My_goal_user updated!');
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
        My_goal_user::destroy($id);

        return redirect('my_goal_users')->with('flash_message', 'My_goal_user deleted!');
    }

    function save_my_goal_users(Request $request)
    {
        $requestData = $request->all();
        
        My_goal_user::create($requestData);

        return 'success' ;

    }

    function update_my_goal($user_id){

        $data = [] ;
        $data['status'] = 'success' ;

        $my_goal_user = My_goal_user::where('user_id',$user_id)->where('status' , null)->first();
        $my_goal_user->update($data);

        return 'success' ;
    }
}

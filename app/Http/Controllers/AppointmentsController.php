<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Training_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;
use App\Models\Appointment_area;

class AppointmentsController extends Controller
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
            $appointments = Appointment::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('training_type_id', 'LIKE', "%$keyword%")
                ->orWhere('all_day', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('time_start', 'LIKE', "%$keyword%")
                ->orWhere('time_end', 'LIKE', "%$keyword%")
                ->orWhere('user_like', 'LIKE', "%$keyword%")
                ->orWhere('user_dislike', 'LIKE', "%$keyword%")
                ->orWhere('user_share', 'LIKE', "%$keyword%")
                ->orWhere('user_fav', 'LIKE', "%$keyword%")
                ->orWhere('location_detail', 'LIKE', "%$keyword%")
                ->orWhere('link_map', 'LIKE', "%$keyword%")
                ->orWhere('link_out', 'LIKE', "%$keyword%")
                ->orWhere('click_link_out', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $appointments = Appointment::latest()->paginate($perPage);
        }

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $type_article = Training_type::get();
        $appointment_area = Appointment_area::orderBy('area','ASC')->get();
        return view('appointments.create', compact('type_article','appointment_area'));
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
        
        Appointment::create($requestData);

        return redirect('/manage_appointment');
        // return redirect('appointments')->with('flash_message', 'Appointment added!');
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
        $appointment = Appointment::findOrFail($id);

        return view('appointments.show', compact('appointment'));
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
        $appointment = Appointment::findOrFail($id);

        return view('appointments.edit', compact('appointment'));
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
        
        $appointment = Appointment::findOrFail($id);
        $appointment->update($requestData);

        return redirect('appointments')->with('flash_message', 'Appointment updated!');
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
        Appointment::destroy($id);

        return redirect('appointments')->with('flash_message', 'Appointment deleted!');
    }

    function manage_appointment(){

        $data_Training_type = Training_type::orderByRaw("CASE 
                        WHEN check_highlight IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        check_highlight ASC, 
                        id ASC")
                    ->get();

        $photo_menu_highlight_1 = Training_type::where('check_highlight' , '1')
            ->select('photo_menu')
            ->first();

        $photo_menu_highlight_2 = Training_type::where('check_highlight' , '2')
            ->select('photo_menu')
            ->first();

        $photo_menu_highlight_3 = Training_type::where('check_highlight' , '3')
            ->select('photo_menu')
            ->first();

        $photo_menu_highlight_4 = Training_type::where('check_highlight' , '4')
            ->select('photo_menu')
            ->first();

        return view('appointments.manage_appointment', compact('data_Training_type','photo_menu_highlight_1','photo_menu_highlight_2','photo_menu_highlight_3','photo_menu_highlight_4'));
    }

    function get_data_appointment($type){

        $data = [];

        if($type == 'all'){
            // $data['data_appointments'] = Appointment::orderBy('id' , 'DESC')->get();

            $data['data_appointments'] = DB::table('appointments')
                ->join('training_types', 'training_types.id', '=', 'appointments.training_type_id')
                ->select('appointments.*', 'training_types.type_article')
                ->orderBy("id", "DESC")
                ->get();
        }
        else{
            $data['data_appointments'] = Appointment::where('training_type_id', $type)
                ->orderBy("id", "DESC")
                ->get();
            $data_Training_type = Training_type::where('id', $type)->first();
            $data['type_article'] = $data_Training_type->type_article ;
        }

        return $data;
    }
}

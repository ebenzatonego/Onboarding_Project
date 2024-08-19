<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogsController extends Controller
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
            $logs = Log::where('log_content', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $logs = Log::latest()->paginate($perPage);
        }

        return view('logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('logs.create');
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
        
        Log::create($requestData);

        return redirect('logs')->with('flash_message', 'Log added!');
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
        $log = Log::findOrFail($id);

        return view('logs.show', compact('log'));
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
        $log = Log::findOrFail($id);

        return view('logs.edit', compact('log'));
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
        
        $log = Log::findOrFail($id);
        $log->update($requestData);

        return redirect('logs')->with('flash_message', 'Log updated!');
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
        Log::destroy($id);

        return redirect('logs')->with('flash_message', 'Log deleted!');
    }

    public function create_logs(Request $request)
    {
        $requestData = $request->all();


        Log::create([
            "log_content"=> $requestData['content'],
            "user_id"=> $requestData['user_id'],
            "role"=>$requestData['role'],
        ]);
        return response()->json('ok');

    }

    function log_web(){
        return view('logs.log_web');
    }

    function get_list_log_web(Request $request) {
        $limit = $request->input('limit', 350); // จำนวนแถวต่อครั้ง, ค่าเริ่มต้นคือ 350
        $page = $request->input('page', 1); // หน้าที่จะดึงข้อมูล
        $offset = ($page - 1) * $limit;
        
        // $log_web = Log::offset($offset)
        //                ->limit($limit)
        //                ->get();

        $log_web = DB::table('logs')
                ->join('users', 'users.id', '=', 'logs.user_id')
                ->select('logs.*', 'users.name' , 'users.account' , 'users.current_rank')
                // ->whereDate('logs.created_at', '>=', '2024-07-07')
                ->offset($offset)
                ->limit($limit)
                ->orderBy('logs.id' , 'DESC')
                ->get();

        return response()->json($log_web);

    }

    function log_delete(){
        return view('log_delete_content.index');
    }

    function get_list_log_web_delete(Request $request) {
        $limit = $request->input('limit', 350); // จำนวนแถวต่อครั้ง, ค่าเริ่มต้นคือ 350
        $page = $request->input('page', 1); // หน้าที่จะดึงข้อมูล
        $offset = ($page - 1) * $limit;
        
        // $log_web = Log::offset($offset)
        //                ->limit($limit)
        //                ->get();

        $log_web = DB::table('log_delete_contents')
                ->join('users', 'users.id', '=', 'log_delete_contents.user_id')
                ->select('log_delete_contents.*', 'users.name' , 'users.account' , 'users.current_rank', 'users.role')
                // ->whereDate('log_delete_contents.created_at', '>=', '2024-07-07')
                ->offset($offset)
                ->limit($limit)
                ->orderBy('log_delete_contents.id' , 'DESC')
                ->get();

        return response()->json($log_web);

    }

    function log_content(){
        return view('logs.log_content');
    }

    function get_log_content(){

        $data_log = [];

        $log_content_trainings = DB::table('trainings')
            ->select('title', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'log_rating', 'log_video')
            // ->limit(5)
            ->get();

        $log_content_appointments_train = DB::table('appointments')
            ->where('type' , "อบรม")
            ->select('title', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'log_rating')
            // ->limit(5)
            ->get();

        $log_content_appointments_quiz = DB::table('appointments')
            ->where('type' , "สอบ")
            ->select('title', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'log_rating')
            // ->limit(5)
            ->get();

        $log_content_news = DB::table('news')
            ->select('title', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'log_rating', 'log_video')
            // ->limit(5)
            ->get();

        $log_content_activitys = DB::table('activitys')
            ->select('title', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'log_rating', 'log_video')
            // ->limit(5)
            ->get();

        $log_content_products = DB::table('products')
            ->select('title', 'user_like', 'user_dislike', 'user_share', 'user_fav', 'user_view', 'log_rating', 'user_download_pdf')
            // ->limit(5)
            ->get();

        $log_content_career_path_contents = DB::table('career_path_contents')
            ->select('title', 'user_view', 'user_download_pdf' , 'log_video')
            // ->limit(5)
            ->get();


        $data_log['trainings'] = $log_content_trainings;
        $data_log['appointments_train'] = $log_content_appointments_train;
        $data_log['appointments_quiz'] = $log_content_appointments_quiz;
        $data_log['news'] = $log_content_news;
        $data_log['activitys'] = $log_content_activitys;
        $data_log['products'] = $log_content_products;
        $data_log['career_path_contents'] = $log_content_career_path_contents;

        return $data_log ;

    }
}

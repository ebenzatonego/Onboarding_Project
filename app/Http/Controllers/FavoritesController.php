<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Favorite;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class FavoritesController extends Controller
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
            $favorites = Favorite::where('type', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('news_id', 'LIKE', "%$keyword%")
                ->orWhere('training_id', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->orWhere('appointment_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $favorites = Favorite::latest()->paginate($perPage);
        }

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('favorites.create');
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
        
        Favorite::create($requestData);

        return redirect('favorites')->with('flash_message', 'Favorite added!');
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
        $favorite = Favorite::findOrFail($id);

        return view('favorites.show', compact('favorite'));
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
        $favorite = Favorite::findOrFail($id);

        return view('favorites.edit', compact('favorite'));
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
        
        $favorite = Favorite::findOrFail($id);
        $favorite->update($requestData);

        return redirect('favorites')->with('flash_message', 'Favorite updated!');
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
        Favorite::destroy($id);

        return redirect('favorites')->with('flash_message', 'Favorite deleted!');
    }

    function get_data_fav_of_user($user_id){

        // favorites join news (ข่าว)
        $data_news = DB::table('favorites')
            ->join('news', 'news.id', '=', 'favorites.news_id')
            ->leftJoin('news_types', 'news_types.id', '=', 'news.news_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'news_types.name_type',
                    'news.id as item_id',
                    'news.title',
                    'news.detail',
                    'news.photo_cover',
                )
            ->orderBy('favorites.created_at' , 'DESC')
            ->get();

        // favorites join trainings (หลักสูตร)
        $data_trainings = DB::table('favorites')
            ->join('trainings', 'trainings.id', '=', 'favorites.training_id')
            ->leftJoin('training_types', 'training_types.id', '=', 'trainings.training_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'training_types.type_article',
                    'trainings.id as item_id',
                    'trainings.title',
                    'trainings.detail',
                    'trainings.photo',
                )
            ->orderBy('favorites.created_at' , 'DESC')
            ->get();

        // favorites join appointments (ตารางอบรม / สอบ)
        $data_appointments = DB::table('favorites')
            ->join('appointments', 'appointments.id', '=', 'favorites.appointment_id')
            ->leftJoin('training_types', 'training_types.id', '=', 'appointments.training_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'training_types.type_article',
                    'appointments.id as item_id',
                    'appointments.title',
                    'appointments.photo',
                    'appointments.detail',
                    'appointments.type as type_appointments',
                    'appointments.all_day',
                    'appointments.date_start',
                    'appointments.date_end',
                    'appointments.time_start',
                    'appointments.time_end',
                )
            ->orderBy('favorites.created_at' , 'DESC')
            ->get();

        // favorites join products (ผลิตภัณฑ์)
        $data_products = DB::table('favorites')
            ->join('products', 'products.id', '=', 'favorites.product_id')
            ->leftJoin('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'product_types.name_type',
                    'products.id as item_id',
                    'products.title',
                    'products.photo',
                    'products.detail',
                )
            ->orderBy('favorites.created_at' , 'DESC')
            ->get();

        // favorites join activitys (กิจกรรม)
        $data_activitys = DB::table('favorites')
            ->join('activitys', 'activitys.id', '=', 'favorites.activity_id')
            ->leftJoin('activity_types', 'activity_types.id', '=', 'activitys.activity_type_id')
            ->where('favorites.user_id' ,$user_id)
            ->where('favorites.status' , 'Yes')
            ->select('favorites.*',
                    'activity_types.name_type',
                    'activitys.id as item_id',
                    'activitys.title',
                    'activitys.photo',
                    'activitys.detail',
                    'activitys.all_day',
                    'activitys.date_start',
                    'activitys.date_end',
                    'activitys.time_start',
                    'activitys.time_end',
                )
            ->orderBy('favorites.created_at' , 'DESC')
            ->get();



        // $data = [];
        // แปลงคอลเลกชันให้อยู่ในรูปแบบของอาร์เรย์
        $data_news = $data_news->toArray();
        $data_trainings = $data_trainings->toArray();
        $data_appointments = $data_appointments->toArray();
        $data_products = $data_products->toArray();
        $data_activitys = $data_activitys->toArray();

        // รวมคอลเลกชันเข้าด้วยกัน
        $data = array_merge($data_appointments, $data_activitys, $data_news, $data_trainings, $data_products);

        // เรียงลำดับข้อมูลตาม created_at และ updated_at จากมากไปน้อย
        usort($data, function($a, $b) {
            if ($a->created_at == $b->created_at) {
                return $b->updated_at <=> $a->updated_at;
            }
            return $b->created_at <=> $a->created_at;
        });

        if (empty($data)) {
            return [];
        }

        return $data ;

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Log_delete_content;

class ProductsController extends Controller
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
            $products = Product::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('product_type_id', 'LIKE', "%$keyword%")
                ->orWhere('user_like', 'LIKE', "%$keyword%")
                ->orWhere('user_dislike', 'LIKE', "%$keyword%")
                ->orWhere('user_share', 'LIKE', "%$keyword%")
                ->orWhere('user_fav', 'LIKE', "%$keyword%")
                ->orWhere('user_view', 'LIKE', "%$keyword%")
                ->orWhere('sum_rating', 'LIKE', "%$keyword%")
                ->orWhere('log_rating', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('user_download_pdf', 'LIKE', "%$keyword%")
                ->orWhere('highlight_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        return view('products.index', compact('products'));
    }

    function page_products_fav(){
        return view('products.page_products_fav');
    }

    function manage_products(){
        return view('products.manage_products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $type_products = Product_type::get();
        return view('products.create', compact('type_products'));
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
        
        Product::create($requestData);

        return redirect('/manage_products');
        // return redirect('products')->with('flash_message', 'Product added!');
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
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function share_product($id)
    {
        if(Auth::check()){
            return redirect('/product_show/'.$id);
        }
        else{
            $product = Product::findOrFail($id);

            return view('products.share_product', compact('product'));
        }
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
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
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
        
        $product = Product::findOrFail($id);
        $product->update($requestData);

        return redirect('products')->with('flash_message', 'Product updated!');
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
        $product = Product::where('id',$id)->first();
        $user_id = Auth::user()->id ;

        $data = [];
        $data['type'] = 'ผลิตภัณฑ์';
        $data['user_id'] = $user_id;
        $data['product_name'] = $product->title;

        Log_delete_content::create($data);
        Product::destroy($id);

        return redirect('manage_products')->with('flash_message', 'Product deleted!');
    }

    function preview_products($id){

        // $data_product = product::where('id' , $id)->first();
        $data_product = DB::table('products')
                ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->where('products.id' , $id)
                ->select('products.*', 'product_types.name_type')
                ->first();

        $name_type = Product_type::get();

        return view('products.preview_products', compact('data_product','name_type'));

    }

    function get_data_product($products_type_id){

        if($products_type_id == 'all'){
            $data_products = DB::table('products')
                ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->where('products.status' , 'Yes')
                ->select(
                    'products.id',
                    'products.highlight_number',
                    'products.title',
                    'products.photo',
                    'products.user_fav',
                    // 'products.detail',
                    'products.title',
                    'product_types.name_type',
                    'product_types.color_code'
                )
                ->orderByRaw("CASE 
                            WHEN products.highlight_number IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            products.highlight_number ASC, 
                            id DESC")
                ->get();

        }
        else{
            
            $data_products = DB::table('products')
                ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->where('products.status' , 'Yes')
                ->where('products.product_type_id' , $products_type_id)
                ->select(
                    'products.id',
                    'products.highlight_number',
                    'products.title',
                    'products.photo',
                    'products.user_fav',
                    'products.detail',
                    'products.title',
                    'product_types.name_type',
                    'product_types.color_code'
                )
                ->orderByRaw("CASE 
                            WHEN products.highlight_of_type IS NOT NULL THEN 1
                            ELSE 2
                            END, 
                            products.highlight_of_type ASC, 
                            id DESC")
                ->get();
        }

        return $data_products ;
    }

    function update_user_view_product($user_id,$product_id){
        $data_product = Product::where('id' , $product_id)->first();
        $array_log = array();

        if( empty($data_product->user_view) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_product->user_view, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'user_view' => $jsonLog,
                ]);

        return 'success' ;
    }

    function give_rating_product($user_id,$product_id,$selectedRating){

        $data_product = Product::where('id' , $product_id)->first();

        // User Like
        $new_user_like = array();
        if( !empty($data_product->user_like) ){
            $array = json_decode($data_product->user_like, true);
            if (!in_array($user_id, $array)) {
                // ถ้าไม่มี ให้เพิ่มค่า $user_id เข้าไป
                $array[] = $user_id;
            }
            $new_user_like = json_encode($array);
        }else{
            array_push($new_user_like, $user_id);
        }

        $data_product->user_like = $new_user_like ;
        $data_product->save();
        // END User Like

        // RATING
        if( empty($data_product->log_rating) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['rating'] = $selectedRating;

        }else{

            $array_log = json_decode($data_product->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['status'] = 'Active';
                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id][$new_round]['rating'] = $selectedRating;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id]['1']['rating'] = $selectedRating;
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'log_rating' => $jsonLog,
                ]);

        $sum_rating = $this->sum_rating($product_id);
        // END RATING

        return $sum_rating;

    }

    function sum_rating($product_id){
        $data_product = Product::where('id' , $product_id)->first();
        $log_rating = $data_product->log_rating ;
        $user_like = $data_product->user_like ;

        $count_array_user_like = 0 ;
        if( !empty($user_like) ){
            $array_user_like = json_decode($user_like, true);
            $count_array_user_like = count($array_user_like);
        }

        if( !empty($log_rating) ){
            $array_log = json_decode($log_rating, true);

            $total_active_rating = 0;

            // วนลูปผ่านอาร์เรย์เพื่อค้นหาและบวกรวมค่า rating ที่มี status เป็น 'Active'
            foreach ($array_log as $user_id => $rounds) {
                foreach ($rounds as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $total_active_rating += (int)$details['rating'];
                    }
                }
            }

            if($count_array_user_like == 0){
                $sum_rating = 0 ;
            }
            else{
                $sum_rating = (int)$total_active_rating / (int)$count_array_user_like;
            }

            DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'sum_rating' => $sum_rating,
                ]);

        }

        return $sum_rating ;

    }

    function user_cancel_like_product($user_id,$product_id){
        $data_product = Product::where('id' , $product_id)->first();
        $new_user_like = array();

        if( !empty($data_product->user_like) ){
            $array = json_decode($data_product->user_like, true);

            // เช็คว่าในอาร์เรย์มีค่า $user_id หรือไม่
            if (($key = array_search($user_id, $array)) !== false) {
                // ถ้ามี ให้ลบค่า $user_id ออกจากอาร์เรย์
                unset($array[$key]);
            }

            // จัดเรียงค่าดัชนีใหม่ของอาร์เรย์
            $array = array_values($array);

            $new_user_like = json_encode($array);

            $data_product->user_like = $new_user_like ;
            $data_product->save();

        }

        // RATING
        if( !empty($data_product->log_rating) ){

            $array_log = json_decode($data_product->log_rating, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            }

            $jsonLog = json_encode($array_log);

            DB::table('products')
                ->where([ 
                        ['id', $product_id],
                    ])
                ->update([
                        'log_rating' => $jsonLog,
                    ]);

            }

            $sum_rating = $this->sum_rating($product_id);

        return $sum_rating;

    }

    function user_cancel_dislike_product($user_id,$product_id){

        $data_product = Product::where('id' , $product_id)->first();
        $array_log = array();

        if( !empty($data_product->user_dislike) ){

            $array_log = json_decode($data_product->user_dislike, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }
            } 

        }

        $jsonLog = json_encode($array_log);

        DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);
    }

    function submit_reasons_dislike_product($user_id,$product_id,$reasons_dislike){

        $data_product = Product::where('id' , $product_id)->first();
        $array_log = array();

        if( empty($data_product->user_dislike) ){

            $array_log[$user_id]['1']['status'] = 'Active';
            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            $array_log[$user_id]['1']['reasons'] = $reasons_dislike;

        }else{

            $array_log = json_decode($data_product->user_dislike, true);

            if (array_key_exists($user_id, $array_log)) {

                // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                foreach ($array_log[$user_id] as $round => $details) {
                    if (isset($details['status']) && $details['status'] === 'Active') {
                        $array_log[$user_id][$round]['status'] = 'Canceled';
                    }
                }

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['status'] = 'Active';
                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id][$new_round]['reasons'] = $reasons_dislike;
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                $array_log[$user_id]['1']['reasons'] = $reasons_dislike;
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'user_dislike' => $jsonLog,
                ]);

    }

    function user_click_fav_btn_product($user_id,$product_id,$type){

        $data_product = Product::where('id' , $product_id)->first();
        $array_log = array();

        $data_for_table_fav = [];

        if($type == 'Yes'){

            if( empty($data_product->user_fav) ){

                $array_log[$user_id]['1']['status'] = 'Active';
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

            }else{

                $array_log = json_decode($data_product->user_fav, true);

                if (array_key_exists($user_id, $array_log)) {

                    // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                    foreach ($array_log[$user_id] as $round => $details) {
                        if (isset($details['status']) && $details['status'] === 'Active') {
                            $array_log[$user_id][$round]['status'] = 'Canceled';
                        }
                    }

                    // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                    $count_round_old = count($array_log[$user_id]);
                    $new_round = intval($count_round_old) + 1 ;

                    $array_log[$user_id][$new_round]['status'] = 'Active';
                    $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
                } else {
                    // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                    $array_log[$user_id]['1']['status'] = 'Active';
                    $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
                }

            }

            // เพิ่มข้อมูลในตาราง FAV
            $check_table_fav = Favorite::where('type','ผลิตภัณฑ์')
                ->where('product_id',$product_id)
                ->where('user_id',$user_id)
                ->first();

            if( !empty($check_table_fav->id) ){
                if($check_table_fav->status != 'Yes'){
                    DB::table('favorites')
                        ->where([ 
                                ['id', $check_table_fav->id],
                            ])
                        ->update([
                                'status' => 'Yes',
                            ]);
                }
            }
            else{
                $data_for_table_fav['type'] = 'ผลิตภัณฑ์';
                $data_for_table_fav['user_id'] = $user_id;
                $data_for_table_fav['status'] = 'Yes';
                $data_for_table_fav['product_id'] = $product_id;

                Favorite::create($data_for_table_fav);
            }
            // END เพิ่มข้อมูลในตาราง FAV


        }
        else if($type == 'No'){
            if( !empty($data_product->user_fav) ){

                $array_log = json_decode($data_product->user_fav, true);

                if (array_key_exists($user_id, $array_log)) {

                    // วนลูปเพื่อค้นหาและเปลี่ยนสถานะจาก 'Active' เป็น 'Canceled'
                    foreach ($array_log[$user_id] as $round => $details) {
                        if (isset($details['status']) && $details['status'] === 'Active') {
                            $array_log[$user_id][$round]['status'] = 'Canceled';
                        }
                    }
                }

            }

            // เพิ่มข้อมูลในตาราง FAV
            $check_table_fav = Favorite::where('type','ผลิตภัณฑ์')
                ->where('product_id',$product_id)
                ->where('user_id',$user_id)
                ->first();

            if( !empty($check_table_fav->id) ){
                if($check_table_fav->status == 'Yes'){
                    DB::table('favorites')
                        ->where([ 
                                ['id', $check_table_fav->id],
                            ])
                        ->update([
                                'status' => null,
                            ]);
                }
            }
            // END เพิ่มข้อมูลในตาราง FAV
        }

        $jsonLog = json_encode($array_log);

        DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'user_fav' => $jsonLog,
                ]);

        return 'success' ;

    }

    function user_click_pdf_btn($user_id,$product_id){
        $data_product = Product::where('id' , $product_id)->first();
        $array_log = array();

        if( empty($data_product->user_download_pdf) ){

            $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");

        }else{

            $array_log = json_decode($data_product->user_download_pdf, true);

            if (array_key_exists($user_id, $array_log)) {

                // หากเท่ากันให้เพิ่ม key round และ time ใน key นั้น
                $count_round_old = count($array_log[$user_id]);
                $new_round = intval($count_round_old) + 1 ;

                $array_log[$user_id][$new_round]['datetime'] = date("d/m/Y H:i");
            } else {
                // หากไม่เท่ากันให้เพิ่ม key ใหม่โดยใช้ $user_id
                $array_log[$user_id]['1']['datetime'] = date("d/m/Y H:i");
            }

        }

        $jsonLog = json_encode($array_log);

        DB::table('products')
            ->where([ 
                    ['id', $product_id],
                ])
            ->update([
                    'user_download_pdf' => $jsonLog,
                ]);

        return 'success' ;
    }

    function get_data_product_fav($user_id){

        $data = DB::table('products')
            ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->leftJoin('favorites', 'favorites.product_id', '=', 'products.id')
            ->where('products.status' , 'Yes')
            ->where('favorites.user_id' , $user_id)
            ->where('favorites.type' , 'ผลิตภัณฑ์')
            ->where('favorites.status' , 'Yes')
            ->select('products.*', 'product_types.name_type', 'product_types.color_code')
            ->get();

        return $data ;
    }
    function get_data_product_admin($type){

        $data = [];

        if($type == 'all'){
            // $data['data_appointments'] = Appointment::orderBy('id' , 'DESC')->get();

            // $data['data_products'] = DB::table('products')
            //     ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
            //     ->select('products.*', 'product_types.name_type')
            //     ->orderBy("id", "DESC")
            //     ->get();

            $data['data_products'] = DB::table('products')
                ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->leftJoin('users', 'users.id', '=', 'products.creator')
                ->select('products.*', 'product_types.name_type' , 'users.name as name_creator')
                ->orderByRaw("CASE 
                        WHEN highlight_number IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_number ASC, 
                        id DESC")
                ->get();
        }
        else{
            // $data['data_products'] = Product::where('product_type_id', $type)
            //     ->orderBy("id", "DESC")
            //     ->get();

            $data['data_products'] = DB::table('products')
                ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->leftJoin('users', 'users.id', '=', 'products.creator')
                ->select('products.*', 'product_types.name_type' , 'users.name as name_creator')
                ->where('products.product_type_id', $type)
                ->orderByRaw("CASE 
                        WHEN highlight_of_type IS NOT NULL THEN 1
                        ELSE 2
                        END, 
                        highlight_of_type ASC, 
                        id DESC")
                ->get();

            $data_New_type = Product_type::where('id', $type)->first();
            $data['name_type'] = $data_New_type->name_type ;
        }

        return $data;
    }

    function change_Highlight_products($product_id , $number , $type){

        $data = [];

        if($type == 'all'){
            $Highlight_number_old = Product::where('highlight_number', $number)->first();
            $Highlight_number_select = Product::where('id', $product_id)->first();

            if( !empty($Highlight_number_select->highlight_number) ){
                $data['old_id_change_to'] = $Highlight_number_select->highlight_number;
            }
            else{
                $data['old_id_change_to'] = null;
            }

            if( !empty($Highlight_number_old->id) ){
                $data['old_id'] = $Highlight_number_old->id;

                DB::table('products')
                    ->where([ 
                            ['id', $data['old_id']],
                        ])
                    ->update([
                            'highlight_number' => $data['old_id_change_to'],
                        ]);
            }

            if($number == 'ว่าง'){
                $number = null ;
            }

            DB::table('products')
                ->where([ 
                        ['id', $product_id],
                    ])
                ->update([
                        'highlight_number' => $number,
                    ]);
        }
        else{
            $Highlight_number_old = Product::where('product_type_id' , $type)->where('highlight_of_type', $number)->first();
            $Highlight_number_select = Product::where('id', $product_id)->first();

            if( !empty($Highlight_number_select->highlight_of_type) ){
                $data['old_id_change_to'] = $Highlight_number_select->highlight_of_type;
            }
            else{
                $data['old_id_change_to'] = null;
            }

            if( !empty($Highlight_number_old->id) ){
                $data['old_id'] = $Highlight_number_old->id;

                DB::table('products')
                    ->where([ 
                            ['id', $data['old_id']],
                        ])
                    ->update([
                            'highlight_of_type' => $data['old_id_change_to'],
                        ]);
            }

            if($number == 'ว่าง'){
                $number = null ;
            }

            DB::table('products')
                ->where([ 
                        ['id', $product_id],
                    ])
                ->update([
                        'highlight_of_type' => $number,
                    ]);
        }

        return $data;
        
    }

    function save_data_edit_product(Request $request)
    {
        $requestData = $request->all();

        $product = Product::findOrFail($requestData['id']);
        $product->update($requestData);

        return 'success' ;

    }
}

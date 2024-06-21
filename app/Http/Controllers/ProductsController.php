<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        Product::destroy($id);

        return redirect('products')->with('flash_message', 'Product deleted!');
    }

    function get_data_product($products_type_id){

        if($products_type_id == 'all'){
            $data_products = DB::table('products')
                ->join('product_types', 'product_types.id', '=', 'products.product_type_id')
                ->where('products.status' , 'Yes')
                ->select('products.*', 'product_types.name_type', 'product_types.color_code')
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
                ->select('products.*', 'product_types.name_type', 'product_types.color_code')
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
}

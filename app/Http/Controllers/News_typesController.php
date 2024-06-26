<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\News;
use App\Models\News_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class News_typesController extends Controller
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
            $news_types = News_type::where('name_type', 'LIKE', "%$keyword%")
                ->orWhere('number_menu', 'LIKE', "%$keyword%")
                ->orWhere('check_highlight', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news_types = News_type::latest()->paginate($perPage);
        }

        return view('news_types.index', compact('news_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('news_types.create');
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
        
        News_type::create($requestData);

        return redirect('news_types')->with('flash_message', 'News_type added!');
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
        $news_type = News_type::findOrFail($id);

        return view('news_types.show', compact('news_type'));
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
        $news_type = News_type::findOrFail($id);

        return view('news_types.edit', compact('news_type'));
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
        
        $news_type = News_type::findOrFail($id);
        $news_type->update($requestData);

        return redirect('news_types')->with('flash_message', 'News_type updated!');
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
        News_type::destroy($id);

        return redirect('news_types')->with('flash_message', 'News_type deleted!');
    }

    function get_data_News_type(){
        $data = News_type::orderBy('number_menu', 'ASC')->get();
        return $data ;
    }

    function get_data_number_menu_of_news(){
        $data = News_type::orderByRaw("CASE 
                WHEN number_menu IS NOT NULL THEN 1
                ELSE 2
                END, 
                number_menu ASC, 
                id DESC")
            ->get();
        return $data ;
    }

    function change_number_menu_type_news($type_id, $number){

        $number_old = News_type::where('number_menu', $number)->first();
        $number_select = News_type::where('id', $type_id)->first();

        $data = [];

        if( !empty($number_select->id) ){
            $data['old_change_to'] = $number_select->number_menu;
        }
        else{
            $data['old_change_to'] = null;
        }

        if( !empty($number_old->id) ){
            $data['old_id'] = $number_old->id;

            DB::table('news_types')
                ->where([ 
                        ['id', $data['old_id']],
                    ])
                ->update([
                        'number_menu' => $data['old_change_to'],
                    ]);
        }

        DB::table('news_types')
            ->where([ 
                    ['id', $type_id],
                ])
            ->update([
                    'number_menu' => $number,
                ]);

        return 'success';
    }

    function delete_news_type($news_type_id){
        $data = News_type::where('id', $news_type_id)->first();
        News::where('news_type_id', $news_type_id)->delete();

        if( !empty($data->id) ){
            $data->delete();
        }

        return 'success';

    }
}

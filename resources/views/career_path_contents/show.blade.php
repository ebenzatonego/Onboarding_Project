@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Career_path_content {{ $career_path_content->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/career_path_contents') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/career_path_contents/' . $career_path_content->id . '/edit') }}" title="Edit Career_path_content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('career_path_contents' . '/' . $career_path_content->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Career_path_content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $career_path_content->id }}</td>
                                    </tr>
                                    <tr><th> Career Path Id </th><td> {{ $career_path_content->career_path_id }} </td></tr><tr><th> Title </th><td> {{ $career_path_content->title }} </td></tr><tr><th> Icon </th><td> {{ $career_path_content->icon }} </td></tr><tr><th> Read </th><td> {{ $career_path_content->read }} </td></tr><tr><th> Recommend </th><td> {{ $career_path_content->recommend }} </td></tr><tr><th> Detail </th><td> {{ $career_path_content->detail }} </td></tr><tr><th> Pdf File </th><td> {{ $career_path_content->pdf_file }} </td></tr><tr><th> Photo </th><td> {{ $career_path_content->photo }} </td></tr><tr><th> Video </th><td> {{ $career_path_content->video }} </td></tr><tr><th> Number </th><td> {{ $career_path_content->number }} </td></tr><tr><th> User Download Pdf </th><td> {{ $career_path_content->user_download_pdf }} </td></tr><tr><th> User View </th><td> {{ $career_path_content->user_view }} </td></tr><tr><th> Log Video </th><td> {{ $career_path_content->log_video }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Career_path {{ $career_path->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/career_paths') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/career_paths/' . $career_path->id . '/edit') }}" title="Edit Career_path"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('career_paths' . '/' . $career_path->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Career_path" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $career_path->id }}</td>
                                    </tr>
                                    <tr><th> Name Rank </th><td> {{ $career_path->name_rank }} </td></tr><tr><th> Number Story </th><td> {{ $career_path->number_story }} </td></tr><tr><th> Title Story </th><td> {{ $career_path->title_story }} </td></tr><tr><th> Description Story </th><td> {{ $career_path->description_story }} </td></tr><tr><th> Photo Story </th><td> {{ $career_path->photo_story }} </td></tr><tr><th> User View </th><td> {{ $career_path->user_view }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

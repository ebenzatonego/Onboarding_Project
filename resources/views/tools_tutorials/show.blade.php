@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Tools_tutorial {{ $tools_tutorial->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/tools_tutorials') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/tools_tutorials/' . $tools_tutorial->id . '/edit') }}" title="Edit Tools_tutorial"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('tools_tutorials' . '/' . $tools_tutorial->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Tools_tutorial" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tools_tutorial->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $tools_tutorial->title }} </td></tr><tr><th> Detail </th><td> {{ $tools_tutorial->detail }} </td></tr><tr><th> Photo </th><td> {{ $tools_tutorial->photo }} </td></tr><tr><th> Video </th><td> {{ $tools_tutorial->video }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

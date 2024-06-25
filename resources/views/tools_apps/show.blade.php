@extends('layouts.theme_admin')

@section('content')
    <div class="container-fields">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tools_app {{ $tools_app->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/tools_apps') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/tools_apps/' . $tools_app->id . '/edit') }}" title="Edit Tools_app"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('tools_apps' . '/' . $tools_app->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Tools_app" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tools_app->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $tools_app->name }} </td></tr><tr><th> Type </th><td> {{ $tools_app->type }} </td></tr><tr><th> Photo Icon </th><td> {{ $tools_app->photo_icon }} </td></tr><tr><th> Link Ios </th><td> {{ $tools_app->link_ios }} </td></tr><tr><th> Click Link Ios </th><td> {{ $tools_app->click_link_ios }} </td></tr><tr><th> Link Android </th><td> {{ $tools_app->link_android }} </td></tr><tr><th> Click Link Android </th><td> {{ $tools_app->click_link_android }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

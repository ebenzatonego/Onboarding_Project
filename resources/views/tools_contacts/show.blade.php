@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Tools_contact {{ $tools_contact->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/tools_contacts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/tools_contacts/' . $tools_contact->id . '/edit') }}" title="Edit Tools_contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('tools_contacts' . '/' . $tools_contact->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Tools_contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tools_contact->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $tools_contact->name }} </td></tr><tr><th> Phone </th><td> {{ $tools_contact->phone }} </td></tr><tr><th> Mail </th><td> {{ $tools_contact->mail }} </td></tr><tr><th> Type </th><td> {{ $tools_contact->type }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

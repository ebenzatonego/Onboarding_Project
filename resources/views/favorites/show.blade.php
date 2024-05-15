@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Favorite {{ $favorite->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/favorites') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/favorites/' . $favorite->id . '/edit') }}" title="Edit Favorite"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('favorites' . '/' . $favorite->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Favorite" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $favorite->id }}</td>
                                    </tr>
                                    <tr><th> Type </th><td> {{ $favorite->type }} </td></tr><tr><th> User Id </th><td> {{ $favorite->user_id }} </td></tr><tr><th> Status </th><td> {{ $favorite->status }} </td></tr><tr><th> News Id </th><td> {{ $favorite->news_id }} </td></tr><tr><th> Training Id </th><td> {{ $favorite->training_id }} </td></tr><tr><th> Product Id </th><td> {{ $favorite->product_id }} </td></tr><tr><th> Appointment Id </th><td> {{ $favorite->appointment_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

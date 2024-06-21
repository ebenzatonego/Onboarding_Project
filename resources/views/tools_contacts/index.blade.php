@extends('layouts.theme_admin')

@section('content')
    <div class="container-fields">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header">Tools Contacts</h4>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Phone</th><th>Mail</th><th>Type</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tools_contacts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->phone }}</td><td>{{ $item->mail }}</td><td>{{ $item->type }}</td>
                                        <td>
                                            <!-- <a href="{{ url('/tools_contacts/' . $item->id) }}" title="View Tools_contact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tools_contacts/' . $item->id . '/edit') }}" title="Edit Tools_contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/tools_contacts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Tools_contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $tools_contacts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

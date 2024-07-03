@extends('layouts.theme_admin')

@section('content')

<div class="container-fields">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body  border-top border-0 border-4 border-primary" style="border-radius: 10px;">
                    <div>
                        <div class="row">
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="mb-0 text-primary">
                                        <i class="fa-duotone fa-user-group me-2 font-22 text-primary"></i>
                                        รายชื่อ Contect
                                    </h5>
                                </div>
                                <div >
                                    <a class="btn text-primary border border-primary" href="{{ url('/tools_contacts/create') }}">
                                        <i class="fa-solid fa-address-book text-primary"></i> ติดต่อ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tools_contacts as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->phone }}</td>
                                <td >{{ $item->mail }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                   
                                    <a href="{{ url('/tools_contacts/' . $item->id . '/edit') }}" title="Edit Tools_contact"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/tools_contacts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Tools_contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
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
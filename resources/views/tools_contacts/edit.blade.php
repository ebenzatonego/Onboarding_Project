@extends('layouts.theme_admin')

@section('content')
    <div class="container-fields">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <!-- <div class="card-header">Edit Tools_contact #{{ $tools_contact->id }}</div> -->
                    <div class="card-body">
                        <!-- <a href="{{ url('/tools_contacts') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/tools_contacts/' . $tools_contact->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('tools_contacts.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

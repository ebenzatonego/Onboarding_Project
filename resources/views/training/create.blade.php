@extends('layouts.theme_admin')

@section('content')
    <div class="container-fields">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create New Training</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/training') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @if($type_page == 'article')
                                @include ('training.form', ['formMode' => 'create'])
                            @elseif($type_page == 'table')
                                @include ('training.training_table', ['formMode' => 'create'])
                            @endif

                            <input type="hidden" name="type_page" value="{{ $type_page }}">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

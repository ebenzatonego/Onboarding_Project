@extends('layouts.theme_admin')

@section('content')

    <div class="container-filde">
        <div class="row">
            <div class="col-md-12">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ url('/content_popups') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('content_popups.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection

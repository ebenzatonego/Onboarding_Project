@extends('layouts.tailwind')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog Post</div>

                <div class="card-body">

                    @livewireScripts
                    @livewire('blog')

                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection
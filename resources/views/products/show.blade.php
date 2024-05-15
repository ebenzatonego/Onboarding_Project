@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product {{ $product->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/products/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('products' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $product->title }} </td></tr><tr><th> Detail </th><td> {{ $product->detail }} </td></tr><tr><th> Photo </th><td> {{ $product->photo }} </td></tr><tr><th> Product Type Id </th><td> {{ $product->product_type_id }} </td></tr><tr><th> User Like </th><td> {{ $product->user_like }} </td></tr><tr><th> User Dislike </th><td> {{ $product->user_dislike }} </td></tr><tr><th> User Share </th><td> {{ $product->user_share }} </td></tr><tr><th> User Fav </th><td> {{ $product->user_fav }} </td></tr><tr><th> User View </th><td> {{ $product->user_view }} </td></tr><tr><th> Sum Rating </th><td> {{ $product->sum_rating }} </td></tr><tr><th> Log Rating </th><td> {{ $product->log_rating }} </td></tr><tr><th> Pdf File </th><td> {{ $product->pdf_file }} </td></tr><tr><th> User Download Pdf </th><td> {{ $product->user_download_pdf }} </td></tr><tr><th> Highlight Number </th><td> {{ $product->highlight_number }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

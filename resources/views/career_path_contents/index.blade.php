@extends('layouts.theme_admin')

@section('content')
<style>
    .detail-course{
      color: #767676;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 5px;

  }
</style>

<div class="container-filde">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Career_path_contents</div>
                <div class="card-body">
                    <a href="{{ url('/career_path_contents/create') }}" class="btn btn-success btn-sm" title="Add New Career_path_content">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <form method="GET" action="{{ url('/career_path_contents') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th><th>Career Path Id</th><th>Title</th><th>Icon</th><th>Read</th><th>Recommend</th><th>Detail</th><th>Pdf File</th><th>Photo</th><th>Video</th><th>Number</th><th>User Download Pdf</th><th>User View</th><th>Log Video</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($career_path_contents as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->career_path_id }}</td><td>{{ $item->title }}</td><td>{{ $item->icon }}</td><td>{{ $item->read }}</td><td>{{ $item->recommend }}</td><td>{{ $item->detail }}</td><td>{{ $item->pdf_file }}</td><td>{{ $item->photo }}</td><td>{{ $item->video }}</td><td>{{ $item->number }}</td><td>{{ $item->user_download_pdf }}</td><td>{{ $item->user_view }}</td><td>{{ $item->log_video }}</td>
                                    <td>
                                        <a href="{{ url('/career_path_contents/' . $item->id) }}" title="View Career_path_content"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/career_path_contents/' . $item->id . '/edit') }}" title="Edit Career_path_content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/career_path_contents' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Career_path_content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $career_path_contents->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div>
                <i class="fa-solid fa-list-timeline me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">การจัดการ Career path</h5>
        </div>
        <hr>

        <div id="div_content" class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
            <!--  -->
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        get_data_career_path_contents();
    });

    function get_data_career_path_contents(){

        fetch("{{ url('/') }}/api/get_data_career_path_contents")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if(result){
                    let div_content = document.querySelector('#div_content');
                        div_content.innerHTML = '';

                    for (let i = 0; i < result.length; i++) {

                        // Highlight
                        let html_Highlight ;
                        html_Highlight = `<span id="span_Highlight_id_`+result[i].id+`" class="float-end">..</span>`;
                        if(result[i].number){
                            html_Highlight = `
                            <span id="span_Highlight_id_`+result[i].id+`">
                              <i class="i_Highlight fa-solid fa-circle-`+result[i].number+` font-24 float-end text-success"></i>
                            </span>
                            `;
                        }

                        let textWithoutHtml = `<br><br><br>`;
                        if(result[i].detail){
                            textWithoutHtml = result[i].detail.replace(/(<([^>]+)>)/gi, "");
                        }

                        let html = `
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-2">
                                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="32" height="46" viewBox="0 0 32 46" fill="none">
                                                    <path d="M8 30.8572V28.5715H10.2857V30.8572H8Z" fill="#003781"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4286 0C10.5193 0 9.64719 0.361224 9.00421 1.00421C8.36122 1.64719 8 2.51926 8 3.42857H3.42857C2.51926 3.42857 1.64719 3.7898 1.0042 4.43278C0.361223 5.07576 0 5.94783 0 6.85714V42.2857C0 43.195 0.361223 44.0671 1.0042 44.7101C1.64719 45.3531 2.51926 45.7143 3.42857 45.7143H28.5714C29.4807 45.7143 30.3528 45.3531 30.9958 44.7101C31.6388 44.0671 32 43.195 32 42.2857V6.85714C32 5.94783 31.6388 5.07576 30.9958 4.43278C30.3528 3.7898 29.4807 3.42857 28.5714 3.42857H24C24 2.51926 23.6388 1.64719 22.9958 1.00421C22.3528 0.361224 21.4807 0 20.5714 0H11.4286ZM10.2857 3.42857C10.2857 3.12547 10.4061 2.83478 10.6204 2.62045C10.8348 2.40612 11.1255 2.28571 11.4286 2.28571H20.5714C20.8745 2.28571 21.1652 2.40612 21.3796 2.62045C21.5939 2.83478 21.7143 3.12547 21.7143 3.42857V5.71429C21.7143 6.01739 21.5939 6.30808 21.3796 6.52241C21.1652 6.73674 20.8745 6.85714 20.5714 6.85714H11.4286C11.1255 6.85714 10.8348 6.73674 10.6204 6.52241C10.4061 6.30808 10.2857 6.01739 10.2857 5.71429V3.42857ZM6.85714 18.2857C6.55404 18.2857 6.26335 18.4061 6.04902 18.6204C5.83469 18.8348 5.71429 19.1255 5.71429 19.4286C5.71429 19.7317 5.83469 20.0224 6.04902 20.2367C6.26335 20.451 6.55404 20.5714 6.85714 20.5714H14.8571C15.1602 20.5714 15.4509 20.451 15.6653 20.2367C15.8796 20.0224 16 19.7317 16 19.4286C16 19.1255 15.8796 18.8348 15.6653 18.6204C15.4509 18.4061 15.1602 18.2857 14.8571 18.2857H6.85714ZM5.71429 13.7143C5.71429 13.4112 5.83469 13.1205 6.04902 12.9062C6.26335 12.6918 6.55404 12.5714 6.85714 12.5714H24.5714C24.8745 12.5714 25.1652 12.6918 25.3796 12.9062C25.5939 13.1205 25.7143 13.4112 25.7143 13.7143C25.7143 14.0174 25.5939 14.3081 25.3796 14.5224C25.1652 14.7367 24.8745 14.8571 24.5714 14.8571H6.85714C6.55404 14.8571 6.26335 14.7367 6.04902 14.5224C5.83469 14.3081 5.71429 14.0174 5.71429 13.7143ZM5.71429 27.4286C5.71429 27.1255 5.83469 26.8348 6.04902 26.6204C6.26335 26.4061 6.55404 26.2857 6.85714 26.2857H11.4286C11.7317 26.2857 12.0224 26.4061 12.2367 26.6204C12.451 26.8348 12.5714 27.1255 12.5714 27.4286V32C12.5714 32.3031 12.451 32.5938 12.2367 32.8081C12.0224 33.0225 11.7317 33.1429 11.4286 33.1429H6.85714C6.55404 33.1429 6.26335 33.0225 6.04902 32.8081C5.83469 32.5938 5.71429 32.3031 5.71429 32V27.4286ZM20.5714 32C21.4807 32 22.3528 31.6388 22.9958 30.9958C23.6388 30.3528 24 29.4807 24 28.5714C24 27.6621 23.6388 26.79 22.9958 26.1471C22.3528 25.5041 21.4807 25.1429 20.5714 25.1429C19.6621 25.1429 18.79 25.5041 18.1471 26.1471C17.5041 26.79 17.1429 27.6621 17.1429 28.5714C17.1429 29.4807 17.5041 30.3528 18.1471 30.9958C18.79 31.6388 19.6621 32 20.5714 32ZM13.7143 37.1429C13.7143 34.7246 18.2823 33.5063 20.5714 33.5063C22.8606 33.5063 27.4286 34.7246 27.4286 37.1429V40H13.7143V37.1429Z" fill="#003781"></path>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <h5 class="card-title">
                                                    `+result[i].title+`
                                                </h5>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2">
                                            <div class="row">
                                                <div class="col-6"  style="font-size: 20px;">
                                                    <b style="color: #0031E8;">`+result[i].name_rank+`</b>
                                                </div>
                                                <div class="col-6">
                                                    <span style="float: right;">
                                                        แนะนำ : <b style="color: #15B400;">`+result[i].recommend+`</b>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-5">
                                                   <b>`+result[i].icon+`</b>
                                                </div>
                                                <div class="col-7">
                                                    <span style="float: right;">
                                                        read : <b>`+result[i].read+`</b> นาที
                                                    </span>
                                                </div>
                                            </div>
                                        </p>
                                        <p class="card-text detail-course mb-2">
                                            `+textWithoutHtml+`
                                        </p>
                                        <hr>
                                        <p class="card-text mb-2">
                                            <b>ลำดับ</b>
                                            `+html_Highlight+`
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <span href="javascript:;" class="btn btn-sm btn-info w-100">
                                                    <i class="fa-solid fa-money-check-pen"></i> ดูข้อมูล / แก้ไขข้อมูล
                                                </span>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="btn-group w-100">
                                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        จัดลำดับ
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            <div class="col-6 mt-2">
                                                <span href="javascript:;" class="btn btn-sm btn-danger w-100">
                                                    <i class="fa-solid fa-trash-can"></i> ลบ
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        div_content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                    }
                }
        });

    }
</script>
@endsection

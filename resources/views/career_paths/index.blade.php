@extends('layouts.theme_user')

@section('content')
<style>
    .career_path_ag,
    .career_path_um,
    .career_path_sum,
    .career_path_dm,
    .career_path_sdm,
    .career_path_avp,
    .career_path_vp,
    .career_path_evp,
    .career_path_sevp {
        position: absolute;
        transform: translate(-50%, -50%);
        /* border: #000 1px solid; */
        width: 11.5%;
        height: 16.5%;
        border-radius: 50%;
    }

    .career_path_ag {
        top: 82.3%;
        left: 5.7%;
    }

    .career_path_um {
        top: 89%;
        left: 25.8%;
    }

    .career_path_sum {
        top: 63.2%;
        left: 26.2%;
    }

    .career_path_dm {
        top: 77%;
        left: 48.5%;
    }

    .career_path_sdm {
        top: 46%;
        left: 48.8%;
    }

    .career_path_avp {
        top: 71.2%;
        left: 70.8%;
    }

    .career_path_vp {
        top: 46%;
        left: 83.4%;
    }

    .career_path_evp {
        top: 21.2%;
        left: 68%;
    }

    .career_path_sevp {
        top: 15.5%;
        left: 90.5%;
    }

    .btn-career-path {
        color: #003781;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
        cursor: pointer;
    }

    .title-career-path {
        color: #003781;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 21px */
        letter-spacing: -0.266px;
    }


    @media only screen and (max-width: 500px) {

        .container-career-path,
        .bottom-content-career-path {
            padding: 0;
        }

        .bottom-content-career-path {
            border-top: 1px solid #000;
        }
    }

    .content-career-path {
        border-radius: 0 0 0 25px;
        background-color: #000;
        position: relative;
    }

    .detail-career-path {
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
    }

    .name-career-path {
        color: #FFF;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
    }
    /* .content-career-path div:first-child{
        padding-top: 50px;
    } */
    .content-career-path div:first-child {
  display: none;
}
.bottom-content-career-path > .content-career-path {
    /* border: 1px solid red; */
    z-index: 5;
    position: relative;
}

.bottom-content-career-path > .content-career-path ~ .content-career-path img{
    max-height: calc(150px + 30px);
    height: 100%;
    margin-top: -50px;
    width: 100%;
    object-fit: cover;
    border-radius: 0 0 0 25px;

}
.bottom-content-career-path > .content-career-path ~ .content-career-path{
    z-index: 4;
    position: relative;
    
}
</style>
<div class="container container-career-path mb-5">
    <div class="row">
        <div class="col-md-6 col-12 p-4">
            <div class="d-flex align-items-center justify-content-center w-100 ">
                <div>

                    <div>
                        <a class="btn-career-path"><i class="fa-solid fa-chevron-left me-3"></i> เส้นทางสายอาชีพ</a>
                        <p class="mt-2 title-career-path" style="margin-left: 32px;">กดเพื่อเลือกเส้นทางที่สนใจ</p>
                    </div>
                    <div class="position-relative">


                        <img src="{{url('/img/icon/career_paths.png')}}" alt="" style="width: 100%;">
                        <a href="" class="career_path_ag"></a>
                        <a href="" class="career_path_um"></a>
                        <a href="" class="career_path_sum"></a>
                        <a href="" class="career_path_dm"></a>
                        <a href="" class="career_path_sdm"></a>
                        <a href="" class="career_path_avp"></a>
                        <a href="" class="career_path_vp"></a>
                        <a href="" class="career_path_evp"></a>
                        <a href="" class="career_path_sevp"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 bottom-content-career-path">

            <p class="mt-2 title-career-path px-3">ทางเลือกของเส้นทางสู่ตำแหน่ง</p>

            <div class="w-100 content-career-path">
                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;" alt="">
                <div class="p-4 detail-career-path">
                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                </div>
            </div>

            <div class="w-100 content-career-path">
                <img src="{{url('img/icon/content-career-path.png')}}"  alt="">
                <div class="p-4 detail-career-path">
                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Career_paths</div>
                    <div class="card-body">
                        <a href="{{ url('/career_paths/create') }}" class="btn btn-success btn-sm" title="Add New Career_path">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/career_paths') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name Rank</th><th>Number Story</th><th>Title Story</th><th>Description Story</th><th>Photo Story</th><th>User View</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($career_paths as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name_rank }}</td><td>{{ $item->number_story }}</td><td>{{ $item->title_story }}</td><td>{{ $item->description_story }}</td><td>{{ $item->photo_story }}</td><td>{{ $item->user_view }}</td>
                                        <td>
                                            <a href="{{ url('/career_paths/' . $item->id) }}" title="View Career_path"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/career_paths/' . $item->id . '/edit') }}" title="Edit Career_path"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/career_paths' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Career_path" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $career_paths->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
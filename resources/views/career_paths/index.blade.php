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
        border-radius: 50% !important;
        background-color: #003781 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFF !important;
        z-index: 999;
    }

    .nav-link.active {
        background-color: #a8d29f !important;
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
        background-color: #FFC107 !important;
        color: #003781 !important;
        
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
        overflow: hidden;
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
    .bottom-content-career-path>.content-career-path:nth-child(1) {
        display: none;
    }

    .bottom-content-career-path>.content-career-path {
        /* border: 1px solid red; */
        /* z-index: 5; */
        position: relative;
    }

    .bottom-content-career-path>.content-career-path~.content-career-path img {
        height: 180px;
        margin-top: -30px;
        width: 100%;
        object-fit: cover;
        border-radius: 0 0 0 25px;
        border: none !important;
    }

    .bottom-content-career-path>.content-career-path~.content-career-path {
        /* z-index: 4; */
        position: relative;
        /* border: 1px solid red; */


    }

    .parent:first-child>p:nth-child(1) {
        background: #ff0000;
    }

    .content-career>.career-item:first-child img {
        max-height: 140px;
        min-height: 140px;


    }

    .content-career>.career-item:not(:first-child) img {
        max-height: 170px;
        min-height: 170px;
        position: relative;
    }

    .content-career>.career-item:not(:first-child) {
        margin-top: -30px;
        position: relative;
    }

    .content-career>.career-item:nth-child(1) {
        position: relative;

        z-index: 99;
    }

    .content-career>.career-item:nth-child(2) {
        z-index: 98;
    }

    .content-career>.career-item:nth-child(3) {
        z-index: 97;
    }

    .content-career>.career-item:nth-child(4) {
        z-index: 96;
    }

    .content-career>.career-item:nth-child(5) {
        z-index: 95;
    }

    .content-career>.career-item:nth-child(6) {
        z-index: 94;
    }

    .content-career>.career-item:nth-child(7) {
        z-index: 93;
    }

    .content-career>.career-item:nth-child(8) {
        z-index: 92;
    }

    .content-career>.career-item:nth-child(9) {
        z-index: 91;
    }

    .content-career>.career-item:nth-child(10) {
        z-index: 90;
    }

    .nav-pills {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100% !important;
        height: 100% !important;
    }

    .crown-avp {
        width: 31.087px;
        height: 34.541px;
        flex-shrink: 0;
        position: absolute;
        top: -5%;
        left: 72%;
        transform: translate(-50%, -50%) rotate(-28.15deg);

    }

    .crown-vp1,
    .crown-vp2 {
        flex-shrink: 0;
        position: absolute;
        width: 23.627px;
        height: 26.253px;
        transform: translate(-50%, -50%) rotate(-4.715deg);
    }
    .crown-vp1{
        top: -12%;
        left: 48%;
    }
    .crown-vp2{
        top: 10%;
        left:90%;
    }

    .crown-evp1,
    .crown-evp2,
    .crown-evp3 {
        flex-shrink: 0;
        position: absolute;
        transform: translate(-50%, -50%) rotate(-33.07deg);
        width: 23.627px;
        height: 26.253px;
    }
    .crown-evp1{
        top: 5%;
        left: 15%;
    }
    .crown-evp2{
        top: -18%;
        left: 48%;
    }
    .crown-evp3{
        top: 10%;
        left: 89%;
    }
    .crown-sevp{
         flex-shrink: 0;
        position: absolute;
        transform: translate(-50%, -50%) rotate(-4.715deg);
        width: 36px;
        height: 40px;
        flex-shrink: 0;
        top: 7%;
        left: 89%;
    }

    .confetti-sevp{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -9999;
        width: 61px;
height: 58px;
flex-shrink: 0;

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
                        <img src="{{url('/img/icon/career_paths2.png')}}" alt="" style="width: 100%;">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class=" nav-item">
                                <a class="nav-link active career_path_ag" data-toggle="pill" href="#pills_career_path_ag" role="tab" aria-selected="true">AG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_um" data-toggle="pill" href="#pills_career_path_um" role="tab" aria-selected="false">UM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_sum" data-toggle="pill" href="#pills_career_path_sum" role="tab" aria-selected="false">SUM</a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link career_path_dm" data-toggle="pill" href="#pills_career_path_dm" role="tab" aria-selected="true">DM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_sdm" data-toggle="pill" href="#pills_career_path_sdm" role="tab" aria-selected="false">SDM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_avp" data-toggle="pill" href="#pills_career_path_avp" role="tab" aria-selected="false">
                                    AVP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-avp">
                                </a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link career_path_vp" data-toggle="pill" href="#pills_career_path_vp" role="tab" aria-selected="true">
                                    VP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-vp1">
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-vp2">
                                </a>
                                

                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_evp" data-toggle="pill" href="#pills_career_path_evp" role="tab" aria-selected="false">
                                    EVP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-evp1">
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-evp2">
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-evp3">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_sevp" data-toggle="pill" href="#pills_career_path_sevp" role="tab" aria-selected="false">
                                    SEVP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-sevp">
                                    <img src="{{ url('img/icon/confetti.png') }}" alt="" class="confetti-sevp">
                                
                                </a>
                            </li>
                        </ul>

                        <!-- <a href="" class="career_path_ag">
                            AG
                        </a>
                        <a href="" class="career_path_um">
                            UM
                        </a>
                        <a href="" class="career_path_sum">
                            SUM
                        </a>
                        <a href="" class="career_path_dm">
                            DM
                        </a>
                        <a href="" class="career_path_sdm">
                            SDM
                        </a>
                        <a href="" class="career_path_avp">
                            AVP
                        </a>
                        <a href="" class="career_path_vp">
                            VP
                        </a>
                        <a href="" class="career_path_evp">
                            EVP
                        </a>
                        <a href="" class="career_path_sevp">
                            SEVP
                        </a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 bottom-content-career-path tt">

            <p class="mt-2 title-career-path px-3">ทางเลือกของเส้นทางสู่ตำแหน่ง</p>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills_career_path_ag" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/square_empty.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>

                        <div class="career-item">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>

                        <div class="career-item">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills_career_path_um" role="tabpanel" aria-labelledby="pills-profile-tab">pills_career_path_um</div>
                <div class="tab-pane fade" id="pills_career_path_sum" role="tabpanel" aria-labelledby="pills-contact-tab">pills_career_path_sum</div>
                <div class="tab-pane fade" id="pills_career_path_dm" role="tabpanel" aria-labelledby="pills-home-tab">pills_career_path_dm</div>
                <div class="tab-pane fade" id="pills_career_path_sdm" role="tabpanel" aria-labelledby="pills-profile-tab">pills_career_path_sdm</div>
                <div class="tab-pane fade" id="pills_career_path_avp" role="tabpanel" aria-labelledby="pills-contact-tab">pills_career_path_avp</div>
                <div class="tab-pane fade" id="pills_career_path_vp" role="tabpanel" aria-labelledby="pills-home-tab">pills_career_path_vp</div>
                <div class="tab-pane fade" id="pills_career_path_evp" role="tabpanel" aria-labelledby="pills-profile-tab">pills_career_path_evp</div>
                <div class="tab-pane fade" id="pills_career_path_sevp" role="tabpanel" aria-labelledby="pills-contact-tab">pills_career_path_sevp</div>
            </div>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>


            <!-- <div class="w-100 content-career-path">
                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                <div class="p-4 detail-career-path">
                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                </div>
            </div>
            <div class="w-100 content-career-path">
                <img src="{{url('img/icon/square_empty.png')}}" alt="">
                <div class="p-4 detail-career-path">
                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                </div>
            </div> -->

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
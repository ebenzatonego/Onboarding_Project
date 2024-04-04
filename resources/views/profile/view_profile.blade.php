@extends('layouts.theme_user')
<style>
    .card{
        border-radius: 15px !important;
    }
    .list-group-item i{
        font-size: 24px;
        margin-right: 8px;
        width: 27px;
        text-align: center;
    }
</style>
@section('content')
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
                                <p class="text-secondary mb-1">{{Auth::user()->detail}}</p>
                                
                                <button class="btn btn-primary px-5 mt-2">แก้ไข</button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <b><i class="fa-regular fa-cake-candles"></i> วันเกิด</b> 
                                </h6>
                                <span class="text-secondary">{{Auth::user()->birthday}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <b><i class="fa-regular fa-id-card-clip"></i> รหัสตัวแทน</b> 
                                </h6>
                                <span class="text-secondary">{{Auth::user()->agent_code}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <b><i class="fa-regular fa-building"></i> ชื่อหน่วยงาน</b> 
                                </h6>
                                <span class="text-secondary">{{Auth::user()->agency_name}}</span>
                            </li>
                            <li class="list-group-item ">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <b><i class="fa-regular fa-file-certificate"></i> เลขที่ใบอนุญาต</b> 
                                        </h6>
                                        <span class="text-secondary">{{Auth::user()->license}}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <h6 class="mb-0 " style="margin-left: 38px;">
                                            วันเริ่ม
                                        </h6>
                                        <span class="text-secondary"> {{ (\Carbon\Carbon::parse(Auth::user()->license_start))->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <h6 class="mb-0 " style="margin-left: 38px;">
                                            วันหมดอายุ
                                        </h6>
                                        <span class="text-secondary"> {{ (\Carbon\Carbon::parse(Auth::user()->license_expire))->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                               
                            </li>

                           

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="john@example.com">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="(239) 816-9029">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="(320) 380-4539">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Bay Area, San Francisco, CA">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="button" class="btn btn-primary px-4" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
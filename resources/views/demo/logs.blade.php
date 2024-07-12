@extends('layouts.theme_admin')
@section('content')
<style>
    /* instagram*/
    .logsLine {
        color: #00b900 !important;
        transition-duration: .3s;
    }

    /* twitter*/
    .logsFacebook {
        color: #1877F2 !important;
        transition-duration: .3s;
    }

    /* linkdin*/
    .logsTwitter {
        color: #000 !important;
        transition-duration: .3s;
    }

    /* Whatsapp*/
    .logsWhatsapp {
        color: #25D366 !important;
        transition-duration: .3s;
    }
    /* Whatsapp*/
    .logsCopy {
        color: #31d2f2 !important;
        transition-duration: .3s;
    }

    .logsLine.active {
        background-color: #00b900 !important;
        color: #fff !important;
        transition-duration: .3s;
    }

    /* twitter*/
    .logsFacebook.active {
        background-color: #1877F2 !important;
        color: #fff !important;

        transition-duration: .3s;
    }

    /* linkdin*/
    .logsTwitter.active {
        background-color: #000 !important;
        color: #fff !important;

        transition-duration: .3s;
    }

    /* Whatsapp*/
    .logsWhatsapp.active {
        background-color: #25D366 !important;
        color: #fff !important;

        transition-duration: .3s;
    }
    .logsCopy.active {
        background-color: #31d2f2 !important;
        color: #fff !important;

        transition-duration: .3s;
    }
</style>
<div class="row">
    <div class="col-md-3">
        <img src="{{url('img/icon/ad.png')}}" alt="" style="width: 100%;">
    </div>
    <div class="col-md-9 pt-3">
        <h4 class="card-title">พบกับพวกเราได้ที่งาน AL Seminar บูธ AGENCY SUPPORT ของแจกเพียบ!</h4>
        <dt class="text-info">#hastag</dt>


        <div class="mt-3">
            <span><b>เริ่ม :</b></span>
            <span id="dete_start">dete-start</span>
        </div>

        <div>
            <span><b>สิ้นสุด :</b></span>
            <span id="dete_end">dete-end</span>
        </div>

        <p class="card-text fs-6 mt-3">เตรียมตัวให้พร้อม! สำหรับงานสัมนาผู้บริหารฝ่ายขายทั่วประเทศ (AL Seminar 2024 "BEYOND THE FINISH LINE" ก้าวข้ามเส้นชัย…ไปสู่ความสำเร็จที่ใหญ่กว่า พบกันที่บูธ Agency Support เราขนของไปแจกเพียบ! วันเสาร์ที่ 6 กรกฏาคม 2567 @ไบเทคบางนา เวลาเปิดบูธ 08.00 น. เป็นต้นไป </p>

        <div class="mt-3">
            <span><b>ผู้ลงข้อมูล :</b></span>
            <span id="create_by">create_by</span>
        </div>

        <h4 class="mt-4">
            <span>ถูกใจทั้งหมด :</span>
            <span>25,451,515 คน</span>
        </h4>
    </div>
</div>

<div class="mt-5">
    <div class="d-flex justify-content-end">
        <input type="text" style="width: 100%; max-width: 400px;" class="form-control" name="search" placeholder="ค้นหา..." value="">
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#logs_view" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-solid fa-eye font-18 me-1"></i>
                            </div>
                            <div class="tab-title">View </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " data-bs-toggle="tab" href="#logs_like" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-thumbs-up font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Like</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_rate" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-star font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Rating</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_dislike" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-thumbs-down font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Dislike</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_fav" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-bookmark font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Favorites</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_share" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-solid fa-share-from-square font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Share</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_video" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-solid fa-photo-film font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Video</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_download_pdf" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-file-pdf font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Download_pdf</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade active show" id="logs_view" role="tabpanel">
                    <div class="w-100 d-flex justify-content-end">
                        <button class="btn btn-success ms-2">Export view ทั้งหมด</button>
                        <button class="btn btn-primary ms-2">Export view ที่ค้นหา</button>
                    </div>
                    <div id="content_logs_view">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name</div>
                                <div>account</div>
                                <div>12/5/2567 18:00น.</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name</div>
                                <div>account</div>
                                <div>12/5/2567 18:00น.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logs_like" role="tabpanel">
                    <div id="content_logs_loke">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-start">
                                <div>name (account)</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name (account)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logs_rate" role="tabpanel">
                    <div id="content_logs_rate">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div>5 คะแนน</div>
                                <div class="bg-success py-1 px-3 text-white rounded-pill">active</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div>5 คะแนน</div>
                                <div class="bg-danger py-1 px-3 text-white rounded-pill">cancle</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logs_dislike" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success active" id="pills-active-tab" data-bs-toggle="pill" data-bs-target="#pills-active" type="button" role="tab" aria-controls="pills-active" aria-selected="true">active</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" id="pills-inactive-tab" data-bs-toggle="pill" data-bs-target="#pills-inactive" type="button" role="tab" aria-controls="pills-inactive" aria-selected="false">inactive</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                            <div id="content_logs_dislike_active">
                                <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <div class="mx-3">name(account)</div>
                                        <div class="mx-3">12/5/2567 18:00น.</div>
                                        <div class="mx-3">เหตุผล</div>
                                        <div class="bg-success py-1 px-3 text-white rounded-pill mx-3">active</div>
                                    </div>
                                </div>
                                <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <div class="mx-3">name(account)</div>
                                        <div class="mx-3">12/5/2567 18:00น.</div>
                                        <div class="mx-3">เหตุผล</div>
                                        <div class="bg-danger py-1 px-3 text-white rounded-pill mx-3">cancle</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-inactive" role="tabpanel" aria-labelledby="pills-inactive-tab">
                            <div id="content_logs_dislike_inactive">
                                content_logs_dislike_inactive
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="logs_fav" role="tabpanel">
                    <div id="content_logs_fav">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div class="bg-success py-1 px-3 text-white rounded-pill">active</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div class="bg-danger py-1 px-3 text-white rounded-pill">cancle</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logs_share" role="tabpanel">
                    <div class="w-100">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn mx-1" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">all</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsFacebook" id="pills-facebook-tab" data-bs-toggle="pill" data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook" aria-selected="false"> <i class="fa-brands fa-facebook me-2"></i> Facebook</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsLine" id="pills-line-tab" data-bs-toggle="pill" data-bs-target="#pills-line" type="button" role="tab" aria-controls="pills-line" aria-selected="false">
                                    <i class="fa-brands fa-line me-2"></i>Line</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsTwitter" id="pills-x-tab" data-bs-toggle="pill" data-bs-target="#pills-x" type="button" role="tab" aria-controls="pills-x" aria-selected="false"><i class="fa-brands fa-x-twitter"></i> </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsWhatsapp" id="pills-whats_app-tab" data-bs-toggle="pill" data-bs-target="#pills-whats_app" type="button" role="tab" aria-controls="pills-whats_app" aria-selected="false"><i class="fa-brands fa-whatsapp me-2"></i> WhatsApp</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsCopy" id="pills-copy-tab" data-bs-toggle="pill" data-bs-target="#pills-copy" type="button" role="tab" aria-controls="pills-copy" aria-selected="false">Copy</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="content_logs_share_all">
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsLine active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-line me-2"></i> Line
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsFacebook active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-facebook me-2"></i> facebook
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsTwitter active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsWhatsapp active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-whatsapp me-2"></i>Whatsapp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab">facebook</div>
                            <div class="tab-pane fade" id="pills-line" role="tabpanel" aria-labelledby="pills-line-tab">line</div>
                            <div class="tab-pane fade" id="pills-x" role="tabpanel" aria-labelledby="pills-x-tab">x</div>
                            <div class="tab-pane fade" id="pills-whats_app" role="tabpanel" aria-labelledby="pills-whats_app-tab">whats_app</div>
                            <div class="tab-pane fade" id="pills-copy" role="tabpanel" aria-labelledby="pills-copy-tab">copy</div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logs_video" role="tabpanel">
                    <div id="content_logs_video">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div>2 นาที</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div>15 นาที</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="logs_download_pdf" role="tabpanel">
                    <div id="content_logs_fav">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div class="bg-success py-1 px-3 text-white rounded-pill">active</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div class="bg-danger py-1 px-3 text-white rounded-pill">cancle</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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

<div class="">

    <div class="row">
        <div class="col-6 mb-4">
            <h3 class="mt-3"><i class="fa-solid fa-newspaper"></i> LOG Content</h3>
        </div>
        <div class="col-6 mb-4">
            <div class="d-flex justify-content-end">
                <button id="btn_export_excel" type="button" class="btn btn-outline-secondary float-end mt-3 mx-2" onclick="exportExcel()">
                Export Excel
            </button>
            </div>
        </div>

        <hr>

        <div class="col-3">
            <label class="">DateTime Start</label>
            <input type="datetime-local" id="date_time_start" class="form-control" value="">
        </div>
        <div class="col-3">
            <label class="">DateTime End</label>
            <input type="datetime-local" id="date_time_end" class="form-control" value="">
        </div>
        <div class="col-3">
            <label class="">ค้นหา</label>
            <input type="text" style="width: 100%; max-width: 400px;" class="form-control" name="search_account" id="search_account" placeholder="ค้นหาด้วยชื่อหรือรหัสตัวแทน" value="" oninput="delay_search_data_in_card();">
        </div>
        <div class="col-2">
            <label class="">Content</label>
            <select id="" class="form-select" onchange="search_data_in_card();">
                <option selected="" value="">All Content</option>
                <option value="Super-admin">Super-admin</option>
            </select>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-info float-end mt-3 mx-2">
                ค้นหา
            </button>
        </div>
    </div>
    
    <!-- <div class="d-flex justify-content-end mt-3">
        <p class="text-danger">การ Export Excel จะทำการ Export ข้อมูลผู้ใช้จากชื่อหรือรหัสตัวแทนที่ค้นหาทั้งหมด (ไม่นับรวมการกรอง Active/Inactive/Social)</p>
    </div> -->
        
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
                            <div class="tab-title">PDF</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content pt-3" id="div_show_content_logs">
                <!-- logs_view -->
                <div class="tab-pane fade active show" id="logs_view" role="tabpanel">
                    <div id="content_logs_view">
                        <!-- content logs_view -->
                    </div>
                </div>
                <!-- logs_like -->
                <div class="tab-pane fade" id="logs_like" role="tabpanel">
                    <div id="content_logs_like">
                        <!-- content_logs_like -->
                    </div>
                </div>
                <!-- logs_rate -->
                <div class="tab-pane fade" id="logs_rate" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-info active" data-bs-toggle="pill" onclick="change_view_active_logs_rate('All')">
                                All
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success" data-bs-toggle="pill" onclick="change_view_active_logs_rate('Active')">
                                Active
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" data-bs-toggle="pill" onclick="change_view_active_logs_rate('Inactive')">
                                Inactive
                            </button>
                        </li>
                    </ul>
                    <div id="content_logs_rating">
                        <!-- content_logs_rating -->
                    </div>
                    <script>
                        function change_view_active_logs_rate(type) {
                            let list_log_rating = document.querySelectorAll('.list_log_rating');
                            list_log_rating.forEach(function(item) {
                                if (type === 'Active') {
                                    if (item.getAttribute('status') === 'Canceled') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'Inactive') {
                                    if (item.getAttribute('status') === 'Active') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'All') {
                                    item.classList.remove('d-none');
                                }
                            });
                        }
                    </script>
                </div>
                <!-- logs_dislike -->
                <div class="tab-pane fade" id="logs_dislike" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-info active" data-bs-toggle="pill" onclick="change_view_active_logs_dislike('All')">
                                All
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success" data-bs-toggle="pill" onclick="change_view_active_logs_dislike('Active')">
                                Active
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" data-bs-toggle="pill" onclick="change_view_active_logs_dislike('Inactive')">
                                Inactive
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                            <div id="content_logs_dislike">
                                <!-- content_logs_dislike -->
                            </div>
                        </div>
                        <script>
                            function change_view_active_logs_dislike(type) {
                                let list_log_dislike = document.querySelectorAll('.list_log_dislike');
                                list_log_dislike.forEach(function(item) {
                                    if (type === 'Active') {
                                        if (item.getAttribute('status') === 'Canceled') {
                                            item.classList.add('d-none');
                                        } else {
                                            item.classList.remove('d-none');
                                        }
                                    }
                                    else if (type === 'Inactive') {
                                        if (item.getAttribute('status') === 'Active') {
                                            item.classList.add('d-none');
                                        } else {
                                            item.classList.remove('d-none');
                                        }
                                    }
                                    else if (type === 'All') {
                                        item.classList.remove('d-none');
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                <!-- logs_fav -->
                <div class="tab-pane fade" id="logs_fav" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-info active" data-bs-toggle="pill" onclick="change_view_active_logs_fav('All')">
                                All
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success" data-bs-toggle="pill" onclick="change_view_active_logs_fav('Active')">
                                Active
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" data-bs-toggle="pill" onclick="change_view_active_logs_fav('Inactive')">
                                Inactive
                            </button>
                        </li>
                    </ul>
                    <div id="content_logs_favorites">
                        <!-- content_logs_favorites -->
                    </div>
                    <script>
                        function change_view_active_logs_fav(type) {
                            let list_log_fav = document.querySelectorAll('.list_log_fav');
                            list_log_fav.forEach(function(item) {
                                if (type === 'Active') {
                                    if (item.getAttribute('status') === 'Canceled') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'Inactive') {
                                    if (item.getAttribute('status') === 'Active') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'All') {
                                    item.classList.remove('d-none');
                                }
                            });
                        }
                    </script>
                </div>
                <!-- logs_share -->
                <div class="tab-pane fade" id="logs_share" role="tabpanel">
                    <div class="w-100">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn mx-1" data-bs-toggle="pill" onclick="change_view_active_logs_share('All');">
                                    All
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsFacebook" data-bs-toggle="pill" onclick="change_view_active_logs_share('facebook');">
                                    <i class="fa-brands fa-facebook me-2"></i> Facebook
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsLine" data-bs-toggle="pill" onclick="change_view_active_logs_share('line');">
                                    <i class="fa-brands fa-line me-2"></i> Line
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsTwitter" data-bs-toggle="pill" onclick="change_view_active_logs_share('twitte');">
                                    <i class="fa-brands fa-x-twitter"></i> 
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsWhatsapp" data-bs-toggle="pill" onclick="change_view_active_logs_share('whatsapp');">
                                    <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsCopy" data-bs-toggle="pill" onclick="change_view_active_logs_share('copy');">
                                    Copy
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="content_logs_share">
                                    <!-- content_logs_share -->
                                </div>
                            </div>
                            <script>
                                function change_view_active_logs_share(type) {
                                    let list_log_share = document.querySelectorAll('.list_log_share');
                                    list_log_share.forEach(function(item) {
                                        if (type === 'line') {
                                            if (item.getAttribute('social') !== 'line') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'facebook') {
                                            if (item.getAttribute('social') !== 'facebook') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'twitte') {
                                            if (item.getAttribute('social') !== 'twitte') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'whatsapp') {
                                            if (item.getAttribute('social') !== 'whatsapp') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'copy') {
                                            if (item.getAttribute('social') !== 'copy') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'All') {
                                            item.classList.remove('d-none');
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <!-- logs_video -->
                <div class="tab-pane fade" id="logs_video" role="tabpanel">
                    <div id="content_logs_video">
                        <!-- content_logs_video -->
                    </div>
                </div>
                <!-- logs_download_pdf -->
                <div class="tab-pane fade" id="logs_download_pdf" role="tabpanel">
                    <div id="content_logs_download_pdf">
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

    <div class="div_empty_data">
        <b class="text-danger">กรุณากรองข้อมูลที่ต้องการ</b>
    </div>
</div>


<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const dateTimeEnd = document.getElementById('date_time_end');
        const dateTimeStart = document.getElementById('date_time_start');
        
        // ตั้งค่าวันเวลาปัจจุบันเป็นค่าเริ่มต้นสำหรับ date_time_end (เวลาของประเทศไทย UTC+7)
        const now = new Date();
        const thailandOffset = 7 * 60 * 60 * 1000; // UTC+7 offset in milliseconds
        const thailandTime = new Date(now.getTime() + thailandOffset);
        const formattedThailandTime = thailandTime.toISOString().slice(0, 16);

        dateTimeEnd.value = formattedThailandTime;
        dateTimeEnd.max = formattedThailandTime;

        // ตั้งค่าวันที่ 5/7/2024 เป็นค่าเริ่มต้นสำหรับ date_time_start
        const startMinDate = new Date('2024-07-05T00:00');
        const formattedStartMinDate = new Date(startMinDate.getTime() + thailandOffset).toISOString().slice(0, 16);
        dateTimeStart.min = formattedStartMinDate;
        
        dateTimeStart.addEventListener('change', () => {
            const startDate = new Date(dateTimeStart.value);
            const endDate = new Date(dateTimeEnd.value);

            if (startDate > endDate) {
                alert('ไม่สามารถเลือกวันที่เกิน DateTime End ได้');
                dateTimeStart.value = dateTimeEnd.value;
            }
        });

        dateTimeEnd.addEventListener('change', () => {
            const endDate = new Date(dateTimeEnd.value);
            const now = new Date();
            const thailandNow = new Date(now.getTime() + thailandOffset);

            if (endDate > thailandNow) {
                alert('ไม่สามารถเลือกวันเวลาที่เกินวันเวลาปัจจุบันได้');
                dateTimeEnd.value = formattedThailandTime;
            }
            
            const startDate = new Date(dateTimeStart.value);
            if (startDate > endDate) {
                alert('DateTime Start ไม่สามารถเกิน DateTime End ได้');
                dateTimeEnd.value = dateTimeStart.value;
            }
        });
    });
</script>
@endsection
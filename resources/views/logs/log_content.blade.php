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
                <button id="btn_export_excel" type="button" class="btn btn-outline-secondary float-end mt-3 mx-2 d-none" onclick="exportExcel()">
                Export Excel
            </button>
            </div>
        </div>

        <div id="text_show_load" class="col-12 mt-2 mb-4">
            <h6 class="text-danger"><b>กำลังโหลด..</b></h6>
        </div>
        <hr>
    </div>

    <div class="row d-none">
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
            <input type="text" style="width: 100%; max-width: 400px;" class="form-control" name="search_account" id="search_account" placeholder="ค้นหาด้วยชื่อหรือรหัสตัวแทน" value="">
        </div>
        <div class="col-2">
            <label class="">Content</label>
            <select id="search_content" class="form-select">
                <option selected="" value="">All Content</option>
                <option value="trainings">หลักสูตร</option>
                <option value="appointments_train">ปฏิทินหลักสูตร</option>
                <option value="appointments_quiz">สนามสอบ</option>
                <option value="news">ข่าว</option>
                <option value="activitys">กิจกรรม</option>
                <option value="products">ผลิตภัณฑ์</option>
                <option value="career_path_contents">Career path</option>
            </select>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-info float-end mt-3 mx-2" onclick="check_search_data_in_card();">
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
                    <div id="content_logs_rating">
                        <!-- content_logs_rating -->
                    </div>
                </div>
                <!-- logs_dislike -->
                <div class="tab-pane fade" id="logs_dislike" role="tabpanel">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                            <div id="content_logs_dislike">
                                <!-- content_logs_dislike -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- logs_fav -->
                <div class="tab-pane fade" id="logs_fav" role="tabpanel">
                    <div id="content_logs_favorites">
                        <!-- content_logs_favorites -->
                    </div>
                </div>
                <!-- logs_share -->
                <div class="tab-pane fade" id="logs_share" role="tabpanel">
                    <div class="w-100">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="content_logs_share">
                                    <!-- content_logs_share -->
                                </div>
                            </div>
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
                    <div id="content_user_download_pdf">
                        <!-- content_logs_video -->
                    </div>
                </div>
            </div>
        </div>
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

        // dateTimeEnd.value = formattedThailandTime;
        dateTimeStart.max = formattedThailandTime;
        dateTimeEnd.max = formattedThailandTime;

        // ตั้งค่าวันที่ 5/7/2024 เป็นค่าเริ่มต้นสำหรับ date_time_start
        const startMinDate = new Date('2024-07-05T00:00');
        const formattedStartMinDate = new Date(startMinDate.getTime() + thailandOffset).toISOString().slice(0, 16);
        dateTimeStart.min = formattedStartMinDate;
        dateTimeEnd.min = formattedStartMinDate;
        
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

        // get_data_log_content();
    });

    document.addEventListener('DOMContentLoaded', async function () {
        await for_trainings();
        await for_appointments_train();
        await for_appointments_quiz();
        await for_news();
        await for_activitys();
        await for_career_path_contents();
        await for_products();
        await load_success();
    });

    async function for_trainings(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/trainings");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async function for_appointments_train(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/appointments_train");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async function for_appointments_quiz(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/appointments_quiz");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async function for_news(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/news");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async function for_activitys(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/activitys");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async function for_products(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/products");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    async function for_career_path_contents(){
        try {
            const response = await fetch("{{ url('/') }}/api/get_log_content/career_path_contents");
            const result = await response.json();
            console.log(result);

            if (result) {
                await user_view_create_html(result);
                await user_like_create_html(result);
                await log_rating_create_html(result);
                await user_dislike_create_html(result);
                await user_fav_create_html(result);
                await user_share_create_html(result);
                await log_video_create_html(result);
                await user_download_pdf_create_html(result);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }


    // async function get_data_log_content() {
    //     try {
    //         const response = await fetch("{{ url('/') }}/api/get_log_content");
    //         const result = await response.json();
    //         console.log(result);

    //         if (result) {
    //             await user_view_create_html(result);
    //             await user_like_create_html(result);
    //             await log_rating_create_html(result);
    //             await user_dislike_create_html(result);
    //             await user_fav_create_html(result);
    //             await user_share_create_html(result);
    //             await log_video_create_html(result);
    //             await user_download_pdf_create_html(result);
    //             await load_success();
    //         }
    //     } catch (error) {
    //         console.error('Error fetching data:', error);
    //     }
    // }

    function load_success(){
        setTimeout(function() {
            document.querySelector('#btn_export_excel').classList.remove('d-none');
            document.querySelector('#text_show_load').classList.add('d-none');
        }, 5000);
    }

    function user_view_create_html(result){
        return new Promise((resolve) => {
            // trainings 
            if(result.trainings){
                for (let i = 0; i < result.trainings.length; i++) {
                    let db_log_view = result.trainings[i].user_view;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_view = document.querySelector('#content_logs_view');
                        content_logs_view.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="trainings" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            หลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.trainings[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END trainings

            // appointments_train
            if(result.appointments_train){
                for (let i = 0; i < result.appointments_train.length; i++) {
                    let db_log_view = result.appointments_train[i].user_view;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_view = document.querySelector('#content_logs_view');
                        content_logs_view.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_train" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ปฏิทินหลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_train[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_train

            // appointments_quiz
            if(result.appointments_quiz){
                for (let i = 0; i < result.appointments_quiz.length; i++) {
                    let db_log_view = result.appointments_quiz[i].user_view;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_view = document.querySelector('#content_logs_view');
                        content_logs_view.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_quiz" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            สนามสอบ
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_quiz[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_quiz

            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].user_view;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_view = document.querySelector('#content_logs_view');
                        content_logs_view.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ข่าว
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.news[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].user_view;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_view = document.querySelector('#content_logs_view');
                        content_logs_view.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            กิจกรรม
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.activitys[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // products
            // if(result.products){
            //     for (let i = 0; i < result.products.length; i++) {
            //         let db_log_view = result.products[i].user_view;

            //         // แปลง JSON เป็นอาร์เรย์ JavaScript
            //         let logViewArray ;
            //         if(db_log_view){
            //             logViewArray = JSON.parse(db_log_view);
            //         }
            //         else{
            //             logViewArray = false ;
            //         }

            //         let content_logs_view = document.querySelector('#content_logs_view');
            //             content_logs_view.innerHTML = '';

            //         let html_heading ;

            //         if(logViewArray){
            //             for (let userId in logViewArray) {
            //                 fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
            //                 .then(response => response.json())
            //                 .then(user => {
            //                     // console.log(user);

            //                     if(user){
            //                         let roundCount = Object.keys(logViewArray[userId]).length;
            //                         // วนลูปเข้าไปยังรอบการดูของผู้ใช้
            //                         for (let roundId in logViewArray[userId]) {
            //                             let datetime = logViewArray[userId][roundId].datetime;
            //                             let html_item_of_user = `
            //                                 <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
            //                                     <div class="d-flex justify-content-start">
            //                                         <div class="mx-2">
            //                                             <b>ประเภท : </b>
            //                                             <span class="excel_type">
            //                                                 ผลิตภัณฑ์
            //                                             </span>
            //                                         </div>
            //                                         <div class="mx-2">
            //                                             <b>ชื่อเนื้อหา : </b>
            //                                             <span class="excel_name_content">
            //                                                 ${result.products[i].title}
            //                                             </span>
            //                                         </div>
            //                                         <div class="mx-2 ">
            //                                             <b>รหัสตัวแทน : </b>
            //                                             <span class="excel_account">
            //                                                 ${user.account}
            //                                             </span>
            //                                         </div>
            //                                         <div class="mx-2 ">
            //                                             <b>ชื่อ : </b>
            //                                             <span class="excel_name">
            //                                                 ${user.name}
            //                                             </span>
            //                                         </div>
            //                                         <div class="mx-2">
            //                                             <b>Datetime : </b>
            //                                             <span class="excel_datetime">
            //                                                 ${datetime}
            //                                             </span>
            //                                         </div>
            //                                     </div>
            //                                 </div>
            //                             `;
            //                             content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
            //                         }
            //                     }

            //                 });
            //             }
            //         }
            //     }
            // }
            // END products

            // career_path_contents
            if(result.career_path_contents){
                for (let i = 0; i < result.career_path_contents.length; i++) {
                    let db_log_view = result.career_path_contents[i].user_view;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_view = document.querySelector('#content_logs_view');
                        content_logs_view.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="career_path_contents" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            Career path
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.career_path_contents[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_view.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END career_path_contents
        resolve();
        });
    }

    function user_like_create_html(result){
        return new Promise((resolve) => {
            // trainings 
            if(result.trainings){
                for (let i = 0; i < result.trainings.length; i++) {
                    let db_log_view = result.trainings[i].user_like;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_like = document.querySelector('#content_logs_like');
                        content_logs_like.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let xxi = 0; xxi < logViewArray.length; xxi++) {
                            

                            fetch("{{ url('/') }}/api/get_user_for_log/" + logViewArray[xxi])
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    let html_item_of_user = `
                                        <div name_user="`+user.name+`" account="`+user.account+`" name_content="trainings" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                            <div class="d-flex justify-content-start">
                                                <div class="mx-2">
                                                    <b>ประเภท : </b>
                                                    <span class="excel_type">
                                                        หลักสูตร
                                                    </span>
                                                </div>
                                                <div class="mx-2">
                                                    <b>ชื่อเนื้อหา : </b>
                                                    <span class="excel_name_content">
                                                        ${result.trainings[i].title}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>รหัสตัวแทน : </b>
                                                    <span class="excel_account">
                                                        ${user.account}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>ชื่อ : </b>
                                                    <span class="excel_name">
                                                        ${user.name}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    content_logs_like.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    
                                }

                            });
                        }
                    }
                }
            }
            // END trainings

            // appointments_train
            if(result.appointments_train){
                for (let i = 0; i < result.appointments_train.length; i++) {
                    let db_log_view = result.appointments_train[i].user_like;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_like = document.querySelector('#content_logs_like');
                        content_logs_like.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let xxi = 0; xxi < logViewArray.length; xxi++) {
                            

                            fetch("{{ url('/') }}/api/get_user_for_log/" + logViewArray[xxi])
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    let html_item_of_user = `
                                        <div name_user="`+user.name+`" account="`+user.account+`" name_content="appointments_train" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                            <div class="d-flex justify-content-start">
                                                <div class="mx-2">
                                                    <b>ประเภท : </b>
                                                    <span class="excel_type">
                                                        ปฏิทินหลักสูตร
                                                    </span>
                                                </div>
                                                <div class="mx-2">
                                                    <b>ชื่อเนื้อหา : </b>
                                                    <span class="excel_name_content">
                                                        ${result.appointments_train[i].title}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>รหัสตัวแทน : </b>
                                                    <span class="excel_account">
                                                        ${user.account}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>ชื่อ : </b>
                                                    <span class="excel_name">
                                                        ${user.name}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    content_logs_like.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_train

            // appointments_quiz
            if(result.appointments_quiz){
                for (let i = 0; i < result.appointments_quiz.length; i++) {
                    let db_log_view = result.appointments_quiz[i].user_like;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_like = document.querySelector('#content_logs_like');
                        content_logs_like.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let xxi = 0; xxi < logViewArray.length; xxi++) {
                            

                            fetch("{{ url('/') }}/api/get_user_for_log/" + logViewArray[xxi])
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    let html_item_of_user = `
                                        <div name_user="`+user.name+`" account="`+user.account+`" name_content="appointments_quiz" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                            <div class="d-flex justify-content-start">
                                                <div class="mx-2">
                                                    <b>ประเภท : </b>
                                                    <span class="excel_type">
                                                        สนามสอบ
                                                    </span>
                                                </div>
                                                <div class="mx-2">
                                                    <b>ชื่อเนื้อหา : </b>
                                                    <span class="excel_name_content">
                                                        ${result.appointments_quiz[i].title}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>รหัสตัวแทน : </b>
                                                    <span class="excel_account">
                                                        ${user.account}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>ชื่อ : </b>
                                                    <span class="excel_name">
                                                        ${user.name}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    content_logs_like.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_quiz

            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].user_like;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_like = document.querySelector('#content_logs_like');
                        content_logs_like.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let xxi = 0; xxi < logViewArray.length; xxi++) {
                            

                            fetch("{{ url('/') }}/api/get_user_for_log/" + logViewArray[xxi])
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    let html_item_of_user = `
                                        <div name_user="`+user.name+`" account="`+user.account+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                            <div class="d-flex justify-content-start">
                                                <div class="mx-2">
                                                    <b>ประเภท : </b>
                                                    <span class="excel_type">
                                                        ข่าว
                                                    </span>
                                                </div>
                                                <div class="mx-2">
                                                    <b>ชื่อเนื้อหา : </b>
                                                    <span class="excel_name_content">
                                                        ${result.news[i].title}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>รหัสตัวแทน : </b>
                                                    <span class="excel_account">
                                                        ${user.account}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>ชื่อ : </b>
                                                    <span class="excel_name">
                                                        ${user.name}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    content_logs_like.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].user_like;
                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_like = document.querySelector('#content_logs_like');
                        content_logs_like.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let xxi = 0; xxi < logViewArray.length; xxi++) {
                            

                            fetch("{{ url('/') }}/api/get_user_for_log/" + logViewArray[xxi])
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    let html_item_of_user = `
                                        <div name_user="`+user.name+`" account="`+user.account+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                            <div class="d-flex justify-content-start">
                                                <div class="mx-2">
                                                    <b>ประเภท : </b>
                                                    <span class="excel_type">
                                                        กิจกรรม
                                                    </span>
                                                </div>
                                                <div class="mx-2">
                                                    <b>ชื่อเนื้อหา : </b>
                                                    <span class="excel_name_content">
                                                        ${result.activitys[i].title}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>รหัสตัวแทน : </b>
                                                    <span class="excel_account">
                                                        ${user.account}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>ชื่อ : </b>
                                                    <span class="excel_name">
                                                        ${user.name}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    content_logs_like.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // products
            if(result.products){
                for (let i = 0; i < result.products.length; i++) {
                    let db_log_view = result.products[i].user_like;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_like = document.querySelector('#content_logs_like');
                        content_logs_like.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let xxi = 0; xxi < logViewArray.length; xxi++) {
                            

                            fetch("{{ url('/') }}/api/get_user_for_log/" + logViewArray[xxi])
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    let html_item_of_user = `
                                        <div name_user="`+user.name+`" account="`+user.account+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                            <div class="d-flex justify-content-start">
                                                <div class="mx-2">
                                                    <b>ประเภท : </b>
                                                    <span class="excel_type">
                                                        ผลิตภัณฑ์
                                                    </span>
                                                </div>
                                                <div class="mx-2">
                                                    <b>ชื่อเนื้อหา : </b>
                                                    <span class="excel_name_content">
                                                        ${result.products[i].title}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>รหัสตัวแทน : </b>
                                                    <span class="excel_account">
                                                        ${user.account}
                                                    </span>
                                                </div>
                                                <div class="mx-2 ">
                                                    <b>ชื่อ : </b>
                                                    <span class="excel_name">
                                                        ${user.name}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    `;
                                    content_logs_like.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    
                                }

                            });
                        }
                    }
                }
            }
            // END products
        resolve();
        });
    }

    function log_rating_create_html(result){
        return new Promise((resolve) => {
            // trainings 
            if(result.trainings){
                for (let i = 0; i < result.trainings.length; i++) {
                    let db_log_view = result.trainings[i].log_rating;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_rating = document.querySelector('#content_logs_rating');
                        content_logs_rating.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let rating = logViewArray[userId][roundId].rating;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="trainings" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            หลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.trainings[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Rating : </b>
                                                        <span class="excel_rating">
                                                            ${rating}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_rating.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END trainings

            // appointments_train
            if(result.appointments_train){
                for (let i = 0; i < result.appointments_train.length; i++) {
                    let db_log_view = result.appointments_train[i].log_rating;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_rating = document.querySelector('#content_logs_rating');
                        content_logs_rating.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let rating = logViewArray[userId][roundId].rating;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_train" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ปฏิทินหลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_train[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Rating : </b>
                                                        <span class="excel_rating">
                                                            ${rating}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_rating.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_train

            // appointments_quiz
            if(result.appointments_quiz){
                for (let i = 0; i < result.appointments_quiz.length; i++) {
                    let db_log_view = result.appointments_quiz[i].log_rating;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_rating = document.querySelector('#content_logs_rating');
                        content_logs_rating.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let rating = logViewArray[userId][roundId].rating;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_quiz" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            สนามสอบ
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_quiz[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Rating : </b>
                                                        <span class="excel_rating">
                                                            ${rating}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_rating.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_quiz

            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].log_rating;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_rating = document.querySelector('#content_logs_rating');
                        content_logs_rating.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let rating = logViewArray[userId][roundId].rating;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ข่าว
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.news[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Rating : </b>
                                                        <span class="excel_rating">
                                                            ${rating}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_rating.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].log_rating;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_rating = document.querySelector('#content_logs_rating');
                        content_logs_rating.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let rating = logViewArray[userId][roundId].rating;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            กิจกรรม
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.activitys[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Rating : </b>
                                                        <span class="excel_rating">
                                                            ${rating}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_rating.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // products
            if(result.products){
                for (let i = 0; i < result.products.length; i++) {
                    let db_log_view = result.products[i].log_rating;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_rating = document.querySelector('#content_logs_rating');
                        content_logs_rating.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let rating = logViewArray[userId][roundId].rating;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ผลิตภัณฑ์
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.products[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Rating : </b>
                                                        <span class="excel_rating">
                                                            ${rating}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_rating.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END products
        resolve();
        });
    }

    function user_dislike_create_html(result){
        return new Promise((resolve) => {
            // trainings 
            if(result.trainings){
                for (let i = 0; i < result.trainings.length; i++) {
                    let db_log_view = result.trainings[i].user_dislike;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_dislike = document.querySelector('#content_logs_dislike');
                        content_logs_dislike.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let reasons = logViewArray[userId][roundId].reasons;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="trainings" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            หลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.trainings[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Reasons : </b>
                                                        <span class="excel_reasons">
                                                            ${reasons}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_dislike.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END trainings

            // appointments_train
            if(result.appointments_train){
                for (let i = 0; i < result.appointments_train.length; i++) {
                    let db_log_view = result.appointments_train[i].user_dislike;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_dislike = document.querySelector('#content_logs_dislike');
                        content_logs_dislike.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let reasons = logViewArray[userId][roundId].reasons;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_train" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ปฏิทินหลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_train[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Reasons : </b>
                                                        <span class="excel_reasons">
                                                            ${reasons}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_dislike.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_train

            // appointments_quiz
            if(result.appointments_quiz){
                for (let i = 0; i < result.appointments_quiz.length; i++) {
                    let db_log_view = result.appointments_quiz[i].user_dislike;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_dislike = document.querySelector('#content_logs_dislike');
                        content_logs_dislike.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let reasons = logViewArray[userId][roundId].reasons;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_quiz" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            สนามสอบ
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_quiz[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Reasons : </b>
                                                        <span class="excel_reasons">
                                                            ${reasons}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_dislike.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_quiz

            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].user_dislike;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_dislike = document.querySelector('#content_logs_dislike');
                        content_logs_dislike.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let reasons = logViewArray[userId][roundId].reasons;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ข่าว
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.news[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Reasons : </b>
                                                        <span class="excel_reasons">
                                                            ${reasons}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_dislike.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].user_dislike;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_dislike = document.querySelector('#content_logs_dislike');
                        content_logs_dislike.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let reasons = logViewArray[userId][roundId].reasons;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            กิจกรรม
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.activitys[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Reasons : </b>
                                                        <span class="excel_reasons">
                                                            ${reasons}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_dislike.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // products
            if(result.products){
                for (let i = 0; i < result.products.length; i++) {
                    let db_log_view = result.products[i].user_dislike;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_dislike = document.querySelector('#content_logs_dislike');
                        content_logs_dislike.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let reasons = logViewArray[userId][roundId].reasons;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ผลิตภัณฑ์
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.products[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Reasons : </b>
                                                        <span class="excel_reasons">
                                                            ${reasons}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_dislike.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END products
        resolve();
        });
    }

    function user_fav_create_html(result){
        return new Promise((resolve) => {
            // trainings 
            if(result.trainings){
                for (let i = 0; i < result.trainings.length; i++) {
                    let db_log_view = result.trainings[i].user_fav;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_favorites = document.querySelector('#content_logs_favorites');
                        content_logs_favorites.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="trainings" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            หลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.trainings[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_favorites.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END trainings

            // appointments_train
            if(result.appointments_train){
                for (let i = 0; i < result.appointments_train.length; i++) {
                    let db_log_view = result.appointments_train[i].user_fav;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_favorites = document.querySelector('#content_logs_favorites');
                        content_logs_favorites.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_train" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ปฏิทินหลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_train[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_favorites.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_train

            // appointments_quiz
            if(result.appointments_quiz){
                for (let i = 0; i < result.appointments_quiz.length; i++) {
                    let db_log_view = result.appointments_quiz[i].user_fav;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_favorites = document.querySelector('#content_logs_favorites');
                        content_logs_favorites.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_quiz" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            สนามสอบ
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_quiz[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_favorites.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_quiz

            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].user_fav;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_favorites = document.querySelector('#content_logs_favorites');
                        content_logs_favorites.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ข่าว
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.news[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_favorites.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].user_fav;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_favorites = document.querySelector('#content_logs_favorites');
                        content_logs_favorites.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            กิจกรรม
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.activitys[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_favorites.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // products
            if(result.products){
                for (let i = 0; i < result.products.length; i++) {
                    let db_log_view = result.products[i].user_fav;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_favorites = document.querySelector('#content_logs_favorites');
                        content_logs_favorites.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let status = logViewArray[userId][roundId].status;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ผลิตภัณฑ์
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.products[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Status : </b>
                                                        <span class="excel_status">
                                                            ${status}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_favorites.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END products
        resolve();
        });
    }

    function user_share_create_html(result){
        return new Promise((resolve) => {
            // trainings 
            if(result.trainings){
                for (let i = 0; i < result.trainings.length; i++) {
                    let db_log_view = result.trainings[i].user_share;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_share = document.querySelector('#content_logs_share');
                        content_logs_share.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let social = logViewArray[userId][roundId].social;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="trainings" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            หลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.trainings[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Social : </b>
                                                        <span class="excel_social">
                                                            ${social}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_share.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END trainings

            // appointments_train
            if(result.appointments_train){
                for (let i = 0; i < result.appointments_train.length; i++) {
                    let db_log_view = result.appointments_train[i].user_share;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_share = document.querySelector('#content_logs_share');
                        content_logs_share.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let social = logViewArray[userId][roundId].social;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_train" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ปฏิทินหลักสูตร
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_train[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Social : </b>
                                                        <span class="excel_social">
                                                            ${social}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_share.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_train

            // appointments_quiz
            if(result.appointments_quiz){
                for (let i = 0; i < result.appointments_quiz.length; i++) {
                    let db_log_view = result.appointments_quiz[i].user_share;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_share = document.querySelector('#content_logs_share');
                        content_logs_share.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let social = logViewArray[userId][roundId].social;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="appointments_quiz" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            สนามสอบ
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.appointments_quiz[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Social : </b>
                                                        <span class="excel_social">
                                                            ${social}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_share.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END appointments_quiz

            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].user_share;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_share = document.querySelector('#content_logs_share');
                        content_logs_share.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let social = logViewArray[userId][roundId].social;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ข่าว
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.news[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Social : </b>
                                                        <span class="excel_social">
                                                            ${social}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_share.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].user_share;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_share = document.querySelector('#content_logs_share');
                        content_logs_share.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let social = logViewArray[userId][roundId].social;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            กิจกรรม
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.activitys[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Social : </b>
                                                        <span class="excel_social">
                                                            ${social}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_share.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // products
            if(result.products){
                for (let i = 0; i < result.products.length; i++) {
                    let db_log_view = result.products[i].user_share;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_share = document.querySelector('#content_logs_share');
                        content_logs_share.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let social = logViewArray[userId][roundId].social;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ผลิตภัณฑ์
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.products[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Social : </b>
                                                        <span class="excel_social">
                                                            ${social}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_share.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END products
        resolve();
        });
    }

    function log_video_create_html(result){
        return new Promise((resolve) => {
            // news
            if(result.news){
                for (let i = 0; i < result.news.length; i++) {
                    let db_log_view = result.news[i].log_video;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_video = document.querySelector('#content_logs_video');
                        content_logs_video.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let countTime = logViewArray[userId][roundId].countTime;
                                        let hours = Math.floor(countTime / 3600);
                                        let minutes = Math.floor((countTime % 3600) / 60);
                                        let seconds = Math.floor(countTime % 60);

                                        let formattedDuration = "";
                                        if (hours > 0) {
                                            formattedDuration += hours + " ชั่วโมง ";
                                        }
                                        if (minutes > 0) {
                                            formattedDuration += minutes + " นาที ";
                                        }
                                        if (seconds > 0 || (hours === 0 && minutes === 0)) {
                                            // เพื่อให้แสดงวินาทีเสมอถ้าไม่มีชั่วโมงและนาที
                                            formattedDuration += seconds + " วินาที";
                                        }
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="news" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ข่าว
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.news[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Count Time : </b>
                                                        <span class="excel_countTime">
                                                            ${formattedDuration}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_video.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END news

            // activitys
            if(result.activitys){
                for (let i = 0; i < result.activitys.length; i++) {
                    let db_log_view = result.activitys[i].log_video;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_video = document.querySelector('#content_logs_video');
                        content_logs_video.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let countTime = logViewArray[userId][roundId].countTime;
                                        let hours = Math.floor(countTime / 3600);
                                        let minutes = Math.floor((countTime % 3600) / 60);
                                        let seconds = Math.floor(countTime % 60);

                                        let formattedDuration = "";
                                        if (hours > 0) {
                                            formattedDuration += hours + " ชั่วโมง ";
                                        }
                                        if (minutes > 0) {
                                            formattedDuration += minutes + " นาที ";
                                        }
                                        if (seconds > 0 || (hours === 0 && minutes === 0)) {
                                            // เพื่อให้แสดงวินาทีเสมอถ้าไม่มีชั่วโมงและนาที
                                            formattedDuration += seconds + " วินาที";
                                        }
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="activitys" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            กิจกรรม
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.activitys[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Count Time : </b>
                                                        <span class="excel_countTime">
                                                            ${formattedDuration}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_video.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END activitys

            // career_path_contents
            if(result.career_path_contents){
                for (let i = 0; i < result.career_path_contents.length; i++) {
                    let db_log_view = result.career_path_contents[i].log_video;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_logs_video = document.querySelector('#content_logs_video');
                        content_logs_video.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let countTime = logViewArray[userId][roundId].countTime;
                                        let hours = Math.floor(countTime / 3600);
                                        let minutes = Math.floor((countTime % 3600) / 60);
                                        let seconds = Math.floor(countTime % 60);

                                        let formattedDuration = "";
                                        if (hours > 0) {
                                            formattedDuration += hours + " ชั่วโมง ";
                                        }
                                        if (minutes > 0) {
                                            formattedDuration += minutes + " นาที ";
                                        }
                                        if (seconds > 0 || (hours === 0 && minutes === 0)) {
                                            // เพื่อให้แสดงวินาทีเสมอถ้าไม่มีชั่วโมงและนาที
                                            formattedDuration += seconds + " วินาที";
                                        }
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="career_path_contents" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            Career path
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.career_path_contents[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Count Time : </b>
                                                        <span class="excel_countTime">
                                                            ${formattedDuration}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_logs_video.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END career_path_contents
        resolve();
        });
    }

    function user_download_pdf_create_html(result){
        return new Promise((resolve) => {
            // products
            if(result.products){
                for (let i = 0; i < result.products.length; i++) {
                    let db_log_view = result.products[i].user_download_pdf;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_user_download_pdf = document.querySelector('#content_user_download_pdf');
                        content_user_download_pdf.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="products" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            ผลิตภัณฑ์
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.products[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_user_download_pdf.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END products

            // career_path_contents
            if(result.career_path_contents){
                for (let i = 0; i < result.career_path_contents.length; i++) {
                    let db_log_view = result.career_path_contents[i].user_download_pdf;

                    // แปลง JSON เป็นอาร์เรย์ JavaScript
                    let logViewArray ;
                    if(db_log_view){
                        logViewArray = JSON.parse(db_log_view);
                    }
                    else{
                        logViewArray = false ;
                    }

                    let content_user_download_pdf = document.querySelector('#content_user_download_pdf');
                        content_user_download_pdf.innerHTML = '';

                    let html_heading ;

                    if(logViewArray){
                        for (let userId in logViewArray) {
                            fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                            .then(response => response.json())
                            .then(user => {
                                // console.log(user);

                                if(user){
                                    let roundCount = Object.keys(logViewArray[userId]).length;
                                    // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                    for (let roundId in logViewArray[userId]) {
                                        let datetime = logViewArray[userId][roundId].datetime;
                                        let html_item_of_user = `
                                            <div name_user="`+user.name+`" account="`+user.account+`" datetime="`+datetime+`" name_content="career_path_contents" class="card w-100 shadow-sm border-1 border p-3 mt-2">
                                                <div class="d-flex justify-content-start">
                                                    <div class="mx-2">
                                                        <b>ประเภท : </b>
                                                        <span class="excel_type">
                                                            Career path
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>ชื่อเนื้อหา : </b>
                                                        <span class="excel_name_content">
                                                            ${result.career_path_contents[i].title}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>รหัสตัวแทน : </b>
                                                        <span class="excel_account">
                                                            ${user.account}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2 ">
                                                        <b>ชื่อ : </b>
                                                        <span class="excel_name">
                                                            ${user.name}
                                                        </span>
                                                    </div>
                                                    <div class="mx-2">
                                                        <b>Datetime : </b>
                                                        <span class="excel_datetime">
                                                            ${datetime}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                                        content_user_download_pdf.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด
                                    }
                                }

                            });
                        }
                    }
                }
            }
            // END career_path_contents
        resolve();
        });
    }


    // ---------- กดค้นหา ---------- //
    function check_search_data_in_card() {

        const dateTimeStart = document.getElementById('date_time_start').value;
        const dateTimeEnd = document.getElementById('date_time_end').value;
        const searchAccount = document.getElementById('search_account').value;
        const searchContent = document.getElementById('search_content').value;

        if (!dateTimeStart || !dateTimeEnd) {
            alert('กรุณาเลือกวันที่');
        }
        else {
            search_data_in_card(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        }

    }

    async function search_data_in_card(dateTimeStart, dateTimeEnd, searchAccount, searchContent){

        console.log('DateTime Start:', dateTimeStart);
        console.log('DateTime End:', dateTimeEnd);
        console.log('Search Account:', searchAccount);
        console.log('Search Content:', searchContent);

        await get_log_view(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_log_like(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_log_rating(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_logs_dislike(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_logs_fav(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_logs_share(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_logs_video(dateTimeStart, dateTimeEnd, searchAccount, searchContent);
        await get_logs_pdf(dateTimeStart, dateTimeEnd, searchAccount, searchContent);

    }

    function get_log_view(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_log_view");
            }, 2000);
            resolve();
        });
    }

    function get_log_like(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_log_like");
            }, 2000);
            resolve();
        });
    }

    function get_log_rating(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_log_rating");
            }, 2000);
            resolve();
        });
    }

    function get_logs_dislike(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_logs_dislike");
            }, 2000);
            resolve();
        });
    }

    function get_logs_fav(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_logs_fav");
            }, 2000);
            resolve();
        });
    }

    function get_logs_share(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_logs_share");
            }, 2000);
            resolve();
        });
    }

    function get_logs_video(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_logs_video");
            }, 2000);
            resolve();
        });
    }

    function get_logs_pdf(dateTimeStart, dateTimeEnd, searchAccount, searchContent){
        return new Promise((resolve) => {
            setTimeout(function() {
                console.log("get_logs_pdf");
            }, 2000);
            resolve();
        });
    }

</script>
@endsection
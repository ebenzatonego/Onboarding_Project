@extends('layouts.theme_admin')

@section('content')

<style>

    .loading-container {
        display: flex;
    }

    .loading-spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #000;
        animation: spin 1s linear infinite;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }


    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes drawCheck {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #29cc39;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #ffffff;
        animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 60px #fff
        }
    }

    .radius-20 {
        border-radius: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    tr td {
        vertical-align: middle;
        padding: 10px; /* Optional: เพิ่มการเว้นวรรคในเซลล์ */
    }
</style>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-6">
                <h4 class="mb-0 text-uppercase">
                    เพิ่มข้อมูลสมาชิก
                </h4>
            </div>
            <div class="col-6 text-end">
                <span>อัพเดทล่าสุด : <span id="last_update"></span></span>
            </div>
            <div class="col-12 row mt-3 text-center">
                <div class="col">
                    <b>Admin : <span id="count_admin"></span></b>
                </div>
                <div class="col">
                    <b>Member : <span id="count_user"></span></b>
                </div>
                <div class="col">
                    <b>Upper Al : <span id="count_upper_al"></span></b>
                </div>
                <div class="col">
                    <b>Group Manager : <span id="count_group_manager"></span></b>
                </div>
                <div class="col">
                    <b>Area Supervisor : <span id="count_area_supervisor"></span></b>
                </div>
            </div>
        </div>
        
        <hr class="mt-3 mb-3">

        <ul class="nav nav-tabs nav-primary" role="tablist">
            <li class="nav-item" role="presentation" onclick="clear_div_succell();">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryExcel" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class="fa-solid fa-file-excel font-18 me-1"></i>
                        </div>
                        <div class="tab-title">Excel</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation" onclick="clear_div_succell();">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryLogUpFile" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class="fa-solid fa-file-circle-info font-18 me-1"></i>
                        </div>
                        <div class="tab-title">LOG</div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="primaryExcel" role="tabpanel">

                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-body p-5">
                        <div class="card-title text-center">
                            <i class="fa-solid fa-file-excel text-success font-50"></i>
                            <h5 class="mb-5 mt-2 text-success">เพิ่มข้อมูลสมาชิก</h5>
                        </div>
                        <hr>
                        <div class="col-12">
                            <label for="inputLastEnterUsername" class="form-label">Excel file</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-file-excel"></i>
                                </span>
                                <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls" onclick="clear_div_succell();">
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-2">
                            <button class="btn btn-primary px-5" onclick="readExcel()">
                                Read Excel
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="primaryLogUpFile" role="tabpanel">

                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body p-5">
                        <div class="col-12">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>วันที่ / เวลา</th>
                                                <th>เจ้าหน้าที่</th>
                                                <th>ชื่อไฟล์</th>
                                                <th>ไฟล์</th>
                                            </tr>
                                        </thead>
                                        <tbody id="content_tbody" class="">
                                            <!-- content_tbody -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr>
            <div id="div_loader_Excel" class="d-none" style="position: relative;">
                @include ('hamster_loading')
            </div>
            <div  class="loading-container" class="col-12 mt-5">
                <div id="div_success_Excel" class="contrainerCheckmark d-none">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                    <center>
                        <h5 class="mt-3">เสร็จสิ้น</h5>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_last_update_users();
        get_log_excel_users();
    });

    function get_last_update_users(){
        // console.log(type_get_data);

        fetch("{{ url('/') }}/api/get_last_update_users")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                setTimeout(() => {
                    if(result){
                        // ตัวอย่างข้อมูลจาก PHP
                        const phpDateString = result['last_update'];

                        // สร้างวัตถุ Date จากข้อมูลที่ได้จาก PHP
                        const phpDate = new Date(phpDateString);

                        // สร้าง Options สำหรับการจัดรูปแบบ
                        const options = { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric' };

                        // ใช้ toLocaleString() เพื่อแปลงวันที่
                        const formattedDate = phpDate.toLocaleString('en-UK', options);

                        // console.log(formattedDate);

                        document.querySelector('#count_admin').innerHTML = result.count_admin.toLocaleString();
                        document.querySelector('#count_user').innerHTML = result.count_user.toLocaleString();
                        document.querySelector('#count_upper_al').innerHTML = result.count_upper_al.toLocaleString();
                        document.querySelector('#count_group_manager').innerHTML = result.count_group_manager.toLocaleString();
                        document.querySelector('#count_area_supervisor').innerHTML = result.count_area_supervisor.toLocaleString();
                        document.querySelector('#last_update').innerHTML = formattedDate ;
                        

                    }
                }, 500);

            });
    }

    // EXCEL
    function readExcel() {

        document.querySelector('#div_loader_Excel').classList.remove('d-none');

        let input = document.getElementById('excelInput');
        let file = input.files[0];

        if (file) {

            setInterval(function() {
               const pointLoading = document.querySelector('#point_loading');
               pointLoading.classList.toggle('d-none');
            }, 400);

            let reader = new FileReader();

            reader.onload = function(e) {
                let data = e.target.result;
                let workbook = XLSX.read(data, { type: 'binary' });

                // console.log(workbook.SheetNames);
                let sheetName ;
                let sheet ;

                for (let i = 0; i < workbook.SheetNames.length; i++) {
                    // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                    sheetName = workbook.SheetNames[i];
                    // console.log(sheetName);
                    sheet = workbook.Sheets[sheetName];

                    create_user(sheet , sheetName);
                    
                }

            };

            reader.readAsBinaryString(file);

        } else {
            document.querySelector('#div_loader_Excel').classList.add('d-none');
            alert('กรุณาเลือกไฟล์ Excel');
        }
    }

    // เคลียไฟล์ออกจาก input หลัง reader เรียบร้อย
    function clearFileInput(type){
        let input = document.getElementById(type+'Input');
        
        // กำหนดค่า input ให้เป็น null หรือเปลี่ยนเป็นไฟล์ว่าง
        input.value = null; // หรือ input.value = '';

    }

    function clear_div_succell(){
        // console.log('clear_div_succell');
        document.querySelector('#div_success_Excel').classList.add('d-none');
    }

    function create_user(sheet , sheetName){

        // แปลงข้อมูลในชีทเป็น JSON
        let jsonData = XLSX.utils.sheet_to_json(sheet);

        // ตรวจสอบข้อมูลในคอนโซล
        // console.log(jsonData);
        
        let link_api ;
        if(sheetName == "Member"){
            link_api = "{{ url('/') }}/api/create_user_member/excel";
        }
        else if(sheetName == "Upper AL"){
            link_api = "{{ url('/') }}/api/create_user_upper_al/excel";
        }
        else if(sheetName == "Group Manager"){
            link_api = "{{ url('/') }}/api/create_user_group_manager/excel";
        }
        else if(sheetName == "Area Supervisor"){
            link_api = "{{ url('/') }}/api/create_user_area_supervisor/excel";
        }

        // create_user member
        fetch(link_api, {
            method: 'post',
            body: JSON.stringify(jsonData),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);

            if(sheetName == "Area Supervisor" && data == "success"){

                // สร้าง log_excel_users
                upload_to_firebase();
                // เคลียร์ input
                clearFileInput('excel');

                document.querySelector('#div_loader_Excel').classList.add('d-none');
                document.querySelector('#text_load').innerHTML = '';
                document.querySelector('#div_success_Excel').classList.remove('d-none');
            }

        }).catch(function(error){
            // console.error(error);
        });
    }

    function upload_to_firebase() {

        let fileInput = document.getElementById('excelInput');
        let file = fileInput.files[0];
        let fileName = file.name;

        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);

        let name_file = Date_for_firebase + '-' + fileName ;
        let storageRef = storage.ref('/Excel/create_users/' + name_file);

        let data_arr = [];

        let uploadTask = storageRef.put(file);

        uploadTask.on('state_changed', 
            function(snapshot){
                // ติดตามความคืบหน้าของการอัพโหลด (optional)
            }, 
            function(error) {
                // กรณีเกิดข้อผิดพลาดในการอัพโหลด
                console.error('Upload failed:', error);
            }, 
            function() {
                // เมื่ออัพโหลดสำเร็จ
                uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                    // ทำอะไรกับ URL ที่ได้รับเช่นการแสดงผลหรือบันทึกลงฐานข้อมูล
                    // console.log('File available at', downloadURL);
                    data_arr = {
                        "name_file" : name_file,
                        "user_id" : "{{ Auth::user()->id }}",
                        "link_file" : downloadURL,
                    }; 

                    fetch("{{ url('/') }}/api/create_log_excel_users", {
                        method: 'post',
                        body: JSON.stringify(data_arr),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function (response){
                        return response.text();
                    }).then(function(data){
                        // console.log(data);
                    }).catch(function(error){
                        // console.error(error);
                    });

                });
            }
        );
    }

    function get_log_excel_users(){

        fetch("{{ url('/') }}/api/get_log_excel_users")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let content_tbody = document.querySelector('#content_tbody');
                    content_tbody.innerHTML = '' ;

                for (let i = 0; i < result.length; i++) {

                    let datetime = result[i].created_at;
                    // แยกวันที่และเวลา
                    let [date, time] = datetime.split(' ');
                    // แยกส่วนของวันที่
                    let [year, month, day] = date.split('-');
                    // แปลงรูปแบบวันที่เป็น วัน/เดือน/ปี
                    let formattedDate = `${day}/${month}/${year}`;
                    // แยกส่วนของเวลา (เฉพาะ HH:MM:SS)
                    let [hour, minute, second] = time.split('.')[0].split(':');
                    let formattedTime = `${hour}:${minute}`;

                    let time_create = formattedDate+` `+formattedTime+` น.` ;

                    let name_file ;
                    if(result[i].name_file){
                        name_file = result[i].name_file.split('-')[3];
                    }

                    let html = `
                        <tr>
                            <td>`+time_create+`</td>
                            <td>`+result[i].name_user+`</td>
                            <td>`+name_file+`</td>
                            <td>
                                <a href="`+result[i].link_file+`" class="btn btn-sm btn-info" download="">
                                    Download
                                </a>
                            </td>
                        </tr>
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }
        });
    }

</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
@endsection

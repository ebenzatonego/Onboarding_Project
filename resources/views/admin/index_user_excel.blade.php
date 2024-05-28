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
                <b>สมาชิกทั้งหมด : <span id="count_user"></span></b>
                <br>
                อัพเดทล่าสุด : <span id="last_update"></span>
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
            <li class="nav-item d-none" role="presentation" onclick="clear_div_succell();">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryADDuser" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon">
                            <i class="fa-solid fa-plus font-18 me-1"></i>
                        </div>
                        <div class="tab-title">เพิ่มข้อมูลรายบุคคล</div>
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
            <div class="tab-pane fade" id="primaryADDuser" role="tabpanel">

                <div class="card border-top border-0 border-4 border-dark">
                    <div class="card-body p-5">
                        <div class="col-12">
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">User Registration</h5>
                                </div>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label for="account" class="form-label">Account</label>
                                        <input type="text" class="form-control" name="account" id="account" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" onchange="check_data_Registration();">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="form-select" onchange="check_data_Registration();">
                                            <option selected value="AL">AL</option>
                                            <option value="Super-admin">Super-admin</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                            <option value="QR">QR</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button id="btn_Registration" class="btn btn-primary px-5" disabled onclick="Registration_user();">
                                            ยืนยัน
                                        </button>
                                    </div>
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

                        document.querySelector('#count_user').innerHTML = result.count ;
                        document.querySelector('#last_update').innerHTML = formattedDate ;
                        

                    }
                }, 500);

            });
    }

    function check_data_Registration(){

        let account = document.querySelector('#account').value ;
        let password = document.querySelector('#password').value ;
        let name = document.querySelector('#name').value ;
        let phone = document.querySelector('#phone').value ;
        let email = document.querySelector('#email').value ;
        let role = document.querySelector('#role').value ;

        // console.log(account);
        // console.log(password);
        // console.log(name);
        // console.log(phone);
        // console.log(email);
        // console.log(role);

        // ใช้ ternary operator และ every() เพื่อตรวจสอบทุกตัวแปร
        let allFieldsFilled = [account, password, name, phone, email, role].every(field => field !== '');

        // ตรวจสอบค่า allFieldsFilled
        if (allFieldsFilled) {
            document.querySelector('#btn_Registration').disabled = false ;
        }else{
            document.querySelector('#btn_Registration').disabled = true ;
        }

    }

    function Registration_user(){

        // console.log('Registration_user');
        document.querySelector('#btn_Registration').disabled = true ;

        let account = document.querySelector('#account').value ;
        let password = document.querySelector('#password').value ;
        let name = document.querySelector('#name').value ;
        let phone = document.querySelector('#phone').value ;
        let email = document.querySelector('#email').value ;
        let role = document.querySelector('#role').value ;

        let jsonData = [] ;
            jsonData = {
                    "account" : account,
                    "password" : password,
                    "name" : name,
                    "phone" : phone,
                    "email" : email,
                    "role" : role,
                };

        // create_user
        fetch("{{ url('/') }}/api/Registration_user", {
            method: 'post',
            body: JSON.stringify(jsonData),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);

            if(data == "success"){
                // เคลียร์ input
                document.querySelector('#account').value = '' ;
                document.querySelector('#password').value = '' ;
                document.querySelector('#name').value = '' ;
                document.querySelector('#phone').value = '' ;
                document.querySelector('#email').value = '' ;

                document.querySelector('#text_load').innerHTML = 'กำลังสร้าง QR-Code..';

                fetch("{{ url('/') }}/api/qr_profile/")
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);

                        if(result){
                            document.querySelector('#div_loader_Excel').classList.add('d-none');
                            document.querySelector('#text_load').innerHTML = 'กำลังประมวลผล..';
                            document.querySelector('#div_success_Excel').classList.remove('d-none');

                        }
                });
                
            }

        }).catch(function(error){
            // console.error(error);
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

</script>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
@endsection

@extends('layouts.theme_admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .phone-frame {
        min-width: 375px;
        min-height: 783px;
        max-width: 375px;
        max-height: 783px;
        border-radius: 40px;
        border: 8px #000 solid;
        overflow: hidden;
        position: -webkit-sticky;
        position: sticky;
        top: 70px;
    }

    .frame-top {
        display: flex;
        background-color: #cbcbcb;
        border-radius: 32px 32px 0 0;
    }

    .phone-camera {
        background-color: #000;
        border-radius: 0 0 15px 15px;
        width: 100%;
        height: 30px;
        position: relative;
        display: block;
    }

    .time {
        font-size: 16px;
    }

    .phone-website {
        width: 100%;
        padding: 10px;
        background-color: #cbcbcb;

    }

    .azayagencyjourney {
        display: flex;
        justify-content: center;
        padding: 8px;
        background-color: #9799a0;
        border-radius: 8px;
        position: relative;
    }

    .icon-reload {
        position: absolute;
        top: 55%;
        right: 5px;
        transform: translate(-50%, -50%);
    }

    .content-training {
        width: 100%;
        height: calc(100% - 233px);
        overflow: auto;
    }

    .content-training::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .content-training {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .frame-bottom {
        background-color: #cbcbcb;
        width: 100%;
        display: block;
    }

    .icon-bottom {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        padding: 10px;
    }

    .icon-bottom .active {
        color: #569de8;

    }

    .tabs-phone {
        margin: 5px 0;
        height: 5px;
        width: 40%;
        background-color: #000;
        border-radius: 20px;
    }

    .navbar-top {
        padding: 5px;
        box-shadow: 0 0.125rem 0.25rem rgb(136 152 170 / 15%);

    }

    /* The switch - the box around the slider */
.switch {
  font-size: 12px;
  position: relative;
  padding: 0 0 0 5px;
  display: inline-block;
  width: 5em;
  height: 2.5em;
}

/* Hide default HTML checkbox */
.switch .cb {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.toggle {
  position: absolute;
  cursor: pointer;
  width: 100%;
  height: 100%;
  background-color: #373737;
  border-radius: 0.1em;
  transition: 0.4s;
  text-transform: uppercase;
  font-weight: 700;
  overflow: hidden;
  box-shadow: -0.3em 0 0 0 #373737, -0.3em 0.3em 0 0 #373737,
    0.3em 0 0 0 #373737, 0.3em 0.3em 0 0 #373737, 0 0.3em 0 0 #373737;
}

.toggle > .left {
  position: absolute;
  display: flex;
  width: 50%;
  height: 88%;
  background-color: #f3f3f3;
  color: #373737;
  left: 0;
  bottom: 0;
  align-items: center;
  justify-content: center;
  transform-origin: right;
  transform: rotateX(10deg);
  transform-style: preserve-3d;
  transition: all 150ms;
}

.left::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(206, 206, 206);
  transform-origin: center left;
  transform: rotateY(90deg);
}

.left::after {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(112, 112, 112);
  transform-origin: center bottom;
  transform: rotateX(90deg);
}

.toggle > .right {
  position: absolute;
  display: flex;
  width: 50%;
  height: 88%;
  background-color: #f3f3f3;
  color: rgb(206, 206, 206);
  right: 1px;
  bottom: 0;
  align-items: center;
  justify-content: center;
  transform-origin: left;
  transform: rotateX(10deg) rotateY(-45deg);
  transform-style: preserve-3d;
  transition: all 150ms;
}

.right::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(206, 206, 206);
  transform-origin: center right;
  transform: rotateY(-90deg);
}

.right::after {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(112, 112, 112);
  transform-origin: center bottom;
  transform: rotateX(90deg);
}

.switch input:checked + .toggle > .left {
  transform: rotateX(10deg) rotateY(45deg);
  color: rgb(206, 206, 206);
}

.switch input:checked + .toggle > .right {
  transform: rotateX(10deg) rotateY(0deg);
  color: #487bdb;
}

.img-container {
  width: 100%;
/*  height: 40vh;*/
  margin-top: 10px;
}
#imageToCrop  {
  max-width: 100%;
  height: auto;
}

</style>

<a id="goto_manage_career_path_contents" href="{{ url('/manage_career_path_contents') }}" class="d-none"></a>

<!-- Modal for cropping -->
<div class="modal fade" id="cropModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header row">
        <div class="col-3">
          <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
        </div>
        <div class="col-9">
          <div class="float-end">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#cropModal').modal('hide');">Close</button>
            <button type="button" class="btn btn-primary" id="cropAndSave">Crop and Save</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <img id="imageToCrop" src="" alt="Picture">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">

    <div class="d-flex">

        <div class="phone-frame">
            <div class="frame-top">
                <div class="text-dark px-4 time d-flex align-items-center">{{ date('H:i') }}</div>
                <div class="w-100 phone-camera d-flex align-items-center"> &nbsp;</div>
                <div class="px-2 d-flex align-items-center">
                    <i class="text-dark mx-1 fa-solid fa-signal-bars"></i>
                    <i class="text-dark mx-1 fa-solid fa-wifi"></i>
                    <i class="text-dark mx-1 fa-solid fa-battery-three-quarters"></i>
                </div>
            </div>
            <div class="phone-website">
                <div class="azayagencyjourney">
                    <i class="fa-solid fa-lock me-2 text-dark"></i>
                    <span class="text-dark">https://azayagencyjourney.com</span>

                    <div class="icon-reload">
                        <i class="text-dark fa-solid fa-rotate-right"></i>
                    </div>
                </div>
            </div>
            <div class="navbar-top w-100">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center ">
                        <img src="{{url('/img/logo/Logo Main.png')}}" style="width:29px;height:27px">
                        <div class="ms-2 ">
                            <p class="m-0 " style="font-size: 10px;">AGENCY JOURNEY</p>
                            <p class="m-0" style="font-size: 4px;">ALLIANZ ON BOARDING</p>
                        </div>

                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="d-flex align-items-center p-0 m-0">
                            <div id="li_search_theme_user" class="nav-item mobile-search-icon d-flex align-items-center mx-2">
                                <a class="" >
                                    <i class="fa-solid fa-magnifying-glass text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret d-flex align-items-center">
                                    <i class="fa-regular fa-bookmark text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret position-relative d-flex align-items-center">
                                    <i class="fa-regular fa-calendar text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret position-relative d-flex align-items-center">
                                    <i class="fa-regular fa-bell text-color-obd"></i>
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
                <div>

                </div>
            </div>

            <div class="content-training">
                <style>
                    @media screen and (max-width: 500px) {

                        .conteiner-detail-training,
                        .conteiner-detail-training .row div {
                            padding: 0;

                        }
                    }

                    @media only screen and (max-width: 767px) {
                        .title-training {
                            padding-left: 24px;
                        }

                        .btn-share-group {
                            padding: 24px 0 24px 0 !important;

                        }
                    }


                    @media screen and (min-width: 767px) {
                        .btn-share-group {
                            padding: 24px 0 24px 0 !important;
                        }
                    }

                    .btn-back-all-course {
                        height: 24px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: rgb(255, 255, 255, .80);
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        padding-left: 0;
                        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        color: #003781;
                        position: absolute;
                        top: 10px;
                        left: 10px;
                        font-size: 8px;
                    }

                    .btn-back-all-course:hover {
                        color: #003781;
                    }

                    .btn-back-all-course span {
                        margin-left: 10px;
                        font-weight: bold;
                    }

                    .btn-back-all-course i {
                        width: 24px;
                        height: 24px;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        background-color: rgb(255, 255, 255, .80);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    }

                    .btn-bookmark-training.active svg .bookmark-bg {
                        fill: #EDB529;
                    }

                    .btn-bookmark-training.active svg .bookmark-icon {
                        fill: #FBFBFB;
                    }

                    .btn-like {
                        background-color: #B8C6D8;
                        width: 70px;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        transition: all .15s ease-in-out;
                    }

                    .btn-like .icon-btn i {
                        color: #B8C6D8;
                    }

                    .btn-like.active {
                        background-color: #4B90E2;
                    }

                    .btn-like.active .icon-btn i {
                        color: #4B90E2;
                    }

                    .btn-like:hover,
                    .btn-dislike:hover,
                    .btn-share:hover {
                        color: #fff;

                    }

                    .btn-dislike {
                        background-color: #E6E6E6;
                        width: 70px;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: all .15s ease-in-out;
                    }

                    .btn-dislike .icon-btn i {
                        color: #E6E6E6;
                    }

                    .btn-dislike.active {
                        background-color: #EA0505;
                    }

                    .btn-dislike.active .icon-btn i {
                        color: #EA0505;

                    }

                    .btn-share {
                        background-color: #203881;
                        width: 70px;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: #fff;
                    }

                    .icon-btn {
                        min-width: 22px;
                        min-height: 22px;
                        max-width: 22px;
                        max-height: 22px;
                        background-color: #fff;
                        border-radius: 50%;
                        -webkit-border-radius: 50%;
                        -moz-border-radius: 50%;
                        -ms-border-radius: 50%;
                        -o-border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .icon-btn i {
                        font-size: 14px;
                        margin: 0;
                    }
                </style>
                <div class="container conteiner-detail-training">
                    <div class="row">
                        <div class="col-12 p-0" style="position: relative;">
                            <!-- preview content -->
                        </div>
                    </div>
                </div>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

            </div>

            <style>
                .div-navbar-botttom {
                    border-top: 3px solid #616161;

                }

                .div-navbar-botttom .col-navbar a {
                    color: #616161 !important;

                }

                .div-navbar-botttom .col-navbar i {
                    font-size: 15px;
                }

                .div-navbar-botttom .col-navbar p {
                    color: #616161 !important;
                    font-size: 8px;
                    text-overflow: unset;
                    color: #fff;
                    filter: none;
                    font-weight: bolder;
                }

                .navbar-bottom-active {
                    background-color: rgb(0, 55, 129, .20) !important;
                    color: rgb(0, 55, 129) !important;
                    border-radius: 10px;
                    -webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    -ms-border-radius: 10px;
                    -o-border-radius: 10px;
                    max-width: 100px;
                    min-width: 50px;
                }

                .navbar-bottom-active * {
                    color: rgb(0, 55, 129) !important;
                }
            </style>
            <div id="navbar-botttom" class="container" style="z-index: 99998;">
                <div class="row justify-content-center mx-2 div-navbar-botttom">
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center ">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2 navbar-bottom-active" id="menu_theme_user_Training">
                            <a >
                                <i class="fa-regular fa-graduation-cap fa-flip-horizontal"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Training
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Product">
                            <a class="">
                                <i class="fa-regular fa-clipboard-list"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Product
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Home">
                            <a >
                                <i class="fa-regular fa-house"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Home
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_News">
                            <a >
                                <i class="fa-regular fa-newspaper"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    News
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Career_Path">
                            <a >
                                <i class="fa-regular fa-wrench-simple fa-rotate-by" style="--fa-rotate-angle: 320deg;"></i>
                                <p class=" text-truncate mt-1 mb-0">
                                    Tools
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame-bottom">
                <div class="w-100 icon-bottom">
                    <i class="fa-solid fa-chevron-left"></i>
                    <i class="fa-solid fa-chevron-right"></i>
                    <i class="active fa-sharp fa-light fa-arrow-up-from-square"></i>
                    <i class="active fa-light fa-book-open"></i>
                    <i class="active fa-sharp fa-light fa-clone"></i>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <span class="tabs-phone"></span>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-primary ms-4 w-100">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <h5 class="mb-0 text-primary">
                            แก้ไข Career path
                        </h5>
                    </div>
                    <button id="btn_cf_edit_data" class="btn btn-success float-end d-flex align-items-center" type="button" disabled onclick="cf_edit_data();">
                        <span id="span_load_save" class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                        ยืนยันการเปลี่ยนแปลง
                    </button>
                </div>

                <hr>

            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // 
    });


    function show_preview_data(tag ,event){
        let focus_tag = document.querySelector('#preview_'+tag);
        let data_new = document.querySelector('#'+tag);

        if(tag == 'type_article'){
            const selectElement = event.target;
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const selectedText = selectedOption.text;

            focus_tag.innerHTML = '#'+selectedText ;
        }
        else if(tag == 'link_out'){
            // console.log(data_new);
            focus_tag.setAttribute('href' , data_new.value);
            focus_tag.classList.remove('d-none');
        }
        else if(tag !== 'photo' || tag !== 'video'){
            // console.log(data_new);
            focus_tag.innerHTML = data_new.value ;
        }
        else{
            focus_tag.setAttribute('src' , data_new.value)
        }

    }

    function show_preview_date_start_end(){
        let datetime_start = document.querySelector('#datetime_start').value;
        let datetime_end = document.querySelector('#datetime_end').value;

        let show_start ;
        let show_end ;

        let text_sum ;
        if(datetime_start && datetime_end){
            show_start = formatDateTime_start_end(datetime_start);
            show_end = formatDateTime_start_end(datetime_end);

            text_sum = show_start + ' - ' + show_end ;

        }
        else if(datetime_start && !datetime_end){
            show_start = formatDateTime_start_end(datetime_start);

            text_sum = show_start ;
        }

        if(show_start){
            document.querySelector('#btn_cf_edit_data').disabled = false ;
        }
        else{
            document.querySelector('#btn_cf_edit_data').disabled = true ;
        }

        let inputDateTime = document.getElementById('datetime_start').value;

        if (inputDateTime) {
          let inputDate = new Date(inputDateTime);
          let now = new Date();

          if (inputDate > now) {
            document.querySelector('#preview_status').innerHTML = "Inactive" ;
            document.querySelector('#preview_status').classList.add('text-danger');
            document.querySelector('#preview_status').classList.remove('text-success');
          }
        }

        document.querySelector('#preview_text_datetime_start_to_end').innerHTML = text_sum;
    }

    function formatDateTime_start_end(dateTimeStr) {
        let dateTime = new Date(dateTimeStr);
        
        let day = String(dateTime.getDate()).padStart(2, '0');
        let month = String(dateTime.getMonth() + 1).padStart(2, '0');
        let year = dateTime.getFullYear();
        let hours = String(dateTime.getHours()).padStart(2, '0');
        let minutes = String(dateTime.getMinutes()).padStart(2, '0');
        
        return `${day}/${month}/${year} ${hours}:${minutes} น.`;
    }

    function click_check_status() {
        let check_status = document.querySelector('#check_status').checked ;
            // console.log(check_status);
        let status = document.querySelector('#status') ;
        let datetime_start = document.querySelector('#datetime_start');
        let datetime_end = document.querySelector('#datetime_end');

        if(!check_status){
            status.value = 'Yes';
            document.querySelector('#preview_status').innerHTML = "Active" ;
            document.querySelector('#preview_status').classList.remove('text-danger');
            document.querySelector('#preview_status').classList.add('text-success');
            document.querySelector('#btn_cf_edit_data').disabled = false ;

            let now = new Date();
            let year = now.getFullYear();
            let month = String(now.getMonth() + 1).padStart(2, '0');
            let day = String(now.getDate()).padStart(2, '0');
            let hours = String(now.getHours()).padStart(2, '0');
            let minutes = String(now.getMinutes()).padStart(2, '0');

            // Format the current date and time to YYYY-MM-DDTHH:MM
            let currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

            // // Format the current date and time to YYYY-MM-DDTHH:MM AM/PM (12-hour format)
            // let hours12 = hours % 12 || 12;
            // let ampm = hours >= 12 ? 'PM' : 'AM';
            // let hours12Str = String(hours12).padStart(2, '0');

            // // Format the current date and time to DD/MM/YYYY HH:MM (24-hour format)
            // let hours24Str = String(hours).padStart(2, '0');
            // let text_datetime_start_to_end = `${day}/${month}/${year} ${hours24Str}:${minutes} น.`;

            // let preview_text_datetime = document.querySelector('#preview_text_datetime_start_to_end');
            //     preview_text_datetime.innerHTML = text_datetime_start_to_end;

            datetime_start.value = currentDateTime;
            datetime_start.setAttribute('readonly', 'true');

            show_preview_date_start_end();

        }else{
            document.querySelector('#preview_status').innerHTML = "Inactive" ;
            document.querySelector('#preview_status').classList.add('text-danger');
            document.querySelector('#preview_status').classList.remove('text-success');
            let preview_text_datetime = document.querySelector('#preview_text_datetime_start_to_end');
                preview_text_datetime.innerHTML = '';
            document.querySelector('#btn_cf_edit_data').disabled = true ;

            status.value = '';
            datetime_start.value = '';
            datetime_end.value = '';
            datetime_start.removeAttribute("readonly");
        }

    }


    // SAVE DATA
    function cf_edit_data(){

        let select_photo = document.querySelector('#select_photo').value;
        let select_video = document.querySelector('#select_video').value;

        if(select_photo){
            let previewContainer = document.getElementById('preview_photo');
            uploadBlobToFirebase(previewContainer.src);
        }
        else if(select_video){
            upload_video();
        }
        else{
            save_data();
        }

    }

    async function uploadBlobToFirebase(blobUrl, rank, number) {

        let title = document.querySelector('#title').value;

        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-Edit-' + title;
            let storageRef = storage.ref('/training/image/' + name_file);

            let uploadTask = storageRef.put(blob);

            uploadTask.on('state_changed',
                function(snapshot) {
                    // ติดตามความคืบหน้าของการอัพโหลด (optional)
                },
                function(error) {
                    // กรณีเกิดข้อผิดพลาดในการอัพโหลด
                    console.error('Upload failed:', error);
                },
                function() {
                    // เมื่ออัพโหลดสำเร็จ
                    uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                        // console.log(downloadURL);
                        document.querySelector('#photo').value = downloadURL ;
                        document.querySelector('#select_photo').value = null;

                        let select_video = document.querySelector('#select_video').value;

                        if(select_video){
                            upload_video();
                        }
                        else{
                            save_data();
                        }
                    });
                }
            );
        } catch (error) {
            console.error('Error fetching the Blob:', error);
        }
    }

    function upload_video(){
        let fileInput = document.getElementById('select_video');
        let file = fileInput.files[0];
        let title = document.querySelector('#title').value;

        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);

        let name_file = Date_for_firebase + '-Edit-' + title ;
        let storageRef = storage.ref('/training/video/' + name_file);

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
                    document.querySelector('#video').value = downloadURL ;
                    document.querySelector('#select_video').value = null;

                    save_data();

                    // ตัวอย่างการแสดง URL บนหน้าเว็บ
                    // alert('File uploaded successfully. URL: ' + downloadURL);
                });
            }
        );
    }

    function save_data(){

        document.querySelector('#span_load_save').classList.remove('d-none');
        document.querySelector('#btn_cf_edit_data').innerHTML = 'กำลังบันทึกข้อมูล..';

        let title = document.querySelector('#title').value;
        let training_type_id = document.querySelector('#training_type_id').value;
        let detail = document.querySelector('#for_detail').value;
        let photo = document.querySelector('#photo').value;
        let video = document.querySelector('#video').value;
        let datetime_start = document.querySelector('#datetime_start').value;
        let datetime_end = document.querySelector('#datetime_end').value;
        let status = document.querySelector('#status').value;
        let link_out = document.querySelector('#link_out').value;

        let data_arr = {
            "id" : "{{ $data->id }}",
            "title" : title,
            "training_type_id" : training_type_id,
            "detail" : detail,
            "photo" : photo,
            "video" : video,
            "datetime_start" : datetime_start,
            "datetime_end" : datetime_end,
            "status" : status,
            "link_out" : link_out,
        }; 

        fetch("{{ url('/') }}/api/save_data_edit_training", {
            method: 'post',
            body: JSON.stringify(data_arr),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(data){
            // console.log(data);
            if(data == 'success'){
                document.querySelector('#goto_manage_career_path_contents').click();
            }
        }).catch(function(error){
            console.error(error);
        });
    }
    // END SAVE DATA
</script>

<script>
    var cropper;
    var image = document.getElementById('imageToCrop');

    document.addEventListener("DOMContentLoaded", function() {

        $('#cropModal').on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                dragMode: 'move',
                aspectRatio: 1 / 1,
                autoCropArea: 1,
                center: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                maxCropBoxHeight: 300,
                viewMode: 2,
                guides: false,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        let select_photo = document.querySelector('#select_photo');

        select_photo.addEventListener('change', function (event) {
            // console.log('input_ag_1');
            let files = event.target.files;

            if (files && files.length > 0) {
                let reader = new FileReader();
                reader.onload = function (e) {
                image.src = e.target.result;
                    $('#cropModal').modal('show');
                };
                reader.readAsDataURL(files[0]);
            }

            $('#cropModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            document.querySelector('#cropAndSave').setAttribute('onclick' , 'crop_img()');
        });

    });

    function crop_img(){

        let previewContainer = document.getElementById('preview_photo');

        let canvas = cropper.getCroppedCanvas({
          width: 512,
          height: 512
        });

        canvas.toBlob(function (blob) {
          let url = URL.createObjectURL(blob);
          // let img = document.createElement('img');
          // img.src = url;
          previewContainer.src = '';
          previewContainer.src = url;
          $('#cropModal').modal('hide');
        });

    }

    document.getElementById('select_video').addEventListener('change', function(event) {

        let preview_video = document.querySelector('#preview_video');
        document.querySelector('#div_tag_show_preview_video').classList.remove('d-none');

        var file = this.files[0];
        preview_video.src = URL.createObjectURL(file);
        
    });
</script>

<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
      min-height: 200px;
    }

    .ck-powered-by{
        display: none;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>

<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("detail"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'undo', 'redo', '|',
                'findAndReplace', '|','link', '|',
                'heading', '|','fontSize', '|',
                'alignment', 'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'fontColor', 'highlight', '|',
                'specialCharacters', 'horizontalLine', '|','exportPDF','exportWord', 
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                // toggleDownloadable: {
                //     mode: 'manual',
                //     label: 'Downloadable',
                //     attributes: {
                //         download: 'file'
                //     }
                // }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "superbuild" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'AIAssistant',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'MultiLevelList',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced',
            'CaseChange'
        ]
    }).then(editor => {
        editor.model.document.on('change:data', () => {
            // console.log(editor.getData());
            if(!editor.getData()){
                document.querySelector('#preview_detail').innerHTML = '';
            }
            else{
                document.querySelector('#for_detail').value = editor.getData();
                document.querySelector('#preview_detail').innerHTML = editor.getData();
                show_preview_date_start_end();
            }
        });
    }).catch(error => {
        console.error(error);
    });
</script>
<!-- END CKEDITOR -->
@endsection
@extends('layouts.theme_admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.toggle-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  border-radius: .5em;
  padding: .125em;
  box-shadow: 0 1px 1px rgb(255 255 255 / .6);
  /* resize for demo */
  font-size: 1.5em;
}

.toggle-checkbox {
  appearance: none;
  position: absolute;
  z-index: 1;
  border-radius: inherit;
  width: 100%;
  height: 100%;
  /* fix em sizing */
  font: inherit;
  opacity: 0;
  cursor: pointer;
}

.toggle-container {
  display: flex;
  align-items: center;
  position: relative;
  border-radius: .375em;
  width: 3em;
  height: 1.5em;
  background-color: #e8e8e8;
  box-shadow: inset 0 0 .0625em .125em rgb(255 255 255 / .2), inset 0 .0625em .125em rgb(0 0 0 / .4);
  transition: background-color .4s linear;
}

.toggle-checkbox:checked + .toggle-container {
  background-color: #2EC300;
}

.toggle-button {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  left: .0625em;
  border-radius: .3125em;
  width: 1.375em;
  height: 1.375em;
  background-color: #e8e8e8;
  box-shadow: inset 0 -.0625em .0625em .125em rgb(0 0 0 / .1), inset 0 -.125em .0625em rgb(0 0 0 / .2), inset 0 .1875em .0625em rgb(255 255 255 / .3), 0 .125em .125em rgb(0 0 0 / .5);
  transition: left .4s;
}

.toggle-checkbox:checked + .toggle-container > .toggle-button {
  left: 1.5625em;
}

.toggle-button-circles-container {
  display: grid;
  grid-template-columns: repeat(3, min-content);
  gap: .125em;
  position: absolute;
  margin: 0 auto;
}

.toggle-button-circle {
  border-radius: 50%;
  width: .125em;
  height: .125em;
  background-image: radial-gradient(circle at 50% 0, #f5f5f5, #c4c4c4);
}
</style>

<style>
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

  .checkmark__circle {
      stroke-dasharray: 166;
      stroke-dashoffset: 166;
      stroke-width: 2;
      stroke-miterlimit: 10;
      stroke: #7ac142;
      fill: none;
      animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
  }

  .checkmark {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: block;
      stroke-width: 2;
      stroke: #fff;
      stroke-miterlimit: 10;
      margin: 10% auto;
      box-shadow: inset 0px 0px 0px #7ac142;
      animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
  }

  .checkmark__check {
      transform-origin: 50% 50%;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
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
          box-shadow: inset 0px 0px 0px 30px #7ac142
      }
  }

  .detail-course{
      color: #000;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 5px;

  }

  @keyframes bounce-twice {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-30px);
    }
    60% {
      transform: translateY(-15px);
    }
  }

  .i_Highlight {
    animation: bounce-twice 2s;
  }

  .icon-menu-course {
      width: 40px;
      height: 40px;
      background-color: #003781;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      -o-border-radius: 50%;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
  }

  .icon-menu-course img{
      width: 20px!important;
      height: 20px!important;
      object-fit: contain!important;
  }

  .center-vertical {
    display: flex;
    align-items: center;
  }

  .long-item {
        /* aspect-ratio:  11/ 16; */
        /* width: 159px; */
        position: relative;
        width: 95%;
        height: 214px;
        background-color: #003781;
        color: #fff;
        margin: 5px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .long-item img {
        display: block;
        object-fit: contain;
        height: 100%;
        width: 100%;
    }

    .square-item img {
        display: block;
        object-fit: contain;
        height: 100%;
        width: 100%;
    }

    .square-item {
        /* aspect-ratio:  1/ 1; */
        /* width: 159px; */
        position: relative;
        width: 95%;
        height: 159px;
        background-color: #CADCFF;
        color: #003781;
        margin: 5px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .long-item .count-activitys {
        position: absolute;
        bottom: 15px;

    }

    .square-item .count-activitys {
        position: absolute;
        bottom: 10px;

    }

    .fav-course {
        width: 100%;
        flex-direction: row;
        display: flex;
        flex-wrap: wrap;
    }

    .result_icon img {
      max-width: 80%;
    }

    .box-2 {
        padding: 0.5em;
        /* width: calc(100%/2 - 1em); */
    }

</style>

<!-- Modal ลบประเภทหลักสูตร -->
<!-- Button trigger modal -->
<button id="btn_Modal_delete_activitys_type" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#Modal_delete_activitys_type">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="Modal_delete_activitys_type" tabindex="-1" aria-labelledby="Label_delete_activitys_type" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="mt-3 mb-2 text-center">
          <img src="{{ url('/img/icon/problem (1).png') }}" style="width: 60%;">
          <br>
          <h4 class="mt-3">
            ยืนยันการลบ
            <br>
            <b><span id="modal_delete_name_activitys_type"></span></b>
          </h4>
          <p class="text-danger"><u>เมื่อกดยืนยัน กิจกรรมทั้งหมดที่เป็นประเภทนี้จะถูกลบด้วย</u></p>
        </div>
        <hr>
        <center>
          <button id="btn_close_Modal_delete_activitys_type" type="button" class="btn btn-secondary" data-dismiss="modal" style="width:40%;">
            ปิด
          </button>
          <button id="btn_cf_delete_activitys_type" type="button" class="btn btn-danger" style="width:40%;">
            ยืนยันการลบ
          </button>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- MODAL การจัดการเมนูหลักสูตร -->
<div class="modal fade" id="modal_menu_management" tabindex="-1" aria-labelledby="Label_menu_management" aria-hidden="true" style="z-index:9999999!important;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label_menu_management">การจัดการเมนู</h5>
        <button id="btn_close_modal_menu_management" type="button" class="btn" data-dismiss="modal" aria-label="Close">
          <i class="fa-solid fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <div id="content_number_menu_type" class="row mt-3 mb-2">
              <!--  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">การจัดการกิจกรรม</div>
  <div class="ps-3">
    <select id="select_show_activitys_by_type" class="form-select" onchange="change_show_activitys_by_type();">
      <option value="all" selected>ทั้งหมด</option>
    </select>
  </div>
	<div class="ms-auto">
		<div class="btn-group">
			<a href="{{ url('/activitys/create') }}" class="btn btn-success">
				<i class="fa-solid fa-calendar-plus"></i> เพิ่มกิจกรรม
			</a>
		</div>
		<div class="btn-group">
			<button class="btn btn-warning" data-toggle="modal" data-target="#modal_menu_management">
				<i class="fa-solid fa-list-ol"></i> การจัดการเมนู
			</button>
		</div>
	</div>
</div>

<hr>

<div class="card border-top border-0 border-4 border-info">
  <div class="card-body p-5">
    <div class="card-title d-flex align-items-center">
      <h5 id="h5_activitys_types" class="mb-0 text-info">
        <!--  -->
      </h5>
    </div>
    <hr>
    <div id="div_content" class="row">
      <!-- data -->
    </div>
  </div>
</div>

<script>

	document.addEventListener('DOMContentLoaded', function () {
        get_data_activity('all');
        get_data_activity_type();
        get_data_number_menu_of_activitys();
  });

  function get_data_activity(type){
    // console.log('asd');

    fetch("{{ url('/') }}/api/get_data_activity_admin/" + type )
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(type == 'all'){
              document.querySelector('#h5_activitys_types').innerHTML = 'กิจกรรมทั้งหมด';
          }
          else{
              document.querySelector('#h5_activitys_types').innerHTML = result['name_type'];
          }

          let div_content = document.querySelector('#div_content');
              div_content.innerHTML = '';

          if(result['data_activity']){
              for (let i = 0; i < result['data_activity'].length; i++) {

                  let textWithoutHtml = `<br><br><br>`;
                  if(result['data_activity'][i].detail){
                      textWithoutHtml = result['data_activity'][i].detail.replace(/(<([^>]+)>)/gi, "");
                  }

                  // name_type
                  let name_type = `` ;
                  if(type == 'all'){
                      name_type = result['data_activity'][i].name_type;
                  }
                  else{
                      name_type = result['name_type'] ;
                  }

                  // Highlight
                  let html_Highlight ;
                  if(type == 'all'){
                    html_Highlight = `<span id="span_Highlight_id_`+result['data_activity'][i].id+`" class="float-end">..</span>`;
                    if(result['data_activity'][i].highlight_number){
                      html_Highlight = `
                        <span id="span_Highlight_id_`+result['data_activity'][i].id+`">
                          <i class="i_Highlight fa-solid fa-circle-`+result['data_activity'][i].highlight_number+` font-24 float-end text-success"></i>
                        </span>
                        `;
                    }
                  }else{
                    html_Highlight = `<span id="span_Highlight_id_`+result['data_activity'][i].id+`" class="float-end">..</span>`;
                    if(result['data_activity'][i].highlight_of_type){
                      html_Highlight = `
                        <span id="span_Highlight_id_`+result['data_activity'][i].id+`">
                          <i class="i_Highlight fa-solid fa-circle-`+result['data_activity'][i].highlight_of_type+` font-24 float-end text-success"></i>
                        </span>
                        `;
                    }
                  }

                  let sum_datetime_start = ``;
                  if(result['data_activity'][i].datetime_start){
                    let datetime_start = result['data_activity'][i].datetime_start;
                    // แยกวันที่และเวลา
                    let [date_datetime_start, time_datetime_start] = datetime_start.split(' ');
                    // แยกส่วนของวันที่
                    let [year_datetime_start, month_datetime_start, day_datetime_start] = date_datetime_start.split('-');
                    // แปลงรูปแบบวันที่เป็น วัน/เดือน/ปี
                    let formatted_date_start = `${day_datetime_start}/${month_datetime_start}/${year_datetime_start}`;
                    // แยกส่วนของเวลา (เฉพาะ HH:MM:SS)
                    let [hour, minute, second] = time_datetime_start.split('.')[0].split(':');
                    let formatted_time_start = `${hour}:${minute}`;

                    sum_datetime_start = formatted_date_start+` `+formatted_time_start+` น.` ;
                  }

                  let sum_datetime_end = `-`;
                  if(result['data_activity'][i].datetime_end){
                    let datetime_end = result['data_activity'][i].datetime_end;
                    // แยกวันที่และเวลา
                    let [date_datetime_end, time_datetime_end] = datetime_end.split(' ');
                    // แยกส่วนของวันที่
                    let [year_datetime_end, month_datetime_end, day_datetime_end] = date_datetime_end.split('-');
                    // แปลงรูปแบบวันที่เป็น วัน/เดือน/ปี
                    let formatted_date_end = `${day_datetime_end}/${month_datetime_end}/${year_datetime_end}`;
                    // แยกส่วนของเวลา (เฉพาะ HH:MM:SS)
                    let [hour, minute, second] = time_datetime_end.split('.')[0].split(':');
                    let formatted_time_end = `${hour}:${minute}`;

                    sum_datetime_end = formatted_date_end+` `+formatted_time_end+` น.`;
                  }

                  // status
                  let html_status = `
                      <span class="btn btn-sm btn-danger" style="position:absolute;top:1%;right: 1%;">
                        Inactive
                      </span>
                  `;
                  if(result['data_activity'][i].status == 'Yes'){
                    html_status = `
                      <span class="btn btn-sm btn-success" style="position:absolute;top:1%;right: 1%;">
                        Active
                      </span>`;
                  }

                  let html = `
                      <div class="col-12 col-md-3">
                        <div class="card" style="position:relative;">
                          `+html_status+`
                          <img src="`+result['data_activity'][i].photo +`" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">
                              `+result['data_activity'][i].title+`
                            </h5>
                            <p class="card-text text-info">
                              #`+name_type+`
                            </p>
                            <p class="card-text">
                              <b>เริ่ม : </b>`+sum_datetime_start+`
                              <br>
                              <b>สิ้นสุด : </b>`+sum_datetime_end+`
                            </p>
                            <p class="detail-course">
                              `+textWithoutHtml+`
                            </p>
                            <p class="card-text mt-3">
                              <b>ผู้ลงข้อมูล : </b>`+result['data_activity'][i].name_creator+`
                            </p>
                            <hr>
                            <span>
                              <b>Highlight</b>
                              `+html_Highlight+`
                            </span>
                            <center class="mt-4 mb-2">

                              <div class="row">
                                <div class="col-12">
                                  <a href="{{ url('/preview_activitys') }}/`+result['data_activity'][i].id+`" class="btn btn-sm btn-info w-100">
                                    <i class="fa-solid fa-money-check-pen"></i> ดูข้อมูล / แก้ไขข้อมูล
                                  </a>
                                </div>
                                <div class="col-6 mt-2">
                                  @if(Auth::check())
                                    @if(Auth::user()->role == "Super-admin")
                                    <div class="btn-group w-100" role="group">
                                      <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Highlight</button>
                                      <ul class="dropdown-menu" style="margin: 0px;">
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_activity'][i].id+`' , 'ว่าง' , '`+type+`')">
                                            ว่าง
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_activity'][i].id+`' , '1' , '`+type+`')">
                                            ลำดับที่ 1
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_activity'][i].id+`' , '2' , '`+type+`')">
                                            ลำดับที่ 2
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_activity'][i].id+`' , '3' , '`+type+`')">
                                            ลำดับที่ 3
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_activity'][i].id+`' , '4' , '`+type+`')">
                                            ลำดับที่ 4
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_activity'][i].id+`' , '5' , '`+type+`')">
                                            ลำดับที่ 5
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                    @endif
                                  @endif
                                </div>
                                <div class="col-3 mt-2 d-">
                                  <a href="{{ url('/log_activitys') }}/`+result['data_activity'][i].id+`" class="btn btn-sm btn-secondary w-100">
                                    LOG
                                  </a>
                                </div>
                                <div class="col-3 mt-2">
                                  <form method="POST" action="{{ url('/activitys') }}/`+result['data_activity'][i].id+`" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete(event, this)">
                                      {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn btn-danger btn-sm text-center w-100" title="Delete Tools_tutorial">
                                          &nbsp;<i class="fa-solid fa-trash-can"></i> ลบ
                                      </button>
                                  </form>
                                </div>
                              </div>

                              
                              
                            </center>
                          </div>
                        </div>
                      </div>
                  `;

                  div_content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

              }
          }

      });
  }

  function change_Highlight(activity_id , number , type){
    // console.log(activity_id);
    // console.log(number);

    fetch("{{ url('/') }}/api/change_Highlight_activity/" + activity_id  + "/" + number + "/" + type)
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(result['old_id']){
            let span_Highlight_old_id = document.querySelector('#span_Highlight_id_'+result['old_id']);

            if(result['old_id_change_to']){
                span_Highlight_old_id.innerHTML = `
                  <span id="span_Highlight_id_`+result['old_id']+`">
                    <i class="i_Highlight fa-solid fa-circle-`+result['old_id_change_to']+` font-24 float-end text-success"></i>
                  </span>
                `;

                let icon_1 = document.getElementById('span_Highlight_id_'+result['old_id']);
                    icon_1.classList.remove('i_Highlight');
                    // void icon_1.offsetWidth; // Trigger reflow
                    setTimeout(() => {
                      icon_1.classList.add('i_Highlight');
                    }, 500);
                  }
            else{
              span_Highlight_old_id.innerHTML = `
                <span id="span_Highlight_id_`+result['old_id']+`" class="float-end">..</span>
              `;
            }
          }

          let select = document.querySelector('#span_Highlight_id_'+activity_id);
          select.innerHTML = `
            <span id="span_Highlight_id_`+activity_id+`">
              <i class="i_Highlight fa-solid fa-circle-`+number+` font-24 float-end text-success"></i>
            </span>
          `;

          let icon_2 = document.getElementById('span_Highlight_id_'+activity_id);
              icon_2.classList.remove('i_Highlight');
              // void icon_2.offsetWidth; // Trigger reflow
              setTimeout(() => {
                icon_2.classList.add('i_Highlight');
              }, 500);

      });
  }

  function get_data_activity_type(){

    let select_show_activitys_by_type = document.querySelector('#select_show_activitys_by_type');

    fetch("{{ url('/') }}/api/get_data_activity_type")
      .then(response => response.json())
      .then(result => {
        //   console.log(result);

          if(result){
            for(let item of result){
                let option = document.createElement("option");
                option.text = item.name_type;
                option.value = item.id;
                select_show_activitys_by_type.add(option);             
            } 
          }
    });

  }

  function change_show_activitys_by_type(){
    let select_activitys_id = document.querySelector('#select_show_activitys_by_type').value ;
    get_data_activity(select_activitys_id)
  }

  function get_data_number_menu_of_activitys(){

    let content_number_menu_type = document.querySelector('#content_number_menu_type');
        content_number_menu_type.innerHTML = '';

        fetch("{{ url('/') }}/api/get_data_number_menu_of_activitys")
          .then(response => response.json())
          .then(result => {
              // console.log(result);

              if(result){

                for (let i = 0; i < result.length; i++) {

                  let html_list_number = `` ;
                  for (let ix = 0; ix < result.length; ix++) {

                    let count = ix + 1 ;
                    list_number = `
                      <li>
                        <span class="dropdown-item btn" onclick="change_number_menu_type('`+result[i].id+`' , '`+count+`')">
                          ลำดับที่ `+count+`
                        </span>
                      </li>
                    `;

                    html_list_number = html_list_number + list_number ;

                  }

                  let html = `
                    <div class="col-1 center-vertical mb-3">
                      <i class="fa-solid fa-circle-`+result[i].number_menu+` font-24 text-info"></i>
                    </div>
                    <div class="col-8 center-vertical mb-3">
                      `+result[i].name_type+`
                    </div>
                    <div class="col-3 center-vertical mb-3">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Number Menu</button>
                        <ul class="dropdown-menu" style="margin: 0px;">
                          `+html_list_number+`
                        </ul>
                      </div>
                      <button type="button" class="btn btn-sm btn-danger mx-2" onclick="click_delete_name_activitys_type('`+result[i].id+`' , '`+result[i].name_type+`')">
                        <i class="fa-solid fa-trash-can"></i> ลบ
                      </button>
                    </div>
                    <hr>
                  `;

                  content_number_menu_type.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                }

              }
        });
  }

  function change_number_menu_type(type_id , number){

    fetch("{{ url('/') }}/api/change_number_menu_of_activitys/"+ type_id + "/" + number)
          .then(response => response.text())
          .then(result => {
              // console.log(result);
              if(result == 'success'){
                get_data_number_menu_of_activitys();
              }
    });

  }

  function click_delete_name_activitys_type(activitys_type_id , name_type){

    let btn = document.querySelector('#btn_cf_delete_activitys_type');
    let name_activitys_type = document.querySelector('#modal_delete_name_activitys_type');
        name_activitys_type.innerHTML = name_type ;

        btn.setAttribute('onclick' , "cf_delete_activitys_type('"+activitys_type_id+"')");
        
        document.querySelector('#btn_close_modal_menu_management').click();
        document.querySelector('#btn_Modal_delete_activitys_type').click();
  }

  function cf_delete_activitys_type(activitys_type_id){
    fetch("{{ url('/') }}/api/delete_activitys_type/"+ activitys_type_id)
          .then(response => response.text())
          .then(result => {
              // console.log(result);

            if(result == 'success'){
              document.querySelector('#btn_close_Modal_delete_activitys_type').click();
              get_data_number_menu_of_activitys();
            }
    });
  }

</script>

@endsection
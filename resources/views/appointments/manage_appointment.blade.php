@extends('layouts.theme_admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

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

    .long-item .count-training {
        position: absolute;
        bottom: 15px;

    }

    .square-item .count-training {
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

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">การจัดการตารางอบรม/สอบ</div>
  <div class="ps-3">
    <select id="select_show_training_by_type" class="form-select" onchange="change_show_training_by_type();">
      <option value="all" selected>หลักสูตรทั้งหมด</option>
    </select>
  </div>
  <div class="ps-3">
    <select id="select_show_type_appointments" class="form-select" onchange="change_view_type_appointments();">
      <option value="all" selected>ประเภททั้งหมด</option>
      <option value="อบรม">อบรม</option>
      <option value="สอบ">สอบ</option>
    </select>
  </div>
  <script>
    function change_view_type_appointments(){

      let select_show = document.querySelector('#select_show_type_appointments');

      let item_data_appointments = document.querySelectorAll('.item_data_appointments');
          item_data_appointments.forEach(item => {
            item.classList.add('d-none');
          })

      if(select_show.value != 'all'){
        let item_show = document.querySelectorAll('[type_appointments="'+select_show.value+'"]');
          item_show.forEach(item_show => {
            item_show.classList.remove('d-none');
          })
      }
      else{
        let all = document.querySelectorAll('.item_data_appointments');
          all.forEach(item_all => {
            item_all.classList.remove('d-none');
          })
      }

    }
  </script>
	<div class="ms-auto">
		<div class="btn-group">
			<a href="{{ url('/appointment_create/quiz') }}" class="btn btn-success">
				<i class="fa-solid fa-calendar-plus"></i> เพิ่มตารางอบรม/สอบ
			</a>
		</div>
	</div>
</div>

<hr>

<div class="card border-top border-0 border-4 border-success">
  <div class="card-body p-5">
    <div class="card-title d-flex align-items-center">
      <h5 id="h5_training_types" class="mb-0 text-success">
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
        get_data_appointment('all');
        get_data_Training_type();
  });

  function get_data_appointment(type){
    fetch("{{ url('/') }}/api/get_data_appointment/" + type )
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(type == 'all'){
              document.querySelector('#h5_training_types').innerHTML = 'หลักสูตรทั้งหมด';
          }
          else{
              document.querySelector('#h5_training_types').innerHTML = result['type_article'];
          }

          let div_content = document.querySelector('#div_content');
              div_content.innerHTML = '';

          if(result['data_appointments']){
              for (let i = 0; i < result['data_appointments'].length; i++) {

                  let textWithoutHtml = `<br><br><br>`;
                  if(result['data_appointments'][i].detail){
                      textWithoutHtml = result['data_appointments'][i].detail.replace(/(<([^>]+)>)/gi, "");
                  }

                  // type_article
                  let type_article = `` ;
                  if(type == 'all'){
                      type_article = result['data_appointments'][i].type_article;
                  }
                  else{
                      type_article = result['type_article'] ;
                  }

                  let sum_datetime_start = ``;
                  if(result['data_appointments'][i].datetime_start){
                    let datetime_start = result['data_appointments'][i].datetime_start;
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
                  if(result['data_appointments'][i].datetime_end){
                    let datetime_end = result['data_appointments'][i].datetime_end;
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
                  if(result['data_appointments'][i].status == 'Yes'){
                    html_status = `
                      <span class="btn btn-sm btn-success" style="position:absolute;top:1%;right: 1%;">
                        Active
                      </span>`;
                  }

                  let html = `
                      <div type_appointments="`+result['data_appointments'][i].type+`" class="item_data_appointments col-12 col-md-3">
                        <div class="card" style="position:relative;">
                          `+html_status+`
                          <img src="`+result['data_appointments'][i].photo+`" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">
                              `+result['data_appointments'][i].title+`
                            </h5>
                            <p class="card-text text-info">
                              #`+type_article+`
                            </p>
                            <p class="card-text text-danger">
                              #`+result['data_appointments'][i].type+`
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
                              <b>ผู้ลงข้อมูล : </b>`+result['data_appointments'][i].name_creator+`
                            </p>
                            <hr>
                            <center class="mt-4 mb-2">
                              <a href="{{ url('/preview_appointment') }}/`+result['data_appointments'][i].id+`" class="btn btn-sm btn-info">
                                ดูข้อมูล
                              </a>
                              <form method="POST" action="{{ url('/appointments') }}/`+result['data_appointments'][i].id+`" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete(event, this)">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger btn-sm text-center" title="Delete Tools_tutorial">
                                      &nbsp;<i class="fa-solid fa-trash-can"></i>
                                  </button>
                              </form>
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

  function get_data_Training_type(){

    let select_show_training_by_type = document.querySelector('#select_show_training_by_type');

    fetch("{{ url('/') }}/api/get_data_Training_type")
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(result){
            for(let item of result){
                let option = document.createElement("option");
                option.text = item.type_article;
                option.value = item.id;
                select_show_training_by_type.add(option);             
            } 
          }
    });

  }

  function change_show_training_by_type(){
    let select_training_id = document.querySelector('#select_show_training_by_type').value ;
    get_data_appointment(select_training_id)
  }


</script>

@endsection
@extends('layouts.theme_admin')

@section('content')

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
</style>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">การจัดการ Content Popups</div>
	<div class="ms-auto">
		<div class="btn-group">
			<a href="{{ url('/create_content_popups') }}" class="btn btn-primary">
				<i class="fa-solid fa-rectangle-history-circle-plus"></i> สร้างใหม่
			</a>
		</div>
		<div class="btn-group">
			<span class="btn btn-warning" data-toggle="modal" data-target="#Modal_reset_content_popup">
				<i class="fa-solid fa-rotate"></i> รีเซ็ตการแจ้งเตือน
			</span>
		</div>
	</div>
</div>

<!-- Modal รีเซ็ตการแจ้งเตือน -->
<div class="modal fade" id="Modal_reset_content_popup" tabindex="-1" aria-labelledby="Modal_reset_content_popupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        	<div id="modal_body_question">
	        	<img src="{{ url('/img/icon/problem (1).png') }}" style="width:60%;">
	        	<h5 class="modal-title mt-3" id="Modal_reset_content_popupLabel">ยืนยัน <b>"รีเซ็ตการแจ้งเตือน"</b> ?</h5>
        	</div>
        	<div id="modal_body_success" class="d-none">
            <div class="contrainerCheckmark">
              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                  <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                  <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
              </svg>
              <center>
                  <h5 class="mt-5">เสร็จสิ้น</h5>
              </center>
        		</div>
        	</div>
        </center>
        <hr>
      </div>
      <div class="mt-2 mb-4">
      	<center>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:40%;">
	        	ปิด
	        </button>
	        <button id="btn_cf_reset_content_popup" type="button" class="btn btn-primary" style="width:40%;" onclick="reset_check_content_popup();">
	        	ยืนยัน
	        </button>
      	</center>
      </div>
    </div>
  </div>
</div>

<hr>

<div id="content_popup" class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
	<!-- content_popup -->
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {
    get_data_content_popup();
});

function get_data_content_popup(){
	fetch("{{ url('/') }}/api/get_data_content_popup")
      .then(response => response.json())
      .then(result => {
          console.log(result);

          let content_popup = document.querySelector('#content_popup');
          	content_popup.innerHTML = '';

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

          	let time_create = `<b>สร้างเมื่อ</b> `+formattedDate+` <b>เวลา</b> `+formattedTime+` น.` ;

          	// Amount log
          	let countLv1 = 0 ;
						let countLv2 = 0 ;

		        let data_log = JSON.parse(result[i].log_video);
		        // console.log(data_log);
		        
						if(result[i].log_video){
							// นับจำนวนระดับทั้งหมดใน Level 1
							countLv1 = Object.keys(data_log).length;

							// นับจำนวนระดับทั้งหมดใน Level 2
							countLv2 = Object.values(data_log).reduce((acc, val) => acc + Object.keys(val).length, 0);
						}

          	// status
						let check_status = result[i].status ;
						let input_checked = '';
						let text_guide = '';
						let color_status = '';
						if(check_status == "Yes"){
							input_checked = "checked";
							text_guide = "(คุณเปิดใช้งานเนื้อหานี้อยู่)";
							color_status = "success";
						}
						else{
							input_checked = "";
							text_guide = "(หากเปิดใช้งานเนื้อหาที่เปิดใช้งานอยู่จะถูกปิด)";
							color_status = "danger";
						}

						// video or photo
						let check_type = result[i].type ;
						let photo_or_video  ;
						if(check_type == 'video'){
							photo_or_video = `
								<video id="tag_video_content" src="`+result[i].video+`" controls muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
							`;
						}
						else if(check_type == 'photo'){
							photo_or_video = `
								<img id="tag_photo_content" src="`+result[i].photo+`"style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview">
							`;
						}

          	let html = `
          		<div class="col">
								<div class="card">
									`+photo_or_video+`
									<div class="card-body">
												<h5 class="card-title">
													<b>`+result[i].title+`</b>
												</h5>
												<p class="card-text">
													`+time_create+`
												</p>
												<p class="card-text">
													ผู้สร้าง : `+result[i].name_user+`
												</p>
											</div>
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="float-start" style="margin-top: 7px;">
														ดูแล้ว `+countLv2+` ครั้ง จากผู้ใช้ `+countLv1+` คน
													</span>
													<span class="float-end">
														<a href="{{ url('/view_content_popup') }}/`+result[i].id+`" type="button" class="btn btn-sm btn-info">
															View log
														</a>
													</span>
												</li>
											</ul>
									<center>
										<hr style="width:80%;">
									</center>
									<div class="card-body">
										<div id="div_toggle_status_`+result[i].id+`" class="toggle-wrapper" onclick="change_status('`+result[i].id+`');">
										  	<input id="input_of_`+result[i].id+`" class="toggle-checkbox" type="checkbox" `+input_checked+`>
										  	<div class="toggle-container">  
										    	<div class="toggle-button">
											      	<div class="toggle-button-circles-container">
										        	<div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											        <div class="toggle-button-circle"></div>
											      	</div>
										    	</div>
										  	</div>
										</div>
										<center>
											<br>
											<span text_guide_for="`+result[i].id+`" class="text-`+color_status+`">
												`+text_guide+`
											</span>
										</center>
									</div>
								</div>
							</div>
          	`;

          	content_popup.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
          }
      });
}
	
function reset_check_content_popup(){

	fetch("{{ url('/') }}/api/reset_check_content_popup")
      .then(response => response.text())
      .then(result => {
          // console.log(result);

      	if(result == "success"){
      		document.querySelector('#modal_body_question').classList.add('d-none');
      		document.querySelector('#btn_cf_reset_content_popup').classList.add('d-none');
      		document.querySelector('#modal_body_success').classList.remove('d-none');
      	}
	});

}

</script>
@endsection
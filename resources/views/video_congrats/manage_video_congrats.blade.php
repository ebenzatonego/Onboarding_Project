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
</style>

<span id="btn_open_modal_reset_video_congrats" class="btn btn-warning d-none" data-toggle="modal" data-target="#Modal_reset_video_congrats">
	<!-- btn modal reset_video_congrats -->
</span>

<!-- Modal รีเซ็ตการแจ้งเตือน -->
<div class="modal fade" id="Modal_reset_video_congrats" tabindex="-1" aria-labelledby="Modal_reset_video_congratsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        	<div id="modal_body_question">
	        	<img src="{{ url('/img/icon/problem (1).png') }}" style="width:60%;">
	        	<h5 class="modal-title mt-3" id="Modal_reset_video_congratsLabel">
	        		ยืนยัน <b>"รีเซ็ตการแจ้งเตือน <span class="text-danger" id="span_name_tyep"></span>"</b> ?
	        	</h5>
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
	        <button id="btn_cf_reset_video_congrats" type="button" class="btn btn-primary" style="width:40%;">
	        	ยืนยัน
	        </button>
      	</center>
      </div>
    </div>
  </div>
</div>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">วิดีโอแสดงความยินดี</div>
	<div class="ps-3 mt-2">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item">
					<i class="fa-solid fa-eye"></i>
				</li>
				<li id="text_show_view_now" class="breadcrumb-item active" aria-current="page">
					ทั้งหมด
				</li>
			</ol>
		</nav>
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			<a href="{{ url('/create_video_congrats') }}" class="btn btn-primary">
				<i class="fa-solid fa-sparkles"></i> สร้างใหม่
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-8">
		<div id="content_video_congrats" >
			<!-- content_video_congrats -->
		</div>
	</div>
	<div class="col-4">
		<div class="card border-top border-0 border-4 border-success">
			<div class="card-body p-3">
				<div class="card-title text-center">
					<h5 class="mb-2 text-success">
						<i class="fa-solid fa-ranking-star text-success"></i> ระดับของการแสดงผล
					</h5>
				</div>
				<hr>

				<style>
		        .form-check-label {
		            color: #000!important;
		            font-weight: bold!important; 
		        }
		        .form-check-input:disabled {
		            opacity: 1!important; 
		            cursor: not-allowed!important; 
		        }
		    </style>

				<div class="row" id="show_status_type_rank">
					<!-- Content show_status_type_rank -->
				</div>


			</div>
		</div>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {
        get_rank_type_video_congrats();
    });

    function get_rank_type_video_congrats(){

    	fetch("{{ url('/') }}/api/get_rank_type_video_congrats")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	        	let content_video_congrats = document.querySelector('#content_video_congrats');
	            	content_video_congrats.innerHTML = '';

	          for (let xi = 0; xi < result.length; xi++) {

		        	let html_rank_type = `
		        		<div id="video_congrats_rank_`+result[xi].name_rank+`" name_rank="`+result[xi].name_rank+`" class="card border-top border-0 border-4 border-success name_rank" style="width:100%;">
									<div class="card-body p-3">
										<div class="card-title text-start">
											<h5 class="mb-2 text-success">
												<i class="fa-regular fa-circle-dot"></i> `+result[xi].name_rank+`
												<span class="btn btn-sm btn-warning float-end" onclick="open_modal_reset('`+result[xi].name_rank+`');">
													<i class="fa-solid fa-rotate"></i> รีเซ็ตการแจ้งเตือน `+result[xi].name_rank+`
												</span>
											</h5>
										</div>
										<hr>
										<div id="content_video_congrats_rank_`+result[xi].name_rank+`"  class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
										</div>
									</div>
								</div>
		        	`;
		        	content_video_congrats.insertAdjacentHTML('beforeend', html_rank_type); // แทรกล่างสุด

		        	if( parseInt(xi + 1) == result.length){
		        		get_data_video_congrats_all();
		        	}
		        }

		        create_show_status_type_rank();

	    		});
    }

    function get_data_video_congrats_all(){
    	fetch("{{ url('/') }}/api/get_data_video_congrats_all")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            for (let i = 0; i < result.length; i++) {

		            let for_rank = document.querySelector('#content_video_congrats_rank_'+result[i].for_rank);
		            	// content_video_congrats.innerHTML = '';

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
				            	let data_log = JSON.parse(result[i].log);
				            		// console.log(data_log);

								if(result[i].log){
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
									text_guide = "(คุณเปิดใช้งานวิดีโอนี้อยู่)";
									color_status = "success";
								}
								else{
									input_checked = "";
									text_guide = "(หากเปิดใช้งานวิดีโอที่เปิดใช้งานอยู่จะถูกปิด)";
									color_status = "danger";
								}

	            	let html = `
	            		<div class="col">
										<div class="card">
											<video id="tag_video_congrats" src="`+result[i].video+`" controls muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
											<div class="card-body">
												<h5 class="card-title">
													<b>`+result[i].name_video+`</b>
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
														<a href="{{ url('/view_video_congrats') }}/`+result[i].id+`" type="button" class="btn btn-sm btn-info">
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

	            	for_rank.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
	            }
	        });
    }

    function change_status(click_id){
    	fetch("{{ url('/') }}/api/change_status_video_congrats/" + click_id)
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            create_show_status_type_rank();

	            let text_guide_for ;
	            let input_of ;

	            if(result){
	            	if(result['off']){
	            		text_guide_for = document.querySelector('[text_guide_for="'+result['off']+'"]');
	            			text_guide_for.innerHTML = "(หากเปิดใช้งานวิดีโอที่เปิดใช้งานอยู่จะถูกปิด)";
	            			text_guide_for.setAttribute('class' , 'text-danger');

	            			let div_toggle_status = document.querySelector('#div_toggle_status_'+result['off']);
	            				div_toggle_status.innerHTML = `
	            					<input id="input_of_`+result['off']+`" class="toggle-checkbox" type="checkbox">
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
	            				`;
			            		// input_of = document.querySelector('#input_of_'+result['off']);
			            		// 	input_of.removeAttribute('checked');
	            	}

	            	if(result['open']){
	            		text_guide_for = document.querySelector('[text_guide_for="'+result['open']+'"]');
	            			text_guide_for.innerHTML = "(คุณเปิดใช้งานวิดีโอนี้อยู่)";
	            			text_guide_for.setAttribute('class' , 'text-success');;
	            		// input_of = document.querySelector('#input_of_'+result['open']);
	            		// 	input_of.setAttribute('checked');
	            	}
	            }

    	});
    }

    function view_content_rank(type){

    	// console.log(type);
    	let text_type = type ;

    	if(type == 'all'){
    		let div_name_rank = document.querySelectorAll('.name_rank');
				div_name_rank.forEach(div_name_rank => {
				    div_name_rank.classList.remove('d-none')
				})

				text_type = 'ทั้งหมด' ;
    	}
    	else{
    		let div_name_rank = document.querySelectorAll('.name_rank');
				div_name_rank.forEach(div_name_rank => {
				    div_name_rank.classList.add('d-none')
				})

				let select_type = document.querySelectorAll('div[name_rank="'+type+'"]');
				select_type.forEach(select_type => {
				    select_type.classList.remove('d-none')
				})
    	}


    	document.querySelector('#text_show_view_now').innerHTML = text_type ;

    }


    function create_show_status_type_rank(){

    	fetch("{{ url('/') }}/api/get_rank_type_video_congrats")
        .then(response => response.json())
        .then(result => {
            // console.log(result);

			      let show_status_type_rank = document.querySelector('#show_status_type_rank');
			      		show_status_type_rank.innerHTML = '';

			      let html_view_all = `
			      	<div class="col-9">
								<div class="form-check" style="margin-top:5px;">
									<input class="form-check-input d-none" type="checkbox" id="" disabled>
									<label style="margin-top:3px;" class="form-check-label" for="">
										ดูทั้งหมด
									</label>
								</div>
							</div>
							<div class="col-3">
								<span class="btn btn-sm btn-primary float-end" onclick="view_content_rank('all')">
									&nbsp;<i class="fa-solid fa-eye"></i>
								</span>
							</div>
							<center>
								<hr style="width: 98%;" class="mt-3 mb-3">
							</center>
			      `;

			      show_status_type_rank.insertAdjacentHTML('beforeend', html_view_all); // แทรกล่างสุด

			    	for (let ii = 0; ii < result.length; ii++) {

			      	let check_checked = ``;
			      	if(result[ii].check_active){
			      		check_checked = 'checked disabled';
			      	}
			      	else{
			      		check_checked = 'disabled';
			      	}

			      	let html_show_status = `
			      		<div class="col-9">
									<div class="form-check" style="margin-top:5px;">
										<input class="form-check-input" type="checkbox" id="" `+check_checked+`>
										<label style="margin-top:3px;" class="form-check-label" for="">
											`+result[ii].name_rank+`
										</label>
									</div>
								</div>
								<div class="col-3">
									<span class="btn btn-sm btn-primary float-end" onclick="view_content_rank('`+result[ii].name_rank+`')">
										&nbsp;<i class="fa-solid fa-eye"></i>
									</span>
								</div>
								<center>
									<hr style="width: 98%;" class="mt-3 mb-3">
								</center>
			      	`;

			      	show_status_type_rank.insertAdjacentHTML('beforeend', html_show_status); // แทรกล่างสุด
			      }
       	});

    }

    function open_modal_reset(type){
    	// console.log(type);
			document.querySelector('#modal_body_question').classList.remove('d-none');
	    document.querySelector('#btn_cf_reset_video_congrats').classList.remove('d-none');
	    document.querySelector('#modal_body_success').classList.add('d-none');

    	document.querySelector('#span_name_tyep').innerHTML = type ;
    	document.querySelector('#btn_cf_reset_video_congrats').setAttribute('onclick' , 'reset_check_video_congrats("'+type+'");') ;

    	document.querySelector('#btn_open_modal_reset_video_congrats').click();
    }

    function reset_check_video_congrats(type){
    	fetch("{{ url('/') }}/api/reset_check_video_congrats" + "/" + type)
	        .then(response => response.text())
	        .then(result => {
	            // console.log(result);

	        	if(result == "success"){
	        		document.querySelector('#modal_body_question').classList.add('d-none');
	        		document.querySelector('#btn_cf_reset_video_congrats').classList.add('d-none');
	        		document.querySelector('#modal_body_success').classList.remove('d-none');
	        	}
    	});
    }
</script>

@endsection
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

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="ms-auto">
		<div class="btn-group">
			<a href="{{ url('/create_video_welcome_page') }}" class="btn btn-primary">
				<i class="fa-solid fa-layer-plus"></i> สร้างใหม่
			</a>
		</div>
	</div>
</div>

<div id="content_video_intro" class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
	<!-- content_video_intro -->
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
        get_data_video_intro_all();
    });

    function get_data_video_intro_all(){
    	fetch("{{ url('/') }}/api/get_data_video_intro_all")
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            let content_video_intro = document.querySelector('#content_video_intro');
	            	content_video_intro.innerHTML = '';

	            for (let i = 0; i < result.length; i++) {

	            	let datetime = result[i].created_at;
					// แยกวันที่และเวลา
					let [date, time] = datetime.split('T');
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
								<video id="tag_video_intro" src="`+result[i].video+`" controls muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
								<div class="card-body">
									<h5 class="card-title">
										<b>`+result[i].name_video+`</b>
									</h5>
									<p class="card-text">
										`+time_create+`
									</p>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<span class="float-start" style="margin-top: 7px;">
											ดูแล้ว `+countLv2+` ครั้ง จากผู้ใช้ `+countLv1+` คน
										</span>
										<span class="float-end">
											<a href="{{ url('/view_video_intro') }}/`+result[i].id+`" type="button" class="btn btn-sm btn-info">
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

	            	content_video_intro.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
	            }
	        });
    }

    function change_status(click_id){
    	fetch("{{ url('/') }}/api/change_status_video_intro/" + click_id)
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

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
</script>

@endsection
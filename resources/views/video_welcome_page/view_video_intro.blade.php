@extends('layouts.theme_admin')

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="row g-0">
				<div class="col-md-6">
					<video id="tag_video_intro" src="{{ $video_welcome_page->video }}" controls muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
				</div>
				<div class="col-md-6">
					<div class="card-body p-3">
						<h4 class="card-title">
							<b>{{ $video_welcome_page->name_video }}</b>
						</h4>
						<p class="card-text">
							<small class="text-muted" id="time_create">
								<!-- time_create -->
							</small>
						</p>
						<p id="text_amount_log" class="card-text">
							<!-- text_amount_log -->
						</p>
						@php
							if($video_welcome_page->status == 'Yes'){
								$status = 'เปิดใช้งาน';
								$class_status = 'success';
							}
							else{
								$status = 'ไม่ได้เปิดใช้งาน';
								$class_status = 'danger';
							}
						@endphp
						<p class="card-text">
							สถานะ <b class="text-{{ $class_status }}">{{ $status }}</b>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@if( !empty($video_welcome_page->log) )
<div class="card border-top border-0 border-4 border-primary">
	<div class="card-body p-5">
		<div class="card-title d-flex align-items-center">
			<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
			</div>
			<h5 class="mb-0 text-primary">รายชื่อสมากชิก</h5>
		</div>
		<hr>
		<div class="accordion" id="div_content_list_user">
			<!-- CONTENT -->
		</div>
	</div>
</div>
@endif

<script>
	
document.addEventListener('DOMContentLoaded', function () {
    change_format_date();
    change_format_log();
});

function change_format_date(){
	let datetime = "{{ $video_welcome_page->created_at }}";
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

	document.querySelector('#time_create').innerHTML = time_create;
}

function change_format_log(){
	// Amount log
	let countLv1 = 0 ;
	let countLv2 = 0 ;
	let text_log;

	if("{{ $video_welcome_page->log }}"){
		// แปลง HTML encoded string ให้เป็น string ปกติ
		let log_DB = "{{ $video_welcome_page->log }}";
			log_DB = log_DB.replace(/&quot;/g, '"');
		// แปลง string ให้เป็น JSON object
		let data_log = JSON.parse(log_DB);
			// console.log(data_log);

		// นับจำนวนระดับทั้งหมดใน Level 1
		countLv1 = Object.keys(data_log).length;

		// นับจำนวนระดับทั้งหมดใน Level 2
		countLv2 = Object.values(data_log).reduce((acc, val) => acc + Object.keys(val).length, 0);
		text_log = `ดูแล้ว `+countLv2+` ครั้ง จากผู้ใช้ `+countLv1+` คน` ;

		get_data_users_view();
	}
	else{
		text_log = `ยังไม่มีการดู` ;
	}

	document.querySelector('#text_amount_log').innerHTML = text_log ;
}

function get_data_users_view(){
	let log_DB = "{{ $video_welcome_page->log }}";
		log_DB = log_DB.replace(/&quot;/g, '"');
	// แปลง string ให้เป็น JSON object
	let data_log = JSON.parse(log_DB);
		// console.log(data_log);

	// ดึงคีย์ของระดับ 1
	let user_id_arr = Object.keys(data_log);
		// console.log(user_id_arr); // ผลลัพธ์: ['5', '1']

	let div_content_list_user = document.querySelector('#div_content_list_user');
		div_content_list_user.innerHTML = '';

	// วนลูประดับแรก (key ระดับบนสุด)
    for (const key in data_log) {
        // console.log(`Key: ${key}`);
        const innerData = data_log[key];

        let html_Lv1 = `
        	<div class="accordion-item">
				<h2 class="accordion-header" id="heading_id_${key}">
				  	<div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_id_${key}" aria-expanded="false" aria-controls="collapse_id_${key}">
				  		<div class="col-2">
				  			<center>
				  				<img id="img_for_id_${key}" src="{{ url('/img/icon/profile.png') }}" class="rounded-circle" width="60" height="60" alt="">
				  			</center>
				  		</div>
				  		<div class="col-9">
				  			<h6 class="mb-1 font-14">
				  				Name : <span id="name_for_id_${key}"></span>
				  			</h6>
							<p class="mb-0 font-13 text-secondary">
								Account : <span id="account_for_id_${key}"></span>
							</p>
							<p class="mt-3 font-15 text-secondary">
								ดูทั้งหมด <b id="count_for_id_${key}" class="text-primary"></b> รอบ
							</p>
				  		</div>
				  	</div>
				</h2>
				<div id="collapse_id_${key}" class="accordion-collapse collapse" aria-labelledby="heading_id_${key}" data-bs-parent="#div_content_list_user" style="">
					<div class="accordion-body">
						<div id="detail_CountTime_id_${key}" class="row">
							
						</div>
					</div>
				</div>
			</div>
        `;

        div_content_list_user.insertAdjacentHTML('beforeend', html_Lv1); // แทรกล่างสุด
        
        let detail_CountTime = document.querySelector('#detail_CountTime_id_'+key); 
        let amount_CountTime = 0;

        // วนลูประดับที่สอง (key ภายในระดับบนสุด)
        for (const innerKey in innerData) {
            const entry = innerData[innerKey];
            // console.log(`  Inner Key: ${innerKey}`);
            // console.log(`    Datetime: ${entry.datetime}`);
            // console.log(`    CountTime: ${entry.countTime}`);

            let format_countTime = formatTime(entry.countTime);

            let html_Lv2 = `
            	<div class="col-2 mt-2">
					รอบที่ : <b class="text-primary">${innerKey}</b>
				</div>
            	<div class="col-5 mt-2">
					วันที่ / เวลา : <b class="text-primary">${entry.datetime}</b>
				</div>
				<div class="col-5 mt-2">
					เวลาที่ดู : <b class="text-primary">${format_countTime}</b>
				</div>
            `;

       	 	detail_CountTime.insertAdjacentHTML('afterbegin', html_Lv2); // แทรกบนสุด
       	 	amount_CountTime = amount_CountTime + 1;

        }

        document.querySelector('#count_for_id_'+key).innerHTML = amount_CountTime;

    }

    // DATA User
    for (let i = 0; i < user_id_arr.length; i++) {
    	// console.log(user_id_arr[i]);

    	fetch("{{ url('/') }}/api/get_user_for_view_CountTime/" + user_id_arr[i])
	        .then(response => response.json())
	        .then(result => {
	            // console.log(result);

	            document.querySelector('#account_for_id_'+user_id_arr[i]).innerHTML = result['account'];
	            document.querySelector('#name_for_id_'+user_id_arr[i]).innerHTML = result['name'];

	            if(result['photo']){
		            document.querySelector('#img_for_id_'+user_id_arr[i]).setAttribute('src',result['photo']);
	            }

	        });
    }
}

function formatTime(seconds) {
    const hours = Math.floor(seconds / 3600);
    const minutes = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;

    let result = '';
    if (hours > 0) {
        result += `${hours} ชั่วโมง `;
    }
    if (minutes > 0 || hours > 0) { // แสดงนาทีถ้ามีชั่วโมงหรือมีนาที
        result += `${minutes} นาที `;
    }
    result += `${secs} วินาที`;

    return result.trim();
}

</script>

@endsection
@extends('layouts.theme_admin')

@section('content')

<div class="row">
	<div class="col-8">
		<!--end breadcrumb-->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<div id='calendar'></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-4">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="ms-auto">
				<!-- <button type="button" class="btn btn-sm btn-primary">
					<i class="fa-sharp fa-solid fa-ballot-check"></i> กิจกรรมทั้งหมด
				</button> -->
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa-solid fa-grid-2-plus"></i> เพิ่มเนื้อหาใหม่
					</button>
					<ul class="dropdown-menu" style="margin: 0px;">
						@if(Auth::check())
                    		@if(Auth::user()->role == "Super-admin")
							<li>
								<a href="{{ url('/activitys/create') }}" class="dropdown-item">
									กิจกรรม
								</a>
							</li>
							@endif
                		@endif
						<li>
							<a href="{{ url('/appointment_create') }}" class="dropdown-item">
								ตารางอบรม / สอบ
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-body">
				<!-- กิจกรรมที่ 1 -->
				<div class="col">
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="ms-auto">
							<button id="btn_view_primary" type="button" class="btn btn-sm btn-primary" onclick="change_select_view('primary');">
								ทั้งหมด
							</button>
							<button id="btn_view_info" type="button" class="btn btn-sm btn-outline-info" onclick="change_select_view('info');">
								กิจกรรม
							</button>
							<button id="btn_view_success" type="button" class="btn btn-sm btn-outline-success" onclick="change_select_view('success');">
								ตารางอบรม
							</button>
							<button id="btn_view_warning" type="button" class="btn btn-sm btn-outline-warning" onclick="change_select_view('warning');">
								ตารางสอบ
							</button>
						</div>
					</div>

					<script>
						function change_select_view(type){

							document.querySelector('#btn_view_primary').classList.remove('btn-primary');
							document.querySelector('#btn_view_info').classList.remove('btn-info');
							document.querySelector('#btn_view_success').classList.remove('btn-success');
							document.querySelector('#btn_view_warning').classList.remove('btn-warning');

							document.querySelector('#btn_view_primary').classList.add('btn-outline-primary');
							document.querySelector('#btn_view_info').classList.add('btn-outline-info');
							document.querySelector('#btn_view_success').classList.add('btn-outline-success');
							document.querySelector('#btn_view_warning').classList.add('btn-outline-warning');

							document.querySelector('#btn_view_'+type).classList.remove('btn-outline-'+type)
							document.querySelector('#btn_view_'+type).classList.add('btn-'+type)

							if(type == 'primary'){
								let item_list = document.querySelectorAll('.item_list');
									item_list.forEach(item_list => {
										item_list.classList.remove('d-none')
									})
							}
							else{

								let item_list = document.querySelectorAll('.item_list');
									item_list.forEach(item_list => {
										item_list.classList.add('d-none')
									})

								let name_div_type ;
								if (type == 'info') {
									name_div_type = 'activitys' ;
								}
								else if(type == 'success'){
									name_div_type = 'train' ;
								}
								else if(type == 'warning'){
									name_div_type = 'quiz' ;
								}

								let div_type = document.querySelectorAll('[div_type="'+name_div_type+'"]');
									div_type.forEach(div_type => {
										div_type.classList.remove('d-none')
									})
							}

						}
					</script>

					<div id="div_content">
						<!--  -->
					</div>

					<!-- <div class="card radius-10 bg-success bg-gradient">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-white">2024-04-07 - 2024-04-10</p>
									<h5 class="my-1 text-white">Long Event</h5>
								</div>
								<div class="text-white ms-auto" style="font-size: 20px;">
									<i class="fa-solid fa-pen-to-square"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="card radius-10 bg-info bg-gradient">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-white">2024-04-12 10:30:00 - 12:30:00</p>
									<h5 class="my-1 text-white">Meeting</h5>
								</div>
								<div class="text-white ms-auto" style="font-size: 20px;">
									<i class="fa-solid fa-pen-to-square"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="card radius-10 bg-info bg-gradient">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-white">2024-04-12 12:00:00</p>
									<h5 class="my-1 text-white">Lunch</h5>
								</div>
								<div class="text-white ms-auto" style="font-size: 20px;">
									<i class="fa-solid fa-pen-to-square"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="card radius-10 bg-info bg-gradient">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-white">2024-04-12 20:00:00</p>
									<h5 class="my-1 text-white">Dinner</h5>
								</div>
								<div class="text-white ms-auto" style="font-size: 20px;">
									<i class="fa-solid fa-pen-to-square"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="card radius-10 bg-danger bg-gradient">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-white">2024-04-13 07:00:00</p>
									<h5 class="my-1 text-white">Birthday Party</h5>
								</div>
								<div class="text-white ms-auto" style="font-size: 20px;">
									<i class="fa-solid fa-pen-to-square"></i>
								</div>
							</div>
						</div>
					</div> -->

				</div>
			</div>
		</div>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {

		get_data_for_calendar();
		
	});

	var data_arr_events = [] ;

	function get_data_for_calendar(){

		fetch("{{ url('/') }}/api/get_data_for_calendar")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){

	                let item_type ;
	                // Loop เพื่อหาชื่อ key แรกของแต่ละตัว
					Object.keys(result).forEach(key => {
					    // console.log(`Key แรกของ ${key}:`);
					    item_type = key ;
					    // ข้อมูล array ภายใน key แต่ละตัว
					    const arrayData = result[key];

					    arrayData.forEach(item => {

					        // console.log(item);
					        // console.log(item.title);

					        let class_color = ``;
					        let bg_color = ``;
					        let hashtag = ``;

					        if(key == 'activitys'){
					        	class_color = `info`;
					        	bg_color = `#0dcaf0`;
					        	hashtag = `#กิจกรรม` + `  ` + `#` + item.name_type;
					        }
					        else if(key == 'train'){
					        	class_color = `success`;
					        	bg_color = `#29cc39`;
					        	hashtag = `#` + item.type + `  ` + `#` + item.type_article;
					        }
					        else if(key == 'quiz'){
					        	class_color = `warning`;
					        	bg_color = `#ffc107`;
					        	hashtag = `#` + item.type + `  ` + `#` + item.type_article;
					        }

					        let newEvent = {
						        title: item.title,
						        backgroundColor: bg_color,
						    };

					        let date_time = ``;
					        let arr_start_time = {};

					        if(item.all_day == 'Yes'){
					        	let format_date_start = formatThaiDate(item.date_start);
					        	date_time = format_date_start;

					        	newEvent.start = item.date_start;
					        	
					        }else{
					        	if(item.date_start == item.date_end){
					        		let format_date_start = formatThaiDate(item.date_start);
					        		let format_time_start = formatTime(item.time_start);
					        		let format_time_end = formatTime(item.time_end);
					        		date_time = format_date_start + `<br>`+format_time_start+` - `+format_time_end ;

					        		newEvent.start = item.date_start+'T'+item.time_start;
					        		newEvent.end = item.date_start+'T'+item.time_end;
					        	}
					        	else{
					        		let format_date_start = formatThaiDate(item.date_start);
					        		let format_date_end = formatThaiDate(item.date_end);
					        		let format_time_start = formatTime(item.time_start);
					        		let format_time_end = formatTime(item.time_end);

					        		date_time = format_date_start +` `+format_time_start+ ` - `+format_date_end +` `+format_time_end;

					        		newEvent.start = item.date_start;
					        		newEvent.end = item.date_end;

					        	}
					        }
						    
						    let html = `
						    	<div div_type="`+key+`" class="item_list card radius-10 bg-`+class_color+` bg-gradient">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div>
												<p style="font-size:12px;" class="mb-0 text-white">`+date_time+`</p>
												<hr>
												<p style="font-size:14px;" class="mb-0 text-white">`+hashtag+`</p>
												<h5 class="my-1 text-white">`+item.title+`</h5>
											</div>
											<div class="text-white ms-auto" style="font-size: 20px;">
												<i class="fa-solid fa-pen-to-square"></i>
											</div>
										</div>
									</div>
								</div>
						    `;

						    let div_content = document.querySelector('#div_content');
						    div_content.insertAdjacentHTML('beforeend', html);

						    

						    // เพิ่มข้อมูลใหม่เข้าไปในอาร์เรย์ data_arr_events
						    data_arr_events.push(newEvent);

						});
					});

                }

            });

		setTimeout(() => {
			create_calendar(data_arr_events);
        }, 500);
	}

	function create_calendar(data_arr_events){

		const currentDate = new Date();
		const year = currentDate.getFullYear();
		const month = String(currentDate.getMonth() + 1).padStart(2, '0');
		const day = String(currentDate.getDate()).padStart(2, '0');

		const formattedDate = `${year}-${month}-${day}`;
		// console.log(formattedDate);

		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			// เปิดลิงก์ในแท็บใหม่
			eventClick: function(info) {
		        info.jsEvent.preventDefault(); // ป้องกันการโหลดหน้าเว็บ
		        if(info.event.url){
			        window.open(info.event.url, '_blank');
		        }
		    },
			headerToolbar: {
				left: 'prev,next',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
			},
			initialView: 'dayGridMonth',
			initialDate: formattedDate,
			navLinks: false, // can click day/week names to navigate views
			selectable: true,
			nowIndicator: true,
			dayMaxEvents: true, // allow "more" link when too many events
			editable: false,
			selectable: true,
			businessHours: true,
			dayMaxEvents: true, // allow "more" link when too many events
			events: data_arr_events,

		});
		calendar.render();
	}

	function formatThaiDate(dateString) {
	    const months = [
	        'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
	        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
	    ];
	    const days = [
	        'วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ',
	        'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์'
	    ];

	    const date = new Date(dateString);
	    const dayOfWeek = days[date.getDay()];
	    const day = date.getDate();
	    const month = months[date.getMonth()];
	    const year = date.getFullYear() + 543; // แปลงเป็นพุทธศักราช

	    return `${dayOfWeek}ที่ ${day} เดือน ${month} ${year}`;
	}

	function formatTime(timeString) {
	    const [hours, minutes] = timeString.split(':');
	    return `${hours}:${minutes} น.`;
	}
</script>

@endsection
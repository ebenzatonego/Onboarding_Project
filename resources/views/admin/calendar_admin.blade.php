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
						<li>
							<a class="dropdown-item">
								กิจกรรม
							</a>
						</li>
						<li>
							<a class="dropdown-item">
								ตารางอบรม / สอบ
							</a>
						</li>
						<li>
							<a class="dropdown-item">
								ข่าว
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
							<button type="button" class="btn btn-sm btn-primary">
								ทั้งหมด
							</button>
							<button type="button" class="btn btn-sm btn-outline-primary">
								ตารางอบรม / สอบ
							</button>
							<button type="button" class="btn btn-sm btn-outline-primary">
								กิจกรรม
							</button>
							<button type="button" class="btn btn-sm btn-outline-primary">
								ข่าว
							</button>
						</div>
					</div>

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
                console.log(result);

				for (let i = 0; i < result.length; i++) {
				    // สร้างข้อมูลใหม่ที่ต้องการเพิ่ม

					let newEvent ;
				    if(result[i].link_lms){
				        newEvent = {
					        title: result[i].name_article,
					        url: result[i].link_lms,
					        start: result[i].start_date
					    };
				    }
				    else{
				    	newEvent = {
					        title: result[i].name_article,
					        start: result[i].start_date
					    };
				    }
				    
				    // เพิ่มข้อมูลใหม่เข้าไปในอาร์เรย์ data_arr_events
				    data_arr_events.push(newEvent);

				    let html = `
				    	<div class="card radius-10 bg-info bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">`+result[i].start_date+`</p>
										<h5 class="my-1 text-white">`+result[i].name_article+`</h5>
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
				}

            });

        data_arr_events = [
		    {
		        title: 'Go To Home',
		        url: "{{ url('/home') }}",
		        start: '2024-04-01'
		    },
		    {
		        title: 'Long Event',
		        start: '2024-04-07',
		        end: '2024-04-10',
		        backgroundColor: '#00BF2D'
		    },
		    {
		        title: 'Meeting',
		        start: '2024-04-12T10:30:00',
		        end: '2024-04-12T12:30:00'
		    },
		    {
		        title: 'Lunch',
		        start: '2024-04-12T12:00:00'
		    },
		    {
		        title: 'Dinner',
		        start: '2024-04-12T20:00:00'
		    },
		    {
		        title: 'Birthday Party',
		        start: '2024-04-13T07:00:00',
		        backgroundColor: 'red'
		    }
		];

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
			navLinks: true, // can click day/week names to navigate views
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
</script>

@endsection
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
		<center>
			<div class="ms-auto">
				<button type="button" class="btn btn-sm btn-primary">
					<i class="fa-sharp fa-solid fa-ballot-check"></i> กิจกรรมทั้งหมด
				</button>
				<button type="button" class="btn btn-sm btn-outline-primary">
					<i class="fa-solid fa-grid-2-plus"></i> เพิ่มกิจกรรม
				</button>
			</div>
		</center>

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

					<div class="card radius-10 bg-success bg-gradient">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {

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
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
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
			events: [
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
			]
		});
		calendar.render();
	});
</script>

@endsection
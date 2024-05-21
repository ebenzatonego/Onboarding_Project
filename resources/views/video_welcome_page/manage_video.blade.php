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

<div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
	<div class="col">
		<div class="card">
			<video id="tag_video_intro" src="https://www.franchisebuilder2024.com/video/The%20Franchise%20Builder_Final.mp4" controls muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
			<div class="card-body">
				<h5 class="card-title">
					Intro
				</h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<span class="float-start" style="margin-top: 7px;">
						ดูแล้ว 12 ครั้ง จากผู้ใช้ 8 คน
					</span>
					<span class="float-end">
						<button type="button" class="btn btn-sm btn-info">View log</button>
					</span>
				</li>
			</ul>
			<center>
				<hr style="width:80%;">
			</center>
			<div class="card-body">
				<div class="toggle-wrapper">
				  	<input class="toggle-checkbox" type="checkbox">
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
					<span class="text-danger">
						(หากเปิดใช้งานวิดีโอที่เปิดใช้งานอยู่จะถูกปิด)
					</span>
				</center>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<img src="assets/images/gallery/06.png" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Cras justo odio</li>
				<li class="list-group-item">Dapibus ac facilisis in</li>
				<li class="list-group-item">Vestibulum at eros</li>
			</ul>
			<div class="card-body">	<a href="#" class="card-link">Card link</a>
				<a href="#" class="card-link">Another link</a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<img src="assets/images/gallery/07.png" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">Card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Cras justo odio</li>
				<li class="list-group-item">Dapibus ac facilisis in</li>
				<li class="list-group-item">Vestibulum at eros</li>
			</ul>
			<div class="card-body">	<a href="#" class="card-link">Card link</a>
				<a href="#" class="card-link">Another link</a>
			</div>
		</div>
	</div>
</div>

@endsection
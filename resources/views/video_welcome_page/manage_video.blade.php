@extends('layouts.theme_admin')

@section('content')

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
			<img src="assets/images/gallery/05.png" class="card-img-top" alt="...">
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
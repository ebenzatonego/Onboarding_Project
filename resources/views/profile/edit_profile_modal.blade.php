<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

	.img-container img {
		max-width: 100%;
		max-height: 200px;
	}

	.cropper-crop-box,
	.cropper-view-box {
		border-radius: 50%;
	}

	.user-new-img {
		width: 195px;
		height: 195px;
		border-radius: 50%;
	}

	
	.btn-edit-profile img {
		width: 47px;
		height: 47px;
	}

	.cropper-container {
		margin-top: 30px;
	}
	.img-container {
		min-height: 200px;
		max-height: 500px;
	}
</style>
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-profile">
			<div id="form_profile">
				<p class="text-white text-center mb-2">เลือกรูปของคุณ</p>
				<div class="modal-body d-flex justify-content-center ">
					<div class="position-relative" id="select-new-profile">

						<label class="picture " for="picture_profile_input" tabIndex="0" style="position: relative;" >

							@if(!empty(Auth::user()->photo))
							<img src="{{ Auth::user()->photo }}" alt="">
							@else
							<span class="picture_profile_image"></span>

							@endif

						</label>
						@if(!empty(Auth::user()->photo))
						<label for="picture_profile_input" class="position-absolute" style="bottom: 15px;right: 15px;cursor: pointer;">
							<img src="{{ url('/img/icon/edit-img.png') }}" width="39" height="39">
						</label>
						@endif
					</div>

					<div class="position-relative d-none" id="preview-new-profile">
						<label class="picture " for="picture_profile_input" tabindex="0" style="position: relative;object-fit: cover;">
							<img id="preview_crop_profile" src="{{url('img/icon/ad.png')}}" alt="" style="width: 100%; height: 100%;">
						</label>
						<label for="picture_profile_input" class="position-absolute" style="bottom: 15px;right: 15px;cursor: pointer;">
							<img src="{{ url('/img/icon/edit-img.png') }}" width="39" height="39">
						</label>
					</div>
					<input type="file" name="picture_profile_input" id="picture_profile_input" accept="image/*">

				</div>
				<div class="px-5">

					<div class="row mb-4">
						<div class="col-12">
							<h6 class="mb-0 text-white">ชื่อ</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" value="{{Auth::user()->name}}">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">
							<h6 class="mb-0 text-white">ชื่อเล่น</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" value="{{Auth::user()->nickname}}">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">
							<h6 class="mb-0 text-white">เบอร์โทร</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" value="{{Auth::user()->phone}}">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<h6 class="mb-0 text-white">อีเมล</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" value="{{Auth::user()->email}}">
						</div>
					</div>
				</div>
				<div class="w-100 px-5 mt-5">
					<button class="btn w-100 bg-white btn-submit-profile" disabled id="btn_submit_change_profile">
						ตกลง
					</button>

				</div>
			</div>

			<div id="crop_profile" class="d-none">
				<div class="">
					<div class="img-container">
						<img id="uploadedAvatar" class="d-none" src="https://avatars0.githubusercontent.com/u/3456749">
					</div>
					<div class="w-100 px-5 mt-5">
					<button class="btn w-100 bg-white btn-submit-profile" id="crop">
					Crop
					</button>

				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script>
	window.addEventListener('DOMContentLoaded', function() {
		let avatar = document.getElementById('preview_crop_profile');
		let profile_img = document.getElementById('profile-img');
		let image = document.getElementById('uploadedAvatar');
		let input = document.getElementById('picture_profile_input');
		let cropBtn = document.getElementById('crop');
		let $modal = $('#cropAvatarmodal');
		let cropper;

		input.addEventListener('change', function(e) {
			
			let files = e.target.files;
			let done = function(url) {
				console.log(input.value)
				image.src = url;

				// $modal.modal('show');
				cropper = new Cropper(image, {
					aspectRatio: 1 / 1, // Maintain a 1:1 aspect ratio for the crop
					viewMode: 1,
					autoCropArea: 1
				});
			};

			let file = files[0];
			reader = new FileReader();
			reader.onload = function(e) {
				document.getElementById('form_profile').classList.add('d-none');
				document.getElementById('crop_profile').classList.remove('d-none');
				done(reader.result);
			};
			reader.readAsDataURL(file);
		});

		// $modal.on('hidden.bs.modal', function() {
		// 	if (cropper) {
		// 		cropper.destroy();
		// 		cropper = null;
		// 	}
		// });

		cropBtn.addEventListener('click', function() {
			document.getElementById('form_profile').classList.remove('d-none');
			document.getElementById('crop_profile').classList.add('d-none');
			document.getElementById('select-new-profile').classList.add('d-none');
			document.getElementById('preview-new-profile').classList.remove('d-none');

			let canvas;

			if (cropper) {
				canvas = cropper.getCroppedCanvas({
					width: 160,
					height: 160,
				});
				avatar.src = canvas.toDataURL();
				// profile_img.src = canvas.toDataURL();

				cropper.destroy();
				cropper = null;
				
			}
		});
	});

</script>
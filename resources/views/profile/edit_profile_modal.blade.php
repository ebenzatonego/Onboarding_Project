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
	.btn-close-modal{
		width: 30px !important;
		height: 30px !important;
		border-radius: 50%;
		background-color: #fff !important;
		position: absolute;
		top: 10px;
		right: 10px;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 0;
		margin: 0;

	}
</style>
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-profile">
			<button type="button" class="close  btn-close-modal" data-dismiss="modal" aria-label="Close" style="">
				<i class="fa-solid fa-xmark"></i>
			</button>
			<div id="form_profile">
				<p class="text-white text-center mb-2">เลือกรูปของคุณ</p>
				<div class="modal-body d-flex justify-content-center position-relative">
					<div class="position-relative" id="select-new-profile">
						<label class="picture " for="picture_profile_input" tabIndex="0" style="position: relative;" >

							@if(!empty(Auth::user()->photo))
							<img src="{{ Auth::user()->photo }}" alt="" style="width: 100%; height: 100%;">
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
							<h6 class="mb-0 text-white">ชื่อเล่น</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" name="edit_nickname" id="edit_nickname" value="{{Auth::user()->nickname}}">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12">
							<h6 class="mb-0 text-white">เบอร์โทร</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" name="edit_phone" id="edit_phone" value="{{Auth::user()->phone}}">
						</div>
					</div>
					@if(Auth::user()->current_rank == "AG")
					<div class="row">
						<div class="col-12">
							<h6 class="mb-0 text-white">อีเมล</h6>
						</div>
						<div class="col-sm-12 text-secondary">
							<input type="text" class="form-control" name="edit_email" id="edit_email" value="{{Auth::user()->email}}">
						</div>
					</div>
					@endif
				</div>
				<div class="w-100 px-5 mt-5">
					<button class="btn w-100 bg-white btn-submit-profile" disabled id="btn_submit_change_profile" onclick="upload_to_firebase();">
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
		let $modal = $('#editProfile');
		let cropper;

		input.addEventListener('change', function(e) {
			
			let files = e.target.files;
			let done = function(url) {
				// console.log(input.value)
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

		$modal.on('hidden.bs.modal', function() {
			document.getElementById('select-new-profile').classList.remove('d-none');
			document.getElementById('preview-new-profile').classList.add('d-none');

			if (cropper) {
				cropper.destroy();
				cropper = null;
				document.getElementById('form_profile').classList.remove('d-none');
				document.getElementById('crop_profile').classList.add('d-none');
			}
		});

		cropBtn.addEventListener('click', function() {
			document.getElementById('form_profile').classList.remove('d-none');
			document.getElementById('crop_profile').classList.add('d-none');
			document.getElementById('select-new-profile').classList.add('d-none');
			document.getElementById('preview-new-profile').classList.remove('d-none');

			let canvas;

			if (cropper) {
				canvas = cropper.getCroppedCanvas({
					width: 512,
					height: 512,
				});
				avatar.src = canvas.toDataURL();
				// profile_img.src = canvas.toDataURL();

				cropper.destroy();
				cropper = null;
				
			}
		});
	});

	function upload_to_firebase(){
		// ดึง Base64 string จาก <img> element
		let imgElement = document.querySelector('#preview_crop_profile');
        let base64String = imgElement.src.split(',')[1]; // ลบ "data:image/png;base64," ออก

        // แปลง Base64 เป็น Blob
        let contentType = 'image/png'; // ตั้งค่าประเภทของรูปภาพ เช่น 'image/png' หรือ 'image/jpeg'
        let blob = base64ToBlob(base64String, contentType);

        // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
        let title = "{{ Auth::user()->account }}";
        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);
        let name_file = Date_for_firebase + '-' + title ;
        let storageRef = storage.ref('/images/profile/' + name_file);

        // อัพโหลด Blob ไปยัง Firebase Storage
        let uploadTask = storageRef.put(blob);

        uploadTask.on('state_changed', 
            function(snapshot) {
                // ติดตามความคืบหน้าของการอัพโหลด (optional)
            }, 
            function(error) {
                // กรณีเกิดข้อผิดพลาดในการอัพโหลด
                console.error('Upload failed:', error);
            }, 
            function() {
                // เมื่ออัพโหลดสำเร็จ
                uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                    // ทำอะไรกับ URL ที่ได้รับเช่นการแสดงผลหรือบันทึกลงฐานข้อมูล
                    // console.log('File available at', downloadURL);
                    let data_arr = [];

                    profile_crop = downloadURL ;
                    let edit_nickname = document.querySelector('#edit_nickname');
					let edit_phone = document.querySelector('#edit_phone');

					if(document.querySelector('#edit_email')){
						let edit_email = document.querySelector('#edit_email');
						data_arr = {
					        "id" : "{{ Auth::user()->id }}",
					        "nickname" : edit_nickname.value,
					        "phone" : edit_phone.value,
					        "email" : edit_email.value,
					        "photo" : profile_crop,
					    }; 
					}
					else{
						data_arr = {
					        "id" : "{{ Auth::user()->id }}",
					        "nickname" : edit_nickname.value,
					        "phone" : edit_phone.value,
					        "photo" : profile_crop,
					    }; 
					}

					fetch("{{ url('/') }}/api/edit_profile", {
			            method: 'post',
			            body: JSON.stringify(data_arr),
			            headers: {
			                'Content-Type': 'application/json'
			            }
			        }).then(function (response){
			            return response.text();
			        }).then(function(data){
			            // console.log(data);
			            if(data == 'success'){
			            	window.location.reload();
			            }
			        }).catch(function(error){
			            // console.error(error);
			        });

                });
            }
        );
	}

	// ฟังก์ชันที่ใช้ในการแปลง Base64 เป็น Blob
    function base64ToBlob(base64, contentType) {
        const byteCharacters = atob(base64);
        const byteArrays = [];

        for (let offset = 0; offset < byteCharacters.length; offset += 512) {
            const slice = byteCharacters.slice(offset, offset + 512);

            const byteNumbers = new Array(slice.length);
            for (let i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            const byteArray = new Uint8Array(byteNumbers);
            byteArrays.push(byteArray);
        }

        return new Blob(byteArrays, { type: contentType });
    }

</script>
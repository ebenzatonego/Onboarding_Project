@extends('layouts.theme_admin')

@section('content')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    tr td {
        vertical-align: middle;
        padding: 10px;
        /* Optional: เพิ่มการเว้นวรรคในเซลล์ */
    }

    .product-img {
        width: 100px;
        height: 100px;
        align-items: center;
        justify-content: center;
    }
</style>

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

    .btn-close-modal {
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

    #preview_crop_profile {
        border-radius: 50%;
    }

    #picture_profile_input {
        display: none;
    }

    .picture {
        border-radius: 50%;
    }.btn-submit-profile {
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        font-weight: bolder;
        color: #fff;
    }

    .btn-submit-profile:disabled {
        background-color: #A3A3A3 !important;
        color: #57759C !important;
    }
</style>

<div class="card border-top border-0 border-4 border-dark">
    <div class="card-body p-5">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="float-start">
                        <h5 class="mb-0 text-dark">
                            <i class="fa-duotone fa-user-group me-2 font-22 text-dark"></i>
                            รายชื่อ Area Supervisor
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12 mt-2">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Nickname</th>
                                <th>Account</th>
                                <th>Area</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="content_tbody" class="">
                            <!-- content_tbody -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="modal fade" id="editAreaSuperVisor" tabindex="-1" role="dialog" aria-labelledby="editAreaSuperVisorTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-profile">
            <button type="button" class="close  btn-close-modal" data-bs-dismiss="modal" aria-label="Close" style="">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div id="form_profile" class="mt-3">
                <p class="text-white text-center mb-2">เลือกรูปของคุณ</p>
                <div class="modal-body d-flex justify-content-center position-relative">
                    <div class="position-relative" id="select-new-profile">
                        <label class="picture " for="picture_profile_input" tabIndex="0" style="position: relative;">
                            <img src="" id="edit_profile_img" alt="" style="width: 100%; height: 100%;max-width: 300px;max-height: 300px;border-radius: 50%;">
                        </label>
                        <label for="picture_profile_input" class="position-absolute" style="bottom: 15px;right: 15px;cursor: pointer;">
                            <img src="{{ url('/img/icon/edit-img.png') }}" width="39" height="39">
                        </label>
                    </div>

                    <div class="position-relative d-none" id="preview-new-profile">
                        <label class="picture " for="picture_profile_input" tabindex="0" style="position: relative;object-fit: cover;">
                            <img id="preview_crop_profile" src="{{url('img/icon/ad.png')}}" alt="" style="width: 100%; height: 100%;;max-width: 300px;max-height: 300px;;border-radius: 50%;">
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
                            <h6 class="mb-0 text-dark">ชื่อ</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="edit_name" id="edit_name" value="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="mb-0 text-dark">ชื่อเล่น</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="edit_nickname" id="edit_nickname" value="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="mb-0 text-dark">Account</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="edit_nickname" id="edit_account" value="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="mb-0 text-dark">Area</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="edit_nickname" id="edit_area" value="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <h6 class="mb-0 text-dark">เบอร์โทร</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="edit_phone" id="edit_phone" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-0 text-dark">อีเมล</h6>
                        </div>
                        <div class="col-sm-12 text-secondary">
                            <input type="text" class="form-control" name="edit_email" id="edit_email" value="">
                        </div>
                    </div>
                </div>
                <div class="w-100 px-5 mt-5 mb-3">
                    <button class="btn w-100 bg-primary btn-submit-profile" id="btn_submit_change_profile" onclick="upload_to_firebase();">
                        ตกลง
                    </button>

                </div>
            </div>

            <div id="crop_profile" class="d-none mt-3">
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


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        area_supervisor();
    });

    function area_supervisor() {

        fetch("{{ url('/') }}/api/get_area_supervisor")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let content_tbody = document.querySelector('#content_tbody');
                content_tbody.innerHTML = '';
                result.forEach(item => {

                    let html = `
                        <tr account="${item.account ? item.account : '-'}" class="member">
                            <td>
                                <div class="product-img">
                                    <img id="profile_supervisor_${item.id}" src="${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}" class="p-1" alt="">
                                    <span class="d-none">
                                    	${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}
                                    </span>
                                </div>
                            </td>
                            <td id="name_supervisor_${item.id}" >${item.name ? item.name : '-'} </td>
                            <td id="nickname_supervisor_${item.id}" >${item.nickname ? item.nickname : '-'}</td>
                            <td id="account_supervisor_${item.id}" >${item.account ? item.account : '-'}</td>
                            <td id="area_supervisor_${item.id}" >${item.area ? item.area : '-'}</td>
                            <td id="phone_supervisor_${item.id}" >${item.phone ? item.phone : '-'}</td>
                            <td id="email_supervisor_${item.id}" >${item.email ? item.email : '-'}</td>
                            <td>
                            	<button class="btn btn-sm btn-warning" onclick="edit_upper_al('${item.id ? item.id : '-'}');">
                            		<i class="fa-solid fa-pen-to-square"></i> Edit
                            	</button>
                            </td>
                        </tr>
                    `;
                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                });

            });
    }

    function edit_upper_al(upper_al_id) {
        // console.log("upper_al_id >> " + upper_al_id);
        document.querySelector('#edit_profile_img').src = document.querySelector(`#profile_supervisor_${upper_al_id}`).src;
        document.querySelector('#edit_name').value = document.querySelector(`#name_supervisor_${upper_al_id}`).innerText;
        document.querySelector('#edit_nickname').value = document.querySelector(`#nickname_supervisor_${upper_al_id}`).innerText;
        document.querySelector('#edit_account').value = document.querySelector(`#account_supervisor_${upper_al_id}`).innerText;
        document.querySelector('#edit_area').value = document.querySelector(`#area_supervisor_${upper_al_id}`).innerText;
        document.querySelector('#edit_phone').value = document.querySelector(`#phone_supervisor_${upper_al_id}`).innerText;
        document.querySelector('#edit_email').value = document.querySelector(`#email_supervisor_${upper_al_id}`).innerText;
        edit_id_area_super_visor = upper_al_id;

        $('#editAreaSuperVisor').modal('show');


    }
</script>
<script>
    var edit_id_area_super_visor;
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

    function upload_to_firebase() {
        // ดึง Base64 string จาก <img> element
        let imgElement = document.querySelector('#preview_crop_profile');

        let base64String = imgElement.src.split(',')[1]; // ลบ "data:image/png;base64," ออก

        let edit_name = document.querySelector('#edit_name').value
        let edit_nickname = document.querySelector('#edit_nickname').value
        let edit_account = document.querySelector('#edit_account').value
        let edit_area = document.querySelector('#edit_area').value
        let edit_phone = document.querySelector('#edit_phone').value
        let edit_email = document.querySelector('#edit_email').value

        


        if (base64String) {
            // แปลง Base64 เป็น Blob
            let contentType = 'image/png'; // ตั้งค่าประเภทของรูปภาพ เช่น 'image/png' หรือ 'image/jpeg'
            let blob = base64ToBlob(base64String, contentType);
            // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
            let title = "{{ Auth::user()->account }}";
            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-' + title;
            let storageRef = storage.ref('/images/profile_area_super_visor/' + name_file);

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

                        profile_crop = downloadURL;
                        // let edit_nickname = document.querySelector('#edit_nickname');
                        // let edit_phone = document.querySelector('#edit_phone');
                        // let edit_email = document.querySelector('#edit_email');
                       

                        data_arr = {
                            "id": edit_id_area_super_visor,
                            "name": edit_name,
                            "nickname": edit_nickname,
                            "account": edit_account,
                            "area": edit_area,
                            "phone": edit_phone,
                            "email": edit_email,
                            "photo": profile_crop,
                        };
                        console.log(data_arr);

                        fetch("{{ url('/') }}/api/edit_area_super_visor", {
                            method: 'post',
                            body: JSON.stringify(data_arr),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(function(response) {
                            return response.text();
                        }).then(function(data) {
                            // console.log(data);
                            if (data == 'success') {
                                window.location.reload();
                            }
                        }).catch(function(error) {
                            // console.error(error);
                        });

                    });
                }
            );
        } else {
            let data_arr = [];

            data_arr = {
                "id": edit_id_area_super_visor,
                "name": edit_name,
                "nickname": edit_nickname,
                "account": edit_account,
                "area": edit_area,
                "phone": edit_phone,
                "email": edit_email,
            };

            fetch("{{ url('/') }}/api/edit_area_super_visor", {
                method: 'post',
                body: JSON.stringify(data_arr),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function(response) {
                return response.text();
            }).then(function(data) {
                // console.log(data);
                if (data == 'success') {
                    window.location.reload();
                }
            }).catch(function(error) {
                // console.error(error);
            });
        }

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

        return new Blob(byteArrays, {
            type: contentType
        });
    }
</script>
@endsection
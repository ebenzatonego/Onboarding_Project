
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* The switch - the box around the slider */
.switch {
  font-size: 12px;
  position: relative;
  padding: 0 0 0 5px;
  display: inline-block;
  width: 5em;
  height: 2.5em;
}

/* Hide default HTML checkbox */
.switch .cb {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.toggle {
  position: absolute;
  cursor: pointer;
  width: 100%;
  height: 100%;
  background-color: #373737;
  border-radius: 0.1em;
  transition: 0.4s;
  text-transform: uppercase;
  font-weight: 700;
  overflow: hidden;
  box-shadow: -0.3em 0 0 0 #373737, -0.3em 0.3em 0 0 #373737,
    0.3em 0 0 0 #373737, 0.3em 0.3em 0 0 #373737, 0 0.3em 0 0 #373737;
}

.toggle > .left {
  position: absolute;
  display: flex;
  width: 50%;
  height: 88%;
  background-color: #f3f3f3;
  color: #373737;
  left: 0;
  bottom: 0;
  align-items: center;
  justify-content: center;
  transform-origin: right;
  transform: rotateX(10deg);
  transform-style: preserve-3d;
  transition: all 150ms;
}

.left::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(206, 206, 206);
  transform-origin: center left;
  transform: rotateY(90deg);
}

.left::after {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(112, 112, 112);
  transform-origin: center bottom;
  transform: rotateX(90deg);
}

.toggle > .right {
  position: absolute;
  display: flex;
  width: 50%;
  height: 88%;
  background-color: #f3f3f3;
  color: rgb(206, 206, 206);
  right: 1px;
  bottom: 0;
  align-items: center;
  justify-content: center;
  transform-origin: left;
  transform: rotateX(10deg) rotateY(-45deg);
  transform-style: preserve-3d;
  transition: all 150ms;
}

.right::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(206, 206, 206);
  transform-origin: center right;
  transform: rotateY(-90deg);
}

.right::after {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: rgb(112, 112, 112);
  transform-origin: center bottom;
  transform: rotateX(90deg);
}

.switch input:checked + .toggle > .left {
  transform: rotateX(10deg) rotateY(45deg);
  color: rgb(206, 206, 206);
}

.switch input:checked + .toggle > .right {
  transform: rotateX(10deg) rotateY(0deg);
  color: #487bdb;
}

/*preview video*/
.cropper-container{
    margin-top: 10px;
}
.container_upload_preview{
  position: relative;
  width: 100%;
  height: 250px;
  border-radius: 10px; 
    -moz-border-radius:10px;
    -khtml-border-radius:10px;
}
.container_upload{
  background-color: #fff;
  border: #2260ff 3px solid;
  width: 100%;
  height: 250px;
  border-radius: 10px; 
    -moz-border-radius:10px;
    -khtml-border-radius:10px;
  position: relative;
  overflow: hidden;
}
.container_upload img{
    object-fit: contain;

}
.upload_section{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #2260ff;
  font-size: 22px;
  display: flex;
  justify-content: center;
}

.btn.disabled {
    pointer-events: none;
    opacity: 0.5;
}

.radio-inputs {
  display: flex;
/*  justify-content: center;*/
  align-items: center;
  max-width: 350px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.radio-inputs > * {
  margin: 6px;
}



.radio-input:checked + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
}


.radio-photo:hover {
  border-color: #2260ff;
}

.radio-input:checked + .radio-photo {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #2260ff;
}

.radio-input:checked + .radio-photo:before {
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}

.radio-input:checked + .radio-photo .radio-icon svg {
  fill: #2260ff;
}

.radio-input:checked + .radio-photo .radio-label {
  color: #2260ff;
}

.radio-input:focus + .radio-photo {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.radio-photo:hover {
  border-color: #2260ff;
}




.radio-video:hover {
  border-color: #db2d2e;
}

.radio-input:checked + .radio-video {
  border-color: #db2d2e;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #db2d2e;
}

.radio-input:checked + .radio-video:before {
  transform: scale(1);
  opacity: 1;
  background-color: #db2d2e;
  border-color: #db2d2e;
}

.radio-input:checked + .radio-video .radio-icon svg {
  fill: #db2d2e;
}

.radio-input:checked + .radio-video .radio-label {
  color: #db2d2e;
}

.radio-input:focus + .radio-video {
  border-color: #db2d2e;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #ffb7b6;
}

.radio-video:hover {
  border-color: #db2d2e;
}
.radio-input:focus + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
}

.radio-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 80px;
  min-height: 80px;
  border-radius: 0.5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
}

.radio-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 0.75rem;
  height: 0.75rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.25rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
}



.radio-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.radio-icon svg {
  width: 2rem;
  height: 2rem;
  fill: #494949;
}

.radio-label {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
  font-size: 13px;
}

.radio-input {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.checkbox-wrapper-46 input[type="checkbox"] {
  display: none;
  visibility: hidden;
}

.checkbox-wrapper-46 .cbx {
  margin: auto;
  -webkit-user-select: none;
  user-select: none;
  cursor: pointer;
}
.checkbox-wrapper-46 .cbx span {
  display: inline-block;
  vertical-align: middle;
  transform: translate3d(0, 0, 0);
}
.checkbox-wrapper-46 .cbx span:first-child {
  position: relative;
  width: 18px;
  height: 18px;
  border-radius: 3px;
  transform: scale(1);
  vertical-align: middle;
  border: 1px solid #9098a9;
  transition: all 0.2s ease;
}
.checkbox-wrapper-46 .cbx span:first-child svg {
  position: absolute;
  top: 3px;
  left: 2px;
  fill: none;
  stroke: #ffffff;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 16px;
  stroke-dashoffset: 16px;
  transition: all 0.3s ease;
  transition-delay: 0.1s;
  transform: translate3d(0, 0, 0);
}
.checkbox-wrapper-46 .cbx span:first-child:before {
  content: "";
  width: 100%;
  height: 100%;
  background: #506eec;
  display: block;
  transform: scale(0);
  opacity: 1;
  border-radius: 50%;
}
.checkbox-wrapper-46 .cbx span:last-child {
  padding-left: 8px;
}
.checkbox-wrapper-46 .cbx:hover span:first-child {
  border-color: #506eec;
}

.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child {
  background: #506eec;
  border-color: #506eec;
  animation: wave-46 0.4s ease;
}
.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child svg {
  stroke-dashoffset: 0;
}
.checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child:before {
  transform: scale(3.5);
  opacity: 0;
  transition: all 0.6s ease;
}

@keyframes wave-46 {
  50% {
    transform: scale(0.9);
  }
}


</style>

<!-- CROPERJS -->
<style>
    
.page {
    margin: 1em auto;
    max-width: 768px;
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    height: 100%;
}

.box {
    padding: 0.5em;
    width: 100%;
    margin:0.5em;
}

.box-2 {
    padding: 0.5em;
    /* width: calc(100%/2 - 1em); */
}

.options label,
.options input{
    width:4em;
    padding:0.5em 1em;
}

.hide {
    display: none;
}

img {
    max-width: 100%;
}
.cropped{
    width: 100% !important;
    max-height: 300px !important;

}
/* .cropper-container{
    max-height: 300px !important;

} */

.mce-branding{
    display: none;
}

</style>


<!-- Modal add_type_training_type -->
<div class="modal fade" id="modal_add_type_training_type" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Label_modal_add_type_training_type" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label_modal_add_type_training_type">
                    เพิ่มประเภทหลักสูตร
                </h5>
            </div>
            <div class="modal-body">
                <input class="form-control" type="text" id="add_training_type" value="" placeholder="ชื่อประเภทหลักสูตร" onchange="check_submit_training_type();">
                <br>
                <label>icon <span class="text-danger">(ไฟล์ PNG ขนาด 1:1)</span></label>
                <br>
                <span class="btn btn-sm btn-primary mt-2" onclick="click_select_icon_training_type();">
                    เลือกรูปภาพ
                </span>

                <input type="file" class="form-control d-none" accept="image/png" name="select_icon_training_type" id="select_icon_training_type" onchange="crop_select_icon_training_type();">

                <div id="div_crop_icon_training_type" class="row p-1 d-none">
                    <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                        <div class="w-100 ">
                            <p class="mb-2 mt-3 text-center">ปรับขนาดภาพ</p>
                            <!-- leftbox -->
                            <div class="box-2 w-100 h-100">
                                <div id="icon_crop" class="result_icon w-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                        <div>
                            <p class="mb-2 mt-3 text-center">ผลลัพธ์</p>
                          <!--rightbox-->
                            <div class="box-2 img-result">
                                <!-- result of crop -->
                                <div class="d-flex justify-content-center align-items-center" style="background-color: #003781;border-radius: 50%;width: 140px;height: 140px;">
                                    <img style="width: 70px;height: 70px;" src="" alt="" id="Preview_icon_crop">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function crop_img_icon(e){
                    let result_icon = document.querySelector('.result_icon')
                    let input = document.getElementById('select_icon_training_type');
                    let image = document.createElement('img');
                    let cropper;
                    let preview_icon_crop = document.querySelector('#Preview_icon_crop');

                    let files = e.target.files;
                    let done = function (url) {
                        input.value = '';
                        image.src = url;
                        document.getElementById('icon_crop').innerHTML = '';
                        document.getElementById('icon_crop').appendChild(image);
                        // cropper = new Cropper(image, {
                        //     aspectRatio: 1 / 1, // Change this to the desired aspect ratio
                        //     viewMode: 3,
                        //     preview: '#Preview_icon_crop'
                        // });
                        cropper = new Cropper(image, {
                            dragMode: 'move',
                            aspectRatio: 1 / 1 ,
                            autoCropArea: 1,
                            center: false,
                            cropBoxMovable: true,
                            cropBoxResizable: true,
                            maxCropBoxHeight: 300,
                            viewMode: 2,
                            guides: false,
                            ready: function(event) {
                                this.cropper = cropper;
                            },crop: function(event) {
                              let imgSrc = this.cropper.getCroppedCanvas({
                                    width: 1080,
                                    height: 1080// input value
                                }).toDataURL("image/png");
                                preview_icon_crop.src = imgSrc;
                            }
                        });
                    };
                    let reader;
                    let file;
                    let url;

                    if (files && files.length > 0) {
                        file = files[0];

                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                done(reader.result_icon);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                }

                var input_img_icon = document.getElementById('select_icon_training_type');
                input_img_icon.addEventListener('change', function (e) {
                    crop_img_icon(e);
                    check_submit_training_type();
                });

                function crop_select_icon_training_type(){
                    document.querySelector('#div_crop_icon_training_type').classList.remove('d-none');
                }

                function click_select_icon_training_type(){
                    // console.log('click_select_icon_training_type');
                    document.querySelector('#div_crop_icon_training_type').classList.add('d-none');

                    let preview_icon_crop = document.querySelector('#Preview_icon_crop');
                        preview_icon_crop.src = '';
                    let icon_crop = document.querySelector('#icon_crop');
                        icon_crop.innerHTML = "";
                    document.querySelector('#select_icon_training_type').click();
                }
            </script>

            <div class="text-center mt-3 mb-3">
                <button id="btn_close_modal_add_type_training_type" type="button" class="btn btn-secondary" data-dismiss="modal">
                    ยกเลิก
                </button>
                <button id="btn_cf_add_training_type" type="button" class="btn btn-primary" onclick="cf_add_training_type();" disabled>
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    function check_submit_training_type(){

        let preview_icon_crop = document.querySelector('#Preview_icon_crop');
        let add_training_type = document.querySelector('#add_training_type');

        if(add_training_type.value && preview_icon_crop.src){
            document.querySelector('#btn_cf_add_training_type').disabled = false;
        }else{
            document.querySelector('#btn_cf_add_training_type').disabled = true;
        }
    }

    function cf_add_training_type() {
        let add_training_type = document.querySelector('#add_training_type')

        // ดึง Base64 string จาก <img> element
        let imgElement = document.querySelector('#Preview_icon_crop');
        let base64String = imgElement.src.split(',')[1]; // ลบ "data:image/png;base64," ออก

        // แปลง Base64 เป็น Blob
        let contentType = 'image/png'; // ตั้งค่าประเภทของรูปภาพ เช่น 'image/png' หรือ 'image/jpeg'
        let blob = base64ToBlob(base64String, contentType);

        // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);
        let name_file = Date_for_firebase + '-' + add_training_type.value ;
        let storageRef = storage.ref('/training/image/icon_type/' + name_file);

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
                    document.querySelector('#photo').value = downloadURL ;

                    let data_arr = {
                        "add_training_type" : add_training_type.value,
                        "downloadURL" : downloadURL,
                    };

                    fetch("{{ url('/') }}/api/add_training_type", {
                        method: 'post',
                        body: JSON.stringify(data_arr),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function (response){
                        return response.json();
                    }).then(function(data){
                        // console.log(data);
                        if(data){
                            let type_article = document.querySelector('#type_article');

                            let option = document.createElement("option");
                                option.text = data.type_article;
                                option.value = data.id;
                                option.selected = true;
                            type_article.add(option);

                            document.querySelector('#training_type_id').value = data.id ;
                            document.querySelector('#btn_close_modal_add_type_training_type').click(); 
                        }
                    }).catch(function(error){
                        // console.error(error);
                    });
                    
                });
            }
        );

    }
</script>

<div class="row">
    <div class="col-12 mx-auto">
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body">
                <div class="p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="fa-regular fa-chart-mixed me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">เพิ่มหลักสูตร</h5>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">
                            ชื่อหลักสูตร<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="title" type="text" id="title" value="{{ isset($video_welcome_page->title) ? $video_welcome_page->title : ''}}" placeholder="เพิ่มชื่อ" oninput="check_data_for_submit();">
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="for_rank" class="col-sm-2 col-form-label">
                            ประเภท<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select class="form-select" name="type_article" type="text" id="type_article" value="{{ isset($training->type_article) ? $training->type_article : ''}}" onchange="document.querySelector('#training_type_id').value = document.querySelector('#type_article').value ;">
                                <option value="">เลือกประเภท</option>
                                @foreach($type_article as $item)
                                    <option value="{{ $item->id }}">{{ $item->type_article }}</option>
                                @endforeach
                            </select>
                            <input class="form-control d-none" name="training_type_id" type="text" id="training_type_id" value="{{ isset($video_welcome_page->training_type_id) ? $video_welcome_page->training_type_id : ''}}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <span id="span_type_rank_add" class="btn btn-sm btn-secondary" style="margin-top: 4px;" data-toggle="modal" data-target="#modal_add_type_training_type">
                                เพิ่มประเภทหลักสูตร
                            </span>
                        </div>
                    </div>
                    <div id="div_type_photo" class="row mb-3">
                        <label for="photo" class="col-sm-2 col-form-label">
                            รูปภาพ<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10" >
                            <label id="upload_photo_content" for="photo" class="container_upload" type="button" onclick="document.querySelector('#select_photo').click();">
                                <div class="upload_section">
                                    <div class="text-center">
                                        <i class="fa-solid fa-image"></i>
                                        <p>เลือกรูปภาพ</p>
                                    </div>
                                </div>
                            </label>
                            <div id="div_preview_img" class="d-none">
                                <div class="row">
                                    <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                        <div class="w-100 ">
                                            <p class="mb-2 mt-3 text-center">ปรับขนาดภาพ</p>
                                            <!-- leftbox -->
                                            <div class="box-2 w-100 h-100 ">
                                                <div class="result w-100 container_upload_preview "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                        <div>
                                            <p class="mb-2 mt-3 text-center">ผลลัพธ์</p>
                                          <!--rightbox-->
                                            <div class="box-2 img-result ">
                                                <!-- result of crop -->
                                                <img class="cropped w-100 h-100" src="" alt="" id="imgPreview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_photoPreview" class="d-none mt-3">
                                    <center>
                                        <div id="photoPreview"></div>
                                        <span class="btn btn-sm btn-info" onclick="document.querySelector('#select_photo').click();">
                                            เลือกใหม่
                                        </span>
                                    </center>
                                </div>
                                
                                <!-- input file -->
                                <div class="box d-none">
                                    <div class="options hide">
                                        <label> Width</label>
                                        <input type="number" class="img-w d-none" value="300" min="100" max="1200" />
                                    </div>
                                    <button class="btn btn-sm btn-info save hide">Save</button>
                                    <a href="" class="btn download hide">Download</a>
                                </div>
                            </div>
                           
                            <input class="form-control d-none" name="select_photo" type="file" id="select_photo" accept="image/*" onchange="check_data_for_submit();">
                            <input class="form-control d-none" name="photo" type="text" id="photo" value="{{ isset($video_welcome_page->photo) ? $video_welcome_page->photo : ''}}">
                        </div>
                    </div>
                    <div id="div_type_video" class="row mb-3">
                        <label for="video" class="col-sm-2 col-form-label">
                            วิดีโอ
                        </label>
                        <div class="col-sm-10">
                            <label id="upload_video_cover" for="photo_cover" class="container_upload" style="  border: #db2d2e 3px solid;" type="button" onclick="document.querySelector('#select_video').click();">
                                <div class="upload_section" style="color: #db2d2e;">
                                    <div class="text-center">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        <p>Upload Video</p>
                                    </div>
                                </div>
                            </label>
                            <div id="div_videoPreview" class="d-none">
                                <center>
                                    <div id="videoPreview"></div>
                                    <span class="btn btn-sm btn-info" onclick="document.querySelector('#select_video').click();">
                                        เลือกใหม่
                                    </span>
                                </center>
                            </div>
                            <input class="form-control d-none" name="select_video" type="file" id="select_video" accept="video/*" onchange="check_data_for_submit();">
                            <input class="form-control d-none" name="video" type="text" id="video" value="{{ isset($video_welcome_page->video) ? $video_welcome_page->video : ''}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="detail" class="col-sm-2 col-form-label">
                            รายละเอียด
                        </label>
                        <div class="col-sm-10">
                            <p class="text-danger mt-2">*กด Ctrl+Shift+V เพื่อวางข้อความแบบไม่จัดรูปแบบ</p>
                            <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" placeholder="เพิ่มรายละเอียดเนื้อหา">{{ isset($video_welcome_page->detail) ? $video_welcome_page->detail : ''}}</textarea>
                            {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="link_out" class="col-sm-2 col-form-label">
                            ลิงก์สมัครอบรม (ถ้ามี)
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="link_out" type="text" id="link_out" value="" placeholder="เพิ่มลิงก์สมัครอบรม" oninput="check_data_for_submit();">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">
                            เปิดใช้งานทันที
                        </label>
                        <div class="col-sm-10" style="position: relative;">
                            <label class="switch">
                                <input id="check_status" class="cb" type="checkbox">
                                <span class="toggle" onclick="click_check_status();">
                                    <span class="left">off</span>
                                    <span class="right">on</span>
                                </span>
                            </label>
                            <input class="form-control d-none" name="status" type="text" id="status" value="" readonly="">
                            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">
                            เวลาแสดงผล
                        </label>
                        <div class="col-sm-10" style="position: relative;">
                            <div class="row">
                                <div class="col-6">
                                    <label class="col-form-label mb-2">
                                        เริ่มต้น <span class="text-danger">*</span>
                                    </label>
                                    <input type="datetime-local" name="datetime_start" id="datetime_start" class="form-control" required onchange="check_data_for_submit();check_date_input_start();">
                                </div>
                                <div class="col-6">
                                    <label class="col-form-label mb-2">
                                        สิ้นสุด <span class="text-danger">(สามารถเว้นว่างได้ หากไม่มีกำหนดสิ้นสุด)</span>
                                    </label>
                                    <input type="datetime-local" name="datetime_end" id="datetime_end" class="form-control" onchange="check_datetime_end();">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function check_date_input_start() {
                            let inputDateTime = document.getElementById('datetime_start').value;

                            if (inputDateTime) {
                              let inputDate = new Date(inputDateTime);
                              let now = new Date();

                              if (inputDate < now) {
                                document.getElementById('check_status').checked = true;
                                document.getElementById('status').value = 'Yes';
                              } else {
                                document.getElementById('check_status').checked = false;
                                document.getElementById('status').value = '';
                              }
                            }
                        }

                        function check_datetime_end(){
                            let datetime_start = document.querySelector('#datetime_start');
                            let datetime_end = document.querySelector('#datetime_end');

                            if (!datetime_start.value) {
                              alert("กรุณาเพิ่มวันเริ่มต้น");
                              datetime_end.value = '';
                              return;
                            }

                            if (datetime_end.value && new Date(datetime_end.value) < new Date(datetime_start.value)) {
                              alert("ไม่สามารถเลือกวันที่มาก่อนวันเริ่มต้นได้");
                              datetime_end.value = '';
                            }
                        }
                    </script>
                    <div class="row mb-3 d-none">
                        <label for="creator" class="col-sm-2 col-form-label">
                            Creator User Id
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="creator" type="text" id="creator" value="{{ Auth::user()->id }}" readonly>
                            {!! $errors->first('creator', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">
                            ผู้สร้าง
                        </label>
                        <div class="col-sm-10" style="position: relative;">
                            <h6 style="position: absolute;top:7px;">
                                <u>{{ Auth::user()->name }}</u>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input id="btn_submit_form" class="btn btn-primary d-none" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                            <span id="btn_submit" class="btn btn-primary px-5 me-5 disabled" onclick="upload_to_firebase('create');" >
                                สร้างเนื้อหาอย่างเดียว
                            </span>
                            <span id="btn_submit_goto_add_train" class="btn btn-warning px-5 disabled" onclick="upload_to_firebase('create_and_goto');" >
                                สร้างเนื้อหา + ไปยังหน้าเพิ่มปฏิทินหลักสูตร
                            </span>
                            <input type="text" name="check_goto" id="check_goto" class="d-none" value="">
                        </div>
                    </div>
                    <div id="div_loading" class="d-none">
                        <hr>
                        @include ('hamster_loading')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('select_video').addEventListener('change', function(event) {
        var file = this.files[0];
        var videoPlayer = document.createElement('video');
        videoPlayer.src = URL.createObjectURL(file);
        videoPlayer.controls = true;
        videoPlayer.width = 400;
        document.getElementById('videoPreview').innerHTML = '';
        document.getElementById('videoPreview').appendChild(videoPlayer);
        document.querySelector('#upload_video_cover').classList.add('d-none');
        document.querySelector('#div_videoPreview').classList.remove('d-none');
        
    });

    document.getElementById('select_photo').addEventListener('change', function(event) {
        // var file_photo = this.files[0];
        // var photoPlayer = document.createElement('img');
        // photoPlayer.src = URL.createObjectURL(file_photo);
        // photoPlayer.width = 400;
        // document.getElementById('photoPreview').innerHTML = '';
        // document.getElementById('photoPreview').appendChild(photoPlayer);
        // document.querySelector('#upload_photo_content').classList.add('d-none');
        // document.querySelector('#div_photoPreview').classList.remove('d-none');
        
    });
</script>

<script>

    function upload_to_firebase(check_goto) {

        document.querySelector('#check_goto').value = check_goto;
        
        let select_photo = document.querySelector('#select_photo').value;
        let select_video = document.querySelector('#select_video').value;
        // console.log(type_value);

        show_loading();

        // มีวิดีโอ // มีรูป
        if(select_video && select_photo){
            let fileInput = document.getElementById('select_video');
            let file = fileInput.files[0];
            let title = document.querySelector('#title').value;

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);

            let name_file = Date_for_firebase + '-' + title ;
            let storageRef = storage.ref('/training/video/' + name_file);

            let uploadTask = storageRef.put(file);

            uploadTask.on('state_changed', 
                function(snapshot){
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
                        document.querySelector('#video').value = downloadURL ;
                        document.querySelector('#select_video').value = null;

                        // ดึง Base64 string จาก <img> element
                        let imgElement = document.querySelector('img.cropped');
                        let base64String = imgElement.src.split(',')[1]; // ลบ "data:image/png;base64," ออก

                        // แปลง Base64 เป็น Blob
                        let contentType = 'image/png'; // ตั้งค่าประเภทของรูปภาพ เช่น 'image/png' หรือ 'image/jpeg'
                        let blob = base64ToBlob(base64String, contentType);

                        // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
                        let title = document.querySelector('#title').value;
                        let date_now = new Date();
                        let Date_for_firebase = formatDate_for_firebase(date_now);
                        let name_file = Date_for_firebase + '-' + title ;
                        let storageRef = storage.ref('/training/image/' + name_file);

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
                                    document.querySelector('#photo').value = downloadURL ;
                                    document.querySelector('#select_photo').value = null;

                                    setTimeout(() => {
                                        document.querySelector('#btn_submit_form').click();
                                    }, 800);
                                });
                            }
                        );

                        // ตัวอย่างการแสดง URL บนหน้าเว็บ
                        // alert('File uploaded successfully. URL: ' + downloadURL);
                    });
                }
            );
        }
        // มีวิดีโอ ไม่มีรูป
        else if(select_video && !select_photo){
            let fileInput = document.getElementById('select_video');
            let file = fileInput.files[0];
            let title = document.querySelector('#title').value;

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);

            let name_file = Date_for_firebase + '-' + title ;
            let storageRef = storage.ref('/training/video/' + name_file);

            let uploadTask = storageRef.put(file);

            uploadTask.on('state_changed', 
                function(snapshot){
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
                        document.querySelector('#video').value = downloadURL ;
                        document.querySelector('#select_video').value = null;

                        setTimeout(() => {
                            document.querySelector('#btn_submit_form').click();
                        }, 800);

                        // ตัวอย่างการแสดง URL บนหน้าเว็บ
                        // alert('File uploaded successfully. URL: ' + downloadURL);
                    });
                }
            );
        }
        // ไมีมีวิดีโอ มีรูป
        else if(!select_video && select_photo){
            // ดึง Base64 string จาก <img> element
            let imgElement = document.querySelector('img.cropped');
            let base64String = imgElement.src.split(',')[1]; // ลบ "data:image/png;base64," ออก

            // แปลง Base64 เป็น Blob
            let contentType = 'image/png'; // ตั้งค่าประเภทของรูปภาพ เช่น 'image/png' หรือ 'image/jpeg'
            let blob = base64ToBlob(base64String, contentType);

            // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
            let title = document.querySelector('#title').value;
            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-' + title ;
            let storageRef = storage.ref('/training/image/' + name_file);

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
                        document.querySelector('#photo').value = downloadURL ;
                        document.querySelector('#select_photo').value = null;

                        setTimeout(() => {
                            document.querySelector('#btn_submit_form').click();
                        }, 800);
                    });
                }
            );
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

        return new Blob(byteArrays, { type: contentType });
    }

    function show_loading(){
        document.querySelector('#div_loading').classList.remove('d-none');

        setInterval(function() {
            const pointLoading = document.querySelector('#point_loading');
            pointLoading.classList.toggle('d-none');
        }, 400);
    }

    function check_data_for_submit(){

        // console.log('check_data_for_submit');
        let btn_submit = document.querySelector('#btn_submit');
        let btn_submit_goto_add_train = document.querySelector('#btn_submit_goto_add_train');
        let training_type_id = document.querySelector('#training_type_id').value;
        let title = document.querySelector('#title').value;
        let select_photo = document.querySelector('#select_photo').value;
        let datetime_start = document.querySelector('#datetime_start').value;
        // let link_out = document.querySelector('#link_out').value;

        if (training_type_id && title && select_photo && datetime_start) {
            btn_submit.classList.remove('disabled');
            btn_submit_goto_add_train.classList.remove('disabled');
        }
        else{
            btn_submit.classList.add('disabled');
            btn_submit_goto_add_train.classList.add('disabled');
        }

    }

</script>


<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
      min-height: 300px;
    }

    .ck-powered-by{
        display: none;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("detail"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'undo', 'redo', '|',
                'findAndReplace', '|','link', '|',
                'heading', '|','fontSize', '|',
                'alignment', 'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'fontColor', 'highlight', '|',
                'specialCharacters', 'horizontalLine', '|','exportPDF','exportWord', 
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                // toggleDownloadable: {
                //     mode: 'manual',
                //     label: 'Downloadable',
                //     attributes: {
                //         download: 'file'
                //     }
                // }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "superbuild" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'AIAssistant',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'MultiLevelList',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced',
            'CaseChange'
        ]
    });
</script>
<!-- END CKEDITOR -->


<!-- CROPERJS -->
<script>
    
// vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
upload = document.querySelector('#select_photo'),
cropper = '';

// on change show image with crop options
upload.addEventListener('change', (e) => {

    document.querySelector('#upload_photo_content').classList.add('d-none');
    document.querySelector('#div_photoPreview').classList.remove('d-none');
    document.querySelector('#div_preview_img').classList.remove('d-none');
    imgPreview = document.querySelector('#imgPreview');

    if (e.target.files.length) {
        // start file reader
        const reader = new FileReader();
        reader.onload = (e)=> {
            if(e.target.result){
                // create new image
                let img = document.createElement('img');
                img.id = 'image';
                img.src = e.target.result
                // clean result before
                result.innerHTML = '';
                // append new image
                result.appendChild(img);
                // show save btn and options
                save.classList.remove('hide');
                options.classList.remove('hide');
                // init cropper
                cropper = new Cropper(img, {
                    dragMode: 'move',
                    aspectRatio: 1 / 1 ,
                    autoCropArea: 1,
                    center: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    maxCropBoxHeight: 300,
                    viewMode: 2,
                    guides: false,
                    ready: function(event) {
                        this.cropper = cropper;
                    },crop: function(event) {
                      let imgSrc = this.cropper.getCroppedCanvas({
                            width: 1920,
                            height: 1080// input value
                        }).toDataURL("image/png");
                        imgPreview.src = imgSrc;
                    }
                });
            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});

function click_check_status() {
    let check_status = document.querySelector('#check_status').checked ;
        // console.log(check_status);
    let status = document.querySelector('#status') ;
    let datetime_start = document.querySelector('#datetime_start');

    if(!check_status){
        status.value = 'Yes';

        let now = new Date();
        let year = now.getFullYear();
        let month = String(now.getMonth() + 1).padStart(2, '0');
        let day = String(now.getDate()).padStart(2, '0');
        let hours = String(now.getHours()).padStart(2, '0');
        let minutes = String(now.getMinutes()).padStart(2, '0');

        // Format the current date and time to YYYY-MM-DDTHH:MM
        let currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

        datetime_start.value = currentDateTime;
        datetime_start.setAttribute('readonly', 'true');

    }else{
        status.value = '';
        datetime_start.value = '';
        datetime_start.removeAttribute("readonly");
    }

    check_data_for_submit();
}

</script>


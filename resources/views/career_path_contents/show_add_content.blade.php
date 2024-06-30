<style>
.switch {
 --button-width: 3.5em;
 --button-height: 2em;
 --toggle-diameter: 1.5em;
 --button-toggle-offset: calc((var(--button-height) - var(--toggle-diameter)) / 2);
 --toggle-shadow-offset: 10px;
 --toggle-wider: 3em;
 --color-grey: #cccccc;
 --color-green: #4296f4;
}

.slider {
 display: inline-block;
 width: var(--button-width);
 height: var(--button-height);
 background-color: var(--color-grey);
 border-radius: calc(var(--button-height) / 2);
 position: relative;
 transition: 0.3s all ease-in-out;
}

.slider::after {
 content: "";
 display: inline-block;
 width: var(--toggle-diameter);
 height: var(--toggle-diameter);
 background-color: #fff;
 border-radius: calc(var(--toggle-diameter) / 2);
 position: absolute;
 top: var(--button-toggle-offset);
 transform: translateX(var(--button-toggle-offset));
 box-shadow: var(--toggle-shadow-offset) 0 calc(var(--toggle-shadow-offset) * 4) rgba(0, 0, 0, 0.1);
 transition: 0.3s all ease-in-out;
}

.switch input[type="checkbox"]:checked + .slider {
 background-color: var(--color-green);
}

.switch input[type="checkbox"]:checked + .slider::after {
 transform: translateX(calc(var(--button-width) - var(--toggle-diameter) - var(--button-toggle-offset)));
 box-shadow: calc(var(--toggle-shadow-offset) * -1) 0 calc(var(--toggle-shadow-offset) * 4) rgba(0, 0, 0, 0.1);
}

.switch input[type="checkbox"] {
 display: none;
}

.switch input[type="checkbox"]:active + .slider::after {
 width: var(--toggle-wider);
}

.switch input[type="checkbox"]:checked:active + .slider::after {
 transform: translateX(calc(var(--button-width) - var(--toggle-wider) - var(--button-toggle-offset)));
}

</style>

<style>
    .file-upload-box {
        position: relative;
        width: 180px;
        height: 180px;
        border: 2px dashed #ccc;
        border-radius: 10px;
        /* text-align: center; */
        /* background-color: #000 !important; */
        cursor: pointer;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center !important;
        transition: all .15s ease-in-out;
    }

    .file-upload-box h1 {
        text-align: center;
    }

    .file-upload-box:hover {
        background-color: #f5f5f5;
    }

    .loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }

    .loader .spinner {
        margin-bottom: 10px;
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #0a58ca;
        border-radius: 50%;
        animation: spin 2s linear infinite;
        /* เพิ่มคำสั่งต่อไปนี้เพื่อจัดให้สปินเป็นตรงกลาง */
        position: relative;
        top: 50%;
        left: 25%;
        transform: translate(-50%, -50%);
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .file-preview {
        max-width: 100%;
        max-height: 100%;
        /*        display: none;*/
        cursor: pointer;
        object-fit: contain;
    }

    .file-upload-box .upload-text {
        margin-top: 10px;
        font-size: 16px;
        color: #777;
    }

    .file-upload-box .upload-text h1 i {
        margin-top: 10px;
        font-size: 50px;
        color: #777;
    }

    input {
        caret-color: #0a58ca;
        caret-shape: 50px;
    }

    .infoImg {
        display: block;
        justify-content: start;
        padding: 5px;
        position: absolute;
        color: #0a58ca;
        transition: all .15s ease-in-out;
        transform: translateY(200px);
        background-color: #fff;
        width: 95%;
        border-radius: 10px;
        
    }
.imgSize{
    font-size: 10px;
}

    .file-upload-box:hover .infoImg {
        color: #0a58ca;
        transform: translateY(55px);
    }

    .clear-button {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #ff3f4d;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all .15s ease-in-out;
        font-size: 16px;
    }

    .clear-button:hover {
        background-color: #cc323d;
    }

    .clear-button:hover i {
        transform: scale(1.2);
    }

    .owl-prev {
        position: absolute;
        left: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(10, 88, 202) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-next {
        position: absolute;
        right: 0;
        top: 40%;
        width: 30px;
        height: 30px;
        background-color: rgb(10, 88, 202) !important;
        color: #fff !important;
        border-radius: 50% !important;
    }

    .owl-prev *,
    .owl-next * {
        font-size: 20px;
    }

    .infoImg .imgName {
        white-space: nowrap !important;
        width: 95% !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }

    /*preview video*/
    .cropper-container {
        margin-top: 10px;
    }

    .container_upload_preview {
        position: relative;
        width: 100%;
        height: 250px;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -khtml-border-radius: 10px;
    }

    .container_upload {
        background-color: #fff;
        border: #2260ff 3px solid;
        width: 100%;
        height: 250px;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -khtml-border-radius: 10px;
        position: relative;
        overflow: hidden;
    }

    .container_upload img {
        object-fit: contain;

    }

    .upload_section {
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

    .radio-inputs>* {
        margin: 6px;
    }



    .radio-input:checked+.radio-tile:before {
        transform: scale(1);
        opacity: 1;
    }


    .radio-photo:hover {
        border-color: #2260ff;
    }

    .radio-input:checked+.radio-photo {
        border-color: #2260ff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        color: #2260ff;
    }

    .radio-input:checked+.radio-photo:before {
        transform: scale(1);
        opacity: 1;
        background-color: #2260ff;
        border-color: #2260ff;
    }

    .radio-input:checked+.radio-photo .radio-icon svg {
        fill: #2260ff;
    }

    .radio-input:checked+.radio-photo .radio-label {
        color: #2260ff;
    }

    .radio-input:focus+.radio-photo {
        border-color: #2260ff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
    }

    .radio-photo:hover {
        border-color: #2260ff;
    }




    .radio-video:hover {
        border-color: #db2d2e;
    }

    .radio-input:checked+.radio-video {
        border-color: #db2d2e;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        color: #db2d2e;
    }

    .radio-input:checked+.radio-video:before {
        transform: scale(1);
        opacity: 1;
        background-color: #db2d2e;
        border-color: #db2d2e;
    }

    .radio-input:checked+.radio-video .radio-icon svg {
        fill: #db2d2e;
    }

    .radio-input:checked+.radio-video .radio-label {
        color: #db2d2e;
    }

    .radio-input:focus+.radio-video {
        border-color: #db2d2e;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #ffb7b6;
    }

    .radio-video:hover {
        border-color: #db2d2e;
    }

    .radio-input:focus+.radio-tile:before {
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
</style>


<div class="card border-top border-0 border-4 border-danger">
    <div class="card-body p-5">
        <div class="card-title d-flex align-items-center">
            <div>
                <i class="fa-solid fa-plus me-1 font-22 text-danger"></i>
            </div>
            <h5 class="mb-0 text-danger">เพิ่มเนื้อหา : <span id="now_add_content">AG Story 1</span></h5>
        </div>
        <hr>
        <div class="row g-3">
            <div class="col-md-4">
                <label for="title" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($career_path_content->title) ? $career_path_content->title : ''}}" required>
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">ประเภท</label>
                <select class="form-select" name="icon" id="icon" onchange="change_icon();" required>
                    <option value="">เลือกประเภท</option>
                    <option value="PDF">PDF</option>
                    <option value="Article">Article</option>
                    <option value="Video">Video</option>
                    <option value="Photo">Photo</option>
                </select>
            </div>
            <script>
                function change_icon(){
                    let icon = document.querySelector('#icon');
                    let div_add_pdf = document.querySelector('#div_add_pdf');
                    let div_add_video = document.querySelector('#div_add_video');
                    let div_add_photo_gallery = document.querySelector('#div_add_photo_gallery');

                    div_add_pdf.classList.add('d-none');
                    div_add_video.classList.add('d-none');
                    div_add_photo_gallery.classList.add('d-none');

                    document.querySelector('#read').removeAttribute('readonly');

                    if(icon.value == 'PDF'){
                        div_add_pdf.classList.remove('d-none');
                    }
                    else if(icon.value == 'Video'){
                        div_add_video.classList.remove('d-none');
                        document.querySelector('#read').setAttribute('readonly' ,'');
                    }
                    else if(icon.value == 'Photo'){
                        div_add_photo_gallery.classList.remove('d-none');
                        document.querySelector('#read').setAttribute('readonly' ,'');
                    }
                }
            </script>
            <div class="col-md-3">
                <label for="read" class="form-label">เวลาอ่านโดยประมาณ (นาที)</label>
                <input type="text" class="form-control" name="read" id="read" value="{{ isset($career_path_content->read) ? $career_path_content->read : ''}}" >
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">แนะนำ</label>
                <br>
                <label class="switch d-flex align-items-center">
                    <input id="input_click_select_recommend" type="checkbox" onchange="click_select_recommend();">
                    <span class="slider"></span>
                </label>
                <input class="form-control d-none" name="recommend" type="text" id="recommend" value="No" >
            </div>

            <div class="col-md-12">
                <label for="read" class="form-label">รายละเอียด</label>
                <textarea class="form-control" rows="3" name="detail" type="textarea" id="detail" placeholder="เพิ่มรายละเอียดเนื้อหา">{{ isset($video_welcome_page->detail) ? $video_welcome_page->detail : ''}}</textarea>
            </div>

            <div id="div_add_pdf" class="col-md-12 d-none">
                <label for="title" class="col-sm-2 col-form-label">
                    PDF
                </label>
                <div class="col-sm-10">
                    <input class="form-control" accept=".pdf" name="select_pdf_file" type="file" id="select_pdf_file" value="" >
                    <input type="text" name="pdf_file" id="pdf_file" class="d-none">
                </div>
            </div>

            <div id="div_add_photo_gallery" class="col-md-12 d-none">
                <label for="title" class="form-label">Photo Gallery (20 รูป)</label>
                <div class="">
                    <!-- Photo Gallery -->
                    <div class="" id="nav_news_photo" role="tabpanel">
                        <input class="d-none" type="file" id="news_photo" name="news_photo[]" accept="image/*" multiple onchange="on_select_file_input('news_photo');">
                        <input class="d-none" type="text" id="photo_gallery" name="photo_gallery">
                        <div class="flex-wrap" style="flex-wrap: wrap;display: flex;">
                            @for($i=1; $i < 21; $i++) 
                                @php 
                                    if($i == 1){ 
                                        $class_div_news_photo='' ; 
                                    }else{ 
                                        $class_div_news_photo='d-none' ; 
                                    } 
                                @endphp 
                                <div class="p-1 me-1" style="width: 180px;">
                                    <div id="img_news_photo_{{ $i }}" class="file-upload-box upload-id-card {{ $class_div_news_photo }}" onclick="document.querySelector('#news_photo').click();">
                                        <div class="upload-text text-center">
                                            <span>
                                                <i class="fa-sharp fa-solid fa-plus mr-2"></i> เพิ่มรูป
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <div id="div_add_video" class="col-md-12 d-none">
                <label for="video" class="col-sm-2 col-form-label">
                    วิดีโอ<span id="span_required_video" class="text-danger d-none">*</span>
                </label>
                <div class="col-sm-10">
                    <label id="upload_video_cover" for="" class="container_upload" style="  border: #db2d2e 3px solid;" type="button" onclick="document.querySelector('#select_video').click();">
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
                    <input class="form-control d-none" name="select_video" type="file" id="select_video" accept="video/*">
                    <input class="form-control d-none" name="video" type="text" id="video" value="{{ isset($video_welcome_page->video) ? $video_welcome_page->video : ''}}">
                </div>
            </div>

            <div class="col-md-12">
                <label for="" class="form-label">ผู้สร้าง</label>
                <h6>
                    <u>{{ Auth::user()->name }}</u>
                </h6>
            </div>

            <div class="col-md-12 d-none">
                <label for="career_path_id" class="control-label">{{ 'Career Path Id' }}</label>
                <input class="form-control" name="career_path_id" type="text" id="career_path_id" value="1" readonly>
                {!! $errors->first('career_path_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="col-12 d-none">
                <label for="creator" class="col-sm-2 col-form-label">
                    Creator User Id
                </label>
                <div class="col-sm-10">
                    <input class="form-control" name="creator" type="text" id="creator" value="{{ Auth::user()->id }}" readonly>
                    {!! $errors->first('creator', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input id="btn_submit_form" class="btn btn-primary d-none" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                    <div class="form-group">
                        <span id="btn_submit" class="btn btn-danger px-5 " onclick="create_content_career_path();" >
                            สร้างเนื้อหา
                        </span>
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

<script>

    function create_content_career_path(){

        show_loading();

        let icon = document.querySelector('#icon');
        let select_pdf_file = document.querySelector('#select_pdf_file')
        let select_video = document.querySelector('#select_video').value;

        if(icon.value == 'PDF'){
            // ตรวจสอบว่ามีไฟล์ PDF หรือไม่
            if (select_pdf_file.files.length > 0) {
                // console.log('มีไฟล์ถูกเลือก');
                upload_pdf_to_firebase();
            } else {
                // console.log('ไม่มีไฟล์ถูกเลือก');
                setTimeout(() => {
                    document.querySelector('#btn_submit_form').click();
                }, 800);
            }
        }
        else if(icon.value == 'Video'){
            if(select_video){
                upload_to_firebase();
            }else {
                // console.log('ไม่มีไฟล์ถูกเลือก');
                setTimeout(() => {
                    document.querySelector('#btn_submit_form').click();
                }, 800);
            }
        }
        else if(icon.value == 'Photo'){
            checkFiles_photo_gallery();
        }
        else{
            setTimeout(() => {
                document.querySelector('#btn_submit_form').click();
            }, 800);
        }

    }

    function upload_pdf_to_firebase(){

        let select_pdf_file = document.querySelector('#select_pdf_file');
        // console.log(type_value);
        let file = select_pdf_file.files[0];
        // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
        let title = document.querySelector('#title').value;
        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);
        let name_file = Date_for_firebase + '-' + title ;
        let storageRef = storage.ref('/career_paths/pdf/' + name_file);

        // อัพโหลด Blob ไปยัง Firebase Storage
        let uploadTask = storageRef.put(file);

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
                    document.querySelector('#pdf_file').value = downloadURL ;
                    document.querySelector('#select_pdf_file').value = null;

                    setTimeout(() => {
                        document.querySelector('#btn_submit_form').click();
                    }, 800);

                });
            }
        );

    }

    function upload_to_firebase() {

        let select_video = document.querySelector('#select_video').value;
        // console.log(type_value);

        // มีวิดีโอ 
        let fileInput = document.getElementById('select_video');
        let file = fileInput.files[0];
        let title = document.querySelector('#title').value;

        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);

        let name_file = Date_for_firebase + '-' + title;
        let storageRef = storage.ref('/career_paths/video/' + name_file);

        let uploadTask = storageRef.put(file);

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
                    document.querySelector('#video').value = downloadURL;
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

    function checkFiles_photo_gallery() {
        const input = document.getElementById('news_photo');

        if (input.files.length > 0) {
            // console.log(`You have selected ${input.files.length} file(s).`);
            getImageSources();
        } else {
            // console.log('No files selected.');
            setTimeout(() => {
                document.querySelector('#btn_submit_form').click();
            }, 800);
        }

    }

    function getImageSources() {
            // Select all img elements with class 'get-img-firebase'
        const imgElements = document.querySelectorAll('.get-img-firebase');
        const srcArray = [];

        // Loop through the NodeList and push the src to the array
        imgElements.forEach(img => {
            srcArray.push(img.src);
        });

        // Log the array to see the result
        // console.log(srcArray);

        let length_check_last = srcArray.length - 1 ;
        let check_last = '' ;

        for (let i = 0; i < srcArray.length; i++) {
            if(length_check_last == i){
                // console.log('รอบสุดท้าย');
                check_last = 'รอบสุดท้าย' ;
            }
            else{
                // console.log('ต่อ');
                check_last = 'ต่อ' ;
            }
            gallery_uploadBlobToFirebase(srcArray[i], check_last, i)
        }

        return srcArray;
    }

    var new_link ;

    async function gallery_uploadBlobToFirebase(blobUrl, check_last, round) {

        round = parseInt(round) + 1 ;
        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let title = document.querySelector('#title').value;
            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-' + title + '-' + round;
            let storageRef = storage.ref('/career_paths/image/photo_gallery/'+title+'/' + name_file);

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

                        let old_link = document.querySelector('#photo_gallery') ;

                        if(old_link.value){
                            new_link = old_link.value + "," + downloadURL ;
                        }
                        else{
                            new_link = downloadURL ;
                        }

                        document.querySelector('#photo_gallery').value = new_link;

                        if(check_last == 'รอบสุดท้าย'){

                            document.querySelector('#news_photo').value = null;

                            setTimeout(() => {
                                document.querySelector('#btn_submit_form').click();
                            }, 800);
                        }
                    });
                }
            );
        } catch (error) {
            console.error('Error fetching the Blob:', error);
        }
    }

    function show_loading() {
        document.querySelector('#div_loading').classList.remove('d-none');

        setInterval(function() {
            const pointLoading = document.querySelector('#point_loading');
            pointLoading.classList.toggle('d-none');
        }, 400);
    }

    function click_select_recommend(){
        let input = document.querySelector('#input_click_select_recommend');
        // console.log(input.checked);

        if(input.checked){
            document.querySelector('#recommend').value = 'Yes';
        }
        else{
            document.querySelector('#recommend').value = 'No';
        }
    }

    document.getElementById('select_video').addEventListener('change', function(event) {
        var file = this.files[0];
        var videoPlayer = document.createElement('video');
        videoPlayer.src = URL.createObjectURL(file);
        videoPlayer.controls = true;
        videoPlayer.width = 400;

        setTimeout(() => {
            var duration = videoPlayer.duration;
            var minutes = Math.floor(duration / 60);
            var seconds = Math.floor(duration % 60);
            var durationText = minutes + " นาที " + seconds + " วินาที";

            document.querySelector('#read').value = durationText;
            
        }, 2000);
        
        document.getElementById('videoPreview').innerHTML = '';
        document.getElementById('videoPreview').appendChild(videoPlayer);
        document.querySelector('#upload_video_cover').classList.add('d-none');
        document.querySelector('#div_videoPreview').classList.remove('d-none');
    });
</script>

<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
        min-height: 250px;
    }

    .ck-powered-by {
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
                'findAndReplace', '|', 'link', '|',
                'heading', '|', 'fontSize', '|',
                'alignment', 'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'fontColor', 'highlight', '|',
                'specialCharacters', 'horizontalLine', '|', 'exportPDF', 'exportWord',
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
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
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
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
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


<script>

    var all_files = [] ;
        all_files['news_photo'] = [];

    function on_select_file_input(name_input) {
        let input = document.querySelector('#' + name_input);
        let files = Array.from(input.files);

        let max_of_name_input = check_max_of_name_input(name_input);
        let maxFileCount = max_of_name_input.split(',')[0];
        let text_name_input = max_of_name_input.split(',')[1];

        if (all_files[name_input].length >= maxFileCount) {
            // console.log('เพิ่มรูป ผลรวมเดิม เกิน');
            alert('คุณสามารถเลือก ' + text_name_input + ' ได้สูงสุด ' + maxFileCount + ' ไฟล์');
        } else {
            // console.log('เพิ่มรูป ผลรวมเดิม ผ่าน');

            let sum_length_file = files.length + all_files[name_input].length;

            if (sum_length_file > maxFileCount) {
                alert('คุณสามารถเลือก ' + text_name_input + ' ได้สูงสุด ' + maxFileCount + ' ไฟล์');
            } else {

                // เพิ่มไฟล์ใหม่เข้าไปใน existingFiles
                files.forEach((file) => {
                    // เช็คไฟล์ซ้ำไม่ให้เพิ่ม
                    let check_file_double = '';
                    for (let iii = 0; iii < all_files[name_input].length; iii++) {
                        if(file.name == all_files[name_input][iii].name){
                            check_file_double = 'Yes' ;
                        }
                    }

                    if(check_file_double !== 'Yes'){
                        all_files[name_input].push(file);
                    }else{
                        // console.log('มีไฟล์ซ้ำ');
                    }
                });

                // แสดงตัวอย่างรูปภาพ
                preview_img(name_input);

            }
        }

    }

    function preview_img(name_input){

        // console.log('preview_img file length >> ' + all_files[name_input].length);
        document.querySelector('#read').value = all_files[name_input].length;

        let for_add_onclick = all_files[name_input].length + 1 ;

        let count = 1 ;
        // แสดงตัวอย่างรูปภาพ
        all_files[name_input].forEach((file) => {

            document.querySelector('#img_'+name_input+'_' + count).innerHTML = '';

            let fileSize = formatFileSize(file.size);

            let html_img = `
                <img class="file-preview get-img-firebase" src="`+URL.createObjectURL(file)+`" alt="ภาพตัวอย่าง" >
                <div class="infoImg">
                    <div class="row pt-2">
                        <div class="col-9">
                            <span class="imgSize">`+fileSize+`</span>
                        </div>
                        <div class="col-3">
                            <i class="fa-solid fa-circle-xmark fa-xl" onclick="drop_img('`+name_input+`' , '`+file.name+`' ,'`+count+`');"></i>
                        </div>
                        <div class="col-12">
                            <p class="mb-2 imgName">`+file.name+`</p>   
                        </div>
                    </div>
                </div>
            `;
            document.querySelector('#img_'+name_input+'_' + count).insertAdjacentHTML('beforeend', html_img);
            document.querySelector('#img_'+name_input+'_' + count).classList.remove('d-none');

            document.querySelector('#img_'+name_input+'_'+count).setAttribute('onclick' , '');
            count = count+1 ;
        });

        if(document.querySelector('#img_'+name_input+'_' + for_add_onclick) ){
            document.querySelector('#img_'+name_input+'_' + for_add_onclick).classList.remove('d-none');

            setTimeout(function() {
                    document.querySelector('#img_'+name_input+'_'+ for_add_onclick).setAttribute('onclick' , 
                "document.querySelector('#"+name_input+"').click();");
            }, 1000);
            
        }

        // console.log("-- สรุปไฟล์ "+name_input+" --");
        // console.log( all_files[name_input] );
        // console.log("------ END ------");

    }

    function drop_img(name_input , file_name , count){

        // console.log('name_input >> ' + name_input);

        // ลบองค์ประกอบที่มี name เท่ากับ file_name
        all_files[name_input] = all_files[name_input].filter(file => file.name !== file_name);

        if(all_files[name_input].length == 0){
            all_files[name_input] = [] ;
        }

        let max_of_name_input = check_max_of_name_input(name_input);
        let maxFileCount = max_of_name_input.split(',')[0];
        let text_name_input = max_of_name_input.split(',')[1];

        document.querySelector('#img_'+name_input+'_' + count).innerHTML = '';

        let html_add_img = `
            <div class="upload-text text-center">
                <span>
                    <i class="fa-sharp fa-solid fa-plus mr-2"></i> `+text_name_input+`
                </span>
            </div>
        `;

        let max = parseInt(maxFileCount)+ 1 ;

        for (let i = 1; i < max; i++) {
            // console.log('innerHTML >> ' + i);
            document.querySelector('#img_'+name_input+'_' + i).innerHTML = '';
            document.querySelector('#img_'+name_input+'_' + i).insertAdjacentHTML('beforeend', html_add_img);

            document.querySelector('#img_'+name_input+'_' + i).classList.add('d-none');
        }

        preview_img(name_input);

    }


    function check_max_of_name_input(name_input){

        switch(name_input) {
            case "news_photo":
                maxFileCount = 20 ;
                text_name_input = "เพิ่มรูป" ;
            break;
        }

        return maxFileCount + "," + text_name_input ;

    }

    function checkFileCount(input) {
        // รับจำนวนไฟล์ที่เลือก
        let fileCount = input.files.length;
        let name_input = input.name;
            name_input = name_input.replace("[]", "");
            // console.log(name_input);
            // console.log(fileCount);

        // กำหนดจำนวนสูงสุดที่ต้องการ
        let maxFileCount ; 
        let text_name_input ; 

        switch(name_input) {
            case "news_photo":
                maxFileCount = 10 ;
                text_name_input = "เพิ่มรูป" ;
            break;
        }
        
        
        
        if (fileCount > maxFileCount) {
            alert('คุณสามารถเลือก' + text_name_input + 'ได้สูงสุด ' + maxFileCount + ' ไฟล์');
            // ล้าง input ให้ว่าง
            input.value = '';
        }
    }

    function formatFileSize(fileSize) {
        if (fileSize === 0) return '0 Bytes';

        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const k = 1024;
        const i = Math.floor(Math.log(fileSize) / Math.log(k));

        return parseFloat((fileSize / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function getFileExtension(fileName) {
        return fileName.slice((fileName.lastIndexOf('.') - 1 >>> 0) + 2);
    }

</script>
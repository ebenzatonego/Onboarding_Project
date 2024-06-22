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

    .toggle>.left {
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

    .toggle>.right {
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

    .switch input:checked+.toggle>.left {
        transform: rotateX(10deg) rotateY(45deg);
        color: rgb(206, 206, 206);
    }

    .switch input:checked+.toggle>.right {
        transform: rotateX(10deg) rotateY(0deg);
        color: #487bdb;
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
        margin: 0.5em;
    }

    .box-2 {
        padding: 0.5em;
        /* width: calc(100%/2 - 1em); */
    }

    .options label,
    .options input {
        width: 4em;
        padding: 0.5em 1em;
    }

    .hide {
        display: none;
    }

    img {
        max-width: 100%;
    }

    .cropped {
        width: 100% !important;
        max-height: 300px !important;

    }

    /* .cropper-container{
    max-height: 300px !important;

} */

    .mce-branding {
        display: none;
    }

    :focus {
        outline: 0;
        border-color: #2260ff;
        box-shadow: 0 0 0 4px #b5c9fc;
    }

    .mydict div {
        display: flex;
        flex-wrap: wrap;
        margin-top: 0.5rem;
        /*  justify-content: center;*/
    }

    .mydict input[type="radio"] {
        clip: rect(0 0 0 0);
        clip-path: inset(100%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .mydict input[type="radio"]:checked+span {
        box-shadow: 0 0 0 0.0625em #0043ed;
        background-color: #dee7ff;
        z-index: 1;
        color: #0043ed;
    }

    .mydict label span {
        display: block;
        cursor: pointer;
        background-color: #fff;
        padding: 0.375em .75em;
        position: relative;
        margin-left: .0625em;
        box-shadow: 0 0 0 0.0625em #b5bfd9;
        letter-spacing: .05em;
        color: #3e4963;
        text-align: center;
        transition: background-color .5s ease;
    }

    .mydict label:first-child span {
        border-radius: .375em 0 0 .375em;
    }

    .mydict label:last-child span {
        border-radius: 0 .375em .375em 0;
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
</style>
<div class="row">
    <div class="col-12 mx-auto">
        <div class="card border-top border-0 border-4 border-dark">
            <div class="card-body">
                <div class="p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="fa-solid fa-newspaper me-1 font-22 text-dark"></i>
                        </div>
                        <h5 class="mb-0 text-dark">เพิ่มข่าวใหม่</h5>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">
                            ชื่อ<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="title" type="text" id="title" value="{{ isset($video_welcome_page->title) ? $video_welcome_page->title : ''}}" placeholder="เพิ่มชื่อ" oninput="check_data_for_submit();">
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="type" class="col-sm-2 col-form-label">
                            ประเภทของข่าว<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input class="form-control" list="list_news_type_id" id="news_type_id" onchange="check_data_for_submit();" name="news_type_id">
                            <datalist id="list_news_type_id">
                                @foreach($news_type as $item)
                                <option data-value="{{$item->id}}">{{$item->name_type}}</option>
                                @endforeach
                            </datalist>
                            <script>
                                const des = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, 'value');
                                Object.defineProperty(HTMLInputElement.prototype, 'value', {
                                    get: function() {
                                        const value = des.get.call(this);

                                        if (this.type === 'text' && this.list) {
                                            const opt = [].find.call(this.list.options, o => o.value === value);
                                            return opt ? opt.dataset.value : value;
                                        }

                                        return value;
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">
                            แสดงผล cover ด้วย<span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <div class="mydict">
                                <div>
                                    <label>
                                        <input type="radio" name="select_select_content_show" value="photo" checked="" onchange="check_select_select_content_show();">
                                        <span>รูปภาพ</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="select_select_content_show" value="video" onchange="check_select_select_content_show();">
                                        <span>วิดีโอ</span>
                                    </label>
                                </div>
                            </div>
                            <input type="text" name="select_content_show" id="select_content_show" class="d-none" value="photo">
                        </div>
                    </div>
                    <script>
                        function check_select_select_content_show() {
                            let select_select_content_show = document.querySelectorAll('input[name="select_select_content_show"]');
                            let select_select_content_show_value = "";
                            select_select_content_show.forEach(select_select_content_show => {
                                if (select_select_content_show.checked) {
                                    select_select_content_show_value = select_select_content_show.value;
                                }
                            })

                            // document.querySelector('#span_required_photo').classList.add('d-none');
                            document.querySelector('#span_required_video').classList.add('d-none');
                            document.querySelector('#span_required_' + select_select_content_show_value).classList.remove('d-none');

                            document.querySelector('#select_content_show').value = select_select_content_show_value;

                        }
                    </script>
                    <div id="div_type_photo" class="row mb-3">
                        <label for="photo" class="col-sm-2 col-form-label">
                            รูปภาพ<span  class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
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
                            <input class="form-control d-none" name="photo_cover" type="text" id="photo_cover" value="">
                        </div>
                    </div>
                    <div id="div_type_video" class="row mb-3">
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
                            <input class="form-control d-none" name="select_video" type="file" id="select_video" accept="video/*" onchange="check_data_for_submit();">
                            <input class="form-control d-none" name="video" type="text" id="video" value="{{ isset($video_welcome_page->video) ? $video_welcome_page->video : ''}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">
                            Photo Gallery (20 รูป)
                        </label>
                        <div class="col-sm-10">
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
                <script>

    var formData = new FormData();

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

</script>

<script>
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

                <div class="row mb-3">
                    <label for="detail" class="col-sm-2 col-form-label">
                        รายละเอียด
                    </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" placeholder="เพิ่มรายละเอียดเนื้อหา">{{ isset($video_welcome_page->detail) ? $video_welcome_page->detail : ''}}</textarea>
                        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
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
                                <input type="datetime-local" name="datetime_start" id="datetime_start" class="form-control" required onchange="check_data_for_submit();">
                            </div>
                            <div class="col-6">
                                <label class="col-form-label mb-2">
                                    สิ้นสุด <span class="text-danger">(สามารถเว้นว่างได้ หากไม่มีกำหนดสิ้นสุด)</span>
                                </label>
                                <input type="datetime-local" name="datetime_end" id="datetime_end" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
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
                        <span id="btn_submit" class="btn btn-primary px-5 disabled" onclick="upload_to_firebase();">
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
            uploadBlobToFirebase(srcArray[i], check_last, i)
        }

        return srcArray;
    }

    var new_link ;

    async function uploadBlobToFirebase(blobUrl, check_last, round) {

        round = parseInt(round) + 1 ;
        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let title = document.querySelector('#title').value;
            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-' + title + '-' + round;
            let storageRef = storage.ref('/news/image/photo_gallery/'+title+'/' + name_file);

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

    function upload_to_firebase() {

        let select_photo = document.querySelector('#select_photo').value;
        let select_video = document.querySelector('#select_video').value;
        // console.log(type_value);

        show_loading();

        // มีวิดีโอ // มีรูป
        if (select_video && select_photo) {
            let fileInput = document.getElementById('select_video');
            let file = fileInput.files[0];
            let title = document.querySelector('#title').value;

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);

            let name_file = Date_for_firebase + '-' + title;
            let storageRef = storage.ref('/news/video/' + name_file);

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
                        let name_file = Date_for_firebase + '-' + title;
                        let storageRef = storage.ref('/news/image/cover/' + name_file);

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
                                    document.querySelector('#photo_cover').value = downloadURL;
                                    document.querySelector('#select_photo').value = null;

                                    checkFiles_photo_gallery();
                                    // setTimeout(() => {
                                    //     document.querySelector('#btn_submit_form').click();
                                    // }, 800);
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
        else if (select_video && !select_photo) {
            let fileInput = document.getElementById('select_video');
            let file = fileInput.files[0];
            let title = document.querySelector('#title').value;

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);

            let name_file = Date_for_firebase + '-' + title;
            let storageRef = storage.ref('/news/video/' + name_file);

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

                        checkFiles_photo_gallery();
                        // setTimeout(() => {
                        //     document.querySelector('#btn_submit_form').click();
                        // }, 800);

                        // ตัวอย่างการแสดง URL บนหน้าเว็บ
                        // alert('File uploaded successfully. URL: ' + downloadURL);
                    });
                }
            );
        }
        // ไมีมีวิดีโอ มีรูป
        else if (!select_video && select_photo) {
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
            let name_file = Date_for_firebase + '-' + title;
            let storageRef = storage.ref('/news/image/cover/' + name_file);

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
                        document.querySelector('#photo_cover').value = downloadURL;
                        document.querySelector('#select_photo').value = null;

                        checkFiles_photo_gallery();
                        // setTimeout(() => {
                        //     document.querySelector('#btn_submit_form').click();
                        // }, 800);
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

        return new Blob(byteArrays, {
            type: contentType
        });
    }

    function show_loading() {
        document.querySelector('#div_loading').classList.remove('d-none');

        setInterval(function() {
            const pointLoading = document.querySelector('#point_loading');
            pointLoading.classList.toggle('d-none');
        }, 400);
    }

    function check_data_for_submit() {

        // console.log('check_data_for_submit');
        let btn_submit = document.querySelector('#btn_submit');
        let news_type_id = document.querySelector('#news_type_id').value;
        let title = document.querySelector('#title').value;
        let select_photo = document.querySelector('#select_photo').value;
        let select_video = document.querySelector('#select_video').value;
        let datetime_start = document.querySelector('#datetime_start').value;

        let select_content_show = document.querySelector('#select_content_show').value;

        if(select_content_show == 'photo'){
            if (news_type_id && title && select_photo && datetime_start) {
                btn_submit.classList.remove('disabled');
            }
            else{
                btn_submit.classList.add('disabled');
            }
        }
        else if(select_content_show == 'video'){
            if (news_type_id && title && select_photo && select_video && datetime_start) {
                btn_submit.classList.remove('disabled');
            }
            else{
                btn_submit.classList.add('disabled');
            }
        }



    }
</script>


<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
        min-height: 300px;
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
            reader.onload = (e) => {
                if (e.target.result) {
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
                        aspectRatio: 1 / 1,
                        autoCropArea: 1,
                        center: false,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        maxCropBoxHeight: 300,
                        viewMode: 2,
                        guides: false,
                        ready: function(event) {
                            this.cropper = cropper;
                        },
                        crop: function(event) {
                            let imgSrc = this.cropper.getCroppedCanvas({
                                width: 1920,
                                height: 1080 // input value
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
        let check_status = document.querySelector('#check_status').checked;
        // console.log(check_status);
        let status = document.querySelector('#status');
        let datetime_start = document.querySelector('#datetime_start');

        if (!check_status) {
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

        } else {
            status.value = '';
            datetime_start.value = '';
            datetime_start.removeAttribute("readonly");
        }

        check_data_for_submit();
    }
</script>
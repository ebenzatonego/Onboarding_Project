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
  border: #0dcaf0 3px solid;
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
  color: #0dcaf0;
  font-size: 22px;
  display: flex;
  justify-content: center;
}

.btn.disabled {
    pointer-events: none;
    opacity: 0.5;
}

</style>


<div class="row">
    <div class="col-12 mx-auto">
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="fa-solid fa-layer-plus me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">สร้างวิดีโอการแนะนำ</h5>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <label for="name_video" class="col-sm-3 col-form-label">
                            ชื่อวิดีโอ
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="name_video" type="text" id="name_video" value="{{ isset($video_welcome_page->name_video) ? $video_welcome_page->name_video : ''}}" placeholder="เพิ่มชื่อวิดีโอ" oninput="check_data_for_submit();">
                            {!! $errors->first('name_video', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="video" class="col-sm-3 col-form-label">
                            วิดีโอ
                        </label>
                        <div class="col-sm-9">
                            <label id="upload_photo_cover" for="photo_cover" class="container_upload" type="button" onclick="document.querySelector('#select_video').click();">
                                <div class="upload_section">
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
                    <div class="row mb-3 d-none">
                        <label for="type" class="col-sm-3 col-form-label">
                            Type
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="type" type="text" id="type" value="Video_Intro" readonly>
                            {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <label for="user_id" class="col-sm-3 col-form-label">
                            User Id
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="user_id" type="text" id="user_id" value="{{ Auth::user()->id }}" readonly>
                            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-3 col-form-label">
                            เปิดใช้งาน
                        </label>
                        <div class="col-sm-9" style="position: relative;">
                            <label class="switch">
                                <input id="check_status" class="cb" type="checkbox">
                                <span class="toggle" onclick="click_check_status();">
                                    <span class="left">off</span>
                                    <span class="right">on</span>
                                </span>
                            </label>
                            <span class="text-danger mx-4" style="position: absolute;top:7px;">(หากเปิดใช้งานวิดีโอที่เปิดใช้งานอยู่จะถูกปิด)</span>
                            <input class="form-control d-none" name="status" type="text" id="status" value="{{ isset($video_welcome_page->status) ? $video_welcome_page->status : ''}}" readonly>
                            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">
                            ผู้สร้างวิดีโอ
                        </label>
                        <div class="col-sm-9" style="position: relative;">
                            <h6 style="position: absolute;top:7px;">
                                <u>{{ Auth::user()->name }}</u>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <input id="btn_submit_video_intro" class="btn btn-info px-5 d-none" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                            <span id="btn_submit" class="btn btn-info px-5 disabled" onclick="upload_to_firebase();" >
                                Upload Video
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
        document.querySelector('#upload_photo_cover').classList.add('d-none');
        document.querySelector('#div_videoPreview').classList.remove('d-none');
        
    });
</script>

<script>
    
    function click_check_status() {
        let check_status = document.querySelector('#check_status').checked ;
            // console.log(check_status);
        let status = document.querySelector('#status') ;

        if(!check_status){
            status.value = 'Yes';
        }else{
            status.value = '';
        }
    }

    function upload_to_firebase() {

        show_loading();

        var fileInput = document.getElementById('select_video');
        var file = fileInput.files[0];
        let name_video = document.querySelector('#name_video').value;
        var name_file = new Date() + '-' + name_video ;
        var storageRef = storage.ref('/videos/Video_Intro/' + name_file);

        var uploadTask = storageRef.put(file);

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
                        document.querySelector('#btn_submit_video_intro').click();
                    }, 800);

                    // ตัวอย่างการแสดง URL บนหน้าเว็บ
                    // alert('File uploaded successfully. URL: ' + downloadURL);
                });
            }
        );
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
        let select_video = document.querySelector('#select_video').value;
        let name_video = document.querySelector('#name_video').value;
        // console.log(select_video);
        // console.log(name_video);

        if (select_video && name_video) {
            btn_submit.classList.remove('disabled');
        }
        else{
            btn_submit.classList.add('disabled');
        }
    }
</script>

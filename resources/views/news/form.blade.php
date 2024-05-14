<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .cropper-container{
        margin-top: 10px;
    }.container_upload_preview{
      position: relative;
      width: 100%;
      height: 250px;
      border-radius: 10px; 
        -moz-border-radius:10px;
        -khtml-border-radius:10px;
    }.container_upload{
      background-color: #bcbcbc;
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
      color: #fff;
      font-size: 22px;
      display: flex;
      justify-content: center;
    }
</style>

<div class="row">

    <div class="col-12 col-md-6">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title" class="control-label">{{ 'Title' }}</label>
            <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : ''}}" >
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
            <label for="detail" class="control-label">{{ 'Detail' }}</label>
            <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" >{{ isset($news->detail) ? $news->detail : ''}}</textarea>
            {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('select_video') ? 'has-error' : ''}}">
            <label for="select_video" class="control-label">{{ 'Select Video' }}</label>
            <input class="form-control" name="select_video" type="file" id="select_video" accept="video/*">
            {!! $errors->first('select_video', '<p class="help-block">:message</p>') !!}
        </div>
        <a id="btn_submit" class="btn btn-sm btn-info" onclick="upload_to_firebase();">
            Upload Video
        </a>
        <div id="videoPreview"></div>

        <br>

        <div class="form-group {{ $errors->has('link_video') ? 'has-error' : ''}}">
            <label for="link_video" class="control-label">{{ 'Link Video' }}</label>
            <input class="form-control" rows="5" name="link_video" type="text" id="link_video" value="{{ isset($news->link_video) ? $news->link_video : ''}}" readonly>
            {!! $errors->first('link_video', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
            <label for="user_id" class="control-label">{{ 'User Id' }}</label>
            <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($news->user_id) ? $news->user_id : ''}}" readonly>
            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
        </div>

        <!-- <div class="form-group {{ $errors->has('link_content') ? 'has-error' : ''}}">
            <label for="link_content" class="control-label">{{ 'Link Content' }}</label>
            <textarea class="form-control" rows="5" name="link_content" type="textarea" id="link_content" >{{ isset($news->link_content) ? $news->link_content : ''}}</textarea>
            {!! $errors->first('link_content', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('title_link_content') ? 'has-error' : ''}}">
            <label for="title_link_content" class="control-label">{{ 'Title Link Content' }}</label>
            <input class="form-control" name="title_link_content" type="text" id="title_link_content" value="{{ isset($news->title_link_content) ? $news->title_link_content : ''}}" >
            {!! $errors->first('title_link_content', '<p class="help-block">:message</p>') !!}
        </div> -->

        <div class="form-group {{ $errors->has('user_like') ? 'has-error' : ''}}">
            <label for="user_like" class="control-label">{{ 'User Like' }}</label>
            <textarea class="form-control" rows="5" name="user_like" type="textarea" id="user_like" readonly>{{ isset($news->user_like) ? $news->user_like : ''}}</textarea>
            {!! $errors->first('user_like', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('user_dislike') ? 'has-error' : ''}}">
            <label for="user_dislike" class="control-label">{{ 'User Dislike' }}</label>
            <textarea class="form-control" rows="5" name="user_dislike" type="textarea" id="user_dislike" readonly>{{ isset($news->user_dislike) ? $news->user_dislike : ''}}</textarea>
            {!! $errors->first('user_dislike', '<p class="help-block">:message</p>') !!}
        </div>


        <div class="form-group {{ $errors->has('photo_content') ? 'has-error' : ''}}">
            <label for="photo_content" class="control-label">{{ 'Photo Content' }}</label>
            <input class="form-control" rows="5" name="photo_content" type="text" id="photo_content" value="{{ isset($news->photo_content) ? $news->photo_content : ''}}" readonly>
            {!! $errors->first('photo_content', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('photo_cover') ? 'has-error' : ''}}">
            <label for="photo_cover" class="control-label">{{ 'Photo Cover' }}</label>
            <input class="form-control" name="photo_cover" type="text" id="photo_cover" value="{{ isset($news->photo_cover) ? $news->photo_cover : ''}}" readonly>
            {!! $errors->first('photo_cover', '<p class="help-block">:message</p>') !!}
        </div>

    </div>

    <div class="col-md-6 col-12">
        <div class="form-group {{ $errors->has('photo_cover') ? 'has-error' : ''}} col-12 mt-3">
            <label for="photo_cover" class="control-label">{{ 'Photo Cover' }}</label>
            <input class="form-control d-none" name="photo_cover" type="file" id="photo_cover" value="{{ isset($news->photo_cover) ? $news->photo_cover : ''}}" accept="image/*" onchange="previewImage(this)">
        
            <label id="upload_photo_cover" for="photo_cover" class="container_upload">
                @if(!empty($news->photo_cover))
                <div class="d-flex justify-content-center w-100 ">
                    <img src="{{ url('storage')}}/{{ $news->photo_cover }}" alt="รูปภาพปก">
                </div>
                @else
                <div class="upload_section">
                    <div class="text-center">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Upload img</p>
                    </div>
                </div>
                @endif
            </label>

            <div id="container_photo_cover" class="container_upload_preview d-none">
                <label for="photo_cover" class="btn btn-success" style="top: 10px; right: 10px;position: absolute; z-index: 999999999999999999;">เลือกใหม่</label>
                <img id="preview_photo_cover" src="{{ url('/') }}" alt="ภาพพรีวิว" class="mt-5 d-none" style="max-width:50px; max-height:50px !important;">
            </div>  
                {!! $errors->first('photo_cover', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('photo_content') ? 'has-error' : ''}} col-12 mt-3">
            <label for="photo_content" class="control-label">{{ 'Photo Content' }}</label>
            <input class="form-control  d-none" name="photo_content" type="file" id="photo_content" value="{{ isset($news->photo_content) ? $news->photo_content : ''}}"  accept="image/*" onchange="previewImage(this)">
            <br>
            <label id="upload_photo_content" for="photo_content" class="container_upload">
                @if(!empty($news->photo_content))
                <div class="d-flex justify-content-center w-100 ">
                    <img src="{{ url('storage')}}/{{ $news->photo_content }}" alt="รูปภาพปก">
                </div>
                @else
                <div class="upload_section">
                    <div class="text-center">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Upload img</p>
                    </div>
                </div>
                @endif
            </label>
            <div id="container_photo_content" class="container_upload_preview d-none">
                <label for="photo_content" class="btn btn-success" style="top: 10px; right: 10px;position: absolute; z-index: 999999999999999999;">เลือกใหม่</label>
                <img id="preview_photo_content" src="{{ url('/') }}" alt="ภาพพรีวิว" class="mt-5 d-none" style="max-width:50px; max-height:50px !important;">
            </div>  
            {!! $errors->first('photo_content', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group d-none {{ $errors->has('user_id') ? 'has-error' : ''}} col-md-6">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ Auth::user()->id}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-12">

    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
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
    });
</script>

<!-- ----------------------------- firebase --------------------------------- -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
<script>
    // Initialize Firebase
    var firebaseConfig = {
        apiKey: "AIzaSyDdaRHU9RfAmLP9NHVnwvbEqBThNbwfs14",
        authDomain: "test-storage-63113.firebaseapp.com",
        projectId: "test-storage-63113",
        storageBucket: "test-storage-63113.appspot.com",
        messagingSenderId: "886771711607",
        appId: "1:886771711607:web:6ce7ba6fb159414ba65072"
    };
    firebase.initializeApp(firebaseConfig);
  
    var storage = firebase.storage();
</script>

<script>
    function upload_to_firebase() {
      var fileInput = document.getElementById('select_video');
      var file = fileInput.files[0];
      var name_file = new Date() + '-' + file.name ;
      var storageRef = storage.ref('/videos/' + name_file);

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
            console.log('File available at', downloadURL);
            // ตัวอย่างการแสดง URL บนหน้าเว็บ
            alert('File uploaded successfully. URL: ' + downloadURL);
          });
        }
      );
    }

</script>



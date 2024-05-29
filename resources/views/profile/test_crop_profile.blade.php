@extends('layouts.theme_user')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

	.cropper-crop-box,
  	.cropper-view-box {
    	border-radius: 50%;
  	}

	#picture_profile_input {
        display: none;
    }

    .picture {
        min-width: 230px;
        min-height: 230px;
        max-width: 230px;
        max-height: 230px;
        background: #ddd;
        display: flex;
        position: relative;
        align-items: center;
        justify-content: center;
        color: #C4C4C4;
        border: 8px solid #2e345f;
        cursor: pointer;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
    }

    .picture:hover {
        color: #777;
        background: #ccc;
    }

    .picture:active {

        background: #eee;
    }

    .picture:focus {
        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .picture__img {
        max-width: 100%;
    }

    .picture_profile_image i {
        font-size: 55px;
    }

    .picture_profile_image img {

    }

</style>

<div class="modal-body d-flex justify-content-center">
    <label class="picture" for="picture_profile_input" tabIndex="0">
        <span class="result w-100 picture_profile_image"></span>
    </label>
    <input type="file" name="picture_profile_input" id="picture_profile_input">
</div>

<div class="row">
    <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <div>
          	<!--rightbox-->
            <div class="box-2 img-result ">
                <!-- result of crop -->
                <img class="cropped" src="" alt="" id="imgPreview">
            </div>
        </div>
    </div>
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>
	
// vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
upload = document.querySelector('#picture_profile_input'),
cropper = '';

// on change show image with crop options
upload.addEventListener('change', (e) => {

    imgPreview = document.querySelector('#imgPreview');

    if (e.target.files.length) {
        // start file reader
        const reader = new FileReader();
        reader.onload = (e)=> {
            if(e.target.result){
                // create new image
                let img = document.createElement('img');
                img.id = 'image';
                img.style = 'width:100%;';
                img.src = e.target.result
                // clean result before
                result.innerHTML = '';
                // append new image
                result.appendChild(img);
                // show save btn and options
                // save.classList.remove('hide');
                // options.classList.remove('hide');
                // init cropper
                cropper = new Cropper(image, {
                    dragMode: 'move',
                    aspectRatio: 1,
                    autoCropArea: 1,
                    center: true,
                    cropBoxMovable: false,
                    cropBoxResizable: true,
                    maxCropBoxHeight: 400,
                    viewMode: 2,
                    guides: false,
                    ready: function(event) {
                        this.cropper = cropper;
                    },
                    crop: function(event) {
                        let imgSrc = this.cropper.getCroppedCanvas({
                            width: 200,
                            height: 200 // input value
                        }).toDataURL("image/png");
                        imgPreview.src = imgSrc;
                    }
                });
            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});

</script>

@endsection
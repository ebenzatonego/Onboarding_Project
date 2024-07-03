@extends('layouts.theme_admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .phone-frame {
        min-width: 375px;
        min-height: 783px;
        max-width: 375px;
        max-height: 783px;
        border-radius: 40px;
        border: 8px #000 solid;
        overflow: hidden;
        position: -webkit-sticky;
        position: sticky;
        top: 70px;
    }

    .frame-top {
        display: flex;
        background-color: #cbcbcb;
        border-radius: 32px 32px 0 0;
    }

    .phone-camera {
        background-color: #000;
        border-radius: 0 0 15px 15px;
        width: 100%;
        height: 30px;
        position: relative;
        display: block;
    }

    .time {
        font-size: 16px;
    }

    .phone-website {
        width: 100%;
        padding: 10px;
        background-color: #cbcbcb;

    }

    .azayagencyjourney {
        display: flex;
        justify-content: center;
        padding: 8px;
        background-color: #9799a0;
        border-radius: 8px;
        position: relative;
    }

    .icon-reload {
        position: absolute;
        top: 55%;
        right: 5px;
        transform: translate(-50%, -50%);
    }

    .content-training {
        width: 100%;
        height: calc(100% - 233px);
        overflow: auto;
    }

    .content-training::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .content-training {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .frame-bottom {
        background-color: #cbcbcb;
        width: 100%;
        display: block;
    }

    .icon-bottom {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        padding: 10px;
    }

    .icon-bottom .active {
        color: #569de8;

    }

    .tabs-phone {
        margin: 5px 0;
        height: 5px;
        width: 40%;
        background-color: #000;
        border-radius: 20px;
    }

    .navbar-top {
        padding: 5px;
        box-shadow: 0 0.125rem 0.25rem rgb(136 152 170 / 15%);

    }

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

.img-container {
  width: 100%;
/*  height: 40vh;*/
  margin-top: 10px;
}
#imageToCrop  {
  max-width: 100%;
  height: auto;
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

    /*  photo_gallery  */
    .group-img {
        flex: 0 0 20%;
        max-width: 20%;
        position: relative;

        cursor: pointer;
    }

    .img-news {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        filter: grayscale(70%);
    }

    .img-news.active {
        filter: blur(0) grayscale(0) !important;

    }

    .img-news.active+.icon-preview {
        display: none !important;

    }

    .preview-img {
        width: 100%;
    }

    .icon-preview {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff !important;
        font-size: 33px;
        pointer-events: none;
        /* ปิดการใช้งาน hitbox */
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

<a id="goto_manage_activity" href="{{ url('/manage_activity') }}" class="d-none"></a>

<!-- Modal for cropping -->
<div class="modal fade" id="cropModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header row">
        <div class="col-3">
          <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
        </div>
        <div class="col-9">
          <div class="float-end">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#cropModal').modal('hide');">Close</button>
            <button type="button" class="btn btn-primary" id="cropAndSave">Crop and Save</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <img id="imageToCrop" src="" alt="Picture">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- จัดการ Photo Gallery -->
<button id="btn_Modal_showPhotoGallery" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#Modal_showPhotoGallery">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="Modal_showPhotoGallery" tabindex="-1" aria-labelledby="Label_showPhotoGallery" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label_showPhotoGallery">จัดการ Photo Gallery</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row" id="modal-body">
        <!-- Cards will be appended here -->
      </div>
      <hr>
      <div class="d-flex justify-content-center mt-2 mb-4">
        <button type="button" class="btn btn-warning mx-2 px-4" onclick="document.querySelector('#news_photo').click();">
            <i class="fa-solid fa-plus"></i> เพิ่มรูปภาพ
        </button>
        <button type="button" class="btn btn-success mx-2 px-5" data-dismiss="modal" aria-label="Close" onclick="cretae_div_preview_photo_gallery();">
            <i class="fa-solid fa-check"></i> ยืนยัน
        </button>
      </div>
    </div>
  </div>
</div>

<input class="d-none" type="file" id="news_photo" name="news_photo[]" accept="image/*" multiple onchange=" addNewPhotos();">

<script>

    var amount_photo_gallery = 0 ;
    var arr_photo_gallery ;
    var check_start = "Yes" ;

    function showPhotoGallery() {

        arr_photo_gallery = document.getElementById('photo_gallery').value;
        // let photoGallery = document.getElementById('photo_gallery').value;
        let photoUrls = arr_photo_gallery.split(',');
        let modalBody = document.getElementById('modal-body');
        modalBody.innerHTML = '';

        // // ลบเฉพาะ .card-old-img และลดค่า amount_photo_gallery
        // let oldImages = modalBody.querySelectorAll('.card-old-img');
        // oldImages.forEach(img => {
        //     img.parentElement.remove();
        //     amount_photo_gallery--;
        // });

        if(arr_photo_gallery){
            photoUrls.forEach((url, index) => {
                let card = document.createElement('div');
                card.classList.add('card', 'mb-3' , 'p-4');
                card.style.width = '10rem';

                let img = document.createElement('img');
                img.classList.add('card-img-top' , 'card-old-img');
                img.src = url;
                img.alt = `Photo ${index + 1}`;

                let cardBody = document.createElement('div');
                cardBody.classList.add('card-body');

                let deleteButton = document.createElement('span');
                deleteButton.classList.add('btn', 'btn-danger' , 'btn-sm');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', function() {
                    photoUrls.splice(index, 1);
                    updatePhotoGallery(photoUrls);
                    // showPhotoGallery();
                    amount_photo_gallery--;
                    card.remove();
                    // console.log(amount_photo_gallery);
                });

                cardBody.appendChild(deleteButton);
                card.appendChild(img);
                card.appendChild(cardBody);
                modalBody.appendChild(card);

                if(check_start == 'Yes'){
                    amount_photo_gallery++;
                }
            });

            // console.log(amount_photo_gallery);

        }

        // console.log(html_addNewPhotos);
        modalBody.insertAdjacentHTML('beforeend', html_addNewPhotos); // แทรกล่างสุด
        check_start = 'No';

    }

    function updatePhotoGallery(photoUrls) {
        let photoGallery = document.getElementById('photo_gallery');
        photoGallery.value = photoUrls.join(',');
        arr_photo_gallery = photoUrls.join(',');
        showPhotoGallery();
    }

    var html_addNewPhotos = `` ;
    var count_new_photo = 0 ;

    function addNewPhotos() {

        let newsPhotoInput = document.getElementById('news_photo');
        let files = newsPhotoInput.files;
        let modalBody = document.getElementById('modal-body');

        let check_amount = 0 ;
        check_amount = amount_photo_gallery + files.length ;
        // console.log("check_amount >> " + check_amount);

        if(check_amount <= 20){
            Array.from(files).forEach(file => {

                count_new_photo = count_new_photo  + 1 ;

                let card = document.createElement('div');
                card.classList.add('card', 'mb-3' , 'p-4');
                card.style.width = '10rem';
                card.id = 'new_count_' + count_new_photo;

                let img = document.createElement('img');
                img.classList.add('card-img-top', 'card-new-img');
                img.src = URL.createObjectURL(file);
                img.alt = 'New Photo';

                let cardBody = document.createElement('div');
                cardBody.classList.add('card-body');

                let deleteButton = document.createElement('button');
                    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                    deleteButton.textContent = 'Delete';

                    deleteButton.setAttribute('onclick' , 'drop_of_new_photo('+count_new_photo+')');
                    // deleteButton.addEventListener('click', function() {
                    //     card.remove();
                    //     amount_photo_gallery--;
                    //     console.log(amount_photo_gallery);
                    // });

                cardBody.appendChild(deleteButton);
                card.appendChild(img);
                card.appendChild(cardBody);
                modalBody.appendChild(card);
                amount_photo_gallery++;

                let care_new_photo = document.querySelector('#new_count_' + count_new_photo);
                // console.log(care_new_photo);
                html_addNewPhotos = html_addNewPhotos + care_new_photo.outerHTML;
            });
        }
        else{
            alert('เพิ่มรูปภาพสูงสุด 20 รูป');
        }

        // console.log(amount_photo_gallery);

    }

    function drop_of_new_photo(count_new_photo) {

        // แปลงข้อความ HTML กลับเป็น HTMLDivElement
        let tempDiv = document.createElement('div');
        tempDiv.innerHTML = html_addNewPhotos;

        let drop_new_photo = document.querySelector('#new_count_' + count_new_photo);
        drop_new_photo.remove();

        let tempDiv_drop_new_photo = tempDiv.querySelector('#new_count_' + count_new_photo);
        tempDiv_drop_new_photo.remove();

        amount_photo_gallery--;
        // console.log(amount_photo_gallery);

        html_addNewPhotos = tempDiv.innerHTML;
        // console.log(html_addNewPhotos);
    }

    function cretae_div_preview_photo_gallery(){

        let check_img_main = 'No' ;
        let div_preview_photo_gallery = document.querySelector('#div_preview_photo_gallery');
            div_preview_photo_gallery.innerHTML = '' ;

        let photo_old = document.getElementById('photo_gallery').value;
        let photo_old_Urls = photo_old.split(',');

        // console.log('cretae_div_preview_photo_gallery');
        // console.log(photo_old_Urls);

        if(photo_old_Urls[0] != ''){

            for (let i = 0; i < photo_old_Urls.length; i++) {

                let html_photo_main = ``;
                let check_active = ``;
                let html_photo_old = ``;

                if(check_img_main == 'No'){
                    check_img_main = 'Yes' ;
                    html_photo_main = `<img id="preview_photo_gallery_main" src="`+photo_old_Urls[i]+`" class="preview-img" alt="">`;
                    check_active = `active` ;

                    html_photo_old = `
                        `+html_photo_main+`

                            <div id="preview_photo_gallery" class="row mb-3 row-cols-auto g-2 justify-content-start mt-3">
                                <div class="group-img p-1">
                                    <img src="`+photo_old_Urls[i]+`" class="img-news border rounded `+check_active+`" >
                                    <i class="fa-light fa-eye icon-preview"></i>
                                </div>
                            </div>
                    `;
                    div_preview_photo_gallery.insertAdjacentHTML('beforeend', html_photo_old); // แทรกล่างสุด
                }
                else{
                    html_photo_old = `
                        <div class="group-img p-1">
                            <img src="`+photo_old_Urls[i]+`" class="img-news border rounded `+check_active+`" >
                            <i class="fa-light fa-eye icon-preview"></i>
                        </div>
                    `;
                    let preview_photo_gallery = document.querySelector('#preview_photo_gallery');
                    preview_photo_gallery.insertAdjacentHTML('beforeend', html_photo_old); // แทรกล่างสุด
                }
            }

            cerate_html_of_new_photo('สร้าง HTML แล้ว');

        }else{
            cerate_html_of_new_photo('ยังไม่ได้สร้าง HTML');
        }

        new_imgNewsListener_click();
        show_preview_date_start_end();

    }

    function cerate_html_of_new_photo(text){

        let care_new_photo = document.querySelectorAll('.card-new-img');
        let arr_care_new_photo = [];

        care_new_photo.forEach(photo => {
            arr_care_new_photo.push(photo.src);
        });

        // console.log(arr_care_new_photo);

        if(arr_care_new_photo){

            if(text == 'สร้าง HTML แล้ว'){
                for (let i = 0; i < arr_care_new_photo.length; i++) {
                    let html_photo_new = `
                        <div class="group-img p-1">
                            <img src="`+arr_care_new_photo[i]+`" class="img-news border rounded" >
                            <i class="fa-light fa-eye icon-preview"></i>
                        </div>
                    `;
                    let preview_photo_gallery = document.querySelector('#preview_photo_gallery');
                    preview_photo_gallery.insertAdjacentHTML('beforeend', html_photo_new); // แทรกล่างสุด
                }
            }
            else if(text == 'ยังไม่ได้สร้าง HTML'){
                let check_img_main = 'No' ;
                let div_preview_photo_gallery = document.querySelector('#div_preview_photo_gallery');
                    div_preview_photo_gallery.innerHTML = '' ;

                for (let xi = 0; xi < arr_care_new_photo.length; xi++) {
                    let html_photo_main = ``;
                    let check_active = ``;
                    let html_photo_new = ``;

                    if(check_img_main == 'No'){
                        check_img_main = 'Yes' ;
                        html_photo_main = `<img id="preview_photo_gallery_main" src="`+arr_care_new_photo[xi]+`" class="preview-img" alt="">`;
                        check_active = `active` ;

                        html_photo_new = `
                            `+html_photo_main+`

                                <div id="preview_photo_gallery" class="row mb-3 row-cols-auto g-2 justify-content-start mt-3">
                                    <div class="group-img p-1">
                                        <img src="`+arr_care_new_photo[xi]+`" class="img-news border rounded `+check_active+`" >
                                        <i class="fa-light fa-eye icon-preview"></i>
                                    </div>
                                </div>
                        `;
                        div_preview_photo_gallery.insertAdjacentHTML('beforeend', html_photo_new); // แทรกล่างสุด
                    }
                    else{
                        html_photo_new = `
                            <div class="group-img p-1">
                                <img src="`+arr_care_new_photo[xi]+`" class="img-news border rounded `+check_active+`" >
                                <i class="fa-light fa-eye icon-preview"></i>
                            </div>
                        `;
                        let preview_photo_gallery = document.querySelector('#preview_photo_gallery');
                        preview_photo_gallery.insertAdjacentHTML('beforeend', html_photo_new); // แทรกล่างสุด
                    }
                }
            }

        }

    }

</script>

<script>

    function new_imgNewsListener_click(){
        const imgNewsElements = document.querySelectorAll('.img-news');

        imgNewsElements.forEach(imgNews => {
            imgNews.addEventListener('click', function handleClick() {
                // Remove the 'active' class from all previously clicked images
                imgNewsElements.forEach(otherImg => otherImg.classList.remove('active'));

                // Add the 'active' class to the clicked image
                this.classList.add('active');

                // Update the 'src' attribute of the preview image
                const previewImg = document.querySelector('.preview-img');
                previewImg.src = this.src;
            });
        });
    }
</script>

<div class="container-fluid">

    <div class="d-flex">

        <div class="phone-frame">
            <div class="frame-top">
                <div class="text-dark px-4 time d-flex align-items-center">{{ date('H:i') }}</div>
                <div class="w-100 phone-camera d-flex align-items-center"> &nbsp;</div>
                <div class="px-2 d-flex align-items-center">
                    <i class="text-dark mx-1 fa-solid fa-signal-bars"></i>
                    <i class="text-dark mx-1 fa-solid fa-wifi"></i>
                    <i class="text-dark mx-1 fa-solid fa-battery-three-quarters"></i>
                </div>
            </div>
            <div class="phone-website">
                <div class="azayagencyjourney">
                    <i class="fa-solid fa-lock me-2 text-dark"></i>
                    <span class="text-dark">https://azayagencyjourney.com</span>

                    <div class="icon-reload">
                        <i class="text-dark fa-solid fa-rotate-right"></i>
                    </div>
                </div>
            </div>
            <div class="navbar-top w-100">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center ">
                        <img src="{{url('/img/logo/Logo Main.png')}}" style="width:29px;height:27px">
                        <div class="ms-2 ">
                            <p class="m-0 " style="font-size: 10px;">AGENCY JOURNEY</p>
                            <p class="m-0" style="font-size: 4px;">ALLIANZ ON BOARDING</p>
                        </div>

                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="d-flex align-items-center p-0 m-0">
                            <div id="li_search_theme_user" class="nav-item mobile-search-icon d-flex align-items-center mx-2">
                                <a class="" >
                                    <i class="fa-solid fa-magnifying-glass text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret d-flex align-items-center">
                                    <i class="fa-regular fa-bookmark text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret position-relative d-flex align-items-center">
                                    <i class="fa-regular fa-calendar text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret position-relative d-flex align-items-center">
                                    <i class="fa-regular fa-bell text-color-obd"></i>
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
                <div>

                </div>
            </div>

            <div class="content-training">
                <style>
                    @media screen and (max-width: 500px) {

                        .conteiner-detail-training,
                        .conteiner-detail-training .row div {
                            padding: 0;

                        }
                    }

                    @media only screen and (max-width: 767px) {
                        .title-training {
                            padding-left: 24px;
                        }

                        .btn-share-group {
                            padding: 24px 0 24px 0 !important;

                        }
                    }


                    @media screen and (min-width: 767px) {
                        .btn-share-group {
                            padding: 24px 0 24px 0 !important;
                        }
                    }

                    .btn-back-all-course {
                        height: 24px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: rgb(255, 255, 255, .80);
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        padding-left: 0;
                        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        color: #003781;
                        position: absolute;
                        top: 10px;
                        left: 10px;
                        font-size: 8px;
                    }

                    .btn-back-all-course:hover {
                        color: #003781;
                    }

                    .btn-back-all-course span {
                        margin-left: 10px;
                        font-weight: bold;
                    }

                    .btn-back-all-course i {
                        width: 24px;
                        height: 24px;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        background-color: rgb(255, 255, 255, .80);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    }

                    .btn-bookmark-training.active svg .bookmark-bg {
                        fill: #EDB529;
                    }

                    .btn-bookmark-training.active svg .bookmark-icon {
                        fill: #FBFBFB;
                    }

                    .btn-like {
                        background-color: #B8C6D8;
                        width: 70px;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        transition: all .15s ease-in-out;
                    }

                    .btn-like .icon-btn i {
                        color: #B8C6D8;
                    }

                    .btn-like.active {
                        background-color: #4B90E2;
                    }

                    .btn-like.active .icon-btn i {
                        color: #4B90E2;
                    }

                    .btn-like:hover,
                    .btn-dislike:hover,
                    .btn-share:hover {
                        color: #fff;

                    }

                    .btn-dislike {
                        background-color: #E6E6E6;
                        width: 70px;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: all .15s ease-in-out;
                    }

                    .btn-dislike .icon-btn i {
                        color: #E6E6E6;
                    }

                    .btn-dislike.active {
                        background-color: #EA0505;
                    }

                    .btn-dislike.active .icon-btn i {
                        color: #EA0505;

                    }

                    .btn-share {
                        background-color: #203881;
                        width: 70px;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: #fff;
                    }

                    .icon-btn {
                        min-width: 22px;
                        min-height: 22px;
                        max-width: 22px;
                        max-height: 22px;
                        background-color: #fff;
                        border-radius: 50%;
                        -webkit-border-radius: 50%;
                        -moz-border-radius: 50%;
                        -ms-border-radius: 50%;
                        -o-border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .icon-btn i {
                        font-size: 14px;
                        margin: 0;
                    }
                </style>
                <div class="container conteiner-detail-training">
                    <div class="row">
                        <div class="col-12 p-0" style="position: relative;">
                            <button class="btn btn-back-all-course">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span>ย้อนกลับ</span>
                            </button>

                            <img id="preview_photo" src="{{ $data_activitys->photo }}" class="" alt="" style="width: 100%;">
                            
                            <div class="px-4 d-flex justify-content-between">

                                <div class="w-100 d-flex btn-share-group">
                                    <button class="btn btn-like  me-1">
                                        <div class="icon-btn d-flex">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </div>
                                        @php
                                            $count = 0;
                                            if( !empty($data_activitys->user_like) ){
                                                $array = json_decode($data_activitys->user_like, true);
                                                $count = count($array);
                                            }
                                        @endphp
                                        <div class="d-flex align-items-center ms-1">{{ $count }}</div>

                                    </button>
                                    <button class="btn btn-dislike me-1">
                                        <div class="icon-btn">
                                            <i class="fa-solid fa-thumbs-down"></i>
                                        </div>
                                    </button>
                                    <button class="btn btn-share me-1">
                                        <i class="fa-solid fa-share m-0"></i>
                                    </button>
                                </div>
                                <div class=" px-2 py-0 d-flex align-items-start btn-bookmark-training cursor-pointer">
                                    <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                                        <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                                    </svg>
                                </div>
                            </div>
                            <div class="title-training px-4">
                                <div>
                                    <p id="preview_title" class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">{{$data_activitys->title}}</p>
                                </div>
                                <div class="hastag-training">
                                    <span id="preview_name_type">#{{ $data_activitys->name_type }}</span>
                                </div>
                                <div class="rating-training mt-2">
                                    <span style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">{{$data_activitys->sum_rating ? $data_activitys->sum_rating : '0'}}</span>
                                    <i data-star="{{$data_activitys->sum_rating ? $data_activitys->sum_rating : '0'}}" class="star-rating"></i>
                                </div>

                            </div>
                        </div>
                        <style>
                            .hastag-training {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 5px;
                            }

                            .hastag-training span {
                                border: #0E2B81 1px solid;
                                padding: 0 10px;
                                color: #0E2B81;
                                font-size: 9px;
                                font-style: normal;
                                font-weight: 300;
                                line-height: normal;
                                border-radius: 50px;
                                -webkit-border-radius: 50px;
                                -moz-border-radius: 50px;
                                -ms-border-radius: 50px;
                                -o-border-radius: 50px;
                            }



                            .star-rating {
                                text-align: left;
                                font-style: normal;
                                display: inline-block;
                                position: relative;
                                unicode-bidi: bidi-override;
                            }

                            .star-rating::before {
                                display: block;
                                content: '★★★★★';
                                color: #fff;
                                -webkit-text-stroke-width: .5px;
                                -webkit-text-stroke-color: #EDB529;
                            }

                            .star-rating::after {
                                white-space: nowrap;
                                position: absolute;
                                top: 0;
                                left: 0;
                                content: '★★★★★';
                                color: #EDB529;
                                overflow: hidden;
                                height: 100%;
                            }

                            .star-rating::after {
                                width: var(--rating-width);
                            }

                            .btn-join-meet {
                                color: #fff;
                                background-color: #003781;
                                border-radius: 25px;
                                -webkit-border-radius: 25px;
                                -moz-border-radius: 25px;
                                -ms-border-radius: 25px;
                                -o-border-radius: 25px;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                            }
                        </style>
                        <div class="col-12 px-4 mb-5">
                            
                            <!-- if ถ้ามีเวลาเข้าร่วม -->
                            <div class="d-flex align-items-center my-2 mt-3">
                                <i class="fa-light fa-calendar-days me-2" style="color: #0E2B81;font-size:18px"></i>
                                <span id="text_date_start" style="color: #0E2B81;font-size: 12px;font-style: normal;font-weight: 600;">
                                    <!--  -->
                                </span>
                            </div>
                            <!-- endif -->

                            <!-- if ถ้ามี รายละเอียดการเข้าอบรม -->
                            <div class="my-3">
                                <div class="d-flex ">
                                    <div>
                                        <p class="m-0 mb-2" style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">
                                            <i class="fa-light fa-location-dot me-2"></i>
                                            <span id="preview_location_detail">{!! $data_activitys->location_detail !!}</span>
                                        </p>
                                        <a id="preview_link_map" href="{{ $data_activitys->link_map }}" target="bank" id="link-to-copy" style="color: #0872FF;font-size: 10px;font-style: normal;font-weight: 600;line-height: normal;text-decoration-line: underline;">
                                            {{ $data_activitys->link_map }}
                                        </a>
                                        <i style="color: #9E9E9E;" class="fa-regular fa-copy mx-2"  onclick="copyLink_map()"></i>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                            <!-- endif -->

                            <div class="detail-training">
                                <div id="preview_detail" class="mt-2">
                                    {!!$data_activitys->detail!!}
                                </div>

                                <div id="div_preview_photo_gallery">
                                @if( !empty($data_activitys->photo_gallery) )

                                    @php
                                        $urls = $data_activitys->photo_gallery;
                                        $urlArray = explode(',', $urls);
                                        $check_photo_gallery_1 = 0 ;
                                    @endphp

                                    <img id="preview_photo_gallery_main" src="{{ $urlArray[0] }}" class="preview-img" alt="">

                                    <div id="preview_photo_gallery" class="row mb-3 row-cols-auto g-2 justify-content-start mt-3">
                                        @foreach($urlArray as $item_img)
                                            @if( $check_photo_gallery_1 == 0 )
                                                <div class="group-img p-1">
                                                    <img src="{{ $item_img }}" class="img-news border rounded active" >
                                                    <i class="fa-light fa-eye icon-preview"></i>
                                                </div>
                                                @php $check_photo_gallery_1 = $check_photo_gallery_1 + 1 @endphp
                                            @else
                                                <div class="group-img p-1">
                                                    <img src="{{ $item_img }}" class="img-news border rounded" >
                                                    <i class="fa-light fa-eye icon-preview"></i>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <script>
                                        const imgNewsElements = document.querySelectorAll('.img-news');

                                        imgNewsElements.forEach(imgNews => {
                                            imgNews.addEventListener('click', function handleClick() {
                                                // Remove the 'active' class from all previously clicked images
                                                imgNewsElements.forEach(otherImg => otherImg.classList.remove('active'));

                                                // Add the 'active' class to the clicked image
                                                this.classList.add('active');

                                                // Update the 'src' attribute of the preview image
                                                const previewImg = document.querySelector('.preview-img');
                                                previewImg.src = this.src;
                                            });
                                        });
                                    </script>
                                @endif
                                </div>


                                @if( !empty($data_activitys->video))
                                    <div id="div_tag_show_preview_video">
                                        <div class="d-flex justify-content-end w-100 mt-4 mb--2" style="color: #989898;">
                                            <i class="fa-regular fa-clock me-2"></i>
                                            <span id="videoDuration"></span>
                                        </div>
                                        <div class="d-flex justify-content-center w-100">
                                            <video id="preview_video" src="{{ $data_activitys->video }}" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;margin-top:5px!important;" class="video-preview"></video>
                                        </div>
                                    </div>
                                @else
                                    <div id="div_tag_show_preview_video" class="d-none">
                                        <div class="d-flex justify-content-end w-100 mt-4 mb--2" style="color: #989898;">
                                            <i class="fa-regular fa-clock me-2"></i>
                                            <span id="videoDuration"></span>
                                        </div>
                                        <div class="d-flex justify-content-center w-100">
                                            <video id="preview_video" src="" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;margin-top:5px!important;" class="video-preview"></video>
                                        </div>
                                    </div>
                                @endif

                                <div class="w-100 mt-3">
                                    <p class="mb-2 mt-3" style="color: #989898;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;">ถูกใจกิจกรรมนี้?</p>

                                    <div class="d-flex justify-content-end ">
                                        <button class="btn btn-like  me-1">
                                            <div class="icon-btn d-flex">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </div>
                                            <div class="d-flex align-items-center ms-1">{{ $count }}</div>

                                        </button>
                                        <button class="btn btn-dislike me-1">
                                            <div class="icon-btn">
                                                <i class="fa-solid fa-thumbs-down"></i>
                                            </div>
                                        </button>
                                        <button class="btn btn-share me-1">
                                            <i class="fa-solid fa-share m-0"></i>
                                        </button>

                                        <div class=" px-2 py-0 d-flex align-items-start btn-bookmark-training cursor-pointer">
                                            <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                                                <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                                            </svg>
                                        </div>

                                    </div>
                                    <div class="mt-5">
                                        <a>
                                            <i class="fa-solid fa-chevron-left"></i> ย้อนกลับ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

            </div>

            <style>
                .div-navbar-botttom {
                    border-top: 3px solid #616161;

                }

                .div-navbar-botttom .col-navbar a {
                    color: #616161 !important;

                }

                .div-navbar-botttom .col-navbar i {
                    font-size: 15px;
                }

                .div-navbar-botttom .col-navbar p {
                    color: #616161 !important;
                    font-size: 8px;
                    text-overflow: unset;
                    color: #fff;
                    filter: none;
                    font-weight: bolder;
                }

                .navbar-bottom-active {
                    background-color: rgb(0, 55, 129, .20) !important;
                    color: rgb(0, 55, 129) !important;
                    border-radius: 10px;
                    -webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    -ms-border-radius: 10px;
                    -o-border-radius: 10px;
                    max-width: 100px;
                    min-width: 50px;
                }

                .navbar-bottom-active * {
                    color: rgb(0, 55, 129) !important;
                }
            </style>
            <div id="navbar-botttom" class="container" style="z-index: 99998;">
                <div class="row justify-content-center mx-2 div-navbar-botttom">
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center ">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2 navbar-bottom-active" id="menu_theme_user_Training">
                            <a >
                                <i class="fa-regular fa-graduation-cap fa-flip-horizontal"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Training
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Product">
                            <a class="">
                                <i class="fa-regular fa-clipboard-list"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Product
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Home">
                            <a >
                                <i class="fa-regular fa-house"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Home
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_News">
                            <a >
                                <i class="fa-regular fa-newspaper"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    News
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Career_Path">
                            <a >
                                <i class="fa-regular fa-wrench-simple fa-rotate-by" style="--fa-rotate-angle: 320deg;"></i>
                                <p class=" text-truncate mt-1 mb-0">
                                    Tools
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame-bottom">
                <div class="w-100 icon-bottom">
                    <i class="fa-solid fa-chevron-left"></i>
                    <i class="fa-solid fa-chevron-right"></i>
                    <i class="active fa-sharp fa-light fa-arrow-up-from-square"></i>
                    <i class="active fa-light fa-book-open"></i>
                    <i class="active fa-sharp fa-light fa-clone"></i>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <span class="tabs-phone"></span>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info ms-4 w-100">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center justify-content-between">
                    <div class="d-flex">
                        <h5 class="mb-0 text-info">
                            แก้ไขกิจกรรม
                        </h5>
                    </div>
                    <button id="btn_cf_edit_data" class="btn btn-success float-end d-flex align-items-center" type="button" disabled onclick="cf_edit_data();">
                        <span id="span_load_save" class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                        ยืนยันการเปลี่ยนแปลง
                    </button>
                </div>

                <hr>

                <div class="row">
                    <div class="col-4">
                        @if( $data_activitys->status == 'Yes' )
                            <h4>
                                Status : <span id="preview_status" class="text-success">Active</span>
                            </h4>
                        @else
                            <h4>
                                Status : <span id="preview_status" class="text-danger">Inactive</span>
                            </h4>
                        @endif
                    </div>
                    <div class="col-8">
                        <div class="float-end">
                            เวลาแสดงผล
                        </div>
                        @php
                            $text_datetime_start_to_end = '';

                            if( !empty($data_activitys->datetime_end) ){
                                $datetime_start = Carbon\Carbon::parse($data_activitys->datetime_start);
                                $datetime_start = $datetime_start->format('d/m/Y H:i  น.');

                                $datetime_end = Carbon\Carbon::parse($data_activitys->datetime_end);
                                $datetime_end = $datetime_end->format('d/m/Y H:i น.');

                                $text_datetime_start_to_end = $datetime_start . " - " . $datetime_end;
                            }else{
                                $datetime_start = Carbon\Carbon::parse($data_activitys->datetime_start);
                                $datetime_start = $datetime_start->format('d/m/Y H:i น.');

                                $text_datetime_start_to_end = $datetime_start ;
                            }

                        @endphp
                        <br>
                        <p id="preview_text_datetime_start_to_end" class="float-end" style="font-size: 16px;">
                            {{ $text_datetime_start_to_end }}
                        </p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">
                        ชื่อกิจกรรม
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" id="title" value="{{ isset($data_activitys->title) ? $data_activitys->title : ''}}" placeholder="เพิ่มชื่อ" oninput="show_preview_data('title',event);" onchange="show_preview_date_start_end();">
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="for_rank" class="col-sm-2 col-form-label">
                        ประเภท
                    </label>
                    <div class="col-sm-10">
                        <select class="form-select" name="name_type" type="text" id="name_type" value="" onchange="document.querySelector('#activity_type_id').value = document.querySelector('#name_type').value ;show_preview_data('name_type',event);show_preview_date_start_end();">
                            @foreach($name_type as $item)
                                @if($data_activitys->activity_type_id == $item->id)
                                    <option selected value="{{ $item->id }}">{{ $item->name_type }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name_type }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input class="form-control d-none" name="activity_type_id" type="text" id="activity_type_id" value="{{ isset($data_activitys->activity_type_id) ? $data_activitys->activity_type_id : ''}}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">
                        วันที่ของกิจกรรม
                    </label>
                    @php
                        $checked_all_day = '' ;
                        $class_div_not_all_day = '' ;
                        if($data_activitys->all_day == 'Yes'){
                            $checked_all_day = 'checked' ;
                            $class_div_not_all_day = 'd-none' ;
                        }
                      @endphp
                    <div class="col-sm-6 mb-2">
                        <label>วันเริ่ม</label>
                        <input class="form-control" type="date" name="date_start"  id="date_start" value="{{ isset($data_activitys->date_start) ? $data_activitys->date_start : ''}}" onchange="show_preview_date_start_end();show_preview_data('date_of_activitys',event);">
                        <div id="div_not_all_day" class="row {{ $class_div_not_all_day }}">
                            <div class="col-sm-12 mt-2 mb-2">
                                <label>เวลาเริ่ม</label>
                                <input class="form-control" type="time" name="time_start"  id="time_start" value="{{ isset($data_activitys->time_start) ? $data_activitys->time_start : ''}}" onchange="show_preview_date_start_end();show_preview_data('date_of_activitys',event);">
                            </div>
                            <div class="col-sm-12 mt-3 mb-2">
                                <label>วันสิ้นสุด</label>
                                <input class="form-control" type="date" name="date_end"  id="date_end" value="{{ isset($data_activitys->date_end) ? $data_activitys->date_end : ''}}" onchange="show_preview_date_start_end();show_preview_data('date_of_activitys',event);">
                            </div>
                            <div class="col-sm-12 mt-2 mb-2">
                                <label>เวลาสิ้นสุด</label>
                                <input class="form-control" type="time" name="time_end"  id="time_end" value="{{ isset($data_activitys->time_end) ? $data_activitys->time_end : ''}}" onchange="show_preview_date_start_end();show_preview_data('date_of_activitys',event);">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4" >
                        <div class="checkbox-wrapper-46 mt-4">
                          <input type="text" id="all_day" name="all_day" class="d-none" value="{{ isset($data_activitys->all_day) ? $data_activitys->all_day : ''}}">

                          <input {{ $checked_all_day }} type="checkbox" id="check_all_day" class="inp-cbx" onclick="change_select_all_day();">
                          <label for="check_all_day" class="cbx"
                            ><span>
                              <svg viewBox="0 0 12 10" height="10px" width="12px">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                            ><span>ทั้งวัน</span>
                          </label>
                        </div>
                    </div>
                </div>
                <script>
                    function change_select_all_day(){
                        let check_all_day = document.querySelector('#check_all_day');
                        if(check_all_day.checked){
                            // console.log('Yes');
                            document.querySelector('#time_start').value = '';
                            document.querySelector('#date_end').value = '';
                            document.querySelector('#time_end').value = '';
                            document.querySelector('#all_day').value = 'Yes';

                            document.querySelector('#div_not_all_day').classList.add('d-none');
                        }
                        else{
                            // console.log('No');
                            document.querySelector('#all_day').value = '';
                            document.querySelector('#div_not_all_day').classList.remove('d-none');
                        }
                        show_preview_date_start_end();
                        show_preview_data('date_of_activitys',event);
                    }
                </script>


                <div class="row mb-3">
                    <label for="location_detail" class="col-sm-2 col-form-label">
                        สถานที่
                    </label>
                    <div class="col-sm-10 location_detail">
                        <input class="form-control" name="location_detail" type="text" id="location_detail" value="{{ isset($data_activitys->location_detail) ? $data_activitys->location_detail : ''}}" placeholder="เพิ่มรายละเอียดสถานที่" oninput="show_preview_data('location_detail',event);show_preview_date_start_end();">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="link_map" class="col-sm-2 col-form-label">
                        Google map
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="link_map" type="text" id="link_map" value="{{ isset($data_activitys->link_map) ? $data_activitys->link_map : ''}}" placeholder="เพิ่มลิงก์ Google map" oninput="show_preview_data('link_map',event);show_preview_date_start_end();">
                    </div>
                </div>

                <div id="div_alert_add_video" class="row mb-3 d-none">
                    <label for="" class="col-sm-2 col-form-label">
                        <!--  -->
                    </label>
                    <div class="col-sm-10">
                        <span class="text-danger">
                            กรุณาเพิ่มวิดีโอ
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">
                        รูปภาพ / วิดีโอ
                    </label>
                    <div class="col-sm-10">
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary me-2" onclick="document.querySelector('#select_photo').click();">
                                <i class="fa-solid fa-image"></i> เลือกรูปภาพ
                            </button>
                            <button type="button" class="btn btn-danger mx-2" onclick="document.querySelector('#select_video').click();">
                                <i class="fa-duotone fa-photo-film"></i> เลือกวิดีโอ
                            </button>
                        </div>

                        <input class="form-control d-none" name="select_video" type="file" id="select_video" accept="video/*" onchange="show_preview_date_start_end();">
                        <input class="form-control d-none" name="video" type="text" id="video" value="{{ isset($data_activitys->video) ? $data_activitys->video : ''}}">

                        <input class="form-control d-none" name="select_photo" type="file" id="select_photo" accept="image/*" onchange="show_preview_date_start_end();">
                        <input class="form-control d-none" name="photo" type="text" id="photo" value="{{ isset($data_activitys->photo) ? $data_activitys->photo : ''}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">
                        Photo Gallery
                    </label>
                    <div class="col-sm-10">
                        <div class="d-flex">
                            <button type="button" class="btn btn-warning me-2" onclick="showPhotoGallery();document.querySelector('#btn_Modal_showPhotoGallery').click();">
                                <i class="fa-solid fa-images"></i> จัดการ Photo Gallery
                            </button>
                        </div>
                        <textarea class="form-control d-none" rows="5" name="photo_gallery" type="textarea" id="photo_gallery">{{ isset($data_activitys->photo_gallery) ? $data_activitys->photo_gallery : ''}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="detail" class="col-sm-2 col-form-label">
                        รายละเอียด
                    </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="detail" type="textarea" id="detail" placeholder="เพิ่มรายละเอียดเนื้อหา">{{ isset($data_activitys->detail) ? $data_activitys->detail : ''}}</textarea>

                        <textarea class="form-control d-none" rows="5" name="for_detail" type="textarea" id="for_detail" placeholder="เพิ่มรายละเอียดเนื้อหา">{{ isset($data_activitys->detail) ? $data_activitys->detail : ''}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">
                        เลือกการแสดงผล
                    </label>
                    @php
                        $checked_show_all_member = '' ;
                        $class_show_all_member = '' ;

                        $checked_radio_show_for_individual = '';
                        $class_show_for_individual = 'd-none';
                        $checked_radio_show_for_rank = '';
                        $class_show_for_rank = 'd-none';

                        if($data_activitys->show_all_member == 'Yes'){
                            $checked_show_all_member = 'checked' ;
                            $class_show_all_member = 'd-none' ;
                        }
                        else{
                            if( !empty($data_activitys->show_individual) ){
                                $checked_radio_show_for_individual = 'checked';
                                $class_show_for_individual = '';
                            }
                            else{
                                $checked_radio_show_for_rank = 'checked';
                                $class_show_for_rank = '';
                            }
                        }
                    @endphp
                    <div class="col-sm-6" >
                        <div class="checkbox-wrapper-46 mt-4">
                          <input type="text" id="show_all_member" name="show_all_member" class="d-none" value="{{ isset($data_activitys->show_all_member) ? $data_activitys->show_all_member : ''}}">
                          <input {{ $checked_show_all_member }} type="checkbox" id="check_show_all_member" class="inp-cbx" onclick="change_select_show_all_member();">
                          <label for="check_show_all_member" class="cbx"
                            ><span>
                              <svg viewBox="0 0 12 10" height="10px" width="12px">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                            ><span>เห็นทุกคน</span>
                          </label>
                        </div>
                        <div id="div_not_show_all_member" class="mt-3 row {{ $class_show_all_member }}">
                            <div class="col-12 mydict mb-2">
                                <div class="float-start">
                                    <label>
                                        <input type="radio" name="radio_show_for" {{ $checked_radio_show_for_individual }} value="individual" onchange="check_select_show_for();">
                                        <span>เลือกรายบุคคล</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="radio_show_for" {{ $checked_radio_show_for_rank }} value="rank" onchange="check_select_show_for();">
                                        <span>เลือกจาก rank</span>
                                    </label>
                                </div>
                            </div>
                            <div id="div_show_for_account" class="col-12 mt-3 {{ $class_show_for_individual }}">

                                <p>เพิ่มรหัสตัวแทนด้วยไฟล์ Excel <span class="text-danger">(กดอ่านไฟล์เพื่อสร้างรหัสตัวแทน)</span></p>
                                <p><span class="text-danger">** <u>การเพิ่มไฟล์จะล้างข้อมูลรหัสตัวแทนเดิมทั้งหมดออก</u></span></p>
                              <input class="form-control border-start-0" type="file" id="excelInput" accept=".xlsx, .xls" onclick="clear_textarea_input();">
                              <span class="btn btn-warning btn-sm px-5 mt-2" onclick="readExcel()">
                                  อ่านไฟล์
                              </span>

                              <textarea class="form-control mt-3" rows="5" type="textarea" name="show_individual" id="show_individual" placeholder="เพิ่ม Account [เพิ่มหลาย Account คั่นด้วยเครื่องหมาย , (จุลภาค)]" onchange="show_preview_date_start_end();">{{ isset($data_activitys->show_individual) ? $data_activitys->show_individual : ''}}</textarea>
                            </div>

                            @php
                                $ranks = ['AG', 'UM', 'SUM', 'DM', 'SDM', 'AVP', 'VP', 'EVP', 'SEVP'];
                            @endphp

                            <select class="col-12 form-select mt-3 {{ $class_show_for_rank }}" id="show_rank" name="show_rank" onchange="show_preview_date_start_end();">
                                <option selected value="{{ isset($data_activitys->show_rank) ? $data_activitys->show_rank : ''}}">
                                    {{ isset($data_activitys->show_rank) ? $data_activitys->show_rank : ''}}
                                </option>
                                @foreach($ranks as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <script>

                    function check_select_show_for(){
                        let radio_show_for = document.querySelectorAll('input[name="radio_show_for"]');
                        let radio_show_for_value = "" ;
                            radio_show_for.forEach(radio_show_for => {
                                if(radio_show_for.checked){
                                    radio_show_for_value = radio_show_for.value;
                                }
                            })

                            // console.log(radio_show_for_value);

                            if(radio_show_for_value == "individual"){
                                document.querySelector('#show_rank').value = "";
                                document.querySelector('#show_rank').classList.add('d-none');
                                document.querySelector('#div_show_for_account').classList.remove('d-none');
                            }
                            else if(radio_show_for_value == "rank"){
                                document.querySelector('#show_individual').value = "";
                                document.querySelector('#excelInput').value = null ;
                                document.querySelector('#div_show_for_account').classList.add('d-none');
                                document.querySelector('#show_rank').classList.remove('d-none');
                            }

                        show_preview_date_start_end();
                    }

                    function change_select_show_all_member(){
                        let check_show_all_member = document.querySelector('#check_show_all_member');
                        if(check_show_all_member.checked){
                            // console.log('Yes');
                            document.querySelector('#show_all_member').value = 'Yes';

                            document.querySelector('#show_individual').value = "";
                            document.querySelector('#excelInput').value = null ;
                            document.querySelector('#show_rank').value = "";
                            document.querySelector('#div_not_show_all_member').classList.add('d-none');
                        }
                        else{
                            // console.log('No');
                            document.querySelector('#show_all_member').value = '';
                            document.querySelector('#div_not_show_all_member').classList.remove('d-none');
                        }
                        show_preview_date_start_end();
                    }

                    function clear_textarea_input(){
                      document.querySelector('#show_individual').value = "";
                    }

                    // EXCEL
                    function readExcel() {

                        let input = document.getElementById('excelInput');
                        let file = input.files[0];

                        if (file) {

                            let reader = new FileReader();

                            reader.onload = function(e) {
                                let data = e.target.result;
                                let workbook = XLSX.read(data, { type: 'binary' });

                                // เลือกชีทที่ต้องการ (0 คือชีทแรก)
                                let sheetName = workbook.SheetNames[0];
                                let sheet = workbook.Sheets[sheetName];

                                // แปลงข้อมูลในชีทเป็น JSON
                                let jsonData = XLSX.utils.sheet_to_json(sheet);

                                // ตรวจสอบข้อมูลในคอนโซล
                                // console.log(jsonData);

                                let sum_account ;
                                for (let i = 0; i < jsonData.length; i++) {
                                  if(!sum_account){
                                    sum_account = jsonData[i].account;
                                  }else{
                                    sum_account = sum_account + "," + jsonData[i].account;
                                  }
                                }

                                document.querySelector('#show_individual').value = sum_account ;
                                document.querySelector('#excelInput').value = null ;

                                show_preview_date_start_end();

                                
                            };

                            reader.readAsBinaryString(file);

                        } else {
                            alert('กรุณาเลือกไฟล์ Excel');
                        }

                    }
                </script>

                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">
                        เปิดใช้งานทันที
                    </label>
                    @php
                        $check_status = '';
                        if( $data_activitys->status == 'Yes' ){
                            $check_status = 'checked';
                        }
                    @endphp
                    <div class="col-sm-10" style="position: relative;">
                        <label class="switch">
                            <input {{ $check_status }} id="check_status" class="cb" type="checkbox">
                            <span class="toggle" onclick="click_check_status();">
                                <span class="left">off</span>
                                <span class="right">on</span>
                            </span>
                        </label>
                        <input class="form-control d-none" name="status" type="text" id="status" value="{{ isset($data_activitys->status) ? $data_activitys->status : ''}}" readonly="">
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">
                        เวลาแสดงผล <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10" style="position: relative;">
                        <div class="row">
                            <div class="col-6">
                                <label class="col-form-label mb-2">
                                    เริ่มต้น <span class="text-danger">*</span>
                                </label>
                                <input type="datetime-local" name="datetime_start" id="datetime_start" class="form-control" value="{{ isset($data_activitys->datetime_start) ? $data_activitys->datetime_start : ''}}" required onchange="check_date_input_start();show_preview_date_start_end();">
                            </div>
                            <div class="col-6">
                                <label class="col-form-label mb-2">
                                    สิ้นสุด <span class="text-danger">(สามารถเว้นว่างได้ หากไม่มีกำหนดสิ้นสุด)</span>
                                </label>
                                <input type="datetime-local" name="datetime_end" id="datetime_end" class="form-control" value="{{ isset($data_activitys->datetime_end) ? $data_activitys->datetime_end : ''}}" onchange="check_datetime_end();">
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
                                document.querySelector('#preview_status').innerHTML = "Active" ;
                                document.querySelector('#preview_status').classList.remove('text-danger');
                                document.querySelector('#preview_status').classList.add('text-success');
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
                            else if (datetime_end.value && new Date(datetime_end.value) < new Date(datetime_start.value)) {
                              alert("ไม่สามารถเลือกวันที่มาก่อนวันเริ่มต้นได้");
                              datetime_end.value = '';
                            }
                            show_preview_date_start_end();
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<script>
     document.querySelectorAll('.star-rating').forEach(el => {
        const rating = parseFloat(el.getAttribute('data-star'));
        el.style.setProperty('--rating', (rating / 5) * 100 + '%');
        el.style.setProperty('--rating-width', `${(rating / 5) * 100}%`);
    });

    document.addEventListener('DOMContentLoaded', (event) => {
        duration_video();
        create_text_date_start();

        setTimeout(() => {
            image_resized_w100();
        }, 1000);
    });

    function image_resized_w100(){

        let detail_training = document.querySelector('.detail-training');

        let image_resized = detail_training.querySelectorAll('.image_resized');
        image_resized.forEach(image_resized => {
            image_resized.setAttribute('style' , 'width:100%;');
        })

        let tag_img = detail_training.querySelectorAll('img')
            tag_img.forEach(tag_img => {
            tag_img.setAttribute('class' , 'w-100');
            tag_img.removeAttribute('width');
            tag_img.removeAttribute('height');
        })


    }

    function create_text_date_start(){

        // Friday 19 April 2024 10:30 น. - Friday 19 April 2024 12:30 น.
        let text_date_start = document.querySelector('#text_date_start');

        let all_day = "{{ $data_activitys->all_day }}";
        let date_start = "{{ $data_activitys->date_start }}";
        let time_start = "{{ $data_activitys->time_start }}";
        let date_end = "{{ $data_activitys->date_end }}";
        let time_end = "{{ $data_activitys->time_end }}";

        if (all_day === 'Yes') {
            // Case 1: all_day = Yes
            let formattedDate = formatDate_for_activity(date_start);
            text_date_start.innerHTML = formattedDate;
        } else if (!all_day && date_start === date_end) {
            // Case 2: all_day = null and date_start equals date_end
            let formattedDate = formatDate_for_activity(date_start);
            let formattedTime = formatTime_for_activity(time_start) + ' - ' + formatTime_for_activity(time_end);
            text_date_start.innerHTML = formattedDate + ' ' + formattedTime;
        } else if (!all_day && date_start !== date_end) {
            // Case 3: all_day = null and date_start not equals date_end
            let formattedStartDate = formatDate_for_activity(date_start);
            let formattedEndDate = formatDate_for_activity(date_end);
            let formattedStartTime = formatTime_for_activity(time_start);
            let formattedEndTime = formatTime_for_activity(time_end);
            text_date_start.innerHTML = `${formattedStartDate} ${formattedStartTime} - ${formattedEndDate} ${formattedEndTime}`;
        }

    }

    function create_preview_date_start(){

        // Friday 19 April 2024 10:30 น. - Friday 19 April 2024 12:30 น.
        let text_date_start = document.querySelector('#text_date_start');

        let all_day = document.querySelector('#all_day').value;
        let date_start = document.querySelector('#date_start').value;
        let time_start = document.querySelector('#time_start').value;
        let date_end = document.querySelector('#date_end').value;
        let time_end = document.querySelector('#time_end').value;

        if (all_day === 'Yes') {
            // Case 1: all_day = Yes
            let formattedDate = formatDate_for_activity(date_start);
            text_date_start.innerHTML = formattedDate;
        } else if (!all_day && date_start === date_end) {
            // Case 2: all_day = null and date_start equals date_end
            let formattedDate = formatDate_for_activity(date_start);
            let formattedTime = formatTime_for_activity(time_start) + ' - ' + formatTime_for_activity(time_end);
            text_date_start.innerHTML = formattedDate + ' ' + formattedTime;
        } else if (!all_day && date_start !== date_end) {
            // Case 3: all_day = null and date_start not equals date_end
            let formattedStartDate = formatDate_for_activity(date_start);
            let formattedEndDate = formatDate_for_activity(date_end);
            let formattedStartTime = formatTime_for_activity(time_start);
            let formattedEndTime = formatTime_for_activity(time_end);
            text_date_start.innerHTML = `${formattedStartDate} ${formattedStartTime} - ${formattedEndDate} ${formattedEndTime}`;
        }

    }

    function formatDate_for_activity(dateString) {
        let date = new Date(dateString);
        let options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    function formatTime_for_activity(timeString) {
        // Assuming timeString is in HH:mm format
        let [hours, minutes] = timeString.split(':');
        let period = hours >= 12 ? 'น.' : 'น.';
        hours = hours % 12 || 12; // Convert hours to 12-hour format
        return `${hours}:${minutes} ${period}`;
    }

    function duration_video(){
        if(document.getElementById('preview_video')){
            var video = document.getElementById('preview_video');
            video.addEventListener('loadedmetadata', function() {
                var duration = video.duration;
                var hours = Math.floor(duration / 3600);
                var minutes = Math.floor((duration % 3600) / 60);
                var seconds = Math.floor(duration % 60);

                var formattedDuration = "";
                if (hours > 0) {
                    formattedDuration += hours + " ชั่วโมง ";
                }
                if (minutes > 0) {
                    formattedDuration += minutes + " นาที ";
                }
                if (seconds > 0 || (hours === 0 && minutes === 0)) { // เพื่อให้แสดงวินาทีเสมอถ้าไม่มีชั่วโมงและนาที
                    formattedDuration += seconds + " วินาที";
                }

                document.getElementById('videoDuration').innerText = formattedDuration;
            });
        }
    }

    function show_preview_data(tag ,event){
        let focus_tag = document.querySelector('#preview_'+tag);
        let data_new = document.querySelector('#'+tag);

        if(tag == 'name_type'){
            const selectElement = event.target;
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const selectedText = selectedOption.text;

            focus_tag.innerHTML = '#'+selectedText ;
        }
        else if(tag == 'link_map'){
            focus_tag.setAttribute('href' , data_new.value)
            focus_tag.innerHTML = data_new.value ;
        }
        else if(tag == 'date_of_activitys'){
            create_preview_date_start();
        }
        else if(tag !== 'photo' || tag !== 'video'){
            // console.log(data_new);
            focus_tag.innerHTML = data_new.value ;
        }
        else{
            focus_tag.setAttribute('src' , data_new.value)
        }

    }

    function show_preview_date_start_end(){
        let datetime_start = document.querySelector('#datetime_start').value;
        let datetime_end = document.querySelector('#datetime_end').value;

        let all_day = document.querySelector('#all_day').value;
        let date_start = document.querySelector('#date_start').value;
        let time_start = document.querySelector('#time_start').value;
        let date_end = document.querySelector('#date_end').value;
        let time_end = document.querySelector('#time_end').value;

        let show_start ;
        let show_end ;

        let text_sum ;
        if(datetime_start && datetime_end){
            show_start = formatDateTime_start_end(datetime_start);
            show_end = formatDateTime_start_end(datetime_end);

            text_sum = show_start + ' - ' + show_end ;

        }
        else if(datetime_start && !datetime_end){
            show_start = formatDateTime_start_end(datetime_start);

            text_sum = show_start ;
        }

        if(show_start){
            if(all_day == 'Yes' && date_start){
                document.querySelector('#btn_cf_edit_data').disabled = false ;
            }
            else if(all_day != 'Yes' && date_start && time_start && date_end && time_end){
                document.querySelector('#btn_cf_edit_data').disabled = false ;
            }
            else{
                document.querySelector('#btn_cf_edit_data').disabled = true ;
            }
        }
        else{
            document.querySelector('#btn_cf_edit_data').disabled = true ;
        }

        let inputDateTime = document.getElementById('datetime_start').value;

        if (inputDateTime) {
          let inputDate = new Date(inputDateTime);
          let now = new Date();

          if (inputDate > now) {
            document.querySelector('#preview_status').innerHTML = "Inactive" ;
            document.querySelector('#preview_status').classList.add('text-danger');
            document.querySelector('#preview_status').classList.remove('text-success');
          }
        }

        document.querySelector('#preview_text_datetime_start_to_end').innerHTML = text_sum;
    }

    function formatDateTime_start_end(dateTimeStr) {
        let dateTime = new Date(dateTimeStr);
        
        let day = String(dateTime.getDate()).padStart(2, '0');
        let month = String(dateTime.getMonth() + 1).padStart(2, '0');
        let year = dateTime.getFullYear();
        let hours = String(dateTime.getHours()).padStart(2, '0');
        let minutes = String(dateTime.getMinutes()).padStart(2, '0');
        
        return `${day}/${month}/${year} ${hours}:${minutes} น.`;
    }

    function click_check_status() {
        let check_status = document.querySelector('#check_status').checked ;
            // console.log(check_status);
        let status = document.querySelector('#status') ;
        let datetime_start = document.querySelector('#datetime_start');
        let datetime_end = document.querySelector('#datetime_end');

        if(!check_status){
            status.value = 'Yes';
            document.querySelector('#preview_status').innerHTML = "Active" ;
            document.querySelector('#preview_status').classList.remove('text-danger');
            document.querySelector('#preview_status').classList.add('text-success');
            document.querySelector('#btn_cf_edit_data').disabled = false ;

            let now = new Date();
            let year = now.getFullYear();
            let month = String(now.getMonth() + 1).padStart(2, '0');
            let day = String(now.getDate()).padStart(2, '0');
            let hours = String(now.getHours()).padStart(2, '0');
            let minutes = String(now.getMinutes()).padStart(2, '0');

            // Format the current date and time to YYYY-MM-DDTHH:MM
            let currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

            // // Format the current date and time to YYYY-MM-DDTHH:MM AM/PM (12-hour format)
            // let hours12 = hours % 12 || 12;
            // let ampm = hours >= 12 ? 'PM' : 'AM';
            // let hours12Str = String(hours12).padStart(2, '0');

            // // Format the current date and time to DD/MM/YYYY HH:MM (24-hour format)
            // let hours24Str = String(hours).padStart(2, '0');
            // let text_datetime_start_to_end = `${day}/${month}/${year} ${hours24Str}:${minutes} น.`;

            // let preview_text_datetime = document.querySelector('#preview_text_datetime_start_to_end');
            //     preview_text_datetime.innerHTML = text_datetime_start_to_end;

            datetime_start.value = currentDateTime;
            datetime_start.setAttribute('readonly', 'true');

            show_preview_date_start_end();

        }else{
            document.querySelector('#preview_status').innerHTML = "Inactive" ;
            document.querySelector('#preview_status').classList.add('text-danger');
            document.querySelector('#preview_status').classList.remove('text-success');
            let preview_text_datetime = document.querySelector('#preview_text_datetime_start_to_end');
                preview_text_datetime.innerHTML = '';
            document.querySelector('#btn_cf_edit_data').disabled = true ;

            status.value = '';
            datetime_start.value = '';
            datetime_end.value = '';
            datetime_start.removeAttribute("readonly");
        }

    }


    // SAVE DATA
    function cf_edit_data(){

        let select_photo = document.querySelector('#select_photo').value;
        let select_video = document.querySelector('#select_video').value;

        let care_new_photo = document.querySelectorAll('.card-new-img');
        let arr_care_new_photo = [];

        care_new_photo.forEach(photo => {
            arr_care_new_photo.push(photo.src);
        });

        // console.log('cf_edit_data');

        if(select_photo){
            let previewContainer = document.getElementById('preview_photo');
            // console.log(previewContainer.src);
            uploadBlobToFirebase(previewContainer.src);
        }
        else if(select_video){
            // console.log(select_video);
            upload_video();
        }
        else if(arr_care_new_photo.length != 0){
            getImageSources();
        }
        else{
            save_data();
        }

    }

    async function uploadBlobToFirebase(blobUrl, rank, number) {

        let title = document.querySelector('#title').value;

        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-Edit-' + title;
            let storageRef = storage.ref('/activitys/image/cover/' + name_file);

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
                        // console.log(downloadURL);
                        document.querySelector('#photo').value = downloadURL ;
                        document.querySelector('#select_photo').value = null;

                        let select_video = document.querySelector('#select_video').value;

                        let care_new_photo = document.querySelectorAll('.card-new-img');
                        let arr_care_new_photo = [];

                        care_new_photo.forEach(photo => {
                            arr_care_new_photo.push(photo.src);
                        });

                        if(select_video){
                            upload_video();
                        }
                        else if(arr_care_new_photo.length != 0){
                            getImageSources();
                        }
                        else{
                            save_data();
                        }
                    });
                }
            );
        } catch (error) {
            console.error('Error fetching the Blob:', error);
        }
    }

    function upload_video(){
        let fileInput = document.getElementById('select_video');
        let file = fileInput.files[0];
        let title = document.querySelector('#title').value;

        let date_now = new Date();
        let Date_for_firebase = formatDate_for_firebase(date_now);

        let name_file = Date_for_firebase + '-Edit-' + title ;
        let storageRef = storage.ref('/activitys/video/' + name_file);

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

                    let care_new_photo = document.querySelectorAll('.card-new-img');
                    let arr_care_new_photo = [];

                    care_new_photo.forEach(photo => {
                        arr_care_new_photo.push(photo.src);
                    });

                    if(arr_care_new_photo.length != 0){
                        getImageSources();
                    }else{
                        save_data();
                    }

                    // ตัวอย่างการแสดง URL บนหน้าเว็บ
                    // alert('File uploaded successfully. URL: ' + downloadURL);
                });
            }
        );
    }

    function getImageSources() {
        // Select all img elements with class 'get-img-firebase'
        let care_new_photo = document.querySelectorAll('.card-new-img');
        let srcArray = [];

        care_new_photo.forEach(photo => {
            srcArray.push(photo.src);
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
            uploadBlobToFirebase_photo_gallery(srcArray[i], check_last, i)
        }

        return srcArray;
    }

    var new_link ;

    async function uploadBlobToFirebase_photo_gallery(blobUrl, check_last, round) {

        round = parseInt(round) + 1 ;
        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let title = document.querySelector('#title').value;
            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-' + title + '-' + round;
            let storageRef = storage.ref('/activitys/image/photo_gallery/'+title+'/' + name_file);

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

                            save_data();
                        }
                    });
                }
            );
        } catch (error) {
            console.error('Error fetching the Blob:', error);
        }
    }

    function save_data(){

        document.querySelector('#span_load_save').classList.remove('d-none');
        document.querySelector('#btn_cf_edit_data').innerHTML = 'กำลังบันทึกข้อมูล..';

        let title = document.querySelector('#title').value;
        let activity_type_id = document.querySelector('#activity_type_id').value;
        let detail = document.querySelector('#for_detail').value;
        let photo = document.querySelector('#photo').value;
        let video = document.querySelector('#video').value;
        let datetime_start = document.querySelector('#datetime_start').value;
        let datetime_end = document.querySelector('#datetime_end').value;
        let status = document.querySelector('#status').value;
        let photo_gallery = document.querySelector('#photo_gallery').value;
        let location_detail = document.querySelector('#location_detail').value;
        let link_map = document.querySelector('#link_map').value;

        let all_day = document.querySelector('#all_day').value;
        let date_start = document.querySelector('#date_start').value;
        let time_start = document.querySelector('#time_start').value;
        let date_end = document.querySelector('#date_end').value;
        let time_end = document.querySelector('#time_end').value;
        
        let show_all_member = document.querySelector('#show_all_member').value;
        let show_rank = document.querySelector('#show_rank').value;
        let show_individual = document.querySelector('#show_individual').value;

        let data_arr = {
            "id" : "{{ $data_activitys->id }}",
            "title" : title,
            "activity_type_id" : activity_type_id,
            "detail" : detail,
            "photo" : photo,
            "video" : video,
            "datetime_start" : datetime_start,
            "datetime_end" : datetime_end,
            "status" : status,
            "photo_gallery" : photo_gallery,
            "all_day" : all_day,
            "date_start" : date_start,
            "time_start" : time_start,
            "date_end" : date_end,
            "time_end" : time_end,
            "location_detail" : location_detail,
            "link_map" : link_map,
            "show_all_member" : show_all_member,
            "show_rank" : show_rank,
            "show_individual" : show_individual,
        }; 

        fetch("{{ url('/') }}/api/save_data_edit_activity", {
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
                document.querySelector('#goto_manage_activity').click();
            }
        }).catch(function(error){
            console.error(error);
        });
    }
    // END SAVE DATA
</script>

<script>
    var cropper;
    var image = document.getElementById('imageToCrop');

    document.addEventListener("DOMContentLoaded", function() {

        $('#cropModal').on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                dragMode: 'move',
                aspectRatio: 1 / 1,
                autoCropArea: 1,
                center: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                maxCropBoxHeight: 300,
                viewMode: 2,
                guides: false,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        let select_photo = document.querySelector('#select_photo');

        select_photo.addEventListener('change', function (event) {
            // console.log('input_ag_1');
            let files = event.target.files;

            if (files && files.length > 0) {
                let reader = new FileReader();
                reader.onload = function (e) {
                image.src = e.target.result;
                    $('#cropModal').modal('show');
                };
                reader.readAsDataURL(files[0]);
            }

            $('#cropModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            document.querySelector('#cropAndSave').setAttribute('onclick' , 'crop_img()');
        });

    });

    function crop_img(){

        let previewContainer = document.getElementById('preview_photo');

        let canvas = cropper.getCroppedCanvas({
          width: 512,
          height: 512
        });

        canvas.toBlob(function (blob) {
          let url = URL.createObjectURL(blob);
          // let img = document.createElement('img');
          // img.src = url;
          previewContainer.src = '';
          previewContainer.src = url;
          $('#cropModal').modal('hide');
        });

    }

    document.getElementById('select_video').addEventListener('change', function(event) {

        let preview_video = document.querySelector('#preview_video');
        document.querySelector('#div_tag_show_preview_video').classList.remove('d-none');

        var file = this.files[0];
        preview_video.src = URL.createObjectURL(file);
        
    });
</script>

<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
      min-height: 200px;
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
    }).then(editor => {
        editor.model.document.on('change:data', () => {
            // console.log(editor.getData());
            if(!editor.getData()){
                document.querySelector('#preview_detail').innerHTML = '';
            }
            else{
                document.querySelector('#for_detail').value = editor.getData();
                document.querySelector('#preview_detail').innerHTML = editor.getData();
                show_preview_date_start_end();
            }
        });
    }).catch(error => {
        console.error(error);
    });
</script>
<!-- END CKEDITOR -->
@endsection
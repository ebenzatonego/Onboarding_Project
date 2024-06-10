@extends('layouts.theme_user')

@section('content')
<style>
    @media only screen and (max-width: 767px) {
        .menu-tools {
            font-size: 14px;
            margin: 3px;
        }

        .img-download {
            width: 100%;
            height: 21px !important;
            object-fit: contain;
        }
    }


    @media screen and (min-width: 767px) {
        .menu-tools {
            font-size: 18px;
            margin: 10px;
        }

        #pills-tools {
            padding: 0 50px !important;
        }

        .img-download {
            width: 100%;
            height: 35px !important;
            object-fit: contain;
        }
    }

    .menu-tools {
        color: #B8C6D8;
        border-radius: 15px !important;
        border: 1px solid #B8C6D8;
        background: #FFF;
        padding: 0 15px;
        text-align: center;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: fit-content;
    }

    .menu-tools.active {
        background: rgba(36, 50, 134, 1) !important;
        color: #fff;
        font-weight: bolder;

    }

    .title-tools {
        color: #003781;
        text-align: center;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
    }

    .tabs {
        display: flex;
        position: relative;
        background-color: rgba(242, 242, 250, 1);
        box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
        /* padding:  0 15px; */
        border-radius: 99px;
        width: 80%;
        max-width: 500px;
    }

    .tabs * {
        z-index: 2;
    }

    .container-tap input[type="radio"] {
        display: none;
    }

    .tab {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 38px;
        width: 40%;
        font-size: .8rem;
        color: #989898;
        font-weight: 500;
        border-radius: 99px;
        cursor: pointer;
        transition: color 0.15s ease-in;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
    }

    .container-tap input[type="radio"]:checked+label {
        color: rgba(36, 50, 134, 1);
    }


    .container-tap input[id="radio-1"]:checked~.glider {
        transform: translateX(0);
    }

    .container-tap input[id="radio-2"]:checked~.glider {
        transform: translateX(100%);
    }

    .container-tap input[id="radio-3"]:checked~.glider {
        transform: translateX(200%);
    }

    .glider {
        position: absolute;
        display: flex;
        height: 38px;
        width: 33%;

        background: #FFF;
        box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.25);
        z-index: 1;
        border-radius: 99px;
        transition: 0.25s ease-out;
    }

    .w-80 {
        width: 80%;
    }

    .tools-item {
        display: flex;
        margin-bottom: 30px;
    }

    .tools-item img {
        width: 80px;
        height: 80px;
    }

    .btn-create-tools {
        color: #FFF;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 150%;
        /* 24px */
        letter-spacing: -0.304px;
        border-radius: 14px;
        background: #0E2B81;
        padding: 0 10px;
        width: 80%;
    }

    .tools-item i {
        font-size: 21px;
    }

    .company-name {
        font-size: 12px;
        color: #3ea385;
    }

    .btn-close-modal {
        background-color: #003781;
        color: #fff;
        width: 42px;
        height: 42px;
        position: absolute;
        bottom: -90px;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        font-size: 32px;
        line-height: 0;
        border: none !important;
    }

    .text-detail-app {
        color: #373737;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .container-contact {
        max-width: 500px;

    }

    .contact-item div {
        padding: 15px;
    }

    .contact-item:nth-child(odd) div {
        border-radius: 10px;
        border: 1px solid #88AEE1;
        background: #EBF1FD !important;
        box-shadow: 0px -2px 40px 0px rgba(200, 200, 200, 0.50);
    }

    .contact-item:nth-child(even) div {
        border-radius: 10px;
        border: 1px solid #B2C0DC;
        background: #DEE9FF !important;
        box-shadow: 0px -2px 40px 0px rgba(200, 200, 200, 0.50);
    }

    .contact-title {
        color: #003781;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-bottom: 5px;
    }

    .contact-phone {
        color: #262D33;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .contact-mail {
        color: #243286;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration-line: underline;
    }

    .title-coc {
        color: #1E1E1E;
        text-align: center;
        font-size: 15px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .detail-coc {
        color: #003781;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 20px;
    }

    .btn-submit-coc {
        margin-bottom: 50px;
        width: 100%;
        max-width: 463px;
        border-radius: 50px;
        background: #989898;
        border: none !important;
        padding: 10px 0;
        color: #FFF;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all .15s ease-in-out;
    }

    .btn-submit-coc.active {
        background: #69A51B !important;
    }

    .btn-submit-coc input {
        height: 17px;
        width: 17px;
        margin: 7px;
        border-radius: 5px !important;
        background: #FFF;
    }

    .input-hidden {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .svg-visible {
        display: inline-block;
        opacity: 0;
        animation: fadeIn 0.5s forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .detail-tools {
        margin-top: 15px;
        color: #003781;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-align: left;
        margin-bottom: 0;
    }

    .owl-nav {
        margin-top: 0;
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        pointer-events: none;
    }.owl-nav button span{
        font-size: 30px;

    }

    .owl-stage-outer {
        position: relative;
    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #003781;
    }
    .owl-prev.disabled,
    .owl-next.disabled{
       opacity: 0 !important;
    }

    .owl-prev,.owl-next{
        pointer-events: all;
    }
    .owl-dots{
        margin-top: 20px;
    }

    .owl-prev:focus,.owl-next:focus,.owl-prev:hover,.owl-next:hover{
       border: none !important;
    outline: 0 !important;
       background-color: none !important;
       box-shadow: none !important;
    }
</style>


<div class="container p-0 conteiner-detail-news">
    <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item ">
            <a class="nav-link menu-tools active" id="pills-conpany-tab" data-toggle="pill" href="#pills-conpany" role="tab" aria-controls="pills-conpany" aria-selected="true">ข้อมูลบริษัท</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link menu-tools" id="pills-tools-tab" data-toggle="pill" href="#pills-tools" role="tab" aria-controls="pills-tools" aria-selected="false">Tools</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link menu-tools" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">ติดต่อ</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link menu-tools" id="pills-coc-tab" data-toggle="pill" href="#pills-coc" role="tab" aria-controls="pills-coc" aria-selected="false">COC</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link menu-tools" id="pills-tutorials-tab" data-toggle="pill" href="#pills-tutorials" role="tab" aria-controls="pills-tutorials" aria-selected="false">Tutorials</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-conpany" role="tabpanel" aria-labelledby="pills-home-tab"> 1 </div>
        <div class="tab-pane fade" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
            <p class="title-tools">เครื่องมือบริษัท</p>

            <div class="container-tap d-flex justify-content-center mb-4">
                <div class="tabs">
                    <input type="radio" id="radio-1" name="tabs" checked="">
                    <label class="tab" for="radio-1">แอปพลิเคชั่น</label>
                    <input type="radio" id="radio-2" name="tabs">
                    <label class="tab" for="radio-2">ทั้งหมด</label>
                    <input type="radio" id="radio-3" name="tabs">
                    <label class="tab" for="radio-3">เว็บไซต์</label>
                    <span class="glider"></span>
                </div>
            </div>


            <div class=" m-auto" style="max-width: 500px;padding:0 20px ;">

                <div class="tools-item">
                    <img src="{{url('img/icon/icon-tools1.png')}}" alt="">
                    <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                        <span class="title-tools text-start" style="font-size: 16px;">Financial Health Check </span>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn-create-tools">กดเพื่อสร้าง</button>
                            <i class="fa-light fa-circle-exclamation cursor-pointer" data-toggle="modal" data-target="#modal_detail_app"></i>
                        </div>
                    </div>
                </div>

                <div class="tools-item">
                    <img src="{{url('img/icon/icon-tools2.png')}}" alt="">
                    <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                        <span class="title-tools text-start" style="font-size: 16px;">Allianz Ayudhya - My Allianz</span>
                        <div>
                            <span class="company-name">Allianz Ayudhya Assurance Pcl.</span>

                            <div class="d-flex justify-content-between align-items-center mt-1">
                                <div>
                                    <a href="">
                                        <img src="{{url('img/icon/ios-download.png')}}" class="img-download" alt="">
                                    </a>
                                    <a href="">
                                        <img src="{{url('img/icon/android-download.png')}}" class="img-download" alt="">
                                    </a>
                                </div>
                                <i class="fa-light fa-circle-exclamation"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class=" d-flex justify-content-center">
                <div class="w-100 row" style="max-width: 800px;">
                    <div class="col-md-6 p-2 contact-item">
                        <div class="">
                            <p class="contact-title">ติดต่อฝ่ายลูกค้าสัมพันธ์</p>
                            <a class="d-block contact-phone" href="tel:02346798">
                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.5C0 6.04416 6.04252 0 13.5 0C20.9558 0 27 6.04252 27 13.5C27 20.9558 20.9575 27 13.5 27C6.04416 27 0 20.9575 0 13.5ZM16.6438 15.1803L15.5279 16.2962C15.3598 16.4643 15.0058 16.5109 14.8026 16.3925C14.7404 16.3603 14.6882 16.3327 14.6095 16.2878C14.472 16.2093 14.3153 16.1122 14.1429 15.996C13.6447 15.6599 13.127 15.24 12.6187 14.7317C12.1103 14.2233 11.6908 13.7062 11.3554 13.2091C11.2394 13.0371 10.9557 12.544 10.9557 12.544C10.8366 12.3455 10.8834 11.9931 11.0542 11.8224L12.17 10.7066C12.7662 10.1104 12.83 9.11558 12.3127 8.45053L10.2146 6.12924C9.66012 5.41637 8.78292 5.1462 8.14296 5.78616L6.46729 7.46182C4.53739 9.39173 6.87584 14.2574 10.0307 17.4122C13.1854 20.5669 17.9589 22.8127 19.8885 20.883L21.5642 19.2074C22.2037 18.5678 22.0423 17.7425 21.3285 17.1873L18.8998 15.0376C18.2357 14.5211 17.2401 14.584 16.6438 15.1803Z" fill="#243286" />
                                </svg>
                                02346798 กด 234
                            </a>
                            <a class="d-block mt-2 contact-mail" href="mailto:natthanicha.thia@gmail.com">
                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                    <path d="M13.5 27C20.9587 27 27 20.9587 27 13.5C27 6.04125 20.9587 0 13.5 0C6.04125 0 0 6.04125 0 13.5C0 20.9587 6.04125 27 13.5 27ZM5.29875 8.60625L11.4413 13.5L5.29875 18.3938V8.60625ZM21.7013 18.3938L15.5588 13.5L21.6675 8.60625V18.3938H21.7013ZM5.3325 19.5413L12.15 14.0738L13.5 15.1538L14.85 14.0738L21.6675 19.5413H5.3325ZM21.6675 7.45875L13.5 14.0063L5.3325 7.45875H21.6675Z" fill="#243286" />
                                </svg>
                                <u>natthanicha.thia@gmail.com</u>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 p-2 contact-item">
                        <div class="">
                            <p class="contact-title">ติดต่อฝ่ายลูกค้าสัมพันธ์</p>
                            <a class="d-block contact-phone" href="tel:02346798">
                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.5C0 6.04416 6.04252 0 13.5 0C20.9558 0 27 6.04252 27 13.5C27 20.9558 20.9575 27 13.5 27C6.04416 27 0 20.9575 0 13.5ZM16.6438 15.1803L15.5279 16.2962C15.3598 16.4643 15.0058 16.5109 14.8026 16.3925C14.7404 16.3603 14.6882 16.3327 14.6095 16.2878C14.472 16.2093 14.3153 16.1122 14.1429 15.996C13.6447 15.6599 13.127 15.24 12.6187 14.7317C12.1103 14.2233 11.6908 13.7062 11.3554 13.2091C11.2394 13.0371 10.9557 12.544 10.9557 12.544C10.8366 12.3455 10.8834 11.9931 11.0542 11.8224L12.17 10.7066C12.7662 10.1104 12.83 9.11558 12.3127 8.45053L10.2146 6.12924C9.66012 5.41637 8.78292 5.1462 8.14296 5.78616L6.46729 7.46182C4.53739 9.39173 6.87584 14.2574 10.0307 17.4122C13.1854 20.5669 17.9589 22.8127 19.8885 20.883L21.5642 19.2074C22.2037 18.5678 22.0423 17.7425 21.3285 17.1873L18.8998 15.0376C18.2357 14.5211 17.2401 14.584 16.6438 15.1803Z" fill="#243286" />
                                </svg>
                                02346798 กด 234
                            </a>
                            <a class="d-block mt-2 contact-mail" href="mailto:natthanicha.thia@gmail.com">
                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                    <path d="M13.5 27C20.9587 27 27 20.9587 27 13.5C27 6.04125 20.9587 0 13.5 0C6.04125 0 0 6.04125 0 13.5C0 20.9587 6.04125 27 13.5 27ZM5.29875 8.60625L11.4413 13.5L5.29875 18.3938V8.60625ZM21.7013 18.3938L15.5588 13.5L21.6675 8.60625V18.3938H21.7013ZM5.3325 19.5413L12.15 14.0738L13.5 15.1538L14.85 14.0738L21.6675 19.5413H5.3325ZM21.6675 7.45875L13.5 14.0063L5.3325 7.45875H21.6675Z" fill="#243286" />
                                </svg>
                                <u>natthanicha.thia@gmail.com</u>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-coc" role="tabpanel" aria-labelledby="pills-coc-tab">
            <div>
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <img src="{{url('/img/logo/logo-alianz2.png')}}" height="36" alt="">
                        <p class="title-coc mt-2">อลิอันซ์ อยุธยา เคียงข้างทุกจังหวะชีวิต</p>
                    </div>
                </div>
                <p class="detail-coc">
                    ข้อตกลงและเงื่อนไขในการใช้งาน(แอปพลิเคชันซอฟต์แวร์)<br>
                    1. ข้อตกลงและเงื่อนไขในการใช้งาน <br>
                    จากการดาวน์โหลด เรียกดู เข้าถึง หรือใช้แอปพลิเคชันซอฟต์แวร์นี้ (“แอปพลิเคชันซอฟต์แวร์“) ผู้ใช้บริการตกลงที่จะผูกพันตามข้อตกลงและเงื่อนไขในการใช้งานนี้ (“ข้อตกลงและเงื่อนไขฯ“).
                    บริษัทขอสงวนสิทธิ์ในการแก้ไขข้อตกลงและเงื่อนไขฯ ได้ตลอดเวลา หากผู้ใช้บริการไม่เห็นด้วยกับข้อตกลงและเงื่อนไขฯ ข้อใดข้อหนึ่ง ผู้ใช้บริการจะต้องหยุดการเข้าถึงแอปพลิเคชันซอฟต์แวร์และหยุดใช้บริการของแอปพลิเคชันซอฟต์แวร์ทันที การที่ผู้ใช้บริการยังคงใช้แอปพลิเคชันซอฟต์แวร์ต่อไปจะถือเป็นการยอมรับข้อตกลงและเงื่อนไขฯ ดังกล่าว และตามที่จะมีการแก้ไขเปลี่ยนแปลงเป็นครั้งคราว<br>
                    2. คำนิยาม<br>
                    ในข้อตกลงและเงื่อนไขฯ ให้คำซึ่งมีความหมายเฉพาะต่อไปนี้มีความหมายดังต่อไปนี้ เว้นแต่เนื้อหาของประโยคจะกำหนดให้เป็นอย่างอื่น
                    “บัญชี” หมายถึง บัญชีที่ผู้ใช้สร้างขึ้นในแอปพลิเคชันซอฟต์แวร์ซึ่งถือเป็นส่วนหนึ่งในการลงทะเบียน
                    “ลงทะเบียน” หมายถึง การสร้างบัญชีในแอปพลิเคชันซอฟต์แวร์ และ “การลงทะเบียน” หมายถึง การดำเนินการสร้างบัญชีดังกล่าว
                    “บริการต่าง ๆ” หมายถึง บริการทั้งปวงที่บริษัท เกษมทรัพย์สิริ จำกัด พนักงาน บริษัทในเครือ หรือผู้รับจ้างของบริษัท เกษมทรัพย์สิริ จำกัด ให้บริการผ่านทางแอปพลิเคชันซอฟต์แวร์แก่บรรดาผู้ใช้ และ “บริการ” หมายถึง บริการอย่างใดอย่างหนึ่ง
                    “บรรดาผู้ใช้” หมายถึง บรรดาผู้ใช้แอปพลิเคชันซอฟต์แวร์ รวมถึงผู้ใช้บริการ และผู้ใช้หมายถึงผู้ใช้รายใดรายหนึ่ง<br>
                    3. ประเด็นทั่วไปเกี่ยวกับแอปพลิเคชันซอฟต์แวร์และบริการ<br>
                    3.1 การบังคับใช้ข้อตกลงและเงื่อนไขฯ : การใช้บริการต่าง ๆ และ/หรือแอปพลิเคชันซอฟต์แวร์จะอยู่ภายใต้บังคับของข้อตกลงและเงื่อนไขฯ ฉบับนี้
                </p>
                <div class="w-100 d-flex justify-content-center">

                    <label for="submit_coc" class="btn-submit-coc">
                        <input type="checkbox" name="submit_coc" id="submit_coc" class="me-2">
                        <svg class="me-2 d-none" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7778 0.746667L20.8 3.76889C20.8711 3.84 20.9422 3.87556 21.0133 3.91111C21.2267 4.01778 24.9956 3.94667 25.5289 3.94667C26.9156 3.94667 28.0533 5.08444 28.0533 6.47111C28.0533 7.04 28.0178 10.7733 28.0889 10.9867C28.1244 11.0578 28.16 11.1289 28.2311 11.2L31.2533 14.2222C32.2489 15.2178 32.2489 16.7822 31.2533 17.7778C30.8622 18.1689 28.16 20.7644 28.0889 21.0133C27.9822 21.2267 28.0533 24.9956 28.0533 25.5289C28.0533 26.9156 26.9156 28.0533 25.5289 28.0533C24.7467 28.0533 21.5111 27.9822 21.0133 28.0889C20.9422 28.1244 20.8711 28.16 20.8 28.2311L17.7778 31.2533C16.7822 32.2489 15.2178 32.2489 14.2222 31.2533C13.8667 30.8978 11.1644 28.1244 10.9867 28.0889C10.4889 27.9822 7.21778 28.0533 6.47111 28.0533C5.08444 28.0533 3.94667 26.9156 3.94667 25.5289C3.94667 24.7467 4.01778 21.5111 3.91111 21.0133C3.87556 20.8711 1.06667 18.1333 0.746667 17.7778C-0.248889 16.7822 -0.248889 15.2178 0.746667 14.2222L3.76889 11.2L3.94667 10.7378V6.47111C3.94667 5.08444 5.08444 3.94667 6.47111 3.94667C7.04 3.94667 10.7733 3.98222 10.9867 3.91111C11.2356 3.80444 13.8311 1.13778 14.2222 0.746667C15.2178 -0.248889 16.7822 -0.248889 17.7778 0.746667ZM10.4533 16.5333L13.7956 19.8756C14.1511 20.2311 14.7556 20.2311 15.1111 19.8756L21.5467 13.44C22.4356 12.5511 21.0844 11.2356 20.2311 12.1244L14.4356 17.8844L11.7689 15.2178C10.88 14.3289 9.56444 15.68 10.4533 16.5333ZM19.4844 5.08444L16.4622 2.06222C16.2133 1.81333 15.8222 1.81333 15.5733 2.06222L12.5511 5.08444C12.0889 5.54667 11.4489 5.83111 10.7733 5.83111H6.47111C6.11556 5.83111 5.83111 6.11556 5.83111 6.47111V10.7733C5.83111 11.1289 5.76 11.4489 5.65333 11.7333C5.51111 12.0178 5.33333 12.3022 5.12 12.5511L2.09778 15.5733C1.84889 15.8222 1.84889 16.2133 2.09778 16.4622L5.12 19.4844C5.36889 19.7333 5.54667 19.9822 5.65333 20.3022C5.79556 20.6222 5.83111 20.9422 5.83111 21.2622V25.5644C5.83111 25.92 6.11556 26.2044 6.47111 26.2044H10.7733C11.1289 26.2044 11.4489 26.2756 11.7333 26.3822C12.0533 26.5244 12.3022 26.7022 12.5511 26.9156L15.5733 29.9378C15.8222 30.1867 16.2133 30.1867 16.4622 29.9378L19.4844 26.9156C19.7333 26.6667 19.9822 26.4889 20.3022 26.3822C20.6222 26.24 20.9422 26.2044 21.2622 26.2044H25.5644C25.92 26.2044 26.2044 25.92 26.2044 25.5644V21.2622C26.2044 20.5867 26.4533 19.9467 26.9511 19.4844L29.9733 16.4622C30.2222 16.2133 30.2222 15.8222 29.9733 15.5733L26.9511 12.5511C26.9511 12.5156 26.2044 11.9467 26.2044 10.7733V6.47111C26.2044 6.11556 25.92 5.83111 25.5644 5.83111H21.2622C20.0889 5.83111 19.4844 5.08444 19.4844 5.08444Z" fill="white" />
                        </svg>
                        ฉันได้อ่านข้อความจนครบและรับทราบ
                    </label>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tutorials" role="tabpanel" aria-labelledby="pills-tutorials-tab">
            <p class="title-tools">วิธีใช้เว็บไซต์ Allianz Journey</p>
            <div class="owl-carousel owl-theme mt-4" role="group" aria-label="First group">
                <div class="item text-center">
                    <p class="title-tools">รู้จักเว็บนี้ง่ายๆ ใน 3 นาที !</p>
                    <center>
                        <img src="{{url('img/icon/img-tools.png')}}" style="width: 100%;max-width: 437px;" alt="">
                    </center>
                    <p class="mt-2 detail-tools">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>

                <div class="item text-center">
                    <p class="title-tools">รู้จักเว็บนี้ง่ายๆ ใน 3 นาที !</p>
                    <center>
                        <img src="{{url('img/icon/img-tools.png')}}" style="width: 100%;max-width: 437px;" alt="">
                    </center>
                    <p class="mt-2 detail-tools">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="item text-center">
                    <p class="title-tools">รู้จักเว็บนี้ง่ายๆ ใน 3 นาที !</p>
                    <center>
                        <img src="{{url('img/icon/img-tools.png')}}" style="width: 100%;max-width: 437px;" alt="">
                    </center>
                    <p class="mt-2 detail-tools">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('submit_coc').addEventListener('change', function() {
        let input = this;
        let svg = input.nextElementSibling;

        if (input.checked) {
            document.querySelector('.btn-submit-coc').classList.add('active');
            input.classList.add('d-none');
            svg.classList.remove('d-none');
            svg.classList.add('svg-visible');
        }
        //  else {
        //     input.classList.remove('input-hidden');
        //     svg.classList.add('d-none');
        //     svg.classList.remove('svg-visible');
        // }
    });
</script>

<!-- Modal -->
<div class="modal fade" id="modal_detail_app" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body p-4" style="border-radius: 10px;background: #F0F5FF;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
                <div class="d-flex justify-content-center">
                    <img src="{{url('img/icon/icon-tools2.png')}}" width="48" height="48" alt="">
                </div>
                <p class="title-tools mt-2" style="font-size: 14px;">Allianz Ayudhya - My Allianz</p>
                <p class="text-detail-app">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime nemo dolorem aut illo amet dicta sunt! Dolorum expedita voluptas culpa magni libero architecto vel aliquid, suscipit nobis doloremque delectus! Aliquid!
                </p>
                <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>

<script>
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop: false,
        nav: true,
        autoHeight:true
    })
    document.querySelector('.owl-prev').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none" transform="rotate(180)">
<path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
    document.querySelector('.owl-next').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
<path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
</script>
@endsection
@extends('layouts.theme_admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

<style>
.toggle-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  border-radius: .5em;
  padding: .125em;
  box-shadow: 0 1px 1px rgb(255 255 255 / .6);
  /* resize for demo */
  font-size: 1.5em;
}

.toggle-checkbox {
  appearance: none;
  position: absolute;
  z-index: 1;
  border-radius: inherit;
  width: 100%;
  height: 100%;
  /* fix em sizing */
  font: inherit;
  opacity: 0;
  cursor: pointer;
}

.toggle-container {
  display: flex;
  align-items: center;
  position: relative;
  border-radius: .375em;
  width: 3em;
  height: 1.5em;
  background-color: #e8e8e8;
  box-shadow: inset 0 0 .0625em .125em rgb(255 255 255 / .2), inset 0 .0625em .125em rgb(0 0 0 / .4);
  transition: background-color .4s linear;
}

.toggle-checkbox:checked + .toggle-container {
  background-color: #2EC300;
}

.toggle-button {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  left: .0625em;
  border-radius: .3125em;
  width: 1.375em;
  height: 1.375em;
  background-color: #e8e8e8;
  box-shadow: inset 0 -.0625em .0625em .125em rgb(0 0 0 / .1), inset 0 -.125em .0625em rgb(0 0 0 / .2), inset 0 .1875em .0625em rgb(255 255 255 / .3), 0 .125em .125em rgb(0 0 0 / .5);
  transition: left .4s;
}

.toggle-checkbox:checked + .toggle-container > .toggle-button {
  left: 1.5625em;
}

.toggle-button-circles-container {
  display: grid;
  grid-template-columns: repeat(3, min-content);
  gap: .125em;
  position: absolute;
  margin: 0 auto;
}

.toggle-button-circle {
  border-radius: 50%;
  width: .125em;
  height: .125em;
  background-image: radial-gradient(circle at 50% 0, #f5f5f5, #c4c4c4);
}
</style>

<style>
  .checkmark {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: block;
      stroke-width: 2;
      stroke: #29cc39;
      stroke-miterlimit: 10;
      margin: 10% auto;
      box-shadow: inset 0px 0px 0px #ffffff;
      animation: fill 0.9s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
  }

  .checkmark__check {
      transform-origin: 50% 50%;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: stroke 0.8s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
  }

  @keyframes stroke {
      100% {
          stroke-dashoffset: 0
      }
  }

  @keyframes scale {

      0%,
      100% {
          transform: none
      }

      50% {
          transform: scale3d(1.1, 1.1, 1)
      }
  }

  @keyframes fill {
      100% {
          box-shadow: inset 0px 0px 0px 60px #fff
      }
  }

  .radius-20 {
      border-radius: 20px;
  }

  .checkmark__circle {
      stroke-dasharray: 166;
      stroke-dashoffset: 166;
      stroke-width: 2;
      stroke-miterlimit: 10;
      stroke: #7ac142;
      fill: none;
      animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
  }

  .checkmark {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: block;
      stroke-width: 2;
      stroke: #fff;
      stroke-miterlimit: 10;
      margin: 10% auto;
      box-shadow: inset 0px 0px 0px #7ac142;
      animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
  }

  .checkmark__check {
      transform-origin: 50% 50%;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
  }

  @keyframes stroke {
      100% {
          stroke-dashoffset: 0
      }
  }

  @keyframes scale {

      0%,
      100% {
          transform: none
      }

      50% {
          transform: scale3d(1.1, 1.1, 1)
      }
  }

  @keyframes fill {
      100% {
          box-shadow: inset 0px 0px 0px 30px #7ac142
      }
  }

  .detail-course{
      color: #000;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 5px;

  }

  @keyframes bounce-twice {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-30px);
    }
    60% {
      transform: translateY(-15px);
    }
  }

  .i_Highlight {
    animation: bounce-twice 2s;
  }

  .icon-menu-course {
      width: 40px;
      height: 40px;
      background-color: #003781;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      -o-border-radius: 50%;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
  }

  .icon-menu-course img{
      width: 20px!important;
      height: 20px!important;
      object-fit: contain!important;
  }

  .center-vertical {
    display: flex;
    align-items: center;
  }

  .long-item {
        /* aspect-ratio:  11/ 16; */
        /* width: 159px; */
        position: relative;
        width: 95%;
        height: 214px;
        background-color: #003781;
        color: #fff;
        margin: 5px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .long-item img {
        display: block;
        object-fit: contain;
        height: 100%;
        width: 100%;
    }

    .square-item img {
        display: block;
        object-fit: contain;
        height: 100%;
        width: 100%;
    }

    .square-item {
        /* aspect-ratio:  1/ 1; */
        /* width: 159px; */
        position: relative;
        width: 95%;
        height: 159px;
        background-color: #CADCFF;
        color: #003781;
        margin: 5px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .long-item .count-training {
        position: absolute;
        bottom: 15px;

    }

    .square-item .count-training {
        position: absolute;
        bottom: 10px;

    }

    .fav-course {
        width: 100%;
        flex-direction: row;
        display: flex;
        flex-wrap: wrap;
    }

    .result_icon img {
      max-width: 80%;
    }

    .box-2 {
        padding: 0.5em;
        /* width: calc(100%/2 - 1em); */
    }

</style>

<!-- Modal ลบประเภทหลักสูตร -->
<!-- Button trigger modal -->
<button id="btn_Modal_delete_training_type" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#Modal_delete_training_type">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="Modal_delete_training_type" tabindex="-1" aria-labelledby="Label_delete_training_type" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="mt-3 mb-2 text-center">
          <img src="{{ url('/img/icon/problem (1).png') }}" style="width: 60%;">
          <br>
          <h4 class="mt-3">
            ยืนยันการลบ
            <br>
            <b><span id="modal_delete_name_training_type"></span></b>
          </h4>
          <p class="text-danger"><u>เมื่อกดยืนยัน หลักสูตรทั้งหมดที่เป็นประเภทนี้จะถูกลบด้วย</u></p>
        </div>
        <hr>
        <center>
          <button id="btn_close_Modal_delete_training_type" type="button" class="btn btn-secondary" data-dismiss="modal" style="width:40%;">
            ปิด
          </button>
          <button id="btn_cf_delete_training_type" type="button" class="btn btn-danger" style="width:40%;">
            ยืนยันการลบ
          </button>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- MODAL การจัดการเมนูหลักสูตร -->
<div class="modal fade" id="modal_menu_management" tabindex="-1" aria-labelledby="Label_menu_management" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label_menu_management">การจัดการเมนูหลักสูตร</h5>
        <button id="btn_close_modal_menu_management" type="button" class="btn" data-dismiss="modal" aria-label="Close">
          <i class="fa-solid fa-circle-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-pills nav-pills-success mb-3" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="pill" href="#success-pills-home" role="tab" aria-selected="true">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon">
                      <i class="fa-regular fa-stars font-18 me-1"></i>
                    </div>
                    <div class="tab-title">4 Menu Highlight</div>
                  </div>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#success-pills-profile" role="tab" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon">
                      <i class="fa-solid fa-square-list font-18 me-1"></i>
                    </div>
                    <div class="tab-title">Menu Icon</div>
                  </div>
                </a>
              </li>
            </ul>
            <hr>
            <div class="tab-content">

              <!-- 4 Menu Highlight -->
              <div class="tab-pane fade show active" id="success-pills-home" role="tabpanel">
                <br>
                <div class="row mt-3 mb-2">
                  <div class="col-5">
                    <div class="fav-course">
                      <div class="col-6">
                          <div class="w-100">
                              <div class="long-item" style="position:relative;">
                                @if( !empty($photo_menu_highlight_1) )
                                  <img id="perview_Menu_Highlight_1" src="{{ $photo_menu_highlight_1->photo_menu }}" alt="">
                                @else
                                  <img id="perview_Menu_Highlight_1" src="{{ url('/img/icon/long_empty.png') }}" alt="">
                                @endif
                                <div class="count-training">
                                    <span style="font-size: 24px;font-weight: bolder;color: #fff;">
                                      ...
                                    </span>
                                    <span class="ms-1" style="color: #fff;">หลักสูตร</span>
                                </div>
                                <i class="fa-duotone fa-circle-1 font-24" style="position: absolute;top:2%;right: 2%;"></i>
                              </div>
                              <div class="square-item mt-3" style="position:relative;">
                                @if( !empty($photo_menu_highlight_2) )
                                  <img id="perview_Menu_Highlight_2" src="{{ $photo_menu_highlight_2->photo_menu }}" alt="">
                                @else
                                  <img id="perview_Menu_Highlight_2" src="{{ url('/img/icon/square_empty.png') }}" alt="">
                                @endif
                                <div class="count-training">
                                    <span style="font-size: 24px;font-weight: bolder;color: #003781;">
                                      ...
                                    </span>
                                    <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                </div>
                                <i class="fa-duotone fa-circle-2 font-24" style="position: absolute;top:2%;right: 2%;"></i>
                              </div>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="w-100">
                              <div class="square-item" style="position:relative;">
                                @if( !empty($photo_menu_highlight_3) )
                                  <img id="perview_Menu_Highlight_3" src="{{ $photo_menu_highlight_3->photo_menu }}" alt="">
                                @else
                                  <img id="perview_Menu_Highlight_3" src="{{ url('/img/icon/square_empty.png') }}" alt="">
                                @endif
                                <div class="count-training">
                                    <span id="" style="font-size: 24px;font-weight: bolder;color: #003781;">
                                      ...
                                    </span>
                                    <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                </div>
                                <i class="fa-duotone fa-circle-3 font-24" style="position: absolute;top:2%;right: 2%;"></i>
                              </div>
                              <div class="long-item mt-3" style="position:relative;">
                                @if( !empty($photo_menu_highlight_4) )
                                  <img id="perview_Menu_Highlight_4" src="{{ $photo_menu_highlight_4->photo_menu }}" alt="">
                                @else
                                  <img id="perview_Menu_Highlight_4" src="{{ url('/img/icon/long_empty.png') }}" alt="">
                                @endif
                                <div class="count-training">
                                    <span id="" style="font-size: 24px;font-weight: bolder;color: #fff;">
                                      ...
                                    </span>
                                    <span class="ms-1" style="color: #fff;">หลักสูตร</span>
                                </div>
                                <i class="fa-duotone fa-circle-4 font-24" style="position: absolute;top:2%;right: 2%;"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="col-7">
                    <div class="card">
                      <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                          <li id="li_menu_of_1" class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#menu_of_1" role="tab" aria-selected="true">
                              <div class="d-flex align-items-center">
                                <div class="tab-icon">
                                  <i class="fa-solid fa-circle-1 font-18 me-1" style="color:#003781!important;"></i>
                                </div>
                                <div class="tab-title" style="color:#003781!important;">
                                  Menu 1
                                </div>
                              </div>
                            </a>
                          </li>
                          <li id="li_menu_of_2" class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu_of_2" role="tab" aria-selected="false">
                              <div class="d-flex align-items-center">
                                <div class="tab-icon">
                                  <i class="fa-solid fa-circle-2 font-18 me-1" style="color:#809FDB!important;"></i>
                                </div>
                                <div class="tab-title" style="color:#809FDB!important;">
                                  Menu 2
                                </div>
                              </div>
                            </a>
                          </li>
                          <li id="li_menu_of_3" class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu_of_3" role="tab" aria-selected="true">
                              <div class="d-flex align-items-center">
                                <div class="tab-icon">
                                  <i class="fa-solid fa-circle-3 font-18 me-1" style="color:#003781!important;"></i>
                                </div>
                                <div class="tab-title" style="color:#003781!important;">
                                  Menu 3
                                </div>
                              </div>
                            </a>
                          </li>
                          <li id="li_menu_of_4" class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu_of_4" role="tab" aria-selected="false">
                              <div class="d-flex align-items-center">
                                <div class="tab-icon">
                                  <i class="fa-solid fa-circle-4 font-18 me-1" style="color:#809FDB!important;"></i>
                                </div>
                                <div class="tab-title" style="color:#809FDB!important;">
                                  Menu 4
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content py-3">
                          <!-- menu_of_1 -->
                          <div class="tab-pane fade show active" id="menu_of_1" role="tabpanel">
                            <div class="row">

                              <div class="col-12">
                                <div class="input-group mb-3">
                                  <label class="input-group-text">เลือกหลักสูตร</label>
                                  <select class="form-select" id="select_change_Menu_Highlight_1" onchange="sclect_new_Menu_Highlight('1');">
                                    {{ $check_menu_1 = null }}
                                    @foreach($data_Training_type as $item_1)
                                      @if($item_1->check_highlight == "1")
                                        {{ $check_menu_1 = 'Yes' }}
                                        <option selected value="{{ $item_1->id }}">
                                          {{ $item_1->type_article }}
                                        </option>
                                      @else
                                        <option value="{{ $item_1->id }}">
                                          {{ $item_1->type_article }}
                                        </option>
                                      @endif
                                    @endforeach

                                    @if( empty($check_menu_1) )
                                      <option selected value="">
                                          เลือกหลักสูตร
                                      </option>
                                    @endif
                                  </select>
                                </div>
                                <hr>
                              </div>
                              <div class="col-12">
                                <label class="mb-2">รูปภาพปัจจุบัน</label>
                                <br>
                                @if( !empty($photo_menu_highlight_1) )
                                  <div id="preview_photo_menu_1">
                                    <img style="width:30%;" src="{{ $photo_menu_highlight_1->photo_menu }}">
                                  </div>
                                @else
                                  <div id="preview_photo_menu_1">
                                    <p class="text-danger">ไม่มีรูปภาพ</p>
                                  </div>
                                @endif
                                <hr>
                              </div>
                              <div class="col-12 mt-3">

                                <span class="btn btn-sm btn-primary mt-2" onclick="click_select_Menu_Highlight('1');">
                                    เลือกรูปภาพ
                                </span>

                                <input type="file" class="form-control d-none" accept="image/png" name="select_Menu_Highlight_1" id="select_Menu_Highlight_1" onchange="crop_select_Menu_Highlight('1');">

                                <div id="div_crop_Menu_Highlight_1" class="row p-1 d-none">
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100 ">
                                          <p class="mb-2 mt-3 text-center">ปรับขนาดภาพ</p>
                                          <!-- leftbox -->
                                          <div class="box-2 w-100 h-100">
                                              <div id="icon_crop_1" class="result_icon w-100"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100">
                                          <p class="mb-2 mt-3 text-center">ผลลัพธ์</p>
                                        <!--rightbox-->
                                          <div class="box-2 img-result d-flex justify-content-center">
                                              <!-- result of crop -->
                                              <div class="long-item w-100" style="background-color: #003781;max-width: 200px;height: 250px;">
                                                  <img alt="" id="Preview_Menu_Highlight_crop_1" style="display: block;">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12 mt-3">
                                <hr>
                                <button id="btn_cf_change_Menu_Highlight_1" class="btn btn-sm btn-success float-end" onclick="cf_change_Menu_Highlight('1');" disabled>
                                  ยืนยันการเปลี่ยนแปลง
                                </button>
                              </div>

                            </div>
                          </div>
                          <!-- menu_of_2 -->
                          <div class="tab-pane fade" id="menu_of_2" role="tabpanel">
                            <div class="row">

                              <div class="col-12">
                                <div class="input-group mb-3">
                                  <label class="input-group-text">เลือกหลักสูตร</label>
                                  <select class="form-select" id="select_change_Menu_Highlight_2" onchange="sclect_new_Menu_Highlight('2');">
                                    {{ $check_menu_2 = null }}
                                    @foreach($data_Training_type as $item_2)
                                      @if($item_2->check_highlight == "2")
                                        {{ $check_menu_2 = 'Yes' }}
                                        <option selected value="{{ $item_2->id }}">
                                          {{ $item_2->type_article }}
                                        </option>
                                      @else
                                        <option value="{{ $item_2->id }}">
                                          {{ $item_2->type_article }}
                                        </option>
                                      @endif
                                    @endforeach

                                    @if( empty($check_menu_2) )
                                      <option selected value="">
                                          เลือกหลักสูตร
                                      </option>
                                    @endif
                                  </select>
                                </div>
                                <hr>
                              </div>
                              <div class="col-12">
                                <label class="mb-2">รูปภาพปัจจุบัน</label>
                                <br>
                                @if( !empty($photo_menu_highlight_2) )
                                  <div id="preview_photo_menu_2">
                                    <img style="width:30%;" src="{{ $photo_menu_highlight_2->photo_menu }}">
                                  </div>
                                @else
                                  <div id="preview_photo_menu_2">
                                    <p class="text-danger">ไม่มีรูปภาพ</p>
                                  </div>
                                @endif
                                <hr>
                              </div>
                              <div class="col-12 mt-3">

                                <span class="btn btn-sm btn-primary mt-2" onclick="click_select_Menu_Highlight('2');">
                                    เลือกรูปภาพ
                                </span>

                                <input type="file" class="form-control d-none" accept="image/png" name="select_Menu_Highlight_2" id="select_Menu_Highlight_2" onchange="crop_select_Menu_Highlight('2');">

                                <div id="div_crop_Menu_Highlight_2" class="row p-1 d-none">
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100 ">
                                          <p class="mb-2 mt-3 text-center">ปรับขนาดภาพ</p>
                                          <!-- leftbox -->
                                          <div class="box-2 w-100 h-100">
                                              <div id="icon_crop_2" class="result_icon w-100"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100">
                                          <p class="mb-2 mt-3 text-center">ผลลัพธ์</p>
                                        <!--rightbox-->
                                          <div class="box-2 img-result ">
                                              <!-- result of crop -->
                                              <!-- <div class="square-item d-flex justify-content-center align-items-center" style="background-color: #003781;aspect-ratio1:1; height: 214px;">
                                                  <img alt="" id="Preview_Menu_Highlight_crop_2">
                                              </div> -->

                                              <div class="square-item mt-3">
                                                <img alt="" id="Preview_Menu_Highlight_crop_2">

                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12 mt-3">
                                <hr>
                                <button id="btn_cf_change_Menu_Highlight_2" class="btn btn-sm btn-success float-end" onclick="cf_change_Menu_Highlight('2');" disabled>
                                  ยืนยันการเปลี่ยนแปลง
                                </button>
                              </div>

                            </div>
                          </div>
                          <!-- menu_of_3 -->
                          <div class="tab-pane fade" id="menu_of_3" role="tabpanel">
                            <div class="row">

                              <div class="col-12">
                                <div class="input-group mb-3">
                                  <label class="input-group-text">เลือกหลักสูตร</label>
                                  <select class="form-select" id="select_change_Menu_Highlight_3" onchange="sclect_new_Menu_Highlight('3');">
                                    {{ $check_menu_3 = null }}
                                    @foreach($data_Training_type as $item_3)
                                      @if($item_3->check_highlight == "3")
                                        {{ $check_menu_3 = 'Yes' }}
                                        <option selected value="{{ $item_3->id }}">
                                          {{ $item_3->type_article }}
                                        </option>
                                      @else
                                        <option value="{{ $item_3->id }}">
                                          {{ $item_3->type_article }}
                                        </option>
                                      @endif
                                    @endforeach

                                    @if( empty($check_menu_3) )
                                      <option selected value="">
                                          เลือกหลักสูตร
                                      </option>
                                    @endif
                                  </select>
                                </div>
                                <hr>
                              </div>
                              <div class="col-12">
                                <label class="mb-2">รูปภาพปัจจุบัน</label>
                                <br>
                                @if( !empty($photo_menu_highlight_3) )
                                  <div id="preview_photo_menu_3">
                                    <img style="width:30%;" src="{{ $photo_menu_highlight_3->photo_menu }}">
                                  </div>
                                @else
                                  <div id="preview_photo_menu_3">
                                    <p class="text-danger">ไม่มีรูปภาพ</p>
                                  </div>
                                @endif
                                <hr>
                              </div>
                              <div class="col-12 mt-3">

                                <span class="btn btn-sm btn-primary mt-2" onclick="click_select_Menu_Highlight('3');">
                                    เลือกรูปภาพ
                                </span>

                                <input type="file" class="form-control d-none" accept="image/png" name="select_Menu_Highlight_3" id="select_Menu_Highlight_3" onchange="crop_select_Menu_Highlight('3');">

                                <div id="div_crop_Menu_Highlight_3" class="row p-1 d-none">
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100 ">
                                          <p class="mb-2 mt-3 text-center">ปรับขนาดภาพ</p>
                                          <!-- leftbox -->
                                          <div class="box-2 w-100 h-100">
                                              <div id="icon_crop_3" class="result_icon w-100"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100">
                                          <p class="mb-2 mt-3 text-center">ผลลัพธ์</p>
                                        <!--rightbox-->
                                          <div class="box-2 img-result ">
                                              <!-- result of crop -->
                                              <!-- <div class="square-item d-flex justify-content-center align-items-center" style="background-color: #003781;aspect-ratio1:1; height: 214px;">
                                                  <img alt="" id="Preview_Menu_Highlight_crop_2">
                                              </div> -->

                                              <div class="square-item mt-3">
                                                <img alt="" id="Preview_Menu_Highlight_crop_3">

                                            </div>
                                          </div>
                                      </div>
                                </div>
                                </div>
                              </div>
                              <div class="col-12 mt-3">
                                <hr>
                                <button id="btn_cf_change_Menu_Highlight_3" class="btn btn-sm btn-success float-end" onclick="cf_change_Menu_Highlight('3');" disabled>
                                  ยืนยันการเปลี่ยนแปลง
                                </button>
                              </div>

                            </div>
                          </div>
                          <!-- menu_of_4 -->
                          <div class="tab-pane fade" id="menu_of_4" role="tabpanel">
                            <div class="row">

                              <div class="col-12">
                                <div class="input-group mb-3">
                                  <label class="input-group-text">เลือกหลักสูตร</label>
                                  <select class="form-select" id="select_change_Menu_Highlight_4" onchange="sclect_new_Menu_Highlight('4');">
                                    {{ $check_menu_4 = null }}
                                    @foreach($data_Training_type as $item_4)
                                      @if($item_4->check_highlight == "4")
                                        {{ $check_menu_4 = 'Yes' }}
                                        <option selected value="{{ $item_4->id }}">
                                          {{ $item_4->type_article }}
                                        </option>
                                      @else
                                        <option value="{{ $item_4->id }}">
                                          {{ $item_4->type_article }}
                                        </option>
                                      @endif
                                    @endforeach

                                    @if( empty($check_menu_4) )
                                      <option selected value="">
                                          เลือกหลักสูตร
                                      </option>
                                    @endif
                                  </select>
                                </div>
                                <hr>
                              </div>
                              <div class="col-12">
                                <label class="mb-2">รูปภาพปัจจุบัน</label>
                                <br>
                                @if( !empty($photo_menu_highlight_4) )
                                  <div id="preview_photo_menu_4">
                                    <img style="width:30%;" src="{{ $photo_menu_highlight_4->photo_menu }}">
                                  </div>
                                @else
                                  <div id="preview_photo_menu_4">
                                    <p class="text-danger">ไม่มีรูปภาพ</p>
                                  </div>
                                @endif
                                <hr>
                              </div>
                              <div class="col-12 mt-3">

                                <span class="btn btn-sm btn-primary mt-2" onclick="click_select_Menu_Highlight('4');">
                                    เลือกรูปภาพ
                                </span>

                                <input type="file" class="form-control d-none" accept="image/png" name="select_Menu_Highlight_4" id="select_Menu_Highlight_4" onchange="crop_select_Menu_Highlight('4');">

                                <div id="div_crop_Menu_Highlight_4" class="row p-1 d-none">
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100 ">
                                          <p class="mb-2 mt-3 text-center">ปรับขนาดภาพ</p>
                                          <!-- leftbox -->
                                          <div class="box-2 w-100 h-100">
                                              <div id="icon_crop_4" class="result_icon w-100"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 d-flex justify-content-center align-items-center" style="border: #2260ff 2px solid;border-radius: 10px;">
                                      <div class="w-100">
                                          <p class="mb-2 mt-3 text-center">ผลลัพธ์</p>
                                        <!--rightbox-->
                                          <div class="box-2 img-result d-flex justify-content-center">
                                              <!-- result of crop -->
                                              <div class="long-item w-100" style="background-color: #003781;max-width: 200px;height: 250px;">
                                                  <img alt="" id="Preview_Menu_Highlight_crop_4" style="display: block;">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12 mt-3">
                                <hr>
                                <button id="btn_cf_change_Menu_Highlight_4" class="btn btn-sm btn-success float-end" onclick="cf_change_Menu_Highlight('4');" disabled>
                                  ยืนยันการเปลี่ยนแปลง
                                </button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Number Menu -->
              <div class="tab-pane fade" id="success-pills-profile" role="tabpanel">
                <div id="content_number_menu_type" class="row mt-3 mb-2">
                  <!--  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">การจัดการหลักสูตร</div>
  <div class="ps-3">
    <select id="select_show_training_by_type" class="form-select" onchange="change_show_training_by_type();">
      <option value="all" selected>หลักสูตรทั้งหมด</option>
    </select>
  </div>
	<div class="ms-auto">
		<div class="btn-group">
			<a href="{{ url('/training_create') }}" class="btn btn-success">
				<i class="fa-solid fa-layer-plus"></i> เพิ่มหลักสูตรใหม่
			</a>
		</div>
    @if(Auth::check())
      @if(Auth::user()->role == "Super-admin")
  		<div class="btn-group">
  			<span class="btn btn-warning" data-toggle="modal" data-target="#modal_menu_management">
  				<i class="fa-solid fa-list-ol"></i> การจัดการเมนูหลักสูตร
  			</span>
  		</div>
      @endif
    @endif
	</div>
</div>

<hr>

<div class="card border-top border-0 border-4 border-primary">
  <div class="card-body p-5">
    <div class="card-title d-flex align-items-center">
      <h5 id="h5_training_types" class="mb-0 text-primary">
        <!--  -->
      </h5>
    </div>
    <hr>
    <div id="div_content" class="row">
      <!-- data -->
    </div>
  </div>
</div>

<script>

	document.addEventListener('DOMContentLoaded', function () {
        get_data_Training('all');
        get_data_Training_type();
        get_data_number_menu_type();
  });

  function get_data_Training(type){
    fetch("{{ url('/') }}/api/get_data_Training/" + type )
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(type == 'all'){
              document.querySelector('#h5_training_types').innerHTML = 'หลักสูตรทั้งหมด';
          }
          else{
              document.querySelector('#h5_training_types').innerHTML = result['type_article'];
          }

          let div_content = document.querySelector('#div_content');
              div_content.innerHTML = '';

          if(result['data_training']){
              for (let i = 0; i < result['data_training'].length; i++) {

                  let textWithoutHtml = `<br><br><br>`;
                  if(result['data_training'][i].detail){
                      textWithoutHtml = result['data_training'][i].detail.replace(/(<([^>]+)>)/gi, "");
                  }

                  // type_article
                  let type_article = `` ;
                  if(type == 'all'){
                      type_article = result['data_training'][i].type_article;
                  }
                  else{
                      type_article = result['type_article'] ;
                  }

                  // Highlight
                  let html_Highlight ;
                  if(type == 'all'){
                    html_Highlight = `<span id="span_Highlight_id_`+result['data_training'][i].id+`" class="float-end">..</span>`;
                    if(result['data_training'][i].highlight_number){
                      html_Highlight = `
                        <span id="span_Highlight_id_`+result['data_training'][i].id+`">
                          <i class="i_Highlight fa-solid fa-circle-`+result['data_training'][i].highlight_number+` font-24 float-end text-success"></i>
                        </span>
                        `;
                    }
                  }else{
                    html_Highlight = `<span id="span_Highlight_id_`+result['data_training'][i].id+`" class="float-end">..</span>`;
                    if(result['data_training'][i].highlight_of_type){
                      html_Highlight = `
                        <span id="span_Highlight_id_`+result['data_training'][i].id+`">
                          <i class="i_Highlight fa-solid fa-circle-`+result['data_training'][i].highlight_of_type+` font-24 float-end text-success"></i>
                        </span>
                        `;
                    }
                  }

                  let sum_datetime_start = ``;
                  if(result['data_training'][i].datetime_start){
                    let datetime_start = result['data_training'][i].datetime_start;
                    // แยกวันที่และเวลา
                    let [date_datetime_start, time_datetime_start] = datetime_start.split(' ');
                    // แยกส่วนของวันที่
                    let [year_datetime_start, month_datetime_start, day_datetime_start] = date_datetime_start.split('-');
                    // แปลงรูปแบบวันที่เป็น วัน/เดือน/ปี
                    let formatted_date_start = `${day_datetime_start}/${month_datetime_start}/${year_datetime_start}`;
                    // แยกส่วนของเวลา (เฉพาะ HH:MM:SS)
                    let [hour, minute, second] = time_datetime_start.split('.')[0].split(':');
                    let formatted_time_start = `${hour}:${minute}`;

                    sum_datetime_start = formatted_date_start+` `+formatted_time_start+` น.` ;
                  }

                  let sum_datetime_end = `-`;
                  if(result['data_training'][i].datetime_end){
                    let datetime_end = result['data_training'][i].datetime_end;
                    // แยกวันที่และเวลา
                    let [date_datetime_end, time_datetime_end] = datetime_end.split(' ');
                    // แยกส่วนของวันที่
                    let [year_datetime_end, month_datetime_end, day_datetime_end] = date_datetime_end.split('-');
                    // แปลงรูปแบบวันที่เป็น วัน/เดือน/ปี
                    let formatted_date_end = `${day_datetime_end}/${month_datetime_end}/${year_datetime_end}`;
                    // แยกส่วนของเวลา (เฉพาะ HH:MM:SS)
                    let [hour, minute, second] = time_datetime_end.split('.')[0].split(':');
                    let formatted_time_end = `${hour}:${minute}`;

                    sum_datetime_end = formatted_date_end+` `+formatted_time_end+` น.`;
                  }

                  // status
                  let html_status = `
                      <span class="btn btn-sm btn-danger" style="position:absolute;top:1%;right: 1%;">
                        Inactive
                      </span>
                  `;
                  if(result['data_training'][i].status == 'Yes'){
                    html_status = `
                      <span class="btn btn-sm btn-success" style="position:absolute;top:1%;right: 1%;">
                        Active
                      </span>`;
                  }

                  let html = `
                      <div class="col-12 col-md-3">
                        <div class="card" style="position:relative;">
                          `+html_status+`
                          <img src="`+result['data_training'][i].photo+`" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">
                              `+result['data_training'][i].title+`
                            </h5>
                            <p class="card-text text-info">
                              #`+type_article+`
                            </p>
                            <p class="card-text">
                              <b>เริ่ม : </b>`+sum_datetime_start+`
                              <br>
                              <b>สิ้นสุด : </b>`+sum_datetime_end+`
                            </p>
                            <p class="detail-course">
                              `+textWithoutHtml+`
                            </p>
                            <p class="card-text mt-3">
                              <b>ผู้ลงข้อมูล : </b>`+result['data_training'][i].name_creator+`
                            </p>
                            <hr>
                            <span>
                              <b>Highlight</b>
                              `+html_Highlight+`
                            </span>
                            <center class="mt-4 mb-2">

                              <div class="row">
                                <div class="col-12">
                                  <a href="{{ url('/preview_training') }}/`+result['data_training'][i].id+`" class="btn btn-sm btn-info w-100">
                                    <i class="fa-solid fa-money-check-pen"></i> ดูข้อมูล / แก้ไขข้อมูล
                                  </a>
                                </div>
                                <div class="col-6 mt-2">
                                  @if(Auth::check())
                                    @if(Auth::user()->role == "Super-admin")
                                    <div class="btn-group w-100" role="group">
                                      <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Highlight</button>
                                      <ul class="dropdown-menu" style="margin: 0px;">
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_training'][i].id+`' , 'ว่าง' , '`+type+`')">
                                            ว่าง
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_training'][i].id+`' , '1' , '`+type+`')">
                                            ลำดับที่ 1
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_training'][i].id+`' , '2' , '`+type+`')">
                                            ลำดับที่ 2
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_training'][i].id+`' , '3' , '`+type+`')">
                                            ลำดับที่ 3
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_training'][i].id+`' , '4' , '`+type+`')">
                                            ลำดับที่ 4
                                          </span>
                                        </li>
                                        <li>
                                          <span class="dropdown-item btn" onclick="change_Highlight('`+result['data_training'][i].id+`' , '5' , '`+type+`')">
                                            ลำดับที่ 5
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                    @endif
                                  @endif
                                </div>
                                <div class="col-6 mt-2">
                                  <form method="POST" action="{{ url('/training') }}/`+result['data_training'][i].id+`" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete(event, this)">
                                      {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn btn-danger btn-sm text-center w-100" title="Delete Tools_tutorial">
                                          &nbsp;<i class="fa-solid fa-trash-can"></i> ลบ
                                      </button>
                                  </form>
                                </div>
                              </div>

                            </center>
                          </div>
                        </div>
                      </div>
                  `;

                  div_content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

              }
          }

      });
  }

  function change_Highlight(training_id , number , type){
    // console.log(training_id);
    // console.log(number);

    fetch("{{ url('/') }}/api/change_Highlight/" + training_id  + "/" + number + "/" + type)
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(result['old_id']){
            let span_Highlight_old_id = document.querySelector('#span_Highlight_id_'+result['old_id']);

            if(result['old_id_change_to']){
                span_Highlight_old_id.innerHTML = `
                  <span id="span_Highlight_id_`+result['old_id']+`">
                    <i class="i_Highlight fa-solid fa-circle-`+result['old_id_change_to']+` font-24 float-end text-success"></i>
                  </span>
                `;

                let icon_1 = document.getElementById('span_Highlight_id_'+result['old_id']);
                    icon_1.classList.remove('i_Highlight');
                    // void icon_1.offsetWidth; // Trigger reflow
                    setTimeout(() => {
                      icon_1.classList.add('i_Highlight');
                    }, 500);
                  }
            else{
              span_Highlight_old_id.innerHTML = `
                <span id="span_Highlight_id_`+result['old_id']+`" class="float-end">..</span>
              `;
            }
          }

          let select = document.querySelector('#span_Highlight_id_'+training_id);
          select.innerHTML = `
            <span id="span_Highlight_id_`+training_id+`">
              <i class="i_Highlight fa-solid fa-circle-`+number+` font-24 float-end text-success"></i>
            </span>
          `;

          let icon_2 = document.getElementById('span_Highlight_id_'+training_id);
              icon_2.classList.remove('i_Highlight');
              // void icon_2.offsetWidth; // Trigger reflow
              setTimeout(() => {
                icon_2.classList.add('i_Highlight');
              }, 500);

      });
  }


  function get_data_Training_type(){

    let select_show_training_by_type = document.querySelector('#select_show_training_by_type');

    fetch("{{ url('/') }}/api/get_data_Training_type")
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(result){
            for(let item of result){
                let option = document.createElement("option");
                option.text = item.type_article;
                option.value = item.id;
                select_show_training_by_type.add(option);             
            } 
          }
    });

  }

  function change_show_training_by_type(){
    let select_training_id = document.querySelector('#select_show_training_by_type').value ;
    get_data_Training(select_training_id)
  }

  function get_data_number_menu_type(){

    let content_number_menu_type = document.querySelector('#content_number_menu_type');
        content_number_menu_type.innerHTML = '';

        fetch("{{ url('/') }}/api/get_data_Training_type")
          .then(response => response.json())
          .then(result => {
              // console.log(result);

              if(result){

                for (let i = 0; i < result.length; i++) {

                  let html_list_number = `` ;
                  for (let ix = 0; ix < result.length; ix++) {

                    let count = ix + 1 ;
                    list_number = `
                      <li>
                        <span class="dropdown-item btn" onclick="change_number_menu_type('`+result[i].id+`' , '`+count+`')">
                          ลำดับที่ `+count+`
                        </span>
                      </li>
                    `;

                    html_list_number = html_list_number + list_number ;

                  }

                  let html = `
                    <div class="col-1 center-vertical mb-3">
                      <i class="fa-solid fa-circle-`+result[i].number_menu+` font-24 text-info"></i>
                    </div>
                    <div class="col-1 mb-3">
                      <div class="icon-menu-course">
                          <img src="`+result[i].icon+`">
                      </div>
                    </div>
                    <div class="col-7 center-vertical mb-3">
                      `+result[i].type_article+`
                    </div>
                    <div class="col-3 center-vertical mb-3">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Number Menu</button>
                        <ul class="dropdown-menu" style="margin: 0px;">
                          `+html_list_number+`
                        </ul>
                      </div>
                      <button type="button" class="btn btn-sm btn-danger mx-2" onclick="click_delete_name_training_type('`+result[i].id+`' , '`+result[i].type_article+`')">
                        <i class="fa-solid fa-trash-can"></i> ลบ
                      </button>
                    </div>
                    <hr>
                  `;

                  content_number_menu_type.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                }

              }
        });
  }

  function click_delete_name_training_type(training_type_id , type_article){

    let btn = document.querySelector('#btn_cf_delete_training_type');
    let name_training_type = document.querySelector('#modal_delete_name_training_type');
        name_training_type.innerHTML = type_article ;

        btn.setAttribute('onclick' , "cf_delete_training_type('"+training_type_id+"')");
        
        document.querySelector('#btn_close_modal_menu_management').click();
        document.querySelector('#btn_Modal_delete_training_type').click();
  }

  function cf_delete_training_type(training_type_id){
    fetch("{{ url('/') }}/api/delete_training_type/"+ training_type_id)
          .then(response => response.text())
          .then(result => {
              // console.log(result);

            if(result == 'success'){
              document.querySelector('#btn_close_Modal_delete_training_type').click();
              get_data_number_menu_type();
            }
    });
  }

  function change_number_menu_type(type_id , number){

    fetch("{{ url('/') }}/api/change_number_menu_type/"+ type_id + "/" + number)
          .then(response => response.text())
          .then(result => {
              // console.log(result);
              if(result == 'success'){
                get_data_number_menu_type();
              }
    });

  }

</script>


<!-- Crop Menu_Highlight -->
<script>
  function click_select_Menu_Highlight(type_number){
    // console.log('click_select_Menu_Highlight');
    document.querySelector('#div_crop_Menu_Highlight_'+type_number).classList.add('d-none');

    let preview_icon_crop = document.querySelector('#Preview_Menu_Highlight_crop_'+type_number);
        preview_icon_crop.src = '';
    let icon_crop = document.querySelector('#icon_crop_'+type_number);
        icon_crop.innerHTML = "";
    document.querySelector('#select_Menu_Highlight_'+type_number).click();
  }
  function crop_select_Menu_Highlight(type_number){
      document.querySelector('#div_crop_Menu_Highlight_'+type_number).classList.remove('d-none');
  }

  var input_img_icon_1 = document.getElementById('select_Menu_Highlight_1');
  input_img_icon_1.addEventListener('change', function (e) {
      crop_img_icon(e ,'1');
  });

  var input_img_icon_2 = document.getElementById('select_Menu_Highlight_2');
  input_img_icon_2.addEventListener('change', function (e) {
      crop_img_icon(e,'2');
  });

  var input_img_icon_3 = document.getElementById('select_Menu_Highlight_3');
  input_img_icon_3.addEventListener('change', function (e) {
      crop_img_icon(e,'3');
  });

  var input_img_icon_4 = document.getElementById('select_Menu_Highlight_4');
  input_img_icon_4.addEventListener('change', function (e) {
      crop_img_icon(e,'4');
  });

  function crop_img_icon(e , type_number){
    let result_icon = document.querySelector('.result_icon')
    let input = document.getElementById('select_Menu_Highlight_'+type_number);
    let image = document.createElement('img');
    let cropper;
    let preview_icon_crop = document.querySelector('#Preview_Menu_Highlight_crop_'+type_number);

    let files = e.target.files;
    let done = function (url) {
        input.value = '';
        image.src = url;
        document.getElementById('icon_crop_'+type_number).innerHTML = '';
        document.getElementById('icon_crop_'+type_number).appendChild(image);
        // cropper = new Cropper(image, {
        //     aspectRatio: 1 / 1, // Change this to the desired aspect ratio
        //     viewMode: 3,
        //     preview: '#Preview_icon_crop'
        // });

        let text_aspectRatio ;
        if(type_number == '1' || type_number == '3'){
          text_aspectRatio == 3 / 4 ;
        }
        else if(type_number == '2' || type_number == '4'){
          text_aspectRatio == 1 / 1 ;
        }

        cropper = new Cropper(image, {
            dragMode: 'move',
            aspectRatio: text_aspectRatio ,
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
                    width: 512,
                    height: 681// input value
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
            check_submit_change_Menu_Highlight(type_number);
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result_icon);
            };
            reader.readAsDataURL(file);
            check_submit_change_Menu_Highlight(type_number);
        }
    }

  }

  function check_submit_change_Menu_Highlight(type){

      let training_type = document.querySelector('#select_change_Menu_Highlight_'+type);
      let select_Menu_Highlight = document.querySelector('#Preview_Menu_Highlight_crop_'+type);
      
      let check_photo = false;
      if(document.querySelector('#preview_photo_menu_'+type+ ' img')){
        let imgElement = document.querySelector('#preview_photo_menu_'+type+ ' img');
        if(imgElement.src){
          check_photo = true ;
        }
      }

      // console.log(training_type.value);
      // console.log(select_Menu_Highlight.src);
      // console.log(check_photo);

      if( training_type.value ){
          if(select_Menu_Highlight.src || check_photo){
            document.querySelector('#btn_cf_change_Menu_Highlight_'+type).disabled = false;
          }else{
            document.querySelector('#btn_cf_change_Menu_Highlight_'+type).disabled = true;
          }
      }else{
          document.querySelector('#btn_cf_change_Menu_Highlight_'+type).disabled = true;
      }
  }

  function cf_change_Menu_Highlight(type) {
      // let select_Menu_Highlight = document.querySelector('#select_Menu_Highlight_'+type)
      let select_change_Menu_Highlight = document.querySelector('#select_change_Menu_Highlight_'+type)

      // ดึง Base64 string จาก <img> element
      let imgElement ;
      let check_imgElement = document.querySelector('#Preview_Menu_Highlight_crop_'+type);

      // console.log(select_Menu_Highlight.value);

      if (check_imgElement.src) {
          imgElement = document.querySelector('#Preview_Menu_Highlight_crop_'+type);
          let base64String = imgElement.src.split(',')[1]; // ลบ "data:image/png;base64," ออก

          // แปลง Base64 เป็น Blob
          let contentType = 'image/png'; // ตั้งค่าประเภทของรูปภาพ เช่น 'image/png' หรือ 'image/jpeg'
          let blob = base64ToBlob(base64String, contentType);

          // ตั้งค่า path และชื่อไฟล์ใน Firebase Storage
          let date_now = new Date();
          let Date_for_firebase = formatDate_for_firebase(date_now);
          let name_file = Date_for_firebase + '-' + select_change_Menu_Highlight.value ;
          let storageRef = storage.ref('/training/image/photo_menu/' + name_file);

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
                      // downloadURL
                      let data_arr = {
                          "training_type_id" : select_change_Menu_Highlight.value,
                          "number" : type,
                          "downloadURL" : downloadURL,
                      };

                      fetch("{{ url('/') }}/api/update_Menu_Highlight", {
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
                            let perview_Menu_Highlight = document.querySelector('#perview_Menu_Highlight_'+type);
                                perview_Menu_Highlight.setAttribute('src' , downloadURL);

                            let preview_photo_menu = document.querySelector('#preview_photo_menu_'+type);
                                preview_photo_menu.innerHTML = `<img style="width:30%;" src="`+downloadURL+`">`;

                            document.querySelector('#select_Menu_Highlight_'+type).value = null;
                            document.querySelector('#icon_crop_'+type).innerHTML = '';
                            
                            let preview_Menu_Highlight_crop = document.querySelector('#Preview_Menu_Highlight_crop_'+type);
                                preview_Menu_Highlight_crop.removeAttribute('src');

                            document.querySelector('#div_crop_Menu_Highlight_'+type).classList.add('d-none');

                          }
                      }).catch(function(error){
                          // console.error(error);
                      });

                  });
              }
          );
      } else {
          imgElement = document.querySelector('#preview_photo_menu_'+type+ ' img');

          let data_arr = {
              "training_type_id" : select_change_Menu_Highlight.value,
              "number" : type,
              "downloadURL" : imgElement.src,
          };

          fetch("{{ url('/') }}/api/update_Menu_Highlight", {
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
                let perview_Menu_Highlight = document.querySelector('#perview_Menu_Highlight_'+type);
                    perview_Menu_Highlight.setAttribute('src' , imgElement.src);

                let preview_photo_menu = document.querySelector('#preview_photo_menu_'+type);
                    preview_photo_menu.innerHTML = `<img style="width:30%;" src="`+imgElement.src+`">`;

                document.querySelector('#select_Menu_Highlight_'+type).value = null;
                document.querySelector('#icon_crop_'+type).innerHTML = '';
                
                let preview_Menu_Highlight_crop = document.querySelector('#Preview_Menu_Highlight_crop_'+type);
                    preview_Menu_Highlight_crop.removeAttribute('src');

                document.querySelector('#div_crop_Menu_Highlight_'+type).classList.add('d-none');

              }
          }).catch(function(error){
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

      return new Blob(byteArrays, { type: contentType });
  }

  function sclect_new_Menu_Highlight(type){

    let id = document.querySelector('#select_change_Menu_Highlight_'+type).value;
    fetch("{{ url('/') }}/api/get_photo_Training_type/"+ id)
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(result){
            document.querySelector('#preview_photo_menu_'+type).innerHTML = "";
            let html ;
            if(result.photo_menu){
              html = `
                <img style="width:30%;" src="`+result.photo_menu+`" alt="">
              `;
            }else{
              html = `<p class="text-danger">ไม่มีรูปภาพ</p>`;
            }

            document.querySelector('#preview_photo_menu_'+type).innerHTML = html;

            check_submit_change_Menu_Highlight(type);
          }
    });
  }
</script>

@endsection
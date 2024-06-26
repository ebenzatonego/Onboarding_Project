<style>
    .header-my-goal {
        font-size: 16px;
        font-weight: bolder;
    }


    .dropdown_my_goal {
        /* min-width: 15em; */
        position: relative;
        top: 0;
    }

    .select_my_goal {
        background: #FFF;
        color: #000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px #A1A1A1 solid;
        border-radius: 0.5em;
        padding: 1em;
        cursor: pointer;
        transition: 0.3s;
    }

    /* .select-clicked {
    border: 2px #26489a solid;
    box-shadow: 0 0 0.8em #26489a;
} */
    .select_my_goal:hover {
        color: #003781;
    }

    .caret_may_goal {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid #616161;
        transition: 0.3s;
    }

    .caret_may_goal-rotate {
        transform: rotate(180deg);
    }

    .menu_my_goal {
        list-style: none;
        padding: 0.2em 0.5em;
        background: #fff;
        border: 1px #fff solid;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 0.5em;
        color: #9fa5b5;
        position: absolute;
        top: 4em;
        left: 50%;
        width: 100%;
        transform: translateX(-50%);
        opacity: 0;
        display: none;
        transition: 0.2s;
        z-index: 99999999;
        max-height: calc(30vh - 100%);
        /* ความสูงไม่เกินความสูงหน้าจอ ลบ 4em */
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .menu_my_goal li {
        padding: 0.7em 0.5em;
        margin: 0.3em 0;
        border-radius: 0.5em;
        cursor: pointer;
    }

    .menu_my_goal li:hover {
        background: #E6E6E6;
        color: #003781;
    }

    .my_goal_active {
        background: #E6E6E6;
        color: #003781;

    }

    .menu_my_goal_open {
        display: block;
        opacity: 1;
    }

    .label_select_my_goal {
        position: absolute;
        top: -15px;
        background-color: #fff;
        padding: 5px 7px;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        font-size: 12px;
        font-weight: bolder;
    }

    .menu_my_goal li p {
        margin: 2px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        background-color: rgba(230, 230, 230, 0.50);
        color: #000;
        font-weight: bold;
        padding: 3px;
    }

    .menu_my_goal li img {
        width: 20px;
        height: 20px;
        object-fit: contain;
        filter: grayscale(100);
    }

    .menu_my_goal li:hover img {
        filter: grayscale(0);
    }

    .btn-action-select-goal {
        background-color: #FFF;
        color: #003781;
        padding: 1px 0px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        width: 100%;
        max-width: 118px;
    }

    .modal {
        z-index: 99999999999 !important;
    }

    input[type="radio"].select-goal {
        display: none;
    }

    .select-goal~label {
        position: relative;
        color: #fff;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.8em;
        background-color: #B8C6D8;
        padding: 7px 2em;
        border-radius: 50px;
        width: 100%;
        max-width: 437px;
        display: flex;
        justify-content: center;
        transition: all .15s ease-in-out;
        margin: auto auto 20px auto;

        color: #FFF;
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    /* .select-goal ~ label:before {
  content: "";
  height: 2em;
  width: 2em;
  border: 3px solid #4189e0;
  border-radius: 50%;
} */


    input[type="radio"].select-goal:checked+label {
        background-color: #243286;
        color: #ffffff;
    }
</style>

<div class="modal fade" id="modal_my_goal" tabindex="-1" role="dialog" aria-labelledby="modal_my_goal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content mx-3 " style="border: none;">
            <div class="modal-body py-5" style="background-color: #F0F5FF;border-radius: 10px;border: none;">
                <div class="px-2">
                    <!-- Goal Dropdown -->
                    <div id="section_select_goal">
                        <h2 class="text-center mb-4"><b>เป้าหมายของคุณในช่วงนี้ คือ</b></h2>
                        <!-- <div class="px-5">
                            <img src="{{url('img/icon/questionaire.png')}}" alt="" style="width: 100%;">
                        </div> -->
                        <div class="w-100">

                            <div>
                                <input class="select-goal" type="radio" name="select_goal" id="car" value="ซื้อรถ">
                                <label for="car">ซื้อรถ</label>
                            </div>
                            <div>
                                <input class="select-goal" type="radio" name="select_goal" id="home" value="ซื้อบ้าน" />
                                <label for="home">ซื้อบ้าน</label>
                            </div>
                            <div>
                                <input class="select-goal" type="radio" name="select_goal" id="invest" value="เก็บลงทุน">
                                <label for="invest">เก็บลงทุน</label>
                            </div>
                            <div>
                                <input class="select-goal" type="radio" name="select_goal" id="retire" value="เก็บเกษียณ" />
                                <label for="retire">เก็บเกษียณ</label>
                            </div>
                            <div>
                                <input class="select-goal" type="radio" name="select_goal" id="child" value="เก็บให้ลูก">
                                <label for="child">เก็บให้ลูก</label>
                            </div>
                        </div>
                        <div class="d-none">

                            <div class="dropdown_my_goal mt-4 d-none" id="dropdown_goal">
                                <div class="select_my_goal">
                                    <label class="label_select_my_goal">เลือกความฝันของคุณ</label>
                                    <span class="selected_my_goal my_goal">โปรดเลือกความฝันของคุณ</span>
                                    <div class="caret_may_goal"></div>
                                </div>
                                <ul class="menu_my_goal">
                                    <li>
                                        <img src="{{url('img/icon/icon-car.png')}}" alt="">
                                        <span class="ms-2">อยากซื้อรถ</span>
                                    </li>
                                    <li>
                                        <img src="{{url('img/icon/icon-car.png')}}" alt="">
    
                                        <span class="ms-2">อยากซื้อบ้าน</span>
                                    </li>
                                    <li>
                                        <img src="{{url('img/icon/icon-car.png')}}" alt="">
    
                                        <span class="ms-2">อยากเก็บเงินลงทุน</span>
                                    </li>
                                    <li>
                                        <img src="{{url('img/icon/icon-car.png')}}" alt="">
    
                                        <span class="ms-2">อยากเตรียมเงินให้ลูก</span>
                                    </li>
                                    <li>
                                        <img src="{{url('img/icon/icon-car.png')}}" alt="">
    
                                        <span class="ms-2">อยากเก็บเงินเกษียณ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button id="btn_goal_next" class="btn btn-action-select-goal" disabled>
                                ต่อไป
                            </button>
                        </div>
                    </div>
                    <style>
                        .title-my-goal {
                            color: #000;
                            font-size: 24px;
                            font-style: normal;
                            font-weight: 700;
                            line-height: normal;
                            margin: 22PX 0;
                        }

                        @media (max-width: 768px) {
                            .title-my-goal {
                                text-align: center;
                            }

                            .dropdown_my_goal.select-period {
                                width: 100% !important;
                                display: block !important;
                            }

                            .select_my_goal.select-period {
                                padding: 5px !important;
                            }

                            .label_select_my_goal.select-period {
                                font-size: 8px !important;
                                padding: 2px !important;
                            }

                            .selected_my_goal.select-period {
                                font-size: 8px !important;
                            }

                            .menu_my_goal.select-period {
                                top: 19px !important;
                            }
                        }

                        @media (min-width: 768px) {
                            .title-my-goal {
                                text-align: left;
                            }

                            .dropdown_my_goal {
                                width: 100% !important;
                                display: block !important;
                            }
                        }
                    </style>
                    <!-- Value Dropdown -->
                    <div id="section_select_value" class="d-none">
                        <h4 class="text-center mb-4"><b>เป้าหมายของคุณในช่วงนี้คือ</b></h4>
                        <h1 class="text-center mb-4" style="color: #800201;font-weight: bolder;">
                            <span>อยาก</span>
                            <span id="goal_value_title"></span>
                        </h1>
                        <!-- <h4 class="text-center mb-4"><b>มีมูลค่าประมาณ</b></h4> -->
                        <!-- <div class="px-5 mb-5">
                            <img id="goal_value_img" src="" alt="" style="width: 100%;">
                        </div> -->


                        <div class="row">
                            <div class="col-md-6 col-12 ">
                                <P class="title-my-goal">มีมูลค่าประมาณ</P>
                                <div class="dropdown_my_goal mt-4" id="dropdown_value">
                                    <div class="select_my_goal">
                                        <label class="label_select_my_goal">ความฝันของคุณมีมูลค่าประมาณเท่าไหร่ ?</label>
                                        <span class="selected_my_goal">โปรดเลือกมูลค่า</span>
                                        <div class="caret_may_goal"></div>
                                    </div>
                                    <ul class="menu_my_goal">
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 600,000 บาท</p>
                                        </li>
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 800,000 บาท</p>
                                        </li>
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 1,000,000 บาท</p>
                                        </li>
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 1,500,000 บาท</p>
                                        </li>
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 2,000,000 บาท</p>
                                        </li>
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 3,000,000 บาท</p>
                                        </li>
                                        <li class="text-center">
                                            <p class="ms-2">ประมาณ 5,000,000 บาท</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <P class="title-my-goal mb-0">คุณอยากทำให้ได้ภายในเวลาเท่าไหร่</P>
                                <div class="col-12">
                                    <!-- <h4 >ปี</h4> -->
                                    <div class="d-flex align-items-center w-100">
                                        <div class="dropdown_my_goal  mt-4 w-100" id="dropdown_period_year">
                                            <div class="select_my_goal ">
                                                <label class="label_select_my_goal ">คุณจะใช้เวลากี่ปีในการทำความฝันนี้</label>
                                                <span class="selected_my_goal ">เลือกปี</span>
                                                <div class="caret_may_goal "></div>
                                            </div>
                                            <ul class="menu_my_goal ">
                                                <li class="text-center">
                                                    <p class="ms-2">0</p>
                                                </li>
                                                <li class="text-center ">
                                                    <p class="ms-2">1</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">2</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">3</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center w-100">

                                        <div class="dropdown_my_goal mt-4 w-100" id="dropdown_period_month">
                                            <div class="select_my_goal">
                                                <label class="label_select_my_goal">คุณจะใช้เวลากี่เดือนในการทำความฝันนี้</label>
                                                <span class="selected_my_goal">เลือกเดือน</span>
                                                <div class="caret_may_goal"></div>
                                            </div>
                                            <ul class="menu_my_goal">
                                                <li class="text-center">
                                                    <p class="ms-2">0</p>
                                                </li>
                                                <li class="text-center ">
                                                    <p class="ms-2">1</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">2</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">3</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">4</p>
                                                </li>
                                                <li class="text-center ">
                                                    <p class="ms-2">5</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">6</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">7</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">8</p>
                                                </li>
                                                <li class="text-center ">
                                                    <p class="ms-2">9</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">10</p>
                                                </li>
                                                <li class="text-center">
                                                    <p class="ms-2">11</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center w-100">
                                            <div class="dropdown_my_goal select-period mt-4" id="dropdown_period_year">
                                                <div class="select_my_goal select-period">
                                                    <label class="label_select_my_goal select-period">คุณจะใช้เวลากี่เดือน</label>
                                                    <span class="selected_my_goal select-period">เลือกเดือน</span>
                                                    <div class="caret_may_goal select-period"></div>
                                                </div>
                                                <ul class="menu_my_goal select-period">
                                                    <li class="text-center">
                                                        <p class="ms-2">0</p>
                                                    </li>
                                                    <li class="text-center">
                                                        <p class="ms-2">1</p>
                                                    </li>
                                                    <li class="text-center">
                                                        <p class="ms-2">2</p>
                                                    </li>
                                                    <li class="text-center">
                                                        <p class="ms-2">3</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <span>ปี</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center w-100">

                                            <div class="dropdown_my_goal mt-4" id="dropdown_period_month" style="width: 100% !important;display: block;">
                                                <div class="select_my_goal" style="padding: 5px !important;">
                                                    <label class="label_select_my_goal">คุณจะใช้เวลากี่เดือน</label>
                                                    <span class="selected_my_goal">เลือกเดือน</span>
                                                    <div class="caret_may_goal"></div>
                                                </div>
                                                <ul class="menu_my_goal">
                                                    <li class="text-center">
                                                        <p class="ms-2">10</p>
                                                    </li>
                                                    <li class="text-center">
                                                        <p class="ms-2">1</p>
                                                    </li>
                                                    <li class="text-center">
                                                        <p class="ms-2">2</p>
                                                    </li>
                                                    <li class="text-center">
                                                        <p class="ms-2">3</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <span>เดือน</span>
                                        </div>

                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button id="btn_value_back" class="btn btn-action-select-goal" onclick="setupBackButton('btn_value_back', 'section_select_value', 'section_select_goal')">
                                ย้อนกลับ
                            </button>



                            <button id="btn_value_next" class="btn btn-action-select-goal" disabled>
                                ต่อไป
                            </button>
                        </div>
                    </div>

                    <!-- Period Dropdown -->
                    <!-- <div id="section_select_period" class="d-none">
                        <h4 class="text-center mb-4"><b>โอเค เราจะบันทึกเป้าหมายของคุณ</b></h4>
                        <h1 id="goal_period_title" class="text-center mb-4" style="color: #800201;font-weight: bolder;"></h1>
                        <h4 class="text-center mb-4"><b>มีมูลค่าประมาณ</b></h4>
                        <h1 id="goal_period_value" class="text-center mb-4" style="color: #800201;font-weight: bolder;"></h1>
                        <h4 class="text-center mb-5"><b>คุณอยากทำให้ได้ภายในเวลาเท่าไหร่?</b></h4>
                        <div class="dropdown_my_goal mt-4" id="dropdown_period">
                            <div class="select_my_goal">
                                <label class="label_select_my_goal">คุณจะใช้เวลาเท่าไหร่ในการทำความฝันนี้</label>
                                <span class="selected_my_goal">โปรดเลือกเวลาที่จะใช้</span>
                                <div class="caret_may_goal"></div>
                            </div>
                            <ul class="menu_my_goal">
                                <li class="text-center">
                                    <p class="ms-2">1 ปี</p>
                                </li>
                                <li class="text-center">
                                    <p class="ms-2">3 ปี</p>
                                </li>
                                <li class="text-center">
                                    <p class="ms-2">5 ปี</p>
                                </li>
                                <li class="text-center">
                                    <p class="ms-2">10 ปี</p>
                                </li>
                                <li class="text-center">
                                    <p class="ms-2">15 ปี</p>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button id="btn_period_back" class="btn btn-action-select-goal">
                                ย้อนกลับ
                            </button>


                            <button id="btn_period_next" class="btn btn-action-select-goal" disabled>
                                ต่อไป
                            </button>
                        </div>
                    </div> -->
                    <!-- Goal Success -->
                    <div id="section_goal_success" class="d-none">
                        <h4 class="text-center mb-4"><b>โอเค เราได้บันทึก</b></h4>
                        <h4 class="text-center mb-4"><b>เป้าหมายของคุณแล้ว</b></h4>
                        <!-- <h4 class="text-center mb-4"><b>คือ</b></h4> -->
                        <h1 id="goal_success_title" class="text-center mb-4" style="color: #800201;font-weight: bolder;">“อยากซื้อรถ”</h1>
                        <h4 class="text-center mb-4"><b>มูลค่า</b></h4>
                        <h1 class="text-center mb-4" style="color: #800201;font-weight: bolder;">
                            <b>
                                <span id="goal_success_value">

                                </span>
                                <span>
                                    ภายใน <span id="goal_success_period">6 เดือน</span>
                                </span>
                            </b>
                        </h1>
                        <h4 class="text-center">
                            “เราจะคอยถาม
                            และเป็นกำลังใจ
                            ช่วยให้คุณทำ
                            ตามเป้าหมาย
                            ได้สำเร็จนะสู้ๆๆ”
                        </h4>

                        <div class="d-flex justify-content-between mt-3">

                            <button id="btn_success_back" class="btn btn-action-select-goal" onclick="setupBackButton('btn_success_back', 'section_goal_success', 'section_select_value')">
                                ย้อนกลับ
                            </button>
                            <button class="btn btn-action-select-goal" onclick="select_goal_success()">
                                เสร็จ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
     var yearsToAdd;
     var monthsToAdd;
    function setupDropdown(dropdownId, nextButtonId, nextSectionId, titleElementId = null, valueElementId = null, periodElementId = null, test) {
        let dropdown = document.querySelector(`#${dropdownId}`);
        let select = dropdown.querySelector(".select_my_goal");
        let caret = dropdown.querySelector(".caret_may_goal");
        let menu = dropdown.querySelector(".menu_my_goal");
        let options = dropdown.querySelectorAll(".menu_my_goal li");
        let selected = dropdown.querySelector(".selected_my_goal");
        let my_goal = dropdown.querySelector(".my_goal");
        let nextButton = document.querySelector(`#${nextButtonId}`);

        select.addEventListener("click", () => {
            select.classList.toggle("select-clicked");
            caret.classList.toggle("caret_may_goal-rotate");
            menu.classList.toggle("menu_my_goal_open");
        });



        const radios_select_goal = document.querySelectorAll('input[name="select_goal"]');

        // เพิ่ม event listener สำหรับการเปลี่ยนแปลงในแต่ละ radio button
        radios_select_goal.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.checked) {
                    console.log("Selected value: " + radio.value);
                    if (my_goal) {

                        my_goal.innerText = radio.value;
                        nextButton.disabled = false;
                    }
                    // selected.innerText = radio.value;
                    select.classList.remove("select-clicked");
                    caret.classList.remove("caret_may_goal-rotate");
                    menu.classList.remove("menu_my_goal_open");

                }
            });
        });

        options.forEach(option => {
            option.addEventListener("click", () => {
                // console.log(option.innerText);
                selected.innerText = option.innerText;
                select.classList.remove("select-clicked");
                caret.classList.remove("caret_may_goal-rotate");
                menu.classList.remove("menu_my_goal_open");

                options.forEach(option => {
                    option.classList.remove("my_goal_active");
                });
                option.classList.add("my_goal_active");


                // nextButton.disabled = false;
                check_period_section(nextButton)

                // console.log(dropdown.id);
                if (dropdown.id === 'dropdown_period_year') {
                    // console.log(option.innerText);
                    yearsToAdd = option.innerText;

                }

                if (dropdown.id === 'dropdown_period_month') {
                    // console.log(option.innerText);
                    monthsToAdd = option.innerText;
                }

            });
        });



        nextButton.addEventListener("click", () => {
            let currentSection = dropdown.closest('div[id^="section_select"]');
            currentSection.classList.add('d-none');
            document.querySelector(`#${nextSectionId}`).classList.remove('d-none');

            if (nextSectionId === 'section_select_value') {
                document.querySelector('#goal_value_title').innerText = selected.innerText;
                // document.querySelector('#goal_period_title').innerText = selected.innerText;
                document.querySelector('#goal_success_title').innerText = selected.innerText;

                // console.log(selected.innerText);
                // document.querySelector(`#goal_value_img`).src = `{{url("img/icon/select_my_goal")}}` + '/' + selected.innerText.replace(/\s+/g, '') + '.png';
                // document.querySelector(`#goal_success_img`).src = `{{url("img/icon/select_my_goal")}}` + '/' + selected.innerText.replace(/\s+/g, '') + '.png';
            }

            // if (nextSectionId === 'section_select_period') {
            //     document.querySelector('#goal_period_value').innerText = selected.innerText;
            //     document.querySelector('#goal_success_value').innerText = selected.innerText;
            // }

            // if (nextSectionId === 'section_goal_success') {
            //     document.querySelector('#goal_success_period').innerText = selected.innerText;
            // }

            if (titleElementId === 'goal_value') {
                document.querySelector('#goal_success_value').innerText = selected.innerText;
            }


        });

    }

    setupDropdown("dropdown_goal", "btn_goal_next", "section_select_value", "goal_value_title", 2);
    setupDropdown("dropdown_value", "btn_value_next", "section_goal_success", "goal_value", null, "goal_period_value", 1);
    setupDropdown("dropdown_period_year", "btn_value_next", "section_goal_success", "goal_period_year", "goal_success_value", "goal_success_period", 1);
    setupDropdown("dropdown_period_month", "btn_value_next", "section_goal_success", "goal_period_month", "goal_success_value", "goal_success_period", 1);

    function calculateFutureDate() {
        console.log('asd');
        // รับวันที่ปัจจุบัน
        console.log(yearsToAdd);
        console.log(monthsToAdd);
        const currentDate = new Date();

        // แสดงวันที่ปัจจุบัน
        // document.getElementById('currentDate').innerText = `Current Date: ${currentDate.toDateString()}`;

        // คำนวณเดือนและปีในอนาคต
        

        // สร้างวันที่ใหม่
        // const futureDate = new Date(currentDate.setFullYear(futureYear, futureMonth, currentDate.getDate()));

        // แสดงวันที่ในอนาคต
        // document.getElementById('futureDate').innerText = `Future Date: ${futureDate.toDateString()}`;
        // console.log(`Future Date: ${futureDate.toDateString()}`)
        const futureYear = currentDate.getFullYear() + parseInt(yearsToAdd);
        const futureMonth = currentDate.getMonth() + parseInt(monthsToAdd);
        
        console.log(currentDate.getMonth());
        console.log(`FfutureYear: ${futureYear}`);
        console.log(`FfutureMonth: ${futureMonth}`);
    }

    function setupBackButton(backButtonId, currentSectionId, previousSectionId) {
        let currentSection = document.querySelector(`#${currentSectionId}`);
        let previousSection = document.querySelector(`#${previousSectionId}`);
        currentSection.classList.add('d-none');
        previousSection.classList.remove('d-none');

    }

    // เรียกใช้ฟังก์ชันเพื่อตั้งค่าปุ่มย้อนกลับ
    // setupBackButton("btn_value_back", "section_select_value", "section_select_goal");
    // setupBackButton("btn_period_back", "section_select_period", "section_select_value");
    // setupBackButton("btn_success_back", "section_goal_success", "section_select_period");


    // เรียกใช้งาน setupBackButton สำหรับแต่ละปุ่มย้อนกลับ
</script>
<script>
    function check_period_section(nextButton) {
        const dropdowns = ['dropdown_period_year', 'dropdown_period_month', 'dropdown_value'];
        let allActive = true;

        dropdowns.forEach(dropdownId => {
            const dropdown = document.getElementById(dropdownId);
            if (dropdown) {
                const activeItem = dropdown.querySelector('.my_goal_active');
                if (!activeItem) {
                    allActive = false;
                }
            } else {
                allActive = false;
            }
        });

        if (allActive) {
            // console.log("All dropdowns have an active item. Proceed with the next action.");
           
                calculateFutureDate();
            nextButton.disabled = false;
        } else {
            // console.log("Not all dropdowns have an active item. Cannot proceed.");
        }
    }

    function select_goal_success() {
        let successTitle = document.querySelector('#goal_success_title').innerText;
        let successValue = document.querySelector('#goal_success_value').innerText;
        let successPeriod = document.querySelector('#goal_success_period').innerText;

        alert(`เป้าหมาย: ${successTitle}\nมูลค่า: ${successValue}\nภายใน: ${successPeriod}`);

        $('#modal_my_goal').modal('hide');
    }
</script>
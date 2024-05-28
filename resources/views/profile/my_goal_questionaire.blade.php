<style>
    .header-my-goal {
        font-size: 16px;
        font-weight: bolder;
    }


    .dropdown_my_goal {
        min-width: 15em;
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
        max-height: calc(30vh - 100%); /* ความสูงไม่เกินความสูงหน้าจอ ลบ 4em */
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
        padding: 1px 45px;
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
    }
    .modal {
        z-index: 99999999999 !important;
    }
</style>

<div class="modal fade" id="modal_my_goal" tabindex="-1" role="dialog" aria-labelledby="modal_my_goal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content mx-3 " style="border: none;">
            <div class="modal-body py-5" style="background-color: #F0F5FF;border-radius: 10px;border: none;">
                <div class="px-2">
                    <!-- Goal Dropdown -->
                    <div id="section_select_goal">
                        <h2 class="text-center mb-4"><b>เป้าหมายของคุณในช่วงนี้ คือ</b></h2>
                        <div class="px-5">
                            <img src="{{url('img/icon/questionaire.png')}}" alt="" style="width: 100%;">
                        </div>
                        <div class="dropdown_my_goal mt-4" id="dropdown_goal">
                            <div class="select_my_goal">
                                <label class="label_select_my_goal">เลือกความฝันของคุณ</label>
                                <span class="selected_my_goal">โปรดเลือกความฝันของคุณ</span>
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
                        <div class="d-flex justify-content-center mt-3">
                            <button id="btn_goal_next" class="btn btn-action-select-goal" disabled>
                                ต่อไป
                            </button>
                        </div>
                    </div>

                    <!-- Value Dropdown -->
                    <div id="section_select_value" class="d-none">
                        <h4 class="text-center mb-4"><b>เป้าหมายของคุณในช่วงนี้คือ</b></h4>
                        <h1 id="goal_value_title" class="text-center mb-4" style="color: #800201;font-weight: bolder;"></h1>
                        <h4 class="text-center mb-4"><b>มีมูลค่าประมาณ</b></h4>
                        <div class="px-5 mb-5">
                            <img id="goal_value_img" src="" alt="" style="width: 100%;">
                        </div>
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
                        <div class="d-flex justify-content-between mt-3">
                            <button id="btn_value_back" class="btn btn-action-select-goal">
                                ย้อนกลับ
                            </button>



                            <button id="btn_value_next" class="btn btn-action-select-goal" disabled>
                                ต่อไป
                            </button>
                        </div>
                    </div>

                    <!-- Period Dropdown -->
                    <div id="section_select_period" class="d-none">
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
                    </div>

                    <!-- Goal Success -->
                    <div id="section_goal_success" class="d-none">
                        <h4 class="text-center mb-4"><b>เรียบร้อย !!!</b></h4>
                        <h4 class="text-center mb-4"><b>เป้าหมายของฉัน</b></h4>
                        <h4 class="text-center mb-4"><b>คือ</b></h4>
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
                        <div class="px-5 mb-5">
                            <img id="goal_success_img" src="" alt="" style="width: 100%;">
                        </div>
                        <h4 class="text-center">
                            “เราจะคอยถาม
                            และเป็นกำลังใจ
                            ช่วยให้คุณทำ
                            ตามเป้าหมาย
                            ได้สำเร็จนะสู้ๆๆ”
                        </h4>

                        <div class="d-flex justify-content-between mt-3">

                            <button id="btn_success_back" class="btn btn-action-select-goal">
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
    function setupDropdown(dropdownId, nextButtonId, nextSectionId, titleElementId = null, imgElementId = null, valueElementId = null, periodElementId = null) {
        let dropdown = document.querySelector(`#${dropdownId}`);
        let select = dropdown.querySelector(".select_my_goal");
        let caret = dropdown.querySelector(".caret_may_goal");
        let menu = dropdown.querySelector(".menu_my_goal");
        let options = dropdown.querySelectorAll(".menu_my_goal li");
        let selected = dropdown.querySelector(".selected_my_goal");
        let nextButton = document.querySelector(`#${nextButtonId}`);

        select.addEventListener("click", () => {
            select.classList.toggle("select-clicked");
            caret.classList.toggle("caret_may_goal-rotate");
            menu.classList.toggle("menu_my_goal_open");
        });

        options.forEach(option => {
            option.addEventListener("click", () => {
                selected.innerText = option.innerText;
                select.classList.remove("select-clicked");
                caret.classList.remove("caret_may_goal-rotate");
                menu.classList.remove("menu_my_goal_open");

                options.forEach(option => {
                    option.classList.remove("my_goal_active");
                });
                option.classList.add("my_goal_active");

                nextButton.disabled = false;
            });
        });

        nextButton.addEventListener("click", () => {
            let currentSection = dropdown.closest('div[id^="section_select"]');
            currentSection.classList.add('d-none');
            document.querySelector(`#${nextSectionId}`).classList.remove('d-none');

            if (nextSectionId === 'section_select_value') {
                document.querySelector('#goal_value_title').innerText = selected.innerText;
                document.querySelector('#goal_period_title').innerText = selected.innerText;
                document.querySelector('#goal_success_title').innerText = selected.innerText;

               console.log(selected.innerText);
                document.querySelector(`#goal_value_img`).src = `{{url("img/icon/select_my_goal")}}` + '/' + selected.innerText.replace(/\s+/g, '') + '.png';
                document.querySelector(`#goal_success_img`).src = `{{url("img/icon/select_my_goal")}}` + '/' + selected.innerText.replace(/\s+/g, '') + '.png';
            }

            if (nextSectionId === 'section_select_period') {
                document.querySelector('#goal_period_value').innerText = selected.innerText;
                document.querySelector('#goal_success_value').innerText = selected.innerText;
            }

            if (nextSectionId === 'section_goal_success') {
                document.querySelector('#goal_success_period').innerText = selected.innerText;
            }
        });

    }

    setupDropdown("dropdown_goal", "btn_goal_next", "section_select_value", "goal_value_title", "goal_value_img");
    setupDropdown("dropdown_value", "btn_value_next", "section_select_period", "goal_period_title", null, "goal_period_value");
    setupDropdown("dropdown_period", "btn_period_next", "section_goal_success", "goal_success_title", "goal_success_img", "goal_success_value", "goal_success_period");


    function setupBackButton(backButtonId, currentSectionId, previousSectionId) {
        let backButton = document.querySelector(`#${backButtonId}`);
        backButton.addEventListener("click", () => {
            let currentSection = document.querySelector(`#${currentSectionId}`);
            let previousSection = document.querySelector(`#${previousSectionId}`);
            currentSection.classList.add('d-none');
            previousSection.classList.remove('d-none');
        });
    }

    // เรียกใช้ฟังก์ชันเพื่อตั้งค่าปุ่มย้อนกลับ
    setupBackButton("btn_value_back", "section_select_value", "section_select_goal");
    setupBackButton("btn_period_back", "section_select_period", "section_select_value");
    setupBackButton("btn_success_back", "section_goal_success", "section_select_period");


    // เรียกใช้งาน setupBackButton สำหรับแต่ละปุ่มย้อนกลับ
</script>
<script>
    function select_goal_success() {
        let successTitle = document.querySelector('#goal_success_title').innerText;
        let successValue = document.querySelector('#goal_success_value').innerText;
        let successPeriod = document.querySelector('#goal_success_period').innerText;

        alert(`เป้าหมาย: ${successTitle}\nมูลค่า: ${successValue}\nภายใน: ${successPeriod}`);

        $('#modal_my_goal').modal('hide');
    }
</script>
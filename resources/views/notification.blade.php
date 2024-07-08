<style>
    #modal_notification .modal-content {
        height: calc(100dvh - 180px);
        border-radius: 10px;
        border: 1px solid rgba(188, 188, 188, 0.00);

        background: #FFF;

        box-shadow: 0px 4px 40px 0px #C8C8C8;
    }

    #modal_notification .modal-header {
        position: relative;
        border: none !important;
    }

    #modal_notification .modal-title {
        color: #003781;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .btn-close-modal-notification {
        border: none !important;
        background-color: transparent !important;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translate(-50%, -50%);
    }

    .tabs-notification {
        display: flex;
        position: relative;
        background-color: rgba(242, 242, 250, 1);
        box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
        /* padding:  0 15px; */
        border-radius: 99px;
        width: 100%;
        max-width: 500px;
    }

    .tabs-notification * {
        z-index: 2;
    }

    .container-tap-notificarion input[type="radio"] {
        display: none;
    }

    .tab-item {
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
        font-weight: 600;
    }

    .container-tap-notificarion input[type="radio"]:checked+label {
        color: rgba(36, 50, 134, 1);
    }


    .container-tap-notificarion input[id="noti-radio-1"]:checked~.glider-notificaion {
        transform: translateX(0);
    }

    .container-tap-notificarion input[id="noti-radio-2"]:checked~.glider-notificaion {
        transform: translateX(100%);
    }

    .container-tap-notificarion input[id="noti-radio-3"]:checked~.glider-notificaion {
        transform: translateX(200%);
    }

    .container-tap-notificarion input[id="noti-radio-4"]:checked~.glider-notificaion {
        transform: translateX(300%);
    }

    .container-tap-notificarion input[id="noti-radio-5"]:checked~.glider-notificaion {
        transform: translateX(400%);
    }

    .glider-notificaion {
        position: absolute;
        display: flex;
        height: 38px;
        width: 20%;

        background: #FFF;
        box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.25);
        z-index: 1;
        border-radius: 99px;
        transition: 0.25s ease-out;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="modal_notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="exampleModalLongTitle">แจ้งเตือน</h5>
                <button type="button" class="close btn-close-modal-notification" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                        <path d="M15.5 0C6.9285 0 0 6.9285 0 15.5C0 24.0715 6.9285 31 15.5 31C24.0715 31 31 24.0715 31 15.5C31 6.9285 24.0715 0 15.5 0ZM22.165 22.165C22.0216 22.3087 21.8513 22.4227 21.6638 22.5005C21.4763 22.5782 21.2753 22.6183 21.0723 22.6183C20.8692 22.6183 20.6682 22.5782 20.4807 22.5005C20.2932 22.4227 20.1229 22.3087 19.9795 22.165L15.5 17.6855L11.0205 22.165C10.7307 22.4548 10.3376 22.6176 9.92775 22.6176C9.51789 22.6176 9.12481 22.4548 8.835 22.165C8.54518 21.8752 8.38237 21.4821 8.38237 21.0723C8.38237 20.8693 8.42234 20.6684 8.5 20.4809C8.57767 20.2934 8.6915 20.123 8.835 19.9795L13.3145 15.5L8.835 11.0205C8.54518 10.7307 8.38237 10.3376 8.38237 9.92775C8.38237 9.51789 8.54518 9.12481 8.835 8.835C9.12481 8.54518 9.51789 8.38237 9.92775 8.38237C10.3376 8.38237 10.7307 8.54518 11.0205 8.835L15.5 13.3145L19.9795 8.835C20.123 8.6915 20.2934 8.57767 20.4809 8.5C20.6684 8.42234 20.8693 8.38237 21.0723 8.38237C21.2752 8.38237 21.4761 8.42234 21.6636 8.5C21.8511 8.57767 22.0215 8.6915 22.165 8.835C22.3085 8.9785 22.4223 9.14886 22.5 9.33636C22.5777 9.52385 22.6176 9.72481 22.6176 9.92775C22.6176 10.1307 22.5777 10.3316 22.5 10.5191C22.4223 10.7066 22.3085 10.877 22.165 11.0205L17.6855 15.5L22.165 19.9795C22.754 20.5685 22.754 21.5605 22.165 22.165Z" fill="#003781" />
                    </svg>
                </button>
            </div>
            <div>

                <div class="container-tap-notificarion d-flex justify-content-center mb-2 mt-3 w-100">
                    <div class="tabs-notification">
                        <input type="radio" id="noti-radio-1" name="tabs_type_noti" value="ทั้งหมด" checked="" onclick="return create_logs('Notification_ทั้งหมด');change_view_noti('all');">
                        <label class="tab-item" for="noti-radio-1">
                            ทั้งหมด
                        </label>
                        <input type="radio" id="noti-radio-2" name="tabs_type_noti" value="เฉพาะคุณ" onclick="return create_logs('Notification_เฉพาะคุณ');change_view_noti('เฉพาะคุณ');">
                        <label class="tab-item" for="noti-radio-2">
                            เฉพาะคุณ
                        </label>
                        <input type="radio" id="noti-radio-3" name="tabs_type_noti" value="อบรม,สอบ" onclick="return create_logs('Notification_อบรม,สอบ');change_view_noti('อบรม,สอบ');">
                        <label class="tab-item" for="noti-radio-3">
                            อบรม,สอบ
                        </label>
                        <input type="radio" id="noti-radio-4" name="tabs_type_noti" value="บริษัท" onclick="return create_logs('Notification_บริษัท');change_view_noti('บริษัท');">
                        <label class="tab-item" for="noti-radio-4">
                            บริษัท
                        </label>
                        <input type="radio" id="noti-radio-5" name="tabs_type_noti" value="ข่าวสาร" onclick="return create_logs('Notification_ข่าวสาร');change_view_noti('ข่าวสาร');">
                        <label class="tab-item" for="noti-radio-5">
                            ข่าวสาร
                        </label>
                        <span class="glider-notificaion"></span>
                    </div>
                </div>

                <script>
                    function change_view_noti(type){

                        let card_all = document.querySelectorAll('.notification-alert');
                            card_all.forEach(card_all => {
                                card_all.classList.add('d-none');
                            })

                        if(type == 'all'){
                            let item_all = document.querySelectorAll('.notification-alert');
                            item_all.forEach(item_all => {
                                item_all.classList.remove('d-none');
                            })
                        }
                        else{
                            let item = document.querySelectorAll('[type="'+type+'"]');
                            item.forEach(item => {
                                item.classList.remove('d-none');
                            })
                        }

                    }
                </script>

            </div>
            <div class="modal-body">

                <style>
                    .notification-alert {
                        padding: 11px 12px;
                        display: flex;
                        width: 100%;
                        border-radius: 10px;
                        background: #FFF;
                        align-items: center;
                        box-shadow: 0px 2px 40px 0px rgba(200, 200, 200, 0.50);
                        margin-bottom: 10px;
                    }



                    @media only screen and (max-width: 600px) {
                        .notification-alert img {
                            max-width: 108.311px;
                            width: 100%;
                            max-height: 86px;
                            object-fit: cover;
                            border-radius: 5px;
                        }

                        .noti-title {
                            color: #0E2B81;
                            font-size: 10px;
                            font-style: normal;
                            font-weight: 600;
                            line-height: normal;
                            margin-bottom: 0;
                        }

                        .noti-detail {
                            color: #373737;
                            font-size: 8px;
                            font-style: normal;
                            font-weight: 400;
                            margin-bottom: 0;
                            line-height: normal;
                            -webkit-line-clamp: 3;
                            /* autoprefixer: ignore next */
                            -webkit-box-orient: vertical;
                            display: -webkit-box;
                            overflow: hidden;
                            word-break: break-word;
                        }
                    }

                    @media only screen and (min-width: 600px) {
                        .notification-alert img {
                            max-width: 130.294px;
                            width: 100%;
                            max-height: 103.455px;
                            object-fit: cover;
                            border-radius: 5px;
                        }

                        .noti-title {
                            color: #0E2B81;
                            font-size: 15px;
                            font-style: normal;
                            font-weight: 600;
                            line-height: normal;
                            margin-bottom: 0;
                        }

                        .noti-detail {
                            color: #373737;
                            font-size: 13px;
                            font-style: normal;
                            font-weight: 400;
                            margin-bottom: 0;
                            line-height: normal;
                            -webkit-line-clamp: 3;
                            /* autoprefixer: ignore next */
                            -webkit-box-orient: vertical;
                            display: -webkit-box;
                            overflow: hidden;
                            word-break: break-word;
                        }

                        #modal_notification .modal-content {
                            padding-left: 15px;
                            padding-right: 15px;
                        }
                    }

                    #modal_notification .modal-body {
                        height: 100% !important;
                        overflow-x: auto;
                        scroll-padding: 50px 0px 0px 50px;
                    }

                  
                    #modal_notification .modal-body::-webkit-scrollbar-track
                    {
                    	border-radius: 10px;
                    	background-color: #F5F5F5;
                    }

                    #modal_notification .modal-body::-webkit-scrollbar
                    {
                    	width: 8px;
                    	background-color: #F5F5F5;
                    }

                    #modal_notification .modal-body::-webkit-scrollbar-thumb
                    {
                    	border-radius: 10px;
                    	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                    	background-color: #003781;
                    }

                    #content-notification {
                        height: 100% !important;
                    }
                </style>
                <div id="content_notification">
                    <!-- content_notification -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        gat_data_of_notification();
    });

    function gat_data_of_notification(){

        fetch("{{ url('/') }}/api/gat_data_of_notification/" + "{{ Auth::user()->id }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result.length != 0){
                    document.querySelector('#alert_count_notification').classList.remove('d-none');

                    let content_notification = document.querySelector('#content_notification');
                        content_notification.innerHTML = '';

                    for (let i = 0; i < result.length; i++) {
                        
                        let html = ``;

                        if(result[i].type == "เฉพาะคุณ"){
                            if(result[i].sub_type == "วันเกิด"){
                                html = `
                                    <div type="`+result[i].type+`" class="notification-alert">
                                        <img src="{{url('img/icon/noti_birthday.png')}}" alt="">
                                        <div class="d-block px-3">
                                            <p class="noti-title">สุขสันต์วันเกิด คุณ`+result[i].name+` 🎉</p>
                                            <p class="noti-detail mt-2">สุขสันต์วันครบรอบวันคล้ายวันเกิดของคุณ เราขอให้คุณสุขภาพแข็งแรง มีความสุขในชีวิต และประสบความสำเร็จตามเป้าหมายที่วางไว้</p>
                                        </div>
                                    </div>
                                `;
                            }
                            else if(result[i].sub_type == "บัตรหมดอายุ"){

                                let formattedDate_expire = ``;
                                if(result[i].license_expire){
                                    let license_expire = result[i].license_expire;
                                    let parts = license_expire.split("-");
                                    formattedDate_expire = parts[2] + "/" + parts[1] + "/" + parts[0];
                                }

                                html = `
                                    <div type="`+result[i].type+`" class="notification-alert">
                                        <img src="{{url('img/icon/noti_license_expire.png')}}" alt="">
                                        <div class="d-block px-3">
                                            <p class="noti-title">เเจ้งเตือนบัตรตัวเเทนหมดอายุ !</p>
                                            <p class="noti-detail mt-2">ใบอนุญาติขายประกันของคุณจะหมดอายุในวันที่ `+formattedDate_expire+` กรุณาติดต่อเจ้าหน้าที่เพื่อดำเนินการต่ออายุใบอนุญาติขายประกันของคุณ</p>
                                        </div>
                                    </div>
                                `;
                            }
                            else if(result[i].sub_type == "แจ้งเตือนเป้าหมาย"){
                                let days_difference = result[i].days_difference;
                                let months_difference = Math.floor(days_difference / 30);

                                html = `
                                    <div type="`+result[i].type+`" class="notification-alert">
                                        <img src="{{url('img/icon/select_my_goal/`+result[i].goal+`.png')}}" alt="" style="width: 100%; height: auto; object-fit: contain;">
                                        <div class="d-block px-3">
                                            <p class="noti-title">เป้าหมายของ คุณ{{ Auth::user()->name }} 🎉</p>
                                            <p class="noti-detail mt-2">
                                                เป้าหมายของคุณคือ “อยาก`+result[i].goal+`” มูลค่า `+result[i].price+` บาท ภายใน `+result[i].period+` คุณเหลือเวลาบรรลุเป้าหมายอีกประมาณ `+months_difference+` เดือน สู้ๆนะ
                                                </p>
                                        </div>
                                    </div>
                                `;
                            }
                        }
                        else if(result[i].type == "อบรม,สอบ"){

                            let all_day = result[i].all_day;
                            let date_start = result[i].date_start;
                            let time_start = result[i].time_start;
                            let date_end = result[i].date_end;
                            let time_end = result[i].time_end;
                            let text_date_start = create_text_date_start(all_day, date_start, time_start, date_end, time_end) ;

                            let textWithoutHtml = ``;
                            if(result[i].location_detail){
                                textWithoutHtml = result[i].location_detail.replace(/(<([^>]+)>)/gi, "");
                            }

                            html = `
                            <a href="{{ url('/show_appointment_train') }}/`+result[i].id+`" type="`+result[i].type+`">
                                <div class="notification-alert">
                                    <img src="`+result[i].photo+`" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                    <div class="d-block px-3">
                                        <p class="noti-title">`+result[i].title+`</p>
                                        <p class="noti-detail mt-2">
                                            <i class="fa-sharp fa-regular fa-location-dot"></i> `+text_date_start+`
                                        </p>
                                        <p class="noti-detail">
                                            `+textWithoutHtml+`
                                        </p>
                                    </div>
                                </div>
                            </a>
                            `;
                        }
                        else if(result[i].type == "ข่าวสาร" || result[i].type == "บริษัท"){
                            let textWithoutHtml = ``;
                            if(result[i].detail){
                                textWithoutHtml = result[i].detail.replace(/(<([^>]+)>)/gi, "");
                            }
                            let url = ``;
                            if(result[i].type == "ข่าวสาร"){
                                url = `{{ url('/news_show') }}/`+result[i].id;
                            }
                            else if(result[i].type == "บริษัท"){
                                url = `{{ url('/activitys_show') }}/`+result[i].id;
                            }

                            html = `
                            <a href="`+url+`" type="`+result[i].type+`">
                                <div class="notification-alert">
                                    <img src="`+result[i].photo+`" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                    <div class="d-block px-3">
                                        <p class="noti-title">`+result[i].title+`</p>
                                        <p class="noti-detail mt-2">
                                            `+textWithoutHtml+`
                                        </p>
                                    </div>
                                </div>
                            </a>
                            `;
                        }

                        content_notification.insertAdjacentHTML('beforeend', html);

                    }

                }
                else{
                    document.querySelector('#alert_count_notification').classList.add('d-none');
                }
                
            });

    }

    function create_text_date_start(all_day, date_start, time_start, date_end, time_end){

        // Friday 19 April 2024 10:30 น. - Friday 19 April 2024 12:30 น.
        let text_date_start = '';

        if (all_day === 'Yes') {
            // Case 1: all_day = Yes
            let formattedDate = formatDate_for_appointment(date_start);
            text_date_start = formattedDate;
        } else if (!all_day && date_start === date_end) {
            // Case 2: all_day = null and date_start equals date_end
            let formattedDate = formatDate_for_appointment(date_start);
            let formattedTime = formatTime_for_appointment(time_start) + ' - ' + formatTime_for_appointment(time_end);
            text_date_start = formattedDate + ' ' + formattedTime;
        } else if (!all_day && date_start !== date_end) {
            // Case 3: all_day = null and date_start not equals date_end
            let formattedStartDate = formatDate_for_appointment(date_start);
            let formattedEndDate = formatDate_for_appointment(date_end);
            let formattedStartTime = formatTime_for_appointment(time_start);
            let formattedEndTime = formatTime_for_appointment(time_end);
            text_date_start = `${formattedStartDate} ${formattedStartTime} - ${formattedEndDate} ${formattedEndTime}`;
        }

        return text_date_start;

    }

    function formatDate_for_appointment(dateString) {
        let date = new Date(dateString);
        let options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    function formatTime_for_appointment(timeString) {
        // Assuming timeString is in HH:mm format
        let [hours, minutes] = timeString.split(':');
        let period = hours >= 12 ? 'น.' : 'น.';
        hours = hours % 12 || 12; // Convert hours to 12-hour format
        return `${hours}:${minutes} ${period}`;
    }
</script>
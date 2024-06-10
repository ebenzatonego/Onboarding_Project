@extends('layouts.theme_user')
@section('content')
<style>
    .carousel-fav-product .item {
        height: 311px;
        min-width: 311px;
        color: #fff;

    }

    .carousel-fav-product .item img {
        width: 100%;
        height: 100%;
        object-fit: contain;

    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #003781;
    }
</style>
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="mt-2">
                <a href="" class="d-flex align-items-center" style="color: #003781; font-size: 18px; font-weight: bolder;">
                    <i class="fa-regular fa-chevron-left me-3"></i> <span class="mt-1">กลับหน้ารวมหลักสูตร/อมรม/สอบ</span>
                </a>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="owl-carousel carousel-fav-product owl-theme">
                    <div class="item">
                        <img src="{{ url('/img/icon/ad3.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('/img/icon/ad3.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('/img/icon/ad3.png') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">

                <style>
                    .carousel-menu-product .item {
                        width: 75px;
                        display: flex;
                        justify-content: center;
                    }

                    .icon-menu-product {
                        width: 63px;
                        height: 63px;
                        /* background-color: #B0C0D5; */
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

                    .menu-product p {
                        color: #B0C0D5;
                    }



                    /* .menu-product.active .icon-menu-product {
                        background-color: #003781;
                    } */

                    .carousel-menu-product {
                        display: flex !important;
                        /* To override display:block I added !important */
                        flex-direction: row;
                        justify-content: center;
                        /* To center the carousel */
                    }

                    .main .icon-menu-product {
                        background-color: #243286;
                    }

                    .yellow .icon-menu-product {
                        background-color: #FFC657;

                    }

                    .pink .icon-menu-product {
                        background-color: #FDA098;

                    }

                    .green .icon-menu-product {
                        background-color: #A8D29F;

                    }

                    .blue .icon-menu-product {
                        background-color: #AEC3FF;

                    }

                    .menu-product.main.active p {
                        color: #003781;
                    }

                    .menu-product.yellow.active p {
                        color: #FFC657;
                    }

                    .menu-product.pink.active p {
                        color: #FDA098;
                    }

                    .menu-product.green.active p {
                        color: #A8D29F;
                    }

                    .menu-product.blue.active p {
                        color: #AEC3FF;
                    }
                </style>
                <div class="owl-carousel carousel-menu-product owl-theme">
                    <div class="item ">
                        <div class="menu-product text-center main active">
                            <div class="icon-menu-product">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5978 31C18.7376 31 18.0013 30.6932 17.3891 30.0797C16.7755 29.4674 16.4688 28.7312 16.4688 27.8709V19.5978C16.4688 18.7376 16.7755 18.0013 17.3891 17.3891C18.0026 16.7768 18.7389 16.47 19.5978 16.4688H27.8709C28.7312 16.4688 29.4674 16.7755 30.0797 17.3891C30.6932 18.0013 31 18.7376 31 19.5978V27.8709C31 28.7312 30.6932 29.4674 30.0797 30.0797C29.4674 30.6932 28.7312 31 27.8709 31H19.5978ZM19.5978 14.5312C18.7376 14.5312 18.0013 14.2245 17.3891 13.6109C16.7768 12.9974 16.47 12.2611 16.4688 11.4022V3.12906C16.4688 2.26881 16.7755 1.53256 17.3891 0.920312C18.0013 0.306771 18.7376 0 19.5978 0H27.8709C28.7312 0 29.4674 0.306771 30.0797 0.920312C30.6932 1.53256 31 2.26881 31 3.12906V11.4022C31 12.2624 30.6932 12.9987 30.0797 13.6109C29.4674 14.2245 28.7312 14.5312 27.8709 14.5312H19.5978ZM3.12906 14.5312C2.26881 14.5312 1.53256 14.2245 0.920312 13.6109C0.306771 12.9987 0 12.2624 0 11.4022V3.12906C0 2.26881 0.306771 1.53256 0.920312 0.920312C1.53256 0.306771 2.26881 0 3.12906 0H11.4022C12.2624 0 12.9987 0.306771 13.6109 0.920312C14.2245 1.53256 14.5312 2.26881 14.5312 3.12906V11.4022C14.5312 12.2624 14.2245 12.9987 13.6109 13.6109C12.9974 14.2232 12.2611 14.53 11.4022 14.5312H3.12906ZM3.12906 31C2.26881 31 1.53256 30.6932 0.920312 30.0797C0.306771 29.4674 0 28.7312 0 27.8709V19.5978C0 18.7376 0.306771 18.0013 0.920312 17.3891C1.53256 16.7755 2.26881 16.4688 3.12906 16.4688H11.4022C12.2624 16.4688 12.9987 16.7755 13.6109 17.3891C14.2232 18.0026 14.53 18.7389 14.5312 19.5978V27.8709C14.5312 28.7312 14.2245 29.4674 13.6109 30.0797C12.9987 30.6932 12.2624 31 11.4022 31H3.12906Z" fill="#EBF1FD" />
                                </svg>
                            </div>
                            <p class="mb-0 mt-2">หลักสูตร</p>
                            <p class="mb-0">ทั้งหมด</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="menu-product text-center yellow ">
                            <div class="icon-menu-product ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="29" viewBox="0 0 34 29" fill="none">
                                    <path d="M31.0743 24.8496L32.0321 29H22.9331L22.1882 25.6477C21.9753 24.7964 21.4964 24.0514 20.8047 23.5725C21.0707 23.2533 21.39 23.0404 21.7625 22.8276L22.3478 22.5615C23.1992 23.4129 24.3166 23.945 25.6469 23.945C26.9239 23.945 28.0945 23.4129 28.9459 22.5615L29.5312 22.8276C30.2762 23.2001 30.8615 23.8918 31.0743 24.8496Z" fill="white" />
                                    <path d="M14.0474 24.3174L13.941 24.3706C13.3024 24.6899 12.8768 25.222 12.7171 25.9137L12.0254 28.9999H21.5501L20.8584 25.9137C20.6987 25.222 20.273 24.6899 19.6345 24.3706L19.5281 24.3174C18.8364 25.0623 17.8786 25.5412 16.7611 25.5412C15.6969 25.5412 14.7391 25.0623 14.0474 24.3174Z" fill="white" />
                                    <path d="M28.8394 19.3152C28.8394 17.506 27.4027 16.0693 25.5935 16.0693C23.7843 16.0693 22.3477 17.506 22.3477 19.3152C22.3477 21.1243 23.7843 22.561 25.5935 22.561C27.4027 22.561 28.8394 21.1243 28.8394 19.3152Z" fill="white" />
                                    <path d="M16.8146 2.71387C9.63112 2.71387 3.35227 6.59824 0 12.3982C0.478896 12.1854 0.957791 12.0789 1.4899 12.0789C2.9798 12.0789 4.25685 12.9303 4.89538 14.2074C5.05501 14.5266 5.53391 14.5266 5.69354 14.2074C6.33206 12.9835 7.60912 12.0789 9.09902 12.0789C10.5889 12.0789 11.866 12.9303 12.5045 14.2074C12.6641 14.5266 13.143 14.5266 13.3027 14.2074C13.9412 12.9835 15.2182 12.0789 16.7081 12.0789C18.198 12.0789 19.4751 12.9303 20.1136 14.2074C20.2732 14.5266 20.7521 14.5266 20.9118 14.2074C21.5503 12.9835 22.8274 12.0789 24.3173 12.0789C25.8072 12.0789 27.0842 12.9303 27.7227 14.2074C27.8824 14.5266 28.3613 14.5266 28.5209 14.2074C29.1594 12.9835 30.4365 12.0789 31.9264 12.0789C32.4585 12.0789 32.9374 12.1854 33.4163 12.3982C30.2236 6.59824 23.998 2.71387 16.8146 2.71387Z" fill="white" />
                                    <path d="M17.8247 1.38348V1.011C17.8247 0.478896 17.3458 0 16.8137 0C16.2816 0 15.8027 0.478896 15.8027 1.011V1.38348C16.122 1.38348 16.4945 1.38348 16.8137 1.38348C17.133 1.38348 17.4523 1.38348 17.8247 1.38348Z" fill="white" />
                                    <path d="M17.8247 18.1977V13.6748C17.5055 13.5151 17.1862 13.4619 16.8137 13.4619C16.4413 13.4619 16.122 13.5151 15.8027 13.6748V18.1977C16.122 18.0912 16.4413 18.038 16.8137 18.038C17.1862 18.038 17.5055 18.0912 17.8247 18.1977Z" fill="white" />
                                    <path d="M11.2827 19.3152C11.2827 17.506 9.84603 16.0693 8.03686 16.0693C6.2277 16.0693 4.79102 17.506 4.79102 19.3152C4.79102 21.1243 6.2277 22.561 8.03686 22.561C9.79281 22.561 11.2827 21.1243 11.2827 19.3152Z" fill="white" />
                                    <path d="M4.15177 22.7744C3.3004 23.2 2.71508 23.8918 2.50224 24.7964L1.59766 29H10.6967L11.4416 25.6477C11.6545 24.7964 12.1334 24.0514 12.8251 23.5725C12.559 23.2533 12.2398 23.0404 11.8673 22.8276L11.282 22.5615C10.4306 23.4129 9.3132 23.945 7.98293 23.945C6.70588 23.945 5.53524 23.4129 4.68387 22.5615L4.15177 22.7744Z" fill="white" />
                                    <path d="M16.8149 24.2635C18.1667 24.2635 19.2626 23.1677 19.2626 21.8159C19.2626 20.464 18.1667 19.3682 16.8149 19.3682C15.4631 19.3682 14.3672 20.464 14.3672 21.8159C14.3672 23.1677 15.4631 24.2635 16.8149 24.2635Z" fill="white" />
                                </svg>
                            </div>

                            <p class="mb-0 mt-2">เตรียมให้</p>
                            <p class="mb-0">คนข้างหลัง</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="menu-product text-center pink">
                            <div class="icon-menu-product">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="31" viewBox="0 0 32 31" fill="none">
                                    <path d="M22.9958 11.0739H17.7406C16.1339 11.1764 14.1255 10.6637 14.2259 12.5094V16.0981C16.8368 17.7387 18.1423 18.559 18.1423 18.559C18.6109 18.8324 18.7782 19.14 18.7448 19.8578V19.892V24.2326C18.8452 26.1808 15.6318 26.2492 15.6653 24.2326V21.43C15.6653 20.0628 14.9289 19.8236 13.7573 19.14C12.0837 18.2172 11.2469 17.7387 11.2469 17.7387V27.0695C11.1464 27.9239 10.4435 28.5391 9.60669 28.5391C8.76987 28.5391 8.06695 27.8897 7.96653 27.0695V11.9283L2.94561 16.9526C2.27615 17.6362 1.17155 17.6362 0.502092 16.9526C-0.167364 16.269 -0.167364 15.1411 0.502092 14.4576C2.04184 12.8853 3.68201 11.2448 5.22176 9.60419C7.16318 7.48512 7.53138 7.55347 8.80335 7.55347H23.0293C23.9665 7.55347 24.7699 8.33958 24.7699 9.33076C24.7699 10.3219 23.9665 11.0739 22.9958 11.0739ZM21.7908 29.0176H15.7992C15.2636 29.0176 14.8285 29.462 14.8285 30.0088C14.8285 30.5557 15.2636 31 15.7992 31H21.7908C22.3264 31 22.7615 30.5557 22.7615 30.0088C22.7615 29.462 22.3264 29.0176 21.7908 29.0176ZM11.2134 6.32304C12.9205 6.32304 14.2929 4.92172 14.2929 3.17861C14.2929 1.4355 12.9205 0 11.2134 0C9.50628 0 8.13389 1.40132 8.13389 3.14443C8.13389 4.88754 9.50628 6.32304 11.2134 6.32304ZM12.954 29.0176H6.96234C6.42678 29.0176 5.99163 29.462 5.99163 30.0088C5.99163 30.5557 6.42678 31 6.96234 31H12.954C13.4895 31 13.9247 30.5557 13.9247 30.0088C13.9247 29.462 13.4895 29.0176 12.954 29.0176ZM20.7531 25.7023C20.9874 25.7023 21.1548 25.5314 21.1548 25.2922V14.5943C21.1548 13.2613 20.0837 12.1676 18.7782 12.1676C17.4728 12.1676 16.4017 13.2613 16.4017 14.5943C16.4017 14.8335 16.569 15.0044 16.8033 15.0044C17.0377 15.0044 17.205 14.8335 17.205 14.5943C17.205 14.1499 17.3724 13.774 17.6736 13.4664C18.6778 12.441 20.3515 13.1929 20.3515 14.5943V25.2922C20.3515 25.5314 20.5188 25.7023 20.7531 25.7023ZM14.7615 27.1378C14.7615 27.6847 15.1967 28.129 15.7322 28.129H21.7239C22.2594 28.129 22.6946 27.6847 22.6946 27.1378C22.6946 26.591 22.2594 26.1466 21.7239 26.1466H15.7322C15.1967 26.1466 14.7615 26.591 14.7615 27.1378ZM30.6276 29.0176H24.636C24.1004 29.0176 23.6653 29.462 23.6653 30.0088C23.6653 30.5557 24.1004 31 24.636 31H30.6276C31.1632 31 31.5983 30.5557 31.5983 30.0088C31.5983 29.462 31.1632 29.0176 30.6276 29.0176ZM30.6276 26.1466H24.636C24.1004 26.1466 23.6653 26.591 23.6653 27.1378C23.6653 27.6847 24.1004 28.129 24.636 28.129H30.6276C31.1632 28.129 31.5983 27.6847 31.5983 27.1378C31.5983 26.591 31.1632 26.1466 30.6276 26.1466ZM24.569 25.2238H30.5607C31.0962 25.2238 31.5314 24.7795 31.5314 24.2326C31.5314 23.6858 31.0962 23.2415 30.5607 23.2415H24.569C24.0335 23.2415 23.5983 23.6858 23.5983 24.2326C23.5983 24.7795 24.0335 25.2238 24.569 25.2238ZM23.1632 18.1488C23.1632 15.6538 25.1381 13.6373 27.5816 13.6373C30.0251 13.6373 32 15.6538 32 18.1488C32 20.6439 30.0251 22.6604 27.5816 22.6604C25.1381 22.6604 23.1632 20.6439 23.1632 18.1488ZM25.9749 17.0551C25.9749 18.0121 26.5439 18.2172 27.3138 18.3881V20.097C26.9791 19.9945 26.6444 19.8578 26.5105 19.4818C26.41 19.14 25.908 19.3109 26.0084 19.6527C26.1757 20.1654 26.6778 20.5072 27.1799 20.6097L27.2803 20.6439V21.3275C27.2803 21.6692 27.7824 21.6692 27.7824 21.3275V20.6439C28.1172 20.5755 28.3515 20.5072 28.6527 20.2679C28.954 20.0287 29.1548 19.6869 29.1548 19.2767C29.1548 18.3197 28.5858 18.1147 27.8159 17.9438V16.2348C27.9833 16.3032 28.1172 16.3374 28.251 16.4057C28.4184 16.5083 28.5523 16.6792 28.6192 16.8842C28.7197 17.226 29.2218 17.0551 29.1213 16.7475C28.954 16.1323 28.3849 15.8589 27.8159 15.7222V15.0386C27.8159 14.6968 27.3138 14.6968 27.3138 15.0386V15.7222C26.9791 15.7905 26.7448 15.8589 26.4435 16.0981C26.1423 16.3032 25.9749 16.6792 25.9749 17.0551ZM27.3138 17.8412V16.2348L27.113 16.3032C26.7782 16.4057 26.477 16.6792 26.477 17.0551C26.477 17.602 26.9121 17.7387 27.3138 17.8412ZM28.6527 19.2767C28.6527 18.7299 28.2176 18.6273 27.8159 18.4906V20.097C28.2176 19.9603 28.6527 19.7552 28.6527 19.2767Z" fill="white" />
                                </svg>
                            </div>
                            <p class="mb-0 mt-2">เตรียม</p>
                            <p class="mb-0">เกษียณ</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="menu-product text-center green">
                            <div class="icon-menu-product">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none">
                                    <path d="M17.5626 0H10.76C8.504 0 6.69922 1.83949 6.69922 4.06076H9.09403C9.09403 3.12366 9.85759 2.39481 10.76 2.39481H17.5626C18.4997 2.39481 19.2286 3.15837 19.2286 4.06076H21.6234C21.6234 1.83949 19.8186 0 17.5626 0Z" fill="white" />
                                    <path d="M27.0718 4.79004H1.21476C0.555318 4.79004 0 5.34536 0 6.0048V26.1004C0 26.7598 0.555318 27.3151 1.21476 27.3151H27.0718C27.7312 27.3151 28.2865 26.7598 28.2865 26.1004V6.0048C28.2865 5.31065 27.7659 4.79004 27.0718 4.79004ZM21.3797 17.6665C21.3797 18.0483 21.0674 18.3606 20.6856 18.3606H16.6248V22.4214C16.6248 22.8032 16.3125 23.1155 15.9307 23.1155H12.5641C12.1823 23.1155 11.8699 22.8032 11.8699 22.4214V18.3606H7.80916C7.42738 18.3606 7.11501 18.0483 7.11501 17.6665V14.2999C7.11501 13.9181 7.42738 13.6057 7.80916 13.6057H11.8699V9.54495C11.8699 9.16317 12.1823 8.8508 12.5641 8.8508H15.9307C16.3125 8.8508 16.6248 9.16317 16.6248 9.54495V13.6057H20.6856C21.0674 13.6057 21.3797 13.9181 21.3797 14.2999V17.6665Z" fill="white" />
                                </svg>
                            </div>

                            <p class="mb-0 mt-2">เตรียมด้าน</p>
                            <p class="mb-0">สุขภาพ</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="menu-product text-center blue ">
                            <div class="icon-menu-product">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="29" viewBox="0 0 30 29" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M30 21.777V25.8855C30 27.6084 26.8657 29 22.9957 29C19.1258 29 15.9915 27.6084 15.9915 25.8855V21.777C16.0235 21.8102 16.0874 21.8764 16.1514 21.9096C17.4307 23.0029 20.0213 23.8313 22.9957 23.8313C25.9701 23.8313 28.5608 23.0029 29.8401 21.9096C29.9041 21.8764 29.936 21.8433 30 21.777ZM14.0085 21.777V25.8855C14.0085 27.6084 10.8742 29 7.00426 29C3.13433 29 0 27.6084 0 25.8855V21.777C0.0319829 21.8102 0.0959488 21.8764 0.159915 21.9096C1.43923 23.0029 4.02985 23.8313 7.00426 23.8313C9.97868 23.8313 12.5693 23.0029 13.8486 21.9096C13.9126 21.8764 13.9446 21.8102 14.0085 21.777ZM24.9787 16.7077C27.8571 17.1053 29.968 18.2649 29.968 19.6897C29.968 21.4126 26.8337 22.8041 22.9638 22.8041C19.0938 22.8041 15.9915 21.4126 15.9915 19.6897C15.9915 18.2981 18.1023 17.1053 20.9808 16.7077V18.6625C20.9808 19.7891 21.8763 20.7168 22.9638 20.7168C24.0512 20.7168 24.9467 19.7891 24.9467 18.6625V16.7077H24.9787ZM14.0085 15.5812V19.6897C14.0085 21.4126 10.8742 22.8041 7.00426 22.8041C3.13433 22.8041 0 21.4126 0 19.6897V15.5812C0.0319829 15.6143 0.0959488 15.6806 0.159915 15.7137C1.43923 16.8071 4.02985 17.6354 7.00426 17.6354C9.97868 17.6354 12.5693 16.8071 13.8486 15.7137C13.9126 15.6474 13.9446 15.6143 14.0085 15.5812ZM22.0043 11.4064C21.1727 11.4396 20.1493 11.3402 19.2537 10.7769C18.0704 10.0149 17.3987 8.62327 17.0789 7.66242C16.9829 7.36422 17.0149 7.06602 17.1429 6.80096C17.3028 6.5359 17.5586 6.37023 17.8465 6.30397C18.774 6.17144 20.1493 6.1383 21.3006 6.86723C22.1002 7.36422 22.6439 8.15941 23.0277 8.92147C23.4115 8.15941 23.9872 7.36422 24.7548 6.86723C25.9062 6.1383 27.2495 6.17144 28.209 6.30397C28.4968 6.3371 28.7527 6.5359 28.9126 6.80096C29.0725 7.06602 29.1045 7.36422 28.9765 7.66242C28.6247 8.62327 27.9531 10.0149 26.8017 10.7769C25.9062 11.3402 24.8827 11.4727 24.0512 11.4064V18.6625C24.0512 19.2258 23.6034 19.6897 23.0597 19.6897C22.516 19.6897 22.0682 19.2258 22.0682 18.6625L22.0043 11.4064ZM8.98721 10.4787C11.8657 10.8763 13.9765 12.036 13.9765 13.4607C13.9765 15.1836 10.8422 16.5752 6.97228 16.5752C3.10234 16.5752 0 15.1836 0 13.4607C0 12.0691 2.11087 10.8763 4.98934 10.4787V12.4336C4.98934 13.5601 5.88486 14.4878 6.97228 14.4878C8.0597 14.4878 8.95522 13.5601 8.95522 12.4336V10.4787H8.98721ZM6.01279 5.17745C5.18124 5.21058 4.15778 5.11118 3.26226 4.54792C2.07889 3.78587 1.40725 2.39429 1.08742 1.43343C0.959488 1.13524 0.991471 0.83704 1.1194 0.571977C1.27932 0.306914 1.53518 0.14125 1.82303 0.0749838C2.75053 -0.0575478 4.1258 -0.0906807 5.27718 0.638243C6.07676 1.13524 6.62047 1.93043 7.00426 2.69248C7.38806 1.93043 7.96375 1.13524 8.73134 0.638243C9.88273 -0.0906807 11.226 -0.0575478 12.1855 0.0749838C12.4733 0.108117 12.7292 0.306914 12.8891 0.571977C13.049 0.83704 13.081 1.13524 12.9531 1.43343C12.6013 2.39429 11.9296 3.78587 10.7783 4.54792C9.88273 5.11118 8.85927 5.24372 8.02772 5.17745V12.4336C8.02772 12.9968 7.57996 13.4607 7.03625 13.4607C6.49254 13.4607 6.04478 12.9968 6.04478 12.4336L6.01279 5.17745Z" fill="white" />
                                </svg>
                            </div>
                            <p class="mb-0 mt-2">เตรียมอื่นๆ</p>
                            <p class="mb-0">ลงทุน/มรดก</p>
                        </div>
                    </div>

                </div>
                <style>
                    .product-item {
                        position: relative;
                        padding: 10px;
                        border-radius: 10px;
                        -webkit-border-radius: 10px;
                        -moz-border-radius: 10px;
                        -ms-border-radius: 10px;
                        -o-border-radius: 10px;
                        display: flex;
                        /* background-color: #fff; */
                        border: 0px solid rgba(0, 0, 0, 0);
                        box-shadow: 0 0 2rem 0 rgb(136 152 170 / 15%);
                        border-radius: 0.25rem;
                        margin-bottom: 1.5rem;


                    }

                    .product-item.yellow{
                        background-color:rgba(255, 191, 68, 0.3);
                    }
                    .product-item.pink{
                        background-color: rgba(253, 160, 152, 0.3);
                        
                    }
                    .product-item.green{
                        background-color: rgba(168, 210, 159, 0.3);
                        
                    }
                    .product-item.blue{
                        background-color: rgba(174, 195, 255, 0.3);
                        
                    }

                    @media (max-width: 770px) {
                        .product-item {
                            width: 100% !important;
                        }
                    }

                    @media (min-width: 770px) {
                        .container-product {
                            display: flex;
                            justify-content: space-between;
                            flex-wrap: wrap;
                            

                        }

                        .product-item {
                            width: 49% !important;
                            
                        }
                    }

                    .product-item img {
                        width: 100px;
                        height: 100px;
                        object-fit: cover;
                        border-radius: 10px;
                        -webkit-border-radius: 10px;
                        -moz-border-radius: 10px;
                        -ms-border-radius: 10px;
                        -o-border-radius: 10px;
                    }

                    .product-item .title-product {
                        font-size: 12;
                        color: #0E2B81;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        margin-bottom: 5px;
                    }

                    .product-item .detail-product {
                        font-size: 10;
                        color: #000;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        margin-bottom: 5px;

                    }

                    .category-product {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 5px;
                    }

                    .category-product span {
                        color: #0E2B81;
                        border: #0E2B81 1px solid;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        font-size: 9px;
                        padding: 2px 10px;
                    }

                    .container-product .product-item.bookmark .fav-product {
                        display: block !important;
                    }

                    .fav-product {
                        display: none;
                        position: absolute;
                        top: 0px;
                        right: 8px;
                    }
                </style>
                <p class="my-3" style="color: #0E2B81;font-size: 16px;">หลักสูตรทั้งหมด</p>
                <div class="container-product ">
                    <a href="" class="product-item yellow ">
                        <div class="position-relative">
                            <img src="{{ url('/img/icon/ad.png') }}">
                            <div class="fav-product">
                                <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600" />
                                    <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400" />
                                </svg>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="title-product">หลักสูตรฝึกอบรมการพัฒนาทักษะการเชิงกลยุทธ์ 505</p>
                            <p class="detail-product">การพัฒนาทักษะการสื่อสารและสร้างความสัมพันธ์ที่ดีกับลูกค้า ของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริก</p>
                            <div class="category-product">
                                <span>#หลักสูตรแนะนำ</span>
                                <span>#หลักสูตรแนะนำ</span>
                            </div>
                        </div>
                    </a>
                    <a href="" class="product-item bookmark pink">
                        <div class="position-relative">
                            <img src="{{ url('/img/icon/ad.png') }}">
                            <div class="fav-product">
                                <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600" />
                                    <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400" />
                                </svg>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="title-product">หลักสูตรฝึกอบรมการพัฒนาทักษะการเชิงกลยุทธ์ 505</p>
                            <p class="detail-product">การพัฒนาทักษะการสื่อสารและสร้างความสัมพันธ์ที่ดีกับลูกค้า ของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริก</p>
                            <div class="category-product">
                                <span>#หลักสูตรแนะนำ</span>
                                <span>#หลักสูตรแนะนำ</span>
                            </div>
                        </div>
                    </a>
                    <a href="" class="product-item bookmark green">
                        <div class="position-relative">
                            <img src="{{ url('/img/icon/ad.png') }}">
                            <div class="fav-product">
                                <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600" />
                                    <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400" />
                                </svg>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="title-product">หลักสูตรฝึกอบรมการพัฒนาทักษะการเชิงกลยุทธ์ 505</p>
                            <p class="detail-product">การพัฒนาทักษะการสื่อสารและสร้างความสัมพันธ์ที่ดีกับลูกค้า ของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริก</p>
                            <div class="category-product">
                                <span>#หลักสูตรแนะนำ</span>
                                <span>#หลักสูตรแนะนำ</span>
                            </div>
                        </div>
                    </a>
                    <a href="" class="product-item bookmark blue">
                        <div class="position-relative">
                            <img src="{{ url('/img/icon/ad.png') }}">
                            <div class="fav-product">
                                <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600" />
                                    <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400" />
                                </svg>
                            </div>
                        </div>
                        <div class="ms-3">
                            <p class="title-product">หลักสูตรฝึกอบรมการพัฒนาทักษะการเชิงกลยุทธ์ 505</p>
                            <p class="detail-product">การพัฒนาทักษะการสื่อสารและสร้างความสัมพันธ์ที่ดีกับลูกค้า ของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริกของพนักงานขายสินค้าและบริก</p>
                            <div class="category-product">
                                <span>#หลักสูตรแนะนำ</span>
                                <span>#หลักสูตรแนะนำ</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
<script>
    $('.carousel-menu-product').owlCarousel({
        // stagePadding:20,
        loop: false,
        autoWidth: true,

        nav: false,
        dots: false,
        responsive: {
            0: {
                margin: 20,
                items: 6
            },
            600: {
                margin: 20,
                items: 3
            },
            1000: {
                margin: 40,
                items: 1
            }
        }
    })

    $('.carousel-fav-product').owlCarousel({
        // stagePadding:20,
        loop: false,
        autoWidth: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 1
            }
        }
    })
</script>
@endsection
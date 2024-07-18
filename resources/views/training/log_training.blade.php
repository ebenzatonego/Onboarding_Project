@extends('layouts.theme_admin')
@section('content')
<style>
    /* instagram*/
    .logsLine {
        color: #00b900 !important;
        transition-duration: .3s;
    }

    /* twitter*/
    .logsFacebook {
        color: #1877F2 !important;
        transition-duration: .3s;
    }

    /* linkdin*/
    .logsTwitter {
        color: #000 !important;
        transition-duration: .3s;
    }

    /* Whatsapp*/
    .logsWhatsapp {
        color: #25D366 !important;
        transition-duration: .3s;
    }
    /* Whatsapp*/
    .logsCopy {
        color: #31d2f2 !important;
        transition-duration: .3s;
    }

    .logsLine.active {
        background-color: #00b900 !important;
        color: #fff !important;
        transition-duration: .3s;
    }

    /* twitter*/
    .logsFacebook.active {
        background-color: #1877F2 !important;
        color: #fff !important;

        transition-duration: .3s;
    }

    /* linkdin*/
    .logsTwitter.active {
        background-color: #000 !important;
        color: #fff !important;

        transition-duration: .3s;
    }

    /* Whatsapp*/
    .logsWhatsapp.active {
        background-color: #25D366 !important;
        color: #fff !important;

        transition-duration: .3s;
    }
    .logsCopy.active {
        background-color: #31d2f2 !important;
        color: #fff !important;

        transition-duration: .3s;
    }
</style>
<div class="row">
    <div class="col-md-3">
        <img src="{{ $training->photo }}" alt="" style="width: 100%;">
    </div>
    <div class="col-md-9 pt-3">
        <h4 class="card-title">{{ $training->title }}</h4>
        <dt class="text-info">#{{ $training->type_article }}</dt>

        <p class="card-text fs-6 mt-3">
        	{{ $training->detail }}..
        </p>

        <div class="mt-3">
            <span><b>ผู้ลงข้อมูล :</b></span>
            <span id="create_by">{{ $training->name_creator }}</span>
        </div>

        @php
			// แปลงสตริง JSON เป็นอาร์เรย์ PHP
			$user_like_array = json_decode($training->user_like, true);

			// ตรวจสอบว่าเป็นอาร์เรย์หรือไม่
			if (is_array($user_like_array)) {
			    // นับจำนวนสมาชิกในอาร์เรย์
			    $user_like_count = count($user_like_array);
			} else {
			    // ถ้าไม่ใช่อาร์เรย์ ให้ตั้งค่าเป็น 0
			    $user_like_count = 0;
			}

        @endphp
        <h4 class="mt-4">
            <span>ถูกใจทั้งหมด :</span>
            <span>{{ number_format($user_like_count) }} คน</span>
        </h4>

        <h4 class="mt-4">
            <span>คะแนน :</span>
            <span>{{ number_format($training->sum_rating) }} ดาว</span>
        </h4>
    </div>
</div>

<div class="mt-5">
    <div class="d-flex justify-content-end">
        <input type="text" style="width: 100%; max-width: 400px;" class="form-control" name="search" placeholder="ค้นหาด้วยชื่อหรือรหัสตัวแทน" value="">
        <button id="btn_export_excel" type="button" class="btn btn-outline-secondary float-end mx-2" onclick="exportExcel()">
            Export Excel
        </button>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#logs_view" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-solid fa-eye font-18 me-1"></i>
                            </div>
                            <div class="tab-title">View </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " data-bs-toggle="tab" href="#logs_like" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-thumbs-up font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Like</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_rate" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-star font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Rating</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_dislike" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-thumbs-down font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Dislike</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_fav" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-bookmark font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Favorites</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_share" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-solid fa-share-from-square font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Share</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_video" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-solid fa-photo-film font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Video</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs_download_pdf" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon">
                                <i class="fa-regular fa-file-pdf font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Download_pdf</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content pt-3">
            	<!-- logs_view -->
                <div class="tab-pane fade active show" id="logs_view" role="tabpanel">
                    <div id="content_logs_view">
                    	<!-- content logs_view -->
                    </div>
                </div>
                <!-- logs_like -->
                <div class="tab-pane fade" id="logs_like" role="tabpanel">
                    <div id="content_logs_like">
                    	<!-- content_logs_like -->
                    </div>
                </div>
                <!-- logs_rate -->
                <div class="tab-pane fade" id="logs_rate" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-info active" data-bs-toggle="pill" onclick="change_view_active_logs_rate('All')">
                                All
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success" data-bs-toggle="pill" onclick="change_view_active_logs_rate('Active')">
                                Active
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" data-bs-toggle="pill" onclick="change_view_active_logs_rate('Inactive')">
                                Inactive
                            </button>
                        </li>
                    </ul>
                    <div id="content_logs_rate">
                        <!-- content_logs_rate -->
                    </div>
                    <script>
                        function change_view_active_logs_rate(type) {
                            let list_log_rating = document.querySelectorAll('.list_log_rating');
                            list_log_rating.forEach(function(item) {
                                if (type === 'Active') {
                                    if (item.getAttribute('status') === 'Canceled') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'Inactive') {
                                    if (item.getAttribute('status') === 'Active') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'All') {
                                    item.classList.remove('d-none');
                                }
                            });
                        }
                    </script>
                </div>
                <!-- logs_dislike -->
                <div class="tab-pane fade" id="logs_dislike" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-info active" data-bs-toggle="pill" onclick="change_view_active_logs_dislike('All')">
                                All
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success" data-bs-toggle="pill" onclick="change_view_active_logs_dislike('Active')">
                                Active
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" data-bs-toggle="pill" onclick="change_view_active_logs_dislike('Inactive')">
                                Inactive
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                            <div id="content_logs_dislike">
                                <!-- content_logs_dislike -->
                            </div>
                        </div>
                        <script>
                            function change_view_active_logs_dislike(type) {
                                let list_log_dislike = document.querySelectorAll('.list_log_dislike');
                                list_log_dislike.forEach(function(item) {
                                    if (type === 'Active') {
                                        if (item.getAttribute('status') === 'Canceled') {
                                            item.classList.add('d-none');
                                        } else {
                                            item.classList.remove('d-none');
                                        }
                                    }
                                    else if (type === 'Inactive') {
                                        if (item.getAttribute('status') === 'Active') {
                                            item.classList.add('d-none');
                                        } else {
                                            item.classList.remove('d-none');
                                        }
                                    }
                                    else if (type === 'All') {
                                        item.classList.remove('d-none');
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
                <!-- logs_fav -->
                <div class="tab-pane fade" id="logs_fav" role="tabpanel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-info active" data-bs-toggle="pill" onclick="change_view_active_logs_fav('All')">
                                All
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-success" data-bs-toggle="pill" onclick="change_view_active_logs_fav('Active')">
                                Active
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="me-2 btn btn-outline-danger" data-bs-toggle="pill" onclick="change_view_active_logs_fav('Inactive')">
                                Inactive
                            </button>
                        </li>
                    </ul>
                    <div id="content_logs_fav">
                        <!-- content_logs_fav -->
                    </div>
                    <script>
                        function change_view_active_logs_fav(type) {
                            let list_log_fav = document.querySelectorAll('.list_log_fav');
                            list_log_fav.forEach(function(item) {
                                if (type === 'Active') {
                                    if (item.getAttribute('status') === 'Canceled') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'Inactive') {
                                    if (item.getAttribute('status') === 'Active') {
                                        item.classList.add('d-none');
                                    } else {
                                        item.classList.remove('d-none');
                                    }
                                }
                                else if (type === 'All') {
                                    item.classList.remove('d-none');
                                }
                            });
                        }
                    </script>
                </div>
                <!-- logs_share -->
                <div class="tab-pane fade" id="logs_share" role="tabpanel">
                    <div class="w-100">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn mx-1" data-bs-toggle="pill" onclick="change_view_active_logs_share('All');">
                                    All
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsFacebook" data-bs-toggle="pill" onclick="change_view_active_logs_share('facebook');">
                                    <i class="fa-brands fa-facebook me-2"></i> Facebook
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsLine" data-bs-toggle="pill" onclick="change_view_active_logs_share('line');">
                                    <i class="fa-brands fa-line me-2"></i> Line
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsTwitter" data-bs-toggle="pill" onclick="change_view_active_logs_share('twitte');">
                                    <i class="fa-brands fa-x-twitter"></i> 
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsWhatsapp" data-bs-toggle="pill" onclick="change_view_active_logs_share('whatsapp');">
                                    <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsCopy" data-bs-toggle="pill" onclick="change_view_active_logs_share('copy');">
                                    Copy
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="content_logs_share">
                                    <!-- content_logs_share -->
                                </div>
                            </div>
                            <script>
                                function change_view_active_logs_share(type) {
                                    let list_log_share = document.querySelectorAll('.list_log_share');
                                    list_log_share.forEach(function(item) {
                                        if (type === 'line') {
                                            if (item.getAttribute('social') !== 'line') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'facebook') {
                                            if (item.getAttribute('social') !== 'facebook') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'twitte') {
                                            if (item.getAttribute('social') !== 'twitte') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'whatsapp') {
                                            if (item.getAttribute('social') !== 'whatsapp') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'copy') {
                                            if (item.getAttribute('social') !== 'copy') {
                                                item.classList.add('d-none');
                                            } else {
                                                item.classList.remove('d-none');
                                            }
                                        }
                                        else if (type === 'All') {
                                            item.classList.remove('d-none');
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <!-- logs_video -->
                <div class="tab-pane fade" id="logs_video" role="tabpanel">
                    <div id="content_logs_video">
                        <!-- content_logs_video -->
                    </div>
                </div>
                <!-- logs_download_pdf -->
                <div class="tab-pane fade" id="logs_download_pdf" role="tabpanel">
                    <div id="content_logs_fav">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div class="bg-success py-1 px-3 text-white rounded-pill">active</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div class="bg-danger py-1 px-3 text-white rounded-pill">cancle</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

	document.addEventListener('DOMContentLoaded', async function () {
        await get_log_view();
        await get_log_like();
        await get_log_rating();
        await get_logs_dislike();
        await get_logs_fav();
        await get_logs_share();
        await get_logs_video();
    });

  	function get_log_view(){
        return new Promise((resolve) => {
      		// ดึงข้อมูล JSON จาก Blade Template
    	    let db_log_view = @json($training->user_view);

    	    // แปลง JSON เป็นอาร์เรย์ JavaScript
    	    let logViewArray = JSON.parse(db_log_view);

    	    // ตรวจสอบค่าในคอนโซล
    	    // console.log(logViewArray);

    	    let content_logs_view = document.querySelector('#content_logs_view');
    	    	content_logs_view.innerHTML = '';

    	    let html_heading ;

    	    if(logViewArray){
    	    	for (let userId in logViewArray) {
    			    // แสดงชื่อผู้ใช้หรือข้อมูลอื่นที่ต้องการแสดง
    			    // console.log(`User ID: ${userId}`);

    			    fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
    			      	.then(response => response.json())
    			      	.then(result => {
    			          	// console.log(result);

    			          	if(result){

    			          		let roundCount = Object.keys(logViewArray[userId]).length;

    						    html_heading = `
    					  			<div name_user="`+result.name+`" account="`+result.account+`" class="accordion" id="view_accordion_user_id_${userId}">
    									<div class="accordion-item">
    										<h2 class="accordion-header" id="view_heading_user_id_${userId}">
    								  			<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#view_collapse_user_id_${userId}" aria-expanded="false" aria-controls="view_collapse_user_id_${userId}">
    												`+result.account+` `+result.name+` (`+roundCount+` ครั้ง)
    								  			</button>
    										</h2>
    										<div id="view_collapse_user_id_${userId}" class="accordion-collapse collapse" aria-labelledby="view_heading_user_id_${userId}" data-bs-parent="#view_accordion_user_id_${userId}" style="">
    											<div id="view_item_of_user_${userId}" class="accordion-body">
    												
    											</div>
    										</div>
    									</div>
    								</div>
    							`;
                    			content_logs_view.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

                    			let item_of_user = document.querySelector('#view_item_of_user_'+userId);
                    			// วนลูปเข้าไปยังรอบการดูของผู้ใช้
    						    for (let roundId in logViewArray[userId]) {
    						        let datetime = logViewArray[userId][roundId].datetime;
    						        // console.log(`Round ID: ${roundId}, Datetime: ${datetime}`);

    						        let html_item_of_user = `
    						        	<div class="card w-100 shadow-sm border-1 border p-3 mt-2">
    									    <div class="d-flex justify-content-start">
    									        <div class="mx-2">Round ${roundId}</div>
    									        <div class="mx-2">Datetime: ${datetime}</div>
    									    </div>
    									</div>
    						        `;
                    				item_of_user.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด

    						    }
    			          	}

    			      	});
    			}
    	    }
            resolve();
        });
  	}

  	function get_log_like(){
        return new Promise((resolve) => {
      		// ดึงข้อมูล JSON จาก Blade Template
    	    let db_log_like = @json($training->user_like);

    	    // แปลง JSON เป็นอาร์เรย์ JavaScript
    	    let loglikeArray = JSON.parse(db_log_like);

    	    // ตรวจสอบค่าในคอนโซล
    	    // console.log(loglikeArray);

    	    let content_logs_like = document.querySelector('#content_logs_like');
    	    	content_logs_like.innerHTML = '';

    	    let html_heading ;

    	    for (let i = 0; i < loglikeArray.length; i++) {
    		    fetch("{{ url('/') }}/api/get_user_for_log/" + loglikeArray[i])
    		      	.then(response => response.json())
    		      	.then(result => {
    		          	// console.log(result);

    		          	if(result){
    		          		html_heading = `
    				        	<div name_user="`+result.name+`" account="`+result.account+`" class="card w-100 shadow-sm border-1 border p-3 mt-2">
    							    <div class="d-flex justify-content-start">
    							        <div class="mx-2">`+result.account+`</div>
    							        <div class="mx-2">`+result.name+`</div>
    							    </div>
    							</div>
    				        `;
                    		content_logs_like.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

    		          	}

    		        });
    	    }
            resolve();
        });

  	}

    function get_log_rating(){
        return new Promise((resolve) => {
            // ดึงข้อมูล JSON จาก Blade Template
            let db_log_rating = @json($training->log_rating);

            // แปลง JSON เป็นอาร์เรย์ JavaScript
            let log_ratingArray = JSON.parse(db_log_rating);

            // ตรวจสอบค่าในคอนโซล
            // console.log(log_ratingArray);

            let content_logs_rate = document.querySelector('#content_logs_rate');
                content_logs_rate.innerHTML = '';

            let html_heading ;

            if(log_ratingArray){
                for (let userId in log_ratingArray) {
                    // แสดงชื่อผู้ใช้หรือข้อมูลอื่นที่ต้องการแสดง
                    // console.log(`User ID: ${userId}`);

                    fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                        .then(response => response.json())
                        .then(result => {
                            // console.log(result);

                            if(result){

                                let roundCount = Object.keys(log_ratingArray[userId]).length;

                                html_heading = `
                                    <div name_user="`+result.name+`" account="`+result.account+`" class="accordion" id="rating_accordion_user_id_${userId}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="rating_heading_user_id_${userId}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rating_collapse_user_id_${userId}" aria-expanded="false" aria-controls="rating_collapse_user_id_${userId}">
                                                    `+result.account+` `+result.name+` (`+roundCount+` ครั้ง)
                                                </button>
                                            </h2>
                                            <div id="rating_collapse_user_id_${userId}" class="accordion-collapse collapse" aria-labelledby="heading_user_id_${userId}" data-bs-parent="#rating_accordion_user_id_${userId}" style="">
                                                <div id="rating_item_of_user_${userId}" class="accordion-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                content_logs_rate.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

                                let item_of_user = document.querySelector('#rating_item_of_user_'+userId);
                                // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                for (let roundId in log_ratingArray[userId]) {
                                    let datetime = log_ratingArray[userId][roundId].datetime;
                                    let rating = log_ratingArray[userId][roundId].rating;
                                    let status = log_ratingArray[userId][roundId].status;
                                    // console.log(`Round ID: ${roundId}, Datetime: ${datetime}`);

                                    let html_status = ``;

                                    if (status == "Active") {
                                        html_status = `
                                            <div class="bg-success py-1 px-3 text-white rounded-pill">Active</div>
                                        `;
                                    }
                                    else if(status == "Canceled"){
                                        html_status = `
                                            <div class="bg-danger py-1 px-3 text-white rounded-pill">Cancle</div>
                                        `;
                                    }

                                    let html_item_of_user = `
                                        <div status="`+status+`" class="card w-100 shadow-sm border-1 border p-3 mt-2 list_log_rating">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mx-2">Round ${roundId}</div>
                                                <div class="mx-2">Datetime: ${datetime}</div>
                                                <div class="mx-2">Rating: ${rating}</div>
                                                `+html_status+`
                                            </div>
                                        </div>
                                    `;
                                    item_of_user.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด

                                }
                            }

                        });
                }
            }
            resolve();
        });

    }

    function get_logs_dislike(){
        return new Promise((resolve) => {
            // ดึงข้อมูล JSON จาก Blade Template
            let db_log_dislike = @json($training->user_dislike);

            // แปลง JSON เป็นอาร์เรย์ JavaScript
            let log_dislikeArray = JSON.parse(db_log_dislike);

            // ตรวจสอบค่าในคอนโซล
            // console.log(log_dislikeArray);

            let content_logs_dislike = document.querySelector('#content_logs_dislike');
                content_logs_dislike.innerHTML = '';

            let html_heading ;

            if(log_dislikeArray){
                for (let userId in log_dislikeArray) {
                    // แสดงชื่อผู้ใช้หรือข้อมูลอื่นที่ต้องการแสดง
                    // console.log(`User ID: ${userId}`);

                    fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                        .then(response => response.json())
                        .then(result => {
                            // console.log(result);

                            if(result){

                                let roundCount = Object.keys(log_dislikeArray[userId]).length;

                                html_heading = `
                                    <div name_user="`+result.name+`" account="`+result.account+`" class="accordion" id="dislike_accordion_user_id_${userId}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="dislike_heading_user_id_${userId}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dislike_collapse_user_id_${userId}" aria-expanded="false" aria-controls="dislike_collapse_user_id_${userId}">
                                                    `+result.account+` `+result.name+` (`+roundCount+` ครั้ง)
                                                </button>
                                            </h2>
                                            <div id="dislike_collapse_user_id_${userId}" class="accordion-collapse collapse" aria-labelledby="heading_user_id_${userId}" data-bs-parent="#dislike_accordion_user_id_${userId}" style="">
                                                <div id="dislike_item_of_user_${userId}" class="accordion-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                content_logs_dislike.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

                                let item_of_user = document.querySelector('#dislike_item_of_user_'+userId);
                                // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                for (let roundId in log_dislikeArray[userId]) {
                                    let datetime = log_dislikeArray[userId][roundId].datetime;
                                    let reasons = log_dislikeArray[userId][roundId].reasons;
                                    let status = log_dislikeArray[userId][roundId].status;
                                    // console.log(`Round ID: ${roundId}, Datetime: ${datetime}`);

                                    let html_status = ``;

                                    if (status == "Active") {
                                        html_status = `
                                            <div class="bg-success py-1 px-3 text-white rounded-pill">Active</div>
                                        `;
                                    }
                                    else if(status == "Canceled"){
                                        html_status = `
                                            <div class="bg-danger py-1 px-3 text-white rounded-pill">Cancle</div>
                                        `;
                                    }

                                    let html_item_of_user = `
                                        <div status="`+status+`" class="card w-100 shadow-sm border-1 border p-3 mt-2 list_log_dislike">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mx-2">Round ${roundId}</div>
                                                <div class="mx-2">Datetime: ${datetime}</div>
                                                <div class="mx-2">เหตุผล: ${reasons}</div>
                                                `+html_status+`
                                            </div>
                                        </div>
                                    `;
                                    item_of_user.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด

                                }
                            }

                        });
                }
            }
            resolve();
        });

    }

    function get_logs_fav(){
        return new Promise((resolve) => {
            // ดึงข้อมูล JSON จาก Blade Template
            let db_log_fav = @json($training->user_fav);

            // แปลง JSON เป็นอาร์เรย์ JavaScript
            let log_favArray = JSON.parse(db_log_fav);

            // ตรวจสอบค่าในคอนโซล
            // console.log(log_favArray);

            let content_logs_fav = document.querySelector('#content_logs_fav');
                content_logs_fav.innerHTML = '';

            let html_heading ;

            if(log_favArray){
                for (let userId in log_favArray) {
                    // แสดงชื่อผู้ใช้หรือข้อมูลอื่นที่ต้องการแสดง
                    // console.log(`User ID: ${userId}`);

                    fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                        .then(response => response.json())
                        .then(result => {
                            // console.log(result);

                            if(result){

                                let roundCount = Object.keys(log_favArray[userId]).length;

                                html_heading = `
                                    <div name_user="`+result.name+`" account="`+result.account+`" class="accordion" id="fav_accordion_user_id_${userId}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="fav_heading_user_id_${userId}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fav_collapse_user_id_${userId}" aria-expanded="false" aria-controls="fav_collapse_user_id_${userId}">
                                                    `+result.account+` `+result.name+` (`+roundCount+` ครั้ง)
                                                </button>
                                            </h2>
                                            <div id="fav_collapse_user_id_${userId}" class="accordion-collapse collapse" aria-labelledby="heading_user_id_${userId}" data-bs-parent="#fav_accordion_user_id_${userId}" style="">
                                                <div id="fav_item_of_user_${userId}" class="accordion-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                content_logs_fav.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

                                let item_of_user = document.querySelector('#fav_item_of_user_'+userId);
                                // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                for (let roundId in log_favArray[userId]) {
                                    let datetime = log_favArray[userId][roundId].datetime;
                                    let status = log_favArray[userId][roundId].status;
                                    // console.log(`Round ID: ${roundId}, Datetime: ${datetime}`);

                                    let html_status = ``;

                                    if (status == "Active") {
                                        html_status = `
                                            <div class="bg-success py-1 px-3 text-white rounded-pill">Active</div>
                                        `;
                                    }
                                    else if(status == "Canceled"){
                                        html_status = `
                                            <div class="bg-danger py-1 px-3 text-white rounded-pill">Cancle</div>
                                        `;
                                    }

                                    let html_item_of_user = `
                                        <div status="`+status+`" class="card w-100 shadow-sm border-1 border p-3 mt-2 list_log_fav">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mx-2">Round ${roundId}</div>
                                                <div class="mx-2">Datetime: ${datetime}</div>
                                                `+html_status+`
                                            </div>
                                        </div>
                                    `;
                                    item_of_user.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด

                                }
                            }

                        });
                }
            }
            resolve();
        });

    }

    function get_logs_share(){
        return new Promise((resolve) => {
            // ดึงข้อมูล JSON จาก Blade Template
            let db_log_share = @json($training->user_share);

            // แปลง JSON เป็นอาร์เรย์ JavaScript
            let log_shareArray = JSON.parse(db_log_share);

            // ตรวจสอบค่าในคอนโซล
            // console.log(log_shareArray);

            let content_logs_share = document.querySelector('#content_logs_share');
                content_logs_share.innerHTML = '';

            let html_heading ;

            if(log_shareArray){
                for (let userId in log_shareArray) {
                    // แสดงชื่อผู้ใช้หรือข้อมูลอื่นที่ต้องการแสดง
                    // console.log(`User ID: ${userId}`);

                    fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                        .then(response => response.json())
                        .then(result => {
                            // console.log(result);

                            if(result){

                                let roundCount = Object.keys(log_shareArray[userId]).length;

                                html_heading = `
                                    <div name_user="`+result.name+`" account="`+result.account+`" class="accordion" id="share_accordion_user_id_${userId}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="share_heading_user_id_${userId}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#share_collapse_user_id_${userId}" aria-expanded="false" aria-controls="share_collapse_user_id_${userId}">
                                                    `+result.account+` `+result.name+` (`+roundCount+` ครั้ง)
                                                </button>
                                            </h2>
                                            <div id="share_collapse_user_id_${userId}" class="accordion-collapse collapse" aria-labelledby="heading_user_id_${userId}" data-bs-parent="#share_accordion_user_id_${userId}" style="">
                                                <div id="share_item_of_user_${userId}" class="accordion-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                content_logs_share.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

                                let item_of_user = document.querySelector('#share_item_of_user_'+userId);
                                // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                for (let roundId in log_shareArray[userId]) {
                                    let datetime = log_shareArray[userId][roundId].datetime;
                                    let social = log_shareArray[userId][roundId].social;
                                    // console.log(`Round ID: ${roundId}, Datetime: ${datetime}`);

                                    let html_social = ``;

                                    if (social == "line") {
                                        html_social = `
                                        <div class="col-4">
                                            <center>
                                            <div class="logsLine active py-1 px-3 text-white rounded-pill d-flex justify-content-center align-items-center" style="width:50%;">
                                                <i class="fa-brands fa-line me-2"></i> Line
                                            </div>
                                            </center>
                                        </div>
                                        `;
                                    }
                                    else if(social == "facebook"){
                                        html_social = `
                                        <div class="col-4">
                                            <center>
                                            <div class="logsFacebook active py-1 px-3 text-white rounded-pill d-flex justify-content-center align-items-center" style="width:50%;">
                                                <i class="fa-brands fa-facebook me-2"></i> facebook
                                            </div>
                                            </center>
                                        </div>
                                        `;
                                    }
                                    else if(social == "twitte"){
                                        html_social = `
                                        <div class="col-4">
                                            <center>
                                            <div class="logsTwitter active py-1 px-3 text-white rounded-pill d-flex justify-content-center align-items-center" style="width:50%;">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </div>
                                            </center>
                                        </div>
                                        `;
                                    }
                                    else if(social == "whatsapp"){
                                        html_social = `
                                        <div class="col-4">
                                            <center>
                                            <div class="logsWhatsapp active py-1 px-3 text-white rounded-pill d-flex justify-content-center align-items-center" style="width:50%;">
                                                <i class="fa-brands fa-whatsapp me-2"></i>Whatsapp
                                            </div>
                                            </center>
                                        </div>
                                        `;
                                    }
                                    else if(social == "copy"){
                                        html_social = `
                                        <div class="col-4">
                                            <center>
                                            <div class="logsCopy active py-1 px-3 text-white rounded-pill d-flex justify-content-center align-items-center" style="width:50%;">
                                                Copy
                                            </div>
                                            </center>
                                        </div>
                                        `;
                                    }

                                    let html_item_of_user = `
                                        <div social="`+social+`" class="card w-100 shadow-sm border-1 border p-3 mt-2 list_log_share">
                                            <div class="row align-items-center">
                                                <div class="col-4">Round ${roundId}</div>
                                                <div class="col-4">Datetime: ${datetime}</div>
                                                `+html_social+`
                                            </div>
                                        </div>
                                    `;
                                    item_of_user.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด

                                }
                            }

                        });
                }
            }
            resolve();
        });

    }

    function get_logs_video(){
        return new Promise((resolve) => {
            // ดึงข้อมูล JSON จาก Blade Template
            let db_log_video = @json($training->log_video);

            // แปลง JSON เป็นอาร์เรย์ JavaScript
            let log_videoArray = JSON.parse(db_log_video);

            // ตรวจสอบค่าในคอนโซล
            // console.log(log_videoArray);

            let content_logs_video = document.querySelector('#content_logs_video');
                content_logs_video.innerHTML = '';

            let html_heading ;

            if(log_videoArray){
                for (let userId in log_videoArray) {
                    // แสดงชื่อผู้ใช้หรือข้อมูลอื่นที่ต้องการแสดง
                    // console.log(`User ID: ${userId}`);

                    fetch("{{ url('/') }}/api/get_user_for_log/" + userId)
                        .then(response => response.json())
                        .then(result => {
                            // console.log(result);

                            if(result){

                                let roundCount = Object.keys(log_videoArray[userId]).length;

                                html_heading = `
                                    <div name_user="`+result.name+`" account="`+result.account+`" class="accordion" id="video_accordion_user_id_${userId}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="video_heading_user_id_${userId}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#video_collapse_user_id_${userId}" aria-expanded="false" aria-controls="video_collapse_user_id_${userId}">
                                                    `+result.account+` `+result.name+` (`+roundCount+` ครั้ง)
                                                </button>
                                            </h2>
                                            <div id="video_collapse_user_id_${userId}" class="accordion-collapse collapse" aria-labelledby="heading_user_id_${userId}" data-bs-parent="#video_accordion_user_id_${userId}" style="">
                                                <div id="video_item_of_user_${userId}" class="accordion-body">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                content_logs_video.insertAdjacentHTML('beforeend', html_heading); // แทรกล่างสุด

                                let item_of_user = document.querySelector('#video_item_of_user_'+userId);
                                // วนลูปเข้าไปยังรอบการดูของผู้ใช้
                                for (let roundId in log_videoArray[userId]) {
                                    let datetime = log_videoArray[userId][roundId].datetime;
                                    let countTime = log_videoArray[userId][roundId].countTime;

                                    let hours = Math.floor(countTime / 3600);
                                    let minutes = Math.floor((countTime % 3600) / 60);
                                    let seconds = Math.floor(countTime % 60);

                                    let formattedDuration = "";
                                    if (hours > 0) {
                                        formattedDuration += hours + " ชั่วโมง ";
                                    }
                                    if (minutes > 0) {
                                        formattedDuration += minutes + " นาที ";
                                    }
                                    if (seconds > 0 || (hours === 0 && minutes === 0)) { // เพื่อให้แสดงวินาทีเสมอถ้าไม่มีชั่วโมงและนาที
                                        formattedDuration += seconds + " วินาที";
                                    }


                                    let html_item_of_user = `
                                        <div status="`+status+`" class="card w-100 shadow-sm border-1 border p-3 mt-2 list_log_video">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mx-2">Round ${roundId}</div>
                                                <div class="mx-2">Datetime: ${datetime}</div>
                                                <div class="mx-2">${formattedDuration}</div>
                                            </div>
                                        </div>
                                    `;
                                    item_of_user.insertAdjacentHTML('beforeend', html_item_of_user); // แทรกล่างสุด

                                }
                            }

                        });
                }
            }
            resolve();
        });

    }

</script>
@endsection
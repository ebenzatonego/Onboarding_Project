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
            <span>{{ number_format($training->sum_rating) }}</span>
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
                <li class="nav-item" role="presentation">
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
                <!-- logs_share -->
                <div class="tab-pane fade" id="logs_share" role="tabpanel">
                    <div class="w-100">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn mx-1" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">all</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsFacebook" id="pills-facebook-tab" data-bs-toggle="pill" data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook" aria-selected="false"> <i class="fa-brands fa-facebook me-2"></i> Facebook</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsLine" id="pills-line-tab" data-bs-toggle="pill" data-bs-target="#pills-line" type="button" role="tab" aria-controls="pills-line" aria-selected="false">
                                    <i class="fa-brands fa-line me-2"></i>Line</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsTwitter" id="pills-x-tab" data-bs-toggle="pill" data-bs-target="#pills-x" type="button" role="tab" aria-controls="pills-x" aria-selected="false"><i class="fa-brands fa-x-twitter"></i> </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsWhatsapp" id="pills-whats_app-tab" data-bs-toggle="pill" data-bs-target="#pills-whats_app" type="button" role="tab" aria-controls="pills-whats_app" aria-selected="false"><i class="fa-brands fa-whatsapp me-2"></i> WhatsApp</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn mx-1 logsCopy" id="pills-copy-tab" data-bs-toggle="pill" data-bs-target="#pills-copy" type="button" role="tab" aria-controls="pills-copy" aria-selected="false">Copy</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div id="content_logs_share_all">
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsLine active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-line me-2"></i> Line
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsFacebook active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-facebook me-2"></i> facebook
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsTwitter active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div>name(account)</div>
                                            <div>12/5/2567 18:00น.</div>
                                            <div class="logsWhatsapp active py-1 px-3 text-white rounded-pill d-flex align-items-center">
                                                <i class="fa-brands fa-whatsapp me-2"></i>Whatsapp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-facebook" role="tabpanel" aria-labelledby="pills-facebook-tab">facebook</div>
                            <div class="tab-pane fade" id="pills-line" role="tabpanel" aria-labelledby="pills-line-tab">line</div>
                            <div class="tab-pane fade" id="pills-x" role="tabpanel" aria-labelledby="pills-x-tab">x</div>
                            <div class="tab-pane fade" id="pills-whats_app" role="tabpanel" aria-labelledby="pills-whats_app-tab">whats_app</div>
                            <div class="tab-pane fade" id="pills-copy" role="tabpanel" aria-labelledby="pills-copy-tab">copy</div>
                        </div>
                    </div>
                </div>
                <!-- logs_video -->
                <div class="tab-pane fade" id="logs_video" role="tabpanel">
                    <div id="content_logs_video">
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div>2 นาที</div>
                            </div>
                        </div>
                        <div class="card w-100 shadow-sm  border-1 border p-3 mt-2">
                            <div class="d-flex justify-content-between">
                                <div>name(account)</div>
                                <div>12/5/2567 18:00น.</div>
                                <div>15 นาที</div>
                            </div>
                        </div>
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

	document.addEventListener('DOMContentLoaded', function () {
		get_log_view();
        get_log_like();
        get_log_rating();
		get_logs_dislike();
  	});

  	function get_log_view(){

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
  	}

  	function get_log_like(){

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

  	}

    function get_log_rating(){

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

    }

    function get_logs_dislike(){

        // ดึงข้อมูล JSON จาก Blade Template
        let db_log_dislike = @json($training->user_dislike);

        // แปลง JSON เป็นอาร์เรย์ JavaScript
        let log_dislikeArray = JSON.parse(db_log_dislike);

        // ตรวจสอบค่าในคอนโซล
        console.log(log_dislikeArray);

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

    }

</script>
@endsection
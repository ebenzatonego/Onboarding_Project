@extends('layouts.theme_admin')

@section('content')

<style>
	table {
        width: 100%;
        border-collapse: collapse;
    }

    tr td {
        vertical-align: middle;
        padding: 10px; /* Optional: เพิ่มการเว้นวรรคในเซลล์ */
    }

    .product-img{
    	width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
    }
</style>

<div class="card border-top border-0 border-4 border-dark">
    <div class="card-body p-5">
    	<div>
    		<div class="row">
    			<div class="col-12 mb-3">
    				<div class="float-start">
						<h5 class="mb-0 text-dark">
							<i class="fa-solid fa-mobile-screen-button me-2 font-22 text-dark"></i>
							Tools Apps
						</h5>
					</div>
    			</div>
    			<div class="col-12 mt-2">
    				<button id="btn_view_all" style="width: 10%;" class="div_tools_app mx-1 btn btn-sm btn-primary float-start" onclick="select_view('all');">
						All
					</button>
					<button id="btn_view_Web" style="width: 10%;" class="div_tools_app mx-1 btn btn-sm btn-outline-primary float-start" onclick="select_view('Web');">
						Web
					</button>
					<button id="btn_view_App" style="width: 10%;" class="div_tools_app mx-1 btn btn-sm btn-outline-primary float-start" onclick="select_view('App');">
						App
					</button>

					<a href="{{ url('/tools_apps/create') }}" style="width: 20%;" class="mx-1 btn btn-sm btn-success float-end">
						เพิ่มข้อมูล
					</a>
    			</div>
    		</div>
		</div>
		<hr>
		<script>
			function select_view(type){
		    	
				let div_tools_app = document.querySelectorAll('.div_tools_app');
                    div_tools_app.forEach(div_tools_app => {
                        div_tools_app.classList.remove('btn-primary')
                        div_tools_app.classList.add('btn-outline-primary')
                    })

                   document.querySelector('#btn_view_all').classList.remove('btn-primary');
                   document.querySelector('#btn_view_Web').classList.remove('btn-primary');
                   document.querySelector('#btn_view_App').classList.remove('btn-primary');

                   document.querySelector('#btn_view_all').classList.add('btn-outline-primary');
                   document.querySelector('#btn_view_Web').classList.add('btn-outline-primary');
                   document.querySelector('#btn_view_App').classList.add('btn-outline-primary');

                   document.querySelector('#btn_view_'+type).classList.remove('btn-outline-primary');
                   document.querySelector('#btn_view_'+type).classList.add('btn-primary');

		    }
		</script>
        <div class="col-12 mt-2">
            <div class="card-body p-0">
                <div class="">
                	<table class="table mb-0 table-hover" >
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name / Detail</th>
                                <th scope="col">Type</th>
                                <th scope="col" style="max-width: 200px;">Link Web</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="content_tbody">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        get_data_tools_apps();
    });

	function get_data_tools_apps(){

        fetch("{{ url('/') }}/api/get_data_tools_apps")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let content_tbody = document.querySelector('#content_tbody');
                    content_tbody.innerHTML = '' ;

                for (let i = 0; i < result.length; i++) {

                	let img_profile = `{{ url('/img/icon/icon-all-training.png') }}`;
                	if(result[i].photo_icon){
                		img_profile = result[i].photo_icon ;
                	}

                	let type_app = `` ;
                	let html_link = `` ;

                	if(result[i].type == 'เว็บไซต์'){
                		type_app = `Web`;
                		html_link = `
                			<h6><b>Link Web : </b>`+result[i].link_web+`</h6>
                		`;
                	}
                	else if(result[i].type == 'แอปพลิเคชั่น'){
                		type_app = `App`;
                		html_link = `
                			<h6><b>Link IOS : </b>`+result[i].link_ios+`</h6>
                			<h6><b>Link Android : </b>`+result[i].link_android+`</h6>
                		`;
                	}

                	let number = ``;
                	if(result[i].number){
                		number = result[i].number ;
                	}

                	let textWithoutHtml = ``;
                  	if(result[i].detail){
                      	textWithoutHtml = result[i].detail.replace(/(<([^>]+)>)/gi, "");
                  	}

                    let html = `
                    	<tr type_app="`+type_app+`">
                            <td>
                        		<div class="product-img">
						            <img src="`+img_profile+`" class="p-1" alt="">
						            <span class="d-none">
						            	`+img_profile+`
						            </span>
						        </div>
                            </td>
                            <td>
                            	`+result[i].name+`
                            	<br>
                            	`+textWithoutHtml+`
                            </td>
                            <td>
                            	`+type_app+`
                            </td>
                            <td>
                            	`+html_link+`
                            </td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm mb-2 w-100" title="Edit Tools_contact">Number</a>
                                <br>
                                <a href="" class="btn btn-primary btn-sm mb-2 w-100" title="Edit Tools_contact">Edit</a>
                                <br>
                                <button type="submit" class="btn btn-danger btn-sm mb-2 w-100" title="Delete Tools_contact"> Delete</button>
                            </td>
                        </tr>
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }
        });
    }

    
</script>

@endsection

<!-- <div  class="row">
	<div class="col-2">
		
	</div>
	<div class="col-3">
		<h6><b>Name : </b></h6>
		<h6><b>Type : </b></h6>
	</div>
	<div class="col-7">
		<h6><b>Detail : </b></h6>
		
	</div>
	<div class="col-12 mt-1">
		<button type="button" class="btn btn-sm btn-danger float-end mx-1" style="width:10%;">
			ลบ
		</button>
		<button type="button" class="btn btn-sm btn-warning float-end mx-1" style="width:10%;">
			แก้ไข
		</button>
		<div class="btn-group float-end" style="width:10%;">
		  <button type="button" class="btn btn-info btn-sm dropdown-toggle mx-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    ลำดับ
		  </button>
		  <div class="dropdown-menu">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		  </div>
		</div>
	</div>
</div>
<hr> -->

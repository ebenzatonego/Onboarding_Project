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
                <div class="table-responsive">

                	<div class="row text-center">
                		<div class="col-2">
                			<b>Photo</b>
                		</div>
                		<div class="col-2">
                			<b>Name</b>
                		</div>
                		<div class="col-1">
                			<b>Type</b>
                		</div>
                		<div class="col-4">
                			<b>Detail</b>
                		</div>
                		<div class="col-2">
                			<b>number</b>
                		</div>
                		<div class="col-1">
                			<!--  -->
                		</div>
                	</div>
                	<div id="content_tbody" class="row">
                		
                	</div>

                    <!-- <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Detail</th>
                                <th>number</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="content_tbody" class="">

                        </tbody>
                    </table> -->

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

                	let html_admin ;
                	if(result[i].role == "Super-admin"){
                		html_admin = `
                			<span style="font-size:14px;" class="badge badge-pill bg-success">Super-admin</span>
                		`;
                	}
                	else if(result[i].role == "Admin"){
						html_admin = `
                			<span style="font-size:14px;" class="badge badge-pill bg-info">Admin</span>
                		`;
                	}
                	else if(result[i].role == "Staff"){
						html_admin = `
                			<span style="font-size:14px;" class="badge badge-pill bg-warning">Staff</span>
                		`;
                	}

                	let nickname = `-`;
                	let email = `-`;
                	let phone = `-`;

                	if(result[i].nickname){
                		nickname = result[i].nickname ;
                	}

                	if(result[i].email){
                		email = result[i].email ;
                	}

                	if(result[i].phone){
                		phone = result[i].phone ;
                	}

                    let html = `

                		<div class="col-2">
                			<b>Photo</b>
                		</div>
                		<div class="col-2">
                			<b>Name</b>
                		</div>
                		<div class="col-1">
                			<b>Type</b>
                		</div>
                		<div class="col-4">
                			<b>Detail</b>
                		</div>
                		<div class="col-2">
                			<b>number</b>
                		</div>
                		<div class="col-1">
                			<!--  -->
                		</div>
            			<hr>

                        
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }
        });
    }

    
</script>

@endsection


<!-- <tr type_app="`+result[i].type+`" class="list_admin">
    <td style="width:20%;">
        <div class="product-img">
            <img src="`+img_profile+`" class="p-1" alt="">
            <span class="d-none">
            	`+img_profile+`
            </span>
        </div>
    </td>
    <td style="width:20%;">`+result[i].name+`</td>
    <td style="width:20%;">`+result[i].type+`</td>
    <td style="width:20%;">`+result[i].detail+`</td>
    <td style="width:20%;">`+result[i].number+`</td>
    <td style="width:20%;"></td>
</tr> -->
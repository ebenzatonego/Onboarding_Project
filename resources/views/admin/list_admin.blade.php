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
    			<div class="col-12">
    				<div class="float-start">
						<h5 class="mb-0 text-dark">
							<i class="fa-sharp fa-solid fa-user-tie me-2 font-22 text-dark"></i> 
							รายชื่อแอดมิน
						</h5>
					</div>
					<button id="btn_view_staff" style="width: 15%;" class="mx-1 btn btn-sm btn-outline-warning float-end" onclick="select_view('staff');">
						staff
					</button>
					<button id="btn_view_Admin" style="width: 15%;" class="mx-1 btn btn-sm btn-outline-info float-end" onclick="select_view('Admin');">
						Admin
					</button>
					<button id="btn_view_Super_admin" style="width: 15%;" class="mx-1 btn btn-sm btn-outline-success float-end" onclick="select_view('Super-admin');">
						Super-admin
					</button>
					<button id="btn_view_all" style="width: 15%;" class="mx-1 btn btn-sm btn-primary float-end" onclick="select_view('all');">
						All
					</button>
    			</div>
    		</div>
		</div>
		<hr>
		<script>
			function select_view(type){
		    	document.querySelector('#btn_view_all').classList.remove('btn-primary');
		    	document.querySelector('#btn_view_Super_admin').classList.remove('btn-success');
		    	document.querySelector('#btn_view_Admin').classList.remove('btn-info');
		    	document.querySelector('#btn_view_staff').classList.remove('btn-warning');

		    	document.querySelector('#btn_view_all').classList.add('btn-outline-primary');
		    	document.querySelector('#btn_view_Super_admin').classList.add('btn-outline-success');
		    	document.querySelector('#btn_view_Admin').classList.add('btn-outline-info');
		    	document.querySelector('#btn_view_staff').classList.add('btn-outline-warning');

		    	if(type == 'all'){
		    		document.querySelector('#btn_view_all').classList.add('btn-primary');
		    		document.querySelector('#btn_view_all').classList.remove('btn-outline-primary');

		    		let list_admin = document.querySelectorAll('.list_admin');
						list_admin.forEach(list_admin => {
						    list_admin.classList.remove('d-none');
						})

		    	}
		    	else if(type == 'Super-admin'){
		    		document.querySelector('#btn_view_Super_admin').classList.add('btn-success');
		    		document.querySelector('#btn_view_Super_admin').classList.remove('btn-outline-success');

		    		let list_admin = document.querySelectorAll('.list_admin');
						list_admin.forEach(list_admin => {
						    list_admin.classList.add('d-none');
						})

					let list_Super_admin = document.querySelectorAll('tr[role="'+type+'"]');
						list_Super_admin.forEach(list_Super_admin => {
						    list_Super_admin.classList.remove('d-none');
						})
		    	}
		    	else if(type == 'Admin'){
		    		document.querySelector('#btn_view_Admin').classList.add('btn-info');
		    		document.querySelector('#btn_view_Admin').classList.remove('btn-outline-info');

		    		let list_admin = document.querySelectorAll('.list_admin');
						list_admin.forEach(list_admin => {
						    list_admin.classList.add('d-none');
						})

					let list_Admin = document.querySelectorAll('tr[role="'+type+'"]');
						list_Admin.forEach(list_Admin => {
						    list_Admin.classList.remove('d-none');
						})
		    	}

		    	else if(type == 'staff'){
		    		document.querySelector('#btn_view_staff').classList.add('btn-warning');
		    		document.querySelector('#btn_view_staff').classList.remove('btn-outline-warning');

		    		let list_admin = document.querySelectorAll('.list_admin');
						list_admin.forEach(list_admin => {
						    list_admin.classList.add('d-none');
						})

					let list_staff = document.querySelectorAll('tr[role="'+type+'"]');
						list_staff.forEach(list_staff => {
						    list_staff.classList.remove('d-none');
						})
		    	}
		    }
		</script>
        <div class="col-12 mt-2">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Role</th>
                                <th>Account</th>
                                <th>Name</th>
                                <th>Nickname</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody id="content_tbody" class="">
                            <!-- content_tbody -->
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
        get_list_admin();
    });

	function get_list_admin(){

        fetch("{{ url('/') }}/api/get_list_admin")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let content_tbody = document.querySelector('#content_tbody');
                    content_tbody.innerHTML = '' ;

                for (let i = 0; i < result.length; i++) {

                	let img_profile = `{{ url('/img/icon/profile.png') }}`;
                	if(result[i].photo){
                		img_profile = result[i].photo ;
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
                	else if(result[i].role == "staff"){
						html_admin = `
                			<span style="font-size:14px;" class="badge badge-pill bg-warning">staff</span>
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
                        <tr role="`+result[i].role+`" class="list_admin">
                            <td>
                                <div class="product-img">
                                    <img src="`+img_profile+`" class="p-1" alt="">
                                    <span class="d-none">
                                    	`+img_profile+`
                                    </span>
                                </div>
                            </td>
                            <td>`+html_admin+`</td>
                            <td>`+result[i].account+`</td>
                            <td>`+result[i].name+`</td>
                            <td>`+nickname+`</td>
                            <td>`+email+`</td>
                            <td>`+phone+`</td>
                        </tr>
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }
        });
    }

    
</script>

@endsection
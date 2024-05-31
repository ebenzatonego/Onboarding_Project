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
							<i class="fa-duotone fa-user-group me-2 font-22 text-dark"></i> 
							รายชื่อ Upper Al
						</h5>
					</div>
    			</div>
    		</div>
		</div>
		<hr>
        <div class="col-12 mt-2">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Account</th>
                                <th>Name</th>
                                <th>Nickname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
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
        get_list_upper_al();
    });

	function get_list_upper_al(){

        fetch("{{ url('/') }}/api/get_list_upper_al")
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
                        <tr account="`+result[i].account+`" class="list_upper_al">
                            <td>
                                <div class="product-img">
                                    <img src="`+img_profile+`" class="p-1" alt="">
                                    <span class="d-none">
                                    	`+img_profile+`
                                    </span>
                                </div>
                            </td>
                            <td>`+result[i].account+`</td>
                            <td>`+result[i].name+`</td>
                            <td>`+nickname+`</td>
                            <td>`+email+`</td>
                            <td>`+phone+`</td>
                            <td>
                            	<button class="btn btn-sm btn-warning" onclick="edit_upper_al('`+result[i].id+`');">
                            		<i class="fa-solid fa-pen-to-square"></i> Edit
                            	</button>
                            </td>
                        </tr>
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }
        });
    }

    function edit_upper_al(upper_al_id){
    	console.log("upper_al_id >> " + upper_al_id);
    }
</script>

@endsection
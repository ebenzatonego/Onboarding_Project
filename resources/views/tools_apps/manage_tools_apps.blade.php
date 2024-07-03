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

    .i_Highlight {
	    animation: bounce-twice 2s;
	  }

	  @keyframes bounce-twice {
	    0%, 20%, 50%, 80%, 100% {
	      transform: translateY(0);
	    }
	    40% {
	      transform: translateY(-30px);
	    }
	    60% {
	      transform: translateY(-15px);
	    }
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

                let item_tools_app = document.querySelectorAll('.item_tools_app');
                    item_tools_app.forEach(item_tools_app => {
                        item_tools_app.classList.add('d-none');
                    })

                if(type == 'all'){
                	let all = document.querySelectorAll('.item_tools_app');
                    all.forEach(all => {
                        all.classList.remove('d-none');
                    })
                }
                else{
                	let tr_type = document.querySelectorAll('[type_app="'+type+'"]');
                    tr_type.forEach(tr_type => {
                        tr_type.classList.remove('d-none');
                    })
                }

		    }
		</script>
        <div class="col-12 mt-2">
            <div class="card-body p-0">
                <div class="">
                	<table class="table mb-0 table-hover" >
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Name / Detail / Type</th>
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

                	let html_sort_number = create_html_sort_number(result[i].id , result.length);

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

                  	// Highlight
	                let html_Highlight ;
	                
                    html_Highlight = `<span id="span_Highlight_id_`+result[i].id+`" class="float-end"></span>`;
                    if(result[i].number){
                      html_Highlight = `
                        <span id="span_Highlight_id_`+result[i].id+`">
                          <i class="i_Highlight fa-solid fa-circle-`+result[i].number+` font-24 float-end text-success"></i>
                        </span>
                        `;
                    }
	                

                    let html = `
                    	<tr type_app="`+type_app+`" class="item_tools_app">
                            <td>
                            	`+html_Highlight+`
                            </td>
                            <td>
                        		<div class="product-img">
						            <img src="`+img_profile+`" class="p-1" alt="">
						            <span class="d-none">
						            	`+img_profile+`
						            </span>
						        </div>
                            </td>
                            <td>
                            	<h6 class="text-info">`+result[i].name+`</h6>
                            	<p>Type : `+type_app+`</p>
                            	<p>`+textWithoutHtml+`</p>
                            </td>
                            <td>
                            	`+html_link+`
                            </td>
                            <td>
                                <div class="btn-group w-100">
								  	<button type="button" class="btn btn-info btn-sm dropdown-toggle mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    	จัดลำดับ
								  	</button>
								  	<div class="dropdown-menu">
								    	`+html_sort_number+`
								  	</div>
								</div>
                                <br>
                                <a href="{{ url('/edit_tools_app') }}/`+result[i].id+`" class="btn btn-warning btn-sm mb-2 w-100" title="Edit Tools_contact" >
                                	แก้ไข
                                </a>
                                <br>
                                <form method="POST" action="{{ url('/tools_apps') }}/`+result[i].id+`" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete(event, this)">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm mb-2 w-100" title="Delete Tools_tutorial">
                                        ลบ
                                    </button>
                                </form>
                            </td>
                        </tr>
                    `;

                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                }
        });
    }

    function create_html_sort_number(id , length){
        let html_sort_number = ``;

        for (let xi = 0; xi < length; xi++) {
            let count_r = xi + 1 ;
            if(xi == 0){
                html_sort_number = `
                    <a class="dropdown-item btn" onclick="change_sort_number_tools_app('`+id+`' , 'ว่าง')">ว่าง</a>
                    <a class="dropdown-item btn" onclick="change_sort_number_tools_app('`+id+`' , '`+count_r+`')">`+count_r+`</a>
                `;
            }
            else{
                html_sort_number = html_sort_number + `
                    <a class="dropdown-item btn" onclick="change_sort_number_tools_app('`+id+`' , '`+count_r+`')">`+count_r+`</a>
                `;
            }
        }

        return html_sort_number ;
    }

    function change_sort_number_tools_app(id , number){
    // console.log(id);
    // console.log(number);

    fetch("{{ url('/') }}/api/change_sort_number_tools_app/" + id  + "/" + number)
      .then(response => response.json())
      .then(result => {
          // console.log(result);

          if(result['old_id']){
            let span_Highlight_old_id = document.querySelector('#span_Highlight_id_'+result['old_id']);

            if(result['old_id_change_to']){
                span_Highlight_old_id.innerHTML = `
                  <span id="span_Highlight_id_`+result['old_id']+`">
                    <i class="i_Highlight fa-solid fa-circle-`+result['old_id_change_to']+` font-24 float-end text-success"></i>
                  </span>
                `;

                let icon_1 = document.getElementById('span_Highlight_id_'+result['old_id']);
                    icon_1.classList.remove('i_Highlight');
                    // void icon_1.offsetWidth; // Trigger reflow
                    setTimeout(() => {
                      icon_1.classList.add('i_Highlight');
                    }, 500);
                  }
            else{
              span_Highlight_old_id.innerHTML = `
                <span id="span_Highlight_id_`+result['old_id']+`" class="float-end">..</span>
              `;
            }
          }

          let select = document.querySelector('#span_Highlight_id_'+id);
          select.innerHTML = `
            <span id="span_Highlight_id_`+id+`">
              <i class="i_Highlight fa-solid fa-circle-`+number+` font-24 float-end text-success"></i>
            </span>
          `;

          let icon_2 = document.getElementById('span_Highlight_id_'+id);
              icon_2.classList.remove('i_Highlight');
              // void icon_2.offsetWidth; // Trigger reflow
              setTimeout(() => {
                icon_2.classList.add('i_Highlight');
              }, 500);

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
		
	</div>
</div>
<hr> -->

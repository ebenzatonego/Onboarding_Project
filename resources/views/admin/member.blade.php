@extends('layouts.theme_admin')

@section('content')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    tr td {
        vertical-align: middle;
        padding: 10px;
        /* Optional: เพิ่มการเว้นวรรคในเซลล์ */
    }

    .product-img {
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
                            รายชื่อ Member
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
                                <th>Name</th>
                                <th>Nickname</th>
                                <th>Account</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>current_rank</th>
                                <th>position</th>
                                <th>organization_name</th>
                                <th>branch_name</th>
                                <th>license</th>
                                <th>license expire</th>
                                <th class="d-none">Action</th>
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

    let currentPage = 1;
    const limit = 200;
    let hasMoreData = true;

    const content_tbody = document.querySelector('#content_tbody');

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // get_list_member();
        fetchMembers(currentPage);
    });

    async function fetchMembers(page) {

        console.log('fetchMembers > ' + page);
        if (!hasMoreData) return;

        try {
            const response = await fetch(`{{ url('/') }}/api/get_list_member?page=${page}&limit=${limit}`);
            const result = await response.json();
            
            if (result.length < limit) {
                hasMoreData = false;
            }

            result.forEach(item => {
                let html = `
                    <tr account="${item.account ? item.account : '-'}" class="member">
                        <td>
                            <div class="product-img">
                                <img src="${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}" class="p-1" alt="">
                                <span class="d-none">
                                    ${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}
                                </span>
                            </div>
                        </td>
                        <td>${item.name ? item.name : '-'}</td>
                        <td>${item.nickname ? item.nickname : '-'}</td>
                        <td>${item.account ? item.account : '-'}</td>
                        <td>${item.email ? item.email : '-'}</td>
                        <td>${item.phone ? item.phone : '-'}</td>
                        <td>${item.current_rank ? item.current_rank : '-'}</td>
                        <td>${item.position ? item.position : '-'}</td>
                        <td>${item.organization_name ? item.organization_name : '-'}</td>
                        <td>${item.branch_name ? item.branch_name : '-'}</td>
                        <td>${item.license ? item.license : '-'}</td>
                        <td>${formatDate(item.license_expire)}</td>
                        <td class="d-none">
                            <button class="btn btn-sm btn-warning" onclick="edit_upper_al('${item.id ? item.id : '-'}');">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                        </td>
                    </tr>
                `;
                content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
            });

            if (hasMoreData) {
                currentPage++;
                fetchMembers(currentPage); // เรียกตัวเองซ้ำจนกว่าจะดึงข้อมูลครบ
            }
        } catch (error) {
            console.error('Error fetching members:', error);
        }
    }


    // function get_list_member() {

    //     fetch("{{ url('/') }}/api/get_list_member")
    //         .then(response => response.json())
    //         .then(result => {
    //             // console.log(result);

    //             let content_tbody = document.querySelector('#content_tbody');
    //             content_tbody.innerHTML = '';
                
    //             result.forEach(item => {

    //                 let html = `
    //                     <tr account="${item.account ? item.account : '-'}" class="member">
    //                         <td>
    //                             <div class="product-img">
    //                                 <img src="${item.photo ? item.account : "{{ url('/img/icon/profile.png') }}"}" class="p-1" alt="">
    //                                 <span class="d-none">
    //                                 	${item.photo ? item.account : "{{ url('/img/icon/profile.png') }}"}
    //                                 </span>
    //                             </div>
    //                         </td>
    //                         <td>${item.name ? item.name : '-'}</td>
    //                         <td>${item.nickname ? item.nickname : '-'}</td>
    //                         <td>${item.account ? item.account : '-'}</td>
    //                         <td>${item.email ? item.email : '-'}</td>
    //                         <td>${item.phone ? item.phone : '-'}</td>
    //                         <td>${item.current_rank ? item.current_rank : '-'}</td>
    //                         <td>${item.position ? item.position : '-'}</td>
    //                         <td>${item.organization_name ? item.organization_name : '-'}</td>
    //                         <td>${item.branch_name ? item.branch_name : '-'}</td>
    //                         <td>${item.license ? item.license : '-'}</td>
    //                         <td>${formatDate(item.license_expire)}</td>
    //                           <td class="d-none">
    //                         	<button class="btn btn-sm btn-warning" onclick="edit_upper_al('${item.id ? item.id : '-'}');">
    //                         		<i class="fa-solid fa-pen-to-square"></i> Edit
    //                         	</button>
    //                         </td>
    //                     </tr>
    //                 `;
    //                 content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
    //             });
    //             // for (let i = 0; i < result.length; i++) {

    //             // 	let img_profile = `{{ url('/img/icon/profile.png') }}`;
    //             // 	if(result[i].photo){
    //             // 		img_profile = result[i].photo ;
    //             // 	}

    //             // 	let nickname = `-`;
    //             // 	let email = `-`;
    //             // 	let phone = `-`;

    //             // 	if(result[i].nickname){
    //             // 		nickname = result[i].nickname ;
    //             // 	}

    //             // 	if(result[i].email){
    //             // 		email = result[i].email ;
    //             // 	}

    //             // 	if(result[i].phone){
    //             // 		phone = result[i].phone ;
    //             // 	}

    //             //     let html = `
    //             //         <tr account="`+result[i].account+`" class="list_upper_al">
    //             //             <td>
    //             //                 <div class="product-img">
    //             //                     <img src="`+img_profile+`" class="p-1" alt="">
    //             //                     <span class="d-none">
    //             //                     	`+img_profile+`
    //             //                     </span>
    //             //                 </div>
    //             //             </td>
    //             //             <td>`+result[i].account+`</td>
    //             //             <td>`+result[i].name+`</td>
    //             //             <td>`+nickname+`</td>
    //             //             <td>`+email+`</td>
    //             //             <td>`+phone+`</td>
    //             //         </tr>
    //             //     `;

    //             //     content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
    //             // }
    //         });
    // }

    function edit_upper_al(upper_al_id) {
        console.log("upper_al_id >> " + upper_al_id);
    }

    function formatDate(date) {
    if (!date) return '-';

    let d = new Date(date);
    let day = d.getDate();
    let month = d.getMonth() + 1; // เดือนใน JavaScript จะเริ่มจาก 0
    let year = d.getFullYear();

    // เพิ่มเลข 0 ข้างหน้าในกรณีที่วันหรือเดือนมีค่าน้อยกว่า 10
    day = day < 10 ? '0' + day : day;
    month = month < 10 ? '0' + month : month;

    return `${day}/${month}/${year}`;
}
</script>

@endsection
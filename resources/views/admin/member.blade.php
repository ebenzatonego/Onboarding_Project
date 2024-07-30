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

    /* checkbox*/
    .cyberpunk-checkbox {
  appearance: none;
  width: 20px;
  height: 20px;
  border: 2px solid #30cfd0;
  border-radius: 5px;
  background-color: transparent;
  display: inline-block;
  position: relative;
  margin-right: 10px;
  cursor: pointer;
}

.cyberpunk-checkbox:before {
  content: "";
  background-color: #30cfd0;
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  width: 10px;
  height: 10px;
  border-radius: 3px;
  transition: all 0.3s ease-in-out;
}

.cyberpunk-checkbox:checked:before {
  transform: translate(-50%, -50%) scale(1);
}

.cyberpunk-checkbox-label {
  font-size: 18px;
  color: #000;
  cursor: pointer;
  user-select: none;
  display: flex;
  align-items: center;
}
</style>

<div class="card border-top border-0 border-4 border-dark">
    <div class="card-body p-5">
        <div>
            <div class="row">
                <div class="col-6">
                    <div class="float-start">
                        <h5 class="mb-0 text-dark">
                            <i class="fa-duotone fa-user-group me-2 font-22 text-dark"></i>
                            รายชื่อ Member
                        </h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="float-end">
                        <span id="count_list_member"></span>
                    </div>
                    <br>
                    <div class="float-end">
                        แสดงผล <span id="show_count_row"></span>
                    </div>
                </div>
                <div class="col-12">
                    <h6 class="text-danger"><b id="b_loading"></b></h6>
                </div>
            </div>

            <div id="div_for_export" class="row mt-4 d-none">
                <div class="col-2">
                    <label class="cyberpunk-checkbox-label">
                        <input id="select_check_pdpa" type="checkbox" class="cyberpunk-checkbox" onclick ="delay_search_data_in_card();">
                        Check PDPA
                    </label>
                </div>
                <div class="col-2">
                    <label class="cyberpunk-checkbox-label">
                        <input id="select_check_coc" type="checkbox" class="cyberpunk-checkbox" onclick ="delay_search_data_in_card();">
                        Check COC
                    </label>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-start-0" id="search_account" placeholder="ค้นหาด้วยชื่อหรือรหัสตัวแทน" oninput="delay_search_data_in_card();">
                    </div>
                </div>
                <div class="col-3">
                    <select id="search_rank" class="form-select" onchange="search_data_in_card();">
                        <option selected="" value="">All Rank</option>
                        <option value="AG">AG</option>
                        <option value="UM">UM</option>
                        <option value="SUM">SUM</option>
                        <option value="DM">DM</option>
                        <option value="SDM">SDM</option>
                        <option value="AVP">AVP</option>
                        <option value="VP">VP</option>
                        <option value="EVP">EVP</option>
                        <option value="SEVP">SEVP</option>
                    </select>
                </div>
                <!-- <div class="col-1">
                    <button type="button" class="btn btn-primary" onclick="search_data_in_card()">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div> -->
                <div class="col-2">
                    <button id="btn_export_excel" type="button" class="btn btn-outline-secondary float-end" onclick="exportExcel()">
                        Export Excel
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12 mt-2">
            <div id="content_tbody" class="card-body p-0">
                <div class="row">
                    <!-- <table class="table mb-0">
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
                        </tbody>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>

    let currentPage = 1;
    const limit = 350;
    let hasMoreData = true;
    let totalMembers = 0;

    const content_tbody = document.querySelector('#content_tbody');
    const countListMember = document.querySelector('#count_list_member');

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        // get_list_member();
        fetchMembers(currentPage);
    });

    // ฟังก์ชันการดึงข้อมูล
    async function fetchMembers(page) {
        countListMember.textContent = 'กำลังโหลด...'; // แสดงสถานะการโหลด
        document.querySelector('#b_loading').innerHTML = 'กำลังโหลด..' ;
        // console.log('fetchMembers > ' + page);
        
        if (!hasMoreData) return;

        try {
            const response = await fetch(`{{ url('/') }}/api/get_list_member?page=${page}&limit=${limit}`);
            const result = await response.json();
            
            if (result.length < limit) {
                hasMoreData = false;
            }

            totalMembers += result.length; // เพิ่มจำนวนสมาชิกที่ถูกดึง
            result.forEach(item => {

                let html = `
                    <div id_user="`+item.id+`" name_user="${item.name ? item.name : '-'}" account="${item.account ? item.account : '-'}" current_rank="${item.current_rank ? item.current_rank : '-'}" check_pdpa="${item.name ? item.check_pdpa : '-'}" check_coc="${item.name ? item.check_coc : '-'}" class="row member mt-2 mb-2">
                        <div class="col-1">
                            <center>
                                <img style="width: 100%;" src="${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}" class="p-1" alt="">
                            </center>
                        </div>
                        <div class="col-4">
                            <h6>check_pdpa : ${item.check_pdpa ? item.check_pdpa : '-'}</h6>
                            <h6>check_coc : ${item.check_coc ? item.check_coc : '-'}</h6>
                            <h6>Name : ${item.name ? item.name : '-'}</h6>
                            <h6>Account : ${item.account ? item.account : '-'}</h6>
                            <h6>Nickname : ${item.nickname ? item.nickname : '-'}</h6> 
                            <h6>Email : ${item.email ? item.email : '-'}</h6> 
                            <h6>Phone : ${item.phone ? item.phone : '-'}</h6> 
                        </div>
                        <div class="col-4">
                            <h6>Rank : ${item.current_rank ? item.current_rank : '-'}</h6>
                            <h6>Position : ${item.position ? item.position : '-'}</h6>
                            <h6>Organization_name : ${item.organization_name ? item.organization_name : '-'}</h6> 
                            <h6>Branch name : ${item.branch_name ? item.branch_name : '-'}</h6> 
                        </div>
                        <div class="col-3">
                            <h6>License: ${item.license ? item.license : '-'}</h6> 
                            <h6>License Start: ${formatDate(item.license_start)}</h6> 
                            <h6>License Expire : ${formatDate(item.license_expire)}</h6> 
                        </div>
                        <hr>
                    </div>
                `;

                // html = `
                //     <tr account="${item.account ? item.account : '-'}" class="member">
                //         <td>
                //             <div class="product-img">
                //                 <img src="${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}" class="p-1" alt="">
                //                 <span class="d-none">
                //                     ${item.photo ? item.photo : "{{ url('/img/icon/profile.png') }}"}
                //                 </span>
                //             </div>
                //         </td>
                //         <td>${item.name ? item.name : '-'}</td>
                //         <td>${item.nickname ? item.nickname : '-'}</td>
                //         <td>${item.account ? item.account : '-'}</td>
                //         <td>${item.email ? item.email : '-'}</td>
                //         <td>${item.phone ? item.phone : '-'}</td>
                //         <td>${item.current_rank ? item.current_rank : '-'}</td>
                //         <td>${item.position ? item.position : '-'}</td>
                //         <td>${item.organization_name ? item.organization_name : '-'}</td>
                //         <td>${item.branch_name ? item.branch_name : '-'}</td>
                //         <td>${item.license ? item.license : '-'}</td>
                //         <td>${formatDate(item.license_expire)}</td>
                //         <td class="d-none">
                //             <button class="btn btn-sm btn-warning" onclick="edit_upper_al('${item.id ? item.id : '-'}');">
                //                 <i class="fa-solid fa-pen-to-square"></i> Edit
                //             </button>
                //         </td>
                //     </tr>
                // `;
                content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
            });

            if (hasMoreData) {
                currentPage++;
                fetchMembers(currentPage); // เรียกตัวเองซ้ำจนกว่าจะดึงข้อมูลครบ
            } else {
                countListMember.textContent = `สมาชิกทั้งหมด: ${totalMembers.toLocaleString()}`; // อัพเดทจำนวนสมาชิก
                document.querySelector('#b_loading').innerHTML = '' ;
                document.querySelector('#show_count_row').innerHTML = `${totalMembers.toLocaleString()}` ;
                document.querySelector('#div_for_export').classList.remove('d-none');
            }
        } catch (error) {
            console.error('Error fetching members:', error);
            countListMember.textContent = 'เกิดข้อผิดพลาดในการโหลดข้อมูล'; // แสดงข้อความเมื่อเกิดข้อผิดพลาด
            document.querySelector('#b_loading').innerHTML = 'เกิดข้อผิดพลาดในการโหลดข้อมูล' ;
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

let searchTimeout;

function delay_search_data_in_card() {
    // Clear the previous timeout
    clearTimeout(searchTimeout);

    // Set a new timeout
    searchTimeout = setTimeout(function() {
        search_data_in_card();
    }, 1000);
}

async function search_data_in_card() {

    document.querySelector('#b_loading').innerHTML = 'กำลังโหลด..' ;
    let count_row = 0;

    // ดึงค่า input จาก search_account, search_rank, select_check_pdpa และ select_check_coc
    const searchAccount = document.getElementById('search_account').value.trim().toLowerCase();
    const searchRank = document.getElementById('search_rank').value.trim();
    const select_check_pdpa = document.getElementById('select_check_pdpa').checked;
    const select_check_coc = document.getElementById('select_check_coc').checked;

    // ดึงทุก div ที่มี class member
    const members = document.querySelectorAll('.member');

    // ถ้าทั้ง searchAccount, searchRank, select_check_pdpa และ select_check_coc ว่าง ให้แสดงทุก member
    if (!searchAccount && !searchRank && !select_check_pdpa && !select_check_coc) {
        members.forEach(member => {
            member.classList.remove('d-none');
            count_row = count_row + 1;
        });
        document.querySelector('#show_count_row').innerHTML = `${count_row.toLocaleString()}`;
        document.querySelector('#b_loading').innerHTML = '' ;
        return;
    }

    // วนลูปตรวจสอบแต่ละ member
    await members.forEach(member => {
        const nameUser = member.getAttribute('name_user').toLowerCase();
        const account = member.getAttribute('account').toLowerCase();
        const currentRank = member.getAttribute('current_rank');
        const checkPdpa = member.getAttribute('check_pdpa') === 'Yes';
        const checkCoc = member.getAttribute('check_coc') === 'Yes';

        let isAccountMatch = true;
        let isRankMatch = true;
        let isPdpaMatch = true;
        let isCocMatch = true;

        // ตรวจสอบ searchAccount ว่าไม่ว่างและค้นหาใน name_user และ account
        if (searchAccount) {
            isAccountMatch = nameUser.includes(searchAccount) || account.includes(searchAccount);
        }

        // ตรวจสอบ searchRank ว่าไม่ว่างและค้นหาใน current_rank
        if (searchRank) {
            isRankMatch = currentRank === searchRank;
        }

        // ตรวจสอบ select_check_pdpa
        if (select_check_pdpa) {
            isPdpaMatch = checkPdpa;
        }

        // ตรวจสอบ select_check_coc
        if (select_check_coc) {
            isCocMatch = checkCoc;
        }

        // ถ้าเงื่อนไขตรงกันทั้งหมดให้แสดงผล
        if (isAccountMatch && isRankMatch && isPdpaMatch && isCocMatch) {
            member.classList.remove('d-none');
            count_row = count_row + 1;
        } else {
            member.classList.add('d-none');
        }
    });

    document.querySelector('#show_count_row').innerHTML = `${count_row.toLocaleString()}`;
    document.querySelector('#b_loading').innerHTML = '' ;

}



async function fetchUserData(userIds) {
    const chunkSize = 250;
    const userData = [];

    for (let i = 0; i < userIds.length; i += chunkSize) {
        const chunk = userIds.slice(i, i + chunkSize);
        
        // ส่งคำขอไปยัง backend โดยใช้ Fetch API
        const response = await fetch(`{{ url('/') }}/api/getUsers_for_export`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // สำหรับการป้องกัน CSRF
            },
            body: JSON.stringify({ userIds: chunk })
        });

        if (response.ok) {
            const data = await response.json();
            userData.push(...data);
        } else {
            console.error('Failed to fetch data for chunk:', chunk);
        }
    }

    return userData;
}

function exportExcel() {
    const exportButton = document.querySelector('#btn_export_excel');
    exportButton.textContent = "กำลังโหลด..";

    const members = document.querySelectorAll('.member:not(.d-none)');
    const userIds = [];
    members.forEach(member => {
        const userId = member.getAttribute('id_user');
        userIds.push(userId);
    });

    fetchUserData(userIds).then(userData => {
        // console.log(userData);
        
        // สร้างไฟล์ Excel
        const ws = XLSX.utils.json_to_sheet(userData);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Users");

        // สร้างวันที่และเวลาปัจจุบัน
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 10); // รูปแบบ YYYY-MM-DD
        const formattedTime = now.toTimeString().slice(0, 8).replace(/:/g, ""); // รูปแบบ HHMMSS

        const fileName = `ExportUserData-${formattedDate}-${formattedTime}.xlsx`;

        // ดาวน์โหลดไฟล์ Excel
        XLSX.writeFile(wb, fileName);

        exportButton.textContent = "Export Excel";
    }).catch(error => {
        console.error('Error fetching user data:', error);
        exportButton.textContent = "Export Excel";
    });
}

</script>

@endsection
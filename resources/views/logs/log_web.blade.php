@extends('layouts.theme_admin')

@section('content')

<div class="card border-top border-0 border-4 border-dark">
    <div class="card-body p-5">
        <div>
            <div class="row">
                <div class="col-6">
                    <div class="float-start">
                        <h5 class="mb-0 text-dark">
                            <i class="fa-regular fa-globe-pointer me-2 font-22 text-dark"></i>
                            Log Web
                        </h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="float-end">
                        <span id="count_list_log_web"></span>
                    </div>
                    <br>
                    <div class="float-end">
                        แสดงผล <span id="show_count_row"></span>
                    </div>
                </div>
            </div>

            <div id="div_for_export" class="row mt-4 d-none">
                <div class="col-3">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-start-0" id="search_account" placeholder="ค้นหาด้วยชื่อหรือรหัสตัวแทน" oninput="delay_search_data_in_card();">
                    </div>
                </div>
                <div class="col-2">
                    <select id="search_role" class="form-select" onchange="search_data_in_card();">
                        <option selected="" value="">All Role</option>
                        <option value="Super-admin">Super-admin</option>
                        <option value="Admin">Admin</option>
                        <option value="staff">staff</option>
                        <option value="member">member</option>
                    </select>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-start-0" id="search_log_content" placeholder="Log Content" oninput="delay_search_data_in_card();">
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-start-0" id="search_current_rank" placeholder="Rank" oninput="delay_search_data_in_card();">
                    </div>
                </div>
                <div class="col-3">
                    <button id="btn_export_excel" type="button" class="btn btn-outline-secondary float-end" onclick="exportExcel()">
                        Export
                    </button>
                </div>
            </div>

        </div>
        <hr>
        <div class="col-12 mt-2">
        	<div class="row mb-2">
                <div class="col-2"><h6>Datetime</h6></div>
                <div class="col-2"><h6>Log Content</h6></div>
                <div class="col-2"><h6>Account</h6></div>
                <div class="col-2"><h6>Name</h6></div>
                <div class="col-2"><h6>Role</h6></div>
                <div class="col-2"><h6>Rank</h6></div>
            </div>
            <div id="content_tbody" class="card-body p-0">
                <!-- content_tbody -->
            </div>
        </div>
    </div>
</div>

<!-- ใส่ลิงก์ไปยังไลบรารี XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<!-- Include Moment.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
	
	let currentPage = 1;
    const limit = 350;
    let hasMoreData = true;
    let total_log_web = 0;

    const content_tbody = document.querySelector('#content_tbody');
    const count_list_log_web = document.querySelector('#count_list_log_web');

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        fetch_log_web(currentPage);
    });

    // ฟังก์ชันการดึงข้อมูล
    async function fetch_log_web(page) {
        count_list_log_web.textContent = 'กำลังโหลด...'; // แสดงสถานะการโหลด
        // console.log('fetch_log_web > ' + page);
        
        if (!hasMoreData) return;

        try {
            const response = await fetch(`{{ url('/') }}/api/get_list_log_web?page=${page}&limit=${limit}`);
            const result = await response.json();
            
            if (result.length < limit) {
                hasMoreData = false;
            }

            total_log_web += result.length; // เพิ่มจำนวนสมาชิกที่ถูกดึง
            result.forEach(item => {

            	let createdAtText = item.created_at;

				// แปลงรูปแบบของวันที่และเวลา
				let formattedDateTime = moment(createdAtText).format('DD/MM/YYYY HH:mm');

				let html = `
				    <div name_user="${item.name}" account="${item.account}" role="${item.role}" log_content="${item.log_content}" current_rank="${item.current_rank}" class="log-item data_log_web">
				        <div class="card w-100 shadow-sm border-1 border p-3 mt-1">
				            <div class="row view_item_of_user">
				                <div class="col-2 excel_DateTime">${formattedDateTime}</div>
				                <div class="col-2 excel_log_content">${item.log_content}</div>
				                <div class="col-2 excel_account">${item.account}</div>
				                <div class="col-2 excel_name">${item.name}</div>
                                <div class="col-2 excel_role">${item.role}</div>
				                <div class="col-2 excel_current_rank">${item.current_rank}</div>
				            </div>
				        </div>
				    </div>
				`;
                content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
            });

            if (hasMoreData) {
                currentPage++;
                fetch_log_web(currentPage); // เรียกตัวเองซ้ำจนกว่าจะดึงข้อมูลครบ
            } else {
                count_list_log_web.textContent = `ทั้งหมด: ${total_log_web.toLocaleString()}`; // อัพเดทจำนวนสมาชิก
                document.querySelector('#show_count_row').innerHTML = `${total_log_web.toLocaleString()}` ;
                document.querySelector('#div_for_export').classList.remove('d-none');
            }
        } catch (error) {
            console.error('Error fetching members:', error);
            count_list_log_web.textContent = 'เกิดข้อผิดพลาดในการโหลดข้อมูล'; // แสดงข้อความเมื่อเกิดข้อผิดพลาด
        }
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

	function search_data_in_card() {
	    // console.log('search_data_in_card');
	    let count_row = 0;

        // ดึงค่า input จาก search_account, search_role, search_log_content และ search_current_rank
        const searchAccount = document.getElementById('search_account').value.trim().toLowerCase();
        const searchRole = document.getElementById('search_role').value.trim().toLowerCase();
        const searchLogContent = document.getElementById('search_log_content').value.trim().toLowerCase();
        const searchCurrentRank = document.getElementById('search_current_rank').value.trim().toLowerCase();

        // ดึงทุก div ที่มี class data_log_web
        const data_log_web = document.querySelectorAll('.data_log_web');

        // ถ้าทั้ง searchAccount, searchRole, searchLogContent และ searchCurrentRank ว่าง ให้แสดงทุก data_log
        if (!searchAccount && !searchRole && !searchLogContent && !searchCurrentRank) {
            data_log_web.forEach(data_log => {
                data_log.classList.remove('d-none');
                count_row = count_row + 1;
            });
            document.querySelector('#show_count_row').innerHTML = `${count_row.toLocaleString()}`;
            return;
        }

        // วนลูปตรวจสอบแต่ละ data_log
        data_log_web.forEach(data_log => {
            const nameUser = data_log.getAttribute('name_user').toLowerCase();
            const account = data_log.getAttribute('account').toLowerCase();
            const currentRole = data_log.getAttribute('role').toLowerCase();
            const logContent = data_log.getAttribute('log_content').toLowerCase();
            const currentRank = data_log.getAttribute('current_rank').toLowerCase();

            let isAccountMatch = true;
            let isRoleMatch = true;
            let isLogContentMatch = true;
            let isCurrentRankMatch = true;

            // ตรวจสอบ searchAccount ว่าไม่ว่างและค้นหาใน name_user และ account
            if (searchAccount) {
                isAccountMatch = nameUser.includes(searchAccount) || account.includes(searchAccount);
            }

            // ตรวจสอบ searchRole ว่าไม่ว่างและค้นหาใน current_role
            if (searchRole) {
                isRoleMatch = currentRole === searchRole;
            }

            // ตรวจสอบ searchLogContent ว่าไม่ว่างและค้นหาใน log_content
            if (searchLogContent) {
                isLogContentMatch = logContent.includes(searchLogContent);
            }

            // ตรวจสอบ searchCurrentRank ว่าไม่ว่างและค้นหาใน current_rank
            if (searchCurrentRank) {
                isCurrentRankMatch = currentRank.includes(searchCurrentRank);
            }

            // ถ้าเงื่อนไขตรงกันทั้งหมดให้แสดงผล
            if (isAccountMatch && isRoleMatch && isLogContentMatch && isCurrentRankMatch) {
                data_log.classList.remove('d-none');
                count_row = count_row + 1;
            } else {
                data_log.classList.add('d-none');
            }
        });

        document.querySelector('#show_count_row').innerHTML = `${count_row.toLocaleString()}`;
	}

	function exportExcel() {

		const exportButton = document.querySelector('#btn_export_excel');
    	exportButton.textContent = "กำลังโหลด..";

        const sheetNames = ["Log Web"];
        const excelData = {};

        sheetNames.forEach(sheetName => {
            excelData[sheetName] = [];

            const logItems = document.querySelectorAll(`#content_tbody .log-item:not(.d-none)`);

            logItems.forEach(logItem => {
                const name = logItem.getAttribute('name_user');
                const account = logItem.getAttribute('account');

                const viewItems = logItem.querySelectorAll('.view_item_of_user');
                viewItems.forEach(viewItem => {
                    const excelDatetime = viewItem.querySelector('.excel_DateTime').textContent;
                    const excelLogContent = viewItem.querySelector('.excel_log_content').textContent;
                    const excelAccount = viewItem.querySelector('.excel_account').textContent;
                    const excelName = viewItem.querySelector('.excel_name').textContent;
                    const excelRole = viewItem.querySelector('.excel_role').textContent;
                    const excelCurrentRank = viewItem.querySelector('.excel_current_rank').textContent;

                    excelData[sheetName].push({
                        Datetime: excelDatetime,
                        LogContent: excelLogContent,
                        Account: excelAccount,
                        Name: excelName,
                        Role: excelRole,
                        CurrentRank: excelCurrentRank,
                    });
                });
            });
            

        });

        const workbook = XLSX.utils.book_new();

        sheetNames.forEach(sheetName => {
            const worksheet = XLSX.utils.json_to_sheet(excelData[sheetName]);
            XLSX.utils.book_append_sheet(workbook, worksheet, sheetName);
        });

        const datetime = getFormattedDate();
        const filename = `log_web_${datetime}.xlsx`;

        XLSX.writeFile(workbook, filename);

        exportButton.textContent = "Export Excel";
        // console.log('Excel file generated:', filename);
    }

    // ฟังก์ชันเพื่อสร้างวันที่ในรูปแบบ yyyyMMdd_HHmmss
    function getFormattedDate() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        return `${year}${month}${day}_${hours}${minutes}${seconds}`;
    }

</script>

@endsection
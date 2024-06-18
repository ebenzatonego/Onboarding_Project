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
                            รายชื่อ Group Managar
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
                                <th>Organization name</th>
                                <th>Phone</th>
                                <th>Email</th>
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
        group_manager();
    });
group_manager
    function group_manager() {

        fetch("{{ url('/') }}/api/get_group_manager")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let content_tbody = document.querySelector('#content_tbody');
                content_tbody.innerHTML = '';
                result.forEach(item => {

                    let html = `
                        <tr account="${item.account ? item.account : '-'}" class="member">
                            <td>
                                <div class="product-img">
                                    <img src="${item.photo ? item.account : "{{ url('/img/icon/profile.png') }}"}" class="p-1" alt="">
                                    <span class="d-none">
                                    	${item.photo ? item.account : "{{ url('/img/icon/profile.png') }}"}
                                    </span>
                                </div>
                            </td>
                            <td>${item.name ? item.name : '-'}</td>
                            <td>${item.nickname ? item.nickname : '-'}</td>
                            <td>${item.account ? item.account : '-'}</td>
                            <td>${item.organization_name ? item.organization_name : '-'}</td>
                            <td>${item.phone ? item.phone : '-'}</td>
                            <td>${item.email ? item.email : '-'}</td>
                              <td>
                            	<button class="btn btn-sm btn-warning" onclick="edit_upper_al('${item.id ? item.id : '-'}');">
                            		<i class="fa-solid fa-pen-to-square"></i> Edit
                            	</button>
                            </td>
                        </tr>
                    `;
                    content_tbody.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                });
                
            });
    }

    function edit_upper_al(upper_al_id) {
        console.log("upper_al_id >> " + upper_al_id);
    }
</script>

@endsection
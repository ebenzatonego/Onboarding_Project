@extends('layouts.theme_admin')

@section('content')
<style>
    .detail-course{
      color: #767676;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 5px;

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


<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-5">
        <div class="card-title">
            <div class="row">
                <div class="col-6">
                    <h5 class="mb-0 text-primary">
                        <i class="fa-solid fa-list-timeline me-1 font-22 text-primary"></i> การจัดการ Career path
                    </h5>
                </div>
                <div class="col-6">
                    <div class="float-end">
                        <a href="{{ url('/career_path_contents/create') }}" class="btn btn-success btn-sm" title="Add New Career_path_content">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-start mt-2 mb-3">
            <span id="view_rank_AG" class="btn_view_rank btn btn-sm btn-info mx-1" style="width:10%;" onclick="change_view_by_rank('AG')">
                AG
            </span>
            <span id="view_rank_UM" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('UM')">
                UM
            </span>
            <span id="view_rank_SUM" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('SUM')">
                SUM
            </span>
            <span id="view_rank_DM" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('DM')">
                DM
            </span>
            <span id="view_rank_SDM" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('SDM')">
                SDM
            </span>
            <span id="view_rank_AVP" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('AVP')">
                AVP
            </span>
            <span id="view_rank_VP" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('VP')">
                VP
            </span>
            <span id="view_rank_EVP" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('EVP')">
                EVP
            </span>
            <span id="view_rank_SEVP" class="btn_view_rank btn btn-sm btn-outline-info mx-1" style="width:10%;" onclick="change_view_by_rank('SEVP')">
                SEVP
            </span>
        </div>
        <div class="d-flex justify-content-start mt-2 mb-3">
            <span id="view_story_1" class="btn_view_story btn btn-sm btn-secondary mx-1" style="width:10%;" onclick="change_view_by_story('1');">
                Story 1
            </span>
            <span id="view_story_2" class="btn_view_story btn btn-sm btn-outline-secondary mx-1" style="width:10%;" onclick="change_view_by_story('2');">
                Story 2
            </span>
            <span id="view_story_3" class="btn_view_story btn btn-sm btn-outline-secondary mx-1" style="width:10%;" onclick="change_view_by_story('3');">
                Story 3
            </span>
        </div>

        <script>
            function change_view_by_rank(rank){

                let btn_view_rank = document.querySelectorAll('.btn_view_rank');
                    btn_view_rank.forEach(btn_view_rank => {
                        btn_view_rank.classList.remove('btn-info');
                        btn_view_rank.classList.add('btn-outline-info');
                    })

                document.querySelector('#view_rank_'+rank).classList.remove('btn-outline-info');
                document.querySelector('#view_rank_'+rank).classList.add('btn-info');

                now_rank = rank ;

                change_view_by_story("1");
            }

            function change_view_by_story(number_story){

                let btn_view_story = document.querySelectorAll('.btn_view_story');
                    btn_view_story.forEach(btn_view_story => {
                        btn_view_story.classList.remove('btn-secondary');
                        btn_view_story.classList.add('btn-outline-secondary');
                    })

                document.querySelector('#view_story_'+number_story).classList.remove('btn-outline-secondary');
                document.querySelector('#view_story_'+number_story).classList.add('btn-secondary');

                now_story = number_story ;

                get_data_career_path_contents(now_rank, now_story);

            }
        </script>

        <hr>

        <div id="div_content" class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-4">
            <!--  -->
        </div>

    </div>
</div>

<script>

    var now_rank = 'AG';
    var now_story = '1';

    document.addEventListener("DOMContentLoaded", function() {
        get_data_career_path_contents(now_rank, now_story);
    });

    function get_data_career_path_contents(now_rank, now_story){

        fetch("{{ url('/') }}/api/get_data_career_path_contents/" + now_rank + "/" + now_story)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if(result){
                    let div_content = document.querySelector('#div_content');
                        div_content.innerHTML = '';

                    for (let i = 0; i < result.length; i++) {

                        let html_sort_number = create_html_sort_number(result[i].id , result.length , result[i].career_path_id);

                        // Highlight
                        let html_Highlight ;
                        html_Highlight = `<span id="span_Highlight_id_`+result[i].id+`" class="float-end">..</span>`;
                        if(result[i].number){
                            html_Highlight = `
                            <span id="span_Highlight_id_`+result[i].id+`">
                              <i class="i_Highlight fa-solid fa-circle-`+result[i].number+` font-24 float-end text-success"></i>
                            </span>
                            `;
                        }

                        let textWithoutHtml = ``;
                        if(result[i].detail){
                            textWithoutHtml = result[i].detail.replace(/(<([^>]+)>)/gi, "");
                        }

                        let html_icon = ``;
                        let html_read = ``;
                        if (result[i].icon) {
                            if(result[i].icon == 'Article'){
                                html_icon = icon_Article ;
                                if(result[i].read){
                                    html_read = `read : `+result[i].read+` นาที`;
                                }
                            }
                            else if(result[i].icon == 'PDF'){
                                html_icon = icon_PDF ;
                                if(result[i].read){
                                    html_read = `PDF : `+result[i].read+` นาที`;
                                }
                            }
                            else if(result[i].icon == 'Video'){
                                html_icon = icon_Video ;
                                if(result[i].read){
                                    html_read = result[i].read.replace('0 นาที' , '');
                                }
                            }
                            else if(result[i].icon == 'Photo'){
                                html_icon = icon_Photo ;
                                if(result[i].read){
                                    html_read = `Gallery : `+result[i].read+` pictures`;
                                }
                            }
                        }

                        let class_recommend = ``;
                        if(result[i].recommend == 'Yes'){
                            class_recommend = `#15B400`;
                        }
                        else{
                            class_recommend = `#D20000`;
                        }

                        let html = `
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-2">
                                                `+html_icon+`
                                            </div>
                                            <div class="col-10">
                                                <h5 class="card-title">
                                                    `+result[i].title+`
                                                </h5>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2">
                                            <div class="row">
                                                <div class="col-6"  style="font-size: 20px;">
                                                    <b style="color: #0031E8;">`+result[i].name_rank+`</b>
                                                </div>
                                                <div class="col-6">
                                                    <span style="float: right;">
                                                        แนะนำ : <b style="color: `+class_recommend+`;">`+result[i].recommend+`</b>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-4">
                                                   <b>Story `+result[i].number_story+`</b>
                                                </div>
                                                <div class="col-8">
                                                    <span style="float: right;">
                                                        <b style="float: right;">`+result[i].icon+`</b>
                                                        <br>
                                                        `+html_read+`
                                                    </span>
                                                </div>
                                            </div>
                                        </p>
                                        <p class="card-text detail-course mb-2">
                                            `+textWithoutHtml+`
                                        </p>
                                        <hr>
                                        <p class="card-text mb-2">
                                            <b>ลำดับ</b>
                                            `+html_Highlight+`
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <span href="javascript:;" class="btn btn-sm btn-info w-100 d-none">
                                                    <i class="fa-solid fa-money-check-pen"></i> ดูข้อมูล / แก้ไขข้อมูล
                                                </span>
                                                <span href="javascript:;" class="btn btn-sm btn-info w-100">
                                                    soon
                                                </span>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="btn-group w-100">
                                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        จัดลำดับ
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        `+html_sort_number+`
                                                    </div>
                                                    </div>
                                                </div>
                                            <div class="col-6 mt-2">
                                                <form method="POST" action="{{ url('/career_path_contents') }}/`+result[i].id+`" accept-charset="UTF-8" style="display:inline" onsubmit="return confirmDelete(event, this)">
                                                  {{ method_field('DELETE') }}
                                                  {{ csrf_field() }}
                                                  <button type="submit" class="btn btn-danger btn-sm text-center w-100" title="Delete Tools_tutorial">
                                                      &nbsp;<i class="fa-solid fa-trash-can"></i> ลบ
                                                  </button>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        div_content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                    }
                }
        });

    }

    function create_html_sort_number(id , length , career_path_id){
        let html_sort_number = ``;

        for (let xi = 0; xi < length; xi++) {
            let count_r = xi + 1 ;
            if(xi == 0){
                html_sort_number = `
                    <a class="dropdown-item btn" onclick="change_sort_number('`+id+`' , 'ว่าง' , '`+career_path_id+`')">ว่าง</a>
                    <a class="dropdown-item btn" onclick="change_sort_number('`+id+`' , '`+count_r+`' , '`+career_path_id+`')">`+count_r+`</a>
                `;
            }
            else{
                html_sort_number = html_sort_number + `
                    <a class="dropdown-item btn" onclick="change_sort_number('`+id+`' , '`+count_r+`' , '`+career_path_id+`')">`+count_r+`</a>
                `;
            }
        }

        return html_sort_number ;
    }

    function change_sort_number(id , number , type){
    // console.log(id);
    // console.log(number);

    fetch("{{ url('/') }}/api/change_sort_number/" + id  + "/" + number + "/" + type)
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


    var icon_Article = `
        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="32" height="46" viewBox="0 0 32 46" fill="none">
            <path d="M8 30.8572V28.5715H10.2857V30.8572H8Z" fill="#003781"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4286 0C10.5193 0 9.64719 0.361224 9.00421 1.00421C8.36122 1.64719 8 2.51926 8 3.42857H3.42857C2.51926 3.42857 1.64719 3.7898 1.0042 4.43278C0.361223 5.07576 0 5.94783 0 6.85714V42.2857C0 43.195 0.361223 44.0671 1.0042 44.7101C1.64719 45.3531 2.51926 45.7143 3.42857 45.7143H28.5714C29.4807 45.7143 30.3528 45.3531 30.9958 44.7101C31.6388 44.0671 32 43.195 32 42.2857V6.85714C32 5.94783 31.6388 5.07576 30.9958 4.43278C30.3528 3.7898 29.4807 3.42857 28.5714 3.42857H24C24 2.51926 23.6388 1.64719 22.9958 1.00421C22.3528 0.361224 21.4807 0 20.5714 0H11.4286ZM10.2857 3.42857C10.2857 3.12547 10.4061 2.83478 10.6204 2.62045C10.8348 2.40612 11.1255 2.28571 11.4286 2.28571H20.5714C20.8745 2.28571 21.1652 2.40612 21.3796 2.62045C21.5939 2.83478 21.7143 3.12547 21.7143 3.42857V5.71429C21.7143 6.01739 21.5939 6.30808 21.3796 6.52241C21.1652 6.73674 20.8745 6.85714 20.5714 6.85714H11.4286C11.1255 6.85714 10.8348 6.73674 10.6204 6.52241C10.4061 6.30808 10.2857 6.01739 10.2857 5.71429V3.42857ZM6.85714 18.2857C6.55404 18.2857 6.26335 18.4061 6.04902 18.6204C5.83469 18.8348 5.71429 19.1255 5.71429 19.4286C5.71429 19.7317 5.83469 20.0224 6.04902 20.2367C6.26335 20.451 6.55404 20.5714 6.85714 20.5714H14.8571C15.1602 20.5714 15.4509 20.451 15.6653 20.2367C15.8796 20.0224 16 19.7317 16 19.4286C16 19.1255 15.8796 18.8348 15.6653 18.6204C15.4509 18.4061 15.1602 18.2857 14.8571 18.2857H6.85714ZM5.71429 13.7143C5.71429 13.4112 5.83469 13.1205 6.04902 12.9062C6.26335 12.6918 6.55404 12.5714 6.85714 12.5714H24.5714C24.8745 12.5714 25.1652 12.6918 25.3796 12.9062C25.5939 13.1205 25.7143 13.4112 25.7143 13.7143C25.7143 14.0174 25.5939 14.3081 25.3796 14.5224C25.1652 14.7367 24.8745 14.8571 24.5714 14.8571H6.85714C6.55404 14.8571 6.26335 14.7367 6.04902 14.5224C5.83469 14.3081 5.71429 14.0174 5.71429 13.7143ZM5.71429 27.4286C5.71429 27.1255 5.83469 26.8348 6.04902 26.6204C6.26335 26.4061 6.55404 26.2857 6.85714 26.2857H11.4286C11.7317 26.2857 12.0224 26.4061 12.2367 26.6204C12.451 26.8348 12.5714 27.1255 12.5714 27.4286V32C12.5714 32.3031 12.451 32.5938 12.2367 32.8081C12.0224 33.0225 11.7317 33.1429 11.4286 33.1429H6.85714C6.55404 33.1429 6.26335 33.0225 6.04902 32.8081C5.83469 32.5938 5.71429 32.3031 5.71429 32V27.4286ZM20.5714 32C21.4807 32 22.3528 31.6388 22.9958 30.9958C23.6388 30.3528 24 29.4807 24 28.5714C24 27.6621 23.6388 26.79 22.9958 26.1471C22.3528 25.5041 21.4807 25.1429 20.5714 25.1429C19.6621 25.1429 18.79 25.5041 18.1471 26.1471C17.5041 26.79 17.1429 27.6621 17.1429 28.5714C17.1429 29.4807 17.5041 30.3528 18.1471 30.9958C18.79 31.6388 19.6621 32 20.5714 32ZM13.7143 37.1429C13.7143 34.7246 18.2823 33.5063 20.5714 33.5063C22.8606 33.5063 27.4286 34.7246 27.4286 37.1429V40H13.7143V37.1429Z" fill="#003781"></path>
        </svg>
    `;

    var icon_PDF = `
        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="36" height="40" viewBox="0 0 36 40" fill="none">
            <path d="M32 0H6C3.588 0 0 1.598 0 6V34C0 38.402 3.588 40 6 40H36V36H6.024C5.1 35.976 4 35.612 4 34C4 33.798 4.018 33.618 4.048 33.454C4.272 32.302 5.216 32.02 6.024 32H36V4C36 2.93913 35.5786 1.92172 34.8284 1.17157C34.0783 0.421427 33.0609 0 32 0ZM32 18L28 16L24 18V4H32V18Z" fill="#003781"></path>
        </svg>
    `;

    var icon_Video = `
        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="42" height="39" viewBox="0 0 42 39" fill="none">
            <path d="M7 0C5.14348 0 3.36301 0.741888 2.05025 2.06246C0.737498 3.38303 0 5.1741 0 7.04167V26.5417C0 28.4092 0.737498 30.2003 2.05025 31.5209C3.36301 32.8414 5.14348 33.5833 7 33.5833H29.6154C31.4719 33.5833 33.2524 32.8414 34.5651 31.5209C35.8779 30.2003 36.6154 28.4092 36.6154 26.5417V7.04167C36.6154 5.1741 35.8779 3.38303 34.5651 2.06246C33.2524 0.741888 31.4719 0 29.6154 0H7ZM12.9231 22.2083V10.2938C12.9232 10.0022 13.0013 9.71592 13.1493 9.4651C13.2972 9.21428 13.5096 9.00814 13.764 8.86831C14.0184 8.72848 14.3056 8.66011 14.5953 8.67038C14.8851 8.68065 15.1667 8.76917 15.4108 8.92667L25.3572 15.3378C25.5093 15.4358 25.6344 15.5708 25.7211 15.7302C25.8078 15.8896 25.8532 16.0683 25.8532 16.25C25.8532 16.4317 25.8078 16.6104 25.7211 16.7698C25.6344 16.9292 25.5093 17.0642 25.3572 17.1622L15.4108 23.5733C15.1667 23.7308 14.8851 23.8194 14.5953 23.8296C14.3056 23.8399 14.0184 23.7715 13.764 23.6317C13.5096 23.4919 13.2972 23.2857 13.1493 23.0349C13.0013 22.7841 12.9232 22.4978 12.9231 22.2062M12.3846 39C11.2087 39.0005 10.0517 38.703 9.02025 38.135C7.98881 37.567 7.11624 36.7468 6.48308 35.75H30.6923C32.8344 35.75 34.8888 34.894 36.4036 33.3702C37.9183 31.8465 38.7692 29.7799 38.7692 27.625V6.52167C39.7601 7.1586 40.5755 8.03637 41.1401 9.07394C41.7048 10.1115 42.0005 11.2755 42 12.4583V27.625C42 33.9083 36.9385 39 30.6923 39H12.3846Z" fill="#003781"></path>
        </svg>
    `;

    var icon_Photo = `
        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
            <path d="M29.8347 9.2688H12.224C10.6019 9.2688 9.26953 10.6012 9.26953 12.2232V29.7761C9.26953 31.1664 10.1964 32.2671 11.4709 32.6147L25.0265 19.1169C26.6486 17.4949 29.3134 17.4949 30.9933 19.1169L32.7892 20.9128V12.2232C32.7313 10.6012 31.4568 9.2688 29.8347 9.2688ZM16.6846 21.4341C14.1357 21.4341 12.1081 19.4066 12.1081 16.8577C12.1081 14.3087 14.1357 12.2812 16.6846 12.2812C19.2335 12.2812 21.2611 14.3087 21.2611 16.8577C21.2611 19.4066 19.2335 21.4341 16.6846 21.4341Z" fill="#003781"></path>
            <path d="M16.6838 18.8852C17.8036 18.8852 18.7114 17.9774 18.7114 16.8576C18.7114 15.7378 17.8036 14.8301 16.6838 14.8301C15.564 14.8301 14.6562 15.7378 14.6562 16.8576C14.6562 17.9774 15.564 18.8852 16.6838 18.8852Z" fill="#003781"></path>
            <path d="M26.8217 20.9127L15.0039 32.7304H29.834C31.4561 32.7304 32.7885 31.398 32.7885 29.776V24.4464L29.1968 20.8547C28.5596 20.2754 27.4589 20.2754 26.8217 20.9127Z" fill="#003781"></path>
            <path d="M33.1361 0H8.86332C3.99718 0 0 3.99718 0 8.86332V33.1361C0 38.0601 3.99718 41.9994 8.86332 41.9994H33.1361C38.0601 41.9994 41.9994 38.0022 41.9994 33.1361V8.86332C42.0573 3.99718 38.0601 0 33.1361 0ZM35.2795 29.834C35.2795 32.8464 32.8464 35.3374 29.7761 35.3374H12.2233C9.2109 35.3374 6.7199 32.9043 6.7199 29.834V12.2233C6.7199 9.2109 9.15297 6.7199 12.2233 6.7199H29.7761C32.7885 6.7199 35.2795 9.15297 35.2795 12.2233V29.834Z" fill="#003781"></path>
        </svg>
    `;
</script>
@endsection

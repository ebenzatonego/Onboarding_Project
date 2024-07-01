<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.img-container {
  width: 100%;
  height: 70vh;
  margin-top: 10px;
}
.preview_photo_crop img {
  max-width: 100%;
  height: auto;
}

</style>
<!-- Modal for cropping -->
<div class="modal fade" id="cropModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header row">
        <div class="col-3">
          <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
        </div>
        <div class="col-9">
          <div class="float-end">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#cropModal').modal('hide');">Close</button>
            <button type="button" class="btn btn-primary" id="cropAndSave">Crop and Save</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <img id="imageToCrop" src="" alt="Picture">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
    <div class="card-body">
        <p class="text-danger">*หากต้องการปิดเมนู กดปุ่ม "<u>แก้ไข</u>" และลบข้อมูล "<u>Title Story</u>" ออก</p>
        <ul id="ul_menu_tab" class="nav nav-tabs nav-success mb-3" role="tablist">
            <!-- ul_menu_tab -->
        </ul>
        <div id="div_content_tab" class="tab-content">
            <!-- Tab AG -->
            @include ('career_path_contents.div_content_tab.ag')

            <!-- Tab UM -->
            @include ('career_path_contents.div_content_tab.um')

            <!-- Tab SUM -->
            @include ('career_path_contents.div_content_tab.sum')

            <!-- Tab DM -->
            @include ('career_path_contents.div_content_tab.dm')

            <!-- Tab SDM -->
            @include ('career_path_contents.div_content_tab.sdm')

            <!-- Tab AVP -->
            @include ('career_path_contents.div_content_tab.avp')

            <!-- Tab VP -->
            @include ('career_path_contents.div_content_tab.vp')

            <!-- Tab EVP -->
            @include ('career_path_contents.div_content_tab.svp')

            <!-- Tab SEVP -->
            @include ('career_path_contents.div_content_tab.esvp')
        </div>

        <div class="mt-5">
            @include ('career_path_contents.show_add_content')
        </div>
    </div>
</div>

<script>

    var cropper;
    var image = document.getElementById('imageToCrop');

    document.addEventListener("DOMContentLoaded", function() {
        create_ul_menu_tab();
        open_tab_AG();

        $('#cropModal').on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                dragMode: 'move',
                aspectRatio: 406 / 160,
                autoCropArea: 1,
                center: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                maxCropBoxHeight: 300,
                viewMode: 2,
                guides: false,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;

            input_ag_1.value = null;
            input_ag_2.value = null;
            input_ag_3.value = null;

            input_um_1.value = null;
            input_um_2.value = null;
            input_um_3.value = null;

            input_sum_1.value = null;
            input_sum_2.value = null;
            input_sum_3.value = null;

            input_dm_1.value = null;
            input_dm_2.value = null;
            input_dm_3.value = null;

            input_sdm_1.value = null;
            input_sdm_2.value = null;
            input_sdm_3.value = null;

            input_avp_1.value = null;
            input_avp_2.value = null;
            input_avp_3.value = null;

            input_vp_1.value = null;
            input_vp_2.value = null;
            input_vp_3.value = null;

            input_svp_1.value = null;
            input_svp_2.value = null;
            input_svp_3.value = null;

            input_esvp_1.value = null;
            input_esvp_2.value = null;
            input_esvp_3.value = null;
        });

    });

    function create_ul_menu_tab(){
        let ul_menu_tab = document.querySelector('#ul_menu_tab');
        const arr_rank = ['AG','UM','SUM','DM','SDM','AVP','VP','EVP','SEVP'];

        for (let i = 0; i < arr_rank.length; i++) {

            let active = ``;
            if(arr_rank[i] == 'AG'){
                active = 'active';
            }

            let html = `
                <li class="nav-item" role="presentation" onclick="open_tab_`+arr_rank[i]+`();">
                    <a class="nav-link `+active+`" data-bs-toggle="pill" href="#pills-`+arr_rank[i]+`" role="tab" aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-title">`+arr_rank[i]+`</div>
                        </div>
                    </a>
                </li>
            `;

            ul_menu_tab.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

        }
    }
    
    function edit_title_story(rank , number) {
        document.querySelector('#div_show_title_'+rank+'_'+number).classList.add('d-none');
        document.querySelector('#div_edit_title_'+rank+'_'+number).classList.remove('d-none');
    }

    function cf_edit_title_story(rank , number) {
        // console.log('cf_edit_title_story >> ' + rank +"-"+ number);
        let preview_photo = document.querySelector('#preview_photo_story_story_'+rank+'_'+number);
        let imgElements = preview_photo.querySelector('img');
            // console.log(imgElements.src);
        if(imgElements){
            uploadBlobToFirebase(imgElements.src, rank, number);
        }else{
            let title_story = document.querySelector('#title_story_'+rank+'_'+number);
            let description_story = document.querySelector('#description_story_'+rank+'_'+number)

            let data_arr = {
                "name_rank" : rank,
                "number_story" : number,
                "title_story" : title_story.value,
                "description_story" : description_story.value,
                "photo_story" : "",
            }; 

            fetch("{{ url('/') }}/api/update_title_story_career_path", {
                method: 'post',
                body: JSON.stringify(data_arr),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (response){
                return response.text();
            }).then(function(data){
                // console.log(data);
                if(data == 'success'){
                    document.querySelector('#h3_title_'+rank+'_'+number).innerHTML = title_story.value;
                    document.querySelector('#h3_description_'+rank+'_'+number).innerHTML = description_story.value;
                    // let h3_photo_story = document.querySelector('#h3_photo_story_'+rank+'_'+number);
                    //     h3_photo_story.innerHTML = `
                    //         <img src="`+downloadURL+`" style="width: 100%;">
                    //     `;
                    document.querySelector('#div_edit_title_'+rank+'_'+number).classList.add('d-none');
                    document.querySelector('#div_show_title_'+rank+'_'+number).classList.remove('d-none');
                }
            }).catch(function(error){
                // console.error(error);
            });
        }
        
    }

    async function uploadBlobToFirebase(blobUrl, rank, number) {

        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-' + rank + "_" + number;
            let storageRef = storage.ref('/career_paths/image/photo_story/' + name_file);

            let uploadTask = storageRef.put(blob);

            uploadTask.on('state_changed',
                function(snapshot) {
                    // ติดตามความคืบหน้าของการอัพโหลด (optional)
                },
                function(error) {
                    // กรณีเกิดข้อผิดพลาดในการอัพโหลด
                    console.error('Upload failed:', error);
                },
                function() {
                    // เมื่ออัพโหลดสำเร็จ
                    uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                        // console.log(downloadURL);

                        let title_story = document.querySelector('#title_story_'+rank+'_'+number);
                        let description_story = document.querySelector('#description_story_'+rank+'_'+number)

                        let data_arr = {
                            "name_rank" : rank,
                            "number_story" : number,
                            "title_story" : title_story.value,
                            "description_story" : description_story.value,
                            "photo_story" : downloadURL,
                        }; 

                        fetch("{{ url('/') }}/api/update_title_story_career_path", {
                            method: 'post',
                            body: JSON.stringify(data_arr),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(function (response){
                            return response.text();
                        }).then(function(data){
                            // console.log(data);
                            if(data == 'success'){
                                document.querySelector('#h3_title_'+rank+'_'+number).innerHTML = title_story.value;
                                document.querySelector('#h3_description_'+rank+'_'+number).innerHTML = description_story.value;
                                let h3_photo_story = document.querySelector('#h3_photo_story_'+rank+'_'+number);
                                    h3_photo_story.innerHTML = `
                                        <img src="`+downloadURL+`" style="width: 100%;">
                                    `;
                                document.querySelector('#div_edit_title_'+rank+'_'+number).classList.add('d-none');
                                document.querySelector('#div_show_title_'+rank+'_'+number).classList.remove('d-none');
                            }
                        }).catch(function(error){
                            // console.error(error);
                        });
                    });
                }
            );
        } catch (error) {
            console.error('Error fetching the Blob:', error);
        }
    }

</script>

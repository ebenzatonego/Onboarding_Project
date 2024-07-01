<div class="tab-pane fade" id="pills-EVP" role="tabpanel">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <span id="btn_view_evp_1" class="btn btn-sm btn-secondary" onclick="click_change_view_evp('1')">
                EVP Story 1
            </span>
            <span id="btn_view_evp_2" class="btn btn-sm btn-outline-secondary" onclick="click_change_view_evp('2')">
                EVP Story 2
            </span>
            <span id="btn_view_evp_3" class="btn btn-sm btn-outline-secondary" onclick="click_change_view_evp('3')">
                EVP Story 3
            </span>
        </div>

        <script>
            function click_change_view_evp(number) {
                document.querySelector('#btn_view_evp_1').classList.remove('btn-secondary');
                document.querySelector('#btn_view_evp_2').classList.remove('btn-secondary');
                document.querySelector('#btn_view_evp_3').classList.remove('btn-secondary');

                document.querySelector('#btn_view_evp_1').classList.add('btn-outline-secondary');
                document.querySelector('#btn_view_evp_2').classList.add('btn-outline-secondary');
                document.querySelector('#btn_view_evp_3').classList.add('btn-outline-secondary');

                document.querySelector('#btn_view_evp_'+number).classList.add('btn-secondary');
                document.querySelector('#btn_view_evp_'+number).classList.remove('btn-outline-secondary');

                document.querySelector('#div_evp_story_1').classList.add('d-none');
                document.querySelector('#div_evp_story_2').classList.add('d-none');
                document.querySelector('#div_evp_story_3').classList.add('d-none');

                document.querySelector('#div_evp_story_'+number).classList.remove('d-none');

                document.querySelector('#now_add_content').innerHTML = "AG Story "+number ;

                let for_get_id_evp = document.querySelector('#for_get_id_evp_'+number).value; 
                document.querySelector('#career_path_id').value = for_get_id_evp;

            }
        </script>
    </div>

    <!-- evp_story_1 -->
    <div id="div_evp_story_1" class="mt-3">
        <!-- แก้ไขข้อมูล Title Story -->
        @php
            $data_evp[1] = App\Models\Career_path::where('name_rank','EVP')
                ->where('number_story','1')
                ->select('title_story','description_story','photo_story','id')
                ->first();
        @endphp
        <input type="text" id="for_get_id_evp_1" value="{{ $data_evp[1]->id }}" class="d-none">
        <div id="div_show_title_evp_1" class="row">
            <div class="col-3">
                <label for="title_story_evp_1" class="control-label">{{ 'Title Story 1' }}</label>
                <h3 id="h3_title_evp_1">
                    {{ isset($data_evp[1]->title_story) ? $data_evp[1]->title_story : '-'}}
                </h3>
            </div>
            <div class="col-4">
                <label for="description_story_evp_1" class="control-label">{{ 'Description Story 1' }}</label>
                <h3 id="h3_description_evp_1">
                    {{ isset($data_evp[1]->description_story) ? $data_evp[1]->description_story : '-'}}
                </h3>
            </div>
            <div class="col-3">
                <label class="control-label">{{ 'Photo Story 1' }}</label>
                <div id="h3_photo_story_evp_1">
                    @if( !empty($data_evp[1]->photo_story) )
                        <img src="{{ $data_evp[1]->photo_story }}" style="width: 100%;">
                    @else
                        <p>ไม่มีรูปภาพ</p>
                    @endif
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <span type="button" class="btn btn-sm btn-warning" onclick="edit_title_story('evp' , '1')">
                    แก้ไข
                </span>
            </div>
        </div>
        <div id="div_edit_title_evp_1" class="row d-none">
            <div class="col-3">
                <label for="title_story_evp_1" class="control-label">{{ 'Title Story 1' }}</label>
                <input class="form-control" name="title_story_evp_1" type="text" id="title_story_evp_1" value="{{ isset($data_evp[1]->title_story) ? $data_evp[1]->title_story : ''}}" >
            </div>
            <div class="col-4">
                <label for="description_story_evp_1" class="control-label">{{ 'Description Story 1' }}</label>
                <textarea class="form-control" rows="3" name="description_story_evp_1" type="textarea" id="description_story_evp_1" >{{ isset($data_evp[1]->description_story) ? $data_evp[1]->description_story : ''}}</textarea>
            </div>
            <div class="col-3">
                <label class="control-label">{{ 'Photo Story 1' }} <span class="text-danger">(ขนาด 406*160 px)</span></label>
                <input type="File" name="photo_story_story_evp_1" id="photo_story_story_evp_1" accept="image/*">
                <div id="preview_photo_story_story_evp_1" class="preview_photo_crop">
                    <!-- preview_photo_story_story_evp_1 -->
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <span type="button" class="btn btn-sm btn-success" onclick="cf_edit_title_story('evp' , '1')">ยืนยันการเปลี่ยนแปลง</span>
            </div>
        </div>

        <hr>

    </div>

    <!-- evp_story_2 -->
    <div id="div_evp_story_2" class="mt-3 d-none">
        <!-- แก้ไขข้อมูล Title Story -->
        @php
            $data_evp[2] = App\Models\Career_path::where('name_rank','EVP')
                ->where('number_story','2')
                ->select('title_story','description_story','photo_story','id')
                ->first();
        @endphp
        <input type="text" id="for_get_id_evp_2" value="{{ $data_evp[2]->id }}" class="d-none">
        <div id="div_show_title_evp_2" class="row">
            <div class="col-3">
                <label for="title_story_evp_2" class="control-label">{{ 'Title Story 2' }}</label>
                <h3 id="h3_title_evp_2">
                    {{ isset($data_evp[2]->title_story) ? $data_evp[2]->title_story : '-'}}
                </h3>
            </div>
            <div class="col-4">
                <label for="description_story_evp_2" class="control-label">{{ 'Description Story 2' }}</label>
                <h3 id="h3_description_evp_2">
                    {{ isset($data_evp[2]->description_story) ? $data_evp[2]->description_story : '-'}}
                </h3>
            </div>
            <div class="col-3">
                <label class="control-label">{{ 'Photo Story 2' }}</label>
                <div id="h3_photo_story_evp_2">
                    @if( !empty($data_evp[2]->photo_story) )
                        <img src="{{ $data_evp[2]->photo_story }}" style="width: 100%;">
                    @else
                        <p>ไม่มีรูปภาพ</p>
                    @endif
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <span type="button" class="btn btn-sm btn-warning" onclick="edit_title_story('evp' , '2')">
                    แก้ไข
                </span>
            </div>
        </div>
        <div id="div_edit_title_evp_2" class="row d-none">
            <div class="col-3">
                <label for="title_story_evp_2" class="control-label">{{ 'Title Story 2' }}</label>
                <input class="form-control" name="title_story_evp_2" type="text" id="title_story_evp_2" value="{{ isset($data_evp[2]->title_story) ? $data_evp[2]->title_story : ''}}" >
            </div>
            <div class="col-4">
                <label for="description_story_evp_2" class="control-label">{{ 'Description Story 2' }}</label>
                <textarea class="form-control" rows="3" name="description_story_evp_2" type="textarea" id="description_story_evp_2" >{{ isset($data_evp[2]->description_story) ? $data_evp[2]->description_story : ''}}</textarea>
            </div>
            <div class="col-3">
                <label class="control-label">{{ 'Photo Story 2' }} <span class="text-danger">(ขนาด 406*160 px)</span></label>
                <input type="File" name="photo_story_story_evp_2" id="photo_story_story_evp_2" accept="image/*">
                <div id="preview_photo_story_story_evp_2" class="preview_photo_crop">
                    <!-- preview_photo_story_story_evp_2 -->
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <span type="button" class="btn btn-sm btn-success" onclick="cf_edit_title_story('evp' , '2')">ยืนยันการเปลี่ยนแปลง</span>
            </div>
        </div>

        <hr>

    </div>

    <!-- evp_story_3 -->
    <div id="div_evp_story_3" class="mt-3 d-none">
        <!-- แก้ไขข้อมูล Title Story -->
        @php
            $data_evp[3] = App\Models\Career_path::where('name_rank','EVP')
                ->where('number_story','3')
                ->select('title_story','description_story','photo_story','id')
                ->first();
        @endphp
        <input type="text" id="for_get_id_evp_3" value="{{ $data_evp[3]->id }}" class="d-none">
        <div id="div_show_title_evp_3" class="row">
            <div class="col-3">
                <label for="title_story_evp_3" class="control-label">{{ 'Title Story 3' }}</label>
                <h3 id="h3_title_evp_3">
                    {{ isset($data_evp[3]->title_story) ? $data_evp[3]->title_story : '-'}}
                </h3>
            </div>
            <div class="col-4">
                <label for="description_story_evp_3" class="control-label">{{ 'Description Story 3' }}</label>
                <h3 id="h3_description_evp_3">
                    {{ isset($data_evp[3]->description_story) ? $data_evp[3]->description_story : '-'}}
                </h3>
            </div>
            <div class="col-3">
                <label class="control-label">{{ 'Photo Story 3' }}</label>
                <div id="h3_photo_story_evp_3">
                    @if( !empty($data_evp[3]->photo_story) )
                        <img src="{{ $data_evp[3]->photo_story }}" style="width: 100%;">
                    @else
                        <p>ไม่มีรูปภาพ</p>
                    @endif
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <span type="button" class="btn btn-sm btn-warning" onclick="edit_title_story('evp' , '3')">
                    แก้ไข
                </span>
            </div>
        </div>
        <div id="div_edit_title_evp_3" class="row d-none">
            <div class="col-3">
                <label for="title_story_evp_3" class="control-label">{{ 'Title Story 3' }}</label>
                <input class="form-control" name="title_story_evp_3" type="text" id="title_story_evp_3" value="{{ isset($data_evp[3]->title_story) ? $data_evp[3]->title_story : ''}}" >
            </div>
            <div class="col-4">
                <label for="description_story_evp_3" class="control-label">{{ 'Description Story 3' }}</label>
                <textarea class="form-control" rows="3" name="description_story_evp_3" type="textarea" id="description_story_evp_3" >{{ isset($data_evp[3]->description_story) ? $data_evp[3]->description_story : ''}}</textarea>
            </div>
            <div class="col-3">
                <label class="control-label">{{ 'Photo Story 3' }} <span class="text-danger">(ขนาด 406*160 px)</span></label>
                <input type="File" name="photo_story_story_evp_3" id="photo_story_story_evp_3" accept="image/*">
                <div id="preview_photo_story_story_evp_3" class="preview_photo_crop">
                    <!-- preview_photo_story_story_evp_3 -->
                </div>
            </div>
            <div class="col-2 d-flex align-items-center">
                <span type="button" class="btn btn-sm btn-success" onclick="cf_edit_title_story('evp' , '3')">ยืนยันการเปลี่ยนแปลง</span>
            </div>
        </div>

        <hr>

    </div>


</div>

<script>

function crop_img(rank , number){

    let previewContainer = document.getElementById('preview_photo_story_story_'+rank+'_'+number);

    let canvas = cropper.getCroppedCanvas({
      width: 406,
      height: 160
    });

    canvas.toBlob(function (blob) {
      let url = URL.createObjectURL(blob);
      let img = document.createElement('img');
      img.src = url;
      previewContainer.innerHTML = '';
      previewContainer.appendChild(img);
      $('#cropModal').modal('hide');
    });

}
    
var input_evp_1 = document.getElementById('photo_story_story_evp_1');
var input_evp_2 = document.getElementById('photo_story_story_evp_2');
var input_evp_3 = document.getElementById('photo_story_story_evp_3');

function open_tab_EVP(){

    document.querySelector('#now_add_content').innerHTML = "EVP Story 1" ;
                
    let for_get_id_evp = document.querySelector('#for_get_id_evp_1').value; 
    document.querySelector('#career_path_id').value = for_get_id_evp;

    input_evp_1.addEventListener('change', function (event) {
        // console.log('input_evp_1');
        let files = event.target.files;

        if (files && files.length > 0) {
            let reader = new FileReader();
            reader.onload = function (e) {
            image.src = e.target.result;
                $('#cropModal').modal('show');
            };
            reader.readAsDataURL(files[0]);
        }

        $('#cropModal').modal({
            backdrop: 'static',
            keyboard: false
        });

        document.querySelector('#cropAndSave').setAttribute('onclick' , 'crop_img("evp","1")');
    });

    input_evp_2.addEventListener('change', function (event) {
        // console.log('input_evp_2');
        let files = event.target.files;

        if (files && files.length > 0) {
            let reader = new FileReader();
            reader.onload = function (e) {
            image.src = e.target.result;
                $('#cropModal').modal('show');
            };
            reader.readAsDataURL(files[0]);
        }

        $('#cropModal').modal({
            backdrop: 'static',
            keyboard: false
        });

        document.querySelector('#cropAndSave').setAttribute('onclick' , 'crop_img("evp","2")');
    });

    input_evp_3.addEventListener('change', function (event) {
        // console.log('input_evp_3');
        let files = event.target.files;

        if (files && files.length > 0) {
            let reader = new FileReader();
            reader.onload = function (e) {
            image.src = e.target.result;
                $('#cropModal').modal('show');
            };
            reader.readAsDataURL(files[0]);
        }

        $('#cropModal').modal({
            backdrop: 'static',
            keyboard: false
        });

        document.querySelector('#cropAndSave').setAttribute('onclick' , 'crop_img("evp","3")');
    });


}


</script>
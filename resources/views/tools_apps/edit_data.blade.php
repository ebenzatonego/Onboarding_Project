@extends('layouts.theme_admin')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
	.img-container {
  width: 100%;
/*  height: 40vh;*/
  margin-top: 10px;
}
#imageToCrop  {
  max-width: 100%;
  height: auto;
}
</style>

@php
	$class_for_link_web = 'd-none' ;
	$class_for_link_ios = 'd-none' ;
	$class_for_link_android = 'd-none' ;

	if($tools_app->type == 'แอปพลิเคชั่น'){
		$class_for_link_ios = '' ;
		$class_for_link_android = '' ;
	}
	else{
		$class_for_link_web = '' ;
	}
@endphp

<a id="goto_manage_tools_apps" href="{{ url('/manage_tools_apps') }}" class="d-none"></a>

<div class="card border-top border-0 border-4 border-primary">
	<div class="card-body p-5">
		<div class="card-title d-flex align-items-center">
			<h5 class="mb-0 text-primary">แก้ไขข้อมูล</h5>
		</div>
		<hr>
		<div class="row g-3">
			<div class="col-md-3">
				<img id="preview_photo_icon" class="w-100" src="{{ isset($tools_app->photo_icon) ? $tools_app->photo_icon : 'http://localhost/Onboarding_Project/public/img/icon/icon-tools1.png'}}">
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<label for="edit_name" class="form-label">Name</label>
						<input type="text" class="form-control" id="edit_name" value="{{ isset($tools_app->name) ? $tools_app->name : ''}}">
					</div>
					<div class="col-md-12 mt-3">
						<label for="edit_type" class="form-label">Type</label>
						<select id="edit_type" class="form-select" onchange="change_type_tools_app();">
							@if($tools_app->type == 'แอปพลิเคชั่น')
								<option selected="" value="แอปพลิเคชั่น">แอปพลิเคชั่น</option>
								<option value="เว็บไซต์">เว็บไซต์</option>
							@else
								<option value="แอปพลิเคชั่น">แอปพลิเคชั่น</option>
								<option selected="" value="เว็บไซต์">เว็บไซต์</option>
							@endif
						</select>
					</div>
					<div class="col-md-12 mt-3">
						<label for="select_photo" class="form-label">Icon</label>
						<br>
						<button type="button" class="btn btn-primary me-2" onclick="document.querySelector('#select_photo').click();">
                            <i class="fa-solid fa-image"></i> เลือกรูปภาพ
                        </button>
                        <input class="form-control d-none" name="select_photo" type="file" id="select_photo" accept="image/*">
                        <input class="form-control d-none" name="photo_icon" type="text" id="photo_icon" value="{{ isset($tools_app->photo_icon) ? $tools_app->photo_icon : ''}}">
					</div>
				</div>
			</div>
			<div id="div_for_link_web" class="col-md-12 {{ $class_for_link_web }}">
				<label for="edit_link_web" class="form-label">Link Web</label>
				<input type="text" class="form-control" id="edit_link_web" value="{{ isset($tools_app->link_web) ? $tools_app->link_web : ''}}">
			</div>
			<div id="div_for_link_ios" class="col-md-12 {{ $class_for_link_ios }}">
				<label for="edit_link_ios" class="form-label">Link IOS</label>
				<input type="text" class="form-control" id="edit_link_ios" value="{{ isset($tools_app->link_ios) ? $tools_app->link_ios : ''}}">
			</div>
			<div id="div_for_link_android" class="col-md-12 {{ $class_for_link_android }}">
				<label for="edit_link_android" class="form-label">Link_Android</label>
				<input type="text" class="form-control" id="edit_link_android" value="{{ isset($tools_app->link_android) ? $tools_app->link_android : ''}}">
			</div>
			<div class="col-12">
				<label for="edit_detail" class="form-label">Detail</label>
				<textarea class="form-control" id="edit_detail" rows="3">{{ isset($tools_app->detail) ? $tools_app->detail : ''}}</textarea>
				<textarea class="form-control d-none" rows="5" name="for_detail" type="textarea" id="for_detail">{{ isset($tools_app->detail) ? $tools_app->detail : ''}}</textarea>
			</div>
			<div class="modal-footer d-flex justify-content-center">
	        	<button type="button" class="btn btn-secondary mx-1" data-dismiss="modal" style="width:20%;">
	        		ยกเลิก
	        	</button>
	        	<button id="btn_cf_edit_data" type="button" class="btn btn-primary mx-1" style="width:20%;" onclick="cf_edit_data();">
	        		<span id="span_load_save" class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
	        		ยืนยัน
	        	</button>
	      	</div>
		</div>
	</div>
</div>

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

<script>

	var cropper;
    var image = document.getElementById('imageToCrop');

	document.addEventListener("DOMContentLoaded", function() {

		$('#cropModal').on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                dragMode: 'move',
                aspectRatio: 1 / 1,
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
        });

		let select_photo = document.querySelector('#select_photo');

        select_photo.addEventListener('change', function (event) {
            // console.log('input_ag_1');
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

            document.querySelector('#cropAndSave').setAttribute('onclick' , 'crop_img()');
        });

	});

	function crop_img(){

        let previewContainer = document.getElementById('preview_photo_icon');

        let canvas = cropper.getCroppedCanvas({
          width: 512,
          height: 512
        });

        canvas.toBlob(function (blob) {
          let url = URL.createObjectURL(blob);
          // let img = document.createElement('img');
          // img.src = url;
          previewContainer.src = '';
          previewContainer.src = url;
          $('#cropModal').modal('hide');
        });

    }


	function change_type_tools_app(){
		let edit_type = document.querySelector('#edit_type');

		let div_for_link_web = document.querySelector('#div_for_link_web') ;
		let div_for_link_ios = document.querySelector('#div_for_link_ios') ;
		let div_for_link_android = document.querySelector('#div_for_link_android') ;

		if(edit_type.value == 'แอปพลิเคชั่น'){
			div_for_link_web.classList.add('d-none');
			div_for_link_ios.classList.remove('d-none');
			div_for_link_android.classList.remove('d-none');
		}
		else{
			div_for_link_web.classList.remove('d-none');
			div_for_link_ios.classList.add('d-none');
			div_for_link_android.classList.add('d-none');
		}
	}
	
	// SAVE DATA
    function cf_edit_data(){

        let select_photo = document.querySelector('#select_photo').value;

        if(select_photo){
            let previewContainer = document.getElementById('preview_photo_icon');
            uploadBlobToFirebase(previewContainer.src);
        }
        else{
            save_data();
        }

    }

    async function uploadBlobToFirebase(blobUrl, rank, number) {

        let title = document.querySelector('#edit_name').value;

        try {
            const response = await fetch(blobUrl);
            const blob = await response.blob();

            let date_now = new Date();
            let Date_for_firebase = formatDate_for_firebase(date_now);
            let name_file = Date_for_firebase + '-Edit-' + title;
            let storageRef = storage.ref('/tools_apps/image/' + name_file);

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
                        document.querySelector('#photo_icon').value = downloadURL ;
                        document.querySelector('#select_photo').value = null;

                        save_data();
                    });
                }
            );
        } catch (error) {
            console.error('Error fetching the Blob:', error);
        }
    }

    function save_data(){

        document.querySelector('#span_load_save').classList.remove('d-none');
        document.querySelector('#btn_cf_edit_data').innerHTML = 'กำลังบันทึกข้อมูล..';

        let name = document.querySelector('#edit_name').value;
        let type = document.querySelector('#edit_type').value;
        let detail = document.querySelector('#for_detail').value;
        let photo_icon = document.querySelector('#photo_icon').value;
        let link_web = document.querySelector('#edit_link_web').value;
        let link_ios = document.querySelector('#edit_link_ios').value;
        let link_android = document.querySelector('#edit_link_android').value;

        let data_arr = {
            "id" : "{{ $tools_app->id }}",
            "name" : name,
            "type" : type,
            "detail" : detail,
            "photo_icon" : photo_icon,
            "link_web" : link_web,
            "link_ios" : link_ios,
            "link_android" : link_android,
        }; 

        fetch("{{ url('/') }}/api/save_data_edit_tools_apps", {
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
                document.querySelector('#goto_manage_tools_apps').click();
            }
        }).catch(function(error){
            console.error(error);
        });
    }
    // END SAVE DATA

</script>

<!-- CKEDITOR -->
<style>
    div.ck-editor__editable {
      min-height: 200px;
    }

    .ck-powered-by{
        display: none;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>

<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("edit_detail"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'undo', 'redo', '|',
                'findAndReplace', '|','link', '|',
                'heading', '|','fontSize', '|',
                'alignment', 'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'fontColor', 'highlight', '|',
                'specialCharacters', 'horizontalLine', '|','exportPDF','exportWord', 
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                // toggleDownloadable: {
                //     mode: 'manual',
                //     label: 'Downloadable',
                //     attributes: {
                //         download: 'file'
                //     }
                // }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "superbuild" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'AIAssistant',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'MultiLevelList',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents',
            'PasteFromOfficeEnhanced',
            'CaseChange'
        ]
    }).then(editor => {
        editor.model.document.on('change:data', () => {
            // console.log(editor.getData());
            if(!editor.getData()){
                // document.querySelector('#preview_detail').innerHTML = '';
            }
            else{
                document.querySelector('#for_detail').value = editor.getData();
                // document.querySelector('#preview_detail').innerHTML = editor.getData();
            }
        });
    }).catch(error => {
        console.error(error);
    });
</script>

@endsection
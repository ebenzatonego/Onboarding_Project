<style>
	/* Share_social*/
    .card-Share_social {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-evenly;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.055);
      margin: 20px 0;
    }

    /* for all social containers*/
    .socialContainer {
      min-width: 52px !important;
      min-height: 52px !important;
      max-width: 52px !important;
      max-height: 52px !important;
      border-radius: 50%;
      background-color: #CECECE;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      transition-duration: .3s;
    }
    /* instagram*/
    .containerLine {
      background-color: #00b900;
      transition-duration: .3s;
    }
    /* twitter*/
    .containerFacebook {
      background-color: 	#1877F2;
      transition-duration: .3s;
    }
    /* linkdin*/
    .containerTwitter {
      background-color: 	#000;
      transition-duration: .3s;
    }
    /* Whatsapp*/
    .containerWhatsapp {
      background-color: #25D366;
      transition-duration: .3s;
    }
    .containerDiscord {
      background-color: #7289da;
      transition-duration: .3s;
    }
    .socialContainer:active {
      transform: scale(0.9);
      transition-duration: .3s;
    }

    .socialSvg {
      /* width: 20px; */
      font-size: 25px;
      color: #fff;
    }

    .socialSvg path {
      fill: rgb(255, 255, 255);
    }

    .socialContainer:hover .socialSvg {
      animation: slide-in-top 0.3s both;
    }

    @keyframes slide-in-top {
      0% {
        transform: translateY(-50px);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
    .share-button{
      background-color: #F2F3FF;
      border-radius: 20px;
      color: #243286;
    }
    
    .modal-share-social {
        background-color: #3D467F !important;
        margin: 0 20px;
        border-radius: 10px !important;
        -webkit-border-radius: 10px !important;
        -moz-border-radius: 10px !important;
        -ms-border-radius: 10px !important;
        -o-border-radius: 10px !important;
        padding: 40px 0;
    }
</style>

@if(Auth::user()->id == '1')
<!-- Modal Share social media-->
<button id="btn_modal_Share_social_media" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#Share_social_media">
    Share social media
</button>
@endif
<div class="modal fade" id="Share_social_media" tabindex="-1" role="dialog" aria-labelledby="happybirthdayTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-share-social d-flex justify-content-center m-0">
            <p style="color: #FFF;text-align: center;font-size: 20px;font-style: normal;font-weight: 400;line-height: normal;">แชร์เนื้อหานี้</p>
            <div class="card-Share_social">
              	<a id="tag_a_share_line" class="socialContainer containerLine" target="_blank">
                <i class="fa-brands fa-line socialSvg"></i>
                </a>
              
              	<a id="tag_a_share_facebook" class="socialContainer containerFacebook" target="_blank">
                <i class="fa-brands fa-facebook socialSvg"></i>
                </a>
                
              	<a id="tag_a_share_twitter" class="socialContainer containerTwitter" target="_blank">
                <i class="fa-brands fa-x-twitter socialSvg"></i>
              	</a>
              
              	<a id="tag_a_share_whatsapp" class="socialContainer containerWhatsapp" target="_blank">
                <i class="fa-brands fa-whatsapp socialSvg"></i>
              	</a>
            </div>             
            <div class="px-5 mt-3">
              <input type="text" class="d-none" id="input_for_copy_Share_social_media">
              <button class="share-button copy btn w-100" onclick="copy_Share_social_media()">
                  Copy Link
              </button>
            </div>
            </div>

            <script>
                function copy_Share_social_media() {
                    const url = document.querySelector('#input_for_copy_Share_social_media').value;
                    navigator.clipboard.writeText(url).then(function() {
                        // alert('Link copied to clipboard');
                        $('#modalCopySuccess').modal('show');

                        setTimeout(() => {
                        $('#modalCopySuccess').modal('hide');
                            
                        }, 2000);
                    }, function(err) {
                        console.error('Could not copy text: ', err);
                    });
                }

                function save_log_share(type_table , type_social , id){
                  console.log(type_table);
                  console.log(type_social);
                  console.log(id);

                  fetch("{{ url('/') }}/api/save_log_share/" + "{{ Auth::user()->id }}" + "/" + type_table + "/" + type_social + "/" + id)
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);
                    });
                }
            </script>
        </div>
    </div>
</div>
<style>
	/* Share_social*/
    .card-Share_social {
      width: 100%;
      display: flex;

      height: fit-content;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 25px 25px;
      gap: 20px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.055);
      
    }

    /* for all social containers*/
    .socialContainer {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background-color: #CECECE;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      transition-duration: .3s;
    }
    /* instagram*/
    .containerLine:hover {
      background-color: #00b900;
      transition-duration: .3s;
    }
    /* twitter*/
    .containerFacebook:hover {
      background-color: 	#1877F2;
      transition-duration: .3s;
    }
    /* linkdin*/
    .containerTwitter:hover {
      background-color: 	#000;
      transition-duration: .3s;
    }
    /* Whatsapp*/
    .containerWhatsapp:hover {
      background-color: #25D366;
      transition-duration: .3s;
    }
    .containerDiscord:hover {
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
</style>

@if(Auth::user()->id == '1')
<br><br><br><br><br><br><br><br>
<!-- Modal Share social media-->
<button id="btn_modal_Share_social_media" type="button" class="btn btn-primary d-" data-toggle="modal" data-target="#Share_social_media">
    Share social media
</button>
@endif
<div class="modal fade" id="Share_social_media" tabindex="-1" role="dialog" aria-labelledby="happybirthdayTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-profile d-flex justify-content-center">
            <p style="color: #FFF;text-align: center;font-size: 20px;font-style: normal;font-weight: 400;line-height: normal;">แชร์เนื้อหานี้</p>
            <div class="card-Share_social">
              	<a class="socialContainer containerLine" href="https://social-plugins.line.me/lineit/share?url=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                <i class="fa-brands fa-line socialSvg"></i>
                </a>
              
              	<a class="socialContainer containerFacebook" href="https://www.facebook.com/sharer/sharer.php?u=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                <i class="fa-brands fa-facebook socialSvg"></i>
                </a>
                
              	<a class="socialContainer containerTwitter" href="https://twitter.com/intent/tweet?url=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                <i class="fa-brands fa-x-twitter socialSvg"></i>
              	</a>
              
              	<a class="socialContainer containerWhatsapp" href="https://api.whatsapp.com/send?text=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                <i class="fa-brands fa-whatsapp socialSvg"></i>
              	</a>

                <a class="socialContainer containerDiscord" href="https://discord.com/channels/@me?url=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                <i class="fa-brands fa-discord socialSvg"></i>
              	</a>
            </div>             
            <div class="px-5 mt-3">

              <button class="share-button copy btn w-100" onclick="copy_Share_social_media()">
                  Copy Link
              </button>
            </div>
            </div>

            <script>
                function copy_Share_social_media() {
                    const url = "https://www.youtube.com/watch?v=fa-c2fY_tOQ";
                    navigator.clipboard.writeText(url).then(function() {
                        alert('Link copied to clipboard');
                    }, function(err) {
                        console.error('Could not copy text: ', err);
                    });
                }
            </script>
        </div>
    </div>
</div>
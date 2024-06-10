<style>
	/* Share_social*/
    .card-Share_social {
      width: fit-content;
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
    .containerOne:hover {
      background-color: #d62976;
      transition-duration: .3s;
    }
    /* twitter*/
    .containerTwo:hover {
      background-color: #00acee;
      transition-duration: .3s;
    }
    /* linkdin*/
    .containerThree:hover {
      background-color: #0072b1;
      transition-duration: .3s;
    }
    /* Whatsapp*/
    .containerFour:hover {
      background-color: #128C7E;
      transition-duration: .3s;
    }

    .socialContainer:active {
      transform: scale(0.9);
      transition-duration: .3s;
    }

    .socialSvg {
      width: 17px;
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
</style>

@if(Auth::user()->id == 1)
<br><br><br><br><br><br><br><br>
<!-- Modal Share social media-->
<button id="btn_modal_Share_social_media" type="button" class="btn btn-primary d-" data-toggle="modal" data-target="#Share_social_media">
    Share social media
</button>
@endif
<div class="modal fade" id="Share_social_media" tabindex="-1" role="dialog" aria-labelledby="happybirthdayTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-profile">

            <div class="card-Share_social">
              	<a class="socialContainer containerOne" href="#">
                <i class="fa-brands fa-line socialSvg"></i>
                </a>
              
              	<a class="socialContainer containerTwo" href="#">
                	<svg viewBox="0 0 16 16" class="socialSvg twitterSvg"> <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path> </svg>
                </a>
                
              	<a class="socialContainer containerThree" href="#">
                	<svg viewBox="0 0 448 512" class="socialSvg linkdinSvg"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
              	</a>
              
              	<a class="socialContainer containerFour" href="#">
                	<svg viewBox="0 0 16 16" class="socialSvg whatsappSvg"> <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path> </svg>
              	</a>
            </div>             


            <div class="share-buttons ">
                <a class="share-button line" href="https://social-plugins.line.me/lineit/share?url=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                    Line
                </a>
                <a class="share-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                    Facebook
                </a>
                <a class="share-button twitter" href="https://twitter.com/intent/tweet?url=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                    Twitter
                </a>
                <a class="share-button whatsapp" href="https://api.whatsapp.com/send?text=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                    WhatsApp
                </a>
                <a class="share-button discord" href="https://discord.com/channels/@me?url=https://www.youtube.com/watch?v=fa-c2fY_tOQ" target="_blank">
                    Discord
                </a>
                <button class="share-button copy" onclick="copy_Share_social_media()">
                    Copy Link
                </button>
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
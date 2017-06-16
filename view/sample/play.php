<!DOCTYPE html>
<html>
<head>
    <title><?=$data['m_title']?></title>
    <meta property="og:url"           content="http://<?=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=$data['m_title']?>" />
    <meta property="og:description"   content="<?=$data['m_description']?>" />
    <meta property="og:image"         content="<?=$data['m_cover']?>" />

    <?=$css_import?>
    <?=$js_import?>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="/resource/css/mediaelementplayer.min.css">
    <script src="/resource/js/mediaelementplayer.js"></script>

    <script>
    $(document).ready(function() {
        $('#audio-player').mediaelementplayer({
            alwaysShowControls: true,
            features: ['playpause','volume','progress'],
            audioVolume: 'horizontal',
            audioWidth: 400,
            audioHeight: 120
        });
    });
</script>
</head>
<body>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>

    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
        
        <div class="play-container">
            <div class="info-container row">
                <div class="thumbnail small-12 column">
                    <div class="date-container">
                        <div class="date"><p>May, 2017</p></div>
                    </div>
                    <div class="details">
                        
                        <div class="title"><h3><?=$data['m_title']?></h3></div>
                        <div class="singer"><p><?=$data['m_singers']?></p></div>
                    </div>
                    <a href="#" id="image-play"><img src="/resource/upload/<?=$data['m_cover']?>"></a>
                    
                    <div class="music">
                    <div class="hidden">
                        <section>
                        <h3>Global Options</h3>
                        <form action="#" method="get">
                            <label>Language <select name="lang">
                                <option value="cs">Čeština / Czech (cs)</option>
                            </select>
                            </label>
                            <label>Stretching (Video Only)<select name="stretching">
                                <option value="auto" selected>Auto (default)</option>
                            </select>
                            </label>
                        </form>
                    </section>
                    </div>
                    
                    <div class="players" id="player2-container">
                        <div class="media-wrapper">
                            <audio id="player2" autoplay loop preload="auto" controls style="max-width:100%;">
                                <source src="/resource/upload/<?=$data['m_music_file']?>" type="audio/mp3">
                            </audio>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="description">
                    <span class="text">
                        <?=$data['m_description']?>
                    </span>
                </div>
            </div>

            <?php if (isset($_SESSION['current_user']) === true) {
            ?>
            <!-- Your like button code -->
            <div class="fb-like" 
            data-href="http://<?=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>" 
            data-layout="standard" 
            data-action="like" 
            data-share="true"
            data-show-faces="true">
            </div>
            <?php } ?>


            <?php if ($data['m_video_embed'] != '') { ?>
                <div class="flex-video">
                    <?=$data['m_video_embed']?>
                </div>
            <?php } ?>

            <?php
                if (isset($_SESSION['current_user']) === true) {
                    if (($_SESSION['current_user']['u_type'] == 'Admin') ||
                        (($_SESSION['current_user']['u_type'] == 'Artist') &&
                        ($_SESSION['current_user']['u_id'] == $data['m_uploader']) )) {
            ?>
            <div class="row small-12">
                <a href="/music/delete?id=<?=$data['m_id']?>" class="button warning delete-button">Delete</a>
            </div>
            <?php
                    }
                }
            ?>

            <?php if (isset($_SESSION['current_user']) === true) {
            ?>
                <div width="100%" class="fb-comments" data-href="http://<?=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>" data-numposts="5"></div>
            <?php } ?>

            
        </div>



        <div class="genre-container">
            <div class="genre small-12">
                <div class="genre-title column">
                    You might also like
                </div>
            <?php
                for ($i=0; $i < count($suggestion); $i++) {
                    $item = $suggestion[$i];
            ?>
                <div class="genre-item small-6 column">
                    <a href="/music/play?id=<?=$item['m_id']?>">
                        <div class="top-item">
                            <div class="top-title">
                                <?=$item['m_title']?>
                            </div>
                            <div class="top-singer">
                                <?=$item['m_singers']?>
                            </div>    
                        </div>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

    <script src="/resource/js/demo.js"></script>
</body>
</html>

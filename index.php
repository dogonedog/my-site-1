<?php
session_start();
require_once("../lib/util.php");
 killSession();
?>
<?php
function killSession(){
$_SESSION= [];
if (isset($_COOKIE[session_name()])){
$params = session_get_cookie_params();
setcookie(session_name(), '', time()-36000, $params['path']);
} session_destroy();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamburger</title>
  <meta name="robots" content="noindex,nofollow">
  <link rel="icon" type="image/svg" href="images/favicon.svg">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,900;1,900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="wrapper">
    <header class="page-header">
      <h1><a href="index.php">Hamburger</a></h1>

      <div class="drawer">
        <input type="checkbox" id="drawer-check">
        <label for="drawer-check" class="drawer-open"><span></span></label>
        <nav class="menu-global main-nav">
          <ul>
            <li><a href="menu.html">MENU</a></li>
            <li><a href="order.php">ORDER</a></li>
            <!--<li><a href="#infomation">INFOMATION</a></li>-->
            <!-- <li><a href="contact.html">ORDER</a></li> -->
          </ul>
        </nav>
      </div>
    </header>

    <section id="mainvisual" class="big-bg bounce">
    <!--<section>
     <p class="bounce2">
     	<span>A</span>
     	<span>W</span>
     	<span>S</span>
     	<span>O</span>
     	<span>M</span>
     	<span>E</span>
     	<span>&nbsp;</span>
     	<span>S</span>
     	<span>U</span>
     	<span>P</span>
     	<span>E</span>
     	<span>R</span>
     	<span>&nbsp;</span>
     	<span>D</span>
     	<span>E</span>
     	<span>L</span>
     	<span>I</span>
     	<span>C</span>
     	<span>I</span>
     	<span>O</span>
     	<span>U</span>
     	<span>S</span>
     </p>
    </section>-->
    </section>

    <div class="container">
      <!-- <section id="concept">
        <div class="innerwrapper">
          <div class="leftbox">
            <img src="images/bunkai.jpg" alt="">
          </div>
          <div class="rightbox">
            <div class="sentence">
              <p>厚みのある100%無添加ビーフ。 無農薬の野菜、牛乳、卵。おいしさと品質にこだわっています。
                作りたてをどんな時間でもお待たせせずに、お届けします。</p>
              <p> ライフスタイルの変化にともなった健康志向により野菜取得ニーズが高まりながらも、多くの人は野菜不足を感じている。</p>
              <p> 混雑する時間でも並ばず注文。メニューを見て選べお会計はスムーズにキャッシュレス決済。</p>
            </div>
          </div>
        </div>

      </section>
      <section id="menu">

      </section> -->

    </div>
  </div>
  <footer>
    <div id="footer">
      <div class="footer-left">
        <div class="logo"><a href="index.php">Hamburger</a></div>
        <ul class="link-area">
          <li><a href="menu.html">MENU</a></li>
          <li><a href="order.html">ORDER</a></li>
           <!--<li>INFOMATION</li>
          <li><a href="contact.html">ORDER</a></li>-->
        </ul>
      </div>
      <ul class="sns-area">
        <li><i class="fab fa-instagram"></i></li>
        <li><i class="fab fa-facebook fa-1x"></i></li>
        <li><i class="fab fa-twitter fa-1x"></i></li>
      </ul>

    </div>
    <p class="copyright">
      <small>&copy;2021 Hamburger</small>
    </p>
  </footer>

  <script src="custom.js"></script>
</body>

</html>

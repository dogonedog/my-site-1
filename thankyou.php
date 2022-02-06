<?php
session_start();
require_once("../lib/util.php");
?>
<?php
if (isset($_SESSION['sum'])){
  $sum = $_SESSION['sum'];
  echo $sum;
} else {
  echo "セッションエラーです";
}
?>
<?php
$error = [];
if (!empty($_SESSION['hamburger'])){
  $hamburger = $_SESSION['hamburger'];
  $hamburgerString = implode("、", $hamburger);
} else {
  $error [] = "セッションエラーです";
}

//killSession();
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


    <div class="container">

      <section id="custom">
        <h2 class="custom_title">custom order</h2>
        <div class="form_wrapper">

          <div id="form_box">

            <ul>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
<?php if (count($error)>0){?>
  <?php

  echo implode("<br>", $error);?>
  <input type="button"  onclick="history.back()" value="戻る" class="button">
<?php } else { ?>
  <?php
  echo "+ ";
  echo es($hamburgerString); ?>

              <div id="orderArea">
                <div id="price_box">Total \
                <?php if(isset($_SESSION['sum'])){ ?>
                    <?php echo $_SESSION['sum'] ?>
                 <?php } else {
  echo "セッションエラーです";
}?>

                </div>
                <div class="button_box">
                  <!-- <input type="submit" value="注文" class="button"> -->
                  <input type="button" value="終了" class="button" id="End "onclick="location.href='index.php' ">
                  <!-- <input type="button" onclick="history.back()" value="戻る" class="button"> -->
                  <!-- <inout type="button" onclick="location.href='.php' "> -->
                </div>
              </div><!-- orderArea -->
          <?php } ?>
          </div>

          <div id="custom_box">
            <div id="custom_output">
              <div class="output mt13"><img src="./images/wrapped.png"></div>
            </div>
          </div>
        </div>
      </section>
    </div><!-- .container -->


  </div>
  <footer>
    <div id="footer">
      <div class="footer-left">
        <div class="logo"><a href="index.html">Hamburger</a></div>
        <ul class="link-area">
          <li><a href="menu.html">MENU</a></li>
          <li><a href="order.html">ORDER</a></li>
           <!--<li>INFOMATION</li>
          <li><a href="contact.html">ORDER</a></li>-->
        </ul>
      </div>
      <!-- <i class="fab fa-twitter fa-1x"></i> -->
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

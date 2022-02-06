<?php
session_start();
require_once("../lib/util.php");
// killSession();
?>



<?php
function killSession() {
  $_SESSION = [];
  if (isset($_COOKIE[session_name()])) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 36000, $params['path']);
  }
  session_destroy();
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


<?php
if (!cken($_POST)){
$encoding = mb_internal_encoding();
$err = "Encoding Error! The expected encoding is " . $encoding ;
exit($err);
}
$POST = es($_POST);
?>

<?php
$error = [];
if (isset($_POST["hamburger"])){
$_SESSION["hamburger"] = $_POST["hamburger"];
$hamburgers = ["パンズ","ベーコン","パティ","レタス", "トマト","ポテト","チーズ"];
$diffValue = array_diff($_SESSION["hamburger"], $hamburgers);
if (count($diffValue)==0){
$ingChecked = $_SESSION["hamburger"];
} else {
$ingChecked = [];
$error[] = "入力エラー";
}
} else {
$ingChecked = [];
}
?>

<?php
function checked($value, $question){
if (is_array($question)){
$isChecked = in_array($value, $question);
} else {
$isChecked = ($value===$question);
}
if ($isChecked){
echo "checked";
//visual();
} else {
echo"";
}
}
?>

    <div class="container">

      <section id="custom">
        <h2 class="custom_title">custom order</h2>
        <div class="form_wrapper">
          <div id="form_box">

            <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>" id="form" name="form_custom" autocomplete="off">

              <div id="input_box" class="">
              <input type="checkbox" name="hamburger[]" value="パンズ" id="Buns" class="visually-hidden" <?php checked("パンズ", $ingChecked); ?>>
              <!--onclick="chk()"-->
              <label for="Buns">バンズ</label>
              <input type="checkbox" name="hamburger[]" value="ベーコン" id="Bacon" class="visually-hidden" <?php checked("ベーコン", $ingChecked); ?>>
              <label for="Bacon">ベーコン</label>
              <input type="checkbox" name="hamburger[]" value="パティ" id="Patty" class="visually-hidden" <?php checked("パティ", $ingChecked); ?>>
              <label for="Patty">パティ</label>
              <input type="checkbox" name="hamburger[]" value="レタス" id="Lettuce" class="visually-hidden" <?php checked("レタス", $ingChecked); ?>>
              <label for="Lettuce">レタス</label>
              <input type="checkbox" name="hamburger[]" value="トマト" id="Tomate" class="visually-hidden" <?php checked("トマト", $ingChecked); ?>>
              <label for="Tomate">トマト</label>
              <input type="checkbox" name="hamburger[]" value="ポテト" id="Poteto" class="visually-hidden" <?php checked("ポテト", $ingChecked); ?>>
              <label for="Poteto">ポテト</label>
              <input type="checkbox" name="hamburger[]" value="チーズ" id="Cheese" class="visually-hidden" <?php checked("チーズ", $ingChecked); ?>>
              <label for="Cheese">チーズ</label>
            </div>

              <?php
              $isChecked = count($ingChecked)>0;
              if ($isChecked){
                //echo "<hr>";
                echo "+ ";
                echo implode("、", $ingChecked);?>
                <!-- <input type="button" value="注文する" onclick="location.href='thankyou.php'" class="button"> -->
                <?php
              } else {
                "選択されているものはありません。";
              };
              ?>
              <div id="choice_box">
                <?php
                if (count($error)>0){
                  echo "<hr>";
                  echo implode("<br>", $error);
                }
                ?>
              </div>

              <div id="orderArea">



                <div id="price_box">Total \0
                  <?php //if(isset($_SESSION['sum'])){ ?>
                    <!-- <p style="color:red"><?php //echo $_SESSION['sum']?></p> -->
                  <?php //} ?>
                  <?php
                  //echo $sum;
                  ?>
                </div>
                <!-- <pre>
                  <?php //print_r($_SESSION); ?>
                </pre> -->
                <div class="button_box">
                  <?php
                  $isChecked = count($ingChecked)>0;
                  if ($isChecked){?>
                  <input type="button" value="注文する" onclick="location.href='thankyou.php'" class="button">
                  <?php
                  };
                  ?>
                </div>

                <div id="resetArea" class="reset_box">
                <button id="total_button" class="button">決定</button>
                <input type="button" name="reset" value="リセット" class="button" id="reset_button2">
                </div>
                <?php
                  //echo '<input type="submit" value="確定" class="button" id="confirm_button">';
                  //echo '<input type="reset" name="reset" value="reset" class="button" id="reset_button">';
                ?>

              </div><!-- orderArea -->
              <?php
                if ($isChecked){?>
                <script type="text/javascript">
                const input_element = document.getElementById("input_box");
                const decide_element = document.getElementById("resetArea");
                function delElement() {
                input_element.classList.add('d-hidden');
                decide_element.classList.replace('reset_box', 'd-hidden');
                };
                delElement();
                </script>
              <?php }?>

            </form>

            <input type="button"  onclick="history.back()" value="戻る" class="button">

          </div>
          <div id="custom_box">
            <div id="custom_output">
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
              <div class="output"><img src="" class="output_img"></div>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="custom.js"></script>
</body>

</html>

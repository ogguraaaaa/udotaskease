<?php require '../common/header.php'; ?>

<body>

  <?php
  unset($_SESSION['user']);
  $pdo=new PDO('mysql:host=localhost;dbname=cf694455_udobbc;charset=utf8', 'cf694455_udo', 'udobasketball');
  $sql=$pdo->prepare('SELECT * from user where nickname=?');
  $sql->execute([$_REQUEST['nickname']]);
  foreach ($sql as $row) {
    $_SESSION['user']=['id'=>$row['id'], 'nickname'=>$row['nickname'], 'admin'=>$row['admin']];
  }
  ?>

  <section>
    <div class="wrapper">
      <div class="resultDisplay">
        <?php
          if (isset($_SESSION['user'])) {
            echo <<<HTML
              <h2>ログインが完了しました！</h2>
              <div class="linkContainer">
                <a href="mypage.php"><p class="link">マイページ</p></a>
                <a href="../index.php"><p class="link">TOPへ戻る</p></a>
              </div>
            HTML;
          } else {
            echo <<<HTML
              <h2>ニックネームが登録されておりません...</h2>
              <div class="linkContainer">
                <a href="login.php"><p class="link">ログインページへ戻る</p>(再入力はこちら)</a>
                <a href="../index.php"><p class="link">TOPへ戻る</p></a>
              </div>
            HTML;
          }
        ?>
      </div>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
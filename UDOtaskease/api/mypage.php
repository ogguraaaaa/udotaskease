<?php require '../common/header.php'; ?>

<body>

  <section>
    <div class="wrapper">
      <div class="mypageTop">
        
      </div>
      <div class="mypageBottom">
        <?php
          if(isset($_SESSION['user'])) {
            echo <<<HTML
            <p class="mypageName">{$_SESSION['user']['nickname']}</p>
            HTML;
            if($_SESSION['user']['admin'] == 1) {
              echo <<<HTML
              <a href="adminPage.php"><p class="adminLink">管理者ページ</p></a>
              HTML;
            }
            echo <<<HTML
            <div class="linkContainer">
              <a href="editAccount.php"><p class="link">編集</p></a>
              <a href="deleteConfirmation.php"><p class="link">アカウント削除</p></a>
              <a href="../index.php"><p class="link">TOPへ戻る</p></a>
            </div>
            HTML;
          } else {
            echo <<<HTML
            <h2>ログインしてください。</h2>
            <div class="linkContainer">
              <a href="login.php"><p class="link">ログインページへ戻る</p></a>
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
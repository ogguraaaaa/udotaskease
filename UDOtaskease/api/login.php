<?php require '../common/header.php'; ?>

<body>

  <section>
    <div class="wrapper">

      <form action="loginResult.php" method="post">
      <div class="loginForm">
        <h2>・ニックネーム変更<br class=break>・アカウント削除はこちら</h2>
        <div class="inputItem">
          <div class="inputItemTop">
            <p class="itemName">ニックネーム<label class="attentionIcon">必須</label></p>
            <p class="attentionText">個人情報は入力しないでください。</p>
          </div>
          <input type="text" name="nickname" required>
        </div>
        <div class="submitButton">
          <input type="submit" value="ログイン　>">
        </div>
      </div>
      </form>

      <form action="register.php" method="post">
      <div class="signupForm">
        <h2>・はじめて利用される方はこちら</h2>
        <div class="inputItem">
          <div class="inputItemTop">
            <p class="itemName">ニックネーム<label class="attentionIcon">必須</label></p>
            <p class="attentionText">個人情報は入力しないでください。</p>
          </div>
          <input type="text" name="nickname" required>
        </div>
      </div>
      <div class="submitButton">
        <input type="submit" value="新規登録　>">
      </div>
      </form>

    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
<?php require '../common/header.php'; ?>

<body>

  <section>
    <div class="wrapper">
      <div class="editAccountItem">
        <p class="itemName">新しいニックネームを<br class="break">入力してください。</p>
        <p class="attentionText">個人情報は入力しないでください。</p>
        <form action="editResult.php" method="post">
          <input type="text" name="nickname" required>
          <div class="submitButton">
            <input type="submit" value="変更　>">
          </div>
        </form>
      </div>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
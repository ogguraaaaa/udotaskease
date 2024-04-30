<?php require '../common/header.php'; ?>

<body>
  
  <?php
    $nickname=$_REQUEST['nickname'];
  ?>

  <section>
    <div class="wrapper">
      <div class="registerForm">
        <div class="inputItem">
          <form action="registerResult.php" method="post">
            <div class="inputItemTop">
              <p class="itemName"><?php echo htmlspecialchars($nickname); ?></p>
            </div>
            <input type="hidden" value="<?php echo $nickname ?>" name="nickname">
            </div>
            <h2>上記の情報で登録してもよろしいですか？<br class=break></h2>
            <div class="submitButton">
              <input type="submit" value="新規登録　>">
            </div>
          </form>
        </div>
      <div class="linkContainer">
        <a href="../index.php"><p class="link">TOPへ戻る</p></a>
      </div>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
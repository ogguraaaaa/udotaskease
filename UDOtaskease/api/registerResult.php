<?php require '../common/header.php'; ?>

<body>

  <?php
  $pdo=new PDO('mysql:host=localhost;dbname=cf694455_udobbc;charset=utf8', 'cf694455_udo', 'udobasketball');
  $nickname=$_POST['nickname'];
  $checkQuery=$pdo->prepare('SELECT * FROM user WHERE nickname = ?');
  $checkQuery->execute([$nickname]);
  
  if ($checkQuery->rowCount() > 0) {
    $messageTop="このニックネームは既に使われております。";
    $messageBottom="新たなニックネームで登録してください。";
  } else {
    $insertQuery=$pdo->prepare('INSERT INTO user (id, nickname, admin) VALUES (null, ?, false)');
    $insertQuery->execute([$nickname]);
    $messageTop="新規登録が完了しました！";
    $messageBottom="🎉";
  }
  ?>

  <section>
    <div class="wrapper">
      <div class="resultDisplay">
        <?php echo "<h2>$messageTop</h2>"; ?>
        <div style="margin-bottom: 20px;"></div>
        <?php echo "<h2>$messageBottom</h2>"; ?>
        <div class="linkContainer">
          <a href="mypage.php"><p class="link">マイページ</p></a>
          <a href="../index.php"><p class="link">TOPへ戻る</p></a>
        </div>
      </div>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
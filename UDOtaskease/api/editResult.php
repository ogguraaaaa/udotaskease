<?php require '../common/header.php'; ?>

<body>

  <?php
  $pdo=new PDO('mysql:host=localhost;dbname=cf694455_udobbc;charset=utf8', 'cf694455_udo', 'udobasketball');
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $newNickname=$_POST['nickname'];
    $checkQuery=$pdo->prepare('SELECT * FROM user WHERE nickname = ?');
    $checkQuery->execute([$newNickname]);
    
    if($checkQuery->rowCount() > 0) {
      $messageTop="このニックネームは既に使われております。";
      $messageBottom="新たなニックネームに変更してください。";
    } else {
      $updateQuery=$pdo->prepare("UPDATE user SET nickname = :newNickname WHERE id = :user_id");
      $updateQuery->execute(['newNickname'=>$newNickname, 'user_id'=>$_SESSION['user']['id']]);
      $_SESSION['user']['nickname']=$newNickname;
      $messageTop="変更が完了しました！";
      $messageBottom="🎉";
    }
  }
  ?>

  <section>
    <div class="wrapper">
      <div class="resultDisplay">
        <?php echo "<h2>$messageTop</h2>"; ?>
        <div style="margin-bottom: 20px;"></div>
        <?php echo "<h2>$messageBottom</h2>"; ?>
        <div class="linkContainer">
          <a href="editAccount.php"><p class="link">編集入力ページへ戻る</p>(再入力はこちら)</a>
          <a href="../index.php"><p class="link">TOPへ戻る</p></a>
        </div>
      </div>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
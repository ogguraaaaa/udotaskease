<?php require '../common/header.php'; ?>

<body>

  <?php
    $pdo=new PDO('mysql:host=localhost;dbname=cf694455_udobbc;charset=utf8', 'cf694455_udo', 'udobasketball');
    $nickname=$_POST['nickname'];
    $checkQuery=$pdo->prepare('SELECT * FROM user WHERE nickname = ?');
    $checkQuery->execute([$nickname]);
    
    if ($checkQuery->rowCount() > 0) {
      $deleteQuery=$pdo->prepare('DELETE FROM user WHERE nickname = ?');
      $deleteQuery->execute([$nickname]);
      if (session_status() == PHP_SESSION_NONE) {
          session_start();
          }
      session_unset();
      session_destroy();
      $message="削除が完了しました！";
    } else {
      $message="削除ができませんでした...";
    }
  ?>

  <section>
    <div class="wrapper">
      <?php echo "<h2>$message</h2>"; ?>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
<?php require '../common/header.php'; ?>

<body>

  <?php 
    try {
        $pdo=new PDO('mysql:host=localhost;dbname=cf694455_udobbc;charset=utf8', 'cf694455_udo', 'udobasketball');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nickname=$_POST['nickname'];
        $temperature=$_POST['temperature'];
        $date=$_POST['date'];

        $query_check_nickname="SELECT COUNT(*) AS count FROM user WHERE nickname = ?";
        $stmt_check_nickname=$pdo->prepare($query_check_nickname);
        $stmt_check_nickname->execute([$nickname]);
        $nickname_exists=$stmt_check_nickname->fetchColumn() > 0;

        if ($nickname_exists) {
          $query_check_duplicate_entry="SELECT COUNT(*) AS count FROM temperature WHERE nickname = ? AND date = ?";
          $stmt_check_duplicate_entry=$pdo->prepare($query_check_duplicate_entry);
          $stmt_check_duplicate_entry->execute([$nickname, $date]);
          $duplicate_entry_exists=$stmt_check_duplicate_entry->fetchColumn() > 0;

          if ($duplicate_entry_exists) {
              $messageTop="$date <br class=break>日分は入力済みです!";
              $messageBottom="";
          } else {
              $query_insert_temperature="INSERT INTO temperature (nickname, temperature, date) VALUES (?, ?, ?)";
              $stmt_insert_temperature=$pdo->prepare($query_insert_temperature);
              $stmt_insert_temperature->execute([$nickname, $temperature, $date]);
              $messageTop="受け付けました！";
              $messageBottom="ご協力ありがとうございます！";
          }
      } else {
          $messageTop=$messageTop="未登録のユーザー名です！";
          $messageBottom="確認、再入力をお願いします。";
      }
    } catch (PDOException $e) {
        $messageTop="受付できませんでした。<br class=break>申し訳ございません。";
        $messageBottom="時間を空けてお試しください。";
    }
  ?>
  
  <section>
    <div class="wrapper">
      <div class="resultDisplay">
        <?php echo "<h2>$messageTop</h2>"; ?>
        <div style="margin-bottom: 20px;"></div>
        <?php echo "<h2>$messageBottom</h2>"; ?>
        <div class="linkContainer">
        <a href="login.php"><p class="link">新規登録はこちら</p></a>
          <a href="mypage.php"><p class="link">マイページ</p></a>
          <a href="../index.php"><p class="link">TOPへ戻る</p></a>
        </div>
      </div>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
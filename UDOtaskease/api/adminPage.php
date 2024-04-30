<?php require '../common/header.php'; ?>

<body>

  <?php
  if (!isset($_SESSION['user']) || $_SESSION['user']['admin'] != 1) {
    header("Location: ../index.php");
    exit();
  }

  $pdo=new PDO('mysql:host=localhost;dbname=cf694455_udobbc;charset=utf8', 'cf694455_udo', 'udobasketball');
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $year=$_POST["year"];
      $month=$_POST["month"];
      $day=$_POST["day"];

      $stmt=$pdo->prepare("SELECT nickname, temperature FROM temperature WHERE date = :date");
      $date="$year-$month-$day";
      $stmt->bindParam(':date', $date, PDO::PARAM_STR);
      $stmt->execute();

      $data=array();
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[]=$row;
      }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();  
    }
  }
  ?>

  <section>
    <div class="adminWrapper">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="year">年:</label>
        <input type="number" id="year" name="year" min="2024" max="2027" value="<?php echo isset($year) ? htmlspecialchars($year) : ''; ?>" required>
        <label for="month">月:</label>
        <input type="number" id="month" name="month" min="1" max="12" value="<?php echo isset($month) ? htmlspecialchars($month) : ''; ?>" required>
        <label for="day">日:</label>
        <input type="number" id="day" name="day" min="1" max="31" value="<?php echo isset($day) ? htmlspecialchars($day) : ''; ?>" required>
        <div class="submitButton">
          <input type="submit" value="表示　>">
        </div>
      </form>
      <div class=adminContainer>
      <?php
        if (isset($date)) {
          foreach ($data as $row) {
            echo "<p>ニックネーム: " . htmlspecialchars($row['nickname']) . ", <br class=break>体温: " . htmlspecialchars($row['temperature']) . "</p>";
          }
        } else {
          echo "<p>出力待機中...</p>";
        }
      ?>
      </div>
      <!-- <div class="linkContainer">
        <a href="../index.php"><p class="link">TOPへ戻る</p></a>
      </div> -->
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
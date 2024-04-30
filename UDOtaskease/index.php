<?php require 'common/header.php'; ?>

<body>

  <?php
  $currentDate = date('Y-m-d');

  if (date('w', strtotime($currentDate)) == 0) {
      $selectedDate = $currentDate;
  } else {
      $selectedDate = date('Y-m-d', strtotime('last Sunday', strtotime($currentDate)));
  }
  ?>

  <section>
    <div class="wrapper">
      <form action="api/recordTemperature.php" method="post">
        <div class="inputItem">
          <div class="inputItemTop">
            <p class="itemName">ニックネーム<label class="attentionIcon">必須</label></p>
            <p class="attentionText">※個人情報は入力しないでください。</p>
          </div>
          <input type="text" name="nickname" required>
        </div>
        <div class="inputItem">
          <div class="inputItemBottom">
            <p class="itemName">体温　　　　<label class="attentionIcon">必須</label></p>
            <p class="attentionText">※小数点第一位まで入力してください。</p>
          </div>
            <input type="number" step="0.1" id="temperatureInput" name="temperature" min="34" max="37.4" required>
        </div>
        <input type="hidden" name="date" value="<?php echo $selectedDate; ?>">
        <div class="submitButton">
          <input type="submit" value="送信　>">
        </div>
      </form>
    </div>
  </section>

</body>

<?php require 'common/footer.php'; ?>
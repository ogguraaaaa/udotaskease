<?php require '../common/header.php'; ?>

<body>

  <?php
    $nickname=$_SESSION['user']['nickname'];
  ?>

  <section>
    <div class="wrapper">
      <?php
        if(isset($_SESSION['user'])) {
          echo '<p class="mypageName">' . $_SESSION['user']['nickname'] . '　様</p>';
        }
      ?>
      <p class="deleteConfirmationText">
        アカウントを削除しますか？
      </p>
      <form action="deleteAccount.php" method="post">
        <input type="hidden" value="<?php echo $nickname ?>" name="nickname">
        <div class="submitButton">
          <input type="submit" value="削除　>">
        </div>
      </form>
    </div>
  </section>

</body>

<?php require '../common/footer.php'; ?>
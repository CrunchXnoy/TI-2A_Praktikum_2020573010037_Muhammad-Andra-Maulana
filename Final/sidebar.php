<!-- SIDEBAR -->

<nav id="sidebar" class="active">
  <img src="images/gtani2.png" class="rounded mx-auto d-block" width="70%" height="auto" alt="">
  <ul class="list-unstyled components mb-5">
    <?php foreach ($sidebar as $sb) : ?>
      <?php if ($row['level'] == $sb['sidebar_level'] || "admin") { ?>
        <li class="active">
          <a href="<?= $sb["sidebar_url"]; ?>"><span class="<?= $sb['icon']; ?>"></span> <?= $sb['sidebar_name']; ?></a>
        </li>
      <?php } ?>
    <?php endforeach; ?>
  </ul>

  <div class="footer">
    <p>
      Copyright &copy;<script>
        document.write(new Date().getFullYear());
      </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
    </p>
  </div>
</nav>
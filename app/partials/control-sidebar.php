<div class="p-3 control-sidebar-content">
  <h5>Accede a tus Apps </h5>
  <hr class="mb-2">
  <ul>
    <?php while ($app = sqlsrv_fetch_array($apps)) { ?>
      <li class="nav-item">
        <a target="<?= $app['target'] ?>" href="<?= $app['link'] ?>">
          <?= $app['app']?>
        </a>
      </li>
    <?php } ?>
  </ul>
</div>

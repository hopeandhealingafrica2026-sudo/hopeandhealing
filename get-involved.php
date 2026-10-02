<?php
require_once 'lang.php';
$pageTitle = t('nav_involved');
$pageDesc  = t('gi_par_d');
$current   = 'get-involved';
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_involved') ?></h1>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">
    <article class="block" id="partner">
      <h2><?= e('gi_par_t') ?></h2>
      <p><?= e('gi_par_d') ?></p>
    </article>
    <article class="block" id="support">
      <h2><?= e('gi_sup_t') ?></h2>
      <p><?= e('gi_sup_d') ?></p>
    </article>
    <article class="block" id="volunteer">
      <h2><?= e('gi_vol_t') ?></h2>
      <p><?= e('gi_vol_d') ?></p>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

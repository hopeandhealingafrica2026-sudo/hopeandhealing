<?php
require_once 'lang.php';
$pageTitle  = t('nav_heart');
$pageDesc   = t('mental_desc');
$current    = 'heart-healing';
$breadcrumb = [[t('nav_work'), 'our-work.php'], [t('nav_heart'), null]];
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_heart') ?></h1>
    <p><?= e('mental_desc') ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">
    <article class="block" id="heart-healing">
      <h2><?= e('mental_title') ?></h2>
      <p><?= e('mental_desc') ?></p>
      <ul class="tick-list">
        <li><?= e('heart_l1') ?></li>
        <li><?= e('heart_l3') ?></li>
        <li><?= e('heart_l4') ?></li>
      </ul>
    </article>
    <article class="block" id="counseling">
      <h2><?= e('couns_t') ?></h2>
      <p><?= e('couns_d') ?></p>
    </article>
    <article class="block" id="hope-resilience">
      <h2><?= e('hope_t') ?></h2>
      <p><?= e('hope_d') ?></p>
    </article>
    <article class="block" id="holistic-evangelism">
      <h2><?= e('heart_l2') ?></h2>
      <h3><?= e('teach_head') ?></h3>
      <p><?= e('teach_body') ?></p>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

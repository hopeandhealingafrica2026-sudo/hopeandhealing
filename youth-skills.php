<?php
require_once 'lang.php';
$pageTitle  = t('nav_youth');
$pageDesc   = t('skills_desc');
$current    = 'youth-skills';
$breadcrumb = [[t('nav_work'), 'our-work.php'], [t('nav_youth'), null]];
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_youth') ?></h1>
    <p><?= e('skills_desc') ?></p>
    <ul class="jump-links">
      <li><a href="#digital-skills"><?= e('ys_l1') ?></a></li>
      <li><a href="#vocational"><?= e('ys_l2') ?></a></li>
      <li><a href="#entrepreneurship"><?= e('ys_l3') ?></a></li>
      <li><a href="#multimedia"><?= e('multimedia_title') ?></a></li>
      <li><a href="#digital-mobility"><?= e('ys_l5') ?></a></li>
    </ul>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">

    <article class="block" id="digital-skills">
      <h2><?= e('skills_title') ?></h2>
      <p><?= e('skills_desc') ?></p>
    </article>

    <article class="block" id="vocational">
      <h2><?= e('ys_l2') ?></h2>
      <p><?= e('voc_d') ?></p>
    </article>

    <article class="block" id="entrepreneurship">
      <h2><?= e('ys_l3') ?></h2>
      <p><?= e('ent_d') ?></p>
    </article>

    <article class="block" id="multimedia">
      <h2><?= e('multimedia_title') ?></h2>
      <p><?= e('multimedia_desc') ?></p>
    </article>

    <article class="block block-wide" id="digital-mobility">
      <h2><?= e('hdmt_title') ?></h2>
      <p><?= e('hdmt_desc') ?></p>
      <ul class="tick-list">
        <?php for ($i = 1; $i <= 3; $i++): ?><li><?= e("hd_l$i") ?></li><?php endfor; ?>
      </ul>
    </article>

  </div>
</section>

<?php include 'includes_footer.php'; ?>

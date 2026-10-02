<?php
require_once 'lang.php';
$pageTitle = t('nav_stories');
$pageDesc  = t('st_com_d');
$current   = 'stories';
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_stories') ?></h1>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">
    <article class="block" id="community-stories">
      <h2><?= e('st_com_t') ?></h2>
      <p><?= e('st_com_d') ?></p>
    </article>
    <article class="block" id="testimonials">
      <h2><?= e('st_test_t') ?></h2>
      <p><?= e('st_test_d') ?></p>
    </article>
    <article class="block" id="publications">
      <h2><?= e('st_pub_t') ?></h2>
      <p><?= e('st_pub_d') ?></p>
      <h3><?= e('art1_t') ?></h3>
      <p><?= e('art1_teaser') ?></p>
      <a class="btn" href="article-social-media.php"><?= e('art_read') ?></a>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

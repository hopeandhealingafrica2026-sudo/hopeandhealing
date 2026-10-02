<?php
require_once 'lang.php';
$pageTitle = t('nav_about');
$pageDesc  = t('who_body');
$current   = 'about';
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_about') ?></h1>
    <p><?= e('who_body') ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">
    <article class="block" id="who-we-are">
      <h2><?= e('who_title') ?></h2>
      <p><?= e('who_body') ?></p>
    </article>
    <article class="block" id="vision">
      <h2><?= e('vision_t') ?></h2>
      <p><?= e('vision_d') ?></p>
    </article>
    <article class="block" id="our-approach">
      <h2><?= e('approach_t') ?></h2>
      <p><?= e('approach_d') ?></p>
    </article>
    <article class="block" id="mission">
      <h2><?= e('mission_title') ?></h2>
      <p><?= e('mission_body') ?></p>
    </article>
    <article class="block" id="values">
      <h2><?= e('values_title') ?></h2>
      <h3><?= e('values_head') ?></h3>
      <p><?= e('values_body') ?></p>
    </article>
    <article class="block" id="approach">
      <h2><?= e('teach_title') ?></h2>
      <h3><?= e('teach_head') ?></h3>
      <p><?= e('teach_body') ?></p>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

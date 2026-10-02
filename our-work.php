<?php
require_once 'lang.php';
$pageTitle = t('nav_work');
$current   = 'our-work';
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_work') ?></h1>
    <p><?= e('hero_desc') ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap pillars">
    <article class="pillar pillar-heart">
      <svg class="heart-cue" viewBox="0 0 100 90" aria-hidden="true"><path d="M50 84C16 56 4 38 4 24 4 12 13 4 25 4c10 0 20 6 25 15C55 10 65 4 75 4c12 0 21 8 21 20 0 14-12 32-46 60z"/></svg>
      <h2><?= e('nav_heart') ?></h2>
      <p><?= e('mental_desc') ?></p>
      <a class="btn" href="heart-healing.php"><?= e('learn_more') ?></a>
    </article>
    <article class="pillar">
      <h2><?= e('nav_youth') ?></h2>
      <p><?= e('skills_desc') ?></p>
      <a class="btn" href="youth-skills.php"><?= e('learn_more') ?></a>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

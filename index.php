<?php
require_once 'lang.php';
$pageTitle = t('nav_home');
$current   = 'home';
include 'includes_header.php';
?>

<section class="home-hero">
  <div class="wrap hero-grid">
    <div class="hero-text">
      <h1>Hope and Healing Africa</h1>
      <p class="hero-motto">Ruhuka Umutima</p>
      <p class="lead"><?= e('hero_desc') ?></p>
      <div class="btn-row">
        <a class="btn btn-gold" href="our-work.php"><?= e('explore') ?></a>
        <a class="btn btn-alt" href="about.php"><?= e('who_title') ?></a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <h2 class="section-title"><?= e('what_we_do') ?></h2>
    <div class="pillars">

      <article class="pillar pillar-heart">
        <svg class="heart-cue" viewBox="0 0 100 90" aria-hidden="true"><path d="M50 84C16 56 4 38 4 24 4 12 13 4 25 4c10 0 20 6 25 15C55 10 65 4 75 4c12 0 21 8 21 20 0 14-12 32-46 60z"/></svg>
        <h3><?= e('nav_heart') ?></h3>
        <p><?= e('mental_desc') ?></p>
        <ul class="tick-list">
          <?php for ($i = 1; $i <= 4; $i++): ?><li><?= e("heart_l$i") ?></li><?php endfor; ?>
        </ul>
        <a class="btn" href="heart-healing.php"><?= e('learn_more') ?></a>
      </article>

      <article class="pillar">
        <h3><?= e('nav_youth') ?></h3>
        <p><?= e('skills_desc') ?></p>
        <ul class="tick-list">
          <?php for ($i = 1; $i <= 5; $i++): ?><li><?= e("ys_l$i") ?></li><?php endfor; ?>
        </ul>
        <a class="btn" href="youth-skills.php"><?= e('learn_more') ?></a>
      </article>

    </div>
  </div>
</section>

<section class="cta-band">
  <div class="wrap cta-row">
    <div>
      <h2><?= e('walk') ?></h2>
      <p><?= e('walk_desc') ?></p>
    </div>
    <a class="btn btn-gold" href="get-involved.php"><?= e('nav_involved') ?></a>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

<?php
require_once 'lang.php';
$pageTitle = t('nav_projects');
$pageDesc  = t('pr_cur_d');
$current   = 'projects';
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('nav_projects') ?></h1>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">
    <article class="block" id="current-projects">
      <h2><?= e('pr_cur_t') ?></h2>
      <p><?= e('pr_cur_d') ?></p>
    </article>
    <article class="block" id="community-initiatives">
      <h2><?= e('pr_com_t') ?></h2>
      <p><?= e('pr_com_d') ?></p>
    </article>
    <article class="block" id="partnerships">
      <h2><?= e('pr_par_t') ?></h2>
      <p><?= e('pr_par_d') ?></p>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

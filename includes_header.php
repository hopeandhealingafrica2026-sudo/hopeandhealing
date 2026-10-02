<?php
/*
 * includes_header.php — shared header (logo + nav + language switch + breadcrumb)
 * Each page: require_once 'lang.php'; then set BEFORE including this file:
 *   $pageTitle  = t('nav_about');
 *   $pageDesc   = '...';                 // optional
 *   $current    = 'about';               // home | about | our-work | heart-healing | youth-skills | projects | stories | get-involved | contact
 *   $breadcrumb = [[t('nav_work'), 'our-work.php'], [t('nav_youth'), null]];   // optional
 */
require_once __DIR__ . '/lang.php';
$pageTitle  = $pageTitle  ?? 'Hope and Healing Africa';
$pageDesc   = $pageDesc   ?? t('hero_desc');
$current    = $current    ?? '';
$breadcrumb = $breadcrumb ?? [];

$menu = [
  ['key' => 'home',  'label' => t('nav_home'),  'href' => 'index.php'],
  ['key' => 'about', 'label' => t('nav_about'), 'href' => 'about.php'],
  ['key' => 'our-work', 'label' => t('nav_work'), 'href' => 'our-work.php', 'group' => ['our-work', 'heart-healing', 'youth-skills'], 'children' => [
      ['key' => 'heart-healing', 'label' => t('nav_heart'), 'href' => 'heart-healing.php'],
      ['key' => 'youth-skills',  'label' => t('nav_youth'), 'href' => 'youth-skills.php'],
  ]],
  ['key' => 'projects',     'label' => t('nav_projects'), 'href' => 'projects.php'],
  ['key' => 'stories',      'label' => t('nav_stories'),  'href' => 'stories-publications.php'],
  ['key' => 'get-involved', 'label' => t('nav_involved'), 'href' => 'get-involved.php'],
  ['key' => 'contact',      'label' => t('nav_contact'),  'href' => 'contact.php'],
];
$self = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?> | Hope and Healing Africa</title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="assets/logo-small.png" type="image/png">
  <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>
<body>
<a class="skip-link" href="#main"><?= e('skip') ?></a>

<header class="site-header">
  <div class="wrap header-row">
    <a class="brand" href="index.php" aria-label="Hope and Healing Africa">
      <span class="brand-mark"><img src="assets/logo-small.png" alt="" width="88" height="58"></span>
      <span class="brand-name">Hope and Healing Africa<small>Ruhuka Umutima</small></span>
    </a>

    <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Menu">
    <label for="nav-toggle" class="nav-burger" aria-hidden="true"><span></span></label>

    <nav class="site-nav" aria-label="Main">
      <ul>
        <?php foreach ($menu as $item):
          $isCurrent = $item['key'] === $current;
          $active    = $isCurrent || (isset($item['group']) && in_array($current, $item['group'], true));
          $hasKids   = !empty($item['children']);
        ?>
          <li class="<?= $hasKids ? 'has-sub' : '' ?>">
            <a href="<?= $item['href'] ?>"<?= $isCurrent ? ' aria-current="page"' : '' ?><?= $active ? ' class="is-active"' : '' ?>><?= htmlspecialchars($item['label']) ?></a>
            <?php if ($hasKids): ?>
              <ul class="submenu">
                <?php foreach ($item['children'] as $kid): ?>
                  <li><a href="<?= $kid['href'] ?>"<?= $kid['key'] === $current ? ' aria-current="page" class="is-active"' : '' ?>><?= htmlspecialchars($kid['label']) ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <ul class="lang-switch" aria-label="Language">
        <?php foreach ($LANGS as $code => $label): ?>
          <li><a href="<?= $self ?>?lang=<?= $code ?>" lang="<?= $code ?>"<?= $code === $lang ? ' aria-current="true" class="is-lang"' : '' ?>><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>

<?php if ($breadcrumb): ?>
<nav class="breadcrumb" aria-label="Breadcrumb">
  <div class="wrap">
    <a href="index.php"><?= e('nav_home') ?></a>
    <?php foreach ($breadcrumb as [$label, $href]): ?>
      <span class="sep" aria-hidden="true">/</span>
      <?php if ($href): ?><a href="<?= $href ?>"><?= htmlspecialchars($label) ?></a>
      <?php else: ?><span aria-current="page"><?= htmlspecialchars($label) ?></span><?php endif; ?>
    <?php endforeach; ?>
  </div>
</nav>
<?php endif; ?>

<main id="main">

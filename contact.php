<?php
require_once 'lang.php';

/* ---- form handling (POST to this same page) ---- */
$formMsg = ''; $formOk = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clean = function ($v) { return trim(str_replace(["\r", "\n", "%0a", "%0d"], ' ', (string)$v)); };
    $name  = $clean($_POST['name']  ?? '');
    $mail  = $clean($_POST['email'] ?? '');
    $phone = $clean($_POST['phone'] ?? '');
    $msg   = trim((string)($_POST['message'] ?? ''));
    if (!empty($_POST['website'])) {                 // honeypot: bots fill this hidden field
        $formOk = true; $formMsg = t('f_ok');
    } elseif ($name === '' || $msg === '' || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $formMsg = t('f_bad');
    } elseif ($SITE['email'] === '') {
        $formMsg = t('f_fail');                      // no receiving address set yet in config.php
    } else {
        $body = "Name: $name\nEmail: $mail\nPhone: $phone\n\n$msg";
        $hdrs = "From: " . $SITE['email'] . "\r\nReply-To: $mail\r\nContent-Type: text/plain; charset=UTF-8";
        $subj = '=?UTF-8?B?' . base64_encode('Hope and Healing Africa - website message') . '?=';
        $sent = @mail($SITE['email'], $subj, $body, $hdrs);
        $formOk = (bool)$sent; $formMsg = $sent ? t('f_ok') : t('f_fail');
    }
}
$keep = function ($k) use ($formOk) { return htmlspecialchars($formOk ? '' : (string)($_POST[$k] ?? ''), ENT_QUOTES, 'UTF-8'); };

$pageTitle = t('contact_title');
$pageDesc  = t('ct_info_d');
$current   = 'contact';
include 'includes_header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <h1><?= e('contact_title') ?></h1>
    <p><?= e('contact_desc') ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap prose-grid">
    <article class="block" id="contact-info">
      <h2><?= e('ct_info_t') ?></h2>
      <p><?= e('ct_info_d') ?></p>
    </article>
    <article class="block" id="location">
      <h2><?= e('ct_loc_t') ?></h2>
      <p><?= e('ct_loc_d') ?></p>
    </article>
    <article class="block block-wide" id="contact-form">
      <h2><?= e('ct_form_t') ?></h2>
      <p><?= e('ct_form_d') ?></p>
      <?php if ($formMsg): ?>
        <p class="form-msg <?= $formOk ? 'ok' : 'err' ?>" role="status"><?= htmlspecialchars($formMsg) ?></p>
      <?php endif; ?>
      <form class="contact-form" method="post" action="contact.php#contact-form">
        <label><?= e('f_name') ?>
          <input type="text" name="name" required autocomplete="name" value="<?= $keep('name') ?>"></label>
        <label><?= e('f_email') ?>
          <input type="email" name="email" required autocomplete="email" value="<?= $keep('email') ?>"></label>
        <label><?= e('f_phone') ?>
          <input type="tel" name="phone" autocomplete="tel" value="<?= $keep('phone') ?>"></label>
        <label><?= e('f_message') ?>
          <textarea name="message" rows="6" required><?= $keep('message') ?></textarea></label>
        <div class="hp" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
        <button class="btn btn-gold" type="submit"><?= e('f_send') ?></button>
      </form>
    </article>
  </div>
</section>

<?php include 'includes_footer.php'; ?>

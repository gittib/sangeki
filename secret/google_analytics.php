<?php require_once(__DIR__ . '/common.php'); ?>
<?php if (isProd()): ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53206929-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-53206929-3');
</script>
<?php else: ?>
<meta name="robots" content="noindex">
<?php endif; ?>

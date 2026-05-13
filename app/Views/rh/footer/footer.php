<?php
$footerYear = $footerYear ?? '2025';
$footerText = $footerText ?? 'TechMada RH';
$footerSuffix = $footerSuffix ?? '';
?>
        <div class="footer-app"><i class="bi bi-c-circle"></i> <?= esc($footerYear) ?> <span><?= esc($footerText) ?></span><?= $footerSuffix ?></div>
    </div>
</section>

<script src="<?= base_url('js/script.js') ?>"></script>
</body>

</html>

<footer>
<?php if ($credit = $slots->credit()): ?>
    <?= $credit ?>
<?php endif ?>
</footer>
<?= js(['assets/js/global.js', 'assets/js/lightbox.js', '@auto'])?> 
</body>

</html>
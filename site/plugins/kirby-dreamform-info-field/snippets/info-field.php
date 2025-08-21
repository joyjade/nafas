<?php

/**
 * @var \tobimori\DreamForm\Models\Submission|null $submission
 *
 * @var \Kirby\Cms\Block $block
 * @var \tobimori\DreamForm\Fields\NumberField $field
 * @var \tobimori\DreamForm\Models\FormPage $form
 * @var array $attr
 */
?>
<?php if ($block->text()->isNotEmpty()): ?>
    <div class="text">
        <?= $block->text()->permalinksToUrls(); ?>
    </div>
<?php endif; ?>

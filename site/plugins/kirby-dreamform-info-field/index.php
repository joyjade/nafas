<?php

use Kirby\Cms\App as Kirby;

@include_once __DIR__ . '/lib/InfoField.php';

\tobimori\DreamForm\DreamForm::register(InfoField::class);

Kirby::plugin('moinframe/kirby-dreamform-info-field', [
    'snippets' => [
        'dreamform/fields/info' => __DIR__ . '/snippets/info-field.php',
    ],
    'translations' => [
        'en' => [
            'moinframe.kirby-dreamform-info-field.title' => 'Info',
            'moinframe.kirby-dreamform-info-field.label' => 'Text',
            'moinframe.kirby-dreamform-info-field.placeholder' => 'Enter your text here',
        ],
        'de' => [
            'moinframe.kirby-dreamform-info-field.title' => 'Info',
            'moinframe.kirby-dreamform-info-field.label' => 'Text',
            'moinframe.kirby-dreamform-info-field.placeholder' => 'Geben Sie hier Ihren Text ein',
        ],
    ],
]);

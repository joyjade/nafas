<?php

use tobimori\DreamForm\Fields\Field;

class InfoField extends Field
{
    public static function blueprint(): array
    {
        return [
            'title' => t('moinframe.kirby-dreamform-info-field.title'),
            'label' => '{{ label }}',
            'preview' => 'info-field',
            'wysiwyg' => true,
            'icon' => 'info',
            'tabs' => [
                'field' => [
                    'label' => t('dreamform.field'),
                    'fields' => [
                        'text' => [
                            'label' => t('moinframe.kirby-dreamform-info-field.label'),
                            'type' => 'writer',
                            'placeholder' => t('moinframe.kirby-dreamform-info-field.placeholder'),
                            'nodes' => [],
                            'required' => false,
                            'translate' => false,
                        ]
                    ]
                ]
            ]
        ];
    }

    public static function type(): string
    {
        return 'info';
    }
}

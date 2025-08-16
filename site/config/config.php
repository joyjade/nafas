<?php
use tobimori\DreamForm\Support\Menu;

return [
  'debug'  => true,

 // Custom menu to show forms in the panel sidebar
  'panel.menu' => fn () => [
    'site' => Menu::site(),
    'forms' => Menu::forms(),
    'users',
    'system',
    // [...]
    ],
];

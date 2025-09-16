<?php
use tobimori\DreamForm\Support\Menu;

return [
  'panel' => [
    'install' => true
  ], 
  
  'debug'  => false,
  
  	// Cache for speed ⚡
	'cache.pages' => [
		'active' => true
	],

  'email' => [
      'transport' => [
        'type' => 'smtp',
        'host' => 'localhost',
        'port' => 587,
        'security' => false,
        'auth' => false,
        'username' => 'dreamform@andkindness.com',
        'password' => 'dreamform'
      ]
    ],


 // Custom menu to show forms in the panel sidebar
  'panel.menu' => fn () => [
    'site' => Menu::site(),
    'forms' => Menu::forms(),
    'users',
    'system',
    // [...]
    ],
  'routes' => [
    [
      'pattern' => 'api',
      'method'  => 'GET',
      'action'  => function () {
        $events = page('events')->children()->listed();
        $data = [];
       
        foreach ($events as $event) {
          $data[] = [
              'title' => $event->title()->value(),
              'start' => $event->date()->toDate('Y-m-d'), 
              'allDay' => true
          ];
        }
        
        return response::json($data);
      }
    ]
  ]
      
];

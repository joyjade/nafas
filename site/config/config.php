<?php
use tobimori\DreamForm\Support\Menu;

return [
  'panel' => [
    'install' => true
  ], 
  
  'debug'  => true,

  	// Cache for speed ⚡
	'cache.pages' => [
		'active' => true
	],

  'email' => [
      'transport' => [
        'type'     => 'smtp',
        'host'     => 'smtp.gmail.com',
        'port'     => 587,
        'security' => 'starttls',
        'auth'     => true,
        'username' => 'info@nafasresidency.org',         
        'password' => 'your-app-password-here', 
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

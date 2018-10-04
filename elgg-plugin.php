<?php

  return [
    'entities' => [
      [
        'type' => 'object',
        'subtype' => 'worksheet',
        'searchable' => true,
      ],
    ],
    'actions' => [
      'worksheet/save' => [],
      'begin' => []
    ],
    'routes' => [
      'login' => [
        'path' => 'logi-sisse',
        'resource' => 'login'
      ],
      'begin' => [
        'path' => 'kysitlused/alusta',
        'resource' => 'begin'
      ],
      'add:object:worksheet' => [
        'path' => 'kysitlused/uus/{wcode?}',
        'resource' => 'worksheet/add'
      ],
      'view:object:worksheet' => [
        'path' => 'kysitlused/{wcode}',
        'resource' => 'worksheet/view'
      ],
      'collection:object:worksheet:all' => [
        'path' => 'kysitlused',
        'resource' => 'worksheet/all'
      ]
    ],
  ];
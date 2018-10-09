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
      'begin' => [
        'access' => 'public'
      ],
      'sheets/worksheet1' => [
        'access' => 'public'
      ],
      'sheets/worksheet2' => [
        'access' => 'public'
      ],
      'sheets/worksheet3' => [
        'access' => 'public'
      ],
      'sheets/ws1-bussid' => [
        'access' => 'public'
      ],
      'sheets/ws1-emakeel' => [
        'access' => 'public'
      ]
    ],
    'routes' => [
      'uldpadevused:login' => [
        'path' => 'logi-sisse',
        'resource' => 'login'
      ],
      'uldpadevused:begin' => [
        'path' => 'kysitlused/alusta',
        'resource' => 'begin'
      ],
      'uldpadevused:admin' => [
        'path' => 'administratsioon',
        'resource' => 'admin'
      ],
      'add:object:worksheet' => [
        'path' => 'kysitlused/uus/{wcode?}',
        'resource' => 'worksheet/add'
      ],
      'view:object:worksheet' => [
        'path' => 'kysitlused/{wcode}/{page?}',
        'resource' => 'worksheet/view'
      ],
      'collection:object:worksheet:all' => [
        'path' => 'kysitlused',
        'resource' => 'worksheet/all'
      ]
    ],
  ];
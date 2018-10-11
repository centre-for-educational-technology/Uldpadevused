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
      'sheets/ws1-bussid' => [
        'access' => 'public'
      ],
      'sheets/ws1-emakeel' => [
        'access' => 'public'
      ],
      'lumela/lumela1' => ['access' => 'public'],
      'lumela/lumela2' => ['access' => 'public'],
      'lumela/lumela3' => ['access' => 'public'],
      'lumela/lumela4' => ['access' => 'public'],
      'lumela/lumela5' => ['access' => 'public'],
      'lumela/lumela6' => ['access' => 'public'],
      'lumela/lumela7' => ['access' => 'public'],
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
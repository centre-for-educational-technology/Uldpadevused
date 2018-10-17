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
      'universal/name' => ['access' => 'public'],
      'lumela/lumela1' => ['access' => 'public'],
      'lumela/lumela2' => ['access' => 'public'],
      'lumela/lumela3' => ['access' => 'public'],
      'lumela/lumela4' => ['access' => 'public'],
      'lumela/lumela5' => ['access' => 'public'],
      'lumela/lumela6' => ['access' => 'public'],
      'lumela/lumela7' => ['access' => 'public'],
      'lugmot/sobiv1' => ['access' => 'public'],
      'lugmot/sobiv2' => ['access' => 'public'],
      'lugmot/sobiv3' => ['access' => 'public'],
      'lugmot/sobiv4' => ['access' => 'public'],
      'lugmot/sobiv5' => ['access' => 'public'],
      'lugmot/sobiv6' => ['access' => 'public'],
      'lugmot/vale1' => ['access' => 'public'],
      'lugmot/vale2' => ['access' => 'public'],
      'lugmot/vale3' => ['access' => 'public'],
      'lugmot/vale4' => ['access' => 'public'],
      'lugmot/vale5' => ['access' => 'public'],
      'lugmot/vale6' => ['access' => 'public'],
      'lugmot/vale7' => ['access' => 'public'],
      'lugmot/vale8' => ['access' => 'public'],
      'lugmot/vale9' => ['access' => 'public'],
      'lugmot/vale10' => ['access' => 'public'],
      'lugmot/vale11' => ['access' => 'public'],
      'lugmot/vale12' => ['access' => 'public'],
      'lugmot/vale13' => ['access' => 'public'],
      'lugmot/vale14' => ['access' => 'public'],
      'lugmot/vale15' => ['access' => 'public'],
      'lugmot/vale16' => ['access' => 'public'],
      'lugmot/vale17' => ['access' => 'public'],
      'lugmot/vale18' => ['access' => 'public'],
      'lugmot/vale19' => ['access' => 'public'],
      'lugmot/vale20' => ['access' => 'public'],
      'lugmot/vale21' => ['access' => 'public'],
      'lugmot/vale22' => ['access' => 'public'],
      'lugmot/vale23' => ['access' => 'public'],
      'lugmot/vale24' => ['access' => 'public'],
      'lugmot/vale25' => ['access' => 'public'],
      'lugmot/vale26' => ['access' => 'public'],
      'lugmot/vale27' => ['access' => 'public'],
      'lugmot/vale28' => ['access' => 'public'],
      'lugmot/vale29' => ['access' => 'public'],
      'lugmot/vale30' => ['access' => 'public'],
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
      'collection:object:worksheet:all' => [
        'path' => 'kysitlused',
        'resource' => 'worksheet/all'
      ],
      'add:object:worksheet' => [
        'path' => 'kysitlused/uus/{wcode?}',
        'resource' => 'worksheet/add'
      ],
      'download:object:worksheet' => [
        'path' => 'kysitlused/{wcode}/download',
        'resource' => 'worksheet/download'
      ],
      'view:object:worksheet' => [
        'path' => 'kysitlused/{wcode}/{page?}',
        'resource' => 'worksheet/view'
      ],
    ],
  ];
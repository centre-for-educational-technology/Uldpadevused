<?php

  return [
    'entities' => [
      [
        'type' => 'object',
        'subtype' => 'worksheet',
        'searchable' => true,
      ],
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
      'lumela/lumela1' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/general.php'
      ],
      'lumela/lumela2' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/general.php'
      ],
      'lumela/lumela3' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/general.php'
      ],
      'lumela/lumela4' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/general.php'
      ],
      'lumela/lumela5' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/general.php'
      ],
      'lumela/lumela6' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/general.php'
      ],
      'lumela/lumela7' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lumela/final.php'
      ],
      'lugmot/sobiv1' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/sobiv2' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/sobiv3' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/sobiv4' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/sobiv5' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/sobiv6' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale1' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale2' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale3' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale4' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale5' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale6' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale7' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale8' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale9' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale10' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale11' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale12' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale13' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale14' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale15' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale16' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale17' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale18' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale19' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale20' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale21' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale22' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale23' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale24' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale25' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale26' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale27' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale28' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale29' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/general.php'
      ],
      'lugmot/vale30' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/lugmot/final.php'
      ],
      'upased/mata' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/upased/upa1.php'
      ],
      'upased/emakeel' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/upased/upa2.php'
      ]
    ],
  ];
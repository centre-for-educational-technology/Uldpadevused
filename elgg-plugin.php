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
      'uldpadevused:begin' => [
        'path' => 'polls/start',
        'resource' => 'begin'
      ],
      'collection:object:worksheet:all' => [
        'path' => 'polls',
        'resource' => 'worksheet/all'
      ],
      'add:object:worksheet' => [
        'path' => 'polls/new/{wcode?}',
        'resource' => 'worksheet/add'
      ],
      'download:object:worksheet' => [
        'path' => 'polls/{wcode}/download',
        'resource' => 'worksheet/download'
      ],
      'view:object:worksheet' => [
        'path' => 'polls/{wcode}/{poll?}/{page?}',
        'resource' => 'worksheet/view'
      ],
    ],
    'actions' => [
      'worksheet/save' => [],
      'begin' => [
        'access' => 'public'
      ],
      'sheets/metacognition' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/reading' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/studytutorial' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/motivation' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/text_plane' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/text_paper' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/text_teeth' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ]
    ],
  ];
<?php

  return [
    'entities' => [
      [
        'type' => 'object',
        'subtype' => 'worksheet',
        'searchable' => true,
      ],
      [
        'type' => 'object',
        'subtype' => 'drawing',
        'searchable' => true,
      ],
    ],
    'routes' => [
      'collection:object:worksheet:all' => [
        'path' => 'polls',
        'resource' => 'worksheet/all'
      ],
      'uldpadevused:begin' => [
        'path' => 'polls/start',
        'resource' => 'begin'
      ],
      'uldpadevused:teacher' => [
        'path' => 'polls/teacher',
        'resource' => 'teacher'
      ],
      'view:object:drawing' => [
        'path' => 'polls/drawings/{icode}',
        'resource' => 'drawing/view'
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
      'worksheet/delete' => [
        'access' => 'admin'
      ],
      'begin' => [
        'access' => 'public'
      ],
      'sheets/metacognition' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/reading' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/timedsubmit.php'
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
      ],
      'sheets/chain' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/raven' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/maths' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'sheets/maths2' => [
        'access' => 'public',
        'filename' => __DIR__ . '/actions/sheets/formsubmit.php'
      ],
      'send_maths' => [
        'access' => 'public',
      ],
    ],
  ];
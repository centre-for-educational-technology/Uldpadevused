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
      'worksheet/save' => []
    ],
    'routes' => [
      'add:object:worksheet' => [
        'path' => 'kysitlused/uus',
        'resource' => 'worksheet/add'
      ],
      'view:object:worksheet' => [
        'path' => 'kysitlused/{wcode}',
        'resource' => 'worksheet/view'
      ],
    ],
  ];
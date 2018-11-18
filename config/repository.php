<?php

return [
  'cache' => [
    //Enable or disable cache repositories
    'enabled' => true,

    //Lifetime of cache
    'minutes' => 30,

    //Repository Cache, implementation Illuminate\Contracts\Cache\Repository
    'repository' => 'cache',

    //Sets clearing the cache
    'clean' => [
      //Enable, disable clearing the cache on changes
      'enabled' => true,

      'on' => [
        //Enable, disable clearing the cache when you create an item
        'create' => true,

        //Enable, disable clearing the cache when upgrading an item
        'update' => true,

        //Enable, disable clearing the cache when you delete an item
        'delete' => true,
      ]
    ],
    'params' => [
      //Request parameter that will be used to bypass the cache repository
      'skipCache' => 'skipCache'
    ],
    'allowed' => [
      //Allow caching only for some methods
      'only' => null,

      //Allow caching for all available methods, except
      'except' => null
    ],
  ],
  'generator' => [
    'basePath' => app()->path(),
    'rootNamespace' => 'App\\',
    'paths' => [
      'models' => 'Models',
      'repositories' => 'Repositories\\Eloquent',
      'interfaces' => 'Contracts\\Repositories',
      'transformers' => 'Transformers',
      'presenters' => 'Presenters',
      'validators' => 'Validators',
      'controllers' => 'Http/Controllers',
      'provider' => 'RepositoryServiceProvider',
      'criteria' => 'Criteria',
    ]
  ]
];
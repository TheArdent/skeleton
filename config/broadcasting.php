<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Default Broadcaster
	|--------------------------------------------------------------------------
	|
	| This option controls the default broadcaster that will be used by the
	| framework when an event needs to be broadcast. You may set this to
	| any of the connections defined in the "connections" array below.
	|
	| Supported: "pusher", "redis", "log", "null"
	|
	*/

	'default' => env('BROADCAST_DRIVER', 'null'),

	/*
	|--------------------------------------------------------------------------
	| Broadcast Connections
	|--------------------------------------------------------------------------
	|
	| Here you may define all of the broadcast connections that will be used
	| to broadcast events to other systems or over websockets. Samples of
	| each available type of connection are provided inside this array.
	|
	*/


	'connections' => [

		'centrifuge' => [
			'driver'           => 'centrifuge',
			'secret'           => env('CENTRIFUGE_SECRET'), // you secret key
			'url'              => env('CENTRIFUGE_URL', 'http://localhost:8000'), // centrifuge api url
			'redis_api'        => env('CENTRIFUGE_REDIS_API', false), // enable or disable Redis API
			'redis_connection' => env('CENTRIFUGE_REDIS_CONNECTION', 'default'), // name of redis connection
			'redis_prefix'     => env('CENTRIFUGE_REDIS_PREFIX', 'centrifugo'), // prefix name for queue in Redis
			'redis_num_shards' => env('CENTRIFUGE_REDIS_NUM_SHARDS', 0), // number of shards for redis API queue
		],
		//        'pusher' => [
		//            'driver'  => 'pusher',
		//            'key'     => env('PUSHER_APP_KEY'),
		//            'secret'  => env('PUSHER_APP_SECRET'),
		//            'app_id'  => env('PUSHER_APP_ID'),
		//            'options' => [
		//                //
		//            ],
		//        ],
		//
		//        'redis' => [
		//            'driver'     => 'redis',
		//            'connection' => 'default',
		//        ],
		//
		//        'log' => [
		//            'driver' => 'log',
		//        ],
		//
		//        'null' => [
		//            'driver' => 'null',
		//        ],

	],

];

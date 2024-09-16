<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'sb'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'sb' => [
            'driver' => 's3',
            'key' => env('SB_ACCESS_KEY_ID'),
            'secret' => env('SB_SECRET_ACCESS_KEY'),
            'region' => env('SB_DEFAULT_REGION'),
            'bucket' => env('SB_BUCKET'),
            'url' => null,
            'endpoint' => env('SB_ENDPOINT'),
            'use_path_style_endpoint' => env('SB_USE_PATH_STYLE_ENDPOINT', true),
            'throw' => false,
            'bucket_endpoint' => true,
            'visibility' => 'public',

            'defaultUrlGenerationOptions' => [
                'download'  => false,
                'transform' => [],
            ],
        ],

        'supabase' => [
            'driver' => 'supabase',
            'key'    => env('SUPABASE_STORAGE_KEY'), // Use a privileged key; read-only does not work
            'bucket' => env('SUPABASE_STORAGE_BUCKET'),
            'endpoint' => env('SUPABASE_STORAGE_ENDPOINT'),

            'url'      => null, // <- Automatically generated; change here if you are using a proxy

            'public'                      => true,  // Default to true
            'defaultUrlGeneration'        => null, // 'signed' | 'public' <- default depends on public

            'defaultUrlGenerationOptions' => [
                'download'  => false,
                'transform' => [],
            ],

            'signedUrlExpires' => 60*60*24, // 1 day <- default to 1 hour (3600)
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
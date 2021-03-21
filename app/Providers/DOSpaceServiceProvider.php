<?php


namespace App\Providers;

use Aws\Credentials\Credentials;
use Illuminate\Support\ServiceProvider;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class DOSpaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('do-space', function ($app, $config) {
            $credential = new Credentials($config['key'],$config['secret']);
            $client = new S3Client([
                'credentials' => $credential,
                'region' => $config["region"],
                'version' => "2006-03-01",
                'bucket_endpoint' => false,
                'use_path_style_endpoint' => false,
                'endpoint' => $config["endpoint"],
            ]);
            return new Filesystem(new AwsS3Adapter($client, $config["bucket"]));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('config:clear');
        $this->refreshTestDatabase();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mongodb');
        $app['config']->set('database.connections.mongodb', [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE', 'laravel'),
        ]);

        Model::setConnectionResolver($app['db']);
        Model::clearBootedModels();
        Model::unsetEventDispatcher();

        RefreshDatabaseState::$migrated = true;
    }

    protected function refreshTestDatabase()
    {
        $connection = DB::connection('mongodb');
        $database = $connection->getDatabaseName();

        $connection->getMongoDB()->drop();

        if (!RefreshDatabaseState::$migrated) {
            $this->artisan('migrate:fresh');
            $this->app[Connection::class]->setDefaultConnection('mongodb');
            $this->app[Model::class]->setConnection('mongodb');
            RefreshDatabaseState::$migrated = true;
        }
    }
}

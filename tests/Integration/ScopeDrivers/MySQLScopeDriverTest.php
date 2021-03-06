<?php

namespace Netsells\GeoScope\Tests\Integration\ScopeDrivers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Netsells\GeoScope\Tests\Integration\ScopeDrivers\Traits\ScopeDriverTests;

class MySQLScopeDriverTest extends BaseScopeDriverTest
{
    use RefreshDatabase;
    use ScopeDriverTests;

    protected $scopeDriver;

    public function setUp(): void
    {
        parent::setUp();

        $this->scopeDriver = $this->getScopeDriver('mysql');
        $this->sqlSnippet = "ST_Distance_Sphere";
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        // Setup default database to use mysql test
        $app['config']->set('database.connections.testing', [
            'driver' => 'mysql',
            'host' => env('MYSQL_DB_HOST'),
            'database' => env('MYSQL_DB_DATABASE'),
            'username' => env('MYSQL_DB_USERNAME'),
            'password' => env('MYSQL_DB_PASSWORD'),
            'port' => env('MYSQL_DB_PORT'),
        ]);
    }
}

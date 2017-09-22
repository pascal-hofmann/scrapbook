<?php

namespace MatthiasMullie\Scrapbook\Tests\Providers;

use MatthiasMullie\Scrapbook\Exception\Exception;
use MatthiasMullie\Scrapbook\Tests\AdapterProvider;

class MemcachedProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!class_exists('Memcached')) {
            throw new Exception('ext-memcached is not installed.');
        }

        $client = new \Memcached();
        $client->addServer(getenv('host-memcached'), 11211);

        parent::__construct(new \MatthiasMullie\Scrapbook\Adapters\Memcached($client));
    }
}

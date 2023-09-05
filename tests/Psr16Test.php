<?php

/*
 * This file is part of rekalogika/psr-16-simple-cache-bundle package.
 *
 * (c) Priyadi Iman Nurcahyo <https://rekalogika.dev>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Rekalogika\Psr16SimpleCacheBundle\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;

class Psr16Test extends TestCase
{
    private ContainerInterface $container;

    public function setUp(): void
    {
        $kernel = new Kernel('test', true);
        $kernel->boot();
        $this->container = $kernel->getContainer();
    }

    public function testPsr16Cache(): void
    {
        $cache = $this->container->get('test.cache.app.simple');
        $this->assertInstanceOf(CacheInterface::class, $cache);

        $cache->set('foo', 'bar');
        $this->assertEquals('bar', $cache->get('foo'));

        $cache->delete('foo');
        $this->assertNull($cache->get('foo'));

        $cache->setMultiple(['foo' => 'bar', 'bar' => 'baz']);
        $this->assertEquals('bar', $cache->get('foo'));
        $this->assertEquals('baz', $cache->get('bar'));

        $cache->deleteMultiple(['foo', 'bar']);
        $this->assertNull($cache->get('foo'));
        $this->assertNull($cache->get('bar'));
    }
}

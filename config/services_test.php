<?php

/*
 * This file is part of rekalogika/domain-event package.
 *
 * (c) Priyadi Iman Nurcahyo <https://rekalogika.dev>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

use Psr\SimpleCache\CacheInterface;
use Rekalogika\Psr16SimpleCacheBundle\Tests\Kernel;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    if (!class_exists(Kernel::class)) {
        return;
    }

    $services->set(
        'cache.app',
        ArrayAdapter::class
    )
        ->tag('cache.pool');

    $services->alias('test.cache.app.simple', 'cache.app.simple')->public();
    $services->alias('test.' . CacheInterface::class, CacheInterface::class)->public();
};

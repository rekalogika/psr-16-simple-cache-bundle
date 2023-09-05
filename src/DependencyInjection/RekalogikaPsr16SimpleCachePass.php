<?php

/*
 * This file is part of rekalogika/psr-16-simple-cache-bundle package.
 *
 * (c) Priyadi Iman Nurcahyo <https://rekalogika.dev>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Rekalogika\Psr16SimpleCacheBundle\DependencyInjection;

use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Psr16Cache;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class RekalogikaPsr16SimpleCachePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        foreach ($container->findTaggedServiceIds('cache.pool') as $id => $tags) {
            $pool = $container->getDefinition($id);
            if ($pool->isAbstract()) {
                continue;
            }

            $definition = new Definition(Psr16Cache::class, [
                new Reference($id),
            ]);

            $definition->addTag('cache.pool.simple');

            $simpleId = $id.'.simple';
            $container->setDefinition($simpleId, $definition);

            if ($simpleId == 'cache.app.simple') {
                $container->setAlias(CacheInterface::class, $simpleId);
            }
        }
    }
}

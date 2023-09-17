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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class RekalogikaPsr16SimpleCacheExtension extends Extension
{
    /**
     * @param array<array-key,mixed> $configs
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $env = $container->getParameter('kernel.environment');

        $loader = new PhpFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config')
        );
        
        if ('test' === $env) {
            $loader->load('services_test.php');
        }
    }
}

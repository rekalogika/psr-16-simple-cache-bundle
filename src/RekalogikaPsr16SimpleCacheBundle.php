<?php

/*
 * This file is part of rekalogika/psr-16-simple-cache-bundle package.
 *
 * (c) Priyadi Iman Nurcahyo <https://rekalogika.dev>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Rekalogika\Psr16SimpleCacheBundle;

use Rekalogika\Psr16SimpleCacheBundle\DependencyInjection\RekalogikaPsr16SimpleCachePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RekalogikaPsr16SimpleCacheBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new RekalogikaPsr16SimpleCachePass());
    }
}

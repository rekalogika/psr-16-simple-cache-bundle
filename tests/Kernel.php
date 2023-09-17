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

use Rekalogika\Psr16SimpleCacheBundle\RekalogikaPsr16SimpleCacheBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel as HttpKernelKernel;

class Kernel extends HttpKernelKernel
{

    public function registerBundles(): iterable
    {
        return [
            new RekalogikaPsr16SimpleCacheBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
    }
}

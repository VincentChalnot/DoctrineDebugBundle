<?php
/*
 * This file is part of the Sidus/DoctrineDebugBundle package.
 *
 * Copyright (c) 2015-2018 Vincent Chalnot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sidus\DoctrineDebugBundle\DependencyInjection;

use Sidus\DoctrineDebugBundle\Logging\DebugStack;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Overrides base doctrine profiler class
 *
 * @author Vincent Chalnot <vincent@sidus.fr>
 */
class SidusDoctrineDebugExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->setParameter('doctrine.dbal.logger.profiling.class', DebugStack::class);
    }
}

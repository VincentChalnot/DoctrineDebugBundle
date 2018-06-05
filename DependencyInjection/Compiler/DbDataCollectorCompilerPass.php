<?php
/*
 * This file is part of the Sidus/DoctrineDebugBundle package.
 *
 * Copyright (c) 2015-2018 Vincent Chalnot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sidus\DoctrineDebugBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Overrides Doctrine's template in data-collector
 *
 * @author Vincent Chalnot <vincent@sidus.fr>
 */
class DbDataCollectorCompilerPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\InvalidArgumentException
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('data_collector.templates')) {
            $templates = $container->getParameter('data_collector.templates');
            $templates['data_collector.doctrine'] = [
                'db',
                '@SidusDoctrineDebug/Collector/db.html.twig',
            ];
            $container->setParameter('data_collector.templates', $templates);
        }
    }
}

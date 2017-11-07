<?php
/*
 *  Sidus/DoctrineDebugBundle: Tracing Doctrine queries in Symfony profiler
 *  Copyright (C) 2015-2017 Vincent Chalnot
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
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

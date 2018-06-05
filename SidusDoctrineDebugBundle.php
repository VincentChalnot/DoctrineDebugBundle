<?php
/*
 * This file is part of the Sidus/DoctrineDebugBundle package.
 *
 * Copyright (c) 2015-2018 Vincent Chalnot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sidus\DoctrineDebugBundle;

use Sidus\DoctrineDebugBundle\DependencyInjection\Compiler\DbDataCollectorCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class SidusDoctrineDebugBundle
 *
 * @package Sidus\DoctrineDebugBundle
 *
 * @author Vincent Chalnot <vincent@sidus.fr>
 */
class SidusDoctrineDebugBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new DbDataCollectorCompilerPass());
    }
}

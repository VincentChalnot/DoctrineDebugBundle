<?php
/*
 * This file is part of the Sidus/DoctrineDebugBundle package.
 *
 * Copyright (c) 2015-2018 Vincent Chalnot
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sidus\DoctrineDebugBundle\Logging;

/**
 * Inject stack trace in query info
 *
 * @author Vincent Chalnot <vincent@sidus.fr>
 */
class DebugStack extends \Doctrine\DBAL\Logging\DebugStack
{
    /**
     * {@inheritdoc}
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        parent::startQuery($sql, $params, $types);
        if ($this->enabled) {
            $stack = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            $this->queries[$this->currentQuery]['stack'] = array_splice($stack, 2);
        }
    }
}

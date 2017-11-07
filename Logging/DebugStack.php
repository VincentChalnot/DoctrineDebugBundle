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
        if ($this->enabled && function_exists('xdebug_get_function_stack')) {
            /** @noinspection ForgottenDebugOutputInspection */
            $stack = xdebug_get_function_stack(null, XDEBUG_STACK_NO_DESC);
            $this->queries[$this->currentQuery]['stack'] = array_splice($stack, 1, -2);
        }
    }
}

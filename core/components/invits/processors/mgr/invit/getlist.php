<?php
/**
 * Invits
 *
 * Copyright 2011 by Romain Tripault // Melting Media <romain@melting-media.com>
 *
 * Invits is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Invits is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Invits; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package invits
 */
/**
 * Get a list of Items
 *
 * @var $modx modX
 *
 * @package invits
 * @subpackage processors
 */
$isLimit = !empty($_REQUEST['limit']);
$start = $modx->getOption('start', $_REQUEST, 0);
$limit = $modx->getOption('limit', $_REQUEST, 20);
$sort = $modx->getOption('sort', $_REQUEST, 'date');
$dir = $modx->getOption('dir', $_REQUEST, 'DESC');

$c = $modx->newQuery('Invit');
$count = $modx->getCount('Invit', $c);

$c->sortby($sort, $dir);
if ($isLimit) $c->limit($limit, $start);
$invits = $modx->getCollection('Invit', $c);

$list = array();
/** @var $invit Invit */
foreach ($invits as $invit) {
    $invitArray = $invit->toArray();
    $list[] = $invitArray;
}
return $this->outputArray($list, $count);
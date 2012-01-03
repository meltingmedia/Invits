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
 * Update an Item
 *
 * @var $modx modX
 *
 * @package invits
 * @subpackage processors
 */

if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('invits.invit_err_ns'));
/** @var $invit Invit */
$invit = $modx->getObject('Invit', $scriptProperties['id']);
if (!$invit) return $modx->error->failure($modx->lexicon('invits.invit_err_nf'));

$invit->fromArray($scriptProperties);

if ($invit->save() == false) {
    return $modx->error->failure($modx->lexicon('invits.invit_err_save'));
}

// output
$invitArray = $invit->toArray('', true);
return $modx->error->success('', $invitArray);
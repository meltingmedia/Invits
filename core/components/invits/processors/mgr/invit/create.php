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
 * Creates an Invitation
 *
 * @var $modx modX
 * @var $scriptProperties array
 * @package invits
 * @subpackage processors
 */
$alreadyExists = $modx->getObject('Invit', array(
    'guest_email' => $scriptProperties['guest_email'],
));
$alreadyRegistered = $modx->getObject('modUserProfile', array(
    'email' => $scriptProperties['guest_email'],
));
if ($alreadyExists || $alreadyRegistered) {
    $modx->error->addField('guest_email', $modx->lexicon('invits.invit_err_ae'));
}

if ($modx->error->hasError()) {
    //$modx->log(modX::LOG_LEVEL_ERROR, 'failure!: '.print_r($modx->error->failure(), 1));
    return $modx->error->failure();
}

/** @var $invit Invit */
$invit = $modx->newObject('Invit');
$invit->fromArray($scriptProperties);
$invit->set('sender_id', $modx->user->get('id'));
$invit->set('date', time());
$invit->set('hash', $invit->createCode());

if ($invit->save() == false) {
    return $modx->error->failure($modx->lexicon('invits.invit_err_save'));
}

$modx->invokeEvent('OnInvitSave', array(
    'mode' => modSystemEvent::MODE_NEW,
    'id' => $invit->get('id'),
    'invit' => $invit,
));

return $modx->error->success('', $invit);
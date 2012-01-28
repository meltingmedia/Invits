<?php
/**
 * getInvits
 * Displays the given user invitations
 *
 * invitOnly - (bool) whether to allow or not registration without invitation
 * formTpl - the chunk containing the registration form
 *
 * invitsRegister "inherits" all Register snippet parameters
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';
$modx->lexicon->load('invits:web');

$user = $modx->getOption('user_id', $scriptProperties, $modx->user->get('id'));
$tpl = $modx->getOption('tpl', $scriptProperties, 'invit-display');

$c = $modx->newQuery('Invit');
$c->where(array('sender_id' => $user));

$total = $modx->getCount('Invit', $c);

$invits = $modx->getCollection('Invit', $c);
$list = array();
/** @var $invit Invit */
foreach ($invits as $invit) {
    $invitArray = $invit->toArray();
    $list[] = $Invits->getChunk($tpl, $invitArray);
}

$output = implode("\n", $list);
return $output;
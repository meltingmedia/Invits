<?php
/**
 * Updates an invitation once the invited user is registered (& activated)
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

$invitHash = $_REQUEST['referer'];
$userId = $_REQUEST['ru'];
$invit = false;
$modx->log(modX::LOG_LEVEL_ERROR, 'remove invit snippet hash: '.$invitHash);
$modx->log(modX::LOG_LEVEL_ERROR, 'remove invit snippet userid: '.$userId);

if ($invitHash) {
    /** @var $invit Invit */
    $invit = $modx->getObject('Invit', array(
        'hash' => $invitHash,
        'guest_registered' => 0,
    ));
}

if ($invit) {
    // Update the Invit object
    $invit->set('guest_registered', 1);
    $invit->save();

    // Creates the relationship
    /** @var $relationship InvitsRelationship */
    $relationship = $modx->newObject('InvitsRelationship');
    $relationship->set('sender_id', $invit->get('sender_id'));
    $relationship->set('invited_id', $userId);
    $relationship->save();

    $modx->invokeEvent('OnInvitedRegister', array(
        'invit' => $invit,
        'sender_id' => $invit->get('sender_id'),
        'user_id' => $userId,
    ));

    $modx->sendRedirect($modx->makeUrl($_REQUEST['landing']));
} else {
    $modx->log(modX::LOG_LEVEL_ERROR, 'no invit object in remove invit snippet');
}

$modx->sendRedirect($modx->makeUrl($modx->getOption('site_start')));
return 'Uhoh! Something went wrong...';
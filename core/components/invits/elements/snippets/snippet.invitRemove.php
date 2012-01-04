<?php
/**
 * Updates an invitation once invited user is registered (& activated)
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

$invitHash = $_GET['referer'];
$userId = $_GET['ru'];
$invit = false;

if ($invitHash) {
    $invit = $modx->getObject('Invit', array(
        'hash' => $invitHash,
        'guest_registered' => 0,
    ));
}

if ($invit) {
    /**
     * Update the Invit object
     *
     * @var $invit Invit
     */
    $invit->set('guest_registered', 1);
    $invit->save();

    /**
     * Creates the relationship
     *
     * @var $relationship InvitsRelationship
     */
    $relationship = $modx->newObject('InvitsRelationship');
    $relationship->set('sender_id', $invit->get('sender_id'));
    $relationship->set('invited_id', $userId);
    $relationship->save();

    $modx->invokeEvent('OnInvitedRegister', array(
        'invit' => $invit,
        'sender_id' => $invit->get('sender_id'),
        'user_id' => $userId,
    ));

    $modx->sendRedirect($modx->makeUrl($_GET['landing']));
}

return 'you should not see this!';
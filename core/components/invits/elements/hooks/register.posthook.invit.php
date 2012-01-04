<?php
/**
 * An Invit postHook for Register snippet (from Shaun McCormick's Login component)
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $hook LoginHooks
 * @var $scriptProperties array
 * @package invits
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

$activation = $scriptProperties['activation'];
/** @var $user modUser */
$user = $modx->getObject('modUser', array('username' => $hook->getValue($scriptProperties['usernameField'])));

if ($activation) {
    /* Registration requires an activation, at this stage modUser is created but not activated
     the invitation is not completely fulfilled yet */
    return true;
}

/** @var $invit Invit */
$invit = $modx->getObject('Invit', array(
    'hash' => $scriptProperties['invitHash'],
));
$invit->set('guest_registered', 1);
$invit->save();

/** @var $relationship InvitsRelationship */
$relationship = $modx->newObject('InvitsRelationship');
$relationship->set('sender_id', $invit->get('sender_id'));
$relationship->set('invited_id', $user->get('id'));
$relationship->save();

$modx->invokeEvent('OnInvitedRegister', array(
    'invit' => $invit,
    'sender_id' => $invit->get('sender_id'),
    'user_id' => $user->get('id'),
));

return true;
<?php
/**
 * A test plugin to check if Invits event are properly triggered
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 */

//if ($modx->context->get('key') == 'mgr') return;
switch ($modx->event->name) {
    case 'OnInvitedRegister':
        $modx->log(modX::LOG_LEVEL_ERROR, 'OnInvitedRegister triggered!');
        break;
    case 'OnInvitSave':
        $modx->log(modX::LOG_LEVEL_ERROR, 'OnInvitSave triggered!');
        break;
}

return;
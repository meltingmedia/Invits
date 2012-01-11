<?php
/**
 * Populates & displays the registration form with invitation data if available
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
$login = $modx->getObject('modNamespace', array('name' => 'login'));
if (!$login) return $modx->lexicon('invits.login_cmp_required');

$invitOnly = $modx->getOption('invitOnly', $scriptProperties, false);
$formTpl = $modx->getOption('formTpl', $scriptProperties, 'registrationform');
// Register default params
$emailField = $modx->getOption('emailField', $scriptProperties, 'email');

$invitHash = $_REQUEST['referer']; // @todo: make system settings/snippet parameter usage
if (!$invitHash && $invitOnly) {
    return $modx->lexicon('invits.invit_only_no_code');
}

$invit = false;
/** @var $invit Invit */
if ($invitHash) {
    $modx->setPlaceholder('invitHash', $invitHash);
    $invit = $modx->getObject('Invit', array(
        'hash' => $invitHash,
        'guest_registered' => 0,
    ));
}

if ($invitOnly && !$invit) {
    return $modx->lexicon('invits.invit_only_no_code_found');
}

// Loads the guest data set by the "inviter"
$guestInfos = array();
if ($invit) {
    $persistParams = array(
        'referer' => $invitHash,
    );
    //$scriptProperties['invitHash'] = $invitHash;
    $scriptProperties['persistParams'] = json_encode($persistParams);
    $guestInfos = array(
        $emailField => $invit->get('guest_email'),
        'fullname' => $invit->get('guest_name'),
    );

    if ($scriptProperties['invitDisableActivation']) {
        //$modx->log(modX::LOG_LEVEL_ERROR, 'activation disabled for invited users');
        $scriptProperties['activation'] = '0';
        //$scriptProperties['submittedResourceId'] = 37;
    }
}
// @todo: unset invitsRegister params ? (like formTpl, invitOnly…)
// Run original Register snippet, load & pre-fill the registration form
$modx->runSnippet('Register', $scriptProperties);
$form = $Invits->getChunk($formTpl, $guestInfos);

return $form;
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
$login = $modx->getObject('modNamespace', array('name' => 'login'));
if (!$login) return 'You need to have Login component installed, please install it first.';

$invitOnly = $modx->getOption('invitOnly', $scriptProperties, true);
$formTpl = $modx->getOption('formTpl', $scriptProperties, 'registrationform');
// Register default params
$emailField = $modx->getOption('emailField', $scriptProperties, 'email');

$invitHash = $_REQUEST['referer'];
if (!$invitHash && $invitOnly) {
    return 'no invitation code given';
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
    return 'No invitation found (or already used)';
}

// Loads the guest data set by the "inviter"
$guestInfos = array();
$persistParams = array(
    'referer' => $invitHash,
);

if ($invit) {
    //$scriptProperties['invitHash'] = $invitHash;
    $scriptProperties['persistParams'] = json_encode($persistParams);
    $guestInfos = array(
        $emailField => $invit->get('guest_email'),
        'fullname' => $invit->get('guest_name'),
    );
}
// @todo: unset invitsRegister params ? (like formTpl, invitOnly…)
$modx->runSnippet('Register', $scriptProperties);
$form = $Invits->getChunk($formTpl, $guestInfos);

return $form;
<?php
/**
 * Populates the form registration with invitation data if available
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 */

$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

$invitOnly = $modx->getOption('invitOnly', $scriptProperties, true);
$formTpl = $modx->getOption('formTpl', $scriptProperties, 'registrationform');
// Register default params
$emailField = $modx->getOption('emailField', $scriptProperties, 'email');
//$activation = $modx->getOption('activation', $scriptProperties, true);

$invitHash = $_GET['referer'];
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

/**
 * Loads the guest data set by the "godfather"
 */
$guestInfos = array();
if ($invit) {
    $scriptProperties['invitHash'] = $invitHash;
    $guestInfos = array(
        $emailField => $invit->get('guest_email'),
        'fullname' => $invit->get('guest_name'),
    );
}
// @todo: unset invitsRegister params ? (like formTpl, invitOnly…)
$modx->runSnippet('Register', $scriptProperties);
$form = $Invits->getChunk($formTpl, $guestInfos);

return $form;
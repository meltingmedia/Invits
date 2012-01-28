<?php
/**
 * An Invit postHook for FormIt.
 *
 * invitEmailTpl - Name of the chunk containing the email body
 * invitEmailSubject - The email subject the invitees will see
 * invitEmailFrom - Email address used to send the invitation
 * invitEmailFromName - Name displayed on the invitation email
 * invitEmailHtml - Whether or not send the email as HTML
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $hook fiHooks
 * @var $scriptProperties array
 * @package invits
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/');
if (!($Invits instanceof Invits)) return '';
$modx->lexicon->load('invits:web');
$prefix = $scriptProperties['prefix'] ? $scriptProperties['prefix'] : 'invit-'; // @todo: system setting/snippet param

$invitEmailTpl = $modx->getOption('invitEmailTpl', $scriptProperties, 'invit-email-tpl');
$invitEmailSubject = $modx->getOption('invitEmailSubject', $scriptProperties, $modx->lexicon('invits.invit_email_subject', array('site_name' => $modx->getOption('site_name'))));
$invitEmailFrom = $modx->getOption('invitEmailFrom', $scriptProperties, $modx->getOption('emailsender'));
$invitEmailFromName = $modx->getOption('invitEmailFromName', $scriptProperties, $modx->getOption('site_name'));
$invitEmailHtml = $modx->getOption('invitEmailHtml', $scriptProperties, false);

$invits = $hook->getValues();
$params = array();

if (!$invits[$prefix.'email'] || $invits[$prefix.'email'] == '') {
    // Should never occur if you use FormIt validators
    $modx->setPlaceholder('error', $modx->lexicon('invits.invit_email_err_invalid_email'));
    return false;
}

$params['guest_email'] = $invits[($prefix.'email')];
if ($invits[$prefix.'name']) $params['guest_name'] = $invits[$prefix.'name'];

/** @var $response modProcessorResponse */
$response = $modx->runProcessor('mgr/invit/create', $params, array(
    'processors_path' => $Invits->config['processorsPath'],
));
if ($response->isError()) {
    $modx->setPlaceholder('error', $modx->lexicon('invits.invit_err_save'));
    return false;
}

// Now let's send the email
$invitArray = $response->getObject();
/** @var $invit Invit */
$invit = $modx->getObject('Invit', $invitArray['id']);
if (!$invit) {
    $modx->setPlaceholder('error', $modx->lexicon('invits.invit_err_save'));
    return false;
}
$invitArray = $invit->toArray();
$to = $invit->get('guest_email');

$subject = $invitEmailSubject;
$body = $Invits->getChunk($invitEmailTpl, $invitArray);

$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY, $body);
$modx->mail->set(modMail::MAIL_FROM, $invitEmailFrom);
$modx->mail->set(modMail::MAIL_FROM_NAME, $invitEmailFromName);
$modx->mail->set(modMail::MAIL_SUBJECT, $subject);
$modx->mail->address('to', $to);
if ($invitEmailHtml) {
    $modx->mail->setHTML(true);
}

if (!$modx->mail->send()) {
    $error = $modx->mail->mailer->ErrorInfo;
    $modx->setPlaceholder('error', $error);
    return false;
}
$modx->mail->reset();

$_SESSION['invit'] = array(
    'to' => $to,
    'name' => $invits[$prefix.'name'],
);
$modx->sendRedirect($modx->makeUrl($modx->resource->get('id'), '', array('success' => 1)));
return true;
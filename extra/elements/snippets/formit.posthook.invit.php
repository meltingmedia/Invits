<?php
/**
 * An Invit postHook for FormIt.
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $hook fiHooks
 * @var $scriptProperties array
 * @package invits
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/');
if (!($Invits instanceof Invits)) return '';

$prefix = $scriptProperties['prefix'] ? $scriptProperties['prefix'] : 'invit-';
$invits = $hook->getValues();
$params = array();

/*$modx->setPlaceholder('error', 'just testing');
return false;*/

if (!$invits[$prefix.'email'] || $invits[$prefix.'email'] == '') {
    // Should never occur if you use FormIt validators
    $modx->setPlaceholder('error', 'You must provide a valid email address');
    return false;
}

$params['guest_email'] = $invits[($prefix.'email')];
if ($invits[$prefix.'name']) $params['guest_name'] = $invits[$prefix.'name'];

/** @var $response modProcessorResponse */
$response = $modx->runProcessor('mgr/invit/create', $params, array(
    'processors_path' => $Invits->config['processorsPath'],
));
if ($response->isError()) {
    //$error = $response->getMessage();
    /*$error = $response->getAllErrors();
    $modx->log(modX::LOG_LEVEL_ERROR, 'response error: '.print_r($error, 1));
    $modx->setPlaceholder('error', $error);*/
    $modx->setPlaceholder('error', 'Woops something went wrong!');
    return false;
}

// @todo: support multiples invits in a row
/*foreach ($invits as $invit => $v) {
    if (substr($invit, 0, strlen($prefix)) != $prefix || $v['email'] == '') continue;
    $params = array(
        'guest_email' => $v['email'],
        'guest_name' => $v['name'],
    );
    $response = $modx->runProcessor('mgr/invit/create', $params, array(
        'processors_path' => $Invits->config['processorsPath'],
    ));
    if ($response->isError()) {
        return $response->getMessage();
    }
}*/

// Now let's send the email
$invitArray = $response->getObject();
/** @var $invit Invit */
$invit = $modx->getObject('Invit', $invitArray['id']);
if (!$invit) {
    $modx->setPlaceholder('error', 'An error occured while trying to save the invitation');
    return false;
}
$invitArray = $invit->toArray();
$to = $invit->get('guest_email');

$subject = 'You\'ve been invited to '.$modx->getOption('site_name').' website';
$body = $modx->getChunk('invit-email-chunk', $invitArray);

$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY, $body);
$modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
$modx->mail->set(modMail::MAIL_FROM_NAME, $modx->getOption('site_name'));
$modx->mail->set(modMail::MAIL_SUBJECT, $subject);
$modx->mail->address('to', $to);
//$modx->mail->setHTML(true);

if (!$modx->mail->send()) {
    $error = $modx->mail->mailer->ErrorInfo;
    $modx->setPlaceholder('error', $error);
    return false;
}
$modx->mail->reset();

return true;
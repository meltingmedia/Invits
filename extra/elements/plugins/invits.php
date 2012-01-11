<?php
/**
 * A sample plugin for Invits sending an email to the invitee after a
 * successful invitation creation in the back-end
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 * @event OnInvitSave
 */

if ($modx->context->get('key') != 'mgr') return;
switch ($modx->event->name) {
    case 'OnInvitSave':
        if ($scriptProperties['mode'] != 'new') return;     // First make sure we only send the email when an invitation is created from the manager
        /** @var $invit Invit */
        $invit = $scriptProperties['invit'];                // Here we got the Invit object
        $invitArray = $invit->toArray();                    // We put invit data into an array to be usable in placeholders (for our email content)
        $to = $invit->get('guest_email');                   // The invitee email address

        $subject = 'You\'ve been invited to '.$modx->getOption('site_name').' website';     // Our email subject
        $body = $modx->getChunk('invit-email-chunk', $invitArray);                          // Our email content, using 'invit-email-chunk' chunk

        $modx->getService('mail', 'mail.modPHPMailer');
        $modx->mail->set(modMail::MAIL_BODY, $body);
        $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
        $modx->mail->set(modMail::MAIL_FROM_NAME, $modx->getOption('site_name'));
        $modx->mail->set(modMail::MAIL_SUBJECT, $subject);
        $modx->mail->address('to', $to);
        //$modx->mail->setHTML(true);
        $modx->mail->send();
        $modx->mail->reset();
        break;
}

return;
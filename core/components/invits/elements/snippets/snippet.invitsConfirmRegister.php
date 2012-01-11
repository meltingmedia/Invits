<?php
/**
 * Wraps the ConfirmRegister snippet to redirect to a resource to create the
 * "inviter" > invitee relationship & set the invitation as "used". Then users
 * will be redirected to another resource (a thank you page for example).
 *
 * finalLanding - (integer) the resource ID where the user should be redirected to upon successful activation/confirmation
 * invitRemove - (integer) the resource ID where invitRemove snippet is called
 *
 * invitsConfirmRegister "inherits" all ConfirmRegister snippet parameters
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

if ($_REQUEST['invit']) {
    $invitHash = $_REQUEST['referer'];
    $invit = false;
    /** @var $invit Invit */
    if ($invitHash) {
        $invit = $modx->getObject('Invit', array(
            'hash' => $invitHash,
            'guest_registered' => 0,
        ));
    }

    $username = base64_decode(urldecode(rawurldecode($_REQUEST['lu'])));
    /** @var $user modUser */
    $user = $modx->getObject('modUser', array(
        'username' => $username,
    ));
    if (!$invitHash || !$username || !$user || !$scriptProperties['finalLanding']) return;

    /**
     * $redirectParams Parameters array to be used in ConfirmRegister snippet
     *
     * $redirectParams['referer'] = invit code/hash
     * $redirectParams['landing'] = resource where the user should end
     * $redirectParams['ru'] = (invitee, registered user) user id
     */
    $redirectParams = array(
        'referer' => $invitHash,
        'landing' => $scriptProperties['finalLanding'],
        'ru' => $user->get('id'),
    );
    $redirectParams = array_merge($scriptProperties['redirectParams'], $redirectParams);
    if ($invit) {
        $scriptProperties['redirectParams'] = json_encode($redirectParams);
        if (isset($scriptProperties['invitRemove'])) {
            $scriptProperties['redirectTo'] = $scriptProperties['invitRemove'];
        }
    }
}
// @todo: unset invitsConfirmRegister params ? (like invitRemove, finalLanding)
$modx->runSnippet('ConfirmRegister', $scriptProperties);

return;
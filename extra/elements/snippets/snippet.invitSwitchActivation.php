<?php
/**
 *
 * @var $modx modX
 * @var $scriptProperties array
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

//$invit = $_REQUEST['referer'] ? true : false;
$invit = false;
$hash = $_REQUEST['referer'];
if ($hash) {
    $invitation = $modx->getObject('Invit', array(
        'hash' => $hash,
        'guest_registered' => 0
    ));
    if ($invitation) $invit = true;
}

if ($invit) return 0;
return 1;
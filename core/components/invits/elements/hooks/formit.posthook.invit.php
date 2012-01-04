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
if (!$invits[$prefix.'email']) return false;

$params['guest_email'] = $invits[$prefix.'email'];
if ($invits[$prefix.'name']) $params['guest_name'] = $invits[$prefix.'name'];

$creation = $modx->runProcessor('mgr/invit/create', $params, array(
    'processors_path' => $Invits->config['processorsPath'],
));
if ($creation->isError()) {
    return $creation->getMessage();
    //return $modx->log(modX::LOG_LEVEL_ERROR, print_r($creation->getMessage(), 1));
}

// @todo: support multiples invits in a row
/*foreach ($invits as $invit => $v) {
    if (substr($invit, 0, strlen($prefix)) != $prefix || $v['email'] == '') continue;
    $params = array(
        'guest_email' => $v['email'],
        'guest_name' => $v['name'],
    );
    $creation = $modx->runProcessor('mgr/invit/create', $params, array(
        'processors_path' => $Invits->config['processorsPath'],
    ));
    if ($creation->isError()) {
        return $creation->getMessage();
    }
}*/


return true;
<?php
/**
 * An Invit preHook for Register snippet (from Shaun McCormick's Login component)
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $hook LoginHooks
 * @var $scriptProperties array
 *
 * @package invits
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

$modx->log(modX::LOG_LEVEL_ERROR, 'in invit prehook');
return true;
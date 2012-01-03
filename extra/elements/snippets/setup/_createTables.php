<?php
/**
 * Snippet to create the required table(s).
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $scriptProperties array
 *
 * @package invits
 */
$Invits = $modx->getService('invits', 'Invits', $modx->getOption('invits.core_path', null, $modx->getOption('core_path').'components/invits/').'model/invits/', $scriptProperties);
if (!($Invits instanceof Invits)) return '';

// define the object(s)
$tables = array('Invit', 'InvitsRelationship');

// create appropriate table(s)
$m = $modx->getManager();
$o = '<ul>';
foreach ($tables as $table) {
    $t = $m->createObjectContainer($table);
    $o .= $t ? '<li>'.$table.' created</li>' : '<li>'.$table.' not created</li>';
}

return $o.'</ul>';
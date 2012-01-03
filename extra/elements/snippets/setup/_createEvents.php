<?php
/**
 * Base snippet to create system events
 *
 * @var $xpdo xPDO
 * @var $modx modX
 */

$events = include dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/_build/data/transport.events.php';
// Custom event
$events['OnInvitedFirstBuy'] = $modx->newObject('modEvent');
$events['OnInvitedFirstBuy']->fromArray(array (
  'name' => 'OnInvitedFirstBuy',
  'service' => 1,
  'groupname' => 'Invits',
), '', true, true);

/** @var $event modEvent */
foreach ($events as $event) {
    $event->save();
}
unset($event);

return 'done';
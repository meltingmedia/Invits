<?php
/**
 * @package invits
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/invitsrelationship.class.php');
class InvitsRelationship_mysql extends InvitsRelationship {}
?>
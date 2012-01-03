<?php
/**
 * @package invits
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/invit.class.php');
class Invit_mysql extends Invit {}
?>
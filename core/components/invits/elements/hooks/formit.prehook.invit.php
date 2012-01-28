<?php
/**
 * An Invit preHook for FormIt.
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $hook fiHooks
 * @var $scriptProperties array
 * @package invits
 */
if ($_GET['success'] == 1 && $_SESSION['invit']) {
    $display = $_SESSION['invit']['name'] ? $_SESSION['invit']['name'] : $_SESSION['invit']['to'];
    $modx->setPlaceholder('error', 'Your invitation to '. $display .' has successfully been sent.');
    $_SESSION['invit'] = '';
}
return true;
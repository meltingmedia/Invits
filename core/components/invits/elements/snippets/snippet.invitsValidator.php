<?php
/**
 * A custom invitation validator for FormIt
 *
 * @var $modx modX
 * @var $Invits Invits
 * @var $validator fiValidator
 * @var $key string
 * @var $value string|array
 * @var $scriptProperties array
 */
$modx->log(modX::LOG_LEVEL_ERROR, print_r($value, 1). ' +key '.print_r($key, 1));
$email = $value['email'];
if (!(filter_var($email, FILTER_VALIDATE_EMAIL)) && $email != '') {
    $validator->addError($key, 'not a valid email');
}

return true;
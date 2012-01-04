<?php
/**
 * Invits
 *
 * Copyright 2011 by Romain Tripault // Melting Media <romain@melting-media.com>
 *
 * Invits is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Invits is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Invits; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package invits
 */
/**
 * Add snippets to build
 *
 * @var $modx modX
 * 
 * @package invits
 * @subpackage build
 */
$snippets = array();

$snippets[0] = $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'invitRemove',
    'description' => 'Updates an invitation once the invited user is registered (& activated)',
    'snippet' => getSnippetContent($sources['snippets'].'snippet.invitRemove.php'),
), '', true, true);
/*$properties = include $sources['build'].'properties/properties.invits.php';
$snippets[0]->setProperties($properties);
unset($properties);*/

$snippets[1] = $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'reg.postInvit',
    'description' => 'An Invit postHook for Register snippet (from Shaun McCormick\'s Login component)',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/hooks/register.posthook.invit.php'),
), '', true, true);
/*$properties = include $sources['build'].'properties/properties.posthook.invit.php';
$snippets[1]->setProperties($properties);
unset($properties);*/

$snippets[2] = $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'invitsConfirmRegister',
    'description' => 'ConfirmRegister snippet wrapper',
    'snippet' => getSnippetContent($sources['snippets'].'snippet.invitsConfirmRegister.php'),
), '', true, true);
$properties = include $sources['build'].'properties/properties.invitsConfirmRegister.php';
$snippets[2]->setProperties($properties);
unset($properties);

$snippets[3] = $modx->newObject('modSnippet');
$snippets[3]->fromArray(array(
    'id' => 3,
    'name' => 'invitsRegister',
    'description' => 'Register snippet wrapper',
    'snippet' => getSnippetContent($sources['snippets'].'snippet.invitsRegister.php'),
), '', true, true);
$properties = include $sources['build'].'properties/properties.invitsRegister.php';
$snippets[3]->setProperties($properties);
unset($properties);

return $snippets;
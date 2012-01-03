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
 * Adds modActions and modMenus into package
 *
 * @var $modx modX
 *
 * @package invits
 * @subpackage build
 */
/** @var $action modAction */
$action = $modx->newObject('modAction');
$action->fromArray(array(
    'id' => 1,
    'namespace' => 'invits',
    'parent' => 0,
    'controller' => 'index',
    'haslayout' => 1,
    'lang_topics' => 'invits:default',
    'assets' => '',
), '', true, true);

// load action into menu
/** @var $menu modMenu */
$menu = $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'invits',
    'parent' => 'components',
    'description' => 'invits.menu_desc',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
), '', true, true);
$menu->addOne($action);
unset($action);

return $menu;
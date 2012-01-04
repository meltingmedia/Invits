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
 * Properties for the invitsConfirmRegister snippet.
 *
 * @package invits
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'finalLanding',
        'desc' => 'prop_invitsconfirmregister.finallanding_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    array(
        'name' => 'invitRemove',
        'desc' => 'prop_invitsconfirmregister.invitremove_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    // Original confirmRegister params
    array(
        'name' => 'redirectParams',
        'desc' => 'prop_confirmregister.redirectparams_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'authenticate',
        'desc' => 'prop_confirmregister.authenticate_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'authenticateContexts',
        'desc' => 'prop_confirmregister.authenticatecontexts_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'errorPage',
        'desc' => 'prop_confirmregister.errorpage_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
);

return $properties;
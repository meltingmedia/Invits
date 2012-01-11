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
 * Properties for the invitsRegister snippet.
 *
 * @package invits
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'invitEmailTpl',
        'desc' => 'prop_fi.postinvit.invitemailtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    array(
        'name' => 'invitEmailSubject',
        'desc' => 'prop_fi.postinvit.invitemailsubject_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    array(
        'name' => 'invitEmailFrom',
        'desc' => 'prop_fi.postinvit.invitemailfrom_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    array(
        'name' => 'invitEmailFromName',
        'desc' => 'prop_fi.postinvit.invitemailfromname_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    array(
        'name' => 'invitEmailHtml',
        'desc' => 'prop_fi.postinvit.invitemailhtml_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
);

return $properties;
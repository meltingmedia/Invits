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
        'name' => 'invitOnly',
        'desc' => 'prop_invitsregister.invitonly_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    array(
        'name' => 'formTpl',
        'desc' => 'prop_invitsregister.formtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'invits:properties',
        'area' => 'Invits',
    ),
    // Original Register params
    array(
        'name' => 'submitVar',
        'desc' => 'prop_register.submitvar_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'usergroups',
        'desc' => 'prop_register.usergroups_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'submittedResourceId',
        'desc' => 'prop_register.submittedresourceid_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'usernameField',
        'desc' => 'prop_register.usernamefield_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'username',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'passwordField',
        'desc' => 'prop_register.passwordfield_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'password',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'validatePassword',
        'desc' => 'prop_register.validatepassword_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'generatePassword',
        'desc' => 'prop_register.generatepassword_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'trimPassword',
        'desc' => 'prop_register.trimpassword_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'allowedFields',
        'desc' => 'prop_register.allowedfields_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'emailField',
        'desc' => 'prop_register.emailfield_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'email',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'successMsg',
        'desc' => 'prop_register.successmsg_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'persistParams',
        'desc' => 'prop_register.persistparams_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'preHooks',
        'desc' => 'prop_register.prehooks_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'postHooks',
        'desc' => 'prop_register.posthooks_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'useExtended',
        'desc' => 'prop_register.useextended_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'excludeExtended',
        'desc' => 'prop_register.excludeextended_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activation',
        'desc' => 'prop_register.activation_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => true,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationttl',
        'desc' => 'prop_register.activationttl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '180',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationResourceId',
        'desc' => 'prop_register.activationresourceid_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 1,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationEmail',
        'desc' => 'prop_register.activationemail_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationEmailSubject',
        'desc' => 'prop_register.activationemailsubject_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationEmailTplType',
        'desc' => 'prop_register.activationemailtpltype_desc',
        'type' => 'list',
        'options' => array(
            array('name' => 'opt_register.chunk','value' => 'modChunk'),
            array('name' => 'opt_register.file','value' => 'file'),
            array('name' => 'opt_register.inline','value' => 'inline'),
            array('name' => 'opt_register.embedded','value' => 'embedded'),
        ),
        'value' => 'modChunk',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationEmailTpl',
        'desc' => 'prop_register.activationemailtpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'lgnActivateEmailTpl',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'activationEmailTplAlt',
        'desc' => 'prop_register.activationemailtplalt_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'moderatedResourceId',
        'desc' => 'prop_register.moderatedresourceid_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),

    array(
        'name' => 'placeholderPrefix',
        'desc' => 'prop_register.placeholderprefix_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    /* recaptcha hook */
    array(
        'name' => 'recaptchaTheme',
        'desc' => 'prop_register.recaptchatheme_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'opt_register.red','value' => 'red'),
            array('text' => 'opt_register.white','value' => 'white'),
            array('text' => 'opt_register.clean','value' => 'clean'),
            array('text' => 'opt_register.blackglass','value' => 'blackglass'),
        ),
        'value' => 'clean',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    /* math hook */
    array(
        'name' => 'mathMinRange',
        'desc' => 'prop_register.mathminrange_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 10,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'mathMaxRange',
        'desc' => 'prop_register.mathmaxrange_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 100,
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'mathField',
        'desc' => 'prop_register.mathfield_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'math',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'mathOp1Field',
        'desc' => 'prop_register.mathop1field_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'op1',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'mathOp2Field',
        'desc' => 'prop_register.mathop2field_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'op2',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
    array(
        'name' => 'mathOperatorField',
        'desc' => 'prop_register.mathoperatorfield_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'operator',
        'lexicon' => 'login:properties',
        'area' => 'Login',
    ),
);

return $properties;
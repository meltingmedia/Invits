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
 * Loads the invitation creation/edition page.
 *
 * @var $modx modX
 * @var $Invits Invits
 *
 * @package invits
 * @subpackage controllers
 */
$record = array();
$create = $_REQUEST['id'] ? false : true;
if (!$create) {
    /** @var $invit Invit */
    $invit = $modx->getObject('Invit', $_REQUEST['id']);
    if (!$invit) return $modx->lexicon('invits.invit_err_nf');
    $record = $invit->toArray();
}

//$modx->regClientStartupScript($Invits->config['jsUrl'].'mgr/widgets/home/invits.grid.js');
$modx->regClientStartupScript($Invits->config['jsUrl'].'mgr/widgets/invit/invit.panel.js');
$modx->regClientStartupScript($Invits->config['jsUrl'].'mgr/sections/invit.js');
$modx->regClientStartupHTMLBlock('
<script type="text/javascript">
// <![CDATA[
Ext.onReady(function() {
    MODx.load({
        xtype: "invits-page-invit"
        ,record: '.$modx->toJSON($record).'
    });
});
// ]]>
</script>');

$output = '<div id="invits-panel-invit-div"></div>';
return $output;
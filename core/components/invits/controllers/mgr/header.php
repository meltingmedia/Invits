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
 * Loads the header for mgr pages.
 *
 * @var $modx modX
 * @var $Invits Invits
 *
 * @package invits
 * @subpackage controllers
 */
//$modx->regClientCSS($Invits->config['cssUrl'].'mgr.css');
$modx->regClientStartupScript($Invits->config['jsUrl'].'mgr/invits.js');
$modx->regClientStartupHTMLBlock('<script type="text/javascript">
Ext.onReady(function() {
    Invits.config = '.$modx->toJSON($Invits->config).';
    Invits.config.connector_url = "'.$Invits->config['connectorUrl'].'";
    Invits.action = "'.(!empty($_REQUEST['a']) ? $_REQUEST['a'] : 0).'";
});
</script>');

return '';
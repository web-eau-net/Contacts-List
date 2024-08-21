<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_contacts_list
 * @Author 		web-eau.net
 * @copyright   Copyright (C) 2005 - 2023 - web-eau.net - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

$cacheid = md5($module->id);

$cacheparams               = new \stdClass;
$cacheparams->cachemode    = 'id';
$cacheparams->class        = 'Joomla\Module\ContactsList\Site\Helper\ContactsListHelper';
$cacheparams->method       = 'getContacts';
$cacheparams->methodparams = $params;
$cacheparams->modeparams   = $cacheid;

$list = ModuleHelper::moduleCache($module, $params, $cacheparams);
/*
use Joomla\Module\ContactsList\Site\Helper\ContactsListHelper;
// Include the Contacts List functions only once
// JLoader::register('ModContactsListHelper', __DIR__ . '/helper.php');

// Get the list of Contacts
$list = ContactsListHelper::getContacts($params);
*/
// Load the default view
require ModuleHelper::getLayoutPath('mod_contacts_list', $params->get('layout', 'default'));
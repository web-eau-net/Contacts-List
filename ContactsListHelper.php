<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_contacts_list
 * @Author      web-eau.net
 * @copyright   Copyright (C) 2005 - 2019 - web-eau.net - All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\ContactsList\Site\Helper;

\defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Environment\Browser;
use Joomla\Component\Contact\Site\Model\ContactModel;
use Joomla\Registry\Registry;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;


class ContactsListHelper
{

  public static function getContacts($params)
  {
    $db = Factory::getDbo();

    // Get Articles from db
    $sort = $params->get('sorting');
    $no_of_contacts = $params->get('count');
	$featured = $params->get('featured');
	$catId = join(',', $params->get('catid'));
	
    if ($featured == '') {
        $featured = "<'2'";
    } elseif ($featured) {
        $featured = "='1'";
    } else {
        $featured = "='0'";
    }

    // Retrieve the shout
    $query = $db->getQuery(true)
                ->select('*')
                ->from($db->quoteName('#__contact_details'))
                ->where("published='1'")
				->where("featured".$featured."")
                ->where("catid IN (" . $catId . ")")
                ->order($sort)
                ->setLimit($no_of_contacts);
    // Prepare the query

    $db->setQuery($query);
    // Load the row.
    $result = $db->loadObjectList();   
    // Return the result
    return $result;
  }

}

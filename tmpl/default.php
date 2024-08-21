<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_contacts_list
 * @Author		web-eau.net
 * @copyright   Copyright (C) 2012 - 2019 - web-eau.net - All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
$document = Factory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_contacts_list/css/style.css');  


?>
<ul class="staff list-unstyled">
  <?php foreach ($list as $contact): ?>
    <?php
      $contact->slug    = $contact->id . ':' . $contact->alias;
      $contact->link = Route::_(RouteHelper::getContactRoute($contact->slug, $contact->catid));
      ?>
    <li>
      <!-- Show Image -->
      <?php if($params->get('show_image') && !empty($contact->image)) :?>
      <div class="contact-list-img"><img src="<?php echo htmlspecialchars($contact->image); ?>" class="<?php echo $params->get('image_style'); ?>" style="width: <?php echo $params->get('image_width').'px'; ?>" /></div>
      <?php endif; ?>
      <h3 class="contact-name">
        <a href="<?php echo $contact->link; ?>">
          <?php echo $contact->name; ?>
        </a>
      </h3>
      <!-- Show Position -->
      <?php if($params->get('show_position') && !empty($contact->con_position)) :?>
      <p><?php echo $contact->con_position; ?></p>
      <?php endif; ?>

      <!-- Show Email -->
      <?php if($params->get('show_email') && !empty($contact->email_to)) :?>
      <a href="mailto:<?php echo $contact->email_to; ?>" title="Email"><?php echo $contact->email_to; ?></a>
      <?php endif; ?><hr />
    </li>
  <?php endforeach; ?>
</ul>

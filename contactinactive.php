<?php

/*-------------------------------------------------------+
| SYSTOPIA - Contact Inactive                            |
| Copyright (C) 2017 SYSTOPIA                            |
| Author: M. Wire (mjw@mjwconsult.co.uk)                 |
| http://www.systopia.de/                                |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

require_once 'contactinactive.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function contactinactive_civicrm_config(&$config) {
  _contactinactive_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function contactinactive_civicrm_install() {
  _contactinactive_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function contactinactive_civicrm_enable() {
  _contactinactive_civix_civicrm_enable();
}

function contactinactive_civicrm_summaryActions(&$actions, $contactId) {
  $actions['contactinactive'] = [
    'title'  => 'Set to Inactive',
    'weight' => max(array_column($actions, 'weight')) + 999,
    'ref'    => 'contact-inactive',
    'key'    => 'contact-inactive',
    'href'   => CRM_Utils_System::url('civicrm/contact/setinactive', "cid=$contactId"),
    'tab'    => 'summary',
  ];
}

function contactinactive_civicrm_searchTasks( $objectName, &$tasks ){
  if($objectName == 'contact'){
    $tasks[] = [
      'title' => 'Set to Inactive',
      'class' => 'CRM_Contactinactive_Form_Set'
    ];
  }
}

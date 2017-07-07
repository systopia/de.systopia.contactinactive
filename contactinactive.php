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
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function contactinactive_civicrm_xmlMenu(&$files) {
  _contactinactive_civix_civicrm_xmlMenu($files);
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
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function contactinactive_civicrm_postInstall() {
  _contactinactive_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function contactinactive_civicrm_uninstall() {
  _contactinactive_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function contactinactive_civicrm_enable() {
  _contactinactive_civix_civicrm_enable();

  // Set default settings
  $settings = CRM_Contactinactive_Utils::getSettings();
  if (!isset($settings)) $settings = array();
  if (!isset($settings['activityTypeNames'])) {
    CRM_Contactinactive_Utils::setSetting('Phone Call', 'activityTypeNames');
  }
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function contactinactive_civicrm_disable() {
  _contactinactive_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function contactinactive_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _contactinactive_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function contactinactive_civicrm_managed(&$entities) {
  _contactinactive_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contactinactive_civicrm_caseTypes(&$caseTypes) {
  _contactinactive_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function contactinactive_civicrm_angularModules(&$angularModules) {
  _contactinactive_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function contactinactive_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _contactinactive_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

function contactinactive_civicrm_summaryActions(&$actions, $contactId){
    $actions['contactinactive'] = [
      'title' => 'Set to Inactive',
      'weight' => 999,
      'ref' => 'contact-inactive',
      'key' => 'contact-inactive',
      'href' => CRM_Utils_System::url('civicrm/contact/setinactive', "cid=$contactId"),
      'tab' => 'summary',
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

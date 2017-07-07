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

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Contactinactive_Form_Set extends CRM_Contact_Form_Task {

  public function preProcess() {
    parent::preProcess();

    // Get array of activityTypeNames
    $activityTypeNames = CRM_Contactinactive_Utils::getActivityTypeNames();
    $this->assign('activityTypeNames', implode(', ', $activityTypeNames));

    if (empty($this->_contactIds)) {
      // For the case of single contact (contact action)
      $this->contactId = CRM_Utils_Request::retrieve('cid', 'Positive', $this);
      $this->_contactIds[] = $this->contactId; // So we can share the postProcess
      CRM_Utils_System::setTitle(ts('Set Contact to Inactive'));
      $this->assign('singleContact', 1);
    }
    else {
      // For the multiple contact (searchTask)
      CRM_Utils_System::setTitle(ts('Set Contact(s) to Inactive'));
    }
  }

  public function buildQuickForm() {
    parent::buildQuickForm();
  }

  public function postProcess() {
    foreach ($this->_contactIds as $contactId) {
      CRM_Contactinactive_Set::setInactive($contactId);
    }
    parent::postProcess();
  }

}

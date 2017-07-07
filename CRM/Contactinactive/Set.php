<?php

class CRM_Contactinactive_Set {

  /**
   * Set the contact as inactive.
   * This function is called by the UI and the API
   * @param $contactId
   */
  public static function setInactive($contactId) {
    // Set all privacy options
    self::setPrivacyOptions($contactId);
    // Cancel activities of type
    $activityTypeNames = CRM_Contactinactive_Utils::getActivityTypeNames();
    foreach ($activityTypeNames as $activityTypeName) {
      self::cancelActivities($contactId, $activityTypeName);
    }
  }

  /**
   * Set all privacy options to enabled
   * @param $contactId
   */
  public static function setPrivacyOptions($contactId) {
    $result = civicrm_api3('Contact', 'create', array(
      'id' => $contactId,
      'do_not_email' => 1,
      'do_not_phone' => 1,
      'do_not_mail' => 1,
      'do_not_sms' => 1,
      'do_not_trade' => 1,
      'is_opt_out' => 1,
    ));
  }

  /**
   * Disable all activities of type $activityTypeName
   * @param $contactId
   */
  public static function cancelActivities($contactId, $activityTypeName) {
    $callCenterActivityId = CRM_Core_PseudoConstant::getKey('CRM_Activity_BAO_Activity', 'activity_type_id', $activityTypeName);
    $cancelledActivityStatus = CRM_Core_PseudoConstant::getKey('CRM_Activity_BAO_Activity', 'activity_status_id', 'Cancelled');

    $sql = "
UPDATE `civicrm_activity_contact` contact
LEFT JOIN `civicrm_activity` activity
ON contact.activity_id = activity.id
SET activity.status_id = {$cancelledActivityStatus}
WHERE activity_type_id = {$callCenterActivityId}
  AND contact_id = {$contactId}
    ";
    CRM_Core_DAO::executeQuery($sql);
  }
}
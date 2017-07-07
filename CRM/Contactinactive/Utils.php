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

class CRM_Contactinactive_Utils {
  CONST PREFERENCES_NAME = 'ContactInactive Preferences';

  /**
   * Returns settings
   */
  static function getSettings($name = NULL) {
    return CRM_Core_BAO_Setting::getItem(self::PREFERENCES_NAME, $name);
  }

  static function setSetting($value, $name) {
    CRM_Core_BAO_Setting::setItem($value, self::PREFERENCES_NAME, $name);
  }

  /**
   * Get array of activityTypeNames
   * @return array
   */
  static function getActivityTypeNames() {
    // Get list of activity types
    $settings = CRM_Contactinactive_Utils::getSettings();
    if (!empty($settings['activityTypeNames'])) {
      // Assign activity names to an array
      $activityTypeNames = explode(',', $settings['activityTypeNames']);
      return $activityTypeNames;
    }
    // If not types specified, return empty array
    return array();
  }
}

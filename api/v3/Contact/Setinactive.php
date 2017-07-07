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
 * Set contact to inactive
 */
function civicrm_api3_contact_setinactive($params) {

  // TODO: Matthew: please implement

  return civicrm_api3_create_error("Not yet implemented");
  // TODO: once it works: return civicrm_api3_create_success();
}

/**
 * Contact.setinactive metadata
 */
function _civicrm_api3_contact_setinactive_spec(&$params) {
  $params['contact_id'] = array(
    'name'         => 'contact_id',
    'api.required' => 1,
    'type'         => CRM_Utils_Type::T_INT,
    'title'        => 'CiviCRM Contact ID',
  );
}

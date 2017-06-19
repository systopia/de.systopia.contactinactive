{*-------------------------------------------------------+
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
+-------------------------------------------------------*}

<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="top"}
</div>

<div class="crm-content">
  <div class="messages status no-popup">
    <i class="crm-i fa-exclamation-triangle"></i>&nbsp;
    {if $singleContact}
      Are you sure you want to set this contact to inactive?
  </div>
  <div>All privacy options will be set
    {if !empty($activityTypeNames)}and activity types "{$activityTypeNames}" will be set to "Cancelled".{/if}</div>
    {else}
      Are you sure you want to set the selected contact(s) to inactive?
  </div>
  <div>All privacy options will be set
    {if !empty($activityTypeNames)}and activity types "{$activityTypeNames}" will be set to "Cancelled" {/if}for the selected contact(s).</div>
    {/if}
</div>

{if !$singleContact}
<table class="form-layout">
  <tr><td>{include file="CRM/Contact/Form/Task.tpl"}</td></tr>
</table>
{/if}
<div class="crm-submit-buttons">
{include file="CRM/common/formButtons.tpl" location="bottom"}
</div>

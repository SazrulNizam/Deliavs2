<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Language file for 'packages' component
 *
 * @package    core_badges
 * @subpackage packages
 * @copyright  2012 onwards Totara Learning Solutions Ltd {@link http://www.totaralms.com/}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Yuliya Bozhko <yuliya.bozhko@totaralms.com>
 */

$string['actions'] = 'Actions';
$string['activate'] = 'Enable access';
$string['activatesuccess'] = 'Access to the packages was successfully enabled.';
$string['addalignment'] = 'Add external skill or standard';
$string['addbadge'] = 'Add packages';
$string['addbadge_help'] = 'Select all packages that should be added to this package requirement. Hold CTRL key to select multiple items.';
$string['addcompetency'] = 'Add competency';
$string['addcompetency_help'] = 'Select all competencies that should be added to this package requirement. Hold CTRL key to select multiple items.';
$string['addbadgecriteria'] = 'Add package criteria';
$string['addcriteria'] = 'Add criteria';
$string['addcriteriatext'] = 'To start adding criteria, please select one of the options from the drop-down menu.';
$string['addcohort'] = 'Add cohort';
$string['addcohort_help'] = 'Select all cohorts that should be added to this package requirement. Hold CTRL key to select multiple items.';
$string['addcourse'] = 'Add courses';
$string['addcourse_help'] = 'Select all courses that should be added to this package requirement. Hold CTRL key to select multiple items.';
$string['addrelated'] = 'Add related package';
$string['addtobackpack'] = 'Add to backpack';
$string['addedtobackpack'] = 'Added package to backpack';
$string['adminonly'] = 'This page is restricted to site administrators only.';
$string['after'] = 'after the date of issue.';
$string['aggregationmethod'] = 'Aggregation method';
$string['alignment'] = 'Alignment';
$string['all'] = 'All';
$string['allmethod'] = 'All of the selected conditions are met';
$string['allmethodactivity'] = 'All of the selected activities are complete';
$string['allmethodbadges'] = 'All of the selected packages have been earned';
$string['allmethodcohort'] = 'Membership in all the selected cohorts';
$string['allmethodcompetencies'] = 'All of the selected competencies have been completed';
$string['allmethodcourseset'] = 'All of the selected courses are complete';
$string['allmethodmanual'] = 'All of the selected roles award the package';
$string['allmethodprofile'] = 'All of the selected profile fields have been completed';
$string['allowcoursebadges'] = 'Enable course packages';
$string['allowcoursebadges_desc'] = 'Allow packages to be created and awarded in the course context.';
$string['allowexternalbackpack'] = 'External backpack connection';
$string['allowexternalbackpack_desc'] = 'If enabled, users can connect to an external backpack and share their packages from this site. Users may also choose to display any public package collections from their external backpack on their profile page on this site. It is recommended to leave this option disabled if your site is not accessible from the Internet.';
$string['any'] = 'Any';
$string['anymethod'] = 'Any of the selected conditions is met';
$string['anymethodactivity'] = 'Any of the selected activities is complete';
$string['anymethodbadges'] = 'Any of the selected packages have been earned';
$string['anymethodcohort'] = 'Membership in any of the selected cohorts';
$string['anymethodcompetencies'] = 'Any of the selected competencies have been completed';
$string['anymethodcourseset'] = 'Any of the selected courses is complete';
$string['anymethodmanual'] = 'Any of the selected roles awards the package';
$string['anymethodprofile'] = 'Any of the selected profile fields has been completed';
$string['apiversion'] = 'API version supported';
$string['archivebadge'] = 'Would you like to delete package \'{$a}\', but keep existing issued packages?';
$string['archiveconfirm'] = 'Delete and keep existing issued packages';
$string['archivehelp'] = '<p>This option means that the package will be marked as "retired" and will no longer appear in the list of packages. Users will no longer be able to earn this package, however existing package recipients will still be able to display this package on their profile page and push it to their external backpacks.</p>
<p>If you would like your users to retain access to the earned packages it is important to select this option instead of fully deleting packages.</p>';
$string['attachment'] = 'Attach package to message';
$string['attachment_help'] = 'If enabled, an issued package will be attached to the recipient\'s email for download. (Attachments must be enabled in Site administration / Server / Email / Outgoing mail configuration to use this option.)';
$string['award'] = 'Award package';
$string['awardedto'] = 'Awarded to {$a}';
$string['awardedtoyou'] = 'Issued to me';
$string['awardoncron'] = 'Access to the packages was successfully enabled. Too many users can instantly earn this package. To ensure site performance, this action will take some time to process.';
$string['awards'] = 'Recipients';
$string['backpackavailability'] = 'External package verification';
$string['backpackconnectionok'] = 'Backpack connection successfully established';
$string['backpackconnectionnottested'] = 'The connection cannot be tested for this backpack because only Open Packages v2.0 backpacks support it.';
$string['backpackavailability_help'] = 'For package recipients to be able to prove they earned their packages from you, an external backpack service should be able to access your site and verify packages issued from it. Your site does not currently appear to be accessible, which means that packages you have already issued or will issue in the future cannot be verified.

**Why am I seeing this message?**

It may be that your firewall prevents access from users outside your network, your site is password protected, or you are running the site on a computer that is not available from the Internet (such as a local development machine).

**Is this a problem?**

You should fix this issue on any production site where you are planning to issue packages, otherwise the recipients will not be able to prove they earned their packages from you. If your site is not yet live you can create and issue test packages, as long as the site is accessible before you go live.

**What if I can\'t make my whole site publicly accessible?**

The only URL required for verification is [your-site-url]/packages/assertion.php so if you are able to modify your firewall to allow external access to that file, package verification will still work.';
$string['backpackbadgessummary'] = 'You have {$a->totalbadges} package(s) displayed from {$a->totalcollections} collection(s).';
$string['backpackbadgessettings'] = 'Change backpack settings';
$string['backpackcannotsendverification'] = 'Cannot send verification email';
$string['backpackconnected'] = 'Backpack is connected';
$string['backpackconnection'] = 'Connect to a backpack';
$string['backpackconnection_help'] = 'Store and share your packages from this site and display public packages from other websites on your user profile.';
$string['backpackconnection_connected'] = 'Your backpack';
$string['backpackconnectioncancelattempt'] = 'Connect using a different email address';
$string['backpackconnectionconnect'] = 'Connect to backpack';
$string['backpackconnectionresendemail'] = 'Resend verification email';
$string['backpackconnectionunexpectedresult'] = 'There was a problem connecting to your backpack. Your backpack provider is sending this message: \'{$a}\'.';
$string['backpackconnectionunexpectedmessage'] = 'The backpack returned the error: "{$a}".';
$string['backpackdetails'] = 'Backpack settings';
$string['backpackdisconnected'] = 'Backpack is disconnected';
$string['backpackemail_required'] = 'Email address can\'t be blank';
$string['backpackemailverificationpending'] = 'Verification pending';
$string['backpackemailverifyemailbody'] = 'Hi {$a->userfirstname},

You\'re almost done connecting to your packages backpack on \'{$a->sitename}\'.

To finish connecting to your backpack, verify your email address through the following button:

{$a->buttonlink}

If the button doesn\'t work, you can copy and paste the following URL into your browser:
{$a->link}


If you didn\'t try to connect to your packages backpack, you can safely ignore this email.

For any extra help, please contact your site support,

{$a->admin}';
$string['backpackemailverifyemailsubject'] = '{$a}: Packages backpack email verification';
$string['backpackemailverifypending'] = 'We have sent an email to <strong>{$a}</strong>. Click on the verification link in the email to activate your backpack connection.';
$string['backpackemailverifysuccess'] = 'You\'re now connected to your backpack.';
$string['backpackemailverifytokenmismatch'] = 'The token in the link you clicked does not match the stored token. Make sure you clicked the link in most recent email you received.';
$string['backpackexporterror'] = 'Can\'t export the package to backpack';
$string['backpackexporterrorwithinfo'] = 'Can\'t export the package "{$a->badgename}" to backpack. Error: {$a->error}';
$string['backpackimport'] = 'Package import settings';
$string['backpackimport_help'] = 'After the backpack connection is successfully established, packages from your backpack can be displayed on your packages page and your profile page.

In this area, you can select collections of packages from your backpack that you would like to display in your profile.';
$string['backpacksettings'] = 'Backpack settings';
$string['backpackapiurl'] = 'Backpack API URL';
$string['backpackweburl'] = 'Backpack URL';
$string['backpackprovider'] = 'Backpack provider';
$string['packages'] = 'Packages';
$string['badgedetails'] = 'Package details';
$string['badgeimage'] = 'Image';
$string['badgeimage_help'] = 'The image should be at least 300 x 300 pixels in size. It will be displayed as 300 x 300 pixels on the package page and 100 x 100 pixels on the user\'s profile page.';
$string['badgeissued'] = 'Package issued';
$string['badgeprivacysetting'] = 'Package privacy settings';
$string['badgeprivacysetting_help'] = 'Packages you earn can be displayed on your account profile page. This setting allows you to automatically set the visibility of the newly earned packages.

You can still control individual package privacy settings on your packages page.';
$string['badgeprivacysetting_str'] = 'Automatically show packages I earn on my profile page';
$string['badgesalt'] = 'Salt for hashing the recipient\'s email address';
$string['badgesalt_desc'] = 'Using a hash allows backpack services to confirm the package earner without having to expose their email address. This setting should only use numbers and letters.

Note: For recipient verification purposes, please avoid changing this setting once you start issuing packages.';
$string['badgesdisabled'] = 'Packages are not enabled on this site.';
$string['badgesearned'] = 'Number of packages earned: {$a}';
$string['badgesettings'] = 'Packages settings';
$string['badgestatus_0'] = 'Not available';
$string['badgestatus_1'] = 'Available';
$string['badgestatus_2'] = 'Not available (criteria locked)';
$string['badgestatus_3'] = 'Available (criteria locked)';
$string['badgestatus_4'] = 'Archived';
$string['badgestoearn'] = 'Number of packages available: {$a}';
$string['badgesview'] = 'Course packages';
$string['badgetags'] = 'Package tags';
$string['badgeurl'] = 'Issued package link';
$string['bawards'] = 'Recipients ({$a})';
$string['bcriteria'] = 'Criteria';
$string['bdetails'] = 'Edit details';
$string['bendorsement'] = 'Endorsement';
$string['bmessage'] = 'Message';
$string['boverview'] = 'Overview';
$string['brelated'] = 'Related packages ({$a})';
$string['balignment'] = 'Alignments ({$a})';
$string['bydate'] = ' complete by';
$string['imagecaption'] = 'Image caption';
$string['imagecaption_help'] = 'If specified, an image caption is displayed on the package page.';
$string['claim'] = 'Claim';
$string['claimcomment'] = 'Endorsement comment';
$string['claimid'] = 'Claim URL';
$string['clearsettings'] = 'Clear settings';
$string['completionnotenabled'] = 'Course completion is not enabled for this course, so it cannot be included in package criteria. Course completion may be enabled in the course settings.';
$string['completioninfo'] = 'This package was issued for completing: ';
$string['configenablebadges'] = 'If enabled, this feature lets you create packages and award them to site users.';
$string['configuremessage'] = 'Package message';
$string['connect'] = 'Connect';
$string['connected'] = 'Connected';
$string['connecting'] = 'Connecting...';
$string['contact'] = 'Contact';
$string['contact_help'] = 'An email address associated with the package issuer.';
$string['copy'] = 'Copy';
$string['copyof'] = 'Copy of {$a}';
$string['course'] = 'Course: {$a}';
$string['coursebadgesdisabled'] = 'Course packages are not enabled on this site.';
$string['coursecompletion'] = 'Users must complete this course.';
$string['coursebadges'] = 'Packages';
$string['coursebadgetitle'] = '{$a} course package';
$string['create'] = 'New package';
$string['createbutton'] = 'Create package';
$string['creatorbody'] = '<p>{$a->user} has completed all package requirements and has been awarded the package. View issued package at {$a->link} </p>';
$string['creatorsubject'] = '\'{$a}\' has been awarded!';
$string['criteriasummary'] = 'Criteria summary';
$string['criteriacreated'] = 'Package criteria successfully created';
$string['criteriadeleted'] = 'Package criteria successfully deleted';
$string['criteriaupdated'] = 'Package criteria successfully updated';
$string['criteria_descr'] = 'Users are awarded this package when they complete the following requirement:';
$string['criteria_descr_bydate'] = ' by <em>{$a}</em> ';
$string['criteria_descr_grade'] = ' with minimum grade of <em>{$a}</em> ';
$string['criteria_descr_short0'] = 'Complete <strong>{$a}</strong> of: ';
$string['criteria_descr_short1'] = 'Complete <strong>{$a}</strong> of: ';
$string['criteria_descr_short2'] = 'Awarded by <strong>{$a}</strong> of: ';
$string['criteria_descr_short4'] = 'Complete the course ';
$string['criteria_descr_short5'] = 'Complete <strong>{$a}</strong> of: ';
$string['criteria_descr_short6'] = 'Complete <strong>{$a}</strong> of: ';
$string['criteria_descr_short7'] = 'Complete <strong>{$a}</strong> of: ';
$string['criteria_descr_short8'] = 'Cohort membership in <strong>{$a}</strong> of: ';
$string['criteria_descr_short9'] = 'Complete <strong>{$a}</strong> of: ';
$string['criteria_descr_single_short1'] = 'Complete: ';
$string['criteria_descr_single_short2'] = 'Awarded by: ';
$string['criteria_descr_single_short4'] = 'Complete the course ';
$string['criteria_descr_single_short5'] = 'Complete: ';
$string['criteria_descr_single_short6'] = 'Complete: ';
$string['criteria_descr_single_short7'] = 'Complete: ';
$string['criteria_descr_single_short8'] = 'Membership in: ';
$string['criteria_descr_single_short9'] = 'Complete: ';
$string['criteria_descr_single_1'] = 'The following activity has to be completed:';
$string['criteria_descr_single_2'] = 'This package has to be awarded by a user with the following role:';
$string['criteria_descr_single_4'] = 'Users must complete the course';
$string['criteria_descr_single_5'] = 'The following course has to be completed:';
$string['criteria_descr_single_6'] = 'The following user profile field has to be completed:';
$string['criteria_descr_single_7'] = 'The following package has to be earned:';
$string['criteria_descr_single_8'] = 'Membership in the following cohort is required:';
$string['criteria_descr_single_9'] = 'The following competencies have to be completed:';
$string['criteria_descr_0'] = 'Complete <strong>{$a}</strong> of the listed requirements.';
$string['criteria_descr_1'] = '<strong>{$a}</strong> of the following activities are completed:';
$string['criteria_descr_2'] = 'This package has to be awarded by the users with <strong>{$a}</strong> of the following roles:';
$string['criteria_descr_4'] = 'Users must complete the course';
$string['criteria_descr_5'] = '<strong>{$a}</strong> of the following courses have to be completed:';
$string['criteria_descr_6'] = '<strong>{$a}</strong> of the following user profile fields have to be completed:';
$string['criteria_descr_7'] = '<strong>{$a}</strong> of the following packages have to be earned:';
$string['criteria_descr_8'] = 'Membership in <strong>{$a}</strong> of the following cohorts is required:';
$string['criteria_descr_9'] = '<strong>{$a}</strong> of the following competencies have to be completed:';
$string['criteria_0'] = 'This package is awarded when...';
$string['criteria_1'] = 'Activity completion';
$string['criteria_1_help'] = 'Allows a package to be awarded to users based on the completion of a set of activities within a course.';
$string['criteria_2'] = 'Manual issue by role';
$string['criteria_2_help'] = 'Allows a package to be awarded manually by users who have a particular role within the site or course.';
$string['criteria_3'] = 'Social participation';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Course completion';
$string['criteria_4_help'] = 'Allows a package to be awarded to users who have completed the course. This criterion can have additional parameters such as minimum grade and date of course completion.';
$string['criteria_5'] = 'Completing a set of courses';
$string['criteria_5_help'] = 'Allows a package to be awarded to users who have completed a set of courses. Each course can have additional parameters such as minimum grade and date of course completion. ';
$string['criteria_6'] = 'Profile completion';
$string['criteria_6_help'] = 'Allows a package to be awarded to users for completing certain fields in their profile. You can select from default and custom profile fields that are available to users. ';
$string['criteria_7'] = 'Awarded packages';
$string['criteria_7_help'] = 'Allows a package to be awarded to users based on other packages they have earned.';
$string['criteria_8'] = 'Cohort membership';
$string['criteria_8_help'] = 'Allows a package to be awarded to users based on cohort membership.';
$string['criteria_9'] = 'Competencies';
$string['criteria_9_help'] = 'Allows a package to be awarded to users based on the competencies they have completed.';
$string['criterror'] = 'Current parameters issues';
$string['criterror_help'] = 'This fieldset shows all parameters that were initially added to this package requirement but are no longer available. It is recommended that you un-check such parameters to make sure that users can earn this package in the future.';
$string['currentimage'] = 'Current image';
$string['currentstatus'] = 'Current status: ';
$string['dateawarded'] = 'Date issued';
$string['dateearned'] = 'Date: {$a}';
$string['day'] = 'Day(s)';
$string['deactivate'] = 'Disable access';
$string['deactivatesuccess'] = 'Access to the packages was successfully disabled.';
$string['defaultissuercontact'] = 'Package issuer email address';
$string['defaultissuercontact_desc'] = 'An email address associated with the package issuer. For an Open Packages v2.0 backpack, this is used for authentication when publishing packages to a backpack.';
$string['defaultissuerpassword'] = 'Package issuer password';
$string['defaultissuerpassword_help'] = 'An account is required on the backpack site with email address as specified in the package issuer email address setting in Site administration / Packages / Packages settings. The password for the account should be entered here.';
$string['defaultissuername'] = 'Package issuer name';
$string['defaultissuername_desc'] = 'Name of the issuing agent or authority.';
$string['delbadge'] = 'Would you like to delete package \'{$a}\' and remove all existing issued packages?';
$string['delexternalbackpack'] = 'Delete site backpack';
$string['delexternalbackpackconfirm'] = 'Delete site backpack \'{$a}\'?';
$string['delconfirm'] = 'Delete and remove existing issued packages';
$string['deletehelp'] = '<p>Fully deleting a package means that all its information and criteria records will be permanently removed. Users who have earned this package will no longer be able to access it and display it on their profile pages.</p>
<p>Note: Users who have earned this package and have already pushed it to their external backpack, will still have this package in their external backpack. However, they will not be able to access criteria and evidence pages linking back to this web site.</p>';
$string['delcritconfirm'] = 'Are you sure that you want to delete this criterion?';
$string['delparamconfirm'] = 'Are you sure that you want to delete this parameter?';
$string['description'] = 'Description';
$string['disconnect'] = 'Disconnect';
$string['donotaward'] = 'Currently, this package is not active, so it cannot be awarded to users. If you would like to award this package, please set its status to active.';
$string['enablebadges'] = 'Enable packages';
$string['endorsement'] = 'Endorsement';
$string['error:backpackdatainvalid'] = 'The data return from the backpack was invalid.';
$string['error:backpackemailnotfound'] = 'The email \'{$a}\' is not associated with a backpack. You need to <a href="http://backpack.openbadges.org">create a backpack</a> for that account or sign in with another email address.';
$string['error:badgeawardnotfound'] = 'Cannot verify this awarded package.  This package may have been revoked.';
$string['error:badgenotfound'] = 'Package not found';
$string['error:cannotact'] = 'Cannot activate the package. ';
$string['error:cannotawardbadge'] = 'Cannot award package to a user.';
$string['error:cannotrevokebadge'] = 'Cannot revoke package from a user.';
$string['error:cannotdeletecriterion'] = 'This criterion cannot be deleted. ';
$string['error:connectionunknownreason'] = 'The connection was unsuccessful but no reason was given.';
$string['error:clone'] = 'Cannot clone the package.';
$string['error:duplicatename'] = 'Package with such name already exists in the system.';
$string['error:externalbadgedoesntexist'] = 'Package not found';
$string['error:guestuseraccess'] = 'You are currently using guest access. To see packages you need to log in with your user account.';
$string['error:invalidcriteriatype'] = 'Invalid criteria type.';
$string['error:invalidexpiredate'] = 'Expiry date has to be in the future.';
$string['error:invalidexpireperiod'] = 'Expiry period cannot be negative or equal 0.';
$string['error:invalidparambadge'] = 'Package does not exist. ';
$string['error:noactivities'] = 'There are no activities with completion criteria enabled in this course.';
$string['error:nobadges'] = 'There are currently no packages with access enabled to be added as criteria. A site package can only have other site packages as criteria. A course package can have other course packages or site packages as criteria.';
$string['error:invalidparamcohort'] = 'Cohort does not exist. ';
$string['error:noactivities'] = 'There are no activities with completion criteria enabled in this course.';
$string['error:nocohorts'] = 'No cohorts';
$string['error:nocourses'] = 'Course completion is not enabled for any of the courses in this site, so none can be displayed. Course completion may be enabled in the course settings.';
$string['error:nogroupssummary'] = '<p>There are no public collections of packages available in your backpack. </p>';
$string['error:nogroupslink'] = '<p>Only public collections are shown. <a href="{$a}" target="_blank" rel="nofollow">Visit your backpack</a> to create some public collections.</p>';
$string['error:nopermissiontoview'] = 'You have no permissions to view package recipients';
$string['error:nosuchbadge'] = 'Package with id {$a} does not exist.';
$string['error:nosuchcohort'] = 'Warning: This cohort is no longer available.';
$string['error:nosuchcourse'] = 'Warning: This course is no longer available.';
$string['error:nosuchfield'] = 'Warning: This user profile field is no longer available.';
$string['error:nosuchmod'] = 'Warning: This activity is no longer available.';
$string['error:nosuchrole'] = 'Warning: This role is no longer available.';
$string['error:nosuchuser'] = 'User with this email address does not have an account with the current backpack provider.';
$string['error:notifycoursedate'] = 'Warning: Packages associated with course and activity completions will not be issued until the course start date.';
$string['error:parameter'] = 'Warning: At least one parameter should be selected to ensure correct package issuing workflow.';
$string['error:requesttimeout'] = 'The connection request timed out before it could complete.';
$string['error:requesterror'] = 'The connection request failed (error code {$a}).';
$string['error:relatedbadgedoesntexist'] = 'There is no public package with this identifier';
$string['error:save'] = 'Cannot save the package.';
$string['error:userdeleted'] = '{$a->user} (This user no longer exists in {$a->site})';
$string['eventbadgearchived'] = 'Package archived';
$string['eventbadgeawarded'] = 'Package awarded';
$string['eventbadgecreated'] = 'Package created';
$string['eventbadgecriteriacreated'] = 'Package criteria created';
$string['eventbadgecriteriadeleted'] = 'Package criteria deleted';
$string['eventbadgecriteriaupdated'] = 'Package criteria updated';
$string['eventbadgedeleted'] = 'Package deleted';
$string['eventbadgedisabled'] = 'Package disabled';
$string['eventbadgeduplicated'] = 'Package duplicated';
$string['eventbadgeenabled'] = 'Package enabled';
$string['eventbadgelistingviewed'] = 'Package listing viewed';
$string['eventbadgerevoked'] = 'Package revoked';
$string['eventbadgeupdated'] = 'Package updated';
$string['eventbadgeviewed'] = 'Package viewed';
$string['existingrecipients'] = 'Existing package recipients';
$string['expired'] = 'Expired';
$string['expiredate'] = 'This package expires on {$a}.';
$string['expireddate'] = 'This package expired on {$a}.';
$string['expiredin'] = 'Expired {$a}';
$string['expiresin'] = 'Expires {$a}';
$string['expireperiod'] = 'This package expires {$a} day(s) after being issued.';
$string['expireperiodh'] = 'This package expires {$a} hour(s) after being issued.';
$string['expireperiodm'] = 'This package expires {$a} minute(s) after being issued.';
$string['expireperiods'] = 'This package expires {$a} second(s) after being issued.';
$string['expirydate'] = 'Expiry date';
$string['expirydate_help'] = 'Optionally, packages can expire on a specific date, or the date can be calculated based on the date when the package was issued to a user. ';
$string['existsinbackpack'] = 'Package already exists in backpack';
$string['externalconnectto'] = 'To display external packages you need to <a href="{$a}">connect to a backpack</a>.';
$string['externalbackpack_required'] = 'Backpack provider can\'t be blank';
$string['externalbadges'] = 'My packages from other web sites';
$string['externalbadgesp'] = 'Packages from other web sites:';
$string['externalbadges_help'] = 'This area displays packages from your external backpack.';
$string['fixed'] = 'Fixed date';
$string['hidden'] = 'Hidden';
$string['hiddenbadge'] = 'Unfortunately, the package owner has not made this information available.';
$string['hostedurl'] = 'External URL';
$string['hostedurldescription'] = 'External URL where the package is hosted';
$string['imageauthoremail'] = 'Image author\'s email';
$string['imageauthoremail_help'] = 'If specified, the email address of the package image author is displayed on the package page.';
$string['imageauthorname'] = 'Image author\'s name';
$string['imageauthorname_help'] = 'If specified, the name of the package image author is displayed on the package page.';
$string['imageauthorurl'] = 'Image author\'s URL';
$string['imageauthorurl_help'] = 'If specified, a link to the package image author\'s website is displayed on the package page. The URL should have a prefix http:// or https://.';
$string['invalidurl'] = 'Invalid URL';
$string['issuancedetails'] = 'Package expiry';
$string['issuedbadge'] = 'Issued package information';
$string['issuedby'] = 'Issued by {$a}';
$string['issuedon'] = 'Issued {$a}';
$string['issuerdetails'] = 'Issuer details';
$string['issueremail'] = 'Email';
$string['issueremail_help'] = 'A contact email address of the organisation issuing the endorsement.';
$string['issuername'] = 'Issuer name';
$string['issuername_help'] = 'Name of the issuing agent or authority.';
$string['issuername_endorsement'] = 'Endorser name';
$string['issuername_endorsement_help'] = 'The name of the endorser.';
$string['issuerurl'] = 'Issuer URL';
$string['issuerurl_help'] = 'The website of the organisation issuing the endorsement. The URL should have a prefix http:// or https://.';
$string['language'] = 'Language';
$string['language_help'] = 'The language used on the package page.';
$string['listbackpacks'] = 'List of backpacks';
$string['localconnectto'] = 'To share these packages outside this web site you need to <a href="{$a}">connect to a backpack</a>.';
$string['localbadges'] = 'My packages from {$a} web site';
$string['localbadgesh'] = 'My packages from this web site';
$string['localbadgesh_help'] = 'All packages earned within this web site by completing courses, course activities, and other requirements.

You can manage your packages here by making them public or private for your profile page.

You can download all of your packages or each package separately and save them on your computer. Downloaded packages can be added to your external backpack service.';
$string['localbadgesp'] = 'Packages from {$a}:';
$string['loginbackpacktitle'] = '<strong>Log in to your backpack</strong>';
$string['makeprivate'] = 'Make private';
$string['makepublic'] = 'Make public';
$string['managebadges'] = 'Manage packages';
$string['managebackpacks'] = 'Manage backpacks';
$string['message'] = 'Message body';
$string['messagebody'] = '<p>You have been awarded the package "%badgename%"!</p>
<p>More information about this package can be found on the %badgelink% package information page.</p>
<p>You can manage and download the package from your {$a} page.</p>';
$string['messagesubject'] = 'Congratulations! You just earned a package!';
$string['method'] = 'This criterion is complete when...';
$string['mingrade'] = 'Minimum grade required';
$string['month'] = 'Month(s)';
$string['moredetails'] = 'More details';
$string['mybadges'] = 'My packages';
$string['mybackpack'] = 'My backpack settings';
$string['namewithlink'] = 'Name with link';
$string['never'] = 'Never';
$string['newbackpack'] = 'Add a new backpack';
$string['newbadge'] = 'Add a new package';
$string['newimage'] = 'New image';
$string['noalignment'] = 'This package does not have any external skills or standards specified.';
$string['noawards'] = 'This package has not been earned yet.';
$string['nobackpack'] = 'There is no backpack service connected to this account.<br/>';
$string['nobackpackbadgessummary'] = 'There are no packages in the collections you have selected.';
$string['nobackpackcollectionssummary'] = 'No package collections have been selected.';
$string['nobackpacks'] = 'There are no backpacks available';
$string['nobadges'] = 'There are currently no packages available for users to earn.';
$string['nocompetencies'] = 'No competencies selected.';
$string['nocriteria'] = 'Criteria for this package have not been set up yet.';
$string['noendorsement'] = 'This package does not have an endorsement.';
$string['noexpiry'] = 'This package does not have an expiry date.';
$string['noparamstoadd'] = 'There are no additional parameters available to add to this package requirement.';
$string['norelated'] = 'This package does not have any related packages.';
$string['notacceptedrole'] = 'Your current role assignment is not among the roles that can manually issue this package.<br/>
If you would like to see users who have already earned this package, you can visit {$a} page. ';
$string['notconnected'] = 'Not connected';
$string['notealignment'] = 'External skills or standards, which the package is aligned with, may be specified. Any external skills or standards are displayed on the package page.';
$string['noteendorsement'] = 'An endorsement from a third party may be used to add value to the package. For example, a package issued by a teacher may be endorsed by the school, or a package issued by a local awarding body may be endorsed by the national awarding body.';
$string['noterelated'] = 'Packages with a connection may be marked as related. For example, packages with the same criteria which are displayed in different languages may be marked as related. Any related packages are displayed on the package page.';
$string['nothingtoadd'] = 'There are no available criteria to add.';
$string['notification'] = 'Notify package creator';
$string['notification_help'] = 'This setting manages notifications sent to a package creator to let them know that the package has been issued.

The following options are available:

* **NEVER** – Do not send notifications.

* **EVERY TIME** – Send a notification every time this package is awarded.

* **DAILY** – Send notifications once a day.

* **WEEKLY** – Send notifications once a week.

* **MONTHLY** – Send notifications once a month.';
$string['notifydaily'] = 'Daily';
$string['notifyevery'] = 'Every time';
$string['notifymonthly'] = 'Monthly';
$string['notifyweekly'] = 'Weekly';
$string['numawards'] = 'This package has been issued to <a href="{$a->link}">{$a->count}</a> user(s).';
$string['numawardstat'] = 'This package has been issued {$a} user(s).';
$string['overallcrit'] = 'of the selected criteria are complete.';
$string['oauth2issuer'] = 'OAuth 2 services';
$string['openbadgesv1'] = 'Open Packages v1.0';
$string['openbadgesv2'] = 'Open Packages v2.0';
$string['openbadgesv2p1'] = 'Open Packages v2.1';
$string['othernavigation'] = 'Other navigation ...';
$string['password_required'] = 'Password can\'t be blank';
$string['potentialrecipients'] = 'Potential package recipients';
$string['preferences'] = 'Package preferences';
$string['privacy:metadata:backpack'] = 'A record of user\'s backpacks';
$string['privacy:metadata:backpack:backpackuid'] = 'The backpack unique identifier';
$string['privacy:metadata:backpack:externalbackpackid'] = 'The ID of the backpack';
$string['privacy:metadata:backpack:email'] = 'The email associated with the backpack';
$string['privacy:metadata:backpack:userid'] = 'The ID of the user whose backpack it is';
$string['privacy:metadata:package'] = 'A collection of packages';
$string['privacy:metadata:package:timecreated'] = 'The time when the package was created';
$string['privacy:metadata:package:timemodified'] = 'The time when the package was last modified';
$string['privacy:metadata:package:usercreated'] = 'The ID of the user who created the package';
$string['privacy:metadata:package:usermodified'] = 'The ID of the user who modified the package';
$string['privacy:metadata:criteriamet'] = 'A collection of criteria which have been met';
$string['privacy:metadata:criteriamet:datemet'] = 'The date when the criteria was met';
$string['privacy:metadata:criteriamet:userid'] = 'The ID of the user who has met the criteria';
$string['privacy:metadata:external:backpacks'] = 'Information shared when users submit their packages to an external backpack';
$string['privacy:metadata:external:backpacks:package'] = 'The name of the package';
$string['privacy:metadata:external:backpacks:description'] = 'The description of the package';
$string['privacy:metadata:external:backpacks:image'] = 'The image of the package';
$string['privacy:metadata:external:backpacks:issuer'] = 'Some information about the issuer';
$string['privacy:metadata:external:backpacks:url'] = 'The Moodle URL where the issued package information can be seen';
$string['privacy:metadata:backpackoauth2'] = 'OAuth 2 information when user connects to an external backpack';
$string['privacy:metadata:backpackoauth2:userid'] = 'The ID of the user connect to backpack';
$string['privacy:metadata:backpackoauth2:usermodified'] = 'The ID of the user modified connect';
$string['privacy:metadata:backpackoauth2:token'] = 'Backpack connection token';
$string['privacy:metadata:backpackoauth2:issuerid'] = 'OAuth 2 service ID';
$string['privacy:metadata:backpackoauth2:scope'] = 'List scope of backpack connect';
$string['privacy:metadata:issued'] = 'A record of packages awarded';
$string['privacy:metadata:issued:dateexpire'] = 'The date when the package expires';
$string['privacy:metadata:issued:dateissued'] = 'The date of the award';
$string['privacy:metadata:issued:userid'] = 'The ID of the user who was awarded a package';
$string['privacy:metadata:manualaward'] = 'A record of manual awards';
$string['privacy:metadata:manualaward:datemet'] = 'The date when the user was awarded the package';
$string['privacy:metadata:manualaward:issuerid'] = 'The ID of the user awarding the package';
$string['privacy:metadata:manualaward:issuerrole'] = 'The role of the user awarding the package';
$string['privacy:metadata:manualaward:recipientid'] = 'The ID of the user who is manually awarded a package';
$string['recipient'] = 'Package recipient';
$string['recipients'] = 'Package recipients';
$string['recipientvalidationproblem'] = 'This user cannot be verified as a recipient of this package.';
$string['relative'] = 'Relative date';
$string['relatedbages'] = 'Related packages';
$string['revoke'] = 'Revoke package';
$string['requiredcohort'] = 'At least one cohort should be added to the cohort criterion.';
$string['requiredcompetency'] = 'At least one competency should be added to the competency criterion.';
$string['requiredcourse'] = 'At least one course should be added to the courseset criterion.';
$string['requiredbadge'] = 'At least one package should be added to the package criterion.';
$string['reviewbadge'] = 'Changes in package access';
$string['reviewconfirm'] = '<p>This will make your package visible to users and allow them to start earning it.</p>

<p>It is possible that some users already meet this package\'s criteria and will be issued this package immediately after you enable it.</p>

<p>Once a package has been issued it will be <strong>locked</strong> - certain settings including the criteria and expiry settings can no longer be changed.</p>

<p>Are you sure you want to enable access to the package \'{$a}\'?</p>';
$string['save'] = 'Save';
$string['searchname'] = 'Search by name';
$string['selectaward'] = 'Please select the role you would like to use to award this package: ';
$string['selectgroup_end'] = 'Only public collections are shown. <a href="{$a}">Visit your backpack</a> to create more public collections.';
$string['selectgroup_start'] = 'Select collections from your backpack to display on this site:';
$string['selecting'] = 'With selected packages...';
$string['setup'] = 'Set up connection';
$string['sitebackpackdeleted'] = 'The site backpack has been deleted.';
$string['sitebackpacknotdeleted'] = 'This backpack couldn\'t be deleted because it\'s currently the site default.';
$string['sitebackpackwarning'] = 'Could not connect to backpack. <br/><br/>Check that the "Package issuer email address" admin setting is the valid email for an account on the backpack website. <br/><br/>Check that the "Package issuer password" on the <a href="{$a->url}">site backpack settings page</a>, is the correct password for the account on the backpack website. <br/><br/>The backpack returned: "{$a->warning}"';
$string['sitebadges'] = 'Site packages';
$string['sitebadges_help'] = 'Site packages can only be awarded to users for site-related activities. These include completing a set of courses or parts of user profiles. Site packages can also be issued manually by one user to another.

Packages for course-related activities must be created at the course level. Course packages can be found under Course Administration > Packages.';
$string['sitebadgetitle'] = '{$a} site package';
$string['statusmessage_0'] = 'This package is currently not available to users. Enable access if you want users to earn this package. ';
$string['statusmessage_1'] = 'This package is currently available to users. Disable access to make any changes. ';
$string['statusmessage_2'] = 'This package is currently not available to users, and its criteria are locked. Enable access if you want users to earn this package. ';
$string['statusmessage_3'] = 'This package is currently available to users, and its criteria are locked. ';
$string['statusmessage_4'] = 'This package is currently archived.';
$string['status'] = 'Package status';
$string['status_help'] = 'Status of a package determines its behaviour in the system:

* **AVAILABLE** – Means that this package can be earned by users. While a package is available to users, its criteria cannot be modified.

* **NOT AVAILABLE** – Means that this package is not available to users and cannot be earned or manually issued. If such package has never been issued before, its criteria can be changed.

Once a package has been issued to at least one user, it automatically becomes **LOCKED**. Locked packages can still be earned by users, but their criteria can no longer be changed. If you need to modify details or criteria of a locked package, you can duplicate this package and make all the required changes.

*Why do we lock packages?*

We want to make sure that all users complete the same requirements to earn a package. Currently, it is not possible to revoke packages. If we allowed packages requirements to be modified all the time, we would most likely end up with users having the same package for meeting completely different requirements.';
$string['subject'] = 'Message subject';
$string['tags'] = 'Tags';
$string['targetname'] = 'Name';
$string['targetname_help'] = 'The external skill or standard which the package is aligned with.';
$string['targeturl'] = 'URL';
$string['targeturl_help'] = 'A link to a page describing the external skill or standard. The URL should have a prefix http:// or https://.';
$string['targetdescription'] = 'Description';
$string['targetdescription_help'] = 'Short description of the external skill or standard.';
$string['targetframework'] = 'Framework';
$string['targetframework_help'] = 'The name of the external skill or standard framework.';
$string['targetcode'] = 'Code';
$string['targetcode_help'] = 'A unique string identifier for referencing the external skill or standard within its framework.';
$string['testbackpack'] = 'Test backpack \'{$a}\'';
$string['testsettings'] = 'Test settings';
$string['type'] = 'Type';
$string['tagarea_badge'] = 'Packages';
$string['userbadges'] = 'User packages';
$string['variablesubstitution'] = 'Variable substitution in messages.';
$string['variablesubstitution_help'] = 'In a package message, certain variables can be inserted into the subject and/or body of a message so that they will be replaced with real values when the message is sent. The variables should be inserted into the text exactly as they are shown below. The following variables can be used:

%badgename%
: This will be replaced by the package\'s full name.

%username%
: This will be replaced by the recipient\'s full name.

%badgelink%
: This will be replaced by the public URL with information about the issued package.';
$string['verifyemail'] = 'Verify email';
$string['viewbadge'] = 'View issued package';
$string['visible'] = 'Visible';
$string['version'] = 'Version';
$string['version_help'] = 'The version field may be used to keep track of the package\'s development. If specified, the version is displayed on the package page.';
$string['warnexpired'] = ' (This package has expired!)';
$string['year'] = 'Year(s)';
$string['includeauthdetails'] = "Include authentication details with the backpack";

// Deprecated since Moodle 4.0.
$string['evidence'] = 'Evidence';
$string['recipientdetails'] = 'Recipient details';
$string['recipientidentificationproblem'] = 'Cannot find a recipient of this package among the existing users.';

// Deprecated since Moodle 4.3.
$string['backpackemail'] = 'Email address';
$string['backpackemail_help'] = 'The email address associated with your backpack. While you are connected, any packages earned on this site will be associated with this email address.';

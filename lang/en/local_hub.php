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
 * Hub plugin related strings
 * @package   localhub
 * @copyright 2010 Moodle Pty Ltd (http://moodle.com)
 * @author    Jerome Mouneyrac
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


$string['additionaldesc'] = 'Courses: {$a->courses} - Users: {$a->users} - Enrolments: {$a->enrolments} - Resources: {$a->resources} - Posts: {$a->posts}
    - Questions: {$a->questions} - Average number of participants: {$a->participantnumberaverage} - Average number of course modules: {$a->modulenumberaverage}';
$string['additionalcoursedesc'] = 'Contributors: {$a->contributornames} - Coverage: {$a->coverage} - Creator: {$a->creatorname} - Publisher: {$a->publishername} - Subject: {$a->subject}
    - Audience: {$a->audience} - Educational level: {$a->educationallevel}';
$string['additionaladmindesc'] = 'Registered: {$a->timeregistered} - Modified: {$a->timemodified} - Privacy: {$a->privacy} -
    Contactable: {$a->contactable} - Email Notification: {$a->emailalert}';
$string['additionalcourseadmindesc'] = 'Download URL: {$a->downloadurl} - Original download URL: {$a->originaldownloadurl} - Time modified: {$a->timemodified} -
    Short name: {$a->shortname}';
$string['allowglobalsearch'] = 'Publish this hub and allow global search of all courses';
$string['allowpublicsearch'] = 'Publish this hub so people can join it';
$string['audience'] = 'Audience';
$string['audienceeducators'] = 'Educators';
$string['audiencestudents'] = 'Students';
$string['audienceadmins'] = 'Administators';
$string['badurlformat'] = 'Bad URL format';
$string['cannotregisternotavailablesite'] = 'This hub cannot access your web site.';
$string['cannotregisterprivatehub'] = 'You cannot register your hub. Change the Privacy setting.';
$string['community'] = 'Community';
$string['confirmregistration'] = 'Confirm registration';
$string['contactemail'] = 'Contact email';
$string['contactname'] = 'Contact name';
$string['contributornames'] = 'Contributor names';
$string['coursedesc'] = 'Description';
$string['courselang'] = 'Language';
$string['coursemap'] = 'Course map';
$string['coursename'] = 'Name';
$string['courseprivate'] = 'Private';
$string['coursepublic'] = 'Public';
$string['coursepublished'] = 'Course published';
$string['courseshortname'] = 'Shortname';
$string['coursesnumber'] = 'Number of courses ({$a})';
$string['creatorname'] = 'Creator name';
$string['creatornotes'] = 'Creator notes';
$string['deleteconfirmation'] = 'Are you sure to delete the {$a} site ?';
$string['deletecourseconfirmation'] = 'Are you sure to delete the {$a} course ?';
$string['demourl'] = 'Demo URL';
$string['description'] = 'Description';
$string['donotdeleteormodify'] = 'DO NOT DELETE OR MODIFY THIS USER !';
$string['downloadable'] = 'Downloadable';
$string['educationallevel'] = 'Educational level';
$string['edulevelassociation'] = 'Association';
$string['edulevelcorporate'] = 'Corporate';
$string['edulevelgovernment'] = 'Government';
$string['edulevelother'] = 'Other';
$string['edulevelprimary'] = 'Primary';
$string['edulevelsecondary'] = 'Secondary';
$string['eduleveltertiary'] = 'Tertiary';
$string['emailmessagesiteadded'] = '{$a->name} site has been added. Its url is {$a->url}.
The site description is: {$a->description}.
The admin contact is: {$a->contactname} {$a->contactemail} ({$a->contactphone}).
The site is mainly in {$a->language} (ISO language code).
Its picture is linked from {$a->imageurl}.
Its privacy is {$a->privacy}';
$string['emailmessagesiteupdated'] = '{$a->name} site has been updated. Its url is {$a->url}.
The site description is: {$a->description}.
The admin contact is: {$a->contactname} {$a->contactemail} ({$a->contactphone}).
The site is mainly in {$a->language} (ISO language code).
Its picture is linked from {$a->imageurl}.
Its privacy is {$a->privacy}';
$string['emailmessagesiteurlchanged'] = '{$a->name} site has been updated. (previous name: {$a->oldname})
Its url {$a->url} has been changed to ({$a->oldurl}).';
$string['emailtitlesiteadded'] = '{$a} site has been added to the hub';
$string['emailtitlesiteupdated'] = '{$a} site has been updated on the hub';
$string['emailtitlesiteurlchanged'] = '{$a} site has changed his url (please check it).';
$string['enabled'] = 'Enabled';
$string['enrollable'] = 'Enrollable';
$string['errorbadimageheightwidth'] = 'The image should have a maximum size of {$a->width} X {$a->height}';
$string['errorlangnotrecognized'] = 'Language code is unknown by Moodle. Please contact {$a}';
$string['errorwrongpostdata'] = 'Some POST data are missing, please use the Moodle registration form.';
$string['hideguestbutton'] = 'Moodle changed the option \'Guest login button\' to the value \'Hide\'.';
$string['hub'] = 'Hub';
$string['hubdetails'] = 'Hub details';
$string['hubregister'] = 'Register your hub on Moodle.org';
$string['hubregisterupdate'] = 'Update your registration on Moodle.org';
$string['hubregistrationcomment'] = 'You are about to register your hub on Moodle.org. Moogle.org will request automatically time to time this same information.';
$string['hubwsroledescription'] = 'WARNING: DO NOT DELETE OR MODIFY THIS ROLE. This role has been internally created for a registered site, a hub server or Moodle.org.';
$string['hubwsuserdescription'] = 'WARNING: DO NOT DELETE OR MODIFY THIS USER. This user has been internally created for a registered site, a hub server or Moodle.org.';
$string['imageurl'] = 'Image url';
$string['information'] = 'Information';
$string['language'] = 'Language';
$string['logourl'] = 'Logo URL';
$string['managecourses'] = 'Manage courses';
$string['managesites'] = 'Manage sites';
$string['modulenumberaverage'] = 'Average number of course modules ({$a})';
$string['moodleorg'] = 'Moodle.org';
$string['moodleorgpublicationdetail'] = 'Publish your course on Moodle.org. It will be found when doing a global search.';
$string['moodleorgregistrationdetail'] = 'This option allows you to register your Moodle site with Moodle.org.  Registration is free.
The main benefit of registering is that you will be added to a low-volume mailing list for important notifications such as security alerts and new releases of Moodle.
By default, your information will be kept private, and will never be sold or passed on to anyone else.  The only reason for collecting this information is for support purposes, and to help build up a statistical picture of the Moodle community as a whole.
If you choose, you can allow your site name, country and URL to be added to the public list of Moodle Sites.
All new registrations are verified manually before they are added to the list, but once you are added you can update your registration (and your entry on the public list) at any time.';
$string['name'] = 'Name';
$string['no'] = 'No';
$string['nocourse'] = 'No course';
$string['nosearch'] = 'Don\'t publish hub or courses';
$string['nosite'] = 'No sites have been registered yet or match the search.';
$string['notregisteredonhub'] = 'You cannot publish this course on a hub  different from Moodle.org, because this site isn\'t registered on any different hub. Contact your administrator if you want to do so.';
$string['notregisteredonmoodleorg'] = 'You cannot publish this course on Moodle.org hub, because this site isn\'t registered on Moodle.org hub. Contact your administrator if you want to do so.';
$string['operation'] = 'Operation';
$string['orenterprivatehub'] = 'or enter a private hub URL:';
$string['participantnumberaverage'] = 'Average number of participants ({$a})';
$string['postaladdress'] = 'Postal address';
$string['postsnumber'] = 'Number of posts ({$a})';
$string['prioritise'] = 'Prioritise';
$string['privacy'] = 'Privacy';
$string['private'] = 'Private';
$string['privatehuburl'] = 'Private hub URL';
$string['publicationinfo'] = 'Course publication information';
$string['publichub'] = 'Public hub';
$string['publishcourseon'] = 'Publish on {$a}';
$string['publishername'] = 'Publisher';
$string['publishon'] = 'Publish on';
$string['publishonmoodleorg'] = 'Publish on Moodle.org';
$string['publishonspecifichub'] = 'Publish on a Hub';
$string['questionsnumber'] = 'Number of questions ({$a})';
$string['registeredcourses'] = 'Registered courses';
$string['registeredsites'] = 'Registered sites';
$string['registrationconfirmed'] = 'Registration successfull';
$string['registrationinfo'] = 'Registration information';
$string['registersite'] = 'Register on {$a}';
$string['registeron'] = 'Register on';
$string['registeronmoodleorg'] = 'Register on Moodle.org';
$string['registeronspecifichub'] = 'Register on a specific hub';
$string['registration'] = 'Hub server registration';
$string['registrationupdated'] = 'Registration has been updated.';
$string['registrationupdatedfailed'] = 'Registration update failed.';
$string['resourcesnumber'] = 'Number of resources ({$a})';
$string['roleassignmentsnumber'] = 'Number of role assignments ({$a})';
$string['screenshots'] = 'Screenshots';
$string['search'] = 'Search';
$string['selecthub'] = 'Select hub';
$string['sendfollowinginfo'] = 'Send the following information:';
$string['settings'] = 'Settings';
$string['settingsupdated'] = 'Settings have been updated.';
$string['siteadmin'] = 'Administrator';
$string['sitecreated'] = 'Site created';
$string['sitedesc'] = 'Description';
$string['sitehelpexplanation'] = 'Listing of registered sites on your hub server. To display a site on the top of your
    search result / list, proritise it. Trusted sites will be marked as trusted on the search result / list, and they will be displayed before untrusted sites.
    Prioritised sites are automatically trusted. Finally, only visible sites are displayed on the search result / list (even if they are prioritised/trusted).
    Site that are unreachable for more than a month would be deleted from the database (except if they are trusted/prioritised)';
$string['sitelang'] = 'Language';
$string['sitelist'] = 'Site list';
$string['sitelinkpublished'] = 'Link published';
$string['sitename'] = 'Name';
$string['sitenamepublished'] = 'Publish name';
$string['siteoperation'] = 'Site operation';
$string['sitenotpublished'] = 'Not published';
$string['siteprivacy'] = 'Privacy';
$string['siteregconfcomment'] = 'Your site needs a final confirmation on {$a} (in order to avoid spam on {$a})';
$string['siteregistration'] = 'Site registration';
$string['siteregistrationupdated'] = 'Site registration updated';
$string['siteupdated'] = '{$a} has been updated successfully.';
$string['siteurl'] = 'Site URL';
$string['specifichub'] = 'Specific hub';
$string['specifichubpublicationdetail'] = 'You can publish on another hub.';
$string['specifichubregistrationdetail'] = 'You can register to other hub.';
$string['statistics'] = 'Statistics privacy';
$string['subjects'] = 'Subjects';
$string['tags'] = 'Tags';
$string['trustme'] = 'Trust';
$string['unlistedurl'] = 'Unlisted hub URL';
$string['unprioritise'] = 'Unprioritise';
$string['untrustme'] = 'Untrust';
$string['updatesite'] = 'Update registration on {$a}';
$string['url'] = 'hub URL';
$string['usersnumber'] = 'Number of users ({$a})';
$string['wrongurlformat'] = 'Bad URL format';
$string['yeswithmoodle'] = 'Yes, with Moodle';
$string['yeswithoutmoodle'] = 'Yes, without Moodle';

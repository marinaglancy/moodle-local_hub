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
 * @package   moodle-dot-org
 * @subpackage   stats
 * @copyright 2009 Sam Hemelryk <sam@hemelryk.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//echo "Sorry, this page is temporarily down for updates";
//exit;

/** Include the nessecary config file :) */

define('STATS_DIR', 'local/moodleorg/top/stats');

require('../../../../config.php');
require_once($CFG->dirroot.'/'.STATS_DIR.'/lib.php');
require_once($CFG->dirroot.'/'.STATS_DIR.'/graphlib.php');
require_once($CFG->dirroot.'/'.STATS_DIR.'/googlecharts.php');

error_reporting(E_ALL);
ini_set('display_errors', true);

// Update the number of users to ensure it is accurate
$moodle = local_moodleorg_stats_update_moodle_users();

$stats = local_moodleorg_stats_get_registry_stats();


$PAGE->set_context(get_system_context());
$PAGE->set_title(get_string('aboutstatisticstitle', 'local_moodleorg'));
$PAGE->set_heading(get_string('aboutstatisticsheading', 'local_moodleorg'));
$PAGE->set_url(new moodle_url('/stats/'));
$PAGE->navbar->add($PAGE->heading, $PAGE->url);

echo $OUTPUT->header();
echo $OUTPUT->heading($PAGE->heading);

/**
 * Display the all registered sites graph
 */
echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align'));
echo html_writer::empty_tag('img', array('src'=>all_sites_graph(), 'alt'=>get_string('registrationgraphalt', 'local_moodleorg')));
echo html_writer::end_tag('p');
echo html_writer::tag('p', get_string('registrationgraphdesc', 'local_moodleorg'), array('class'=>'mdl-align', 'style'=>'font-size:0.8em;'));

$table = new html_table();
$table->attributes = array('class'=>'generaltable boxaligncenter');
$table->width = '400px';
$table->align = array('left','right');
$table->data = array(
    array(get_string('registeredsitestitle','local_moodleorg'), '<a href="http://moodle.org/sites/">'.number_format($stats->registrycount).'</a>'),
    array(get_string('statscountries', 'local_moodleorg'), "<a href=\"http://moodle.org/sites/\">".number_format($stats->countrycount)."</a>"),
    array(get_string('statscourses', 'local_moodleorg'), number_format($stats->courses)),
    array(get_string('statsusers', 'local_moodleorg'), number_format($stats->users)),
    array(get_string('statsteachers', 'local_moodleorg'), number_format($stats->teachers)),
    array(get_string('statsenrolments', 'local_moodleorg'), number_format($stats->enrolments)),
    array(get_string('statsposts', 'local_moodleorg'), number_format($stats->posts)),
    array(get_string('statsresources', 'local_moodleorg'), number_format($stats->resources)),
    array(get_string('statsquestions', 'local_moodleorg'), number_format($stats->questions))
);
echo html_writer::table($table);
echo html_writer::end_tag('div');

/**
 * Display the new registrations graph
 */
echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align'));
echo html_writer::empty_tag('img', array('src'=>new_registrations_graph(), 'alt'=>get_string('newregistrations', 'local_moodleorg')));
echo html_writer::end_tag('p');
echo html_writer::end_tag('div');

/**
 * Display the download summary graph
 */
/*
echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align'));
echo html_writer::empty_tag('img', array('src'=>download_summary_graph(), 'alt'=>get_string('namedownloads', 'local_moodleorg')));
echo html_writer::end_tag('p');
echo html_writer::end_tag('div');
*/

/**
 * Users to site number graph
 */
echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align', 'style'=>'font-size:0.8em;color:#555;'));
echo html_writer::empty_tag('img', array('src'=>'sites.bar.png', 'alt'=>get_string('registeredsitestitle', 'local_moodleorg')));
echo '&nbsp;';
echo html_writer::empty_tag('img', array('src'=>moodle_users_per_site(), 'alt'=>get_string('graphusersites', 'local_moodleorg')));
echo html_writer::end_tag('p');

echo $OUTPUT->heading(get_string('top10sitesbyusers', 'local_moodleorg'));
$table = new html_table();
$table->attributes = array('class'=>'generaltable boxaligncenter');
$table->width = '800px';
$table->size    = array('360px','80px','80px','280px');
$table->head    = array(get_string('site'), get_string('statsusers', 'local_moodleorg'), get_string('statscourses', 'local_moodleorg'));
$table->align   = array('left','right','right');
$table->data    = array();

$top10usersitesresults = local_moodleorg_stats_top_10_sites_by_users();
foreach ($top10usersitesresults as $row) {
    $data = array();
    if ($row->public=='2') {
        $data[] = html_writer::link(htmlspecialchars($row->url), clean_text($row->sitename));
    } else {
        $data[] = clean_text($row->sitename);
    }
    $data[] = number_format($row->users);
    $data[] = number_format($row->courses);
    $table->data[] = $data;
}
echo html_writer::table($table);

echo $OUTPUT->heading(get_string('top10sitesbycourses', 'local_moodleorg'));
$table = new html_table();
$table->attributes = array('class'=>'generaltable boxaligncenter');
$table->width = '800px';
$table->size    = array('360px','80px','80px','280px');
$table->head    = array(get_string('site'), get_string('statsusers', 'local_moodleorg'), get_string('statscourses', 'local_moodleorg'));
$table->align   = array('left','right','right');
$table->data    = array();

$top10coursesitesresults = local_moodleorg_stats_top_10_sites_by_courses();
foreach ($top10coursesitesresults as $row) {
    $data = array();
    if ($row->public=='2') {
        $data[] = html_writer::link(htmlspecialchars($row->url), clean_text($row->sitename));
    } else {
        $data[] = clean_text($row->sitename);
    }
    $data[] = number_format($row->users);
    $data[] = number_format($row->courses);
    $table->data[] = $data;
}
echo html_writer::table($table);
echo html_writer::end_tag('div');

/**
 * Display the moodle populationg graph
 */
echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align'));
echo html_writer::empty_tag('img', array('src'=>moodle_population(), 'alt'=>get_string('graphpopulation', 'local_moodleorg')));
echo html_writer::end_tag('p');
$lastday = time() - (24 * 3600);
$lastmonth = time() - (30 * 24 * 3600);
$table = new html_table();
$table->attributes = array('class'=>'generaltable boxaligncenter');
$table->width ='400px';
$table->align = array('left','right');
$table->data = array();
$table->data[] = array(get_string('registereduserstotal', 'local_moodleorg'), number_format($moodle->users));
$table->data[] = array(get_string('registereduserslastday', 'local_moodleorg'), number_format($DB->count_records_select('user', 'firstaccess > ?', array($lastday))));
$table->data[] = array(get_string('activeusers24hours', 'local_moodleorg'), number_format($DB->count_records_select('user', 'lastaccess > ?', array($lastday))));
$table->data[] = array(get_string('activeuserspastmonth', 'local_moodleorg'), number_format($DB->count_records_select('user', 'lastaccess > ?', array($lastmonth))));
echo html_writer::table($table);
echo html_writer::end_tag('div');

/**
 * Display the implementation map chart
 */
echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align'));
echo html_writer::empty_tag('img', array('src'=>moodle_implementation_map_graph(), 'alt'=>get_string('graphregistrationmap', 'local_moodleorg')));
echo html_writer::end_tag('p');
$table = new html_table();
$table->attributes = array('class'=>'generaltable boxaligncenter');
$table->width = '400px';
$table->head = array('Country', 'Registrations');
$table->data = array();
$table->align = array('left','right');
$top10countries = local_moodleorg_stats_top_10_countries();
$countrynames = get_string_manager()->get_list_of_countries();
foreach ($top10countries as $row) {
    $data = Array($countrynames[$row->country], number_format($row->countrycount));
    $table->data[] = $data;
}
echo html_writer::table($table);
if ($stats->countrycount) {
    echo html_writer::tag('p', get_string('graphregistrationmapdesc','local_moodleorg',$stats->countrycount), array('class'=>'mdl-align', 'style'=>'font-size:0.8em;color:#555;'));
}
echo html_writer::end_tag('div');

/**
 * Display the major and minor registrations for the past 6 months
 */
$partialminorchartexists = check_for_existing_cached_chart($CFG->dirroot.'/'.STATS_DIR.'/cache/partial.minor.versions.'.date('Ymd').'.png');
$fullminorchartexists = check_for_existing_cached_chart($CFG->dirroot.'/'.STATS_DIR.'/cache/full.minor.versions.'.date('Ymd').'.png');
if (!$partialminorchartexists || !$fullminorchartexists) {
    // This is a VERY costly query... VERRRRRRRRY costly
    // Only run this query is we NEED to generate
    $versioninfo = gather_version_information(0,2,0);  // Last 2 months
    $fullversioninfo = gather_version_information(99,0,0);  // Last 99 years
} else {
    // Generate a dummy array we won't generate the graph anyway
    $tempversion = Array();
    $tempversion['version'] = '2.0.0';
    $tempversion['major'] = '2';
    $tempversion['minor'] = '0';
    $tempversion['release'] = '0';
    $tempversion['count'] = 1;
    $versioninfo = array($tempversion);
    $fullversioninfo = array($tempversion);
}

$minorversiongraph = minor_version_pie_graph($versioninfo, 'Moodle registrations for the last two months');
$fullminorversiongraph = minor_version_pie_graph($fullversioninfo, 'All Moodle registrations by version', 'full');

echo html_writer::start_tag('div', array('class'=>'boxaligncenter', 'style'=>'background-color:#FFF;padding:20px;'));
echo html_writer::start_tag('p', array('class'=>'mdl-align'));
echo html_writer::empty_tag('img', array('src'=>$minorversiongraph, 'alt'=>get_string('registrationslast6months', 'local_moodleorg')));
echo html_writer::empty_tag('img', array('src'=>$fullminorversiongraph, 'alt'=>get_string('registrationstotal', 'local_moodleorg')));
echo html_writer::end_tag('p');
echo html_writer::end_tag('div');

echo $OUTPUT->footer();

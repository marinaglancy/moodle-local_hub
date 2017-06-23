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
 * Site registration updated event
 *
 * @package    local_hub
 * @copyright  2017 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_hub\event;

use core\event\base;

defined('MOODLE_INTERNAL') || die();

/**
 * Site registration updated event
 *
 * @package    local_hub
 * @copyright  2017 Marina Glancy
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class site_registration_updated extends base {

    /**
     * Convenience method to instantiate the event.
     *
     * @param stdClass $record
     * @return self
     */
    public static function create_from_record($record, $oldrecord) {
        $other = ['url' => $record->url];
        if (!$oldrecord->deleted && $record->deleted) {
            $other['deleted'] = 1;
        }
        if ($oldrecord->url !== $record->url) {
            $other['oldurl'] = $oldrecord->url;
        }
        if (!empty($record->freshregistration)) {
            $other['freshregistration'] = 1;
        }
        $event = static::create(array(
            'objectid' => $record->id,
            'other' => $other
        ));
        return $event;
    }

    /**
     * Returns description of what happened.
     *
     * @return string
     */
    public function get_description() {
        $str = "Site with URL '{$this->other['url']}' ";

        if (!empty($this->other['freshregistration'])) {
            $str .= "fresh/moved registration";
        } else if (!empty($this->other['deleted'])) {
            $str .= "unregistered";
        } else if (!empty($this->other['oldurl'])) {
            $str .= "moved";
        } else {
            $str .= "updated registration";
        }

        $str .= ", registration id '{$this->objectid}'";
        if (isset($this->other['oldurl'])) {
            $str .= ", old URL '{$this->other['oldurl']}'";
        }
        return $str;
    }

    /**
     * Return localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('event_site_registraion_updated', 'local_hub');
    }

    /**
     * Get URL related to the action
     *
     * @return \moodle_url
     */
    public function get_url() {
        return new \moodle_url('/sites/edit.php', ['edit' => $this->objectid]);
    }

    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = 'hub_site_directory';
        $this->context = \context_system::instance();
    }

    /**
     * Get_objectid_mapping method.
     *
     * @return string the name of the restore mapping the objectid links to
     */
    public static function get_objectid_mapping() {
        return base::NOT_MAPPED;
    }

    /**
     * replace add_to_log() statement.
     *
     * @return array of parameters to be passed to legacy add_to_log() function.
     */
    protected function get_legacy_logdata() {
        if (!empty($this->other['freshregistration'])) {

            return array(SITEID, 'local_hub', 'fresh/moved site on registered url', '',
                $this->objectid . ', ' . $this->other['url']
                . (isset($this->other['oldurl']) ? (',' . $this->other['oldurl']) : ''));

        } else if (!empty($this->other['deleted'])) {

            return array(SITEID, 'local_hub', 'site unregistration', '', $this->objectid);

        } else if (!empty($this->other['oldurl'])) {

            return array(SITEID, 'local_hub', 'site moved', '',
                'id:' . $this->objectid . ', new url: ' . $this->other['url']
                . ', old url: ' . $this->other['oldurl']);

        }

        return array(SITEID, 'local_hub', 'site update', '', $this->objectid);
    }
}

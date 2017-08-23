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
 * User login failed event.
 *
 * @package    core
 * @copyright  2014 Rajesh Taneja <rajesh@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_hub\event;

use core\event\base;

defined('MOODLE_INTERNAL') || die();

/**
 * User login failed event class.
 *
 * @property-read array $other {
 *      Extra information about event.
 *
 *      - string username: name of user.
 *      - int reason: failure reason.
 * }
 *
 * @package    core
 * @since      Moodle 2.7
 * @copyright  2014 Rajesh Taneja <rajesh@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class site_registration_failed extends base {
    /**
     * Init method.
     *
     * @return void
     */
    protected function init() {
        $this->context = \context_system::instance();
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    /**
     * Return localised event name.
     *
     * @return string
     */
    public static function get_name() {
        return get_string('event_site_registraion_failed', 'local_hub');
    }

    /**
     * Returns non-localised event description with id's for admin use only.
     *
     * @return string
     */
    public function get_description() {
        $url = s($this->other['url']);
        $description = "Site registration failed for URL '{$url}'";
        if (!empty($this->other['secreturl'])) {
            $sercerturl = s($this->other['secreturl']);
            $description .= " using secret for URL '{$sercerturl}'";
        } else {
            $description .= " using wrong secret";
        }
        if (!empty($this->other['emailsent'])) {
            $description .= ". Email sent to the administrator";
        } else {
            $description .= ". Email not sent";
        }
        return $description;
    }

    /**
     * Get URL related to the action.
     *
     * @return \moodle_url
     */
    public function get_url() {
        return null;
    }

    public static function get_other_mapping() {
        return false;
    }
}

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

namespace block_admin_presets2\event;

defined('MOODLE_INTERNAL') || die();

class preset_downloaded extends \core\event\base {

    public static function get_name() {
        return get_string('eventpresetdownloaded', 'block_admin_presets2');
    }

    public function get_description() {
        return "User {$this->userid} has downloaded the preset with id {$this->objectid}.";
    }

    public function get_url() {
        return new \moodle_url('/blocks/admin_presets2/index.php',
                array('action' => 'export', 'mode' => 'download_xml', 'id' => $this->objectid, 'sesskey' => sesskey()));
    }

    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_OTHER;
        $this->data['objecttable'] = 'block_admin_presets2';
    }
}

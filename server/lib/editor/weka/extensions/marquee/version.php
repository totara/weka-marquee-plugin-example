<?php
/**
 * This file is part of Totara Talent Experience Platform.
 *
 * Copyright (C) 2022 onwards Totara Learning Solutions LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Simon Chester <simon.chester@totara.com>
 * @package weka_marquee
 */
defined('MOODLE_INTERNAL') || die();

$plugin->version = 2022101400;        // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires = 2022092800;        // Requires this Totara version
$plugin->component = 'weka_marquee';        // Full name of the plugin (used for diagnostics)

$plugin->dependencies = [
    'jsoneditor_marquee' => 2022101400
];

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
 * @author  Simon Chester <simon.chester@totara.com>
 * @package jsoneditor_marquee
 */
namespace jsoneditor_marquee\json_editor\node;

use core\json_editor\formatter\formatter;
use core\json_editor\helper\node_helper;
use core\json_editor\node\abstraction\block_node;
use core\json_editor\node\node;

/**
 * A marquee node.
 */
class marquee extends node implements block_node {
    /**
     * An array of inline nodes.
     * @var array[]
     */
    private $content;

    /**
     * @return string
     */
    protected static function do_get_type(): string {
        // This will map to a node type of "marquee/marquee".
        // The first "marquee" comes from the plugin name, and the second is what we return here.
        return 'marquee';
    }

    /**
     * @param formatter $formatter
     * @return string
     */
    public function to_html(formatter $formatter): string {
        if (empty($this->content)) {
            return '';
        }
        return '<marquee>' . $formatter->print_nodes($this->content, formatter::HTML) . '</marquee>';
    }

    /**
     * @param formatter $formatter
     * @return string
     */
    public function to_text(formatter $formatter): string {
        // Can't render a marquee in plain text, so just print its content.
        return $formatter->print_nodes($this->content, formatter::TEXT) . "\n\n";
    }

    /**
     * @param array $node
     * @return marquee
     */
    public static function from_node(array $node): node {
        /** @var marquee $marquee */
        $marquee = parent::from_node($node);
        $marquee->content = $node['content'] ?? [];
        return $marquee;
    }

    /**
     * @param array $raw_node
     * @return bool
     */
    public static function validate_schema(array $raw_node): bool {
        if (!node_helper::check_keys_match_against_data($raw_node, ['type'], ['content'])) {
            return false;
        }
        return true;
    }

    /**
     * @param array $raw_node
     * @return array|null
     */
    public static function clean_raw_node(array $raw_node): ?array {
        $cleaned_raw_node = parent::clean_raw_node($raw_node);
        if ($cleaned_raw_node === null) {
            return null;
        }

        $content = static::clean_raw_node_content($cleaned_raw_node['content'] ?? []);
        if ($content === null) {
            return null;
        }
        $cleaned_raw_node['content'] = $content;

        return $cleaned_raw_node;
    }
}

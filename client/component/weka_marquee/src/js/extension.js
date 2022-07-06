/**
 * This file is part of Totara Enterprise Extensions.
 *
 * Copyright (C) 2023 onwards Totara Learning Solutions LTD
 *
 * Totara Enterprise Extensions is provided only to Totara
 * Learning Solutions LTD's customers and partners, pursuant to
 * the terms and conditions of a separate agreement with Totara
 * Learning Solutions LTD or its affiliate.
 *
 * If you do not have an agreement with Totara Learning Solutions
 * LTD, you may not access, use, modify, or distribute this software.
 * Please contact [licensing@totara.com] for more information.
 *
 * @author Simon Chester <simon.chester@totara.com>
 * @module weka_marquee
 */

import { langString } from 'tui/i18n';
import BaseExtension from 'editor_weka/extensions/Base';
import { blockTypeItem } from 'editor_weka/toolbar';
import Marquee from 'weka_marquee/components/nodes/Marquee';

class MarqueeExtension extends BaseExtension {
  nodes() {
    return {
      'marquee/marquee': {
        // ProseMirror node spec
        // https://prosemirror.net/docs/guide/#schema
        // https://prosemirror.net/docs/ref/#model.NodeSpec
        schema: {
          group: 'block',
          content: 'inline*',
          parseDOM: [{ tag: 'marquee' }],
          toDOM() {
            return ['marquee', 0];
          },
        },
        // Component to use for rendering in the editor.
        // If this is not specified, toDOM() will be used for rendering.
        component: Marquee,
      },
    };
  }

  toolbarItems() {
    const marquee = this.getSchema().nodes['marquee/marquee'];

    return [
      // Add a toolbar item that sets the block type to marquee.
      blockTypeItem(
        marquee,
        {},
        {
          // Setting group to 'blocks' places it in the blocks dropdown with Paragraph and Heading.
          group: 'blocks',
          label: langString('marquee', 'weka_marquee'),
        }
      ),
    ];
  }
}

export default opt => new MarqueeExtension(opt);

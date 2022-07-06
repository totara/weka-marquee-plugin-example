<!--
  This file is part of Totara Enterprise Extensions.

  Copyright (C) 2023 onwards Totara Learning Solutions LTD

  Totara Enterprise Extensions is provided only to Totara
  Learning Solutions LTD's customers and partners, pursuant to
  the terms and conditions of a separate agreement with Totara
  Learning Solutions LTD or its affiliate.

  If you do not have an agreement with Totara Learning Solutions
  LTD, you may not access, use, modify, or distribute this software.
  Please contact [licensing@totara.com] for more information.

  @author Simon Chester <simon.chester@totara.com>
  @module weka_marquee
-->

<template>
  <!-- Adding ref="content" tells Weka to use this element as the container for this node's content. -->
  <div ref="content" class="tui-weka_marquee-marquee" />
</template>

<script>
import BaseNode from 'editor_weka/components/nodes/BaseNode';

export default {
  extends: BaseNode,
};
</script>

<style lang="scss">
.tui-weka_marquee-marquee {
  margin: 0 0 var(--gap-2) 0;
  padding: var(--gap-2);
  // Since it's not an actual marquee in the editor, render an arrow pattern in the background.
  background-image: repeating-linear-gradient(
      45deg,
      var(--color-neutral-3) 0,
      var(--color-neutral-3) 20px,
      var(--color-neutral-1) 20px,
      var(--color-neutral-1) 40px
    ),
    repeating-linear-gradient(
      135deg,
      var(--color-neutral-3) 0,
      var(--color-neutral-3) 20px,
      var(--color-neutral-1) 20px,
      var(--color-neutral-1) 40px
    );
  background-repeat: no-repeat;
  background-position: top left, bottom left;
  background-size: 100% 50%;
}
</style>

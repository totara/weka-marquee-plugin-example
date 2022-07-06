# Weka editor example plugin

This repository contains an example plugin adding `<marquee>` support to the Weka editor.

## Implementation

This repository contains three components:

* The client-side implementation of `weka_marquee`, this adds the functionality to the Weka editor frontend.
* The back-end implementation of `weka_marquee`, which tells Weka that the client-side implementation exists.
* `jsoneditor_marquee`, which defines the schema of the JSON node, as the format is independent of the editor.

## Licensing
The `/server/theme/` portion is licensed under GPLv3, while the
`/client/component/` portion has a proprietary license - please see relevant
file headers for detail.

## Installation

Copy the following directories into your Totara 17+ installation:

* client/component/weka_marquee/
* server/lib/editor/weka/extensions/marquee/
* server/text_format/json_editor/extensions/marquee/

E.g. with `rsync`:

```
rsync -avz --delete client/component/weka_marquee/ /path/to/totara/client/component/weka_marquee/
rsync -avz --delete server/lib/editor/weka/extensions/marquee/ /path/to/totara/server/lib/editor/weka/extensions/marquee/
rsync -avz --delete server/text_format/json_editor/extensions/marquee/ /path/to/totara/server/text_format/json_editor/extensions/marquee/
```

The build files for the frontend are not committed, so build it with `npm run tui-build weka_marquee` after copying into a Totara install.

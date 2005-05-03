=== Down On Me ===
Tags: formatting
Contributors: choan

Down On Me rewrites the header tags in multipost pages one level down (so `h2` becomes `h3`, etc.)

== Installation ==

1. Upload to your plugins folder, usually `wp-content/plugins/`
2. Activate the plugin on the plugin screen
3. Done

== How it works ==

Down On Me adds a filter to the `the_content()` tag. If it detects that the post is showing in a multipost document, rewrites the header tags.
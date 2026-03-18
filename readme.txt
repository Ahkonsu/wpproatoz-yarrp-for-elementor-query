=== WPProAtoZ YARPP for Elementor Related Posts Query ===
Contributors: WP Pro A to Z
Donate link: https://wpproatoz.com/donate/
Tags: elementor, yarpp, related posts, custom query, elementor pro
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 1.0.0
Requires PHP: 8.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Integrates YARPP (Yet Another Related Posts Plugin) with Elementor Posts/Loop widgets using a custom Query ID for smarter, algorithm-based related posts.

== Description ==

This lightweight plugin lets you display **truly relevant related posts** in Elementor using **YARPP**'s powerful similarity algorithm (content, title, tags, categories, etc.) instead of Elementor's basic taxonomy matching.

Simply add a Posts widget (or Loop Grid/Carousel) to your **Single Post Template**, set the **Query ID** to `yarpp_related`, and this plugin automatically overrides the query to show YARPP-calculated results.

**Features**
- Uses YARPP's advanced relatedness scoring for better relevance
- Respects your global YARPP settings by default
- Easy to customize limit, weights, post types directly in code
- Excludes the current post automatically
- Fallback to empty results (or recent posts – configurable) if no matches
- No admin settings page – just activate and configure the Query ID in Elementor

**Instructions for Use**
1. Install and activate **Yet Another Related Posts Plugin (YARPP)** and configure its settings (thresholds, weights, etc.) at Settings → YARPP.
2. Install and activate **Elementor Pro**.
3. Install and activate this plugin.
4. Edit your Single Post template in Elementor Theme Builder.
5. Add a **Posts** widget (or Loop Grid) → Content tab → Query section.
6. Set **Query ID** to: `yarpp_related` (exactly, no quotes).
7. Customize widget display (thumbnails, title, excerpt, etc.) as usual.
8. (Optional) Edit the plugin file to change `'limit' => 4`, post_type, or add weight overrides.

View any single post – the widget will now show YARPP-powered related posts!

== Installation ==

1. Download the plugin ZIP from the [releases page](https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query/releases/).
2. In WordPress, go to **Plugins** > **Add New** > **Upload Plugin**.
3. Upload the ZIP, install, and activate.
4. Make sure YARPP and Elementor Pro are active.
5. Follow the usage instructions in the Description above.

**See Also:** [WordPress Plugin Installation Guide](https://wordpress.org/documentation/article/manage-plugins/#installing-plugins)

== Frequently Asked Questions ==

= What if no related posts are found? =
The widget shows nothing by default. Edit the plugin code to fallback to recent posts if preferred.

= Can I use this with custom post types? =
Yes – change `'post_type' => 'post'` in the code to your CPT slug or an array of types. Ensure YARPP supports your post type.

= How do I change the number of posts? =
Edit `'limit' => 4` in the plugin file (or add `'limit'` to match your needs).

== Changelog ==

= 1.0.0 =
* Initial release.
* Integrates yarpp_get_related() with Elementor custom query filter.
* Uses Query ID: yarpp_related.
* Basic fallback handling and current post exclusion.

== Upgrade Notice ==

= 1.0.0 =
Initial version – install and configure your Elementor widget Query ID.

== License ==

This plugin is licensed under the GPL v2 or later. See [license.txt](https://www.gnu.org/licenses/gpl-2.0.html) or the header for details.

== Contributing ==

Contributions welcome! Fork the repo at https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query, submit issues, or create pull requests.
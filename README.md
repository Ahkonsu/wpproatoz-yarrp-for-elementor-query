# WPProAtoZ YARPP for Elementor Related Posts Query
![Plugin Version](https://img.shields.io/badge/version-1.0.0-blue)
![WordPress Compatibility](https://img.shields.io/badge/WordPress-6.0%2B-green)
![PHP Compatibility](https://img.shields.io/badge/PHP-8.0%2B-green)
![License](https://img.shields.io/badge/license-GPLv2%2B-blue)
![Requires Plugins](https://img.shields.io/badge/requires-YARPP%20%26%20Elementor%20Pro-orange)

A lightweight WordPress plugin that integrates **YARPP (Yet Another Related Posts Plugin)** with Elementor Pro's Posts/Loop widgets. It overrides the default query using a custom Query ID to display smarter, algorithm-based related posts on single post templates.

## Overview
Elementor's built-in related posts (via taxonomy terms) can be basic. This plugin swaps that out for **YARPP**'s powerful content-similarity engine (analyzing titles, body text, tags, categories, etc.) — giving visitors more relevant suggestions and improving engagement/SEO.

Just set the **Query ID** to `yarpp_related` in your Elementor widget, and the magic happens automatically.

## Features
- Leverages YARPP's advanced scoring for truly relevant related posts
- Respects your global YARPP settings (thresholds, weights, etc.) by default
- Automatically excludes the current post
- Easy code-level customization: change post limit, weights, post types
- Fallback to empty results (or recent posts — editable in code) if no matches
- No admin settings page needed — keep it simple and lightweight
- Recursion-safe: prevents infinite loops on non-single pages

**Short & sweet usage**: Add a Posts widget to your Single Post template, set Query ID ? `yarpp_related`, and style as usual.

## Installation
1. Download the latest ZIP from the [Releases page](https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query/releases).
2. In WordPress: **Plugins** > **Add New** > **Upload Plugin** ? upload and activate.
3. Ensure **Yet Another Related Posts Plugin (YARPP)** and **Elementor Pro** are installed and active.
4. Configure YARPP settings at **Settings ? Related Posts** (tune thresholds, weights for best results).

## Usage
1. Go to **Elementor ? Theme Builder ? Single Post** (or create/edit your single post template).
2. Add a **Posts** widget (or **Loop Grid** / **Loop Carousel**).
3. In widget settings ? **Content** tab ? **Query** section:
   - Set **Query ID** to: `yarpp_related` (case-sensitive, no quotes).
4. Customize display: thumbnails, titles, excerpts, read more, etc.
5. (Optional) Edit the plugin file (`wpproatoz-yarrp-for-elementor-query.php`):
   - Change `'limit' => 4` to your preferred number.
   - Adjust `'post_type' => 'post'` for CPTs.
   - Add weight overrides, e.g.:
     ```php
     'weight' => array('title' => 1, 'body' => 2, 'tax' => array('category' => 1, 'post_tag' => 3)),
     
     
 View any single post — the widget now pulls YARPP-powered related posts!
Requirements

WordPress 6.0+
PHP 8.0+
Yet Another Related Posts Plugin (YARPP)
Elementor Pro (for Posts/Loop widgets and Theme Builder)

## Frequently Asked Questions
What if no related posts are found?
The widget shows nothing by default (clean look). Edit the code to fallback to recent posts if preferred:
// In the else block:
$query->set('orderby', 'date');
$query->set('order', 'DESC');
$query->set('posts_per_page', 4);

## Can I use this with custom post types?
Yes! Change 'post_type' => 'post' in the code to your CPT slug (or array for multiples). Ensure YARPP supports the post type in its settings.
How do I change the number of posts or tweak relevance?
Edit 'limit' => 4 or add YARPP args like 'weight' / 'threshold' directly in the function. Tune global YARPP settings first for best baseline.
Changelog
1.0.0 (Initial Release)

## Integrates yarpp_get_related() with Elementor's custom query filter (elementor/query/yarpp_related).
Uses Query ID: yarpp_related.
Includes recursion protection (static flag) to avoid stack overflows.
Basic fallback handling and current post exclusion.
Lightweight — no admin UI, just code tweaks as needed.

## Contributing
Contributions are welcome!

Fork the repo: https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query
Create a branch, make changes, submit a PR.
Report bugs or suggest features via Issues.

## License
GPLv2 or later. See the plugin header or GNU GPL v2 for details.
Made by WPProAtoZ.com
Donate: https://wpproatoz.com/donate/
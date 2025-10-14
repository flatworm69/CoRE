# Feisty Unicorn Coffee House — WordPress Theme

A handcrafted WordPress theme that translates the Feisty Unicorn Coffee House brand (nerdcore, punk, caffeinated chaos) into a full-featured marketing and ecommerce-ready experience. It mirrors the Shopify build while embracing WordPress best practices, custom post types, Customizer controls, and a playable arcade mini-game.

## Highlights

- **Homepage hero, menu, pillars, merch showcase, partner supply chain, events, testimonials, and arcade mini-game** implemented as PHP template parts with curated default copy.
- **Custom post types** for drinks, testimonials, and events complete with meta boxes for pricing, ratings, dates, and CTAs.
- **Customizer controls** let you adjust announcement bar text, hero copy, CTAs, and footer contact details without touching code.
- **Reusable theme assets** (CSS/JS, SVG artwork) that echo the Feisty Unicorn aesthetic, including the “Wake the FUCH Up!” positioning and Temecula Coffee Roasters compliance reminders.
- **Responsive navigation** and newsletter-ready footer with widget support for embedding email tools or loyalty signups.

## Installation

1. Zip the `feisty-unicorn-wp` directory or copy it into `wp-content/themes/` within your WordPress installation.
2. In the WordPress dashboard go to **Appearance → Themes**, locate **Feisty Unicorn Coffee House**, and activate it.
3. Optional: import existing blog content or create pages/posts to populate the fallback templates beyond the custom homepage.

## Custom Post Types

| Type | Purpose | Key Meta |
| ---- | ------- | -------- |
| `fuch_drink` | Drinks & beans displayed in the “Signature Drinks & Beans” grid. | Tagline, Price, Flavor/Format |
| `fuch_testimonial` | Quotes for the testimonial slider. | Role/Attribution, Rating (1–5 stars) |
| `fuch_event` | Launch events and activations. | Event Date, Location, CTA Label + URL |

Each post type is available via the admin sidebar. Add featured images to drinks for bespoke artwork or rely on the built-in illustrated placeholders.

## Customizer Controls

Navigate to **Appearance → Customize** to update:

- Announcement bar text.
- Hero kicker/title/subtitle plus primary and secondary CTAs.
- Footer contact email, phone, address, and support hours.

Changes preview instantly thanks to `postMessage` support.

## Arcade Mini-Game

The arcade section includes a canvas-based endless runner featuring the feisty unicorn mascot. Click/tap “Start Run” to begin, press space (or tap) to jump, and watch the score climb. Assets are pure JS/CSS—no additional build steps required.

## Extending for Ecommerce

- Add WooCommerce and map products to the merch showcase grid or link to Shopify product URLs.
- Connect ConvertKit, Klaviyo, or Mailchimp to the footer newsletter form by swapping the `action` attribute.
- Use the custom post types to power dynamic sections or convert them into custom blocks via block themes if desired.

## Development Notes

- CSS/JS live in `assets/` and are enqueued with `filemtime` cache busting.
- Meta boxes use WordPress nonces and sanitization for secure saves.
- The theme ships with accessible defaults (skip-link-friendly structure, aria labels, screen reader text, keyboard-ready navigation toggle).

## License

Released under the GPL v2 (or later) in line with WordPress.org theme requirements.

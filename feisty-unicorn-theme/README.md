# Feisty Unicorn Coffee House Theme

A custom Shopify Online Store 2.0 theme tailored for the Feisty Unicorn Coffee House brand. It combines whimsical storytelling, vibrant gradients, and configurable sections for drinks, events, testimonials, and more.

## Structure

```
feisty-unicorn-theme/
├── assets/            # CSS & JavaScript assets
├── config/            # Theme and preset settings
├── layout/            # Global theme layout
├── locales/           # Language strings
├── sections/          # Reusable, configurable sections
├── snippets/          # Shared partial templates
└── templates/         # JSON templates defining page layouts
```

## Key Sections

- **Hero** – updated with F.U.C.H. acronym copy, flexible artwork, and CTAs to the roast collection and arcade mini-game.
- **Brand pillars** – four configurable cards that articulate the "Caffeine + Chaos + Charm" ethos.
- **Product showcase** – highlight flagship drinks like Wake the FUCH Up!, Moonbeam Matcha, Chaos Chai, and Pixel Mint Nitro with on-brand art.
- **Menu** – dynamic grid with badges and descriptive copy linked to the artwork we generated for each drink.
- **Dropship partners** – outlines Temecula Coffee Roasters, Dripshipper, and Aroma Ridge with compliance reminders and label tips.
- **About** – brand origin story with emphasis on drop-ship launch strategy and escape-room roadmap.
- **Testimonials** – rotating social proof slider seeded with quotes referencing the new products and compliance wins.
- **Events** – showcases roast drops, arcade beta nights, and escape-room sneak peeks.
- **FUCH arcade mini-game** – lightweight canvas runner featuring the Feisty Unicorn mascot.
- **Newsletter** – reusable signup form snippet embedded in the footer and standalone section.

## Getting Started

1. Install the [Shopify CLI](https://shopify.dev/docs/themes/tools/cli) and authenticate with your store.
2. For a quick local preview, run:
   ```bash
   shopify theme serve
   ```
   from this theme directory.
3. To share a live preview tunnel (desktop + mobile), follow the [Preview Guide](docs/preview-guide.md) and run `shopify theme dev --tunnel`.
4. Customize section content, menu links, and theme settings in the Shopify editor after uploading or linking the theme.
5. Upload the curated drink artwork (dark roast, matcha, chai, mocha/nitro) and map them to the Product showcase + Menu items.

## Artwork & Media Mapping

- **Hero artwork** – upload the punk unicorn banner we produced; add the "Wake the FUCH Up!" caption for attribution.
- **Product showcase** – assign the individual drink illustrations to each block. The defaults already reference the correct flavor notes for quick editing.
- **Menu** – mirror the same artwork or lifestyle shots for consistency; badges call out roast style.
- **Events & Dropship** – swap imagery as needed, but defaults provide narrative copy anchored to the Feisty Unicorn brief.

## Mini-Game Notes

- The **FUCH arcade mini-game** is a self-contained HTML canvas runner (no external libraries). Tap/click or press space to jump, collect beans, and avoid goblins.
- To replace the background palette or tweak difficulty, edit the constants near the top of `assets/theme.js`.
- The game gracefully stops when the window loses focus; click "Start Game" to replay.

## Label Compliance Quick Reference

- Footer defaults include: "Roasted by Temecula Coffee Roasters" and "Distributed by Feisty Unicorn Coffee House, LLC" – align with the Temecula Labeling Guide (Labelling_Guide_V6.pdf).
- Net weight, format (Whole Bean), and Wake the FUCH Up! flavor callouts are pre-populated for fast label mockups.
- Update the address once you finalize the business registration (the sample uses a placeholder future HQ address).

## Customization Notes

- Primary and accent colors are editable through **Online Store → Themes → Customize → Theme settings**.
- Navigation links pull from the menu selected in the header section settings.
- Add, remove, or reorder menu items, highlight cards, testimonials, and events directly in the theme editor by adjusting section blocks.

## Deployment

When you're ready to publish:

```bash
shopify theme push
```

Preview the deployed theme within your Shopify admin and publish when everything looks magical.

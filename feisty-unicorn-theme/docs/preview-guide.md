# Previewing the Feisty Unicorn Theme

Use these steps to spin up a secure preview environment so stakeholders can browse the Shopify theme on desktop or mobile (including an iPhone) without needing to install anything locally.

## 1. Requirements

- A Shopify store (development store or the production store) with Online Store 2.0 enabled.
- [Shopify CLI](https://shopify.dev/docs/themes/tools/cli) v3+ installed on your computer.
- Theme files from this repository downloaded locally.

> **Tip:** If you don't want to install Shopify CLI on your main machine, you can use GitHub Codespaces or any cloud dev box, as long as it has the CLI and can run a terminal session.

## 2. Authenticate with Shopify

1. From the `feisty-unicorn-theme` directory, log into your Shopify store:
   ```bash
   shopify login --store your-store-name.myshopify.com
   ```
2. Follow the browser prompt to authorize the CLI.

## 3. Launch a live preview tunnel

1. Start the dev server with tunneling enabled so Shopify provides a secure HTTPS URL you can share:
   ```bash
   shopify theme dev --store your-store-name.myshopify.com --tunnel --theme-editor-sync
   ```
   - `--tunnel` provisions a Cloudflare tunnel so you get a public preview link.
   - `--theme-editor-sync` keeps the local files and online editor in sync while you tweak sections.
2. The CLI will print two URLs:
   - **Preview link** (looks like `https://{random}.cloudflare.shopifypreview.com`) — share this with teammates. It works on mobile, tablets, and desktop.
   - **Theme editor link** — opens the Shopify customizer pointed at your local files.
3. Leave the terminal window running while others review the preview. The tunnel stays live until you press `Ctrl+C`.

## 4. Testing on an iPhone

- Send the Cloudflare preview URL to your phone via AirDrop, SMS, or email.
- Open the link in Safari or Chrome on iOS. All theme sections, artwork, and the arcade mini-game load exactly as they will after publishing.
- Use the Share Sheet → *Add to Home Screen* for an app-like icon while you iterate.

## 5. Publishing a staging copy (optional)

If you prefer a hosted staging theme inside Shopify:

1. Push the theme as an unpublished copy:
   ```bash
   shopify theme push --unpublished --theme "FUCH Staging"
   ```
2. In Shopify Admin → **Online Store → Themes**, click **Actions → Preview** on the "FUCH Staging" theme. Shopify generates a shareable preview link you can email to stakeholders.
3. Update files locally and re-run `shopify theme push` whenever you want to refresh the staging theme.

## 6. Troubleshooting

| Issue | Fix |
| ----- | ---- |
| Tunnel URL closes after a few minutes | Keep the terminal session active; disable sleep mode. |
| Mobile preview shows old assets | Clear Safari cache or append `?v=timestamp` to force-refresh. |
| CLI can't find a store | Double-check the store domain and ensure your Shopify account has theme permissions. |
| Liquid errors in preview | Run `shopify theme check` to lint the theme before serving. |

Once stakeholders approve the preview, you can publish via `shopify theme push` followed by **Actions → Publish** inside Shopify.

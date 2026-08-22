import { cp, mkdir, readFile, rm, writeFile } from "node:fs/promises";
import path from "node:path";
import { fileURLToPath } from "node:url";

const root = path.dirname(fileURLToPath(import.meta.url));
const output = path.join(root, "lab");
const siteUrl = (process.env.SITE_URL || "https://AshhadS.github.io/labs").replace(/\/$/, "");

if (path.dirname(output) !== root || path.basename(output) !== "lab") {
  throw new Error("Refusing to replace an unexpected output directory.");
}

function rewriteSiteUrls(html, pagePath, assetPrefix) {
  return html
    .replaceAll("http://ashhadslabs.com", siteUrl)
    .replaceAll("https://ashhadslabs.com", siteUrl)
    .replaceAll('href="/assets/', `href="${assetPrefix}assets/`)
    .replaceAll('src="/assets/', `src="${assetPrefix}assets/`)
    .replaceAll('href="/dev/"', `href="${assetPrefix}dev/"`)
    .replaceAll('window.location.href = "/dev/"', `window.location.href = "${assetPrefix}dev/"`)
    .replaceAll(`href="${siteUrl}${pagePath}"`, `href="${siteUrl}${pagePath}"`);
}

function parseCsvLine(line) {
  const values = [];
  let value = "";
  let quoted = false;

  for (let index = 0; index < line.length; index += 1) {
    const character = line[index];
    if (character === '"' && quoted && line[index + 1] === '"') {
      value += '"';
      index += 1;
    } else if (character === '"') {
      quoted = !quoted;
    } else if (character === "," && !quoted) {
      values.push(value);
      value = "";
    } else {
      value += character;
    }
  }

  values.push(value);
  return values;
}

function keepPopulatedRowsBranch(template) {
  const outputLines = [];
  const states = [];

  for (const line of template.split(/\r?\n/)) {
    if (/<\?php if \(!empty\(\$rows\)\): \?>/.test(line)) {
      states.push(true);
      continue;
    }
    if (/<\?php else: \?>/.test(line)) {
      states[states.length - 1] = false;
      continue;
    }
    if (/<\?php endif; \?>/.test(line)) {
      states.pop();
      continue;
    }
    if (states.every(Boolean)) outputLines.push(line);
  }

  return outputLines.join("\n");
}

async function renderRoot() {
  let html = await readFile(path.join(root, "index.php"), "utf8");
  html = html
    .replace(/^<\?php[\s\S]*?\?>\s*/, "")
    .replace(/<\?php echo date\('Y'\); \?>/g, String(new Date().getUTCFullYear()))
    .replaceAll('href="/"', 'href="./"')
    .replaceAll('"/dev/', '"dev/')
    .replaceAll('"/gold-rates/', '"gold-rates/');
  html = rewriteSiteUrls(html, "/", "");
  await writeFile(path.join(output, "index.html"), html);
}

async function renderDev() {
  let html = await readFile(path.join(root, "dev", "index.php"), "utf8");
  html = rewriteSiteUrls(html, "/dev/", "../");
  await mkdir(path.join(output, "dev"), { recursive: true });
  await writeFile(path.join(output, "dev", "index.html"), html);
}

async function loadGoldRows() {
  const csv = await readFile(path.join(root, "gold-rates", "gold_rates.csv"), "utf8");
  return csv
    .trim()
    .split(/\r?\n/)
    .map(parseCsvLine)
    .filter((row) => row.length >= 5)
    .map(([recorded_at, location, rate_1, rate_2, api_updated_at]) => ({
      recorded_at,
      location,
      rate_1: Number(rate_1.replace(/ KWD|,/g, "")),
      rate_2: Number(rate_2.replace(/ KWD|,/g, "")),
      api_updated_at,
    }))
    .sort((a, b) => a.recorded_at.localeCompare(b.recorded_at));
}

async function renderGold(sourceName, outputName, rows) {
  const latest = rows.at(-1) || { location: "Kuwait", rate_1: 0, rate_2: 0 };
  let html = await readFile(path.join(root, "gold-rates", sourceName), "utf8");
  html = html.replace(/^<\?php[\s\S]*?\?>\s*/, "");
  html = keepPopulatedRowsBranch(html)
    .replace(/<\?= htmlspecialchars\(\$pageTitle, ENT_QUOTES, "UTF-8"\) \?>/g, "Kuwait Gold Rates Today | 22K &amp; 24K Price Analysis")
    .replace(/<\?= htmlspecialchars\(\$pageDescription, ENT_QUOTES, "UTF-8"\) \?>/g, "Track today's 22K and 24K gold prices in Kuwait, explore historical trends, moving averages, and buy timing insights in Kuwaiti dinars.")
    .replace(/<\?= htmlspecialchars\(\$canonicalUrl, ENT_QUOTES, "UTF-8"\) \?>/g, `${siteUrl}/gold-rates/`)
    .replace(/<\?= htmlspecialchars\(\$latest\["location"\] \?\? "Kuwait"\) \?>/g, latest.location)
    .replace(/<\?= number_format\(\$latest\["rate_1"\], 2\) \?>/g, latest.rate_1.toFixed(2))
    .replace(/<\?= number_format\(\$latest\["rate_2"\], 2\) \?>/g, latest.rate_2.toFixed(2))
    .replace(/<\?= count\(\$rows\) \?>/g, String(rows.length))
    .replace(/<\?= json_encode\(\$rows, JSON_PRETTY_PRINT\); \?>/g, JSON.stringify(rows, null, 2));
  html = rewriteSiteUrls(html, "/gold-rates/", "../");
  await writeFile(path.join(output, "gold-rates", outputName), html);
}

async function writeMetadataFiles() {
  const robots = `User-agent: *\nAllow: /\n\nSitemap: ${siteUrl}/sitemap.xml\n`;
  const sitemap = `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <url><loc>${siteUrl}/</loc></url>
  <url><loc>${siteUrl}/dev/</loc></url>
  <url>
    <loc>${siteUrl}/gold-rates/</loc>
    <image:image><image:loc>${siteUrl}/gold-rates/yearly-price.png</image:loc></image:image>
    <image:image><image:loc>${siteUrl}/gold-rates/monthly-change.png</image:loc></image:image>
  </url>
</urlset>
`;
  await writeFile(path.join(output, "robots.txt"), robots);
  await writeFile(path.join(output, "sitemap.xml"), sitemap);
  await writeFile(path.join(output, ".nojekyll"), "");
}

await rm(output, { recursive: true, force: true });
await mkdir(path.join(output, "gold-rates"), { recursive: true });
await cp(path.join(root, "assets"), path.join(output, "assets"), { recursive: true });
await cp(path.join(root, "gold-rates", "gold_rates.csv"), path.join(output, "gold-rates", "gold_rates.csv"));
await cp(path.join(root, "gold-rates", "monthly-change.png"), path.join(output, "gold-rates", "monthly-change.png"));
await cp(path.join(root, "gold-rates", "yearly-price.png"), path.join(output, "gold-rates", "yearly-price.png"));

const goldRows = await loadGoldRows();
await renderRoot();
await renderDev();
await renderGold("index.php", "index.html", goldRows);
await renderGold("index.php.bkp.php", "index.backup.html", goldRows);
await writeMetadataFiles();

console.log(`Built static site in ${output}`);

<?php
$csvFile = __DIR__ . "/gold_rates.csv";
$rows = [];

if (file_exists($csvFile)) {
    if (($handle = fopen($csvFile, "r")) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            if (count($data) < 5) {
                continue;
            }

            $rows[] = [
                "recorded_at" => $data[0],
                "location" => $data[1],
                "rate_1" => (float) str_replace([" KWD", ","], "", $data[2]),
                "rate_2" => (float) str_replace([" KWD", ","], "", $data[3]),
                "api_updated_at" => $data[4],
            ];
        }
        fclose($handle);
    }
}

usort($rows, function ($a, $b) {
    return strtotime($a["recorded_at"]) <=> strtotime($b["recorded_at"]);
});

$latest = end($rows);

$pageTitle = "Kuwait Gold Rates Today | 22K & 24K Price Analysis";
$pageDescription = "Track today's 22K and 24K gold prices in Kuwait, explore historical trends, moving averages, and buy timing insights in Kuwaiti dinars.";
$canonicalUrl = "https://ashhadslabs.com/gold-rates/";
?>
<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8") ?>">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, "UTF-8") ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Kuwait Gold Rate Dashboard">
    <meta property="og:locale" content="en_KW">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8") ?>">
    <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, "UTF-8") ?>">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, "UTF-8") ?>">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3LKTN65059"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3LKTN65059');
    </script>
    <link rel="icon" href="/assets/favicon.ico" sizes="any">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --ink: #18201c;
            --muted: #6d746f;
            --surface: #ffffff;
            --line: #e8e6df;
            --gold: #b68a35;
            --gold-dark: #7b5b1d;
            --gold-soft: #f7f0df;
            --green: #2f6b4f;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 10% 0%, rgba(194, 151, 66, .12), transparent 28rem),
                #f7f7f4;
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
            padding: 54px 0 64px;
        }

        .header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 6px 0 8px;
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(36px, 5vw, 54px);
            font-weight: 500;
            letter-spacing: -.04em;
            line-height: 1;
        }

        .header p {
            color: var(--muted);
            margin: 0;
            font-size: 15px;
        }

        .eyebrow {
            margin: 0;
            color: var(--gold-dark);
            font-size: 12px;
            font-weight: 750;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .market-status {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            flex: 0 0 auto;
            padding: 10px 14px;
            border: 1px solid #dbe6df;
            border-radius: 999px;
            background: rgba(255,255,255,.72);
            color: var(--green);
            font-size: 13px;
            font-weight: 650;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #3f956a;
            box-shadow: 0 0 0 4px rgba(63,149,106,.12);
        }

        .pricing-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin: 0 2px 12px;
        }

        .pricing-heading h2 {
            margin: 0;
            font-size: 18px;
            letter-spacing: -.02em;
        }

        .pricing-schedule {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
        }

        .clock-icon {
            position: relative;
            width: 17px;
            height: 17px;
            border: 1.5px solid var(--gold);
            border-radius: 50%;
        }

        .clock-icon::before, .clock-icon::after {
            content: "";
            position: absolute;
            left: 7px;
            top: 3px;
            width: 1.5px;
            height: 5px;
            border-radius: 2px;
            background: var(--gold-dark);
            transform-origin: bottom;
        }

        .clock-icon::after {
            transform: rotate(120deg);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
            margin-bottom: 28px;
        }

        .card {
            position: relative;
            overflow: hidden;
            background: var(--surface);
            border: 1px solid rgba(226, 223, 213, .9);
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 12px 36px rgba(30, 38, 33, .055);
        }

        .card small {
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .card h2 {
            margin: 16px 0 0;
            font-size: 27px;
            line-height: 1.1;
            letter-spacing: -.035em;
            font-variant-numeric: tabular-nums;
        }

        .card h2 span {
            color: var(--muted);
            font-size: 13px;
            font-weight: 650;
            letter-spacing: .02em;
        }

        .rate-card {
            background: linear-gradient(145deg, #fff 35%, var(--gold-soft));
        }

        .rate-card::after {
            content: "";
            position: absolute;
            width: 80px;
            height: 80px;
            top: -34px;
            right: -26px;
            border: 14px solid rgba(182,138,53,.11);
            border-radius: 50%;
        }

        .meta-value {
            font-size: 17px !important;
            font-weight: 650;
            letter-spacing: -.015em !important;
            line-height: 1.35 !important;
        }

        .analytics-panel {
            padding: 0;
        }

        .analytics-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 22px 24px;
            cursor: pointer;
            list-style: none;
        }

        .analytics-summary::-webkit-details-marker { display: none; }

        .analytics-summary h2 {
            margin: 0 0 5px;
            font-size: 20px;
            letter-spacing: -.025em;
        }

        .analytics-summary p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        .summary-status {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .analytics-chevron {
            width: 9px;
            height: 9px;
            border-right: 2px solid var(--muted);
            border-bottom: 2px solid var(--muted);
            transform: rotate(45deg) translateY(-2px);
            transition: transform .2s ease;
        }

        .analytics-panel[open] .analytics-chevron {
            transform: rotate(225deg) translate(-2px, -2px);
        }

        .analytics-body {
            padding: 21px 24px 24px;
            border-top: 1px solid var(--line);
        }

        .analytics-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 20px;
        }

        .analytics-header h2 {
            margin: 0 0 6px;
            font-size: 20px;
            letter-spacing: -.025em;
        }

        .analytics-header p {
            max-width: 650px;
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.5;
        }

        .analytics-context {
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .outlook-explanation {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin: -6px 0 18px;
            padding: 12px 14px;
            border-left: 3px solid var(--gold);
            border-radius: 0 10px 10px 0;
            background: var(--gold-soft);
            color: #514527;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.55;
        }

        .outlook-explanation .info-tip { flex: 0 0 auto; margin-top: 1px; }

        .outlook-badge {
            position: relative;
            flex: 0 0 auto;
            padding: 9px 13px;
            border-radius: 999px;
            cursor: help;
            font-size: 12px;
            font-weight: 750;
        }

        .outlook-badge::after {
            content: attr(data-tooltip);
            position: absolute;
            z-index: 20;
            right: auto;
            bottom: calc(100% + 10px);
            left: 50%;
            width: min(300px, calc(100vw - 32px));
            padding: 11px 13px;
            border-radius: 9px;
            background: var(--ink);
            color: #fff;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.5;
            text-align: left;
            box-shadow: 0 8px 20px rgba(0,0,0,.16);
            opacity: 0;
            pointer-events: none;
            transform: translate(-50%, 4px);
            transition: opacity .15s ease, transform .15s ease;
        }

        .outlook-badge::before {
            content: "";
            position: absolute;
            z-index: 21;
            bottom: calc(100% + 4px);
            left: 50%;
            border: 6px solid transparent;
            border-top-color: var(--ink);
            opacity: 0;
            pointer-events: none;
            transform: translateX(-50%);
            transition: opacity .15s ease;
        }

        .outlook-badge:hover::after, .outlook-badge:focus::after {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        .outlook-badge:hover::before, .outlook-badge:focus::before { opacity: 1; }

        .outlook-badge.favorable { background: #e8f3ed; color: #246145; }
        .outlook-badge.neutral { background: var(--gold-soft); color: var(--gold-dark); }
        .outlook-badge.cautious { background: #f6e9e5; color: #8a4637; }

        .visually-hidden {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        .analytics-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 0 0 auto;
        }

        .rate-toggle {
            display: inline-flex;
            padding: 3px;
            border: 1px solid #dedbd1;
            border-radius: 999px;
            background: #f6f5f1;
        }

        .rate-option {
            appearance: none;
            border: 0;
            border-radius: 999px;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            font-weight: 750;
            padding: 7px 11px;
        }

        .rate-option.active {
            background: #fff;
            color: var(--gold-dark);
            box-shadow: 0 2px 7px rgba(30, 38, 33, .1);
        }

        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .metric {
            padding: 17px 18px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fbfbf9;
        }

        .metric-label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 9px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 750;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .metric-value {
            display: block;
            color: var(--ink);
            font-size: 21px;
            font-weight: 750;
            letter-spacing: -.03em;
            font-variant-numeric: tabular-nums;
        }

        .metric-note {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .info-tip {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 17px;
            height: 17px;
            border: 1px solid #c9c7bf;
            border-radius: 50%;
            color: #737a75;
            cursor: help;
            font-size: 11px;
            font-style: normal;
            font-weight: 800;
            letter-spacing: 0;
            text-transform: none;
        }

        .info-tip::after {
            content: attr(data-tooltip);
            position: absolute;
            z-index: 10;
            right: auto;
            bottom: calc(100% + 9px);
            left: 50%;
            width: min(230px, calc(100vw - 32px));
            padding: 10px 12px;
            border-radius: 9px;
            background: var(--ink);
            color: #fff;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 1.45;
            text-transform: none;
            box-shadow: 0 8px 20px rgba(0,0,0,.16);
            opacity: 0;
            pointer-events: none;
            transform: translate(-50%, 4px);
            transition: opacity .15s ease, transform .15s ease;
        }

        .info-tip::before {
            content: "";
            position: absolute;
            z-index: 11;
            bottom: calc(100% + 3px);
            left: 50%;
            border: 6px solid transparent;
            border-top-color: var(--ink);
            opacity: 0;
            pointer-events: none;
            transform: translateX(-50%);
            transition: opacity .15s ease;
        }

        .info-tip:hover::after, .info-tip:focus::after {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        .info-tip:hover::before, .info-tip:focus::before { opacity: 1; }

        .range-values {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px;
        }

        .range-value {
            display: inline-flex;
            padding: 4px 7px;
            border-radius: 7px;
            font-weight: 750;
            font-variant-numeric: tabular-nums;
        }

        .range-value.low { background: #e8f3ed; color: #246145; }
        .range-value.high { background: #f6e9e5; color: #8a4637; }

        .analytics-modal {
            display: grid;
            grid-template-rows: 0fr;
            margin: 0 24px;
            opacity: 0;
            transition: grid-template-rows .35s ease, opacity .25s ease, margin .35s ease;
        }

        .analytics-modal.open {
            grid-template-rows: 1fr;
            margin-top: 18px;
            opacity: 1;
        }

        .analytics-modal.expanded .analytics-dialog { overflow: visible; }

        .analytics-dialog {
            display: flex;
            flex-direction: column;
            min-height: 0;
            width: 100%;
            overflow: hidden;
            border: 1px solid rgba(226, 223, 213, .9);
            border-radius: 16px;
            background: #fbfaf6;
        }

        .analytics-dialog-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 21px 24px;
        }

        .analytics-dialog-header h2 {
            margin: 0 0 5px;
            font-size: 21px;
            letter-spacing: -.025em;
        }

        .analytics-dialog-header p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }


        .analytics-close {
            display: inline-grid;
            place-items: center;
            width: 34px;
            height: 34px;
            padding: 0 0 3px;
            border: 1px solid var(--line);
            border-radius: 50%;
            background: #f6f5f1;
            color: var(--ink);
            cursor: pointer;
            font-size: 24px;
            line-height: 1;
        }

        .analytics-close:hover { background: #eceae3; }

        .chart-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 9px;
        }

        .analytics-trigger {
            display: flex;
            align-items: center;
            gap: 12px;
            appearance: none;
            border: 1px solid var(--gold-dark);
            border-radius: 12px;
            background: var(--gold-dark);
            color: #fff;
            cursor: pointer;
            font: inherit;
            padding: 8px 11px 8px 13px;
            text-align: left;
            transition: background .18s ease, transform .18s ease;
        }

        .analytics-trigger:hover { background: #654814; transform: translateY(-1px); }

        .analytics-trigger small {
            display: block;
            margin-bottom: 1px;
            color: rgba(255,255,255,.72);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .analytics-trigger strong {
            display: block;
            font-size: 13px;
            font-weight: 750;
            white-space: nowrap;
        }

        .analytics-trigger-arrow {
            display: grid;
            place-items: center;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: rgba(255,255,255,.13);
            font-size: 15px;
            transition: transform .2s ease;
        }

        .analytics-trigger[aria-expanded="true"] .analytics-trigger-arrow { transform: rotate(90deg); }

        .panel {
            background: var(--surface);
            border: 1px solid rgba(226, 223, 213, .9);
            border-radius: 20px;
            box-shadow: 0 12px 36px rgba(30, 38, 33, .055);
            margin-bottom: 28px;
        }

        .panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 24px 0;
        }

        .panel-heading h2 {
            margin: 0 0 5px;
            font-size: 18px;
            letter-spacing: -.02em;
        }

        .section-title {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 9px;
            margin-bottom: 5px;
        }

        .section-title h2 {
            margin-bottom: 0;
        }

        .data-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: .05em;
            line-height: 1;
            text-transform: uppercase;
        }

        .data-badge::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .data-badge.realtime {
            background: #e8f3ed;
            color: #246145;
        }

        .data-badge.historical {
            background: var(--gold-soft);
            color: var(--gold-dark);
        }

        .panel-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        .code-link {
            display: inline-flex;
            align-items: center;
            flex: 0 0 auto;
            gap: 7px;
            padding: 8px 12px;
            border: 1px solid #dedbd1;
            border-radius: 999px;
            background: #fff;
            color: var(--gold-dark);
            font-size: 12px;
            font-weight: 750;
            text-decoration: none;
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
        }

        .code-link:hover {
            border-color: var(--gold);
            box-shadow: 0 6px 18px rgba(123, 91, 29, .12);
            transform: translateY(-1px);
        }

        .code-link:focus-visible {
            outline: 3px solid rgba(182, 138, 53, .25);
            outline-offset: 2px;
        }

        .range-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .range-button {
            appearance: none;
            border: 1px solid #dedbd1;
            border-radius: 999px;
            background: #fff;
            color: #59615c;
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            padding: 8px 12px;
            transition: border-color .18s ease, background .18s ease, color .18s ease;
        }

        .range-button:hover:not(:disabled), .range-button.active {
            border-color: var(--gold);
            background: var(--gold-soft);
            color: var(--gold-dark);
        }

        .range-button:disabled {
            cursor: not-allowed;
            opacity: .38;
        }

        .indicator-button {
            appearance: none;
            border: 1px dashed #8874b4;
            border-radius: 999px;
            background: #fff;
            color: #66538f;
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            padding: 8px 12px;
            transition: background .18s ease, color .18s ease, opacity .18s ease;
        }

        .indicator-button:hover:not(:disabled), .indicator-button.active {
            border-style: solid;
            background: #eeeaf7;
            color: #4e3c78;
        }

        .indicator-button:disabled { cursor: not-allowed; opacity: .38; }

        .period-navigation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin: 17px 24px 22px;
            padding: 10px 12px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fbfaf6;
        }

        .period-navigation[hidden] { display: none; }

        .period-nav-button {
            appearance: none;
            border: 1px solid #d9d6cc;
            border-radius: 9px;
            background: #fff;
            color: var(--ink);
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            padding: 7px 10px;
        }

        .period-nav-button:hover:not(:disabled) { border-color: var(--gold); color: var(--gold-dark); }
        .period-nav-button:disabled { cursor: not-allowed; opacity: .35; }

        .period-range-label {
            color: #4e5751;
            font-size: 13px;
            font-weight: 700;
            text-align: center;
        }

        .chart-wrap {
            height: 360px;
            padding: 18px 20px 22px;
        }

        .table-panel { overflow: hidden; }

        .table-scroll {
            max-height: 520px;
            overflow: auto;
            margin-top: 18px;
        }

        .historical-chart {
            overflow: hidden;
        }

        .historical-chart img {
            display: block;
            width: calc(100% - 48px);
            height: auto;
            margin: 18px 24px 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--surface);
        }

        th, td {
            padding: 15px 24px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            white-space: nowrap;
        }

        th {
            position: sticky;
            top: 0;
            z-index: 1;
            background: #f6f5f1;
            color: var(--muted);
            font-size: 11px;
            font-weight: 750;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        td {
            color: #3d4540;
            font-size: 14px;
        }

        tbody tr { transition: background .18s ease; }
        tbody tr:hover { background: #fbfaf6; }

        .price {
            color: var(--ink);
            font-weight: 700;
            font-variant-numeric: tabular-nums;
        }

        .location-pill {
            display: inline-flex;
            padding: 5px 9px;
            border-radius: 999px;
            background: var(--gold-soft);
            color: var(--gold-dark);
            font-size: 12px;
            font-weight: 700;
        }

        tr:last-child td {
            border-bottom: none;
        }

        @media (max-width: 700px) {
            .container {
                width: min(100% - 24px, 1180px);
                padding: 30px 0 40px;
            }
            .header { align-items: flex-start; flex-direction: column; }
            .header h1 { font-size: 38px; }
            .pricing-heading { align-items: flex-start; flex-direction: column; gap: 6px; }
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .card { padding: 18px; }
            .card h2 { font-size: 22px; }
            .panel-heading { padding: 20px 18px 0; }
            .panel-heading { align-items: flex-start; flex-direction: column; }
            .chart-wrap { height: 310px; padding: 15px 12px 18px; }
            .analytics-summary { align-items: flex-start; padding: 20px 18px; }
            .analytics-body { padding: 18px; }
            .analytics-header { flex-direction: column; gap: 12px; }
            .analytics-actions { width: 100%; justify-content: space-between; }
            .analytics-grid { grid-template-columns: 1fr; }
            .analytics-modal { margin-right: 18px; margin-left: 18px; }
            .analytics-dialog { border-radius: 14px; }
            .analytics-dialog-header { align-items: flex-start; flex-direction: column; padding: 18px; }
            .analytics-dialog-header .summary-status { width: 100%; justify-content: space-between; }
            .chart-actions { align-items: flex-start; justify-content: flex-start; }
            .period-navigation { margin-right: 18px; margin-left: 18px; }
            .historical-chart img {
                width: calc(100% - 36px);
                margin: 18px;
            }
            th, td { padding: 13px 18px; }
        }

        @media (max-width: 460px) {
            .cards { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div>
            <p class="eyebrow">Precious metals monitor</p>
            <h1>Gold rates in <?= htmlspecialchars($latest["location"] ?? "Kuwait") ?></h1>
            <p>Clear, up-to-date pricing for 22 and 24 carat gold in Kuwaiti dinars.</p>
        </div>
        <?php if (!empty($rows)): ?>
            <div class="market-status"><span class="status-dot"></span>Today's rates available</div>
        <?php endif; ?>
    </div>

    <?php if (!empty($rows)): ?>
        <div class="pricing-heading">
            <h2>Today's gold pricing</h2>
            <p class="pricing-schedule"><span class="clock-icon" aria-hidden="true"></span>Rates are checked every day at 11:00 AM Kuwait time</p>
        </div>
        <div class="cards">
            <div class="card rate-card">
                <small>Today's 22 Carat Price</small>
                <h2><?= number_format($latest["rate_1"], 2) ?> <span>KWD</span></h2>
            </div>

            <div class="card rate-card">
                <small>Today's 24 Carat Price</small>
                <h2><?= number_format($latest["rate_2"], 2) ?> <span>KWD</span></h2>
            </div>

        </div>

        <div class="analytics-modal" id="analyticsModal" aria-hidden="true" inert>
            <section class="analytics-dialog" role="region" aria-labelledby="analyticsTitle">
                <div class="analytics-dialog-header">
                    <div>
                        <h2 id="analyticsTitle">Price Analysis</h2>
                        <p>Understand whether current rates look relatively low or high.</p>
                    </div>
                    <div class="summary-status">
                        <span class="outlook-badge neutral" id="outlookBadge" tabindex="0" aria-describedby="outlookExplanation" data-tooltip="Comparing today's 22 carat rate with the selected historical period.">Calculating outlook</span>
                        <button class="analytics-close" id="closeAnalytics" type="button" aria-label="Collapse price analysis">&times;</button>
                    </div>
                </div>
                <div class="analytics-body">
                <div class="analytics-header">
                    <span class="analytics-context">Analysis rate</span>
                    <div class="rate-toggle" role="group" aria-label="Choose gold carat for analytics">
                        <button class="rate-option active" type="button" data-rate="rate_1" aria-pressed="true">22K</button>
                        <button class="rate-option" type="button" data-rate="rate_2" aria-pressed="false">24K</button>
                    </div>
                </div>
                <span class="visually-hidden" id="outlookExplanation">Comparing today's 22 carat rate with the selected historical period.</span>
            <div class="analytics-grid">
                <div class="metric">
                    <span class="metric-label">Versus period average <i class="info-tip" tabindex="0" data-tooltip="Compares today's rate with the average rate in the selected period. Below average can indicate a relatively cheaper price.">i</i></span>
                    <strong class="metric-value" id="averageComparison">-</strong>
                    <span class="metric-note" id="averageRate">Average: -</span>
                </div>
                <div class="metric">
                    <span class="metric-label">Price momentum <i class="info-tip" tabindex="0" data-tooltip="Shows how much the rate changed from the first record to the latest. A negative value means the price has fallen.">i</i></span>
                    <strong class="metric-value" id="periodMomentum">-</strong>
                    <span class="metric-note">First to latest recorded rate</span>
                </div>
                <div class="metric">
                    <span class="metric-label">Price stability <i class="info-tip" tabindex="0" data-tooltip="Measures how widely prices moved around their average. Stable prices change gently; high movement means prices have been less predictable.">i</i></span>
                    <strong class="metric-value" id="priceStability">—</strong>
                    <span class="metric-note" id="volatilityValue">Variability: —</span>
                </div>
                <div class="metric">
                    <span class="metric-label">Position in range <i class="info-tip" tabindex="0" data-tooltip="Shows whether today's rate is closer to the lowest or highest observed price. Near the low may offer better relative value.">i</i></span>
                    <strong class="metric-value" id="rangePosition">—</strong>
                    <span class="metric-note range-values">Low <strong class="range-value low" id="periodLow">—</strong> High <strong class="range-value high" id="periodHigh">—</strong></span>
                </div>
                <div class="metric">
                    <span class="metric-label">Distance from low <i class="info-tip" tabindex="0" data-tooltip="Shows how much more today's rate costs compared with the cheapest rate in this period. A smaller percentage means today's price is closer to the best observed price.">i</i></span>
                    <strong class="metric-value" id="distanceFromLow">—</strong>
                    <span class="metric-note" id="lowestRateDate">Lowest rate date: —</span>
                </div>
                <div class="metric">
                    <span class="metric-label">Recent direction <i class="info-tip" tabindex="0" data-tooltip="Counts consecutive recorded increases, decreases, or unchanged rates ending with the latest entry. It helps show short-term direction but does not predict the next move.">i</i></span>
                    <strong class="metric-value" id="recentDirection">—</strong>
                    <span class="metric-note" id="latestChange">Latest change: —</span>
                </div>
            </div>
                </div>
            </section>
        </div>

        <section class="panel">
            <div class="panel-heading">
                <div>
                    <div class="section-title">
                        <h2>Price history</h2>
                        <span class="data-badge realtime">Real-time data</span>
                    </div>
                    <p id="rangeDescription">Rate movement across all recorded dates</p>
                </div>
                <div class="chart-actions">
                    <button class="analytics-trigger" id="openAnalytics" type="button" aria-expanded="false" aria-controls="analyticsModal" aria-label="Show full buy timing outlook">
                        <span><small id="chartInsightLabel">22K buy outlook</small><strong id="chartOutlookValue">Calculating...</strong></span>
                        <span class="analytics-trigger-arrow" aria-hidden="true">&rarr;</span>
                    </button>
                    <button class="indicator-button" id="movingAverageToggle" type="button" aria-pressed="false" title="Smooths short-term price changes to make the broader direction easier to see">Show 22K 7-day average</button>
                    <div class="range-filters" aria-label="Filter rates by date range">
                        <button class="range-button active" type="button" data-days="all">All</button>
                        <button class="range-button" type="button" data-days="7">Weekly</button>
                        <button class="range-button" type="button" data-days="30">Monthly</button>
                        <button class="range-button" type="button" data-days="90" data-requires-full-range="true">Quarterly</button>
                        <button class="range-button" type="button" data-days="365" data-requires-full-range="true">Yearly</button>
                    </div>
                </div>
            </div>
            <div class="chart-wrap"><canvas id="goldChart"></canvas></div>
            <div class="period-navigation" id="periodNavigation" hidden>
                <button class="period-nav-button" id="previousPeriod" type="button" aria-label="Show previous period">&larr; Previous</button>
                <span class="period-range-label" id="periodRangeLabel"></span>
                <button class="period-nav-button" id="nextPeriod" type="button" aria-label="Show next period">Next &rarr;</button>
            </div>
        </section>

        <section class="panel table-panel">
            <div class="panel-heading">
                <div>
                    <div class="section-title">
                        <h2>Historical rates</h2>
                        <span class="data-badge realtime">Real-time data</span>
                    </div>
                    <p id="entryCount"><?= count($rows) ?> recorded entries</p>
                </div>
            </div>
            <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Recorded At</th>
                    <th>22 Carat</th>
                    <th>24 Carat</th>
                    <th>Location</th>
                    <th>API Updated At</th>
                </tr>
            </thead>
            <tbody id="ratesTableBody"></tbody>
        </table></div>
        </section>

        <section class="panel historical-chart">
            <div class="panel-heading">
                <div>
                    <div class="section-title">
                        <h2>Yearly gold prices</h2>
                        <span class="data-badge historical">Historical data</span>
                    </div>
                    <p>Daily closing prices compared across each year</p>
                </div>
                <a class="code-link" href="https://github.com/AshhadS/machine-learning-projects/blob/main/gold_price_analysis.ipynb" target="_blank" rel="noopener noreferrer" aria-label="View the code for yearly gold prices on GitHub">View code <span aria-hidden="true">&rarr;</span></a>
            </div>
            <img src="yearly-price.png" alt="Gold closing prices by year in Kuwaiti dinars per gram" loading="lazy">
        </section>

        <section class="panel historical-chart">
            <div class="panel-heading">
                <div>
                    <div class="section-title">
                        <h2>Year-to-date price change</h2>
                        <span class="data-badge historical">Historical data</span>
                    </div>
                    <p>Cumulative percentage change compared across each year</p>
                </div>
                <a class="code-link" href="https://github.com/AshhadS/machine-learning-projects/blob/main/gold_price_analysis.ipynb" target="_blank" rel="noopener noreferrer" aria-label="View the code for year-to-date gold price change on GitHub">View code <span aria-hidden="true">&rarr;</span></a>
            </div>
            <img src="monthly-change.png" alt="Cumulative gold price percentage change from the start of each year" loading="lazy">
        </section>

    <?php else: ?>
        <div class="card">
            No data found. Check that <strong>gold_rates.csv</strong> exists in the same folder as this PHP file.
        </div>
    <?php endif; ?>

</div>

<script>
const goldData = <?= json_encode($rows, JSON_PRETTY_PRINT); ?>;

let filteredData = [...goldData];
let chart;

const ctx = document.getElementById('goldChart');

if (ctx) chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: goldData.map(row => row.recorded_at),
        datasets: [
            {
                label: '22 Carat',
                data: goldData.map(row => row.rate_1),
                borderColor: '#b68a35',
                backgroundColor: 'rgba(182, 138, 53, .08)',
                pointBackgroundColor: '#b68a35',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 5,
                borderWidth: 2.5,
                tension: 0,
                fill: true
            },
            {
                label: '24 Carat',
                data: goldData.map(row => row.rate_2),
                borderColor: '#2f6b4f',
                backgroundColor: 'transparent',
                pointBackgroundColor: '#2f6b4f',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 5,
                borderWidth: 2.5,
                tension: 0
            },
            {
                label: '22K 7-day Moving Average',
                data: [],
                borderColor: '#765da8',
                backgroundColor: 'transparent',
                borderDash: [7, 5],
                borderWidth: 2,
                pointRadius: 0,
                pointHoverRadius: 3,
                tension: 0.2,
                spanGaps: false,
                hidden: true
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
            legend: {
                position: 'top',
                align: 'end',
                onClick: () => {},
                labels: {
                    usePointStyle: true,
                    pointStyle: 'circle',
                    boxWidth: 7,
                    boxHeight: 7,
                    padding: 18,
                    color: '#5f6862',
                    filter: (legendItem, chartData) => legendItem.datasetIndex !== 2 || !chartData.datasets[2].hidden,
                    font: { family: 'Inter, system-ui, sans-serif', size: 12, weight: 600 }
                }
            },
            tooltip: {
                backgroundColor: '#18201c',
                padding: 12,
                cornerRadius: 10,
                position: 'nearest',
                xAlign: 'center',
                yAlign: 'bottom',
                titleFont: { weight: 600 },
                callbacks: {
                    label: function(context) {
                        return ' ' + context.dataset.label + ': ' + context.parsed.y.toFixed(2) + ' KWD';
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: false,
                border: { display: false },
                grid: { color: '#eeece6' },
                ticks: {
                    color: '#7a817c',
                    padding: 10,
                    precision: 2,
                    callback: value => Number(value).toFixed(2) + ' KWD'
                }
            },
            x: {
                border: { display: false },
                grid: { display: false },
                ticks: { color: '#7a817c', maxRotation: 0, autoSkipPadding: 24 }
            }
        }
    }
});

const tableBody = document.getElementById('ratesTableBody');
const entryCount = document.getElementById('entryCount');
const rangeDescription = document.getElementById('rangeDescription');
const rangeButtons = document.querySelectorAll('.range-button');
const outlookBadge = document.getElementById('outlookBadge');
const outlookExplanation = document.getElementById('outlookExplanation');
const averageComparison = document.getElementById('averageComparison');
const averageRate = document.getElementById('averageRate');
const periodMomentum = document.getElementById('periodMomentum');
const rangePosition = document.getElementById('rangePosition');
const periodLow = document.getElementById('periodLow');
const periodHigh = document.getElementById('periodHigh');
const distanceFromLow = document.getElementById('distanceFromLow');
const lowestRateDate = document.getElementById('lowestRateDate');
const priceStability = document.getElementById('priceStability');
const volatilityValue = document.getElementById('volatilityValue');
const recentDirection = document.getElementById('recentDirection');
const latestChange = document.getElementById('latestChange');
const rateOptions = document.querySelectorAll('.rate-option');
const analyticsModal = document.getElementById('analyticsModal');
const openAnalyticsButton = document.getElementById('openAnalytics');
const closeAnalyticsButton = document.getElementById('closeAnalytics');
const chartInsightLabel = document.getElementById('chartInsightLabel');
const chartOutlookValue = document.getElementById('chartOutlookValue');
const periodNavigation = document.getElementById('periodNavigation');
const previousPeriodButton = document.getElementById('previousPeriod');
const nextPeriodButton = document.getElementById('nextPeriod');
const periodRangeLabel = document.getElementById('periodRangeLabel');
const movingAverageToggle = document.getElementById('movingAverageToggle');
const movingAveragePeriod = 7;
let analyticsRateKey = 'rate_1';
let activeRangeDays = 'all';
let activeRangeLabel = 'All';
let periodOffset = 0;
let movingAverageVisible = false;
let analyticsExpansionTimer;

function openAnalytics() {
    if (!analyticsModal) return;
    analyticsModal.classList.add('open');
    clearTimeout(analyticsExpansionTimer);
    analyticsExpansionTimer = setTimeout(() => analyticsModal.classList.add('expanded'), 350);
    analyticsModal.inert = false;
    analyticsModal.setAttribute('aria-hidden', 'false');
    openAnalyticsButton.setAttribute('aria-expanded', 'true');
    openAnalyticsButton.setAttribute('aria-label', 'Hide full buy timing outlook');
}

function closeAnalytics() {
    if (!analyticsModal) return;
    clearTimeout(analyticsExpansionTimer);
    analyticsModal.classList.remove('expanded');
    analyticsModal.classList.remove('open');
    analyticsModal.inert = true;
    analyticsModal.setAttribute('aria-hidden', 'true');
    openAnalyticsButton.setAttribute('aria-expanded', 'false');
    openAnalyticsButton.setAttribute('aria-label', 'Show full buy timing outlook');
}

if (analyticsModal && openAnalyticsButton) {
    openAnalyticsButton.closest('.panel-heading').after(analyticsModal);
}

openAnalyticsButton?.addEventListener('click', () => {
    analyticsModal.classList.contains('open') ? closeAnalytics() : openAnalytics();
});
closeAnalyticsButton?.addEventListener('click', closeAnalytics);

document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && analyticsModal?.classList.contains('open')) {
        closeAnalytics();
    }
});

function parseRecordedDate(value) {
    const parts = value.split('-').map(Number);
    return new Date(parts[0], parts[1] - 1, parts[2]);
}

function appendCell(row, value, className = '') {
    const cell = document.createElement('td');
    cell.textContent = value;
    if (className) cell.className = className;
    row.appendChild(cell);
}

function renderTable() {
    if (!tableBody) return;

    tableBody.replaceChildren();
    const newestFirst = [...filteredData].reverse();

    newestFirst.forEach(item => {
        const row = document.createElement('tr');
        appendCell(row, item.recorded_at);

        appendCell(row, Number(item.rate_1).toFixed(2) + ' KWD', 'price');
        appendCell(row, Number(item.rate_2).toFixed(2) + ' KWD', 'price');

        const locationCell = document.createElement('td');
        const location = document.createElement('span');
        location.className = 'location-pill';
        location.textContent = item.location;
        locationCell.appendChild(location);
        row.appendChild(locationCell);

        appendCell(row, item.api_updated_at);
        tableBody.appendChild(row);
    });

    entryCount.textContent = filteredData.length + (filteredData.length === 1 ? ' recorded entry' : ' recorded entries');
}

function updateAnalytics() {
    if (!filteredData.length || !outlookBadge) return;

    const caratLabel = analyticsRateKey === 'rate_1' ? '22 carat' : '24 carat';
    const rates = filteredData.map(row => Number(row[analyticsRateKey]));
    const latestRate = rates[rates.length - 1];
    const firstRate = rates[0];
    const average = rates.reduce((total, rate) => total + rate, 0) / rates.length;
    const low = Math.min(...rates);
    const high = Math.max(...rates);
    const averageDifference = ((latestRate - average) / average) * 100;
    const momentum = rates.length > 1 ? ((latestRate - firstRate) / firstRate) * 100 : 0;
    const position = high === low ? 50 : ((latestRate - low) / (high - low)) * 100;

    const formatPercent = value => (value > 0 ? '+' : '') + value.toFixed(1) + '%';
    const averageDirection = averageDifference > 0.05 ? ' above' : averageDifference < -0.05 ? ' below' : ' at';

    averageComparison.textContent = formatPercent(averageDifference) + averageDirection;
    averageRate.textContent = 'Average: ' + average.toFixed(2) + ' KWD';
    periodMomentum.textContent = formatPercent(momentum);
    periodLow.textContent = low.toFixed(2) + ' KWD';
    periodHigh.textContent = high.toFixed(2) + ' KWD';

    const lowIndex = rates.lastIndexOf(low);
    const lowDifference = latestRate - low;
    const lowDifferencePercent = low > 0 ? (lowDifference / low) * 100 : 0;
    distanceFromLow.textContent = lowDifferencePercent.toFixed(1) + '% above low';
    lowestRateDate.textContent = lowDifference.toFixed(2) + ' KWD above the low on ' + filteredData[lowIndex].recorded_at;

    const variance = rates.reduce((total, rate) => total + Math.pow(rate - average, 2), 0) / rates.length;
    const volatility = average > 0 ? (Math.sqrt(variance) / average) * 100 : 0;
    if (volatility <= 0.75) {
        priceStability.textContent = 'Very stable';
    } else if (volatility <= 1.5) {
        priceStability.textContent = 'Stable';
    } else if (volatility <= 3) {
        priceStability.textContent = 'Moderate movement';
    } else {
        priceStability.textContent = 'High movement';
    }
    volatilityValue.textContent = 'Variability: ' + volatility.toFixed(1) + '%';

    if (rates.length < 2) {
        recentDirection.textContent = 'Not enough data';
        latestChange.textContent = 'At least two records are needed';
    } else {
        const latestDirection = Math.sign(rates[rates.length - 1] - rates[rates.length - 2]);
        let streak = 1;
        for (let index = rates.length - 2; index > 0; index--) {
            const direction = Math.sign(rates[index] - rates[index - 1]);
            if (direction !== latestDirection) break;
            streak++;
        }

        const previousRate = rates[rates.length - 2];
        const latestMove = previousRate > 0 ? ((latestRate - previousRate) / previousRate) * 100 : 0;
        const directionLabel = latestDirection > 0
            ? (streak === 1 ? 'increase' : 'increases')
            : latestDirection < 0
                ? (streak === 1 ? 'decrease' : 'decreases')
                : (streak === 1 ? 'unchanged record' : 'unchanged records');
        recentDirection.textContent = streak + ' ' + directionLabel + ' in a row';
        latestChange.textContent = 'Latest change: ' + formatPercent(latestMove);
    }

    if (position <= 35) {
        rangePosition.textContent = 'Near period low';
    } else if (position >= 65) {
        rangePosition.textContent = 'Near period high';
    } else {
        rangePosition.textContent = 'Mid-range';
    }

    const favorableSignals = [averageDifference < -0.25, momentum < -0.25, position <= 35].filter(Boolean).length;
    const cautiousSignals = [averageDifference > 0.25, momentum > 0.25, position >= 65].filter(Boolean).length;

    outlookBadge.className = 'outlook-badge';
    if (rates.length < 2) {
        outlookBadge.textContent = 'Limited history';
        outlookBadge.classList.add('neutral');
        outlookExplanation.textContent = 'More records are needed to assess price direction. Historical indicator only-not a forecast.';
    } else if (favorableSignals >= 2) {
        outlookBadge.textContent = 'Potential value zone';
        outlookBadge.classList.add('favorable');
        outlookExplanation.textContent = 'The latest ' + caratLabel + ' rate is showing multiple lower-price signals for this period. Historical indicator only-not a forecast.';
    } else if (cautiousSignals >= 2) {
        outlookBadge.textContent = 'Higher-price zone';
        outlookBadge.classList.add('cautious');
        outlookExplanation.textContent = 'The latest ' + caratLabel + ' rate is elevated within this period, so waiting may be worth considering. Historical indicator only-not a forecast.';
    } else {
        outlookBadge.textContent = 'Mixed signals';
        outlookBadge.classList.add('neutral');
        outlookExplanation.textContent = 'The selected period does not show a clear lower-price or higher-price pattern. Historical indicator only-not a forecast.';
    }

    outlookBadge.dataset.tooltip = outlookExplanation.textContent;
    chartInsightLabel.textContent = (analyticsRateKey === 'rate_1' ? '22K' : '24K') + ' buy outlook';
    chartOutlookValue.textContent = outlookBadge.textContent;
}

function getPeriodWindow(days, offset) {
    const end = parseRecordedDate(goldData[goldData.length - 1].recorded_at);
    end.setDate(end.getDate() - (offset * Number(days)));
    const start = new Date(end);
    start.setDate(start.getDate() - (Number(days) - 1));
    return { start, end };
}

function getDataForWindow(days, offset) {
    const { start, end } = getPeriodWindow(days, offset);
    return goldData.filter(row => {
        const date = parseRecordedDate(row.recorded_at);
        return date >= start && date <= end;
    });
}

function formatPeriodDate(date) {
    return date.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}

function updatePeriodNavigation() {
    const canNavigate = activeRangeDays === '7' || activeRangeDays === '30';
    periodNavigation.hidden = !canNavigate;
    if (!canNavigate) return;

    const { start, end } = getPeriodWindow(activeRangeDays, periodOffset);
    periodRangeLabel.textContent = formatPeriodDate(start) + ' – ' + formatPeriodDate(end);
    previousPeriodButton.disabled = getDataForWindow(activeRangeDays, periodOffset + 1).length === 0;
    nextPeriodButton.disabled = periodOffset === 0 || getDataForWindow(activeRangeDays, periodOffset - 1).length === 0;
}

function calculateMovingAverage(data, rateKey) {
    return data.map(row => {
        const sourceIndex = goldData.indexOf(row);
        if (sourceIndex < movingAveragePeriod - 1) return null;

        const window = goldData.slice(sourceIndex - movingAveragePeriod + 1, sourceIndex + 1);
        const total = window.reduce((sum, item) => sum + Number(item[rateKey]), 0);
        return Number((total / movingAveragePeriod).toFixed(2));
    });
}

function updateMovingAverage() {
    const carat = analyticsRateKey === 'rate_1' ? '22K' : '24K';
    const averages = calculateMovingAverage(filteredData, analyticsRateKey);
    const hasEnoughData = averages.filter(value => value !== null).length >= 2;
    const dataset = chart.data.datasets[2];

    if (!hasEnoughData) movingAverageVisible = false;

    dataset.label = carat + ' 7-day Moving Average';
    dataset.data = averages;
    dataset.hidden = !movingAverageVisible;
    movingAverageToggle.disabled = !hasEnoughData;
    movingAverageToggle.classList.toggle('active', movingAverageVisible);
    movingAverageToggle.setAttribute('aria-pressed', String(movingAverageVisible));
    movingAverageToggle.textContent = (movingAverageVisible ? 'Hide ' : 'Show ') + carat + ' 7-day average';
    movingAverageToggle.title = hasEnoughData
        ? 'Smooths short-term price changes to make the broader direction easier to see'
        : 'At least eight daily records are needed to draw this indicator';
}

function applyRange(days, label, offset = 0) {
    activeRangeDays = days;
    activeRangeLabel = label;
    periodOffset = offset;

    if (days === 'all') {
        filteredData = [...goldData];
        rangeDescription.textContent = 'Rate movement across all recorded dates';
    } else {
        const window = getPeriodWindow(days, offset);
        filteredData = getDataForWindow(days, offset);
        rangeDescription.textContent = label + ': ' + formatPeriodDate(window.start) + ' – ' + formatPeriodDate(window.end);
    }

    updatePeriodNavigation();
    chart.data.labels = filteredData.map(row => row.recorded_at);
    chart.data.datasets[0].data = filteredData.map(row => row.rate_1);
    chart.data.datasets[1].data = filteredData.map(row => row.rate_2);
    updateMovingAverage();
    chart.update();
    updateAnalytics();
    renderTable();
}

if (goldData.length) {
    const oldestDate = parseRecordedDate(goldData[0].recorded_at);
    const newestDate = parseRecordedDate(goldData[goldData.length - 1].recorded_at);
    const availableDays = Math.floor((newestDate - oldestDate) / 86400000) + 1;

    rangeButtons.forEach(button => {
        const days = button.dataset.days;
        if (days !== 'all') {
            const cutoff = new Date(newestDate);
            cutoff.setDate(cutoff.getDate() - (Number(days) - 1));
            const hasData = goldData.some(row => parseRecordedDate(row.recorded_at) >= cutoff);
            const requiresFullRange = button.dataset.requiresFullRange === 'true';
            button.disabled = !hasData || (requiresFullRange && availableDays < Number(days));
            if (button.disabled) {
                button.title = requiresFullRange
                    ? 'Available after ' + days + ' days of history have been collected'
                    : 'No data is available for this range';
            }
        }

        button.addEventListener('click', () => {
            if (button.disabled) return;
            rangeButtons.forEach(item => item.classList.remove('active'));
            button.classList.add('active');
            applyRange(days, button.textContent.trim());
        });
    });

    previousPeriodButton.addEventListener('click', () => {
        if (!previousPeriodButton.disabled) {
            applyRange(activeRangeDays, activeRangeLabel, periodOffset + 1);
        }
    });

    nextPeriodButton.addEventListener('click', () => {
        if (!nextPeriodButton.disabled && periodOffset > 0) {
            applyRange(activeRangeDays, activeRangeLabel, periodOffset - 1);
        }
    });

    movingAverageToggle.addEventListener('click', () => {
        if (movingAverageToggle.disabled) return;
        movingAverageVisible = !movingAverageVisible;
        updateMovingAverage();
        chart.update();
    });

    rateOptions.forEach(button => {
        button.addEventListener('click', () => {
            analyticsRateKey = button.dataset.rate;
            rateOptions.forEach(option => {
                const isActive = option === button;
                option.classList.toggle('active', isActive);
                option.setAttribute('aria-pressed', String(isActive));
            });
            updateAnalytics();
            updateMovingAverage();
            chart.update();
        });
    });

    updateMovingAverage();
    updateAnalytics();
    renderTable();
}
</script>

</body>
</html>
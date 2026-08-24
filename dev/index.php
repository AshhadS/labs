<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Work with Ashhad Sameer, a Kuwait-based software and AI developer with 11 years in full-stack web apps, automation, fintech, and technical leadership.">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="http://ashhadslabs.com/dev/">
    <title>Kuwait Software &amp; AI Developer | Ashhad Sameer</title>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfilePage",
      "name": "Ashhad Sameer — Kuwait Software and AI Developer",
      "description": "Portfolio of Ashhad Sameer, a Kuwait-based full-stack software and AI developer.",
      "url": "http://ashhadslabs.com/dev/",
      "mainEntity": {
        "@type": "Person",
        "@id": "http://ashhadslabs.com/#ashhad-sameer",
        "name": "Ashhad Sameer",
        "jobTitle": "Software and AI Developer",
        "url": "http://ashhadslabs.com/dev/",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Kuwait City",
          "addressCountry": "KW"
        },
        "knowsAbout": [
          "Full-stack software development",
          "Artificial intelligence",
          "Agentic AI",
          "Web application development",
          "Fintech software",
          "Technical leadership"
        ],
        "sameAs": [
          "https://github.com/AshhadS",
          "https://www.linkedin.com/in/dev-ashhad/"
        ]
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "name": "Software and AI Development in Kuwait",
      "serviceType": "Full-stack web application, AI integration, automation, and software consulting",
      "areaServed": {
        "@type": "Country",
        "name": "Kuwait"
      },
      "provider": {
        "@id": "http://ashhadslabs.com/#ashhad-sameer"
      },
      "url": "http://ashhadslabs.com/dev/#services"
    }
    </script>
    <link rel="icon" href="/assets/favicon.ico" sizes="any">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3LKTN65059"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3LKTN65059');
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
      :root {
        color-scheme: light;
        --bg: #f7f8fa;
        --ink: #20242f;
        --muted: #667085;
        --paper: #ffffff;
        --line: #dbe3ea;
        --blue: #0f1e89;
        --cyan: #0097ce;
        --mint: #34c6a8;
        --lime: #d7f75b;
        --coral: #ff7a59;
        --soft-cyan: #e9f8fc;
        --soft-mint: #ecfbf6;
        --soft-lime: #f7fbdf;
        --shadow: 0 20px 60px rgba(31, 45, 80, 0.12);
      }

      * { box-sizing: border-box; }

      html { scroll-behavior: smooth; }

      body {
        margin: 0;
        background:
          linear-gradient(135deg, rgba(0, 151, 206, 0.08), transparent 34rem),
          linear-gradient(315deg, rgba(52, 198, 168, 0.12), transparent 38rem),
          var(--bg);
        color: var(--ink);
        font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        line-height: 1.6;
      }

      a { color: inherit; text-decoration: none; }

      .shell {
        width: min(1160px, calc(100% - 32px));
        margin: 0 auto;
      }

      header {
        position: sticky;
        top: 0;
        z-index: 50;
        border-bottom: 1px solid rgba(219, 227, 234, 0.88);
        background: rgba(247, 248, 250, 0.9);
        backdrop-filter: blur(14px);
      }

      .nav {
        min-height: 72px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 900;
      }

      .brand-mark {
        display: grid;
        width: 44px;
        height: 44px;
        place-items: center;
        border: 2px solid var(--ink);
        border-radius: 8px;
        background: var(--lime);
        color: var(--blue);
        box-shadow: 5px 5px 0 var(--ink);
      }

      .nav-links {
        display: flex;
        align-items: center;
        gap: 4px;
        color: var(--muted);
        font-size: 0.94rem;
        font-weight: 750;
      }

      .nav-links a {
        border-radius: 999px;
        padding: 9px 12px;
      }

      .nav-links a:hover {
        background: #edf4f7;
        color: var(--ink);
      }

      .hero {
        min-height: calc(100vh - 72px);
        display: grid;
        grid-template-columns: minmax(0, 1.05fr) minmax(330px, 0.95fr);
        gap: 52px;
        align-items: center;
        padding: 72px 0;
      }

      .eyebrow {
        display: inline-flex;
        gap: 10px;
        align-items: center;
        margin: 0 0 18px;
        color: var(--blue);
        font-size: 0.82rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        text-transform: uppercase;
      }

      .eyebrow::before {
        content: "";
        width: 34px;
        height: 3px;
        border-radius: 999px;
        background: var(--coral);
      }

      h1, h2, h3, p { margin-top: 0; }

      h1 {
        max-width: 760px;
        margin-bottom: 22px;
        font-size: clamp(3rem, 7.8vw, 6.4rem);
        line-height: 0.9;
        letter-spacing: 0;
      }

      .hero-name {
        color: var(--blue);
      }

      .lead {
        max-width: 720px;
        color: var(--muted);
        font-size: clamp(1.05rem, 2vw, 1.25rem);
      }

      .hero-actions,
      .social-row {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
      }

      .hero-actions { margin-top: 30px; }
      .social-row { margin-top: 20px; }

      .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 46px;
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 0 18px;
        font-weight: 900;
      }

      .button.primary {
        background: var(--blue);
        color: #fff;
        box-shadow: 5px 5px 0 var(--cyan);
      }

      .button.secondary {
        background: var(--paper);
        border-color: var(--line);
        color: var(--ink);
      }

      .social-link {
        color: var(--muted);
        font-weight: 800;
        text-decoration: underline;
        text-decoration-color: rgba(0, 151, 206, 0.45);
        text-decoration-thickness: 2px;
        text-underline-offset: 4px;
      }

      .command-card {
        border: 2px solid var(--ink);
        border-radius: 8px;
        background: var(--paper);
        box-shadow: 12px 12px 0 rgba(15, 30, 137, 0.9);
        overflow: hidden;
      }

      .terminal-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 14px 16px;
        border-bottom: 2px solid var(--ink);
        background: #effcff;
        font-weight: 900;
      }

      .terminal-top:not(.dark) > span:first-child {
        color: var(--blue);
      }

      .dots {
        display: flex;
        gap: 7px;
      }

      .dot {
        width: 12px;
        height: 12px;
        border: 2px solid var(--ink);
        border-radius: 50%;
      }

      .dot.coral { background: var(--coral); }
      .dot.lime { background: var(--lime); }
      .dot.mint { background: var(--mint); }

      .terminal-body {
        padding: 22px;
      }

      .command-card.dark {
        border-color: #111;
        background: #0d1117;
        box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.3);
      }

      .terminal-top.dark {
        border-bottom: 2px solid #111;
        background: #070b10;
        color: #f8fafc;
      }

      .terminal-body.dark {
        background: #020408;
        color: #e6edf3;
      }

      .terminal-line.dark {
        display: grid;
        grid-template-columns: 88px minmax(0, 1fr);
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      }

      .terminal-line.dark:last-child { border-bottom: 0; }

      .terminal-line {
        display: grid;
        grid-template-columns: 88px minmax(0, 1fr);
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid var(--line);
      }

      .terminal-line:last-child { border-bottom: 0; }

      .prompt {
        color: #263395;
        font-weight: 900;
      }

      .prompt.green,
      .terminal-line.dark strong  {
        color: #2cd67d;
      }

      .cursor {
        display: inline-block;
        width: 10px;
        height: 20px;
        margin-left: 4px;
        background: #2cd67d;
        animation: blink 1s step-start infinite;
        vertical-align: bottom;
      }

      @keyframes blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0; }
      }

      .terminal-line strong { color: #263395; }

      .mini-board {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 20px;
      }

      .mini-card {
        min-height: 96px;
        border: 1px solid var(--line);
        border-radius: 8px;
        padding: 14px;
        background: #fbfdff;
      }

      .mini-card strong {
        display: block;
        color: var(--blue);
        font-size: 1.35rem;
        line-height: 1;
      }

      .mini-card span {
        display: block;
        margin-top: 8px;
        color: var(--muted);
        font-size: 0.88rem;
      }

      section { padding: 72px 0; }

      .section-head {
        display: grid;
        grid-template-columns: minmax(220px, 0.34fr) minmax(0, 0.66fr);
        gap: 40px;
        align-items: end;
        margin-bottom: 32px;
      }

      .section-head h2 {
        margin: 0;
        font-size: clamp(2rem, 4.8vw, 3.6rem);
        line-height: 0.98;
      }

      .section-head p {
        margin-bottom: 0;
        color: var(--muted);
        font-style: italic;
      }

      .value-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
      }

      .tile,
      .project,
      .skill-group,
      .timeline-item,
      .education-card {
        background: var(--paper);
        border: 1px solid var(--line);
        border-radius: 8px;
      }

      .tile {
        padding: 22px;
        position: relative;
        overflow: hidden;
      }

      .tile::before {
        content: "";
        display: block;
        width: 44px;
        height: 8px;
        margin-bottom: 18px;
        border-radius: 999px;
        background: var(--cyan);
      }

      .tile:nth-child(2)::before { background: var(--mint); }
      .tile:nth-child(3)::before { background: var(--coral); }
      .tile:nth-child(4)::before { background: var(--lime); }

      .tile h3 {
        margin-bottom: 10px;
        font-size: 1.08rem;
      }

      .tile p {
        margin-bottom: 0;
        color: var(--muted);
      }

      .experience {
        display: grid;
        gap: 16px;
      }

      .timeline-item {
        display: grid;
        grid-template-columns: 230px minmax(0, 1fr);
        gap: 26px;
        padding: 24px;
      }

      .timeline-kicker {
        display: inline-flex;
        width: fit-content;
        border-radius: 999px;
        background: var(--soft-cyan);
        color: var(--blue);
        padding: 6px 10px;
        font-size: 0.82rem;
        font-weight: 900;
      }

      .timeline-item h3 {
        margin: 8px 0 6px;
      }

      .timeline-item p {
        margin-bottom: 0;
        color: var(--muted);
      }

      .experience-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        margin-top: 12px;
      }

      .role-list {
        display: grid;
        gap: 8px;
        margin: 14px 0 0;
        padding: 0;
        list-style: none;
      }

      .role-list li {
        display: flex;
        gap: 10px;
        color: var(--muted);
      }

      .role-list li::before {
        content: "";
        flex: 0 0 auto;
        width: 7px;
        height: 7px;
        margin-top: 10px;
        border-radius: 50%;
        background: var(--cyan);
      }

      .filter-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 18px;
      }

      .filter-btn {
        cursor: pointer;
        border: 1px solid var(--line);
        border-radius: 999px;
        background: var(--paper);
        color: var(--muted);
        padding: 9px 13px;
        font: inherit;
        font-weight: 850;
      }

      .filter-btn.active {
        border-color: var(--blue);
        background: var(--blue);
        color: #fff;
      }

      .project-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
      }

      .project {
        display: flex;
        min-height: 245px;
        flex-direction: column;
        padding: 22px;
      }

      .project.hidden { display: none; }

      .project-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 14px;
      }

      .project-type {
        border-radius: 999px;
        background: var(--soft-mint);
        color: #08745f;
        padding: 5px 9px;
        font-size: 0.78rem;
        font-weight: 900;
      }

      .project h3 {
        margin-bottom: 10px;
        font-size: 1.16rem;
      }

      .project p {
        color: var(--muted);
      }

      .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: auto;
        padding-top: 16px;
      }

      .tag {
        border: 1px solid #cfe6ee;
        border-radius: 999px;
        background: #f5fcfe;
        color: #12657d;
        padding: 5px 9px;
        font-size: 0.8rem;
        font-weight: 800;
      }

      .project-link {
        color: var(--blue);
        font-weight: 900;
        text-decoration: underline;
        text-decoration-thickness: 2px;
        text-underline-offset: 4px;
      }

      .skills-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
      }

      .skill-group {
        padding: 22px;
      }

      .skill-group h3 {
        margin-bottom: 14px;
      }

      .chip-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
      }

      .chip {
        border-radius: 8px;
        background: var(--soft-cyan);
        color: #145366;
        padding: 8px 10px;
        font-size: 0.88rem;
        font-weight: 800;
      }

      .chip.alt { background: var(--soft-mint); color: #156b5b; }
      .chip.hot { background: var(--soft-lime); color: #596900; }

      .education-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
      }

      .education-card {
        padding: 24px;
      }

      .education-card h3 {
        margin-bottom: 10px;
      }

      .education-card p {
        color: var(--muted);
        margin-bottom: 0;
      }

      .beyond {
        display: grid;
        grid-template-columns: minmax(0, 0.62fr) minmax(280px, 0.38fr);
        gap: 16px;
      }

      .leadership-box {
        border: 2px solid var(--ink);
        border-radius: 8px;
        background: var(--paper);
        padding: 26px;
        box-shadow: 8px 8px 0 var(--lime);
      }

      .leadership-box p {
        color: var(--muted);
      }

      .interest-list {
        display: grid;
        gap: 10px;
        margin: 0;
        padding: 0;
        list-style: none;
      }

      .interest-list li {
        border: 1px solid var(--line);
        border-radius: 8px;
        background: var(--paper);
        padding: 14px 16px;
        font-weight: 850;
      }

      .contact-band {
        padding: 64px 0;
        background: #20242f;
        color: #fff;
      }

      .contact {
        display: grid;
        grid-template-columns: minmax(0, 0.7fr) minmax(280px, 0.3fr);
        gap: 42px;
        align-items: center;
      }

      .contact h2 {
        margin-bottom: 12px;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1;
      }

      .contact p {
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.75);
      }

      .contact-links {
        display: grid;
        gap: 10px;
      }

      .contact-links a {
        display: flex;
        justify-content: space-between;
        gap: 18px;
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 8px;
        padding: 14px 16px;
      }

      .contact-links strong { color: var(--lime); }

      footer {
        padding: 28px 0;
        color: var(--muted);
        font-size: 0.9rem;
      }

      @media (max-width: 980px) {
        .hero,
        .section-head,
        .contact,
        .beyond {
          grid-template-columns: 1fr;
        }

        .value-grid,
        .project-grid,
        .skills-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (max-width: 720px) {
        .shell { width: min(100% - 24px, 1160px); }

        .nav {
          align-items: flex-start;
          flex-direction: column;
          padding: 14px 0;
        }

        .nav-links {
          width: 100%;
          overflow-x: auto;
          padding-bottom: 4px;
        }

        .hero {
          min-height: auto;
          padding: 46px 0 58px;
        }

        h1 { font-size: clamp(2.7rem, 16vw, 4.2rem); }

        section { padding: 52px 0; }

        .value-grid,
        .project-grid,
        .skills-grid,
        .education-grid,
        .mini-board {
          grid-template-columns: 1fr;
        }

        .timeline-item,
        .terminal-line {
          grid-template-columns: 1fr;
          gap: 8px;
        }

        .command-card {
          box-shadow: 7px 7px 0 rgba(15, 30, 137, 0.9);
        }
      }
    </style>
  </head>
  <body>
    <header>
      <nav class="shell nav" aria-label="Primary navigation">
        <a class="brand" href="#top" aria-label="Ashhad Sameer home">
          <span class="brand-mark">DEV</span>
          <span>Ashhad Sameer</span>
        </a>
        <div class="nav-links">
          <a href="#profile">Profile</a>
          <a href="#experience">Experience</a>
          <a href="#projects">Projects</a>
          <a href="#skills">Skills</a>
          <a href="#contact">Contact</a>
        </div>
      </nav>
    </header>

    <main id="top">
      <section class="shell hero" aria-label="Hero">
        <div>
          <p class="eyebrow">Tech Lead &middot; Software &amp; AI Developer</p>
          <h1><span class="hero-name">Ashhad Sameer</span> <br /> Digitizing business processes</h1>
          <p class="lead">
            A Kuwait-based Tech Lead with 11 years of experience building full-stack solutions and leading teams across investment technology, telecommunications, and e-commerce. I build reliable web applications, AI integrations, automation, and practical digital products for organizations in Kuwait and beyond.
          </p>
          <div class="hero-actions">
            <a class="button primary" href="#projects">Explore my work</a>
            <a class="button secondary" href="mailto:ashhad56@live.com">Email me</a>
          </div>
          <div class="social-row" aria-label="Profile links">
            <a class="social-link" href="https://github.com/AshhadS" target="_blank" rel="noreferrer">GitHub</a>
            <a class="social-link" href="https://www.linkedin.com/in/dev-ashhad/" target="_blank" rel="noreferrer">LinkedIn</a>
            <a class="social-link" href="#skills">Core stack</a>
          </div>
        </div>

        <aside class="command-card" aria-label="Professional snapshot">
          <div class="terminal-top">
            <span>lead-engineer.sh</span>
            <span class="dots" aria-hidden="true">
              <span class="dot coral"></span>
              <span class="dot lime"></span>
              <span class="dot mint"></span>
            </span>
          </div>
          <div class="terminal-body">
            <div class="terminal-line">
              <span class="prompt">current</span>
              <span><strong>Software Engineer</strong> at Kuwait Investment Company</span>
            </div>
            <div class="terminal-line">
              <span class="prompt">before</span>
              <span><strong>Associate Tech Lead</strong> and Senior Software Engineer at OMOBIO</span>
            </div>
            <div class="terminal-line">
              <span class="prompt">stack</span>
              <span>PHP, Laravel, Node, React, Vue, Nuxt, Next, AWS, Docker, Python</span>
            </div>
            <div class="terminal-line">
              <span class="prompt">now</span>
              <span>I am building toward Agentic AI, RAG, MCP, Vector stores and AI workflows.</span>
            </div>
            <div class="mini-board">
              <div class="mini-card">
                <strong>11 Years</strong>
                <span>building secure software that scales</span>
              </div>
              <div class="mini-card">
                <strong>Full-Stack</strong>
                <span>Worked on all technology layers</span>
              </div>
              <div class="mini-card">
                <strong>Lead</strong>
                <span>team, product, and delivery mindset</span>
              </div>
            </div>
          </div>
        </aside>
      </section>
      
      <section id="profile">
        <div class="shell">
          <div class="section-head">
            <h2>What I Bring</h2>
            <p>
              My technical stack is broad, but the pattern is simple: I lead, build, integrate, debug, and communicate effectively.
              I have delivered PHP and Laravel backends, modern front ends, financial dashboards,
              machine learning experiments, and AI-assisted development workflows.
            </p>
          </div>
          <div class="value-grid">
            <article class="tile">
              <h3>Tech Lead Thinking</h3>
              <p>I provide team leadership, mentoring, delivery ownership, task breakdown, and engineering decisions that stay close to business goals.</p>
            </article>
            <article class="tile">
              <h3>Front-End Product Craft</h3>
              <p>I deliver React, Vue, Nuxt, Next, TypeScript, Pinia, Redux, Ionic, Tailwind, and responsive UI systems for real users.</p>
            </article>
            <article class="tile">
              <h3>Full-Stack Grounding</h3>
              <p>I build and maintain Laravel, PHP, Node, Express, PostgreSQL, MongoDB, SQLite, Firebase, Supabase, and API integrations with .NET systems.</p>
            </article>
            <article class="tile">
              <h3>AI Builder Mindset</h3>
              <p>I lead hands-on exploration LangChain, LangGraph, MCP, Ollama, Groq, ChromaDB, PGVector, and other agentic AI tools.</p>
            </article>
          </div>
        </div>
      </section>
      <section id="agentic">
        <div class="shell">
          <div class="section-head">
            <h2>Agentic AI Applications</h2>
            <p>
              I believe agentic applications are the future of software engineering, and there is so much untapped potential for businesses to expand on this. I'm studying systems that blend agent orchestration, intelligent retrieval, and adaptable stacks to drive AI adoption in enterprises.
            </p>
          </div>
          <aside class="command-card dark" aria-label="Agentic applications snapshot">
            <div class="terminal-top dark">
              <span>agentic-stack.sh</span>
              <span class="dots" aria-hidden="true">
                <span class="dot coral"></span>
                <span class="dot lime"></span>
                <span class="dot mint"></span>
              </span>
            </div>
            <div class="terminal-body dark">
              <div class="terminal-line dark">
                <span class="prompt green">$</span>
                <span><strong>pip install langchain langraph chroma llamaIndex mcp</strong><span class="cursor"></span></span>
              </div>
            </div>
          </aside>
        </div>
      </section>
      <section id="experience">
        <div class="shell">
          <div class="section-head">
            <h2>Experience</h2>
            <p>
              My career path is practical and deliberate: I started deep in web delivery, grew into lead engineering roles,
              and now combine financial product engineering with AI experimentation.
            </p>
          </div>
          <div class="experience">
            <article class="timeline-item">
              <div>
                <span class="timeline-kicker">2024 - Present</span>
                <h3>Kuwait Investment Company</h3>
                <div class="experience-tags" aria-label="Industries">
                  <span class="tag">Fintech</span>
                  <span class="tag">eKYC</span>
                </div>
              </div>
              <div>
                <h3>Software Engineer</h3>
                <p>
                  I build investment platform interfaces and internal portals using Vue, Nuxt, Ionic, and .NET API integration, with scalable, security-conscious delivery.
                </p>
                <ul class="role-list">
                  <li>Delivered the KIC Client App with Vue Ionic mobile screens.</li>
                  <li>Built KIC eKYC and Admin Portal experiences with Vue, Nuxt, and Pinia.</li>
                  <li>Developed financial reporting, dashboard, filter, chart, and client-service workflows.</li>
                </ul>
              </div>
            </article>

            <article class="timeline-item">
              <div>
                <span class="timeline-kicker">2021 - 2024</span>
                <h3>OMOBIO</h3>
                <div class="experience-tags" aria-label="Industries">
                  <span class="tag">Telecom</span>
                  <span class="tag">eKYC</span>
                </div>
              </div>
              <div>
                <h3>Associate Tech Lead / Senior Software Engineer</h3>
                <p>
                  I led a team and provided the technical expertise for Sri Lanka's leading telecom ecommerce platform, working across the stack with front-end leadership, React/Next/TypeScript delivery, and full-stack collaboration.
                </p>
                <ul class="role-list">
                  <li>Associate Tech Lead from Jan 2023 to Nov 2024.</li>
                  <li>Senior Software Engineer from Mar 2021 to Jan 2023.</li>
                </ul>
              </div>
            </article>

            <article class="timeline-item">
              <div>
                <span class="timeline-kicker">2015 - 2021</span>
                <h3>THESMALLAXE / DXDY</h3>
              </div>
              <div>
                <h3>Software Engineer / Associate Software Engineer / Intern</h3>
                <p>
                  I built the foundation with PHP, Laravel, WordPress, JavaScript, Vue, React, back-end development, full-stack systems, project ownership, and client-facing delivery.
                </p>
                <ul class="role-list">
                  <li>Software Engineer from Oct 2017 to Apr 2021.</li>
                  <li>Associate Software Engineer from Aug 2016 to Oct 2017.</li>
                  <li>Intern from Oct 2015 to Aug 2016.</li>
                </ul>
              </div>
            </article>
          </div>
        </div>
      </section>
      <section id="projects">
        <div class="shell">
          <div class="section-head">
            <h2>Project Playground</h2>
            <p>
              I have worked on a wide range of projects, and these examples are grouped by the engineering value they demonstrate. Use the filters to scan the story quickly.
            </p>
          </div>

          <div class="filter-row" aria-label="Project filters">
            <button class="filter-btn active" type="button" data-filter="all">All</button>
            <button class="filter-btn" type="button" data-filter="leadership">Leadership</button>
            <button class="filter-btn" type="button" data-filter="frontend">Front End</button>
            <button class="filter-btn" type="button" data-filter="fullstack">Full Stack</button>
            <button class="filter-btn" type="button" data-filter="ai">AI and ML</button>
          </div>

          <div class="project-grid">
            <article class="project" data-category="frontend">
              <div class="project-top">
                <span class="project-type">Investment Tech</span>
              </div>
              <h3>KIC Client App</h3>
              <p>Built a mobile app using Vue Ionic, focused on clear portfolio and client-facing workflows.</p>
              <div class="tags"><span class="tag">Vue Ionic</span><span class="tag">Mobile UI</span><span class="tag">Finance</span></div>
            </article>

            <article class="project" data-category="frontend">
              <div class="project-top">
                <span class="project-type">Admin Platform</span>
              </div>
              <h3>KIC Admin Portal</h3>
              <p>I delivered an admin and operational portal using Vue, Nuxt, and Pinia, with data-heavy interfaces and business workflows.</p>
              <div class="tags"><span class="tag">Vue</span><span class="tag">Nuxt</span><span class="tag">Pinia</span></div>
            </article>

            <article class="project" data-category="ai">
              <div class="project-top">
                <span class="project-type">Machine Learning</span>
                <a class="project-link" href="https://github.com/AshhadS/stock_agent" target="_blank" rel="noreferrer">GitHub</a>
              </div>
              <h3>Network Traffic Intrusion Detection</h3>
              <p>I built a machine learning model training project using Python, scikit-learn, pandas, Streamlit, and visualization tools.</p>
              <div class="tags"><span class="tag">Python</span><span class="tag">scikit-learn</span><span class="tag">Streamlit</span></div>
            </article>

            <article class="project" data-category="leadership frontend">
              <div class="project-top">
                <span class="project-type">Team Lead</span>
              </div>
              <h3>Hutch Sales Tracking App</h3>
              <p>Front-end team lead work using Next.js and TypeScript for a sales tracking product.</p>
              <div class="tags"><span class="tag">Next.js</span><span class="tag">TypeScript</span><span class="tag">Team Lead</span></div>
            </article>

            <article class="project" data-category="leadership fullstack">
              <div class="project-top">
                <span class="project-type">Tech Lead</span>
                <a class="project-link" href="https://dialog.lk/buy/new-connection/gsm" target="_blank" rel="noreferrer">Live</a>
              </div>
              <h3>Dialog.lk</h3>
              <p>Worked on leading a team building a ecommerce platform for Lanka's leading telecom company.</p>
              <div class="tags"><span class="tag">PHP</span><span class="tag">Full Stack</span><span class="tag">Tech Lead</span></div>
            </article>

            <article class="project" data-category="fullstack">
              <div class="project-top">
                <span class="project-type">Full Stack</span>
                <a class="project-link" href="https://github.com/AshhadS/forum_app" target="_blank" rel="noreferrer">GitHub</a>
              </div>
              <h3>Forum App</h3>
              <p>Forum application with Laravel backend and React front end, showing full-stack architecture and product flow.</p>
              <div class="tags"><span class="tag">Laravel</span><span class="tag">React</span><span class="tag">API</span></div>
            </article>

            <article class="project" data-category="fullstack">
              <div class="project-top">
                <span class="project-type">Full Stack</span>
              </div>
              <h3>Eventor Event Manager</h3>
              <p>Event management application using React and Node.js, covering front-end experience and server-side logic.</p>
              <div class="tags"><span class="tag">React</span><span class="tag">Node.js</span><span class="tag">Full Stack</span></div>
            </article>

            <article class="project" data-category="leadership fullstack">
              <div class="project-top">
                <span class="project-type">Lead Engineer</span>
                <a class="project-link" href="https://computerhistory.org/" target="_blank" rel="noreferrer">Live</a>
              </div>
              <h3>Computer History Museum</h3>
              <p>PHP team lead and backend development work for a public-facing museum web platform.</p>
              <div class="tags"><span class="tag">PHP</span><span class="tag">Backend</span><span class="tag">Team Lead</span></div>
            </article>

            <article class="project" data-category="leadership frontend">
              <div class="project-top">
                <span class="project-type">Vue Lead</span>
                <a class="project-link" href="https://www.makefoodkinder.co.uk/map" target="_blank" rel="noreferrer">Live</a>
              </div>
              <h3>Pet Deception Map App</h3>
              <p>Vue.js team lead work on an interactive map application with a focused user workflow.</p>
              <div class="tags"><span class="tag">Vue.js</span><span class="tag">Maps</span><span class="tag">Team Lead</span></div>
            </article>

            <article class="project" data-category="leadership fullstack">
              <div class="project-top">
                <span class="project-type">Backend Lead</span>
                <a class="project-link" href="http://mastercardfdn.org/" target="_blank" rel="noreferrer">Live</a>
              </div>
              <h3>Mastercard Foundation</h3>
              <p>PHP team lead and backend development work supporting a large organizational web platform.</p>
              <div class="tags"><span class="tag">PHP</span><span class="tag">Backend</span><span class="tag">Leadership</span></div>
            </article>

            <article class="project" data-category="fullstack">
              <div class="project-top">
                <span class="project-type">Full Stack</span>
                <a class="project-link" href="https://www.givegreen.com/" target="_blank" rel="noreferrer">Live</a>
              </div>
              <h3>GiveGreen</h3>
              <p>PHP and Vue.js full-stack development for a public web product with structured content and workflows.</p>
              <div class="tags"><span class="tag">PHP</span><span class="tag">Vue.js</span><span class="tag">Full Stack</span></div>
            </article>

            <article class="project" data-category="fullstack">
              <div class="project-top">
                <span class="project-type">Laravel</span>
                <a class="project-link" href="https://github.com/AshhadS/PropertyManager" target="_blank" rel="noreferrer">GitHub</a>
              </div>
              <h3>Property Management System</h3>
              <p>Laravel full-stack development for property workflows, dashboards, and operational data handling.</p>
              <div class="tags"><span class="tag">Laravel</span><span class="tag">Full Stack</span><span class="tag">Property Tech</span></div>
            </article>
          </div>
        </div>
      </section>
      <section id="skills">
        <div class="shell">
          <div class="section-head">
            <h2>Core Stack</h2>
            <p>
              I have worked across a wide range of technologies, and these are the ones I have used most in production and feel strongest with.
            </p>
          </div>
          <div class="skills-grid">
            <article class="skill-group">
              <h3>Front-End and Mobile</h3>
              <div class="chip-list">
                <span class="chip">React</span><span class="chip">Vue</span><span class="chip">Nuxt</span><span class="chip">Next.js</span>
                <span class="chip">TypeScript</span><span class="chip">Redux</span><span class="chip">Vuex</span><span class="chip">Pinia</span>
                <span class="chip">Vue Ionic</span><span class="chip">HTML5</span><span class="chip">CSS3</span><span class="chip">SCSS</span>
                <span class="chip">Bootstrap</span><span class="chip">Tailwind</span><span class="chip">D3.js</span>
              </div>
            </article>

            <article class="skill-group">
              <h3>Backend, Cloud, and DevOps</h3>
              <div class="chip-list">
                <span class="chip alt">Laravel</span><span class="chip alt">WordPress</span><span class="chip alt">PHP</span>
                <span class="chip alt">Node.js</span><span class="chip alt">Express</span><span class="chip alt">PostgreSQL</span>
                <span class="chip alt">MongoDB</span><span class="chip alt">SQLite</span><span class="chip alt">Firebase</span>
                <span class="chip alt">Supabase</span><span class="chip alt">AWS EC2</span><span class="chip alt">Lambda</span>
                <span class="chip alt">EventBridge</span><span class="chip alt">CloudWatch</span><span class="chip alt">Docker</span>
                <span class="chip alt">GitHub Actions</span><span class="chip alt">.NET APIs</span><span class="chip alt">Swagger</span>
                <span class="chip alt">MS SQL</span><span class="chip alt">Redis</span><span class="chip alt">DocuWare</span> 
              </div>
            </article>

            <article class="skill-group">
              <h3>AI, Data, and Integrations</h3>
              <div class="chip-list">
                <span class="chip hot">Python</span><span class="chip hot">pandas</span><span class="chip hot">scikit-learn</span>
                <span class="chip hot">Streamlit</span><span class="chip hot">Matplotlib</span><span class="chip hot">LangChain</span>
                <span class="chip hot">LangGraph</span><span class="chip hot">MCP</span><span class="chip hot">Codex</span>
                <span class="chip hot">Ollama</span><span class="chip hot">Groq</span><span class="chip hot">ChromaDB</span>
                <span class="chip hot">PGVector</span>
              </div>
            </article>
          </div>
        </div>
      </section>
      <section id="education">
        <div class="shell">
          <div class="section-head">
            <h2>Education</h2>
            <p>
              I believe education is a lifelong journey. I hold formal education in computer science and professional certifications that support my practical experience.
            </p>
          </div>
          <div class="education-grid">
            <article class="education-card">
              <h3>BSc Computer Science - 2026</h3>
              <p>University of London Metropolitan (Reading).</p>
            </article>
            <article class="education-card">
              <h3>British Computer Society - HEQ</h3>
              <p>Completed. Degree equivalent Level 6.</p>
            </article>
          </div>
        </div>
      </section>
      <section id="beyond">
        <div class="shell">
          <div class="section-head">
            <h2>Beyond Code</h2>
            
          </div>
          <div class="beyond">
            <article class="leadership-box">
              <h3>Hobbies</h3>
              <p>
                In my free time, I enjoy gaming, sports, and exploring new technologies. I believe that a well-rounded life outside of work contributes to creativity and problem-solving in software engineering.
              </p>
            </article>
            <ul class="interest-list" aria-label="Interests">
              <li>Gaming: Apex Legends, COD, Sekiro, Dark Souls </li>
              <li>F1, Chess </li>
              <li>Padel, Cricket, Swimming, Table tennis, Rugby</li>
            </ul>
          </div>
        </div>
      </section>
      <section id="contact" class="contact-band">
        <div class="shell contact">
          <div>
            <h2>Looking for a software or AI developer in Kuwait?</h2>
            <p>
              I'm interested in pushing boundaries and learning new technologies. If you have challenges that need a practical, delivery-focused software engineer, let’s talk.
            </p>
          </div>
          <div class="contact-links" aria-label="Contact links">
            <a href="mailto:ashhad56@live.com"><span>Email</span><strong>ashhad56</strong></a>
            <a href="https://www.linkedin.com/in/dev-ashhad/" target="_blank" rel="noreferrer"><span>LinkedIn</span><strong>/in/dev-ashhad</strong></a>
            <a href="https://github.com/AshhadS" target="_blank" rel="noreferrer"><span>GitHub</span><strong>@AshhadS</strong></a>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="shell">Copyright 2026 Ashhad Sameer. This website is hosted by me on Github for free; reach out if you want to learn how.</div>
    </footer>

    <script>
      const filterButtons = document.querySelectorAll(".filter-btn");
      const projects = document.querySelectorAll(".project");

      filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
          const filter = button.dataset.filter;
          filterButtons.forEach((item) => item.classList.remove("active"));
          button.classList.add("active");

          projects.forEach((project) => {
            const categories = project.dataset.category.split(" ");
            const visible = filter === "all" || categories.includes(filter);
            project.classList.toggle("hidden", !visible);
          });
        });
      });
    </script>
  </body>
</html>

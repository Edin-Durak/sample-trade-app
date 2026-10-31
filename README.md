# Sample Trade

A small PHP application for recording chemical sample analyses — built as a learning project.

## Why this project exists

I have completed about 50% of Jeffrey Way’s [PHP For Beginners](https://laracasts.com/series/php-for-beginners-2023-edition) course on Laracasts. Before moving further, I want to practice what I have learned so far through a real application — not another generic to-do list.

I come from a chemical engineering background, so I chose a domain I already understand: tracking water sample analyses in a laboratory context. Mixing that domain with programming keeps the work concrete and motivating.

The UI design was generated with Claude. My job is to implement it myself in **vanilla PHP**, without a framework, so the focus stays on learning fundamentals: routing, views, forms, validation, databases, authentication, and how the pieces fit together.

The code will not always be perfect. That is intentional. The goal is practice, reasoning, and connecting concepts — not shipping a polished product on day one.

## How progress is tracked

The first steps used one branch per topic (`feature/global-style-and-settings`, `docs/created-README.md-file`). Those branches stay in the repository as a record of the early work.

From here the project uses two long-lived branches:

- **`main`** — the accepted snapshot of the app
- **`develop`** — the working branch where new code is written

Progress is visible in the commit history on `develop`, not in a new branch for every change. Commits follow Conventional Commits, for example `feat(db): connect the app to MySQL` or `docs(readme): explain the two-branch workflow`. When a piece of work is ready, it is merged into `main`.

## Current focus

Early setup: project structure, global CSS from the design system, first views, and small PHP helpers. More features will follow as the course topics get practiced in context.

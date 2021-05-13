# Cometly Demo Harness

This repo is used for prototyping new features that will eventually make it into the main Cometly app.

It is a boilerplate [Laravel 8](https://laravel.com/docs/8.x/installation) + [Jetstream](https://jetstream.laravel.com/2.x/introduction.html) + [Sail](https://laravel.com/docs/8.x/sail) app.

It's using Bitbucket with CI Pipelines to lint and build the Laravel app.

# Getting Started

```bash
composer install
npm ci
./vendor/bin/sail up
./vendor/bin/sail npm run watch
open http://localhost           # Laravel app
open http://localhost:8025      # Mailhog

```

# Contributing

## Creating your branch and placeholder PR

- Branch off `master`
- Push your branch immediately (with no changes)
- Create a PR with `[Draft]` as the title prefix
- Verify CI passes

## Working with your branch

- Make changes to your local branch
- `npm run lint` should run as a pre-commit hook by Husky, but you can run it manually to check
- Push changes to your remote branch as often as you like

## Finalizing your PR

- Verify that your branch has the latest `master` commits
- Verify that your branch has no conflicts with `master`
- Verify CI passes
- Remove the `[Draft]` label

## PR Rules

We will only look at the content of your branch:

- CI is passing
- There are no merge conflicts with `master`
- Latest `master` has been merged in
- The branch is free of unnecessary file changes (whitespace modifications, etc)

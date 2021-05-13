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

# Creating a Pull Request

`npm run lint` should run as a pre-commit hook. If you create a PR, CI will attempt to install and build everything and run `npm run lint` again. PRs will not be looked at or reviewed if CI is failing.

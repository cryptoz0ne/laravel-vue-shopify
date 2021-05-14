# Laravel Vue Shopify Practice

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
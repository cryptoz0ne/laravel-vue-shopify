# Shopify Connect

The goal of this project is to submit a Pull Request on https://bitbucket.org/mattcometly/demo/src/master/. We use this repo to prototype new features.

The new feature you’ll be working on is Shopify integration. Please spend as much time as you want, but payment is limited to 5 hours. Because this is a trial project, we ask that you consider not charging us if you feel you are unable to deliver a satisfactory result. In other words, please be mindful of your own time and abilities.

## Goals

1. Allow an authenticated user to connect to his Shopify account
   1. Store the user’s Shopify oAuth credential in the database into `user_extra.shopify_token` using a new Laravel migration
   2. You will need to create a Shopfiy account with some demo producs so you can link to it. There may be a 'sample shop' feature that comes with proucts already preloaded.
2. Create a new page at `/products` that lists the user’s Shopify products for sale.
   - Load current stores via an XHR request Laravel, which in turn calls the Shopify API with the user’s oAuth credentials.
   - Bonus if you can include pictures.

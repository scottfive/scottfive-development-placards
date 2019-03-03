# scottfive-development-placards
WordPress Plugin that displays placards to help developers distinguish between development and live/production versions of sites they are working on.

## Install
Put the "scottfive-development-placards" folder into your site's plugins folder and activate as with any other plugin.

## What does it do, exactly
For the wp-admin side of the site, we attach our nagbar to the bottom of the #wpadminbar div.

For the regular, non-admin side of the side, we prepend our nagbar to body so it shows at the top of the page.

In both cases, our stylesheet adds a 2em padding to the top of the body, and a transparent png is placed in the body background with the text 'DEVELOPMENT'.



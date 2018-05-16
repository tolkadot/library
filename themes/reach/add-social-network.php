<?php
/**
 * Add an extra social site option.
 *
 * Besides adding the site, you will need to add custom CSS to your child theme's
 * style.css to display the site icon. The HTML output of the icon will look like this:
 *
 * <a class="strava" href="http://mystravalink.com"><i class="icon-strava"></i></a>
 *
 * Replace "strava" with the key of the site you're adding, and the URL with the URL
 * added in the Customizer settings.
 *
 * @param  string[] $sites The list of social sites.
 * @return string[]
 */
function ed_reach_add_social_site( $sites ) {
    $sites['strava'] = 'Strava';
    return $sites;
}

add_filter( 'reach_social_sites', 'ed_reach_add_social_site' );

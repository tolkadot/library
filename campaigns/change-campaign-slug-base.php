<?php 

/**
 * By default, campaigns are located at yoursite.com/campaigns/campaign-name. 
 * 
 * If you want to change the /campaigns/ bit to something else, you 
 * can modify the campaign post type definition using the example below.
 *
 * In this example, we change it to /projects/. The URL structure then becomes: 
 *
 * yoursite.com/projects/campaign-name
 *
 * IMPORTANT: After adding this snippet, go to Settings > Permalinks and click update. The 
 * change will not take effect until you have done this. 
 *
 * IMPORTANT, PART 2: When you change your site's URL structure, WordPress does not 
 * perform any automatic redirects for you. So if you have external links pointed to 
 * yoursite.com/campaigns/campaign-name, these will not automatically be redirected 
 * to yoursite.com/projects/campaign-name
 */
function en_change_campaign_slug_base( $post_type_args ) {
    $post_type_args[ 'rewrite' ][ 'slug' ] = 'projects';

    return $post_type_args;
}

add_filter( 'charitable_campaign_post_type', 'en_change_campaign_slug_base' );
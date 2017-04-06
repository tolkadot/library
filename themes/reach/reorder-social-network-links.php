<?php 

/**
 * This code snippet shows how to re-order the social network links that are displayed in the header.
 *
 * You can drop this code snippet directly into the child theme's functions.php file.
 *
 * @see     demo.wpcharitable.com/reach/documentation/how-to-use-the-child-theme/
 *
 * @param   array $networks
 * @return  array $networks
 */
function ed_reach_reorder_social_networks( $networks ) {

    /**
     * To re-order the networks, just re-order their spot in the list below, 
     * by cutting and pasting the entire line. For example, to move Facebook 
     * to the end, cut and paste this entire line at the end:

     'facebook'      => __( 'Facebook', 'reach' ),

     * Important note: In the header, the social networks are displayed in 
     * reverse order. In other words, Facebook is displayed last by default.
     * If you move it to the end of this array below, it will be shown first.
     */

    return array(
        'facebook'      => __( 'Facebook', 'reach' ),
        'flickr'        => __( 'Flickr', 'reach' ),
        'foursquare'    => __( 'Foursquare', 'reach' ),
        'google-plus'   => __( 'Google+', 'reach' ),
        'instagram'     => __( 'Instagram', 'reach' ),
        'linkedin'      => __( 'Linkedin', 'reach' ),
        'pinterest'     => __( 'Pinterest', 'reach' ),
        'renren'        => __( 'Renren', 'reach' ),
        'skype'         => __( 'Skype', 'reach' ),
        'tumblr'        => __( 'Tumblr', 'reach' ),
        'twitter'       => __( 'Twitter', 'reach' ),
        'vk'            => __( 'VK', 'reach' ),
        'weibo'         => __( 'Weibo', 'reach' ),
        'windows'       => __( 'Windows', 'reach' ),
        'xing'          => __( 'Xing', 'reach' ),        
        'youtube'       => __( 'YouTube', 'reach' ),
    );

}

add_filter( 'reach_social_sites', 'ed_reach_reorder_social_networks' );

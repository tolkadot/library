<?php 

/**
 * Instead of using the Post template for campaigns, use the Page template as a fallback.
 *
 * @param   string $template
 * @return  string $template
 */
function ed_campaigns_use_page_template( $template ) {    
    global $wp_query;

    if ( is_main_query() && is_singular( 'campaign' ) && ! isset ( $wp_query->query_vars[ 'widget' ] ) ) {
        $template = locate_template( array( 
            'single-campaign.php', 
            'page.php', 
            'index.php' 
        ) );
    }

    return $template;
}

add_filter( 'template_include', 'ed_campaigns_use_page_template' );
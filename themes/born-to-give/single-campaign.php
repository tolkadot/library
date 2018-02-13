<?php
/**
 * This template overrides the default campaign template that comes
 * with Born to Give. It removes the progress bar, amount raised, goal,
 * number of donors and time remaining from the template.
 *
 * Save this template to your theme or child theme folder as single-campaign.php.
 * We strongly recommend using a child theme so that you will not lose this
 * template every time you update Born to Give.
 */

get_header();
global $borntogive_options;
borntogive_sidebar_position_module();
$pageSidebarGet = get_post_meta(get_the_ID(),'borntogive_select_sidebar_from_list', true);
$pageSidebarStrictNo = get_post_meta(get_the_ID(),'borntogive_strict_no_sidebar', true);
$pageSidebarOpt = $borntogive_options['campaign_sidebar'];
if($pageSidebarGet != ''){
	$pageSidebar = $pageSidebarGet;
}elseif($pageSidebarOpt != ''){
	$pageSidebar = $pageSidebarOpt;
}else{
	$pageSidebar = '';
}
if($pageSidebarStrictNo == 1){
	$pageSidebar = '';
}
$sidebar_column = get_post_meta(get_the_ID(),'borntogive_sidebar_columns_layout',true);
$sidebar_column = ($sidebar_column=='')?4:$sidebar_column;
if(!empty($pageSidebar)&&is_active_sidebar($pageSidebar)) {
$left_col = 12-$sidebar_column;
$class = $left_col;  
}else{
$class = 12;  
}
$page_header = get_post_meta(get_the_ID(),'borntogive_pages_Choose_slider_display',true);
if($page_header==3||$page_header==4) {
	get_template_part( 'pages', 'flex' );
}
elseif($page_header==5) {
	get_template_part( 'pages', 'revolution' );
} else {
	get_template_part( 'pages', 'banner' );
}
$campaign = new Charitable_Campaign( get_the_ID() );
$donated = $campaign->get_percent_donated_raw();
$time_left = $campaign->get_time_left();
$goal = $campaign->get_monetary_goal();
$donation_achieved = charitable_format_money( $campaign->get_donated_amount() );
$currency = '';
$donors = $campaign->get_donor_count();
if(have_posts()):while(have_posts()):the_post();
$campaign_desc = get_post_meta(get_the_ID(), '_campaign_description', true);
$campaign_progress_sh = get_post_meta(get_the_ID(), 'borntogive_campaign_progress', true);
?>
<!-- Main Content -->
    <div id="main-container">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
                    	<h3><?php echo get_the_title(); ?></h3>
                    	<div class="post-media">
                        	<?php echo get_the_post_thumbnail(get_the_ID()); ?>
                        </div>
                        <div class="cause-progress-and-info">							
                        	<div class="row">
                        		<div class="col-md-12 col-sm-12">
                        			<p class="lead"><?php echo $campaign_desc; ?></p>                      			
                                	<?php $campaign->donate_button_template(); ?>
                            	</div>
                        	</div>
                     	</div>
                        <div class="post-content">
                        	<?php the_content(); ?>
                        </div>
						<?php if ($borntogive_options['switch_sharing'] == 1 && $borntogive_options['share_post_types']['4'] == '1') { ?>
                            <?php borntogive_share_buttons(); ?>
                        <?php } ?>
                        
                    </div>
                    
                    <!-- Sidebar -->
                    <?php if(is_active_sidebar($pageSidebar)) { ?>
                    <!-- Sidebar -->
                    <div class="col-md-<?php echo esc_attr($sidebar_column); ?>" id="sidebar-col">
                    	<?php dynamic_sidebar($pageSidebar); ?>
                    </div>
                    <?php } ?>
            	</div>
            </div>
        </div>
    </div>
<?php endwhile; endif;
get_footer(); ?>
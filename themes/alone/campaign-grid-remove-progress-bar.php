<?php
function bearsthemes_blogCharitable_default( $atts, $data )
{
  global $post; extract( $data );
  $template_params = $atts['template_params'];
  $col = 12 / (int) $template_params['columns'];

  $campaign = new Charitable_Campaign( $post );
  $percent_donated_raw = $campaign->get_percent_donated_raw();
  $time_left = $campaign->get_time_left();
  $donation_summary = $campaign->get_donation_summary();

  $output = "
		<div class='col-md-{$col}'>
			<div class='item'>
				<div class='image-meta' style='background: url({$thumbnail}) no-repeat center center / cover, #333;'>
					<div class='time-left-meta'>{$time_left}</div>
				</div>
				<div class='info-meta'>
					<a href='{$link}' title='{$title}' data-smooth-link><h3 class='title'>{$title}</h3></a>
					<p class='short-des'>{$content}</p>
					<div class='button-meta'>
						<div class='button-meta-inner'>
							<a
								href='#'
								class='donate-button charitable-donate-ajax-loadform'
								data-campaign-id='{$post->ID}'
								data-campaign-title='{$title}'
								data-campaign-img='{$thumbnail}'>{$template_params['donate_text']}</a>
							<a href='{$link}' class='readmore-button' data-smooth-link>{$template_params['readmore_text']}</a>
						</div>
					</div>
				</div>
				<div class='extra-meta'>
					<div class='category'><i class='ion-ios-folder-outline'></i> {$cat_list}</div>
					<div class='author'><i class='ion-ios-person-outline'></i> {$author}</div>
					<div class='comment'><i class='ion-ios-chatbubble-outline'></i> {$count_comments->total_comments}</div>
				</div>
			</div>
		</div>";

  return $output;
}
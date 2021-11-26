<div id="one_click_demo" class="honeypress-tab-pane panel-close">
    <?php 
	$honeypress_actions = $this->recommended_actions;
	$honeypress_actions_todo = get_option( 'recommended_actions', false );
	$honeypress_spicebox = $honeypress_actions[0];
	?>
	<div class="action-list">
		<?php if($honeypress_spicebox):?>
		<div class="action" id="">
			<div class="action-watch">
			<?php if(!$honeypress_spicebox['is_done']): ?>
				<?php if(!isset($honeypress_actions_todo[$honeypress_spicebox['id']]) || !$honeypress_actions_todo[$honeypress_spicebox['id']]): ?>
					<span class="dashicons dashicons-visibility"></span>
				<?php else: ?>
					<span class="dashicons dashicons-hidden"></span>
				<?php endif; ?>
			<?php else: ?>
				<span class="dashicons dashicons-yes"></span>
			<?php endif; ?>
			</div>
			<div class="action-inner">
				<h3 class="action-title"><?php echo esc_html($honeypress_spicebox['title']); ?></h3>
				<div class="action-desc"><?php echo esc_html($honeypress_spicebox['desc']); ?></div>
				<?php echo wp_kses_post($honeypress_spicebox['link']); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
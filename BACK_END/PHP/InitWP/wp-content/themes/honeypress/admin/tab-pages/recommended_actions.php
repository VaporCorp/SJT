<?php 
	$honeypress_actions = $this->recommended_actions;
	$honeypress_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="honeypress-tab-pane panel-close">
	<div class="action-list">
		<?php if($honeypress_actions): foreach ($honeypress_actions as $key => $honeypress_val): ?>
		<div class="action" id="<?php echo esc_attr($honeypress_val['id']); ?>">
			<div class="action-watch">
			<?php if(!$honeypress_val['is_done']): ?>
				<?php if(!isset($honeypress_actions_todo[$honeypress_val['id']]) || !$honeypress_actions_todo[$honeypress_val['id']]): ?>
					<span class="dashicons dashicons-visibility"></span>
				<?php else: ?>
					<span class="dashicons dashicons-hidden"></span>
				<?php endif; ?>
			<?php else: ?>
				<span class="dashicons dashicons-yes"></span>
			<?php endif; ?>
			</div>
			<div class="action-inner">
				<h3 class="action-title"><?php echo esc_html($honeypress_val['title']); ?></h3>
				<div class="action-desc"><?php echo esc_html($honeypress_val['desc']); ?></div>
				<?php echo wp_kses_post($honeypress_val['link']); ?>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>
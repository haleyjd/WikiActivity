<div id="wikiactivity-main" data-type="<?= $type ?>">
	<?php  if( isset( $emptyMessage ) ): ?>
		<h3 class="myhome-empty-message"><?php print $emptyMessage ?></h3>
	<?php	else: ?>
		<ul class="activityfeed" id="myhome-activityfeed">
		<?php foreach($data as $row): ?>
			<li class="activity-type-<?php print FeedRenderer::getIconType($row) ?> activity-ns-<?php print $row['ns'] ?>">
			<?php print FeedRenderer::getSprite($row);
					if( isset( $row['url'] ) ):
			 ?><strong><a class="title" href="<?php print htmlspecialchars($row['url']) ?>"><?php print htmlspecialchars($row['title'])  ?></a></strong>
				<?php if( !empty($row['wall-title']) ): ?>
					<span class="wall-owner">
						<?php echo $row['wall-msg']; ?>
					</span>
				<?php endif; ?>
				<br />
				<?php if( !empty($row['comments-count']) ): ?>
					<?= wfMessage( 'wiki-activity-message-wall-messages-count', $row['comments-count'] )->parse(); ?>
					<br />
				<?php endif;?>
			<?php else: ?>
				<span class="title"><?php print htmlspecialchars($row['title']) ?></span>
			<?php endif; ?>
				<?php if( empty($row['wall']) ): ?>
					<cite><span class="subtle"><?php print FeedRenderer::getActionLabel($row); ?><?php print ActivityFeedRenderer::formatTimestamp($row['timestamp']); ?></span><?php print FeedRenderer::getDiffLink($row); ?></cite>
					<table><?php print FeedRenderer::getDetails($row) ?></table>
				<?php else: ?>
					<table class="wallfeed"><?php print FeedRenderer::getDetails($row) ?></table>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
		</ul>
		<?php if( $showMore ): ?>
			<div class="activity-feed-more"><a href="#" data-since="<?= $query_continue ?>"><?= wfMessage( 'myhome-activity-more' )->escaped() ?></a></div>
		<?php endif; ?>
	<?php endif; ?>
</div>
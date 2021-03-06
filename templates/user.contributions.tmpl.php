<?php
if (count($data)) {
?>
	<ul id="myhome-user-contributions" class="activityfeed">
<?php
	foreach($data as $row) {
?>
		<li class="activity-type-<?= UserContributionsRenderer::getIconType($row) ?>">
			<?php print FeedRenderer::getSprite( $row ) ?>
			<a href="<?= htmlspecialchars($row['url']) ?>" class="title" rel="nofollow"><?= htmlspecialchars($row['title'])  ?></a>
			<cite><?= FeedRenderer::formatTimestamp($row['timestamp']); ?></cite>
			<?= FeedRenderer::getDiffLink($row) ?>

		</li>
<?php
	}
?>
	</ul>
<?php
} else {
	echo wfMessage('myhome-user-contributions-empty')->parseAsBlock();
}

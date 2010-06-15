<?php plogger_get_header(); ?>

		<div id="inner-wrapper">

			<div id="big-picture-container">
<?php if (plogger_has_pictures()) : while(plogger_has_pictures()) : plogger_load_picture(); // Equivalent to the WordPress loop
	// Find thumbnail width/height
	$thumb_info = plogger_get_thumbnail_info();
	$thumb_width = $thumb_info['width']; // The width of the image. It is integer data type.
	$thumb_height = $thumb_info['height']; // The height of the image. It is an integer data type.
?>
				<table id="caption-date-table">
					<tr>
						<td><h2 id="picture-caption" style="cursor:pointer" onclick="document.location.href='/'"><?php echo plogger_get_picture_caption(); ?></h2></td>
						<td class="align-right"><h2 class="date"><?php echo plogger_get_picture_date()?></h2></td>
					</tr>
				</table><!-- /caption-date-table -->

				<table id="prev-next-table">
					<tr>
						<td id="prev-link-container"><?php echo plogger_get_prev_picture_link(); ?></td>
						<td id="next-link-container"><?php echo plogger_get_next_picture_link(); ?></td>
					</tr>
				</table><!-- /prev-next-table -->

				<div id="picture-holder">
					<?php $desc = plogger_get_picture_description(); ?>
					<?php if (strlen($desc) > 8 && 0 == substr_compare($desc,"YouTube:",0,8)) : ?> 
	<?php $ytcode = substr(plogger_get_picture_description(), 8); ?>
	<a href="http://youtube.com/watch?v=<?php echo $ytcode; ?>" target="_blank">
	<object width="640" height="385"><param name="movie" value="http://www.youtube.com/v/<?php echo $ytcode; ?>&hl=en_GB&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?php echo $ytcode; ?>&hl=en_GB&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="640" height="385"></embed></object>
	</a>
<?php else : ?>
	<a accesskey="v" href="<?php echo plogger_get_source_picture_url(); ?>"><img class="photos-large" src="<?php echo plogger_get_picture_thumb(THUMB_LARGE); ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" title="<?php echo plogger_get_picture_caption('clean'); ?>" alt="<?php echo plogger_get_picture_caption('clean'); ?>" /></a>
	<p id="description"><?php echo plogger_get_picture_description(); ?></p>
<?php endif; ?>
				</div><!-- /picture-holder -->

			</div><!-- /big-picture-container -->

<?php echo plogger_display_comments(); ?>
<?php endwhile; ?>
<?php else : ?>
			<div id="no-pictures-msg">
				<h2><?php echo plog_tr('Not Found') ?></h2>
				<p><?php echo plog_tr('Sorry, but the image that you requested does not exist.') ?></p>
			</div><!-- /no-pictures-msg -->
<?php endif; ?>
		</div><!-- /inner-wrapper -->

<?php plogger_get_footer(); ?>

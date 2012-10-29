<div id="tl_logs" style="margin-top: 25px;">
    <?php foreach ($this->logfiles as $key => $output) : ?>
		<h2 class="sub_headline">
			<?php echo $output["headline"]; ?>
		</h2>

		<?php if($output["log"]): ?>
		<div class="tl_listing_container list_view">
			<table cellspacing="0" cellpadding="0" summary="Table lists records" class="tl_listing" style="table-layout: fixed; word-wrap: break-word;">
				<tbody>
				<?php foreach ($output["log"] as $day => $logs) : ?>
				<tr>
					 <td class="tl_folder_tlist" colspan="1">
						<?php echo $day; ?>
					</td>
				</tr>
				<?php foreach ($logs as $log) : ?>
				<tr>
					<td class="tl_file_list" style="">
						<span style="color:#b3b3b3; padding-right:3px;">[<?php echo $log['datim']; ?>]</span>
						<span class="<?php echo $log['class']; ?>" ><?php echo $log['text']; ?></span>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php else: ?>
		<p style="margin-left: 20px;"><?php echo $GLOBALS['TL_LANG']['MSC']['noFile'] ?></p>
		<?php endif; ?>
	<?php endforeach; ?>

</div>
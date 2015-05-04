<div id="tl_logs" style="margin-top: 25px;">
	<?php if($this->arrLog): ?>
	<div class="tl_listing_container list_view">
		<table cellspacing="0" cellpadding="0" summary="Table lists records" class="tl_listing" style="table-layout: fixed; word-wrap: break-word;">
			<tbody>
			<?php foreach ($this->arrLog as $day => $logs) : ?>
			<tr>
				 <td class="tl_folder_tlist" colspan="1">
					<?php echo $day; ?>
				</td>
			</tr>
			<?php foreach ($logs as $log) : ?>
			<tr>
				<td class="tl_file_list" style="">
					<span style="color: #b3b3b3; padding-right: 3px;">[<?php echo $log['datim']; ?>]</span>
					<span<?php if ($log['class']): ?> class="<?php echo $log['class']; ?>"<?php endif; ?>><?php echo $log['text']; ?></span>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php else: ?>
	<p style="margin-left: 20px;" class="tl_gerror"><?php echo $GLOBALS['TL_LANG']['MSC']['logfileMissing'] ?></p>
	<?php endif; ?>
</div>
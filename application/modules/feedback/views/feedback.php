<div class="container">
	<h1>Danh sách góp ý</h1>
	<!-- <p><?php echo lang('index_subheading');?></p> -->

	<table cellpadding=0 cellspacing=10 class="table table-condensed table-bordered">
		<thead>
			<th>#</th>
			<th>Nội dung</th>
		</thead>
		<?php foreach ($list_feedbacks as $fb):?>
			<tr>
	            <td><?php echo $fb['id']; ?></td>
	            <td><?php echo nl2br(htmlspecialchars($fb['feedback_content'],ENT_QUOTES,'UTF-8')); ?></td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
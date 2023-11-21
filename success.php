<?php 
if (count($success) > 0): ?>

	<div class="success">
		
		<?php
			foreach($success as $succ) : ?>

			<p><?php echo $succ;?></p>

			<?php endforeach ?>

	</div>
<?php endif ?>

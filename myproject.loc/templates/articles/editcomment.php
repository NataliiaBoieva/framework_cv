<?php include __DIR__ . '/../header.php'; ?>

<form action="" method="post">
	<textarea name="comment" id="comment" rows="10" cols="80"><?= $_POST['comment'] ?? $comment->getComment() ?></textarea><br><br>
	<input type="submit" value="Змінити">
</form>


<?php include __DIR__ . '/../footer.php'; ?>

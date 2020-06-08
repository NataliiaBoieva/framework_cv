<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getParsedText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <?php if (!empty($user) && $user->isAdmin()): ?>
    <p><a href="/articles/<?= $article->getId() ?>/edit">Редагувати</a></p>

<?php endif; ?>

<?php if (!empty($user)): ?>
<form action="/articles/<?= $article->getId() ?>/comment" method="post">
	<label for="comment">Залиште свої коментарі</label>
	<textarea name="comment" id="comment" rows="10" cols="80"><?= $_POST['comment'] ?? '' ?></textarea><br><br>
	<input type="submit" value="Розмістити">
</form>
<?php else: ?>
	<p>Необхідно зареєструватися для розміщення коментарів.</p>
<?php endif; ?>

<h3>Комментарі:</h3>
<?php foreach ($comments as $comment):?> 
	<p><?= $comment->getComment() ?></p>
	<?php if (!empty($user)):
            if ($user->isAdmin() || $comment->getAuthor()->getNickname() === $user->getNickname()):?>
    <p><a href="/comment/<?= $comment->getId() ?>/editcomment">Редагувати коментар</a></p>
    <?php endif;?>
    <?php endif;?>
	<hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>

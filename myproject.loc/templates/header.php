<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My blog'?></title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            My blog
        </td>
     </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?php if(!empty($user)): ?>
            Привет,  <?= $user->getNickname(); ?> | <a href="/users/logout">Logout</a>
            <?php else: ?>
            <a href="/users/login">Enter</a>
            <a href="/users/register">Register</a>
        <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>
<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
//use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Services\UsersAuthService;
use MyProject\Models\Comments\Comment;

class ArticlesController extends AbstractController

{
	public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
           throw new NotFoundException();
        }
       $comments = Comment::getCommentsByArticleId($articleId);
  	    $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'comments' => $comments
            ]);
    }

 public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if (!$this->user->isAdmin()) {
            throw new ForbiddenException();
        }

        if ($article === null) {
            throw new NotFoundException;
        }

        if ($this->user === null) {
            throw new UnauthorizedException();          
        }

        if (!empty($_POST)) {
        try {
            $article->updateFromArray($_POST);
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
            return;
        }
        header('Location: /articles/' . $article->getId(), true, 302);
        exit;
        }

    $this->view->renderHtml('articles/edit.php', ['article' => $article]);
}

    
public function add(): void

//1. Первым делом нужно убедиться, что пользователь авторизован. Если это не так – кидаем исключение в контроллере и ловим его во фронт-контроллере, добавляя в конце еще один catch.. Создаем UnauthorizedException.php. И добавляем шаблон для ошибки 401.
    {
        if ($this->user === null) {
           throw new UnauthorizedException();           
        }

        if (!$this->user->isAdmin()) {
            throw new ForbiddenException();
        }

//2. Cоздаем новую статью, и если возникают ошибки – то мы показываем их в шаблоне. Если же все проходит хорошо – то мы переадресовываем пользователя на страничку с новой статьёй.        
       
       if (!empty($_POST)) {
        try{
            $article = Article::createFromArray($_POST, $this->user);
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('/articles/add.php', ['error'=> $e->getMessage()]);
            return;
        }
        header('Location: /articles/' . $article->getId(), true, 302);
        exit();
       }
       $this->view->renderHtml('articles/add.php');      
    }   

public function delete(int $id) 
    {
         $article = Article::getById($id);

        if ($article === null) {
            echo 'Page not found';  
     } else { 
        $article->delete();
        
     }
    }

public function addComment(int $articleId): void 
{ 
    if ($this->user === null) {
           throw new UnauthorizedException();           
    }

    if (!empty($_POST)) {
        try {
        $comment = Comment::createComment($this->user, $articleId, $_POST);
    } catch (InvalidArgumentException $e) {
        $this->view->renderHtml('/articles/view.php', ['error'=> $e->getMessage()]);
        return;
    }
        header('Location: /articles/' . $articleId . '#comment' . $comment->getId(), true, 302);
        exit;
    }
    }

public function editComment(int $commentId): void
    {
    $comment = Comment::getById($commentId);
    if ($comment === null) {
     throw new NotFoundException;
      }

    if ($this->user === null) {
    throw new UnauthorizedException();          
    }

    if (!empty($_POST)) {
    try {
    $comment->updateCommentFromArray($_POST);
    }  catch (InvalidArgumentException $e) {
       $this->view->renderHtml('/articles/editcomment.php', ['error' => $e->getMessage(), 'comment' => $comment]);
    return;
    }
    header('Location: /articles/' . $_POST['articleId'] . '#comment' . $comment->getId(), true, 302);
    exit;
    }
    $this->view->renderHtml('articles/editcomment.php', ['comment' => $comment]);   
   }

}
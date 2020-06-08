<?php
namespace MyProject\Models\Comments;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Articles\Article;
use MyProject\Services\Db;

class Comment extends ActiveRecordEntity
{
  protected $authorId;
  protected $articleId;
  protected $comment;
  protected $createdAt;

  protected static function getTableName(): string
    {
        return 'comments';
    }

  public function setComment(string $comment)
    {
      $this->comment = $comment;
    }

  public function getComment(): string
    {
     return $this->comment;
    }
  
  public function setAuthor(User $author): void
    {
      $this->authorId = $author->getId();
    }

  public function getAuthor(): User
    {
      return User::getById($this->authorId);
    }

  public function getCommentId(): Comment
    {
      return Comment::getById($this->commentId);
    }
  public function setCommentId(Comment $commentId): void
    {
    $this->commentId = $commentId->getId();
    }

  public function getArticleId()
    {
      return Comment::getById($this->articleId);
    }

  public function setArticleId($articleId): void
    {
      $this->articleId = $articleId;
    }


  public function createComment(User $author, $articleId, array $fields): Comment 
  {
    if (empty($fields['comment'])) {
      throw new InvalidArgumentException('Не передано текст комментаря');      
    }

    $comment = new Comment();
    $comment->setAuthor($author);
    $comment->setArticleId($articleId);
    $comment->setComment($fields['comment']);
    
   
    $comment->save();
    return $comment;
  }

   public function updateCommentFromArray(array $fields): Comment
   {
  if (empty($fields['comment'])) {
  throw new InvalidArgumentException('Не передано текст коментаря');      
  }

    $this->setComment($fields['comment']);

    $this->save();
    return $this;
}


  public static function getCommentsByArticleId($articleId) 
  {
   $db = Db::getInstance();
   $entities = $db->query(
    'SELECT * FROM `' . static::getTableName() . '` WHERE article_id=:id;',
    [':id' => $articleId],
    static::class
    );
   return $entities;
    }
  }



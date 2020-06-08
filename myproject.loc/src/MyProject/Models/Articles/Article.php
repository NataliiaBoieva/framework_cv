<?php

namespace MyProject\Models\Articles;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
	/** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var string */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
      * @return string
     */
    public function getName(): string
    {
        return $this->name;

    }

    public function setName(string $name)
    {
      $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;

    }

    public function setText(string $text)
    {
      $this->text = $text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setAuthor(User $author): void
    {
    $this->authorId = $author->getId();
    }

    public function getArticleId(): Article
    {
        return Article::getById($this->articleId);
    }

    public function setArticleId(Article $articleId): void
    {
    $this->articleId = $articleId->getId();
    }


    //Создаем в модели статьи метод для создания новой статьи. Мы уже создали форму, которую можно будет заполнить в браузере add.php.


   public static function createFromArray(array $fields, User $author): Article 
   {
    if (empty($fields['name'])) {
      throw new InvalidArgumentException('Не передано назву статі');      
    }
    if (empty($fields['text'])) {
      throw new InvalidArgumentException('Не передано текст статі');      
    }

    $article = new Article();

    $article->setAuthor($author);
    $article->setName($fields['name']);
    $article->setText($fields['text']);

    $article->save();
    return $article;
   }

   public function updateFromArray(array $fields): Article
   {
    if (empty($fields['name'])) {
      throw new InvalidArgumentException('Не передано назву статі');      
    }
    if (empty($fields['text'])) {
      throw new InvalidArgumentException('Не передано текст статі');      
    }

    $this->setName($fields['name']);
    $this->setText($fields['text']);

    $this->save();
    return $this;
}

  public function getParsedText(): string
      {
          $parser = new \Parsedown();
          return $parser->text($this->getText());
      }

}
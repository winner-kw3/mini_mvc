<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Comment;

class ArticleRepository extends Repository
{
    
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM article");

        $articles = [];

        
        while ($row = $stmt->fetch($this->pdo::FETCH_ASSOC)) {
            $article = new Article();
            $article->setId($row['id'])
                    ->setTitle($row['title'])
                    ->setDescription($row['description']);
            
            $articles[] = $article;
        }

        return $articles;
    }

    
    public function findById(int $id): ?Article
    {
        
        $stmt = $this->pdo->prepare("SELECT * FROM article WHERE id = :id");
        $stmt->execute(['id' => $id]);

        
        $row = $stmt->fetch($this->pdo::FETCH_ASSOC);
        
        if ($row) {
            $article = new Article();
            $article->setId($row['id'])
                    ->setTitle($row['title'])
                    ->setDescription($row['description']);
            return $article;
        }

        
        return null;
    }


    public function findCommentsByArticleId(int $articleId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = ?");
        $stmt->execute([$articleId]);
        $comments = [];

        while ($row = $stmt->fetch($this->pdo::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->setId($row['id'])
                ->setComment($row['comment'])
                ->setUserId($row['user_id'])
                ->setArticleId($row['article_id']);
            $comments[] = $comment;
        }

        return $comments;
    }

        public function addComment(Comment $comment): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO comments (comment, user_id, article_id) VALUES (?, ?, ?)");
        return $stmt->execute([$comment->getComment(), $comment->getUserId(), $comment->getArticleId()]);
    }
}

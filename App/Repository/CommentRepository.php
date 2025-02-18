<?php

namespace App\Repository;

use App\Entity\Comment;
use App\Db\Mysql; 

class CommentRepository extends Repository
{
    public function findCommentsByArticleId(int $articleId): array
    {
        // Préparer la requête pour récupérer tous les commentaires pour un article spécifique
        $stmt = $this->pdo->prepare("SELECT * FROM comment WHERE article_id = ?");
        $stmt->execute([$articleId]);
        
        // Tableau pour stocker les commentaires
        $comments = [];

        // Parcourir les résultats et créer des objets Comment
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
        
        $stmt = $this->pdo->prepare("INSERT INTO comment (comment, user_id, article_id) VALUES (?, ?, ?)");
        
        
        return $stmt->execute([$comment->getComment(), $comment->getUserId(), $comment->getArticleId()]);
    }
}

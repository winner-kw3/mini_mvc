<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Entity\Comment;  
use App\Repository\CommentRepository;  

class ArticleController extends Controller
{
    private ArticleRepository $articleRepository;
    private CommentRepository $commentRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository(); 
    }

    
    public function list()
    {
        $articles = $this->articleRepository->findAll();

        $this->render('article/list', [
            'articles' => $articles
        ]);
    }

    
    public function show($id)
    {   
        
        $article = $this->articleRepository->findById($id);

        if ($article) {
            $comments = $this->commentRepository->findCommentsByArticleId($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
                $content = $_POST['comment'];
                $userId = 1; 
                
    
                
                $comment = new Comment();
                $comment->setComment($content);
                $comment->setUserId($userId);
                $comment->setArticleId($article->getId());

                
                $this->commentRepository->addComment($comment);
                
                
                header("Location: index.php?controller=article&action=show&id=" . $article->getId());
                exit();
            }

            
            $this->render('article/show', [
                'article' => $article,
                'comments' => $comments
            ]);
        } else {
            $this->render('errors/default', [
                'error' => 'L\'article demandé n\'existe pas.'
            ]);
        }
    }
}

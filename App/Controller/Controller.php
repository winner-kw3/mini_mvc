<?php

namespace App\Controller;

use App\Controller\PageController;
use App\Controller\AuthController;
use App\Controller\UserController;
use App\Controller\ArticleController;
use App\Repository\ArticleRepository;

class Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        $controller = new PageController();
                        $controller->route();
                        break;
                    case 'auth':
                        $controller = new AuthController();
                        $controller->route();
                        break;
                    case 'user':
                        $controller = new UserController();
                        $controller->route();
                        break;
                    case 'article': 
                        if (isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['id'])) {
                            
                            $articleRepository = new ArticleRepository();
                            $controller = new ArticleController($articleRepository);
                            $controller->show($_GET['id']); 
                        } else {
                            
                            $articleRepository = new ArticleRepository();
                            $controller = new ArticleController($articleRepository);
                            $controller->list(); 
                        }
                        break;
                    default:
                        throw new \Exception("Le contrôleur n'existe pas");
                        break;
                }
            } else {
                
                $controller = new PageController();
                $controller->home();
            }
        } catch (\Exception $e) {
            
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    
    protected function render(string $path, array $params = []): void
    {
        
        $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';

        try {
            if (!file_exists($filePath)) {
                
                throw new \Exception("Fichier non trouvé : " . $filePath);
            } else {
                
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}

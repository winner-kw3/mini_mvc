<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\User;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository(); 
    }

    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'register':
                        $this->register();
                        break;
                    case 'delete':
                        
                        break;
                    default:
                        throw new \Exception("Inscription Reussi : " . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    
    protected function register()
    {
        try {
            $errors = [];
            $user = new User();

            if (isset($_POST['saveUser'])) {
                
                $firstName = $_POST['first_name'] ?? '';
                $lastName = $_POST['last_name'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                $confirmPassword = $_POST['confirm_password'] ?? '';

                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'L\'adresse email est invalide.';
                }

                
            
                if (strlen($password) < 6) {
                    $errors[] = 'Le mot de passe doit contenir au moins 6 caractères.';
                }

                if ($password !== $confirmPassword) {
                    $errors[] = 'Les mots de passe ne correspondent pas.';
                }

                
                if ($this->userRepository->findOneByEmail($email)) {
                    $errors[] = 'Un utilisateur avec cet email existe déjà.';
                }

                
                if (empty($errors)) {
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setEmail($email);
                    $user->setPassword(password_hash($password, PASSWORD_BCRYPT)); // Hash du mot de passe

                    
                    $this->userRepository->persist($user);

                    
                    header("Location: index.php?controller=user&action=login");
                    exit();
                }
            }

            
            $this->render('user/add_edit', [
                'user' => $user,
                'pageTitle' => 'Inscription',
                'errors' => $errors
            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}

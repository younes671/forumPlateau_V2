<?php
namespace Controller;

use App\AbstractController;
use App\DAO;
use Model\Managers\UserManager;
use Model\Entities\User;
use App\Session;
use App\ControllerInterface;

class SecurityController extends AbstractController implements ControllerInterface{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function index() {}

    public function register ($id) {
        if(isset($_POST['submit']))
        {
            DAO::connect();

            $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $pass1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($userName && $email && $pass1 && $pass2)
            {
                $userManager = new UserManager;
                $user = $userManager->findUserByEmail($email);
               
                if($user)
                {
                   $this->redirectTo("security", "login"); exit;
                }else
                {
                    if($pass1 == $pass2)
                    {
                        
                        $hash = password_hash($pass1, PASSWORD_DEFAULT);
                        $new = ['userName' => $userName, 'motDePasse' => $hash, 'email' => $email];
                        $userManager = new UserManager;
                        $newUser = $userManager->createUser($new);
                        
                    }else
                    {
                        echo "Une erreur est survenue ! ";
                    }
                }
            }else
            {
                echo "Veuillez ressaisir vos informations";
            }
        }

        return [
            "view" => VIEW_DIR."forum/register.php",
            "meta_description" => "formulaire d'inscription",
        ];
    }
    public function login () 
    {
        if(isset($_POST['submit']))
        {
            DAO::connect();

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($email && $password)
            {
                $userManager = new UserManager;
                $user = $userManager->findUserByEmail($email);
                
                
                
                if($user)
                {
                    $hash = $user->getMotDePasse();
                    
                    if(password_verify($password, $hash))
                    {

                        $session = new Session;
                        $user = $session->setUser($user);
                        // var_dump($user); exit;
                        return [
                            "view" => VIEW_DIR."home.php",
                            "meta_description" => "page d'accueil",
                        ];

                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR."forum/login.php",
            "meta_description" => "formulaire d'inscription",
        ];
    }
    public function logout () 
    {
        unset($_SESSION["user"]);

        return [
            "view" => VIEW_DIR."forum/login.php",
            "meta_description" => "formulaire d'inscription",
        ];

    }
}
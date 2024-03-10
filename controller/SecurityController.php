<?php
namespace Controller;

use App\AbstractController;
use App\DAO;
use Model\Entities\User;
use Model\Managers\UserManager;
use App\Manager;
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
                   $this->redirectTo("forum", "listCategories");
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
    public function login () {}
    public function logout () {}
}
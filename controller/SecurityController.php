<?php
namespace Controller;

use App\AbstractController;
use App\DAO;
use Model\Managers\UserManager;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function index() {}

    public function register ($id) {
        if(isset($_POST['submit']))
        {
            DAO::connect();

            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $pass1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudo && $email && $pass1 &&$pass2)
            {
                $userManager = new UserManager;
                $user = $userManager->findUserById($id);

                if($user)
                {
                    header("location: login.php"); exit;
                }else
                {
                    if($pass1 == $pass2)
                    {
                        
                    }
                }
            }
        }
    }
    public function login () {}
    public function logout () {}
}
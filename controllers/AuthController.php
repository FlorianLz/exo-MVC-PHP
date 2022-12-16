<?php
namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use utils\SessionHelpers;
use utils\Template;

class AuthController extends WebController
{
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];

            if($email != '' && $password != '' && $nom != '' && $prenom != '') {
                $infos = array(
                    'email' => $email,
                    'password' => $password,
                    'nom' => $nom,
                    'prenom' => $prenom
                );
                $user = AuthModel::createUser($infos);
                if (count($user) > 0) {
                    SessionHelpers::login($user);
                    header('Location: /');
                } else {
                    return Template::render('auth/register', array(
                        'error' => 'Une erreur est survenue lors de la création de votre compte.'
                    ));
                }
            }else{
                return Template::render('register', array('error' => 'Tous les champs doivent être remplis'));
            }
        }
        return Template::render("views/auth/register.php");
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($email != '' && $password != '') {
                $user = AuthModel::getUserByEmail($email);
                if($user != null) {
                    if(password_verify($password, $user['password'])) {
                        SessionHelpers::login($user);
                        header('Location: /');
                    }
                }else {
                    return Template::render("views/auth/login.php", array('error' => 'Email ou mot de passe incorrect'));
                }
            }else{
               return Template::render("views/auth/login.php", array('error' => 'Tous les champs doivent être remplis'));
            }
        }
        return Template::render("views/auth/login.php");
    }

    public function logout(): void
    {
        SessionHelpers::logout();
        header('Location: /login');
    }
}
<?php

include "Model/ModelRegister.php";
include "View/ViewRegister.php";

class ControllerRegister extends ControllerBase
{
    public function __construct() {
        parent::__construct("Register");
    }
    
    public function addUser(){
        
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
            
            //Récuperation des valeurs du formulaire
            
            $info = array (
            'name'=> $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']);
            
            //test des valeurs récupérées
            
            if(isset($info['name']) && isset($info['email']) && isset($info['password'])){
                
                if($info['name']!= "" && $info['email']!= "" && $info['password']!= ""){
                    
                    $regex_email = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
                    
                    if(preg_match($regex_email,$info['email'])){
                        
                        $regex_pseudo = "(^[a-zA-Z]{1,20}[0-9]{0,3}$)";
                        
                          if (strlen($info['name'])>2 &&
                              strlen($info['name'])<=10 &&
                              preg_match($regex_pseudo , $info['name'])){
                              
                              $regex_password = "^(?=.*[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#\$%\^&\*])(?=.{3,})";
                              
                              if (preg_match($regex_password , $info['password'])  
                                ){
            
            //Récuperation des détails du compte via l'adresse email du formulaire
            // Return 'oui' => si il recup des info en db, donc l'email est deja utilisé  sinon 'non' => l'email n'est pas utilisée
            
            $exist = $this -> model -> verifEmail($info['email']);
            
            //Test sur la valeur qui récupére si l'adresse mail est deja utilisé
            if ($exist == 'oui'){
                //email deja utilisé => revoie vers une erreur
                $this -> view -> addUserError();
            }else{
                //sinon on ajout les infos en db sur la table user
            $this -> model -> addUser($info);
                
                //Le user est ajouter maintenant on recupere son id de compte via son email
            $id = $this -> model -> getIdUser($info['email']);
                
                //id= id du compte recuperer en db
                //on l'ajoute au $_SESSION['id_user] pour que l'utilisateur n'est pas besoin de se connecter une fois son colpte creer

            $_SESSION['id_user']=$id;

            } // Fin du esle
                                  
                              } // Fin test password regex
                              else{
            echo ('password invalide');
            }
                              
                          } // Fin de test pseudo regex + taille (2><20)
                        else{
            echo ('pseudo invalide');
            }
                    
                    } // Fin test regex email
                    else{
            echo ('email invalide');
            }
                        
                } // Fin du test si le valeur son vide
                else{
            echo ('les infos de $info sont vide');
            }
                
            } // Fin des isset $info
            else{
            echo ('$info n\'existe pas');
            }
            
        } //Fin condition isset $_POST
        else{
            echo ('$_POST n\'existe pas');
        }
        
    } // Fin de addUser()

} //Fin de la classe

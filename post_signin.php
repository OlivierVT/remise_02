<?php 
    //on démarre une session, qui permettra de se lier à l'index.php
    session_start();
    //function

    $errors = array(); // je crée un tableau dans lequel je vais inclure les différents erreurs rencontrées.   

    // fonction permettant de valider un email - vu en cours
    function valid_mail($mail){			
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }
    // DRY de la technique du nettoyage.
    function clean($value){
        return trim(strip_tags(htmlspecialchars($value)));
    }
    
    if($_POST){
        // Honeypot d'un champ invisible pour l'utilisateur
        if($_POST['spam_mail']!= ''){
                die('hey ! you are not an unicorn ! Fagot');
            } 

        //nettoyage des informations
            $firstname= clean($_POST['firstname']);
            $name= clean($_POST['name']);
            $birthday= clean($_POST['birthday']);
            $adress= clean($_POST['adress']);
            $mail= clean($_POST['mail']);
            $choice= clean($_POST['bleu_choice']);

          // je réutilise les informations nettoyée en bonus, je vérifié que certaines informations ont une taille minimum  
            if($firstname=='' || strlen($firstname)<2){
                $errors['firstname']="<p>Il nous manque un <strong>prénom</strong> valable par ici</p>"; //si une erreur, je l'ajoute au tableau errors précédement crée.
            }

            if($name=='' || strlen($name)<2){
                $errors['name']="<p>Et un petit <strong>nom</strong> pour accompagner ce joli prénom ?</p>";
            }
        
            if($mail=='' || !valid_mail($mail)){            
                $errors['mail']="<p>Mince, <strong>l'email</strong> que tu me propose ne me semble pas valide</p>";
            }

            if($birthday=='' || strlen($birthday)!=10){
                $errors['birthday']="<p>Oh, une <strong>date anniversaire</strong> que nous pouvons retenir ?</p>";
            }
        
            if($choice==''){
                $errors['choice']="<p>Dis moi tout, pourquoi veux-tu nous rejoindre ?</p>";
            } 
        
        //SI mon tableau dispose d'une ou plusieurs entrée c'est qu'il y a des erreurs.
        if(!empty($errors)){
            //dans le tableu session je lui crée un 'alias' errors dans lequel j'envoie mon tableau d'erreurs.
            $_SESSION['errors'] =$errors;
            // même principe pour récupérer les informations déja introduite par l'utilisateur. Je recrée un tableau, avec pour chaque entrées
            $_SESSION['inputs'] =array(
                "name" => $name,
                "firstname" => $firstname,
                "birthday" => $birthday,
                "adress" => $adress,
                "mail" => $mail,
                "bleu_choice" => $choice
            );
            header('Location:index.php'); //je redirige sur la page index.php
            
        }else{
            //on va pouvoir envoyer l'email si aucune erreur n'est présentes
            //je crée plusieurs variable pour remplir ma fonction mail plus aisément.
            $destinataire='olivier.vantriel@gmail.com';
            $sujet='inscription des bleus';
            // je concatène le résultat de mes != variable récupérée dans le formulaire.
            $messages = "Je m'appelle $firstname $name et je suis né le $birthday. J'habite à $adress et mon adresse mail est $mail. Je souhaite devenir un bleu car $choice.";
            $header_mail = "FROM:$mail";//j'identifie de qui provient le mail
            
            mail($destinataire,$sujet,$messages,$header_mail); // j'utilise la fonction mail plus facilement grâce à mes variables.
            
            $_SESSION['success']=1; //si un mail est envoyé, le tableau success est crée et reçoit une valeur dans le tableau de la session.
            header('Location: index.php');  // je redirige vers l'index.        
        }
        
//        echo "<pre>";
//        var_dump($errors);
//        echo "</pre>";          
    }
?>
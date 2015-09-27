<?php session_start();
    include('_inc/inc_mobile_detection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>inscription cercle infographie</title>
        <meta name="description" content="content">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google" content="notranslate"/>
        <link rel="icon" type="image/jpg" href="img/ci.jpg"/>
        <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">               </script>
        <![endif]-->
        
        <?php
            include ('_inc/inc_opengraph.php');
            include ('_inc/inc_webapp.php');
        ?>
        
        <link rel="stylesheet" href="css/normalize.css">        
    <?php
        if($mobile == false){
            echo("<link rel='stylesheet' href='css/style.css'>");
        }
        else{
            echo("<link rel='stylesheet' href='css/style.css'>");
            echo("<link rel='stylesheet' href='css/style_mobile.css'>");
        }
    ?>
        
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        
<!--        <link rel="stylesheet" href="css/bootstrap.css">        -->
        <link rel="author" href="https://plus.google.com/u/0/111250258332756169584/" content="Olivier Van Triel">

        <!--modernizr
            <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>-->
            
        <!-- typekit here -->        
    </head>
    <body>
    <main class="container">
        <div class="form_container">
           <?php
                if($mobile == false){
                echo ("<a href='https://github.com/OlivierVT/remise_02' class='btn_github'>voir le code sur Github</a>");
                }           
            ?>
            <h1 class="main_title">Inscription au cercle infographie</h1> 
            <p class="info_form">Afin de nous rejoindre nous te demandons une inscription sur notre site web.</p>   
       <!--Après avoir fait le traitement du formulaire, on demande à PHP si le tableau errors contient des erreurs dans le tableau de la session.-->
           <?php if(array_key_exists('errors',$_SESSION)):?>
            
                <div class="alert alert_danger">
                   <!--Si nous avons des erreurs, php nous fait un echo de ce qui doit être communiqué à l'utilisateur.-->
                    <?php echo ("<h2 class='alert_title'> Aie aie... </h2>".implode(null, $_SESSION['errors'])); ?> <!--'<br/>'-->
                    
                    <!--La methode implode, est une méthode découverte lors du visionnage d'un tutoriel. Il permet de rassembler les éléments d'un tableau en une chaine. Dans le cas ici présent oui lui demande de le faire uniquement avec les éventuelles erreurs rencontrées.-->
                    
                </div>            
            <?php endif; ?>
                
            <?php if(array_key_exists('success',$_SESSION)):?>
                <!--même réflexion qu'auparavant mais lors d'un succès.-->
                <div class="alert alert_success">
                   <img src="img/unicorn%20welcome.gif" alt="unicorn playing together">
                    <h2 class="alert_title">Salut jeune licorne, ton mail à bien été envoyé !</h2>
                </div>
            
            <?php endif; ?>            
               
       <!--Début du formulaire. En son sein, j'ai pris la liberté d'ajouter du php pour réaliser du feedback utilisateur. Etant donné que notre php nous renvoie nos erreurs dans un tableau, il suffit de lui demander si l'erreur pour le champ donné existe. Si c'est le cas, nous pouvons par exemple faire un echo d'une nouvelle classe en css. J'ai également utilisé cette technique pour garder en mémoire les informations précédemment remplie par l'utilisateur. 
    La technique d'écriture, correspond au PHP ternaire, plus "court" à écrire, son mode d'écriture revient à faire une condition if() else{}
-->
        <form action="post_signin.php" method="post" class="form">
         
         <div class="form_content">
         
          <div class="col-md-2 clearfix"> 
               <fieldset class="form-group">
                    <label for="firstname" class="input_name">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="basic_input <?php if($_SESSION['errors']['firstname']!=""){echo "input_error";}?>" required value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname'] : ''; ?>">           
                </fieldset>
            </div>
            
            <div class="col-md-2 clearfix"> 
               <fieldset class="form-group">
                    <label for="name" class="input_name">Nom</label>
                    <input type="text" name="name" id="name" class="basic_input <?php if($_SESSION['errors']['name']!=""){echo "input_error";}?>" required="required" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">           
                </fieldset>
            </div>
            
            <div class="col-md-2 clearfix"> 
               <fieldset class="form-group">
                    <label for="mail" class="input_name">Une adresse email</label>
                    <input type="mail" name="mail" id="mail" class="basic_input <?php if($_SESSION['errors']['mail']!=""){echo "input_error";}?>" required="required" value="<?= isset($_SESSION['inputs']['mail']) ? $_SESSION['inputs']['mail'] : ''; ?>">           
                </fieldset>
            </div> 
                              
             
                               
            <div class="col-md-2 clearfix"> 
               <fieldset class="form-group">
                    <label for="birthday" class="input_name">Ta date de naissance</label>
                    <input type="text" name="birthday" id="birthday" class="basic_input <?php if($_SESSION['errors']['birthday']!=""){echo "input_error";}?>" required="required" placeholder="jj/mm/aaaa" value="<?= isset($_SESSION['inputs']['birthday']) ? $_SESSION['inputs']['birthday'] : ''; ?>">           
                </fieldset>
            </div>
            
            <div class="col-l-1"> 
               <fieldset class="form-group">
                    <label for="adress" class="input_name">Ton adresse</label>
                    <input type="text" name="adress" id="adress" class="basic_input <?php if($_SESSION['errors']['adress']!=""){echo "input_error";}?>" value="<?= isset($_SESSION['inputs']['adress']) ? $_SESSION['inputs']['adress'] : ''; ?>">           
                </fieldset>
            </div>
            
            <div class="col-md-2 hidden_content"> 
               <fieldset class="form-group">
                    <label for="spam_mail">Une adresse email</label>
                    <input type="spam_mail" name="spam_mail" id="spam_mail" class="basic_input">           
                </fieldset>
            </div>
            
            <div class="col-l-1"> 
               <fieldset class="form-group">
                   <legend class="legend_field">Je souhaite devenir un bleu car... </legend>
                   
                    <p class="separator_check"><input type="radio" name="bleu_choice" id="choice_1" value="j'ai l'ambition de venir le meilleur dresseur pokémouille." class="input_check">
                    <label for="choice_1" class="label_check">j'ai l'ambition de venir le meilleur dresseur pokémouille.</label></p>
                    
                    <p class="separator_check"><input type="radio" name="bleu_choice" id="choice_2" value="les licornes roses c'est trop kawaaaiii." class="input_check">
                    <label for="choice_2" class="label_check">les licornes roses c'est trop kawaaaiii.</label></p>
                    
                    <p class="separator_check"><input type="radio" name="bleu_choice" id="choice_3" value="ma carrière de maitre brasseur doit bien commencer quelque part." class="input_check"> 
                    <label for="choice_3" class="label_check">ma carrière de maitre brasseur doit bien commencer quelque part.</label></p>
                    
                    <p class="separator_check"><input type="radio" name="bleu_choice" id="choice_4" value="j'avais besoin d'un pull... il fait froid en hiver bordel." class="input_check">          
                    <label for="choice_4" class="label_check">j'ai besoin d'un pull... il fait froid en hiver.</label></p>
                </fieldset>
            </div>
            
            </div>  <!--form_content-->
            <button type="submit" class="btn btn_form">Rejoindre le cercle</button>
                      
        </form>
    </div> <!--end form_container-->
        
        <!--En visionnant le tutoriel, la piste du débug a été évoquée. J'ai donc utilisé cette technique pour bien visualiser la manière dont les informations étaient communiquée dans les différents tableaux.-->
<!--
        <h2>debug</h2>
        <pre>
        <?php
            //var_dump($_SESSION);
        ?>
        </pre>
-->
                
    </main>
   
   
   
    </body>

    <!--<script src="js/jquery.js"></script>-->
    <!--<script src="js/main.js"></script>-->
</html>
<!--Vu que l'on affiche les erreurs à l'utilisateur. Une fois qu'elles sont communiquées, il faut qu'elle disparaissent en cas d'un refresh de la page. La méthode Unset permet de vider le tableau de la session.-->
<?php 
    unset($_SESSION['inputs']);
    unset($_SESSION['success']);
    unset($_SESSION['errors']);
?>


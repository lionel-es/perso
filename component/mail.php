<?php
include '../component/head.php';
    /******* mail *********/
    /*******verif form ********/
    define('REGEX', '/[a-zA-Z]/');
define('MY_MAIL', 'info@lionelesgays.com');

    function verifPost(){
        $values = array("nom" => '',
                        "prenom" => '',
                        "mail" => '',
                        "projet" => '');
        foreach ($_POST as $key => $value) {
            if($key == 'nom' || $key == 'prenom') {
                //verif de nom /prenom
                if (
                    !empty($value) &&
                    preg_match(REGEX, $value) &&
                    strlen($value) <= 25 ){
                    $values[$key] = htmlspecialchars($value);
                }
                else return 'nom prenom pas ok';
            }
            elseif($key == 'mail'){
                if(filter_var($value, FILTER_VALIDATE_EMAIL) &&
                   !empty($value) &&
                   htmlspecialchars($value)){
                    $values[$key] = htmlspecialchars($value);
                } else return "email non valide";
            }
            elseif($key == 'projet'){
                if(!empty($value) &&
                   strlen($value)<= 500){
                    $values[$key] = htmlspecialchars($value);
               }else return 'projet pas ok';
            }
        }
        return $values;
    }

    function envoiMail(array $values){
        $headers = array( 'From' => $values['mail'],
                        'Reply-To' => $values['mail'],
                        'X-Mailer' => 'PHP/'. phpversion() );

        return mail(
            MY_MAIL,
            'Message Site',
            wordwrap($values['projet'], 70, "\r\n"). "\r\n" .
            "de : " .$values['prenom']. " " . $values['nom']. "\r\n",
            $headers
        );
    }
            if (isset($_POST['envoyer']) && $_POST['envoyer'] === 'envoyer') {

                    if(envoiMail(verifPost())){
                        echo '<p class="pMail">Votre message à bien été envoyé. <p> ';
                        echo '<button class="button" type="button"><a href="../page/home.php">Retour</a></button>';
                    }
                    else echo '<p class="pMail">Le mail n\'a pas été envoyé. <p>';

                }


?>
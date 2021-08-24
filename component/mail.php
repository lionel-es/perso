<?php

    /******* mail *********/
    /*******verif form ********/
    define('REGEX', '/[a-zA-Z]/');
    define('MY_MAIL', 'info@lionelesgays.com');
    function verifPost(){
        $values = array(
            "nom" => "",
            "prenom" => "",
            "projet" => "",
            "mail" => ""
        );
        $messageErreur = "Entrée non valide";
        $emailErreur = "Email non valide";
       foreach ($_POST as $key => $value) {
            if ($key === 'nom' || $key === 'prenom') {
                //verif de nom /prenom
                if (!empty($value)
                        && preg_match(REGEX, $value)
                        && strlen($value)<= 25)
                        {
                            $values[$key] = htmlspecialchars($value);
                } else {
                    return $messageErreur;
                }
                }elseif($key === 'projet'){
                       //verif message
                        if(!empty($value)
                        && strlen($value)<= 500)
                            {
                                $values[$key] = htmlspecialchars($value);
                       }else{
                           return $messageErreur;
                       }
                }elseif($key === 'mail') {
                       //verif mail
                        if(!empty($value)
                        && filter_var($value, FILTER_VALIDATE_EMAIL)
                        &&htmlspecialchars($value))
                            {
                                $values[$key] = htmlspecialchars($value);
                        }else{
                            return $emailErreur;
                        }
            }
            else return false;
        }
        return $values;
    }

    function envoiMail(array $values){
        $headers = array(
            'Client' => $values['prenom'].' '.$values['nom'],
            'From' => $values['mail'],
            'Reply-To' => $values['mail'],
            'X-Mailer' => 'PHP/'. phpversion()
        );

        return mail(
            MY_MAIL,
            'Message Site',
            $values['projet'],
            $headers
        );
    }

            if (isset($_POST['envoyer']) && $_POST['envoyer'] === 'envoyer') {

                    if(envoiMail(verifPost())){
                        echo "mail ok ";
                    }
                    else echo 'Le mail n\'a pas été envoyé';

                }


?>
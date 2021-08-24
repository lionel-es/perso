<?php


define('MY_MAIL', 'info@lionelesgays.com');

function verifPost(){
    $values = array();
        foreach($values as $key => $value){
            switch($key){
                case 'prenom':
                    if(strlen($value)<= 25 &&
                    preg_match('/[A-Za-z]/',$value));
                    break;

                case 'nom':
                    if(strlen($value)<= 25 &&
                    preg_match('/[A-Za-z]/',$value));

                    break;

                case 'projet':
                   if(strlen($value)<= 500  &&
                    preg_match('/[A-Za-z]/',$value));
                    break;

                case 'mail':
                    if(filter_var($value, FILTER_VALIDATE_EMAIL));
                    break;
                default:
                    return false;
            }

            array_push($values, htmlspecialchars($value));
        }
        return $values;
}

print_r(verifPost());









/*  function EnvoiMail(array $values)
            {
                $headers = array(
                    'Client' => $values['prenom'].' '.$values['nom'],
                    'From' => $values['mail'],
                    'Reply-To' => $values['mail'],
                    'X-Mailer' => 'PHP/' . phpversion()
                );

                return mail(
                    MY_MAIL,
                    "contact site",
                    $values['projet'],
                    $headers
                );
          }


            if (isset($_POST['envoyer'])) {
              /*  envoiMail(verifPost());

                    if(envoiMail(verifPost())){
                        echo "mail ok ";
                    }
                    else echo 'pas envoyer';*/
                 /*   echo "post ok";
                    var_dump(verifPost());

            }else echo ' pas ok';*/
?>
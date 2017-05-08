<?php
require_once "../model/CustomSession.php";
require_once "../model/User.php";

/**
 * Controller für die Registrierung
 */
class Register {
    private static $passwordRegularExpression = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&_-])[A-Za-z\d$@!%*?&_-]{8,}/';
    private $session;

    public function __construct(){
        $this->session = CustomSession::getInstance();
    }

    /**
     * Register the specified User with the provided data. Will check that the Input is valid before sending it to the database.
     * @param string $username
     * @param string $password
     * @param string $repeatPassword
     * @param string $forename
     * @param string $name
     * @param string $mail
     */
    public function registerPerson(string $username, string $password, string $repeatPassword, string $forename, string $name, string $mail){
        $validationResults = $this->inputValid($username, $password, $repeatPassword, $forename, $name, $mail);

        /* Some Error Occured */
        if (count(array_unique($validationResults)) !== 1) {
            $this->registerError();
            return;
        }

        $db_link = $this->session->db_link->getDb_link();

        /* create a prepared statement */
        $stmt = $db_link->prepare("INSERT INTO login (username, password, email, name, forename) VALUES ( ?, ?, ?, ?, ?) ");

        /* bind parameters */
        $stmt->bind_param('sssss', $username, $password, $mail, $name, $forename);

        /* execute query */
        $stmt->execute();
        /* get inserted id */
        $id = mysqli_insert_id($db_link);
        if (!empty($id) && !is_null($id) && $id > 0) {
            /* create new user and save in session */
            $user = new User($id, $username, $password, $mail, $name, $forename);
            $this->saveUser($user);

            /* close connection */
            $db_link->close();
            return;
        }
        $this->registerError();
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $repeatPassword
     * @param string $forename
     * @param string $name
     * @param string $mail
     * @return array
     */
    public static function inputValid(string $username, string $password, string $repeatPassword, string $forename, string $name, string $mail){
        $usernameValid = strlen($username) < 40 && strlen($username) > 1;
//        $passwordValid = $password == $repeatPassword && preg_match(Register::$passwordRegularExpression, $password);
        $passwordValid = $password == $repeatPassword;
        $forenameValid = strlen($forename) < 40 && strlen($forename) > 1;
        $nameValid = strlen($name) < 40 && strlen($name) > 1;
        $mailValid = filter_var($mail, FILTER_VALIDATE_EMAIL);
        return array($usernameValid, $passwordValid, $forenameValid, $nameValid, $mailValid != "");
    }

    private function registerError(){
        http_response_code(500);
    }

    /**
     * Saves the user to the Session and exits the script
     * @param $user
     * The user to save
     */
    private function saveUser($user){
        $this->session->setCurrentUser($user);
    }
}
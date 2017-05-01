<?php
require_once "../model/User.php";
require_once "../model/CustomSession.php";

/**
 * Controller für die Anmeldung
 */
class Login {

    private $session;

    public function __construct() {
        $this->session = CustomSession::getInstance();
    }

    /**
     * Melde den spezifizierte User mit dem angegebenen Benutername / Passwort an
     * @param string $username
     * @param string $password
     */
    public function loginPerson(string $username, string $password) {

        $db_link = $this->session->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("SELECT * FROM login WHERE username = ? AND password =? ");

        /* bind parameters */
        $stmt->bind_param('ss', $username, $password);

        /* execute query */
        $stmt->execute();
        /* bind result variables */
        $stmt->bind_result($id, $username, $password, $email, $name, $forename);

        /* fetch value */
        while ($stmt->fetch()) {

            if (!empty($id) || !is_null($id)) {
                $user = new User($id, $username, $password, $email, $name, $forename);
                $this->saveUser($user);

                /* close connection */
                $db_link->close();
                return;
            }
        }
        /* Password wrong */
        $this->loginError();
    }

    /**
     * Saves the user to the Session and exits the script
     * @param $user
     * The user to save
     */
    private function saveUser($user) {
        $this->session->setCurrentUser($user);
    }

    private function loginError() {
        http_response_code(500);
    }
}
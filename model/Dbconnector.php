<?php 

	class Dbconnector{

	    protected static $_instance = null;
        private $db_link = null;

        /**
         * Dbconnector constructor.
         */
        private function __construct()
        {
            $this->db_link = mysqli_connect('localhost', 'root', '', 'audiocity');
            mysqli_set_charset($this->db_link, 'utf8');
        }

        /**
         * @return Dbconnector|null
         */
        public static function getInstance(){
            if (null === self::$_instance)
            {
                self::$_instance = new self;
            }
            return self::$_instance;
        }

        protected function __clone() {}

        /**
         * @return mysqli|null
         */
        public function getDb_link() {
            return $this->db_link;
        }
    }

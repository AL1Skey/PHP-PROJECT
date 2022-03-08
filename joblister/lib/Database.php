<?php
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;//A Handler that store PDO instance
        private $error;//Error Catcher
        private $stmt;//A Statement

        public function __construct(){
            // Set DSN 
            //A data source name (DSN) is a data structure that contains the information about a specific database that an Open Database Connectivity ( ODBC ) driver needs in order to connect to it.
            $dsn = "mysql:host=". $this->host .";dbname=". $this->dbname;

            //Set Option
            $options = array(
                PDO::ATTR_PERSISTENT => true //for persistence connection
                ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
            );

            //PDO INSTANCE
            try{
                //INITIALIZE PDO TO DATABASE HANDLER
                $this->dbh = new PDO($dsn,
                                    $this->user,
                                    $this->pass,
                                    $options /*options
                                    A key=>value array of driver-specific connection options.
                                    ASSUMPTION:
                                    OPTION NEED FOR ADDING REQUIREMENT
                                    OPTION HAS THIS REQUIREMENT:
                                    1.)PERSISTENCE CONNECTION
                                    2.)THROW ERROR IF ERROR(DEFAULT IS IGNORE)
                                    IF REQUIREMENT NOT MEET
                                    THROW ERROR
                                    -->END OF ASSUMPTION
                                    */
                                    );
            } catch(PDOException $e){
                $this->error = $e->getMessage();//GET ERROR MESSAGE FROM PDO
            }
        }

        //PREPARE MYSQL CODE TO EXECUTE LATER
        public function query($query){
            $this->stmt = $this->dbh->prepare($query);
        }
        //BIND VALUE TO PARAMETER
        public function bind($param,$value,$type=null){
            if(is_null($type)){
                
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param,$value,$type);
        }

        //EXECUTE THE MYSQL CODE IN QUERY FUNCTION
        public function execute(){
            return $this->stmt->execute();
        }


        //OUTPUT OBJECT FROM SQL QUERIES
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

    };
?>
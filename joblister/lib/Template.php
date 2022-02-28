<?php
/*THIS CLASS FUNCTION IS TO MAKE VARIABLE THAT WILL PASS ON WORKING FILE
    HOW IT WORKS(HYPOTHESIS):
    -)TEMPLATE WILL INSERT LOCATION BASED OF PARAMETER
    -)WHEN INITIALIZE VARIABLE TO TEMPLATE (EX: template->var = something):
        -)SET FUNCTION WILL BE EXECUTED WHEN VAR IS NEEDED:
            -)WITH THE EXAMPLE, CORELATION WITH SET FUNCTION -> ' $KEY VALUE ARE "VAR" WHEN $VALUE ARE      "SOMETHING" '
        -)TO_STRING WILL BE EXECUTED:
            -)START BUFFERING
            -)EXTRACT VARS AND MAKE VARIABLE AND VALUE BASE OF INDEX AND VALUE IN ARRAYS
            -)CHANGE DIR TO LOCATION OF PARENT WORKING FILE EX: "./INDEX.PHP" TO "./"
            -)INCLUDE THE WORKING FILE
            -)RETURN 'include basename($this->template);' VALUE, THEN FLUSH THE BUFFER:
                HYPOTHESIS
                -)FROM THESE, GET FUNCTION WILL BE EXECUTED
                -)GET FUNCTION RETURN VALUE OF VARIABLE WITH INDEX OF KEYS
                -)FLUSH THE BUFFER
    */

    class Template{
        //PATH TO TEMPLATE
        protected $template;
        //Vars passed in
        protected $vars = array();

        //CREATE CONSTRUCTOR
        public function __construct($template){
            /*THIS WILL INSERT LOCATION OF WORKING FILE TO TEMPLATES*/
            $this->template = $template;
        }
        //OVERRIDE GET FUNCTION to get value of key
        public function __get($key){
            return $this->vars[$key];
        }
        //OVERRIDE SET FUNCTION TO SET VALUE ON INDEX OF KEY
        public function __set($key,$value){
            $this->vars[$key] = $value;
        }
        //EXTRACT ARRAYS OF VARS AND USE THAT AS STRING
        public function __toString(){
            extract($this->vars); //EXTRACT VARS AND MAKE VARIABLE AND VALUE BASE OF INDEX AND VALUE IN ARRAYS
            chdir(dirname($this->template));//CHANGE DIRECTORY TO PARENT DIR OF TEMPLATE

            ob_start();//START BUFFERING

            include basename($this->template);

            return ob_get_clean();// RETURN 'include basename($this->template);' VALUE, THEN FLUSH THE BUFFER
        }

    };
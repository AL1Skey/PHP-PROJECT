<?php
    class Job{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getAllJobs(){
            $this->db->query(
                'SELECT jobs.*, categories.name AS cname
                 FROM jobs
                 INNER JOIN categories
                 ON jobs.category_id = categories.id
                 ORDER BY post_date DESC'
                 );/*THIS COMMAND WILL SELECT ALL DATA IN JOBS TABLE AND COMBINE CATEGORY WITH CATEGORY_ID IN JOBS TABLE EQUAL TO ID IN CATEGORY TABLE AND GET CATEGORY NAME, CHANGE NAME OF COLUMN AS CNAME AND ORDER THE LIST BY POST_DATE DESCENDING*/ 


            $result = $this->db->resultSet();

            return $result;
        }
        public function getJob($job){
            $this->db->query(
                'SELECT * FROM jobs WHERE jobs.id = :job_id'
                 );
            $this->db->bind(':job_id',$job);


            $jobRow = $this->db->single();

            return $jobRow;
        }

        
        public function getStructure(){
            $this->db->query("SELECT * FROM jobs");

            $structure = array_keys($this->db->resultSet());

            return $structure;
        }
        public function createJob(
            $id=null,$company=null,$job_title=null,$desc=null,$salary=null,$location=null,$user=null,$email=null
            )
            {
            $structure = $this->getStructure();

            $this->db->query(
                "INSERT INTO jobs($structure) VALUE(NULL,$id,$company,$job_title,$desc,$salary,$location,$user,$email)"
            );
            
            }
        public function getCategories(){
            $this->db->query(
                'SELECT * FROM categories'
                 );
            $result = $this->db->resultSet();

            return $result;
        }

        public function getByCategory($category){
            $this->db->query(
                "SELECT jobs.*, categories.name AS cname
                 FROM jobs
                 INNER JOIN categories
                 ON jobs.category_id = categories.id
                 WHERE jobs.category_id = ?
                 ORDER BY post_date DESC"
                 );
                 /*
                JOBS CALLED FROM JOBS SQL DATABASE
                CATEGORY CALLED AND CHANGE NAME AS CNAME
                JOBS AND CATEGORY CALLED AND ALIGN ACCORDING TO jobs.category_id = categories.id
                JOBS AND CATEGORY CALLED WHERE CATEGORY_ID IN JOB EQUAL TO PARAMETER IN THIS FUNCTION
                ORDER BY POST_DATE DESC
                */

            $this->db->bind(1,$category);/*BIND $CATEGORY TO FIRST QUESTION SIGN*/


            $result = $this->db->resultSet();

            return $result;
        }

        public function getCategory($category){
            $this->db->query("SELECT * FROM categories WHERE id = :category_id");

            $this->db->bind(':category_id',$category);

            $row = $this->db->single();

            return $row;

            /*WHAT THIS CODE DO? HOW IT'S WORK?
            1.ITS GET ROW OF CATEGORY LIKE NAME, ID ETC
            2.ITS WORK LIKE THIS:
                -)GET CATEGORY ACCORDING TO $category. (:category_id are placeholder, will be bind in next steps)
                -)BIND PLACEHOLDER WITH $category
                -)FETCH OBJECT WITH SINGLE CATEGORY. THE OBJECT IS ROW OF DATA IN SQL DATABASE
                -)RETURN THAT OBJECT
            */
        }

    };
?>
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
        //CREATE JOB
        public function createJob($data)
        {        
            //INSERT QUERY
            $this->db->query(
                "INSERT INTO jobs(category_id,job_title,company,description,location,salary,contact_user,contact_email) VALUE(:category_id,:job_title,:company,:description,:location,:salary,:contact_user,:contact_email)"
            );
            //BIND DATA
            $this->db->bind(":category_id", $data['category_id']);
            $this->db->bind(":job_title", $data['job_title']);
            $this->db->bind(":company", $data['company']);
            $this->db->bind(":description", $data['description']);
            $this->db->bind(":location", $data['location']);
            $this->db->bind(":salary", $data['salary']);
            $this->db->bind(":contact_user", $data['contact_user']);
            $this->db->bind(":contact_email", $data['contact_email']);
            
            //EXECUTE
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateJob($id,$data){
            $this->db->query(
                "UPDATE jobs SET company = :company, category_id = :category_id, job_title = :job_title, description = :description, location = :location, salary = :salary, contact_user = :contact_user, contact_email = :contact_email WHERE id = :id"
            );
            //BIND DATA
            $this->db->bind(":category_id", $data['category_id']);
            $this->db->bind(":job_title", $data['job_title']);
            $this->db->bind(":company", $data['company']);
            $this->db->bind(":description", $data['description']);
            $this->db->bind(":location", $data['location']);
            $this->db->bind(":salary", $data['salary']);
            $this->db->bind(":contact_user", $data['contact_user']);
            $this->db->bind(":contact_email", $data['contact_email']);
            $this->db->bind(":id",$id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteJob($id){
            $this->db->query("DELETE FROM jobs WHERE jobs.id = :id");
            $this->db->bind(":id",$id);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
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
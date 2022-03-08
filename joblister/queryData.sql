CREATE joblister;
CREATE TABLE categories(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
)
CREATE TABLE jobs(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    category_id INT(11) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    salary VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    contact_user VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    post_date TIMESTAMP CURRENT_TIMESTAMP()
)
INSERT INTO categories(name) VALUE
    (Bussiness),
    (Technology),
    (Retail),
    (Construction)
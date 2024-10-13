/*database booksite_demo */

CREATE TABLE IF NOT EXISTS users(
    user_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_fullname varchar(100) NOT NULL,
    username varchar(50) NOT NULL,
    user_pass varchar(50) NOT NULL,
    user_email varchar(255) NOT NULL,
    date_created TIMESTAMP NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=UTF8;
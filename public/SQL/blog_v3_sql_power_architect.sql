
CREATE TABLE user (
                id INT AUTO_INCREMENT NOT NULL,
                username VARCHAR(50) NOT NULL,
                email VARCHAR(100) NOT NULL,
                password VARCHAR(100) NOT NULL,
                activated TINYINT NOT NULL,
                validation_key BINARY(32) NOT NULL,
                date_creation DATE NOT NULL,
                date_update DATE NOT NULL,
                user_role TINYINT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE post (
                id INT AUTO_INCREMENT NOT NULL,
                title VARCHAR(100) NOT NULL,
                chapo VARCHAR(100) NOT NULL,
                content VARCHAR(1000) NOT NULL,
                date_creation DATE NOT NULL,
                date_update DATE NOT NULL,
                user_id INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE comment (
                id INT AUTO_INCREMENT NOT NULL,
                title VARCHAR(100) NOT NULL,
                content VARCHAR(1000) NOT NULL,
                valid TINYINT NOT NULL,
                date_creation DATE NOT NULL,
                date_update DATE NOT NULL,
                user_id INT NOT NULL,
                post_id INT NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE comment ADD CONSTRAINT user_comment_fk
FOREIGN KEY (user_id)
REFERENCES user (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE post ADD CONSTRAINT user_post_fk
FOREIGN KEY (user_id)
REFERENCES user (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE comment ADD CONSTRAINT post_comment_fk
FOREIGN KEY (post_id)
REFERENCES post (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

USE post;

CREATE TABLE todos (
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    to_do_item VARCHAR(50) NOT NULL,
    status VARCHAR(100) DEFAULT "pending" NOT NULL,
    created_at TIMESTAMP,
    PRIMARY KEY (id)
);
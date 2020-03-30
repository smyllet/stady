use stady;
DROP TABLE IF EXISTS Stage;

CREATE TABLE Stage
(
   stage_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   stage_name VARCHAR(100) NOT NULL,
   stage_date_start date NOT NULL,
   stage_date_end date NOT NULL
);
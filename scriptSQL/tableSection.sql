use stady;
DROP TABLE IF EXISTS Section;

CREATE TABLE Section
(
   section_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   section_name VARCHAR(100) NOT NULL,
   section_sectionParent_id INT
);
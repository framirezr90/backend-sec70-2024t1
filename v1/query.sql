CREATE DATABASE ciisa_backend_v1;
CREATE USER 'ciisa_backend_v1'@'localhost'IDENTIFIED BY 'l4cl4v3-c11s4' ;
GRANT ALL PRIVILEGES ON ciisa_backend_v1 . * TO 'ciisa_backend_v1'@'localhost';
FLUSH PRIVILEGES;

USE ciisa_backend_v1;
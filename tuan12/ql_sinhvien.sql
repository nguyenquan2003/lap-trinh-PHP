CREATE DATABASE ql_sinhvien;
USE ql_sinhvien;

CREATE TABLE lop (
    malop INT PRIMARY KEY AUTO_INCREMENT,
    tenlop VARCHAR(50)
);

CREATE TABLE sinhvien (
    masv INT PRIMARY KEY AUTO_INCREMENT,
    hoten VARCHAR(100),
    email VARCHAR(100),
    malop INT,
    FOREIGN KEY (malop) REFERENCES lop(malop)
);

<?php
$conn=new mysqli("localhost","root","");
$qry_database="CREATE DATABASE IF NOT EXISTS `dwdatabase`";

$conn->query($qry_database);
$conn= new mysqli("localhost","root","","dwdatabase");

$animaltable="CREATE TABLE `animals_table` (
  `aid` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Animal_name` varchar(50) NOT NULL,
  `Breed` varchar(50) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Age` int(30) NOT NULL,
  `Weight` int(20) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Entry_date` date NOT NULL,
  `Picture` varchar(100) NOT NULL,
  PRIMARY KEY (`aid`)
)";
$conn->query($animaltable);

$answertable="CREATE TABLE `answer_table` (
 `aid` int(11) NOT NULL,
  `Answer` varchar(200) NOT NULL,
  `qids` int(50) NOT NULL,
  `Answerby` varchar(50) NOT NULL,
  `userid` int(225) NOT NULL,
    PRIMARY KEY (`aid`)
)";
$conn->query($answertable);

$bookingtable="
CREATE TABLE `booking_table` (
  `id` int(11) NOT NULL,
  `animalid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)";
$conn->query($bookingtable);


$countertable="CREATE TABLE `counter_table` (
  `countid` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`countid`)
)";
$conn->query($countertable);

$donationtable="CREATE TABLE `donation_table` (
  `did` int(11) NOT NULL,
  `Donar_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Amount` int(50) NOT NULL,
   PRIMARY KEY (`did`)
) ";
$conn->query($donationtable);

$questable="CREATE TABLE `question_table` (
  `qid` int(11) NOT NULL,
  `Question` varchar(300) NOT NULL,
  `Username` varchar(50) NOT NULL,
  PRIMARY KEY (`qid`)
)";
$conn->query($questable);

$usertable="CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Postal_Code` int(10) NOT NULL,
  `Account` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Signup_date` date NOT NULL,
  PRIMARY KEY (`id`)
)";
$conn->query($usertable);
?>
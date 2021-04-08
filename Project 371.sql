Create Database if not exists Project371;
Use Project371;
Drop Table IF Exists Users;
Drop Table if Exists Moderators;

create table IF NOT EXISTS Users (
User_ID varchar(20),
UserFirst_Name varchar(30) NOT NULL,
UserLast_Name varchar (30) NOT NULL,
Primary Key (User_ID)
	
);

create table IF Not Exists Moderators 
(
User_ID varchar(20),
Primary Key (User_ID),
Foreign Key (User_ID) references Users
ON Delete Restrict

);


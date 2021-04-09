Create Database if not exists Project371;
Use Project371;
DROP TABLE IF EXISTS Categories;
DROP TABLE IF EXISTS Statuses;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Moderators;
DROP TABLE IF EXISTS Advertisements;

CREATE TABLE IF NOT EXISTS Categories
(
Category_ID varchar(3) not null,
CatName varchar(20) not null,
Primary Key (Category_ID)
);

CREATE TABLE IF NOT EXISTS Statuses
(
Status_ID varchar(2) not null,
StatusName varchar(14) not null,
Primary Key (Status_ID)
);

CREATE TABLE IF NOT EXISTS Users
(
User_ID varchar(20),
UserFirst_Name varchar(30) NOT NULL,
UserLast_Name varchar (30) NOT NULL,
Primary Key (User_ID)
);

CREATE TABLE IF NOT EXISTS Moderators
(User_ID varchar(20),
Primary Key (User_ID),
Foreign Key (User_ID) references Users(User_ID)
);

CREATE TABLE IF NOT EXISTS Advertisements
(
Advertisement_ID int(10),
AdvTitle varchar(100) not null,
AdvDetails varchar(100),
AdvDateTime DATE not null,
Price FLOAT not null,
Category_ID varchar(3),
User_ID varchar(20),
Moderator_ID varchar(20),
Status_ID varchar(2),

Foreign Key (Category_ID) REFERENCES Categories(Category_ID) ON DELETE RESTRICT,
Foreign Key (User_ID) REFERENCES Users(User_ID) ON DELETE CASCADE,
Foreign Key (Moderator_ID) REFERENCES Moderators(User_ID) ON DELETE SET NULL,
Foreign Key (Status_ID) REFERENCES Statuses(Status_ID) ON DELETE RESTRICT,
Primary Key (Advertisement_ID)
);

Insert Into Users (User_ID,UserFirst_Name, UserLast_Name) 
Values  ('Jsmith', 'John', 'Smith'),
('Ajackson', 'Ann', 'Jackson'),
('Rkale', 'Rania', 'Kale'),
('Sali', 'Samir', 'Ali');

Insert Into Moderators Values
('Jsmith'),
('Ajackson');


INSERT INTO Categories Values
('CAT', 'Cars and Trucks'),
('HOU', 'Housing'),
('ELC', "Electronics"),
('CCA', "Child Care");

INSERT INTO Statuses Values
('PN', "Pending"),
('AC', "Active"),
('DI', "Disapproved");

INSERT INTO Advertisements Values
( 1, '2010 Sedan Subaru', '2010 sedan car in great shape for sale', '2017-02-10', 6000, 'CAT', 'Rkale', 'Jsmith', 'AC'),
( 2, 'Nice office desk', 'Nice office desk for sale', '2017-02-15', 50.25, 'HOU', 'Rkale', 'Jsmith', 'AC'),
( 3, 'Smart LG TV for $200 ONLY', 'Smart LG TV 52 inches! Really cheap!', '2017-03-15', 200, 'ELC', 'Sali', 'Jsmith', 'AC'),
( 4, 'HD Tablet for $25 only', 'Amazon Fire Tablet HD', '2017-03-20', 25, 'CAT', 'Rkale', Null, 'PN'),
( 5, 'Laptop for $100', 'Amazing HP laptop for $100', '2017-03-20', 100, 'CAT', 'Rkale', Null, 'PN');

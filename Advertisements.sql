USE Project371;
DROP TABLE IF EXISTS Advertisements;

CREATE TABLE IF NOT EXISTS Advertisements
 (
    Advertisement_ID int(10),
    AdvTitle varchar(100) not null,
    AdvDetails varchar(100),
    AdvDateTime DATE not null,
    Price FLOAT not null,

    Category_ID varchar(3) REFERENCES Categories(Category_ID),
    User_ID varchar(10) REFERENCES Users(User_ID),
    Moderator_ID varchar(10) REFERENCES Moderators(Moderator_ID),
    Status_ID varchar(2) REFERENCES Statuses(Status_ID),

    constraint pk_advertisements primary key (Advertisement_ID)
 );

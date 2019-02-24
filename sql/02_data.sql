

insert into Users(firstname,login,email,roleflag,pass) VALUES("Administrator","admin","admin@admin.com","A","JDJhJDA3JFBxeUM3bFBudkVzUW11VTRGQkJWWWUudk9IQi5kMUhvWktSa0h2ZHYveHVzd2pRQnN6SUhT");
insert into Users(firstname,login,email,roleflag,pass) VALUES("User","user","user@admin.com","U","JDJhJDA3JFBxeUM3bFBudkVzUW11VTRGQkJWWWUudk9IQi5kMUhvWktSa0h2ZHYveHVzd2pRQnN6SUhT");

insert into Events(targetDate,description) VALUES("2 May","Event 1");
insert into Events(targetDate,description) VALUES("10 May","Event 2");
insert into Events(targetDate,description) VALUES("22 May","Event 3");
insert into Events(targetDate,description) VALUES("2 June","Event 4");
insert into Events(targetDate,description) VALUES("2 July","Event 5");
insert into Events(targetDate,description) VALUES("22 July","Event 6");

insert into Department(name,description) VALUES ("Department 1","Description Dptm 1");
insert into Department(name,description) VALUES ("Department 2","Description Dptm 2");

insert into Activities (departmentId,name,description) VALUES (1,"Activity 1","Description");
insert into Activities (departmentId,name,description) VALUES (1,"Activity 2","Description");
insert into Activities (departmentId,name,description) VALUES (1,"Activity 3","Description");
insert into Activities (departmentId,name,description) VALUES (2,"Activity 1","Description");
insert into Activities (departmentId,name,description) VALUES (2,"Activity 2","Description");
insert into Activities (departmentId,name,description) VALUES (2,"Activity 3","Description");

insert into Resources (name,description) VALUES ("Peter","Description");
insert into Resources (name,description) VALUES ("Anna","Description");
insert into Resources (name,description) VALUES ("Hanna","Description");
insert into Resources (name,description) VALUES ("Songar","Description");

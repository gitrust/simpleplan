

insert into Users(firstname,login,email,userRole,pass) VALUES("Administrator","admin","admin@admin.com","admin","JDJhJDA3JFBxeUM3bFBudkVzUW11VTRGQkJWWWUudk9IQi5kMUhvWktSa0h2ZHYveHVzd2pRQnN6SUhT");
insert into Users(firstname,login,email,userRole,pass) VALUES("User","user","user@admin.com","user","JDJhJDA3JFBxeUM3bFBudkVzUW11VTRGQkJWWWUudk9IQi5kMUhvWktSa0h2ZHYveHVzd2pRQnN6SUhT");

insert into Events(targetDate,description) VALUES(STR_TO_DATE('2019-04-11', '%Y-%m-%d'),"Event 1");
insert into Events(targetDate,description) VALUES(STR_TO_DATE('09/06/2010', '%m/%d/%Y'),"Event 2");
insert into Events(targetDate,description) VALUES(STR_TO_DATE('09/05/2010', '%m/%d/%Y'),"Event 3");
insert into Events(targetDate,description) VALUES(STR_TO_DATE('08/05/2010', '%m/%d/%Y'),"Event 4");
insert into Events(targetDate,description) VALUES(STR_TO_DATE('08/05/2012', '%m/%d/%Y'),"Event 5");
insert into Events(targetDate,description) VALUES(STR_TO_DATE('08/03/1999', '%m/%d/%Y'),"Event 6");

insert into ActivityCategories(name,description) VALUES ("ActivityCategory 1","Description Dptm 1");
insert into ActivityCategories(name,description) VALUES ("ActivityCategory 2","Description Dptm 2");

insert into Activities (categoryId,name,description) VALUES (1,"Activity 1","Description");
insert into Activities (categoryId,name,description) VALUES (1,"Activity 2","Description");
insert into Activities (categoryId,name,description) VALUES (1,"Activity 3","Description");
insert into Activities (categoryId,name,description) VALUES (2,"Activity 1","Description");
insert into Activities (categoryId,name,description) VALUES (2,"Activity 2","Description");
insert into Activities (categoryId,name,description) VALUES (2,"Activity 3","Description");

insert into Resources (name,description) VALUES ("Peter","Description");
insert into Resources (name,description) VALUES ("Anna","Description");
insert into Resources (name,description) VALUES ("Hanna","Description");
insert into Resources (name,description) VALUES ("Songar","Description");

insert into ResourceAssignment (resourceId,eventId,activityId) VALUES (1,1,1);
insert into ResourceAssignment (resourceId,eventId,activityId) VALUES (1,2,2);
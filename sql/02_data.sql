

insert into Users(firstname,login,email,roleflag,pass) VALUES("Administrator","admin","admin@admin.com","A","JDJhJDA3JFBxeUM3bFBudkVzUW11VTRGQkJWWWUudk9IQi5kMUhvWktSa0h2ZHYveHVzd2pRQnN6SUhT");
insert into Users(firstname,login,email,roleflag,pass) VALUES("User","user","user@admin.com","U","JDJhJDA3JFBxeUM3bFBudkVzUW11VTRGQkJWWWUudk9IQi5kMUhvWktSa0h2ZHYveHVzd2pRQnN6SUhT");

insert into Events(targetDate,description) VALUES("2 May","Termin1");
insert into Events(targetDate,description) VALUES("10 May","Termin2");
insert into Events(targetDate,description) VALUES("22 May","Termin3");
insert into Events(targetDate,description) VALUES("2 June","Termin4");
insert into Events(targetDate,description) VALUES("2 July","termiin5");
insert into Events(targetDate,description) VALUES("22 July","Termin6");

insert into Department(name,description) VALUES ("RoleGroup1","RoleGroup1");
insert into Department(name,description) VALUES ("RoleGroup2","RoleGroup2");

insert into DepartmentRoles (departmentId,role,description) VALUES (1,"Role1","Description Role 1");
insert into DepartmentRoles (departmentId,role,description) VALUES (1,"Role2","Description Role 2");
insert into DepartmentRoles (departmentId,role,description) VALUES (1,"Role3","Description Role 3");
insert into DepartmentRoles (departmentId,role,description) VALUES (2,"Role4","Description Role 4");
insert into DepartmentRoles (departmentId,role,description) VALUES (2,"Role5","Description Role 5");
insert into DepartmentRoles (departmentId,role,description) VALUES (2,"Role6","Description Role 6");

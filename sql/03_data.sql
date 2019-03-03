

insert into ActivityCategories(name,description) VALUES ("Gottesdienst","Description Dptm 1");
insert into ActivityCategories(name,description) VALUES ("Tontechnik","Description Dptm 2");
insert into ActivityCategories(name,description) VALUES ("Lobpreis","Description Dptm 2");
insert into ActivityCategories(name,description) VALUES ("Kinderdienst","KiDi");

insert into Activities (categoryId,name,description) VALUES (5,"Leitung","Description");
insert into Activities (categoryId,name,description) VALUES (5,"E-Gitarre","Description");
insert into Activities (categoryId,name,description) VALUES (5,"Kachon","Description");
insert into Activities (categoryId,name,description) VALUES (5,"Piano","Description");
insert into Activities (categoryId,name,description) VALUES (5,"Sänger 1","Description");
insert into Activities (categoryId,name,description) VALUES (5,"Sänger 2","Description");

insert into Activities (categoryId,name,description) VALUES (3,"Prediger","Description");
insert into Activities (categoryId,name,description) VALUES (3,"Ordner 1","Description");
insert into Activities (categoryId,name,description) VALUES (3,"Ordner 2","Description");
insert into Activities (categoryId,name,description) VALUES (3,"Leitung","Description");
insert into Activities (categoryId,name,description) VALUES (3,"Info-Tresen","Description");
insert into Activities (categoryId,name,description) VALUES (3,"Welcome 1","Description");
insert into Activities (categoryId,name,description) VALUES (3,"Welcome 2","Description");

insert into Activities (categoryId,name,description) VALUES (4,"Beamer","Description");
insert into Activities (categoryId,name,description) VALUES (4,"Mischpult 1","Description");
insert into Activities (categoryId,name,description) VALUES (4,"Mischpult 2","Description");

insert into Activities (categoryId,name,description) VALUES (6,"Schäffchen","Description");
insert into Activities (categoryId,name,description) VALUES (6,"Bibelkreis","Description");
insert into Activities (categoryId,name,description) VALUES (6,"Kids ab 7","Description");


/*
assignments

select ra.id, ra.eventId, a.id, ra.resourceId, r.name, a.name
FROM ResourceAssignment as ra
LEFT JOIN Events as e ON e.id = ra.eventId
LEFT JOIN Activities as a ON a.id = ra.activityId
right JOIN Resources as r ON r.id = ra.resourceId
*/
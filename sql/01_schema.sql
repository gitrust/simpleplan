

CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    login VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    userRole VARCHAR(30),
    pass VARCHAR(255)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE Events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    targetDate VARCHAR(10) NOT NULL,
    description VARCHAR(150)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

/* Activity Category */
CREATE TABLE ActivityCategories (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(150)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE Activities (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categoryId INT(6) NOT NULL,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(150)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Resources (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(150)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE ResourceAssignment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    resourceId INT(6) NOT NULL,
    eventId INT(6) NOT NULL,
    activityId INT(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

/* OBSOLETE */
CREATE TABLE UserRoleAssignment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    roleId int(6) NOT NULL,
    userId int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE UserRoleEvents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId int(6) NOT NULL,
    eventId int(6) NOT NULL,
    roleId int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

/*CREATE TABLE Configuration (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 key VARCHAR(30) NOT NULL,
 value VARCHAR(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;
*/



CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    login VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    userRole VARCHAR(30),
    pass VARCHAR(255),
    inactive BOOLEAN DEFAULT FALSE,
    lastlogin timestamp NULL DEFAULT NULL,
    description VARCHAR(150) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE Events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    targetDate date NOT NULL,
    description VARCHAR(150),
    inactive BOOLEAN DEFAULT FALSE
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
    description VARCHAR(150),
    inactive BOOLEAN DEFAULT FALSE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE ResourceAssignment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    resourceId INT(6) NOT NULL,
    eventId INT(6) NOT NULL,
    activityId INT(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE SystemConfiguration (
 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 ckey VARCHAR(30) NOT NULL,
 cvalue VARCHAR(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

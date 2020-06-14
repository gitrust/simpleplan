# simpleplan

a simple PHP app to plan team resources

Used PHP framework is based on sources of simple mvc

# Requirements

- PHP 7
- MySQL 5.7
- Install tFPDF (https://github.com/rev42/tfpdf/blob/master/src/tFPDF.php)

# Configuration

- Check and adapt initial configuration in `public/config.php`
- Setup a MySQL database and initialize with data from `sql/` folder


# Play around in docker

## Install docker

### Docker-Toolbox for Windows

* Download Docker-Toolbox for windows
* chose NDIS 5 driver during installation
* set up your PATH environment properly

#### Setup docker environment

Type in DOS console before using docker commands

	@FOR /f "tokens=*" %i IN ('"C:\Program Files\Docker Toolbox\docker-machine.exe" env default') DO @%i

#### Setup VirtualBox Shared folder

Create a shared folder in VirtualBox for "default" image

	docker-machine stop

	vboxmanage sharedfolder add default --name "projectname" --hostpath "c:\users\username\myproject" --automount

	docker-machine start 

#### Shared folder

use that shared folder in your docker compose file:

	volumes:
		- /projectname:/some/dir/in/container/project_name
    
### or Docker for Windows

* install Docker for Windows 
	

### Docker configuration
		
Create your docker-compose environment file ".env" in `docker` directory

* initialize `WWW_FOLDER` variable
* initialize `SQL_SCRIPTS_FOLDER` variable

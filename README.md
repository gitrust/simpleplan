# wteamplaner

private repository for a PHP app to plan team resources

http://tutorials.lemme.at/mvc-mit-php/

framework is based on sources of simple mvc

# Install docker toolbox

* Download Docker-Toolbox for windows
* use NDIS 5 driver during installation
* set up your PATH environment properly
	
# Setup docker environment

Type in DOS console before using docker commands

	@FOR /f "tokens=*" %i IN ('"C:\Program Files\Docker Toolbox\docker-machine.exe" env default') DO @%i

# Setup VirtualBox Shared folder

Create a shared folder in VirtualBox for "default" image

	docker-machine stop

	vboxmanage sharedfolder add default --name "projectname" --hostpath "c:\users\username\myproject" --automount

	docker-machine start 

Then use that shared folder in your docker compose file:

	volumes:
		- /projectname:/some/dir/in/container/project_name
		
Create your docker-compose environment file ".env" in docker directory

* init WWW_FOLDER variable
* init SQL_SCRIPTS_FOLDER variable

# Initialize database

* adapt SQL files in /sql folder

# Libraries

- Install tFPDF (https://github.com/rev42/tfpdf/blob/master/src/tFPDF.php)

# Terminology

## Domain

### Division

### Division Activities

### Users

### User Roles

### Events

### Resources

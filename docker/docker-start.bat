@echo off

docker-machine start default
@FOR /f "tokens=*" %i IN ('"C:\Program Files\Docker Toolbox\docker-machine.exe" env default') DO @%i

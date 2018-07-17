@echo off

:: Setup docker environment for default
@FOR /f "tokens=*" %%i IN ('"%DOCKER_TOOLBOX%\docker-machine.exe" env default') DO @%%i

@echo off
echo Initializing Setup...
php artisan do:setup

set "current_path=%~dp0"
start "" "%current_path%run.bat"
pause
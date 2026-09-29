@echo off
cd /d %~dp0

echo Checking GD...
php\php.exe -c php\php.ini -m | findstr gd

start "" http://127.0.0.1:8000
php\php.exe -c php\php.ini artisan serve --host=127.0.0.1 --port=8000

pause
@echo off
echo.
echo git status
git status
echo.
git pull
echo.
git add .
echo.
git commit -m "%date%-%time%"
echo.
git push
echo.

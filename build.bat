@echo off
echo.
echo --- git status ---
git status
echo.
echo --- git pull ---
git pull
echo.
echo --- git add ---
git add .
echo.
echo --- git commit ---
git commit -m "%date%-%time%"
echo.
echo --- git push ---
git push
echo.

@echo off
git pull
git add .
git commit -m "%date%-%time%"
git push

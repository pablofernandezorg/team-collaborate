#!/bin/sh

git status
git add -A
git commit -am "API Update Files"
git push origin master
now=$(date)


#!/bin/sh

git status
git add -A
git commit -am "message"
git push origin master

echo "pushed to github" | mail -s "pushed to github" fernanpa@whitman.edu

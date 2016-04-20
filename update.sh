#!/bin/sh

FIRST=$(git status)
SECON=$(git add -A)
THIRD=$(git commit -am "API Update Files")
FOURT=$(git push origin master)
now=$(date)


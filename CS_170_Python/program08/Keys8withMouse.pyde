"""
***********************************************
Pablo Fernandez 
Nick Robinson
Program 08 Recursive Trees
Copyright 2016, www.pablofernandez.com
***********************************************
"""

"""
Program Description
The 'D' key causes the tree to grow by increasing the depth of recursion by 1, 'd' decreases the depth of recursion by 1.
The 'A' key increases the branch angle, 'a' decreases branch angle.
The 'L' key increases the length of the initial trunk, 'l' decreases it.
The 'S' key increases the scaling between successive levels of recursion, 's' decreases it.
Where important, conditionals should be employed to prevent user keystrokes from creating an illegal parameter value (i.e. the length should never be less than 1).
Build some kind of connection between the mouse and the tree.
Employ color.
In a separate copy of the program, implement some kind of Above & Beyond element.
"""

"""
Above and Beyond Description

As the tree grows, the color of the tree will change at a faster rate. Try experimenting
with angle changes as well as increases in the recursion and the scaling in order to
create really cool pictures. (Like really cool :D ).

Clicking anywhere on the image will save a PNG TreePicture.png to the folder 
that you are currently operating in. 
"""

import random

recursion_depth = 3
n = 0
branch_angle = 0
angle_dif = (PI/6)
length_branch = 250
scale_factor = 2
previousloc_x = 400 
previousloc_y = 800
parta = 0
partb = 0
partc = 0

def setup():
    size(800,800) # set the size of the canvas
    background(255,255,224) # set the background color to sandpaper

def draw():
    global recursion_depth, branch_angle, length_branch,previousloc_x, previousloc_y, scale_factor, n, angle_dif
    draw_tree(previousloc_x, previousloc_y, length_branch, branch_angle, recursion_depth, scale_factor, angle_dif)    

""" width/2 height """

def keyPressed():
    global recursion_depth, branch_angle, length_branch, scale_factor, angle_dif
    background(255, 255, 224)
    if (key == 'D'):
        recursion_depth = recursion_depth +1
        """ Increase depth of recursion by 1 """
    if (key == 'd'):
        recursion_depth = recursion_depth -1
        """ Decrease depth of recursion by 1 """
    if (key == 'A'):
        """ Increase branch angle """
        angle_dif = angle_dif + 0.2
    if (key == 'a'):
        """ Decrease branch angle """
        angle_dif = angle_dif -0.2
    if (key == 'L'):
        """ Increase length of initial trunk """
        length_branch = length_branch+15
    if (key == 'l'):
        """ Decrease length of initial trunk """
        if(length_branch>=1):
            length_branch = length_branch-15
    if (key == 'S'):
        """ Increase scaling between recursions """
        scale_factor = scale_factor -0.1
    if (key == 's'):
        """ Decreases scaling between recursions """
        if(recursion_depth>=1):
            scale_factor = scale_factor +0.1
    """--------------------------------------"""

def draw_tree(rootx, rooty, length_branch, angle, recursion_depth, scale_factor, angle_dif):
    global n, parta, partb, partc
    if(n == 18000):
        parta = random.randrange(0,256)
        partb = random.randrange(0,256)
        partc = random.randrange(0,256)
        n=0
    n = n + 1

    if recursion_depth > 0:
        tipx = rootx + length_branch*sin(angle)
        tipy = rooty - length_branch*cos(angle)
        stroke(partc,partb,parta,200)
        line(rootx, rooty, tipx, tipy)
        draw_tree(tipx, tipy, length_branch/scale_factor, angle-angle_dif, recursion_depth-1, scale_factor, angle_dif)
        draw_tree(tipx, tipy, length_branch/scale_factor, angle+angle_dif, recursion_depth-1, scale_factor, angle_dif)
        draw_tree(tipx, tipy, length_branch/scale_factor, angle, recursion_depth-1, scale_factor, angle_dif)

def mousePressed():
    saveFrame("TreePicture.png")
    background(255, 255, 224)
    
    

""" The below is what professor told us to use to save video? Commented out  
#!/bin/sh
# This script will take a collection of .png image files and stitch them
# together (in the order in which they appear) into a movie.  The current
# framerate is set to 60 frames per second (adjust to suit below).
#
# Use this with a dump of image files created by the Processing command:
#
#      saveFrame("frame-######.png")
#
# This will create a list of files in your sketch folder of the form:
#
#      frame-000001.png
#      frame-000002.png
#      frame-000003.png
#      etc...
#
# each is a snapshot of the canvas during the draw() loop.
#
# Download this script and save it in the folder containing the .png files.
# From a terminal, navigate to the folder containing the script and the
# images using the 'cd' command.  Once in the folder, type:
#
#      sh convert.sh
#
# This will create the video file from your image files.

# User defined variables:
WIDTH=800    # should match the width of your sketch
HEIGHT=600    # should match the height of your sketch
FPS=60      # how many frames per second, speed of animation
VIDEOFILE="output.avi"  # output video filename, should end in .avi

# Encoding command, shouldn't need to be edited.
mencoder mf://*.png -mf w=$WIDTH:h=$HEIGHT:fps=$FPS:type=png -ovc lavc \
     -lavcopts vcodec=mpeg4 -oac copy -o $VIDEOFILE
   """
     
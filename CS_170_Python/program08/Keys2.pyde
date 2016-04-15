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

"""

import random

def setup():
    size(800,800) # set the size of the canvas
    background(255,255,224) # set the background color to sandpaper

def draw():    
    """--------------------------------------"""
    if (keyPressed):
        if (key == 'D'):
            t=1
    if (keyPressed):
        if (key == 'd'):
            t=1
    
    """--------------------------------------"""
    if (keyPressed):
        if (key == 'A'):
            t=1
    if (keyPressed):
        if (key == 'a'):
            t=1
            
    """--------------------------------------"""

    if (keyPressed):
        if (key == 'L'):
            t=1
    if (keyPressed):
        if (key == 'l'):
            t=1
            
    """--------------------------------------"""
    
    if (keyPressed):
        if (key == 'S'):
            t=1
    if (keyPressed):
        if (key == 's'):
            t=1
              
    """--------------------------------------"""

def mousePressed():
    saveFrame("Tree.png")
    background(255, 255, 224)
    
def mousePressed():
    background(255, 255, 224)


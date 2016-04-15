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
            """ Increase depth of recursion by 1 """
    if (keyPressed):
        if (key == 'd'):
            """ Decrease depth of recursion by 1 """
            t=1
    
    """--------------------------------------"""
    if (keyPressed):
        if (key == 'A'):
            """ Increase branch angle """
            t=1
    if (keyPressed):
        if (key == 'a'):
            """ Decrease branch angle """
            t=1
            
    """--------------------------------------"""

    if (keyPressed):
        if (key == 'L'):
            """ Increase length of initial trunk """
            t=1
    if (keyPressed):
        if (key == 'l'):
            """ Decrease length of initial trunk """
            t=1
            
    """--------------------------------------"""
    
    if (keyPressed):
        if (key == 'S'):
            """ Increase scaling between recursions """
            t=1
    if (keyPressed):
        if (key == 's'):
            """ Decreases scaling between recursions """
            t=1
              
    """--------------------------------------"""

def mousePressed():
    saveFrame("Tree.png")
    background(255, 255, 224)
    
def mousePressed():
    background(255, 255, 224)


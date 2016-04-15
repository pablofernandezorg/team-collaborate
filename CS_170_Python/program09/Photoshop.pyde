"""
***********************************************
Pablo Fernandez 
Donner Eliza
Program 09 Photo Manipulation
Copyright 2016, www.pablofernandez.com
***********************************************
"""

"""
Program Description
Load an image of your choice (be sure to upload the image file).
Display the original image to the user.
When the user types the 'b' key, the original image is replaced with a greyscale version.
When the user type the 'm' key, the original image is replaced with a mirror image.
When the user type the 'o' key, the original image is restored.
One additional transformation of your own design.
An above & beyond element (with comment).
"""

"""
Above and Beyond Description

"""

import random

def setup():
    global sourceImage, destImage
    background(255,255,224) # set the background color to sandpaper
    size(1000,740)
    sourceImage = loadImage("ranier.png")
    destImage = sourceImage.clone()

def draw():
    global destImage
    image(destImage,0,0)

def keyPressed():
    image(destImage,0,0)
    global destImage

    if ((key == 'b') | (key == 'B')):
        greyscale(sourceImage, destImage)
    if ((key == 'm') | (key == 'M')):
        mirror(sourceImage, destImage)
    if ((key == 'o') | (key == 'O')):
        restore(sourceImage, destImage)
    if ((key == 't') | (key == 'T')):
        action(sourceImage, destImage)

def greyscale(sourceImage, destImage):
    print("Yum")
def mirror(sourceImage, destImage):
    print("Yum")
def restore(sourceImage, destImage):
    print("Yum")
def action(sourceImage, destImage):
    print("Yum")

def mousePressed():
    saveFrame("NewPicture.png")
    image(destImage,0,0)
    
    
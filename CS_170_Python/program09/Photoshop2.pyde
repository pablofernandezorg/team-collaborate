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

*** MODS ***
To allow for mmultiple filters to be added on top of each other, a copy of the original file
is used in all functions. 

When the user types the 'b' key, the copied image is replaced with a greyscale version.
When the user type the 'm' key, the copied image is replaced with a mirror image.
When the user type the 'o' key, the copied image image is restored.
When the user type the 'i' key, the copied image image is inverted.
When the user type the 'p' key, the copied image image is posterized.

An above & beyond element (with comment).
"""

"""
Above and Beyond Description

"""

def setup():
    global sourceImage, playImage
    background(255,255,224) 
    size(1000,563)
    sourceImage = loadImage("Mclaren.jpg")
    playImage = sourceImage.clone()

def draw():
    global sourceImage, playImage
    image(playImage,0,0)

def keyPressed():
    global sourceImage, playImage
    image(playImage,0,0)
    
    """ Modified Code to allow for multiple filters / changes added to an image """

    if ((key == 'b') | (key == 'B')):
        playImage = greyscale(playImage)
    if ((key == 'm') | (key == 'M')):
        playImage = mirror(playImage)
    if ((key == 'o') | (key == 'O')):
        playImage = restore(sourceImage, playImage)
    if ((key == 'i') | (key == 'I')):
        playImage= invert(playImage)  
    if ((key == 's') | (key == 'S')):
        playImage= blur(playImage)  
                                     
    background(255,255,224) 
    image(playImage,0,0)

def greyscale(loc):
    """ Modified Code, Original Credit: Albert Schueller """
    dest = createImage(loc.width,loc.height,RGB)
    loc.loadPixels()
    dest.loadPixels()
    for i in range(loc.width):
        for j in range(loc.height):
                r=red(loc.pixels[j*loc.width + i])
                g=green(loc.pixels[j*loc.width + i])
                b=blue(loc.pixels[j*loc.width + i])
                dest.pixels[j*loc.width + i]=color((r+g+b)/3.0)
    dest.updatePixels()
    return dest

def mirror(loc):
    """ Modified Code, Original Credit: Albert Schueller """
    dest = createImage(loc.width,loc.height,RGB)
    loc.loadPixels()
    dest.loadPixels()
    for i in range(loc.width):
        for j in range(loc.height):
                r=red(loc.pixels[j*loc.width + i])
                g=green(loc.pixels[j*loc.width + i])
                b=blue(loc.pixels[j*loc.width + i])
                dest.pixels[(height-1-j)*loc.width + i]=color(r,g,b)
    dest.updatePixels()
    return dest

def restore(sourceImage, playImage):
    playImage = sourceImage.clone()
    return playImage

def invert(loc):
    loc.filter(INVERT);
    return loc

def blur(loc):
    loc.filter(BLUR, 6);
    return loc



def mousePressed():
    saveFrame("NewPicture.png")
    image(playImage,0,0)

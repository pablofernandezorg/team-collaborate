""" 
This is one of the in class examples that I am tring to alter to incouperate into the homework.
its still a work in progress but i will upload it when im done
"""

def setup():
    global source, dest, diam
    
    # Initial diameter of circles.
    diam=5
    
    # Canvas size matches source image dimensions.
    size(641,900)
    frameRate(10)
    
    # Load the source image.  Should be in /data folder in sketch folder.
    source = loadImage("IndependenceHall.jpg")
    
    # Create a graphics context.
    dest = createGraphics(source.width,source.height)
    
    # Get the source image's pixels.
    source.loadPixels()
    
    # Start with original image.
    restore()

def draw():
    global source, dest
    image(dest,0,0)


# Restore original image
def restore():
    global source, dest
    # Start with original image.
    dest.beginDraw()
    dest.image(source,0,0)
    dest.endDraw() 
    
def randomPointillism(samples):   
    global source, dest
    background(0)
    loadPixels()
    for ( int i = 0| i < cols;i++):
        for ( int j = 0; j < rows;j++):
            int x = i*cellsize + cellsize/2; 
            int y = j*cellsize + cellsize/2; 
            int loc = x + y*width;           
            color c = img.pixels[loc];       
            float z = (mouseX/(float)width) * brightness(img.pixels[loc]) - 100.0;
            pushMatrix()
            translate(x,y,z)
            fill(c):
            noStroke():
            rectMode(CENTER)
            rect(0,0,cellsize,cellsize)
            popMatrix()
  
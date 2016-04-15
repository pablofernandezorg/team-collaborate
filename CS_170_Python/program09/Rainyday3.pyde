"""
***********************************************
Pablo Fernandez 
Donner Eliza
Program 09 Part B, Raining On A Beautiful Day
Copyrrandom_aght 2016, www.pablofernandez.com
***********************************************
"""

"""
Program 
Load an image of your choice (be sure to upload the image file).
Paint a destination canvas that is inspired by the pixels in the source image.
"""

"""
Above and Beyond Description
The following program portrays a beautiful landscape on a rainy day as it slowly
is getting darker and darker. Not only are the pixels being modified, but the 
screen slowly begins blurring as if the sky is getting darker, and droplets of
water appear on the glass window and slowly fade away.

To save your image, click on the screen and a copy will be saved to the directory.

"""
    
def setup():
    global source, dest, diam
    diam=5
    
    size(1000,550)
    frameRate(5)
    
    source = loadImage("Nature.jpg")
    dest = createGraphics(source.width,source.height)
    source.loadPixels()
    restore()

def draw():
    global source, dest
    image(dest,0,0)
    inspiration(1)

def restore():
    global source, dest
    dest.beginDraw()
    dest.image(source,0,0)
    dest.endDraw() 
    
def inspiration(key):   
    global source, dest

    dest.beginDraw()
    dest.noStroke()
    
    for s in range(key):
        i = int(random(source.width-1))
        j = int(random(source.height-1))
        b=blue(source.pixels[j*source.width + i])
        
        r=source.pixels[j/(i+5)-1]
        g=source.pixels[i/(j+5)-1] 
        
        
        dest.filter(BLUR, 6);
        dest.fill(color(r,g,b,50))
        diam = random(5,100)
        dest.ellipse(i,j,diam,diam)
    dest.endDraw()    
    
def mousePressed():
    saveFrame("Masterpiece.png")
    image(source,0,0)
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
    randomPointillism(1000)


# Restore original image
def restore():
    global source, dest
    # Start with original image.
    dest.beginDraw()
    dest.image(source,0,0)
    dest.endDraw() 
    
def randomPointillism(samples):   
    global source, dest
    # Redraw the destination graphics based on new 'diam' value
    dest.beginDraw()
    dest.noStroke()
    for s in range(samples):
        i = int(random(source.width-1))
        j = int(random(source.height-1))
        r=red(source.pixels[j*source.width + i])
        g=green(source.pixels[j*source.width + i])
        b=blue(source.pixels[j*source.width + i])
        dest.fill(color(r,g,b,50))
        diam = random(5,60)
        dest.ellipse(i,j,diam,diam)
    dest.endDraw()    
  
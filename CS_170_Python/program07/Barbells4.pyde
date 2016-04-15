import random

# Floating barbell.
hg = 0 # height of green side
hr = 0 # height of red side
wg = 0 # width of green side
wr = 0 # width of red side
t=0 # time parameter
dt = 0.01 # time step
n = 0
parta = random.randrange(0,256)
partb = random.randrange(0,256)
partc = random.randrange(0,256)
partd = random.randrange(0,256)
parte = random.randrange(0,256)
partf = random.randrange(0,256)

def setup():
    size(500,500) # set the size of the canvas
    background(255,255,224) # set the background color to sandpaper

def random_color():
    levels = range(32,256,32)
    return tuple(random.choice(levels) for _ in range(3))

def draw():
    global t, hg, hr, wg, wr 
    global dt, n, parta, partb, partc, partd, parte, partf
    # vary the heights using sine function
    hr = height/3*sin(2*PI*t)
    hg = height/3*sin(PI*t)
    #vary the widths using the sine function
    wr = partc + width*sin(2*PI*t)
    wg = parta + width*sin(PI*t)
    
    if(n == 50):
        parta = random.randrange(0,256)
        partb = random.randrange(0,256)
        partc = random.randrange(0,256)    
        partd = random.randrange(0,256)
        parte = random.randrange(0,256)
        partf = random.randrange(0,256)
        n=0
    n = n + 1
    
    stroke(parta, partb, partc,200) #147,112,219
    line(mouseX,mouseY,width+width/3,height/2+hg) 
    
    stroke(partd, parte, partf,200) #147,112,219
    line(width/1.9+wr,height/4-width/3,mouseX, mouseY)
    
    t = t+dt # increment time
    
def mousePressed():
    saveFrame("PabloSpencer.prng")
    background(255, 255, 255)

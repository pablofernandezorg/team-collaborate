# Floating barbell.
hg = 0 # height of green side
hr = 0 # height of red side
wg = 0 # width of green side
wr = 0 # width of red side
t=0 # time parameter
dt = 0.01 # time step


def setup():
    size(500,500) # set the size of the canvas
    background(255,255,224) # set the background color to sandpaper

def draw():
    global t, hg, hr, wg, wr 
    global dt
    # vary the heights using sine function
    hr = height/3*sin(2*PI*t)
    hg = height/3*sin(PI*t)
    #vary the widths using the sine function
    wr = width/3*sin(2*PI*t)
    wg = width/3*sin(PI*t)
    i = 255
    m = 254
    n = 0
    stroke(255,0,0)
    fill(255,0,0) # set the left sid to red
    ellipse(width/2-width/3,height/2+hr,10,10) # draw left side
    
    stroke(0,255,0)
    fill(0,255,0) # set right side to green
    ellipse(width/2+width/3,height/2+hg,10,10) #draw right side
    
    stroke(147,112,219,200)
    line(width/2-width/3,height/2+hr,width/2+width/3,height/2+hg) # draw connecting line

    stroke(255,0,0)
    fill(255,0,0) # set top side to red
    ellipse(width/2+wr,height/2-height/3,10,10)
    
    stroke(0,255,0)
    fill(0,255,0) # set bottom side to green
    ellipse(width/2+wg,height/2+height/3,10,10) #draw right side 
    
    stroke(147,112,219,200) # set line color to purple and transparency to 50%
    line(width/2+wr,height/2-width/3,width/2+wg, height/2+width/3)
    t = t+dt # increment time
    
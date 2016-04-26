from Vector import *
from Ball import *
    
def setup():
    size(800, 800)
    global balls, source
    balls = []
    source = loadImage("BACK.PNG")

def draw():
    global source
    background(source)
    
    global balls
    for b in balls:    
        b.update()
        b.draw()
        
    if ((key == 'A') | (key == 'a')):
        balls.append(Ball(700, 120, random(-4, 4), random(-4,4)))      
    if ((key == 'S') | (key == 's')):
        b.update()
    fill(0,100,0)
    rect(640,0,120,125)
    
    
 
    
    

def mouseClicked():
    global balls
    
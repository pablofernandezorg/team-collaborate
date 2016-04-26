"""
H11
By Tyler & Pablo
A&B: Start the flow of balls from the ball pipe using "a" (for add)
Stop them with "s" (for start)
Balls disappear after a while to prevent overloading anything
"""
from Ball import *

def setup():
    global source
    global Balls
    size(800,800)
    Balls = []
    source = loadImage("BACK.PNG")
    
def draw():
    global Balls, source
    background(source)
    for b in Balls:
        b.render()
        b.update()
        if b.isDead() == True:
            Balls.remove(b)
    if ((key == 'A') | (key == 'a')):
        if ((key != 'S') | (key != 's')):
            Balls.append(Ball(700, 70, random(-2, 2), random(-2,2)))
    fill(0,100,0)
    rect(640,0,120,125)

def keyPressed():
    global Balls
    
    
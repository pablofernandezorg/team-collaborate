"""
H11
By Tyler & Pablo
A&B:
"""
from Ball import *

def setup():
    global Balls
    size(500,800)
    Balls = []
    
def draw():
    global Balls
    background(255)
    for b in Balls:
        b.render()
        b.update()
        if b.isDead() == True:
            Balls.remove(b)

def mouseClicked():
    global Balls
    Balls.append(Ball(mouseX, mouseY,random(-2,2),random(-2,2)))
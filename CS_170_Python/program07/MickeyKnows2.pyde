"""
***********************************************
Pablo Fernandez 
Spencer Mueller
Program 07 Part 2
Copyright 2016, www.pablofernandez.com
***********************************************
"""

"""
Program Description
This program features a mickey mouse with an abstract rotating  
background that fades through colors.  Clicking on the 
screen will illuminate the mouses eyes. 
"""

import random

i = 0
t = 0
dt = 0.01
tri = None
n = 0
parta = random.randrange(0,256)
partb = random.randrange(0,256)
partc = random.randrange(0,256)

def setup():
    size(600,600)
    background(0)
    tri = []

def draw():
    global i,t, dt, tri, n, parta, partb, partc
    #Background
    if(n == 180):
        parta = random.randrange(0,256)
        partb = random.randrange(0,256)
        partc = random.randrange(0,256)
        n=0
    n = n + 1
    pushMatrix()
    translate(width/2, height/2)
    rotate(radians(i))
    translate(0,-height/12)
    fill(partc,partb,parta,200)
    stroke(partc,partb,parta,200)
    triangle(0,0,0,height/6,
             width/2-width/12,height/12)
    popMatrix()
    pushMatrix()
    translate(width/2, height/2)
    rotate(radians(360-i))
    translate(0,-height/12)
    fill(partb,parta,partc,200)
    stroke(partb,parta,partc,200)
    triangle(0,0,0,height/6,
             width/2-width/12,height/12)
    popMatrix()
    
    #Mickey Head
    pushMatrix()
    translate(0,height/3)
    fill(0)
    stroke(0)
    ellipse(width/2,150,230,230)

    fill(255,0,0)
    strokeWeight(1)
    stroke(255,0,0)
    arc(width/2,150,232,232,0,PI)

    fill(255,255,0)
    stroke(0)
    strokeWeight(1)
    ellipse(width/2-40,200,30,45)

    fill(255,255,0)
    stroke(0)
    ellipse(width/2+40,200,30,45)

    translate(-width/6,-height/3)
    fill(0)
    stroke(0)
    ellipse(width/2,230,115,115)

    translate(width/3,0)
    fill(0)
    stroke(0)
    ellipse(width/2,230,115,115)
    popMatrix()
    if i < 360:
        i+=6
    else:
        i = 0
    t += dt

def mousePressed():
    pushMatrix()
    translate(0,height/3)
    fill(255)
    stroke(0)
    ellipse(width/2+20,100,30,45)
    fill(0)
    stroke(0)
    ellipse(width/2+20,100,10,15)
    fill(255)
    stroke(0)
    ellipse(width/2-20,100,30,45)
    fill(0)
    stroke(0)
    ellipse(width/2-20,100,10,15)
    popMatrix()
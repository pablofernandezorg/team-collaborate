i = 0
t = 0
dt = 0.01


def setup():
    size(600,600)
    background(0)

def draw():
    global i,t, dt
    pushMatrix()
    translate(width/2, height/2)
    rotate(radians(i))
    translate(0,-height/12)
    fill(255,128,0,200)
    stroke(255,128,0,200)
    triangle(0,0,0,height/6,
             width/2-width/12,height/12)
    popMatrix()
    pushMatrix()
    translate(width/2, height/2)
    rotate(radians(360-i))
    translate(0,-height/12)
    fill(0,0,255,200)
    stroke(255,128,0,200)
    triangle(0,0,0,height/6,
             width/2-width/12,height/12)
    popMatrix()
    
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

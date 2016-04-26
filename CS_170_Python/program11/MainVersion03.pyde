from Vector import *
from Ball import *
    
def setup():
    size(800, 600)
    global balls
    balls = []
    
def draw():
    global balls
    background(255)
    for b in balls:    
        b.update()
        b.draw()
        
def mouseClicked():
    global balls
    balls.append(Ball(mouseX, mouseY, random(-10, 10), random(-10, 10)))      
    
class Ball:
    def __init__(self, px, py, vx, vy):
        self.px = px
        self.py = py
        self.vx = vx
        self.vy = vy
        self.ax = 0
        self.ay = 1
        self.radius = 50
        self.elasticity = 0.8
        
    def update(self):
        # Update velocity
        self.vx += self.ax
        self.vy += self.ay
        
        # Update position
        self.px += self.vx
        self.py += self.vy
        
        # top wall collision
        if(self.py < self.radius):
            self.py = 2*self.radius - self.py
            self.vy = -self.elasticity * self.vy
    
        # bottom wall collision
        if(self.py > height - self.radius):
            self.py = 2*(height-self.radius) - self.py
            self.vy = -self.elasticity * self.vy
        
        # # left wall collision
        # if(pos.get(x)<R):
        #     pos.setX(2*R - pos.getX())
        #     vel.setX(-E*vel.getX())
    
        # # right wall collision
        # if(pos.getX()>width-R):
        #     pos.setX(2*(width-R) - pos.getX())
        #     vel.setX(-E*vel.getX())
        
   
    def draw(self):
        fill(0)
        ellipse(self.px, self.py, 2*self.radius, 2*self.radius)
        
     
        






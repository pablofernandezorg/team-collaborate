from Vector import *

class Ball:
    def __init__(self,x,y,vx,vy):
        self.pos = Vector(x,y)
        self.vel = Vector(vx,vy)
        self.acc = Vector(0,1)
        self.c = color(random(255),random(255),random(255))
        self.radius = 10
        self.elasticity = 0.8
        self.dead = False
        self.life = 0
        self.inc = 1
    
    def isDead(self):
        return self.dead

    def render(self):
        fill(self.c)
        ellipse(self.pos.getX(),self.pos.getY(),2*self.radius,2*self.radius)
    
    def update(self):
        #Lifetime
        self.life += self.inc
        if self.life > 1000:
            self.dead = True
        
        # Update velocity
        self.vel += self.acc
        
        # Update position
        self.pos += self.vel
        
        # top wall collision
        if(self.pos.getY() < self.radius):
            self.pos.setY(2*self.radius - self.pos.getY())
            self.vel.setY(-self.elasticity * self.vel.getY())
    
        # bottom wall collision
        if(self.pos.getY() > height - self.radius):
            self.pos.setY(2*(height-self.radius) - self.pos.getY())
            self.vel.setY(-self.elasticity * self.vel.getY())
        
        # left wall collision
        if(self.pos.getX() < self.radius):
            self.pos.setX(2*self.radius - self.pos.getX())
            self.vel.setX(-self.elasticity*self.vel.getX())

        # right wall collision
        if(self.pos.getX()>width-self.radius):
            self.pos.setX(2*(width-self.radius) - self.pos.getX())
            self.vel.setX(-self.elasticity*self.vel.getX())
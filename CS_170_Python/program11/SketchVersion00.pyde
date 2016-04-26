
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
        #if b.isDead():
        #    BallList.remove(b)

def mouseClicked():
    global Balls
    Balls.append(Ball(mouseX, mouseY,random(-2,2),random(-2,2)))

class Ball:
    
    def __init__(self,x,y,vx,vy):
        self.x = x
        self.y = y
        self.vx = vx
        self.vy = vy
        self.ax = 0
        self.ay = 1
        self.c = color(random(255),random(255),random(255))
        self.radius = 10
        self.elasticity = 0.8
        self.isDead = None

    def render(self):
        fill(self.c)
        ellipse(self.x,self.y,2*self.radius,2*self.radius)
    
    def update(self):
        # Update velocity
        self.vx += self.ax
        self.vy += self.ay
        
        # Update position
        self.x += self.vx
        self.y += self.vy
        
        # top wall collision
        if(self.y < self.radius):
            self.y = 2*self.radius - self.y
            self.vy = -self.elasticity * self.vy
    
        # bottom wall collision
        if(self.y > height - self.radius):
            self.y = 2*(height-self.radius) - self.y
            self.vy = -self.elasticity * self.vy
        
        # left wall collision
        if(self.x < self.radius):
            self.x = (2*self.radius - self.x)
            self.vx = (-self.elasticity*self.vy)

        # right wall collision
        if(self.x>width-self.radius):
            self.x = (2*(width-self.radius) - self.x)
            self.vx = (-self.elasticity*self.vx)
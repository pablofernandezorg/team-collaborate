class Ball:
    def __init__(self, px, py, vx, vy):
        self.px = px
        self.py = py
        self.vx = vx
        self.vy = vy
        self.ax = 0
        self.ay = 1
        self.radius = 20
        self.elasticity = 0.8
        self.c = color(random(255), random(255), random(255))
        self.isDead = False

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
        if(self.py > (height-20) - self.radius):
            self.py = 2*((height-20)-self.radius) - self.py
            self.vy = -self.elasticity * self.vy
        
        # left wall collision
        if(self.px < self.radius):
            self.px = (2*self.radius - self.px)
            self.vx = (-self.elasticity*self.vy)
        

        # right wall collision
        if(self.px>width-self.radius):
            self.px = (2*(width-self.radius) - self.px)
            self.vx = (-self.elasticity*self.vx)
            

        # mousey             
        if((self.px>=mouseX) | (self.px<=mouseY)):
            print("Match")
            self.px = (2*(mouseY) - self.px)
            self.vx = (-self.elasticity*self.vx)
    
    def draw(self):
        fill(self.c)
        ellipse(self.px, self.py, 2*self.radius, 2*self.radius)
        
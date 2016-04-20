from star_data import *

def setup():
    """
    Renders the stars.
    """
    global coords
    coords = read_star_coords("stars.txt")
    size(800,800)
    ellipseMode(CENTER)
    background(0)  
    plot_stars_plain()
    
def coords_to_pixel(orig_x, orig_y):
    """
    Translates star coordinates, which range from -1.0 to 1.0, into pixel coordinates.
    """
    return ((1.0 + orig_x) * width/2, 
            (1.0 - orig_y) * height/2)

def plot_stars_plain():
    """
    Plots all stars as small white ellipses according to their locations.
    """
    global coords
    stroke(255)
    for (star_x,star_y) in coords.values():
        pixel_x, pixel_y = coords_to_pixel(star_x, star_y)
        ellipse(pixel_x, pixel_y, 2, 2)

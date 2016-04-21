from star_data import *

def setup():
    """
    Renders the stars.
    """
    global coords
    coords = read_star_coords("stars.txt")
    result = read_star_magnitudes("stars.txt")
    size(800,800)
    ellipseMode(CENTER)
    background(0)  
    colors_above_beyond = 0
    plot_stars_by_magnitude(result, colors_above_beyond) 
    
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
        
def plot_stars_by_magnitude(result, colors_above_beyond):
    global coords
        
    for key in coords:
        x_coord = (coords[key][0])
        y_coord = (coords[key][1])
        magnitude = result[key]      
        stroke(255)
        
        if(colors_above_beyond==1):
            if(round(magnitude,0)==3):
                fill(14,216,243)
            if(round(magnitude,0)==4):
                fill(15,41,185)
            if(round(magnitude,0)==5):
                fill(250,108,13)
            if(round(magnitude,0)==6):
                fill(254,30,30)
            if(round(magnitude,0)==7):
                fill(254,30,30)

        star_size = round(10.0 / (magnitude + 2))
        
        pixel_x, pixel_y = coords_to_pixel(x_coord, y_coord)
        ellipse(pixel_x, pixel_y, star_size, star_size)
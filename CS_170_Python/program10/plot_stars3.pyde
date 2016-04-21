from star_data import *

import os, sys

def setup():
    size(800,800)
    global incr, source
    incr = 0

def draw():
    """
    Renders the stars.
    """
    global coords, names
    bg = loadImage("Stars.png") 
    background(bg)
    
    coords = read_star_coords("stars.txt")
    result = read_star_magnitudes("stars.txt")
    names = read_star_names("stars.txt")

    ellipseMode(CENTER)
    
    colors_above_beyond = 1 # Change this to zero if you don't want color coded stars


    plot_stars_by_magnitude(result, colors_above_beyond) 

    stroke(255,255,0)

    lines = read_constellation_lines("BigDipper_lines.txt")
    plot_constellation(lines)
    lines = read_constellation_lines("Bootes_lines.txt")
    plot_constellation(lines)
    lines = read_constellation_lines("Cas_lines.txt")
    plot_constellation(lines)    
    lines = read_constellation_lines("Cyg_lines.txt")
    plot_constellation(lines)                       
    lines = read_constellation_lines("Gemini_lines.txt")
    plot_constellation(lines)                                                  
    lines = read_constellation_lines("Hydra_lines.txt")
    plot_constellation(lines)                                                  
    lines = read_constellation_lines("UrsaMajor_lines.txt")
    plot_constellation(lines)                                                  
    lines = read_constellation_lines("UrsaMinor_lines.txt")
    plot_constellation(lines)                                                  
                 
 # THIS IS COMMENTED OUT BECAUSE LISTDIR IS NOT BUILT INTO PYTHON IN PROCESSING
 # USING OS.LISTDIR would be the only way to use it, and this is from searching
 # on the web. We have choosen not to use it in this program. 
 #   stroke(255,255,0)
 #   for filename in os.listdir("."): 
 #       if filename.find("_lines") > 0: 
 #           lines = read_constellation_lines(filename)
 #           plot_constellation(lines)
    
    
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
            
            if(round(magnitude,0)==1):
                fill(14,216,243)
            if(round(magnitude,0)==2):
                fill(14,216,243)
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
        
def plot_constellation(constellation_lines):
    global coords, names
    for key in constellation_lines:
        keyname = names[key]
        keystar_x, keystar_y = coords[keyname]
        for nextstar in constellation_lines[key]:
                nextdraper = names[nextstar]
                nextstar_x, nextstar_y = coords[nextdraper]
                line(((1+keystar_x)*width/2),((1-keystar_y)*height/2),((1+nextstar_x)*width/2),((1-nextstar_y)*height/2))
                
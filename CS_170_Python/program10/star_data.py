def read_star_coords(filename):
    """
    Given the name of a file containing a star catalog in CSV format, produces a dictionary 
    where each key is an integer representing the Henry Draper number and each value is a 
    tuple of two floats, (x, y), representing the star's position.
    """
    result = {}                                 # Create a dictionary
    starfile = open(filename, "r")              # Open the file
    for dataline in starfile:                   # For each line
        items = dataline.strip().split(',')     # Split line into values
        print(items[0])
        x = float(items[0])                     # Get x and y
        y = float(items[1])             
        draper = int(items[3])                  # Get the Draper number
        result[draper] = (x,y)                  # Store in dictionary
    starfile.close()                            # Close the file
    return result
    
def read_star_magnitudes(filename):
    """
    Given the name of a file containing a star catalog in CSV format, produces a dictionary 
    where each key is an integer representing the Henry Draper number and each value is a 
    float representing the star's magnitude.
    """
    result = {}                                 # Create a dictionary
    starfile = open(filename, "r")              # Open the file
    for dataline in starfile:                   # For each line
        items = dataline.strip().split(',')     # Split line into values
        draper = int(items[3])
        magnitude = float(items[4])
        result[draper] = magnitude
    starfile.close()
    return result
        
def read_star_names(filename):
    
    """
    Given the name of a file containing a star catalog in CSV format, produces a dictionary 
    where the keys are the names of the stars and the values are Henry Draper numbers as integers.
    
    If a star has more than one name, each name will appear as a key 
    in the dictionary. If a star does not have a name it will not be 
    represented in this dictionary.
    """
    result = {}                                 # Create a dictionary
    starfile = open(filename, "r")              # Open the file
    for dataline in starfile:                   # For each line
        items = dataline.strip().split(",") 
        if(len(items)==7):
            name = str(items[6])
            draper = int(items[3])
            if(";" in name):
                multnames = name.split(';')
                for i in range(len(multnames)):
                    result[multnames[i]] = draper
            else:
                result[name] = draper
    starfile.close()
    return result

def read_constellation_lines(filename):
    """
    Given the name of a file that contains constellation data,
    produces a dictionary with star names as keys and lists of star names as values. 
    For each key, the associated list contains all stars connected by a line to the key star.
    """
    result = {}                                 # Create a dictionary
    starfile = open(filename, "r")              # Open the file
    ogstar = ""
    for dataline in starfile:                   # For each line
        items = dataline.strip().split(',')     # Split line into values
        if ogstar != items[0]:
            ogstar = str(items[0])
            constar = list()
        constar.append(str(items[1]))
        result[ogstar] = constar
        
        

    starfile.close()
    return result
    
if __name__=="__main__":
    import sys
    def test(did_pass):
        """  Print the result of a test.  """
        linenum = sys._getframe(1).f_lineno   # Get the caller's line number.
        if did_pass:
            msg = "Test at line {0} ok.".format(linenum)
        else:
            msg = ("Test at line {0} FAILED.".format(linenum))
        print(msg)
        
    # Test the read_star_coords function
    coords = read_star_coords("test_stars.txt")
    test(coords[123]==(0.35,0.45))
    test(coords[456]==(-0.15,0.25))
    test(coords[789]==(0.25,-0.1))
    
    # Test the read_star_magnitude function
    magnitude = read_star_magnitudes("test_stars.txt")
    test(magnitude[123]==2.01)
    test(magnitude[456]==3.2)
    test(magnitude[789]==4.3)

    # Test the read_star_names function
    name_to_draper = read_star_names("test_stars.txt")
    test(name_to_draper["ALPHA"]==123)
    test(name_to_draper["BETA"]==456)
    test(name_to_draper["GAMMA"]==789)
    test(name_to_draper["LITTLE STAR"]==789)

    # Test the read_constellation function
    constell_lines = read_constellation_lines("test_constell.txt")
    test(constell_lines["ALPHA"]==["BETA","GAMMA"])
    test(constell_lines["BETA"]==["GAMMA"])
    
    
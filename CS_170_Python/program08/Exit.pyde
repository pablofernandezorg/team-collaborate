def branch(h, theta):
    # Each branch will be 2/3rds the size of the previous one
    h *= 0.66
    #
    # Exit to recursive function
    if h > 2:
        # Save the current state of transformation (i.e. where are we now)
        pushMatrix()
        rotate(theta)  # Rotate by theta
        line(0, 0, 0, -h)  # Draw the branch
        translate(0, -h)  # Move to the end of the branch
        branch(h, theta)  # Ok, now call myself to draw two branches!!
        # Whenever we get back here, we "pop" in order to restore the previous
        # matrix state
        popMatrix()
        # Repeat the same thing, only branch off to the "left" this time!
        with pushMatrix():
            rotate(-theta)
            line(0, 0, 0, -h)
            translate(0, -h)
            branch(h, theta)
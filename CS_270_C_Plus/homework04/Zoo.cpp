
// FILE:  Zoo.cpp
// IMPLEMENTATION FILE FOR CLASS Zoo


#include "Zoo.h"

// Pre: none
// Post: member variables have been initialized and the pointer variable to cage has been
//       set to NULL.
Zoo :: Zoo()    
{ 
  
     // implement here....
     
     
}

// Pre: none
// Post: owner's name has been  "Nobody", 
//       or the string you give it.
//       count is set to 0.
//       cage pointer is set to NULL.
Zoo :: Zoo( string n )   
{ 
    // implement here....

	
}


// Pre: none
// Post: returns owner's name
string Zoo :: name() 

{
    // implement here....

}


// Pre: none
// Post: Zoo Object has been initialized as an exact copy of z.
Zoo :: Zoo(const Zoo& z) {

// implement here....


}

// Pre: none
// Modifies: self
// Post: Copied all animals to self. Does not change owner.
void Zoo :: operator=(const Zoo& z)

{
   
    // implement here....
    
}

// Pre: none
// Post: returns an object of Zoo with same owner and animals of z,
//       animal a added to the end.

Zoo operator+(const Zoo& z, string a) // FRIEND FUNCTION

{    
   
    
    // implement here....
    
    

}


// Pre: none
// Post: prints out z's contents (animal1, animal2, etc.), 
//       and returns out stream.
ostream& operator<<(ostream& out, const Zoo& z) // FRIEND FUNCTION

{
   out << z.owner << "'s" <<" Zoo " << '('<< z.count << " animals "
       << ')' << ':' <<endl;
   for (int i=0; i<z.count; i++)
   {
      out<< z.cage[i];
      out<< endl;
   }
   return out;
}


//Pre: none
//Post: the memory of cage has been released.	
Zoo :: ~Zoo()       
{
    
// implement here....
    
    
    
}

// Pre: none
// Post: returns true if animal a is in Zoo z.
//       the owner does not count as an animal.

bool operator<=(string a, const Zoo& z) // FRIEND FUNCTION
{
    
 // implement here....


 }

//Pre:  none
//Post: returns an object of Zoo with same owner and animals of z,
//      animal a added to the end.

Zoo operator+(string a, const Zoo& z) // NONMEMBER FUNCTION

{
    
   // implement here....
    
    
}

//Pre: none
//Modifies: z
//Post: z has same animals and owner, animal a added to the end.
void operator+=(Zoo& z, string a) // NONMEMBER FUNCTION
{
    z = z + a;	
}




// Name: 
// User Name: 
// hw#: 


// File: Zoo.h
//
// A Zoo has an owner and animals in the order they were caught.
//
// A new Zoo has no animals and owner is the string you give it.

// A Zoo has an owner and animals in the order they were caught.
//
// A new Zoo has no animals and owner "Nobody", or the string you give it.
//
// Zoo += string:  add animal to end, no return val
//
// string + Zoo :    These are the same. They return a new Zoo with
// Zoo + string :  that animal added to the end and the same owner.
//              :    They both need to be written since the computer
//              :  won't automatically switch parameters.
//
// string <= Zoo:  Test for membership - true if animal is in Zoo.
//              :  "eel" <= John's[pig eel bat] is true.
//
// cout << Zoo  :  prints:   owner's Zoo (X animals):
//                           1 animal/line


#ifndef ZOO_H
#define ZOO_H

#include <iostream>
#include <string>
using namespace std;

class Zoo {
  private:
    string owner;    // owner's name
    string *cage;    // dynamic array of animals, 1 string/animal
    int count;       // # of animals in Zoo, size of cage

  public:
	
	// Pre: none
	// Post: member variables have been initialized and the pointer variable to cage has been
	//       set to NULL.
   Zoo();    // Constructor 1  
    
	
	// Pre: none
	// Post: owner's name has been  "Nobody", 
	//       or the string you give it.
	//       count is set to 0.
	//       cage pointer is set to NULL.
	 Zoo(string n="Nobody");  // Constructor 2   
   
	
    // Pre: none
	// Post: Zoo Object has been initialized as an exact copy of z.
	 Zoo(const Zoo&);         // copy constructor
	
	
	//Pre: none
	//Post: the memory of cage has been released.	
    ~Zoo();       // destructor
    
	
	// Pre: none
    // Post: returns owner's name
      string name();   // MEMBER FUNCTIONS
   
    
	// Pre: none
    // Modifies: self
    // Post: Copy's all animals to self. Does not change owner.
     void operator=(const Zoo& z); // assignment operator
   
   
	// Pre: none
    // Post: returns a Zoo object with same owner and animals,
    //       animal a added to the end.
     friend Zoo operator+(const Zoo& z, string a); // FRIEND FUNCTION
   
    
	// Pre: none
    // Post: prints out z's contents (animal1, animal2, etc.), 
    //       and returns out stream.    
	friend ostream& operator<<(ostream& out, const Zoo& z); // FRIEND FUNCTION
   
	// Pre: none
    // Post: returns true if animal a is in Zoo z.
    //       the owner does not count as an animal.
   
   friend bool operator<=(string a, const Zoo& z);  // FRIEND FUNCTION
   

 };  // end class Zoo



// Pre: none
// Post: returns z with same owner and animals,
//       animal a added to the end.
Zoo operator+(string a, const Zoo&);  // NONMEMBER FUNCTION


// Pre: none
// Modifies: z
// Post: z has same animals and owner,
//       animal a added to the end.
//       returns the modified z.
void operator+=(Zoo& z, string a); // NONMEMBER FUNCTION


 #endif
 
 
 

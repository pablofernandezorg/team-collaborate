//
//  fernanpa_hw1.cpp
//  Program HW1
//
//  Copyright © 2016 Pablo Fernandez.
//  All rights reserved. www.pablofernandez.com

#include <iostream>
#include <string>
#include <sstream>

using namespace std;

int author ()
{
    std::cout << "*********************************\n";
    std::cout << "Pablo Fernandez\n";
    std::cout << "Program: HW1\n";
    std::cout << "*********************************\n";
    return 0;
}

int main() {
    author();
    
    string user_exit = "False";
    string input = "";
    string opposite = "";
    
    while (user_exit == "False")
    {
    std::cout << "\nType (quit) to exit the program\n";
    
    string lower_case [] = { "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"};
    string upper_case [] = { "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"};

    std::cout << "\n\n\nPlease enter any letter: ";
    getline (cin,input);
        
    if ((input == "quit") || (input == "QUIT"))
    { break; }
        
    int flag = 0;

    for(int i=0; i<26; i++)
    {
        if (lower_case[i] == input)
        {
            flag = 1;
            opposite = upper_case[i];
            break ;
        }
    }
    
    for(int i=0; i<26; i++)
    {
        if (upper_case[i] == input)
        {
            flag = 1;
            opposite = lower_case[i];
            break ;
        }
    }
    
    cout<< "\nResults \n";
    cout<< "-----------------------------------------------\n";
    if (flag)
    {
        cout<< "Your letter: " << input <<"\n";
        cout<< "Your letter converted: " << opposite <<"\n";
    }
    else
    {
        cout<< "Sorry, your input is not a letter. "<<endl<<endl;
        
    }
    
    }
}

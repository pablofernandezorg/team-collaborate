#include <iostream>

using namespace std;

// This function names the author of the current program
void author ()
{
    std::cout << "*********************************\n";
    std::cout << "Pablo Fernandez\n";
    std::cout << "Program: HW1\n";
    std::cout << "*********************************\n";
}

int main()
{
    author();

    //string user_exit = "False";
    string input = "";
    string opposite = "";
   
    while (true)
    {
        
        string lower_case [] = { "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"};
        string upper_case [] = { "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"};
        
        std::cout << "\nType (quit) to exit the program\n";
        std::cout << "\nPlease enter any letter: ";
        getline (cin,input);
        
        //if ((input == "quit") || (input == "QUIT"))
        //{   user_exit = "True";
        //    break;
        //}
        
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
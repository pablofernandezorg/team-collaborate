#include <iostream>
#include <fstream>
#include <string>
using namespace std;


int main()
{

enum Choice {LETTER,NUMBER,QUIT};

const int NAME_LEN = 20;

typedef char Name[NAME_LEN+1];

  struct Entry {
   Name name;
    int  PN;
  };

/*
int count = 0;
    while(count<10)
  {
    number = number +1;
    Entry number = { "Pablo", 6263548};
    cout << entry.name;
    cout << entry.PN;
  }

*/

    int count_entires = 0;
    string num = "";    
    string data = "";
                                                                      
    ifstream infile;                                                              
    infile.open("phonenum.txt");                                                

    if(infile.fail())
      {
             cout<<"The file could not be opened!\n";
             exit(1); // 0 – normal exit, non zero – some error
      }


    int count_entry = 0;
    int loop = 0;

    string part_1 = "";
    int part_2 = 0;

    while (!infile.eof()) {    

      if(loop == 0)
          {
        infile >> num;  
        cout << "\nLoop 0 num " << num;
        string part_1 = num;
        loop = 1;
          }
        else
          {
        infile >> num;  
        cout << "\nLoop 1 num " << num;
        int part_2 = atoi(num.c_str());
        loop = 0;

              cout << "\n----Part 1" << part_1;
              cout << "\n----Part 2 " << part_2;

            count_entry ++;
            Entry count_entry = {"Name", part_2}; 

            cout << "\n***********" << count_entry.name;
            cout << "\n***********" << count_entry.PN;

            string part_1;
            part_2 = 0;

          }

      }                 


    infile.close();  

    int Google = 1;
    cout << "\n-----------------------------" << Google.PN;
    cout << "\n-----------------------------" << Google.name;




}
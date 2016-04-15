
// Name: 
// User Name: 
// hw#: 


#include <fstream>
#include<iostream>
using namespace std;

enum Choice {LETTER,NUMBER,QUIT};

const int NAME_LEN = 20;

typedef char Name[NAME_LEN+1];

struct Entry {
  Name name;
  int  PN;
};

//Pre: file "phonenum.txt" must be in directory
//Post: opens file, reads all name/phone-number pairs,
//      and returns how many there were.
int ReadPNs(Entry[]);
    
//Post: prints out the names of the people with that phone number.
//      prints nothing if that number isn't in the list.
void NumList(const Entry[],int size,int num);

//Post: prints all the name/phone number pairs of everyone whose
//      name starts with that letter.
void LetterList(const Entry[],int size,char ch);

//Pre: int must be at most 7 digits
//Post: prints out as 7-digit phone number (no \n at end.)
void ShowPN(int);

//Post: prints the menu
void Menu();


int main()
{
  
  Entry L[50];
  int size, numChoice;
  char ch;
  int num;
  
  size = ReadPNs(L);
  numChoice=0;
  while (numChoice != QUIT + 1) {
    Menu();
    cin >> numChoice;     
    switch (numChoice) {
    case  LETTER+1 : 
      cout << "Enter initial:";
      cin >> ch;
      LetterList ( L, size, ch );
      break;
    case  NUMBER+1:
      cout << "Enter number as 7 digits:";
      cin >> num;
      NumList ( L, size, num );
      break;
    case QUIT+1: 
      cout << "Thank you!" << endl;
      break;
    default:
      cerr << "Not an Option!" << endl;
      break; 
    }
  }  
  return 0;
}

void NumList(const Entry L[],int size,int num)
{
	// ....
	
}

void LetterList(const Entry L[],int size,char ch)
{

	// ....
}

void ShowPN(int n)
  {
	  
	 	// ....
  }

int ReadPNs(Entry L[])
  {
    int count_entires = 0;
    string num = "";                                                                      
    ifstream infile;                                                              
    infile.open("phonenum.txt");                                                
    infile >> num;    
    while(!infile.eof()){                                                       
       cout << num << endl;                                                      
       infile >> num;                                                            
      }                                                                           
    infile.close();  

	  return count_entires;
  }

void Menu()
  {

   cout<<endl;
   cout<<"Enter "<<LETTER+1<<" to look up names starting"
       <<" with a certain letter\n";
   cout<<"      "<<NUMBER+1<<" to look up a number\n";
   cout<<"      "<<QUIT+1<<" to quit\n";
   cout<<"    ";
  }


#include <iostream>

using namespace std;

// This function names the author of the current program
void author ()
{
    std::cout << "*********************************\n";
    std::cout << "Pablo Fernandez\n";
    std::cout << "Program: HW2\n";
    std::cout << "*********************************\n";
}

bool isPrime(int x)
{
	int counter = 0;
	int maximum = 0;

	counter = 2;
	maximum = (x-1);
	while(counter<maximum)
	{
		if(x % counter == 0)
		{
			return false;
		}
	counter = counter + 1;
	}

	return true; 
}

int main()
{
    author();

    int input;
    bool result;

    std::cout.setf(std::ios::boolalpha);

    while (true)
    {
        std::cout<< "\n\n";
     	std::cout << "\nEnter a number greater than 1 and less than 100000: ";
        std::cin  >> input;

        while((input<=1) || (input>=100000))
        {
        	    std::cout<< "Sorry, your input is not valid."<<endl<<endl;
                std::cout<< "\n\n";
        	    std::cout << "\nEnter a number greater than 1 and less than 100000: ";
                std::cin  >> input;
        }

    result = isPrime(input);
    cout<< "\nResults \n";
    cout<< "-----------------------------------------------\n";

    if(result==true)
    {
        cout<< "True, Your number " << input << " is Prime!";
    }
    if(result==false)
    {
        cout<< "False, your number " << input << " is not Prime!";
    }
    }
}
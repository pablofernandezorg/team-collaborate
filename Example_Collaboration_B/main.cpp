
//@Jing, Yaping          ------------------------------


#include "Zoo.h"


int main()
{
    cout<<"*****Starting test"<<endl;
    
    cout<<"*****Calling default constructor"<<endl;
    Zoo a;
    
    cout<<"*****Calling constructor 1"<<endl;
    Zoo b("Uncle Tony");
    
    cout << "*****Zoo's names are:" << a.name() << " "
    << b.name() << endl;
    
    cout << endl << "*****Test printing:" << endl;
    cout << a;
    cout << b;
    
    cout << "*****Test assign & Zoo+animal" << endl;
    a = a + "tiger";
    cout << a << endl;
    
    string s1 = "mink";
    string s2 = "rat";
    string s3 = "monkey";
    
    a = a + s1 + s2;
    cout << a << endl ;
    
    b =a;
    
    cout << b << endl;
    
    
    cout << "is mink in Zoo a? " << (s1 <= a) << endl;
    cout << "is rat in Zoo a? " << (s2 <= a) << endl;
    cout << "is monkey in Zoo a? " << (s3 <= a) << endl;
    
    a += s3;
    cout << "is monkey in Zoo a? " << (s3 <= a) << endl;
    
    
    a= "squid" + a;
    cout << a << endl;
    
    return 0;
    
    
}








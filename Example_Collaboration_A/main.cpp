#include "SimpleProgramGrades.h"
#include <iostream>
#include <string>
using namespace std;

int main()
{
	std::cout << "Enter student name: ";
	string studentName;
	getline(std::cin, studentName);
	StudentRecord sR = StudentRecord(studentName);
	sR.readFromFile();
	int option = 0;
	while (option != 6)
	{
		std::cout << "Choose an option:" << std::endl;
		std::cout << "1. Add a course" << std::endl;
		std::cout << "2. Delete a course" << std::endl;
		std::cout << "3. Detect a duplicate course" << std::endl;
		std::cout << "4. Calculate grade point average (GPA)" << std::endl;
		std::cout << "5. Print student record" << std::endl;
		std::cout << "6. Quit" << std::endl;
		std::cin >> option;
		switch (option)
		{
		case 1:
			sR.addCourse();
			break;
		case 2:
			sR.deleteCourse();
			break;
		case 3:
			sR.detectDuplicate();
			break;
		case 4:
			std::cout << "GPA: ";
			sR.calculateGPA();
			std::cout <<endl;
			break;
		case 5:
			sR.printRecord();
			break;
		case 6:
			sR.saveToFile();
			break;
		default:
			break;
		}
	}
}

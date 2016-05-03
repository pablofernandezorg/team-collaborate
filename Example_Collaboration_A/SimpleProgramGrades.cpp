#include "SimpleProgramGrades.h"
#include <iostream>
#include <string>
#include <fstream>
#include <sstream>
#include <stdlib.h>
#include <string.h> 
StudentRecord::StudentRecord(std::string name)
{
	this->name = name;
	coursesList = NULL;
	fileName = "data.txt";
}


StudentRecord::~StudentRecord(void)
{
	delete coursesList;
	coursesList = NULL;
}

void StudentRecord::addCourse()
{
	struct Course* newCourse = (Course*)malloc(sizeof(struct Course));
	newCourse->nextCourse = NULL;
	std::cout << "Enter name of course: ";
	std::cin >> newCourse->courseName;
	std::cout << "Enter number of credits: ";
	std::cin >> newCourse->numberOfCredits;

	std::cout << "Enter course grade: ";
	std::cin >> newCourse->courseGrade;

	if (coursesList == NULL)
	{
		coursesList = newCourse;
		return;
	}
	Course* temp = coursesList;
	while (temp->nextCourse != NULL)
		temp = temp->nextCourse;
	temp->nextCourse = newCourse;
}

void StudentRecord::deleteCourse()
{
	char courseName[10];
	std::cout <<"Enter course name to delete: ";
	std::cin >> courseName;
	Course *temp = coursesList;
	if (temp != NULL && strcmp(temp->courseName, courseName) == 0)
	{
		coursesList = coursesList->nextCourse;
		delete temp;
		std::cout << "Course deleted successfully" << std::endl;
		return;
	}
	while (temp != NULL)
	{
		if (temp->nextCourse != NULL && strcmp(temp->nextCourse->courseName, courseName) == 0)
		{
			Course *toBeDelete = temp->nextCourse;
			temp->nextCourse = temp->nextCourse->nextCourse;
			delete toBeDelete;
			std::cout << "Course deleted successfully" << std::endl;
			return;
		}
		temp = temp->nextCourse;
	}
	std::cout << "Course not found" << std::endl;
}

void StudentRecord::detectDuplicate()
{
	std::cout << "Duplicate course: [";
	int i = 0;
	Course* temp = coursesList;
	while (temp != NULL)
	{
		Course* temp1 = temp->nextCourse;
		while (temp1 != NULL)
		{
			if (strcmp(temp->courseName, temp1->courseName) == 0)
			{
				if (i != 0)
				{
					std::cout << ", ";
				}
				i++;
				std::cout << temp1->courseName;
				break;
			}
			temp1 = temp1->nextCourse;
		}
		temp = temp->nextCourse;
	}

	std::cout << "]" << std::endl;
}

void StudentRecord::calculateGPA()
{
	double totalCredits = 0.0;
	double earnedCredits = 0.0;
	Course* temp = coursesList;
	while (temp != NULL)
	{
		totalCredits += temp->numberOfCredits;
		earnedCredits += (temp->numberOfCredits * temp->courseGrade);
		temp = temp->nextCourse;
	}
	if (totalCredits != 0)
	{	
		printf("%.1f", (earnedCredits / totalCredits));
		std::cout << "/4.0";
	}
	else
		std::cout << "0.0/0.0";
}

void StudentRecord::printRecord()
{
	std::cout << "Student: " << name << std::endl;
	
	std::cout << "         GPA: ";
	calculateGPA();
	std::cout << std::endl;

	std::cout << "         Courses Taken: ";
	Course* temp = coursesList;
	while (temp != NULL)
	{
		std::cout << temp->courseName;
		temp = temp->nextCourse;
		if (temp != NULL)
			std::cout << ", ";
	}
	if (coursesList != NULL)
		std::cout << "." << std::endl;
	else
		std::cout << "No courses found." << std::endl;
}

void StudentRecord::readFromFile()
{
	std::ifstream f(fileName.c_str());

	std::string line, command;
	getline(f, name);
	
	if (coursesList != NULL) delete coursesList;
	
	coursesList = NULL;

	Course* temp = coursesList;
	
	while (getline(f, line))
	{
		std::istringstream is(line);
		
		struct Course* newCourse = (Course*)malloc(sizeof(struct Course));
		newCourse->nextCourse = NULL;
		is >> newCourse->courseName;
		is >> newCourse->numberOfCredits;
		is >> newCourse->courseGrade;

		if (coursesList == NULL)
		{
			coursesList = newCourse;
			temp = coursesList;
			continue;
		}
		temp->nextCourse = newCourse;
		temp = temp->nextCourse;
	}

	f.close();	
}

void StudentRecord::saveToFile()
{
	std::ofstream fs(fileName.c_str());

	fs << name << std::endl;
	Course *temp = coursesList;
	
	while (temp != NULL)
	{
		fs << temp->courseName;
		fs << " ";
		fs << temp->numberOfCredits;
		fs << " ";
		fs << temp->courseGrade;
		fs << std::endl;
		temp = temp->nextCourse;
	}

	fs.close();
}

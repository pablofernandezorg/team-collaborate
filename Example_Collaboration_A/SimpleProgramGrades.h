#pragma once
#include <string>

struct Course
{
	char courseName[10];
	double numberOfCredits;
	double courseGrade;
	Course* nextCourse;
};

class StudentRecord
{
public:
	StudentRecord(std::string name);
	~StudentRecord(void);
	void addCourse();
	void deleteCourse();
	void detectDuplicate();
	void calculateGPA();
	void printRecord();
	void saveToFile();
	void readFromFile();
private:
	std::string name;
	std::string fileName;
	Course *coursesList;
};

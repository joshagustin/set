CREATE DATABASE seteval;
USE seteval;

CREATE TABLE Student (
    student_ID INT PRIMARY KEY,
    student_Name VARCHAR(100),
    prog_ID INT,
    year_Level INT
);

-- Create the Instructor table
CREATE TABLE Instructor (
    instructor_ID INT PRIMARY KEY,
    instructor_Name VARCHAR(100),
    course_ID INT,
    dept VARCHAR(100)
);

-- Create the Course table
CREATE TABLE Course (
    course_ID INT PRIMARY KEY,
    course_Num VARCHAR(10),
    course_Title VARCHAR(100),
    class_Section CHAR(1)
);

-- Create the Questionnaire table
CREATE TABLE Questionnaire (
    question_ID INT PRIMARY KEY,
    questions VARCHAR(255)
);

-- Create the Evaluation table
CREATE TABLE Evaluation (
    eval_ID INT PRIMARY KEY,
    date_ID DATE,
    student_ID INT,
    instructor_ID INT,
    course_ID INT,
    FOREIGN KEY (student_ID) REFERENCES Student(student_ID) ON DELETE CASCADE,
    FOREIGN KEY (instructor_ID) REFERENCES Instructor(instructor_ID) ON DELETE CASCADE,
    FOREIGN KEY (course_ID) REFERENCES Course(course_ID) ON DELETE CASCADE
);

-- Create the Student's Response table
CREATE TABLE Student_Response (
    response_ID INT PRIMARY KEY,
    question_ID INT,
    evaluation_ID INT,
    quest_Rating VARCHAR(50),
    comm_sugg VARCHAR(255),
    FOREIGN KEY (question_ID) REFERENCES Questionnaire(question_ID) ON DELETE CASCADE,
    FOREIGN KEY (evaluation_ID) REFERENCES Evaluation(eval_ID) ON DELETE CASCADE
);

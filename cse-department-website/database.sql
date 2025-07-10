CREATE DATABASE cse_department;
USE cse_department;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Plain text password
    email VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert admin user with plain text password
INSERT INTO admins (username, password, email, role, created_at) 
VALUES ('admin', 'Siva@2004', 'admin@esec.ac.in', 'superadmin', '2025-07-10 23:02:38');

-- Rest of the database schema remains unchanged
CREATE TABLE faculty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    designation VARCHAR(50) NOT NULL,
    qualification VARCHAR(100) NOT NULL,
    experience INT,
    research_interests TEXT,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    photo VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    batch VARCHAR(10) NOT NULL,
    roll_number VARCHAR(20) NOT NULL UNIQUE,
    achievements TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE placements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    company VARCHAR(100) NOT NULL,
    package VARCHAR(50),
    year INT NOT NULL,
    photo VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    date DATE NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date DATE NOT NULL,
    time TIME,
    venue VARCHAR(100),
    image VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    category VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_code VARCHAR(20) NOT NULL,
    semester INT NOT NULL,
    credits INT NOT NULL,
    syllabus TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE facilities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    specifications TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE research (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    faculty_id INT,
    status ENUM('ongoing', 'completed') DEFAULT 'ongoing',
    start_date DATE,
    end_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (faculty_id) REFERENCES faculty(id)
);

CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_name VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data for other tables
INSERT INTO faculty (name, designation, qualification, email, photo) VALUES ('Dr. John Doe', 'Professor', 'PhD', 'john@esec.ac.in', 'john.jpg');
INSERT INTO students (name, batch, roll_number, achievements) VALUES ('Jane Doe', '2021-2025', 'CSE001', 'Top Coder 2023');
INSERT INTO placements (student_name, company, package, year) VALUES ('Jane Doe', 'TCS', '7 LPA', 2025);
INSERT INTO news (title, content, image, date) VALUES ('New AI Lab Inaugurated', 'AI lab opened with advanced facilities.', 'ai_lab.jpg', '2025-07-10');
INSERT INTO events (title, description, date, venue, image) VALUES ('Tech Fest 2025', 'Annual technical fest.', '2025-08-15', 'Main Auditorium', 'tech_fest.jpg');
INSERT INTO gallery (title, image, category) VALUES ('Tech Fest 2024', 'tech_fest_2024.jpg', 'Events');
INSERT INTO courses (course_name, course_code, semester, credits) VALUES ('Data Structures', 'CS101', 3, 4);
INSERT INTO facilities (name, description) VALUES ('AI Lab', 'Equipped with GPUs and advanced software.');
INSERT INTO settings (setting_name, setting_value) VALUES ('site_title', 'CSE Department');
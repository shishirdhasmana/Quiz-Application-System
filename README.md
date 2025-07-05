# Quiz Application System

A web-based quiz platform developed during an internship at IRDE, DRDO. This system enables administrators to manage quizzes and users to participate in timed, category-based quizzes through a simple and responsive web interface.

## Features

### User
- User registration and login
- Select quizzes from multiple categories
- Take quizzes with real-time countdown timer
- Automatic evaluation and result display (correct/wrong answers)

### Admin
- Secure admin login
- Create, edit, and delete quiz categories
- Add/edit questions with or without images
- View and analyze user results

## Technology Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL (managed via phpMyAdmin)
- **Server:** XAMPP (Apache)
- **Code Editor:** Visual Studio Code
- **Version Control:** Git & GitHub

## System Architecture

The application follows a three-tier architecture:

- **Presentation Layer:** User interface with HTML/CSS/JS
- **Application Layer:** Backend logic with PHP
- **Data Layer:** MySQL database for storing user data, questions, and results

## Setup Instructions

1. Clone the repository:
git clone https://github.com/your-username/quiz-application-system.git

2. Move the project folder to your XAMPP `htdocs` directory.

3. Start Apache and MySQL from the XAMPP Control Panel.

4. Import the SQL database (if provided):
- Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Create a new database (e.g., `quiz_db`)
- Import the SQL file included in the project

5. Run the project in your browser:
http://localhost/quiz-application-system/

## Developer

**Shishir Dhasmana**  
B.Tech CSE, Graphic Era Deemed University  
Intern at Instruments Research & Development Establishment (IRDE), DRDO  
Guided by Mr. Sanjeev Shekhar (Scientist ‘F’)

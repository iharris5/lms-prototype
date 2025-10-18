# AI-Powered LMS Prototype (K–12 Education)

This is a prototype of a Learning Management System (LMS) designed for K–12 education. It includes AI-powered grading, personalized study recommendations, and role-based access for both students and teachers.

---

## Features

- Short-answer quiz
- AI-powered grading using Cohere
- Personalized study suggestions after each quiz
- Student interface with simple quiz flow
- Teacher dashboard to view all student attempts
- Role-based access with basic session-based login
- Session-based data (no database required)
- Clean UI with clear feedback and navigation

---

## AI Integration

Powered by Cohere's large language models (`command-a-03-2025`), the LMS uses natural language prompts to:

1. Grade answers on a scale from 1 to 10 with feedback
2. Suggest the next topic for the student to study

---

## Technologies Used

- PHP (lightweight MVC pattern)
- HTML/CSS
- Cohere AI API
- PHP sessions
- No database — data is stored in memory (for prototype purposes)

---

## Local Setup Instructions (XAMPP or PHP built-in server)

1. Clone the repository:

    ```bash
    git clone https://github.com/iharris5/lms-prototype.git
    cd lms-prototype
    ```

2. Configure your API key:

    In `config/api.php`, replace the placeholder with your Cohere API key:

    ```php
    define('COHERE_API_KEY', 'your-api-key-here');
    ```

3. Run it locally:

    Using XAMPP:
    - Place the project folder inside `htdocs`
    - Access via: `http://localhost/lms-prototype/public`

    Or using PHP's built-in server:

    ```bash
    cd public
    php -S localhost:8000
    ```

    Then open: `http://localhost:8000` in your browser

---

## How to Use

1. Start at the role selection page (`/role`)
2. Choose either Student or Teacher
3. As a student:
   - Enter a name
   - Submit a short-answer response
   - Receive AI-generated feedback and a study recommendation
4. As a teacher:
   - View all student submissions
   - Clear quiz history if needed
5. Use the Logout button to return to the role selection page

---


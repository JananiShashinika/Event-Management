# Event Management System

## Overview
The Event Management System is a Laravel-based web application designed to help users organize, manage, and track events efficiently.

## Features
- User Authentication (Login/Register)
- Event Creation and Management
- Attendee Registration
- Role-Based Access Control (Admin, Organizer, User)
- Notifications and Reminders
- Dashboard with Event Analytics
- Payment Integration (if applicable)

## Installation

1. **Clone the Repository**
   ```sh
   git clone https://github.com/yourusername/EventManagementSystem.git
   cd EventManagementSystem
   ```

2. **Install Dependencies**
   ```sh
   composer install
   npm install
   ```

3. **Set Up Environment File**
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**
   - Open `.env` and set your database details:
     ```ini
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=event_db
     DB_USERNAME=root
     DB_PASSWORD=yourpassword
     ```
   - Run migrations:
     ```sh
     php artisan migrate --seed
     ```

5. **Run the Application**
   ```sh
   php artisan serve
   ```

## Usage
- Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.
- Register/Login to start managing events.

## Technologies Used
- Laravel 10+
- Bootstrap / Tailwind CSS
- MySQL
- JavaScript (if applicable)

## Contribution
Feel free to fork and submit pull requests.

## License
This project is licensed under the MIT License.

# Laravel Event Booking System

This Laravel application is designed to handles event creation, ticket booking, and seat availability management. Additionally, ensure that the system can handle multiple users attempting to book tickets simultaneously without causing overbooking.

## Features

- **Event creation**
- **Ticket booking**
- **Seat availability management**

## Prerequisites

Ensure you have the following software installed on your machine:

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL or another supported database

## Installation

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/Reyajul-Islam/event-booking-system.git
cd event-booking-system
```

### 2. Install Dependencies

```bash
composer install
npm install
npm run dev
```

### 3. Set Up Environment Variables

cp .env.example .env

DB_DATABASE=your_database <br />
DB_USERNAME=your_username <br />
DB_PASSWORD=your_password <br /><br />


### 4. Migrating Database

```bash
php artisan migrate
```

```bash
php artisan db:seed
```
### 5. Accessing the Application

```bash
php artisan serve
```

Navigate to http://127.0.0.1:8000/ in your web browser.
Then login as admin user using below credentials:<br />
Email: admin@example.com <br />
Password: 12345678


#Contributing
Contributions are welcome! Please submit issues and pull requests for improvements or fixes.

#License
This project is licensed under the MIT License.

### Summary of Sections

- **Features:** Lists the main functionalities of the application.
- **Prerequisites:** Details the software requirements.
- **Installation:** Provides step-by-step instructions for setting up the application.
- **Usage:** Explains how to start and use the application.
- **License:** Mentions the project's licensing.

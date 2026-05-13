# Client Enquiry Management Tool

A simple Laravel application for managing client enquiries for an internal team.

## Features

- Submit a new enquiry
- Store enquiries in the database
- View all submitted enquiries
- View full enquiry details
- Edit enquiry information
- Delete enquiries
- Update enquiry status
- Filter enquiries by status
- Filter enquiries by service
- Search enquiries by name, email, phone
- Dashboard showing enquiry statistics
- Seeder with sample enquiry data

## Technologies Used

- PHP
- Laravel
- Blade
- HTML
- CSS
- Bootstrap 5
- MySQL

## Installation and Setup

-  Download the ZIP file or clone the repository. 
-  Navigate to the Project Directory: cd Bluefuse 
-  Install Dependencies : composer install 
- Create the .env File: Copy the .env.example file and rename it to .env 
-  Generate the Application Key: php artisan key:generate 
-  Create a Database locally 
-  Run database migrations : php artisan migrate 
-  Seed the Database : php artisan db:seed 
-  Start the Application: php artisan serve 
-  Open your browser and access: http://127.0.0.1:8000

## Configuration
-  Update .env with Database Credentials

## How the Application Works

- The admin team can submit a new client enquiry using the enquiry form. Each enquiry is saved in the database with a default status of New.
Admins can view all enquiries, search and filter them, open the full enquiry details, edit enquiry information, change the status to New, Reviewed or Closed, and delete enquiries when needed.
The dashboard shows a summary of total, new, reviewed and closed enquiries, as well as the latest new enquiries.

## Notes

- If I had more time, I would add login and user roles. Admin users would be able to manage all enquiries, and normal users would be able to submit and view their own enquiries. 
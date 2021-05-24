# Accounting System:
A major exercise to management information systems

# How to start the project:
Step1: Do something with laravel framework:
- Clone the Repo
- Make sure you have wamp or xamp or lamp
- run composer install
- inside .env update mysql connection parameters for DB_CONNECTION and DB_CORE_xxx sections (use a different database for the laravel part, - e.g. accountNew)

Step2: Prepare for the database:
- create a database( with same name in .env file: DB_DATABASE=ketoan
  DB_USERNAME=demo1
  DB_PASSWORD=admin123)
- run php artisan migrate:fresh --seed (this will create the tables in accountNew and populate them)
  
Step3: Launch the project
- run npm install
- run npm run dev
- run php artisan serve (this will serve the project, usually at http://127.0.0.1:8000)
- visit the local site
- sign-on with username : me and password: password
- After all, update ".env" in the .ignore file, thanks!

# Setup Instructions — Student Registration System

These files are the **application code only**. Follow these steps to drop them into a working Laravel project.

## 1. Create a fresh Laravel project
```bash
composer create-project laravel/laravel week04-student-registration
cd week04-student-registration
```

## 2. Configure your database
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_registration
DB_USERNAME=root
DB_PASSWORD=
```
Create the `student_registration` database in MySQL (phpMyAdmin, TablePlus, or CLI).

## 3. Copy in these files
Copy each file from this package into the matching path in your new Laravel project, overwriting where needed:

- `database/migrations/2026_08_28_000000_create_students_table.php`
- `app/Models/Student.php`
- `app/Http/Controllers/StudentController.php`
- `routes/web.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/students/create.blade.php`
- `resources/views/students/show.blade.php`
- `resources/views/students/index.blade.php`

## 4. Run the migration
```bash
php artisan migrate
```

## 5. Create the storage symbolic link
This is required so uploaded images in `storage/app/public` are accessible from the browser.
```bash
php artisan storage:link
```

## 6. Serve the application
```bash
php artisan serve
```
Visit:
- `http://127.0.0.1:8000/` — list of registered students
- `http://127.0.0.1:8000/students/create` — registration form

## 7. Test the flow
1. Fill out the form with a valid image (jpg/jpeg/png, under 2MB).
2. Submit — you should see the green "Student registered successfully!" flash message and land on the profile page.
3. Try submitting again with a blank field or a duplicate Student ID/email to confirm validation errors display correctly.

## Notes for your documentation (README.md)
- The **request lifecycle** for this app: Browser → `routes/web.php` → `StudentController@store` → `$request->validate()` → `Student::create()` → MySQL → redirect with flash message → `StudentController@show` → Blade view.
- The uploaded file path is what's stored in the `profile_picture` column — never the raw file — which is why `Storage::disk('public')` + `storage:link` matters for security and portability.
- Remember to add your own screenshots, ERD, flowchart, and reflection per the lab's documentation requirements — those are specific to your own run of the project.

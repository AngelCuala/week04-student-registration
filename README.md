<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Introduction

A Student Registration System is a web-based application designed to collect, store, and manage information about students during the registration process. It allows students to provide important details such as their name, contact information, address, course, and other necessary information. The system helps make registration faster, more organized, and less dependent on manual paperwork. Data validation is important because it ensures that the information entered by users is complete, accurate, and follows the required format. For example, validation can prevent users from entering letters in a field that requires a number or submitting a form with required fields left empty. Without proper validation, incorrect or harmful data could be stored in the database and cause problems for the system. Registration systems are also commonly used in enterprise applications because organizations need reliable ways to collect and manage user information. Businesses, schools, hospitals, government offices, and other organizations use similar systems to handle large amounts of data. Laravel provides features that make it easier to create secure registration systems through routing, controllers, validation, models, and database integration. Overall, a Student Registration System demonstrates how different parts of a web application work together to process and manage user information.

##Objectives

After completing the activity, the following learning objectives were accomplished:

Understand the purpose and functions of a Student Registration System.
Understand the importance of validating user input.
Learn how Laravel handles registration requests.
Understand the Laravel request lifecycle.
Learn how routes connect user requests to controllers.
Apply server-side validation to registration forms.
Understand how models interact with databases.
Learn how registration data is stored in MySQL.
Understand the importance of protecting uploaded files and user data.
Recognize how registration systems are applied in real-world enterprise applications.

##Laravel Request Lifecycle

When a student submits a registration form, the request passes through several parts of the Laravel application before a response is returned.

Browser – The user enters their information and submits the registration form.
Route – Laravel receives the request and determines which route should handle it.
Controller – The controller receives the request and manages the registration process.
Validation – The submitted information is checked to make sure it follows the required rules.
Model – If the information is valid, the model is used to communicate with the database.
Database – The student's information is stored in the database.
Response – Laravel sends a response back to the browser, such as a success message, redirect, or validation error.

###Validation Rules##########

Validation rules are important in a Student Registration System because they make sure that the information entered by the user is correct, complete, and safe before it is stored in the database. Laravel provides different validation rules that can be applied to registration forms.

Required Fields – Required fields make sure that important information is not left empty. For example, a student's name, student ID, course, and email address may be required during registration. This is important because missing information can make the student's record incomplete and cause problems when the data is used later.
Unique Constraints – The unique rule makes sure that certain information is not duplicated in the database. For example, a student ID or email address can be required to be unique. This prevents two different accounts or student records from using the same identifier and helps avoid duplicate records.
Email Validation – Email validation checks whether the information entered follows a valid email format. For example, an email should generally contain an address and domain, such as student@example.com. This is important because registration systems may use email addresses for account verification, notifications, password recovery, and communication.
Numeric Validation – Numeric validation ensures that a field only accepts numbers when numbers are expected. For example, a student's age, year level, or contact number may require numeric input. This prevents users from entering inappropriate characters or text and helps maintain consistent data in the database.
Image Validation – Image validation is used when the registration system allows users to upload an image, such as a student profile picture. The system can check whether the uploaded file is an accepted image type, such as JPG, JPEG, or PNG. This is important because it prevents users from uploading unsupported or potentially harmful files disguised as images.
File Size Restrictions – File size validation limits how large an uploaded file can be. For example, the system may only allow images up to 2 MB. This is important because very large files can consume excessive storage space, slow down the application, and increase server resource usage.

##Problems Encountered

During the development of the Student Registration System, several problems were encountered while working with Laravel, validation, file uploads, and the database.

Validation Errors Not Appearing – One of the problems encountered was that validation errors were not displayed properly when the user entered invalid information. The form would either refresh without clearly showing what was wrong or the user would not know which field needed to be corrected.
Image Upload Path Incorrect – Another problem was related to uploading student profile images. The image could be uploaded, but it would not display correctly because the file path used by the application did not match the actual storage location. This made it difficult to access the uploaded image from the registration page.
Database Migration Failed – A database migration also encountered an error. This can happen when there are incorrect column definitions, existing tables with conflicting names, or problems with relationships between tables. Because of the failed migration, the required database structure was not created correctly.
Storage Link Missing – The uploaded images were also not accessible through the browser because the Laravel storage link had not been properly created. The files existed in the storage directory, but the public application could not access them through the expected URL.

 ##Solutions########

Each problem was solved by checking the Laravel configuration, code, and database structure and then making the necessary corrections.

Fixing Validation Errors – The validation rules were reviewed and properly added to the controller or request validation. Error messages were then displayed in the registration form using Laravel's validation error handling. This allowed users to immediately see which fields contained invalid or missing information.
Fixing the Image Upload Path – The image upload code was checked to make sure the file was being stored in the correct Laravel storage directory. The path used when displaying the image was also corrected so that it matched the location where Laravel stored the uploaded file. This allowed the uploaded profile picture to be displayed correctly.
Fixing the Database Migration – The migration file was checked for incorrect table names, column definitions, and database relationships. Existing conflicting tables were removed or adjusted when necessary, and the migration was run again. After correcting the errors, the required tables and columns were successfully created.
Creating the Storage Link – The missing storage link was solved by creating Laravel's symbolic link between the public directory and the storage directory. The php artisan storage:link command was used for this purpose. After creating the link, files stored in Laravel's public storage location could be accessed by the web application.

##Reflection#######

This activity helped me understand why validation is one of the most important parts of a registration system. When users enter information into a form, there is no guarantee that all the information they provide will be correct. Users can accidentally enter incomplete information, use the wrong format, or even intentionally enter invalid data. Because of this, validation is necessary to make sure that the information being submitted follows the requirements of the system. I learned that validation is not only about checking if a field is empty, but it can also check the format, length, type, uniqueness, and other requirements of the data. Proper validation helps prevent incorrect information from being stored in the database and makes the system more reliable.

I also learned that handling user input requires caution. Information coming from a registration form should never automatically be trusted because users have control over what they submit. The application needs to check and process the information before using it. Laravel makes this easier by providing built-in validation features that allow developers to define rules for different fields. This showed me how important it is to think about what could go wrong when accepting information from users.

Another important lesson I learned is the difference between client-side and server-side validation. Client-side validation can provide faster feedback because the information is checked directly in the browser before being submitted. However, it should not be the only form of validation because users can disable or bypass browser-based checks. Server-side validation happens on the server, where the application has greater control over the submitted information. This makes server-side validation more reliable for protecting the application and database. Ideally, both client-side and server-side validation should be used together, with server-side validation acting as the final layer of protection.

The activity also made me realize the importance of file security in web applications. If a registration system allows users to upload files, such as identification documents or profile pictures, the application needs to carefully check the uploaded files. File types, file sizes, filenames, and storage locations should be controlled to reduce security risks. An unsafe file upload could potentially allow malicious files to enter the system. Therefore, file security is just as important as validating normal form inputs.

Finally, I learned that registration systems are not only useful for school projects. They are commonly used in real-world enterprise software. Companies use registration and account systems to manage employees, customers, members, applicants, and other users. These systems may also connect to databases, authentication systems, reporting tools, and other business applications. Overall, this activity gave me a better understanding of how Laravel processes user information and why validation, security, and proper data management are necessary when developing real-world web applications.

##References#########

Laravel. (n.d.). Laravel documentation. https://laravel.com/docs

MDN Web Docs. (n.d.). MDN Web Docs. https://developer.mozilla.org/

MySQL. (n.d.). MySQL documentation. https://dev.mysql.com/doc/

PHP Documentation Group. (n.d.). PHP manual. https://www.php.net/docs.php

Tailwind Labs. (n.d.). Tailwind CSS documentation. https://tailwindcss.com/docs

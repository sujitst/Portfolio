# Modern Responsive Portfolio Website with Admin Panel

---

## Overview
This is a **modern, clean, and fully responsive portfolio website template** with an **Admin Panel**, built using **Laravel Blade**.  
It is perfect for **freelancers, web designers, developers, UI/UX designers, and creative agencies**.  

The template includes both **frontend portfolio pages** and a **fully functional admin panel** to manage content, themes, and site settings easily.

---

## Features

### Frontend Features
- Clean and professional **UI/UX design**
- Fully responsive using **Bootstrap 5**
- **Fancybox Lightbox** integration for portfolio items
- **Owl Carousel** for sliders
- **Isotope filtering** for project/portfolio items
- **Country code phone input** using `intlTelInput`
- Multi-language support with **dynamic language switcher**
- SEO-friendly HTML structure
- Cross-browser compatible
- Easy to customize CSS & JS

### Admin Panel Features
- **Dashboard with charts and statistics**
- Manage site settings, favicon, and themes
- Fully responsive **admin layout**
- **DataTables** integration for lists and tables
- **Toastr notifications** for alerts
- Ajax-enabled operations with CSRF protection
- Easy to extend with Laravel Blade templates
- Includes **custom scripts and plugins** (bootbox, chart.js)

---

## Technologies Used

- **Frontend:** HTML5, CSS3, Bootstrap, jQuery, Font Awesome, Owl Carousel, Fancybox, Isotope, Intl-Tel-Input
- **Backend:** Laravel Blade
- **Admin Panel:** Bootstrap, DataTables, Chart.js, Toastr, Ajax

---

## Responsive Design
This template works perfectly on all devices:

- Desktop 
- Mobile 
- Tablet 

---

## Localization
- Multi-language support
- Dynamic language switching using Laravel routes

---


## Customization

- Well-organized CSS & JS files for easy customization
- Easily change class and ID names
- Add or remove sections quickly
- Developer-friendly commented code

---

## Ideal For
- Personal Portfolio Website
- Freelancer Portfolio
- Web Developers
- UI/UX Designers
- Graphic Designers
- Creative Agencies

---

## What You Will Get
- Full **source code** (Frontend + Admin Panel)
- Well-commented **blade templates**
- **Documentation**
- Free future updates

---

## Installation Process

### Server Requirements
- PHP **8.0+**
- Composer
- MySQL
- Apache / Nginx
- Enabled PHP extensions:
- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- Fileinfo

---

### Download & Setup
Extract the project files into your server directory:

```bash
cd project-folder

---
## Install Dependencies

Make sure you have **PHP**, **Composer**, **MySQL**, and **Laravel requirements** installed on your system.

```bash
composer install
```

## Environment Setup

Copy the example environment file and configure it:

```bash
cp .env.example .env
```

Update your `.env` file with the following values:

```env
APP_NAME="OmBit"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

---

## Application Key

Generate the application key:

```bash
php artisan key:generate
```

---

## Database Setup

Run migrations and seed the database:

```bash
php artisan migrate
php artisan db:seed
```

---

## Run the Application

Start the development server:

```bash
php artisan serve
```

The application will be available at:

```
http://localhost:8000
```

---

## Admin Login Credentials

Use the following credentials to log in as an admin:

* **Email:** [admin@gmail.com](mailto:admin@gmail.com)
* **Password:** 12345678

---

## Notes

* Make sure your MySQL server is running.
* Update database credentials if your local setup differs.
* This project is intended for local development and learning purposes.

---
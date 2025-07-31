
````markdown
# 🛍️ Laravel E-Commerce Clothing Store

A modern and responsive e-commerce web application for a clothing store, built using **Laravel**, **Breeze**, and **Tailwind CSS**. Includes a user-friendly interface for customers and a secure admin panel for store management.

---

## ✨ Features

- User registration and login system (Laravel Breeze)
- Admin authentication and dashboard
- Product listing with categories
- Order management
- Responsive UI using Tailwind CSS
- Stripe payment integeration 
- Role-based access: user vs admin
- Database seeding for demo content

---

## 🚀 Getting Started

Follow these steps to set up and run the project on your local machine.

### 1. 📁 Clone the Repository

```bash
git clone https://github.com/moeed-anwar/ecom-store.git
cd your-repo-name
````

### 2. 📦 Install Dependencies

```bash
composer install
npm install
```

### 3. ⚙️ Environment Setup

Copy the example `.env` file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Update your `.env` file with correct database credentials:

```env
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. 🧬 Run Migrations and Seeders

```bash
php artisan migrate --seed
```

> This will create the necessary tables and insert a default **admin account** and demo products.

---

## 🛂 Admin Login

After seeding, you can log in as an admin using these credentials:

* **Email:** `admin@admin.com`
* **Password:** `admin`

Upon successful login, you'll be automatically redirected to the **admin dashboard**.

---

## 🔧 Development Server

To serve the application locally:

```bash
php artisan serve
```

And in another terminal:

```bash
npm run dev
```

Visit the app in your browser at [http://localhost:8000](http://localhost:8000)

---

## 📁 Folder Structure Highlights

* `app/Http/Controllers/Admin/` - Admin-specific controllers
* `resources/views/admin/` - Admin dashboard views
* `app/Models/` - Eloquent models (e.g., User, Product, Order)
* `routes/web.php` - All web routes, including role-based routing

---

## ✅ Technologies Used

* Laravel 10+
* Laravel Breeze (authentication scaffolding)
* Tailwind CSS
* MySQL or any supported DB
* Vite for asset bundling

---

## 👤 Author

**Moeed Anwar**
[GitHub](https://github.com/moeed-anwar)

---


## 📜 License

This project is open-source and free to use under the [MIT license](LICENSE).

---


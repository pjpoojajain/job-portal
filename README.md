# 🚀 Job Portal – Laravel 12 + Vue 3 + MySQL

A full-stack **Job Portal Application** built with **Laravel 12, Vue 3 (Inertia.js), TailwindCSS, and MySQL**.  
This project demonstrates **modern authentication, role-based access control (RBAC)** using **Spatie Laravel Permission**, and essential job marketplace features.

---

## 📌 Features

### 👤 Authentication & Roles
- User registration & login with **Laravel Fortify** + Inertia.js + Vue.
- Role-based system using **Spatie Laravel Permission**.
- Two default roles:
  - **Employer** – Can post & manage jobs.
  - **Jobseeker** – Can search & apply for jobs.

### 💼 Employer Module
- Post new jobs with title, description, salary, and requirements.
- Manage posted jobs (edit, update, delete).
- View applicants for each job.

### 🎓 Jobseeker Module
- Search jobs by title, location, and category.
- Apply for jobs directly from the portal.
- Manage profile and track applied jobs.

### 🛠️ Admin Module
- Manage users, roles, and permissions.
- Approve or reject job postings.
- Generate reports (jobs, applicants, employers).

---

## 🏗️ Tech Stack
- **Backend**: Laravel 12, Fortify, Spatie Laravel Permission  
- **Frontend**: Vue 3 + Inertia.js + TailwindCSS  
- **Database**: MySQL  
- **Tooling**: Vite, npm, Composer  

---

## 📂 Installation

```bash
# Clone repository
git clone https://github.com/your-username/job-portal.git
cd job-portal

# Install PHP dependencies
composer install

# Install JS dependencies
npm install && npm run dev

# Create .env file and configure database
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Seed roles & test users
php artisan db:seed

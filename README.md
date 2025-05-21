# 🗂️ Task Manager

## 📌 About This Project

**Task Manager** is a Laravel-based web application that features two separate login portals: one for **Clients** and one for **Admins**.

### 👤 Client Portal

- After registering and logging in as a **Client**, the user is redirected to their dashboard.
- The client can view their assigned tasks and mark them as complete.
- A client **cannot access any admin route**.
- If a client is already logged in, they **cannot access the admin portal**.

### 🛠️ Admin Portal

- After registering and logging in as an **Admin**, the user is redirected to the Admin Dashboard.
- From the dashboard, clicking on **"Go to Task List"** leads to the task management section.
- Admins have full control over task management:
  - ✅ Create Tasks  
  - ✏️ Edit Tasks  
  - 🗑️ Delete Tasks

---

## ⚙️ Project Setup Instructions

Follow the steps below to run the project locally:

### 1. Clone the Repository

```bash
git clone <your-repository-url>
cd task-manager
composer install
php artisan migrate
npm install
npm run dev
php artisan serve


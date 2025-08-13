# TaskFlow - Laravel Task Management System

A exercise laravel task management solution built with Laravel that helps users organize tasks within collaborative workspaces.

## Table of Contents

-   [Features](#features)
-   [Installation](#installation)
-   [Project Structure](#project-structure)
-   [Database Schema](#database-schema)
<!-- - [API Reference](#api-reference) -->
-   [Development](#development)
    <!-- - [Testing](#testing) -->
    <!-- - [License](#license) -->

## Features ✨

### User Management

-   🔐 Secure authentication (register/login/logout) ✅
-   👤 User profiles with usernames ✅
-   🔄 Session management ✅

### Workspace System

-   🏢 Create multiple workspaces ✅
-   👥 Organize tasks by projects/teams ❌
-   🔒 Role-based access control ❌

### Task Management

-   📁 Create/update/delete tasks ⭕
-   ⏰ Set deadlines and reminders
-   📌 Mark tasks as complete ✅
-   🔍 Filter and search functionality ❌

### Technical Stack

-   **Backend**: Laravel 12
-   **Frontend**: Tailwind CSS
-   **Database**: MySQL
-   **Auth**: Laravel Breeze

## Installation 🚀

### Prerequisites

-   PHP 8.2+
-   Composer 2.0+
-   Node.js 16+
-   MySQL

### Step-by-Step Setup

1. **Clone the repository**
    ```bash
    git clone https://github.com/fauzan00/task-management.git
    cd task-management
    ```
2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```
3. **Environment setup:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. **Database setup:**
    ```bash
    php artisan migrate
    ```
5. **Build assets:**
    ```bash
    npm run build
    ```

## Project Structure

```bash
app/
├── Http/Controllers/
│ ├── DashboardController.php
│ ├── TaskController.php
│ └── WorkspaceController.php
├── Models/
│ ├── Task.php
│ ├── User.php
│ └── Workspace.php
└── Policies/
├── TaskPolicy.php
└── WorkspacePolicy.php

database/migrations/
├── create_workspaces_table.php
├── create_tasks_table.php
└── add_username_to_users_table.php

resources/views/
├── auth/
├── tasks/
├── workspaces/
└── dashboard.blade.php
```

## Database Schema

![model](/public/image/model.png)

## Development

#### Create new Laravel project

```bash
laravel new LaravelTest
cd LaravelTest
```

#### Install frontend dependencies and build assets

```bash
npm install
npm run build
```

#### Install Laravel Breeze for authentication

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
```

#### Run initial migrations

```bash
php artisan migrate
```

#### Create models with migrations

```bash
php artisan make:model Workspace -m
php artisan make:model Task -m
```

#### Run migrations for new models

```bash
php artisan migrate
```

#### Create controllers

```bash
php artisan make:controller WorkspaceController --resource --model=Workspace
php artisan make:controller TaskController --resource --model=Task
php artisan make:controller DashboardController --resource
```

#### Create policies

```bash
php artisan make:policy WorkspacePolicy --model=Workspace
php artisan make:policy TaskPolicy --model=Task
```

#### Add username field to users table

```bash
php artisan make:migration add_username_to_users_table --table=users
php artisan migrate
```

#### Clear cached views

```bash
php artisan view:clear
```

#### Check migration status

```bash
php artisan migrate:status
```

#### Open project in VS Code

```bash
code .
```

# Picture Project

1. **Front page:**
   ![front-page](/public/image/front-page.png)

2. **Login:**
   ![Login](/public/image/login-user.png)

3. **Register:**
   ![Register](/public/image/register-user.png)

4. **profile:**
   ![profile1](/public/image/profile1.png)
   ![profile2](/public/image/profile2.png)

5. **Dashboard:**
   ![Dashboard](/public/image/dashboard.png)

6. **Workspace:**
   ![Workspace1](/public/image/workspace1.png)
   ![Workspace2](/public/image/workspace2.png)

7. **Task:**
   ![Task1](/public/image/task1.png)
   ![Task2](/public/image/task2.png)
   ![Task3](/public/image/task3.png)

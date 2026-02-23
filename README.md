# EasyColoc

## Introduction

EasyColoc is a Laravel-based web application developed as a
school project. It allows users to manage shared apartments
(colocations), track shared expenses, automatically calculate balances,
and simplify reimbursements between members.

The application implements role-based access control (Global Admin,
Owner, Member), financial reputation tracking, and strict business rules
such as limiting users to one active colocation at a time.

This project demonstrates MVC architecture, relational database
modeling, financial logic implementation, and secure authentication.

## Table of Contents

-   Features
-   Technology Stack
-   Project Structure
-   Installation & Setup
-   Download
-   Database Schema
-   License

## Features

### User Management

-   Registration and authentication
-   User profile management
-   Automatic promotion of the first registered user to Global Admin
-   Ban and unban system (Global Admin only)
-   Reputation system based on financial behavior (+1 / -1)

### Colocation Management

-   Create, update, cancel a colocation
-   Automatic Owner assignment (creator)
-   Invitation system (email + unique token)
-   Accept or refuse invitation
-   Restriction: one active colocation per user
-   Member leave system

### Expense Management

-   Add expense (title, amount, date, category, payer)
-   Expense history
-   Monthly filtering
-   Category management
-   Statistics by category and month

### Balances and Settlements

-   Automatic calculation:
    -   Total paid
    -   Individual share
    -   Final balance
-   Simplified "Who owes who" view
-   Mark settlements as paid

### Global Administration

-   View total users
-   View total colocations
-   View total expenses
-   Manage banned users

## Technology Stack

-   Framework: Laravel (MVC Architecture)
-   Authentication: Laravel Breeze / Jetstream
-   Database: MySQL or PostgreSQL
-   ORM: Eloquent (hasMany, belongsToMany relationships)
-   Backend Language: PHP
-   Frontend: Blade / Tailwind CSS
-   Version Control: Git

## Project Structure (Laravel Structure)
```
project-root/
│
├── app/
│   ├── Models/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Providers/
│   └── Console/
│
├── bootstrap/
│   └── app.php
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── index.php
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       ├── auth/
│       ├── colocations/
│       ├── expenses/
│       └── admin/
│
├── routes/
│   ├── web.php
│   ├── api.php
│   └── console.php
│
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
│
├── tests/
│   ├── Feature/
│   └── Unit/
│
├── .env
├── artisan
├── composer.json
└── README.md
```
Main Models: User - Colocation - Membership - Expense - Category -
Payment - Invitation

## Installation & Setup

1.  Clone the repository:
    ```bash
    git clone https://github.com/yah946/easy-coloc.git
    ```

2.  Navigate into the project folder: cd easy-coloc

3.  Install dependencies: composer install

4.  Copy environment file: cp .env.example .env

5.  Generate application key: php artisan key:generate

6.  Configure database credentials inside .env

7.  Run migrations: php artisan migrate

8.  Start the development server: php artisan serve

## Download

You can download the project from GitHub by clicking: Code then Download
ZIP. Or directly using:
https://github.com/yah946/easy-coloc/archive/refs/heads/main.zip

## Database Schema
users (id - name - email - password - reputation - is_admin - is_banned)

colocations (id - name - status (active / cancelled))

memberships (user_id - colocation_id - role (owner / member) - left_at)

expenses (id - title - amount - date - category_id - payer_id -
colocation_id)

categories (id - name - colocation_id)

payments (id - from_user_id - to_user_id - amount - colocation_id)

invitations (id - email - token - colocation_id - status)

## License

This project is a school assignment. All rights reserved.

No permission is granted to use, copy, modify, or distribute this code
without explicit written permission from the author.

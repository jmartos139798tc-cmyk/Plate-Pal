# PlatePal - Complete System Documentation

## Table of Contents
1. [Project Overview](#project-overview)
2. [System Architecture](#system-architecture)
3. [User Roles & Permissions](#user-roles--permissions)
4. [Database Structure](#database-structure)
5. [Features](#features)
6. [Setup & Installation](#setup--installation)
7. [Admin Dashboard](#admin-dashboard)
8. [Client Dashboard](#client-dashboard)
9. [Caterer Dashboard](#caterer-dashboard)
10. [Authentication Flow](#authentication-flow)
11. [API Routes](#api-routes)

---

## Project Overview

**PlatePal** is a home kitchen marketplace platform for Tagum City that connects clients with local caterers. The platform allows:
- **Clients** to browse and book catering services
- **Caterers** to list their services and manage bookings
- **Admins** to manage users and approve caterer registrations

### Tech Stack
- **Backend:** Laravel 11
- **Frontend:** Blade Templates + Tailwind CSS + Alpine.js
- **Database:** SQLite
- **Authentication:** Laravel Auth

---

## System Architecture

### Directory Structure
```
Project_IT9/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminDashboardController.php
│   │   │   ├── AuthController.php
│   │   │   ├── CatererDashboardController.php
│   │   │   ├── CatererProfileController.php
│   │   │   ├── ClientDashboardController.php
│   │   │   └── LandingPageController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Booking.php
│   │   ├── Message.php
│   │   ├── Caterer.php
│   │   └── LandingPage.php
│   └── Providers/
├── resources/
│   ├── views/
│   │   ├── landingpage/
│   │   ├── admin/
│   │   ├── caterer/
│   │   ├── client/
│   │   └── components/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── AdminSeeder.php
└── bootstrap/
    └── app.php
```

---

## User Roles & Permissions

### 1. **Client**
- Browse caterers
- Book catering services
- View bookings
- Send messages to caterers
- Leave reviews

### 2. **Caterer**
- Create and manage business profile
- View bookings
- Respond to client messages
- Track ratings and reviews

### 3. **Admin**
- View all users and caterers
- Approve/Reject caterer registrations
- View all bookings
- Generate reports
- Manage platform settings

---

## Database Structure

### Users Table
```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role ENUM('client', 'caterer', 'admin'),
    phone VARCHAR(20),
    business_name VARCHAR(255),
    barangay VARCHAR(255),
    cuisine VARCHAR(255),
    price_range VARCHAR(100),
    profile_image LONGTEXT,
    rating DECIMAL(3,1),
    reviews_count INT,
    is_verified BOOLEAN,
    is_active BOOLEAN,
    approval_status ENUM('pending', 'approved', 'rejected'),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Bookings Table
```sql
CREATE TABLE bookings (
    id BIGINT PRIMARY KEY,
    user_id BIGINT (Client),
    caterer_id BIGINT,
    event_title VARCHAR(255),
    event_date DATE,
    guests INT,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled'),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Messages Table
```sql
CREATE TABLE messages (
    id BIGINT PRIMARY KEY,
    user_id BIGINT (Client),
    caterer_id BIGINT,
    body TEXT,
    sender ENUM('client', 'caterer'),
    is_read BOOLEAN,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

---

## Features

### 1. **Landing Page**
- Hero section with call-to-action
- Featured caterers showcase (mock data)
- Search functionality
- Navigation to login/register

### 2. **Authentication**
- Separate login/register for clients and caterers
- Email-based authentication
- Password hashing with Laravel Hash
- Session management

### 3. **Client Dashboard**
- **Stats Cards:** Active Bookings, Saved Caterers, Unread Messages, Completed Events
- **Search Bar:** Find caterers by name or specialty
- **Upcoming Events:** View upcoming bookings
- **Recent Messages:** Chat with caterers
- **Featured Caterers:** Browse top-rated caterers
- **Sidebar Navigation:** Dashboard, Browse Caterers, My Bookings, Saved Caterers, Messages, My Reviews

### 4. **Caterer Dashboard**
- Business overview
- Booking management
- Profile management
- Message inbox
- Rating and reviews

### 5. **Admin Dashboard**
- **Stats:** Total Users, Active Caterers, Total Bookings, Revenue
- **Recent Users:** List of newly registered clients
- **Pending Approvals:** Caterer registration requests with Approve/Reject buttons
- **Recent Bookings:** Table of latest bookings
- **Sidebar Navigation:** Overview, Users, Caterers, Bookings, Reports, Settings

### 6. **Responsive Design**
- Mobile-first approach
- Sidebar toggle on mobile devices
- Responsive grid layouts
- Touch-friendly buttons

---

## Setup & Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- SQLite

### Installation Steps

1. **Clone the repository**
```bash
cd Project_IT9
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Run migrations**
```bash
php artisan migrate
```

5. **Create admin account**
```bash
php artisan db:seed --class=AdminSeeder
```

6. **Build assets**
```bash
npm run build
```

7. **Start development server**
```bash
php artisan serve
```

Access the application at `http://localhost:8000`

---

## Admin Dashboard

### Access
- **URL:** `/admin/dashboard`
- **Email:** `admin@platepal.com`
- **Password:** `admin123`

### Features

#### 1. **Overview Stats**
- Total Users count
- Active Caterers count
- Total Bookings count
- Total Revenue

#### 2. **Recent Users**
- Shows last 5 registered clients
- Displays name, email, role, and registration date
- Quick view of user activity

#### 3. **Pending Caterer Approvals**
- Lists all caterers awaiting approval
- Shows business name, location, cuisine, and email
- **Approve Button:** Approves caterer and sets `is_active = true`
- **Reject Button:** Rejects caterer and sets `is_active = false`

#### 4. **Recent Bookings**
- Table showing latest bookings
- Columns: Client, Caterer, Event, Date, Status
- Status badges (Confirmed/Pending)

#### 5. **Sidebar Navigation**
- Overview (Dashboard)
- Users Management
- Caterers Management
- Bookings Management
- Reports
- Settings

### Admin Permissions
- Protected by `AdminMiddleware`
- Only users with `role = 'admin'` can access
- Unauthorized access redirects to home page

---

## Client Dashboard

### Access
- **URL:** `/dashboard`
- Requires client login

### Features

#### 1. **Statistics Cards**
```
┌─────────────────────────────────────────────────────┐
│ Active Bookings │ Saved Caterers │ Unread Messages │ Completed Events │
└─────────────────────────────────────────────────────┘
```

#### 2. **Search Section**
- Search caterers by name or specialty
- Real-time search functionality

#### 3. **Upcoming Events**
- Shows next 3 bookings
- Displays event title, caterer name, date, and guest count
- Status badge (Pending/Confirmed)

#### 4. **Recent Messages**
- Latest 3 messages from caterers
- Shows unread indicator
- Message preview

#### 5. **Featured Caterers**
- Displays 3 featured caterers
- Shows:
  - Business image
  - Business name and location
  - Rating and review count
  - Cuisine type
  - Price range
  - "Book Now" button
  - Save to favorites button

#### 6. **Sidebar Navigation**
```
Dashboard
├── Dashboard (Home)
├── Browse Caterers
├── My Bookings (with badge count)
├── Saved Caterers
├── Messages (with badge count)
└── My Reviews
```

### Mobile Features
- Hamburger menu toggle
- Fixed sidebar on mobile
- Overlay when sidebar is open
- Touch-friendly buttons

---

## Caterer Dashboard

### Access
- **URL:** `/caterer/dashboard`
- Requires caterer login

### Features
- Business overview
- Booking management
- Profile editing
- Message inbox
- Rating tracking

### Profile Management
- **URL:** `/caterer/profile`
- Edit business details:
  - Business name
  - Location (Barangay)
  - Phone number
  - Cuisine/Specialty
  - Price range (min-max)
  - Business description
  - Guest capacity (min-max)
  - Profile image upload

---

## Authentication Flow

### Client Registration
```
1. User visits /register
2. Fills in: Name, Email, Password
3. System creates user with role = 'client'
4. User is redirected to /dashboard
```

### Caterer Registration
```
1. User visits /caterer/register
2. Fills in: Name, Email, Password, Business Details
3. System creates user with role = 'caterer'
4. approval_status = 'pending'
5. Admin must approve before caterer can be visible
6. User is redirected to /caterer/dashboard
```

### Admin Access
```
1. Admin account created via AdminSeeder
2. Email: admin@platepal.com
3. Password: admin123
4. Login at /login
5. Access /admin/dashboard
```

### Logout
```
POST /logout
- Destroys session
- Redirects to home page
```

---

## API Routes

### Public Routes
```
GET  /                          → Landing page
GET  /login                     → Client login form
GET  /register                  → Client register form
GET  /caterer/login             → Caterer login form
GET  /caterer/register          → Caterer register form
POST /login                     → Process client login
POST /register                  → Process client registration
POST /caterer/login             → Process caterer login
POST /caterer/register          → Process caterer registration
```

### Protected Routes (Auth Required)
```
POST /logout                    → Logout user
GET  /dashboard                 → Client dashboard
GET  /browse-caterers           → Browse caterers page
GET  /caterer/dashboard         → Caterer dashboard
GET  /caterer/profile           → Edit caterer profile
POST /caterer/profile           → Update caterer profile
```

### Admin Routes (Auth + Admin Role Required)
```
GET  /admin/dashboard           → Admin dashboard
POST /admin/caterers/{id}/approve  → Approve caterer
POST /admin/caterers/{id}/reject   → Reject caterer
```

---

## Middleware

### AdminMiddleware
**Location:** `app/Http/Middleware/AdminMiddleware.php`

**Purpose:** Protect admin routes

**Logic:**
```php
if (auth()->check() && auth()->user()->role === 'admin') {
    return $next($request);
}
return redirect('/')->with('error', 'Unauthorized access');
```

**Registration:** `bootstrap/app.php`
```php
$middleware->alias([
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
]);
```

---

## Components

### Dashboard Layout Component
**Location:** `resources/views/components/dashboard-layout.blade.php`

**Features:**
- Responsive navbar with user dropdown
- Sidebar with navigation
- Mobile-friendly toggle
- Main content area
- Consistent styling

**Usage:**
```blade
<x-dashboard-layout
    title="Page Title"
    heading="Page Heading"
    :username="$user->name"
    :initials="$initials"
>
    <x-slot:sidebar>
        <!-- Sidebar content -->
    </x-slot:sidebar>
    
    <!-- Main content -->
</x-dashboard-layout>
```

---

## Styling

### Color Scheme
- **Primary Orange:** `#E8642A`
- **Dark Text:** `#1C1A17`
- **Light Background:** `#FDF6EE`
- **Border Color:** `#EDE4D8`
- **Muted Text:** `#8A7F72`

### Tailwind CSS
- Custom color palette in `tailwind.config.js`
- Responsive breakpoints: sm, md, lg
- Custom fonts: Playfair Display, DM Sans

---

## Common Tasks

### Add a New Admin
```bash
php artisan tinker
>>> User::create([
    'name' => 'New Admin',
    'email' => 'newadmin@platepal.com',
    'password' => Hash::make('password123'),
    'role' => 'admin',
    'is_active' => true,
    'is_verified' => true,
    'approval_status' => 'approved'
]);
```

### Approve a Caterer
1. Go to `/admin/dashboard`
2. Find caterer in "Pending Caterer Approvals"
3. Click "Approve" button
4. Caterer becomes visible to clients

### View All Bookings
1. Go to `/admin/dashboard`
2. Scroll to "Recent Bookings" section
3. Click "View All" to see complete list

### Update Caterer Profile
1. Login as caterer
2. Go to `/caterer/profile`
3. Update business details
4. Click "Save & Submit for Approval"

---

## Troubleshooting

### Admin Dashboard Not Accessible
- Ensure you're logged in with admin account
- Check user role in database: `SELECT role FROM users WHERE email = 'admin@platepal.com';`
- Verify AdminMiddleware is registered in `bootstrap/app.php`

### Caterer Not Showing in Browse
- Check `is_active = true` in database
- Check `approval_status = 'approved'`
- Ensure caterer profile is complete

### Messages Not Appearing
- Check `messages` table exists
- Verify `is_read` status
- Check `sender` field is correct ('client' or 'caterer')

### Sidebar Not Toggling on Mobile
- Ensure Alpine.js is loaded
- Check browser console for errors
- Verify `x-data="{ sidebarOpen: false }"` is present

---

## Future Enhancements

- [ ] Payment integration
- [ ] Email notifications
- [ ] SMS alerts
- [ ] Advanced search filters
- [ ] Rating system
- [ ] Review management
- [ ] Analytics dashboard
- [ ] Booking calendar
- [ ] Invoice generation
- [ ] Multi-language support

---

## Support & Contact

For issues or questions, contact the development team.

**Last Updated:** April 2026
**Version:** 1.0.0

<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Laravel_Final_Project_Sara_Chafik_Idirssi -->


# Gym Management Platform 💪

A dynamic gym management platform designed to simplify operations for **gym members**, **trainers**, and **admins**. This project streamlines session booking, user management, and payments, creating a seamless experience for all users. Built using **Laravel**, **SQLite**, and **Stripe**.

---

## **Features**

### **Gym Members**
- Register and log in to their dashboard.
- Reserve sessions through a user-friendly calendar.
- Join **free sessions** directly or **premium sessions** after secure payment.
- View upcoming sessions and mark exercises as done.
- Add favorite exercises and track personalized calorie data.

### **Trainers**
- Add, update, or remove exercises.
- Create and manage sessions (free and premium).
- View and manage their schedule using a session calendar.
- Monitor member activity and provide personalized recommendations.

### **Admins**
- Approve or reject user registrations.
- Manage user roles (members/trainers/admins).
- Oversee all sessions and update their statuses.
- Track payments for premium sessions.
- Handle password recovery and user management seamlessly.

---

## **Tech Stack**

- **Laravel**: Backend framework for handling application logic.
- **SQLite**: Lightweight database for efficient data management.
- **Stripe**: Payment gateway for secure premium session transactions.
- **HTML/CSS**: For the user interface.
- **Bootstrap**: For responsive UI elements.
- **JavaScript**: Adding interactivity to the platform.

---

## **Setup Instructions**

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/yourusername/gym-management-platform.git
   cd gym-management-platform
2. **Install Dependencies**

```bash
composer install
npm install
```

3. **Set Up Environment Variables**
```
Create a .env file in the project root.
Add your database and Stripe API keys:
env
Copy code
DB_CONNECTION=sqlite
STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret
Run Migrations
bash
Copy code
php artisan migrate
Serve the Application
bash
Copy code
php artisan serve
```
3. **Access the Application**
```
Visit http://localhost:8000 in your browser.
```

# Step-by-Step Guide for Users
## For Gym Members
- Register for an account or log in if you already have one.
- Reserve a session via the calendar.
- Join a free session or pay securely via Stripe for premium sessions.
- View your upcoming sessions and mark exercises as done.
- Add your favorite exercises to track later.
## For Trainers
- Log in and access your dashboard.
- Add, update, or remove exercises.
- Create new sessions and manage existing ones.
- View your schedule in the session calendar.
- Interact with members and track their progress.
- For Admins
- Log in to the admin panel.
- Approve or reject user registrations.
- Manage user roles and permissions.
- Oversee all sessions and update their statuses.
- Track payments for premium sessions and handle user management.
## Color Palette Psychology
- Orange (#FBBF85): Represents energy and motivation, perfect for calls to action like "Join Now" or highlighting features.
- Black (#000000): Conveys strength and sophistication, ideal for text or section backgrounds.
- White (#FFFFFF): Symbolizes cleanliness and clarity, used as the main background.
- Gold (#D4A66A): Reflects luxury and achievement, perfect for premium features or session highlights.
- Dark Gray (#4A525A): Adds depth and balance, suitable for footers or secondary elements.

# Contributions
Feel free to fork this repository and submit a pull request for any improvements. For major changes, open an issue to discuss your ideas.

License
This project is licensed under the MIT License.

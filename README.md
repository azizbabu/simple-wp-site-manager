<h2>Simple Wordpress Site Manager</h2>

## About Laravel App

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

Laravel app with Inertia.js and React.js that works as a simple, all-in-one dashboard for managing WordPress sites on VPS servers. The goal is to make common DevOps tasks easier, like creating new WordPress installs, managing backups, setting up SSL, monitoring services, adjusting firewall rules, and handling routine maintenance.

Each WordPress site runs in its own Docker container, so users can deploy, configure, and manage multiple sites across different servers with far less technical hassle.


# Setup Instruction
After setup Docker Desktop and WSL, you have to run below commands-

<code>./vendor/bin/sail up -d</code>
<code>./vendor/bin/sail artisan migrate</code>

They also need to create their own .env
<code>cp .env.example .env</code>

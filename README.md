<h2>Simple Wordpress Site Manager</h2>

## About Laravel App

Laravel app with Inertia.js and React.js that works as a simple, all-in-one dashboard for managing WordPress sites on VPS servers. The goal is to make common DevOps tasks easier, like creating new WordPress installs, managing backups, setting up SSL, monitoring services, adjusting firewall rules, and handling routine maintenance.

Each WordPress site runs in its own Docker container, so users can deploy, configure, and manage multiple sites across different servers with far less technical hassle.


# Setup Instruction
After setup Docker Desktop and WSL, you have to run below commands-

<code>./vendor/bin/sail up -d</code><br/>
<code>./vendor/bin/sail composer require laravel/breeze --dev</code><br/>
<code>./vendor/bin/sail artisan breeze:install react</code><br/>
<code>./vendor/bin/sail npm install</code><br/>
<code>./vendor/bin/sail npm run dev</code><br/>
<code>./vendor/bin/sail artisan migrate --seed</code><br/>

They also need to create their own .env<br/>
<code>cp .env.example .env</code>

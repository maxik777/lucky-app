# 🎰 Laravel Lucky App

A simple Laravel-based mini-app that allows users to register, get magic links, and play a "lucky number" game. Includes caching, link expiration, form request validation, and basic MVC architecture.

---

## 📦 Features

- User registration with phone number
- Magic link generation with expiration and activation control
- "I'm feeling lucky" game with prize logic
- Game result history (last 3 attempts) cached for performance
- Form request validation and slim controllers
- Clean architecture with business logic in models
- Docker + SQLite + optional Redis setup

---

## 🐳 Docker Setup
Make sure you have Docker installed!!!

Then run:

docker compose up --build

docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate

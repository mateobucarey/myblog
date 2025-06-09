# 🥘 Recetario Tradicional Argentino

Este proyecto es un blog de recetas tradicionales argentinas, desarrollado con Laravel 10 y Tailwind CSS. Permite que cualquier persona pueda publicar, editar o eliminar recetas una vez autenticado. También incluye un sistema básico de autenticación con Breeze.

## ✨ Características

- Listado público de recetas.
- Sistema de autenticación (registro, login, logout).
- Crear, editar y eliminar recetas.
- Subida de imágenes para cada receta.
- Diseño responsive usando Tailwind CSS.

## 🛠️ Requisitos

- PHP >= 8.1
- Composer
- Node.js y NPM
- Laravel 10
- Base de datos MySQL o SQLite

## 🚀 Instalación

1. Cloná el repositorio:
- git clone 
- cd myblog
- composer install
- npm install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan storage:link

- php artisan serve
- npm run dev

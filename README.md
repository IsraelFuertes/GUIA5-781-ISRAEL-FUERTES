# INF781 Laravel 2FA

## Descripción

Proyecto desarrollado para la materia INF781 Seguridad de Software.

La aplicación implementa autenticación de dos factores (2FA) usando TOTP con Google Authenticator en Laravel 13 y PostgreSQL.

---

## Tecnologías utilizadas

- Laravel 13
- PHP 8.3
- PostgreSQL
- Laravel Breeze
- Google2FA
- Bacon QR Code

---

## Requisitos

Antes de ejecutar el proyecto se necesita tener instalado:

- PHP 8.3+
- Composer
- Node.js
- PostgreSQL
- NPM

---

## Instalación

Clonar el repositorio:

```bash
git clone https://github.com/IsraelFuertes/GUIA5-781-ISRAEL-FUERTES
```

Ingresar al proyecto:

```bash
cd INF781-Laravel2FA
```

Instalar dependencias PHP:

```bash
composer install
```

Instalar dependencias Node:

```bash
npm install
```

Construir assets:

```bash
npm run build
```

Ejecutar migraciones:

```bash
php artisan migrate
```

Iniciar servidor:

```bash
php artisan serve
```

---

## Funcionalidades

- Registro de usuarios
- Inicio de sesión
- Activación de 2FA
- Generación de códigos QR
- Verificación OTP
- Middleware de protección
- Dashboard protegido

---

## Autor

Israel Fuertes  
Universidad Autónoma Tomás Frías  
INF781 - Seguridad de Software
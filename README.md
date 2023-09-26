# INSTALL THIS APP

## LANGKAH - LANGKAH
1. clone project terlebih dahulu
```javascript
git clone https://github.com/sahrull-mahani/si-tukang-risman.git
```

2. Composer update
```javascript
composer require codeigniter4/framework:4.3.6 -W
```

3. salin file **env** menjadi **.env**
```javascript
cp env .env
```

4. edit file .env *hilangkan tanda pagar #*
    - `# CI_ENVIRONMENT = development` => `CI_ENVIRONMENT = development`
    - `# app.baseURL = 'http://localhost:8080/'` => `app.baseURL = 'http://localhost:8080/'`
    - `# database.default.hostname = localhost` => `database.default.hostname = localhost`
    - `# database.default.database = si-tukang` => `database.default.database = si-tukang`
    - `# database.default.username = root` => `database.default.username = root`
    - `# database.default.password = ` => `database.default.password = `

5. buat database baru di **PHPMyadmin** dengan nama [si-tukang]

6. Jalanakan migrate
```javascript
php spark migrate
```

7. Jalanakan seeder
```javascript
php spark db:seed basic
```

8. Jalanakan seeder
```javascript
php spark db:seed basic
```

9. Jalankan aplikasi
```javascript
php spark serve
```

10. buka aplikasi di browser
```javascript
localhost:8080
```

11. buat folder di [C:\xampp\htdocs\si-tukang-risman\writable]
    - thumb
    - img

===============================================================================

## REFRESH APP

1. refresh migrate
```javascript
php spark migrate:refresh
```

2. Jalanakan seeder
```javascript
php spark db:seed basic
```
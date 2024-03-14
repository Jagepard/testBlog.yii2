<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 testBlog</h1>
    <br>
</p>

```
git clone git@github.com:Jagepard/testBlog.yii2.git
```
```
cd testBlog.yii2
```
```
composer install
```

Create a database, for example: ```testBlog_yii2```
Specify connection parameters in the configuration file: ```config/db.php```
```php
return [
    'class'    => 'yii\db\Connection',
    'dsn'      => 'mysql:host=localhost;dbname=testBlog_yii2',
    'username' => 'jagepard',
    'password' => 'password',
    'charset'  => 'utf8',
];
```

Run migrations:
```
php yii migrate/up
```
Seeding user data:
```
php yii seed/materials
php yii seed/user
```
```
Launch the built-in server:
```
php yii serve
```
Admin panel:
```
http://localhost:8080/admin
```
User identity:
```
Login: admin
Password: password
```

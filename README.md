<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About PassApp โปรแกรมครุภัณฑ์

พัฒนาด้วย Laravel version 9
ระบบที่ต้องการบน aaPanel Web server, PHP 8.1, URL rewrite laravel5,

1. ติดตั้งด้วยคำสั่ง git clone https://github.com/phichitonline/passapp.git
2. ใช้คำสั่ง composer install
3. สร้างฐานข้อมูล
4. copy ไฟล์ .env.example ให้เป็น .env ตั้งค่าเชื่อมต่อฐานข้อมูล
5. php artisan key:generate
6. สร้างตารางข้อมูลด้วยคำสั่ง php artisan migrate
7. chmod 777 storage folder.

- เข้าใช้งานครั้งแรกโดยใช้
- Username = admin@local.com
- Password = passapp

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

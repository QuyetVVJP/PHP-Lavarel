# Học PHP cơ bản
[Link tham khảo](https://www.youtube.com/watch?v=Pyz5ol_H-zw&list=PLq3KxntIWWrLpDmH_9YxuaF_yHA5QKHlN)
* Biến, kiểu dữ liệu, phạm vi sử dụng biến (biến toàn cục, cục bộ, static)
* Toán tử trong PHP 
* Chuỗi: Dấu "" các biến bên trong "" sẽ được parse
* Mảng: Tuần tự, không tuần tự, đa chiều
* If else, switch case
* Function: giá trị trả về, include, require
* Vòng lặp: for, foreach, while, do while
* POST, GET
* Upload File
# PHP Lavarel
[Link tham khảo] (https://www.youtube.com/watch?v=sMXkSWFlV28&list=PL8y3hWbcppt2nWBglaxrQm_A5sRjstdnK)

## Cấu trúc thư mục
```bash
─Laravel_Tutorial
├───app  // Chứa tất cả các Class của project
│   ├───Console  // Câu lệnh chạy ở command line
│   ├───Exceptions // Xử lý ngoại lê, điều hướng lỗi
│   ├───Http 
│   │   ├───Controllers  // Chứa phần Controller, C trong MVC
│   │   └───Middleware   // Bộ lọc request, Authen, Author
│   ├───Models    // M trong MVC Từ Laravel 8 sẽ có sẵn thư mục Models
│   └───Providers  // Thư mục chứa những file khởi động của framework và những file cấu hình auto loading, route, và file cache
├───bootstrap  // File khởi động sau khi có request
│   └───cache  
├───config    // chứa tất cả cá file config
├───database  
│   ├───factories  // Thư mực chứa các file định nghĩa các cột bảng dữ liệu để tạo ra các dữ liệu mẫu
│   ├───migrations  // thư mục chứa các file tạo và chỉnh sửa dữ liệu
│   └───seeders  // Thư mục chứa các file tạo dữ mẫu
├───lang  // Ngôn ngữ
│   └───en
├───public // Thư mục chứa file index.php giống như cổng cho tất cả các request vào project, bên trong thư mục còn chứa file JavaScript, và CSS
├───resources // Thư mục chứa những file view và raw, các file biên soạn như LESS, SASS, hoặc JavaScript
│   ├───css
│   ├───js
│   └───views  V trong MVC, chứa file View xuất giao diện người dùng
├───routes //Thư mục chứa tất cả các điều khiển route (đường dẫn) trong project. Chứa các file route sẵn có: web.php, channels.php, api.php, và console.php
│   ├───api.php // cấu hình các route liên quan đến API
│   ├───web.php // Các cấu hình route liên quan đến web (có giao diện người dùng)
├───storage // Thư mục chứa các file biên soạn blade templates của bạn, file based sessions, file caches, và những file sinh ra từ project.
│   ├───app // Dùng để chứ file sinh ra từ project
│   │   └───public  // Lưu những file người dùng tạo ra như hình ảnh
│   ├───framework  // chứ những file sinh ra từ framework và caches
│   │   ├───cache
│   │   │   └───data
│   │   ├───sessions
│   │   ├───testing
│   │   └───views
│   └───logs  // chứ logs
├───tests  // Chứa file tests
│   ├───Feature
│   └───Unit
└───vendor  // chứa các thư mục, file thư viện của Composer
└───.env // file chứa các config chính của Laravel
└───artisan // file thực hiện lệnh của Laravel
└───.gitattributes, .gitignore // xử lý git
└───composer.json, composer.lock, composer-setup.php // file sinh ra của composer
└───package.json // File chứa các package cần dùng cho project
└───phpunit.xml // xml của phpunit dùng để testing project
└───webpack.mix.js // File dùng để build các webpack
```

![Request Lifecycle Laravel](https://images.viblo.asia/b4bce647-722e-4064-ac19-b7e9e0d0573e.png)
index.php -> bootstarp/app.php 
-> app/http/kernel.php (đăng ký và khởi động service provider)
-> app/Providers/...ServiceProvider
-> routes/web.php 
-> app/http/Middleware/... (xử lý logic theo ràng buộc mà coder đặt ra)
-> app/http/Controller 
-> View 
-> trả về response cho Client

## Controler
## Middleware
## View

## Route

get, post, put, delete, patch, macth, any, prefix, redirect, parameter, name, middleware

## HTTP Request

khai báo  public function index(Request $request) để lấy thông tin của request hiện tại

Phương thức của request:
- all() : lay toan bo du lieu
- path)(): lay gia tri duong dan tru ten mien
- is(), url(), fullUrl(), isMethod(), ip(), server(), header(), input(), name
- Upload file

## Blade template laravel
- là template Engine. (Template Engine nhận data và template rồi render ra HTML trả cho user)
- {{$variable}} : hiển thị dữ liệu dạng thực thể
- {!! $variable} : hiển thị dữ liệu có biên dịch mã HTML
- for, while, foreach, forelse, if, ifelse, switch case
- include View
- @section, @yield
- @show, @parent
- master layout
- @csrf, @method('PUT)
- @stack: thay the, @push: them moi (phia duoi), @prepend: them moi (len tren)
- Directive tu dinh nghia, 
- Cache View: mặc định cache vào folder storage/framework/views
- Component: php artisan make:component Alert -> hệ thống sẽ tạo ra class trong thư mục app\View\Components 
và view trong thư mục resources/views/components

## HTTP Response
- response(), status code, gan thong tin vao Header: Content-type, cookie
- redirect(), back()
- Download file, img

## Validation
- Nếu validate không thành công thì Laravel sẽ tự động redirect về request trước kèm thông báo được gán vào Flash session
- custom message validation
- FormRequest()
- prepareForValidation()
- withValidation()
- AuthorizationException()
- Validator::make()
- create Rule Validation
- Xu ly form request bang ajax

## Database
- Thiet lap cau hinh (theo cau hinh trong file .env database.php)
- DB::select()
- DB::insert() data tu Post Request
- DB::update()
- DB::statement, delete
- groupBy, having, limit, offset
- insert, update, delete data into table
- DB Raw, select Raw, whereRaw, orderByRaw

## Query Builder
- and, or, like,between, notBetween, whereIn, whereNotIn, whereNull
- Truy van Date, truy van gia tri cot, join table

## Mini Project
Chức năng
- Danh sách
- CRUD
- Tìm kiếm
- Phân trang
- sắp xếp
## Deploy
[Link tham khảo] (https://www.youtube.com/watch?v=x2MbZKamYaM)

- Launch EC2 on AWS, connect by ssh
- Install Apache on Server
- Install MySQL Server
- Install php 8.x
- Upload project on EC2 by filezilla

## Mở rộng
- Login, logout
- Authen, Author
- Cronjob send report by Email
- Da ngon ngu


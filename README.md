# Học PHP cơ bản
[Link tham khảo](https://www.youtube.com/watch?v=Pyz5ol_H-zw&list=PLq3KxntIWWrLpDmH_9YxuaF_yHA5QKHlN)
* Biến, kiểu dữ liệu, phạm vi sử dụng biến (biến toàn cục, cục bộ, static)
* Toán tử: + - * % > < != == === && || ...
* Chuỗi: Dấu "" các biến bên trong "" sẽ được parse
* Mảng: Tuần tự, không tuần tự, đa chiều
* If else, switch case
* Function: giá trị trả về, include, require
* Vòng lặp: for, foreach, while, do while
* POST và GET là 2 phương thức của giao thức HTTP, đều là gửi dữ liệu về server xử lí sau khi người dùng nhập thông tin vào form và thực hiện submit
* Phương thức POST bảo mật hơn GET vì dữ liệu được gửi ngầm bằng mắt thường không thể nhìn thấy được.

* Phương thức GET dữ liệu được gửi tường minh, chúng ta có thể thấy trên URL nên nó không bảo mật.

* Phương thức GET luôn luôn nhanh hơn POST vì dữ liệu gửi đi được 
Browser giữ lại trong cache. 
Khi thực thi với POST thì Server luôn thực thi lệnh rồi trả về cho Client, 
còn với GET thì Browser sẽ kiểm tra trong cache có chưa, nếu có thì trả về ngay chứ không cần gửi lên Server.
* Upload File
# PHP Lavarel
[Link tham khảo] (https://www.youtube.com/watch?v=sMXkSWFlV28&list=PL8y3hWbcppt2nWBglaxrQm_A5sRjstdnK)

## Cấu trúc thư mục
```bash
─Laravel_Tutorial
├───app  // Chứa tất cả các Class của project
│   ├───Console  
│   ├───Exceptions 
│   ├───Http 
│   │   ├───Controllers  // Chứa phần Controller, C trong MVC
│   │   └───Middleware   // Bộ lọc request, Authen, Author
│   ├───Models    // M trong MVC Từ Laravel 8 sẽ có sẵn thư mục Models
│   └───Providers  // Thư mục chứa những file khởi động của framework và những file cấu hình auto loading, route, và file cache
├───bootstrap  // File khởi động sau khi có request
│   └───cache  
├───config    // chứa tất cả cá file config
├───database  
│   ├───factories 
│   ├───migrations  
│   └───seeders 
├───lang  
│   └───en
├───public // Thư mục chứa file index.php giống như cổng cho tất cả các request vào project, bên trong thư mục còn chứa file JavaScript, và CSS
├───resources // Thư mục chứa những file view và raw, các file biên soạn như LESS, SASS, hoặc JavaScript
│   ├───css
│   ├───js
│   └───views  V trong MVC, chứa file View xuất giao diện người dùng
├───routes // chứa tất cả các điều khiển route (đường dẫn) trong project
│   ├───api.php 
│   ├───web.php 
├───storage // Thư mục chứa các file biên soạn blade templates của bạn, file based sessions, file caches, và những file sinh ra từ project.
│   ├───app // Dùng để chứ file sinh ra từ project
│   │   └───public  // Lưu những file người dùng tạo ra như hình ảnh
│   ├───framework  // chứ những file sinh ra từ framework và caches
│   │   ├───cache
│   │   │   └───data
│   │   ├───sessions
│   │   ├───testing
│   │   └───views
│   └───logs  // chứa logs
├───tests  
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
index.php 
- -> bootstarp/app.php 
- -> app/http/kernel.php (đăng ký và khởi động service provider)
- -> app/Providers/...ServiceProvider
- -> routes/web.php 
- -> app/http/Middleware/... (xử lý logic theo ràng buộc mà coder đặt ra)
- -> app/http/Controller 
- -> View 
- -> trả về response cho Client

### Controler
### Middleware
### View
### Route
### HTTP Request

khai báo  public function index(Request $request) để lấy thông tin của request hiện tại

Phương thức của request: all(),path(), is(), url(), fullUrl(), isMethod(), ip(), server(), header(), input(), name
- Upload file

## Blade template laravel
- là template Engine. (Template Engine nhận data và template rồi render ra HTML trả cho user)
- {{$variable}} : hiển thị dữ liệu dạng thực thể
- {!! $variable} : hiển thị dữ liệu có biên dịch mã HTML
- for, while, foreach, forelse, if, ifelse, switch case
- include View 
- @section, @yield @show, @parent master layout @csrf, @method('PUT) @stack @push @prepend
- Directive
- Cache View: mặc định cache vào folder storage/framework/views
- Component: php artisan make:component Alert -> hệ thống sẽ tạo ra class trong thư mục app\View\Components 
và view trong thư mục resources/views/components

## HTTP Response
- response(), status code, gán thông tin vào Header: Content-type, cookie
- redirect(), back()
- Download file, img

## Validation
- Nếu validate không thành công thì Laravel sẽ tự động redirect về request trước kèm thông báo được gán vào Flash session
- custom message validation FormRequest() prepareForValidation() withValidation()  AuthorizationException() Validator::make()  create Rule Validation
- Xu ly form request bang ajax

## Database
- Thiết lập cấu hình (theo cau hinh trong file .env database.php)
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
[Link tham khảo] (https://aws.plainenglish.io/how-to-deploy-a-laravel-project-into-a-aws-ec2-instance-ae067b70e4e2)

- Launch EC2 on AWS, connect by ssh
- Install Apache on Server
- Install MySQL Server
- Install php 8.x 
- Upload project on EC2 by filezilla, git

## Mở rộng
- Login, logout
- Authen, Author
- Cronjob send report by Email
- i18


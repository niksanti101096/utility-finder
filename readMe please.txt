Instruction to install:

1. Install Xampp with php version 5.6 or higher [7.something recommended]
2. C:\xampp\htdocs -> place this project folder
3. In localhost/phpmyadmin, create database named 'template_db' and IMPORT database from C:\xampp\htdocs\test-template\database\template_db.sql
4. Access using localhost/test-template [username: 'admin'; password: 'password']

Important:

* Frontend: Javascript, Jquery, ajax, bootstrap, vuexy template
* Backend: Codeigniter 3, php

* Codeigniter is MVC => Model View Controller 

* In frontend, ajax is used to send http method[GET, POST, DELETE, PUT] requests to backend

* Table list -> Datatable using ajax

File locations(important):
* Config => application/config/config.php & /database.php (look for codeigniter 3 user_guide, codeigniter setup)
* Backend => application/controllers/, applications/models/, application/views/
* Javascript of pages => assets/template/js/
* System CSS => insert css @ assets/css/style.css [add !imporatant if not working, it may work :) e.g. 'border: 1 !importat;']
* Images => assets/img/ [if want to call in .php <?php echo base_url('assets/img/xxxx') ?>]

In checking: 

* Frontend: 
	* Open console [F12], search google to disable cache on console
	* in js script, use 'console.log()' function. search gyapon google sa usage
* Backend:
	* using var_dump() is good, search google
	* errors usually shows in page. also in console as error 500 (internal server error)

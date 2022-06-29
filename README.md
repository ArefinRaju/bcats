<p align="center"><a href="https://medbill.com.bd" target="_blank"><img src="https://birganj24.com/wp-content/uploads/2021/07/logo.png" width="400"></a></p>

# BCATS

- First you should download the project.
- Please setup your composer file by command.
	```
	composer install
	```

- Than please duplicate the .env.example file -> .end file and set the database name
	```
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=database_name_here
	DB_USERNAME=root
	DB_PASSWORD=
	```
- Than you should setup authentication of laravel default auth..
- And now please migrate the all of the migration file...
	```
	php artisan migrate
	```
- Now please generate the key...
	```
	php artisan key:generate
	```	
- After completing the all of the setup than you use seeder.....
- You should data seed by this command.
	```
	php artisan db:seed
	```
- Now for server run...
	```
	php artisan serve
	```
- For accessing the admin panel..
    ```
    Super-Admin: systemadmin@gmail.com
    Passowrd: 123
    ```

###### Thanks.....		

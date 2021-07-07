## About This project
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

This is a blog i made using laravel, nothing fancy, i didn't use eloquent to persist my data rather i used typical sql/mysql to create by my side (that's why some forms lack security).

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
## Features of this blog :

I wanted this blog to have a Post and comment system, any logged in user can add a Post or Comment and guests (non authethified users) will just get redirected to home page.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
## the goal of this project was to get a feel of laravel's workflow. 
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Stuff i learnt doing this project :
	---
	Different value of directories :
		-- app/http/controllers/'Controller name' we create new controllers with command php artisan make:controller 'controller name'
		-- ressources/views/'blade files' for views 
		-- routes/web.php for setting up routes of our app
		-- public/ for css/js files
	using DB::'method' to access our database
	---
	I also got to search and learn more about foreign keys (their utility and how to write a query for foreign keys and its constrains in this project)
		-- theres was 1 FK in the table Posts (user_id) and 2 FK in table comments (user_id/post_id)
	---
	I learnt the logic of vagrant in how it helps speed up the process of setting up a VM while i was setting Homestead, i gotta say it was a real pleasure and i love this aspect of laravel.
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
## To use this project as a base for yours :
	1- Install virtualbox/ vagrant... clone homestead directory somewhere in your app
	2- Clone this project and copy its path to the sitemap of homestead.yaml config file
	3- Launch your VM with 'vagrant up' and connect to it with 'vagrant ssh'
	4- Import the database using mysql
	5- play around with the project until you understand how its set up and add your own features.

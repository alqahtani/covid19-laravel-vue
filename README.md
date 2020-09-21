# COVID19 Tracker App - Laravel & Vue.js

This app is built upon a task requested during a job interview.

### Task Description and Requirements
1. Create database for Countries contains all possible countries with 
Covid19 cases
2. build api link called /api/fill_data when user hit it, it will get
the data from the following api link and insert or update(if country 
exist) all countries data in the database.
https://coronavirus-19-api.herokuapp.com/countries
3. Build 4 pages:
    * add country with covid19 details page
    * edit ... page
    * view ... page
    * list all data as world map with country covid cases details on mouse hover. 
    * Below the map there should be a table includes the data and actions column (edit, delete)

4. Feel free to use any template or native bootstrap
5. Mandatory tech-stack: [Laravel](https://laravel.com/) & [vuejs](https://vuejs.org/)


## Installation

1. clone this repo to your local machine: `git clone git@github.com:alqahtani/covid19-laravel-vue.git`
2. change directory to the project: `cd covid19-laravel-vue`
3. install the dependencies using **composer**: `composer install`
4. install the node packages needed: `npm install`
5. create a mysql database with name "covid19_laravel_vue"
6. run this **php artisan** command to generate a key for the app: `php artisan key:generate`

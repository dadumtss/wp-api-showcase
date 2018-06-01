# My Theme

## Requirements
* PHP 7
* MySQL

## How to install

* Make sure, you have [Composer](https://getcomposer.org/) installed 
* Create a `wp-config.php` in the root of the project.
You can take the `wp-config-sample.php` as a sample one. Duplicate the file, and don't leave the sample-file as is.
Just add the DB credentials (`DB_NAME`, `DB_USER`, `DB_PASSWORD`, `DB_HOST`), and `PROJECT_URL`to your `wp-config.php` file.
* Run `composer install` in the project root
* Install Wordpress (-> Install Wordpress locally)
* Create and link the new pages (-> Create and link Pages)
* View the pages (-> How to use)


## Install Wordpress locally
* Make sure, you have PHPv7 installed 
* Change your directory to the where you cloned this project
* Open local PHP Server: `php -S  localhost:3030`
* Open your Browser and open `localhost:3030` and follow instructions.
* Login to your newly created Wordpress installation and go to `Design->Themes` and change the Theme to `Your Theme`
* Go to `Plugins` and activate all plugins



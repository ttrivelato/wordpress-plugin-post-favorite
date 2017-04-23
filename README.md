# wordpress-plugin-post-favorite

A simple plugin for wordpress. Allows you add POSTS to our favorites list.

## Getting Started

To the plugin works it is necessary that you already have the wordpress installed.
If doesn't you can download and install wordpress(https://wordpress.com).

**About The Folders**

archive
The compressed(zip) plugin ready to be installed on your wordpress.

assets
Javascript and image files necessary to the plugin works properly.

bin
Necessary to test wordpress and plugin by using Shell file.

src
Required classes for plugin operation

tests
Test suite using phpunit

### Prerequisites

Apache2
PHP
MYSQL
Subversion
Composer
PhpUnit

### Installing

Once you have installed wordpress, just use the compressed file:
archive/wordpress-plugin-post-favorite.zip

Loged as admin in your wordpress go to the menu Plugins -> Add New and and click at plugin upload.
When the plugin was installed in your wordpress just activate to start the use.

A functional example can be viewed at:
http://wordpress-plugin-post-favorite.ttrivelato.com.br

## Running the tests

Run the PHPUNIT and Composer installation.
The bin(/bin) folder contains the shell script to install the wordpress sample necessary to run the tests.

Run the command:
bash bin/install-wp-tests.sh your_database your_user 'your_pass' your_host latest

After installed the wordpress sample, run the test suite with the command:
phpunit -c phpunit.xml

## Built With

* [Wordpress](https://wordpress.com)
* [Composer](https://getcomposer.org/)
* [PhpUnit](https://phpunit.de/)

## Author

* **Thiago Trivelato** - (https://ttrivelato.com.br)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
# Project Title

A simple plugin for wordpress. Lets you add POSTS to a list in our favorites.

## Getting Started

For the project to work it is necessary that you already have the wordpress (https://wordpress.com)
Download and install wordpress.

**About The Folders**

archive
The compressed(zip) plugin ready to be installed on your wordpress.

assets
Necessary image and javascript files for the operation of the plugin.

bin
Shell file used to test wordpress and plugin

src
Classes required for plugin operation

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
archive/1.0.zip

In the wordpress admin go to the Plugins/Add New menu and execute the plugin upload.
With the plugin inserted in your wordpress just activate to release the use.

A functional example can be viewed at:
http://wordpress-plugin-post-favorite.ttrivelato.com.br

## Running the tests

Run the PHPUNIT and Composer installation.
The bin(/bin) folder contains the shell script for installing the wordpress sample needed for the tests.

Run the command:
bash bin/install-wp-tests.sh your_database your_user 'your_pass' your_host latest

After installing the example wordpress run the test suite with the command:
phpunit -c phpunit.xml

## Built With

* [Wordpress](https://wordpress.com)
* [Composer](https://getcomposer.org/)
* [PhpUnit](https://phpunit.de/)

## Authors

* **Thiago Trivelato** - (https://ttrivelato.com.br)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
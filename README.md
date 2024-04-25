Project for Brookes Course COMP7029.

INSTALL:

Designed to run within xampp install. Install xampp from: https://www.apachefriends.org/

Default install settings can be used.

Download the following zip file and extract: https://github.com/mongodb/mongo-php-driver/releases/download/1.18.1/php_mongodb-1.18.1-8.2-ts-x64.zip

Copy php_mongodb.dll from the extracted folder into {your-xampp-folder-location}\php\ext\ folder

Open php.ini inside {your-xampp-folder-location}\php\ folder. edit it to have the following lines added:

;add extension for mongodb
extension=php_mongodb.dll

To test, open the xampp control panel, click on shell and run: php -v

if there are no errors, this was succesful.

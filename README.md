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



<!-- MIT LICENCE INCLUDED BELOW FOR THE PELL EDITOR, OBTAINED FROM https://github.com/jaredreich/pell -->
The MIT License (MIT)

Copyright (c) Jared Reich

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

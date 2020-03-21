# ToDo

Simple ToDo-list on PHP.

[Demo](http://todo.lukin.site/)

### Tech

ToDo uses a number of open source projects to work:

* [Twitter Bootstrap](http://twitter.github.com/bootstrap/) - great UI boilerplate for modern web apps
* [Flat UI](http://designmodo.github.io/Flat-UI/) - a beautiful theme for Bootstrap
* [jQuery](http://jquery.com) - JavaScript Library

### Installation
ToDo will require web-server (Apache / Nginx), PHP and MySQL.

Configure your server directory to the **todo\public** folder. The configuration for Nginx is in the **todo.conf** file. The **.htaccess** file for Apache in a **public** folder.

Open phpMyAdmin, create a database, and import the **db_structure.sql** file and **db_userdata.sql** file from the **todo** folder.

If necessary, you can change the database connection settings in the **config.php** file in the **todo\app** directory.


License
----

MIT


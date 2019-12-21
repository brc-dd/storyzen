# StoryZen

A one-click publishing tool combined with a minimal editor.

## How to Deploy

1. Download as zip from GitHub\'s ___clone or download___ option.
2. Unzip to your `www` or `htdocs` folder according to your configuration.
3. Run the query inside `sql.sql` to create a table named `stories`.
4. Edit `config.php` and fill your SQL details and you\'re ready to go!

### For very beginners

On a common cPanel based hosting service, you need to create a MySQL database. (An option will be there for this in a section labeled as ___databases___.) After creating the database, you\'ll get your credentials which you have to put in the `config.php` file. Then you need to go to ___sql___ tab after searching for your created database in ___phpMyAdmin___.

## Credits

* for code:
    1. Tim Holman (@tholman) for ZenPen used under MIT License, (C) 2017.
    2. Benjamin (@RazrSaw) for What a Story used without any license.
* for inspiration:
    telegra.ph

### Clarification

 The code would have much better and optimised, if I had used node.js and non-SQL databases instead of PHP and SQL. Also, I admit that quill.js is a much better and powerfull alternative to ZenPen. But some industrials constraints compelled me to write this code in the way you are seeing it.

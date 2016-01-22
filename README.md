# wp-starter-theme

This is a basic Wordpress project based on a very hacked up version of the [Bones](http://themble.com/bones/) that also includes Gulp for compiling assets.

Used for when building a theme almost from scratch with custom template designs and custom css/sass framework.

### Notes

What normally goes in functions.php is broken up into smaller files for better code organization. All functions.php does is include the necessary files and manage all Wordpress action hooks and filters. Seeing all the hooks and filters in once place rather than spread out throughout the functions file or many files makes it easier to know exactly what is happening everywhere.

Unlike Bones, assets are stored in their own directory, separate from templates or php.

Gulp is set up to watch for changes to sass or script files and compile, concatenate, and minify code. You can also set a `WP_ENV` variable to "production" or "development" which will use either the minified or non-minified versions of the js and css.

This project is meant to be a starting point to build from and will not work at all out of the box.

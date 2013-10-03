inlinethatcss
=============

You know how your baseline css file is a separate http request? Just inline it... transfer speeds are fast enough nowadays.

# What?

This is a very rudimentary approach to inline css files that would otherwise be `<link>`d into the content generating yet another http request.

# Why?

Because of [Patrick Hamann](https://twitter.com/patrickhamann)'s Front End London [talk on 28th September about CSS paths](https://speakerdeck.com/patrickhamann/css-and-the-critical-path).

# How?

So basically there are a few bits to it.

## The css

Have it somewhere. Don't care how you generate it, as long as you know where it is. I use grunt to compile my sass into glorious css, minified usually.

## The header / html

Instead of using `<link href="style.css">`, just use `<?php inline_css( '/style.css', __FILE__ ); ?>` within `<style>` tags after the opening `<body>` tag, and you're done. You can inline multiple css files, obviously.

## The functions

Look in the `functions.php` file. Chances are you will need to modify bits of it. The path to where you store the images to start with. There's also a function that is WordPress specific function (`get_stylesheet_directory_uri()`), which essentially just returns the URL for the directory where the specific file is. Feel free to replace it with your own.

# Questions?

Open an issue, and I'll try to deal with it. Or fork, fix, and issue a PR, and describe what you've done and why.

<?php

/**
 * Shorthand function to output css inline
 * @param  string 	$path 	This is the path relative to the $from directory. This is
 *                        	fielsystem path, not uri!
 * @return const 	$from	Just pass __FILE__ from where you want to include the css.
 *                      	This is needed in case the file that has this function is
 *                      	not in the same directory as the file you're calling it
 *                      	from.
 * @author Gabor Javorszky <gabor@javorszky.co.uk>
 */
function inline_css( $path, $from ) {
    echo fix_css_paths( file_get_contents( dirname( $from ) . $path ) );
}


/**
 * This fixes the relative urls to absolute urls. The problem with relative urls is
 * that they will be appended to the current address of the page. Now if you're four
 * levels deep in a hierarchy, your static assets will no longer be found.
 *
 * This is a utility function, it probably shouldn't be called directly.
 *
 * @param  string 	$file 	This is the content of the entire css file being output.
 * @return string 			The content with the modified paths in it.
 * @author Gabor Javorszky <gabor@javorszky.co.uk>
 */
function fix_css_paths( $file ) {
    $pattern = '>url\(images\/(.*?)\)>i';
    $replacement = 'url('. get_stylesheet_directory_uri() . '/images/$1)';
    $file2 = preg_replace( $pattern, $replacement, $file );
    return $file2;
}

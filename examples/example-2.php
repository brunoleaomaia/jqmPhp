<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use jqmPhp\Container as JqmContainer;
use jqmPhp\Tag\Page;

/**
 * Example 2 - Adding Pages
 * @package jqmPhp
 * @filesource
 */


/**
 * Create a new jqmPhp object.
 */
$j = new JqmContainer();

/**
 * Create a new Page object and populate it
 */
$p = new Page('example-2');
$p->theme('b');
$p->title('Example 2');
$p->header()->addButton('Example 1', 'example-1.php#', 'a', 'arrow-l');
$p->header()->addButton('Example 3', 'example-3.php#', 'b', 'arrow-r');
$p->header()->theme('a');
$p->addContent('<h1>Adding Pages</h1>');
$p->addContent('<p>In this example we create a Page,');
$p->addContent(' add content and Buttons to the Header.');
$p->addContent(' After we add the page to Container object.</p>');
$p->addContent('<a href="index.php#" data-role="button" data-theme="a">Home</a>');
$p->addContent('<a href="example-3.php#" data-role="button">Example 3</a>');
$p->footer()->title('Example 2 Footer');
$p->footer()->position('fixed');
$p->footer()->theme('a');
/**
 * Add the page to Container object.
 */
$j->addPage($p);

/**
 * Have the container generate the HTML code.
 */
echo $j;
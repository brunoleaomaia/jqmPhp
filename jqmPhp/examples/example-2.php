<?php
    /**
     * Example 2 - Adding Pages
     * @package jqmPhp
     * @filesource
     */

    /**
     * Include the jqmPhp class.
     */
    include '../lib/jqmPhp.php';

    /**
     * Create a new jqmPhp object.
     */
    $j = new jqmPhp();

    /**
     * Create a new jqmPage object.
     */
    $p = new jqmPage('example-2');
    $p->theme('b');
    $p->title('Example 2');
    $p->header()->addButton('Example 1', 'example-1.php#', 'a', 'arrow-l');
    $p->header()->addButton('Example 3', 'example-3.php#', 'b', 'arrow-r');
    $p->header()->theme('a');
    $p->addContent('<h1>Adding Pages</h1>');
    $p->addContent('<p>In this example we create a page (jqmPage),');
    $p->addContent(' add content and buttons to the header.');
    $p->addContent(' After we add the page to jqmPhp object.</p>');
    $p->addContent('<a href="index.php#" data-role="button" data-theme="a">Home</a>');
    $p->addContent('<a href="example-3.php#" data-role="button">Example 3</a>');
    $p->footer()->title('Example 2 Footer');
    $p->footer()->position('fixed');
    $p->footer()->theme('a');
    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
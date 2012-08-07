<?php
    /**
     * Examples Index
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
     * Config 'html' and 'head' tag.
     */
    $j->head()->title('Examples');

    /**
     * Create and config a jqmPage object.
     */
    $p = new jqmPage('examples');
    $p->theme('b')->title('Examples');
    $p->header()->theme('a');
    $p->header()->addButton('Home', './', '', 'home');
    //Get the Button Added and Set Attributes
    $p->header()->items()->get(1)->attribute('data-iconpos', 'notext')->attribute('rel', 'external');
    
    /**
     * Create and config a new jqmListview object and add Items.
     */
    $list1 = new jqmListview();
    $list1->splitIcon('search')->splitTheme('c');
    $list1->addDivider('Beginner', '2')->inset(true);
    $list1->addBasic('Basic Example', 'example-1.php#');
    $list1->items()->get(1)->add('<a href="example-1.php.txt" rel="external" target="_blank"></a>');
    $list1->addBasic('Adding Pages', 'example-2.php#');
    $list1->items()->get(2)->add('<a href="example-2.php.txt" rel="external" target="_blank"></a>');
    $list1->addDivider('Intermediate', '3');
    $list1->addBasic('Adding Objects', 'example-3.php#');
    $list1->items()->get(4)->add('<a href="example-3.php.txt" rel="external" target="_blank"></a>');
    $list1->addBasic('Adding Form Elements', 'example-4.php#');
    $list1->items()->get(5)->add('<a href="example-4.php.txt" rel="external" target="_blank"></a>');
    $list1->addBasic('Adding Listview', 'example-5.php#');
    $list1->items()->get(6)->add('<a href="example-5.php.txt" rel="external" target="_blank"></a>');
    $list1->addDivider('Advanced', '3');
    $list1->add('<li><a href="custom-css.php" rel="external">Custom CSS</a><a href="custom-css.php.txt" rel="external" target="_blank"></a></li>');
    $list1->add('<li><a href="custom-js.php" rel="external">Custom JavaScript</a><a href="custom-js.php.txt" rel="external" target="_blank"></a></li>');
    $list1->addBasic('Load Simple XML', 'simple-xml.php#');
    $list1->items()->get(10)->add('<a href="simple-xml.php.txt" rel="external" target="_blank"></a>');
    $p->addContent($list1);

    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
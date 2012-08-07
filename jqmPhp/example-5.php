<?php
    /**
     * Include the jqmPhp class.
     */
    include 'lib/jqmPhp.php';

    /**
     * Create a new jqmPhp\jqmPhp object.
     */
    $j = new jqmPhp\jqmPhp();

    /**
     * Config 'html' and 'head' tag.
     */
    $j->head()->title('Example 5');

    /**
     * Create and config a jqmPage object.
     */
    $p = new jqmPhp\jqmPage('example-5');
    $p->theme('b')->title('Example 5');
    $p->header()->theme('a');

    /**
     * Create and config a new jqmPhp\jqmNavbar object and add items.
     */
    $nav = $p->header()->add(new jqmPhp\jqmNavbar(), true);
    $nav->add(new jqmPhp\jqmButton('', '', '', 'a', 'example-1.php#', 'EX1', '', false));
    $nav->add(new jqmPhp\jqmButton('', '', '', 'a', 'example-2.php#', 'Ex2', '', false));
    $nav->add(new jqmPhp\jqmButton('', '', '', 'a', 'example-3.php#', 'EX3', '', false));
    $nav->add(new jqmPhp\jqmButton('', '', '', 'a', 'example-4.php#', 'EX4', '', false));
    $nav->add(new jqmPhp\jqmButton('', '', '', 'a', '#', 'EX5', '', true));
    

    /**
     * Confif page footer (jqmFooter).
     */
    $p->footer()->addButton('EX1', 'example-1.php#', '', 'arrow-l');
    $p->footer()->addButton('EX2', 'example-2.php#', '', 'arrow-l');
    $p->footer()->addButton('EX3', 'example-3.php#', '', 'arrow-l');
    $p->footer()->addButton('EX4', 'example-4.php#', '', 'arrow-l');
    $p->footer()->addButton('EX5', '#', '', 'check', true);
    
    $p->footer()->group(true)->uiBar(true)->theme('a');

    /**
     * Create and config a new jqmPhp\jqmListview object and add Basic Items.
     */
    $p->addContent('<h1>Adding Listviews</h1>');
    $p->addContent('<h3>Basic</h3>');
    $list1 = new jqmPhp\jqmListviem();
    $list1->addDivider('Basic Examples', '2')->inset(true);
    $list1->addBasic('Example 1', 'example-1.php#');
    $list1->addBasic('Example 2', 'example-2.php#');
    $list1->addDivider('Advanced Examples', '3')->inset(true);
    $list1->addBasic('Example 3', 'example-3.php#');
    $list1->addBasic('Example 4', 'example-4.php#');
    $list1->addBasic('Example 5', '#');
    $p->addContent($list1);

    /**
     * Create and config a new jqmPhp\jqmListview object and add Icon Items.
     */
    $p->addContent('<h3>Icon</h3>');
    $list2 = new jqmPhp\jqmListviem();
    $list2->inset(true)->addDivider('Animals')->dividerTheme('a');
    $list2->addIcon('Dogs', '#', 'docs/images/dog.png', '13');
    $list2->addIcon('Cats', '#', 'docs/images/cat.png', '10');
    $p->addContent($list2);

    /**
     * Create and config a new jqmPhp\jqmListview object and add Thumbnails Items.
     */
    $p->addContent('<h3>Thumbnails</h3>');
    $list3 = new jqmPhp\jqmListviem();
    $list3->inset(true);
    $list3->addThumb('YouTube', 'www.youtube.com', 'http://www.youtube.com', 'docs/images/youtube.png');
    $list3->addThumb('Flickr', 'www.flickr.com', 'http://www.flickr.com', 'docs/images/flickr.png');
    $list3->addThumb('Picasa', 'picasaweb.google.com', 'http://picasaweb.google.com', 'docs/images/picasa.png');
    $list3->addThumb('Feedburner', 'www.feedburner.com', 'http://www.feedburner.com', 'docs/images/feedburner.png');
    $p->addContent($list3);

    /**
     * Create and config a new jqmPhp\jqmListview object and add Split Items.
     */
    $p->addContent('<h3>Split</h3>');
    $list4 = new jqmPhp\jqmListviem();
    $list4->inset(true)->splitIcon('gear')->splitTheme('c');
    $list4->addDivider('Unread Messages', '11')->dividerTheme('c')->countTheme('b');
    $list4->addSplit('Account 1', '#', '#', '09');
    $list4->addSplit('Account 2', '#', '#', '02');
    $list4->addSplit('Account 3', '#', '#', '00');
    $p->addContent($list4);

    /**
     * Create and config a new jqmPhp\jqmListview object and add Nested Items.
     */
    $p->addContent('<h3>Nested</h3>');
    $list5 = new jqmPhp\jqmListviem();
    $list5->inset(true)->theme('a');
    $list5->addDivider('Cars');
        $fiat = new jqmPhp\jqmListviem();
        $fiat->addBasic('Bravo', 'example-5.php#');
        $fiat->addBasic('Linea', 'example-5.php#');
        $fiat->addBasic('Punto', 'example-5.php#');
    $list5->addNested('Fiat', $fiat);
        $gm = new jqmPhp\jqmListviem();
        $gm->addBasic('Celta', 'example-5.php#');
        $gm->addBasic('Agile', 'example-5.php#');
        $gm->addBasic('Vectra', 'example-5.php#');
    $list5->addNested('GM', $gm);
        $honda = new jqmPhp\jqmListviem();
        $honda->addBasic('Fit', 'example-5.php#');
        $honda->addBasic('City', 'example-5.php#');
        $honda->addBasic('Civic', 'example-5.php#');
    $list5->addNested('Honda', $honda);
    $p->addContent($list5);
    
    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>
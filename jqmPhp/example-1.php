<?php
    /**
     * This is a minimalist example. All classes in the jqmPhp package
     * can be converted to string and printed with an 'echo' function.
     */
    include 'lib/jqmPhp.php';
    $j = new jqmPhp();
    $j->addBasicPage('example-1', 'Example 1', '<h1>Hello World</h1><p>This is a basic page!</p><a href="example-2.php#">Exemple 2</a>');
    echo $j;
?>
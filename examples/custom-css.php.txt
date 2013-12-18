<?php
    /**
     * Adding custom CSS
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
    $jqmPhp = new jqmPhp();
    
    /**
     * Adding custom CSS to jqmHead in jqmPhp
     */
    $jqmPhp->head()->title('Custom CSS Example');
    $jqmPhp->head()->add(new jqmLink('custom.css'));
    

    /**
     * Create a new jqmPage object.
     */
    $p = new jqmPage('custom-css');
    $p->theme('b');
    $p->title('Custom CSS Example');    
    $p->header()->theme('a');
    $bt = $p->header()->addButton('', 'index.php#', 'a', 'home', false, false, true);
    $bt->rel('external')->attribute('data-iconpos', 'notext');
    
    /**
     * Adding Content.
     */
    $p->addContent('<h1>Adding Custom CSS</h1>');
    $p->addContent('<p align="justify">To add a custom CSS you need add the tag <b>'.htmlspecialchars('<link...></link>').'</b>');
    $p->addContent(' to the jqmHead object [<b>'.htmlspecialchars('$jqmPhp->head()').'</b>] in the jqmPhp instance. ');
    $p->addContent('To facilitate the addition of CSS you can use the class <b>jqmLink</b> as example:</p>');
    $p->addContent('<pre class="ui-body-c">$jqmPhp = new jqmPhp();'."\n".'$jqmPhp->head()->add('."\n\t".'new jqmLink(\'custom.css\')'."\n".');</pre>');
    
    
    /**
     * Adding Source Code Links.
     */
    $list = new jqmListview();
    $list->inset(true)->dividerTheme('a');
    $list->addDivider('Source Code');
    $li = $list->addBasic('custom.css', 'custom.css', '', true);
    $li->rel('external')->target('_blank');
    $li = $list->addBasic('custom-css.php', 'custom-css.php.txt', '', true);
    $li->rel('external')->target('_blank');
    $p->addContent($list);
            
    /**
     * Add the page to jqmPhp object.
     */
    $jqmPhp->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $jqmPhp;
?>
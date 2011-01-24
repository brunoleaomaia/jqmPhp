<?php
/*
 *  jqmPhp - HTML code generator for jQuery Mobile Framework
 *  Copyright (C) 2011  Bruno Maia
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Sets the library path.
 * @var JQMPHP_PATH
 */
define('JQMPHP_PATH', 'lib/', true);


/*
 * Includes required files.
 */
require_once JQMPHP_PATH.'jqmCollection.php';
require_once JQMPHP_PATH.'jqmTag.php';
require_once JQMPHP_PATH.'jqmAttribute.php';
require_once JQMPHP_PATH.'jqmBody.php';
require_once JQMPHP_PATH.'jqmButton.php';
require_once JQMPHP_PATH.'jqmCollapsible.php';
require_once JQMPHP_PATH.'jqmContent.php';
require_once JQMPHP_PATH.'jqmControlgroup.php';
require_once JQMPHP_PATH.'jqmFieldcontain.php';
require_once JQMPHP_PATH.'jqmHeader.php';
require_once JQMPHP_PATH.'jqmFooter.php';
require_once JQMPHP_PATH.'jqmForm.php';
require_once JQMPHP_PATH.'jqmGrid.php';
require_once JQMPHP_PATH.'jqmHead.php';
require_once JQMPHP_PATH.'jqmHtml.php';
require_once JQMPHP_PATH.'jqmInline.php';
require_once JQMPHP_PATH.'jqmInput.php';
require_once JQMPHP_PATH.'jqmCheckboxgroup.php';
require_once JQMPHP_PATH.'jqmLabel.php';
require_once JQMPHP_PATH.'jqmListitem.php';
require_once JQMPHP_PATH.'jqmListview.php';
require_once JQMPHP_PATH.'jqmLink.php';
require_once JQMPHP_PATH.'jqmNavbar.php';
require_once JQMPHP_PATH.'jqmOption.php';
require_once JQMPHP_PATH.'jqmPage.php';
require_once JQMPHP_PATH.'jqmRadiogroup.php';
require_once JQMPHP_PATH.'jqmRange.php';
require_once JQMPHP_PATH.'jqmScript.php';
require_once JQMPHP_PATH.'jqmSelect.php';
require_once JQMPHP_PATH.'jqmSlider.php';
require_once JQMPHP_PATH.'jqmText.php';
require_once JQMPHP_PATH.'jqmTextarea.php';
require_once JQMPHP_PATH.'jqmTitle.php';

/**
 * jqmPhp - HTML code generator for jQuery Mobile Framework
 * @class jqmPhp
 * @author Bruno Maia <brunoleaomaia@gmail.com>
 * @copyright Copyright (c) 2011, Bruno Maia
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.01
 * @link http://code.google.com/p/jqmphp/ jqmPhp Project Website
 * @link http://www.jquerymobile.com jQuery Mobile Website
 */
class jqmPhp {
    private $_html;
    /**
     *
     * @param string $doctype
     * @param string $xmlns
     * @param string $charset
     * @param string $title
     * @param string $css
     * @param string $jq
     * @param string $jqm
     */
    function __construct($doctype='html',$xmlns='http://www.w3.org/1999/xhtml',$charset='UTF-8',$title='',$css='http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css',$jq='http://code.jquery.com/jquery-1.4.4.min.js',$jqm='http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js'){
         $this->_html = new jqmHtml($doctype, $xmlns, $charset, $title, $css, $jq, $jqm);
    }
    /**
     * @access private
     * @return string
     */
    function __toString(){
        $string = '';
        $string.= $this->_html;
        return $string;
    }
    /**
     * Gets the 'HTML' element (jqmHtml).
     * @return jqmHtml
     */
    function html() {
        return $this->_html;
    }
    /**
     * Gets the 'HEAD' element (jqmHead).
     * @return jqmHead
     */
    function head() {
        return $this->html()->head();
    }
    /**
     * Gets the 'BODY' element (jqmBody).
     * @return jqmBody
     */
    function body() {
        return $this->html()->body();
    }
    /**
     * Adds a page (jqmPage) to the pages collection of HTML Body element (jqmBody).
     * @param jqmPage $page
     * @param bool $returnAdded
     * @return jqmPhp|jqmPage
     */
    function addPage($page, $returnAdded=false) {
        $this->_html->body()->addPage($page);
        if ($returnAdded) return $page;
        return $this;
    }
    /**
     * Adds a page (jqmPage) to the pages collection of HTML Body element (jqmBody).
     * @param jqmPage $page
     * @param bool $returnAdded
     * @return jqmPhp|jqmPage
     */
    function addBasicPage($id, $title, $content, $returnAdded=false) {
        $page = new jqmPage($id);
        $page->title($title)->addContent($content);
        $this->_html->body()->addPage($page);
        if ($returnAdded) return $page;
        return $this;
    }
    /**
     * Gets the pages collection in HTML Body (jqmBody).
     * @return jqmCollection
     */
    function pages() {
        return $this->_html->body()->pages();
    }
}
?>

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
 * Sets the library folder name.
 * @var JQMPHP_FOLDER
 */
define('JQMPHP_FOLDER', 'lib', true);
/**
 * Sets the library path.
 * @var JQMPHP_PATH
 */
define('JQMPHP_PATH', realpath(dirname(__FILE__).'/../'.JQMPHP_FOLDER.'/').'/', true);
/**
 * Sets the Application Default Title.
 * @var JQMPHP_TITLE
 */
define('JQMPHP_TITLE', '', true);
/**
 * Sets the jQuery path.
 * @var JQMPHP_JQ
 */
define('JQMPHP_JQ', 'http://code.jquery.com/jquery-1.5.min.js', true);

/**
 * Sets the jQuery Mobile path.
 * @var JQMPHP_JQM
 */
define('JQMPHP_JQM', 'http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js', true);

/**
 * Sets the jQuery Mobile CSS path.
 * @var JQMPHP_CSS
 */
define('JQMPHP_CSS', 'http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css', true);

/**
 * Sets the Default Doctype.
 * @var JQMPHP_DOCTYPE
 */
define('JQMPHP_DOCTYPE', 'html', true);

/**
 * Sets the Default Xmlns.
 * @var JQMPHP_XMLNS
 */
define('JQMPHP_XMLNS', 'http://www.w3.org/1999/xhtml', true);

/**
 * Sets the Default Charset.
 * @var JQMPHP_CHARSET
 */
define('JQMPHP_CHARSET', 'UTF-8', true);

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
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.03
 * @since 0.01
 * @link http://www.jqmphp.com/ jqmPhp Website
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
    function __construct($doctype=JQMPHP_DOCTYPE,$xmlns=JQMPHP_XMLNS,$charset=JQMPHP_CHARSET,$title=JQMPHP_TITLE,$css=JQMPHP_CSS,$jq=JQMPHP_JQ,$jqm=JQMPHP_JQM){
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

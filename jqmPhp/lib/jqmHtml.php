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
 * This file is part of the jqmPhp package.
 * @package jqmPhp
 * @filesource
 */
/**
 * This class represents the 'html' tag.
 * @class jqmHtml
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
class jqmHtml extends jqmTag  {
    private $_doctype;
    private $_head;
    private $_body;
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
         parent::__construct('html');
         $this->_doctype = new jqmText($doctype);
         $this->_head = $this->add(new jqmHead($xmlns,$charset,$title,$css,$jq,$jqm),true);
         $this->_body = $this->add(new jqmBody(),true);
    }
    /**
     * @access private
     * @return string
     */
    function __toString(){
        $string = '<!DOCTYPE '.$this->doctype().'>';
        $string.= parent::__toString();
        return $string;
    }
    /**
     * Gets and sets the doctype property.
     * @param string $value
     * @return string|jqmHtml
     */
    function doctype(){
        $args = func_get_args();
        if (count($args) == 0) return $this->_doctype->text();
        $this->_doctype->text($args[0]);
        return $this;
    }
    /**
     * Gets the Head element (jqmHead).
     * @return jqmHead
     */
    function head() {
        return $this->_head;
    }
    /**
     * Gets the Body element (jqmBody).
     * @return jqmBody
     */
    function body() {
        return $this->_body;
    }
    /**
     * Adds a page to the pages collection of HTML Body element (jqmBody).
     * @param jqmPage $page
     * @param bool $returnAdded
     * @return jqmHtml|jqmPage
     */
    function addPage($page, $returnAdded=false) {
        $this->body()->addPage($page);
        if ($returnAdded) return $page;
        return $this;
    }
    /**
     * Gets the pages collection in HTML Body (jqmBody).
     * @return jqmCollection
     */
    function pages() {
        return $this->_body()->pages();
    }
}
?>

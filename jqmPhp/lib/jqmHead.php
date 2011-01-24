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
 * This class represents the 'head' tag.
 * @class jqmHead
 * @author Bruno Maia <brunoleaomaia@gmail.com>
 * @copyright Copyright (c) 2011, Bruno Maia
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.01
 * @link http://code.google.com/p/jqmphp/ jqmPhp Project Website
 * @link http://www.jquerymobile.com jQuery Mobile Website
 */
class jqmHead extends jqmTag {
    private $_xmlns;
    private $_charset;
    private $_title;
    private $_css;
    private $_jq;
    private $_jqm;
    /**
     *
     * @param string $xmlns
     * @param string $charset
     * @param string $title
     * @param string $css
     * @param string $jq
     * @param string $jqm
     */
    function __construct($xmlns='http://www.w3.org/1999/xhtml',$charset='UTF-8',$title='',$css='http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css',$jq='http://code.jquery.com/jquery-1.4.4.min.js',$jqm='http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js'){
        parent::__construct('head');
        $this->_xmlns = $this->attribute('xmlns', $xmlns, true);
        $this->_charset = new jqmAttribute('charset', $charset); $this->add(new jqmTag('meta', '', array($this->_charset)));
        $this->_css = $this->add(new jqmLink($css),true);
        $this->_jq = $this->add(new jqmScript($jq),true);
        $this->_jqm = $this->add(new jqmScript($jqm),true);
        $this->_title = new jqmText($title); $this->add(new jqmTag('title', '', array($this->_title)));
    }
    /**
     * Gets and sets the xmlns property.
     * @param string $value
     * @return string|jqmHead
     */
    function xmlns(){
        if (func_num_args() == 0) return $this->_xmlns->value();
        $this->_xmlns->value(func_get_arg(0));
        return $this;
    }
    /**
     * Gets and sets the charset property.
     * @param string $value
     * @return string|jqmHead
     */
    function charset(){
        if (func_num_args() == 0) return $this->_charset->value();
        $this->_charset->value(func_get_arg(0));
        return $this;
    }
    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|jqmHead
     */
    function title(){
        if (func_num_args() == 0) return $this->_title->text();
        $this->_title->text(func_get_arg(0));
        return $this;
    }
    /**
     * Gets and sets the path to the jQuery Mobile CSS file.
     * @param string $value
     * @return string|jqmHead
     */
    function css(){
        if (func_num_args() == 0) return $this->_css->href();
        $this->_css->href(func_get_arg(0));
        return $this;
    }
    /**
     * Gets and sets the path to the jQuery JavaScript file
     * @param string $value
     * @return string|jqmHead
     */
    function jq(){
        if (func_num_args() == 0) return $this->_jq->src();
        $this->_jq->src(func_get_arg(0));
        return $this;
    }
    /**
     * Gets and sets the path to the jQuery Mobile JavaScript file
     * @param string $value
     * @return string|jqmHead
     */
    function jqm(){
        if (func_num_args() == 0) return $this->_jqm->src();
        $this->_jqm->src(func_get_arg(0));
        return $this;
    }
}
?>
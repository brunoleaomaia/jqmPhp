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

namespace jqmPhp\Tag;

use jqmPhp\Attribute;
use jqmPhp\Container;
use jqmPhp\Tag;
use jqmPhp\Text;

/**
 * This class represents the 'head' tag
 *
 * @author Bruno Maia <brunoleaomaia@gmail.com>
 * @copyright Copyright (c) 2011, Bruno Maia
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.03
 * @since 0.01
 * @link http://www.jqmphp.com/ jqmPhp Website
 * @link http://code.google.com/p/jqmphp/ jqmPhp Project Website
 * @link http://www.jquerymobile.com jQuery Mobile Website
 * @filesource
 */
class Head extends Tag
{
    private $_xmlns;
    private $_charset;
    private $_viewport;
    private $_css;
    private $_jq;
    private $_jqm;

    /**
     * @param string $xmlns
     * @param string $charset
     * @param array|string $title
     * @param array|string $css
     * @param string $jq
     * @param string $jqm
     */
    public function __construct(
        $xmlns = Container::XMLNS,
        $charset = Container::CHARSET,
        $title = Container::TITLE,
        $css = Container::CSS,
        $jq = Container::JQUERY_PATH,
        $jqm = Container::JQUERY_MOBILE_PATH
    ) {
        parent::__construct('head');
        $this->_xmlns = $this->attribute('xmlns', $xmlns, true);
        $this->_charset = $this->addAttribute(new Attribute('charset', $charset), true);
        $this->add(new Tag('meta', '', array($this->_charset)));
        $this->_viewport = $this->addAttribute(new Attribute('content', Container::VIEWPORT), true);
        $this->add(new Tag('meta', '', array(new Attribute('name', 'viewport'), $this->_viewport)));
        $this->_css = $this->add(new Link($css), true);
        $this->_jq = $this->add(new Script($jq), true);
        $this->_jqm = $this->add(new Script($jqm), true);
        $this->add(new Tag('title', '', array(), array(new Text($title))));
    }

    /**
     * Gets and sets the title property
     *
     * @param string $value
     * @return string|header
     */
    public function title()
    {
        if (func_num_args() === 0) {
            return $this->title->text();
        }
        $this->title->text(func_get_arg(0));

        return $this;
    }

    /**
     * Gets and sets the xmlns property.
     *
     * @param string $value
     * @return string|self
     */
    public function xmlns()
    {
        if (func_num_args() === 0) {
            return $this->_xmlns->value();
        }
        $this->_xmlns->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the charset property.
     * @param string $value
     * @return string|head
     */
    public function charset()
    {
        if (func_num_args() === 0) {
            return $this->_charset->value();
        }
        $this->_charset->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the viewport property.
     * @param string $value
     * @return string|head
     */
    public function viewport()
    {
        if (func_num_args() === 0) {
            return $this->_viewport->value();
        }
        $this->_viewport->value(func_get_arg(0));
        return $this;
    }


    /**
     * Gets and sets the path to the jQuery Mobile CSS file.
     * @param string $value
     * @return string|head
     */
    public function css()
    {
        if (func_num_args() === 0) {
            return $this->_css->href();
        }
        $this->_css->href(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the path to the jQuery JavaScript file
     * @param string $value
     * @return string|head
     */
    public function jq()
    {
        if (func_num_args() === 0) {
            return $this->_jq->src();
        }
        $this->_jq->src(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the path to the jQuery Mobile JavaScript file
     * @param string $value
     * @return string|head
     */
    public function jqm()
    {
        if (func_num_args() === 0) {
            return $this->_jqm->src();
        }
        $this->_jqm->src(func_get_arg(0));
        return $this;
    }
}
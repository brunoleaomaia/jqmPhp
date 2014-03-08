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

use jqmPhp\Container;
use jqmPhp\Tag;
use jqmPhp\Text;

/**
 * This class represents the 'html' tag.
 * @class html
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
class Html extends Tag
{
    private $_doctype;

    /**
     * @var Head
     */
    private $head;

    /**
     * @var Body
     */
    private $body;

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
    public function __construct(
        $doctype = Container::DOCTYPE,
        $xmlns = Container::XMLNS,
        $charset = Container::CHARSET,
        $title = Container::TITLE,
        $css = Container::CSS,
        $jq = Container::JQUERY_PATH,
        $jqm = Container::JQUERY_MOBILE_PATH
    ) {
        parent::__construct('html');
        $this->_doctype = new Text($doctype);
        $this->head = $this->add(new Head($xmlns, $charset, $title, $css, $jq, $jqm), true);
        $this->body = $this->add(new Body(), true);
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        $string = '<!DOCTYPE ' . $this->doctype() . '>';
        $string .= parent::__toString();
        return $string;
    }

    /**
     * Gets and sets the doctype property.
     * @param string $value
     * @return string|html
     */
    public function doctype()
    {
        if (func_num_args() === 0) {
            return $this->_doctype->text();
        }
        $this->_doctype->text(func_get_arg(0));
        return $this;
    }

    /**
     * Gets the Head element (head).
     * @return head
     */
    public function head()
    {
        return $this->head;
    }

    /**
     * Gets the Body element (jqmBody).
     * @return Body
     */
    public function body()
    {
        return $this->body;
    }

    /**
     * Adds a page to the pages collection of HTML Body element (jqmBody).
     * @param page $page
     * @param boolean $returnAdded
     * @return html|page
     */
    public function addPage($page, $returnAdded = false)
    {
        $this->body()->addPage($page);
        if ($returnAdded === true) {
            return $page;
        }
        return $this;
    }

    /**
     * Gets the pages collection in HTML Body (jqmBody).
     * @return Collection
     */
    public function pages()
    {
        return $this->body()->pages();
    }
}
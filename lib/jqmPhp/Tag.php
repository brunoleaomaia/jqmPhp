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
namespace jqmPhp;


/**
 * This class represents an html tag.
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
 */
class Tag
{
    private $tagName;
    private $id;
    private $attributes;

    /**
     * @var Collection
     */
    private $items;

    /**
     * @var Attribute
     */
    private $theme;

    protected $title;

    /**
     *
     * @param string $tagName
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     */
    public function __construct($tagName, $id = '', array $attributes = array(), array $items = array(), $theme = '')
    {
        $this->tagName = $tagName;
        $this->attributes = new Collection($attributes);
        $this->items = new Collection($items);
        $this->id = new Attribute('id', $id);
        $this->theme = new Attribute('data-theme', $theme);
        $this->title = new Title();
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

    public function setTitle($title)
    {
        $this->title->text($title);

        return $this;
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return $this->openTag() . $this->items() . $this->closeTag();
    }

    /**
     * Gets a collection of attributes of the tag.
     *
     * @return Collection
     */
    public function attributes()
    {
        return $this->attributes;
    }

    /**
     * Get or set an attribute
     *
     * @param string $name
     * @param string $value
     * @param boolean $returnAttribute
     * @return string|self|Attribute
     */
    public function attribute()
    {
        if (func_num_args() === 0) {
            return '';
        }

        $args = func_get_args();
        for ($i = 0; $i < $this->attributes()->size(); $i++) {
            if ($this->attributes()->get($i) instanceof Attribute) {
                if ($this->attributes()->get($i)->name() == $args[0]) {
                    if (count($args) == 1) {
                        return $this->attributes()->get($i)->value();
                    }
                    $this->attributes()->get($i)->value($args[1]);

                    if (count($args) == 3 && $args[2] === true) {
                        return $this->attributes()->get($i);
                    }
                    return $this;
                }
            }
        }
        if (func_num_args() === 1) {
            return '';
        }

        $returnAttribute = func_num_args() === 3 && $args[2] === true;
        return $this->addAttribute(new Attribute($args[0], $args[1]), $returnAttribute);
    }

    /**
     * Adds an attribute.
     * @param Attribute $attribute
     * @param boolean $returnAttribute
     * @return self|Attribute
     */
    public function addAttribute($attribute, $returnAttribute = false)
    {
        $this->attributes()->add($attribute);
        if ($returnAttribute === true) {
            return $attribute;
        }

        return $this;
    }

    /**
     * Gets a collection of items of the tag
     *
     * @return Collection
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Adds an item
     *
     * @param mixed $item
     * @param boolean $returnItem
     * @return self|mixed
     */
    public function add($item, $returnItem = false)
    {
        $this->items()->add($item);
        if ($returnItem) {
            return $item;
        }
        return $this;
    }

    /**
     * Gets and sets the HTML tag.
     *
     * @param string $value
     * @return string|self
     */
    public function tag()
    {
        if (func_num_args() === 0) {
            return $this->tagName;
        }
        $this->tagName = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the id attribute.
     *
     * @param string $value
     * @return string|self
     */
    public function id()
    {
        if (func_num_args() === 0) {
            return $this->id->value();
        }
        $this->id->value(func_get_arg(0));
        return $this;
    }

    /**
     * Gets and sets the theme attribute (data-theme="a")
     *
     * @param string $value
     * @return string|self
     */
    public function theme()
    {
        if (func_num_args() === 0) {
            return $this->theme->value();
        }
        $this->theme->value(func_get_arg(0));

        return $this;
    }

    /**
     *
     * @return string
     */
    public function openTag()
    {
        $string = '<' . $this->tag();
        if ($this->attributes()->size() > 0) {
            $this->attributes()->separator(' ');
            if ('' . $this->attributes()->get(0) != '') {
                $string .= ' ';
            }
            $string .= $this->attributes();
        }
        $string .= '>';
        return $string;
    }

    /**
     *
     * @return string
     */
    public function closeTag()
    {
        $string = '</' . $this->tag() . '>';
        return $string;
    }
}
<?php

/* SonataAdminBundle:Core:tab_menu_template.html.twig */
class __TwigTemplate_25c36acab5e8720224fb56101c8c7acf9c485bd6881173f686745db22eb0dd5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("knp_menu.html.twig");

        $this->blocks = array(
            'item' => array($this, 'block_item'),
            'dividerElement' => array($this, 'block_dividerElement'),
            'linkElement' => array($this, 'block_linkElement'),
            'spanElement' => array($this, 'block_spanElement'),
            'dropdownElement' => array($this, 'block_dropdownElement'),
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_item($context, array $blocks = array())
    {
        // line 4
        $context["macros"] = $this->env->loadTemplate("knp_menu.html.twig");
        // line 5
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "displayed", array())) {
            // line 6
            $context["attributes"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attributes", array());
            // line 7
            $context["is_dropdown"] = (($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "dropdown", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "dropdown", array()), false)) : (false));
            // line 8
            $context["divider_prepend"] = (($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_prepend", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_prepend", array()), false)) : (false));
            // line 9
            $context["divider_append"] = (($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_append", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_append", array()), false)) : (false));
            // line 10
            echo "
";
            // line 12
            $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : null), array("dropdown" => null, "divider_prepend" => null, "divider_append" => null));
            // line 14
            if ((isset($context["divider_prepend"]) ? $context["divider_prepend"] : null)) {
                // line 15
                echo "        ";
                $this->displayBlock("dividerElement", $context, $blocks);
            }
            // line 17
            echo "
";
            // line 19
            $context["classes"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 21
            if (array_key_exists("matcher", $context)) {
                echo " ";
                // line 22
                if ($this->getAttribute((isset($context["matcher"]) ? $context["matcher"] : null), "isCurrent", array(0 => (isset($context["item"]) ? $context["item"] : null)), "method")) {
                    // line 23
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "currentClass", array())));
                } elseif ($this->getAttribute((isset($context["matcher"]) ? $context["matcher"] : null), "isAncestor", array(0 => (isset($context["item"]) ? $context["item"] : null), 1 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "depth", array())), "method")) {
                    // line 25
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "ancestorClass", array())));
                }
            } else {
                // line 27
                echo " ";
                // line 28
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "current", array())) {
                    // line 29
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "currentClass", array())));
                } elseif ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "currentAncestor", array())) {
                    // line 31
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "ancestorClass", array())));
                }
            }
            // line 35
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "actsLikeFirst", array())) {
                // line 36
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "firstClass", array())));
            }
            // line 38
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "actsLikeLast", array())) {
                // line 39
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "lastClass", array())));
            }
            // line 41
            echo "
";
            // line 43
            $context["childrenClasses"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "childrenAttribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 44
            $context["childrenClasses"] = twig_array_merge((isset($context["childrenClasses"]) ? $context["childrenClasses"] : null), array(0 => ("menu_level_" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()))));
            // line 45
            echo "
";
            // line 47
            if ((isset($context["is_dropdown"]) ? $context["is_dropdown"] : null)) {
                // line 48
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => "dropdown"));
                // line 49
                $context["childrenClasses"] = twig_array_merge((isset($context["childrenClasses"]) ? $context["childrenClasses"] : null), array(0 => "dropdown-menu"));
            }
            // line 51
            echo "
";
            // line 53
            if ((!twig_test_empty((isset($context["classes"]) ? $context["classes"] : null)))) {
                // line 54
                $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : null), array("class" => twig_join_filter((isset($context["classes"]) ? $context["classes"] : null), " ")));
            }
            // line 56
            $context["listAttributes"] = twig_array_merge($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "childrenAttributes", array()), array("class" => twig_join_filter((isset($context["childrenClasses"]) ? $context["childrenClasses"] : null), " ")));
            // line 57
            echo "
";
            // line 59
            echo "    <li";
            echo $context["macros"]->getattributes((isset($context["attributes"]) ? $context["attributes"] : null));
            echo ">";
            // line 60
            if ((isset($context["is_dropdown"]) ? $context["is_dropdown"] : null)) {
                // line 61
                echo "            ";
                $this->displayBlock("dropdownElement", $context, $blocks);
            } elseif (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uri", array()))) && ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : null), "current", array())) || $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "currentAsLink", array())))) {
                // line 63
                echo "            ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 65
                echo "            ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 68
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
    </li>";
            // line 71
            if ((isset($context["divider_append"]) ? $context["divider_append"] : null)) {
                // line 72
                echo "        ";
                $this->displayBlock("dividerElement", $context, $blocks);
            }
        }
    }

    // line 77
    public function block_dividerElement($context, array $blocks = array())
    {
        // line 78
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "level", array()) == 1)) {
            // line 79
            echo "    <li class=\"divider-vertical\"></li>
";
        } else {
            // line 81
            echo "    <li class=\"divider\"></li>
";
        }
    }

    // line 85
    public function block_linkElement($context, array $blocks = array())
    {
        // line 86
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "uri", array()), "html", null, true);
        echo "\"";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : null), "attributes", array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "linkAttributes", array())), "method");
        echo ">
        ";
        // line 87
        if ((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method")))) {
            // line 88
            echo "            <i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method"), "html", null, true);
            echo "\"></i>
        ";
        }
        // line 90
        echo "        ";
        $this->displayBlock("label", $context, $blocks);
        echo "
    </a>
";
    }

    // line 94
    public function block_spanElement($context, array $blocks = array())
    {
        // line 95
        echo "    <span ";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : null), "attributes", array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "labelAttributes", array())), "method");
        echo ">
        ";
        // line 96
        if ((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method")))) {
            // line 97
            echo "            <i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method"), "html", null, true);
            echo "\"></i>
        ";
        }
        // line 99
        echo "        ";
        $this->displayBlock("label", $context, $blocks);
        echo "
    </span>
";
    }

    // line 103
    public function block_dropdownElement($context, array $blocks = array())
    {
        // line 104
        $context["classes"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "linkAttribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "linkAttribute", array(0 => "class"), "method"))) : (array()));
        // line 105
        $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : null), array(0 => "dropdown-toggle"));
        // line 106
        $context["attributes"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "linkAttributes", array());
        // line 107
        $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : null), array("class" => twig_join_filter((isset($context["classes"]) ? $context["classes"] : null), " ")));
        // line 108
        $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : null), array("data-toggle" => "dropdown"));
        // line 109
        echo "    <a href=\"#\"";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : null), "attributes", array(0 => (isset($context["attributes"]) ? $context["attributes"] : null)), "method");
        echo ">
        ";
        // line 110
        if ((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method")))) {
            // line 111
            echo "            <i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "attribute", array(0 => "icon"), "method"), "html", null, true);
            echo "\"></i>
        ";
        }
        // line 113
        echo "        ";
        $this->displayBlock("label", $context, $blocks);
        echo "
        <b class=\"caret\"></b>
    </a>
";
    }

    // line 118
    public function block_label($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "label", array())), "html", null, true);
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:tab_menu_template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  259 => 118,  250 => 113,  244 => 111,  242 => 110,  237 => 109,  235 => 108,  233 => 107,  231 => 106,  229 => 105,  227 => 104,  224 => 103,  216 => 99,  210 => 97,  208 => 96,  203 => 95,  200 => 94,  192 => 90,  186 => 88,  184 => 87,  177 => 86,  174 => 85,  168 => 81,  164 => 79,  162 => 78,  159 => 77,  152 => 72,  150 => 71,  145 => 68,  141 => 65,  137 => 63,  133 => 61,  131 => 60,  127 => 59,  124 => 57,  122 => 56,  119 => 54,  117 => 53,  114 => 51,  111 => 49,  109 => 48,  107 => 47,  104 => 45,  102 => 44,  100 => 43,  97 => 41,  94 => 39,  92 => 38,  89 => 36,  87 => 35,  83 => 31,  80 => 29,  78 => 28,  76 => 27,  72 => 25,  69 => 23,  67 => 22,  64 => 21,  62 => 19,  59 => 17,  55 => 15,  53 => 14,  51 => 12,  48 => 10,  46 => 9,  44 => 8,  42 => 7,  40 => 6,  38 => 5,  36 => 4,  33 => 3,);
    }
}

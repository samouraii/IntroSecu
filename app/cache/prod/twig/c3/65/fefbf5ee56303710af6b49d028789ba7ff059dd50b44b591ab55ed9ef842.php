<?php

/* ManuTfeBundle:Question:show.html.twig */
class __TwigTemplate_c365fefbf5ee56303710af6b49d028789ba7ff059dd50b44b591ab55ed9ef842 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ManuTfeBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ManuTfeBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Question ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "titre", array()), "html", null, true);
        echo "</h1>

    <table class=\"record_properties\">
        <tbody>
            ";
        // line 8
        if ((!twig_test_empty($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "webpath", array())))) {
            // line 9
            echo "            <tr>
                <td><img src=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "webPath", array())), "html", null, true);
            echo "\" /></td>
            </tr>
            ";
        }
        // line 13
        echo "            <tr>
                <td>Question: ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "question", array()), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>
";
    }

    public function getTemplateName()
    {
        return "ManuTfeBundle:Question:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 14,  52 => 13,  46 => 10,  43 => 9,  41 => 8,  31 => 4,  28 => 3,);
    }
}

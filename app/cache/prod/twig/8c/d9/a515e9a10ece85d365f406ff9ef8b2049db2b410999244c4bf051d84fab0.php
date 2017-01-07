<?php

/* ManuTfeBundle:Question:quiz.html.twig */
class __TwigTemplate_8cd9a515e9a10ece85d365f406ff9ef8b2049db2b410999244c4bf051d84fab0 extends Twig_Template
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
                <td>";
        // line 14
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "question", array()), "html", null, true));
        echo "</td>
            </tr>
        </tbody>
    </table>
    ";
        // line 18
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form');
        echo "
";
    }

    public function getTemplateName()
    {
        return "ManuTfeBundle:Question:quiz.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 18,  55 => 14,  52 => 13,  46 => 10,  43 => 9,  41 => 8,  31 => 4,  28 => 3,);
    }
}

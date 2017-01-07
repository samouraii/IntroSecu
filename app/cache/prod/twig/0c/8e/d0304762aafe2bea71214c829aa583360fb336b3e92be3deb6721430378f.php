<?php

/* ManuTfeBundle:QuestionAdmin:list_image.html.twig */
class __TwigTemplate_0c8ed0304762aafe2bea71214c829aa583360fb336b3e92be3deb6721430378f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<tr>
    <th>Image</th>
    <td><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "webPath", array())), "html", null, true);
        echo "\" /></td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "ManuTfeBundle:QuestionAdmin:list_image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}

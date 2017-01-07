<?php

/* ManuTfeBundle:Question:empty.html.twig */
class __TwigTemplate_9f947feefe35a1749e26f19bcddd2be9b949aa031c853e35871a7f15af023233 extends Twig_Template
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
        echo "    <h1>Terminé</h1>
    Désolé, il n'y a plus de questions pour aujourd'hui...
";
    }

    public function getTemplateName()
    {
        return "ManuTfeBundle:Question:empty.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}

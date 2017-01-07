<?php

/* SonataAdminBundle:CRUD:batch_confirmation.html.twig */
class __TwigTemplate_15a08c3a89917d5d0450b2f6db50123c43dc5a52490f0940af1424f100a4481e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'tab_menu' => array($this, 'block_tab_menu'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["base_template"]) ? $context["base_template"] : null));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        // line 15
        echo "    <li>";
        $this->env->loadTemplate("SonataAdminBundle:Button:list_button.html.twig")->display($context);
        echo "</li>
    <li>";
        // line 16
        $this->env->loadTemplate("SonataAdminBundle:Button:create_button.html.twig")->display($context);
        echo "</li>
";
    }

    // line 19
    public function block_tab_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "sidemenu", array(0 => (isset($context["action"]) ? $context["action"] : null)), "method"), array("currentClass" => "active", "template" => $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : null), "getTemplate", array(0 => "tab_menu_template"), "method")), "twig");
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "    <div class=\"sonata-ba-delete\">
        <h1>";
        // line 23
        echo $this->env->getExtension('translator')->getTranslator()->trans("title_batch_confirmation", array("%action%" => (isset($context["action_label"]) ? $context["action_label"] : null)), "SonataAdminBundle");
        echo "</h1>

        ";
        // line 25
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "all_elements", array())) {
            // line 26
            echo "            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("message_batch_all_confirmation", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        ";
        } else {
            // line 28
            echo "            ";
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("message_batch_confirmation", twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "idx", array())), array("%count%" => twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "idx", array()))), "SonataAdminBundle");
            // line 29
            echo "        ";
        }
        // line 30
        echo "
        <div class=\"well well-small form-actions\">
            <form action=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "batch", 1 => array("filter" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "filterParameters", array()))), "method"), "html", null, true);
        echo "\" method=\"POST\" >
                <input type=\"hidden\" name=\"confirmation\" value=\"ok\">
                <input type=\"hidden\" name=\"data\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["data"]) ? $context["data"] : null)), "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"_sonata_csrf_token\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\">

                <div style=\"display: none\">
                    ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                </div>

                <button type=\"submit\" class=\"btn btn-danger\">";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_execute_batch_action", array(), "SonataAdminBundle"), "html", null, true);
        echo "</button>

                ";
        // line 43
        if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "list"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "LIST"), "method"))) {
            // line 44
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delete_or", array(), "SonataAdminBundle"), "html", null, true);
            echo "

                    <a class=\"btn btn-success\" href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateUrl", array(0 => "list"), "method"), "html", null, true);
            echo "\">
                        <i class=\"glyphicon glyphicon-th-list\"></i> ";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_action_list", array(), "SonataAdminBundle"), "html", null, true);
            echo "
                    </a>
                ";
        }
        // line 50
        echo "            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:batch_confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 50,  115 => 47,  111 => 46,  105 => 44,  103 => 43,  98 => 41,  92 => 38,  86 => 35,  82 => 34,  77 => 32,  73 => 30,  70 => 29,  67 => 28,  61 => 26,  59 => 25,  54 => 23,  51 => 22,  48 => 21,  42 => 19,  36 => 16,  31 => 15,  28 => 14,);
    }
}

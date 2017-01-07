<?php

/* ManuTfeBundle::layout.html.twig */
class __TwigTemplate_dab5220da7630ffbc59c07a3edff9f4be88ea499ad0b9cda960c275f4b8cabba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>
      ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 8
        echo "    </title>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 15
        echo "    <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/manutfe/images/favicon.ico"), "html", null, true);
        echo "\" />
  </head>
  <body>
    <div id=\"container\">
      <div id=\"header\">
        <div class=\"content\">
          <h1>Générateur d'exercices réseau</h1>
 
          <div id=\"sub_header\">
            <div class=\"menu\">
              <h2>Menu</h2>
              <ul>
              <li>
              ";
        // line 28
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 29
            echo "              Bienvenu ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
            echo "
              (<a href=\"";
            // line 30
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Se déconnecter</a>)
              ";
        } else {
            // line 32
            echo "              <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">Se connecter</a></li>
              <li><a href=\"";
            // line 33
            echo $this->env->getExtension('routing')->getPath("register");
            echo "\">S'inscrire</a></li>
              ";
        }
        // line 35
        echo "              </li>
              ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 37
            echo "              <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("sonata_admin_dashboard");
            echo "\">Administration</a></li>
              <li><a href=\"";
            // line 38
            echo $this->env->getExtension('routing')->getPath("manu_statistique");
            echo "\">Statistiques</a></li>
              <li><a href=\"";
            // line 39
            echo $this->env->getExtension('routing')->getPath("manu_eleve");
            echo "\">Elèves</a></li>
              ";
        }
        // line 41
        echo "              ";
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 42
            echo "                <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("manu_question_search");
            echo "\">Exercices</a></li>
                <li><a href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("manu_statistique");
            echo "\">Statistiques</a></li>
              ";
        }
        // line 45
        echo "              </ul>
            </div>
          </div>
        </div>
      </div>
 
      <div id=\"content\">
        ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 53
            echo "        <div class=\"flash_notice\">
        ";
            // line 54
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "
        ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 59
            echo "        <div class=\"flash_error\">
        ";
            // line 60
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo " 
        <div class=\"content\">
            ";
        // line 65
        $this->displayBlock('content', $context, $blocks);
        // line 67
        echo "        </div>
      </div>
 
      <div id=\"footer\">
        <div class=\"content\">
          <span class=\"symfony\">
            propulsé par <a href=\"http://www.symfony.com/\">
              <img src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/manutfe/images/symfony.gif"), "html", null, true);
        echo "\" alt=\"symfony framework\" />
            </a>
          </span>
          <ul>
            <li><a href=\"\">News</a></li>
            <li class=\"last\"><a href=\"\">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "        Générateur d'exercices réseau
      ";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "      <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/manutfe/css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    ";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "    ";
    }

    // line 65
    public function block_content($context, array $blocks = array())
    {
        // line 66
        echo "            ";
    }

    public function getTemplateName()
    {
        return "ManuTfeBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 66,  212 => 65,  208 => 14,  205 => 13,  198 => 11,  195 => 10,  190 => 6,  187 => 5,  170 => 74,  161 => 67,  159 => 65,  155 => 63,  146 => 60,  143 => 59,  139 => 58,  136 => 57,  127 => 54,  124 => 53,  120 => 52,  111 => 45,  106 => 43,  101 => 42,  98 => 41,  93 => 39,  89 => 38,  84 => 37,  82 => 36,  79 => 35,  74 => 33,  69 => 32,  64 => 30,  59 => 29,  57 => 28,  40 => 15,  37 => 13,  35 => 10,  31 => 8,  29 => 5,  23 => 1,);
    }
}

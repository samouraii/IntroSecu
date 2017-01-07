<?php

/* ManuTfeBundle:Statistique:index.html.twig */
class __TwigTemplate_1f673ab62091f76c1f2b879184f5b3a51c3a8eb1a27dc88105dd0c1f76f37a1b extends Twig_Template
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
        echo "    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 5
            echo "    <h1>Mes statistiques</h1>
    ";
        }
        // line 7
        echo "    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 8
            echo "    <h1>Listing des statistiques</h1>
    ";
        }
        // line 10
        echo "    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 11
            echo "        ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["filter_form"]) ? $context["filter_form"] : null), 'form');
            echo "
    ";
        }
        // line 13
        echo "    <table class=\"records_list\">
        <thead>
            <tr>
              ";
        // line 16
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 17
            echo "                <th>Elève</th>
              ";
        }
        // line 19
        echo "                <th>Catégorie</th>
                <th>Question</th>
                <th>Réponse</th>
                <th>Date</th>
                <th>Résultat</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 28
            echo "            <tr>
              ";
            // line 29
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 30
                echo "                <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "user", array()), "username", array()), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "user", array()), "getPoint", array()), "html", null, true);
                echo ")</td>
              ";
            }
            // line 32
            echo "                <td>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "question", array()), "categorie", array()), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("manu_question_show", array("id" => $this->getAttribute($this->getAttribute($context["entity"], "question", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "question", array()), "titre", array()), "html", null, true);
            echo "</a></td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "reponse", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            if ($this->getAttribute($context["entity"], "date", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "date", array()), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                ";
            // line 36
            if (($this->getAttribute($context["entity"], "reponse", array()) == $this->getAttribute($this->getAttribute($context["entity"], "question", array()), "reponse", array()))) {
                // line 37
                echo "                    <td>Bonne réponse !</td>
                ";
            } else {
                // line 39
                echo "                    <td>Mauvaise réponse...</td>
                ";
            }
            // line 41
            echo "            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "        </tbody>
    </table>
    ";
        // line 45
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 46
            echo "    <h1>Cotation</h1>
    ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getPoint", array()), "html", null, true);
            echo "
    ";
        }
        // line 49
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ManuTfeBundle:Statistique:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 49,  139 => 47,  136 => 46,  134 => 45,  130 => 43,  123 => 41,  119 => 39,  115 => 37,  113 => 36,  107 => 35,  103 => 34,  97 => 33,  92 => 32,  84 => 30,  82 => 29,  79 => 28,  75 => 27,  65 => 19,  61 => 17,  59 => 16,  54 => 13,  48 => 11,  45 => 10,  41 => 8,  38 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}

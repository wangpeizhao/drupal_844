<?php

/* modules/contrib/contribute/templates/contribute-status-report-community-info.html.twig */
class __TwigTemplate_c73461cfa01268339d1ecc4bb393023379426fcb3e2fa7abf8c63d1fee212147 extends Twig_Template
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
        $tags = array("if" => 22);
        $filters = array("t" => 15);
        $functions = array("attach_library" => 12);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array('attach_library')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 12
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("contribute/contribute-status-report-community-info"), "html", null, true));
        echo "

<div class=\"contribute-status-report-community-info\">
  <h2 class=\"contribute-status-report-community-info__header\">";
        // line 15
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Community Information")));
        echo "</h2>
  <div class=\"contribute-status-report-community-info__items\">
    <div class=\"contribute-status-report-community-info__item\">
      <span class=\"contribute-status-report-community-info__item-icon contribute-status-report-community-info__item-icon--account\" id=\"contribute-info-account\"></span>
      <div class=\"contribute-status-report-community-info__item-details\">
        <h3 class=\"contribute-status-report-community-info__item-title\">";
        // line 20
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Drupal.org Account")));
        echo "</h3>
        ";
        // line 21
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["account"] ?? null), "value", array()), "html", null, true));
        echo "
        ";
        // line 22
        if ($this->getAttribute(($context["account"] ?? null), "description", array())) {
            // line 23
            echo "          <br/>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["account"] ?? null), "description", array()), "html", null, true));
            echo "
        ";
        }
        // line 25
        echo "      </div>
    </div>
    <div class=\"contribute-status-report-community-info__item\">
      <span class=\"contribute-status-report-community-info__item-icon contribute-status-report-community-info__item-icon--membership\" id=\"contribute-info-membership\"></span>
      <div class=\"contribute-status-report-community-info__item-details\">
        <h3 class=\"contribute-status-report-community-info__item-title\">";
        // line 30
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Drupal Association Membership")));
        echo "</h3>
        ";
        // line 31
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["membership"] ?? null), "value", array()), "html", null, true));
        echo "
        ";
        // line 32
        if ($this->getAttribute(($context["membership"] ?? null), "description", array())) {
            // line 33
            echo "          <br/>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["membership"] ?? null), "description", array()), "html", null, true));
            echo "
        ";
        }
        // line 35
        echo "      </div>
    </div>
    <div class=\"contribute-status-report-community-info__item\">
      <span class=\"contribute-status-report-community-info__item-icon contribute-status-report-community-info__item-icon--contribution\" id=\"contribute-info-contribution\"></span>
      <div class=\"contribute-status-report-community-info__item-details\">
        <h3 class=\"contribute-status-report-community-info__item-title\">";
        // line 40
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Contributions to Drupal")));
        echo "</h3>
        ";
        // line 41
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["contribution"] ?? null), "value", array()), "html", null, true));
        echo "
        ";
        // line 42
        if ($this->getAttribute(($context["contribution"] ?? null), "description", array())) {
            // line 43
            echo "          <br/>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["contribution"] ?? null), "description", array()), "html", null, true));
            echo "
        ";
        }
        // line 45
        echo "      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/contribute/templates/contribute-status-report-community-info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 45,  113 => 43,  111 => 42,  107 => 41,  103 => 40,  96 => 35,  90 => 33,  88 => 32,  84 => 31,  80 => 30,  73 => 25,  67 => 23,  65 => 22,  61 => 21,  57 => 20,  49 => 15,  43 => 12,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/contribute/templates/contribute-status-report-community-info.html.twig", "/Users/MrParker/Projects/drupal_844/modules/contrib/contribute/templates/contribute-status-report-community-info.html.twig");
    }
}

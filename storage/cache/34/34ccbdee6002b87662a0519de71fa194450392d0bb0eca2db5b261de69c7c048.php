<?php

/* extension/shipping/jnt.twig */
class __TwigTemplate_56cda479b883dda9bffb4319bce6ef05d45a7b2bf1d6fed75002cf9a81c563f2 extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-shipping\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 18
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo (isset($context["text_edit"]) ? $context["text_edit"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-shipping\" class=\"form-horizontal\">
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-code\"><span data-toggle=\"tooltip\" title=\"";
        // line 29
        echo (isset($context["help_vip_code"]) ? $context["help_vip_code"] : null);
        echo "\">";
        echo (isset($context["entry_vip_code"]) ? $context["entry_vip_code"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"shipping_jnt_vip_code\" value=\"";
        // line 31
        echo (isset($context["shipping_jnt_vip_code"]) ? $context["shipping_jnt_vip_code"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_vip_code"]) ? $context["entry_vip_code"] : null);
        echo "\" id=\"input-code\" class=\"form-control\" />
              ";
        // line 32
        if ((isset($context["error_vip_code"]) ? $context["error_vip_code"] : null)) {
            // line 33
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_vip_code"]) ? $context["error_vip_code"] : null);
            echo "</div>
              ";
        }
        // line 35
        echo "            </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-pass\"><span data-toggle=\"tooltip\" title=\"";
        // line 38
        echo (isset($context["help_vip_pass"]) ? $context["help_vip_pass"] : null);
        echo "\">";
        echo (isset($context["entry_vip_pass"]) ? $context["entry_vip_pass"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"password\" name=\"shipping_jnt_vip_pass\" value=\"";
        // line 40
        echo (isset($context["shipping_jnt_vip_pass"]) ? $context["shipping_jnt_vip_pass"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_vip_pass"]) ? $context["entry_vip_pass"] : null);
        echo "\" id=\"input-pass\" class=\"form-control\" />
              ";
        // line 41
        if ((isset($context["error_vip_pass"]) ? $context["error_vip_pass"] : null)) {
            // line 42
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_vip_pass"]) ? $context["error_vip_pass"] : null);
            echo "</div>
              ";
        }
        // line 44
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 47
        echo (isset($context["entry_service_type"]) ? $context["entry_service_type"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"shipping_jnt_service_type\" id=\"input-status\" class=\"form-control\">
                ";
        // line 50
        if (((isset($context["shipping_jnt_service_type"]) ? $context["shipping_jnt_service_type"] : null) == "6")) {
            // line 51
            echo "                <option value=\"1\">";
            echo (isset($context["text_pickup"]) ? $context["text_pickup"] : null);
            echo "</option>
                <option value=\"6\" selected=\"selected\">";
            // line 52
            echo (isset($context["text_dropoff"]) ? $context["text_dropoff"] : null);
            echo "</option>
                ";
        } else {
            // line 54
            echo "                <option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_pickup"]) ? $context["text_pickup"] : null);
            echo "</option>
                <option value=\"6\">";
            // line 55
            echo (isset($context["text_dropoff"]) ? $context["text_dropoff"] : null);
            echo "</option>
                ";
        }
        // line 57
        echo "              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 65
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/shipping/jnt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 65,  169 => 57,  164 => 55,  159 => 54,  154 => 52,  149 => 51,  147 => 50,  141 => 47,  136 => 44,  130 => 42,  128 => 41,  122 => 40,  115 => 38,  110 => 35,  104 => 33,  102 => 32,  96 => 31,  89 => 29,  84 => 27,  78 => 24,  74 => 22,  66 => 18,  64 => 17,  58 => 13,  47 => 11,  43 => 10,  38 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button type="submit" form="form-shipping" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     {% if error_warning %}*/
/*     <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*       <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*     </div>*/
/*     {% endif %}*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_edit }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-shipping" class="form-horizontal">*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip" title="{{ help_vip_code }}">{{ entry_vip_code }}</span></label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="shipping_jnt_vip_code" value="{{ shipping_jnt_vip_code }}" placeholder="{{ entry_vip_code }}" id="input-code" class="form-control" />*/
/*               {% if error_vip_code %}*/
/*               <div class="text-danger">{{ error_vip_code }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-pass"><span data-toggle="tooltip" title="{{ help_vip_pass }}">{{ entry_vip_pass }}</span></label>*/
/*             <div class="col-sm-10">*/
/*               <input type="password" name="shipping_jnt_vip_pass" value="{{ shipping_jnt_vip_pass}}" placeholder="{{ entry_vip_pass }}" id="input-pass" class="form-control" />*/
/*               {% if error_vip_pass %}*/
/*               <div class="text-danger">{{ error_vip_pass }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-status">{{ entry_service_type }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="shipping_jnt_service_type" id="input-status" class="form-control">*/
/*                 {% if (shipping_jnt_service_type == '6') %}*/
/*                 <option value="1">{{ text_pickup }}</option>*/
/*                 <option value="6" selected="selected">{{ text_dropoff }}</option>*/
/*                 {% else %}*/
/*                 <option value="1" selected="selected">{{ text_pickup }}</option>*/
/*                 <option value="6">{{ text_dropoff }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {{ footer }}*/
/* */

<?php

/* circlet/template/product/manufacturer_info.twig */
class __TwigTemplate_5a24b9989b5002622f75b9994732db2a4f47b9c42900efff2ec1aca7af03edde extends Twig_Template
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
        echo "
<div id=\"product-manufacturer\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "    <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "  </ul>
  <div class=\"row\">";
        // line 8
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 9
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 10
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 11
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 12
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 13
            echo "    ";
        } else {
            // line 14
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 15
            echo "    ";
        }
        // line 16
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      ";
        // line 17
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 18
            echo "      <div class=\"jcate-filters\">
        <div class=\"row\">
          <div class=\"col-md-2 col-sm-2 hidden-xs\">
            <div class=\"j-gird-list\">
              <button type=\"button\" id=\"list-view\" data-toggle=\"tooltip\" title=\"";
            // line 22
            echo (isset($context["button_list"]) ? $context["button_list"] : null);
            echo "\"><i class=\"fa fa-th-list\"></i></button>
              <button type=\"button\" id=\"grid-view\" data-toggle=\"tooltip\" title=\"";
            // line 23
            echo (isset($context["button_grid"]) ? $context["button_grid"] : null);
            echo "\"><i class=\"fa fa-th\"></i></button>
            </div>
          </div>
          <div class=\"col-md-5 col-sm-6 hidden-xs hidden-sm\">
            <div class=\"form-group\"><a href=\"";
            // line 27
            echo (isset($context["compare"]) ? $context["compare"] : null);
            echo "\" id=\"compare-total\" class=\"btn btn-default\">";
            echo (isset($context["text_compare"]) ? $context["text_compare"] : null);
            echo "</a></div>
          </div>
          <div class=\"col-md-3 col-sm-4 col-xs-12\">
            <div class=\"form-group\">
              <span for=\"input-sort\" class=\"hidden-xs hidden-sm\">";
            // line 31
            echo (isset($context["text_sort"]) ? $context["text_sort"] : null);
            echo "</span>
              <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
                ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 34
                echo "                ";
                if (($this->getAttribute($context["sorts"], "value", array()) == sprintf("%s-%s", (isset($context["sort"]) ? $context["sort"] : null), (isset($context["order"]) ? $context["order"] : null)))) {
                    // line 35
                    echo "                <option value=\"";
                    echo $this->getAttribute($context["sorts"], "href", array());
                    echo "\" selected=\"selected\">";
                    echo $this->getAttribute($context["sorts"], "text", array());
                    echo "</option>
                ";
                } else {
                    // line 37
                    echo "                <option value=\"";
                    echo $this->getAttribute($context["sorts"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["sorts"], "text", array());
                    echo "</option>
                ";
                }
                // line 39
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "              </select>
            </div>
          </div>
          <div class=\"col-md-2 col-sm-2 col-xs-6 text-right hidden-xs\">
            <div class=\"form-group\">
              <span for=\"input-limit\" class=\"hidden-xs hidden-sm\">";
            // line 45
            echo (isset($context["text_limit"]) ? $context["text_limit"] : null);
            echo "</span>
              <select id=\"input-limit\" class=\"form-control\" onchange=\"location = this.value;\">
                ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 48
                echo "                ";
                if (($this->getAttribute($context["limits"], "value", array()) == (isset($context["limit"]) ? $context["limit"] : null))) {
                    // line 49
                    echo "                <option value=\"";
                    echo $this->getAttribute($context["limits"], "href", array());
                    echo "\" selected=\"selected\">";
                    echo $this->getAttribute($context["limits"], "text", array());
                    echo "</option>
                ";
                } else {
                    // line 51
                    echo "                <option value=\"";
                    echo $this->getAttribute($context["limits"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["limits"], "text", array());
                    echo "</option>
                ";
                }
                // line 53
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "              </select>
            </div>
          </div>
        </div>
      </div>
      <div class=\"row\">
        ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 61
                echo "        <div class=\"product-layout product-list col-xs-12\">
          <div class=\"product-thumb transition\">
            <div class=\"image\">
              <a href=\"";
                // line 64
                echo $this->getAttribute($context["product"], "href", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["product"], "thumb", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["product"], "name", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["product"], "name", array());
                echo "\" class=\"img-responsive\" />
                ";
                // line 65
                if ($this->getAttribute($context["product"], "additional_image", array())) {
                    // line 66
                    echo "                <img class=\"hover-img\" src=\"";
                    echo $this->getAttribute($context["product"], "additional_image", array());
                    echo "\" class=\"img-responsive\">
                ";
                }
                // line 68
                echo "              </a>
            </div>
            <div class=\"caption\">
              <h4><a href=\"";
                // line 71
                echo $this->getAttribute($context["product"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["product"], "name", array());
                echo "</a></h4>
              <div class=\"rating\">
                ";
                // line 73
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 74
                    echo "                ";
                    if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                        // line 75
                        echo "                <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
                ";
                    } else {
                        // line 77
                        echo "                <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
                ";
                    }
                    // line 79
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "              </div>
              <p class=\"description\">";
                // line 81
                echo $this->getAttribute($context["product"], "description", array());
                echo "</p>
              ";
                // line 82
                if ($this->getAttribute($context["product"], "price", array())) {
                    // line 83
                    echo "                <p class=\"price\">
                  ";
                    // line 84
                    if ( !$this->getAttribute($context["product"], "special", array())) {
                        // line 85
                        echo "                  ";
                        echo $this->getAttribute($context["product"], "price", array());
                        echo "
                  ";
                    } else {
                        // line 86
                        echo " <span class=\"price-new\">";
                        echo $this->getAttribute($context["product"], "special", array());
                        echo "</span> <span class=\"price-old\">";
                        echo $this->getAttribute($context["product"], "price", array());
                        echo "</span> ";
                    }
                    // line 87
                    echo "                  ";
                    if ($this->getAttribute($context["product"], "tax", array())) {
                        echo " <span class=\"price-tax\">";
                        echo (isset($context["text_tax"]) ? $context["text_tax"] : null);
                        echo " ";
                        echo $this->getAttribute($context["product"], "tax", array());
                        echo "</span>
                  ";
                    }
                    // line 89
                    echo "                </p>
              ";
                }
                // line 91
                echo "              <div class=\"exbutton-group\">
                <button class=\"btn cartbtn\" data-placement=\"top\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 92
                echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                echo "\" onclick=\"cart.add('";
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "');\"><i class=\"fa fa-shopping-cart\"></i></button>
                <button class=\"btn wishbtn\" data-placement=\"top\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 93
                echo (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null);
                echo "\" onclick=\"wishlist.add('";
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "');\"><i class=\"fa fa-heart\"></i></button>
                <button class=\"btn combtn\" data-placement=\"top\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                // line 94
                echo (isset($context["button_compare"]) ? $context["button_compare"] : null);
                echo "\" onclick=\"compare.add('";
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "');\"><i class=\"fa fa-exchange\"></i></button>
              </div>
            </div>
          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "      </div>
      <div class=\"pagination-wrap\">
        <div class=\"row\">
          <div class=\"col-sm-6 text-left\">";
            // line 103
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "</div>
          <div class=\"col-sm-6 text-right\">";
            // line 104
            echo (isset($context["results"]) ? $context["results"] : null);
            echo "</div>
        </div>
      </div>
      ";
        } else {
            // line 108
            echo "      <p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 110
            echo (isset($context["continue"]) ? $context["continue"] : null);
            echo "\" class=\"btn btn-primary\">";
            echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
            echo "</a></div>
      </div>
      ";
        }
        // line 113
        echo "      ";
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 114
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 116
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "circlet/template/product/manufacturer_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  355 => 116,  350 => 114,  345 => 113,  337 => 110,  331 => 108,  324 => 104,  320 => 103,  315 => 100,  301 => 94,  295 => 93,  289 => 92,  286 => 91,  282 => 89,  272 => 87,  265 => 86,  259 => 85,  257 => 84,  254 => 83,  252 => 82,  248 => 81,  245 => 80,  239 => 79,  235 => 77,  231 => 75,  228 => 74,  224 => 73,  217 => 71,  212 => 68,  206 => 66,  204 => 65,  194 => 64,  189 => 61,  185 => 60,  177 => 54,  171 => 53,  163 => 51,  155 => 49,  152 => 48,  148 => 47,  143 => 45,  136 => 40,  130 => 39,  122 => 37,  114 => 35,  111 => 34,  107 => 33,  102 => 31,  93 => 27,  86 => 23,  82 => 22,  76 => 18,  74 => 17,  67 => 16,  64 => 15,  61 => 14,  58 => 13,  55 => 12,  52 => 11,  49 => 10,  47 => 9,  43 => 8,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="product-manufacturer" class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/*       {% if products %}*/
/*       <div class="jcate-filters">*/
/*         <div class="row">*/
/*           <div class="col-md-2 col-sm-2 hidden-xs">*/
/*             <div class="j-gird-list">*/
/*               <button type="button" id="list-view" data-toggle="tooltip" title="{{ button_list }}"><i class="fa fa-th-list"></i></button>*/
/*               <button type="button" id="grid-view" data-toggle="tooltip" title="{{ button_grid }}"><i class="fa fa-th"></i></button>*/
/*             </div>*/
/*           </div>*/
/*           <div class="col-md-5 col-sm-6 hidden-xs hidden-sm">*/
/*             <div class="form-group"><a href="{{ compare }}" id="compare-total" class="btn btn-default">{{ text_compare }}</a></div>*/
/*           </div>*/
/*           <div class="col-md-3 col-sm-4 col-xs-12">*/
/*             <div class="form-group">*/
/*               <span for="input-sort" class="hidden-xs hidden-sm">{{ text_sort }}</span>*/
/*               <select id="input-sort" class="form-control" onchange="location = this.value;">*/
/*                 {% for sorts in sorts %}*/
/*                 {% if sorts.value == '%s-%s'|format(sort, order) %}*/
/*                 <option value="{{ sorts.href }}" selected="selected">{{ sorts.text }}</option>*/
/*                 {% else %}*/
/*                 <option value="{{ sorts.href }}">{{ sorts.text }}</option>*/
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="col-md-2 col-sm-2 col-xs-6 text-right hidden-xs">*/
/*             <div class="form-group">*/
/*               <span for="input-limit" class="hidden-xs hidden-sm">{{ text_limit }}</span>*/
/*               <select id="input-limit" class="form-control" onchange="location = this.value;">*/
/*                 {% for limits in limits %}*/
/*                 {% if limits.value == limit %}*/
/*                 <option value="{{ limits.href }}" selected="selected">{{ limits.text }}</option>*/
/*                 {% else %}*/
/*                 <option value="{{ limits.href }}">{{ limits.text }}</option>*/
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*       <div class="row">*/
/*         {% for product in products %}*/
/*         <div class="product-layout product-list col-xs-12">*/
/*           <div class="product-thumb transition">*/
/*             <div class="image">*/
/*               <a href="{{ product.href }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-responsive" />*/
/*                 {% if product.additional_image %}*/
/*                 <img class="hover-img" src="{{ product.additional_image }}" class="img-responsive">*/
/*                 {% endif %}*/
/*               </a>*/
/*             </div>*/
/*             <div class="caption">*/
/*               <h4><a href="{{ product.href }}">{{ product.name }}</a></h4>*/
/*               <div class="rating">*/
/*                 {% for i in 1..5 %}*/
/*                 {% if product.rating < i %}*/
/*                 <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/*                 {% else %}*/
/*                 <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               </div>*/
/*               <p class="description">{{ product.description }}</p>*/
/*               {% if product.price %}*/
/*                 <p class="price">*/
/*                   {% if not product.special %}*/
/*                   {{ product.price }}*/
/*                   {% else %} <span class="price-new">{{ product.special }}</span> <span class="price-old">{{ product.price }}</span> {% endif %}*/
/*                   {% if product.tax %} <span class="price-tax">{{ text_tax }} {{ product.tax }}</span>*/
/*                   {% endif %}*/
/*                 </p>*/
/*               {% endif %}*/
/*               <div class="exbutton-group">*/
/*                 <button class="btn cartbtn" data-placement="top" type="button" data-toggle="tooltip" title="{{ button_cart }}" onclick="cart.add('{{ product.product_id }}');"><i class="fa fa-shopping-cart"></i></button>*/
/*                 <button class="btn wishbtn" data-placement="top" type="button" data-toggle="tooltip" title="{{ button_wishlist }}" onclick="wishlist.add('{{ product.product_id }}');"><i class="fa fa-heart"></i></button>*/
/*                 <button class="btn combtn" data-placement="top" type="button" data-toggle="tooltip" title="{{ button_compare }}" onclick="compare.add('{{ product.product_id }}');"><i class="fa fa-exchange"></i></button>*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/*         {% endfor %}*/
/*       </div>*/
/*       <div class="pagination-wrap">*/
/*         <div class="row">*/
/*           <div class="col-sm-6 text-left">{{ pagination }}</div>*/
/*           <div class="col-sm-6 text-right">{{ results }}</div>*/
/*         </div>*/
/*       </div>*/
/*       {% else %}*/
/*       <p>{{ text_empty }}</p>*/
/*       <div class="buttons">*/
/*         <div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>*/
/*       </div>*/
/*       {% endif %}*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }}*/

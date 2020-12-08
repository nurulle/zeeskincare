<?php

/* circlet/template/extension/module/carousel.twig */
class __TwigTemplate_1a73c27db64b3cf9c21f38f94afedf0a219d9acc3ada34b00186358d8d105261 extends Twig_Template
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
        echo "<div class=\"swiper-viewport carousel\">
  <div id=\"carousel";
        // line 2
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "\" class=\"swiper-container\">
    <div class=\"swiper-wrapper\">
      ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 5
            echo "      <div class=\"swiper-slide text-center\">";
            if ($this->getAttribute($context["banner"], "link", array())) {
                echo "<a href=\"";
                echo $this->getAttribute($context["banner"], "link", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["banner"], "image", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["banner"], "title", array());
                echo "\" class=\"img-responsive\" /></a>";
            } else {
                echo "<img src=\"";
                echo $this->getAttribute($context["banner"], "image", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["banner"], "title", array());
                echo "\" class=\"img-responsive\" />";
            }
            echo "</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "    </div>
  </div>
  <div class=\"swiper-pagination carousel";
        // line 9
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "\"></div>
  <div class=\"swiper-pager\">
    <div class=\"inner-swiper\">
      <div class=\"swiper-button-prev car-swiper-button-prev\"></div>
      <div class=\"swiper-button-next car-swiper-button-next\"></div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#carousel";
        // line 18
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "').swiper({
\tmode: 'horizontal',
\tslidesPerView: 6,
\tnextButton: '.car-swiper-button-next',
  prevButton: '.car-swiper-button-prev',
\tautoplay: 2500,
\tloop: true
});
--></script>";
    }

    public function getTemplateName()
    {
        return "circlet/template/extension/module/carousel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 18,  58 => 9,  54 => 7,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* <div class="swiper-viewport carousel">*/
/*   <div id="carousel{{ module }}" class="swiper-container">*/
/*     <div class="swiper-wrapper">*/
/*       {% for banner in banners %}*/
/*       <div class="swiper-slide text-center">{% if banner.link %}<a href="{{ banner.link }}"><img src="{{ banner.image }}" alt="{{ banner.title }}" class="img-responsive" /></a>{% else %}<img src="{{ banner.image }}" alt="{{ banner.title }}" class="img-responsive" />{% endif %}</div>*/
/*       {% endfor %}*/
/*     </div>*/
/*   </div>*/
/*   <div class="swiper-pagination carousel{{ module }}"></div>*/
/*   <div class="swiper-pager">*/
/*     <div class="inner-swiper">*/
/*       <div class="swiper-button-prev car-swiper-button-prev"></div>*/
/*       <div class="swiper-button-next car-swiper-button-next"></div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* <script type="text/javascript"><!--*/
/* $('#carousel{{ module }}').swiper({*/
/* 	mode: 'horizontal',*/
/* 	slidesPerView: 6,*/
/* 	nextButton: '.car-swiper-button-next',*/
/*   prevButton: '.car-swiper-button-prev',*/
/* 	autoplay: 2500,*/
/* 	loop: true*/
/* });*/
/* --></script>*/

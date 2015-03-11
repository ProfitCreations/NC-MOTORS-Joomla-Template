<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.NC-MOTORS
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

$path = $this->baseurl . '/templates/' . $this->template . '/';
$home = $this->baseurl;

if ($task == "edit" || $layout == "form") {
	$fullWidth = 1;
} else {
	$fullWidth = 0;
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
if ($this->params->get('logoFile')) {
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('sitetitle')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
} else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language;?>" lang="<?php echo $this->language;?>" dir="<?php echo $this->direction;?>">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <jdoc:include type="head" />
    <!-- <title><?php echo $sitename;?></title> -->
    <?php if ($this->params->get('googleFont')): ?>
        <link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
        <style type="text/css">
            h1,h2,h3,h4,h5,h6,.site-title{
                font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
            }
        </style>
    <?php endif;?>
    <?php // Template color ?>
    <?php if ($this->params->get('templateColor')): ?>
        <style type="text/css">
            body.site
            {
                border-top: 3px solid <?php echo $this->params->get('templateColor');?>;
                background-color: <?php echo $this->params->get('templateBackgroundColor');?>
            }
            a
            {
                color: <?php echo $this->params->get('templateColor');?>;
            }
            .navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
            .btn-primary
            {
                background: <?php echo $this->params->get('templateColor');?>;
            }
            .navbar-inner
            {
                -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
                box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
            }
        </style>
    <?php endif;?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.2.2/css/material-wfont.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.2.2/css/material.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.2.2/css/ripples.min.css">
    <link rel="stylesheet" href="<?php echo $path?>css/main.css">
    <link rel="stylesheet" href="<?php echo $path?>css/buttons.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/flickity/0.3.1/flickity.min.css">
    <!-- Less -->
    <!-- <link rel="stylesheet/less" type="text/css" href="css/main.less" /> -->
    <!-- <script src="less.min.js" type="text/javascript"></script> -->
    <script async src="<?php echo $path;?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style>
      body {
         padding-top: 50px;
     }
 </style>
</head>

<body id="content"
<?php echo $option
. ' view-' . $view
. ($layout ? ' layout-' . $layout : ' no-layout')
. ($task ? ' task-' . $task : ' no-task')
. ($itemid ? ' itemid-' . $itemid : '')
. ($params->get('fluidContainer') ? ' fluid' : '');
?>
>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!-- New Button -->
                <button id="button-nav" type="button" class="tcon tcon-menu--xbutterfly navbar-toggle hidden-lg hidden-md" aria-label="toggle menu" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="tcon-menu__lines" aria-hidden="true"></span>
                    <span class="tcon-visuallyhidden sr-only">toggle menu</span>
                </button>
                <ul>
                    <li><a class="navbar-brand" href="<?php echo $home;?>">
                        <!-- NC-Motors -->
                        <?php echo $logo;?>
                    </a></li>
                </ul>

            </div>
            <!-- /.navbar-header -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <jdoc:include type="modules" name="position-1" style="none" />

                <!-- <ul id="nav" class="nav navbar-nav navbar-right">
                    <li class="current"><a class="menuItem" href="#home">Home</a>
                    </li>
                    <li><a class="menuItem" href="#wat">Wat we doen</a>
                    </li>
                    <li><a class="menuItem" href="#latest">Latest Projects</a>
                    </li>
                    <li><a class="menuItem" href="#portfolio">Portfolio</a>
                    </li>
                    <li><a class="menuItem" href="#contact">Contact</a>
                    </li>

                    <li class="taal">
                        <button title="English" class="btn btn-default btn-taal btn-raised" href="#" title="">
                            <img class="img-responsive" src="<?php echo $path?>img/flags/flag_lang_en.gif" alt="">
                        </button>
                    </li>
                    <li class="taal">
                        <button title="Dutch" class="btn btn-default btn-taal btn-raised" href="#" title="">
                            <img class="img-responsive" src="<?php echo $path?>img/flags/flag_lang_nl.gif" alt="">
                        </button>
                    </li>
                    <li class="taal">
                        <button title="Portugues" class="btn btn-default btn-taal btn-raised" href="#" title="">
                            <img class="img-responsive" src="<?php echo $path?>img/flags/Portugal-flat.png" alt="">
                        </button>
                    </li>
                    <li>
                        <!-- <a class="user-login" href="#" title="LogIn"> -->
                       <!-- <a class="mdi-image-timer-auto" href="#" title="LogIn">

                        </a>
                    </li>
                </ul> -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.Container-fluid -->
    </nav>

    <div id="home" class="jumbotron">
        <div class="container">
            <img class="logo center-block wow slideInLeft img-responsive" src="<?php echo $path;?>img/Logo/Logo2.gif" alt="Logo">
            <div class="row">
                <!-- <div class="col-md-12 alert alert-dismissable alert-warning alert-fixed-bottom">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Attentie!</h4>
                <p>Deze website is momenteel in development, mogelijk dat sommige functies en services niet werken.
                    <button type="button" class="btn btn-primary btn-raised pull-right" data-dismiss="alert">Close</button>
                </div> -->
                <div class="col-md-12">
                    <h2 id="slogan" class="text-center wow slideInRight">"LET DREAMS HIT THE ROAD"</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="container marketing">
        <div id="wat" class="row">
            <br>
            <br>
            <h2 class="text-center title">WAT WE DOEN</h2>
        </div>

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <jdoc:include type="modules" name="position-2" style="none" />
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container marketing -->
    <div id="latest" class="container">
        <br>
        <br>
        <h2 class="text-center title">LATEST PROJECTS</h2>
        <jdoc:include type="modules" name="position-3" style="none" />








    </div>
</div>
<!-- /#latest -->


<hr class="featurette-divider" />
<!--
  ================== Portfolio =====================
-->
<div id="portfolio" class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
	<div  class="row center-block">
		<div class="col-md-12 center-block">
			<br>
			<br>
			<h2 class="text-center title">PORTFOLIO</h2>

            <!-- Begin MixItUp -->
            <div class="row">
                <div class="col-md-2 hidden-md hidden-sm hidden-xs">
                </div>
                <div class="col-md-12 col-sm-12">
                 <button class="filter btn btn-portfolio" data-filter="all">All</button>
                 <button class="filter btn btn-portfolio" data-filter=".category-honda">Honda</button>
                 <button class="filter btn btn-portfolio" data-filter=".category-yamaha">yamaha</button>
                 <button class="filter btn btn-portfolio" data-filter=".category-kawasaki">kawasaki</button>
                 <button class="filter btn btn-portfolio" data-filter=".category-suzuki">suzuki</button>
                 <button class="filter btn btn-portfolio" data-filter=".category-harley">harley</button>
                 <button class="filter btn btn-portfolio" data-filter=".category-buell">buell</button>
             </div>
             <div class="col-md-2 hidden-md hidden-sm hidden-xs"></div>
         </div>

         <div id="Container" class="row center-block">
             <jdoc:include type="modules" name="position-4" style="none" />

             <?php
//honda-cbr-600
// require_once 'php-includes/portfolio/honda-cbr-600.inc.php';
// yamaha-fzr-1000
require_once 'php-includes/portfolio/yamaha-fzr-1000.inc.php';
// honda-cbr-600-f1
require_once 'php-includes/portfolio/honda-cbr-600-f1.inc.php';
// honda-cbr-600-f2
require_once 'php-includes/portfolio/honda-cbr-600-f2.inc.php';
// yamaha-fzr-1000-streetfighter
require_once 'php-includes/portfolio/yamaha-fzr-1000-streetfighter.inc.php';
// yamaha-fzr-1000-streetfighter-orange
require_once 'php-includes/portfolio/yamaha-fzr-1000-streetfighter-orange.inc.php';
// honda-cm-450-bobber
require_once 'php-includes/portfolio/honda-cm-450-bobber.inc.php';
// kawasaki-zxr750
require_once 'php-includes/portfolio/kawasaki-zxr750.inc.php';
// honda-cbr-600-f-cafe-racer
require_once 'php-includes/portfolio/honda-cbr-600-f-cafe-racer.inc.php';
// yamaha-yzf-r6
require_once 'php-includes/portfolio/yamaha-yzf-r6.inc.php';
// yamaha-yzf1000r-streetfighter
require_once 'php-includes/portfolio/yamaha-yzf1000r-streetfighter.inc.php';
// suzuki-gsx-r-750-streetfighter
require_once 'php-includes/portfolio/suzuki-gsx-r-750-streetfighter.inc.php';
// honda-cb-650-bobber
require_once 'php-includes/portfolio/honda-cb-650-bobber.inc.php';
// yamaha-xs-400-bobber
require_once 'php-includes/portfolio/yamaha-xs-400-bobber.inc.php';
// yamaha-fzr-1000-streetfighter-2
require_once 'php-includes/portfolio/yamaha-fzr-1000-streetfighter-2.inc.php';
// yamaha-xs-400-bobber-2
require_once 'php-includes/portfolio/yamaha-xs-400-bobber-2.inc.php';
// yamaha-seca-750
require_once 'php-includes/portfolio/yamaha-seca-750.inc.php';
// honda-nighthawk-650
require_once 'php-includes/portfolio/honda-nighthawk-650.inc.php';
// honda-nighthawk-2
require_once 'php-includes/portfolio/honda-nighthawk-2.inc.php';
// yamaha-yzf-750r
require_once 'php-includes/portfolio/yamaha-yzf-750r.inc.php';
// kawasaki-zx9r
require_once 'php-includes/portfolio/kawasaki-zx9r.inc.php';
// suzuki-gr-650
require_once 'php-includes/portfolio/suzuki-gr-650.inc.php';
// suzuki-gsx-750
require_once 'php-includes/portfolio/suzuki-gsx-750.inc.php';
// yamaha-seca-750-2
require_once 'php-includes/portfolio/yamaha-seca-750-2.inc.php';
// harley-sportster-833
require_once 'php-includes/portfolio/harley-sportster-833.inc.php';
// honda-cmx-450
require_once 'php-includes/portfolio/honda-cmx-450.inc.php';
// honda-vlx-600
require_once 'php-includes/portfolio/honda-vlx-600.inc.php';
// buell-m2-streetfighter
require_once 'php-includes/portfolio/buell-m2-streetfighter.inc.php';
// yamaha-xs-400-bobber-3
require_once 'php-includes/portfolio/yamaha-xs-400-bobber-3.inc.php';
// honda-cb500-76
require_once 'php-includes/portfolio/honda-cb500-76.inc.php';
// honda-vlx-600-bobber
require_once 'php-includes/portfolio/honda-vlx-600-bobber.inc.php';
?>
             <div class="gap"></div>
             <div class="gap"></div>
         </div>
         <!-- /#container -->

     </div>
 </div>
</div>
<!-- /.container -->

<!-- Contact -->
<?php require_once 'php-includes/contact.inc.php';?>
</div>
<!-- </div> -->
<!-- /.container marketing -->




<!-- FOOTER -->
<?php require_once 'php-includes/footer.inc.php';?>
<!-- /.Container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/jquery-1.10.2.min.js"><\/script>')</script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<!-- Material Design -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.2.2/js/ripples.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.2.2/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        $.material.init();
    });
</script>

<script src="<?php echo $path?>js/plugins.js"></script>
<script src="<?php echo $path?>js/main.js"></script>

<!--
    Text Effects
-->
<script src="<?php echo $path?>js/textEffect.jquery.js"></script>
<script>
    jQuery('#slogan').textEffect('jumble');
</script>

<!-- WOW -->
<script src="<?php $path?><?php echo $path;?>js/wow.min.js"></script>
<script>
    new WOW().init();
</script>

<!-- scrollUp -->
<script src="<?php echo $path?>js/jquery.scrollUp.js"></script>
<script>
    $(function() {
        $.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '300', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 200, // Animation in speed (ms)
    animationOutSpeed: 200, // Animation out speed (ms)
    scrollText: '', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});
    });
</script>


<!--
    scrollTo
    locallScroll
-->
<script src="<?php echo $path?>js/jquery.scrollTo.js"></script>
<script src="<?php echo $path?>js/jquery.localScroll.js"></script>
<script type="text/javascript">
    jQuery(function($) {
        $.localScroll.defaults.axis = 'xy';
        $.localScroll({
    target: '#content', // could be a selector or a jQuery object too.
    queue: true,
    duration: 500,
    hash: true,
    onBefore: function(e, anchor, $target) {
    // The 'this' is the settings object, can be modified
},
onAfter: function(anchor, settings) {
// The 'this' contains the scrolled element (#content)
}
});
    });
</script>

<!-- jQuery.nav.js -->
<script src="<?php echo $path?>js/jquery.nav.js"></script>
<script>
    $('#nav').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 750,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',
        begin: function() {
    //I get fired when the animation is starting
},
end: function() {
//I get fired when the animation is ending
},
scrollChange: function($currentListItem) {
//I get fired when you enter a section and I pass the list item of the section
}
});
</script>

<!-- MixitUp -->
<script src="<?php echo $path?>js/jquery.mixitup.min.js"></script>
<script>
    $(function(){
        $('#Container').mixItUp();
    });
</script>

<!-- New Button -->
<script>
    (function (root, factory) {
        if (typeof define === 'function' && define.amd) {
    // AMD module
    define(factory);
} else {
// Browser global
root.transformicons = factory();
}
}(this || window, function () {

// ####################
// MODULE TRANSFORMICON
// ####################
'use strict';

var
tcon = {}, // static class
_transformClass = 'tcon-transform',

// const
DEFAULT_EVENTS = {
    transform : ['click'],
    revert : ['click']
};

var getElementList = function (elements) {
    if (typeof elements === 'string') {
        return Array.prototype.slice.call(document.querySelectorAll(elements));
    } else if (typeof elements === 'undefined' || elements instanceof Array) {
        return elements;
    } else {
        return [elements];
    }
};

var getEventList = function (events) {
    if (typeof events === 'string') {
        return events.toLowerCase().split(' ');
    } else {
        return events;
    }
};
var setListeners = function (elements, events, remove) {
    var
    method = (remove ? 'remove' : 'add') + 'EventListener',
    elementList = getElementList(elements),
    currentElement = elementList.length,
    eventLists = {};

// get events or use defaults
for (var prop in DEFAULT_EVENTS) {
    eventLists[prop] = (events && events[prop]) ? getEventList(events[prop]) : DEFAULT_EVENTS[prop];
}

// add or remove all events for all occasions to all elements
while(currentElement--) {
    for (var occasion in eventLists) {
        var currentEvent = eventLists[occasion].length;
        while(currentEvent--) {
            elementList[currentElement][method](eventLists[occasion][currentEvent], handleEvent);
        }
    }
}
};
var handleEvent = function (event) {
    tcon.toggle(event.currentTarget);
};
tcon.add = function (elements, events) {
    setListeners(elements, events);
    return tcon;
};
tcon.remove = function (elements, events) {
    setListeners(elements, events, true);
    return tcon;
};
tcon.transform = function (elements) {
    getElementList(elements).forEach(function(element) {
        element.classList.add(_transformClass);
    });
    return tcon;
};
tcon.revert = function (elements) {
    getElementList(elements).forEach(function(element) {
        element.classList.remove(_transformClass);
    });
    return tcon;
};
tcon.toggle = function (elements) {
    getElementList(elements).forEach(function(element) {
        tcon[element.classList.contains(_transformClass) ? 'revert' : 'transform'](element);
    });
    return tcon;
};
return tcon;
}));transformicons.add('.tcon');
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<?php require_once 'google-analystics.inc.php';?>
<!-- test static scrollTop -->
<script>
    document.onscroll = function() {
        if( $(window).scrollTop() > $('header').height() ) {
            $('#scrollUp').removeClass('hidden');
        }
        else {
            $('#scrollUp').addClass('hidden');
        }
    };
</script>
<!-- Taal -->
<script src="<?php echo $path?>js/buttons.js"></script>
<!-- flickity -->
<script src="//cdnjs.cloudflare.com/ajax/libs/flickity/0.3.1/flickity.pkgd.min.js"></script>
<script>
    $('#main-gallery').flickity({
    // options
    cellAlign: 'center',
    contain: true,
    wrapAround: true,
    autoPlay: true,
    watchCSS: true
});
</script>
<!-- NavTogle -->
<script>''
    $( '#nav > li' ).click(function() {
        if ( $( '.navbar-ex1-collapse' ).hasClass( 'in' ) ) {
            $( '#button-nav' ).toggleClass('tcon-transform');
            $( '.navbar-ex1-collapse' ).toggleClass('in')
        }
    });

</script>
</body>

</html>


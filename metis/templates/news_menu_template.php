<?php
/**
 * Copyright (C) e107 Inc (e107.org), Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
 * $Id$
 * 
 * News menus templates
 */

if (!defined('e107_INIT'))  exit;

global $sc_style;

// $sc_style['NEWS_CATEGORY_NEWS_COUNT']['pre']  = '(';
// $sc_style['NEWS_CATEGORY_NEWS_COUNT']['post'] = ')';
/*
								
<li ><a href="{NEWS_CATEGORY_URL}"><span class="fa fa-angle-right mr-2" data-fa-transform="shrink-3"></span>{NEWS_CATEGORY_TITLE}</a> {NEWS_CATEGORY_NEWS_COUNT}</a></li>*/

$code_read_more = '<a class="text-capitalize text-primary font-weight-semi-bold" href="{NEWSURL}">
                        <p class="mb-6 mb-md-0">'.LAN_READ_MORE.' &raquo;</p>
                   </a>';
                      
 

 
 
// Other News Menu. 2 		 

$NEWS_MENU_TEMPLATE['other2']['caption'] 	= "About update";
$NEWS_MENU_TEMPLATE['other2']['start'] 	= "{SETIMAGE: w=120&h=80&crop=1}";  
$NEWS_MENU_TEMPLATE['other2']['end'] 	= "</ul>";
$NEWS_MENU_TEMPLATE['other2']['item'] 	=  '
<div class="other2-news2-item">							 
<div class="other2-news2-item-pic">								 
	<img class="thumbnail" src="{NEWS_IMAGE: type=src&placeholder=1}" alt="{NEWS_TITLE}">							 
</div>							 
<div class="other2-news2-item-text">								 
 
	{NEWSTITLE}								 
 							 
	{NEWSUMMARY}							 
</div>						 
</div>'; 
										

$NEWS_MENU_TEMPLATE['other'] = $NEWS_MENU_TEMPLATE['other2'];



// Grid Menu
// Moved to news_grid_template.php


// $NEWS_MENU_WRAPPER['grid']['NEWSTITLE'] = "<span style='color:red'>{---}</span>"; // example
//<li data-target="#news-carousel" data-slide-to="{COUNT}" class="{ACTIVE}"><a href="#">{NEWS_SUMMARY}</a></li>

/* Carousel Menu */
$NEWS_MENU_TEMPLATE['carousel']['header'] = '

	<div class="col-6 text-right">
	<a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
	  <i class="fa fa-arrow-left"></i>
	</a>
	<a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
	  <i class="fa fa-arrow-right"></i>
	</a>
	</div>
	<div class="col-12">
	<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	';
$NEWS_MENU_TEMPLATE['carousel']['footer'] = '
</div>
</div>
</div>
';
$NEWS_MENU_TEMPLATE['carousel']['nav'] = '


';

$NEWS_MENU_TEMPLATE['carousel']['start'] = '
<div class="carousel-item {ACTIVE}">
					<div class="row"> ';


$NEWS_MENU_TEMPLATE['carousel']['end'] = '
</div>
</div>
 					      
										 ';


$NEWS_MENU_TEMPLATE['carousel']['item'] = '{SETIMAGE: w=350&h=280&crop=1}
 <div class="col-md-4 col-sm-6 mb-3">
<div class="card">
<img class="img-fluid" src="{NEWS_IMAGE: type=src}" alt="{NEWSTITLE}">  
 
  <div class="card-body">
	<h5 class="card-title">{NEWS_TITLE}</h5>
	<p class="card-text">{NEWS_SUMMARY}</p>
	<a href="{NEWSURL}" class="btn btn-primary btn-sm">Read More</a>
  </div>
</div>
</div>';











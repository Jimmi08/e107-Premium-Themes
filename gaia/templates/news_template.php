<?php
/**
 * Copyright (C) e107 Inc (e107.org), Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
 * $Id$
 * 
 * News default templates
 */

if (!defined('e107_INIT'))  exit;

global $sc_style;



$NEWS_TEMPLATE = array();
$image = THEME_ABS."images/header-10.jpeg";

 

$NEWS_INFO = array(
	'default' 	=> array('title' => LAN_DEFAULT, 	'description' => 'unused'),
	'list' 	    => array('title' => LAN_LIST, 		'description' => 'unused'),
	'2-column'  => array('title' => "2 Column (experimental)",     'description' => 'unused'), //@todo more default listing options.
);

$NEWS_TEMPLATE['default']['caption']	= '<div class="section section-header-blog"> 
        <div class="parallax filter filter-color-black defaultcaption">
            <div class="image"
                style="background-image:url('.$image.')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1>Creative Blog</h1>
                        <h3>{NEWS_CATEGORY_NAME}</h3>
                        <button type="button" class="btn btn-white btn-fill">Discover Stories</button>
                    </div>
                </div>

            </div>
        </div>
    </div>  
    ';
$NEWS_TEMPLATE['default']['start']	= ' 
    <div class="section">
        <div class="container">
            <div class="row">
						  ';
$NEWS_TEMPLATE['default']['end']	= '                        
					</div>
        </div>
    </div>';
$NEWS_TEMPLATE['default']['item']	= '{SETIMAGE: w=350&h=240}
                    <div class="col-md-4">
                    <div class="card card-blog card-plain">
                        <a href="{NEWSURL}" class="header">
                           {NEWSIMAGE: class=image-header}   
                        </a>
                        <div class="content">
                            <h6 class="card-date">{NEWSDATE=short}</h6>
                            <a href="{NEWSURL}" class="card-title">
                                <h3>{NEWS_TITLE}</h3>
                            </a>
                            <div class="line-divider line-danger"></div>
                            <h6 class="card-category">{NEWSCATEGORY}</h6>
                        </div>
                    </div>
                 </div> 
								';

/* used for non standard layout, no col-md-4 and images are resized itself  */
$NEWS_TEMPLATE['default']['customitem']	= '{SETIMAGE: w=0&h0}
                    <div class="card card-blog card-plain">
                        <a href="{NEWSURL}" class="header">
                           {NEWSIMAGE: class=image-header}   
                        </a>
                        <div class="content">
                            <h6 class="card-date">{NEWSDATE=short}</h6>
                            <a href="{NEWSURL}" class="card-title">
                                <h3>{NEWS_TITLE}</h3>
                            </a>
                            <div class="line-divider line-danger"></div>
                            <h6 class="card-category">{NEWSCATEGORY}</h6>
                        </div>
                    </div>
								';
                

$NEWS_TEMPLATE['list']       = $NEWS_TEMPLATE['default'];
 
$NEWS_TEMPLATE['category']    = $NEWS_TEMPLATE['default'];
$NEWS_TEMPLATE['category']['caption']	= '<div class="section section-header-blog"> 
        <div class="parallax filter filter-color-black defaultcaption">
            <div class="image"
                style="background-image:url('.$image.')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1>Creative Blog</h1>
                        <h3>{NEWS_CATEGORY_NAME}</h3>
                        <button type="button" class="btn btn-white btn-fill">Discover Stories</button>
                    </div>
                </div>

            </div>
        </div>
    </div>  
    '; 
    
$NEWS_TEMPLATE['list']['caption']	= '<div class="section section-header-blog"> 
        <div class="parallax filter filter-color-black defaultcaption">
            <div class="image"
                style="background-image:url('.$image.')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1>Creative Blog</h1>
                        <button type="button" class="btn btn-white btn-fill">Discover Stories</button>
                    </div>
                </div>

            </div>
        </div>
    </div>  
    ';    

/**
 * @todo (experimental)
 */
$NEWS_TEMPLATE['2-column']['caption']  = '{NEWS_CATEGORY_NAME}';
$NEWS_TEMPLATE['2-column']['start']    = '<div class="row">';
$NEWS_TEMPLATE['2-column']['item']     = '<div class="item col-md-6">
											{SETIMAGE: w=400&h=400&crop=1}
											{NEWSTHUMBNAIL=placeholder}
	                                            <h3>{NEWS_TITLE}</h3>
	                                            <p>{NEWS_SUMMARY}</p>
	                                         	<p class="text-right"><a class="btn btn-primary btn-othernews" href="{NEWSURL}">' . LAN_READ_MORE . '</a></p>
            							  </div>';
$NEWS_TEMPLATE['2-column']['end']      = '</div>';







### Related 'start' - Options: Core 'single' shortcodes including {SETIMAGE}
### Related 'item' - Options: {RELATED_URL} {RELATED_IMAGE} {RELATED_TITLE} {RELATED_SUMMARY}
### Related 'end' - Options:  Options: Core 'single' shortcodes including {SETIMAGE}
/*
$NEWS_TEMPLATE['related']['start'] = "<hr><h4>".defset('LAN_RELATED', 'Related')."</h4><ul class='e-related'>";
$NEWS_TEMPLATE['related']['item'] = "<li><a href='{RELATED_URL}'>{RELATED_TITLE}</a></li>";
$NEWS_TEMPLATE['related']['end'] = "</ul>";*/

$NEWS_TEMPLATE['related']['start'] = '{SETSTYLE=none}{SETIMAGE: w=350&h=350&crop=1}<h2 class="caption">    <div class="section section-gray">
        <div class="container">
            <div class="title-area">
                <h5 class="subtitle text-gray">Don\'t miss our</h5>
                <h2>Most Recommended Stories</h2>
                <div class="separator separator-danger">✻</div>
            </div>
           <div class="row">';
$NEWS_TEMPLATE['related']['item'] = '<div class="col-md-4">
<a href="{RELATED_URL}">{RELATED_IMAGE}</a><h3><a href="{RELATED_URL}">{RELATED_TITLE}</a></h3></div>';
$NEWS_TEMPLATE['related']['end'] = '</div>
        </div>
    </div>';
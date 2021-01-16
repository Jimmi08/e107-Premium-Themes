<?php
	/**
	 * Copyright (C) 2008-2016 e107 Inc (e107.org), Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
	 *
	 * Carousel Menu
	 */
	if(!defined('e107_INIT'))
	{
		exit;
	}


	if(is_string($parm))
	{
		parse_str($parm, $parms);
	}
	else
	{
		$parms = $parm;
	}

	if(isset($parms['caption']))
	{
		$parms['caption'] = $parms['caption'];
	}
 
	$limit = vartrue($parms['count'], 15);
	$tp = e107::getParser();
	$template = e107::getTemplate('news', 'news_menu', 'carousel', true, true);

	$nobody_regexp = "'(^|,)(" . str_replace(",", "|", e_UC_NOBODY) . ")(,|$)'";
 
    $query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_id, nc.category_name, nc.category_sef, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().") 
			AND FIND_IN_SET(0, n.news_render_type)  ORDER BY n.news_datestamp DESC LIMIT 0,". $limit;
            
    $data = e107::getDb()->retrieve($query,true);         

	if(empty($data))
	{
		e107::getMessage()->addDebug("No News items found with  'carousel' as the template ")->render();

		return;
	}

	$count = 0;

    // $tp->setThumbSize(800,0);

	$sc = e107::getScBatch('news');
	$text = '';
	$nav = array();

    //counted by 3 
    $i = 0;
	foreach($data as $row)
	{
        $carousel_start = '';
        $carousel_end = '';
        $vars = array(
			'{ACTIVE}' => ($count == 0) ? 'active' : '',
			'{COUNT}'  => $count,
		);
        $sc->setScVar('news_item', $row);     
        if($i == 0 ) {
            $carousel_start  = str_replace(array_keys($vars), $vars, $template['start']);
            $i++;
        }
        elseif($i == 2 ) {
            $carousel_end  = str_replace(array_keys($vars), $vars, $template['end']);
            $i = 0 ;
        }
        else {
           $i++;
        }
        
        $parsed = str_replace(array_keys($vars), $vars, $template['item']);
        $parsed = $tp->parseTemplate($parsed, true, $sc);
 
        $text .= $carousel_start.$parsed.$carousel_end;
 
		$count++;
	}
 

    $header = str_replace("{NAV}", implode("\n", $nav), $template['header']);
    $footer = str_replace("{NAV}", implode("\n", $nav), $template['footer']);
    
	if(!empty($parms['caption']))
	{
		e107::getRender()->tablerender($parms['caption'], ($header . $text . $footer), 'news-carousel'); //TODO Tablerender().
	}
	else
	{
		echo $header . $text . $footer;
	}

 



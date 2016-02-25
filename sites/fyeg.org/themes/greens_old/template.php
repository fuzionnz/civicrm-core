<?php


/**
 * Variables preprocess function for the "page" theming hook.
 */
function greens_preprocess_page(&$vars) {

  // Do we have a node?
  if (isset($vars['node'])) {

    // Ref suggestions
    $suggests = &$vars['theme_hook_suggestions'];

    // Get path arguments.
    $args = arg();
    // Remove first argument of "node".
    unset($args[0]);

    // Set type.
    $type = "page__type_{$vars['node']->type}";

    // Bring it all together.
    $suggests = array_merge(
      $suggests,
      array($type),
      theme_get_suggestions($args, $type)
    );

    // if the url is: 'http://domain.com/node/123/edit'
    // and node type is 'blog'..
    // 
    // This will be the suggestions:
    //
    // - page__node
    // - page__node__%
    // - page__node__123
    // - page__node__edit
    // - page__type_blog
    // - page__type_blog__%
    // - page__type_blog__123
    // - page__type_blog__edit
    // 
    // Which connects to these templates:
    //
    // - page--node.tpl.php
    // - page--node--%.tpl.php
    // - page--node--123.tpl.php
    // - page--node--edit.tpl.php
    // - page--type-blog.tpl.php
    // - page--type-blog--%.tpl.php
    // - page--type-blog--123.tpl.php
    // - page--type-blog--edit.tpl.php
    // 
    // Latter items take precedence.
  }



//----


  if (isset($vars['node']) && $vars['node']->type == 'page')
  {
    // look up the alias from the url_alias table
    $source = 'node/' .$vars['node']->nid;
    $alias = db_query("SELECT alias FROM {url_alias} WHERE source = '$source'")->fetchField();

    if ($alias != '')
    {
      // build a suggestion for every possibility
      $parts = explode('/', $alias);
      $suggestion = '';
      foreach ($parts as $part)
      {
        if ($suggestion == '')
        {
          // first suggestion gets prefaced with 'page__'
          $suggestion .= "page__$part";
        }
        else
        {
          // subsequent suggestions get appended
          $suggestion .= "__$part";
        }
        // convert hyphens to underscores.
        $suggestion =  str_replace('-', '_', $suggestion);
        // add the suggestion to the array
        $vars['theme_hook_suggestions'][] = $suggestion;
      }
    }
  }

  if (partialArraySearch("page__get_involved__", $vars['theme_hook_suggestions'])) $vars['theme_hook_suggestions'][] = 'page';

}

function partialArraySearch($needle, $haystack) {
    foreach ($haystack as $piece_of_hay) {
        if (strpos($piece_of_hay, $needle) !== false) return true;
    }
    return false;
}



function greens_excerpt($text,$numb) {
	$text = strip_tags($text);
	if (strlen($text) > $numb) { 
	  $text = substr($text, 0, $numb); 
	  $text = substr($text,0,strrpos($text," ")); 
	  $etc = "...";  
	  $text = $text.$etc; 
	  }
	return check_markup($text);
}


?>
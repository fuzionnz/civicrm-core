<?php if ($search_results): ?>
  <div class="search-results <?php print $module; ?>-results">
    <?php print $search_results; ?>
  </div>
  <?php print $pager; ?>
<?php else : ?>
  <h2><?php print t('Your search yielded no results');?></h2>
  <?php //print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>
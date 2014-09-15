<a href="<?php print $url; ?>"><?php print $title; ?></a>
<?php if ($snippet) : ?>
    <p class="search-snippet"><?php print $snippet; ?></p>
<?php endif; ?>
<?php if ($info) : ?>
  <p class="search-info"><?php print $info; ?></p>
<?php endif; ?>
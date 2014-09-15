<?php
if (user_access("administer blocks")): ?>
  <div class="admin_tools"><a href="#overlay=admin/structure/block/manage/block/<?php echo $block_id?>">Edit</a></div>
<?php endif; ?>
<?php

/**
 * @file
 */

/**
 * Find Git repos in the site root, report if there are unstaged /
 * uncommitted changes.
 */
function fzarch_git_status() {
  // Some tests.
  $tests = array(
    'unstaged' => 'git diff-files --name-status -r --ignore-submodules',
    'uncommitted' => 'git diff-index --cached --name-status -r --ignore-submodules HEAD',
  );

  $prev_path = getcwd();
  $command = 'find . -name ".git" -type d';
  exec('find . -name .git -type d 2>/dev/null', $output);
  foreach ($output as $path) {
    $found[] = realpath(dirname($path));
  }
  sort($found);
  foreach ($found as $directory) {
    $output = array();
    chdir($directory);
    foreach ($tests as $label => $test) {
      $output = array();
      exec($test, $output);
      if (!empty($output)) {
        $owners = array();
/*
        foreach ($output as $file) {
          $owner = posix_getpwuid(fileowner($file));
          if (!in_array($owner, $owners)) {
            $owners[] = $owner;
          }
        }
*/
        $message = '<strong>!type changes in !directory</strong>';
        $result[$directory][$label]['header'] = t($message, array(
                                                    '!directory' => $directory,
                                                    '!type' => $label,
                                                    '%owners' => implode(', ', $owners),
                                                  ));
        $result[$directory][$label]['body'] = $output;
      }
    }
  }
  chdir($prev_path);
  if (!empty($result)) {
    foreach ($result as $directory => $reports) {
      foreach ($reports as $label => $report) {
        $values[] = $report['header'] . '<pre>' . implode("\n", $report['body']) . '</pre>';
      }
    }
  }
  if (isset($values)) {
    return $values;
  }
}

/**
 * Gets CiviCRM Git hash.
 */
function fzarch_civicrm_gitinfo() {
  if (module_exists('civicrm')) {
    civicrm_initialize();
    global $civicrm_root;
    if (file_exists($civicrm_root . '/.git')) {
      $prev_path = getcwd();
      chdir($civicrm_root);

      $cmds = array(
        'commit_hash' => 'git rev-parse --short HEAD',
        'branch' => 'git symbolic-ref --short HEAD',
      );
      foreach ($cmds as $key => $cmd) {
        $output = array();
        // Get current commit hash.
        exec($cmd, $output);
        if (!empty($output)) {
          $info[$key] = reset($output);
        }
      }

      chdir($prev_path);
    }
  }
  if (!empty($info)) {
    return $info;
  }
}
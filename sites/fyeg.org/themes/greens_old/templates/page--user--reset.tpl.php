<?php
  // Drupal Forgot Password Form
  module_load_include('inc', 'user', 'user.pages');
  render( drupal_get_form('change_password_form'));?>
#!/bin/bash
set -ex

P=`dirname $0`
CFFILE=$P/../distmaker.conf
if [ ! -f $CFFILE ] ; then
  echo "NO DISTMAKER.CONF FILE! Make sure all parameters are defined elsewhere"
else
  . $CFFILE
fi
. "$P/common.sh"

SRC=$DM_SOURCEDIR
TRG=$DM_TMPDIR/civicrm

# copy all the stuff
dm_reset_dirs "$TRG"
cp $SRC/drupal/civicrm.config.php.drupal $TRG/civicrm.config.php
dm_generate_version "$TRG/civicrm-version.php" Drupal
dm_install_core "$SRC" "$TRG"
dm_install_packages "$SRC/packages" "$TRG/packages"
dm_install_vendor "$SRC/vendor" "$TRG/vendor"
dm_install_bower "$SRC/bower_components" "$TRG/bower_components"
dm_install_drupal "$SRC/drupal" "$TRG/drupal"

# gen tarball
cd $TRG
rm -r *
mv * -r $DM_TARGETDIR

# clean up
rm -rf $TRG

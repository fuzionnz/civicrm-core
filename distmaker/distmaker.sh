#!/bin/bash -v
set -e

# This is distmaker script for CiviCRM
# Author: michau
# "Protected by an electric fence and copyright control."
# Thanks to Kleptones for moral support when writing this.

# You need to ensure the following variables are defined. They are traditionally defined
# in distmaker.conf but you can also defined them as an environment variable or by
# calling the script with env DM_REF_CORE=4.7 (for example).
#
# DM_SOURCEDIR=/home/user/svn/civicrm           <- sources
# DM_GENFILESDIR=/home/user/generated           <- generated files
# DM_TMPDIR=/tmp                                <- temporary files (will be deleted afterwards)
# DM_TARGETDIR=/tmp/outdir                      <- target dir for tarballs
# DM_REF_CORE=master                            <- Git branch/tag name
#
# Optional variables
# DM_PHP=/opt/php5/bin/php                      <- php5 binary
# DM_RSYNC=/usr/bin/rsync                       <- rsync binary
# DM_VERSION=trunk.r1234                        <- what the version number should be
# DM_ZIP=/usr/bin/zip                           <- zip binary
#
#
# ========================================================
# DO NOT MODIFY BELOW
# ========================================================


# Where are we called from?
P=`dirname $0`
# Current dir
ORIGPWD=`pwd`
source "$P/dists/common.sh"

# Set no actions by default
D5PACK=0
D56PACK=0
D7DIR=0
J5PACK=0
WP5PACK=0
SK5PACK=0
L10NPACK=0

# Display usage
display_usage()
{
  echo
  echo "Usage: "
  echo "  distmaker.sh OPTION"
  echo
  echo "Options available:"
  echo "  all  - generate all available tarballs"
  echo "  l10n - generate internationalization data"
  echo "  d5   - generate Drupal7 PHP5 module"
  echo "  d5.6 - generate Drupal6 PHP5 module"
  echo "  d7_dir -generate Drupal7 PHP5 module, but output to a directory, no tarball"
  echo "  j5   - generate Joomla PHP5 module"
  echo "  wp5  - generate Wordpress PHP5 module"
  echo "  sk - generate Drupal StarterKit module"
  echo
  echo "You also need to have distmaker.conf file in place."
  echo "See distmaker.conf.dist for example contents."
  echo "Alternatively you can set the required variables as "
  echo "environment variables, eg. for your machine or by calling "
  echo "this script using "
  echo
  echo "env DM_TARGETDIR=/path/to/output/dir/for/files/or/tarball distmaker.sh all"
  echo
  echo "optional environmentals:"
  echo "   DM_SOURCEDIR "
  echo "   DM_GENFILESDIR (default $TMPDIR/genfiles)"
  echo "   DM_TARGETDIR= (default $TMPDIR/civicrm)"
  echo
  echo

}

THIS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )";
# Check if config is ok.
check_conf()
{
  if [ -f $P/distmaker.conf ] ; then
    source "$P/distmaker.conf"
  fi

  if [ -z $DM_SOURCEDIR ] ; then
    DM_SOURCEDIR=$THIS_DIR/..;
  fi

  if [ -z $DM_TMPDIR ] && [ -e $TMPDIR ] ; then
    DM_TMPDIR=$TMPDIR/civicrm
  fi

  if [ -z $DM_GENFILESDIR ] && [ -e $TMPDIR ] ; then
    DM_GENFILESDIR=$TMPDIR/genfiles
  fi

  # Test for distmaker.conf file availability, cannot proceed without it anyway
  if [ -z $DM_GENFILESDIR ] || [ -z $DM_TMPDIR ] || [ -z $DM_TARGETDIR ]; then
    echo; echo "Required variables not defined!"; echo;
    display_usage
    echo "your variables"
    echo "DM_SOURCEDIR : $DMSOURCEDIR";
    echo "DM_TARGETDIR : $DM_TARGETDIR";
    exit 1
  else
    export DM_SOURCEDIR DM_GENFILESDIR DM_TMPDIR DM_TARGETDIR DM_PHP DM_RSYNC DM_ZIP DM_VERSION DM_REF_CORE DM_REF_DRUPAL DM_REF_DRUPAL6 DM_REF_JOOMLA DM_REF_WORDPRESS DM_REF_PACKAGES
    if [ ! -d "$DM_SOURCEDIR" ]; then
      echo; echo "ERROR! " DM_SOURCEDIR "directory not found!"; echo "(if you get empty directory name, it might mean that one of necessary variables is not set)"; echo;
    fi
    for k in "$DM_GENFILESDIR" "$DM_TARGETDIR" "$DM_TMPDIR"; do
      if [ -z "$k" ] ; then
        echo; echo "ERROR! " $k "directory not found!"; echo "(if you get empty directory name, it might mean that one of necessary variables is not set)"; echo;
        exit 1
      fi
      if [ ! -d "$k" ]; then
        mkdir -p "$k"
      fi
    done
  fi
}

# Let's go.

check_conf

# Figure out what to do
case $1 in
  # L10N PHP5
  l10n)
  echo; echo "Generating L10N module"; echo;
  L10NPACK=1
  ;;

  # DRUPAL7 PHP5
  d5)
  echo; echo "Generating Drupal7 PHP5 module"; echo;
  D5PACK=1
  ;;

  # Drupal 7 - Output to directory
  d7_dir)
  echo; echo "Generating Drupal7 Directory"; echo;
  D7DIR=1
  ;;

  # DRUPAL7 PHP5 StarterKit package
  sk)
  echo; echo "Generating Drupal7 PHP5 starter kit minimal module"; echo;
  SKPACK=1
  ;;

  # DRUPAL6 PHP5
  d5.6)
  echo; echo "Generating Drupal6 PHP5 module"; echo;
  D56PACK=1
  ;;

  # JOOMLA PHP5
  j5)
  echo; echo "Generating Joomla PHP5 module"; echo;
  J5PACK=1
  ;;

  # WORDPRESS PHP5
  wp5)
  echo; echo "Generating Wordpress PHP5 module"; echo;
  WP5PACK=1
  ;;

  # ALL
  all)
  echo; echo "Generating all we've got."; echo;
  D5PACK=1
  D56PACK=1
  J5PACK=1
  WP5PACK=1
  SKPACK=1
  L10NPACK=1
  ;;

  # USAGE
  *)
  display_usage
  exit 0
  ;;

esac

## Make sure we have the right branch or tag
dm_git_checkout "$DM_SOURCEDIR" "$DM_REF_CORE"
dm_git_checkout "$DM_SOURCEDIR/packages" "$DM_REF_PACKAGES"

## in theory, this shouldn't matter, but GenCode is CMS-dependent, and we've been doing our past builds based on D7
dm_git_checkout "$DM_SOURCEDIR/drupal" "$DM_REF_DRUPAL"

## Get latest dependencies
dm_generate_vendor "$DM_SOURCEDIR"
dm_generate_bower "$DM_SOURCEDIR"

# Before anything - regenerate DAOs

cd $DM_SOURCEDIR/xml
${DM_PHP:-php} GenCode.php schema/Schema.xml $DM_VERSION

cd $ORIGPWD

if [ "$L10NPACK" = 1 ]; then
  echo; echo "Packaging for L10N"; echo;
  bash $P/dists/l10n.sh
fi

if [ "$D56PACK" = 1 ]; then
  echo; echo "Packaging for Drupal6, PHP5 version"; echo;
  dm_git_checkout "$DM_SOURCEDIR/drupal" "$DM_REF_DRUPAL6"
  bash $P/dists/drupal6_php5.sh
fi

if [ "$D5PACK" = 1 ]; then
  echo; echo "Packaging for Drupal7, PHP5 version"; echo;
  dm_git_checkout "$DM_SOURCEDIR/drupal" "$DM_REF_DRUPAL"
  bash $P/dists/drupal_php5.sh
fi

if [ "$D7DIR" = 1 ]; then
  echo; echo "Packaging for Drupal7, Directory not tarball, PHP5 version"; echo;
  dm_git_checkout "$DM_SOURCEDIR/drupal" "$DM_REF_DRUPAL"
  bash $P/dists/drupal7_dir_php5.sh
fi

if [ "$SKPACK" = 1 ]; then
  echo; echo "Packaging for Drupal7, PHP5 StarterKit version"; echo;
  dm_git_checkout "$DM_SOURCEDIR/drupal" "$DM_REF_DRUPAL"
  bash $P/dists/drupal_sk_php5.sh
fi

if [ "$J5PACK" = 1 ]; then
  echo; echo "Packaging for Joomla, PHP5 version"; echo;
  dm_git_checkout "$DM_SOURCEDIR/joomla" "$DM_REF_JOOMLA"
  bash $P/dists/joomla_php5.sh
fi

if [ "$WP5PACK" = 1 ]; then
  echo; echo "Packaging for Wordpress, PHP5 version"; echo;
  dm_git_checkout "$DM_SOURCEDIR/WordPress" "$DM_REF_WORDPRESS"
  bash $P/dists/wordpress_php5.sh
fi

unset DM_SOURCEDIR DM_GENFILESDIR DM_TARGETDIR DM_TMPDIR DM_PHP DM_RSYNC DM_VERSION DM_ZIP
echo;echo "DISTMAKER Done.";echo;

<?php
if (eregi("main.php",$PHP_SELF)) {
 Header("Location: index.php");
  die();
}
?>



<?php

// CONSTANTS and CLASS DEFINITIONS:

  define( 'STATUS_PRE'           , 0 );
  define( 'STATUS_IN_CAT_TITLE'  , 1 );
  define( 'STATUS_INTER'         , 2 );
  define( 'STATUS_IN_DOC_SECTION', 3 );

  define( 'BR'  , "<br>\n" );
  define( 'NBSP', "&nbsp;" );
  define( 'P'   , "<p>\n"  );

  define( 'CATFILE_PREFIX' , 'Cat_' );
  define( 'CATFILE_EXT'    , '.dat' );
  define( 'CATFILE_PATTERN', '/^' . CATFILE_PREFIX . '.*' . CATFILE_EXT . '$/' );

  define( 'HDR_COL_TITLE', 'Title'       );
  define( 'HDR_COL_HTML' , 'HTML'        );
  define( 'HDR_COL_OTHER', 'PDF / other' );


  class Linkdata
  {
    var $lang;    // Language code, e.g. 'en', 'ru', 'pt', pt_br'
    var $type;    // File type, e.g. 'pdf', 'doc', 'ppt', 'html'
    var $file;    // File name
    var $url;     // URL
    function dump()
    {
      echo implode( ', ', array( $this->lang, $this->type, $this->url ) );
    }
  }

  class Docdata
  {
    var $title;             // English title
    var $title_h;           // English title, HTML-escaped
    var $html  = array();   // array of Linkdata
    var $other = array();   // array of Linkdata
    function dump()
    {
      echo $this->title, BR;
      foreach( array_merge( $this->html, $this->other ) as $link )
      {
        $link->dump();
        echo BR;
      }
    }
  }

  class Catdata
  {
    var $title;            // shown as header above category
    var $title_h;          // same, HTML-escaped
    var $anchor;           // <a name>
    var $docs = array();   // array of docdata
    function dump()
    {
      echo $this->title, BR, BR;
      foreach( $this->docs as $doc )
      {
        $doc->dump();
        echo BR;
      }
      echo BR;
    }
  }



// CONFIGURATION STUFF:

  $one_table      = false;   // all categories in one big table?
  $multi_hdr_rows = false;   // header row for each table if multi?

  switch( strtolower( $_GET[ 'tbl' ] ) )
  {
    case "1"     :
    case "one"   : $one_table = true; break;
    case "m"     :
    case "multi" :
    case "many"  : $one_table = false; break;
  }



// BUILDUP OF THE HTML PAGE:

  // change to script dir if necessary:
  $startdir  = getcwd();
  $scriptdir = pathinfo( __FILE__, PATHINFO_DIRNAME );
  if ( $scriptdir != $startdir) chdir( $scriptdir );

  $categories = array();    // array of Catdata

  // read info in data files into $categories array:
  list ( $cats, $docs, $errors ) = read_cat_files();  // return values are for debugging/stats

  echo '<h1>Firebird Documentation Index</h1>';

  // create links to categories:
  make_cat_links();

  vspace( 10 );
  echo "<p>The HTML and PDF columns contain links to the various language versions of each document.</p>",
       "<p><i>Please notice:</i> Many HTML manuals consist of several files.",
       " If you right-click on a link to download such a manual, you'll only catch the first section.</p>";

  // create table with links to all docs:
  make_table();

  // return to original dir, if applicable:
  if ( getcwd() != $startdir) chdir( $startdir );

  // done!



// FUNCTION IMPLEMENTATIONS:

  // parses data from all files with name following CATFILE_PATTERN into $categories array
  function read_cat_files()
  {
    $cats_read   = 0;
    $docs_read   = 0;
    $file_errors = 0;

    $dir = opendir( '.' );
    if ( $dir === FALSE )
    {
      closedir( $dir );
      ++$file_errors;
    }
    else
    {
      $filenames = array();
  
      while ( ( $entry = readdir( $dir ) ) !== FALSE )
      {
        if ( is_cat_file( $entry ) ) $filenames[] = $entry;
      }
      closedir( $dir );
  
      sort ( $filenames );
      foreach ( $filenames as $filename )
      {
        $result = read_cat_file( $filename );
        if ( $result === FALSE )
        {
          ++$file_errors;
        }
        else
        {
          $docs_read += $result;
          ++$cats_read;
        }
      }
    }

    return array( $cats_read, $docs_read, $file_errors );
  } // read_cat_files()



  // parses data from named file into new entry in $categories array
  function read_cat_file( $filename )
  {
    global $categories;

    $lines = file( &$filename );
    if ( $lines === FALSE ) return FALSE;

    $category;  // becomes reference to current category
    $doc;       // becomes ref to current doc (changes)

    $state = STATUS_PRE;

    foreach( $lines as $line )
    {
      $line = trim( $line );
      if ( $line[0] == '#' ) continue;

      if ( $line == '' )
      {
        if ( $state == STATUS_IN_DOC_SECTION ) unset( $doc );
        if ( $state != STATUS_PRE ) $state = STATUS_INTER;
        continue;
      }

      // here we have a non-empty, non-comment line:
      if ( $state == STATUS_PRE )
      {
        $state = STATUS_IN_CAT_TITLE;
        $category = new Catdata;
        $category->title   = $line;
        $category->title_h = htmlspecialchars( $category->title );
        $category->anchor   = 'category_' . count( $categories );
        $categories[] = &$category;
      }
      elseif ( $state == STATUS_IN_CAT_TITLE )
      {
        // actually, we _really_ don't want multiline titles!
        $category->title   .= "\n" . $line;
        $category->title_h .=  BR  . htmlspecialchars( $line );
      }
      elseif ( $state == STATUS_INTER )
      {
        $state = STATUS_IN_DOC_SECTION;
        $doc = new Docdata;
        $doc->title   = $line;
        $doc->title_h = htmlspecialchars( $line );
        $category->docs[] = &$doc;
      }
      elseif ( $state == STATUS_IN_DOC_SECTION )
      {
        list( $lang, $dirty_url ) = preg_split( '/\s*:\s*/', $line, 2 );
        if ( $lang == '' or $dirty_url == '' ) continue;

        list( $type_override, $url ) = get_type_override( $dirty_url );
        if ( $url == '' ) continue;

        $link = new Linkdata;
        $link->lang = strtolower( $lang );
        list( $link->type, $link->file ) = get_doctype( $url );
        if ( $type_override != '' ) $link->type = $type_override;
        $link->url = $url;
        $doc->{$link->type == 'html' ? html : other}[] = &$link;
        unset ( $link );
      }
    } // foreach

    return count( $category->docs );
  } // read_cat_file



  // checks if $filename and type indicate that file contains doc category data
  function is_cat_file( $filename )
  {
    return is_file( $filename )
           && preg_match( CATFILE_PATTERN, $filename );
  } // is_cat_file



  // checks if $url ends with a type override like {pdf}, {html}, etc.
  // returns lowercased override (without braces, possibly empty) and $url with override removed
  function get_type_override( $url )
  {
    $type_override = '';
    $urllen = strlen ( $url );
    $ibrace = strrpos( $url, '{' );
    if ( $ibrace !== FALSE && $url[$urllen - 1] == '}' )
    {
      $type_override = strtolower( substr( $url, $ibrace + 1, $urllen - $ibrace - 2 ) );
      $url           = substr( $url, 0, $ibrace );
    }
    return array( $type_override, $url );
  } // get_type_override



  // tries to establish filename and (hence) document type from URL
  function get_doctype( $url )
  {
    $urlinfo  = parse_url( $url );
    $host     = $urlinfo[ 'host' ];
    $path     = $urlinfo[ 'path' ];
    $query    = $urlinfo[ 'query' ];

    $is_local = $host == '' || strtolower( $host ) == 'www.firebirdsql.org';

    if ( $is_local && $query != '' )
    {
      $qelems = explode( '&', $query );
      $op_is_file = false;
      foreach ( $qelems as $qelem )
      {
        if ( strtolower( $qelem ) == 'op=file' ) $op_is_file = true;
        // "id=blah" means...
        // in index.php                  : load blah.php      (.php added!)
        // in download.php, with op=file : load download/blah (no .php added!)
        if ( strlen( $qelem ) > 3 && strtolower( substr( $qelem, 0, 3 ) ) == 'id=' )
        {
          $path = substr( $qelem, 3 );
          if ( ! $op_is_file ) $path .= ".php";
          break;
        }
      }
    }

    $pathinf  = pathinfo( $path );
    $filename = $pathinf[ 'basename' ];
    $ext_lo   = strtolower( $pathinf[ 'extension' ] );
    switch ( $ext_lo )
    {
      case 'htm'   :
      case 'html'  :
      case 'shtml' :
      case 'php'   : $filetype = 'html'; break;
      default      : $filetype = $ext_lo;
    }

    return array( $filetype, $filename );
  } // get_doctype



  // creates links to categories
  function make_cat_links()
  {
    global $categories;
    $links = array();
    foreach ( $categories as $cat )
    {
      $title_nowrap = str_replace( ' ', NBSP, $cat->title_h );
      $links[] = "<a href='#$cat->anchor'>$title_nowrap</a>";
    }
    echo implode( ' | ', $links );
  } // make_cat_links



  // creates table(s) with links to all docs
  function make_table()
  {
    global $categories, $one_table, $multi_hdr_rows;

    $bottomstyle   = "style='padding-bottom: 5px; border-bottom: 1px solid #848D84'";

    // column widths:
    $w1            = "width='50%'";
    $w2            = "width='25%'";
    $w3            = "width='25%'";

    $table0_open   = "\n<table width='100%' border='0' cellpadding='3' cellspacing='2'>\n";
    $table_open    = "\n<table width='100%' border='1' cellpadding='2' cellspacing='2'>\n";
    $table_close   = "</table>\n";
    $row_open      = "<tr valign='top'>\n";
    $row_open_b    = "<tr valign='bottom'>\n";
    $row_close     = "</tr>\n";
    $header_row    = $row_open . "<th $w1>" . HDR_COL_TITLE . "</th>"
                               . "<th $w2>" . HDR_COL_HTML  . "</th>"
                               . "<th $w3>" . HDR_COL_OTHER . "</th>\n" . $row_close;
    $col1_open     = "<td $w1>";
    $col2_open     = "<td $w2>";
    $col3_open     = "<td $w3>";
    $col1_open_bot = "<td $w1 $bottomstyle>";
    $col2_open_bot = "<td $w2 $bottomstyle>";
    $col3_open_bot = "<td $w3 $bottomstyle>";
    $col_close     = "</td>";

    $i0 = '<i>';
    $i1 = '</i>';

    $hdr_col1_sml = $col1_open . $i0 . HDR_COL_TITLE . $i1 . $col_close;
    $hdr_col2_sml = $col2_open . $i0 . HDR_COL_HTML  . $i1 . $col_close;
    $hdr_col3_sml = $col3_open . $i0 . HDR_COL_OTHER . $i1 . $col_close;
    $hdr_row_sml  = $row_open . $hdr_col1_sml . $hdr_col2_sml . $hdr_col3_sml . $row_close;

    if ( $one_table ) 
    {
      vspace( 10 );
      echo $table_open, $header_row;
    }

    // we count from 1..total here
    $i_last_cat = count( $categories );
    $i_cat      = 0;

    foreach ( $categories as $cat )
    {
      ++$i_cat;

      $anchorstr       = "<a name='$cat->anchor'></a>";
      $boldblacktitle  = "<font color='black'><b>$cat->title_h</b></font>";
      $bigorangetitle  = "<font color='#E13601' size='3'><b>$cat->title_h</b></font>";

      if ( $one_table )
      {
        echo $row_open, "<td colspan=3>", $anchorstr, NBSP, BR, $boldblacktitle, "</td>", $row_close;
      }
      else
      {
        echo P;
        if ( $multi_hdr_rows )
        {
          echo $anchorstr, NBSP, $bigorangetitle, BR;
        }
        else
        {
          echo $anchorstr;
          echo $table0_open, $row_open_b, $col1_open, $bigorangetitle, $col_close;
          if ( $i_cat == 1 )
          {
            echo $hdr_col2_sml, $hdr_col3_sml;
          }
          else
          {
            echo $col2_open, $col_close, $col3_open, $col_close;
          }
          echo $row_close, $table_close;
        }
        echo $table_open;
        if ( $multi_hdr_rows ) echo $hdr_row_sml;
      }

      // again, we count from 1..total here
      $i_last_doc = count( $cat->docs );
      $i_doc      = 0;

      foreach ( $cat->docs as $doc )
      {
        ++$i_doc;

        $needs_bottom = ( $i_doc == $i_last_doc ) && ( ! $one_table || $i_cat == $i_last_cat );

        echo $row_open;

        echo ( $needs_bottom ? $col1_open_bot : $col1_open ), $doc->title_h, $col_close;

        sort( $doc->html );
        $links_html = create_hyperlinks( $doc->html );
        echo ( $needs_bottom ? $col2_open_bot : $col2_open ), $links_html, $col_close;

        sort( $doc->other );
        $links_other = create_hyperlinks( $doc->other );
        echo ( $needs_bottom ? $col3_open_bot : $col3_open ), $links_other, $col_close;

        echo $row_close;
      }
      if ( ! $one_table ) echo $table_close;
    }

    if ( $one_table ) echo $table_close;
    echo P, NBSP, BR;

  } // make_table



  // returns hyperlinks to docs in given Linkdata array
  function create_hyperlinks( &$linkarray )
  {
    $links = array();
    foreach( $linkarray as $linkinfo )
    {
      $ahref     = 'a href="' . $linkinfo->url  . '"';
      $title_alt = ' title="' . $linkinfo->file . '" alt="' . $linkinfo->file . '"';
      $extra     = $linkinfo->type == 'html' || $linkinfo->type == 'pdf' ? "" : ":$linkinfo->type";
      $links[]   = '<' . $ahref . $title_alt . '>' . $linkinfo->lang  . $extra . '</a>';
    }
    $content = implode( ' ', $links );
    return $content == '' ? NBSP : $content;
  } // create_hyperlinks



  // create a "spacer table". useful because different browsers have entirely
  // different ideas about <p>, &nbsp;<br> etc.
  function vspace( $height )
  {
    echo "<table width='100%' border='0' cellspacing='0' cellpadding='0' height='$height'>",
         "<tr><td width='100%'></td></tr></table>";
  }



?>

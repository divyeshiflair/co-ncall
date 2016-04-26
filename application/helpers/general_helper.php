<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * GENERAL helper for CodeIgniter
 * 
 * @author Samuel Sanchez <samuel.sanchez.work@gmail.com> - http://kromack.com/
 * @package CodeIgniter
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/us/
 * @tutorial http://kromack.com/developpement-php/codeigniter/ckeditor-helper-for-codeigniter/
 * @see http://codeigniter.com/forums/viewthread/127374/
 * @version 2010-08-28
 * 
 */

/**
 * This function adds once the CKEditor's config vars
 * @author Samuel Sanchez 
 * @access private
 * @param array $data (default: array())
 * @return string
 */
   

  function charConversion($string, $to = "HTML-ENTITIES", $from = 'UTF-8,ASCII,ISO-8859-9,ISO-8859-1') {

    $str = mb_convert_encoding($string, $to, $from);
    //$str = stripslashes($str);
    if (empty($str)) {
        return $string;
    }
    return $str;
  }

  function charCut($mytext, $limit, $msg){
  	charConversion($mytext);
   if (strlen($mytext) > $limit){
   	 $text=chunk_split($mytext,$limit," ");
   }
   else{
   	 $text=$mytext;
   }

   if (strlen($text) > $limit){
       $txt1 = wordwrap($text, $limit, '[cut]');
   $txt2 = explode('[cut]', $txt1);
       $ourTxt = $txt2[0];
       $finalTxt = $ourTxt.$msg;
   }
   else{
       $finalTxt = $text;
   }
   return $finalTxt;
}

  // set countery array
function Getcountery_Array(){
  $countryArray = array(
          '' => 'Select country',
      'Afghanistan'=>'Afghanistan',
      'Albania'=>'Albania',
      'Albania'=>'Albania',
      'American Samoa'=>'American Samoa',
      'Andorra'=>'Andorra',
      'Angola'=>'Angola',
      'Anguilla'=>'Anguilla',
      'Antarctica'=>'Antarctica',
      'Antigua And Barbuda'=>'Antigua And Barbuda',
      'Argentina'=>'Argentina',
      'Armenia'=>'Armenia',
      'Aruba'=>'Aruba',
      'Australia'=>'Australia',
      'Austria'=>'Austria',
      'Azerbaijan'=>'Azerbaijan',
      'Bahamas'=>'Bahamas',
      'Bahrain'=>'Bahrain',
      'Bangladesh'=>'Bangladesh',
      'Barbados'=>'Barbados',
      'Belarus'=>'Belarus',
      'Belgium'=>'Belgium',
      'Belize'=>'Belize',
      'Benin'=>'Benin',
      'Bermuda'=>'Bermuda',
      'Bhutan'=>'Bhutan',
      'Bolivia'=>'Bolivia',
      'Bosnia And Herzegovina'=>'Bosnia And Herzegovina',
      'Botswana'=>'Botswana',
      'Bouvet Island'=>'Bouvet Island',
      'Brazil'=>'Brazil',
      'British Indian Ocean Territory'=>'British Indian Ocean Territory',
      'Brunei'=>'Brunei',
      'Bulgaria'=>'Bulgaria',
      'Burkina Faso'=>'Burkina Faso',
      'Burundi'=>'Burundi',
      'Cambodia'=>'Cambodia',
      'Cameroon'=>'Cameroon',
      'Canada'=>'Canada',            
      'Chile'=>'Chile',
      'China'=>'China',
      'Christmas Island'=>'Christmas Island',
      'Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands',
      'Columbia'=>'Columbia',
      'Comoros'=>'Comoros',
      'Congo'=>'Congo',       
      'Denmark'=>'Denmark',
      'Djibouti'=>'Djibouti', 
      'Egypt'=>'Egypt', 
      'Ethiopia'=>'Ethiopia',      
      'Fiji'=>'Fiji',
      'Finland'=>'Finland',
      'France'=>'France',      
      'French Guinea'=>'French Guinea',
      'French Polynesia'=>'French Polynesia',      
      'Germany'=>'Germany',      
      'Greece'=>'Greece',
      'Greenland'=>'Greenland',
      'Grenada'=>'Grenada',
      'Guadeloupe'=>'Guadeloupe',
      'Guam'=>'Guam',
      'Guatemala'=>'Guatemala',
      'Guinea'=>'Guinea',           
      'Hong Kong'=>'Hong Kong',
      'Hungary'=>'Hungary',
      'Iceland'=>'Iceland',
      'India'=>'India',
      'Indonesia'=>'Indonesia',
      'Iran'=>'Iran',
      'Iraq'=>'Iraq',
      'Ireland'=>'Ireland',
      'Israel'=>'Israel',
      'Italy'=>'Italy',      
      'Japan'=>'Japan',
      'Jordan'=>'Jordan',
      'Kazakhstan'=>'Kazakhstan',
      'Kenya'=>'Kenya',     
      'Kuwait'=>'Kuwait',    
      'Luxembourg'=>'Luxembourg',
      'Macau'=>'Macau',
      'Macedonia'=>'Macedonia',
      'Madagascar'=>'Madagascar',      
      'Malaysia'=>'Malaysia',
      'Maldives'=>'Maldives',      
      'Mexico'=>'Mexico',
      'Micronesia'=>'Micronesia',
      'Moldova'=>'Moldova',
      'Monaco'=>'Monaco',
      'Mongolia'=>'Mongolia',      
      'Namibia'=>'Namibia',      
      'Nepal'=>'Nepal',
      'Netherlands'=>'Netherlands',      
      'New Zealand'=>'New Zealand',      
      'Norway'=>'Norway',      
      'Pakistan'=>'Pakistan',      
      'Philippines'=>'Philippines',      
      'Poland'=>'Poland',      
      'Qatar'=>'Qatar',
      'Reunion'=>'Reunion',
      'Romania'=>'Romania',
      'RU'=>'Russia',
      'RW'=>'Rwanda',     
      'Singapore'=>'Singapore',      
      'South Africa'=>'South Africa',      
      'South Korea'=>'South Korea',
      'Spain'=>'Spain',
      'Sri Lanka'=>'Sri Lanka',
      'Sudan'=>'Sudan',      
      'Sweden'=>'Sweden',
      'Switzerland'=>'Switzerland',
      'Syria'=>'Syria',      
      'Tajikistan'=>'Tajikistan',
      'Tanzania'=>'Tanzania',
      'Thailand'=>'Thailand',
      'Togo'=>'Togo',
      'Tokelau'=>'Tokelau',
      'Tonga'=>'Tonga',      
      'Turkey'=>'Turkey',      
      'Uganda'=>'Uganda',      
      'United Kingdom'=>'United Kingdom',
      'United States'=>'United States',      
      'Uruguay'=>'Uruguay',            
      'Vatican City (Holy See)'=>'Vatican City (Holy See)',      
      'Virgin Islands (British)'=>'Virgin Islands (British)',
      'Virgin Islands (US)'=>'Virgin Islands (US)',      
      'Yugoslavia'=>'Yugoslavia',
      'Zambia'=>'Zambia',
      'Zimbabwe'=>'Zimbabwe');

 return $countryArray;
// end here for the country array
}

/*function _make_url_clickable_cb($text) {
  $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1">\\1</a>', $text);
    $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2">\\2</a>', $text);
     $text = eregi_replace('([()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2">\\2</a>', $text);
    $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1">\\1</a>', $text);
    return $text;
}*/


function _make_url_clickable_cb($matches) {
  $ret = '';
  $url = $matches[2];
 
  if ( empty($url) )
    return $matches[0];
  // removed trailing [.,;:] from URL
  if ( in_array(substr($url, -1), array('.', ',', ';', ':')) === true ) {
    $ret = substr($url, -1);
    $url = substr($url, 0, strlen($url)-1);
  }
  return $matches[1] . "<a href=\"$url\" rel=\"nofollow\">$url</a>" . $ret;
}
 
function _make_web_ftp_clickable_cb($matches) {
  $ret = '';
  $dest = $matches[2];
  $dest = 'http://' . $dest;
 
  if ( empty($dest) )
    return $matches[0];
  // removed trailing [,;:] from URL
  if ( in_array(substr($dest, -1), array('.', ',', ';', ':')) === true ) {
    $ret = substr($dest, -1);
    $dest = substr($dest, 0, strlen($dest)-1);
  }
  return $matches[1] . "<a href=\"$dest\" rel=\"nofollow\">$dest</a>" . $ret;
}
 
function _make_email_clickable_cb($matches) {
  $email = $matches[2] . '@' . $matches[3];
  return $matches[1] . "<a href=\"mailto:$email\">$email</a>";
}
 
function make_clickable($ret) {
  $ret = ' ' . $ret;
  // in testing, using arrays here was found to be faster
  $ret = preg_replace_callback('#([\s>])([\w]+?://[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_url_clickable_cb', $ret);
  $ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_web_ftp_clickable_cb', $ret);
  $ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', '_make_email_clickable_cb', $ret);

   $ret = preg_replace(
            '/\s(([a-zA-Z0-9\-\.]+\.)(com|org|net|mil|edu|in|biz|info))/i',
            ' <a href="http://www.${1}">${1}</a>',
             $ret);
   /*$ret = preg_replace(
            '/\s(([a-zA-Z0-9\-\.]+\.)([0-9a-z]))/i',
            ' <a href="${1}" target="_blank">${1}</a>',
             $ret);*/
   
 
  // this one is not in an array because we need it to run last, for cleanup of accidental links within links
  $ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
  $ret = trim($ret);
  return  $ret; 
}
 
 function pr($arr,$end=0){
echo "<pre>";
print_r($arr);
echo "</pre><hr>";
if($end)
  exit;
}

 ?>
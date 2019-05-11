<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{

  function __construct($rules = array())
  {
    parent::__construct($rules);
  }

  function alpha_international($str)
  {
    $str = (strtolower($this->CI->config->item('charset')) != 'utf-8') ? utf8_encode($str) : $str;

    return (!preg_match("/^[[:alpha:]- ÀÁÂÃÄÅĀĄĂÆÇĆČĈĊĎĐÈÉÊËĒĘĚĔĖĜĞĠĢĤĦÌÍÎÏĪĨĬĮİĲĴĶŁĽĹĻĿÑŃŇŅŊÒÓÔÕÖØŌŐŎŒŔŘŖŚŠŞŜȘŤŢŦȚÙÚÛÜŪŮŰŬŨŲŴÝŶŸŹŽŻàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿœšß_.]+$/", $str)) ? FALSE : TRUE;
  }
}

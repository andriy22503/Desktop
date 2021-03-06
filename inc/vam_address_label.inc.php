<?php
/* -----------------------------------------------------------------------------------------
   $Id: vam_address_label.inc.php 899 2007-02-07 10:51:57 VaM $

   VaM Shop - open source ecommerce solution
   http://vamshop.ru
   http://vamshop.com

   Copyright (c) 2007 VaM Shop
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(general.php,v 1.225 2003/05/29); www.oscommerce.com 
   (c) 2003	 nextcommerce (vam_address_label.inc.php,v 1.5 2003/08/13); www.nextcommerce.org
   (c) 2004 xt:Commerce (vam_address_label.inc.php,v 1.5 2003/08/25); xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   // include needed functions
   require_once(DIR_FS_INC . 'vam_get_address_format_id.inc.php');
   require_once(DIR_FS_INC . 'vam_address_format.inc.php');
  function vam_address_label($customers_id, $address_id = 1, $html = false, $boln = '', $eoln = "\n") {
    $address_query = vam_db_query("select entry_firstname as firstname, entry_secondname as secondname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $customers_id . "' and address_book_id = '" . $address_id . "'");
    $address = vam_db_fetch_array($address_query);

    $format_id = vam_get_address_format_id($address['country_id']);

    return vam_address_format($format_id, $address, $html, $boln, $eoln);
  }
 ?>

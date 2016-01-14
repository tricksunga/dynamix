<?PHP
/* Copyright 2015, Bergware International.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * Plugin development contribution by gfjardim
 */
?>
<?
$new = isset($default) ? array_replace_recursive($_POST, $default) : $_POST;
foreach ($new as $key => $value) {
  if (!strlen($value)) continue;
  switch ($key) {
  case '#prefix':
    parse_str($value, $prefix);
    $options = '';
    break;
  case 'service':
    $enable = $value;
    break;
  default:
    if ($key[0]!='#') $options .= (isset($prefix[$key]) ? "-{$prefix[$key]} " : "")."$value ";
    break;
  }
}
$autofan = "/usr/local/emhttp/plugins/dynamix.system.autofan/scripts/rc.autofan";
exec("$autofan stop >/dev/null");
$keys['options'] = trim($options);
if ($enable) {$_POST['#command'] = $autofan; $_POST['#arg'][1] = 'start';}
?>

<?PHP
/* Copyright 2015, Bergware International.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 */
?>
<?
$mdResync = exec("grep -Po '^mdResync=\K\d+' /proc/mdcmd");
$mover = file_exists("/var/run/mover.pid");
echo ($mdResync || $mover);
?>

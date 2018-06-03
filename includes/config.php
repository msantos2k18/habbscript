<?php 
// Configuração SQL's Plus
$items_plus = "INSERT INTO `catalog_items` VALUES ( '[id]', 'page_id', '[furnid]', '[pubname]', '3', '0', '0', '1', '0', '0', '0', '', '', '', '-1', '0');"; 
$furni_plus = "INSERT INTO `furniture` VALUES ([furnid], '[pubname]', '[pubname]', '[type]', 1, 1, '1', '1', '0', '0', [id], '1', '1', '1', '1', '1', 'default', '1', '0', '0', '0', '0', '0', 0, '0','0');";

// Configuração SQL's Kash/Butterfly

$items_kash = "INSERT INTO `catalog_items` VALUES ([id], 'page_id', '[furnid]', '[pubname]', '1', '5', '0', '0', '1', '', '', '', '', '1', '0');";
$furni_kash = "INSERT INTO `items_base` VALUES ([furnid], '[furnid]', '[pubname]', '[type]', 1, 1, '1', '0', '0', '0', '1', '1', '0', '1', '1', 'default', '2', '1', '0', '0');";


$xml_model_room = 
'<furnitype id="[id]" classname="[pubname]">
<revision>56320</revision>
<defaultdir>0</defaultdir>
<xdim>1</xdim>
<ydim>1</ydim>
<partcolors>...</partcolors>
<name>[pubname] name</name>
<description>[pubname] desc</description>
<adurl/>
<offerid>10987</offerid>
<buyout>1</buyout>
<rentofferid>-1</rentofferid>
<rentbuyout>0</rentbuyout>
<bc>0</bc>
<customparams/>
<specialtype>1</specialtype>
<canstandon>0</canstandon>
<cansiton>0</cansiton>
<canlayon>0</canlayon>
<furniline>hscript.com</furniline>
</furnitype>';

$xml_model_wall = 
'<furnitype id="[id]" classname="[pubname]">
<revision>56320</revision>
<name>[pubname]</name>
<description>[pubname] desc</description>
<adurl/>
<offerid>-1</offerid>
<buyout>0</buyout>
<rentofferid>-1</rentofferid>
<rentbuyout>0</rentbuyout>
<bc>0</bc>
<excludeddynamic>0</excludeddynamic>
<specialtype>1</specialtype>
<furniline>habbo_club_gifts</furniline>
</furnitype>';
?>
<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");

$route["sample1/sample11/sample111"] = "pages/index";
$route["sample1/sample11/sample112"] = "pages/index";
$route["sample1/sample11/sample113"] = "pages/index";
$route["sample1/sample11"] = "pages/index";
$route["sample1/sample12"] = "pages/index";
$route["sample1"] = "pages/index";
$route[""] = "pages/index";
$route["error"] = "pages/error";
$route["faqs"] = "faqs/index";
$route["faqs/(.*)"] = "faqs/$1";

$route["gallery"] = "gallery/index";
$route["gallery/(.*)"] = "gallery/$1";

$route["rssfeed"] = "rssfeed/index";
$route["rssfeed/(.*)"] = "rssfeed/$1";

$route["news"] = "news/index";
$route["news/(.*)"] = "news/$1";

$route["contactus"] = "contactus/index";
$route["contactus/(.*)"] = "contactus/$1";

$route["blog"] = "blog/index";
$route["blog/(.*)"] = "blog/$1";

$route["testimonial"] = "testimonial/index";
$route["testimonial/(.*)"] = "testimonial/$1";

$route["about"] = "pages/index";
$route["promo"] = "promo/index";
$route["promo/(.*)"] = "promo/$1";

$route["search"] = "search/index";
$route["search/(.*)"] = "search/$1";

$route["newsletter"] = "newsletter/index";
$route["newsletter/(.*)"] = "newsletter/$1";

$route["events"] = "events/index";
$route["events/(.*)"] = "events/$1";

$route["aaaaatitle"] = "pages/index";


?>
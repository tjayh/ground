<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");

$route["administrator/dashboard"] = "admindashboard";
$route["administrator/dashboard/(.*)"] = "admindashboard/$1";

$route["administrator/settings"] = "settings";
$route["administrator/settings/(.*)"] = "settings/$1";

$route["administrator/pages"] = "cms";
$route["administrator/pages/(.*)"] = "cms/$1";

$route["administrator/newsletter"] = "newslettermanager";
$route["administrator/newsletter/(.*)"] = "newslettermanager/$1";

$route["administrator/contactusmanager"] = "contactusmanager";
$route["administrator/contactusmanager/(.*)"] = "contactusmanager/$1";

$route["administrator/breadcrumbs"] = "breadcrumbs";
$route["administrator/breadcrumbs/(.*)"] = "breadcrumbs/$1";

$route["administrator/faq"] = "faqmanager";
$route["administrator/faq/(.*)"] = "faqmanager/$1";

$route["administrator/seo"] = "seomanager";
$route["administrator/seo/(.*)"] = "seomanager/$1";

$route["administrator/news_manager"] = "news_manager";
$route["administrator/news_manager/(.*)"] = "news_manager/$1";

$route["administrator/gallery_manager"] = "gallery_manager";
$route["administrator/gallery_manager/(.*)"] = "gallery_manager/$1";

$route["administrator/bannermanager"] = "bannermanager";
$route["administrator/bannermanager/(.*)"] = "bannermanager/$1";

$route["administrator/blog_manager"] = "blog_manager";
$route["administrator/blog_manager/(.*)"] = "blog_manager/$1";

$route["administrator/testimonial_manager"] = "testimonial_manager";
$route["administrator/testimonial_manager/(.*)"] = "testimonial_manager/$1";

$route["administrator/manage_navigation"] = "manage_navigation";
$route["administrator/manage_navigation/(.*)"] = "manage_navigation/$1";

$route["administrator/promo_manager"] = "promo_manager";
$route["administrator/promo_manager/(.*)"] = "promo_manager/$1";

$route["administrator/events_manager"] = "events_manager";
$route["administrator/events_manager/(.*)"] = "events_manager/$1";



?>
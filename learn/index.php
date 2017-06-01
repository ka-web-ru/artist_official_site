<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обучение");
?><?$APPLICATION->IncludeComponent(
	"bitrix:learning.course",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_PERMISSIONS" => "Y",
		"COURSE_ID" => "1",
		"PAGE_NUMBER_VARIABLE" => "PAGE",
		"PAGE_WINDOW" => "10",
		"PATH_TO_USER_PROFILE" => "/company/personal/user/#USER_ID#/",
		"SEF_FOLDER" => "/learn/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("chapter_detail"=>"course#COURSE_ID#/chapter#CHAPTER_ID#/","course_contents"=>"course#COURSE_ID#/contents/","course_detail"=>"course#COURSE_ID#/index","gradebook"=>"course#COURSE_ID#/gradebook/","lesson_detail"=>"course#COURSE_ID#/lesson#LESSON_ID#/","test"=>"course#COURSE_ID#/test#TEST_ID#/","test_list"=>"course#COURSE_ID#/examination/","test_self"=>"course#COURSE_ID#/selftest#SELF_TEST_ID#/"),
		"SET_TITLE" => "Y",
		"SHOW_TIME_LIMIT" => "Y",
		"TESTS_PER_PAGE" => "20"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
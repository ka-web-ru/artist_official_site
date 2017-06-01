<?
$formid ='';
$name = '';
$phone = '';
$email = '';
$time = '';
if(isset($_POST['formid']))
	$formid = trim($_POST['formid']);
if(isset($_POST['name']))
	$name = trim($_POST['name']);
if(isset($_POST['phone']))
	$phone = trim($_POST['phone']);
if(isset($_POST['email']))
	$email = trim($_POST['email']);
if(isset($_POST['time']))
	$time = trim($_POST['time']);

//настройки общие для всех форм обратной связи
//$to = 'chronopol@gmail.com'; //Почта получателя, через запятую можно указать сколько угодно адресов
$to = 'kalinin-av2016@yandex.ru';
$from = 'info@web-arteast.ru';
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
$headers .= "From: Сайт РА 'Артист' <" . $from . ">\r\n"; //Наименование и почта отправителя

//форма обратной связи в шапке
if($formid =='general'){
	if($name != "" && ($phone !="" || $email != ''))
	{
		$subject = 'Обратный звонок'; //Заголовок сообщения
		$message = '
		<html>
				<head>
						<title>'.$subject.'</title>
				</head>
				<body>
						<p>Имя: ' . $name . '</p>
						<p>Телефон: ' . $phone . '</p>
						<p>Электронная почта: ' . $email . '</p>
						<p>Время, удобное для звонка: ' . $time . '</p>
				</body>
		</html>'; //Текст нащего сообщения можно использовать HTML теги
		if(mail($to, $subject, $message, $headers))
			return;
		else
			echo '<div class="reqE">Ошибка отправки запроса</div>';
	}
	else
	{
		if($phone == '' && $email == '')
			echo '<div class="reqW">Введите почту или телефон</div>';
		else
			echo '<div class="reqW">Введите имя</div>';
	}
}

//форма обратной связи на странице широкоформатной печати и на странице студии 
if($formid =='wideprint' || $formid == 'studiya'){
    if($phone !="")
    {
        $subject = 'Обратный звонок'; //Заголовок сообщения
        $message = '
		<html>
				<head>
						<title>'.$subject.'</title>
				</head>
				<body>
						<p>Имя: ' . $name . '</p>
						<p>Телефон: ' . $phone . '</p>
				</body>
		</html>'; //Текст нащего сообщения можно использовать HTML теги
        if(mail($to, $subject, $message, $headers))
            return;
        else
            echo '<div class="wideprint-mail-error">Ошибка отправки заявки</div>';
    }
    else
    {
        if($phone == '') echo 'Укажите телефон!';
    }
}
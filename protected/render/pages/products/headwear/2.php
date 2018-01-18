<?
$sendmail_98 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '98', PDO::PARAM_STR]
    ]
);

$sendmail_103 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '103', PDO::PARAM_STR]
    ]
);

if ($sendmail_103) {
    $action_end = strtotime('+60 hours', $sendmail_103);
}
if ($sendmail_98) {
    $action_end = strtotime('+82 hours', $sendmail_98);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
     "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title>Имидж-Практика Головные уборы под контролем стилиста!</title>
   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/css/style.css"/>
   
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
	
	<script type='text/javascript' src='<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/js/jquery.scrollTo-min.js'></script>
	
	
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/js/main.js"></script>
	
	
   <link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/flashtimer/compiled/flipclock.css">
   <script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/flashtimer/compiled/flipclock.js"></script>

	  
</head>
    
  
<body>

<div class="container">
	<div class="menu">
		<div class="ins">
<center>			<ul>
<!--				<li><a class="a1" href="#point1">Раздел 1</a></li>-->
				<li><a class="a2" href="#point2">Что вы получите</a></li>
				<li><a class="a1" href="#point1">Кто ведет</a></li>
				<li><a class="a4" href="#point4">Как все будет</a></li>
				<li><a class="a3" href="#point3">Программа</a></li>
<!--				<li><a class="a6" href="#point6">Бонусы</a></li>-->
				<li class="last"><a class="a5" href="#point5">Записаться</a></li>
			</ul></center>
		</div>
	</div>
	
	<div class="header">
		<div class="bg">
			<div class="ins">
				<div class="txt1">Имидж-Практика</div>
				<div class="txt2">Головные уборы под <br>контролем стилиста!</div>
				<div class="txt3">Будьте уверены &mdash; ваши головные <br>уборы вам идут!</div>
				<div class="txt4">«Шляпа &mdash; это нимб счастья»<br><span>Анна Пьяджи, редактор итальянского Vogue</span><div class="ico"></div></div>
			</div>
		</div>
	</div>

	<div class="block1"  id="point2">
		<div class="ins">
		<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">В ближайший месяц:</div>
				<ul>
					<li class="li1">Мы развеем миф о том, что вам ничего из головных уборов не идет</li>
					<li class="li2">Вы на практике подберете для себя стилеобразующие головные уборы на любую погоду и случай</li>
					<li class="li3">Вы начнёте гордиться вашими головными уборами и получать комплименты</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="block2">
		<div class="inn">
			<div class="ins">
				<div class="bg"></div>
				<div class="txt">
					<div class="bl_name">Хватит стесняться своей шапки и заранее снимать, чтобы её не заметили</div>
					<p>Типичная для России картинка.</p><br>
					<p>Зима. Или конец осени.</p>
					<p>Женщины пользуются коротким световым днем и скудным освещением на улице, чтобы незаметно носить свою зимнюю шапку.</p>
					<p>А при входе в магазин или офисное здание торопливо её снимают и засовывают в сумку, озираясь по сторонам не видели ли коллеги или кто-то из знакомых.</p><br>
					<p>А еще считают, что им &laquo;вообще не идут никакие шапки&raquo;.</p>
					<p>В результате большинство женщин относятся к шапке как к неизбежному злу.</p>
					<p>Подавляющее большинство осенью не носят на голове вообще ничего. </p>
					<p>Они мерзнут, но не носят. </p>
					<p>Так как им непонятно какой головной убор можно носить с пальто. И как его подобрать. </p>
					<p>И поэтому они осенью до последнего, пока не станет -10 ходят без шапки.</p>
					<p>Некоторые быстро без шапки бегут от дома до машины, а потом со стоянки до офиса.</p>
					<p>Очень мало женщин воспринимают шляпу как аксессуар. А уж о составлении каких-нибудь стильных и интересных комплектов &mdash; не может быть и речи. </p>
					<p>Головные уборы не рассматриваются как стилеообразующая вещь гардероба.</p>
					<p>И нет даже мысли носить головные уборы в других ситуациях, кроме пляжа и мороза.</p><br>
					<p>К сожалению, в России, культура носить головные уборы потеряна...</p>
				</div>
			</div>
		</div>
	</div>

	<div class="block3">
			<div class="ins">
				<div class="bg"></div>
				<div class="txt">
					<div class="bl_name">Как мы возьмем под контроль ваши шапки и что из этого получится</div>
					<p>В ходе имидж-практики <span>&laquo;Головные уборы под контролем стилиста&raquo;</span>, мы вплотную займемся всем, что вы носите на голове.</p><br>
					<p>Чтобы это было стильно, красиво и безумно радовало вас.</p>
					<div class="results">
						<div class="name">В результате уже через месяц:</div>
						<div class="border">
							<div class="item">Вы сможете подобрать себе несколько вариантов шапок на осень-зиму<div class="border4"></div></div>
							<div class="item">Научитесь ориентироваться в летних головных уборах и подбирать их для себя и составлять стильные комплекты с ними<div class="border4"></div></div>
							<div class="item">В вашем гардеробе появятся головные уборы, которые будут носить декоративную функцию &mdash; украшать вас<div class="border4"></div></div>
							<div class="item">У вас наконец появятся комплекты, в которых головной убор станет стилеобразующим элементом<div class="border4"></div></div>
							<div class="item">Вы научитесь составлять стильные и интересные образы с головными уборами в каждом времени года<div class="border4"></div></div>
							<div class="border1"></div>
							<div class="border2"></div>
							<div class="border3"></div>
						</div>
					</div>
				</div>
			</div>
	</div>

	<div class="block4">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Последствия, о которых мы не имеем права умалчивать!</div>
				<p><span>Будьте готовы, к вам будет много внимания.</span></p><br>
				<p>Обладательницы стильных и эффектных головных уборов, которые им идут, неизбежно привлекают внимание.</p><br>
				<p>Как это не удивительно, при нашем климате, это большая редкость.</p>
				<div class="item">На последнем шоппинге в Милане я купила себе вот такую шапку с вуалью. <div class="corn"></div></div>
				<p>Казалось бы, ничего особенного &mdash; шапка спортивного кроя из джерси, просто с вуалью. </p><br>
				<p></p><br>
				<p>Но стоило мне надеть её в Москве, как я начала ловить интересующиеся и изучающие взгляды. </p><br>
				<p>В ЦУМе даже один молодой человек подошел и спросил на английском языке: &laquo;Вы модный журналист? Вы случайно не из Парижа?&raquo;. </p><br>
				<p>Дело в том, что проходила неделя моды и он подумал, что я приехала из Парижа, чтобы освещать модные коллекции.</p>
			</div>
		</div>
	</div>

	<div class="block5">
		<div class="ins">
			<div class="txt">
				<div class="bl_name">Ваши выгоды по окончанию имидж-практики</div>
				<ul>
					<li>Знаете какие головные уборы вам идут причем на каждый сезон года</li>
					<li>Понимаете с чем их носить</li>
					<li>Умеете составлять стильные и интересные комплекты с головными уборами</li>
					<li>Навсегда решите проблему выбора головных уборов</li>
					<li>Сможете подобрать себе шляпу на пляж, в отпуск</li>
					<li>Сможете составлять стильные и интересные комплекты с головными уборами на осень и весну</li>
					<li>Ваши зимние шапки перестанут наконец быть просто теплыми. Вы научитесь выбирать стильные и интересные зимние головные уборы и легко их вписывать в гардероб </li>
				</ul>
			</div>
			<div class="break"></div>
		</div>
	</div>

	<div class="block6" id="point3">
		<div class="ins">
			<div class="txt">
				<div class="bl_name">План Имидж-Практики</div>
				<div class="item i1">
					<div class="date"><span>неделя</span></div>
					<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/pic1.jpg" alt=""/></div>
					<div class="descr">
						<div class="inn"><span>Берем под контроль ваши шапки.</span>Разбираем формы, материалы, правила подбора, с чем носить. Разбираем шапки в вашем гардеробе, подходят они вам или нет, на что заменить!</div>
					</div>
					<div class="break"></div>
				</div>
				<div class="item i2">
					<div class="date"><span>неделя</span></div>
					<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/pic2.jpg" alt=""/></div>
					<div class="descr">
						<div class="inn"><span>Берем под контроль меховые головные уборы. </span>Разбираем формы, материалы, правила подбора, с чем носить. Разбираем их в вашем гардеробе, подходят они вам или нет, на что заменить!</div>
					</div>
					<div class="break"></div>
				</div>
				<div class="item i3">
					<div class="date"><span>неделя</span></div>
					<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/pic3.jpg" alt=""/></div>
					<div class="descr">
						<div class="inn"><span>Берем под контроль шляпы и другие головные уборы на осень и весну. </span>Разбираем формы, материалы, правила подбора, с чем носить. Разбираем их в вашем гардеробе, подходят они вам или нет, на что заменить!</div>
					</div>
					<div class="break"></div>
				</div>
				<div class="item i4">
					<div class="date"><span>неделя</span></div>
					<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/pic4.jpg" alt=""/></div>
					<div class="descr">
						<div class="inn"><span>Берем под контроль головные уборы на лето.</span>Разбираем формы, материалы, правила подбора, с чем носить. Разбираем их в вашем гардеробе, подходят они вам или нет, на что заменить!</div>
					</div>
					<div class="break"></div>
				</div>
				<div class="bonus"><span class="sp1">БОНУС</span><span class="sp2"><span>5 неделя</span> &mdash; стильные образы с головными уборами. Как составлять</span></div>
			</div>
		</div>
	</div>

	<div class="block7"  id="point1">
		<div class="inn">
			<div class="ins">
				<div class="txt">
					<div class="bl_name">А кто ведет имидж-практику?</div>
					<p>Автор имидж-практики &mdash; <span class="sp1">Екатерина Малярова</span> &mdash; известный московский имиджмейкер, автор сайта <span class="sp2">Гламурненько.RU</span></p><br><br>
					<p>Всего за несколько лет работы Екатерина стала одним из самых востребованных имиджмейкеров Москвы. Запись к ней на шоппинг-сопровождение открывается за полгода. Часто в день проводит по несколько шоппингов.</p><br><br>
					<p>Каждый сезон ездит с группой клиентов на шоппинг в Милан.</p><br><br>
					<p>Одевала клиентов на красную ковровую дорожку, на экономический форум в Санкт-Петербурге, на встречу с президентом…</p><br><br>
					<p>Автор нескольких тренингов по персональному имиджу, автор Школы Имиджмейкеров, а также ведущая нескольких десятков семинаров.</p>
				</div>
			</div>
		</div>	
	</div>
<?
if (APP::Module('DB')->Select(
    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['COUNT(id)'], 'users_tags',
    [
        ['user', '=', $data['user_id'], PDO::PARAM_INT],
        ['item', '=', 'evelina', PDO::PARAM_STR]
    ]
)) {
?>
        <div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/bg4.jpg') repeat;    border-bottom: 2px dotted #cacbca;height: 510px;padding: 0px 0 0px 0;">
		<div class="ins">
			<div class="pic" style="margin-bottom: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava4.png" alt=""></center></div>
			<div class="bl2" style="
                            margin: 0 auto;
                            width: 880px;
                            font-size: 24px;
                            line-height: 30px;
                            color: #29302d;
                            border-top: none;
                            padding-top: 0px;
                        ">
                        <center><p style="
                            font-weight: normal;font-size: 19px;
                        ">&laquo;Женщина любого размера и любого возраста может выглядеть великолепно. Главное — правильно подобрать одежду&raquo;</p>
				<p style="
                                    font-weight: bold;
                                    margin-top: 40px;
                                    text-decoration: underline;
                                    color: -webkit-link;
                                ">Эвелина Хромченко</p>
				<p style="
                                    font-size: 18px;
                                ">fashion expert, TV-presenter, journalist</p></center>
			</div>
		</div>
	</div>
<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/bg4.jpg') repeat; height: 540px;padding: 0px 0 0px 0;">
		<div class="ins">
			<div class="pic" style="margin-bottom: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava3.png" alt=""/></center></div>
			<div class="bl2" style="
    margin: 0 auto;
    width: 880px;
    font-size: 24px;
    line-height: 30px;
    color: #29302d;
    border-top: none;
    padding-top: 0px;
">
<center><p style="
    font-weight: normal;font-size: 19px;
">&laquo;Хочу вас познакомить с талантливым стилистом Катей! Очень рекомендую заглянуть к ней на страничку и пройти тест по стилю. Узнаете много нового и полезного! По крайней мере я узнала&raquo;</p>
				<p style="
    font-weight: bold;
    margin-top: 40px;
"><a href="https://www.instagram.com/p/_rDrEkrJTN/" target="_blank">Эвелина Блёданс</a></p>
				<p style="
    font-size: 18px;
">Российская актриса театра и кино, певица, телеведущая</p></center>
			</div>
		</div>
	</div>
<? } ?>	

	<div class="block8">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Прорыв в имидж-обучении, который вы давно заслуживали.</div>
				<p>Моя имидж-практика подразумевает плотную работу стилиста именно с вами.</p><br><br>
				<p>У меня нет целью завалить вас теоретическими материалами и оставить один-на-один разбираться с ними.</p><br><br>
				<p>Моя главная цель &mdash; ваше преображение.</p><br><br>
				<p>Чтобы пройдя имидж-практику у вас был конкретный конечный результат &mdash; головные уборы на все случаи, которые максимально вам идут и украшают вас.</p>
			</div>
		</div>
	</div>

	<div class="block9" id="point4">
		<div class="forbg">
			<div class="ins">
				<div class="bg1"></div>
				<div class="bg2"></div>
				<div class="txt">
					<div class="bl_name">Как будет все проходить?</div>
					<div class="item i1"><div class="inn">Вы получаете доступ в закрытый раздел на сайте, где можете смотреть и скачивать обучающие видео. В удобном для вас темпе вы смотрите видео и применяете шаблоны к своему гардеробу.</div></div>
					<div class="item i2"><div class="inn">Ваши домашние задания вы можете размещать в любое время закрытом разделе. Вы гарантированно получите ответ, даже если вы решите пройти тренинг не сразу (гарантированный период проверки ДЗ &mdash; 2 мес. Потом вы можете докупить проверку).</div></div>
					<div class="item i3"><div class="inn">А потом вы применяете все эти полученные знания к своему гардеробу. Вы можете фотографировать себя во всех головных уборах (даже нужно это делать!), выкладывать фотографии в специальном закрытом разделе и получать комментарии и рекомендации по ним. </div></div>
					<div class="item i4"><div class="inn">У вас будет возможность в процессе имидж-практики подобрать себе все головные уборы, размещать фотографии процесса подбора, свои вопросы. Я или специальный имиджмейкер из моей команды будет это комментировать и вы сможете приобрести лучшие для вас вещи.</div></div>
					<div class="item i5"><div class="inn">В процессе прохождения вы сможете разобраться со всеми мыслимыми головными уборами, которые только у вас есть в гардеробе, понять что вам подходит, а что нужно заменить.</div></div>
					<div class="item i6"><div class="inn">Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам. Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс. </div></div>
				</div>
			</div>
		</div>
	</div>

	<div class="block10">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">&laquo;А как долго я могу выполнять задания и вы их будете проверять?&raquo;</div>
				<p>Практически бесконечно долго :)</p><br><br>
				<p>Вместе с имидж-практикой идет гарантированный период проверки ваших заданий &mdash; 2 месяца.</p>
				<p>Но потом вы сможете продлить этот срок. Или включить эту возможность, когда вам потребуется.</p><br><br>
				<p>В честь первого запуска имидж-практики &laquo;Головные уборы под контролем стилиста&raquo; будут скидки. Но только всего 4 дня.</p>
			</div>
		</div>
	</div>
	
	<div class="block12">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Примите участие в имидж-практике, ничем не рискуя!</div>
				<p>Имидж-практика окупится уже после первой-второй вашей покупки. </p><br><br>
				<p>Эта имидж-практика гарантия того, что вы не потратите неправильно деньги при покупке шапок, шляпок, беретов, платков и других головных уборов. </p><br><br>
				<p>Эта имидж-практика также гарантия того, что вам будут идти купленные головные уборы и  вы будете чувствовать себя в них уверенно и будете нравиться себе &mdash; а это уже бесценно.</p><br><br>
				<p>Но что более важно &mdash; это безусловная гарантия. Мы понимаем, что вам в тренинге важно всё, что мы пообещали. Поэтому мы даем вам возможность пройти первую неделю тренинга полностью без риска!</p><br><br>
				<p>Если в конце этого времени вы не будете удовлетворены, тогда мы просто вернем вам деньги. Без лишних вопросов. Только вы судья!</p><br><br>
				<p>К сожалению, в этом случае, мы вам больше ничего не продадим в будущем, чтобы не тратить ваше и наше время.</p>
			</div>
		</div>
	</div>

	<div class="block13" id="point5">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
<center>			<div class="bl_name"><span>ЗАПИСЫВАЙТЕСЬ ПРЯМО СЕЙЧАС!</span></div></center>

				<center><p style="font-size: 25px;">Успейте записаться со скидкой, пока время на таймере не истечет</p>
                                    <br><div class="clock" style="width: 630px;"></div>
<div class="message" style="margin: 0 auto;"></div>
	
	
<script type="text/javascript">
var date  = new Date(<?= $action_end ?>*1000);
var now   = new Date();
var diff  = date.getTime()/1000 - now.getTime()/1000;

var clock = $('.clock').FlipClock(diff, {
    clockFace: 'DailyCounter',
    countdown: true,
    language: 'ru'
}); 
</script></center>	
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="tr1">
						<td class="td1" style="width: 500px;">Что вы получаете</td>
						<td class="td4"></td>
					</tr>
				<tr>
					<td class="td1"><span>ОСНОВНЫЕ МАТЕРИАЛЫ:</span></td>
					<td></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">&laquo;Головные уборы под контролем стилиста!&raquo;</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">Проверка домашних заданий
                                            <br>имиджмейкером команды Гламурненько.ру</td>
					<td>2 месяца</td>
				</tr>
				<tr>
					<td class="td1"></td>
					<td></td>
				</tr>
					<tr class="tr2">
						<td class="td1"><span>Итого</span></td>
						<td><s>9 900 руб</s> 4 900 руб</td>
					</tr>
					<tr class="tr3">
						<td class="td1" style ="padding-top: 10px;padding-bottom: 10px;"></td>
						<td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53239"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>"></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<div class="block14">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Быстрая помощь службы поддержки</div>
				<p>Участницы имидж-практики могут при необходимости получить помощь от нашей службы поддержки.</p><br><br>
				<p>Сотрудники службы поддержки оперативно ответят на все вопросы и разберутся со случайными ошибками и неувязками. Сделают максимум возможного, чтобы все участницы ощущали себя комфортно и не оставались один на один с нерешенными проблемами.</p><br><br>
				<p>Связаться со службой поддержки можно с любой страницы в правом нижнем углу, либо дополнительно со страницы:</p><br><br>
				<p><a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a></p>
			</div>
		</div>
	</div>
<!--
	<div class="block15" id="point6">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Отзывы</div>
				<div class="item">
					<div class="corn1"></div>
					<div class="corn2"></div>
					<div class="top">
						<div class="left"><img src="./images/ava1.jpg" alt="" /></div>
						<div class="right">
							<div class="name">Анастасия Иванова</div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
						</div>
						<div class="break"></div>
					</div>
					<div class="bottom">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>	
				</div>
				<div class="item">
					<div class="corn1"></div>
					<div class="corn2"></div>
					<div class="top">
						<div class="left"><img src="./images/ava2.jpg" alt="" /></div>
						<div class="right">
							<div class="name">Анастасия Иванова</div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
						</div>
						<div class="break"></div>
					</div>
					<div class="bottom">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>	
				</div>
			</div>
		</div>
	</div>
	-->
	   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/css/style_1.css?t=1409284522"/>

<section class="whiteBg"   id="point1">
    <section class="page" id="faq_block">
        <h1>Часто задаваемые вопросы:</h1>
        
        <h2><span class="questSymbol">?</span> Что такое имидж-практика?</h2>
        <p>Имидж-практика &mdash; это сконцентрированная работа по одному из направлений имиджа. В данном случае по головным уборам. 
<br/>
<br/>В процессе я буду выдавать вам много полезной и практической информации. 
<br/>
<br/>Но самое главное &mdash; ваше преображение. 
<br/>
<br/>В идеале вы будете выкладывать свои фотографии в разных головных уборах, чтобы я могла прокомментировать и подсказать вам &laquo;что&raquo;, &laquo;с чем&raquo; и &laquo;как&raquo; носить. 
<br/>
<br/>Чтобы вы выглядели &laquo;на все 100&raquo;!</p>
        
        <h2><span class="questSymbol">?</span> Какими конкретно головными уборами будем заниматься? Только зимними? </h2>
        <p>Мы разберем головные уборы на круглый год.
<br/>
<br/>Вы сможете подобрать подходящие для вас головные уборы на любой сезон! </p>
        
        <h2><span class="questSymbol">?</span> Могу ли я купить имидж-практику сейчас, а проходить через месяц / полгода / год? </h2>
        <p>Да, вы можете проходить имидж-практику в любое удобное для вас время. 
<br/>
<br/>Вместе с имидж-практикой идет гарантированный период проверки ваших домашних заданий &mdash; от 2 месяцев. Как только вы купили &mdash; этот период начался.
<br/>
<br/>Заморозить его, к сожалению, нельзя. Но вы можете потом продлить этот срок или включить, когда захотите (например, через полгода).
<br/>
<br/>Стоимость продления/включения = 500 рублей/мес
</p>

        <h2><span class="questSymbol">?</span> Будут ли доступны записи?</h2>
        <p>Да. Все записи вы сможете скачать к себе на компьютер и просматривать их в удобное для вас время. </p>
        
        <h2><span class="questSymbol">?</span> Я не успеваю сейчас оплатить!</h2>
        <p>Главное успейте сейчас выписать счет. Т.е. нажмите на кнопку &laquo;оформить заказ&raquo; и дальше выберите способ оплаты. Потом у вас будет еще 3 дня чтобы его оплатить.</p>
        <h2><span class="questSymbol">?</span> Нужно ли мне в процессе имидж-практики покупать головные уборы?</h2>
        <p>Что-то вы сможете оставить из уже имеющихся у вас головных уборов. Стилист посмотрит ваши фотографии и скажет, что вам идет.
<br/>
<br/>А что-то надо будет докупать. Но эти покупки будут очень рациональными и оправданными. Без покупки новых вещей сложно сделать что-то кардинально новое и интересное.
<br/>
<br/>Но в любом случае вы потратите намного меньше денег и будете уверены, что головные уборы вам идут.</p>
    </section>
</section>	
	
	<div class="block15">
		<div class="ins">
			<div class="bl_name">Отзывы на другие тренинги и личную работу</div>
            <div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="https://www.glamurnenko.ru/products/headwear/images/ava17.png" alt="" /></div>
				  <div class="right" style="width: 650px;">
					<div class="name">Алена, Мельбурн, Австралия.</div>
				    При прохождении тренинга испытывала восторг и огромное удовольствие от осознания того, что теперь я разбираюсь в головных уборах и могу их покупать не только для себя, но и своих клиентов. Появилась уверенность в том, что я всегда хорошо выгляжу в своих шапках/шляпках. Я стала получать много комплиментов от незнакомых мне людей и мужу тоже понравились изменения.</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>До тренинга я не умела носить головные уборы и предпочитала их не покупать вообще, чем покупать что-то, в чем я потенциально могу нелепо выглядеть. Исключение составляли летние шляпы с широкими полями — их всегда любила и умела выбирать. Пыталась начать носить береты и шапки, но практически каждый раз выбирала модели, которые мне не подходили по цвету, стилю или форме. В конце концов я опустила руки и в холодное время носила капюшон или шарф на голове.
<br><br>
Тренинг мне помог научиться разбираться в разных головных уборах для всех времен года. Теперь я понимаю как правильно выбирать головные уборы с учетом моей формы лица, роста, цветотипа и образа жизни. Я также научилась составлять внусные, модные комплекты с головными уборами. Я прошла тренинг целиком, выполнила все домашние задания и практиковалась в магазинах, примеряя и фотографирую разные головные уборы. На сегодняшний день купила несколько головных уборов — 3 шапки, кепи, 2 шляпы и составляю с ними свежие комплекты.
<br><br>
Я думаю, что ещё стоит поработать над составлением комплектов с головными уборами без верхней одежды на сезон весна-лето.
<br><br>
Хочу ещё раз поблагодарить Екатерину за очередной потрясающий тренинг, который помог преодолеть страх головных уборов и наконец-то начать получать удовольствие от их ношения.
<br><br>
Спасибо!
</p><br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-2.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-2.jpg" width="150" height="230" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-3.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-3.jpg" width="150" height="230" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-4.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-4.jpg" width="150" height="230" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-5.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/golovnye-ubory-aleny-5.jpg" width="150" height="230" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td>
</tr>
</tbody>
</table>
</center></div>
			</div>
            <div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="https://www.glamurnenko.ru/products/headwear/images/ava18.png" alt="" /></div>
				  <div class="right" style="width: 650px;">
					<div class="name">Юлия, Новосибирск.</div>
				    Как и у многих была проблема с выбором фасона головных уборов.</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Если вязанные шапки интуитивно выбирались в осенне-зимней сезон, то шляпы, береты и летние головные уборы для меня не существовали вообще. С помощью тренинга взглянула на них с другой стороны. На данный момент приобретены две шляпы. С началом осеннего сезона хочу еще разнообразить свои образы с помощью головных уборов, таких как береты, кепки и шапки.
</p><br/>
</div>
			</div>
            <div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="https://www.glamurnenko.ru/products/headwear/images/ava19.png" alt="" /></div>
				  <div class="right" style="width: 650px;">
					<div class="name">Ольга Соболева, Москва.</div>
				    После тренинга я узнала о разнообразии головных уборов и правилах сочетания головных уборов с одеждой. Много позитивных эмоций. Прохождение Имидж-практики было самым плодотворным и приятным «временем для себя». Поменяв шапку и шарф, я помолодела лет на 10 и стала выглядеть более стильной. Самая яркая была реакция моих детей и мужа, самых главных судей, им очень нравится. И я почувствовала, что и поведение по отношению ко мне окружающих людей изменилось, со мной больше стали общаться интересные люди.</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>У меня были очень скудные представления о головных уборах и поэтому я не могла подобрать себе шапку. Я думала, что шапки мне не идут. Образы получались очень скучными, не всегда соответствующими моему цветотипу и иногда возрастными.
<br><br>
После тренинга я узнала о разнообразии головных уборов и правилах сочетания головных уборов с одеждой. Теперь я четко понимаю, что к какой одежде мне надо подбирать. Провела разбор гардероба и избавилась от лишнего балласта. Провела «шоппинг-разведку» и купила себе и мужу шапки к нескольким комплектам.
<br><br>
Много позитивных эмоций. Я сейчас занимаюсь своими детьми и прохождение Имидж-практики было самым плодотворным и приятным «временем для себя».
Просто удивительно, как аксессуары меняют образ! Поменяв шапку и шарф, я помолодела лет на 10 и стала выглядеть более стильной. Самая яркая была реакция моих детей и мужа, самых главных судей, им очень нравится. И я почувствовала, что и поведение по отношению ко мне окружающих людей изменилось, со мной больше стали общаться интересные люди.
<br><br>
Еще надо проработать шляпы. Уже есть понимание какой формы и из какого материала. Из-за того, что сейчас идет осенне-зимний сезон, остались не проработанными летние головные уборы. Надо дождаться соответствующего сезона.
</p><br/>
</div>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava_none.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Екатерина</div>
						Я перестала бояться магазинов. Уже подобрала ремень под синее платье и кое-что еще из бижутерии. Сходила с мужем в ресторан. Он был горд от того, что рядом с ним женщина, на которую окружающие бросают внимательные и изучающие взгляды… Муж признался, что теперь я выгляжу так, как он любит…
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Катя, доброе утро. Буду только рада, если ты используешь мой отзыв на своем сайте. Если сочтешь необходимым, можешь его отредактировать. Писала абсолютно искренне…<br><br>

Я перестала бояться магазинов. Уже подобрала ремень под синее платье и кое-что еще из бижутерии. Сходила с мужем в ресторан. Он был горд от того, что рядом с ним женщина, на которую окружающие бросают внимательные и изучающие взгляды… Муж признался, что теперь я выгляжу так, как он любит… Безусловно, приятно, что наши вкусы и предпочтения в этом вопросе совпадают, но для меня все-таки главное, что Я ВЫГЛЯЖУ ТАК, КАК НРАВИТСЯ МНЕ и мне от этого ХОРОШО!!! Катя, не перестаю повторять — СПАСИБО!!! Ведь благодаря тебе я теперь каждое утро завидую сама себе, что я такая у себя красивая!!! СПАСИБО!!!!!!!!!!!!<br><br>

Катя — не только профессионал своего дела, но и приятный человек. На первой встрече мы обсудили много вопросов о том как я хочу выглядеть. Поразила серьёзность отношения, заполнение анкеты было интересно. После я брала у Кати 3 консультации по цвету, форме и стилю. Это очень полезно для того чтобы понимать что тебе, именно тебе подходит и не теряться в магазине. Катя обстоятельно рассказала и показала какие цвета и сочетания цветов мне подходит, снабдила меня фотографиями всех возможных пропорций и длин, которые будут подходить моей фигуре, а также навела порядок в моих представлениях о стилях. Какие туфли и сумки к какому стилю одежды больше подходят.<br><br>

Ещё мы с Катей уже совершили 2 шопинга: зимний и летний. Я очень довольна. Осталось докупить только пару вещей.<br><br>

Недавно я даже смогла помочь своей сестре подобрать летнюю одежду. И хотя мы может и потратили болше времени, чем обычно мы тратили с Катей, всё равно получилось неплохо.<br><br>

Да ещё мне очень нравится, что Катя не теряет время зря, заранее подбирает магазины и даже модели, которым могут подойти, укладывается в бюджет при этом все вещи и аксессуары сочетаются друг с другом.<br><br>

Вобщем, Катя молодец! Жду следущий шопинг. На этот раз надо купить полушубок и пальто, но это ближе к осени.</p></div>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava_none.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Оля</div>
						Комплименты говорят иногда. Но по большей части пялятся девушки … молча и оценивающе)))) Только одна прокомментировала: &laquo;Что-то ты в поледнее время все лучше и лучше выглядишь .. что денег больше на шмотки тратишь что ли?&raquo;…
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>				Катя, привет!<br><br>

Спасибо за все))) До вечера не могла угомониться — составляла различные комбинации…. Соседка с окрытым ртом заворожено за мной наблюдала)))<br><br>

Повторить макияж не удалось. Три попытки — все стерла. Ужас! Надо тренироваться на выходных. Блеск хороший — стойкий, не растекается. Одела серую юбку, розовый топ Шмекс и черный кардиган + серо-черные бусики. Шик! Залипаю у зеркала ))) Сегодня на работе все на меня пялятся… Комплименты говорят иногда. Но по большей части пялятся девушки … молча и оценивающе)))) Только одна прокомментировала: &laquo;Что-то ты в поледнее время все лучше и лучше выглядишь .. что денег больше на шмотки тратишь что ли?&raquo;… Мамочкииии…. Это и есть женская завить, о кторой мы говорили?<br><br>

Подругам фотку отправила. Пищат))) Просят твои координаты. Я адрес сайта им написала.<br><br>

Общее состояние — чувствую себя более уверенно, хочется улыбаться)))<br><br>

<<<<<<<<<<<<<<<====================>>>>>>>>>>>>>>><br><br>

Привет, Катя!<br><br>

Продолжим-с…<br><br>

Накрасилась своими тенями &laquo;по старинке&raquo;, но кистями пользовалась новыми))) Получается! Кстати, карандаша для бровей у меня нет — девочка, видать, не поняла, что он тоже нужен. Докуплю сегодня… Тон не помню, к сожалению.
<br><br>
Сегодня решилась на платье…(Marella)))) Эффект потрясающий!!! (см. фотки)По секрету — работать не могу…сегодня людно в моем уголке)))) Мальчики заходят один за другим, крутятся вокруг, что-то говорят, спрашивают, отвлекают… СМОТРЯТ!!! О_о Катя, платье творит чудеса! (скрестила пальцы) Девочки восхощаются вслух и (как вчера) про себя — вижу по взглядам. Улыбаюсь))) Мне нравится! Хочу, чтоб скорее тепло пришло, чтобы можно было ТАК по улицам ходить)))) муууррррррррк)))<br><br>

Хочу сумочку купить…у меня ведь нет ЖЕНСТВЕННОЙ… После нашего &laquo;великого похода&raquo; я заходила в Furla, где увидела милую небольшую сумочку темно-синего цвета (от входа справа)…покупать не стала — поскупилась. А желание не проходит, чувствую — хочу ее! У них скидки сейчас — она стоит 8000 р. — около того (как раз у меня столько и осталось &laquo;неосвоенных бюджетных средств&raquo;, так сказать…) Катя, как думаешь, я правильно определила эту сумочку в женственный стиль? Мне кажется, она вписывается в мои образы…<br><br>

Спасибо!<br><br>

<<<<<<<<<<<<<<<====================>>>>>>>>>>>>>>><br><br>

Привет, катя!<br><br>

Да, Катя, твоя заслуга, это правда…я тебе поверила (я редко и мало верю и доверяю людям…слишком редко и слишком мало…), и ты меня не обманула!!! СПАСИБО. Так и получается, как ты говорила — внимание со всех сторон…надо учиться принимать и соответствовать. Чувствую, что не тяну! Буду учиться!<br><br>

Как я покупала сумку — отдельная песня))…выбирала из трех. Выбрала закругленненькую))) Решила отметить это дело ужином в Гудмане…пока друзей ждала. Поужинав, оплатила счет, пошла одеваться, мне из-за соседнего стола какой-то мэн что-то сказал типа комплимента — не расслышала, но посыл в мою сторону почувсвовала — улыбнулась))) Оделась, вышла из ресторана, поворачиваю голову — он за мной бежит! Оказалось иностранец — по-русски еле чирикает! Внизу меня ждет подруга, которая пришла с парнем, котрого хочет познакомить со мной!!!! А у меня тут балласт на хвосте…! Я остановилась и сказала, что тороплюсь (думая про себя: &laquo;ну давай уже проси у меня номер телефона!&raquo;) Попросил — дала номер — проверил — попрощались — разбежались))) В субботу ходила на свидание! Хосе Лопес))))))прям как из сериала)) Посольство Венесуэлы…советник какой-то. Скромняжка))) Можно просто для расширения кругозора с ним встречаться, чувств, кроме умиления, он у меня других не вызвал, НО как приятно было, что он за мной рванул бежать)))) мммммммм)))<br><br>

Вот так бурно началась моя новая жизнь, Катя)))<br><br>

И каждый раз не устану тебя благодарить за твое участие)))</p></div>
			</div>

			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava10.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Анастасия Брежнева</div>
						Запуск нового тренинга! На этот раз я, не задумываясь, заказала пакет «платинум». И не пожалела об этом! Вроде бы большинство информации я уже знала, но теперь наконец-то смогла пропустить всё через себя, выполняя домашние задания!
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Добрый день, Екатерина и Команда!<br><br>

Меня зовут Брежнева Анастасия (Nastenka). Живу я в ближайшем Подмосковье. Учусь на факультете психологии в одном из Московских вузов. Правда меня очень вдохновила Ваша работа и открыла для меня новые горизонты, так что я пошла учиться на курсы имиджмейкеров.<br><br>

Дело в том, что с Вашими тренингами я познакомилась ещё год назад. Тогда я прошла тренинг «Искусство стильно одеваться». Но, к сожалению, выбрала пакет «стандарт». Вот уж поистине «Скупой платит дважды»… Как раз год назад я весила 105 кг. К тому времени рядом со мной был человек, которого это более чем устраивало, поэтому я абсолютно не комплексовала. Меня смущал только вопрос здоровья. Да и вес был набран в процессе болезни. Ну и одежду, конечно, было подобрать сложнее.… И вот, спустя год, я вешу уже 75 кг. Всё прекрасно! Только вот знания, полученные от Вас, я применяла не совсем верно. Я всё пыталась подогнать под себя (зимние цвета, хотя я «лето», какие-то не очень подходящие мне фасоны). У меня наконец-то появилась возможность покупать, и я стала настоящим шопоголиком. Накупила кучу платьев меньшего размера. Думала, что похудею и буду их носить. А когда похудела, оказалось, что они не подходят мне по фасону или просто не садятся на мою фигуру «с большим перепадом». В итоге у меня три баула с совсем новыми вещами. Ну, ничего страшного, будет мне наука!!!<br><br>

Поняв, что совершаю много ошибок, и результат меня не очень устраивает, я стала ждать: когда же вы снова сделаете для нас какой-нибудь интересненьким проект. И вот свершилось чудо! Запуск нового тренинга! На этот раз я, не задумываясь, заказала пакет «платинум». И не пожалела об этом! Вроде бы большинство информации я уже знала, но теперь наконец-то смогла пропустить всё через себя. Я уже поняла, что надо пользоваться теми данными, которые дала нам природа, и не пытаться натянуть на себя что-то «чужое». К тому же очень помогали Ваши ДЗ. Ведь теперь можно было сразу проверить, на верном ли я пути… К тому же, проблемы со здоровьем стали уходить на второй план, и я смогла более активно участвовать в процессе. Каждый вечер ждала с нетерпением и получала массу удовольствия от встречи с Вами!<br><br>

Не могу сказать, что где-то схалтурила, т.к. переслушивала все лекции и к ДЗ относилась серьёзно. Кроме того, у меня есть масса литературы по теме имиджа и стиля, которую я так же с удовольствием изучаю. Теперь думаю дело только в тренировке…<br><br>

К тому же в моей ситуации есть огромный плюс: мне даже не надо разбирать весенне-летний гардероб, т.к. он давно пуст (все вещи давно велики и отобраны). Так что с нетерпением жду потепления, что бы отправиться по магазинам, вооружившись Вашими советами и рекомендациями, а так же списком покупок на шоппинг!!! И конечно я не хочу останавливаться на достигнутом!<br><br>

Хочу отдельно поблагодарить Вас, Екатерина, за Вашу работу и за все те приятные моменты, которые Вы дарите нам на каждой встрече! Как я уже упоминала, перемены в моей жизни начали происходить ещё год назад, но сейчас они наконец-то приносят первые плоды. И это касается не только внешнего вида. Вы удивительно позитивный человек! К тому же обладаете замечательной чертой &mdash; заражаете позитивом и окружающих. Вскользь даёте много полезных установок, и я очень Вам за это благодарна. К моему выздоровлению приложили руку не только врачи, но и Вы.<br><br>

Спасибо Вам!!! Пусть всё то, что Вы дарите людям возвращается к Вам многократно!!! Счастья Вам и Вашей семье. А так же поздравляю с появлением на свет такой прекрасной дочурки с красивым именем &mdash; Весна!…</p></div>
			</div>

			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava11.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Виктория Абрамова</div>
						Я поняла, что еще не хватало моему гардеробу. Как выглядеть нарядно-торжественно &mdash; красиво и удобно. Четкость подачи, структурность, наглядность. Было оч. интересно!
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Доброе время суток Екатерина и участницы тренинга.<br><br>

Меня зовут Виктория. Живу и работаю в столице Сибири, городе Новосибирске. Образование — художественное. Работа — творческая и интересная &mdash; я фотограф и дизайнер — фрилансер.<br><br>

У меня много друзей и клиентов. По роду работы &mdash; одежда мне необходима разная &mdash; от просто домашней до празднично-торжественной — но главный ее критерий &mdash; удобная, стильная, отражающая мою индивидуальность и привлекательность ))) Как оказалось &mdash; это не просто! Как выглядеть ярко и торжественно, но не привлекать внимания? ( фотограф должен быть незаметным ))) Как одеться удобно, комфортно, но стильно и привлекательно? ( свадьба- это торжество, но фотографу приходиться много двигаться, снимать сверху, приседать, иногда снимать с корточек или даже с пола &mdash; и как это сделать в платье и на каблуках? ))) Ведь не только мои работы должны говорить о моем профессионализме, но и сама моя внешность, моя самоподача, что очень важно при знакомстве с клиентами. И конечно, если ты стройная и модельной внешности &mdash; то все тебе нипочем! А если нет… Женственная фигура, но размера + .Бедра, широкая нижняя часть, размер ноги, совсем не женский ))). Разница между верхом и низом и черное, черное, черное… Какое то время этот цвет стал моим «спасением». Но я же не агент ЦРУ ))), мне хочется цвета, сочности, жизни! Начала покупать яркие вещи &mdash; но всегда смущал вопрос — а не сильно ли переукрасилась ))) Как понять? При всем при этом, комплименты к св. внешнему виду я обычно получала положительные. А вопрос стиля интересовал меня всегда. Хочется выглядеть привлекательно и нравиться себе самой, и если есть чувство стиля &mdash; то надо его развить! Так я нашла сайт гламурненько.ру! Чему безусловно рада!<br><br>

Хотела помочь себе. Я же женщина. И как известно &mdash; женщин некрасивых не бывает &mdash; есть те, кто не умеет правильно одеваться. Хочу правильно одеваться!<br><br>

Я поняла, что еще не хватало моему гардеробу. Как выглядеть нарядно-торжественно &mdash; красиво и удобно. Четкость подачи, структурность, наглядность. Было оч. интересно! Группа единомышленниц )) Не одна я такая ))) Успех &mdash; это начало моего преображения!<br><br>


Хотелось бы еще раз пройтись по каждому уроку и дополнить св.дз. Продумать, углубиться, проанализировать. Составить список покупок. Собрать комплекты. Пройти месяц имидж-клуба. Или даже имдж-про. Мне интересно дальше заниматься своим стиле-образованием. Возможно в дальнейшем это станет не просто моей личной необходимостью, но и чем-то большим для меня<br><br>

Я буду разбираться в особенностях св. фигуры и научусь подчеркивать ее достоинства. Буду выглядеть стройнее и интереснее. Смогу составлять грамотные комплекты одежды, обогащу св. палитру цветовой насыщенностью, подходящую мне по цветам и оттенкам. Помогу св. подругам выглядеть еще лучше! Буду нравиться себе! ))</p></div>
			</div>
			
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava12.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Светлана Пакер, Санкт-Петербург</div>
						В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Гардероб у меня был скучным и неинтересным, потом прошла базовый тренинг по имиджу у Екатерины в 2011 году и ситуация улучшилась. Сейчас поняла, что немного застопорилась в составлении более интересных комплектов, поэтому снова пришла к Кате.<br><br>

Тренинг помог мне понять, что такое базовый гардероб. До этого ясности не было. Теперь сконцентрируюсь на том, чтобы сформировать правильный гардероб из того, что есть, и докупить то, чего не хватает. Поразило внесение ожерелья в базовые вещи (и то, насколько это верно), понравилась тельняшка (у меня ее нет, но, думаю, что обязательно появится).<br><br>

Я наверное как те клиенты Екатерины, у которых весь гардероб состоит из расходных вещей, хотя я у себя отметила в наличии более половины из списка базовых, но не было знаний для формирования целостного гардероба.<br><br>

В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).<br><br>

Эмоции от Екатерины всегда положительные, она очень вдохновляет. Я очень рада, что приняла решение пройти этот тренинг! (уже не единожды ловила себя на этой мысли)<br><br>

Еще планирую дослушать все дни тренинга, выписать цвета для всех вещей и понемногу докупать необходимое (для начала ожерелье и тренч, о котором давно мечтаю). Я еще недостаточно хорошо проработала создание образов, необходимо будет этим заняться.</p><br/>
<center><table><tbody><tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" alt="" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" alt="" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" alt="" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td></tr></tbody></table></center></div>
			</div>
			
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava13.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Татьяна Гарлант, Питерсфилд, Англия.</div>
						Эмоции непередаваемые — сплошной восторг! Одна моя очень хорошая знакомая сказала, что я похудела и как хорошо я выгляжу, я также получила много комплиментов от мужа и сына.
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>За последние 7 лет после рождения двух деток я побывала в 4-х размерах и у меня накопилось огромное количество одежды с которой я не знала что делать. Благодаря Базовому Тренингу по Имиджу, который я прошла у Кати я узнала много полезной информации и начала применять полученные знания на практике. Но в силу занятости мне не хватало полного погружения в вопросы стиля и имиджа, не было времени пересмотреть весь гардероб, перебрать вещи, составить побольше комплектов на разные случаи жизни.<br><br>

Сейчас я также понимаю, что мне не хватало многих базовых вещей. Кроме того было много расходных вещей вышедших из моды.<br><br>

На тренинге я усвоила что такое базовые и расходные вещи и в чем их роль, как с минимумом вещей можно составить очень много стильных комплектов. Теперь я лучше понимаю что делает образ интересным и законченным, как строить образ на контрасте, как можно корректировать фигуру при помощи базовых вещей.<br><br>

Я наконец-то навела порядок у себя в шкафу и избавилась от приличной стопки шмоток, купила некоторые недостающие базовые вещи, составила список базовых вещей которые со временем нужно докупить. Я еще лучше подготовлена к наступлению весны! Теперь у меня составлено множество комплектов на разные случаи жизни.<br><br>

Мне очень импонирует Катин стиль подачи информации и я с нетерпением ждала каждого дня и проверки моих домашних заданий.<br><br>

Иногда в силу недостатка времени я проходила какие-то темы «голопам по Европам». Спустя пару недель я обязательно прослушаю тренинг еще раз и просмотрю разбор домашних заданий других участниц, так как я не успевала это делать.<br><br>

Еще мне нужно поменять свое ежедневное отношение к вещам, мне часто «жалко» наряжаться. В последние годы я отдавала предпочтение практичной, зачастую никакой одежде, не покупала ничего что нельзя постирать и нужно отдавать в химчистку.<br><br>

Я собираюсь распечатать фотки удачных образов и использовать их как шпаргалки когда нет времени и нужно «схватить, одеть и бежать»</p><br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant1.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant1.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant2.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant2.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant3.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant3.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant5.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant5.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant6.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant6.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant7.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant7.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant9.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant9.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant10.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant10.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant11.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant11.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant4.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant4.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant13.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant13.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant14.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant14.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant12.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant12.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant8.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant8.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td>
</tr>
</tbody>
</table>
</center></div>
			</div>

			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava14.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Галина Галышина, г.Москва</div>
						Самыми ценными для меня стали знания о сочетании цветов. Можно сказать, я взглянула на цвета под другим углом, никогда раньше не задумывалась о логике в комбинации цветов. Тренинг помог мне избавиться от вещей, которые на самом деле не красили меня. Теперь я все чаще мыслю образом.
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Мода увлекает меня очень давно, поэтому попасть на подобный тренинг я хотела, но как-то не получалось, поэтому когда мне пришло письмо с предложением поучаствовать в семинаре я с радостью согласилась.<br><br>

Тренинг был интересен для меня, т.к он обобщил множество разрозненных знаний и позволил взглянуть на себя чужими глазами. Я определилась с цветотипом и удостоверилась в своих знаниях о типе фигуры, о стилях. Но самыми ценными для меня стали знания о сочетании цветов. Можно сказать, я взглянула на цвета под другим углом, никогда раньше не задумывалась о логике в комбинации цветов.<br><br>

Тренинг помог мне избавиться от вещей, которые на самом деле не красили меня. Теперь я все чаще мыслю образом. <br><br>
Теперь каждое утро я стараюсь наполнить свой день цветом &mdash; в одежде. Конечно, это оказывает определенное влияние не только на меня, но и на окружающих &mdash; больше цвета &mdash; больше позитива.<br><br>

Во время последнего похода по магазинам заметила, что я не купила ни одной серой или черной вещи. Зато купила целых 3 разноцветных платья, мимо которых раньше бы прошла! Я стала внимательнее смотреть кино и журналы, на проходящих мимо людей, стараюсь подметить интересные детали в одежде окружающих. Можно сказать, что у меня появилось еще одно хобби.<br><br>

Выполнять ДЗ порой было очень трудно, но очень интересно. Тренинг увлек меня, заставил думать, смотреть, перерабатывать огромное количество информации. Я поняла где мои сильные и слабые стороны, что нужно менять и в каком направлении мне нужно двигаться. Воспоминания от этого курса однозначно останутся самими положительными.</p><br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/371326906568_51.png" target="_blank">
<img class="alignright size-medium wp-image-267" style="" title="371326906568_51" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/371326906568_51-300x190.png" alt="" width="300" height="190" align="right" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/951326906440_36.png" target="_blank"><img class="alignright size-medium wp-image-266" style="" title="951326906440_36" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/951326906440_36-300x190.png" alt="" width="300" height="190" align="right" /></a></td></tr>
</tbody>
</table>
</center></div>


			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava15.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Наталья Семиряко, г.Москва</div>
						У меня в буквальном смысле открылись глаза, упали шоры. Я смотрю теперь на вещи и вижу, для кого они, нужны ли они мне. Я с совершенно другим настроением хожу теперь в магазины.
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>На рассылку Катерины я подписана давно. В прошлом году очень порадовала ее книга «Секреты рационального гардероба»: коротко, внят-но, по делу. Однако это общие знания, которые самостоятельно для своего гардероба применить было сложно. Хотелось более осмысленной, так сказать, «точечной» работы над своим образом.<br><br>
Сомнения в покупке тренинга, конечно, были. Меня настораживал сам формат занятий. Это был мой первый онлайн-тренинг, до этого все мои курсы и тренинги на разные темы были только очными. Немного смущала пассивная роль слушателей. Зацепили слова, что тренинг станет «точкой невозврата», хотя и не верилось в такую феноменальную эффективность…<br><br>

Я очень рада, что в моей жизни случилось это событие, что я прошла этот сильный, стильный, красивый и эффективный тренинг. У меня в буквальном смысле открылись глаза, упали шоры. Я смотрю теперь на вещи и вижу, для кого они, нужны ли они мне. Я с совершенно другим настроением хожу теперь в магазины. Раньше это было беспокойство «до» и уныния «после», когда купленные вещи все равно оставляли ощущение «Что-то не то…» Теперь это либо любопытное знакомство с новыми вещами, которых я раньше на себе просто не представляла, или деловые поиски именно того, что нужно, с четким представлением, что именно нужно и как это может выглядеть.<br><br>
Сухой остаток от этого тренинга для меня в следующем:<br>


• Я теперь вижу свои цвета, я чувствую гармоничные сочетания цветов<br>


• Я знаю особенности своей фигуры и своего природного колорита, какие цвета, фасоны помогут мне себя украсить и подчеркнуть свои достоинства<br>


• Я составила конкретный список своего идеального гардероба, иду в магазин с четким представлением о том, что мне нужно<br>


• Я представляю, какими эти вещи должны быть по цвету, стилистике, длине, какой у них должен быть крой, какие детали, рисунок ткани… Причем в голове много вариантов, а не четкая картинка определенной вещи (которую никогда не найдешь, т.к. у каждой из нас всегда найдется свой набор «перламутровых пуговиц», без которых ну никак нельзя))).<br>


 • Я узнала о многих магазинах и марках, которые раньше для меня просто не существовали, мне просто не приходило в голову зайти еще куда-то, кроме стандартного списка мест, где я одевалась раньше<br>


• Я научилась разбираться в стилях одежды: я понимаю, каким образом стилистически подружить вещи, собрать их в единый образ соответственно тому, какое впечатление я хочу произвести
<br><br>
Впечатления от тренинга остались самые приятные. Я не пропустила ни одного эфира. Дети, супруг, кошка &mdash; все знали, что маму трогать нельзя, у нее очень важные занятия. Это первый мой интернет-тренинг, и это оказалось очень удобно: эффект присутствия на семинаре. Слушаешь материал, видишь картинки, в режиме реального времени пишешь вопросы и получаешь на них ответы. И все это дома, в своем любимом кресле и с чашкой чая!<br><br>
Катерина &mdash; очень харизматичный оратор! Приятный голос, живые интонации, иногда хлесткие словечки. И при этом огромный объем информации, четко структурированной и очень доступно изложенной. Меня подкупило еще очень внимательное отношение к вопросам и комментариям по ходу изложения материала.<br><br>

Спасибо Вам, Катя, за Вашу работу! Это неоценимая помощь тем девушкам, которые хотят сами уметь подбирать себе одежду так, чтобы с удовольствием смотреть на себя в зеркало и выходить из дома с чувством «Я &mdash; красавица!» А что еще нам, девочкам, надо, чтобы все получалось?!)))</p><br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/n1.png" target="_blank"><img class="alignright size-full wp-image-247" style="margin: 10px;" title="n1" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/n1.png" alt="" width="172" height="300" align="right" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/n2.jpg" target="_blank"><img class="alignleft  wp-image-248" style="margin: 10px;" title="n2" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/n2-300x292.jpg" alt="" width="300" height="292" align="left" /></a></td></tr>
</tbody>
</table>
</center></div>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava_none.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Елена Асылбекова</div>
						Во время обучения — энтузиазм необыкновенный
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Добрый день, Катя, Ваша команда, мои сокурсницы по тренингу.<br><br>

Меня зовут Елена, мне 57лет, я из Казахстана, работаю врачом. У меня муж, 2 взрослые дочери, пока один зять и наконец появилось время «посмотреть в зеркало».<br><br>

&ndash; Проблемы с одеждой «не было» на мне всегда белый халат, поэтому нарядная одежда красивая, но не комбинируемая. Конечно, хотелось одеваться стильно, ярко, но не всегда это получалось, а если удавалось что-то удачно придумать, этот образ долго эксплуатировался.<br><br>

&ndash; Про рассылку узнала от Андрея Косенко, когда проходила тренинг по Турбо памяти, стала следить за материалами, летом немного позанималась в Имидж клубе, но была подготовка к свадьбе, и я не реализовалась. Зимой решила повторить попытку, тем более, что стоял вопрос об уменьшении размеров.<br><br>

Во время обучения — энтузиазм необыкновенный, «тормозила» с компьютером, но Руслан, большое ему спасибо, терпеливо мне всё объяснял, задания выполняла медленно и не посылала, тем более, что аксессуаров у меня почти нет.<br><br>

Дорабатывать надо всё, и согласитесь, комбинации у Вас были достаточно молодёжными, но тем не менее, основные законы поняла, думаю, постепенно справлюсь. Очень благодарна всем, Кате, Андрею, Руслану, и ВАМ, мои подружки, за ваши советы, поддержку активность и тщательность. Всем доброго здоровья и больших жизненных успехов</p></div>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/headwear/images/ava16.png" alt="" /></div>
					<div class="right" style="width: 650px;">
						<div class="name">Татьяна Лучникова</div>
						Успехи начались во время первого занятия, когда я поняла, почему мне шли холодные оттенки — я по цветотипу лето, а не осень. На домашние задания я иногда тратила чуть ли не пол-дня, я наконец подобрала себе палитру и сочетания цветов, кот. мне идут — без домашнего задания эффект был бы не тот. Тема по аксессуарам перевернула все.
					</div>
					<div class="break"></div>
				</div>
				<div class="bottom"><p>Здравствуйте, Катя и участницы тренинга!<br><br>

Меня зовут Татьяна, я из Харькова. Я менеджер по продажам.<br><br>

Имея неплохие внешние данные: высокая, стройная и т.д. я ходила в безликих вещах, не сильно отличаясь от общей серой массы. В магазинах купить вещь — это было большой проблемой и часто заканчивалось либо отсутствием самой покупки либо уже когда на завтра надо костюм и хоть что-то приемлимое купить. Моя одежда вся состояла из брюк и наверх что-то по сезону. Цвета в основном охромовые, потому что на все случаи жизни и практически всем идет, ничего яркого, в общем серость. Про аксессуары всегда только мечтала, но никогда не покупала, т.к. не могла подобрать что к чему идет и как это вообще будет выглядеть. По каким-то данным определила, что я осень и мне должны идти теплые тона, поэтому на холодные в магазинах внимания не обращала, хотя были несколько вещей в холодных оттенках, кот. мне шли и было непонятно почему, ведь я же осень.<br><br>

Когда человек что-то хочет изменить и для этого делает, рано или поздно он получит ответ на свой запрос. Я по какой ссылке в интернете вышла на прошлый тренинг по имиджу, на него уже записи не было, но я подписалась на рассылку и узнала об этом тренинге.<br><br>

Тренинг был «Как выглядеть на 2 размера меньше», вначале меня это очень смутило, мне худее некуда казаться, но зато я поняла, что данные при необходимости будут для меня прямопротивоположные. Плюс тренинга — это был его анонс с темами, кот. меня заинтересовали, а еще и возможность получения бонусов прошедших имидж-клубов. Сразу решила, что возьму с проверкой домашнего задания,т.к. просто прослушать — это мало.
<br><br>
Успехи начались во время первого занятия, когда я поняла, почему мне шли холодные оттенки — я по цветотипу лето, а не осень. На домашние задания я иногда тратила чуть ли не пол-дня, я наконец подобрала себе палитру и сочетания цветов, кот. мне идут — без домашнего задания эффект был бы не тот. Тема по аксессуарам перевернула все. Я после переделки этого дз, т.к. все было скучным и невзрачным, понаходила в инете примеры украшений, сумок. Поняла, что мне даже было бы интересно для себя научиться делать такие украшения, т.к. в магазинах одна серость или на подростков. Я поняла,что мне все очень понравилось и хотелось бы обучаться дальше, сначала попрактиковавшись на себе и своих подругах — я думаю они будут не против.
<br><br>
Еще не всегда могу точно определить цветотип человека,подбор одежды — тут нужна практика и дальнейшее обучение.
<br><br>
Я думаю, что моя жизнь уже изменилась — я хочу меняться и начинаю меняться. Я наконец хочу ходить в платьях и юбках и постараюсь убрать черный цвет и блеклые цвета из гардероба.
<br><br>
Тренингом очень довольна и хочу продолжать обучаться дальше. Спасибо большое.</p></div>
			</div>
<?php
$pdo = new PDO("mysql:host=46.165.220.102;dbname=admin_glam-blog;charset=utf8", 'glamurnenko', 'E8BW2STWNyxuYQVK');
$stmt = $pdo->query("SELECT SQL_NO_CACHE count(*) as C FROM `aa_posts` left join `aa_term_relationships` on `id`=`object_id` left join `aa_terms` on `term_taxonomy_id`=`term_id` where `post_type`='reviews'");
$C = $stmt->fetch()['C'];
?>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"></div><br><br>
					<div class="right" style="width: 650px;">
						<div class="name"><a href="https://www.glamurnenko.ru/blog/reviews/" target="_blank">прочитать все <?=$C; ?> отзывов</a></div>
					</div>
					<div class="break"></div>
				</div><br><br>
			</div>

			
		</div>
	</div>

	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br><a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a> tel.: +7(499)350-23-35<br>© <?= date('Y') ?>, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>
	</div>
</div>
</body>
</html>
  

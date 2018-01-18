<?
$sendmail_30 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '30', PDO::PARAM_STR]
    ]
);

$sendmail_35 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '35', PDO::PARAM_STR]
    ]
);

$action_start = $sendmail_35 ? $sendmail_35 : $sendmail_30;
$action_end = strtotime('+84 hours', $action_start);

$months = [
    '01' => 'января',
    '02' => 'февраля',
    '03' => 'марта',
    '04' => 'апреля',
    '05' => 'мая',
    '06' => 'июня',
    '07' => 'июля',
    '08' => 'августа',
    '09' => 'сентября',
    '10'=> 'октября',
    '11'=> 'ноября',
    '12'=> 'декабря'
];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
     "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title>Имидж-практика &laquo;ВЕРХНЯЯ ОДЕЖДА ПОД КОНТРОЛЕМ СТИЛИСТА!&raquo;</title>
   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/css/style.css"/>
   
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
	
	<script type='text/javascript' src='<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/js/jquery.scrollTo-min.js'></script>
	
	
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/js/main.js"></script>
   <link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/flashtimer/compiled/flipclock.css">
   <script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/flashtimer/compiled/flipclock.js"></script>

	  
</head>
    
  
<body>

<div class="container">
	<div class="menu">
		<div class="ins">
			<ul style="padding-left: 0px;">
				<li><a class="a2" href="#point2">Что вы получите</a></li>
				<li><a class="a3" href="#point3">Кто ведет</a></li>
				<li><a class="a4" href="#point4">Как все будет</a></li>
				<li><a class="a5" href="#point5">Программа</a></li>
				<li><a class="a6" href="#point6">Бонусы</a></li>
				<li><a class="a7" href="#point7">Записаться</a></li>
				<li><a class="a1" href="#point1">Вопросы</a></li>
			</ul>
		</div>
	</div>
	
	<div class="header">
		<div class="inn">
			<div class="ins">
				<div class="name">Имидж-практика<span>ВЕРХНЯЯ ОДЕЖДА ПОД <br>КОНТРОЛЕМ СТИЛИСТА!</span></div>
				<div class="slogan">Хватит тратить деньги, время и нервы на выбор верхней одежды. Стилист возьмет её под контроль и скажет, что покупать именно вам, чтобы выглядеть на 100%</div>
			</div>
		</div>	
	</div>

	<div class="block1">
		<div class="ins">
			<div class="txt">
				<div class="bl_name">Будьте уверены в своем внешнем виде уже в этом сезоне!</div>
				<div class="item i1">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1"></td>
							<td class="td2">Верхняя одежда в вашем гардеробе перестанет выполнять исключительно функцию тепла и комфорта. Она, наконец, станет более интересной, индивидуальной. В ней появится эстетическая составляющая. </td>
						</tr>
					</table>	
				</div>
				<div class="item i2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1"></td>
							<td class="td2">Теперь вы не будете приходить в ужас от одной мысли о том, что нужно выбрать новую верхнюю одежду. </td>
						</tr>
					</table>	
				</div>
				<div class="item i3">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1"></td>
							<td class="td2">Теперь вы будете носить только то, что вам действительно идет. И будете получать от этого удовольствие.</td>
						</tr>
					</table>	
				</div>
				<div class="item i4">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1"></td>
							<td class="td2">Теперь вы избавитесь от стрессов и ошибочных покупок. И будете уверены в своем внешнем виде уже в этом сезоне!</td>
						</tr>
					</table>	
				</div>
			</div>
		</div>
	</div>
	
	<div class="block2">
		<div class="ins">
			<div class="txt1">Задумывались ли вы, <br>что &laquo;говорит&raquo; о вас верхняя одежда?</div>
			<div class="txt2">Хотите вы того или нет, но каждый день о вас судят по вашей одежде. </div>
			<div class="txt2">Вы еще не успели ничего сказать, но первые выводы о вас уже сделаны. Ваша<br> одежда &laquo;говорит&raquo; даже тогда, когда вы молчите. </div>
			<div class="txt2">В основном, одежда говорит &laquo;что попало&raquo;. А нужно, чтобы она говорила то,<br> какая вы на самом деле или то, какой вы хотите казаться, какое впечатление вы<br> хотите произвести.</div>
			<div class="txt3"><p>Например, про мужчину в костюме автоматически думают, что он уверенный, успешный, целеустремленный, надежный.</p><br><br><p>Про женщину в вечернем или коктейльном платье думают, что она изысканная, утонченная, женственная.</p></div>
			<div class="txt2">А что про вас говорит ваше пальто?<br>А как вы можете описать свою верхнюю одежду?<br>&laquo;Тепло&raquo;, &laquo;практично&raquo;, &laquo;комфортно&raquo;, &laquo;не марко&raquo;?</div>
			<div class="txt2">...</div>
			<div class="txt2">А теперь подумайте, что вы ХОТИТЕ, чтобы она о вас говорила?<br>Что вы заслуживаете?<br>Какая вы на самом деле?<br>И какое впечатление вы хотите производить?</div>
		</div>
	</div>	
	
	<div class="block3">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Вы &mdash; то, что вы носите</div>
				<p>Хочу поделиться с вами одним интересным экспериментом, связанным с одеждой, которое проводил профессор Колумбийского Университета Адам Галински http://www8.gsb.columbia.edu/cbs-directory/detail/ag2514</p><br><br>
				<p><span class="sp1">На поведение человека влияет одежда, в которую он одет</span></p><br><br>
				<p>Ученые утверждают, что один и тот же человек может вести себя совершенно по разному в зависимости от того, что на него надето.</p>
				<div class="round"><div class="inn"><span>«Надевая деловой костюм, мы не только производим определенное впечатление на окружающих, мы также производим впечатление на самих себя», — говорит автор изыскания. — «Человек, одетый в деловой костюм, начинает перенимать качества, которые ассоциируются с деловой одеждой».</span></div></div>
				<p class="marg">Для того, чтобы исследовать влияние одежды на человека, исследователи провели эксперимент, в ходе которого добровольцам предлагалось носить белый халат. При этом одни участники эксперимента думали, что носят медицинский халат, а другие — что халат принадлежит художнику.</p><br><br>
				<p>Те добровольцы, которым сказали, что на них медицинский халат, проявили максимум внимания. Адам Галински объясняет это тем, что врачу необходимо быть внимательным.</p><br><br>
				<p>В свою очередь, те участники эксперимента, которым сказали, что халат принадлежит художнику, были не столь внимательными, зато проявили свою креативность.</p><br><br>
				<p>Автор исследования говорит, что на проведение эксперимента его подтолкнул известный мультфильм «Симпсоны». В одной из серий «Симпсонов» есть эпизод, в котором группа учеников, одетых в серую школьную форму, ведет себя очень тихо. Однако, после ливня, который сделал одежду школьников разноцветной, дети начинают вести себя совершенно по-другому.</p>
				<div class="round"><div class="inn"><span>«Я подумал о том, что одежда, которую мы носим, оказывает колоссальное влияние на наше поведение» — говорит Галински. — «Надев черную футболку, вы станете более агрессивным, но если вы наденете халат медсестры, то, скорее всего, вы станете более милосердным».</span></div></div>
				<p class="marg">В связи с полученными данными, Адам Галински настоятельно советует хорошо подумать, прежде чем надеть ту или иную одежду. Подумайте, какие качества могут пригодиться вам сегодня и только после этого, выбирайте, что вы будете сегодня носить.</p><br><br>
				<p><span class="sp2">А какие качества вам навязывает ваша верхняя одежда?</span></p><br><br>
				<p><span class="sp2">И действительно ли вы хотите проявлять именно эти качества? </span></p><br>
			</div>
		</div>
	</div>	
	
	<div class="block4"  id="point2">
		<div class="inn">
			<div class="ins">
				<div class="txt">
					<div class="bl_name">Какой вы будете <br>уже через месяц</div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1 t1"></td>
							<td class="td2">Вы будете понимать что из верхней одежды должно быть в вашем гардеробе</td>
						</tr>
						<tr>
							<td class="td1 t2"></td>
							<td class="td2">Каким это должно быть (по цвету, по фасону)</td>
						</tr>
						<tr>
							<td class="td1 t3"></td>
							<td class="td2">Где и когда вы можете это купить</td>
						</tr>
						<tr>
							<td class="td1 t4"></td>
							<td class="td2">Проанализируете, что у вас есть из верхней одежды</td>
						</tr>
						<tr>
							<td class="td1 t5"></td>
							<td class="td2">Поймете, что подходит, а что нет</td>
						</tr>
						<tr>
							<td class="td1 t6"></td>
							<td class="td2">К чему нужно докупить какие-то аксессуары, а что нужно заменить</td>
						</tr>
						<tr>
							<td class="td1 t7"></td>
							<td class="td2">Начнете под контролем стилиста покупать верхнюю одежду в свой гардероб</td>
						</tr>
						<tr>
							<td class="td1 t8"></td>
							<td class="td2">У вас больше не будет такого, что вам нечего надеть из верхней одежды. Мы будем прорабатывать верхнюю одежду под любую погоду</td>
						</tr>
					</table>	
				</div>
			</div>
		</div>	
	</div>	
	
	<div class="block5" id="point3">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">А кто ведет имидж-практику?</div>
				<p><span>Автор имидж-практики &mdash; <span>Екатерина Малярова</span> &mdash; известный московский имиджмейкер, автор сайта Гламурненько.RU</span></p><br><br>
				<p>Всего за несколько лет работы Екатерина стала одним из самых востребованных имиджмейкеров Москвы. Запись к ней на шоппинг-сопровождение открывается за полгода. Часто в день проводит по несколько шоппингов.</p><br><br>
				<p>Каждый сезон ездит с группой клиентов на шоппинг в Милан.</p><br><br>
				<p>Одевала клиентов на красную ковровую дорожку, на экономический форум в Санкт-Петербурге, на встречу с президентом…</p><br><br>
				<p>Автор нескольких тренингов по персональному имиджу, автор Школы Имиджмейкеров, а также ведущая нескольких десятков семинаров.</p>
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
        <div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/bg4.jpg') repeat;    border-bottom: 2px dotted #cacbca;height: 470px;padding: 0px 0 0px 0;">
		<div class="ins">
			<div class="pic" style="margin-bottom: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava4.png" alt=""></center></div>
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
                            font-weight: normal;    font-size: 18px;
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
<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/bg4.jpg') repeat; height: 470px;padding: 0px 0 0px 0;">
		<div class="ins">
			<div class="pic" style="margin-bottom: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava3.png" alt=""/></center></div>
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
    font-weight: normal;    font-size: 18px;
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
	<div class="block6">
		<div class="inn">
			<div class="ins">
				<div class="txt">
					<div class="bl_name">&laquo;Почему именно верхняя одежда так критично важна?&raquo;</div>
					<p>Мы носим её с сентября по май включительно. Это 9 месяцев!</p><br>
					<p>И работая имиджмейкером, я столкнулась с ситуацией как удивительно мало внимания, времени, сил и эмоций женщины затрачивают на покупку верхней одежды. </p><br>
					<p>Почему-то в нашей стране для многих женщин важнее выбрать платьице, юбочку или блузочку, чем, например, пальто. </p><br>
					<p>Обычно думают: &laquo;А, наверх я что-нибудь накину&raquo;. </p><br>
					<p>Или: &laquo;А, похожу еще один очередной годик в старом&raquo;.</p><br>
					<p>А дальше мы имеем ситуацию, когда выходишь на улицу и весь осенне-зимний сезон наблюдаешь серую, безликую, скучную, неинтересную толпу.</p><br>
					<p>Я вижу это особенно остро и очевидно, поскольку в сентябре я уезжаю работать в Милан и возвращаюсь только в конце октября. И то, что я вижу на улицах по возвращению навевает грусть и тоску.</p><br>
					<p>Безликая серая масса. Глазу не за что зацепиться. </p><br>
					<p>А ведь в Италии тоже бывает и осень, и зима (пусть не такая суровая, но ненастная, промозглая и дождливая). Но насколько интереснее, выразительнее, индивидуальнее одеваются там люди!</p><br>
					<p><span>Я считаю, что в нашей стране с учетом климата, тема верхней одежды должна быть одной из главных в гардеробе. Ей нужно уделять время, силы, мысли, эмоции, энергию, а зачастую и деньги. </span></p><br>
					<p><span>Но это окупится вашим внешним видом, уверенностью в себе, позитивным и радостным настроением вне зависимости от погоды. </span></p><br>
					<p><span>Покупка верхней одежды &mdash; это инвестиция на несколько лет.</span></p><br>
					<p>Это не очередная блузочка или юбочка.</p><br>
					<p>Эта покупка не должна быть спонтанной просто потому, что &laquo;неожиданно в конце сентября наступила осень&raquo;, и вам совершенно нечего надеть, и вы покупаете первое попавшееся пальто.</p><br>
					<p>Эта покупка должна быть обдумана. Это инвестиция. Правильно подобранная верхняя одежда прослужит в вашем гардеробе несколько лет. </p><br>
					<p>Это сэкономит вам большое количество времени. Вместо суеты и вынужденных покупок, вы сможете отдохнуть, куда-то сходить, провести время с близкими. </p><br>
					<p>А также сэкономите кучу денег, не совершая спонтанных, необдуманных покупок верхней одежды, которую носите без особой радости.</p>
				</div>
			</div>
		</div>
	</div>	
	
	<div class="block7">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">Прорыв в имидж-обучении, который вы давно заслуживали.</div>
				<p>Моя имидж-практика подразумевает плотную работу стилиста именно с вами. </p><br><br>
				<p>У меня нет целью завалить вас теоретическими материалами и оставить один-на-один разбираться с ними. </p><br><br>
				<p>Моя главная цель &mdash; ваше преображение.</p><br><br>
				<p>Чтобы пройдя имидж-практику у вас был конкретный конечный результат &mdash; ваша верхняя одежда вас максимально украшала. </p>
			</div>
		</div>
	</div>
	
	<div class="block8" id="point4">
		<div class="inn">
			<div class="ins">
				<div class="txt">
					<div class="bl_name">Как будет все проходить?</div>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1"><span>Вы получаете доступ в закрытый раздел на сайте, где можете смотреть и скачивать обучающие видео. В удобном для вас темпе вы смотрите видео и применяете шаблоны к своему гардеробу. </span></td>
							<td class="td2"><span>Ваши домашние задания вы можете размещать в любое время закрытом разделе. Вы гарантированно получите ответ, даже если вы решите пройти тренинг не сразу (гарантированный период проверки ДЗ &mdash; 2 мес. Потом вы можете докупить проверку).</span></td>
						</tr>
						<tr>
							<td class="td3"><span>А потом вы применяете все эти полученные знания к своему гардеробу. Вы можете фотографировать себя в верхней одежде, выкладывать фотографии в специальном закрытом разделе, а закрепленный за вами стилист их будет комментировать и давать рекомендации.</span></td>
							<td class="td4"><span>У вас будет возможность в процессе имидж-практики подобрать себе предметы верхнего гардероба, размещать фотографии процесса подбора, свои вопросы. Стилист будет все это комментировать и вы сможете приобрести лучшие для вас вещи.
</span></td>
						</tr>
						<tr>
							<td class="td5"><span>В процессе прохождения вы сможете разобрать всю верхнюю одежду, которая у вас есть в гардеробе, понять что вам подходит, а что нужно заменить.<br> А что-то из верхней одежды может получить новую жизнь за счет правильно подобранных аксессуаров.</span></td>
							<td class="td6"><span>Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам. Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс. А служба поддержки оперативно поможет, если у вас останутся вопросы.</span></td>
						</tr>
					</table>	
				</div>
			</div>
		</div>	
	</div>
	
	<div class="block9">
		<div class="ins">
			<div class="bg"></div>
			<div class="txt">
				<div class="bl_name">&laquo;А как долго я могу выполнять задания и вы их будете проверять?&raquo;</div>
				<p>Практически бесконечно долго :)</p><br><br>
				<p>Вместе с имидж-практикой идет гарантированный период проверки ваших заданий &mdash; 2 месяца. </p>
				<p>Но потом вы сможете продлить этот срок. Или включить эту возможность, когда вам потребуется.</p><br><br>
			</div>
		</div>
	</div>
	
	<div class="block10" id="point5">
		<div class="bl_name">Программа Имидж-Практики</div>
		<div class="bl1">
			<div class="ins">
				<div class="week">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1">неделя</td>
							<td class="td2"><p>Мы возьмем под контроль ваше пальто.</p><br><p>Разберемся с тем, что должно быть. Разберемся с тем, что у вас есть, подходит это вам или нет, как это можно дополнить или на что заменить!</p></td>
						</tr>
					</table>	
				</div>	
			</div>
		</div>
		<div class="bl2">
			<div class="ins">
				<div class="week">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1">неделя</td>
							<td class="td2"><p>Мы возьмем под контроль вашу верхнюю одежду на зиму (шубы, дубленки, пуховики).</p><br><p>Разберемся с тем, что должно быть. Разберемся с тем, что у вас есть, подходит это вам или нет, как это можно дополнить или на что заменить!</p></td>
						</tr>
					</table>	
				</div>	
			</div>
		</div>
		<div class="bl3">
			<div class="ins">
				<div class="week">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1">неделя</td>
							<td class="td2"><p>Мы возьмем под контроль верхнюю одежду, которую вы носите весной и в начале осени (тренчи и летние пальто)</p><br><p>Разберемся с тем, что должно быть. Разберемся с тем, что у вас есть, подходит это вам или нет, как это можно дополнить или на что заменить!</p></td>
						</tr>
					</table>	
				</div>	
			</div>
		</div>
		<div class="bl4">
			<div class="ins">
				<div class="week">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="td1">неделя</td>
							<td class="td2"><p>Мы возьмем под контроль другие варианты верхней одежды, которые могут разнообразить ваш гардероб (кожаные куртки, джинсовые куртки, пальто без рукавов (жилеты), ветровки, кардиганы, парки)</p><br><p>Разберемся с тем, что должно быть. Разберемся с тем, что у вас есть, подходит это вам или нет, как это можно дополнить или на что заменить!</p></td>
						</tr>
					</table>	
				</div>	
			</div>
		</div>
	</div>

	<div class="block11" id="point6">
		<div class="ins">
			<div class="bl_name">Бонусы</div>
			<div class="item i1">
				<div class="pic">
					<div class="inn">
						<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/box8.png" alt=""/>
					</div>
				</div>
				<div class="descr">
					<div class="name">Как определить свой цветотип и цвета, которые вам идут</div>
					<p>Как правильно выбрать цвета для комплектов, которые идут именно вам? В этом вопросе вам поможет разобраться бонусный семинар “Как определить свой цветотип и цвета, которые вам идут”</p>
					<p>Из этого семинара вы узнаете:<br>
&ndash; как определить свой цветотип<br>
&ndash; правила определения цветотипов зима, лето, весна и осень, а также их подтипов.<br>
&ndash; какие цвета подходят каждому из цветотипов<br>
&ndash; как выбрать цвета для своего гардероба</p>
				</div>
				<div class="break"></div>
				<div class="num"><span>Бонус 1</span></div>
			</div>
			<div class="item i1">
				<div class="pic">
					<div class="inn">
						<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/box3.png" alt=""/>
					</div>
				</div>
				<div class="descr">
					<div class="name">Определение вашего цветотипа по фотографии</div>
					<p>Имиджмейкер нашей команды определит ваш цветотип по фотографиям и пришлет отчет по цветам, которые вам идут</p>
				</div>
				<div class="break"></div>
				<div class="num"><span>Бонус 2</span></div>
			</div>
			<div class="item i4">
				<div class="pic">
					<div class="inn">
						<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/box1.png" alt=""/>
					</div>
				</div>
				<div class="descr">
					<div class="name">Что будет актуально в верхней одежде в ближайшие несколько лет</div>
					<p>Вы узнаете:<br/>

&ndash; основные направления и тенденции в развитии верхней одежды на ближайшие несколько лет<br/>

&ndash; какие предметы верхней одежды must have на ближайшие несколько лет. И именно они позволят сделать ваш образ стильным, ярким, актуальным и выразительным</p>
				</div>
				<div class="break"></div>
				<div class="num"><span>Бонус 3</span></div>
			</div>
			<div class="item i4">
				<div class="pic">
					<div class="inn">
						<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/box2.png" alt=""/>
					</div>
				</div>
				<div class="descr">
					<div class="name">Покупка верхней одежды для клиентов</div>
					<p>Из этого семинара вы узнаете секреты и фишки подбора верхней одежды на шоппинге с клиентами.</p>
				</div>
				<div class="break"></div>
				<div class="num"><span>ДОП.</span></div>
			</div>
		</div>	
	</div>
	
	
	<div class="block12">
		<div class="ins">
			<div class="txt">
				<div class="bl_name">Примите участие в имидж-практике, ничем не рискуя!</div>
				<p><span>Цена этого тренинга намного меньше</span>, чем вы тратите на одежду, которую бывает так, что даже не носите.</p><br><br>
				<p>Но что более важно &mdash; это безусловная гарантия. Мы понимаем, что вам в тренинге важно всё, что мы пообещали. Поэтому мы даем вам возможность пройти первую неделю тренинга полностью без риска!</p><br><br>
				<p><span>Если в конце этого времени вы не будете удовлетворены, тогда мы просто вернем вам деньги. Без лишних вопросов. Только вы судья! </span></p><br><br>
				<p>К сожалению, в этом случае, мы вам больше ничего не продадим в будущем, чтобы не тратить ваше и наше время.</p>
			</div>	
		</div>
	</div>	
	<div class="block13" id="point7" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/bg49.jpg') center top;">
		<div class="ins" style="height: 1100px;">
			<div class="bl_name"><center>Примите участие в имидж-практике, ничем не рискуя!</center></div>


				<center>
                                    <p style="font-size: 25px;">Успейте записаться со скидкой, пока время на таймере не истечет</p>
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
					<td class="td1"></td>
					<td class="td3"></td>
				</tr>
				<tr>
					<td class="td1"><span>ОСНОВНЫЕ МАТЕРИАЛЫ:</span></td>
					<td></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">&laquo;Верхняя одежда под контролем стилиста!&raquo;</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">Проверка домашних заданий, имиджмейкером команды Гламурненько.ру
                                        </td>
					<td>2 месяца</td>
				</tr>
				<tr>
					<td class="td1"></td>
					<td></td>
				</tr>
				<tr>
					<td class="td1"><span>БОНУСЫ:</span></td>
					<td></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">Семинар &laquo;Как определить свой цветотип и цвета, которые вам идут&raquo;</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">Определение вашего цветотипа по фотографии</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">Семинар &laquo;Что будет актуально в верхней одежде в ближайшие несколько лет&raquo;</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1"></td>
					<td></td>
				</tr>
				<tr class="tr2">
					<td class="td1"><span>Итого</span></td>
					<td><s>9 970 руб</s> 4 970 руб</td>
				</tr>
				<tr class="tr3">
					<td class="td1"></td>
					<td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53212"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>"></a></td>
				</tr>
				<tr>
					<td class="td1"></td>
					<td></td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 5px;padding-bottom: 5px;">Покупка верхней одежды для клиентов. Семинар для стилистов</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1"></td>
					<td></td>
				</tr>
				<tr class="tr2">
					<td class="td1"><span>Итого</span></td>
					<td><s>10 470 руб</s> 5 470 руб</td>
				</tr>
				<tr class="tr3">
					<td class="td1"></td>
					<td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53217"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>"></a></td>
				</tr>
			</table>
		</div>
	</div>	
	<div class="block14">
		<div class="ins">
			<div class="bl_name">Быстрая помощь службы поддержки</div>
			<div class="txt">
				<p>Участницы имидж-практики могут при необходимости получить помощь от нашей службы поддержки.</p><br><br>
				<p>Сотрудники службы поддержки оперативно ответят на все вопросы и разберутся со случайными ошибками и неувязками. Сделают максимум возможного, чтобы все участницы ощущали себя комфортно и не оставались один на один с нерешенными проблемами.</p><br><br>
				<p>Связаться со службой поддержки можно с любой страницы в правом нижнем углу, либо дополнительно со страницы:</p><br>
				<p><a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a></p>
			</div>	
		</div>
	</div>	
	   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/css/style_1.css?t=1409284522"/>

<section class="whiteBg"   id="point1">
    <section class="page" id="faq_block">
        <h1>Часто задаваемые вопросы:</h1>
        
        <h2><span class="questSymbol">?</span> Имидж-практика проходит через интернет или вживую надо куда-то идти?</h2>
        <p>Только через интернет. И этот формат дает ряд преимуществ для вас: <br/>
&ndash; вам не надо никуда ехать, достаточно иметь компьютер<br/>
&ndash; вы можете скачать запись и просматривать её сколько угодно и когда угодно<br/>
&ndash; цена имидж-практики намного ниже, чем цены живых мероприятий </p>
        
        <h2><span class="questSymbol">?</span> Я не успеваю сейчас оплатить! </h2>
        <p>Главное успейте сейчас выписать счет. Т.е. нажмите на кнопку &laquo;оформить заказ&raquo; и дальше выберите способ оплаты. Потом у вас будет еще 3 дня чтобы его оплатить. </p>
        
        <h2><span class="questSymbol">?</span> Могу ли я купить имидж-практику сейчас, а проходить через месяц? </h2>
        <p>Можете. Вместе с имидж-практикой идет гарантированный период проверки ваших домашних заданий &mdash; 2 месяца. Как только вы купили &mdash; этот период начался.<br/><br/> 

Заморозить его, к сожалению, нельзя. Но вы можете потом продлить этот срок или включить, когда захотите (например, через полгода). <br/><br/>

Стоимость продления/включения = 500 рублей/мес</p>

        <h2><span class="questSymbol">?</span> Мне обязательно присутствовать онлайн или можно будет скачать запись встречи?</h2>
        <p>Все записи вы сможете скачать к себе на компьютер. Доступ к скачиванию у вас будет постоянно &mdash; можете скачать хоть через год. </p>
        
        <h2><span class="questSymbol">?</span> Нужно ли мне в процессе имидж-практики покупать одежду?</h2>
        <p>Что-то вы сможете &laquo;дотянуть&raquo; из уже имеющейся у вас верхней одежды. А что-то надо будет докупать. Но эти покупки будут очень рациональными и оправданными. Без покупки новых вещей сложно сделать что-то кардинально новое и интересное. Но в любом случае вы потратите намного меньше денег, чем просто самостоятельно закупая верхнюю одежду без нашей поддержки.</p>
    </section>
</section>	

           
           
	<div class="block15">
		<div class="ins">
			<div class="bl_name">Отзывы на имидж-практику</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">



					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/outerwear-iriny-5.png" alt="" /></div>
					<div class="right">
						<div class="name">Ирина Рубио, Москва</div>
						Мои три пользы от происхождения имидж-практики: чувство уверенности в том что при любой погоде ты можешь выглядеть красиво. Возможность составить новые комплекты. И еще одно избавиться от ненужных вещей в гардеробе и посмотреть по-новому на старые.
					</div>
					<div class="break"></div>
				</div>
				<p>Года два назад мне казалось, что у верхней одежды самая главная функция защита от холода, даже подумать не могла что она может быть красивой и разнообразной. И что зимой ты можешь быть красивой. Без определённых знаний было не обойтись, покупая новые вещи без определённого ориентира сложно и это не приносило результата.<br/>
<br/>
На практике я купила 2 новые вещи это шуба жёлтого цвета и пальто короткое на весну, составила новые интересные комплекты, не только на зиму, но и на весну. Благодаря имидж практике по головным уборам добавила в комплекты и новые головные уборы.
<br/><br/>
Мои три пользы от происхождения имидж-практики: чувство уверенности в том что при любой погоде ты можешь выглядеть красиво. Возможность составить новые комплекты. И еще одно избавиться от ненужных вещей в гардеробе и посмотреть по-новому на старые.
<br/><br/>
Много информации и картинок. Я проходила имидж практику в очень скоростном режиме, не успела составить коллажи, мало вариантов комплектов хотелось еще больше. Мало времени потратила на магазины и примерку.</p>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-1.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-2.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-3.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-4.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-5.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-6.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-7.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-8.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
</tbody>
</table>
</center>
			</div>	
            <div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="https://www.glamurnenko.ru/products/outerwear/images/ava17.png" alt="" /></div>
					<div class="right">
						<div class="name">Наталья Полякова, Киев.</div>
						Я поняла как правильно носить и выбирать верхнюю одежду, чтобы она была подходящего цвета и фасона,не резала фигуру. А главное, стала понимать, что верхняя одежда это не то, в чем надо просто «перекантоваться», чтобы переждать холода, а то, что можно приобрести ее такую, которую с удовольствием буду носить. Поняла, что выглядеть стильно в верхней одежде не так уж и сложно, когда знаешь хотя бы азы.
					</div>
					<div class="break"></div>
				</div>
				<p>На имидж-практике я получила больше информации о новых видах верхней одежды, к примеру, таких как летнее пальто. Загорелась идеей приобрести себе парочку.<br><br>

Пересмотрела те вещи, которые были. Составила новые комплекты. Раньше кардиганы одевала, чтобы накинуть что-то от холода. и вообще не делала из них элемент комплекта. Теперь начинаю продумывать комплекты, которые можно вместе с ними носить. Запланировала ряд покупок, таких как летнее пальто, еще один плащ и косуху.
<br><br>
Эмоции были разные) Много огорчения от того, что практически вся одежда серого цвета. От этого — однообразный внешний вид. 10 разных серых комплектов — выглядит как один) но сделала выводы, что мне надо приобрести. Вообще окунулась в мир моды. спасибо за современные стильные картинки, получаешь представление о том, что стильно и как это носить. Но я думаю, что все таки получила больше позитива, чем негатива. Уже не терпится поэкспериментировать. Поняла, что выглядеть стильно в верхней одежде не так уж и сложно, когда знаешь хотя бы азы.
<br><br>
В основном новые образы удалось составить из осенне-весенних комплектов, потому окружающие пока еще не оценили)</p><br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj.jpg" width="150" height="270" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj-4.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj-4.jpg" width="150" height="270" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj-3.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj-3.jpg" width="150" height="270" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/outerwear-polyakovoj-2.jpg" alt="" width="150" height="270" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td></tr>
</tbody>
</table>
</center>
			</div>
            <div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="https://www.glamurnenko.ru/products/outerwear/images/ava18.png" alt="" /></div>
					<div class="right">
						<div class="name">Людмила Филатова, Барнаул.</div>
						В ходе имидж-практики купила себе светло-розовое классическое пальто. Столько комплиментов я давно не слышала. Понравилось всем! По поводу реакции окружающих могу совершенно точно сказать, что она положительная. Некоторые делают комплименты, говорят, как я здорово выгляжу и меняюсь в лучшую сторону, некоторые просто одобрительно улыбаются, кто-то не говорит ничего, просто пытается повнимательнее рассмотреть (как она это сделала?), чтобы потом попробовать повторить.
					</div>
					<div class="break"></div>
				</div>
				<p>Добрый день! Я живу в городе Петрозаводске. Работаю главным бухгалтером. Имидж-практика по верхней одежде явилась для меня логическим продолжением тренинга «20 базовых вещей», который был для меня очень эффективным, но требовал продолжения — решения вопросов с верхней одеждой. Раньше комплекты с верхней одеждой я рассматривала только как «пальто(куртка, пуховик…)+обувь» и все. Ну, шарф для тепла и если ОЧЕНЬ холодно, то шапка. То есть главное требование к верхней одежде у меня было — практичность (тепло, удобно) и все.
<br><br>
Как оказалось, комплекты с верхней одеждой могут также быть интересными, стильными и модными. В ходе имидж-практики составила для себя список верхней одежды, которую хочу приобрести. В первую очередь это тренч, кожаная куртка,летнее пальто (возможно и не одно), также кардиганы — более теплый и легкий летний, возможно джинсовая куртка и стеганая куртка, а также зимнее пальто-кокон. И я уже понимаю,какие комплекты можно будет составить, раньше не могла этого даже себе представить.
<br><br>
Вопрос, который требует проработки — это, конечно, головные уборы, которые, как я поняла, следует носить гораздо больше, чаще и практически круглый год. Этому буду уделять внимание. В вопросе обуви я немного продвинулась — уже гораздо лучше по сравнению с тем, что было. Но здесь тоже есть над чем поработать. Также всегда актуален подбор правильных аксессуаров, над этим тоже буду работать.
<br><br>
Прикладываю пару фотографий в новом пальто.
<br><br>
В целом подводя итоги хочу конечно же сказать огромное спасибо Вам, Екатерина и Вашей команде за ту радость и вдохновение, которое Вы несете с помощью тренингов, семинаров, имидж-практики… Это просто ЧУДО! И главное, это чудо я делаю и сама тоже. Я принимаю в этом активное участие и в этом огромная ценность. С интересом просматриваю различные луки в интернете. Могу достаточно быстро выбрать то, что мне нравится (и подойдет именно мне!) В общем, расту и развиваюсь и буду продолжать это делать, потому что это ЗДОРОВО!
</p><br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/outerwear-filatovoj.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/outerwear-filatovoj.jpg" width="200" height="270" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/outerwear-filatovoj-2.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/outerwear-filatovoj-2.jpg" width="200" height="270" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
</tbody>
</table>
</center>
			</div>		
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/vasjukevich3.png" alt="" /></div>
					<div class="right">
						<div class="name">Валентина Васюкевич, Гродно</div>
						Сплошная экономия, учитывая стоимость верхней одежды и стоимость семинара, выгода очевидна. Понравилось составлять комплекты, по-новому смотрю на привычные вещи.
					</div>
					<div class="break"></div>
				</div>
				<p>До тренинга не могла подобрать пальто по фигуре или по цвету. До прохождения семинара у меня было стойкое мнение, что пальто это сугубо статусная, возрастная вещь, и для меня оно никак не подходит. Было сложно составлять комплекты с пальто. Не знала с чем можно носить кожаную куртку, кроме джинсов и футболки.<br/>
<br/>
Трудно было подобрать кардиган по фигуре (рост 164 см, не очень стройная фигура), не нравились они на мне и все.<br/>
К тренчам и шубам вообще боялась подходить, считала что это не для меня (не по фигуре).<br/>
Трудно было подобрать аксессуары к верхней одежде: шарф, перчатки, сумку, обувь.<br/>
<br/>
В процессе тренинга составлен план покупок: тренч, базовое пальто, новый пуховик. Составлены новые комплекты с уже имеющейся верхней одеждой.<br/>
<br/>
Новые комплекты были составлены с пальто и кожаной курткой, а уже зима, поэтому буду ждать весну с нетерпением.<br/>
<br/>
Выгоды от прохождения имидж-практики:<br/>
Выгода первая: я хотела купить себе шубу, но после семинара поняла, что пока (пока я в отпуске по уходу за ребенком) она будет просто висеть в шкафу.<br/>
<br/>
Выгода вторая: я знаю, какое БАЗОВОЕ пальто мне покупать в следующий раз: у меня уже есть одно яркое пальто, которое очень ограничено в составлении комплектов, было куплено, чтобы просто купить какое-нибудь пальто. Можно сделать очень выгодную покупку.<br/>
<br/>
Выгода третья: я знаю, какую именно верхнюю одежду нужно покупать, чтобы не было необходимости через 2 сезона снова бежать за покупками.<br/>
В итоге — сплошная экономия, учитывая стоимость верхней одежды и стоимость семинара, выгода очевидна.<br/>
<br/>
Было очень интересно выполнять домашние задания, хотя был заказан комплект без проверки,<br/>
<br/>
Понравилось составлять комплекты, по-новому смотрю на привычные вещи.<br/>
<br/>
Еще не совсем понятно с аксессуарами: перчатки, шарфы (как подобрать фасон и цвет, делать ли на них акцент и когда это стоит делать).<br/></p>
<img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/vasjukevich1.jpg" alt="" width="200" height="300"/>

<img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/vasjukevich2.jpg" alt="" width="200" height="300"/>

<img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/vasjukevich4.jpg" alt="" width="200" height="300"/>

			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/prokofeva.png" alt="" /></div>
					<div class="right">
						<div class="name">Ольга Прокофьева, Чувашия.Г.Новочебоксарск</div>
						Меня «заражают» и заряжают энергией ,и желанием что то делать, материалы Екатерины. После полученной информации, сразу хочется преображения. Много нового узнала про все виды верхней одежды.
					</div>
					<div class="break"></div>
				</div>
				<p>До тренинга были проблемы: как носить, с какой обувью, с чем носить. Хотелось в гардероб пальто, не знала какое. Пуховик с какой обувью лучше сочетать. Нужна ли мне шуба, или для меня сейчас пока нет в ней необходимости. Дубленка висит, с чем и как носить. Парка есть, то же висит.<br>
<br>
За два года у меня изменился размер с 48 до 50-52. Но зато сейчас я больше слышу комплиментов в свой адрес: как ты похудела, как ты хорошо выглядишь и т.п. С каждым словом я все больше понимаю, насколько ценны те знания , которые нам дает Екатерина. Спасибо за Ваш труд! И я понимаю, что цвета и компоновка ансамбля работают на меня.<br>
<br>
Обьем полезной информации. Меня «заражают» и заряжают энергией ,и желанием что то делать, материалы Екатерины. После полученной информации, сразу хочется преображения. Много нового узнала про все виды верхней одежды..<br>
<br>
Планы: мне хочется иметь в гардеробе летнее пальто, более теплое пальто без рукавов, кожаную куртку(косуху),тонкий пуховик под пальто, яркие брюки к парке. Более полноценно использовать кардиганы.</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Александра Л. Казань</div>
						С удовольствием одеваюсь и смотрю на себя каждое утро. Мне чаще стали делать комплименты на работе и просто незнакомые люди, мужу очень нравится, сыну тоже приятно рядом с красивой мамой. Мне очень нравится стиль подачи материала от Кати, она подробно остановилась на всех основных предметах верхнего гардероба. Я перестала выбрасывать и дарить неношеные вещи с бирками. Катя, вы — добрая волшебница ! я очень рада, что заочно познакомилась с Вами — Ваши трениги для меня — постоянный источник вдохновения.
					</div>
					<div class="break"></div>
				</div>
				<p>До тренинга одежда покупалась, и потом не носилась, потому что была слишком вычурная (это с пальто было несколько раз)<br/>
Покупала одежду вместе с мамой,в результате ей нравилось одно, мне другое, и купить что-то было невозможно<br/>
Не знала как носить куртки и пуховики, чтобы было стильно и красиво<br/>
<br/>
Во время тренинга я отобрала наиболее подходящие для меня фасоны и цвета, сделала фокус на цветную верхнюю одежду, чтобы уйти от черного или даже серого. Для меня стало открытием сколько людей у нас ходят по улице в черном !<br/>
Составила список покупок на ближайший год по верхней одежде, просматриваю новинки моды в журналах и на страницах онлайн магазинов,чтобы быть в курсе. С удовольствием одеваюсь и смотрю на себя каждое утро.<br/>
<br/>
Мне чаще стали делать комплименты на работе и просто незнакомые люди, мужу очень нравится<br/>
сыну тоже приятно рядом с красивой мамой.<br/>
<br/>
Три самых больших выгоды от прохождения имидж-практики:<br/>
—	возможность посмотреть модные тенденции, и учесть их при выборе одежды<br/>
—	возможность реально сэкономить время и деньги при шоппинге, так как знаешь, что не будешь брать, и не тратишь на это свое время и деньги, и видишь, что тебе лучше подходит<br/>
—	очень помогла подсказка с брендами, где какую одежду искать<br/>
<br/>
Мне очень нравится стиль подачи материала от Кати, она подробно остановилась на всех основных предметах верхнего гардероба, даже на тех, которые с моей точки зрения были исключительно «проходным» дачным вариантом (типа парки или пуховиков) — в результате я взяла себе на заметку, чтобы пополнить свой гардероб. Исключительно полезно было послушать что с чем носить.<br/>
<br/>
У меня не было времени ходить по магазинам и мерять, и экономическая ситуация в стране пока не располагает, но я планирую этим заняться в новогодние каникулы просто чтобы получить удовольствие, и может быть, что-нибудь еще и прикупить !<br/>
Очень понравилась тема многослойности, хочу воплотить ее со своей одеждой, тоже план на каникулы.<br/>
<br/>
В заключение хочу сказать Екатерине огромное спасибо. Вы помогли мне увидеть, как много в нашей жизни означает красивая и стильная одежда, и как это может быть просто и сложно одновременно. раньше я просто ненавидела шоппинг, но после прохождения Катиных курсов я заранее планирую список покупок, вещи покупаются исключительно по нему, и потом носятся постоянно. Я перестала выбрасывать и дарить неношеные вещи с бирками.<br/>
<br/>
Каждый вечер я трачу 3-5 минут, чтобы спланировать свой гардероб на завтра, и это так приятно. Мне очень нравится наблюдать за теми превращениями, которые Катя дарит своим клиенткам, и я мечтаю, что когда-нибудь, возможно, у меня тоже получится записаться на шоппинг с Екатериной и получить огромное удовольствие от результата ! СПАСИБО ! Катя, вы — добрая волшебница ! я очень рада, что заочно познакомилась с Вами — Ваши трениги для меня — постоянный источник вдохновения.</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Галина Сергеева, Москва</div>
						Получила комплименты, будучи одетой и в пальто без рукавов, и в полупальто оверсайз. Плюс от прохождения имидж-практики: оттачивается взгляд на вещи; в солидном возрасте появляется возможность выбирать вещи, позволяющие сбросить несколько лет и выглядеть чуть моложе.
					</div>
					<div class="break"></div>
				</div>
				<p>В результате имидж-практики приобрела пальто без рукавов. Цвет серый в тонкую вертикальную белую полоску (однотонное в этом сезоне на мой размер найти не удалось). Ношу с однотонными серыми брюками(тон в тон). Вниз надеваю рубашку белую, черную или цвета лаванды. Нравится. Окружающие тоже заметили, что необычно. При полной фигуре это удобно. В перспективе хочу однотонное из ткани полегче.<br/>
<br/>
Еще до имидж-практики оценила достоинства пальто оверсайз. Полную фигуру делает более компактной.<br/>
<br/>
Получила комплименты, будучи одетой и в пальто без рукавов, и в полупальто оверсайз (бежевое).<br/>
<br/>
Плюсы от прохождения имидж-практики:<br/>
а) оттачивается взгляд на вещи; в солидном возрасте появляется возможность выбирать вещи, позволяющие сбросить несколько лет и выглядеть чуть моложе;<br/>
б) отбрасывается лишнее;<br/>
в) получила ссылку на магазин, где можно купить шляпу без дурацких цветов (пока еще не купила).<br/>
<br/>
Как ни странно, наиболее полезным оказалось четвертое занятие, хотя на него меньше всего рассчитывала.<br/>
<br/>
Пока не проработаны головные уборы. Но в планах это есть.</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Наталья, Москва</div>
						Самыми большими выгодами на этом тренинге для меня стали:<br/>
1 &mdash; хаос верхней одежды теперь разложен по полочкам<br/>
2 &mdash; есть яркие и эффектные варианты верхней одежды, о которых я не знала<br/>
3 &mdash; понимание своей подходящей и любимой верхней одежды
					</div>
					<div class="break"></div>
				</div>
				<p>Здравствуйте!<br/>
<br/>
До этой имидж-практики у меня в голове не было четкой картинки по верхней одежде &mdash; я знала, что существует целое море пальто разного цвета и фасона, разной длины, не говоря уже о множестве курточек и пуховиков, шуб и прочего и прочего. А что из этого выбрать, какие критерии &mdash; это было непонятно. Вместе с тем, верхняя одежда стоит дорого, и это покупка не на один сезон. У себя я неоднократно сталкивалась с тем, что верхняя одежда вроде есть, но она меня не устраивает. После определения цветотипа я поняла, что часть ее &mdash; не моего цвета. Также я не была довольна формой, моя верхняя одежда не была универсальна (не наденешь и под юбки, и под брюки).<br/>
<br/>
На имидж-практике я научилась из всего многообразия определять базовые варианты, а также то, что можно купить, если базовое наскучит. Поняла, что пока совсем не мое (например, это оказался тренч/плащ).<br/>
<br/>
Самыми большими выгодами на этом тренинге для меня стали:<br/>
1 &mdash; хаос верхней одежды теперь разложен по полочкам<br/>
2 &mdash; есть яркие и эффектные варианты верхней одежды, о которых я не знала<br/>
3 &mdash; понимание своей подходящей и любимой верхней одежды<br/>
<br/>
Больше всего мне понравилось, что я доверяю полученной информации, благодаря Катиному опыту. Спасибо Кате, что в этот раз добавила примеры одежды моего цветотипа. Так воспринималось намного лучше. Теперь надо учиться выбирать «свои» вещи в реальных магазинах &mdash; это, пожалуй, будет сложно, потому что там они не в картинках перед монитором, где Катя про каждую деталь расскажет, а на вешалках. Как говорится, важен опыт примерок ) .<br/>
<br/>
У кого основной гардероб уже собран и нужна верхняя одежда, этот тренинг подскажет, как его дополнить, а не испортить.<br/>
Большое спасибо!</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Александра, Красноярск</div>
						После имидж-практики в голове появилась ясность &mdash; я понимаю, чего из верхней одежды катастрофически не хватает, без чего можно пока обойтись, и что мне вообще не нужно. Больше всего в имидж-практике мне понравилась обратная связь от Кати &mdash; возможность получить подробную оценку своих текущих комплектов, советы, как сделать лучше, а также ее помощь в выборе новых вещей
					</div>
					<div class="break"></div>
				</div>
				<p>До имидж-практики у меня не было понимания, что из верхней одежды мне необходимо. Постоянно сталкивалась с проблемой выбора того, что надеть, чтобы было не просто тепло, но и красиво &mdash; в основном все было чисто функционально.<br/>
<br/>
У меня изначально не было цели сразу в течение имидж-практики дополнить гардероб обновками. Я хотела разобраться, что мне действительно нужно будет купить в дальнейшем, а также понять, что делать с тем, что уже есть &mdash; как освежить текущий образ. Сейчас в голове появилась ясность &mdash; я понимаю, чего из верхней одежды катастрофически не хватает, без чего можно пока обойтись, и что мне вообще не нужно (т.к. в конечном итоге моя цель &mdash; минимализм &mdash; максимум отдачи от минимума вещей).<br/>
<br/>
Выгоды от прохождения имидж-практики: &mdash; обратная связь от профессионала<br/>
— работа со своим гардеробом (ограниченные сроки дают стимул разобраться со всем как можно быстрее)<br/>
— разбор гардероба других участниц практики (возможность учиться на чужих ошибках и подмечать интересные идеи)<br/>
<br/>
Больше всего в имидж-практике мне понравилась обратная связь от Кати &mdash; возможность получить подробную оценку своих текущих комплектов, советы, как сделать лучше, а также ее помощь в выборе новых вещей, когда ты под присмотром выбираешь то, что точно идеально тебе подходит и прослужит очень долго (что немаловажно в случае дорогостоящей верхней одежды).</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Екатерина В. Москва</div>
						Я давно слушаю Катины тренинги и постоянно улучшаю свой гардероб. После тренинга действительно развивается и улучшается вкус, что дает возможность помогать с выбором одежды мужу и дочке.
					</div>
					<div class="break"></div>
				</div>
				<p>До тренинга не получалось подобрать красивое цветное пальто, у меня не было проблем с фасонами, но били проблемы с цветом в верхней одежде.<br/>
За время имидж-практики купила пальто оверсайз в красивом цвете.<br/>
<br/>
Окружающим все очень нравится, я давно слушаю Катины тренинги и постоянно улучшаю свой гардероб.<br/>
<br/>
Три самых больших выгоды от прохождения имидж-практики:<br/>
1) возможность научиться самой подбирать себе комплекты, где бы то ни было в любой стране мира<br/>
2) возможность «освежать знания» путем пересмотра записей<br/>
3) действительно развивается и улучшается вкус, что дает возможность помогать с выбором одежды мужу и дочке<br/>
<br/>
В имидж-практике мне все нравится, особенно понравился день по пальто.</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Марина К. Череповец</div>
						Я увидела, как можно создавать более женственные и стильные образы с пуховиком. Прослушав первый день, решила повязать имеющийся палантин так, чтобы создать баланс между элегантностью и спортом. Получилось довольно неплохо. Мужчины (от мальчика лет 15-ти до довольно возрастного дядечки) обращали повышенное внимание.Первый день имидж-практики был, можно сказать, ошеломительным, самым полезным с практической точки зрения. Вообще вся имидж-практика как-то встряхнула, разбудила фантазию. Появились новые идеи, причем не только о том, что нужно докупить, но и о том, как по-новому использовать имеющееся.
					</div>
					<div class="break"></div>
				</div>
				<p>Я работаю в офисе (дресс-кода, можно считать, нет, но элегантность приветствуется и в работе помогает). В свободное время хожу в кафе, театр, на выставки, в кино, в гости; ну и обычные домашние заботы, в магазины и прочее. Обычно езжу на машине, иногда &mdash; на общественном транспорте.<br/>
<br/>
У меня были некоторые сложности с верхней одеждой, из-за которых я и записалась на имидж-практику.<br/>
<br/>
Мой гардероб четко делится на 2 части: рабочий и кэжуел. Первую часть я считала (до имидж-практики) элегантной. Вторая часть моей верхней одежды &mdash; довольно спортивного характера, несколько подростковая; я считала, что в ней нельзя выглядеть презентабельно. В результате у меня не было образов, промежуточных между деловым и совсем спортивным.<br/>
<br/>
Среди деловой одежды у меня есть сшитое на заказ утепленное пальто без меха. Я не вполне понимала, с чем его носить. Мне даже казалось, что оно слишком возрастное. Я пыталась с помощью аксессуаров сделать его более женственным (что совершенно не нужно, как я теперь знаю).<br/>
<br/>
Прослушав имидж-практику, я поняла, что мои «элегантные» пальто на самом деле имеют детали спортивного характера. Т.е. они объединяют в себе элегантность и спорт. Это позволяет создавать с ними не только более-менее элегантные деловые образы, но и интересные образы для свободного времени, когда мне не нужно выглядеть совсем кэжел.<br/>
<br/>
Кроме того, я увидела, как можно создавать более женственные и стильные образы с пуховиком.<br/>
<br/>
Готовых образов еще нет, сейчас подбираю обувь и другие аксессуары для них. Рассчитываю также «оживить» в новых комплектах кое-что из того, что сейчас не ношу.<br/>
<br/>
Похвастаюсь. Незадолго до имидж-практики купила к теплому пальто элегантную трикотажную шапку (интуитивно хотелось подчеркнуть его классические элементы). Прослушав первый день, решила повязать имеющийся палантин так, чтобы создать баланс между элегантностью и спортом. Получилось довольно неплохо. Мужчины (от мальчика лет 15-ти до довольно возрастного дядечки) обращали повышенное внимание.<br/>
<br/>
Фотографию не выкладываю, потому что теперь вижу, что к палантину нужна другая шапка, а к шапке &mdash; другой палантин или шарф.
<br/><br/>
Первый день имидж-практики был, можно сказать, ошеломительным, самым полезным с практической точки зрения. После занятия я увидела свои пальто в новом свете, поняла, что они собой представляют и с чем их комбинировать. Теперь мерить-мерить-мерить. Как раз погода не позволяет перебраться в зимнюю одежду.
<br/><br/>
Вообще вся имидж-практика как-то встряхнула, разбудила фантазию. Появились новые идеи, причем не только о том, что нужно докупить, но и о том, как по-новому использовать имеющееся.
<br/><br/>
Очень помогла информация о тенденциях. Особенно порадовало добавление спорта во все другие стили. Смотрю на свою одежду и понимаю: это прямо мое.
Больше всего понравился сам формат имидж-практики. Узкая тема, 4 занятия, коротко и по существу.
<br/><br/>
Ни один из образов до конца еще не доработан. Вечерние занятия с первого раза в голове не укладываются. Тем более параллельно накладывается информация о головных уборах. Буду слушать все в записи еще раз.
<br/><br/>
Уже знаю, что нужна обувь без спортивных деталей, но не классическая, чтобы уводить теплое пальто более в кэжел, а пуховик и дубленку &mdash; наоборот, в более женственный стиль.
<br/><br/>
Нужна другая шапка к пальто, чтобы создать более расслабленный образ. Хочу попробовать шапку с вуалью; мне кажется, должна подойти. И еще одну из своих старых шапок, которую сейчас не ношу.
<br/><br/>
Нужен шарф или палантин к тому же пальто, который, наоборот, понизил бы «градус спортивности» в образе.
<br/><br/>
Нужны сумка и перчатки к пальто, чтобы создать образ «на выход». Уже есть кое-что на примете.
<br/><br/>
Точно знаю, что не буду носить шубу с джинсами, потому что юбка позволяет одеться теплее, а в нашем климате это важно.J И с трикотажной шапкой не буду шубу носить, холодно.
<br/><br/>
Тот образ, что на фотографии, менять не планирую. Очень удачно оказалось, что он соответствует тенденциям, про которые говорили на обеих имидж-практиках («Верхняя одежда» и «Головные уборы»). Единственное, когда буду подбирать сумку в образ «на выход» к пальто, проверю, чтобы она подходила и к шубе.</p>
			</div>			
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Мария М.</div>
						Катя все разложила по полочкам, очень понятно и доходчиво. Первое — хорошо уложившиеся знания в голове. Второе — возможность прослушать несколько раз и посмотреть фотографии, так как не все сразу запоминается. Третье — практика! Более уверена в магазине, понимаю что идет а что нет, понимаю с чем сочетать. Больше все понравился стиль изложения и много фотографий. До прослушивания Катиных курсов я не покупала себе платьев. А теперь мне делают комплименты в них.
					</div>
					<div class="break"></div>
				</div>
				<p>Я понимала, что верхней одежды кроме пары пуховиков у меня нет. Мне хотелось пальто, выглядеть интереснее, женственнее, стильнее, но я не понимала где его брать, какое, и какое мне нужно. Первое пальто я купила до имидж практики, было сложно, я справилась на 60%. Теперь понимаю, что нужно еще одно.<br>
<br>
После прослушивания первых двух занятий я купила себе прямое пальто своего оттенка для повседневной носки. С этим пальто я смогу собрать много образов, учитывая мой образ жизни. Я его еще не носила, так как купила в начале зимы, а оно осеннее.
<br><br>
Недавно купила себе дубленку, которая отличается от стандарных. У меня давно не было дубленки, у меня никогда не было шубы, мне хотелось чего-то стильного. Я это нашла! Я грамотно
ходила по магазинам, мерила, учитывала цвет, фасон, с чем я могу вещь носить — это все благодаря Катиным курсам.
<br><br>
Я стала заниматься гардеробом мужа. Раньше у него были только джинсы и футболки. Теперь появилось много рубашек, брюки, жилетки, интtресные кофты, цветые джинсы, с изюминкой обувь, пиджак, дубленка, пальто, часы… Он видит перемены и рад этому. Его новый лук замечают друзья. Мне интересно одевать его по новому!
<br><br>
В белой дубленке я как белая ворона в сером городе. Меня это не смущает, видимо засиделась дома и мне важно внимание. Мне самой нравится на себя смотреть в зеркало. У меня поднимается настроение, когда я смогла стильно что то подобрать или найти интересную вещь себе или мужу.
<br><br>
До прослушивания Катиных курсов я не покупала себе платьев. А теперь мне делают комплименты в них.
<br><br>
Катя все разложила по полочкам, очень понятно и доходчиво. Первое — хорошо уложившиеся знания в голове. Второе — возможность прослушать несколько раз и посмотреть фотографии, так как не все сразу запоминается. Третье — практика! Более уверена в магазине, понимаю что идет а что нет, понимаю с чем сочетать.
<br><br>
Больше все понравился стиль изложения и много фотографий. По фото можно подобные образы создать. Теперь я понимаю что много вариантов верхней одежды. Я хочу много чего себе приобрести и составлять комплекты и выглядеть интересно и стильно.</p>
			</div>			
			
			
			<div class="bl_name">Отзывы на другие тренинги и личную работу</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Екатерина</div>
						Я перестала бояться магазинов. Уже подобрала ремень под синее платье и кое-что еще из бижутерии. Сходила с мужем в ресторан. Он был горд от того, что рядом с ним женщина, на которую окружающие бросают внимательные и изучающие взгляды… Муж признался, что теперь я выгляжу так, как он любит…
					</div>
					<div class="break"></div>
				</div>
				<p>Катя, доброе утро. Буду только рада, если ты используешь мой отзыв на своем сайте. Если сочтешь необходимым, можешь его отредактировать. Писала абсолютно искренне…<br><br>

Я перестала бояться магазинов. Уже подобрала ремень под синее платье и кое-что еще из бижутерии. Сходила с мужем в ресторан. Он был горд от того, что рядом с ним женщина, на которую окружающие бросают внимательные и изучающие взгляды… Муж признался, что теперь я выгляжу так, как он любит… Безусловно, приятно, что наши вкусы и предпочтения в этом вопросе совпадают, но для меня все-таки главное, что Я ВЫГЛЯЖУ ТАК, КАК НРАВИТСЯ МНЕ и мне от этого ХОРОШО!!! Катя, не перестаю повторять — СПАСИБО!!! Ведь благодаря тебе я теперь каждое утро завидую сама себе, что я такая у себя красивая!!! СПАСИБО!!!!!!!!!!!!<br><br>

Катя — не только профессионал своего дела, но и приятный человек. На первой встрече мы обсудили много вопросов о том как я хочу выглядеть. Поразила серьёзность отношения, заполнение анкеты было интересно. После я брала у Кати 3 консультации по цвету, форме и стилю. Это очень полезно для того чтобы понимать что тебе, именно тебе подходит и не теряться в магазине. Катя обстоятельно рассказала и показала какие цвета и сочетания цветов мне подходит, снабдила меня фотографиями всех возможных пропорций и длин, которые будут подходить моей фигуре, а также навела порядок в моих представлениях о стилях. Какие туфли и сумки к какому стилю одежды больше подходят.<br><br>

Ещё мы с Катей уже совершили 2 шопинга: зимний и летний. Я очень довольна. Осталось докупить только пару вещей.<br><br>

Недавно я даже смогла помочь своей сестре подобрать летнюю одежду. И хотя мы может и потратили болше времени, чем обычно мы тратили с Катей, всё равно получилось неплохо.<br><br>

Да ещё мне очень нравится, что Катя не теряет время зря, заранее подбирает магазины и даже модели, которым могут подойти, укладывается в бюджет при этом все вещи и аксессуары сочетаются друг с другом.<br><br>

Вобщем, Катя молодец! Жду следущий шопинг. На этот раз надо купить полушубок и пальто, но это ближе к осени.</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Оля</div>
						Комплименты говорят иногда. Но по большей части пялятся девушки … молча и оценивающе)))) Только одна прокомментировала: &laquo;Что-то ты в поледнее время все лучше и лучше выглядишь .. что денег больше на шмотки тратишь что ли?&raquo;…
					</div>
					<div class="break"></div>
				</div>
				<p>				Катя, привет!<br><br>

Спасибо за все))) До вечера не могла угомониться — составляла различные комбинации…. Соседка с окрытым ртом заворожено за мной наблюдала)))<br><br>

Повторить макияж не удалось. Три попытки &mdash; все стерла. Ужас! Надо тренироваться на выходных. Блеск хороший — стойкий, не растекается. Одела серую юбку, розовый топ Шмекс и черный кардиган + серо-черные бусики. Шик! Залипаю у зеркала ))) Сегодня на работе все на меня пялятся… Комплименты говорят иногда. Но по большей части пялятся девушки … молча и оценивающе)))) Только одна прокомментировала: &laquo;Что-то ты в поледнее время все лучше и лучше выглядишь .. что денег больше на шмотки тратишь что ли?&raquo;… Мамочкииии…. Это и есть женская завить, о кторой мы говорили?<br><br>

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

И каждый раз не устану тебя благодарить за твое участие)))</p>
			</div>

			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava10.png" alt="" /></div>
					<div class="right">
						<div class="name">Анастасия Брежнева</div>
						Запуск нового тренинга! На этот раз я, не задумываясь, заказала пакет «платинум». И не пожалела об этом! Вроде бы большинство информации я уже знала, но теперь наконец-то смогла пропустить всё через себя, выполняя домашние задания!
					</div>
					<div class="break"></div>
				</div>
				<p>Добрый день, Екатерина и Команда!<br><br>

Меня зовут Брежнева Анастасия (Nastenka). Живу я в ближайшем Подмосковье. Учусь на факультете психологии в одном из Московских вузов. Правда меня очень вдохновила Ваша работа и открыла для меня новые горизонты, так что я пошла учиться на курсы имиджмейкеров.<br><br>

Дело в том, что с Вашими тренингами я познакомилась ещё год назад. Тогда я прошла тренинг «Искусство стильно одеваться». Но, к сожалению, выбрала пакет «стандарт». Вот уж поистине «Скупой платит дважды»… Как раз год назад я весила 105 кг. К тому времени рядом со мной был человек, которого это более чем устраивало, поэтому я абсолютно не комплексовала. Меня смущал только вопрос здоровья. Да и вес был набран в процессе болезни. Ну и одежду, конечно, было подобрать сложнее.… И вот, спустя год, я вешу уже 75 кг. Всё прекрасно! Только вот знания, полученные от Вас, я применяла не совсем верно. Я всё пыталась подогнать под себя (зимние цвета, хотя я «лето», какие-то не очень подходящие мне фасоны). У меня наконец-то появилась возможность покупать, и я стала настоящим шопоголиком. Накупила кучу платьев меньшего размера. Думала, что похудею и буду их носить. А когда похудела, оказалось, что они не подходят мне по фасону или просто не садятся на мою фигуру «с большим перепадом». В итоге у меня три баула с совсем новыми вещами. Ну, ничего страшного, будет мне наука!!!<br><br>

Поняв, что совершаю много ошибок, и результат меня не очень устраивает, я стала ждать: когда же вы снова сделаете для нас какой-нибудь интересненьким проект. И вот свершилось чудо! Запуск нового тренинга! На этот раз я, не задумываясь, заказала пакет «платинум». И не пожалела об этом! Вроде бы большинство информации я уже знала, но теперь наконец-то смогла пропустить всё через себя. Я уже поняла, что надо пользоваться теми данными, которые дала нам природа, и не пытаться натянуть на себя что-то «чужое». К тому же очень помогали Ваши ДЗ. Ведь теперь можно было сразу проверить, на верном ли я пути… К тому же, проблемы со здоровьем стали уходить на второй план, и я смогла более активно участвовать в процессе. Каждый вечер ждала с нетерпением и получала массу удовольствия от встречи с Вами!<br><br>

Не могу сказать, что где-то схалтурила, т.к. переслушивала все лекции и к ДЗ относилась серьёзно. Кроме того, у меня есть масса литературы по теме имиджа и стиля, которую я так же с удовольствием изучаю. Теперь думаю дело только в тренировке…<br><br>

К тому же в моей ситуации есть огромный плюс: мне даже не надо разбирать весенне-летний гардероб, т.к. он давно пуст (все вещи давно велики и отобраны). Так что с нетерпением жду потепления, что бы отправиться по магазинам, вооружившись Вашими советами и рекомендациями, а так же списком покупок на шоппинг!!! И конечно я не хочу останавливаться на достигнутом!<br><br>

Хочу отдельно поблагодарить Вас, Екатерина, за Вашу работу и за все те приятные моменты, которые Вы дарите нам на каждой встрече! Как я уже упоминала, перемены в моей жизни начали происходить ещё год назад, но сейчас они наконец-то приносят первые плоды. И это касается не только внешнего вида. Вы удивительно позитивный человек! К тому же обладаете замечательной чертой &mdash; заражаете позитивом и окружающих. Вскользь даёте много полезных установок, и я очень Вам за это благодарна. К моему выздоровлению приложили руку не только врачи, но и Вы.<br><br>

Спасибо Вам!!! Пусть всё то, что Вы дарите людям возвращается к Вам многократно!!! Счастья Вам и Вашей семье. А так же поздравляю с появлением на свет такой прекрасной дочурки с красивым именем &mdash; Весна!…</p>
			</div>

			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava11.png" alt="" /></div>
					<div class="right">
						<div class="name">Виктория Абрамова</div>
						Я поняла, что еще не хватало моему гардеробу. Как выглядеть нарядно-торжественно &mdash; красиво и удобно. Четкость подачи, структурность, наглядность. Было оч. интересно!
					</div>
					<div class="break"></div>
				</div>
				<p>Доброе время суток Екатерина и участницы тренинга.<br><br>

Меня зовут Виктория. Живу и работаю в столице Сибири, городе Новосибирске. Образование — художественное. Работа &mdash; творческая и интересная &mdash; я фотограф и дизайнер — фрилансер.<br><br>

У меня много друзей и клиентов. По роду работы &mdash; одежда мне необходима разная &mdash; от просто домашней до празднично-торжественной — но главный ее критерий &mdash; удобная, стильная, отражающая мою индивидуальность и привлекательность ))) Как оказалось &mdash; это не просто! Как выглядеть ярко и торжественно, но не привлекать внимания? ( фотограф должен быть незаметным ))) Как одеться удобно, комфортно, но стильно и привлекательно? ( свадьба- это торжество, но фотографу приходиться много двигаться, снимать сверху, приседать, иногда снимать с корточек или даже с пола &mdash; и как это сделать в платье и на каблуках? ))) Ведь не только мои работы должны говорить о моем профессионализме, но и сама моя внешность, моя самоподача, что очень важно при знакомстве с клиентами. И конечно, если ты стройная и модельной внешности &mdash; то все тебе нипочем! А если нет… Женственная фигура, но размера + .Бедра, широкая нижняя часть, размер ноги, совсем не женский ))). Разница между верхом и низом и черное, черное, черное… Какое то время этот цвет стал моим «спасением». Но я же не агент ЦРУ ))), мне хочется цвета, сочности, жизни! Начала покупать яркие вещи &mdash; но всегда смущал вопрос &mdash; а не сильно ли переукрасилась ))) Как понять? При всем при этом, комплименты к св. внешнему виду я обычно получала положительные. А вопрос стиля интересовал меня всегда. Хочется выглядеть привлекательно и нравиться себе самой, и если есть чувство стиля &mdash; то надо его развить! Так я нашла сайт гламурненько.ру! Чему безусловно рада!<br><br>

Хотела помочь себе. Я же женщина. И как известно &mdash; женщин некрасивых не бывает &mdash; есть те, кто не умеет правильно одеваться. Хочу правильно одеваться!<br><br>

Я поняла, что еще не хватало моему гардеробу. Как выглядеть нарядно-торжественно &mdash; красиво и удобно. Четкость подачи, структурность, наглядность. Было оч. интересно! Группа единомышленниц )) Не одна я такая ))) Успех &mdash; это начало моего преображения!<br><br>

Хотелось бы еще раз пройтись по каждому уроку и дополнить св.дз. Продумать, углубиться, проанализировать. Составить список покупок. Собрать комплекты. Пройти месяц имидж-клуба. Или даже имдж-про. Мне интересно дальше заниматься своим стиле-образованием. Возможно в дальнейшем это станет не просто моей личной необходимостью, но и чем-то большим для меня<br><br>

Я буду разбираться в особенностях св. фигуры и научусь подчеркивать ее достоинства. Буду выглядеть стройнее и интереснее. Смогу составлять грамотные комплекты одежды, обогащу св. палитру цветовой насыщенностью, подходящую мне по цветам и оттенкам. Помогу св. подругам выглядеть еще лучше! Буду нравиться себе! ))</p>
			</div>
			
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava12.png" alt="" /></div>
					<div class="right">
						<div class="name">Светлана Пакер, Санкт-Петербург</div>
						В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).
					</div>
					<div class="break"></div>
				</div>
				<p>Гардероб у меня был скучным и неинтересным, потом прошла базовый тренинг по имиджу у Екатерины в 2011 году и ситуация улучшилась. Сейчас поняла, что немного застопорилась в составлении более интересных комплектов, поэтому снова пришла к Кате.<br><br>

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
<td></td></tr></tbody></table></center>
			</div>
			
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava13.png" alt="" /></div>
					<div class="right">
						<div class="name">Татьяна Гарлант, Питерсфилд, Англия.</div>
						Эмоции непередаваемые — сплошной восторг! Одна моя очень хорошая знакомая сказала, что я похудела и как хорошо я выгляжу, я также получила много комплиментов от мужа и сына.
					</div>
					<div class="break"></div>
				</div>
				<p>За последние 7 лет после рождения двух деток я побывала в 4-х размерах и у меня накопилось огромное количество одежды с которой я не знала что делать. Благодаря Базовому Тренингу по Имиджу, который я прошла у Кати я узнала много полезной информации и начала применять полученные знания на практике. Но в силу занятости мне не хватало полного погружения в вопросы стиля и имиджа, не было времени пересмотреть весь гардероб, перебрать вещи, составить побольше комплектов на разные случаи жизни.<br><br>

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
</center>
			</div>

			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava14.png" alt="" /></div>
					<div class="right">
						<div class="name">Галина Галышина, г.Москва</div>
						Самыми ценными для меня стали знания о сочетании цветов. Можно сказать, я взглянула на цвета под другим углом, никогда раньше не задумывалась о логике в комбинации цветов. Тренинг помог мне избавиться от вещей, которые на самом деле не красили меня. Теперь я все чаще мыслю образом.
					</div>
					<div class="break"></div>
				</div>
				<p>Мода увлекает меня очень давно, поэтому попасть на подобный тренинг я хотела, но как-то не получалось, поэтому когда мне пришло письмо с предложением поучаствовать в семинаре я с радостью согласилась.<br><br>

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
</center>


			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava15.png" alt="" /></div>
					<div class="right">
						<div class="name">Наталья Семиряко, г.Москва</div>
						У меня в буквальном смысле открылись глаза, упали шоры. Я смотрю теперь на вещи и вижу, для кого они, нужны ли они мне. Я с совершенно другим настроением хожу теперь в магазины.
					</div>
					<div class="break"></div>
				</div>
				<p>На рассылку Катерины я подписана давно. В прошлом году очень порадовала ее книга «Секреты рационального гардероба»: коротко, внят-но, по делу. Однако это общие знания, которые самостоятельно для своего гардероба применить было сложно. Хотелось более осмысленной, так сказать, «точечной» работы над своим образом.<br><br>
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
</center>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava_none.png" alt="" /></div>
					<div class="right">
						<div class="name">Елена Асылбекова</div>
						Во время обучения — энтузиазм необыкновенный
					</div>
					<div class="break"></div>
				</div>
				<p>Добрый день, Катя, Ваша команда, мои сокурсницы по тренингу.<br><br>

Меня зовут Елена, мне 57лет, я из Казахстана, работаю врачом. У меня муж, 2 взрослые дочери, пока один зять и наконец появилось время «посмотреть в зеркало».<br><br>

&ndash; Проблемы с одеждой «не было» на мне всегда белый халат, поэтому нарядная одежда красивая, но не комбинируемая. Конечно, хотелось одеваться стильно, ярко, но не всегда это получалось, а если удавалось что-то удачно придумать, этот образ долго эксплуатировался.<br><br>

&ndash; Про рассылку узнала от Андрея Косенко, когда проходила тренинг по Турбо памяти, стала следить за материалами, летом немного позанималась в Имидж клубе, но была подготовка к свадьбе, и я не реализовалась. Зимой решила повторить попытку, тем более, что стоял вопрос об уменьшении размеров.<br><br>

Во время обучения — энтузиазм необыкновенный, «тормозила» с компьютером, но Руслан, большое ему спасибо, терпеливо мне всё объяснял, задания выполняла медленно и не посылала, тем более, что аксессуаров у меня почти нет.<br><br>

Дорабатывать надо всё, и согласитесь, комбинации у Вас были достаточно молодёжными, но тем не менее, основные законы поняла, думаю, постепенно справлюсь. Очень благодарна всем, Кате, Андрею, Руслану, и ВАМ, мои подружки, за ваши советы, поддержку активность и тщательность. Всем доброго здоровья и больших жизненных успехов</p>
			</div>
			<div class="item">
				<div class="corn1"></div>
				<div class="corn2"></div>
				<div class="top">
					<div class="left"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/outerwear/images/ava16.png" alt="" /></div>
					<div class="right">
						<div class="name">Татьяна Лучникова</div>
						Успехи начались во время первого занятия, когда я поняла, почему мне шли холодные оттенки — я по цветотипу лето, а не осень. На домашние задания я иногда тратила чуть ли не пол-дня, я наконец подобрала себе палитру и сочетания цветов, кот. мне идут — без домашнего задания эффект был бы не тот. Тема по аксессуарам перевернула все.
					</div>
					<div class="break"></div>
				</div>
				<p>Здравствуйте, Катя и участницы тренинга!<br><br>

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
Тренингом очень довольна и хочу продолжать обучаться дальше. Спасибо большое.</p>
			</div>
           <div class="item">
			  <div class="inn">
					<div class="top">
<?php
$pdo = new PDO("mysql:host=46.165.220.102;dbname=admin_glam-blog;charset=utf8", 'glamurnenko', 'E8BW2STWNyxuYQVK');
$stmt = $pdo->query("SELECT SQL_NO_CACHE count(*) as C FROM `aa_posts` left join `aa_term_relationships` on `id`=`object_id` left join `aa_terms` on `term_taxonomy_id`=`term_id` where `post_type`='reviews'");
$C = $stmt->fetch()['C'];
?>	                   
                      <center><a href="https://www.glamurnenko.ru/blog/reviews/" target="_blank">прочитать все отзывы ( <?=$C; ?> шт. )</a></center>
					  <div class="break"></div></div></div>	
			</div>

			
		</div>
	</div>

	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br><a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a> tel.: +7(499)350-23-35<br>© <?= date('Y') ?>, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>

	</div>
</div>
</body>
</html>
  

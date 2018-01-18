<?
$user_email = APP::Module('DB')->Select(
    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['email'], 'users',
    [['id', '=', $data['user_id'], PDO::PARAM_INT]]
);

$sendmail_266 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '266', PDO::PARAM_STR]
    ]
);

$sendmail_270 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '270', PDO::PARAM_STR]
    ]
);

$action_start = $sendmail_270 ? $sendmail_270 : $sendmail_266;
$action_end = strtotime('+60 hours', $action_start);
$payment_end = strtotime('+3 days', $action_end);

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
<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="robots" content="none"> 
        <title>Имидж-Практика "Шоппинг весна-лето под контролем стилиста"</title>
        
        <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/css/style.css">  
        <link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/flashtimer/compiled/flipclock.css">
   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/flashtimer/compiled/flipclock.js"></script>
        <script type="text/javascript" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/js/jquery.scrollTo-min.js"></script>
        
        <script type="text/javascript"  src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/js/main.js"></script>
    </head>
    <body>

<div class="container">
	<div class="menu">
		<div class="inn">
			<div class="ins">
				<ul>
					<li><a class="a1" href="#point1">Что вы получите</a></li>
					<li><a class="a2" href="#point2">План по неделям</a></li>
					<li><a class="a3" href="#point3">Кто ведет</a></li>
					<li><a class="a4" href="#point4">Как все будет</a></li>
					<li><a class="a5" href="#point5">Гарантия</a></li>
					<li class="last"><a class="a6" href="#point6">Записаться</a></li>
				</ul>
			</div>	
		</div>
	</div>
	
	<div class="header">
		<div class="ins">
			<div class="txt">
				<div class="slogan1">Имидж-Практика<br><span>"Шоппинг весна-лето под контролем стилиста"</span></div>
				<div class="slogan2">Стилист скажет, что покупать именно вам, чтобы у вас получился идеально<br> сочетаемый, рациональный, разнообразный и стильный гардероб на сезон<br> весна-лето без лишних затрат.</div>
			</div>
		</div>
	</div>

	<div class="block1">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Новый весенне-летний сезон,<br>но старые проблемы с гардеробом?</span></div>
				<div class="txt1">Хочу поделиться с вами результатами опроса, который <br>я проводила по весенне-летнему гардеробу.</div>
				<div class="txt2">Итак, можно выделить три категории женщин.</div>
				<div class="item1 it1"><div class="inn"><span>1 категория</span>"Каждый раз, открывая шкаф перед весенне-летним сезоном хочется все выкинуть и купить новое".</div></div>
				<div class="item1 it1"><div class="inn"><span>2 категория</span>"Понимаю, что гардероб далеко не идеальный. Но сразу все менять не готова. Хочется собрать 2-3 новых комплекта, в которых я буду выглядеть стильно, эффектно и чтобы мне нравилось!"</div></div>
				<div class="item1 it2"><div class="inn"><span>3 категория</span>"В принципе у меня есть уже вещи и комплекты, которые мне нравятся. Но чего-то не хватает. Изюминки что ли. Модных штрихов, трендов, тенденций. Хочу дособирать имеющиеся комплекты и сделать их вкусными и стильными"</div></div>
				<div class="break"></div>
				<div class="bl_name1"><span>Если рассматривать отдельные проблемы, то TOP-10 выглядит следующим образом</span></div>
				<div class="item2 l">
					<div class="name">Разрозненные шмотки, не сочетаемые в комплекты</div>
					<div class="inn">Выбираются понравившиеся отдельные вещи, в надежде, что потом к ним удастся подобрать пару. Но они так и остаются одинокими. Деньги потрачены, комплекта нет. Понравившаяся вещь не носится, потому что не с чем.</div>
				</div>
				<div class="item2 r">
					<div class="name">Скучные цвета</div>
					<div class="inn">Хочется наконец иметь цветной гардероб. И вроде бы идешь за цветной вещью, но становится непонятно с чем её сочетать, будет ли это хорошо и в итоге гардероб остается черно-серо-бежевым.</div>
				</div>
				<div class="break"></div>
				<div class="item2 l">
					<div class="name">Однотипные и проверенные варианты</div>
					<div class="inn">Вроде бы хочешь взять что-то новое, но скатываешься к тому, что уже знакомо и проверено. В результате все однотипно и скучно</div>
				</div>
				<div class="item2 r">
					<div class="name">"Плохо ориентируюсь в магазинах"</div>
					<div class="inn">"Не люблю ходить по магазинам. Откладываю шоппинг до последнего момента. Иду когда совсем приперло. Плохо ориентируюсь в магазинах. Настойчивые продавцы пугают. В итоге ухожу измученная ни с чем и с испорченным настроением"</div>
				</div>
				<div class="break"></div>
				<div class="item2 l">
					<div class="name">Проблема с обувью и аксессуарами</div>
					<div class="inn">"Вроде бы взяла платье: и цвет хорошо, и сидит хорошо. Но какую к нему взять обувь, сумочку, каким украшением можно дополнить - непонятно. В итоге все равно не получается комплекта. Ношу с чем есть"</div>
				</div>
				<div class="item2 r">
					<div class="name">Раздутый гардероб</div>
					<div class="inn">Неумение вписывать новые вещи в текущий гардероб. В результате одна вещь используется только в одном-двух комплектах, а это очень сильно раздувает гардероб</div>
				</div>
				<div class="break"></div>
				<div class="item2 l">
					<div class="name">Вещи прошлого сезона потеряли актуальность</div>
					<div class="inn">Они больше не интересные. А как их можно сделать интересными и более актуальными - непонятно.</div>
				</div>
				<div class="item2 r">
					<div class="name">Невозможно найти в магазине что нужно</div>
					<div class="inn">"Всегда иду за одним, а в итоге покупаю другое и это тянет за собой новые покупки, чтобы составить комплект"</div>
				</div>
				<div class="break"></div>
				<div class="item2 l">
					<div class="name">Верхняя одежда</div>
					<div class="inn">Непонятно какой минимум верхней одежды необходим на весенне-летний сезон</div>
				</div>
				<div class="item2 r">
					<div class="name">Несоответствие комплектов возрасту</div>
					<div class="inn">Одежда, которую привыкла покупать уже не подходит по возрасту</div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>

	<div class="block2" id="point1">
		<div class="ins">
			<div class="bg"></div>
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name">Хотите профессионально решить все проблемы<br>с гардеробом на сезон весна-лето?</div>
				<div class="bl_name1"><span>В результате уже через месяц <br>вы под контролем стилиста:</span></div>
				<div class="leftcol">
					<div class="item">
						<div class="num">1</div>
						<div class="txt">
							<div class="inn">Разберете свой гардероб и избавитесь от одежды, которая вас не украшает и тянет вас назад</div>
						</div>
					</div>
					<div class="item">
						<div class="num">2</div>
						<div class="txt">
							<div class="inn">Из того, что удачно в гардеробе, сможете собрать новые комплекты, которые станут началом вашего нового идеального гардероба</div>
						</div>
					</div>
					<div class="item">
						<div class="num">3</div>
						<div class="txt">
							<div class="inn">
								<span>Научитесь составлять карту покупок на шоппинг весна - лето разного формата:</span>
								<ul>
									<li>карта покупок с нуля</li>
									<li>карта покупок "новая жизнь старого гардероба"</li>
									<li>карта покупок "3 комплекта"</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="num">4</div>
						<div class="txt">
							<div class="inn">
								<span>Обновите свой гардероб:</span>
								<ul>
									<li>если вы настроены решительно, мы полностью обновим ваш гардероб и сделаем его стильным, эффектным, сочетаемым и рациональным</li>
									<li>если у вас нет планов полностью обновлять гардероб, вы можете приобрести несколько вкусных комплектов, которые сделают вас модной и стильной уже в этом сезоне. А еще они послужат основной для будущего гардероба</li>
									<li>если у вас  в гардеробе много удачных вещей, то вы сможете докупить к ним недостающие элементы до комплекта </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="rightcol">
					<div class="item">
						<div class="num">5</div>
						<div class="txt">
							<div class="inn">
								<span>Вы научитесь рациональному шоппингу:</span>
								<ul>
									<li>как подбирать для себя магазины</li>
									<li>как собираться на шоппинг - правила и табу</li>
									<li>алгоритм действий в магазине, который приведет к хорошему результату</li>
									<li>порядок проведения шоппинга</li>
									<li>как общаться с продавцами, чтобы они стали союзниками в подборе вашего гардероба</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="num">6</div>
						<div class="txt">
							<div class="inn">Вы заложите основу для того, чтобы каждый сезон быть стильной модной и нравится себе</div>
						</div>
					</div>
					<div class="item">
						<div class="num">7</div>
						<div class="txt">
							<div class="inn">
								<span>Ваш гардероб станет более качественным и компактным, но при этом разнообразным. </span>
								<ul>
									<li>вы сможете сочетать между собой разные вещи, чтобы одна вещь участвовала в нескольких комплектах</li>
									<li>вы научитесь составлять комплекты таким образом, чтобы гардероб выглядел не однотипным, а разнообразным</li>
									<li>в результате из достаточно небольшого количества вещей вы сможете составлять большое количество разнообразных комплектов, что даст возможность выбирать вещи лучшего качества</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="break"></div>
				<div class="txt1">В результате вы сможете чувствовать себя более красивой, яркой и желанной и всегда иметь возможность выбрать комплект, соответствующий настроению: элегантный / изящный / праздничный / веселый / спокойный / хулиганистый ...</div>
			</div>
		</div>
	</div>	
	
	<div class="block3">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Как вы получите такой результат?</span></div>
				<div class="txt">
					<div class="inn">
						<div class="name">Представляю вам уникальный формат - <span>"Имидж-Практика"</span></div>
						<p>Она подразумевает плотную работу стилиста именно с вами.</p><br>
						<p>У меня нет целью завалить вас теоретическими материалами и оставить один-на-один разбираться с ними.</p><br>
						<p>Моя главная цель - ваше преображение.</p><br>
						<p>Чтобы пройдя имидж-практику у вас был конкретный конечный результат - разобранный гардероб, список покупок на шоппинг и готовые комплекты, которые вам идут!</p>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<div class="block4">
		<div class="ins">
			<div class="bg"></div>
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Почему это возможно</span></div>
				<div class="txt">
					<div class="inn">
						<div class="name"><span>Вы можете спросить как такое возможно, ведь услуги стилиста стоят недешево.</span>Действительно. Что касается моих услуг, то:</div>
						<ul>
							<li>два дня шоппинга в Милане для клиентов стоят 1200 евро (около 70 000 рублей). И это только оплата моих услуг (при этом я целый месяц весной и целый месяц осенью провожу на шоппинге в Милане)</li>
							<li>час шоппинга в Москве стоит 5 000 рублей. За весь шоппинг клиенты обычно платят от 20 тыс рублей (при этом запись обычно идет на месяц вперед)</li>
						</ul>
					</div>
				</div>
				<div class="break"></div>
				<div class="txt1">
					<div class="inn">
						<div class="name">У вас же есть уникальная возможность получить мои знания за гораздо меньшую сумму и вот почему:</div>
						<ul>
							<li>Когда я веду большую группу, я одновременно могу рассказывать все принципы и примеры большому количеству людей. В результаты вы платите меньше.</li>
							<li>Мне не надо ходить с вами по магазинам. Вы сами будете ходить и мерить все. Но я не оставляю вас наедине с вещами. Имиджмейкер команды будет контролировать ваше преображение и давать обратную связь по карте шоппинга и подбираемым комплектам. Получается, что часть работы делаете вы. В результате вы платите меньше.</li>
							<li>Имиджмейкер команды будет комментировать ваше преображение в интернете через систему домашних заданий. Вы размещаете домашнее задание - имиджмейкер голосом комментирует его. Вы слушаете запись и применяете к своему гардеробу.</li>
						</ul><br>
						<p>Вы в любое время (даже через год) можете выложить ДЗ или вопрос и в течение недели получить ответ.</p><br>
						<p>Имиджмейкер команды отвечает в удобное время и сразу обрабатывает домашние задания многих женщин. В результате вы платите меньше, чем если бы вас консультировали лично в живую.</p>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<div class="block5">
		<div class="ins">
			<div class="bg"></div>
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Преимущества такого формата</span></div>
				<div class="bl_name1">Формат <span>"Имидж-Практики"</span> предоставляет для вас ряд преимуществ:</div>
				<div class="item it1">
					<div class="top"><div class="inn">Вы сами научитесь разбираться в том, как составлять рациональный гардероб, список покупок и как действовать на шоппинге</div></div>
					<div class="bot"><div class="inn">Неотъемлемой частью имидж-практики является обучение. Но вы получите только максимально практичные и полезные знания, которые сразу же вам надо будет применить.</div></div>
				</div>
				<div class="item it1">
					<div class="top"><div class="inn">Вы можете обучаться из любого города и в любое время</div></div>
					<div class="bot"><div class="inn">Т.к. имидж-практика проходит через интернет, то вам не надо никуда ехать и вы можете её проходить в любое время и в любых условиях. Вам будут доступны видео-записи и вы сможете пересмотреть их в любой удобный для вас момент.</div></div>
				</div>
				<div class="item it2">
					<div class="top"><div class="inn">Вы платите меньше, чем за живую работу со стилистом</div></div>
					<div class="bot"><div class="inn">Это возможно благодаря тому, что обучение идет в группе. Вы совместно с другими участниками будете получать теоретический материал. Но также вы будете получать персональную обратную связь по вашим комплектам и вопросам. Небольшой бонус: вы будете видеть ответы на вопросы других участников - а это тоже очень полезно!</div></div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>	

	<div class="block6" id="point2">
		<div class="ins">
			<div class="bl_name">План по неделям</div>
			<div class="week">
				<div class="name n1">Неделя 1</div>
				<div class="item"><div class="inn">составление и проработка карты покупок<div class="sub">Закрываем все потребности на сезон и не набираем лишнего</div></div></div>
				<div class="item"><div class="inn">вы узнаете, что обязательно должно быть в вашем гардеробе</div></div>
				<div class="item"><div class="inn">вы изучите особенности гардероба в зависимости от фигуры и образа жизни</div></div>
				<div class="item"><div class="inn">разберем верхнюю одежду на весенне-летний сезон - какой минимум должен быть, чтобы закрыть сезон</div></div>
				<div class="item"><div class="inn">узнаете как составлять действительно разнообразные комплекты</div></div>
				<div class="item"><div class="inn"><span>В результате вы составите персональную карту покупок на шоппинг</span></div></div>
			</div>
			<div class="week">
				<div class="name n2">Неделя 2</div>
				<div class="item"><div class="inn">разбор имеющегося гардероба</div></div>
				<div class="item"><div class="inn">как из карты покупок выделить несколько комплектов</div></div>
				<div class="item"><div class="inn">как эти комплекты учесть в следующих шоппингах, чтобы у вас был рациональный гардероб</div></div>
				<div class="item"><div class="inn">как быть стильной и модной в этом сезоне, не обновляя полностью свой гардероб</div></div>
				<div class="item"><div class="inn"><span>В результате вы разберете имеющийся гардероб, составите новые комплекты внутри имеющегося гардероба. Поймете, что необходимо к нему докупить. Научитесь составлять карту покупок на 3 комплекта.</span></div></div>
			</div>
			<div class="week">
				<div class="name n3">Неделя 3</div>
				<div class="item"><div class="inn">как составлять маршрут шоппинга</div></div>
				<div class="item"><div class="inn">как готовится к шоппингу</div></div>
				<div class="item"><div class="inn">как действовать на шоппинге</div></div>
				<div class="item"><div class="inn">порядок и последовательность проведения шоппинга</div></div>
				<div class="item"><div class="inn"><span>В результате вы сходите на шоппинг и составите несколько комплектов. Вы даже можете их не покупать, а просто сфотографировать и выложить мне для комментариев. Я их посмотрю и дам рекомендации. Дальше вы сможете повторять этот процесс сколько угодно, пока у вас не будет результата в виде стильных комплектов</span></div></div>
			</div>
			<div class="week">
				<div class="name n4">Неделя 4</div>
				<div class="item"><div class="inn">разбираем практический пример составления гардероба на сезон весна-лето</div></div>
				<div class="item"><div class="inn">вы увидите на реальном примере список покупок на шоппинг и результат: что было куплено и какие комплекты 
из этого удалось составить</div></div>
				<div class="item"><div class="inn">на примере научитесь как составлять рациональный, но при этом разнообразный гардероб</div></div>
				<div class="item"><div class="inn">узнаете как из минимального количества вещей составить максимальное количество комплектов</div></div>
			</div>
		</div>
	</div>
	
	<div class="block7" id="point3">
		<div class="ins">
			<div class="bl_name">Кто ведет практику</div>
			<div class="txt">
				<div class="inn">
					<div class="name">Меня зовут <span>ЕКАТЕРИНА МАЛЯРОВА</span></div>
					<p>И я хочу, чтобы вы меня знали не только с официальной стороны. Вот фотографии меня с моей дочкой, которую зовут Весна - необычное имя :-).</p><br>
					<p>Мне хочется, чтобы вы сразу уловили атмосферу будущего тренинга, что я вас буду учить имиджу также, как если бы я учила её, то есть показывать, помогать и поддерживать.</p>
				</div>
			</div>
		</div>
	</div>	

	<div class="block8">
		<div class="ins">
			<div class="bl_name">А это образ, с которым вы меня знаете <br>в интернет-жизни: по сайту и рассылкам.</div>
			<div class="item"><div class="inn">С 2007 года я работаю стилистом-имиджмейкером. У меня уже было свыше 400 клиентов и более 3000 человек проходили мои тренинги и семинары через интернет.</div></div>
			<div class="item"><div class="inn">С 2011 года каждую осень и весну езжу с клиентами на шоппинг в Милан. В результате я работаю в Милане целый месяц весной и месяц осенью.</div></div>
			<div class="item"><div class="inn">Я сторонник практических советов, которые может применить каждая женщина. Именно ими я и хочу поделиться с вами!</div></div>
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
<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/bg4.jpg') repeat;    border-bottom: 2px dotted #cacbca;height: 470px;padding: 0px 0 0px 0;">
    <div class="ins">
        <div class="pic" style="margin-bottom: 50px;     padding-top: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava4.png" alt=""></center></div>
        <div class="bl2" style="margin: 0 auto; width: 880px;font-size: 24px;line-height: 30px;color: #29302d;border-top: none;padding-top: 0px;">
            <center><p style="font-weight: normal;    font-size: 18px;">"Женщина любого размера и любого возраста может выглядеть великолепно. Главное — правильно подобрать одежду"</p>
                <p style="font-weight: bold;margin-top: 40px;text-decoration: underline;color: -webkit-link;">Эвелина Хромченко</p>
                <p style="font-size: 18px;">fashion expert, TV-presenter, journalist</p></center>
        </div>
    </div>
</div>
<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/bg4.jpg') repeat; height: 470px;padding: 0px 0 0px 0;">
    <div class="ins">
        <div class="pic" style="margin-bottom: 50px;     padding-top: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava3.png" alt=""/></center></div>
        <div class="bl2" style="margin: 0 auto;width: 880px;font-size: 24px;line-height: 30px;color: #29302d;border-top: none;padding-top: 0px;">
            <center><p style="font-weight: normal;    font-size: 18px;">"Хочу вас познакомить с талантливым стилистом Катей! Очень рекомендую заглянуть к ней на страничку и пройти тест по стилю. Узнаете много нового и полезного! По крайней мере я узнала"</p>
                <p style="font-weight: bold;margin-top: 40px;"><a href="https://www.instagram.com/p/_rDrEkrJTN/" target="_blank">Эвелина Блёданс</a></p>
                <p style="font-size: 18px;">Российская актриса театра и кино, певица, телеведущая</p></center>
        </div>
    </div>
</div>
<? } ?>
	
	<div class="block9" id="point4">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Как все будет происходить</span></div>
				<div class="txt">
					<div class="inn">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="td1"><span>1</span></td>
								<td class="td2">Вы получаете доступ в закрытый раздел на сайте, где можете смотреть и скачивать обучающие видео, в удобном для вас темпе.
</td>
							</tr>
							<tr>
								<td class="td1"><span>2</span></td>
								<td class="td2">Вы применяете все эти полученные знания к своему гардеробу. Результаты вашей работы, а также фотографии вы выкладываете в специальном закрытом разделе, а имиджмейкер моей команды их комментирует и дает рекомендации.</td>
							</tr>
							<tr>
								<td class="td1"><span>3</span></td>
								<td class="td2">Вы снова применяете рекомендации и снова выкладываете, что у вас получилось. Снова получаете комментарии и корректировки. И так пока вы не достигните нужного результата! Вы гарантированно получите ответ, даже если вы решите пройти тренинг не сразу (гарантированный период проверки ДЗ - 2 мес. Потом вы можете докупить проверку). </td>
							</tr>
							<tr>
								<td class="td1"><span>4</span></td>
								<td class="td2">У вас будет возможность в процессе имидж-практики подобрать себе гардероб на сезон весна-лето, размещать фотографии процесса подбора, свои вопросы. Мы будем все это комментировать и вы сможете приобрести лучшие для вас вещи.</td>
							</tr>
							<tr>
								<td class="td1"><span>5</span></td>
								<td class="td2">Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам. Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс. </td>
							</tr>
							<tr>
								<td class="td1"><span>6</span></td>
								<td class="td3">А служба поддержки оперативно поможет, если у вас останутся вопросы.</td>
							</tr>
						</table>		
					</div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>	
	
	<div class="block10">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>"А как долго я могу выполнять задания <br>и вы их будете проверять?"</span></div>
				<div class="txt">
					<div class="inn">
						<p>Практически бесконечно долго :)</p><br>
						<p><span>Вместе с имидж-практикой идет гарантированный период проверки ваших заданий - 2 месяца.</span></p><br>
						<p>Но потом вы сможете продлить этот срок. Или включить эту возможность, когда вам потребуется.</p>
					</div>
				</div>	
			</div>
		</div>
	</div>	
    <!--
	<div class="block11">
		<div class="ins">
			<div class="bl_name">Бонусы</div>
			<div class="item it1">
				<div class="left">
					<div class="pic"><img src="./images/temp.jpg" alt=""/></div>
					<div class="num">Бонус 1</div>
				</div>
				<div class="right">
					<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Phasellus eleifend libero nec nisl iaculis</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend libero nec nisl iaculis, ut maximus nisi vulputate. Suspendisse id viverra lectus. Ut vitae venenatis velit. Aliquam erat volutpat. Morbi eu tincidunt nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget erat venenatis, venenatis enim vitae, egestas purus. Donec eget dictum est.</p><br>
					<p>Ut id molestie risus. Donec et metus ac leo varius lacinia. Sed lorem turpis, rutrum vitae placerat quis, dignissim non tortor. Ut consequat est ac lacus volutpat, at ullamcorper velit consequat. </p>
				</div>
				<div class="break"></div>
			</div>
			<div class="item it2">
				<div class="left">
					<div class="pic"><img src="./images/temp.jpg" alt=""/></div>
					<div class="num">Бонус 2</div>
				</div>
				<div class="right">
					<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Phasellus eleifend libero nec nisl iaculis</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend libero nec nisl iaculis, ut maximus nisi vulputate. Suspendisse id viverra lectus. Ut vitae venenatis velit. Aliquam erat volutpat. Morbi eu tincidunt nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget erat venenatis, venenatis enim vitae, egestas purus. Donec eget dictum est.</p><br>
					<p>Ut id molestie risus. Donec et metus ac leo varius lacinia. Sed lorem turpis, rutrum vitae placerat quis, dignissim non tortor. Ut consequat est ac lacus volutpat, at ullamcorper velit consequat. </p>
				</div>
				<div class="break"></div>
			</div>
			<div class="item it3">
				<div class="left">
					<div class="pic"><img src="./images/temp.jpg" alt=""/></div>
					<div class="num">Бонус 3</div>
				</div>
				<div class="right">
					<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Phasellus eleifend libero nec nisl iaculis</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend libero nec nisl iaculis, ut maximus nisi vulputate. Suspendisse id viverra lectus. Ut vitae venenatis velit. Aliquam erat volutpat. Morbi eu tincidunt nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget erat venenatis, venenatis enim vitae, egestas purus. Donec eget dictum est.</p><br>
					<p>Ut id molestie risus. Donec et metus ac leo varius lacinia. Sed lorem turpis, rutrum vitae placerat quis, dignissim non tortor. Ut consequat est ac lacus volutpat, at ullamcorper velit consequat. </p>
				</div>
				<div class="break"></div>
			</div>
			<div class="item it4">
				<div class="left">
					<div class="pic"><img src="./images/temp.jpg" alt=""/></div>
					<div class="num">Бонус 4</div>
				</div>
				<div class="right">
					<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>Phasellus eleifend libero nec nisl iaculis</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eleifend libero nec nisl iaculis, ut maximus nisi vulputate. Suspendisse id viverra lectus. Ut vitae venenatis velit. Aliquam erat volutpat. Morbi eu tincidunt nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget erat venenatis, venenatis enim vitae, egestas purus. Donec eget dictum est.</p><br>
					<p>Ut id molestie risus. Donec et metus ac leo varius lacinia. Sed lorem turpis, rutrum vitae placerat quis, dignissim non tortor. Ut consequat est ac lacus volutpat, at ullamcorper velit consequat. </p>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>	
	-->
	<div class="block12" id="point5">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Примите участие в имидж-практике, <br>ничем не рискуя!</span></div>
				<div class="txt">
					<div class="inn">
						<span>Имидж-практика окупится уже после первой-второй вашей покупки.</span>
						<p>Цена ошибки при покупке вещей гораздо выше. Попробуйте заглянуть в свой шкаф и посмотреть сколько там вещей, которые вы не носите. А сколько они вам стоили?</p><br>
						<p>Эта имидж-практика гарантия того, что вы не потратите неправильно деньги на шоппинге сезона весна-лето.</p><br>
						<p>Эта имидж-практика также гарантия того, что комплекты, которые вы соберете будут рациональными, сочетающимися, стильными и вы будете чувствовать себя в них уверенно и будете нравиться себе - а это уже бесценно.</p><br>
						<p>Но что более важно - это безусловная гарантия. Мы понимаем, что вам в имидж-практике важно всё, что мы пообещали. Поэтому мы даем вам возможность пройти первую неделю имидж-практики полностью без риска!</p><br>
						<p>Если в конце этого времени вы не будете удовлетворены, тогда мы просто вернем вам деньги. Без лишних вопросов. Только вы судья!</p><br>
						<p>К сожалению, в этом случае, мы вам больше ничего не продадим в будущем, чтобы не тратить ваше и наше время.</p>
					</div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>	
	
	<div class="block13" id="point6">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>ЗАПИСАТЬСЯ НА ИМИДЖ-ПРАКТИКУ</span></div>
				<div class="txt">
                                    <div class="innn"><center>
						<p>Успейте выписать счет, пока время на таймере не истекло.</p><br>
                                                <p>Как только время на таймере истечет, имидж-практика будет стоить 10500 руб.</p></center><br>
                        <center><div class="clock"></div>
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
					</div>
				</div>	
				<div class="price">
					<div class="inn">
                        
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr class="tr1">
								<td class="td1"></td>
								<td class="td3">GOLD</td>
							</tr>
							<tr>
								<td class="td1"><span>ОСНОВНЫЕ МАТЕРИАЛЫ:</span></td>
								<td></td>
							</tr>
							<tr>
								<td class="td1">Материалы тренинга</td>
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/yes.png" alt=""/></td>
								
							</tr>
							<tr>
								<td class="td1">Проверка ДЗ, имиджмейкером команды Гламурненько.ру</td>
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
								<td class="td1">3 семинара по персональному<br /> имиджу на выбор</td>
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/yes.png" alt=""/></td>
								
						  </tr>
							
							<tr>
								<td class="td1"></td>
								<td></td>
								
							</tr>
							<tr class="tr2">
						<td class="td1"><span>Цена без скидки</span></td>
						<td><s>10 500 руб</s></td>
					</tr>
					<tr class="tr2">
						<td class="td1"><span>Ваша цена</span></td>
						<td>5 500 руб</td>
					</tr>
							<tr class="tr3">
								<td class="td1"></td>
							    <td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53254"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>" target="_blank"></a></td>
							</tr>
						</table>
                        
					</div>
				</div>	
				<div class="note"></div>
			</div>
		</div>
	</div>	
	<link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/css/style_1.css?t=1409284522"/>

<section class="whiteBg"  style="background: white;">
    <section class="page" id="faq_block">
        <h1>Часто задаваемые вопросы:</h1>
        <h2><span class="questSymbol">?</span> Что такое имидж-практика?</h2>
        <p>Имидж-практика - это сконцентрированная работа по одному из направлений имиджа. В данном случае по шоппингу сезона весна-лето. В процессе я буду выдавать вам много полезной и практической информации. Но самое главное - ваше преображение. В идеале вы будете выкладывать свои фотографии в планируемых комплектах, чтобы я могла прокомментировать и подсказать вам "что", "с чем" и "как" носить. Чтобы вы выглядели "на все 100"!</p>
        <h2><span class="questSymbol">?</span> Тренинг будет проходит через интернет или вживую надо куда-то идти?</h2>
        <p>Только через интернет. И этот формат дает ряд преимуществ для вас:<br/>
- вам не надо никуда ехать, достаточно иметь компьютер<br/>
- вы можете скачать запись и просматривать её сколько угодно и когда угодно<br/>
- цена тренинга намного ниже, чем цены живых мероприятий</p>
        <h2><span class="questSymbol">?</span> Я не успеваю сейчас оплатить!</h2>
        
        
        
        <p>Нажмите на кнопку заказать, заполните данные о себе и выберите способ оплаты. К вам на email придет информация о заказе. Сохраните её для того, чтобы оплатить на днях. Оплатить можно до <?= date('j', $payment_end) . ' ' . $months[date('m', $payment_end)] ?> включительно.</p>
        
        
        
        <h2><span class="questSymbol">?</span> Могу ли я купить имидж-практику сейчас, а проходить через месяц / полгода / год?</h2>
        <p>Да, вы можете проходить имидж-практику в любое удобное для вас время. Вместе с имидж-практикой идет гарантированный период проверки ваших домашних заданий - 2 месяца. Как только вы купили - этот период начался. Заморозить его, к сожалению, нельзя. Но вы можете потом продлить этот срок или включить, когда захотите (например, через полгода). Стоимость продления/включения = 500 рублей/мес </p>
        <h2><span class="questSymbol">?</span> Мне обязательно присутствовать онлайн или можно будет скачать запись встречи?</h2>
        <p>Тренинг предоставляется в записи. Выполненные домашние задания вы размещаете в закрытом разделе, а я их комментирую и подсказываю вам, что делать.</p>
       <h2><span class="questSymbol">?</span> Нужно ли мне в процессе тренинга покупать одежду?</h2>
        <p>Что-то вы сможете "дотянуть" из уже имеющейся у вас одежды. А что-то надо будет докупать. Но эти покупки будут очень рациональными и оправданными. Без покупки новых вещей сложно сделать что-то кардинально новое и интересное. Но в любом случае вы потратите намного меньше денег, чем просто самостоятельно закупая одежду без нашей поддержки.</p>


           
    </section>
</section>	
	<div class="block14">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Быстрая помощь службы поддержки</span></div>
				<div class="txt">
					<div class="inn">
						<p>Участницы имидж-практики могут при необходимости получить помощь от нашей службы поддержки.</p><br>
						<p>Сотрудники службы поддержки оперативно ответят на все вопросы и разберутся со случайными ошибками и неувязками. Сделают максимум возможного, чтобы все участницы ощущали себя комфортно и не оставались один на один с нерешенными проблемами.</p><br>
						<p>Связаться со службой поддержки можно с любой страницы в правом нижнем углу, либо дополнительно со страницы:</p><br>
						<p><a href="https://glamurnenko.ru/blog/contacts/">https://glamurnenko.ru/blog/contacts/</a></p>
					</div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>	
    
	<div class="block15">
		<div class="ins">
			<div class="bl_name">Отзывы</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/shopping-ss-ekateriny.png"></div>
						<div class="txt">На самом деле было сложно, потому что я всегда когда захожу в свой гардероб мне хочется сесть и заплакать….а тут пришлось составлять много комплектов. Но зато теперь я балдею, потому что всегда есть что одеть….Сейчас даже больше проблема – что выбрать из одежды, какой комплект одеть именно сегодня….Это, кстати, тоже проблема)))) </div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Здравствуйте, Катерина.
<br/><br/>
Мое место проживания город Киев, но живу я там очень редко, очень много путешествую, в основном Европа.
<br/><br/>
Мне 34 года, размер европейский 38. Рост 167, вес 55 кг. Фигура – песочные часы, цветотип: контрастная зима.
<br/><br/>
Я магистр права, но уже давно не работаю по профессии, сейчас занимаемся с сестрой своими проектами в Монако и создаем свой бренд.
<br/><br/>
Опять же повторюсь — Сейчас дресс-кода строгого нет, бывают деловые встречи, выходы с друзьями на обед или вечером на ужин, прогулки и очень много поездок. Я очень много путешествую, поэтому основная цель сделать гардероб максимально функциональным, чтобы минимум вещей максимально компоновались между собой, чтобы не таскать много чемоданов.
<br/><br/>
Проблем с гардеробом было очень много:
<br/>1. Оооочень много вещей, носить нечего! Гардероб раздут, как вы говорите, а ничего между собой не сочетается
<br/>2. Тяжело расставалась с вещами, жал было что-то выбросить или отдать, вещи дорогие
<br/>3. И даже при сочетании вещей, их такое количество, что когда начала составлять комплекты, устала, запуталась и бросила это дело
<br/>4. Почему-то раньше покупала вещи на размер меньше)))
<br/>5. И покупала всегда вещь, которая нравилась, в отрыве от всего остального гардероба и соответственно получалось как в том анекдоте, — купила кофточку, ни к чему не подошла, в итоге пришлось купить юбочку…сумочку…туфли….плащ и шубу…
<br/>6. Хочу все и сразу, прихожу в магазин и очень много покупаю всего…или другая крайность – хожу несколько дней по магазинам и ничего не могу купить
<br/>7. Много одинаковых вещей…. Если вещь подходит – беру сразу 3-4 в разных цветах
<br/><br/>
Решала эти вопросы всегда таким образом – брала стилиста и он мне делал гардероб….но только я все равно в это влезала, покупала кучу вещей не запланированных и в итоге все равно получался бардак. Поэтому решила разобраться с этим сама и научиться всему сама. И результат мне, кстати, очень нравится!
<br/><br/>
Имидж-практика помогла мне осознать мои проблемы….Я их понимала, конечно, но закрывала всегда на это глаза, пока мне не перестало хватать места в моем 50ти метровом гардеробе. Мне вообще трудно переходить всегда с теории на практику, но в этот раз, я таки заставила себя!
<br/><br/>
Конкретно:
<br/>Я перемеряла все вещи и отфоткала их – на это ушло месяца 1,5 – 2
<br/>Я разобрала гардероб и убрала не нужное! То, что мне не идет и то, что я носить не буду (конечно, я выполнила эту работу процентов на 20…убрать нужно гораздо больше вещей, но и эти 20 процентов для меня большой подвиг)
<br/>Я перестала сгребать все в магазинах
<br/>Я стала составлять список покупок и приблизительно обозначать что именно я бы хотела
<br/>Я стала фоткать себя в примерочных, да и просто фоткать как я одеваюсь
<br/>Когда я что то меряю и выбираю, я прокручиваю в голове свой гардероб и представляю, с чем я буду это носить
<br/>Я начала сочетать несочетаемые вещи (например, вечернее платье в пол с джинсовой рубашкой или юбку-рыбку вечернюю с тельняшкой)
<br/>Я купила 2 пары обуви без каблука и ношу их периодически (раньше у меня вообще не было обуви без каблука)
<br/>Я стала носить клатчи днем и мне очень нравится
<br/>Я стала носить массивные украшения
<br/>Были некоторые вещи, которые не знала, с чем сочетать. В итоге, нашла много новых сочетаний
<br/>На самом деле было сложно, потому что я всегда когда захожу в свой гардероб мне хочется сесть и заплакать….а тут пришлось составлять много комплектов. Но зато теперь я балдею, потому что всегда есть что одеть….Сейчас даже больше проблема – что выбрать из одежды, какой комплект одеть именно сегодня….Это, кстати, тоже проблема))))
<br/><br/>
Ну реакция окружающих на меня всегда положительная, но сестра младшая сказала, что я стала более модная и стильная, чем раньше. И что так хорошо я никогда не выглядела.
<br/><br/>
Недостаточно хорошо я проработала вопрос избавления от старого, но есть здесь один момент! Я еще не до конца понимаю, что мне идет лучше всего именно по моей фигуре, то есть на что заменить…потому что я купила несколько новых вещей, но вы, например, сказали, что их лучше заменить. Поэтому я все-таки сначала хочу до конца разобраться в том, что на мне более выгодно смотрится из одежды. Я пока не до конца это освоила.
<br/><br/>
Катерина, огромное вам спасибо !!!</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bbf632690e2f15ebe7188a6831cf4fc1.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bbf632690e2f15ebe7188a6831cf4fc1.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/a86af92aa6d89ef3d7b601468f82d641.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/a86af92aa6d89ef3d7b601468f82d641.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/7158c927078477f7c02626c5dc6463c2.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/7158c927078477f7c02626c5dc6463c2.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/662b2046fa53e75f2c07a81b02b26c3f.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/662b2046fa53e75f2c07a81b02b26c3f.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/83ba7212f1d6706efdafba280febf5dc.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/83ba7212f1d6706efdafba280febf5dc.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/61fbb9ef134addcc1197fa9221958c99.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/61fbb9ef134addcc1197fa9221958c99.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/8ce010b7ac2df4a60ee19391bba9b584.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/8ce010b7ac2df4a60ee19391bba9b584.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/01d8dfa8c6ac52796439bbc336c404c8.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/01d8dfa8c6ac52796439bbc336c404c8.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td></td>
</tr>
</tbody>
</table>
				  </div>
					<div class="bot">Екатерина, Киев, предприниматель</div>
				</div>	
				</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/shopping-ss-kristiny.png"></div>
						<div class="txt">Эмоции от тренинга как всегда только положительные, поскольку это мой не первый тренинг. Огромное спасибо Катерине за интересные идеи и советы.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>У меня в гардеробе было очень много низов и мало верхов.</br>
После имидж практики я поняла что многие молодёжные бренды уже мне не подходят, хотя очень трудно себя перестроить, поскольку подходящие мне теперь бренды выше по ценовому классу. Поняла, что ещё надо проводить разбор гардероба, поскольку вещей много и уже не для меня. Конкретно уже написала список недостающих вещей и помаленьку начинаю их приобретать.
</br></br>
Эмоции от тренинга как всегда только положительные, поскольку это мой не первый тренинг.</br>
Особых эмоций от окружающих я не ощутила, поскольку вкус интересно комбинировать вещи у меня всегда был, но развивать его его всегда хорошо и полезно. Огромное спасибо Катерине за интересные идеи и советы.
</br></br>
Хотелось бы по больше пособирать необычных комплектов, попытаюсь заняться этим в отпуске.</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-3.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-3.jpg" alt="" height="500"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-4.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-4.jpg" alt="" height="500"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-1.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-1.jpg" alt="" height="500"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-5.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-5.jpg" alt="" height="500"  data-mce-width="250"/></a></td>
</tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bot">Kristina Gailish, Эстония, Таллинн, стилист-консультант в женском отделе универмага</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/shopping-ss-anny.png"></div>
						<div class="txt">Имидж-практика помогла проанализировать свой гардероб, составить список покупок на шоппинг, начать мыслить образами, найти «свои» магазины. У мужа реакция положительная. Советуется, что ему купить и что надеть)</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Добрый день, Екатерина.</br>
Меня зовут Анна, г. Москва. Работаю начальником отдела продаж. Дресс-код- свободный стиль.
</br></br>
ДО тренинга гардероб был однотипный. Вроде все вещи носились, все со всем сочеталось, вещь вписывалась в комплекты, но оставалось ощущение, что нет изюминки и комплекты однотипные.
Имидж-практика помогла проанализировать свой гардероб, составить список покупок на шоппинг, начать мыслить образами, найти «свои» магазины. После имидж-практики разобрала гардероб, написала список недостающих вещей, выбросила ненужные вещи, докупила вещи по списку.
</br></br>
Эмоции при прохождении практики были положительные! Хотелось быстрее все применить. Оказывается, если действовать по алгоритму, можно получить нужный результат не тратя много времени и сил.
</br></br>
У мужа реакция положительная. Советуется, что ему купить и что надеть)
</br></br>
Спасибо за прекрасные тренинги!</br>
С нетерпением буду ждать следующих.
</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-1.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-1.jpg" alt="" width="400"  data-mce-width="400"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-2.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-2.jpg" alt="" width="400"  data-mce-width="400"/></a></td>
</tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bot">Анна, Москва, начальник отдела продаж</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/shopping-ss-iriny.png"></div>
						<div class="txt">Эмоции и у меня, и у моих домашних в процессе составления новых комплектов были самые положительные! К своему юбилею я подошла помолодевшей, несмотря на свой возраст и явно похорошевшей!Это отметили все! Благодарю Катеньку и ее команду за замечательные тренинги, делающие нас «красивыми и успешными, и ни на кого не похожими!!!:-*</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Здравствуйте! Я — Ирина Пауэлл (Irina Powell), родной город Москва, но сейчас (уже 7 лет) я живу в Великобритании в городе Кардиффе (столица Уэльса).
</br></br>
Я врач- холистический терапевт (в России была физио- и рефлексотерапевт). У меня частная практика и я езжу на машине к своим пациентам. Дресс кода особого нет, но все равно врач должен выглядеть не слишком эпатажно и драматично!:-)
</br></br>
Основная моя задача была обновить уже имеющийся гардероб, освежить его, внести новые современные нотки. Главное — я научилась составлять карту шоппинга, а не покупать отдельные вещи, не всегда вписывающиеся в мой гардероб. Очень много старых вещей выбросила, в некоторые «вдохнула» новую жизнь в других комплектах.
</br></br>
В основном я покупала вещи в интернете, но при таком способе покупок не всегда можно сразу понять подойдет ли мне вещи, и в каком комплекте/комплектах она у меня будет.
</br></br>
С помощью имидж-практики я научилась на ходить свои магазины, научилась видеть свои товары и открыла для себя массу новых магазинов в Кардиффе, в которые раньше даже не заглядывала. Спасибо огромное Кате и ее команде за прекрасное изложение и замечательные новые идеи!
</br></br>
В результате я разобрала свой гардероб,составила карты шоппинга на сейчас и позже, открыла для себя новые магазины и научилась в них видеть свои комплекты.
</br></br>
Эмоции и у меня, и у моих домашних в процессе составления новых комплектов были самые положительные! К своему юбилею я подошла помолодевшей, несмотря на свой возраст и явно похорошевшей!Это отметили все!
</br></br>
Теперь мне нужен семинар по косметике, потому что в обновлении нуждается не только одежда, но и лицо. Не всегда хватало финансов на все, что хотелось купить, но летний сезон еще будет здесь в этой стране как минимум месяца три, сентябрь тут тоже иногда бывает теплее июня! Так что некоторые вещи я докуплю чуть позже.
</br></br>
Благодарю Катеньку и ее команду за замечательные тренинги, делающие нас «красивыми и успешными, и ни на кого не похожими!!!:-*
</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-1.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-1.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-3.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-3.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
</tbody>
</table>

</center>
				  </div>
					<div class="bot">Ирина Пауэлл, Кардиффе, Великобритания, врач- холистический терапевт</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava_none.png"></div>
						<div class="txt">Катины лекции помогли навести порядок голове. Я думаю что мои эмоции лучше назвать азартом и радостью, мне теперь не составляет особого труда быстро и красиво одеваться. Я могу теперь сказать с уверенностью что на меня с интересом смотрят женщины и мужчины. Ещё у меня к добавление к составленным образам всегда уверенность и хорошее настроение.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Я художник по костюмам.В свободное от работы время занимаюсь свой дочуркой. Мы много гуляем. Ещё я осваиваю новую для специальность имиджмекер.
</br></br>
Вещей в моём гардеробе было очень много хотелось навести порядок, убрать все лишнее и разобрать гардероб, было много неудобной обуви. Мне всегда хотелось прибрать в гардеробе,но я не решалась избавиться от ненужных вещей которые я не ношу и мне не удобны. 
</br></br>
Катины лекции помогли навести порядок голове. Я постаралась быть честной и прослушав Катин семинар начала задавать себе вопросы:» Удобна обувь или нет». А вещи которые я точно знаю что их уже носить не буду отдала.
</br></br>
Я думаю что мои эмоции лучше назвать азартом и радостью, мне теперь не составляет особого труда быстро и красиво одеваться.
</br></br>
Я могу теперь сказать с уверенностью что на меня с интересом смотрят женщины и мужчины. Ещё у меня к добавление к составленным образам всегда уверенность и хорошее настроение.
</br></br>
Я не достаточно проработала комплекты на море и конечно ещё нужно потренироваться со списком на шопинг и его выполнением на практике.

</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-1.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-1.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-2.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-2.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-3.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-3.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-4.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-4.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-5.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-5.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-6.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-6.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-7.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-7.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-8.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-8.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-9.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-9.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-10.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-10.jpg" alt="" width="250"  data-mce-width="250"/></a></td>
</tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bot">Ирина Рубио, Москва, художник по костюмам</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava_none.png"></div>
						<div class="txt">После имидж-практики я вообще хожу в магазин с другими глазами. Теперь я понимаю в какой магазин за какой вещью стоит идти. Шоппинг стал более осмысленным и менее нервным. Эмоции переполняют: я увидела себя в новом свете. Поняла, что шоппинг может приносить удовольствие. Огромное спасибо за тренинг! Это для меня новая ступень в жизни.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Екатерина, спасибо, большое за тренинг.<br/>
До имидж-практики я вообще не понимала как подбирать вещи. Все вещи были разрозненные, что с чем сочетается не очень у меня вязалось. Вещи покупала все однотипные, другие даже не видела, думала не мое, не пойдет. И даже боялась пробовать.
<br/><br/>
После имидж-практики я вообще хожу в магазин с другими глазами. Я раньше ходила в магазин и ничего там не видела, я удивлялась, что люди там покупают, там ничего нормального нет…. Сейчас я четко знаю, что мне надо, вижу варианты, могу спокойно выбрать и понимаю, что мое, а что нет. Стала лучше ориентироваться в магазинах. Теперь я понимаю в какой магазин за какой вещью стоит идти. Шоппинг стал более осмысленным и менее нервным.
<br/><br/>
Сделано очень много: полностью поменяла свой гардероб, из старого осталось всего пару вещей, и то, те, которые были куплены недавно. Особенно решила проблему с обувью. Обувь для меня был самым больным вопросом, теперь все гораздо проще. Открыла для себя новые магазины, в которые раньше даже на заходила.
<br/><br/>
Эмоции переполняют: я увидела себя в новом свете. Поняла, что шоппинг может приносить удовольствие.
<br/><br/>
Получаю много комплиментов. Чувствую себя уверенней и спокойней.<br/>
Прорабатывать еще стоит много чего. Надо больше практики. Не совсем освоила тему жакетов. Как то он у меня пока не вяжется. Но может просто сейчас слишком жарко, и по погоде он у меня не пошел.
<br/><br/>
Огромное спасибо за тренинг! Это для меня новая ступень в жизни.
</p>
				  </div>
					<div class="bot">Наталья, Ростов-на-Дону, фрилансер</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/shopping-ss-natalii-3.png"></div>
						<div class="txt">После имидж-практики разобрала гардероб и научилась составлять карту покупок!! Я была в восторге от простого и понятного изложения. Карта покупок- очень нужная и полезная схема. За это отдельное спасибо!  Я чувствую себя уверенно и комфортно в новых комплектах.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Здравствуйте, Катя! Спасибо за тренинг! Я с большим удовольствием пишу отчёт о нашей совместной с Вами работе.
<br/><br/>
Основной проблемой для меня было большое количество вещей в гардеробе, но я не могла составлять комплекты из них. Много было одинаковых вещей. Много нейтральных цветов. Я всегда побаивалась ярких красок в одежде. Я не обращала внимание на тенденции, составляя свой гардероб из классических вещей. Поэтому покупка новых вещей не исправляла ситуацию, а даже усугубляла. Потому что деньги были потрачены, а ощущения новых вещей в гардеробе не было.
<br/><br/>
После имидж-практики разобрала гардероб и научилась составлять карту покупок!!!!!!!!!!!! Теперь у меня есть карта, где я отмечаю что есть и что именно надо купить. Я поняла как сделать так, чтобы вещи можно было вписывать в комплекты. Нужна тренировка, но основа есть и понимание в какую сторону двигаться дальше тоже есть. С помощью комментариев Кати, я попробовала посмотреть на свой гардероб другими глазами. Наконец-то до меня дошло, в чём разница между разными топами и от чего комплекты смотрятся по-разному. 
<br/><br/>
Меня всегда смущало ощущение слишком делового костюма. Теперь я понимаю как можно надеть жакет так, чтобы это было модно и молодо. Мне сложно объяснить, но теперь я вижу то, что раньше не замечала. Я стала иначе вести себя на шоппинге. Наконец-то выделила сегмент магазинов «для себя». 
<br/><br/>
Я усердно выполняла все домашние задания. Попробовала сходить на шоппинг с картой и маршрутом. Я старалась обратить внимание на те вещи, которые раньше обходила стороной. Наконец-то я примерила разные фасоны платьев и выделила «своё» платье. Я также попробовала составить карту покупок на сезон для своего мужа и сыновей. Карту-схему буду использовать не только для шоппинга, но и для отпуска, например. Очень легко с такой схемой собираться, так как чётко составлены комплекты и не надо брать с собой кучу ненужных вещей.
<br/><br/>
Я была в восторге от простого и понятного изложения. Карта покупок- очень нужная и полезная схема. За это отдельное спасибо! Очень помогают наглядные примеры — фотографии. Потому что слышать это одно, а видеть — это совсем другое. Лично мне наглядно легче запомнить и тенденции и цвета и фасоны.
<br/><br/>
На реакцию окружающих особого внимание не обращала. Но вот мои личные ощущения от новых знаний и образов, зашкаливают. Я чувствую себя уверенно и комфортно в новых комплектах.
<br/><br/>
Планирую заняться составлением комплектов из имеющихся вещей. Я буду пробовать постепенно дополнять то, что есть и стараться сделать классические комплекты более актуальными. В планах сделать свой гардероб супер рациональным, избавиться от однотипных вещей, стараться выглядеть по-разному за счёт составления новых комплектов. Я совсем не проработала тему украшений и гардероба для вечеринок. Я бы с удовольствием проработала гардероб осенне-зимнего сезона. 
<br/><br/>
Спасибо за Ваш труд и море полезной информации!
</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-1.jpg" target="_blank"><img class="alignleft"  title="" src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-1.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-2.jpg" target="_blank"><img class="alignleft"  title="" src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-2.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-3.jpg" target="_blank"><img class="alignleft"  title="" src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-3.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-4.jpg" target="_blank"><img class="alignleft"  title="" src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-4.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
</tr>
</tbody>
</table>

</center>
				  </div>
					<div class="bot">Наталья Смирнова, Одесса, работает в финансовой компании</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava_none.png"></div>
						<div class="txt">Имидж-практика помогла мне взглянуть на себя «со стороны» и дала инструменты к действию. И как дополнительный бонус — смогла отпустить ситуацию с тем, что поправилась и «не могу себе позволить красивых вещей» и в результате сбросила за время прохождения имидж-практики 3,5 кг и могу теперь себе позволить вещи на размер меньше :-).</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Основная проблема была в непонимании как изменить то, что не нравится. Как сделать свой образ стильный, современным и соответствующим моей внешности и ситуации? Сама пыталась покупать яркие платья, но при этом не получался законченный интересный образ.
<br/><br/>
Имидж-практика помогла мне взглянуть на себя «со стороны» и дала инструменты к действию. Уже удалось научиться видеть образы целиком и расширился горизонт восприятия того, что мне подойдет. Начало получаться в магазинах «выцеплять взглядом» интересные модели. И как дополнительный бонус — смогла отпустить ситуацию с тем, что поправилась и «не могу себе позволить красивых вещей» и в результате сбросила за время прохождения имидж-практики 3,5 кг и могу теперь себе позволить вещи на размер меньше :-).
<br/><br/>
Составила предварительный список-покупок, разобрала гардероб, исследовала магазины на предмет того, подходят они мне или нет. Составила маршрут-шоппинга.
<br/><br/>
Получила не только актуальную мне информацию, но и мотивацию на позитивные изменения. С нетерпением жду комментариев по моим домашним заданиям и готова «в бой» к новой красивой жизни.
<br/><br/>
Большое спасибо за Ваш труд и увеличение красоты вокруг!
</p>

				  </div>
					<div class="bot">Ольга, Москва, в отпуске по уходу за детьми</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava_none.png"></div>
						<div class="txt">Эмоции были только положительные и ощущение того, что моя жизнь конечно измениться к лучшему. Реакция окружающих была в основном положительная и одобряющая мой выбор (комплектов).</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Не всегда могла подобрать нужные цвета и собрать весенне/летние комплекты.
<br/><br/>
Приятно разбираться в стилях, направлениях и новых тенденциях моды,а главное полученные знания правильно применять для себя. Научилась составлять весенне-летние яркие комплекты. Изучила модные тенденции и их цветовые сочетания и стала применять к своему образу.
<br/><br/>
Эмоции были только положительные и ощущение того, что моя жизнь конечно измениться к лучшему.
<br/><br/>
Реакция окружающих была в основном положительная и одобряющая мой выбор (комплектов).
<br/><br/>
Все замечательно,только больше интересных и познавательных тренингов,в т.ч. и по мужской моде
</p>

				  </div>
					<div class="bot">Екатерина, Москва, юрист</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava_none.png"></div>
						<div class="txt">Имидж-практика помогла в более рациональном подходе к шоппингу. Карта покупок помогла понять, что конкретно нужно докупить к имеющемуся гардеробу. Список магазинов расширил границы видения. Конечно, много положительных эмоций от достигнутого на сегодня результата, и успокаивает понимание того, в каком направлении двигаться дальше, и что сейчас актуально.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Добрый день, Екатерина!<br/>
Какие проблемы были: хотелось сделать гардероб более модным, интересным, добавить новых тенденций и попробовать сочетания, которых раньше не носила. Как пыталась решить — слушала ваши семинары про тенденции и долго бродила по магазинам, изучая все подряд и ничего не находя себе)…
<br/><br/>
Имидж-практика помогла в более рациональном подходе к шоппингу. Карта покупок помогла понять, что конкретно нужно докупить к имеющемуся гардеробу. Список магазинов расширил границы видения.
<br/><br/>
И еще, как многие уже отмечали здесь, очень помогает фотка собранного комплекта — видишь себя со стороны!
<br/><br/>
— Разобрала старый гардероб весна-лето, попробовала по-новому сочетать комплекты.
<br/>— Проработала список магазинов, особенности разных брендов, изучила новые магазины средней ценовой категории.
<br/>— Составила список необходимых вещей
<br/>— Купила несколько вещей в тенденциях нового сезона и составила из них новые комплекты
<br/><br/>
Эмоции. Конечно, много положительных эмоций от достигнутого на сегодня результата, и успокаивает понимание того, в каком направлении двигаться дальше, и что сейчас актуально. Очень радуют джинсы-бойфренды и сочетания с ними).
<br/><br/>
НО еще многое надо прорабатывать, учиться видеть по-новому, старые привычки тянут назад. Я по-прежнему не всегда могу определить, удачное ли сочетание вещей или нет(, выбираю похожее на то, что у меня уже есть.
<br/><br/>
Моему мужчине нравятся комплекты с джинсами, платье, яркие туфли ). Говорит, что мне нужно добавить больше яркости и выбирать интересную не безликую обувь. На работу пока еще не все комплекты выгуляла).
<br/><br/>
Недостаточно хорошо проработала еще украшения, подходящие мне фасоны юбка + топ, сочетания с удобной обувью.
<br/><br/>
Планирую примерить еще несколько вариантов юбок, подобрать подходящие лоферы, померить разные браслеты (металлические хочется подобрать)
<br/><br/>
Спасибо вам за работу!
</p>

				  </div>
					<div class="bot">Евгения, Москва</div>
				</div>	
</div>


			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/ava_none.png"></div>
						<div class="txt">Поэтому ваш тренинг нужен как воздух, чтобы расширять кругозор. Большое спасибо Екатерина! Этот пинок был очень необходим, изменился не только мой внешний вид, но и восприятие. Я стала более уверенная и веселая. Нужно заниматься собой не только при прочтении книг и каким-то саморазвитием, нужно вкладывать в себя деньги, в свою внешность.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Здравствуйте, Екатерина!<br/>
Меня зовут Леся. Я мама двоих деток и по совместительству преподаватель в вузе. Сейчас выхожу на работу, поэтому очень важно было выглядеть презентабельно, поскольку работа со студентами этого требует.
<br/><br/>
Самая большая проблема, как мне кажется , я отстала от времени. Я видела модели одежды, но никак не решалась на покупку, боясь что это мне не подойдет и как результат покупала все те же вещи, наверное это проблема многих. Поэтому ваш тренинг нужен как воздух, чтобы расширять кругозор.
<br/><br/>
Во втором уроке я жаловалась, что нет магазинов, так вот я реально отстала)). Я поехала в Киев в торговые центры нашла массу магазинов и для себя открыла Страдивариус и Мокито. Можно найти вещи интересные, достаточно элегантные, но в то же время не старческие.
<br/><br/>
Большое спасибо Екатерина!!!!!!!!!!!!!!!! Как я уже говорила, этот пинок был очень необходим, изменился не только мой внешний вид, но и восприятие. Я стала более уверенная и веселая. Нужно заниматься собой не только при прочтении книг и каким-то саморазвитием, нужно вкладывать в себя деньги, в свою внешность.
</p>

				  </div>
					<div class="bot">Леся</div>
				</div>	
</div>

			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-ss/images/shopping-ss-iriny-3.png"></div>
						<div class="txt">У меня освободилось столько место в гардеробной! Вы меня научили составлять карту покупок! Это просто чудо! Я сейчас с огромным удовольствием хожу в магазины, и уже как то осмысленно смотрю на все. Эмоции мои только положительные!!! Теперь я знаю как составлять комплекты, как сочетать цвета. Муж заметил изменения и теперь просит чтобы я проанализировала мужские магазины,  ему очень нравится то как я выгляжу. Когда ты знаешь что и где купить, на это нужно минимум времени! </div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Екатерина, добрый день!
<br/><br/>
Занимаюсь дочкой, домашним хозяйством. Работу планирую, но она будет не офисная.
<br/><br/>
Мало сказать, что были проблемы с весенне-летним гардеробом, можно сказать что его совсем не было. Вещи 10 летней давности, кое что было и более свежее, но оно лежало мертвым грузом, так как было куплено просто на эмоциях и не вписывалось ни в какой комплект, а составить другой не получалось. 
<br/><br/>
Вы так подробно и понятно рассказали как разобрать свой гардероб, что после этой процедуры я четко увидела что у меня есть и чего нет! У меня освободилось столько место в гардеробной!!! Конечно, кое что я сложила в стопочку….но думаю это временно. Уже пару раз глянула на эти вещи и желание их носить не возникло. 
<br/><br/>
Вы меня научили составлять карту покупок! Это просто чудо! Я теперь не буду покупать лишние вещи, а это очень важно! Вы научили меня анализировать магазины, и подобрать именно свой магазин! Это вообще чудо! Раньше я бессмысленно ходила из магазина в магазин и ничего не покупала, никак не могла понять почему так! А оказывается я ходила не в свои магазины. Хотя и в свои заходила, но уже так уставала, что не могла увидеть то что нужно. А теперь начинаю видеть, у меня просто стали открываться глаза! Я сейчас с огромным удовольствием хожу в магазины, и уже как то осмысленно смотрю на все. Конечно, нужна еще практика, но СПАСИБО ОГРОМНОЕ за такие ценные теоретические знания! 
<br/><br/>
Эмоции мои только положительные!!! Теперь я знаю как составлять комплекты, как сочетать цвета. Муж заметил изменения и теперь просит чтобы я проанализировала мужские магазины. Во первых ему нравится, что я не очень много провожу время в магазине, но всегда есть результат. Во вторых ему очень нравится то как я выгляжу. Когда ты знаешь что и где купить, на это нужно минимум времени! А раньше уходил весь день, все обессиленные, без покупок, без настроения возвращались домой.
<br/><br/>
А еще я поняла, что обязательно нужно общаться с продавцами!
<br/>Они действительно наши помощники.
<br/><br/>
Я еще не очень хорошо проработала магазины. Я прошла только по масс маркету. Средний ценовой сегмент и люксовые марки оставила на осень, так как уехала на моря. И еще украшения у меня не проработаны.
<br/><br/>
Прикладываю фото своих комплектов.
<br/>Это, конечно, не 100%результат, но для меня это уже результат!
<br/><br/>
С огромным удовольствием участвовала в имидж-практике!
<br/>КАТЯ, ОГРОМНОЕ СПАСИБО ВАМ!!!</p>
<center>
<table>
<tbody>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/93eb706382af1adc14ed0236ff6ccc49.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/93eb706382af1adc14ed0236ff6ccc49.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/9361f25b964f5f11eb7f3c35e39b7010.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/9361f25b964f5f11eb7f3c35e39b7010.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/7a2362a5a416c156d819aadeed850273.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/7a2362a5a416c156d819aadeed850273.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/d003645b2f96e097ef08ce582a1bc3a4.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/d003645b2f96e097ef08ce582a1bc3a4.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/27c8c48a95a9bd5c01986cc527575eb4.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/27c8c48a95a9bd5c01986cc527575eb4.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/67ba480bc2cbc33a5b09063c46413593.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/67ba480bc2cbc33a5b09063c46413593.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/be90238c6c03d085e9483008fc800aff.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/be90238c6c03d085e9483008fc800aff.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/ec902c51c30b7f7df40dab513cda15a3.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/ec902c51c30b7f7df40dab513cda15a3.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/3767ce3a22ef5f03a8232c936ea3239b.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/3767ce3a22ef5f03a8232c936ea3239b.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>

</tbody>
</table>

</center>
				  </div>
					<div class="bot">Ольга, Москва, домохозяйка</div>
				</div>	
</div>


            
            <div class="item">
			  <div class="inn">
					<div class="top">
<?php
$pdo = new PDO("mysql:host=46.165.220.102;dbname=admin_glam-blog;charset=utf8", 'glamurnenko', 'E8BW2STWNyxuYQVK');
$stmt = $pdo->query("SELECT SQL_NO_CACHE count(*) as C FROM `aa_posts` left join `aa_term_relationships` on `id`=`object_id` left join `aa_terms` on `term_taxonomy_id`=`term_id` where `post_type`='reviews'");
$C = $stmt->fetch()['C'];
?>	                   
                      <center><a href="http://www.glamurnenko.ru/blog/reviews/" target="_blank">прочитать все отзывы ( <?=$C; ?> шт. )</a></center>
					  <div class="break"></div></div></div>	
			</div>
		</div>
	</div>
        <div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br><a href="https://glamurnenko.ru/blog/contacts/">https://glamurnenko.ru/blog/contacts/</a> tel.: +7(499)350-23-35<br>© 2005 - <?= date('Y') ?>, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>
	</div>

</div>
</body>
</html>
  

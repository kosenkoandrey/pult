<?
$user_email = APP::Module('DB')->Select(
    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['email'], 'users',
    [['id', '=', $data['user_id'], PDO::PARAM_INT]]
);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
     "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title>MakeUp Must Have</title>
   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/css/style.css"/>
   
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
	
	<script type='text/javascript' src='<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/js/jquery.scrollTo-min.js'></script>
	
	
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/js/main.js"></script>
	
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/js/slider1.js"></script>
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/js/slider2.js"></script>
	  
</head>
    
  
<body>

<div class="container">
	<div class="menu">
		<div class="inn">
			<div class="ins">
				<ul>
					<li><a class="a1" href="#point1">Невероятно</a></li>
					<li><a class="a2" href="#point2">Два пути</a></li>
                    <li><a class="a3" href="#point3">Что делать?</a></li>
                    <li><a class="a4" href="#point4">Программа</a></li>
					<li><a class="a6" href="#point6">Кто ведет тренинг?</a></li>
                    <li><a class="a8" href="#point8">Гарантия</a></li>
					<li class="last"><a class="a7" href="#point7">Записаться</a></li>
				</ul>
			</div>	
		</div>
	</div>
	
	<div class="header">
		<div class="ins">
			<div class="txt">
				А вы бы хотели,<br> чтобы <span>каждое утро визажист<br> делал вам идеальный  макияж</span><br> за 15 минут? 
			</div>
		</div>
	</div>

	<div class="block1" id="point1">
		<div class="ins">
			<div class="b1">
				<div class="txt1">Звучит невероятно, но в то же время волнующе? Да!</div>
				<div class="txt2"><p>Позвольте мне объяснить как вы можете получить подобное уже меньше, чем через месяц<br> причем не рискуя ни копейкой.</p><br><p>Для этого вам достаточно прочитать внимательно всё, что написано на этой странице.</p> </div>
			</div>
			<div class="b2">
				<div class="name">Кому: Женщине, которая заслуживает быть красивой</div>
				<div class="slider1">
					<div class="slide-list">
						<div class="slide-wrap1">
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide1.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide2.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide3.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide7.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide8.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide9.jpg" alt=""/>
								</div>
							</div>		
						</div>		
					</div>	
					<div class="navy prev-slide1"></div>
					<div class="navy next-slide1"></div>
				</div>	
			</div>
			<div class="b3">
				<div class="txt1">Эта страница для вас, если вы понимаете, что с помощью макияжа, который идет вам, вы сможете<br>  не просто чувствовать себя красивой и нравиться самой себе, но и получать больше в жизни.</div>
				<div class="txt2">Просто взгляните на эту картинку</div>
			</div>
			<div class="b4">
				<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/pic1.jpg" alt=""/>
				<div class="decor"></div>
			</div>
			<div class="b5">
				<div class="txt1">Итак, женщины, которые воспринимают себя привлекательными: </div>
				<div class="txt2">
					<ul>
						<li>Зарабатывают на 30% больше </li>
						<li>Получают в 12 раз больше комплиментов </li>
						<li>В 5 раз чаще выходят замуж </li>
						<li>Уровень настроения по 10-балльной шкале они оценивают на 7,5<br>по сравнению с 5,3 для тех, кто не считает себя привлекательной </li>
						<li>Болеют на 15,3% меньше</li>
					</ul>
				</div>
			</div>
			<div class="b6">
				<div class="name">А как вы считаете, какая женщина более привлекательная и большего получит в жизни? <br>На левой или на правой части картинки?</div>
				<div class="slider2">
					<div class="slide-list">
						<div class="slide-wrap2">
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide4.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide5.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide6.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide10.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide11.jpg" alt=""/>
								</div>
							</div>	
							<div class="slide-item">
								<div class="item">
									<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/slide12.jpg" alt=""/>
								</div>
							</div>			
						</div>		
					</div>	
					<div class="navy prev-slide2"></div>
					<div class="navy next-slide2"></div>
				</div>	
			</div>
		</div>
		<div class="bot">И вас есть два пути, как вы можете это получить</div>
	</div>
	
	<div class="block2" id="point2">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">Визажист каждое утро делает вам идеальный макияж.</div>
				<p>Удовольствие не из дешевых. </p><br>
				<p>Стандартный выезд визажиста для дневного макияжа 2000-3000 рублей. Получается, если бы вам визажист каждый день делал бы макияж, это стоило бы 2500 рублей * 365 дней = 912 500 рублей. </p><br>
				<p>Конечно, при таких условиях можно договориться на скидку. Предположим, что вы платите 1500 рублей за один макияж. Итого за год 1500 рублей * 365 дней = 547 000 рублей </p><br>
				<p>Полмиллиона :-(</p>
			</div>
			<div class="txt">
				<div class="name">Но, откровенно говоря, вы переплачиваете.</div>
				<p>Искусство визажиста состоит в том, что он может подобрать макияж совершенно разным людям и для разных ситуаций. Именно за это он берет основные деньги. </p>
				<p>НО если красить каждый день одного и того же человека... </p>
				<p>И если делать два-три типа макияжа...</p>
			</div>
			<div class="txt">
				<div class="name">То последовательность действий одна и та же:</div>
				<ul>
					<li>определить тип кожи</li>
					<li>определить цвета, которые использовать </li>
					<li>выбрать инструменты </li>
					<li>нанести макияж по схеме </li>
					<li>использовать техники скульптурирования лица при необходимости (скорректировать нависшее веко, выделить скулы, замаскировать второй подбородок, скорректировать нос и/или форму глаз...)</li>
				</ul>
			</div>
		</div>	
	</div>

	<div class="block3" id="point">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">Забрать себе все деньги</div>
				<p>Вы можете получить такой же результат, как если бы вас каждое утро красил визажист при этом не переплачивая полмиллиона.  </p>
			</div>
			<div class="txt">
				<div class="name">Что для этого надо: </div>
				<p>УЗНАТЬ ПОСЛЕДОВАТЕЛЬНОСТЬ ДЕЙСТВИЙ ИДЕАЛЬНОГО МАКИЯЖА ДЛЯ СЕБЯ И ПОТРЕНИРОВАТЬСЯ НЕСКОЛЬКО РАЗ СДЕЛАТЬ ЕГО.</p><br>
				<p>После этого вы сможете сделать макияж на таком же уровне (ну может в первое время чуть менее профессионально, но это не будет так заметно). </p><br>
				<p>И вам не надо переплачивать за лишние знания и квалификацию визажиста. </p><br>
				<p>Вы сами для себя можете стать таким профессионалом. И делать себе идеальный макияж за 15 минут. </p><br>
				<p>А сэкономленные деньги (500 тыс рублей!) вы можете потратить на себя!</p>
			</div>
		</div>	
	</div>
	
	<div class="block4" id="point">
		<div class="ins">
			<div class="txt">
				<div class="name">Почему не работают уроки на YouTube?</div>
				<p>До этого момента вы, вероятно, читали статьи о правильном макияже. Или смотрели какие-нибудь обучащие видео. Но у вас все равно не получалось то, чего вы хотели.  </p><br>
				<p>Почему?  </p><br>
				<p><span>Здесь несколько причин. </span></p><br>
				<ul>
					<li>Многие такие видео или статьи продвигают какую-то определенную косметику. Но подойдет ли эта косметика именно вам или нет - никто не заботится. </li>
					<li>Эти уроки могут хорошо показывать какую-то технику... и вроде бы все правильно. НО они не учитывают ваших особенностей. Именно вашего типа кожи, именно ваших цветов, именно ваших особенностей лица. В результате стандартные советы не работают.  </li>
				</ul>
				<p>А если вы ошибаетесь хоть в одном элементе, макияж не срабатывает.</p>
			</div>
			<div class="bg"></div>
		</div>	
	</div>

	<div class="block5" id="point3">
		<div class="ins">
			<div class="txt">
				<div class="name">Что же делать?</div>
				<div class="b1">
					<p>Именно для этого я создала систему </p><br>
					<p><span class="sp1">"MakeUp Must Have: идеально подходящий вам макияж за 15 минут в день"</span></p><br>
				</div>
				<div class="b1">
					<p><span class="sp2">Чем эта система отличается от обычных уроков?</span></p><br>
					<p>Здесь ответственность за ваш макияж я беру на себя. </p>
					<p>Ваш идеальный макияж становится моей целью. </p>
					<p>Вы делаете то, что я говорю и получаете идеальный результат.</p>
				</div>
				<div class="b1">
					<p><span class="sp2">Особенности системы:</span></p><br>
					<ul>
						<li>вы получаете всестороннюю информацию о макияже. Начиная с определения типа кожи и далее все пошагово до результата.  </li>
						<li>при этом вы получаете только то, что вам нужно и ничего лишнего, чтобы не откладывать ваше преображение </li>
						<li>вы получаете мое сопровождение. На каждом этапе я смотрю, что у вас получилось, даю комментарии и при необходимости корректирую, исходя из особенностей вашей кожи и вашего лица</li>
					</ul>
				</div>
			</div>		
		</div>	
	</div>

	<div class="block6" id="point">
		<div class="ins">
			<div class="name">Моя цель:</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico5.png" alt=""/></td>
					<td class="td2">Не просто выдать информацию, а чтобы вы получили результат в виде идеального для вас дневного и вечернего макияжа! Такой результат, чтобы подруги думали, что вам каждое утро делает макияж супер-визажист. Чтобы шептались и спрашивали как такое возможно. Чтобы вас не узнавали с первого взгляда на работе, чтобы тайком поглядывали и невзначай спрашивали бы у вас совета.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico6.png" alt=""/></td>
					<td class="td2">Вы получите 5-летний опыт профессионального визажиста сконцентрированный в 5 модулях: только практика, пошаговые инструкции и конкретные рекомендации. Сотни визажистов и клиентов прошли обучение под моим руководством и я знаю с какими сложностями вы можете столкнуться и как вам помочь.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico7.png" alt=""/></td>
					<td class="td2">Вы не останетесь один на один с зеркалом, я отвечу на все ваши вопросы. Те мэйк-апы, которые после самостоятельного просмотра видео-роликов и картинок у вас не получались и приходилось смывать, после этого тренинга вы будете делать легко и быстро.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico8.png" alt=""/></td>
					<td class="td2">Здесь не будет отдельных вырванных из контекста техник, которые дают непредсказуемый результат на лице.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico9.png" alt=""/></td>
					<td class="td2">Специально для этого тренинга я переработала весь свой практический опыт в простые и практичные советы. Они легко применимы в жизни, даже если до этого вы с трудом наносили блеск на губы.</td>
				</tr>
			</table>	
		</div>	
	</div>

	<div class="block7" id="point">
		<div class="ins">
			<div class="txt">
				<div class="name">А получится ли у вас?</div>
				<span class="sp1">На самом деле для меня не важно:</span>
				<ul>
					<li>умеете ли вы сейчас краситься или стараетесь избегать этой процедуры</li>
					<li>сколько времени у вас уходит утром на то, чтобы накраситься</li>
					<li>умеете ли вы подобрать себе цвет косметики</li>
					<li>умеете ли вы пользоваться тем или иным инструментом или нет</li>
					<li>насколько по-вашему мнению у вас хорошее или плохое лицо для макияжа</li>
				</ul>
				<span class="sp1">Я уверена, что ваше лицо выглядит только на   10%<br> от вашего потенциала... <br>просто потому, что вы не знаете как правильно нанести макияж, чтобы показать вашу красоту на 100%</span>
				<span class="sp2">Просто потому что вы не знаете:</span>
				<p>как правильно выбрать цвета, чтобы они освежали лицо и выглядели естественно</p><br>
				<span class="sp2">Просто потому что вы не знаете:</span>
				<p>какие схемы и как использовать - так, чтобы макияж не занимал много времени но при этом был эффектным</p><br>
				<span class="sp2">Просто потому что вы не знаете:</span>
				<p>как правильно скульптурировать лицо - так, чтобы учесть все особенности и подчеркнуть достоинства</p><br>
				<p>И все проблемы с макияжем решаются автоматически, если вы знаете  простые и понятные правила и техники.</p><br>
				<p>Однажды изучив их, вы можете пользоваться ими постоянно. </p><br>
				<p>Со стороны может показаться, что это что-то сложное и нереальное.Но когда вы узнаете секрет - правила и последовательность действий, - успех становится неизбежным. </p>
			</div>
		</div>	
	</div>

	<div class="block8">
		<div class="ins">
			<div class="txt">
				<div class="name">И я хочу доказать вам это <br>совершенно без всякого риска <br>с вашей стороны!</div>
				<p>И вот каким образом:</p><br>
				<p>Все, что вам надо - это записаться на тренинг <br><span class="sp1">"MakeUp Must Have: идеально подходящий вам макияж за 15 минут в день".</span></p><br>
				<p><span class="sp2">При этом все риски я беру на себя. </span><br>Вы получаете доступ в тренинг и просто выделяете себе 5 вечеров на то, чтобы узнать "секрет вашего идеального макияжа".</p><br>
				<p>Уже после первого вечера вы можете начать применять знания и...</p>
			</div>
		</div>	
	</div>

	<div class="block9">
		<div class="ins">
			<div class="txt">
				<div class="name">Будьте готовы к вашему преображению!</div>
				<ul>
					<li>После первого же урока вы уверенно подберете подходящие именно вам косметические средства, чтобы ваша кожа выглядела здоровой и свежей.</li>
					<li>Ни один консультант в магазине не сможет больше продать вам лишнюю косметику, вы будете точно знать какие цвета и текстуры нужны вам для идеального макияжа.</li>
					<li>Макияж станет для вас простым ежедневным 15-минутным ритуалом между чашкой кофе и утренним комплиментом от восхищенного мужа.</li>
					<li>Коллеги и подруги будут умолять поделиться вашим секретом: когда и где вы успели отдохнуть и так похорошеть!?</li>
				</ul>
			</div>
		</div>	
	</div>

	<div class="block10" id="point4">
		<div class="ins">
			<div class="txt">
				<div class="name">Как у вас все это получится?</div>
				В нашей системы по шагово будем идти к цели   "идеальному макияжу".<br>Вся система обучения разбита на модули с четкой целью на каждом шаге.
			</div>
		</div>	
	</div>
	
	<div class="block11">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">ОПРЕДЕЛЕНИЕ ТИПА И ОСОБЕННОСТЕЙ ВАШЕЙ КОЖИ</div>
				<ul>
					<li>Типы кожи и как определить тип вашей кожи</li>
					<li>Как учитывать в макияже особенностей кожи (пигментные пятна, неровности, воспаления, прыщи, купероз).</li>
					<li>Как правильно ухаживать за кожей и подготовить её к нанесению макияжа</li>
					<li>Как подобрать косметику и инструменты для макияжа с учетом типа и особенностей вашей кожи</li>
				</ul>
			</div>
		</div>	
	</div>
	
	<div class="block12">
		<div class="ins">
			<div class="txt">
				В результате вы определите тип вашей кожи и подберете подходящие косметические средства для<br> идеального макияжа.
			</div>
		</div>	
	</div>
	
	<div class="block13">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">РАЗБИРАЕМСЯ С КОСМЕТИЧКОЙ</div>
				<ul>
					<li>Что должно быть в вашей косметичке с учетом типа и особенностей вашей кожи</li>
					<li>Разбираем вашу косметичку и составляем список покупок для обновления</li>
					<li>Как выбирать косметику в магазине</li>
					<li>Как не ошибиться с цветом в магазине</li>
				</ul>
			</div>
		</div>	
	</div>
	
	<div class="block14">
		<div class="ins">
			<div class="txt">
				В результате вы составите список необходимой косметики с учетом типа и особенностей вашей<br> кожи, научитесь выбирать подходящие именно вам средства в магазине и обновите косметичку.
			</div>
		</div>	
	</div>
	
	<div class="block15">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">ВАШИ ЦВЕТА В КОСМЕТИКЕ</div>
				<ul>
					<li>Как определить подходящие цвета косметики исходя из цвета ваших глаз, волос и ваших нарядов</li>
					<li>Как подобрать цвет тонального средства</li>
					<li>Как правильно подобрать цвета корректирующих средств</li>
					<li>Как применять яркие цвета теней и губной помады в вашем макияже</li>
				</ul>
			</div>
		</div>	
	</div>
	
	<div class="block16">
		<div class="ins">
			<div class="txt">
				В результате вы определите какие цвета макияжа вам идут и сделают ваш макияж<br> выразительным.Научитесь добавлять яркие акценты в ваш макияж.
			</div>
		</div>	
	</div>
	
	<div class="block17">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">БАЗОВЫЕ ТЕХНИКИ НАНЕСЕНИЯ ДНЕВНОГО И ВЕЧЕРНЕГО МАКИЯЖА</div>
				<ul>
					<li>Идеальный дневной макияж за 15 минут</li>
					<li>Выразительный вечерний образ за 25 минут</li>
					<li>Рисуем стрелку, которая подойдет именно вам</li>
				</ul>
			</div>
		</div>	
	</div>
	
	<div class="block18">
		<div class="ins">
			<div class="txt">
				В результате вы освоите базовые техники нанесения дневного и вечернего макияжа с<br> минимальными затратами времени.Научитесь рисовать свою идеальную стрелку.<br>Уже на этом шаге вы будете поражены преображением, которое случится с вами!
			</div>
		</div>	
	</div>
	
	<div class="block19">
		<div class="ins">
			<div class="txt">
				<div class="label"></div>
				<div class="name">ТЕХНИКИ КОРРЕКЦИИ ЛИЦА С ПОМОЩЬЮ МАКИЯЖА</div>
				<ul>
					<li>Как сделать ровный цвет лица</li>
					<li>Как сделать лицо более худым</li>
					<li>Как подчеркнуть скулы</li>
					<li>Как освежить лицо и создать здоровый румянец</li>
					<li>Как корректировать темные круги под глазами</li>
					<li>Как корректировать нос</li>
					<li>Как подчеркнуть форму глаз</li>
					<li>Как скорректировать особенности глаз: нависающее веко, восточные глаза, опущенный уголок</li>
					<li>Как корректировать брови с учетом индивидуальных особенностей лица</li>
					<li>Как скрыть второй подбородок</li>
				</ul>
			</div>
		</div>	
	</div>
	
	<div class="block20">
		<div class="ins">
			<div class="txt">
				И КОГДА ВЫ ВЗГЛЯНЕТЕ В ЗЕРКАЛО ПОСЛЕ ПОСЛЕДНЕГО МОДУЛЯ... ЭТО БУДЕТ ТОЧКА "НЕВОЗВРАТА". <br>ВАМ НУЖНО БУДЕТ ТОЛЬКО СУМЕТЬ ПОВЕРИТЬ, ЧТО ЭТА КРАСАВИЦА   ЭТО ВЫ!
			</div>
		</div>	
	</div>
	<div class="block22" id="point6">
		<div class="ins">
			<div class="name">Кто ведет тренинг?</div>
			<img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/pic2.png" alt=""/>
			<p><span>Бардина Наталья - визажист  и тренер в международной косметической компании.</span></p>
			<p>За время работы с 2009 года провела более 300 мастер-классов по макияжу.</p>
			<p>Консультации для звезд эстрады: Подольской Наталье, Юлианну, Елке, Панайотову Александру, Саше Мельниковой.</p>
			<p>Работала на показах MANGO, FABI, Киры Пластининой,  Вики Газинской, Elie Saab,<br> Дмитрия Логинова, Александра Арутюнова.</p>
			<p>Участвовала в подготовке конкурсанток для Мисс Россия 2013.</p>
			<p>Макияж для звездных гостей на открытии Кинотавра в Сочи.</p>
			<p>Съемки для глянцевых фешн-журналов: SNC, Дорогое удовольствие, Star Hit.</p>
		</div>	
	</div>

	<div class="block23">
		<div class="ins">
			<div class="name">Как все будет проходить?</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico13.png" alt=""/></td>
					<td class="td2">Формат занятий: презентации и видео-уроки.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico14.png" alt=""/></td>
					<td class="td2">Все материалы вы сможете скачать и просмотреть в удобном для вас режиме.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico15.png" alt=""/></td>
					<td class="td2">Часть уроков будет записана на видео и вы увидите все тонкости нанесения макияжа.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico16.png" alt=""/></td>
					<td class="td2">В конце каждого модуля вы получите практические задания.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico17.png" alt=""/></td>
					<td class="td2">Вы выкладываете результаты вашей практики в специальном закрытом разделе.А я комментирую ваше преображение и даю рекомендации.</td>
				</tr>
                <tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico20.png" alt=""/></td>
					<td class="td2">В процессе прохождения тренинга вы сможете разобраться со всеми вопросами о макияже.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico18.png" alt=""/></td>
					<td class="td2">Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам.Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/makeup/images/ico19.png" alt=""/></td>
					<td class="td2">А служба поддержки оперативно поможет, если у вас останутся вопросы.</td>
				</tr>
			</table>	
		</div>	
	</div>
	
	<div class="block24" id="point8">
		<div class="ins">
			<div class="txt">
				<div class="name">Это сработает для вас или вы не заплатите ни копейки!</div>
				<p>Цена этого тренинга - намного меньше, чем вы тратите на косметику и которой не пользуетесь даже на 10% от её возможностей.</p><br>
				<p><span>Этот тренинг   гарантия того, что вы не потратите в будущем деньги, на лишнюю не подходящую вам косметику.</span></p><br>
				<p>Но что более важно - это безусловная гарантия. Я понимаю, что вам в тренинге важно всё, что я пообещала. Поэтому я даю вам возможность изучать тренинг целый месяц полностью без риска!</p><br>
				<p>Если в конце этого времени вы не будете удовлетворены, тогда я просто верну вам деньги. Без лишних вопросов. <br>Только вы судья!</p><br>
				<p>К сожалению, в этом случае, я вам больше ничего не продам в будущем, чтобы не тратить ваше и мое время.</p>
			</div>
		</div>	
	</div>

	<div class="block25" id="point7">
		<div class="name">Записывайтесь прямо сейчас!</div>
		
<div align="center" class="txt">
    <p style="font-size: 25px;">
        <strong>
            Стандартная цена тренинга: <strike>9875</strike> рублей 
            <br><br>
            Чтобы получить тренинг со скидкой 50%, запишитесь в предварительный список ниже.
            <br><br>
            Скидка будет доступна только 3 дня. Запишитесь в предварительный список, чтобы не пропустить!
        </strong>
    </p>
                        <br><br>
                        
                        
                        
                        
<?
if (APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['COUNT(id)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'preentry', PDO::PARAM_STR]
    ]
)) {
    ?>
    <div align="center">Вы уже в списке на получение скидки</div>
    <?
} else { 
    ?>
    <div align="center">
        <iframe style="border:0px; border-width:0px;" width="100%" height="600px" align="middle" src="<?= APP::Module('Routing')->root ?>products/makeup/form?email=<?= $user_email ?>&user_tunnel_id=<?= $data['id'] ?>&user_id=<?=$data['user_id']?>"></iframe>
    </div>
    <?
}
?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
			</div>
		</div>	
	</div>
	
	<div class="block26">
		<div class="ins">
			<div class="txt">
				<div class="name">Быстрая помощь службы поддержки</div>
				<p>Вы при необходимости можете получить помощь от нашей службы поддержки.</p><br>
				<p>Сотрудники службы поддержки оперативно ответят на все ваши вопросы и разберутся со случайными ошибками и неувязками.Сделают максимум возможного, чтобы вы ощущали себя комфортно и не оставались один на один с нерешенными проблемами.</p><br>
				<p>Связаться со службой поддержки можно с любой страницы в правом нижнем углу, либо дополнительно со <a href="https://www.glamurnenko.ru/blog/contacts/">страницы</a></p>
			</div>
		</div>
	</div>	

<!--	<div class="block27">
		<div class="ins">
			<div class="name">Отзывы</div>
			<div class="item">
					<div class="top">
						<div class="pic"><img src="./images/ava1.png" alt=""/></div>
						<div class="txt">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie malesuada sapien, in vehicula tortor fringilla eu. Curabitur a nisl at tellus congue placerat id quis quam. Cras pretium in urna sit amet aliquam. Pellentesque congue at est vestibulum consectetur. Praesent erat urna, posuere a nisl quis, accumsan elementum odio. Sed turpis felis, ullamcorper vitae volutpat ut, pellentesque sit amet magna. Morbi eget est a lorem maximus feugiat. Interdum et malesuada fames ac ante ipsum primis in faucibus.
						</div>
					</div>
					<div class="center">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit orci quis urna pretium, quis mollis lorem facilisis. Nulla elementum felis dui, sit amet luctus lacus vulputate non. Maecenas tincidunt cursus augue ut malesuada. Vestibulum luctus justo vel condimentum pharetra. Ut quis pellentesque mauris. Donec pulvinar tellus ac nunc molestie posuere. Fusce ultricies pellentesque nunc, a scelerisque metus finibus id. Proin et dui rutrum, tincidunt magna eu, consequat libero. Donec in velit eu augue imperdiet eleifend.</p><br>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit orci quis urna pretium, quis mollis lorem facilisis. Nulla elementum felis dui, sit amet luctus lacus vulputate non. Maecenas tincidunt cursus augue ut malesuada. Vestibulum luctus justo vel condimentum pharetra. Ut quis pellentesque mauris. Donec pulvinar tellus ac nunc molestie posuere. Fusce ultricies pellentesque nunc, a scelerisque metus finibus id. Proin et dui rutrum, tincidunt magna eu, consequat libero. Donec in velit eu augue imperdiet eleifend.</p>
					</div>
					<div class="bot">Елена Соломончук, г.Москва, врач-физиотерапевт</div>
			</div>
			<div class="item">
					<div class="top">
						<div class="pic"><img src="./images/ava1.png" alt=""/></div>
						<div class="txt">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie malesuada sapien, in vehicula tortor fringilla eu. Curabitur a nisl at tellus congue placerat id quis quam. Cras pretium in urna sit amet aliquam. Pellentesque congue at est vestibulum consectetur. Praesent erat urna, posuere a nisl quis, accumsan elementum odio. Sed turpis felis, ullamcorper vitae volutpat ut, pellentesque sit amet magna. Morbi eget est a lorem maximus feugiat. Interdum et malesuada fames ac ante ipsum primis in faucibus.
						</div>
					</div>
					<div class="center">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit orci quis urna pretium, quis mollis lorem facilisis. Nulla elementum felis dui, sit amet luctus lacus vulputate non. Maecenas tincidunt cursus augue ut malesuada. Vestibulum luctus justo vel condimentum pharetra. Ut quis pellentesque mauris. Donec pulvinar tellus ac nunc molestie posuere. Fusce ultricies pellentesque nunc, a scelerisque metus finibus id. Proin et dui rutrum, tincidunt magna eu, consequat libero. Donec in velit eu augue imperdiet eleifend.</p><br>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit orci quis urna pretium, quis mollis lorem facilisis. Nulla elementum felis dui, sit amet luctus lacus vulputate non. Maecenas tincidunt cursus augue ut malesuada. Vestibulum luctus justo vel condimentum pharetra. Ut quis pellentesque mauris. Donec pulvinar tellus ac nunc molestie posuere. Fusce ultricies pellentesque nunc, a scelerisque metus finibus id. Proin et dui rutrum, tincidunt magna eu, consequat libero. Donec in velit eu augue imperdiet eleifend.</p>
					</div>
					<div class="bot">Елена Соломончук, г.Москва, врач-физиотерапевт</div>
			</div>
		</div>
	</div>	-->
	
	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br><a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a> tel.: +7(499)350-23-35<br>© 2005 - <?= date('Y') ?>, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>
	</div>

</div>
</body>
</html>
  

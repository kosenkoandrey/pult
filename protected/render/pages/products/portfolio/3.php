<?
$action_end = strtotime('+24 hours', APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '205', PDO::PARAM_STR]
    ]
));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
     "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title>КАК СТИЛИСТУ-ИМИДЖМЕЙКЕРУ ПОЛУЧИТЬ ПЕРВЫХ КЛИЕНТОВ, СХОДИТЬ НА ШОППИНГ, ЗАПУСТИТЬ САРАФАННОЕ РАДИО И СОЗДАТЬ ПОРТФОЛИО…</title>
   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/css/style.css"/>
   
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
	
	<script type='text/javascript' src='<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/js/jquery.scrollTo-min.js'></script>
	
	
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/js/main.js"></script>
   <link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/flashtimer/compiled/flipclock.css">
   <script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/flashtimer/compiled/flipclock.js"></script>
	
	  
</head>
    
  
<body>

<div class="container">
	<div class="menu">
		<div class="ins" style="width: 1080px;">
			<ul>
				<li><a class="a1" href="#point1">что вы получите</a></li>
				<li><a class="a2" href="#point2">программа</a></li>
				<li><a class="a5" href="#point5">кто ведет</a></li>
				<li><a class="a6" href="#point6" style="color:#75e42f"><strong>записаться</strong></a></li>
				<li><a class="a3" href="#point3">FAQ</a></li>
			</ul>
		</div>
	</div>
	
	<div class="header">
		<div class="ins">
			<div class="txt1">Как стилисту-имиджмейкеру получить первых клиентов, сходить на шоппинг, запустить сарафанное радио и создать портфолио… </div>
			<div class="txt2">и все это за наш счет и не вкладывая ни копейки в рекламу!</div>
		</div>
	</div>

	<div class="block1">
		<div class="ins">
			<div class="txt1">
				<span>Кому: имиджмейкеру, который заслуживает клиентов...</span>
				<p>Этот курс специально разработан для стилистов-имиджмейкеров, которые никак не могут пойти на шоппинг с клиентом или не могут сделать себе портфолио. </p><br>
				<p>Теперь вы можете "убить двух зайцев одним выстрелом" и уже через месяц получить великолепное портфолио для своего сайта и реальную практику шоппингов с клиентами!</p>
			</div>
			<div class="txt2"  id="point1">Просто за месяц вы получите следующее:</div>
			<div class="bl b1"><span>Готовое портфолио, которое<br> будет показывать ваш<br> профессионализм и привлекать<br>новых клиентов</span></div>
			<div class="bl b2"><span>Проведете несколько<br> шоппингов с реальными<br> клиентами, даже если у вас еще<br> не было клиентов</span></div>
			<div class="bl b3"><span>Получите клиентов, которые<br> захотят обратиться к вам снова</span></div>
			<div class="bl b4"><span>Преодолеете свой страх перед<br> клиентами и первыми<br> шоппингами</span></div>
			<div class="bl b5"><span>Покажете всем вокруг, что вы<br> достойны называться<br> имиджмейкером</span></div>
			<div class="bl b6"><span>Запустите сарафанное радио<br> для привлечения новых<br> клиентов</span></div>
			<div class="txt3"><span>И самое важное и приятное: "Мы будем искать вам клиентов!"<br>И еще более важный момент - вы не рискуете ни копейкой!</span></div>
			<div class="txt4">Как это все возможно? Читайте дальше.</div>
		</div>
	</div>
	
	<div class="block2" id="point1">
		<div class="ins">
			<div class="bg"></div>
			<div class="bl1">
				<div class="txt1">Почему мы обращаемся именно к начинающим имиджмейкерам?</div>
				<div class="txt2">
					<p>Ответ простой: </p><br>
					<p>Просто потому, первые шоппинги - это ключевая точка в вашем развитии. Вы или будете работать имиджмейкером или это так и останется вашей мечтой.</p><br>
					<p>Выбор только за вами. </p><br>
					<p>Потому что если вы ничего не будете делать, то будете жалеть о том, что так и не решились начать заниматься любимым делом - работать по профессии, которая приносит не только деньги, но радость, удовольствие, чувство самореализации и ощущение того, что делаешь на самом деле важное.</p><br>
				</div>
				<div class="txt3">Чем дольше вы будете откладывать первые шоппинги, тем больше вас будут беспокоить мысли:</div>
				<div class="miniblock m1">а что, если клиенту не понравится<div class="corn"></div></div><br>
				<div class="miniblock m2">а что, если он попросит деньги назад<div class="corn"></div></div><br>
				<div class="miniblock m3">а что, если я не смогу<div class="corn"></div></div><br>
				<div class="miniblock m4">а, что если…<div class="corn"></div></div><br>
				<div class="txt2">
					<p>И эти мысли будут вас все сильнее забивать. Вам будет все страшнее и страшнее идти на первый шоппинг. Вы начнете придумывать себе отговорки о том, что надо бы еще поучиться или походить по магазинам и потренироваться. </p>
				</div>
				<div class="txt4">
					<p>Однажды нам на сайт написала девушка, которая хотела работать с нами. Она 10 лет училась и прошла всевозможные курсы, но так и не решилась начать работать. Ей все время казалось, что у нее мало знаний и надо еще подучиться. Уверены, что она так и продолжает учиться и не начала работать.</p>
				</div>
				<div class="txt2">
					<p>И чем дольше думаешь, тем больше сомневаешься и тем сложнее решиться. Потому что страхи растут и мозг начинает придумывать оправдания лишь бы ничего не делать.</p><br>
					<p>А потом вы поймете, что "слишком долго я уже имиджмейкер, а практики нет. Наверное, это не мое". И благополучно похороните свою мечту и займетесь домохозяйством или нелюбимой работой. </p>
				</div>
			</div>
			<div class="break"></div>
			<div class="bl2">
				<div class="txt5">Но все эти страхи растворяются, как только вы делаете первый решительный шаг</div>
				<div class="txt6">Посмотрите это видео про женские страхи...</div>
				<div class="video" style="height: 358px;"><center><iframe width="601" height="338" src="http://www.youtube.com/embed/o2xtIg3RTKg?version=3&feature=player_detailpage&autoplay=0&fs=1&loop=1&rel=0&showinfo=0&egm=1&showsearch=0&disablekb=1&vq=highres" frameborder="0" allowfullscreen></iframe></center></div>
			</div>
		</div>
	</div>	
	
	<div class="block3">
		<div class="ins">
			<div class="txt1">И как только вы решились... с этого момента шоппинг превращается в игру и удовольствие.<span>И ЭТО ФАКТ</span></div>
			<div class="item l">
				<div class="ico"></div>
				<div class="txt">
					<p>Из впечатлений: После шоппинга действительно испытываешь драйв, даже если безумно устала. После 4 часов в жарких помещениях) Но это такой подъем хочется чаще и чаще!!!!!)))</p><br>
					<p>Сегодня на работе, когда она (клиентка) выходила в пальто и новом платке ее даже не узнали. Приятно видеть результаты своей работы))) Тогда я заработала 6 тыс.руб.</p><br>
					<p>Но сегодня она мне позвонила и сказала, что хочет через недельку еще повторить и купить еще новых вещей.</p><br>
					<p>Вообще не смотря на усталость, хочется работать еще и еще!))) Это действительно вдохновляет!</p><br>
					<p>Так рада, что могу заниматься любимым делом. На той неделе обновила и свой гардероб. </p>
					</div>
				<div class="name">Валерия Титова,<br/> имиджмейкер, Санкт-Петербург</div>
			</div>
			<div class="item r">
				<div class="ico"></div>
				<div class="txt">
					<p>Самые положительные и вдохновляющие эмоции были после первого шопинга и создания сайта с первыми статьями. Эти дни я не спала и, казалось, питалась воздухом, но энергии было на целый пионеротряд!</p>
				</div>
				<div class="name">Анастасия Матвеева, <br/>имиджмейкер, Санкт-Петербург</div>
			</div>
			<div class="item l">
				<div class="ico"></div>
				<div class="txt">
					<p>А по воскресеньям я начала работать имиджмейкером, проводить консультации, разборы гардероба и шопинги. Мой муж и друзья все время мне говорят, что мол подожди, отдохни, посиди с ребенком, успеешь еще по работать. И крутят пальцем у виска, когда я им отвечаю, что я ХОЧУ РАБОТАТЬ!! Для них это дикое словосочетание, они ни как не могут понять что от работы можно получать удовольствие ))))) </p>
				</div>
				<div class="name">Марина Прядко,<br/>имиджмейкер, Курган</div>
			</div>
			<div class="item r">
				<div class="ico"></div>
				<div class="txt">
					<p>5 часов все-таки много. Я очень устала и эмоционально (+ волновалась), и физически, упала без ног в кафешке и не могла подняться 1,5 часа. Надо стараться уложиться в 4 часа, а для этого надо лучше знать ассортимент магазинов.</p>
				</div>
				<div class="name">Ирина Шаталова , <br/>имиджмейкер , г.Новосибирск</div>
			</div>
			<div class="item l">
				<div class="ico"></div>
				<div class="txt">
					<p>Клиентка осталась очень довольна. По окончанию шопинга она сразу переоделась в новые вещи, надела аксессуары и взяла новую сумку. В обновленном образе она пошла на встречу с мужем и друзьми. Ее переполняли эмоции! (Меня наверное еще больше чем ее).</p><br>
					<p>Говорила, что не может поверить, что можно так все сочетать и у нее теперь столько красивых вещей в гардеробе. Не успела я добраться до дома как она мне присылает смс, что получила кучу комплиментов от мужа и друзей. На следующий день прислала отзыв, хотя я ее даже не успела попросить.</p><br>
					<p>По времени получилось 5 часов. Заработала 15,000 р. + шикарный отзыв </p>
				</div>
				<div class="name">Александра Пеффер,<br/>имиджмейкер, г. Дубаи</div>
			</div>
			<div class="item r">
				<div class="ico"></div>
				<div class="txt">
					<p>Просто не верится, что еще и деньги мне за это платят! Чувствую себя абсолютно естественно, органично, на своем месте — эмоциональный подъем невероятный! Спасибо Вам, за то, что помогли поверить в себя – моя жизнь теперь похожа на мечту – каждый день. Я занимаюсь любимым делом, которое не надоедает, которое в радость – и еще и делюсь этой радостью с другими!</p>
				</div>
				<div class="name">Вера Хрипкова, имиджмейкер</div>
			</div>
			<div class="item l">
				<div class="ico"></div>
				<div class="txt">
					<p>- Что касается эмоций, то их написать очень сложно это скорее звуки, размахивания рук и просто полный восторг.</p>
				</div>
				<div class="name">Наталья Черемухина,<br/>имиджмейкер, Томск</div>
			</div>
			<div class="item r">
				<div class="ico"></div>
				<div class="txt">
					<p>Конечно, больше всего эмоций от шопинга!!! Комплект получился интересный и по стилю и по цвету. Клиент остался доволен ))) Родные ее тоже одобрили. Я поняла, что это «мое»!!! Были, конечно, трудности, т.к. город небольшой (Иркутск), хоть и областной центр, все приличные магазины разбросаны по городу, поэтому увеличивается время, ну и плюс недостаток опыта тоже сказался. Но я думаю с опытом смогу все систематизировать, лучше ориентироваться. </p>
				</div>
				<div class="name">Татьяна Курохтина,<br/>имиджмейкер, Иркутск</div>
			</div>
			<div class="txt2">Вот увидите, что когда вы попробуете шоппинг на вкус, вас будет не остановить )</div>
		</div>
	</div>	
	
	<div class="block4" id="point2">
		<div class="ins">
			Делая простые шаги в нашем тренинге вы неизбежно<br> найдете клиентов на шоппинг, а также проведете<br> фотосессию и получите портфолио
		</div>
	</div>

	<div class="block5">
		<div class="ins">
			<div class="bg"></div>
			<div class="bl1">
				<div class="date"><span class="sp1">1</span><span class="sp2">НЕДЕЛЯ</span></div>
				<div class="txt1">
					<p>Просто представьте себе следующую захватывающую сцену. Первый результат, который у вас будет - очередь из желающих записаться к вам на шоппинг-сопровождение. И это уже на первой неделе. </p><br>
					<p>Минус, который вас ждет - вам придется выбирать среди желающих и даже некоторым отказывать, потому что вы не сможете разорваться. </p><br>
					<p>Есть ли у вас опыт в шоппинг-сопровождении или нет - вы все равно получите клиентов на шоппинг. Вы получите столько шоппингов, за сколько возьметесь. И это за первую неделю.</p>
				</div>
				<div class="miniblock m1">"Откуда эта очередь?" <div class="corn"></div><span>- можете спросить вы.</span></div><br>
				<div class="miniblock m2">Мы будем искать вам клиентов с<br> помощью нашей собственной рассылки!<div class="corn"></div><span>Отвечаем: </span></div><br>
				<div class="txt2">И дополнительно на первой неделе мы покажем:</div>
				<ul>
					<li>Как вы сами можете составить текст, чтобы найти клиентов на фотосессию</li>
					<li>Где именно этот текст размещать</li>
					<li>Что именно говорить и как общаться с откликнувшимися людьми</li>
				</ul>
				<div class="txt3">Вам остается только действовать. </div>
				<div class="txt3">И это только начало!</div>
			</div>
		</div>
	</div>
	
	<div class="block6">
		<div class="ins">
			<div class="bl1">
				<div class="date"><span class="sp1">2</span><span class="sp2">НЕДЕЛЯ</span></div>
				<div class="txt1">
					<p>вы найдете себе фотографа и визажиста-парикмахера для фотосессии. </p><br>
					<p>При этом не платя им ни копейки. </p><br>
					<p>Вам не надо будет их упрашивать. </p><br>
					<p>Вы будете выбирать. </p>
				</div>
			</div>
		</div>
	</div>	

	<div class="block7">
		<div class="ins">
			<div class="bg"></div>
			<div class="bl1">
				<div class="date"><span class="sp1">3&nbsp;&nbsp;и&nbsp;&nbsp;4</span><span class="sp2">НЕДЕЛЯ</span></div>
				<div class="txt1">И потом - наиболее волнующая и захватывающая часть вашего проекта!</div>
				<div class="txt2"><span>ФОТОСЕССИЯ!</span>Когда в одно целое будут соединены подобранные вами комплекты, работа парикмахера-визажиста над моделью и это все запечатлено в прекрасных фотографиях. </div>
				<div class="txt1">Что вам останется сделать:<br> пожинать плоды успешной фотосессии</div>
			</div>
		</div>
	</div>	

	<div class="block8">
		<div class="ins">
			<div class="txt1">В результате</div>
			<div class="bl b1"><span>У вас будет готово портфолио</span></div>
			<div class="bl b2"><span>У вас будет бесценный опыт в<br> шоппинг-сопровождении</span></div>
			<div class="bl b3"><span>У вас будут первые клиенты, <br>которые могут обратиться к вам<br> снова</span></div>
			<div class="bl b4"><span>У вас будет сарафанное радио,<br> потому что подруги первых<br> клиентов будут интересоваться<br> их преображением</span></div>
		</div>
	</div>	

	<div class="block9">
		<div class="ins">
			<div class="bl b1">
				<div class="inn">
					<p><span>"А это сработает?"</span></p><br>
					<p>ДА! ТЕХНОЛОГИЯ ИСПРОБОВАНА И ОНА РАБОТАЕТ.</p><br>
					<p>И теперь мы открываем её вам - только на этой странице - попробуйте её в своей деятельности не рискуя ни копейкой!</p><br>
					<p>К тому же мы постарались сделать для вас достижение результата еще проще! Мы знаем, что самой тяжелой частью является поиск клиентов, согласных на фотосессию. И мы будем искать их для вас с помощью нашей рассылки!</p>
				</div>
			</div>
			<div class="bl b2">
				<div class="inn">
					<div class="smile"></div>
					<p>Вы, конечно, можете попробовать самостоятельно без нашей помощи, инструкций и поддержки все организовать. И это замечательно. Однако, мы должны предупредить вас: </p><br>
					<ul>
						<li>Будьте готовы переделывать некоторые этапы по несколько раз, нащупывая правильную методику</li>
						<li>Будьте готовы, что несколько раз у вас будет желание бросить все это, потому что "ничего не получается"</li>
						<li>Будьте готовы, что если все сложится, то до готового портфолио вы дойдете намного позже</li>
					</ul>
				</div>	
			</div>
			<div class="bl b3">
				<div class="inn">
					<div class="smile"></div>
					<p><span>Если вы идете с нами, мы упростим и ускорим ваше достижение цели:</span></p><br>
					<ul>
						<li>Мы будем помогать вам искать клиентов</li>
						<li>Мы будем давать четкие инструкции, что и в каком порядке делать</li>
						<li>Мы будем отвечать на ваши вопросы</li>
						<li>Вместе с вами в реальном времени будут свое портфолио создавать и другие имиджмейкеры. А вместе двигаться к цели гораздо проще!</li>
					</ul>
					<p><span>В РЕЗУЛЬТАТЕ ВЫ ИДЕТЕ ПО УЖЕ ГОТОВОМУ СЦЕНАРИЮ И МЫ ВЕДЕМ ВАС ЗА РУКУ!</span></p><br>
					<p><span>ЧЕРЕЗ МЕСЯЦ ВЫ ПРОСТО НЕ ПОВЕРИТЕ СВОИМ ГЛАЗАМ!</span></p>
				</div>	
			</div>
		</div>
	</div>	
	
	<div class="block10">
		<div class="ins">
			<div class="bl1">
				<div class="txt1">Уверены, вы будете восхищены результатом!</div>
				<div class="txt2">
					<p>Да! Когда вы пройдете нашу имидж-практику </p><br>
					<span class="sp1">"ПОРТФОЛИО ДЛЯ ИМИДЖМЕЙКЕРА ЗА 1 МЕСЯЦ", </span><br>
					<p>вы будете постоянно пересматривать получившиеся фотографии, настолько вы будете ими гордиться и настолько прекрасными они будут вам казаться.</p><br>
					<p>Вы избавитесь от мандража перед клиентами и первыми шоппингами!</p><br>
					<p><span class="sp2">У вас уже будет ОПЫТ!</span></p><br>
					<p>И у вас будет ощущение, что да, вы теперь "полноценный имиджмейкер" и гордость за себя, о которых вы и не мечтали раньше.</p>
				</div>
			</div>	
		</div>
	</div>
	
	<div class="block11">
		<div class="ins">
			<p><span class="sp1">ПОПРОБУЙТЕ ПОЛНОСТЬЮ НА НАШ СТРАХ И РИСК!</span></p><br>
			<p>Чтобы убедиться, что это все работает, вам надо попробовать!</p><br>
			<p>И вы можете сделать это полностью на наш страх и риск. Давайте я объясню, что это значит.</p><br>
			<p>В пределах первой недели вы можете вернуть все свои деньги обратно. Если вам что-то не понравится. Не проблема. Возвращаем деньги, затраченные на покупку тренинга без вопросов. </p>
			<p><span class="sp2">Ваша гарантия безусловная. Она защищает вас полностью неделю - это полностью наш риск. Вам абсолютно нечего терять. Действуйте сейчас!</span></p>
		</div>
	</div>	

	<div class="block12"  id="point4">
		<div class="ins" style="height: 620px;">
			<div class="txt1">Как все будет проходить</div>
			<div class="bl b1" style="top:100px"><div class="inn">Вы получаете доступ в закрытый раздел с обучением. Все записи тренинга и бонусов вы сможете скачать к себе на компьютер. Доступ к скачиванию у вас будет постоянно - можете скачать хоть через год.  </div></div>
			<div class="bl b2" style="top:100px"><div class="inn">После прослушивания урока, делаете домашнее задание и выкладываете в закрытом разделе. Мы проверяем и комментируем. У вас будет гарантированная проверка ваших домашних заданий в течение 3 месяцев. После вы сможете продлить этот срок или включить когда захотите </div></div>
			<div class="bl b3" style="top:350px"><div class="inn">Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам. Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс. А служба поддержки оперативно поможет, если у вас останутся вопросы.</div></div>
		</div>
	</div>	

	<div class="block13">
		<div class="ins">
			<div class="bg"></div>
			<div class="bl1">
				<div class="txt1">Формат тренинга</div>
				<div class="txt2">
					<div class="inn">
						<p>Все это будет в формате Имидж-Практика.
<br/>
<br/>Смысл этого формата заключается в том, что вы слушаете занятие, на котором вы получаете конкретные практические задания. Вы делаете, пишете отчет и выкладываете в закрытый раздел. Мы проверяем ваш отчет и выкладываем наш ответ на него (отвечаем на ваши вопросы, даем рекомендации, направляем и помогаем). 
<br/>Также вы видите отчеты других участников и наши ответы на них. А это дает большой опыт практических шагов.
<br/>
<br/>Дальше вы переходите к следующему занятию. 
</p>
					</div>	
				</div>
			</div>
			<div class="break"></div>
		</div>
	</div>
	
	<div class="block14" id="point5">
		<div class="ins">
			<div class="txt1">Кто ведет</div>
			<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava1.png" alt="" /></div>
			<div class="txt2"><span>Александра Пеффер</span></div>
			<div class="txt3">Имиджмейкер. Ученица Екатерины Маляровой и член команды Гламурненько.ru
<br/><br/>
Успешно и без затрат создала с нуля собственное портфолио. А также обучает других имиджмейкеров этому. Результаты можете посмотреть ниже в отзывах</div>
		</div>
	</div>

	<div class="block15" id="point6"><br/>
		<div class="ins">
			<div class="txt1">Содержание пакета</div>
<br/>
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
					<td class="td1">Что вы получаете</td>
					<td class="td3"></td>
				</tr>
				<tr>
					<td class="td1"  style="padding-top: 10px; padding-bottom: 10px;">Семинар "Как имиджмейкеру быстро и бесплатно создать портфолио и привлечь новых клиентов"</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1">Материалы тренинга</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/yes.png" alt=""/></td>
				</tr>
				<tr>
					<td class="td1" >Проверка домашних заданий</td>
					<td>в течение 3 месяцев</td>
				</tr>
				<tr>
					<td class="td1">Доступ к базе клиентов</td>
					<td>в течение 3 месяцев</td>
				</tr>
				<tr>
					<td class="td1" style="padding-top: 10px; padding-bottom: 10px;">Бонус "Сайт для имиджмейкера за 60 минут"</td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/yes.png" alt=""/></td>
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
					<td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53203"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>"></a></td>
				</tr>
			</table>
		</div>
	</div>
	
	<div class="block16">
		<div class="ins">
			<div class="bl">
				<p><span>Быстрая помощь службы поддержки</span></p><br>
				<p>Участники тренинга могут при необходимости получить помощь от нашей службы поддержки.</p><br>
				<p>Сотрудники службы поддержки оперативно ответят на все вопросы и разберутся со случайными ошибками и неувязками. Сделают максимум возможного, чтобы вы ощущали себя комфортно и не оставались один на один с нерешенными проблемами.</p><br>
				<p>Связаться со службой поддержки можно в правом нижнем углу экрана (онлайн-консультант) или со страницы:<br><a href="https://www.glamurnenko.ru/blog/contacts/"  target="_blank" >https://www.glamurnenko.ru/blog/contacts/</a></p>
			</div>
		</div>
	</div>
	
	<div class="block17">
		<div class="ins">
			<div class="txt1">Отзывы</div>

                        
			<div class="item">                        
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_11.jpg" alt=""/></div>
				<div class="top">Я уже больше года практикую, как имиджмейкер. Для меня этот тренинг был интересен в качестве нового направления. </div>
				<div class="txt">
					<p>Здравствуйте!</p><br/>
<p>Меня зовут Галина. Я из Калининграда.</p><br/>

<p>Я уже больше года практикую, как имиджмейкер. Для меня этот тренинг был интересен в качестве нового направления.</p><br/>

<p>Откликнулись несколько девушек, но я решила попробовать со своими клиентами, которых я уже хорошо знаю. Все три девушки согласились сразу. Сложнее оказалось найти фотографа.</p><br/>

<p>Начинающие готовы поработать за бесплатно, но был риск. Хотелось, чтобы фото были качественные. В итого был найден компромисс — фотограф с опытом, недавно переехавший в наш город.</p><br/>

<p>Парикмахер — моя давняя знакомая, согласилась без проблем на этот проект, а в качестве визажиста участвовала жена фотографа (они работают в паре).</p><br/>

<p>В итоге, получилась история — новогодний образ. Все вещи, использованные в образах, были подобраны мною на шоппингах в разное время.</p><br/>

<p>Нарядное платье буквально за 2 дня до съемки приобрели для корпоратива. А пальто покупали еще в октябре, меховой воротник заказывали в ателье для этого пальто. Перчатки тогда же. Перед фотосессией только украшения купили.</p><br/>

<p>Я очень переживала, всё-таки первый подобный опыт. Хотелось, чтобы клиентка была довольна. Но кажется, у нас получилось. Надеюсь, что доснимем образы для прогулки с этой моделью и с другими тоже. У меня на осенних шоппингах были хорошие варианты.</p><br/>

<p>Самый главный результат для меня- создание команды. Мы договорились с фотографом, что будем сотрудничать. Уже есть новые идеи, которые мы будем воплощать.</p><br/>

<p>Спасибо за тренинг. И вот результат моей работы. (Пока промежуточный)</p><br/>
					<p> <center><table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-2.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-3.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-4.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-5.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Galina-Bartashevich-6.jpg" alt="" width="600" height="900" /></a></center></td>
</tr>
</tbody>
</table></center> </p>
					
				</div>
				<div class="name">Галина Бартошевич, Калининград, Имиджмейкер<br/>https://vk.com/id209504797</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_12.jpg" alt=""/></div>
				<div class="top">Работа над портфолио дала мне уверенность в своих силах как стилиста — я стала более уверенной на шоппингах, более настойчивой и клиенты стали прислушиваться к моему мнению и брать те вещи, которые я им выбрала. </div>
				<div class="txt">
					<p>Здравствуйте, меня зовут Алена, я из Мельбурна, Австралия.</p><br/>

<p>Работа над портфолио дала мне уверенность в своих силах как стилиста — я стала более уверенной на шоппингах, более настойчивой и клиенты стали прислушиваться к моему мнению и брать те вещи, которые я им выбрала.</p><br/>

<p>Я также смогла найти отличных парикмахера и фотографа, которые хотят и в будущем работать со мной над проектами.<br/>
Из основных трудностей был поиск ответственного визажиста, у меня 2 раза чуть не сорвалась фотосессия из-за того, что у них в последний вечер менялись планы. Но и с этим мы справились, найдя им достойную замену.</p><br/>

<p>Также непросто было объяснить моделям, что аксессуары должны быть в образе обязательно, и они не всегда дешевые (особенно сумки и обувь).<br/>
Из результатов — у меня теперь есть (почти есть, фотографии ещё в стадии обработки) портфолио. Девушки-модели были разных возрастов, цветотипов, фигур и профессий, что сделало работу над портфолио очень интересной.</p><br/>

<p>Из эмоций однозначно испытала чувство окрыления и ощущение полета. Я себя давно так хорошо не чувтвовала в том плане, что оказывается я всё могу, стоит лишь очень сильно захотеть. Сразу находится и время и средства.</p><br/>

<p>Конечно, было страшно, была неуверенность в своих силах, с том правильные ли я собрала комплекты для клиентов. но посмотрев фоторафии все страхи ушли. я довольна конечным результатом, хотя сейчас (3 недели спустя поле фотосессий) я многие вещи уже сделала бы по-другому.</p><br/>

<p>Считаю, что недостаточно хорошо продумала аксессуары к образам и места для фотосессий. Я только начинающий имиджмейкер и мне ещё учиться и учиться!</p><br/>

<p>Хочу выразить благодарность всей команде Гламурненько за предоставленную возможность заниматься тем, что действительно приносит удовольствие. спасибо за потрясающие уроки и поддержку на пути к поставленным целям!</p><br/>
					<p> <center>
					<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-2.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-4.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-3.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-6.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-5.jpg" alt="" width="600" height="399" /></a></center></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-7.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-9.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-9.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-8.jpg" alt="" width="600" height="399" /></a></center></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-10.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-11.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-12.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-13.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-13.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-14.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-14.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-16.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-16.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-15.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-15.jpg" alt="" width="600" height="399" /></a></center></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-17.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-17.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-1.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-2.jpg" alt="" width="300" height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-3.jpg" alt="" width="300" height="450" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Helen-Kharkov-ya-4.jpg" alt="" width="600" height="399" /></a></center></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Helen Kharkov<br/>Мельбурн, Австралия</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_13.jpg" alt=""/></div>
				<div class="top">Тренинг помог собраться и провести такую огромную работу. Спасибо организаторам!!!!! Это была ОЧЕНЬ хорошая идея!</div>
				<div class="txt">
					<p>Здравствуйте, Александра!</p><br/>

<p>Тренинг помог собраться и провести такую огромную работу. Год назад я пыталась организовать что-то подобное, но только оплатить работу всей съемочной группе, это потребовало бы не маленьких вложений. И сейчас проделав всю работу, я даже не верю, что все это могло состоятся именно таким образом. Спасибо организаторам!!!!! Это была ОЧЕНЬ хорошая идея! И ОЧЕНЬ большая польза для меня от проделанной работы!</p><br/>

<p>Для себя я поняла, что самое главное не затягивать процесс! Определить даты и действовать. В команде действовать проще, это придает уверенности в своих силах и действиях. Отбрасываешь сомнения и в путь! Поэтому я рада, что прошла тренинг не в записи. Ведь можно что-то прослушать и отложить в дальний ящик исполнение, а здесь нет возможности отложить.</p><br/>

<p>Хорошо, что тренинг был разбит по блокам, и каждую неделю встреча, что дисциплинировало, я выполняла домашнее задание в срок, мне было крайне важно получить комментарий Александры о моем домашнем задании. Небольшими шагами, я пришла к цели, а затем и результату.</p><br/>

<p>Результат: я провела 2 съемки. Первая – арендовала фотостудию, снимала две знакомые девушки. Вторая съемка была в нашем загородном доме, здесь снимали 4 человека. Здесь моделями были две мои клиентки и две девушки из базы Гламурненько. У каждой было по 3 образа.</p><br/>

<p>В этих двух сессиях были разные фотографы и визажисты. Это оказалось верным решением, так как команда новая и результат на 100% не предсказуем.</p><br/>

<p>На счет эмоций: сессия, которая состоялась в загородном доме, была просто потрясающей. Вся группа состояла из 10 человек (включая моделей). Все приехали, несмотря на то, что нужно было ехать туда на электричке около часа. Мы начали в 10 утра, а закончили в 8 вечера. От всех участников получила массу благодарностей и восторгов. И сама благодарна всей команде, все просто молодцы!</p><br/>

<p>Я также благодарю, Александру! За передачу своего опыта, нужные советы! За позитив и поддержку! СПАСИБО! Так же спасибо команде «Гламурненько» – за идею тренинга и воплощение данной имидж-практики!!!</p><br/>

<p>Вся имидж-практика показала, что у меня есть неуверенность в себе. Над ней и буду работать. НО! Теперь мое готовое портфолио – придает этой уверенности, ты видишь результат своей работы и понимаешь, что тебе есть, что показать клиентам и ты действительно можешь их сделать красивыми.</p><br/>

<p>Планирую провести еще одну фотосессию. Взять из базы Гламурненько еще трех девушек.</p><br/>
					<p> <center>
<table>
<tbody>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-2.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-4.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-3.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-5.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-6.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-7.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-8.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-9.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-9.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-10.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-11.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-12.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-12.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-14.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-14.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-15.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-15.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-16.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-16.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-17.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-17.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-18.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-18.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-19.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-19.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-20.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-20.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-21.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-21.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-22.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-22.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-23.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-23.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-24.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-24.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-25.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-25.jpg" alt="" width="300" height="449" data-mce-height="534" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-26.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-26.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-27.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-27.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-28.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Snezhana-Fomenko-28.jpg" alt="" width="300" height="449" /></a></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Снежана Фоменко<br>Имиджмейкер</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_14.jpg" alt=""/></div>
				<div class="top">Новые клиенты и новые шопинги это важный, необходимый опыт. Опыт организации и проведения фотосессии был очень важен и интересен.</div>
				<div class="txt">
					<p>Новые клиенты и новые шопинги это важный, необходимый опыт. Опыт организации и проведения фотосессии был очень важен и интересен.</p><br/>

<p>Итак, тема портфолио: «Преображение»:<br/>
отобрала желающих принять участие в создании портфолио;<br/>
выбрала женщин разных возрастов и цветотипов;</p><br/>

<p>провела первые встречи и шоппинги, в результате которых были подобраны комплекты, которыми женщины остались довольны;</p><br/>

<p>Екатерина молодая мама. Все внимание она уделяет маленькой очаровательной дочке. Подобрала ей удобные комплекты в модных цветовых сочетаниях для выхода и общения с друзьями.</p><br/>

<p>Гардероб Галины в основном состоял из удобной повседневной одежды для работы и отдыха. Собрала для нее комплекты с различными аксессуарами в стиле smart сasual.</p><br/>

<p>В гардеробе Екатерины преобладали деловые костюмные ансамбли. Я дополнила его стильным комплектом из платья и пальто из натурального шелка, удобным платьем и юбкой с блузкой красивых голубых оттенков, которые прекрасно сочетаются с пальто.<br/>
подготовила и провела фотосессию;</p><br/>

<p>дополнила «Портфолио» на свой сайт и, в результате, сайт получил законченный вид;</p><br/>

<p>Было интересно работать в команде с новыми людьми и решать творческие задачи.</p><br/>

<p>Конечно хотелось бы еще поработать с фотографами. Если будут желающие – буду еще проводить фотосессии.</p><br/>
					<p> <center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova2.jpg" alt="" width="300" height="374" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova3.jpg" alt="" width="300" height="374" /></a></td>
</tr>
<tr>
<td valign="top"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova7.jpg" alt="" width="300" height="439" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova5.jpg" alt="" width="300" height="439" /></a></td>
</tr>
<tr>
<td valign="top"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova6.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova8.jpg" alt="" width="300" height="449" /></a></td>
</tr>

<tr>
<td valign="top"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova11.jpg" alt="" width="300" height="460" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova10.jpg" alt="" width="300" height="459" /></a></td>
</tr>
<tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova9.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova9.jpg" alt="" width="300" height="449" /></a></td>
<td valign="top"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Olga-Ylyanova4.jpg" alt="" width="300" height="374" /></a></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Ольга Ульянова, Москва<br/>http://www.colorandstyle.ru</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_15.jpg" alt=""/></div>
				<div class="top">За время тренинга я провела 5 шоппингов, 2 разбора гардероба, перестала бояться работы с клиентом.</div>
				<div class="txt">
					<p>Я из тех стилистов, что постоянно учатся и никак не могут остановиться, а работать пока полноценно не могу, т.к. сижу в декрете с маленьким ребенком.</p><br/>

<p>Как только увидела анонс этого тренинга, сразу же решила на него идти, т.к. реальная работа с клиентом пугала. За время тренинга я провела 5 шоппингов, 2 разбора гардероба, перестала бояться работы с клиентом.</p><br/>

<p>С поиском фотографа, визажиста, парикмахера проблем не было. Фотограф — моя очень хорошая знакомая, согласилась сразу за бесплатный шоппинг со мной. Визажиста раньше знала, пользовалась ее услугами. Она очень известный в городе визажист, поэтому была не уверена, что она согласится работать бесплатно. Но ей нужны были фото формата «до и после», поэтому и с ней проблем не возникло.</p><br/>

<p>Результаты моей работы можно посмотреть в контакте. Дополнительно решила снять видео и нисколько не пожалела, получилось очень ярко. Правда за видео все же пришлось заплатить)
Эмоции были непередаваемы, эта практика выбила меня из зоны комфорта и пришлось все же начать работать, о чем я, конечно же, нисколько не жалею)</p><br/>

<p>Пересмотрев все фото и видео, заметила недочеты по комплектам, сейчас бы я изменила некоторые детали. Буду работать внимательнее. Через 2 дня у меня первый оплачиваемый шоппинг! Вот это для меня достижение.</p><br/>
					<p> <center>
<table>
<tbody>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-2.jpg" alt="" width="600" height="337" /></a></center></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-3.jpg" alt="" width="600" height="337" /></a></center></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-4.jpg" alt="" width="600" height="337" /></a></center></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-5.jpg" alt="" width="600" height="337" /></a></center></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Anna-Kochetkova-6.jpg" alt="" width="600" height="337" /></a></center></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Анна Кочеткова<br/>Набережные Челны</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_16.jpg" alt=""/></div>
				<div class="top">Благодаря тренингу я получила опыт, удовольствие, портфолио, приобрела новых знакомых и даже клиенток.</div>
				<div class="txt">
					<p>Здравствуйте, Александра и все участники тренинга! Я из Москвы (живу здесь уже 10 лет, приехала из Белгорода, работала раньше на телевидении и вела женский тележурнал). Время от времени я живу на Мальте, у меня дети учат там английский язык. Так и в этот раз, приехав на Мальту я обнаружила, что начался этот тренинг и решила, а почему бы ни здесь.</p><br/>

<p>Нашла в ФБ Russin group in Malta и связалась с администратором Анастасией, чтобы получить разрешение разместить объявление. Ей эта идея понравилась, и она предложила сделать это в рамках проекта «осенний поцелуй» с условием, что она будет все это освещать в группе. Я согласилась. В ФБ я Tatiana Antipova. Всю эту историю можно смотреть и у меня на странице.</p><br/>

<p>Команду я собрала быстро: парикмахер согласилась, которую я знаю с 2010 года, у нее свой салон на Мальте, и она всегда «за», визажист и два фотографа согласились тоже быстро. Народ на острове не избалован зрелищами и событиями. Я пригласила визажиста и попробовала ее на себе. Вышло вполне прилично!</p><br/>

<p>Я стала встречаться с участницами, которые хотели участвовать, некоторым даже успела разобрать гардероб. Но обязательным условием был шоппинг! Правда очень бюджетный (в среднем 300 евро). Я старалась купить на них 2 комплекта. Если находила новые достойные вещи в гардеробе, то образ доделывала аксессуарами.</p><br/>

<p>Одну участницу ухитрилась собрать за 2 часа при этом сделали 3 лука. Она руководитель предприятия и собиралась в командировку. Я ее в проект изначально не планировала, но раз уж так все быстро получилось, то почему бы и нет! В итоге она единственная с 3-мя абсолютно новыми луками счастливая укатила в Белград!</p><br/>

<p>С утра до вечера я носилась по магазинам в поисках нужных вещей, вечером вела переписку с Анастасией, а потом открывала Polivory и придумывала новые луки для участниц. Перед шоппингом я отсылала им луки и предлагала выбрать, чтобы знать, что искать. Шоппинг на Мальте очень скромный, поэтому было непросто.</p><br/>

<p>Еще две участницы оказались сложными: одна по фигуре (перепад в 2 размера), другая по характеру (все сама знает). В итоге на первую я потратила около 5 шоппингов (она с маленькой дочкой и коляской), мы ходили и искали то, что может уравнять фигуру и красиво смотреться. Ну это от недостачи опыта, мне хотелось, чтобы нам обеим нравилось. Вторая сложная клиентка все меряла, откладывала и нечего не покупала. Мне пришлось объяснить, что времени мало и нужно брать. В итоге все получилось.</p><br/>

<p>Так как я спешила, то многих нюансов не знала, но интуитивно делала как надо. Со съемками и организацией участниц проблем не было, если не считать сильного ветра, который почему-то случался в день съемок.</p><br/>
<p>Благодаря тренингу я получила опыт, удовольствие, портфолио, приобрела новых знакомых и даже клиенток. Пишут мне до сих пор, что хотят участвовать, но я уже уехала! Предлагаю on line консультации и работаю над отзывами и оформлением портфолио на сайте glamuranet.ru думаю, что через пару недель все закончу!</p><br/>
					<p> <center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-5.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-3.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-2.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-6.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-7.jpg" alt="" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-8.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-9-e1428597982430.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-9.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-10.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-11.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-12-e1428598206173.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-12.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-13.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-13.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-14.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-14.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-15.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-15.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-16.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-16.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-17.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-17.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-18.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-18.jpg" alt="" width="300" height="533" data-mce-width="300" data-mce-height="533" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-19.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-19.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-21.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-21.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-26.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-26.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-22.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-22.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-24.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-24.jpg" alt="" width="300" height="451" data-mce-width="300" data-mce-height="451" /></a></center></td>
</tr>
<tr>
<td colspan="2"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-20.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-20.jpg" alt="" width="600" height="398" data-mce-width="600" data-mce-height="398" /></a></td>
</tr>
<tr>
<td colspan="2"><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-23.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-23.jpg" alt="" width="600" height="398" data-mce-width="600" data-mce-height="398" /></a></td>
</tr>
<tr>
<td colspan="2"><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-4.jpg" alt="" width="600" height="398" data-mce-width="600" data-mce-height="398" /></a></td>
</tr>
<tr>
<td colspan="2"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-25.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Tatyana-Antipova-25.jpg" alt="" width="600" height="398" data-mce-width="600" data-mce-height="398" /></a></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Татьяна Антипова, Москва<br/>Имиджмейкер</div>
				<div class="corn" style="height: 53px;"></div>
			</div>			
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_17.jpg" alt=""/></div>
				<div class="top">Впечатлений масса! Страх действительно уходит, когда начинаешь непосредственную работу. Порадовалась, что почувствовала искреннее желание видеть своих клиентов довольными, показывать им, какими красивыми и привлекательными они могут быть, видеть их позитивные эмоции!</div>
				<div class="txt">
					<p>Начну по порядку.</p><br/>

<p>Школу Имиджмейкеров купила у Екатерины еще в 2012 году, параллельно проходя обучение во второй школе, попрактиковаться успела только на знакомых, родила малыша, и профессия резко оказалась далека от первого плана. Теперь появилось время и желание снова вернуться к этим занятиям.</p><br/>

<p>Тренинг я проходила параллельно с интенсивным повторением Школы. Получилось полностью погрузиться в дело. Как уже и писала в одном из домашних заданий, мне удалось собрать команду специалистов, которые до сих пор, спустя две недели после публикации объявления продолжают звонить и хотят участвовать в моем проекте.</p><br/>

<p>За время общения с ними познакомилась с очень интересными творческими людьми, в т.ч. и дизайнерами одежды. Уже придумали с ними дополнительный совместный проект, которым займусь после оформления портфолио.</p><br/>

<p>Я очень благодарна всей команде «Гламурненько» за идею создания такого тренинга, потому что самой было психологически страшно начинать, не знала, как правильно действовать и за что хвататься в первую очередь, а Александра поделилась опытом, разложила все по полочкам, теперь в голове порядок и понимание того, что я делаю и что буду делать дальше.</p><br/>

<p>Уверена, данный тренинг уже помог и еще поможет избежать множества ошибок на пути к созданию портфолио.</p><br/>

<p>Честно говоря, помимо психологического барьера, дойдя до данного этапа, трудностей я не испытала. Все интересно, затягивает, особенно, когда люди откликаются и собирается круг единомышленников.</p><br/>
<p>Я успела провести две первых встречи, заодно для своих клиентов делаю консультации по цвету и фигуре, т.к. практика мне сейчас важна, и девушкам тоже это будет интересно.</p><br/>

<p>Впечатлений масса! Страх действительно уходит, когда начинаешь непосредственную работу. Порадовалась, что почувствовала искреннее желание видеть своих клиентов довольными, показывать им, какими красивыми и привлекательными они могут быть, видеть их позитивные эмоции!</p><br/>

<p>Когда обе консультации прошли, и сошло волнение, скопившееся за целый день, не спала полночи, потому что меня переполняли идеи, что какой из клиенток я могу посоветовать, что и где смогу подобрать для них.</p><br/>

<p>По итогам первых встреч договорились с обеими девушками на шопинг. Бюджет у одной 20 000 р., у второй – 50 000 р. Встреча с третьей девушкой запланирована на будущее, т.к. она сейчас не в Москве.</p><br/>

<p>Пока одно большое пожелание для самой себя – максимум практики! Думаю, тремя девушками не ограничусь.</p><br/>
					<p> <center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-2.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-3.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-4.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-5.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-6.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-7.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-8.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-9.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-9.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-10.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-11.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-12.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-12.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-13.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-13.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-14.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-14.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-15.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-15.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-16.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Irina-16.jpg" alt="" width="300" height="450" data-mce-width="300" data-mce-height="450" /></a></center></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Ирина<br>Москва</div>
				<div class="corn" style="height: 53px;"></div>
			</div>			
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava_18.jpg" alt=""/></div>
				<div class="top">Этот тренинг стимулировал меня на действия и позволил преодолеть первый страх работы с клиентом. За что вам огромное спасибо.</div>
				<div class="txt">
					<p>Этот тренинг стимулировал меня на действия и позволил преодолеть первый страх работы с клиентом. За что вам огромное спасибо.</p><br/>

<p>И все оказалось намного проще и увлекательней чем я это себе это представляла. Меня каждый раз по-новому удивляло и вдохновляло, как разрозненные вещи из разных магазинов соединяются в интересные комплекты и образы.</p><br/>

<p>Очень радовало, когда девушки признавались, что никогда бы не обратили внимание на ту или иную вещь, а она оказалась очень удачной, и потом они получают множество комплиментов от окружающих.</p><br/>

<p>Девочки тоже были замечательные, шли навстречу и соглашались на эксперименты. Я научилась постепенно готовить клиента к изменениям и быть более настойчивой и решительной.</p><br/>

<p>Трудности: разработка удачной схемы работы с клиентом. Мне взяло некоторое время, чтоб понять, как подготовить девочек пробовать новые комплекты.</p><br/>

<p>У многих клиенток были большие требования к качеству и удобству одежды и обуви и это мешало приобрести ту или иную вещь, несмотря на то что она идеально подходила.</p><br/>

<p>Еще была трудность работы с фотографом: я не участвую в выборе фотографий и это очень мешает. Фотограф делает очень качественные снимки, но не соглашается ни на какое вмешательство с моей стороны. Второй фотограф очень коммуникабельный, но оооочень долго обрабатывает снимки.</p><br/>

<p>На сегодняшний день я провела 8 шопингов, 2 образа я составила из гардероба клиенток, и были проведены 3 фотосессии. Я составляю 1, максимум 2 образа — иначе процесс съемки очень затягивается. Во время фотосессии участвуют 2-3 девочки. После фотосессии мы (я и фотограф) публикуем анонс в фейсбуке, где выставляем 2 фотографии и отмечаем всех участников.</p><br/>

<p>От тренинга в основном положительные эмоции (даже если это переживания).</p><br/>

<p>Недостачно проработанные моменты: у меня не было стилиста по прическам в команде, не очень согласованная работа с фотографом — процесс обработки фотографий и мое участие в фотосьемке как-то смазалось. Реклама работ. Мало образов в деловом стиле.</p><br/>

<p>Планы на проработку: получить от фотографа фотографии. Составить еще 2 деловых образа. Создать сайт. Написать рекламу.</p><br/>
					<p> <center>
<table>
<tbody>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky2.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky3.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky4.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky5.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky6.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky7.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky8.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky9.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky9.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky10.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky11.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky12.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky12.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky13.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky13.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky14.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky14.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky15.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky15.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky16.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky16.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky17.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky17.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky18.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky18.jpg" alt="" width="300" height="449" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky19.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky19.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky20.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky20.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky21.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky21.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky22.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky22.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky23.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky23.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky25.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky25.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky24.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky24.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky27.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky27.jpg" alt="" width="300" height="449" data-mce-height="534" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky26.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky26.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky28.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky28.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky29.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky29.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky32.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky32.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky31.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky31.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a style="text-align: center;" href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky30.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky30.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td colspan="2"><center><a style="text-align: center;" href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky33.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky33.jpg" alt="" width="600" height="400" /></a></center></td>
</tr>
<tr>
<td><a style="text-align: center;" href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky34.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky34.jpg" alt="" width="300" height="449" /></a></td>
<td><a style="text-align: center;" href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky35.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky35.jpg" alt="" width="300" height="449" /></a></td>
</tr>
<tr>
<td colspan="2"><center><a style="text-align: center;" href="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky36.jpg" target="_blank"><img src="http://www.glamurnenko.ru/blog/wp-content/uploads/2015/04/Mila-Goomanovsky36.jpg" alt="" width="300" height="449" /></a></center></td>
</tr>
</tbody>
</table>
					</center> </p>
					
				</div>
				<div class="name">Мила Гумановски<br>Израиль</div>
				<div class="corn" style="height: 53px;"></div>
			</div>			
			<div class="item">
				<div class="ava" style="height: 101px; width: 92px;"></div>
				<div class="top">Очень благодарна за курс, все встало на свои места. Я поняла, что процесс трудоемкий, затратный по времени, требует очень внимательного подхода ко всем деталям и правильной организации. Тем не менее вполне реальный, осуществимый, это настоящий творческий процесс и схема подбора команды подходит при любой бизнес или творческой идеи.</div>
				<div class="txt">
					<p>Здравствуйте, меня зовут Елена, живу в Израиле.</p><br/>

<p>Очень благодарна за курс, все встало на свои места. Я поняла, что процесс трудоемкий, затратный по времени, требует очень внимательного подхода ко всем деталям и правильной организации. Тем не менее вполне реальный, осуществимый, это настоящий творческий процесс и схема подбора команды подходит при любой бизнес или творческой идеи.</p><br/>

<p>Я сделала пока только первые шаги. У меня есть несколько моделей, шоппинг не проводила пока — столкнулась с катастрофической нехваткой времени (я офисный работник, работаю до шести и часа полтора добираюсь до дома, куда тороплюсь сломя голову потому что дома ждет маленькая дочка).</p><br/>

<p>Я немного переоценила свои возможности со временем, оказалось все намного сложнее.</p><br/>

<p>Но я не теряю оптимизма. Просто возможно осуществлю идею с портфолио чуть позже, или растянуть придется подготовку. Также надеюсь освободиться от работы в офисе и полностью погрузиться в творческий процесс.</p><br/>
					
				</div>
				<div class="name">Елена Цыгальман<br/>Израиль</div>
				<div class="corn" style="height: 53px;"></div>
			</div>			
			<div class="item">
				<div class="ava" style="height: 86px; width: 92px;"></div>
				<div class="top">Большое спасибо всей вашей команде за науку, веру в нас, за идею и поддержку. Вы волшебники с вами у меня все получилось.</div>
				<div class="txt">
					<p>Здравствуйте!<br/>
Большое спасибо всей вашей команде за науку, веру в нас, за идею и поддержку. Вы волшебники с вами у меня все получилось.<br/>
Из вашей базы я нашла трех клиентов. Со всеми была личная первая встреча на которой мы определили тему фотосессии.</p><br/>

<p>Александра подсказала, где найти команду. Сейчас ищем фотостудию и думаем, как ее оплатить. Придется еще взять пару клиентов для фотосессии, очень хочется поработать с теми, кто откликнулся.</p><br/>

<p>Я в предвкушении классных образов и фотографий. Выложу попозже. Состояние творческого подъема предвкушение праздника сопутствовало все это время, хотя вся большая работа еще впереди.</p><br/>
					
				</div>
				<div class="name">Марина Ковалева<br>Москва</div>
				<div class="corn" style="height: 53px;"></div>
			</div>                        
                        
                        
                        <div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava2.jpg" alt=""/></div>
				<div class="top">Больше года я работала без портфолио. Но потенциальные клиенты спрашивали о нем, хотели видеть результаты моей работы. Делать фотографии абы как я не хотела.</div>
				<div class="txt">
					<p>Больше года я работала без портфолио. Но потенциальные клиенты спрашивали о нем, хотели видеть результаты моей работы. Делать фотографии абы как я не хотела. В примерочных плохой свет, да и к тому же после шопинга клиенткам хочется отдохнуть, а не фотографироваться, чувствуется усталость…</p><br>
					<p>Сделать профессиональную фотосъемку своих переодетых клиенток у меня все руки не доходили, это представлялось мне сложным и трудозатратным мероприятием. </p><br>
					<p>Прослушав мастер-класс Александры, я вдохновилась идеей создания своего портфолио. К тому же мой персональный сайт полностью поменял дизайн, и профессиональные фотографии были бы очень кстати. </p><br>
					<p>Саша рассказала все по шагам, предостерегла от возможных ошибок и накладок, дала четкие инструкции с чего начать. Я договорилась с визажистом, с фотографом, и с двумя своими клиентками. В чем фотографироваться – вопрос не стоял, так как на шопинге я уже подобрала для них несколько законченных ансамблей. </p><br>
					<p>Снимали двух клиенток в один день, уложились в 4,5 часа с подготовкой (прическа + макияж). Я волновалась, так как помимо организационных вопросов, мне нужно было следить за цельностью создаваемых образов. </p><br>
					<p>Для меня это был первый опыт, но все прошло хорошо. Спасибо Александре за то, что поделилась своим опытом. Все не так страшно, как казалось. Мне понравился и процесс съемок, и результат. </p><br>
					<p>Хочу еще!!! Поэтому в скором времени планирую несколько фотосессий для своих клиенток. Так как это красиво, приятно, и здорово повышает женскую самооценку… </p>
<br/>
					<p> <table><tr><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/1398841360_tatyanaposle01.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/shatalova2.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/1399980246_nelliposle09.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/shatalova3.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/1398265660_img3933.png" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/shatalova4.jpg" alt=""/></a></td></tr></table> </p>
					
				</div>
				<div class="name">Ирина Шаталова, г. Новосибирск<br/>Ссылка на портфолио: http://dress-no-stress.ru/portfolio</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava3.jpg" alt=""/></div>
				<div class="top">По окончанию обучения большим вдохновением для меня стал вебинар Александры Пеффер о том, как создать портфолио для сайта без финансовых затрат. </div>
				<div class="txt">
					<p>Я закончила обучение в Школе имиджмейкеров Екатерины Маляровой и самостоятельно создала свой сайт стилиста-имиджмейкера. </p><br>
					<p>По окончанию обучения большим вдохновением для меня стал вебинар Александры Пеффер о том, как создать портфолио для сайта без финансовых затрат. </p><br>
					<p>Я была поражена такой блестящей идеей, которая мне самой никогда бы не пришла в голову. </p><br>
					<p>Александра говорила о том, как нужно собрать команду профессионалов – фотографа, парикмахера и визажиста для работы над проектом, чем я и занялась. </p><br>
					<p>В результате я познакомилась с очень интересными людьми, с которыми подружилась и впоследствии работала еще и над свадебным проектом. </p><br>
					<p>Не скажу, что все было совсем легко. Главной проблемой является то, что я живу в небольшом городе, и найти девушек для фотосессии очень не просто, даже при том условии, что работа команды для них бесплатна. </p><br>
					<p>Мне все-таки удалось провести фотосессии для 3-х человек, и теперь, когда я уже знакома со схемой такого проекта, я в любой момент могу организовать фотосессию с новой девушкой. </p><br>
					<p>Спасибо Александре за прекрасную идею! </p>
<br/>
					<p> <table><tr><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/DSC_1804.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/kravec1.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/lena.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/kravec2.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/32.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/kravec3.jpg" alt=""/></a></td></tr></table> </p>
				</div>
				<div class="name">Марина Кравец, имиджмейкер, г.Полтава.<br/>Ссылка на портфолио: http://proimage.com.ua/?page_id=232</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava4.jpg" alt=""/></div>
				<div class="top">В моем случае, я понимала важность наличия портфолио - преображений своих клиентов у себя на сайте. Ну, какой стилист без него! </div>
				<div class="txt">
				<p>В любой работе бывают такие дела, которые нужно и важно сделать. Но ты этого не делаешь. По разным причинам.</p><br/>
					<p>В моем случае, я понимала важность наличия портфолио - преображений своих клиентов у себя на сайте. Ну, какой стилист без него! </p><br>
					<p>Но руки не доходили, вернее, я находила целую кучу отговорок, почему я не могу это сделать сейчас. </p><br>
					<p>Самой главной из них было непонимание с чего начинать: кого искать первым клиента-фотографа или визажиста, где снимать, во что одевать, платно или бесплатно. </p><br>
					<p>И тут… семинар Александры Пеффер. </p><br>
					<p>Он однозначно помог расставить все по своим местам. Опыт человека, который прошел этот путь от начала и до потрясающего результата, впечатляет и воодушевляет на такие же подвиги, но уже со своей стороны. </p><br>
					<p>Результат в виде портфолио трех моих клиентов выложен на сайте. Спасибо огромное! </p>
<br/>
					<p> <center><table><tr><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/goncharova1.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/goncharova1_s.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/goncharova2.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/goncharova2_s.jpg" alt=""/></a></td></tr></table></center><table><tr><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/goncharova3.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/goncharova3.jpg" alt=""/></a></td></tr></table> </p>
				</div>
				<div class="name">Наталия Гончарова, г.Харьков, имидж-студия LuxStyle.<br/>Ссылка на портфолио: http://www.style-lux.com.ua/portfolio</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
			<div class="item">
				<div class="ava" style="height: 86px; width: 92px;"></div>
				<div class="top">После окончания курса, сразу же возник вопрос экспертности. Ведь начинающему имиджмейкеру очень важно продемонстрировать свои навыки и умения одевать людей. </div>
				<div class="txt">
					<p>Я прошла обучение в «Школе имиджмейкеров» Екатерины Маляровой.</p><br/>
					<p>После окончания курса, сразу же возник вопрос экспертности. Ведь начинающему имиджмейкеру очень важно продемонстрировать свои навыки и умения одевать людей.</p><br>
					<p>Я прослушала мастер-класс Александры Пеффер «Как начинающему имиджмейкеру быстро и бесплатно создать портфолио и привлечь новых клиентов».  </p><br>
					<p>Мне очень понравился подход Александры к выбору напарников. Про тонкости ретуши, студии, природной съёмки это всё мне было понятно и видно было, что Александра сама во всё это вникла и разобралась хорошо. </p><br>
					<p>Александра очень хорошо и последовательно рассказала всю схему работы от привлечения, первых встреч и до проведения съёмки. Что за чем идёт и как взаимосвязано. Очень содержательно и без воды. </p><br>
					<p>Потому что обычно вязнешь в деталях, встаёшь, когда не знаешь чего дальше делать и как что-то делать. У нее же все тонкости были учтены – все четко, ясно и по порядку. Спасибо большое! </p>
<br/>
					<p> <table><tr><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/1.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/fiolet1.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/8.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/fiolet2.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/13.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/fiolet3.jpg" alt=""/></a></td></tr></table></p>
				</div>
				<div class="name">Полина Фиолет, г.Королев.</div>
				<div class="corn"></div>
			</div>
			<div class="item">
				<div class="ava" style="height: 86px; width: 92px;"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/ava5.jpg" alt=""/></div>
				<div class="top">Для меня эта идея стала идеальным решением, как заявить о себе как о стилисте-имиджмейкере, получить опыт работы с клиентами и опыт организатора фотосессий.</div>
				<div class="txt">
					<p>Привет! Саша, спасибо тебе огромное за идею создания своего портфолио бесплатно, за вебинар, который ты дала, все понятно, четко и по делу, без воды.</p><br/> <p>Меня так вдохновила эта идея, что после вебинара, я села, написала и подала объявление! </p><br/> <p>Для меня эта идея стала идеальным решением, как заявить о себе как о стилисте-имиджмейкере, получить опыт работы с клиентами и опыт организатора фотосессий. </p><br/> <p>Уже через месяц мы отсняли 5 человек, было не легко, но интересно, я получила много положительных эмоций, создала портфолио, получила драгоценный опыт и отзывы на сайт, спасибо!!! </p>
					
<br/>
					<p> <table><tr><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/paula1.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/paula1-s.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/paula3.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/paula3-s.jpg" alt=""/></a></td><td><a href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/paula2.jpg" target="_blank" ><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/images/paula2-s.jpg" alt=""/></a></td></tr></table></p>
				</div>
				<div class="name">Мария Паула г. Лос-Анджелес <br/>Ссылка на портфолио: http://thefashionsupport.com</div>
				<div class="corn" style="height: 53px;"></div>
			</div>
		</div>
	</div>	
	   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/portfolio/css/style_1.css?t=1409284522"/>

<section class="whiteBg"  id="point3">
    <section class="page" id="faq_block">
        <h1>Часто задаваемые вопросы:</h1>
        
        <h2><span class="questSymbol">?</span> Как и когда я получу проверку моих домашних заданий?</h2>
        <p>Мы постарались сделать так, чтобы было максимально удобно вам. И теперь:<br/><br/>

1. Вы можете размещать свои домашние задания в любое удобное вам время, даже через месяц или через год после начала тренинга (конкретный срок зависит от выбранного вами пакета). Они все равно будут проверены. Прямо там, в закрытом разделе в комментариях вы размещаете сделанное задание. <br/><br/>

2. Раз в неделю мы проверяем и конкретно под вашим комментарием появляется возможность прослушать наш ответ. Вы просто нажимаете кнопку "play" и слушаете.<br/><br/>

Таким образом вы жестко не завязаны на сроки проведения тренинга. Вы можете начать создавать свое портфолио, когда вам будет удобно.  <br/><br/>

Пакет Gold - в течение 3 месяцев после оплаты для вас будет действовать проверка домашних заданий и доступ к базе клиентов. <br/><br/>

Пакет Platinum - в течение года после оплаты для вас будет действовать проверка домашних заданий и доступ к базе клиентов <br/><br/>

Но записаться на тренинг лучше сейчас, пока действую специальные условия. </p>
        
        <h2><span class="questSymbol">?</span> Как вы поможете мне в поиске клиентов?</h2>
        <p>Мы будем размещать информацию в рассылке Гламурненько.ru о возможности бесплатно сходить на шоппинг с имиджмейкером и после этого на фотосессию. Всех, кто откликнется мы будем сортировать по городам и создавать базу таких заинтересованных клиентов. <br/><br/>

В зависимости от того, в каком городе вы находитесь, вы получите доступ к соответствующим анкетам клиентов<br/><br/>

Также мы поделимся с вами наработками как самостоятельно искать клиентов на шоппинг и фотосессию.</p>
        
        <h2><span class="questSymbol">?</span> Скажите, как вы найдете клиентов для меня, если я живу в другом городе? </h2>
        <p>В нашей рассылке мы будем давать объявления о возможности бесплатно сходить на шоппинг с имиджмейкером и после этого на фотосессию.<br/><br/>

Люди будут откликаться из разных городов. Мы их будем сортировать по городам и давать вам доступ к откликнувшимся клиентам из вашего города. Если таких клиентов не будет, у вас будет возможность самостоятельно найти их - инструменты мы тоже дадим!<br/><br/>

Со своей стороны мы периодически в рассылке будем продолжать напоминать о подобной акции. У вас будет доступ к базе клиентов в зависимости от пакета, который вы выберите. </p>

        <h2><span class="questSymbol">?</span> Можно ли оформить заказ сегодня, а оплатить завтра/послезавтра?</h2>
        <p>Да, можно. Нажмите на кнопку заказать, заполните данные о себе и выберите способ оплаты. К вам на email придет информация о заказе. Сохраните её для того, чтобы оплатить на днях.</p>
        
        <h2><span class="questSymbol">?</span> Имидж-Практика будет проходит через интернет или вживую надо куда-то идти?</h2>
        <p>Только через интернет. И этот формат дает ряд преимуществ для вас:<br/>
- вам не надо никуда ехать, достаточно иметь компьютер<br/>
- вы можете скачать запись и просматривать её сколько угодно и когда угодно<br/>
- цена тренинга намного ниже, чем цены живых мероприятий</p>
        
        <h2><span class="questSymbol">?</span> Могу ли я купить тренинг сейчас, а проходить через месяц?</h2>
        <p>Можете. И у вас в любом случае будет проверка ваших домашних заданий.</p>
        
        <h2><span class="questSymbol">?</span> Мне обязательно присутствовать онлайн или можно будет скачать запись встречи?</h2>
        <p>Все записи Имидж-Практики вы сможете скачать к себе на компьютер. Доступ к скачиванию у вас будет постоянно - можете скачать хоть через год. Также у вас постоянно будет доступ к домашним заданиям других пользователей и к нашим ответам на них - чтобы вы перенимали опыт коллег.</p>
           
        <h2><span class="questSymbol">?</span> Нужно ли иметь сайт?</h2>
        <p>Нет. Для создания портфолио вам не нужно иметь сайт. <br/><br/>

Сайт может пригодиться вам, чтобы выложить результаты своей работы. <br/><br/>

Все, кто сделает портфолио, получат бесплатный бонус "Сайт для имиджмейкера за 60 минут". <br/><br/>

Затраты на создание: около 200 рублей (домен + хостинг)<br/>
Время на создание: около часа</p>
           
    </section>
</section>	
	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки: <br><a href="http://www.glamurnenko.ru/blog/contacts/">http://www.glamurnenko.ru/blog/contacts/</a> tel.: +7(499)350-23-35 <br>© <?= date('Y') ?>, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>
	</div>

</div>

</body>
</html>
  

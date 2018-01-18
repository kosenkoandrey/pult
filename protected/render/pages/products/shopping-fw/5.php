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
   <title>Имидж-Практика "Шоппинг осень-зима под контролем стилиста"</title>
   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/css/style.css"/>
   <link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/flashtimer/compiled/flipclock.css">
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/flashtimer/compiled/flipclock.js"></script>
	<script type='text/javascript' src='<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/js/jquery.scrollTo-min.js'></script>
	
	
	<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/js/main.js"></script>
</head>
    
  
<body>
<div class="container">
	<div class="menu">
		<div class="ins" style="width: 1350px;">
			<ul>        
				<li style="background:none; margin-left: 30px;"><a class="a1" style="border-bottom: 1px dashed #000;" href="#point1">Что вы получите</a></li>
					<li><a class="a2" style="border-bottom: 1px dashed #000;" href="#point2">План по неделям</a></li>
					<li><a class="a3" style="border-bottom: 1px dashed #000;" href="#point3">Кто ведет</a></li>
					<li><a class="a4" style="border-bottom: 1px dashed #000;" href="#point4">Как все будет</a></li>
                    <li><a class="a7" style="border-bottom: 1px dashed #000;" href="#bonus">Бонусы</a></li>
					<li><a class="a5" style="border-bottom: 1px dashed #000;" href="#point5">Гарантия</a></li>
					<li class="last"><a class="a6" style="border-bottom: 1px dashed #000; color: #1D961D; border-color: #1D961D;" href="#point6"><strong>Записаться</strong></a></li>
			</ul>
		</div>
	</div>
	
	<div class="header">
		<div class="ins">
			<div class="txt1">"Меняю одну вашу ненужную шмотку на <br> идеальный гардероб сезона осень-зима!"</div>
			<div class="txt2">Вы можете подумать, что Малярова сошла с ума...
<br><br>Но прочитайте внимательно эту страницу, <br>
чтобы узнать, как уже через месяц у вас появится идеально сочетаемый, рациональный, разнообразный и стильный гардероб на сезон осень-зима...          </div>
			<div class="txt3">При этом:</div>
			<ul>
				<li>вы совершенно ничем не рискуете</li>
				<li>вы экономите</li>
				<li class="last">вы прекрасны</li>
			</ul>
		</div>
	</div>

	<div class="block1">
		<div class="ins">
			<div class="bl_name">Приближается новый осенне-зимний сезон, <br> но у вас по-прежнему проблемы с гардеробом?</div>
			<div class="txt1"><span>Давайте для начала определим, кто вы.</span></div>
			<div class="txt2">Недавно я проводила опрос среди женщин по осенне-зимнему гардеробу. По результатам этого опроса можно выделить три категории женщин. К какой из них относитесь вы?</div>
			
			<ul>
				<li class="li1"><span>"Хочу-выкинуть-шкаф-не-открывая-его"</span>"Каждый раз, открывая шкаф перед осенне-зимним сезоном, хочется выкинуть весь гардероб и купить всё новое".</li>
				<li class="li2"><span>"Хочется-но-страшно"</span>"Понимаю, что гардероб далеко не идеальный. Но сразу всё менять не готова. Хочется собрать 2-3 новых комплекта, в которых я буду выглядеть стильно, эффектно и чтобы мне нравилось!"</li>
				<li class="li3"><span>"Стильная-но-хочу-большего"</span>"В принципе у меня уже есть вещи и комплекты, которые мне нравятся. Но чего-то не хватает. Изюминки, что ли. Модных штрихов, трендов, тенденций. Хочу дособирать имеющиеся комплекты,  сделав их вкусными и стильными"</li>
			</ul>
		</div>
	</div>

	<div class="block2">
		<div class="ins">
			<div class="inn">
				<div class="bl_name">А вот TOP-10 кошмаров гардероба, <br> с которыми обычно сталкиваются женщины              </div>
				<ul>
					<li class="li1"><span>Разрозненные шмотки, не сочетаемые в комплекты</span><br>Обычно они висят в вашем шкафу, если вы хватаете первую понравившуюся вещь в магазине, не особо задумываясь, с чем её будете носить. В итоге она так и висит в гордом одиночестве, втайне надеясь, что когда-нибудь её звёздный час настанет. Но вам совершенно не с чем носить эту вещь, поэтому мечте этой сбыться не суждено. Деньги потрачены, комплекта нет. </li>
					<li class="li2"><span>Скучные цвета</span><br>Поселяются в вашем гардеробе, если вы боитесь яркой одежды. Вам, вроде, и хочется прикупить вот эту зеленую блузку или розовый топ. Но вы не знаете, с чем их сочетать, и вообще не уверены, что это &quot;ваши&quot; цвета. Поэтому в вашем шкафу, в основном, живут вещи в скучной чёрно-серо-бежевой гамме. </li>
					<li class="li3"><span>Однотипные и проверенные варианты</span><br>Зачастую, когда вам хочется купить что-то новенькое, вы неосознанно тянетесь к уже знакомым и проверенным вещам. В результате вы получаете однотипный и довольно скучный гардероб.</li>
					<li class="li4"><span>Неграмотная организация шоппинга</span><br>Вам знакомы фразы ниже? <br><br> &quot;Я вообще не люблю ходить по магазинам…&quot;, <br> &quot;Всегда откладываю шоппинг до последнего…&quot;, <br> &quot;И отправляюсь за шмотками, когда совсем припрёт…&quot;, <br> &quot;Я плохо ориентируюсь в магазинах…&quot;, <br> &quot;Меня напрягает назойливость продавцов…&quot;, <br> &quot;Меня так утомляет шоппинг…&quot;, <br> &quot;Я опять ничего не купила!..&quot;
</li>
					<li class="li5"><span>Проблема с обувью и аксессуарами (сумками, украшениями, платками и т.д.)</span><br>А бывает и так… Вроде бы, взяла платье: и цвет нравится, и сидит хорошо. Но какую к нему взять обувь, сумочку, каким украшением можно дополнить — непонятно. В итоге комплект у вас не получается — и вы носите это платье с чем есть либо вообще не дополняете его аксессуарами.</li>
					<li class="li6"><span>&quot;Раздутый&quot; гардероб</span><br>Если вы не умеете вписывать новые вещи в текущий гардероб, то вы начинаете носить одну вещь лишь в одном-двух комплектах. А это сильно &quot;раздувает&quot; гардероб.</li>
					<li class="li7"><span>Неактуальные вещи</span><br>То, что было актуально в прошлом сезоне, сегодня смотрится неинтересно. А как эти вещи сделать интересными и более актуальными — непонятно.</li>
					<li class="li8"><span>Неумение найти в магазине то, что нужно</span><br>О, это один из самых забавных кошмаров, с которыми сталкиваются женщины всего мира. Вы пришли за платьем, а купили сапоги. А к сапогам — серёжки, потому что они по цвету подходят. И еще что-нибудь, чтобы составить комплект. В итоге платье не куплено, а деньги потрачены.</li>
					<li class="li9"><span>Верхняя одежда</span><br>Непонятно, какой минимум верхней одежды необходим на осенне-зимний сезон.</li>
					<li class="li10"><span>Несоответствие комплектов возрасту</span><br>Когда одежда, которую вы привыкли покупать, уже не соответствует вашему возрасту, это выглядит довольно удручающе.</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="block3" id="point1">
		<div class="ins">
			<div class="bl_name">Хотите профессионально решить все проблемы с гардеробом на сезон осень-зима?</div>
			<div class="bl_name">А как насчет того, чтобы уже меньше чем через месяц наслаждаться новыми образами?</div>
			<div class="bl_name1">Ниже я покажу, как уже через месяц вы:</div>
			<div class="txt">
				<span>разберёте свой гардероб и избавитесь от одежды, которая вас не украшает и тянет назад;</span>
			</div>
			<div class="txt">
				<span>сможете собрать новые комплекты, которые станут началом вашего нового идеального гардероба, используя удачные вещи из вашего шкафа;</span>
			</div>
			<div class="txt">
				<span class="sp1">научитесь составлять карту покупок на шоппинг осень-зима разного формата:</span>
				<ul>
				  <li>карту покупок с нуля,</li>
					<li>карту покупок "новая жизнь старого гардероба",</li>
					<li class="last">карту покупок "3 комплекта";</li>
				</ul>
			</div>
			<div class="txt">
				<span class="sp1">обновите свой гардероб:</span>
				<ul>
				  <li>если вы настроены решительно, мы полностью обновим ваш гардероб и сделаем его стильным, эффектным, сочетаемым и рациональным;</li>
					<li>если у вас нет планов полностью обновлять гардероб, вы можете приобрести несколько &quot;вкусных&quot; комплектов, которые сделают вас модной и стильной уже в этом сезоне. А еще они послужат основной для будущего гардероба;</li>
					<li class="last">если в вашем гардеробе много удачных вещей, то вы сможете докупить недостающие до комплектов элементы.</li>
				</ul>
			</div>
			<div class="txt">
				<span class="sp1">вы научитесь рациональному шоппингу и поймёте:</span>
				<ul>
				  <li>как подбирать для себя магазины;</li>
					<li>как правильно собираться на шоппинг (правила и табу);</li>
					<li>по какому алгоритму действовать в магазине, чтобы добиться желаемого результата;</li>
					<li>в каком порядке совершать шоппинг;</li>
					<li class="last">как общаться с продавцами, чтобы они стали союзниками в подборе вашего гардероба.</li>
				</ul>
			</div>
			<div class="txt">
				<span>вы заложите основу для того, чтобы каждый сезон быть стильной, модной и нравится себе;</span>
			</div>
			<div class="txt">
				<span class="sp1">ваш гардероб станет более качественным и компактным, но при этом —  разнообразным.</span>
				<ul>
				  <li>вы сможете сочетать между собой разные вещи, чтобы одна вещь участвовала в нескольких комплектах;</li>
					<li>вы научитесь составлять комплекты таким образом, чтобы гардероб выглядел не однотипным, а разнообразным;</li>
					<li class="last">в результате из достаточно небольшого количества вещей вы сможете составлять большое количество разнообразных комплектов, что даст вам возможность выбирать вещи лучшего качества.</li>
				</ul>
			</div>
			<div class="txt1">
			В результате вы сможете чувствовать себя более красивой, яркой и желанной и всегда иметь возможность выбрать комплект, соответствующий настроению: элегантный / изящный / праздничный / веселый / спокойный / хулиганистый и так далее. </div>
		</div>
	</div>	
	
	<div class="block4">
		<div class="ins">
			<div class="bl_name">Наверное, у вас в голове крутится сейчас мысль:<br>&quot;Как круто! Неужели это реально? А если и реально, то стоит сумасшедших денег! И что же с той ненужной шмоткой, о которой мы говорили в самом начале?&quot;</div>
			<div class="txt1"><span>Давайте я сперва расскажу, почему это возможно</span></div>
			<div class="txt2">Для того чтобы получить результат, который я описала выше, многие женщины обращаются к <br> стилистам-имиджмейкерам. И это стоит приличных денег.</div>
			<div class="bl1">
				<div class="txt3">И стоимость моих услуг не исключение. Например:</div>
				<div class="item l">
					<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic1.png" alt=""/></div>
					два дня шоппинга в Милане обходятся моим клиентам в 1200 евро (это около 90 000 рублей). <br> И это только оплата моих услуг (при этом я целый месяц весной и целый месяц осенью провожу на шоппинге в Милане);
				</div>
				<div class="item r">
					<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic2.png" alt=""/></div>
					час шоппинга в Москве стоит 5 000 рублей. <br> За весь шоппинг клиенты обычно платят от 20 тыс. рублей (при этом запись обычно идёт на месяц вперёд).
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>	
	
	<div class="block5">
		<div class="ins">
			<div class="arr1"></div>
			<div class="arr2"></div>
			<div class="bl_name">Не готовы сейчас тратить столько денег?</div>
			<div class="txt1">Вы можете получить мои знания и мою поддержку, <br> которые помогут вам достигнуть вышеописанных результатов, но с одним условием! </div>
			<div class="txt3"><span>ВАМ НАДО ПОЖЕРТВОВАТЬ НЕНУЖНОЙ ШМОТКОЙ!</span></div>
			<div class="txt4">Что это значит? <br> С этого момента читайте очень внимательно!          </div>
			<div class="txt5">
				<p>Для начала подойдите к шкафу и посмотрите, сколько ненужных шмоток у вас есть.</p>
				<p>Это вещи, которые вы купили и надели лишь один-два раза...</p>
				<p>Которые вы хапнули на распродаже и которые вам не нравятся...</p>
				<p>А теперь прикиньте, сколько вы за них заплатили...</p>
				<p>3000 рублей? 5000 рублей? А может быть, 20 000 рублей или даже 100 000?</p>
			</div>
			<div class="bl1">
				<div class="inn">
					<div class="corn"></div>
					<p>В моей практике была клиентка, которая отдала за совершенно ненужную ей шмотку 5000 евро! Как же так вышло? Очень просто.<br><br>Она просто купила на распродаже в Милане разноцветную шубу от &quot;Etro&quot;. Но не стала её примерять, так как за день до начала скидок уже побывала и в этом магазине, и в этой шубе.<br><br>И она была в полной уверенности, что её размер — единственный и последний. Но она ошиблась и в день распродажи схватила шубу на два размера меньше.<br><br>Обнаружила она это лишь по возвращении на родину, где она ещё два года пыталась продать эту разноцветную шубу.<br><br>Нельзя допускать, чтобы во время шоппинга, а уж тем более распродаж, эмоции брали над вами верх.<br><br>Не ленитесь мерить, несмотря на очереди в примерочные. Иначе эмоциональный шоппинг на распродажах превращается в бессмысленный и беспощадный!<br><br>Мы разберем еще сотню подобных нюансов, каждый из которых поможет вам не потратить лишнего, покупая только действительно выигрышные для вас вещи</p>
				</div>
			</div>
			<div class="txt6">
				<p>А теперь подумайте: обменяли бы вы одну-две из этих ненужных шмоток за возможность получить<br> идеальный гардероб сезона &quot;осень-зима&quot;?</p>
				<p>Ответ очевидный <span></span></p>
				<p>Так почему бы вам прямо сейчас не остановиться в своём шоппинг-безумии?</p>
				<p>Вот прямо сейчас взять и деньги, которые вы бы потратили во время следующего шоппинга <br> на одну-две ненужные шмотки... и инвестировать их в знания, которые помогут вам составить <br> идеальный гардероб на сезон &quot;осень-зима&quot;!</p>
			</div>
		</div>
	</div>	
	
	<div class="block6">
		<div class="ins">
			<div class="bl_name">Более того, это будет вашим <br> самым прибыльным вложением!</div>
			<div class="txt1">С одной стороны вы перестанете покупать вещи, которые вам не нужны. Это прямая финансовая выгода. </div>
			<div class="txt1">Вы будете использовать одну вещь в разных комплектах и образах. И в результате ваш гардероб будет более сочетаемым и разнообразным. Это еще одна прямая финансовая выгода.</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic3.png" alt=""/></td>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic4.png" alt=""/></td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic5.png" alt=""/></td>
				</tr>
				<tr>
					<td>А как оценить <br> вашу уверенность от <br> внешнего вида? </td>
					<td class="td1">А продвижение по работе в<br> связи с этим?</td>
					<td>А повышенное внимание мужа? <br> А комплименты?</td>
				</tr>
			</table>	
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic6.png" alt=""/></td>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic7.png" alt=""/></td>
					<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/pic8.png" alt=""/></td>
				</tr>
				<tr>
					<td>А взгляды подруг и "подруг"?</td>
					<td class="td1">А то, что вы нравитесь себе?</td>
					<td>А то, что ваш сын скажет<br> "Мама, ты заместительница<br> Королевы Красоты"?<br> <span>(это реальные слова сына одной моей <br> клиентки  &#9786;)</span></td>
				</tr>
			</table>	
			<div class="txt2">... во сколько вы готовы это оценить?<div class="arrs"></div></div>
		</div>
	</div>
	
	<div class="block7">
		<div class="ins">
			<div class="bl_name">Почему я отдаю эти знания <br> за такую небольшую сумму?</div>
			<div class="txt1">Отвечу по порядку:</div>
			<div class="txt2"><span>Почему я отдаю эти знания?</span></div>
			<ul>
				<li class="li1">Выдавая эту информацию вам и помогая вам использовать её в реальной жизни, я в свою очередь расту как профессионал. Через меня проходит больше людей. Я принимаю участие в большем количестве разнообразных вариантов преображения. А это откладывается и накапливается на уровне опыта.</li>
				<li class="li2">Есть женщины, которым мои услуги не по карману. Но я могу помочь и им выглядеть лучше. Намного лучше, чем это сделают сайты с советами о моде. Это даёт мне также большое внутреннее удовлетворение. Для меня это способ изменить мир к лучшему и сделать его более красивым.</li>
				<li class="li3">Есть женщины, которые узнают эту информацию и станут моими клиентами. Они познакомятся со мной и захотят, чтобы я за них сделала всю работу и собрала конкретные комплекты. </li>
			</ul>
			<div class="txt2"><span>Почему за такую небольшую сумму?</span></div>
			<ul>
				<li class="li1">Когда я веду большую группу, то одновременно могу рассказывать все принципы и примеры большому количеству людей. В результаты вы платите меньше.</li>
				<li class="li2">Мне не надо ходить с вами по магазинам. Вы сами будете ходить и мерить одежду. Но я не оставляю вас наедине с вещами. Имиджмейкер команды будет контролировать ваше преображение и давать обратную связь по карте шоппинга и подбираемым комплектам. Получается, что часть моей работы делаете вы. В результате вы платите меньше.</li>
				<li class="li3">Имиджмейкер команды будет комментировать ваше преображение в интернете через систему домашних заданий. Вы размещаете домашнее задание — имиджмейкер голосом комментирует его. Вы слушаете запись — и применяете к своему гардеробу.<br><br>Вы в любое время (даже через год) можете выложить ДЗ или вопрос — и в течение недели получить ответ.</li>
				<li class="li4">Имиджмейкер отвечает в удобное время и сразу обрабатываю домашние задания многих женщин. В результате вы платите меньше, чем если бы вас консультировали лично и вживую.</li>
			</ul>
		</div>
	</div>
	
	<div class="block8">
		<div class="ins">
			<div class="bl_name">Давайте я расскажу <br>как вы получите такой результат?</div>
			<div class="txt1"><span>Представляю вам уникальный формат — "имидж-практика".</span></div>
			<p>Она подразумевает плотную работу стилиста (меня) именно с вами.</p>
			<p>У меня нет цели завалить вас теоретическими материалами и оставить <br> один-на-один разбираться с ними.</p>
			<p>Моя главная цель - ваше преображение.</p>
			<p>Чтобы по завершении имидж-практики у вас был конкретный конечный результат — <br> разобранный гардероб, список покупок на шоппинг и готовые комплекты, которые вам идут! </p>
		</div>
	</div>

	<div class="block9">
		<div class="ins">
			<div class="bl_name">Преимущества такого формата</div>
			<div class="txt1">Формат "имидж-практики" предоставляет для вас ряд преимуществ:</div>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico20.png" alt=""/></td>
					<td class="td2"><span>вы сами научитесь разбираться в том, как составлять рациональный гардероб, список покупок, и как действовать на шоппинге</span>Неотъемлемой частью имидж-практики является обучение. Но вы получите только максимально практичные и полезные знания, которые сразу же вам надо будет применить.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico21.png" alt=""/></td>
					<td class="td2"><span>вы можете обучаться из любого города и в любое время</span>Так как имидж-практика проходит через интернет, то вам не надо никуда ехать. Вы можете проходить её в любое время и в любых условиях. Вам будут доступны видеозаписи, и вы сможете пересмотреть их в любой удобный для вас момент.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico22.png" alt=""/></td>
					<td class="td2"><span>вы платите меньше, чем за живую работу со стилистом</span>Это возможно благодаря тому, что обучение проходит в группе. Вы, совместно с другими участниками, будете получать теоретический материал. Но также вы будете получать персональную обратную связь по вашим комплектам и вопросам. Небольшой бонус: вы будете видеть ответы на вопросы других участников, а это тоже очень полезно!</td>
				</tr>
			</table>	
		</div>
	</div>

<div class="block17">
		<!--<div class="txt1"><span>Вот, что вы получите</span></div>-->
		<div class="ins">
			<div style="height: 1075px;">
            </div>
		</div>
	</div>

	<div class="block10 b10_1" id="point2">
		<div class="txt1"><span>План занятий</span></div>
		<div class="ins">
			<div class="block b1">
				<ul>
					<li class="li1"><span>Составление и проработка карты покупок. <br> Закрываем все потребности на сезон и не набираем лишнего.</span></li>
					<li class="li2"><span>Вы узнаете, что обязательно должно быть в вашем гардеробе.</span></li>
					<li class="li3"><span>Вы изучите особенности гардероба в зависимости от вашего типа фигуры и образа жизни.</span></li>
					<li class="li4"><span>Разберём верхнюю одежду на осенне-зимний сезон. Какой минимум должен быть, чтобы закрыть сезон.</span></li>
					<li class="li5"><span>Узнаете, как составлять действительно разнообразные комплекты.</span></li>
				</ul>
				<div class="result">В результате вы составите персональную карту покупок на шоппинг.</div>
			</div>
		</div>
	</div>

	<div class="block10 b10_2">
		<div class="ins">
			<div class="block b2">
				<ul>
					<li class="li1"><span>Разбор имеющегося гардероба.</span></li>
					<li class="li2"><span>Как из карты покупок выделить несколько комплектов.</span></li>
					<li class="li3"><span>Как учесть эти комплекты во время следующих шоппингов, чтобы получить рациональный гардероб.</span></li>
					<li class="li4"><span>Как быть стильной и модной в этом сезоне, не обновляя свой гардероб целиком.</span></li>
				</ul>
				<div class="result">В результате вы разберёте имеющийся гардероб. Составите новые комплекты внутри имеющегося гардероба. Поймете, что необходимо к нему докупить. Научитесь составлять карту покупок на три комплекта.</div>
			</div>
		</div>
	</div>

	<div class="block10 b10_3">
		<div class="ins">
			<div class="block b3">
				<ul>
					<li class="li1"><span>Как составлять маршрут шоппинга.</span></li>
					<li class="li2"><span>Как готовится к шоппингу.</span></li>
					<li class="li3"><span>Как действовать на шоппинге.</span></li>
					<li class="li4"><span>Порядок и последовательность проведения шоппинга.</span></li>
				</ul>
				<div class="result">В результате вы сходите на шоппинг и составите несколько комплектов. Вы даже можете их не покупать, а просто сфотографировать и выложить мне для комментариев. Я их посмотрю и дам рекомендации. Дальше вы сможете повторять этот процесс сколько угодно, пока у вас не будет результата в виде стильных комплектов.</div>
			</div>
		</div>
	</div>

	<div class="block10 b10_4">
		<div class="ins">
			<div class="block b4">
				<ul>
					<li class="li1"><span>Разбираем практический пример составления гардероба на сезон &quot;осень-зима&quot;.</span></li>
					<li class="li2"><span>Вы увидите на реальном примере список покупок на шоппинг и результат: что было куплено и какие комплекты из этого удалось составить.</span></li>
					<li class="li3"><span>На примере научитесь составлять рациональный, но при этом разнообразный гардероб.</span></li>
					<li class="li4"><span>Узнаете, как из минимального количества вещей составить максимальное количество комплектов.</span></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="block11" id="point3">
		<div class="ins">
			<div class="bl_name"><span>Кто ведёт имидж-практику</span></div>
			<div class="bl1">
				<div class="bl_name1">Меня зовут Екатерина Малярова</div>
				<p>И я хочу, чтобы вы знали меня не только с официальной стороны. Вот моя фотография с дочкой, которую зовут Весна — необычное имя <span>&#9786;</span> </p><br>
				<p>Мне хочется, чтобы вы сразу уловили атмосферу будущего тренинга: я буду учить вас имиджу так же, как если бы я учила её. То есть я буду объяснять, помогать и поддерживать.</p>
			</div>
		</div>
	</div>
	<div class="block12">
		<div class="ins">
			<div class="txt">
				<div class="bl_name">А это образ, с которым вы меня знаете в интернет-жизни: по сайту и рассылкам.</div>
				<p>С 2007 года я работаю стилистом-имиджмейкером. У меня уже было свыше 400 клиентов и более 3000 человек проходили мои тренинги и семинары через интернет.</p><br>
				<p>С 2011 года каждую осень и весну езжу с клиентами на шоппинг в Милан. В результате я работаю в Милане целый месяц весной и месяц осенью.</p><br>
				<p>Я сторонник практических советов, которые может применить каждая женщина. Именно ими я и хочу поделиться с вами!</p>
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
<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bg4.jpg') repeat;    border-bottom: 2px dotted #cacbca;height: 470px;padding: 0px 0 0px 0;">
    <div class="ins">
        <div class="pic" style="margin-bottom: 50px;     padding-top: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava4.png" alt=""></center></div>
        <div class="bl2" style="margin: 0 auto; width: 880px;font-size: 24px;line-height: 30px;color: #29302d;border-top: none;padding-top: 0px;">
            <center><p style="font-weight: normal;    font-size: 18px;">"Женщина любого размера и любого возраста может выглядеть великолепно. Главное — правильно подобрать одежду"</p>
                <p style="font-weight: bold;margin-top: 40px;text-decoration: underline;color: -webkit-link;">Эвелина Хромченко</p>
                <p style="font-size: 18px;">fashion expert, TV-presenter, journalist</p></center>
        </div>
    </div>
</div>
<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bg4.jpg') repeat; height: 470px;padding: 0px 0 0px 0;">
    <div class="ins">
        <div class="pic" style="margin-bottom: 50px;     padding-top: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava3.png" alt=""/></center></div>
        <div class="bl2" style="margin: 0 auto;width: 880px;font-size: 24px;line-height: 30px;color: #29302d;border-top: none;padding-top: 0px;">
            <center><p style="font-weight: normal;    font-size: 18px;">"Хочу вас познакомить с талантливым стилистом Катей! Очень рекомендую заглянуть к ней на страничку и пройти тест по стилю. Узнаете много нового и полезного! По крайней мере я узнала"</p>
                <p style="font-weight: bold;margin-top: 40px;"><a href="https://www.instagram.com/p/_rDrEkrJTN/" target="_blank">Эвелина Блёданс</a></p>
                <p style="font-size: 18px;">Российская актриса театра и кино, певица, телеведущая</p></center>
        </div>
    </div>
</div>
<? } ?>

<div class="block17">
		<!--<div class="txt1"><span>Вот, что вы получите</span></div>-->
		<div class="ins">
			<div style="height: 1075px;">
            </div>
		</div>
	</div>


	<div class="block13" id="point4">
		<div class="ins">
			<div class="inn">
				<div class="bl_name">Как все будет происходить</div>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico28.png" alt=""/></td>
						<td class="td2">Вы получаете доступ в закрытый раздел на сайте, где можете смотреть и скачивать обучающие видео, в удобном для вас темпе.</td>
					</tr>
				</table>	
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico29.png" alt=""/></td>
						<td class="td2">После этого вы применяете все эти полученные знания к своему гардеробу. Результаты вашей работы, а также фотографии вы выкладываете в специальном закрытом разделе. Ваш персональный стилист-куратор из команды Гламурненько.ru будет отвечать на вопросы и комментировать ваши результаты.</td>
					</tr>
				</table>	
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico30.png" alt=""/></td>
						<td class="td2">Вы снова применяете рекомендации и снова выкладываете, что у вас получилось. Стилист-куратор снова комментирует. И так — пока вы не достигнете нужного результата!</td>
					</tr>
				</table>	
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico31.png" alt=""/></td>
						<td class="td2">В процессе имидж-практики у вас будет возможность подобрать себе гардероб на сезон "осень-зима". При этом вы сможете размещать фотографии процесса подбора, а также свои вопросы. Стилист-куратор будет всё это комментировать, и вы сможете приобрести лучшие для вас вещи.</td>
					</tr>
				</table>	
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ico32.png" alt=""/></td>
						<td class="td2">Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам. Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс. А служба поддержки оперативно поможет, если у вас останутся какие-то вопросы.
</td>
					</tr>
				</table>	
			</div>	
		</div>
	</div>
	
	<div class="block14">
		<div class="ins">
			<div class="bl_name">&quot;А как долго я могу выполнять задания <br> и получать от вас обратную связь?&quot;</div>
			<p>Практически бесконечно долго <span>&#9786;</span></p>
			<p>Вместе с имидж-практикой идёт гарантированный период проверки <br> ваших заданий — 2 месяца.</p>
			<p>Но потом вы сможете продлить этот срок. <br> Или включить эту возможность, когда вам потребуется.</p>
		</div>
	</div>	
	
    
    <section id="about-of-dop-courses" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bg11.jpg') 0 0 repeat #e8e8e8;">
    <center>
    <section class="page2" id="bonus">
        <h1 style="display: block; width: 580px; background: #fff99f; margin: 0 auto 10px; color: #000;" data-animated="zoomIn" class="title">ИМИДЖ-ПРАКТИКА <br> "ШОППИНГ ОСЕНЬ-ЗИМА <br>ПОД КОНТРОЛЕМ СТИЛИСТА" </h1>
        <h1 style="display: block; width: 640px; background: #fff99f; margin: 0 auto 50px; color: #000;" data-animated="zoomIn" class="title">ЭТО ЕЩЕ НЕ ВСЕ, ЧТО ВАС ЖДЕТ</h1>
        <p>Я подготовила для вас еще подарок. Подробности о нем читайте ниже.</p>
    </section>
    </center>
</section>     
    <div class="block156">
		<div class="ins">
          <div style="height:810px;">
            </div>
		  <p style="margin:15px 70px 15px 70px; font-size:18px;">На этом семинаре:<br><br>
- вы узнаете, какие тенденции актуальны в сезоне осень-зима 2017/2018;<br><br>
- вы изучите актуальные цвета, фасоны, фактуры, компановки в костюмный ансамбль и узнаете, как применить их к своему гардеробу;<br><br>
- сможете выбрать из них то, что подходит именно вам;<br><br>
- узнаете, как с помощью тенденций "разбавить" имеющийся гардероб, сделав его более модным и актуальным.</p> 	
	  </div>
	</div>
    
     <div class="block15-2">    
              <section style="padding: 50px 70px;" class="page">
        <div class="txt1"><span>Вы получаете этот семинар бонусом</span></div>
        <p style="color: #fff; font-size: 20px; font-family: 'Roboto Light', arial; line-height: 24px;">Стандартная цена семинара "Тенденции сезона осень-зима 2016/2017 и как их применить для вашего гардероба" - 1000 рублей. Вы получаете его бонусом при покупке имидж-практики "Шоппинг осень-зима под контролем стилиста".</p>
        <img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bns6-2.png" style="position: absolute; top: 250px; left: 90px; z-index: 5;">
        <h2 style="color: #a2e5ff; margin: 90px 0 300px 250px;">&nbsp;</h2>
        <div style="display: block; width: 440px; height: 70px; position: absolute; top: 350px; right: 200px; border: 2px solid #fff; z-index: 2;">
           <p style="color: #fff; font-size: 35px; text-align: center; line-height: 70px; font-family: 'Roboto Light', arial;">Цена: <span style=""><strike>1000 руб.</strike></span></p>
        </div>
    </section>
</div>
    
    
    <div class="block154">
		<div class="ins">
          <div style="height:730px;">
            </div>
		  <p style="margin:15px 70px 0px 70px; font-size:18px;">Если вы всю жизнь испытывали сложности с выбором аксессуаров, то этот семинар поможет вам забыть об этой проблеме.</p><br>
          <p style="margin:0px 70px 0px 70px; font-size:18px;">Мы подробно разберем следующие вопросы:</p><br>
          <p style="margin:0px 70px 0px 70px; font-size:18px;">- на какие из аксессуаров стоит обратить внимание в этом году и как грамотно дополнить ими свой осенне-зимний образ;</p><br>
          <p style="margin:0px 70px 0px 70px; font-size:18px;">- какие модели обуви актуальны в этом сезоне и с чем их можно сочетать в своем гардеробе;</p><br>
	      <p style="margin:0px 70px 0px 70px; font-size:18px;">- сумки каких цветов, моделей, фактур будут в тренде этой осенью и зимой и с чем их носить;</p><br>
          <p style="margin:0px 70px 15px 70px; font-size:18px;">- какие украшения, головные уборы, платки и шарфы станут изюминкой вашего гардероба в этом сезоне.</p>
	  </div>
	</div>
    
     <div class="block15-2">    
              <section style="padding: 50px 70px;" class="page">
        <div class="txt1"><span>Вы получаете этот семинар бонусом</span></div>
        <p style="color: #fff; font-size: 20px; font-family: 'Roboto Light', arial; line-height: 24px;">Стандартная цена семинара "Top-10 цветов сезона осень-зима 2017/2018 с идеями для вашего гардероба" - 500 рублей. Вы получаете его бонусом при покупке имидж-практики "Шоппинг осень-зима под контролем стилиста".</p>
        <img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bns5-2.png" style="position: absolute; top: 250px; left: 90px; z-index: 5;">
        <h2 style="color: #a2e5ff; margin: 90px 0 300px 250px;">&nbsp;</h2>
        <div style="display: block; width: 440px; height: 70px; position: absolute; top: 350px; right: 200px; border: 2px solid #fff; z-index: 2;">
           <p style="color: #fff; font-size: 35px; text-align: center; line-height: 70px; font-family: 'Roboto Light', arial;">Цена: <span style=""><strike>500 руб.</strike></span></p>
        </div>
    </section>
</div>


<div class="block152">
		<div class="ins">
          <div style="height:730px;">
            </div>
          <p style="margin:15px 70px 15px 70px; font-size:18px;">Я планирую сфотографировать лучшие витрины Милана во время осеннего шоппинга и на основе фотографий сделать семинар с идеями для вашего гардероба.</p>  	
	  </div>
	</div>
    
     <div class="block15-2">    
              <section style="padding: 50px 70px;" class="page">
         <div class="txt1"><span>Вы получаете этот семинар бонусом</span></div>
        <p style="color: #fff; font-size: 20px; font-family: 'Roboto Light', arial; line-height: 24px;">Стандартная цена семинара "Осенние витрины милана идеи для вашего гардероба" - 1000 рублей. Вы получаете его бонусом при покупке имидж-практики "Шоппинг осень-зима под контролем стилиста".</p>
        <img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bns2-2.png" style="position: absolute; top: 250px; left: 90px; z-index: 5;">
        <h2 style="color: #a2e5ff; margin: 90px 0 300px 250px;">&nbsp;</h2>
        <div style="display: block; width: 440px; height: 70px; position: absolute; top: 350px; right: 200px; border: 2px solid #fff; z-index: 2;">
           <p style="color: #fff; font-size: 35px; text-align: center; line-height: 70px; font-family: 'Roboto Light', arial;">Цена: <span style=""><strike>1000 руб.</strike></span></p>
        </div>
    </section>
</div>


<div class="block158">
		<div class="ins">
          <div style="height:810px;">
            </div>
		  <p style="margin:15px 70px 15px 70px; font-size:18px;">Имиджмейкер нашей команды определит ваш цветотип по фотографиям и пришлет отчет по цветам, которые идут вам и смогут подчеркнуть вашу природную красоту.</p> 	
	  </div>
	</div>
    
    <div class="block15-2">    
              <section style="padding: 50px 70px;" class="page">
        <div class="txt1"><span>Вы получаете этот семинар бонусом</span></div>
        <p style="color: #fff; font-size: 20px; font-family: 'Roboto Light', arial; line-height: 24px;">Стандартная цена семинара "Определение цветотипа по фотографии" - 1500 рублей. Вы получаете его бонусом при покупке имидж-практики "Шоппинг осень-зима под контролем стилиста".</p>
        <img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bns8-2.png" style="position: absolute; top: 250px; left: 90px; z-index: 5;">
        <h2 style="color: #a2e5ff; margin: 90px 0 300px 250px;">&nbsp;</h2>
        <div style="display: block; width: 440px; height: 70px; position: absolute; top: 350px; right: 200px; border: 2px solid #fff; z-index: 2;">
           <p style="color: #fff; font-size: 35px; text-align: center; line-height: 70px; font-family: 'Roboto Light', arial;">Цена: <span style=""><strike>1500 руб.</strike></span></p>
        </div>
    </section>
</div>


<div class="block157">
		<div class="ins">
          <div style="height:810px;">
            </div>
		  <p style="margin:15px 70px 15px 70px; font-size:18px;">Из этого семинара вы узнаете:<br><br>
- как определить свой цветотип;<br><br>
- правила определения цветотипов "Зима", "Лето", "Весна" и "Осень", а также -- их подтипов;<br><br>
- какие цвета подходят каждому из цветотипов;<br><br>
- какие цветовые решения будут выигрышными именно для вас.</p> 	
	  </div>
	</div>
    
     <div class="block15-2">    
              <section style="padding: 50px 70px;" class="page">
        <div class="txt1"><span>Вы получаете этот семинар бонусом</span></div>
        <p style="color: #fff; font-size: 20px; font-family: 'Roboto Light', arial; line-height: 24px;">Стандартная цена семинара "Как определить свой цветотип и цвета, которые вам идут" - 500 рублей. Вы получаете его бонусом при покупке имидж-практики "Шоппинг осень-зима под контролем стилиста".</p>
        <img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bns7-2.png" style="position: absolute; top: 250px; left: 90px; z-index: 5;">
        <h2 style="color: #a2e5ff; margin: 90px 0 300px 250px;">&nbsp;</h2>
        <div style="display: block; width: 440px; height: 70px; position: absolute; top: 350px; right: 200px; border: 2px solid #fff; z-index: 2;">
           <p style="color: #fff; font-size: 35px; text-align: center; line-height: 70px; font-family: 'Roboto Light', arial;">Цена: <span style=""><strike>500 руб.</strike></span></p>
        </div>
    </section>
</div>
    
	
	<div class="block172" style="background-image: url(//www.glamurnenko.ru/products/shopping-fw/images/bg32-4-3.jpg);">
		<!--<div class="txt1"><span>Вот, что вы получите</span></div>-->
		<div class="ins">
			<div style="height: 2075px;">
            </div>
		</div>
	</div>	
    
    <div class="block16" id="point5">
		<div class="bl_name">Примите участие в имидж-практике, <br> ничем не рискуя!</div>
		<div class="ins">
			<p>Эта имидж-практика — гарантия от неразумных трат во время очередного шоппинга.</p>
			<p>Эта имидж-практика также гарантия того, что комплекты, которые вы соберете, будут рациональными, сочетающимися, стильными. Вы будете чувствовать себя в них уверенно и будете нравиться себе — а это уже бесценно.</p>
			<p>Но что более важно — это безусловная гарантия. Я понимаю, что вам в имидж-практике важно всё, что я пообещала. Поэтому я даю вам возможность пройти первую неделю имидж-практики полностью без риска!</p>
			<p><span>Если в конце этого времени вы не будете удовлетворены, то я просто верну вам деньги. Без лишних вопросов. Только вы судья!</span></p>
			<p>Но, к сожалению, в этом случае, я вам больше ничего не продам в будущем, чтобы не тратить ваше и наше время.</p>
		</div>
	</div>
	
	<div class="block18" id="point6">
		<div class="ins">  
        <div class="bl_name">Записывайтесь прямо сейчас</div>                       
          <br><br><br>
          <div class="item i2" style="margin: 0 auto; float:none;">
          <div class="name">ВЫ ПОЛУЧАЕТЕ:</div>
				<div class="bl1">
					<ul>
                        <li>Имидж-Практика "Шоппинг осень-зима под контролем стилиста" <strike>(9970 руб.)</strike> </li>
                        <li>Проверка ваших домашних заданий в течение 2 месяцев имиджмейкером команды Гламурненько.ру</li>
						<li>Тенденции сезона осень-зима 2017/2018 и как их применить для вашего гардероба <strike>(500 руб.)</strike> </li>
						<li>Top-10 цветов сезона осень-зима 2017/2018 с идеями для вашего гардероба <strike>(500 руб.)</strike> </li>
                        <li>Осенние витрины Милана. Идеи для вашего гардероба <br><strike>(1000 руб.)</strike></li>
                        <li>Определение цветотипа по фотографии <strike>(1500 руб.)</strike></li>
						<li>Как определить свой цветотип и цвета, которые вам идут <br><strike>(500 руб.)</strike> </li>
					</ul>
				</div>
				<div class="bl2">
					
                    <div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/collage2.png" alt=""/></div>
                    <p style="font-size: 16px; color: #FFFFFF; margin: 5px 25px 25px 35px;">* вы получаете электронные версии продуктов. Диски не высылаются. Вы сможете скачать все на свой компьютер.</p>
                  <div class="price">9 970 руб</div>
					<a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53288"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>" target="_blank">ЗАПИСАТЬСЯ</a>
				</div>
			</div>
			<div class="break"></div>
		</div>
	</div> 
	
	<div class="block19">
		<div class="bl_name">Частые вопросы</div>
		<div class="ins">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/q.png" alt=""/></td>
					<td class="td2">Что такое имидж-практика?</td>
				</tr>
				<tr class="tr2">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/a.png" alt=""/></td>
					<td class="td2">Имидж-практика - это сконцентрированная работа по одному из направлений имиджа. В данном случае по шоппингу сезона осень-зима. В процессе я буду выдавать вам много полезной и практической информации. Но самое главное - ваше преображение. В идеале вы будете выкладывать свои фотографии в планируемых комплектах, чтобы мы могли прокомментировать и подсказать вам "что", "с чем" и "как" носить. Чтобы вы выглядели "на все 100"!</td>
				</tr>
			</table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/q.png" alt=""/></td>
					<td class="td2">Тренинг будет проходить через интернет или вживую надо куда-то идти?</td>
				</tr>
				<tr class="tr2">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/a.png" alt=""/></td>
					<td class="td2">Только через интернет. И этот формат дает ряд преимуществ для вас:<br>
- вам не надо никуда ехать, достаточно иметь компьютер;<br>
- вы можете скачать запись и просматривать её сколько угодно и когда угодно;<br>
- цена тренинга намного ниже, чем цены живых мероприятий.</td>
				</tr>
			</table>	
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/q.png" alt=""/></td>
					<td class="td2">Могу ли я купить имидж-практику сейчас, а проходить через месяц / полгода / год?</td>
				</tr>
				<tr class="tr2">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/a.png" alt=""/></td>
					<td class="td2">Да, вы можете проходить имидж-практику в любое удобное для вас время. Вместе с имидж-практикой идет гарантированный период проверки ваших домашних заданий - 2 месяца. Как только вы купили - этот период начался. Заморозить его, к сожалению, нельзя. Но вы можете потом продлить этот срок или включить, когда захотите (например, через полгода). Стоимость продления/включения = 500 рублей/мес.</td>
				</tr>
			</table>	
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/q.png" alt=""/></td>
					<td class="td2">Мне обязательно присутствовать онлайн или можно будет скачать запись встречи?</td>
				</tr>
				<tr class="tr2">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/a.png" alt=""/></td>
					<td class="td2">Тренинг предоставляется в записи. Выполненные домашние задания вы размещаете в закрытом разделе, а имиджмейкер команды их комментирует и подсказывает вам, что делать.</td>
				</tr>
			</table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr class="tr1">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/q.png" alt=""/></td>
					<td class="td2">Нужно ли мне в процессе тренинга покупать одежду?</td>
				</tr>
				<tr class="tr2">
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/a.png" alt=""/></td>
					<td class="td2">Что-то вы сможете "дотянуть" из уже имеющейся у вас одежды. А что-то надо будет докупать. Но эти покупки будут очень рациональными и оправданными. Без покупки новых вещей сложно сделать что-то кардинально новое и интересное. Но в любом случае вы потратите намного меньше денег, чем просто самостоятельно закупая одежду без моей поддержки.<br><br>Или вы можете купить имидж-практику "впрок". Потренироваться сначала на виртуальных комплектах, а потом, когда появится возможность, применить и в своем гардеробе.</td>
				</tr>
			</table>	
		</div>
	</div>
	
	<div class="block20">
		<div class="ins">
			<div class="txt">
				<div class="name">Быстрая помощь службы поддержки</div>
				<p>Участницы имидж-практики смогут при необходимости получить помощь от нашей службы поддержки.</p><br>
				<p>Сотрудники службы поддержки оперативно ответят на все вопросы и разберутся со случайными ошибками и неувязками. Сделают максимум возможного, чтобы вы ощущали себя комфортно и не оставались один на один с нерешёнными проблемами.</p><br>
				<p>Связаться со службой поддержки можно с любой страницы в правом нижнем углу, либо дополнительно со страницы:</p><br>
				<p><a href="https://glamurnenko.ru/blog/contacts/">https://glamurnenko.ru/blog/contacts/</a></p>
			</div>
		</div>
	</div>	
	<div class="block21">
		<div class="ins">
			<div class="txt1" style="padding-bottom: 30px;"><span>Получилось ли это у кого-нибудь?</span></div>
			<div class="txt1" ><span style="font-size: 30px;">Прочитайте отзывы на этот и другие мои тренинги</span></div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava01.jpg" alt=""/></div>
				<div class="top">
					На самом деле было сложно, потому что я всегда когда захожу в свой гардероб мне хочется сесть и заплакать….а тут пришлось составлять много комплектов. Но зато теперь я балдею, потому что всегда есть что одеть….Сейчас даже больше проблема – что выбрать из одежды, какой комплект одеть именно сегодня….Это, кстати, тоже проблема)))) 
				</div>
				<div class="center">
					Здравствуйте, Катерина.
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
<br/>
<br/>Ну реакция окружающих на меня всегда положительная, но сестра младшая сказала, что я стала более модная и стильная, чем раньше. И что так хорошо я никогда не выглядела.
<br/>
<br/>Недостаточно хорошо я проработала вопрос избавления от старого, но есть здесь один момент! Я еще не до конца понимаю, что мне идет лучше всего именно по моей фигуре, то есть на что заменить…потому что я купила несколько новых вещей, но вы, например, сказали, что их лучше заменить. Поэтому я все-таки сначала хочу до конца разобраться в том, что на мне более выгодно смотрится из одежды. Я пока не до конца это освоила.
<br/>
<br/>Катерина, огромное вам спасибо !!!
<br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/bbf632690e2f15ebe7188a6831cf4fc1.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/bbf632690e2f15ebe7188a6831cf4fc1.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/a86af92aa6d89ef3d7b601468f82d641.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/a86af92aa6d89ef3d7b601468f82d641.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/7158c927078477f7c02626c5dc6463c2.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/7158c927078477f7c02626c5dc6463c2.jpg" alt="" width="150" data-mce-width="150"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/662b2046fa53e75f2c07a81b02b26c3f.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/662b2046fa53e75f2c07a81b02b26c3f.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/83ba7212f1d6706efdafba280febf5dc.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/83ba7212f1d6706efdafba280febf5dc.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/61fbb9ef134addcc1197fa9221958c99.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/61fbb9ef134addcc1197fa9221958c99.jpg" alt="" width="150" data-mce-width="150"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/8ce010b7ac2df4a60ee19391bba9b584.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/8ce010b7ac2df4a60ee19391bba9b584.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/01d8dfa8c6ac52796439bbc336c404c8.jpg" target="_blank" rel="lightbox[8184]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/01d8dfa8c6ac52796439bbc336c404c8.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td></td>
</tr>
</tbody>
</table>
</center>
				</div>
				<div class="bottom">
					Екатерина, Киев, предприниматель
				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava_def.png" alt=""/></div>
				<div class="top">
					Имидж-практика помогла в более рациональном подходе к шоппингу. Карта покупок помогла понять, что конкретно нужно докупить к имеющемуся гардеробу. Список магазинов расширил границы видения. Конечно, много положительных эмоций от достигнутого на сегодня результата, и успокаивает понимание того, в каком направлении двигаться дальше, и что сейчас актуально.
				</div>
				<div class="center">
					Добрый день, Екатерина!
<br/>Какие проблемы были: хотелось сделать гардероб более модным, интересным, добавить новых тенденций и попробовать сочетания, которых раньше не носила. Как пыталась решить — слушала ваши семинары про тенденции и долго бродила по магазинам, изучая все подряд и ничего не находя себе)…
<br/>
<br/>Имидж-практика помогла в более рациональном подходе к шоппингу. Карта покупок помогла понять, что конкретно нужно докупить к имеющемуся гардеробу. Список магазинов расширил границы видения.
<br/>
<br/>И еще, как многие уже отмечали здесь, очень помогает фотка собранного комплекта — видишь себя со стороны!
<br/>
<br/>— Разобрала старый гардероб весна-лето, попробовала по-новому сочетать комплекты.
<br/>— Проработала список магазинов, особенности разных брендов, изучила новые магазины средней ценовой категории.
<br/>— Составила список необходимых вещей
<br/>— Купила несколько вещей в тенденциях нового сезона и составила из них новые комплекты
<br/>
<br/>Эмоции. Конечно, много положительных эмоций от достигнутого на сегодня результата, и успокаивает понимание того, в каком направлении двигаться дальше, и что сейчас актуально. Очень радуют джинсы-бойфренды и сочетания с ними).
<br/>
<br/>НО еще многое надо прорабатывать, учиться видеть по-новому, старые привычки тянут назад. Я по-прежнему не всегда могу определить, удачное ли сочетание вещей или нет(, выбираю похожее на то, что у меня уже есть.
<br/>
<br/>Моему мужчине нравятся комплекты с джинсами, платье, яркие туфли ). Говорит, что мне нужно добавить больше яркости и выбирать интересную не безликую обувь. На работу пока еще не все комплекты выгуляла).
<br/>
<br/>Недостаточно хорошо проработала еще украшения, подходящие мне фасоны юбка + топ, сочетания с удобной обувью.
<br/>
<br/>Планирую примерить еще несколько вариантов юбок, подобрать подходящие лоферы, померить разные браслеты (металлические хочется подобрать)
<br/>
<br/>Спасибо вам за работу!
				</div>
				<div class="bottom">
					Евгения, Москва
				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava_def.png" alt=""/></div>
				<div class="top">
					Имидж-практика помогла мне взглянуть на себя &quot;со стороны&quot; и дала инструменты к действию. И как дополнительный бонус — смогла отпустить ситуацию с тем, что поправилась и &quot;не могу себе позволить красивых вещей&quot; и в результате сбросила за время прохождения имидж-практики 3,5 кг и могу теперь себе позволить вещи на размер меньше :-).
				</div>
				<div class="center">
					Основная проблема была в непонимании как изменить то, что не нравится. Как сделать свой образ стильный, современным и соответствующим моей внешности и ситуации? Сама пыталась покупать яркие платья, но при этом не получался законченный интересный образ.
<br/>
<br/>Имидж-практика помогла мне взглянуть на себя &quot;со стороны&quot; и дала инструменты к действию. Уже удалось научиться видеть образы целиком и расширился горизонт восприятия того, что мне подойдет. Начало получаться в магазинах &quot;выцеплять взглядом&quot; интересные модели. И как дополнительный бонус — смогла отпустить ситуацию с тем, что поправилась и &quot;не могу себе позволить красивых вещей&quot; и в результате сбросила за время прохождения имидж-практики 3,5 кг и могу теперь себе позволить вещи на размер меньше :-).
<br/>
<br/>Составила предварительный список-покупок, разобрала гардероб, исследовала магазины на предмет того, подходят они мне или нет. Составила маршрут-шоппинга.
<br/>
<br/>Получила не только актуальную мне информацию, но и мотивацию на позитивные изменения. С нетерпением жду комментариев по моим домашним заданиям и готова &quot;в бой&quot; к новой красивой жизни.
<br/>
<br/>Большое спасибо за Ваш труд и увеличение красоты вокруг!
				</div>
				<div class="bottom">
					Ольга, Москва, в отпуске по уходу за детьми
				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava02.jpg" alt=""/></div>
				<div class="top">
					После имидж-практики разобрала гардероб и научилась составлять карту покупок!! Я была в восторге от простого и понятного изложения. Карта покупок- очень нужная и полезная схема. За это отдельное спасибо! Я чувствую себя уверенно и комфортно в новых комплектах.
				</div>
				<div class="center">
					Здравствуйте, Катя! Спасибо за тренинг! Я с большим удовольствием пишу отчёт о нашей совместной с Вами работе.
<br/>
<br/>Основной проблемой для меня было большое количество вещей в гардеробе, но я не могла составлять комплекты из них. Много было одинаковых вещей. Много нейтральных цветов. Я всегда побаивалась ярких красок в одежде. Я не обращала внимание на тенденции, составляя свой гардероб из классических вещей. Поэтому покупка новых вещей не исправляла ситуацию, а даже усугубляла. Потому что деньги были потрачены, а ощущения новых вещей в гардеробе не было.
<br/>
<br/>После имидж-практики разобрала гардероб и научилась составлять карту покупок!!!!!!!!!!!! Теперь у меня есть карта, где я отмечаю что есть и что именно надо купить. Я поняла как сделать так, чтобы вещи можно было вписывать в комплекты. Нужна тренировка, но основа есть и понимание в какую сторону двигаться дальше тоже есть. С помощью комментариев Кати, я попробовала посмотреть на свой гардероб другими глазами. Наконец-то до меня дошло, в чём разница между разными топами и от чего комплекты смотрятся по-разному.
<br/>
<br/>Меня всегда смущало ощущение слишком делового костюма. Теперь я понимаю как можно надеть жакет так, чтобы это было модно и молодо. Мне сложно объяснить, но теперь я вижу то, что раньше не замечала. Я стала иначе вести себя на шоппинге. Наконец-то выделила сегмент магазинов &quot;для себя&quot;.
<br/>
<br/>Я усердно выполняла все домашние задания. Попробовала сходить на шоппинг с картой и маршрутом. Я старалась обратить внимание на те вещи, которые раньше обходила стороной. Наконец-то я примерила разные фасоны платьев и выделила &quot;своё&quot; платье. Я также попробовала составить карту покупок на сезон для своего мужа и сыновей. Карту-схему буду использовать не только для шоппинга, но и для отпуска, например. Очень легко с такой схемой собираться, так как чётко составлены комплекты и не надо брать с собой кучу ненужных вещей.
<br/>
<br/>Я была в восторге от простого и понятного изложения. Карта покупок- очень нужная и полезная схема. За это отдельное спасибо! Очень помогают наглядные примеры — фотографии. Потому что слышать это одно, а видеть — это совсем другое. Лично мне наглядно легче запомнить и тенденции и цвета и фасоны.
<br/>
<br/>На реакцию окружающих особого внимание не обращала. Но вот мои личные ощущения от новых знаний и образов, зашкаливают. Я чувствую себя уверенно и комфортно в новых комплектах.
<br/>
<br/>Планирую заняться составлением комплектов из имеющихся вещей. Я буду пробовать постепенно дополнять то, что есть и стараться сделать классические комплекты более актуальными. В планах сделать свой гардероб супер рациональным, избавиться от однотипных вещей, стараться выглядеть по-разному за счёт составления новых комплектов. Я совсем не проработала тему украшений и гардероба для вечеринок. Я бы с удовольствием проработала гардероб осенне-зимнего сезона.
<br/>
<br/>Спасибо за Ваш труд и море полезной информации!
<br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-1.jpg" target="_blank" rel="lightbox[8359]" title="Отзыв на Имидж-практику " class="cboxElement"><img class="alignleft" title="" src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-1.jpg" alt="" width="250" align="left" style="padding:20px"></a></td>

<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-2.jpg" target="_blank" rel="lightbox[8359]" title="Отзыв на Имидж-практику " class="cboxElement"><img class="alignleft" title="" src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-2.jpg" alt="" width="250" align="left" style="padding:20px"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-3.jpg" target="_blank" rel="lightbox[8359]" title="Отзыв на Имидж-практику " class="cboxElement"><img class="alignleft" title="" src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-3.jpg" alt="" width="250" align="left" style="padding:20px"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-4.jpg" target="_blank" rel="lightbox[8359]" title="Отзыв на Имидж-практику " class="cboxElement"><img class="alignleft" title="" src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-4.jpg" alt="" width="250" align="left" style="padding:20px"></a></td>
</tr>
</tbody>
</table>
</center>
				</div>
				<div class="bottom">
					Наталья Смирнова, Одесса, работает в финансовой компании
				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava_def.png" alt=""/></div>
				<div class="top">
					После имидж-практики я вообще хожу в магазин с другими глазами. Теперь я понимаю в какой магазин за какой вещью стоит идти. Шоппинг стал более осмысленным и менее нервным. Эмоции переполняют: я увидела себя в новом свете. Поняла, что шоппинг может приносить удовольствие. Огромное спасибо за тренинг! Это для меня новая ступень в жизни.
				</div>
				<div class="center">
					Екатерина, спасибо, большое за тренинг.
<br/>До имидж-практики я вообще не понимала как подбирать вещи. Все вещи были разрозненные, что с чем сочетается не очень у меня вязалось. Вещи покупала все однотипные, другие даже не видела, думала не мое, не пойдет. И даже боялась пробовать.
<br/>
<br/>После имидж-практики я вообще хожу в магазин с другими глазами. Я раньше ходила в магазин и ничего там не видела, я удивлялась, что люди там покупают, там ничего нормального нет…. Сейчас я четко знаю, что мне надо, вижу варианты, могу спокойно выбрать и понимаю, что мое, а что нет. Стала лучше ориентироваться в магазинах. Теперь я понимаю в какой магазин за какой вещью стоит идти. Шоппинг стал более осмысленным и менее нервным.
<br/>
<br/>Сделано очень много: полностью поменяла свой гардероб, из старого осталось всего пару вещей, и то, те, которые были куплены недавно. Особенно решила проблему с обувью. Обувь для меня был самым больным вопросом, теперь все гораздо проще. Открыла для себя новые магазины, в которые раньше даже на заходила.
<br/>
<br/>Эмоции переполняют: я увидела себя в новом свете. Поняла, что шоппинг может приносить удовольствие.
<br/>
<br/>Получаю много комплиментов. Чувствую себя уверенней и спокойней.
<br/>Прорабатывать еще стоит много чего. Надо больше практики. Не совсем освоила тему жакетов. Как то он у меня пока не вяжется. Но может просто сейчас слишком жарко, и по погоде он у меня не пошел.
<br/>
<br/>Огромное спасибо за тренинг! Это для меня новая ступень в жизни.
				</div>
				<div class="bottom">
					Наталья, Ростов-на-Дону, фрилансер
				</div>
			</div>			
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava03.jpg" alt=""/></div>
				<div class="top">
					Катины лекции помогли навести порядок голове. Я думаю что мои эмоции лучше назвать азартом и радостью, мне теперь не составляет особого труда быстро и красиво одеваться. Я могу теперь сказать с уверенностью что на меня с интересом смотрят женщины и мужчины. Ещё у меня к добавление к составленным образам всегда уверенность и хорошее настроение.
				</div>
				<div class="center">
					Я художник по костюмам.В свободное от работы время занимаюсь свой дочуркой. Мы много гуляем. Ещё я осваиваю новую для специальность имиджмекер.
<br/>
<br/>Вещей в моём гардеробе было очень много хотелось навести порядок, убрать все лишнее и разобрать гардероб, было много неудобной обуви. Мне всегда хотелось прибрать в гардеробе,но я не решалась избавиться от ненужных вещей которые я не ношу и мне не удобны.
<br/>
<br/>Катины лекции помогли навести порядок голове. Я постаралась быть честной и прослушав Катин семинар начала задавать себе вопросы:&quot; Удобна обувь или нет&quot;. А вещи которые я точно знаю что их уже носить не буду отдала.
<br/>
<br/>Я думаю что мои эмоции лучше назвать азартом и радостью, мне теперь не составляет особого труда быстро и красиво одеваться.
<br/>
<br/>Я могу теперь сказать с уверенностью что на меня с интересом смотрят женщины и мужчины. Ещё у меня к добавление к составленным образам всегда уверенность и хорошее настроение.
<br/>
<br/>Я не достаточно проработала комплекты на море и конечно ещё нужно потренироваться со списком на шопинг и его выполнением на практике.
<br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-1.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-1.jpg" alt="" width="250" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-2.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-2.jpg" alt="" width="250" data-mce-width="250"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-3.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-3.jpg" alt="" width="250" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-4.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-4.jpg" alt="" width="250" data-mce-width="250"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-5.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-5.jpg" alt="" width="250" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-6.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-6.jpg" alt="" width="250" data-mce-width="250"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-7.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-7.jpg" alt="" width="250" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-8.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-8.jpg" alt="" width="250" data-mce-width="250"></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-9.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-9.jpg" alt="" width="250" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-10.jpg" target="_blank" rel="lightbox[8317]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2-10.jpg" alt="" width="250" data-mce-width="250"></a></td>
</tr>
</tbody>
</table></center>
				</div>
				<div class="bottom">
					Ирина Рубио, Москва, художник по костюмам
				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava04.jpg" alt=""/></div>
				<div class="top">
					Эмоции и у меня, и у моих домашних в процессе составления новых комплектов были самые положительные! К своему юбилею я подошла помолодевшей, несмотря на свой возраст и явно похорошевшей!Это отметили все! Благодарю Катеньку и ее команду за замечательные тренинги, делающие нас &quot;красивыми и успешными, и ни на кого не похожими!!!:-*
					</div>
				<div class="center">
					Здравствуйте! Я — Ирина Пауэлл (Irina Powell), родной город Москва, но сейчас (уже 7 лет) я живу в Великобритании в городе Кардиффе (столица Уэльса).
<br/>
<br/>Я врач- холистический терапевт (в России была физио- и рефлексотерапевт). У меня частная практика и я езжу на машине к своим пациентам. Дресс кода особого нет, но все равно врач должен выглядеть не слишком эпатажно и драматично!:-)
<br/>
<br/>Основная моя задача была обновить уже имеющийся гардероб, освежить его, внести новые современные нотки. Главное — я научилась составлять карту шоппинга, а не покупать отдельные вещи, не всегда вписывающиеся в мой гардероб. Очень много старых вещей выбросила, в некоторые &quot;вдохнула&quot; новую жизнь в других комплектах.
<br/>
<br/>В основном я покупала вещи в интернете, но при таком способе покупок не всегда можно сразу понять подойдет ли мне вещи, и в каком комплекте/комплектах она у меня будет.
<br/>
<br/>С помощью имидж-практики я научилась на ходить свои магазины, научилась видеть свои товары и открыла для себя массу новых магазинов в Кардиффе, в которые раньше даже не заглядывала. Спасибо огромное Кате и ее команде за прекрасное изложение и замечательные новые идеи!
<br/>
<br/>В результате я разобрала свой гардероб,составила карты шоппинга на сейчас и позже, открыла для себя новые магазины и научилась в них видеть свои комплекты.
<br/>
<br/>Эмоции и у меня, и у моих домашних в процессе составления новых комплектов были самые положительные! К своему юбилею я подошла помолодевшей, несмотря на свой возраст и явно похорошевшей!Это отметили все!
<br/>
<br/>Теперь мне нужен семинар по косметике, потому что в обновлении нуждается не только одежда, но и лицо. Не всегда хватало финансов на все, что хотелось купить, но летний сезон еще будет здесь в этой стране как минимум месяца три, сентябрь тут тоже иногда бывает теплее июня! Так что некоторые вещи я докуплю чуть позже.
<br/>
<br/>Благодарю Катеньку и ее команду за замечательные тренинги, делающие нас &quot;красивыми и успешными, и ни на кого не похожими!!!:-*
<br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-1.jpg" target="_blank" rel="lightbox[8299]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-1.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2.jpg" target="_blank" rel="lightbox[8299]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-2.jpg" alt="" width="150" data-mce-width="150"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-3.jpg" target="_blank" rel="lightbox[8299]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-iriny-3.jpg" alt="" width="150" data-mce-width="150"></a></td>
</tr>
</tbody>
</table>
</center>
				</div>
				<div class="bottom">
					Ирина Пауэлл, Кардиффе, Великобритания, врач- холистический терапевт


				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava05.jpg" alt=""/></div>
				<div class="top">
					Имидж-практика помогла проанализировать свой гардероб, составить список покупок на шоппинг, начать мыслить образами, найти &quot;свои&quot; магазины. У мужа реакция положительная. Советуется, что ему купить и что надеть)
					</div>
				<div class="center">
					Добрый день, Екатерина.
<br/>Меня зовут Анна, г. Москва. Работаю начальником отдела продаж. Дресс-код- свободный стиль.
<br/>
<br/>ДО тренинга гардероб был однотипный. Вроде все вещи носились, все со всем сочеталось, вещь вписывалась в комплекты, но оставалось ощущение, что нет изюминки и комплекты однотипные.
<br/>Имидж-практика помогла проанализировать свой гардероб, составить список покупок на шоппинг, начать мыслить образами, найти &quot;свои&quot; магазины. После имидж-практики разобрала гардероб, написала список недостающих вещей, выбросила ненужные вещи, докупила вещи по списку.
<br/>
<br/>Эмоции при прохождении практики были положительные! Хотелось быстрее все применить. Оказывается, если действовать по алгоритму, можно получить нужный результат не тратя много времени и сил.
<br/>
<br/>У мужа реакция положительная. Советуется, что ему купить и что надеть)
<br/>
<br/>Спасибо за прекрасные тренинги!
<br/>С нетерпением буду ждать следующих.
<br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-1.jpg" target="_blank" rel="lightbox[8279]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-1.jpg" alt="" style="height: 400px" data-mce-width="400"></a></td>

<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-2.jpg" target="_blank" rel="lightbox[8279]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-2.jpg" alt="" style="height: 400px" data-mce-width="400"></a></td>
</tr>
</tbody>
</table>
</center>
				</div>
				<div class="bottom">
					Анна, Москва, начальник отдела продаж
				</div>
			</div>
			<div class="item">
				<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava06.jpg" alt=""/></div>
				<div class="top">
					Эмоции от тренинга как всегда только положительные, поскольку это мой не первый тренинг. Огромное спасибо Катерине за интересные идеи и советы.
					<br/><br/></div>
				<div class="center">
					У меня в гардеробе было очень много низов и мало верхов.
<br/>После имидж практики я поняла что многие молодёжные бренды уже мне не подходят, хотя очень трудно себя перестроить, поскольку подходящие мне теперь бренды выше по ценовому классу. Поняла, что ещё надо проводить разбор гардероба, поскольку вещей много и уже не для меня. Конкретно уже написала список недостающих вещей и помаленьку начинаю их приобретать.
<br/>
<br/>Эмоции от тренинга как всегда только положительные, поскольку это мой не первый тренинг.
<br/>Особых эмоций от окружающих я не ощутила, поскольку вкус интересно комбинировать вещи у меня всегда был, но развивать его его всегда хорошо и полезно. Огромное спасибо Катерине за интересные идеи и советы.
<br/>
<br/>Хотелось бы по больше пособирать необычных комплектов, попытаюсь заняться этим в отпуске.
<br/>
<center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-3.jpg" target="_blank" rel="lightbox[8264]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-3.jpg" alt="" height="500" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-4.jpg" target="_blank" rel="lightbox[8264]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-4.jpg" alt="" height="500" data-mce-width="250"></a></td>

<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-1.jpg" target="_blank" rel="lightbox[8264]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-1.jpg" alt="" height="500" data-mce-width="250"></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-5.jpg" target="_blank" rel="lightbox[8264]" title="Отзыв на Имидж-практику " class="cboxElement"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2015/08/Gailish-5.jpg" alt="" height="500" data-mce-width="250"></a></td>
</tr>
</tbody>
</table>
</center>
				</div>
				<div class="bottom">
					Kristina Gailish, Эстония, Таллинн, стилист-консультант в женском отделе универмага
				</div>
			</div>


			<div class="item">
				<div class="inn">
						<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava1.png"></div>
					<div class="top">
						<div class="txt">Практически каждый день я получала комплименты от коллег, зам. генерального директора &quot;оценила&quot; мой внешний вид, сказав, что выгляжу элегантно, со вкусом и по-деловому. На одной деловой поездке с директором, получив от него комплимент, состоялся разговор, что мне надо сделать, чтобы получить повышение! <br>
						  <br>
На работе – комплименты; стали относиться серьезнее, что очень важно для молодого специалиста! Очень чувствуется мужское внимание! </div>
						
					</div>
					<div class="center">
						<p>Здравствуйте, Катя и команда Glamurnenko!<br><br>Я работаю в Москве в сфере строительства специалистом по согласованию. Мое представление об офисном гардеробе ограничивалось белыми рубашками, черными аксессуарами и бесформенным скучным костюмом. Чтобы получить какой-то карьерный рост, нужно выглядеть &quot;с иголочки&quot;, поэтому я решила кардинально заняться своим имиджем.<br><br>До тренинга в моем гардеробе были только белые рубашки, черная обувь, 2 сумки: бежевая и черная, практически вся одежда бесформенная и не интересная. Настроение и уверенность в себе были на соответствующем уровне. Вещи покупались из раза в раз одинаковые, серые и безликие.<br><br>По мере прохождения тренинга, я составляла комплекты, добавляя какие-то украшения, делая образы лаконичными, женственными и насколько возможно интересными. Практически каждый день я получала комплименты от коллег, зам. генерального директора &quot;оценила&quot; мой внешний вид, сказав, что выгляжу элегантно, со вкусом и по-деловому. На одной деловой поездке с директором, получив от него комплимент, состоялся разговор, что мне надо сделать, чтобы получить повышение! Теперь я очень хорошо прочувствовала, как важен стиль, дресс-код и аккуратность в одежде.<br><br>Я основательно почистила гардероб, отдала все вещи, которые подчеркивают какие-то мои недостатки. Избавилась примерно от 2/3 своих вещей! Сейчас составила список must have, буду потихоньку добавлять их в свой гардероб, предстоит большооой shoooopping Теперь при виде вещи в голове рождается образ, какие комплекты можно составить.<br><br>Тренинг помог мне не только с разбором гардероба, но и появилось &quot;чуткость к цветам&quot;: в ванной была сделана интересная переделка, всего лишь с помощью баллончика краски и капельки фантазии. Хочется добавить цветов в интерьер. Хочется заниматься своей внешностью: ноготочки; делать прически ежедневно, а не только по праздникам; макияж. В общем, есть, где развернуться и применять новые знания!<br><br>Тренинг погрузил меня в совершенно другой мир: жакеты, блейзеры, футлярные платья и лодочки. Раньше в моем лексиконе даже таких слов не было. Были совершенно новыми материалы по цветотипу: никогда не следовала этим правилам, хотя и замечала, что некоторые цвета совершенно не идут к лицу. Информации очень много, интересной и разнообразной.<br><br>На работе – комплименты; стали относиться серьезнее, что очень важно для молодого специалиста! Очень чувствуется мужское внимание!<br><br>Тема с подходящими цветами довольно глубокая. За одно занятие все не изучить. Буду переслушивать занятия, учиться составлять интересные образы не только в офис, но и в повседневной жизни.<br><br>Я очень благодарна Екатерине за интересный результативный тренинг!</p>
						</p>
						<p><br>
					  </p>
						<center>
															<table>
																<tbody>
																	<tr>
																		<td>
																			<img alt="включите загрузку изображений" height="268" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bocharova-3.jpg" width="200" /></td>
																		<td>
																			<img alt="включите загрузку изображений" height="268" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bocharova-4.jpg" width="200" /></td>
																	</tr>
																	<tr>
																		<td>
																			<img alt="включите загрузку изображений" height="268" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bocharova-5.jpg" width="200" /></td>
																		<td>
																			<img alt="включите загрузку изображений" height="355" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bocharova-6.jpg" width="200" /></td>
																	</tr>
																	<tr>
																		<td>
																			<img alt="включите загрузку изображений" height="230" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bocharova-7.jpg" width="200" /></td>
																		<td>
																			<img alt="включите загрузку изображений" height="223" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/bocharova-8.jpg" width="200" /></td>
																	</tr>
																</tbody>
															</table>
                      </center>
				  </div>
					<div class="bottom">Евгения Бочарова, г.Москва, Работает в сфере строительства специалистом по согласованию</div>
				</div>	
			</div>
			<div class="item">
				<div class="inn">
						<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava2.png" alt=""/></div>
					<div class="top">
						<div class="txt">В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины). </div>
						
					</div>
					<div class="center">
						<p>Гардероб у меня был скучным и неинтересным, потом прошла базовый тренинг по имиджу у Екатерины в 2011 году и ситуация улучшилась. Сейчас поняла, что немного застопорилась в составлении более интересных комплектов, поэтому снова пришла к Кате.<br>
						  <br>
						  Тренинг помог мне понять, что такое базовый гардероб. До этого ясности не было. Теперь сконцентрируюсь на том, чтобы сформировать правильный гардероб из того, что есть, и докупить то, чего не хватает. Поразило внесение ожерелья в базовые вещи (и то, насколько это верно), понравилась тельняшка (у меня ее нет, но, думаю, что обязательно появится).<br>
						  <br>
						  Я наверное как те клиенты Екатерины, у которых весь гардероб состоит из расходных вещей, хотя я у себя отметила в наличии более половины из списка базовых, но не было знаний для формирования целостного гардероба.<br>
						  <br>
						  В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).<br>
						  <br>
						  Эмоции от Екатерины всегда положительные, она очень вдохновляет. Я очень рада, что приняла решение пройти этот тренинг! (уже не единожды ловила себя на этой мысли)<br>
						  <br>
					    Еще планирую дослушать все дни тренинга, выписать цвета для всех вещей и понемногу докупать необходимое (для начала ожерелье и тренч, о котором давно мечтаю). Я еще недостаточно хорошо проработала создание образов, необходимо будет этим заняться.</p>
						<p>&nbsp;</p>
                        
                        <center><table><tbody><tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" alt="" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" alt="" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" alt="" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" target="_blank"><img src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td></tr></tbody></table></center>
					</div>
					<div class="bottom">Светлана Пакер, г.Санкт-Петербург</div>
				</div>	
			</div>
            
            <div class="item">
				<div class="inn">
						<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava3.png" alt=""/></div>
					<div class="top">
						<div class="txt">Эмоции непередаваемые — сплошной восторг! Одна моя очень хорошая знакомая сказала, что я похудела и как хорошо я выгляжу, я также получила много комплиментов от мужа и сына.  <br>  <br></div>
						
					</div>
					<div class="center">
						<p>За последние 7 лет после рождения двух деток я побывала в 4-х размерах и у меня накопилось огромное количество одежды с которой я не знала что делать. Благодаря Базовому Тренингу по Имиджу, который я прошла у Кати я узнала много полезной информации и начала применять полученные знания на практике. Но в силу занятости мне не хватало полного погружения в вопросы стиля и имиджа, не было времени пересмотреть весь гардероб, перебрать вещи, составить побольше комплектов на разные случаи жизни.<br>
						  <br>
						  Сейчас я также понимаю, что мне не хватало многих базовых вещей. Кроме того было много расходных вещей вышедших из моды.<br>
						  <br>
						  На тренинге я усвоила что такое базовые и расходные вещи и в чем их роль, как с минимумом вещей можно составить очень много стильных комплектов. Теперь я лучше понимаю что делает образ интересным и законченным, как строить образ на контрасте, как можно корректировать фигуру при помощи базовых вещей.<br>
						  <br>
						  Я наконец-то навела порядок у себя в шкафу и избавилась от приличной стопки шмоток, купила некоторые недостающие базовые вещи, составила список базовых вещей которые со временем нужно докупить. Я еще лучше подготовлена к наступлению весны! Теперь у меня составлено множество комплектов на разные случаи жизни.<br>
						  <br>
						  Мне очень импонирует Катин стиль подачи информации и я с нетерпением ждала каждого дня и проверки моих домашних заданий.<br>
						  <br>
						  Иногда в силу недостатка времени я проходила какие-то темы &quot;голопам по Европам&quot;. Спустя пару недель я обязательно прослушаю тренинг еще раз и просмотрю разбор домашних заданий других участниц, так как я не успевала это делать.<br>
						  <br>
						  Еще мне нужно поменять свое ежедневное отношение к вещам, мне часто &quot;жалко&quot; наряжаться. В последние годы я отдавала предпочтение практичной, зачастую никакой одежде, не покупала ничего что нельзя постирать и нужно отдавать в химчистку.<br>
						  <br>
					    Я собираюсь распечатать фотки удачных образов и использовать их как шпаргалки когда нет времени и нужно &quot;схватить, одеть и бежать&quot;</p>
					  <p>&nbsp;</p>
                        
                        <center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant1.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant1.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant2.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant2.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant3.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant3.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant5.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant5.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant6.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant6.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant7.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant7.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant9.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant9.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant10.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant10.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant11.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant11.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant4.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant4.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant13.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant13.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant14.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant14.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant12.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant12.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant8.jpg" target="_blank"><img alt="" src="https://glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant8.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td>
</tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bottom">Татьяна Гарлант, Питерсфилд, Англия.</div>
				</div>	
			</div>
            
            <div class="item">
				<div class="inn">
						<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava4.png" alt=""/></div>
					<div class="top">
						<div class="txt">Самыми ценными для меня стали знания о сочетании цветов. Можно сказать, я взглянула на цвета под другим углом, никогда раньше не задумывалась о логике в комбинации цветов. Тренинг помог мне избавиться от вещей, которые на самом деле не красили меня. Теперь я все чаще мыслю образом.</div>
						
					</div>
					<div class="center">
						<p>Мода увлекает меня очень давно, поэтому попасть на подобный тренинг я хотела, но как-то не получалось, поэтому когда мне пришло письмо с предложением поучаствовать в семинаре я с радостью согласилась.<br>
						  <br>
						  Тренинг был интересен для меня, т.к он обобщил множество разрозненных знаний и позволил взглянуть на себя чужими глазами. Я определилась с цветотипом и удостоверилась в своих знаниях о типе фигуры, о стилях. Но самыми ценными для меня стали знания о сочетании цветов. Можно сказать, я взглянула на цвета под другим углом, никогда раньше не задумывалась о логике в комбинации цветов.<br>
						  <br>
						  Тренинг помог мне избавиться от вещей, которые на самом деле не красили меня. Теперь я все чаще мыслю образом. <br>
						  <br>
						  Теперь каждое утро я стараюсь наполнить свой день цветом – в одежде. Конечно, это оказывает определенное влияние не только на меня, но и на окружающих – больше цвета – больше позитива.<br>
						  <br>
						  Во время последнего похода по магазинам заметила, что я не купила ни одной серой или черной вещи. Зато купила целых 3 разноцветных платья, мимо которых раньше бы прошла! Я стала внимательнее смотреть кино и журналы, на проходящих мимо людей, стараюсь подметить интересные детали в одежде окружающих. Можно сказать, что у меня появилось еще одно хобби.<br>
						  <br>
					    Выполнять ДЗ порой было очень трудно, но очень интересно. Тренинг увлек меня, заставил думать, смотреть, перерабатывать огромное количество информации. Я поняла где мои сильные и слабые стороны, что нужно менять и в каком направлении мне нужно двигаться. Воспоминания от этого курса однозначно останутся самими положительными.</p>
						<p>&nbsp;</p>
                        
                        <center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/371326906568_51.png" target="_blank">
<img class="alignright size-medium wp-image-267" style="" title="371326906568_51" src="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/371326906568_51-300x190.png" alt="" width="300" height="190" align="right" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/951326906440_36.png" target="_blank"><img class="alignright size-medium wp-image-266" style="" title="951326906440_36" src="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/951326906440_36-300x190.png" alt="" width="300" height="190" align="right" /></a></td></tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bottom">Галина Галышина, г.Москва</div>
				</div>	
			</div>
            
            <div class="item">
				<div class="inn">
						<div class="ava"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/shopping-fw/images/ava5.png" alt=""/></div>
					<div class="top">
						<div class="txt">У меня в буквальном смысле открылись глаза, упали шоры. Я смотрю теперь на вещи и вижу, для кого они, нужны ли они мне. Я с совершенно другим настроением хожу теперь в магазины. <br>  <br> </div>
						
					</div>
					<div class="center">
						<p>На рассылку Катерины я подписана давно. В прошлом году очень порадовала ее книга &quot;Секреты рационального гардероба&quot;: коротко, внят-но, по делу. Однако это общие знания, которые самостоятельно для своего гардероба применить было сложно. Хотелось более осмысленной, так сказать, &quot;точечной&quot; работы над своим образом.<br>
						  <br>
Сомнения в покупке тренинга, конечно, были. Меня настораживал сам формат занятий. Это был мой первый онлайн-тренинг, до этого все мои курсы и тренинги на разные темы были только очными. Немного смущала пассивная роль слушателей. Зацепили слова, что тренинг станет &quot;точкой невозврата&quot;, хотя и не верилось в такую феноменальную эффективность…<br>
<br>
Я очень рада, что в моей жизни случилось это событие, что я прошла этот сильный, стильный, красивый и эффективный тренинг. У меня в буквальном смысле открылись глаза, упали шоры. Я смотрю теперь на вещи и вижу, для кого они, нужны ли они мне. Я с совершенно другим настроением хожу теперь в магазины. Раньше это было беспокойство &quot;до&quot; и уныния &quot;после&quot;, когда купленные вещи все равно оставляли ощущение &quot;Что-то не то…&quot; Теперь это либо любопытное знакомство с новыми вещами, которых я раньше на себе просто не представляла, или деловые поиски именно того, что нужно, с четким представлением, что именно нужно и как это может выглядеть.<br>
<br>
Сухой остаток от этого тренинга для меня в следующем:<br>
• Я теперь вижу свои цвета, я чувствую гармоничные сочетания цветов<br>
• Я знаю особенности своей фигуры и своего природного колорита, какие цвета, фасоны помогут мне себя украсить и подчеркнуть свои достоинства<br>
• Я составила конкретный список своего идеального гардероба, иду в магазин с четким представлением о том, что мне нужно<br>
• Я представляю, какими эти вещи должны быть по цвету, стилистике, длине, какой у них должен быть крой, какие детали, рисунок ткани… Причем в голове много вариантов, а не четкая картинка определенной вещи (которую никогда не найдешь, т.к. у каждой из нас всегда найдется свой набор &quot;перламутровых пуговиц&quot;, без которых ну никак нельзя))).<br>
• Я узнала о многих магазинах и марках, которые раньше для меня просто не существовали, мне просто не приходило в голову зайти еще куда-то, кроме стандартного списка мест, где я одевалась раньше<br>
• Я научилась разбираться в стилях одежды: я понимаю, каким образом стилистически подружить вещи, собрать их в единый образ соответственно тому, какое впечатление я хочу произвести <br>
<br>
Впечатления от тренинга остались самые приятные. Я не пропустила ни одного эфира. Дети, супруг, кошка – все знали, что маму трогать нельзя, у нее очень важные занятия. Это первый мой интернет-тренинг, и это оказалось очень удобно: эффект присутствия на семинаре. Слушаешь материал, видишь картинки, в режиме реального времени пишешь вопросы и получаешь на них ответы. И все это дома, в своем любимом кресле и с чашкой чая!<br>
<br>
Катерина – очень харизматичный оратор! Приятный голос, живые интонации, иногда хлесткие словечки. И при этом огромный объем информации, четко структурированной и очень доступно изложенной. Меня подкупило еще очень внимательное отношение к вопросам и комментариям по ходу изложения материала.<br>
<br>
Спасибо Вам, Катя, за Вашу работу! Это неоценимая помощь тем девушкам, которые хотят сами уметь подбирать себе одежду так, чтобы с удовольствием смотреть на себя в зеркало и выходить из дома с чувством &quot;Я – красавица!&quot; А что еще нам, девочкам, надо, чтобы все получалось?!)))</p>
						<p>&nbsp;</p>
                        
                       <center>
<table>
<tbody>
<tr>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/n1.png" target="_blank"><img class="alignright size-full wp-image-247" style="margin: 10px;" title="n1" src="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/n1.png" alt="" width="172" height="300" align="right" /></a></td>
<td><a href="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/n2.jpg" target="_blank"><img class="alignleft  wp-image-248" style="margin: 10px;" title="n2" src="https://glamurnenko.ru/blog/wp-content/uploads/2012/02/n2-300x292.jpg" alt="" width="300" height="292" align="left" /></a></td></tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bottom">Наталья Семиряко, г.Москва</div>
				</div>	
			</div>

			
			
			<div class="item">
				<div class="top" style="padding:20px">
<?php
$pdo = new PDO("mysql:host=46.165.220.102;dbname=admin_glam-blog;charset=utf8", 'glamurnenko', 'E8BW2STWNyxuYQVK');
$stmt = $pdo->query("SELECT SQL_NO_CACHE count(*) as C FROM `aa_posts` left join `aa_term_relationships` on `id`=`object_id` left join `aa_terms` on `term_taxonomy_id`=`term_id` where `post_type`='reviews'");
$C = $stmt->fetch()['C'];
?>	                   
                      <center><a href="https://glamurnenko.ru/blog/reviews/" target="_blank">прочитать все отзывы ( <?=$C; ?> шт. )</a></center>				</div>
			</div>			
			
			


			</div>
	</div>	
	
	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br><a href="https://glamurnenko.ru/blog/contacts/">https://glamurnenko.ru/blog/contacts/</a> tel.: +7(499)350-23-35<br>© <?= date('Y') ?>, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>
	</div>
</div>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=m2p72Rze*55BhFFCTVG2vpP4l5xDnruUhQMLZXQKQwz2zXy2flyM1gYpZvfQtMJu9YaTlWd5ejzqXIX/IlTtKSJCOJ4bTKNmWTYuavkb9Bffzt*BsmVSWt12N/uZZ1zS4yitcUgWRDhtNlzQABYJXl0JeRmvcNWmC*17lIGX3Rc-';</script>
</body>
</html>
  

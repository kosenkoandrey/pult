<?
// Полная цена с формой записи в список ожидания

$user_email = APP::Module('DB')->Select(
    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['email'], 'users',
    [['id', '=', $data['user_id'], PDO::PARAM_INT]]
);

$currency_list = [];

foreach (APP::Module('DB')->Select(APP::Module('Billing')->settings['module_billing_db_connection'], ['fetchAll', PDO::FETCH_ASSOC], ['code', 'value', 'symbol'], 'billing_currency') as $currency) {
    $currency_list[$currency['code']] = $currency;
}
?>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title>Гардероб на 100%</title>
   <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/css/style.css"/>
   <link href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/css/mystyle_open_text.css" rel="stylesheet" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type='text/javascript' src='<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/js/jquery.scrollTo-min.js'></script>
<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/js/main.js"></script>
<link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/flashtimer/compiled/flipclock.css">
<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/flashtimer/compiled/flipclock.js"></script>

	<style>
	.block8 {
    background: url(<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bg8-q.jpg) repeat;
    border-bottom: 2px dotted #cacbca;
		background-size: cover;
		height: 2050px;
}
.block8 .bl1 {
    color: #fff;
	    width: 560px;
    padding: 0px 0px 55px 0px;
}
.block8 .bl_name {
    color: #fff;

}
.block8 .ins {
    margin: 0 auto;
    width: 980px;
    padding: 50px 0 35px 0;
    position: relative;
    background: url() 60px 115px no-repeat;
}

		.block8 .left {
    position: absolute;
    width: 522px;
    height: 1900px;
    left: -40px;
    background: url(<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bg8-pc.jpg) no-repeat;
}
		.block8 .right {
    position: relative;
    float: right;
    width: 508px;
}
	</style>
</head>
<body>
<div class="container">
	<div class="menu">
		<div class="ins">
<!--			<a href="#" class="logo">Гардероб на 100%</a>-->
			<ul>


				<li><a class="a4" href="#sc5">Кто ведет</a></li>
				<li><a class="a5" href="#sc6">Ваша выгода</a></li>
				<li><a class="a11" href="#sc11">Гарантия</a></li>
				<li><a class="a10" href="#sc10">Бонусы</a></li>
				<li><a class="a8" href="#sc1">Записаться</a></li>
				<li><a class="a12" href="#sc12">Отзывы</a></li>
			</ul>
		</div>
	</div>

	<div class="slogan1"><span>Гардероб на 100%.<br/>
20 базовых вещей<br/>
и 200 комплектов с ними</span></div>
	<div class="slogan2"><span>За 10 занятий мы разберем 20 базовых вещей и вы составите из них до 200 комплектов в своем гардеробе или графическом редакторе</span></div>
<a name="bottom1"></a>	<div class="block1" id="sc7"><br/>


		<div class="ins">
			<div class="mark">Позвольте мне объяснить! </div>
			<div class="bl_name">Для меня не имеет значения…</div>
			<ul>
				<li class="li1">насколько плохой у вас гардероб прямо сейчас… как сложно вам выбирать вещи в магазинах…</li>
				<li class="li2">что вы не умеете компоновать вещи между собой и не видите образы на себе…</li>
				<li class="li3">сколько времени и денег уходит у вас на покупку гардероба каждый сезон…</li>
				<li class="li4">сколько времени уходит на то, чтобы выбрать, что надеть утром…</li>
				<li class="li5">что вы не можете выбрать комплект из кучи серых вещей мало сочетающихся между собой.</li>
			</ul>
		</div>
	</div>

	<div class="block2" id="sc2">
		<div class="ins">
			<div class="bl_name">Я УВЕРЕНА, ЧТО ВАШ ГАРДЕРОБ СЕГОДНЯ РАБОТАЕТ ТОЛЬКО НА 5-10% ПРОСТО<br> ПОТОМУ, ЧТО ВЫ НЕ ЗНАЕТЕ КАК ПРАВИЛЬНО СОСТАВИТЬ ГАРДЕРОБ, КОТОРЫЙ<br> БУДЕТ РАБОТАТЬ НА 100%.</div>
			<div class="bl b1">
				<span class="sp1">Просто потому, что вы не знаете</span>
				<span class="sp2">какие вещи являются базовыми</span>&nbsp;&nbsp; &ndash; так чтобы они составили основу вашего гардероба на несколько лет вперед, и вы могли сэкономить деньги и время.
			</div>
			<div class="bl b2">
				<span class="sp1">Просто потому, что вы не знаете</span>
				<span class="sp2">как сочетать базовые вещи друг с другом</span>&nbsp;&nbsp; &ndash; так чтобы в вашем гардеробе можно было бы собрать максимальное количество разнообразных комплектов.
			</div>
			<div class="bl b3">
				<span class="sp1">Просто потому, что вы не знаете</span>
				<span class="sp2">чем разбавлять базовые вещи</span>&nbsp;&nbsp; гардероб выглядел каждый сезон новым и модным.
			</div>
			<div class="bl1">
				<div class="arr"></div>
				И многие проблемы гардероба решаются автоматически,<br>если вы знаете эти простые и понятные правила.
				<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
			</div>
		</div>
	</div>

	<div class="block3">
		<div class="ins">
			<div class="ico"></div>
			<div class="bl_name">СОЧЕТАЕМЫЙ ГАРДЕРОБ ЭТО ТЕХНОЛОГИЯ И Я НАУЧУ ВАС ЭТОМУ
ЗА 10 ДНЕЙ!</div>
			<div class="bl1">
				<p>Вам случалось когда-нибудь держать в руках железную головоломку. Такая хитроумная штука, например, состоящая из двух треугольничков, сплетенных друг в друга. И их надо распутать.</p><br>
				<p>Казалось бы, простая задача, но вы можете просидеть за ней час, два, сутки, крутить эту несчастную железяку всеми способами, но так и не смочь распутать...</p><br>
				<p>... в итоге вы решаете, что вас просто обманули, и она в принципе не распутывается, но... тут подходит кто-то, кто <span>ЗНАЕТ СЕКРЕТ</span>. Он выравнивает треугольнички в нужном направлении относительно друг друга и, внезапно, волшебным образом, они разъединяются!</p>
			</div>
			<div class="bl_name1">КАК ТОЛЬКО ВЫ УЗНАЛИ СЕКРЕТ,<br>ТО С ЛЕГКОСТЬЮ МОЖЕТЕ ПОВТОРИТЬ ЭТО СКОЛЬКО УГОДНО РАЗ</div>
			<div class="bl2">
				<p>С сочетаемым гардеробом точно так же. Со стороны вам кажется, что это что-то очень сложное и нереальное.<br> Но когда вы узнаете секрет &mdash; правила и последовательность действий, &mdash; то успех становится неизбежным.</p>
			</div>
			<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
		</div>
	</div>

	<div class="block4">
		<div class="ins">
			<div class="mark">И вот каким образом:</div>
			<div class="bl_name">И я хочу доказать вам это совершенно<br>без всякого риска с вашей стороны!</div>
			<div class="bl1">
				Все, что вам надо &mdash; это записаться на тренинг <span>«Гардероб на 100%. 20 базовых вещей и 200 комплектов с ними»</span>. При этом все риски я беру на себя, и ниже расскажу как. Вы получаете доступ в тренинг и просто выделяете себе 10 вечеров на то, чтобы узнать «технологию гардероба 70/30». Уже после первого вечера вы можете начать применять знания к своему гардеробу и…
			</div>
			<div class="bl_name1">… будьте готовы к вашему преображению!</div>
			<div class="bl2">
				<img class="pic1" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico7.png" alt=""/>
				<img class="pic2" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico8.png" alt=""/>
				<img class="pic3" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico9.png" alt=""/>
				<p>В первый час, после того, как вы прослушаете первое занятие, вы уже сможете собрать новые и интересные комплекты внутри вашего гардероба!</p>
				<p>Потом наденьте этот комплект на следующий день на работу или на встречу с друзьями. И приготовьтесь к одному из наиболее восхитительных моментов в вашей жизни, когда вы будете наблюдать выражение на лицах ваших знакомых в ответ на ваш новый образ.</p>
				<p>Вы сможете увидеть самую разнообразную реакцию: удивление, восхищение и даже зависть и немой вопрос: «Как она это сделала? Вроде бы обычные вещи, но какой интересный образ!»</p>
			</div>
			<div class="bl3">Захватывающе? Да!</div>
			<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
		</div>
	</div>

	<div class="block5" id="sc4">
		<div class="ins">
			<div class="bl_name">А ЕЩЕ ЭТО БУДЕТ ВАШЕЙ УМНОЙ ИНВЕСТИЦИЕЙ</div>
			<div class="bl1 b1">
				<span>Вам не надо тратить деньги на шмотки, которые покупаются спонтанно и не приносят радости. Которые вы надеваете пару раз, а потом они долго висят в шкафу.</span>
			</div>
			<div class="bl1 b2">
				<span>Отныне все ваши покупки будут максимально сочетаться с вашим гардеробом. И при покупке новой вещи у вас в голове будут складываться комплекты, с которыми вы можете ее носить. </span>
			</div>
			<div class="bl1 b3">
				<span>Делая покупки по технологии, вы будете брать меньше вещей, но более высокого уровня качества.</span>
			</div>
			<div class="break"></div>
			<div class="bl2">
				И это только начало!
			</div>
			<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
		</div>
	</div>

	<div class="block6">
		<div class="ins">
			<div class="bl1 b1">
				<div class="top">Хотите знать с чем еще вы можете носить<br>ваши любимые джинсы?</div>
				<div class="txt">Этому посвящен восьмой день тренинга, на котором мы подробно разберем разнообразные комплекты с джинсами &mdash; от элегантных вариантов до дерзких и хулиганистых. От комплектов для клуба до комплектов для прогулки в выходные.  От варианта для «пятница в офисе» до вечеринки с друзьями. И это все с одной парой джинс!</div>
			</div>
			<div class="bl1 b2">
				<div class="top">Хотите узнать, как комплекты<br>с футлярным платьем…</div>
				<div class="txt">… сделать более актуальными стильными и интересными &mdash; об этом вы узнаете в первый же день тренинга. И готова поспорить, что давно заброшенное платье вновь станет любимым предметом в вашем гардеробе.</div>
			</div>
			<div class="bl1 b3">
				<div class="top">Вы думаете, что юбку-карандаш можно<br>носить только с блузкой и жакетом?</div>
				<div class="txt">Тогда более 10 разнообразных комплектов приятно удивят и порадуют вас и зарядят желанием попробовать это все на себе уже в первый день тренинга. Разнообразные цветовые сочетания, сочетания контрастных фактур, внимание к деталям и аксессуарам сделают образы с вашей привычной юбкой-карандашом отточенными и безупречными.</div>
			</div>
			<div class="bl1 b4">
				<div class="top">Какие жакеты необходимо<br>иметь в гардеробе?</div>
				<div class="txt">Об этом вы узнаете в четвертом, пятом и седьмом дне тренинга. Три жакета и более 30 вариантов комплектов с ними могут стать изюминкой вашего гардероба. </div>
			</div>
			<div class="break"></div>

			<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
		</div>
	</div>

	<div class="block7">
		<div class="inn">
			<div class="ins">
				<div class="left"></div>
				<div class="right">
					<div class="bl1">
						И это только начало!
					</div>
					<div class="bl2">
						То, что я описала выше &mdash; это лишь небольшая часть секретов, которые собраны в тренинге <span>«Гардероб на 100%. 20 базовых вещей и 200 комплектов с ними»</span>.
					</div>
					<div class="bl3">
						Это практический, удивительный, наглядный и простой в понимании тренинг по созданию идеального гардероба, <span>который действительно работает!</span>
					</div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>

	<div class="block8" id="sc5">
		<div class="ins">
			<div class="bl_name">А кто автор?</div>
			<div class="left"></div>
			<div class="right">
			<div class="bl1" style="padding-top:50px;">
				Меня зовут Екатерина Малярова.
			</div>
			<div class="bl1">
				С 2007 года я работаю стилистом-имиджмейкером. У меня уже было свыше 500 клиентов на шоппинги и более 5000 человек проходили мои тренинги и семинары через интернет (ниже вы сможете почитать их отзывы).
			</div>
			<div class="bl1">
				Одевала клиентов на красную ковровую дорожку, на экономический форум в Санкт-Петербурге, на встречу с президентом.
			</div>
			<div class="bl1">
				Автор свыше десятка тренингов по персональному имиджу, автор Школы Имиджмейкеров для профессионального обучения, а также ведущая нескольких десятков семинаров.
			</div>
			<div class="bl1">
				Веду сайт Glamurnenko.ru
			</div>
			<div class="bl1">
				Я старюсь не просто смотреть на своих клиентов, а видеть их, не слушать, а слышать, найти в них самое важное, «изюминку» и показать ее во внешнем образе. Ведь одежда это не просто «шмотки», а способ рассказать миру какая ты на самом деле или соврать ;-).
			</div>
			<div class="bl1">
				Я сторонник практических советов, которые может применить каждая женщина. Именно ими я и хочу поделиться с вами!
			</div>

				<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a></div>

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
	<div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bg4.jpg') repeat;">
		<div class="ins">
			<div class="pic" style="margin-bottom: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava3.png" alt=""/></center></div>
			<div class="bl2">
<center><p style="
    font-weight: normal;
">«Хочу вас познакомить с талантливым стилистом Катей! Очень рекомендую заглянуть к ней на страничку и пройти тест по стилю. Узнаете много нового и полезного! По крайней мере я узнала»</p>
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
<?php } ?>


	<div class="block9" id="sc6">
		<div class="ins">
			<div class="bl_name">Ваша выгода</div>
			<div class="bl1 l">
				<p>Благодаря этим практическим техникам вы будете выглядеть по-разному каждый день.</span> Не об этом ли мечтает каждая женщина?! У вас будет возможность обыграть каждую вещь в нескольких разных образах.</p>
			</div>
			<div class="bl1 r">
				<p><span>Вы не будете чувствовать себя жертвой моды.</span> Потому что у вас будет основа и фундамент гардероба, который актуален всегда. Вам нужно лишь будет от сезона к сезону вносить несколько новых нюансов.</p><br>
				<p><span>А если вам нравится покупать что-то новое?</span> То вы просто будете покупать правильные вещи, которые дополнят ваш гардероб, в то же время не повторяя друг друга.</p>
			</div>
			<div class="bl1 l">
				<p><span>О вас будет складываться впечатление,</span> как о человеке, который не гонится за модой, но находится в тренде. О человеке, который имеет собственный индивидуальный стиль и выбирает из тенденций только то, что ему подходит и вписывает их в свой базовый гардероб, добавляя таким образом ему изюминку и остроту.</p>
			</div>
			<div class="bl1 r">
				<p><span>У вашего гардероба будет своя индивидуальность</span> &mdash; он будет про вас. А не просто страничка из журнала.</p>
			</div>
			<div class="break"></div>
			<div class="bl2">
				У вас появится уверенность в своем образе. А также уверенность<br>в составлении гардероба и в процессе шоппинга.
				<div class="arr"></div>
			</div>
			<div class="foto1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/foto1.jpg" alt=""/></div>
			<div class="foto2"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/foto2.jpg" alt=""/></div>
			<div class="foto3"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/foto3.jpg" alt=""/></div>
			<div class="foto4"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/foto4.jpg" alt=""/></div>
			<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
		</div>
	</div>

	<div class="block10" id="sc11">
		<div class="ins">
			<div class="bl_name">Это сработает для вас<br>ИЛИ Я ВЕРНУ ВАМ ДЕНЬГИ!</div>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="td1"><img class="img1" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico10.png" alt=""/></td>
					<td class="td2">Цена этого тренинга намного меньше, чем вы тратите на одежду, которую даже не носите.</td>
				</tr>
				<tr>
					<td class="td1"><img class="img2" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico11.png" alt=""/></td>
					<td class="td2">Но что более важно &mdash; это безусловная гарантия. Я понимаю, что вам в тренинге важно всё, что я пообещала. Поэтому вы можете занимать по тренингу 30 дней полностью без риска!</td>
				</tr>
				<tr>
					<td class="td1"><img class="img3" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico12.png" alt=""/></td>
					<td class="td2">Если в конце этого времени вы не будете удовлетворены, тогда я просто верну вам деньги. Без лишних вопросов. Только вы судья!</td>
				</tr>
				<tr>
					<td class="td1"><img class="img4" src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico13.png" alt=""/></td>
					<td class="td2">К сожалению, в этом случае, мы вам больше ничего не продадим в будущем, чтобы не тратить ваше и наше время.</td>
				</tr>
			</table>
			<a href="#sc1" class="btn"><span>Записаться на тренинг</span></a>
		</div>
	</div>

	<div class="block11">
		<div class="ins">
			<div class="bl_name">Как проходит тренинг</div>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="td1 t1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico15.png" alt=""/></td>
					<td class="td2">Вы получаете доступ в закрытый раздел на сайте. Раз в неделю вам будет открываться новое видео. Доступ у вас будет пожизненным. В удобном для вас темпе вы смотрите видео и применяете шаблоны к своему гардеробу.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico16.png" alt=""/></td>
					<td class="td2">Ваши домашние задания вы можете размещать в любое время закрытом разделе. Стилист из нашей команды их проверит и приложит аудио-запись с комментариями. Период проверки ваших домашних заданий &mdash; 2 месяца. При желании вы сможете продлить проверку за 1000 руб/мес. Срок ответа стилиста на ваше домашнее задание &mdash; до 7 дней.</td>
				</tr>
				<tr>
					<td class="td1"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ico17.png" alt=""/></td>
					<td class="td2">Если вы еще опасаетесь за какие-либо технические моменты, пожалуйста, доверьтесь нам. Мы проводим тренинги и семинары через интернет уже несколько лет и максимально упростили для вас процесс. А служба поддержки оперативно поможет, если у вас останутся вопросы.</td>
				</tr>
			</table>
		</div>
	</div>


<div class="bonus1" style="background:url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bonus1.jpg') center top no-repeat; background-color:#189ed2;" id="sc10">
	<div class="bl_name">БОНУСЫ ДЛЯ УЧАСТНИКОВ ТРЕНИНГА</div>
	<div class="case">
		<div class="box"><img src="//www.glamurnenko.ru/images/coverss1.png" alt=""></div>
		<div class="bonus_name">Бонус 1. «Тенденции сезона осень-зима 2017-2018 и как их применить для вашего гардероба»</div>
		<div class="bonus_descr">
			Из этого видео:<br>
			<ul style="margin-bottom: 10px;">
				<li><span>&raquo;</span>&nbsp;&nbsp;&ndash; вы узнаете, какие тенденции актуальны в сезоне осень-зима 2017-2018;</li>
				<li><span>&raquo;</span>&nbsp;&nbsp;&ndash; вы изучите актуальные цвета, фасоны, фактуры, компановки в костюмный ансамбль и узнаете, как применить их к своему гардеробу;
</li>
				<li><span>&raquo;</span>&nbsp;&nbsp;&ndash; сможете выбрать из них то, что подходит именно вам;</li>

			</ul>
			Этот семинар идеально подходит к тренингу. На тренинге вы
			сформируете себе базовый гардероб. А на семинаре вы узнаете
			какие именно штрихи добавить в него, чтобы он выглядел
			модным в этом сезоне
		</div>
	</div>
	<div class="bl_name"></div>
</div>

<div class="bonus1" style="background:url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bonus1.jpg') center top no-repeat; background-color:#eee;">
	<div class="bl_name"></div>
	<div class="case">
		<div class="box"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/box4.png" alt=""/></div>
		<div class="bonus_name">Бонус 2. «Как определить свой цветотип и цвета базовых и расходных вещей, которые вам идут»</div>
		<div class="bonus_descr">
Из этого семинара вы узнаете:
			<ul>
				<li><span>&raquo;</span>&nbsp;&nbsp;как определить свой цветотип</li>
				<li><span>&raquo;</span>&nbsp;&nbsp;правила определения цветотипов зима, лето, весна и осень, а также их подтипов. </li>
				<li><span>&raquo;</span>&nbsp;&nbsp;какие цвета базовых и расходных вещей подходят каждому из цветотипов</li>
				<li><span>&raquo;</span>&nbsp;&nbsp;как выбрать цвет для базовой и расходной вещи в вашем гардеробе</li>
			</ul>
		</div>
	</div>
	<div class="bl_name"></div>
</div>
<div class="bonus2" style="background:url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bonus2.jpg') center top no-repeat; background-color:#eee;">
	<div class="bl_name"></div>
	<div class="case">
		<div class="box"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/box5.png" alt=""/></div>
		<div class="bonus_name">Бонус 3. «Для тех, кому за… <br>
	    и размер одежды далек от 42-го»</div>
		<div class="bonus_descr">
			В этом видео вы получите идеи элементов базового и расходного гардероба на примере  известных женщин: Мерил Стрип, Хелен Миррен, Опра Уинфри
		</div>
	</div>
	<div class="bl_name"></div>
</div>
<div class="bonus3" style="background:url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/bonus3.jpg') center top no-repeat; background-color:#eee;">
	<div class="bl_name"></div>
	<div class="case">
		<div class="box"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/box6.png" alt=""/></div>
		<div class="bonus_name">Бонус 4. «Идеи базовых и расходных вещей для вашего гардероба на примере лучших витрин Милана»</div>
		<div class="bonus_descr">
			Я планирую сфотографировать лучшие витрины Милана и на основе фотографий сделать семинар с идеями для вашего гардероба.
		</div>
	</div>
	<div class="bl_name"></div>
</div>


	<div class="block12" id="sc1">
		<div class="ins">
			<div class="bl_name">Записаться на тренинг</div>


			<div class="bl3">
				<div class="corner"></div>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr class="tr1">
						<td class="td1"></td>
						<td class="td4 last">«Содержание пакета»</td>
					</tr>
					<tr>
						<td></td>
						<td class="last"></td>
					</tr>
					<tr class="tr2">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">ОСНОВНЫЕ МАТЕРИАЛЫ:</td>
						<td class="td4 last"></td>
					</tr>
					<tr class="tr3">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Материалы тренинга</td>
						<td class="td4 last"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/yes.png" alt=""/></td>
					</tr>
					<tr class="tr3">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Проверка ДЗ в течении 2 месяцев<br>
					    <span style="font-size: 18px">* имиджмейкером команды Гламурненько.ру</span></td>
						<td class="td4 last"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/yes.png" alt=""/></td>
					</tr>
					<tr>
						<td></td>
						<td class="last"></td>
					</tr>
					<tr class="tr2">
						<td class="td1">БОНУСЫ:</td>
						<td class="td4 last"></td>
					</tr>
					<tr class="tr3">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Видео-семинар <span class="td4 last">«</span>Как преобразить ваш гардероб &mdash; Тенденции сезона осень-зима 2017-2018 и как их применить для вашего гардероба<span class="td4 last">»</span></td>
						<td class="td4 last"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/yes.png" alt=""/></td>
					</tr>
					<tr class="tr3">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Видео-семинар <span class="td4 last">«</span>Как определить свой цветотип и цвета базовых и расходных вещей, которые вам идут<span class="td4 last">»</span></td>
						<td class="td4 last"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/yes.png" alt=""/></td>
					</tr>
					<tr class="tr3">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Определение вашего цветотипа</td>
						<td class="td4 last"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/yes.png" alt=""/></td>
					</tr>
					<tr class="tr3">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Видео-семинар <span class="td4 last">«</span>Для тех, кому за… и размер одежды далек от 42-го<span class="td4 last">»</span></td>
						<td class="td4 last"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/yes.png" alt=""/></td>
					</tr>
					<tr>
						<td></td>
						<td class="last"></td>
					</tr>
					<tr class="tr4">
						<td class="td1" style="padding-bottom: 5px; padding-top: 5px;">Цена</td>
						<td class="td4 last" style="padding-top: 5px;padding-bottom: 5px;"><span id="price">9900</span> <span id="symbol">руб.</span>
            <br/>
            Показать цену в:
            <span id="codes">
                <a data-code="RUR" href="javascript:void(0)" class="currency-code active">руб.</a>
                <a data-code="UAH" href="javascript:void(0)" class="currency-code">грн.</a>
                <a data-code="USD" href="javascript:void(0)" class="currency-code">$</a>
                <a data-code="EUR" href="javascript:void(0)" class="currency-code">€</a>
            </span><br/></td>

            <script>
                var price = parseInt($('#price').html());
                var symbol = $('#symbol').html();
                var currency = <?= json_encode($currency_list) ?>;

                $(function() {
                    $('#codes > a').click(function() {
                        var code = $(this).data('code');

                        if (code === 'RUR') {
                            $('#price').html(price);
                            $('#symbol').html(symbol);
                        } else {
                            $('#price').html(parseInt(price / currency[code].value));
                            $('#symbol').html(currency[code].symbol);
                        }

                        $('#codes > a').removeClass('active');
                        $(this).addClass('active');
                    });
                });
            </script>
					</tr>
				</table>

			</div>
			<br>
                        <div class="bl1">
				Запись на тренинг закрыта.<br/> Оставьте свои контакты и мы оповестим вас о следующем наборе
			</div>								
                                    <center><iframe style="width: 700px; height: 580px; border: 0px solid #dddddd;" src="<?= APP::Module('Routing')->root ?>products/garderob100new/notification/form?email=<?= $user_email ?>&user_tunnel_id=<?= $data['id'] ?>&user_id=<?=$data['user_id']?>" frameborder="0" scrolling="no" name="frame1"></iframe></center>
									

			<div class="note"></div><br/>
		</div>
	</div>
                </div>

	<div class="block13">
		<div class="ins">
			<div class="left"></div>
			<div class="right">
				<div class="bl_name">Быстрая помощь службы поддержки</div>
				<p><span>Участницы тренинга могут при необходимости получить помощь от нашей службы поддержки.</span></p><br>
				<p>Сотрудники службы поддержки оперативно ответят на все вопросы и разберутся со случайными ошибками и неувязками. Сделают максимум возможного, чтобы все участницы ощущали себя комфортно и не оставались один на один с нерешенными проблемами.</p><br>
				<p>Связаться со службой поддержки можно со <a href="https://www.glamurnenko.ru">страницы</a></p>
			</div>
			<div class="break"></div>
		</div>
	</div>

	<div class="block14" id="sc12">
		<div class="ins">
			<div class="bl_name">Отзывы участниц тренинга «ГАРДЕРОБ НА 100%. 20 БАЗОВЫХ ВЕЩЕЙ И 200 КОМПЛЕКТОВ С НИМИ»</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava111.png" alt=""></div>
				<div class="txt">
					<div class="name">RobinaHoodina, youtube-блоггер<span></span></div>
					<p style="text-align: justify;">Давно проходила самый первый вебинар Кати, но он меня не очаровал... Но тренинг <span class="td4 last">«</span>Гардероб на 100%<span class="td4 last">»</span> это прорыв! В одном месте собрана информация по базовым вещам: как выбрать, что нельзя выбирать, как вещь подходит для разных типов фигур, для разных цветотипов, конкретные магазины где смотреть, фотографии со звездами, коллажи с другими базовыми вещами, сочетание всех базовых вещей в гардероб и комплекты. Катя разрушит стереотипы вашего гардероба, добавит хулиганской перчинки, смиксует стили и цвета.</p><br>
					<center><iframe class="aligncenter size-small wp-image-10922" src="https://www.youtube.com/embed/snlo7RAeaq8" width="600" height="335" frameborder="0" allowfullscreen="allowfullscreen"></iframe></center>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava104.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана Пакер, Санкт-Петербург, Занимаюсь консалтингом в сфере государственного заказа, по образованию – юрист<span></span></div>
					<p style="text-align: justify;"><strong>В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).</strong> Гардероб у меня был скучным и неинтересным, потом прошла базовый тренинг по имиджу у Екатерины в 2011 году и ситуация улучшилась. Сейчас поняла, что немного застопорилась в составлении более интересных комплектов, поэтому снова пришла к Кате. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('104')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow104" align="absmiddle"/></p><br/>
<div id="sc104" class="switchcontent">
<p style="text-align: justify;">Тренинг помог мне понять, что такое базовый гардероб. До этого ясности не было. Теперь сконцентрируюсь на том, чтобы сформировать правильный гардероб из того, что есть, и докупить то, чего не хватает. Поразило внесение ожерелья в базовые вещи (и то, насколько это верно), понравилась тельняшка (у меня ее нет, но, думаю, что обязательно появится).<br/><br/>

Я наверное как те клиенты Екатерины, у которых весь гардероб состоит из расходных вещей, хотя я у себя отметила в наличии более половины из списка базовых, но не было знаний для формирования целостного гардероба.<br/><br/>

В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).<br/><br/>

Эмоции от Екатерины всегда положительные, она очень вдохновляет. Я очень рада, что приняла решение пройти этот тренинг! (уже не единожды ловила себя на этой мысли)<br/><br/>

Еще планирую дослушать все дни тренинга, выписать цвета для всех вещей и понемногу докупать необходимое (для начала ожерелье и тренч, о котором давно мечтаю). Я еще недостаточно хорошо проработала создание образов, необходимо будет этим заняться.<br/><br/>

<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" width="150" height="201" data-mce-width="150" data-mce-height="201" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td></td>
</tr>
</tbody>
</table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava101.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Татьяна Гарлант, Питерсфилд, Англия.<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции непередаваемые — сплошной восторг! Одна моя очень хорошая знакомая сказала, что я похудела и как хорошо я выгляжу, я также получила много комплиментов от мужа и сына.</strong> За последние 7 лет после рождения двух деток я побывала в 4-х размерах и у меня накопилось огромное количество одежды с которой я не знала что делать. Благодаря Базовому Тренингу по Имиджу, который я прошла у Кати я узнала много полезной информации и начала применять полученные знания на практике. Но в силу занятости мне не хватало полного погружения в вопросы стиля и имиджа, не было времени пересмотреть весь гардероб, перебрать вещи, составить побольше комплектов на разные случаи жизни. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('101')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow101" align="absmiddle"/></p><br/>
<div id="sc101" class="switchcontent">
<p style="text-align: justify;">Сейчас я также понимаю, что мне не хватало многих базовых вещей. Кроме того было много расходных вещей вышедших из моды.<br/><br/></p>

<p style="text-align: justify;">На тренинге я усвоила что такое базовые и расходные вещи и в чем их роль, как с минимумом вещей можно составить очень много стильных комплектов. Теперь я лучше понимаю что делает образ интересным и законченным, как строить образ на контрасте, как можно корректировать фигуру при помощи базовых вещей.<br/><br/></p>

<p style="text-align: justify;">Я наконец-то навела порядок у себя в шкафу и избавилась от приличной стопки шмоток, купила некоторые недостающие базовые вещи, составила список базовых вещей которые со временем нужно докупить. Я еще лучше подготовлена к наступлению весны! Теперь у меня составлено множество комплектов на разные случаи жизни.<br/><br/></p>

<p style="text-align: justify;">Мне очень импонирует Катин стиль подачи информации и я с нетерпением ждала каждого дня и проверки моих домашних заданий.<br/><br/></p>

<p style="text-align: justify;">Иногда в силу недостатка времени я проходила какие-то темы «голопам по Европам». Спустя пару недель я обязательно прослушаю тренинг еще раз и просмотрю разбор домашних заданий других участниц, так как я не успевала это делать.<br/><br/></p>

<p style="text-align: justify;">Еще мне нужно поменять свое ежедневное отношение к вещам, мне часто «жалко» наряжаться. В последние годы я отдавала предпочтение практичной, зачастую никакой одежде, не покупала ничего что нельзя постирать и нужно отдавать в химчистку.<br/><br/></p>

<p style="text-align: justify;">Я собираюсь распечатать фотки удачных образов и использовать их как шпаргалки когда нет времени и нужно «схватить, одеть и бежать»<br/><br/></p>

<p><center><table><tbody>
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
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava103.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Людмила Оленберг, Барнаул<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг насыщен интересной и практичной информацией! Катя очень наглядно и подробно разбирала все варианты с каждой базовой вещью... Катя дала четкую систему построения гардероба с учетом особенностей фигуры и характера.</strong> До этого тренинга у меня была следующая проблема в гардеробе: зная, какие цвета и фасоны мне идут, не было ясности, как из минимума вещей создавать максимальное количество стильных, практичных и интересных ансамблей, которые будут актуальны не один сезон. Я искала информацию по рациональному гардеробу в интернете и в книгах. Но там вся информация разрозненная и часто противоречит одно другому. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('103')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow103" align="absmiddle"/></p><br/>
<div id="sc103" class="switchcontent">
<p style="text-align: justify;">Во время тренинга пришло четкое понимание, какие вещи нужно приобрести в первую очередь и как из них можно можно создать огромное кол-во вариантов комплектов для самых разных ситуаций, настроения и времени года. Оказалось,что базовых вещей в моем гардеробе очень мало и я понимаю, что сейчас надо ими заняться.<br/><br/>

Во время тренинга я уже начала расписывать необходимые комплекты внутри своего гардероба и составлять список покупок. Также составила в поливоре некоторые комплекты, но пока выполнила не все ДЗ.<br/><br/>

Тренинг насыщен интересной и практичной информацией! Катя очень наглядно и подробно разбирала все варианты с каждой базовой вещью.<br/><br/>

Огромное спасибо за такой замечательный и очень нужный тренинг!! Катя дала четкую систему построения гардероба с учетом особенностей фигуры и характера.Теперь остается только выбрать, что нужно и отправляться за покупками))</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava105.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Шолпан Абдилда, Алматы, Казахстан, Работаю в иностранной компании менеджером и выглядеть хорошо для меня всегда было важно.<span></span></div>
					<p style="text-align: justify;"><strong>я очень рада, что могу помогать сестре и маме подбирать вещи, они всегда ко мне обращаются теперь за советом. Недавно подобрала маме жакет и юбку (на то, чтобы носить ожерелье, мне пока ее убедить не удалось), и после выхода на работу в новом комплекте, она мне звонила и делилась, что все ей делали комплименты.</strong> Пару дней назад на ДР у подруги встретила знакомую, которая недавно прошла мастер класс по имиджу, и когда я поделилась тем, что увлечена составлением своего гардероба после ваших тренингов, она отметила мой внешний вид, и интересно подобранный комплект. А еще я очень рада, что могу помогать сестре и маме подбирать вещи, они всегда ко мне обращаются теперь за советом. Недавно подобрала маме жакет и юбку (на то, чтобы носить ожерелье, мне пока ее убедить не удалось), и после выхода на работу в новом комплекте, она мне звонила и делилась, что все ей делали комплименты. Это здорово, спасибо вам, Катя. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('105')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow105" align="absmiddle"/></p><br/>
<div id="sc105" class="switchcontent">
<p style="text-align: justify;">До тренинга понятия о базовых вещах было только по наитию, и, конечно же многие базовые вещи были для меня открытием &mdash; теперь они точно будут в моем гардеробе.<br/><br/>

Тренинг помог сосредоточиться на базовых вещах, которые по сути и делают весь гардероб, а потом уже добавлять изюминки к образу. Раньше как мне кажется я больше чем нужно уделяла расходным вещам, теперь мой фокус будет на базовых.<br/><br/>

А еще у меня появилось радостная уверенность перед походом по магазинам.<br/><br/>

Большое спасибо!<br/><br/>

<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan02.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan03.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan03.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan04.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan04.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td> <a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan05.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan05.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan06.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan06.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan07.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan07.jpg" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan08.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan08.jpg" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td></td>
</tr>
</tbody>
</table>
</center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava111.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана Окулова, дизайнер по текстильному оформлению интерьера, город Санкт-Петербург<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции от тренинга были очень положительные. Появились силы и вдохновение что-то менять. Обратила внимание на аксессуары, купила первое ожерелье. Одевала его к разным комплектам почти каждый день и слушала комплименты от коллег, клиентов и даже незнакомых людей.</strong> Проблемы с гардеробом были и поняла я это уже после прохождения тренинга. Носила в основном джинсы и брюки (на работу) меняла только верха. Оказывается есть столько вариантов)). За время занятий приобрела юбку и сама себе понравилась, хотя до этого считала, что юбки мне не идут. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('111')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow111" align="absmiddle"/></p><br/>
<div id="sc111" class="switchcontent">
<p style="text-align: justify;">Эмоции от тренинга были очень положительные. Появились силы и вдохновение что-то менять. Обратила внимание на аксессуары, купила первое ожерелье. Одевала его к разным комплектам почти каждый день и слушала комплименты от коллег, клиентов и даже незнакомых людей.<br/><br/>

Конечно, большое количество информации не может сразу уложиться в голове. Планирую послушать записи снова и продолжать работать над своей внешностью. Большое спасибо Кате и всем, было приятно познакомиться. С удовольствием прочла отзывы других участников)</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava115.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Айжан Мырзахметова, бухгалтер, город Астана<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции от тренинга остались только положительные. Спасибо, что так все четко и доступно объясняете. В планах еще раз просмотреть все дни тренинга, научится составлять лаконичные и вкусные образы, а также научится мыслить образом.</strong> Проблема моего гардероба была в том, что в нем были скучные, безликие и малосочетающиеся вещи. Так как не знаю свой цветотип не могу подобрать подходящие цвета. Пыталась разнообразить свой гардероб покупкой новых вещей, но т.к. не понимала что мне подходит, каждый раз все сводилось к покупке очередной неинтересной вещи. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('115')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow115" align="absmiddle"/></p><br/>
<div id="sc115" class="switchcontent">
<p style="text-align: justify;">Теперь после тренинга я понимаю, что необходимо первым делом создать основу - базовые вещи, а потом уже добавлять изюма в виде аксессуаров и расходных вещей. Пока похвастать нечем, т.к. заботы о доченьке занимают почти все время, но я составила для себя план действий, и обязательно буду ему следовать. С помощью Вашего предложения надеюсь определить свой цветотип и потом уже согласно полученных данных добавлю цвет в свой гардероб.<br/><br/>

Эмоции от тренинга остались только положительные. Спасибо, что так все четко и доступно объясняете. В планах еще раз просмотреть все дни тренинга, научится составлять лаконичные и вкусные образы, а также научится мыслить образом.<br/><br/>

Катя, большое спасибо за тренинг, мне очень понравилось. Хотелось бы и в школу имиджмейкеров попасть, но пока нет такой возможности. Надеюсь эта акция проходит не в последний раз.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/myrzahmetova02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/myrzahmetova02.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/myrzahmetova03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/myrzahmetova03.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/myrzahmetova04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/myrzahmetova04.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava01.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Мария Степаненко, Киров мерчендайзер в сети магазинов мультибрендовой одежды<span></span></div>
					<p style="text-align: justify;"><strong>После тренинга я научилась приобретать только те вещи, которые действительно мне нужны.</strong><span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1155')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow115" align="absmiddle"/></p><br/>
<div id="sc1155" class="switchcontent">
<p style="text-align: justify;">Как и многие девушки я покупала много одежды , я очень люблю смешивать стили, нравится всегда по разному выглядеть, а это значит, что покупать приходилось много и иногда такие вещи, которые одевались только 1 раз, так как больше они никуда не подходили. Этим самым я накопила столько ненужных для меня вещей и заметила это только при переезде в другую квартиру.
<br/><br/>
После тренинга я научилась приобретать только те вещи, которые действительно мне нужны. Для достойного гардероба на все случаи жизни. На данный момент у меня есть список базовых и расходных вещей, а так же аксессуаров к ним.
<br/><br/>
Я давно хотела попасть на тренинги к Екатерине и очень довольна, что наконец прослушала их. Эмоций на самом деле очень много и их даже не передать словами. Екатерина, большое Вам спасибо за мое вдохновение и отличное настроение. Думаю мы с Вами не прощаемся, я очень хочу заниматься в Вашей Школе Имиджмейкеров.
<br/><br/>
Я вижу изменения, которые очень радуют меня. Несколько тренингов я еще не прослушала из-за нехватки времени, но я обязательно этим займусь со следующей недели.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko04.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko05.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko06.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/stepanenko07.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava102.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Нина Жбанова, Волгоград, Преподаватель в техническом ВУЗе<span></span></div>
					<p style="text-align: justify;"><strong>Я заметила изменения, когда для выполнения домашнего задания девятого дня, пришла в магазин покупать тельняшку: я совершенно по-другому посмотрела на вещи в магазине, стала видеть комплекты, до этого мне такое не очень удавалось.</strong> Я еще два года назад решила изменить свой гардероб, начала посещать бесплатные семинары на эту тему, потихоньку избавляться от ненужных вещей, но это было очень медленно и не системно, и только с тренингом «Гардероб на 100%», когда я каждый день слушала Катю и делала домашние задания, мне удалось очень серьезно продвинуться в этом вопросе. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('102')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow102" align="absmiddle"/></p><br/>
<div id="sc102" class="switchcontent">
<p style="text-align: justify;">Проходя тренинг я поняла каких вещей недостает в моем гардеробе, купила две новые вещи, которых у меня не было (ботильоны и тельняшку), буду работать дальше в этом направлении. Я заметила изменения, когда для выполнения домашнего задания девятого дня, пришла в магазин покупать тельняшку: я совершенно по-другому посмотрела на вещи в магазине, стала видеть комплекты, до этого мне такое не очень удавалось.<br/><br/>

После того, как я применила знания из тренинга к своему гардеробу, я получила комплименты и на работе и в парикмахерской по поводу внешнего вида, сегодня иду на день рождения подруги и надеюсь на порцию комплиментов дополнительно<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova01.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova01.jpg" width="150" height="307" data-mce-width="150" data-mce-height="307" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova02.jpg" width="132" height="307" data-mce-width="132" data-mce-height="307" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova03.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova03.jpg" width="133" height="307" data-mce-width="133" data-mce-height="307" /></a></td>
</tr>
</tbody>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova04.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova04.jpg" width="124" height="307" data-mce-width="124" data-mce-height="307" /></a></td>
<td><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova04.jpg" width="0" height="0" data-mce-width="0" data-mce-height="0" /><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova05.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova05.jpg" width="93" height="307" data-mce-width="93" data-mce-height="307" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova06.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova06.jpg" width="105" height="307" data-mce-width="105" data-mce-height="307" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova07.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gbanova07.jpg" width="111" height="307" data-mce-width="111" data-mce-height="307" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava110.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Наталья Л., город Москва<span></span></div>
					<p style="text-align: justify;"><strong>Мне главное знать, что я удачно подобрала комплект, и тогда я довольна и у меня хорошее настроение. Окружающие это замечают, но не всегда будут говорить. Обычно подруги говорят что-то хорошее и муж. В кафе однажды, когда я надела джинсы и под них элегантную блузку, я видела, что на меня смотрят, мне это внимание понравилось, приятно понимать, что я интересно одета! Мне еще предстоит найти свой стиль.</strong> Основной проблемой моего гардероба было то, что было много вещей, которые не комплектовались между собой. Мало аксессуаров. Много низов и мало верхов. Почти все вещи не лаконичные, с деталями, особенно обувь. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('110')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow110" align="absmiddle"/></p><br/>
<div id="sc110" class="switchcontent">
<p style="text-align: justify;">Во время тренинга я получила представление о базовых вещах и образах с ними. Открытие для меня – слово лаконичность. Притом сначала было сложно его понять, оно было для меня как бы без смысла. Но благодаря огромному количеству примеров и то, что Екатерина постоянно повторяла это слово &mdash; оно врезалось мне в голову. И я поняла, что в нем и есть главный секрет хорошего стильного образа! А не в куче деталей в каждом предмете одежды, которыми мы себя пытаемся приукрасить. Для меня теперь главное – начать видеть и выбирать лаконичность в вещах в магазине и аксессуарах.<br/><br/>

Я уже составила список, что я бы хотела себе докупить и желаемых для себя комплектов. Буду делать домашние задания отдельно от тренинга. Выпишу все комплекты для себя, которые я бы в принципе хотела видеть в своем гардеробе, подходящие к моей личности: для работы и для досуга. Потом какие-то комплекты реализую в жизнь сначала из того, что у меня уже есть в гардеробе, потом с докупленными вещами. В первую очередь, буду искать подходящую кожаную куртку, тельняшку, ожерелье, лаконичные туфли, лаконичную сумку, новые джинсы. Проверю свой гардероб на предмет – что оставить, что убрать или отдать, что отложить до других времен.<br/><br/>

Эмоции от тренинга были в основном положительные, т.к. получила ценный опыт. Иногда немного сумбурные. Очень много примеров, не всегда успевала осмысливать. Делать домашние задания не успевала. Надо будет пересмотреть еще раз попозже.<br/><br/>

Я не очень смотрю на окружающих. Мне главное знать, что я удачно подобрала комплект, и тогда я довольна и у меня хорошее настроение. Окружающие это замечают, но не всегда будут говорить. Обычно подруги говорят что-то хорошее и муж. В кафе однажды, когда я надела джинсы и под них элегантную блузку, я видела, что на меня смотрят, мне это внимание понравилось, приятно понимать, что я интересно одета! Мне еще предстоит найти свой стиль. Жаль, что это не дело 5 минут )))<br/><br/>

Я плохо проработала все домашние задания. Сделала только одно, потом времени не хватило, а также я пожалела, что не приобрела пакет с проверкой ДЗ, если бы тренинг шел через день – то я бы его точно приобрела, потому что было бы время делать ДЗ. Но я смотрела, как делают ДЗ другие девочки, Катя проверяла и я брала на заметку, что там хорошо, что плохо. Когда делаешь домашнее задание сама, лучше усваивается теория.</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava114.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина Ковшова, преподаватель ВУЗа, город Саратов<span></span></div>
					<p style="text-align: justify;"><strong>Катин тренинг мне помог разобраться, как создавать элегантно-хулиганские образы.</strong> У меня была проблема компоновки разноплановых вещей в единый гардероб, что для меня важно, так как, с одной стороны, есть желание подчеркнуть креативность и творческое начало, а с другой, – задача не переборщить с этим и выглядеть лаконично и женственно. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('114')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow114" align="absmiddle"/></p><br/>
<div id="sc114" class="switchcontent">
<p style="text-align: justify;">Катин тренинг мне помог разобраться, как создавать элегантно-хулиганские образы. Я уже составила план на ближайшие покупки, из представленных ниже вещей в данный момент только белая рубашка.<br/><br/>

При прохождении тренинга меня посещали самые разные чувства: поначалу – обескураженность, потом, когда общая картина сложилась, принцип стал понятнее. После тренинга мне стал достаточно хорошо понятен базовый набор, осталось добавить к представленным на фото еще 10)<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kovshova02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kovshova02.jpg" alt="" width="300" height="300" data-mce-width="300" data-mce-height="300" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava117.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Кристина Гайлиш, начинающий имиджмейкер, город Таллинн, Эстония<span></span></div>
					<p style="text-align: justify;"><strong>Во время тренинга Кати я приобрела очень много полезной и интересной информации как для себя так и для своих клиентов!!! Эмоции только положительные!!! Я думаю, что буду удивлять ещё больше!!!</strong> После тренинга я поняла что у меня совсем мало базовых вещей, с которыми можно намного легче составлять комплекты. Проблемы что надеть у меня не было, я люблю меняться, эксперементировать с образами. Теперь я составила список необходимых именно мне базовых вещей и помаленьку начинаю их приобретать. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('117')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow117" align="absmiddle"/></p><br/>
<div id="sc117" class="switchcontent">
<p style="text-align: justify;">Во время тренинга Кати я приобрела очень много полезной и интересной информации как для себя так и для своих клиентов!!! Эмоции только положительные!!! Я думаю, что буду удивлять ещё больше!!! Жаль, что немного не хватило времени на проработку образов — но вскоре намереваюсь наверстать!<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish02.jpg" alt="" width="150" height="225" data-mce-width="150" data-mce-height="225" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish03.jpg" alt="" width="150" height="225" data-mce-width="150" data-mce-height="225" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish04.jpg" alt="" width="150" height="225" data-mce-width="150" data-mce-height="225" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish05.jpg" alt="" width="150" height="225" data-mce-width="150" data-mce-height="225" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish06.jpg" alt="" width="150" height="225" data-mce-width="150" data-mce-height="225" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/gajlish07.jpg" alt="" width="150" height="225" data-mce-width="150" data-mce-height="225" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava129.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Виктория М., Технический бизнес-аналитик, модель, танцовщица (фриланс), Лас-Вегас (США)<span></span></div>
					<p style="text-align: justify;"><strong>Теперь, спасибо вам большое, у меня перед глазами есть алгоритм, который я могу реализовать. Я в первый раз постараюсь недалеко отходить от представленных вещей, чтобы не ошибиться. А потом попытаюсь развить вкус и уже проявлять фантазию. Это правило, по моему, ко всему применимо.</strong> Носила все, что хотела, как протест какой-то. Покупала разрозненные вещи по принципу: понравилось-купила; люди отдавали мне свои вещи т.к. я маленькая и худенькая, и за 15 лет не изменилась. И дарят почему-то. В итоге: не мои цвета, и все не мое. Накипело и достало! Есть нуждающиеся люди, дети: соберу в мешки и все отдам, а себе все куплю новое, стильное и грамотное. Для того и тренинг. Достижение: сегодня знакомый парень прислал в подарок сумку Кальвин кляйн, но она мне большая. Я сразу же запостила объявление и продам ее. Никаких подарков больше, или конкретно со мной! <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('129')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow129" align="absmiddle"/></p><br/>
<div id="sc129" class="switchcontent">
<p style="text-align: justify;">Теперь, спасибо вам большое, у меня перед глазами есть алгоритм, который я могу реализовать. Я в первый раз постараюсь недалеко отходить от представленных вещей т.к. я зима все равно, чтобы не ошибиться. А потом попытаюсь развить вкус и уже проявлять фантазию. Это правило, по моему, ко всему применимо.<br/><br/>

Так, уже заказала ткань из Японии для платья футляр (джерси) и своей швее пошить составила схему. Я подумала, что все что можно, сошью на заказ т.к. не хочу покупать супер бренды, пока не научилась, а более дешевое не всегда по фигуре, не всегда то, что я хочу. Ну и по порядку все сделаю. А вещи-инвестиции запланировала раз в период посещать аутлеты и смотреть скидки, как только вещь на скидке совпадет с запланированной я ее куплю. Ну а что не получится, то в конце алгоритма по полной куплю. Цвета свои в Адоб кулер полностью вычленила и сохранила квадратиками, буду использовать цвет глаз и волос в аксессуарах и цвет кожи в ахромах (хотя у меня все 3 цвета-теплые: кожа, волосы и глаза). Интересно было и до сих пор я еще в процессе. Творческий поиск такой.<br/><br/>

Моя тётя уже начала ко мне прислушиваться в вопросах имиджа. Хотя зря она)) У меня все очень медленно идет т.к. я перфекционистка и хочется идеальности, а опыта мало.<br/><br/>

Ничего такого не собрала я, т.к. начав это занятие, поняла, что актуальнее создать базовые вещи. А собирать комплекты из них я буду по полной аналогии с тренингом. Не могу пока грамотно проявить фантазию.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija02.jpg" alt="" width="300" height="256" data-mce-width="300" data-mce-height="256" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija03.jpg" alt="" width="300" height="290" data-mce-width="300" data-mce-height="290" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija04.jpg" alt="" width="300" height="277" data-mce-width="300" data-mce-height="277" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/viktorija05.jpg" alt="" width="300" height="246" data-mce-width="300" data-mce-height="246" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava02.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Алена Кусакина, домохозяйка г. Воскресенск, Московская область<span></span></div>
					<p style="text-align: justify;"><strong>На тренинге ко мне как будто озарение пришло! хотя до этого я знала, что есть базовые вещи!</strong> но почему-то не спешила их покупать. Теперь, когда я увидела все на примерах- я поняла что мне не хватает! Ура! <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1299')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow129" align="absmiddle"/></p><br/>
<div id="sc1299" class="switchcontent">
<p style="text-align: justify;">Проблема моя теперь мне очевидна! у меня всегда получалось составлять интересные комплекты и даже незнакомые люди говорили как я прекрасно выгляжу! но…. почему-то проблема нечего одеть поднималась у меня часто! а еще я неоднократно в шкафу находила вещи с бирками! и периодически мои шкаф перезаполнялся и эти вещи так же с бирками и те, которые одевала один раз отдавались нуждающимся (добрая)! Решала я это все походом в магазин!
<br/><br/>
На тренинге ко мне как будто озарение пришло! хотя до этого я знала, что есть базовые вещи! но почему- то не спешила их покупать. Теперь, когда я увидела все на примерах- я поняла что мне не хватает! Ура!
<br/><br/>
Еще ничего нового не покупала! Но пересмотрев свои вещи- я поняла, что докупить придется многое) и меня это так радует! предвкушение вкусных комплектов будоражит! В общем тренинг помог мне понять, что нужно купить в магазине для составления правильных подходящих мне комплектов!
<br/><br/>
Пока слушала тренинг думала о том, что это же все просто на самом деле- просто нужна база!
<br/><br/>
Пока вся моя реакция внутри! сейчас я в записи слушаю Катину школу имиджмейкеров, и с еще большим пониманием, вниманием и радостью я слушала тренинг! будоражит все внутри) Хочется работать в этом направлении! Буду прорабатывать домашние задания, т.к. не все выполнила!
<br/><br/>
Ждала, когда уже можно будет выставить комментарий, потому что у меня собрался паззл! Огромное- преогромное спасибо Кате за доступность, понятность и желание сделать МИР КРАСИВЕЕ!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava03.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина Рубио, г. Москва, художник по костюмам<span></span></div>
					<p style="text-align: justify;"><strong>Ваш тренинг помог мне мыслить по-другому. Помог разложить всё по полочкам верх и низ, комплекты, как их составлять...</strong> Уже есть результат, выйдя на работу мне стали делать комплименты! <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1066')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow106" align="absmiddle"/></p><br/>
<div id="sc1066" class="switchcontent">
<p style="text-align: justify;">У меня много вещей в гардеробе, но объединить их в комплекты было проблематично. После прослушивания тренингов вещи я стала выбирать усерднее, но они были отдельными вещами, но не комплектами. Уже есть результат, выйдя на работу мне стали делать комплименты! Очень много вещей цветных, но я их почему-то не ношу.
<br/><br/>
Ваш тренинг помог мне мыслить по-другому. Помог разложить всё по полочкам верх и низ, комплекты, как их составлять. Я постаралась успеть сделать все задания. Планирую заняться коллажами или фотографиями комплектов на себе.
<br/><br/>
Результат — новые составленные комплекты на новый весенне-летний сезон. Катя большое спасибо за дополнительные тренинги они тоже очень кстати. Поняла каких базовых вещей не хватает мне в гардеробе (сумки, блейзера).
<br/><br/>
Эмоции от тренинга противоположные: с одной стороны — удовольствие, что многое узнала. С другой — усталость, много сил уходит. Но даже по школе имиджмейкеров знаю, если ограничивать себя во времени и рамках, то результата не будет! Мне очень понравилась фраза «Дорогу осилит идущий! Каждый день!» Это уж точно!
<br/><br/>
Мне, конечно, есть еще над чем работать: я не достаточно отработала момент выбора вещей в магазине. Не было на это времени. И хотелось побольше вещей на низких каблуках (с Лоуферами и балетками, слиперами и кедами). Не всегда могу позволить себе высокие каблуки. Не всегда вижу что не так в комплекте. Нужно больше работать!<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/rubio03.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/rubio03.jpg" width="300" data-mce-width="300" data-mce-height="400" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava04.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Варвара Никитина, преподаватель танцев на пилоне, город Иркутск<span></span></div>
					<p style="text-align: justify;"><strong>При прослушивании лекций у меня была великая радость, что наконец я нашла рецепт составления своего рационального гардероба и «про меня».</strong> Мама это уже заметила и оценила. Подруги напряженно разглядывают, но пока молчат. Планирую составить более выразительные луки, чтоб уж и они не удержались от комплиментов. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1067')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow106" align="absmiddle"/></p><br/>
<div id="sc1067" class="switchcontent">
<p style="text-align: justify;">Проблема моего гардероба была в том, что вещей много, а носить нечего. Покупала дорогие брендовые вещи, думала, поможет выглядеть разнообразно и эффектно. Катин тренинг внес систему по подбору образов, ясность с чего начинать. Поняла, что главное не количество и «ультрамодный» дизайн.
<br/><br/>
После тренинга я начала анализировать свой гардероб, выписала список базовых вещей, который мне необходим. Уже ходила, присматривала и примеряла варианты. Но пока не тороплюсь с покупками, больше стала думать, а не поддаваться эмоциям. Существенная экономия средств. Пришло понимание, что моя внешность в моих руках, ушло ощущение растерянности.
<br/><br/>
При прослушивании лекций у меня была великая радость, что наконец я нашла рецепт составления своего рационального гардероба и «про меня». Мама это уже заметила и оценила. Подруги напряженно разглядывают, но пока молчат. Планирую составить более выразительные луки, чтоб уж и они не удержались от комплиментов.
<br/><br/>
Для меня еще не совсем проработана тема цвета и цветовых сочетаний. Раньше я боялась и не умела комбинировать 2 цвета. Теперь, когда есть знания буду применять и экспериментировать. Так же, еще «плаваю» в составление сложных для меня комплектах, например на столкновение стилей или сочетания цветных и «принтовых» вещей.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/nikitina01.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/nikitina01.jpg" width="150" data-mce-width="300" data-mce-height="400" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/nikitina02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/nikitina02.jpg" width="150" data-mce-width="300" data-mce-height="400" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/nikitina03.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/nikitina03.jpg" width="150" data-mce-width="300" data-mce-height="400" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>


			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava106.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Елена Иванова, юрист, Санкт-Петербург<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг вызвал удивление и интерес, поскольку, для меня это новая информация. А ещё желание последовать Вашим советам, Катя.</strong> По результатам тренинга оказалось, что в моем гардеробе сплошные расходные вещи и в основном черного цвета. Эту проблему я пыталась решить с помощью советов подруг. Благодаря Катиному тренингу, я поняла, что нужно делать для того, чтобы собрать гардероб: приобрести базовые вещи или хотя бы их часть, исходя из своих цветов (я — зима). <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('106')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow106" align="absmiddle"/></p><br/>
<div id="sc106" class="switchcontent">
<p style="text-align: justify;">Причем на большую часть из базовых вещей я раньше совершенно не обращала внимание, например, клатч, свитер грубой вязки, кожаная куртка, тренч, ботильоны, ожерелье, блейзер, джинсы, кардиган, платье с запахом. Я еще не успела полноценно выбраться в магазин, но присмотрела клатчи и ожерелья.<br/><br/>

Тренинг вызвал удивление и интерес, поскольку, как я уже говорила, для меня это новая информация. А ещё желание последовать Вашим советам, Катя. В новых образах я не появлялась пока — не получилось, но, видимо, настроение мое изменилось))), поэтому, мне кажется, на меня стали больше обращать внимание.<br/><br/>

Раньше мой гардероб был проработан плохо, потому что в нем отсутствуют базовые вещи. По факту есть только футлярное платье, юбка-карандаш (правда, две), белая рубашка и туфли на каблуке. Непременно хочется собрать полноценный гардероб.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ivanova01.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ivanova01.jpg" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ivanova02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ivanova02.jpg" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava107.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина Тумалевич, госслужащая, город Екатеринбург<span></span></div>
					<p style="text-align: justify;"><strong>Я вновь посмотрела на себя другими глазами, увидев несомненные плюсы в своем возрасте, осознав направление своего дальнейшего развития... В магазинах стала обращать внимание на базовые вещи, легко купила 2 кардигана – базовых! и ожерелье... Мой новый образ с кардиганом отметили на работе)))</strong> <br/>Когда была значительно моложе, проблем особых и не было, несмотря на неструктурированный гардероб &mdash; всегда могла одеться и выглядеть неплохо, т.к. выручали внешние данные и молодость. А потом как-то сразу повзрослела, перешла в другой размер и начались проблемы – нечего надеть, т.к. в гардеробе не было базовых вещей+неумение мыслить образами. Это я сейчас понимаю, а тогда были метания от молодежной моды к возрастной (гораздо старше реального моего возраста). Я пыталась как-то выйти из ситуации, в итоге – много аксессуаров (платки, украшения, в т.ч. бижутерия, цветная обувь, даже сумку Фурла приобрела), но отсутствие базовых вещей. А расходные вещи – вместе плохо сочетались. Выбросила почти весь гардероб. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('107')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow107" align="absmiddle"/></p><br/>
<div id="sc107" class="switchcontent">
<p style="text-align: justify;">У меня появилась цель – заиметь большинство базовых вещей, постепенно увеличивая их качество и стоимость, научиться мыслить образами. Я вновь посмотрела на себя другими глазами, увидев несомненные плюсы в своем возрасте, осознав направление своего дальнейшего развития. А правильно поставленная цель всегда ведет к прогрессу. Я четко вижу, на чем мне сосредоточиться, используя при этом в полной мере имеющиеся у меня ресурсы.<br/><br/>

В магазинах стала обращать внимание на базовые вещи, легко купила 2 кардигана – базовых! и ожерелье.. Начала поиски необходимых базовых вещей, но при этом не тороплюсь – покупаю только то, что несомненно хорошо на мне смотрится. Реально собрала пока только один новый образ с юбкой-карандашом и кардиганом, очень довольна собой, хотя это так мало. Мой новый образ с кардиганом отметили на работе))) Еще перестала перегружать свои образы украшениями (т.е. если заметные серьги, то без шейного украшения и т.д.), что только украсило меня))) Поняла, что в лаконичности – чистота образа. В первый раз попробовала практически составлять образы в поливоре.<br/><br/>

Большую часть вебинаров (10 из 12-ти) прослушала онлайн, очень интересна реакция участников))) Общее воодушевление подзаряжает. Часть вебинаров конспектировала – усваивается лучше, да и в любой момент есть возможность быстро освежить в памяти. Информация, как всегда у Кати, была краткая, емкая по содержанию, а подкрепление визуальным рядом очень закрепляет полученные знания. Особенно хочу подчеркнуть ценную для меня практическую информацию о марках одежды и магазинах. Т.е. оптимальное соотношение теории и практики.<br/><br/>

Планирую Еще раз прослушать вебинары с карандашом и блокнотом, выделив важные для меня моменты. Научиться мыслить образом!!! Научиться «хулиганить» в образе (освоить искусство контраста), чересчур я серьезная))) Написать список базовых вещей для покупки (в голове он уже есть) и планомерно его реализовать. Такой удачный опыт покупки уже был прошлой весной также после вебинаров Кати, но там я сделала упор на расходные вещи. Научиться слушать себя и выражать свое настроение (или намерения) через образы – причем ежедневно. Перемерить убранные летние вещи для оценки их пригодности на наступивший сезон.<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/tumalevich01.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/tumalevich01.jpg" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/tumalevich02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/tumalevich02.jpg" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava108.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Елена Королева, бухгалтер и мама 5-ти летней дочки, город Казань<span></span></div>
					<p style="text-align: justify;"><strong>Муж заметил, что перестала носить джинсы, на работе были комплименты от коллег, дочка сказала, что я сегодня красивая.</strong> До 25 лет я имела отличную фигуру и вообще не задумывалась о том, что ношу, разные цветные «тряпочки» из дешевых магазинов. Позже из-за загруженности по работе стала носить в основном джинсы, удобно и не надо думать что одеть. После рождения ребенка фигура моя изменилась (о чем я догадалась не сразу, т.к. все еще пыталась втиснуться в «добеременную» одежку, и как теперь понимаю, выглядела при этом просто ужасно!). Теперь, когда дочка подросла, я стала задумываться о своем внешнем виде, искать информацию в Интернете, посещать разные тренинги по имиджу, собирала по крупицам информацию в сетях… Пробовала систематизировать свой гардероб сама, т.е. выбрасывала все что есть, и снова накупала кучку разрозненных не сочетающихся между собой вещей, которые я одевала пару раз, а некоторые, примерив дома перед зеркалом вообще не могу понять, как я ЭТО купила… <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('108')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow108" align="absmiddle"/></p><br/>
<div id="sc108" class="switchcontent">
<p style="text-align: justify;">Во время тренинга я определила для себя саму схему составления гардероба, узнала какие вещи являются базовыми, какие комплекты можно составить, поняла что должна покупать. Понимаю, что пока я сделала совсем мало: расписала базовые вещи и комплекты с ними, осваиваю поливор, пытаюсь составлять новые комплекты из имеющихся вещей, написала список покупок недостающих базовых вещей.<br/><br/>

Эмоции от тренинга остались самые положительные: удовлетворенность качеством и подачей информации, что для меня очень важно т.к. в своих поисках я часто сталкивалась с непрофессиональными людьми, именующими себя имиджмейкерами. Понравилась теплая атмосфера и поддержка участников тренинга, терпение, спокойствие и профессионализм Екатерины.<br/><br/>

Муж заметил, что перестала носить джинсы, на работе были комплименты от коллег, дочка сказала, что я сегодня красивая.<br/><br/>

Планирую еще раз внимательно пересмотреть все дни тренинга, а также разборы ДЗ, т.к. онлайн не всегда получалось полностью до конца дослушать ДЗ, да и Интернет барахлил. Хочу распечатать все материалы и составить лукбук-шпаргалку, которой смогу обращаться при необходимости. Еще хочу как-то подытожить и систематизировать весь материал, сопоставить на одном листе все базовые вещи, определиться с базовыми цветами.<br/><br/>

Хочу выразить благодарность Екатерине и команде Гламурненько.ру, спасибо, с Вами было приятно работать.</p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava109.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана Овчарова, эксперт-химик, Ханты-Мансийск<span></span></div>
					<p style="text-align: justify;"><strong>Во время Катиного тренинга я узнала какие вещи являются базовыми, а какие расходными, как их сочетать и как носить аксессуары. Очень понравилось как Катя излагает материал, все четко и лаконично, узнала много нового и интересного.</strong> <br/>Проблема моего гардероба была такая, что в шкафу нет места, а одеть нечего. Не очень умела сочетать вещи между собой, а хочется выглядеть стильно. И всегда проблема была с аксессуарами – почти их не использовала. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('109')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow109" align="absmiddle"/></p><br/>
<div id="sc109" class="switchcontent">
<p style="text-align: justify;">Во время Катиного тренинга я узнала какие вещи являются базовыми, а какие расходными, как их сочетать и как носить аксессуары. Раньше имела представление, что базовые вещи это — костюм брючный, юбка карандаш, платье-футляр, джинсы и белая рубашка и все. Я уже попробовала составлять комплекты, кое-что получилось, но много чего не хватает. Заказала ожерелье, надо купить еще и платок, и белую рубашку, и жакет в стиле Шанель.<br/><br/>

Очень понравилось как Катя излагает материал, все четко и лаконично, узнала много нового и интересного. Я пока еще не успела никуда сходить в новых образах, поэтому реакции никакой. У меня в планах – все дослушать и по второму разу прослушать. Хочется начать шить как раньше, чтобы появились у меня платье, топ, юбка «вкусного», как говорит Катя, цвета, а то я что-то на магазины не очень то надеюсь.<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ovcharova01.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ovcharova01.jpg" width="300" height="536" data-mce-width="300" data-mce-height="536" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ovcharova02.jpg" target="_blank"><img alt="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ovcharova02.jpg" width="265" height="536" data-mce-width="265" data-mce-height="536" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>


			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava112.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Прокофьева, город Новочебоксарск, Чувашия<span></span></div>
					<p style="text-align: justify;"><strong>При прохождении тренинга были очень положительные эмоции. Рисовались образы для себя и для сестры (я на ней постоянно практикуюсь). Мужу с сыном мои перемены нравятся. В общественных местах обращают внимание, женщины рассматривают.</strong> Основная проблема моего гардероба до тренинга была в том, что не было полного понимания того, что в моем гардеробе является базовой вещью, а что расходной. Во время тренинга все встало на свои места. Большой трудностью было, и в какой-то мере остается правильный выбор обуви и сумки. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('112')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow112" align="absmiddle"/></p><br/>
<div id="sc112" class="switchcontent">
<p style="text-align: justify;">Очень помогло выполнение ДЗ, тренинг помог в получении новых знаний. Открытиями для меня стали: тельняшка и комплекты с ней, и то, что это базовая вещь; новый взгляд на кардиган и комплекты с ним; кашемировый джемпер, и то, что это базовая вещь; ботильоны, и почему они не смотрелись на моих ногах (нужен скошенный край); кожанная куртка; белая рубашка; платье с запахом; обувь с каблуком и без, и когда и с чем её носить; туфли без бантиков смотрятся дороже и со всем идут.<br/><br/>

Во время тренинга я составила комплекты с тельняшкой, кардиганом, юбкой карандашом, отрезала бантики от обуви, где можно. При прохождении тренинга были очень положительные эмоции. Рисовались образы для себя и для сестры (я на ней постоянно практикуюсь). Получила много новой информации.<br/><br/>

Мужу с сыном мои перемены нравятся. В общественных местах обращают внимание, женщины рассматривают. Не достаточно хорошо я проработала пока обувь и сумки. В планах приобрести: ожерелье, белую рубашку, коктельное платье, выходной клатч, ботильоны, кашемировый джемпер, платье с запахом и футлярное платье.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva01.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva02.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva03.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva04.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva05.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva06.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva07.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva08.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/prokofeva08.jpg" alt="" width="150" height="267" data-mce-width="150" data-mce-height="267" /></a></td>
<td></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava113.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Елена Чередникова, менеджер по продажам, Москва<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг дал понимание, что не количество вещей определяет гардероб, а только вместе собранные и созданные комплекты дают свободу и творчество в умении одеваться. Данный тренинг надо пройти каждой женщине, не потому что она «не умеет одеваться», а для того, чтобы научиться фантазировать и творить свой гардероб с правильными вещами.</strong> Я большая любительница брюк и джинсов. Решила поучаствовать в тренинге, так как столкнулась с проблемой: «Как купить правильное платье». Если посчитать сколько было платьев в моем гардеробе, то их можно вспомнить в «лицо» каждое, так как их было не больше 10 за всю жизнь. Проблема платья стала проблемой, когда я стала консультантом косметической компании. По дресскоду необходимо носить платья или фирменные костюмы. Это влияет на объем продаж и специфику работы в женском коллективе. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('113')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow113" align="absmiddle"/></p><br/>
<div id="sc113" class="switchcontent">
<p style="text-align: justify;">Проблема моего гардероба — это его однообразность и много черного цвета. Открыв шкаф можно наблюдать серо-белое пространство, с черными включениями. Мне стало грустно и я решила изменить цвета своей одежды, чтобы добавить энергии в свою жизнь. Я купила себе яркую желтую сумку. Такое личное «солнце» в руках. Сразу наступил дисбаланс, и надо было поменять что-то еще…<br/><br/>

Спасибо Екатерине, что она создала этот тренинг. Я и раньше с удовольствием слушала и потихоньку внедряла идеи правильного гардероба. У меня появились пудровые туфли, правильные ботильоны, и еще пара правильных вещей. Но не хватало общего подхода, что и как должно входить в базовый гардероб. Теперь многое встало на свои места. Мне понятно, что жакеты у меня есть, но они не базовые, платья появились, но с ними много комплектов не составишь. Вывод один — надо собирать и покупать базовый гардероб.<br/><br/>

Тренинг дал понимание, что не количество вещей определяет гардероб, а только вместе собранные и созданные комплекты дают свободу и творчество в умении одеваться.<br/><br/>

Данный тренинг надо пройти каждой женщине, не потому что она «не умеет одеваться», а для того, чтобы научиться фантазировать и творить свой гардероб с правильными вещами. Я прошла несколько разных тренингов, но лучше, чем Екатерина, никто не учит. Всем жалко делиться своими знаниями, в глубине души многие ожидают, что ученик ничего не поймет и обратиться за услугами. Чем больше запутаешь, тем лучше. Екатерина очень щедрый и талантливый учитель. Она не просто делиться знаниями, частично Катя меняет жизнь каждой женщины, которая приходит сюда. Другой вопрос, готова ли женщина меняться?<br/><br/>

Результатом тренинга стал список необходимых покупок. Я составила его так, чтобы не сразу покупать все в этом сезоне, так как лето всегда короткое . Основные части гардероба, такие, как платье-футляр, юбка-карандаш, жакет в стиле «Шанель» оставила на осень. Очень хочется добавить цвета в одежду, поэтому ,платье с запахом -хорошая покупка к весенне-летнему сезону.<br/><br/>

Екатерина, спасибо большое, ваше ощущение уверенности, что каждая сможет, если захочет, вдохновляет на действия. Уже понимаешь, что прежний подход к покупке одежды невозможен. Честно говоря, сначала я даже не решалась что-то купить, но правильный список меня спас. С домашними заданиями не всегда удавалось справляться, но с окончанием тренинга, я еще раз его внимательно прослушаю и до конца сделаю комплекты, чтобы было проще покупать. Трудности еще в том, что приходилось делать в программе POLIVORE. Для новичка, как я, пока я привыкла, поняла, сам выбор вещей и т.д. Все это очень медленно. Очень жалко, что моего гардероба не хватило на то, чтобы составлять комплекты, зато я радуюсь заранее моей новой улучшенной версии весной и летом этого года.<br/><br/>

Тренинг - это настоящая мастерская творчества! Так здорово понимать и ощущать силу воздействия своего нового образа на людей. Больше улыбок в ответ, комплементы, быстрее достигаешь цели, если что-то задумал, так как трудно отказать обаятельной и привлекательной.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova02.jpg" alt="" width="150" height="120" data-mce-width="150" data-mce-height="120" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova03.jpg" alt="" width="150" height="127" data-mce-width="150" data-mce-height="127" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova04.jpg" alt="" width="150" height="124" data-mce-width="150" data-mce-height="124" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova05.jpg" alt="" width="150" height="119" data-mce-width="150" data-mce-height="119" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova06.jpg" alt="" width="150" height="186" data-mce-width="150" data-mce-height="186" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova07.jpg" alt="" width="150" height="179" data-mce-width="150" data-mce-height="179" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova08.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova08.jpg" alt="" width="150" height="179" data-mce-width="150" data-mce-height="179" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova09.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova09.jpg" alt="" width="150" height="192" data-mce-width="150" data-mce-height="192" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/cherednikova10.jpg" alt="" width="150" height="177" data-mce-width="150" data-mce-height="177" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>


			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Гузель Ишмаева, инженер, город Уфа<span></span></div>
					<p style="text-align: justify;"><strong>После Катиного тренинга эмоции – вдохновение на создание необычных комплектов с простыми, лаконичными предметами гардероба. Окружающие пока не заметили изменений, но я уже чувствую себя гораздо увереннее в магазинах, теперь я точно знаю, что мне нужно.</strong> Проблемы до тренинга с гардеробом были такие, что вещей много, но между собой не сочетаются; не используются яркие, акцентные аксессуары. Во время тренинга я поняла каких вещей не хватает в моем гардеробе… Из базовых вещей в наличии только джинсы! Решила, что необходимо приобрести в магазине, уже присматриваю. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('116')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow116" align="absmiddle"/></p><br/>
<div id="sc116" class="switchcontent">
<p style="text-align: justify;">Сделала пока мало, так как тренинг просматривала в записи, иногда с опозданием в пару дней. Составила список необходимых покупок на сезон, как базовых, так и расходных, расписала примерные цвета для своего цветотипа.<br/><br/>

После Катиного тренинга эмоции – вдохновение на создание необычных комплектов с простыми, лаконичными предметами гардероба. Я уже чувствую себя гораздо увереннее в магазинах, теперь я точно знаю, что мне нужно.<br/><br/>

Я думаю, мне нужно обязательно еще раз прослушать все тренинги и разборы домашних заданий, чтобы всё отложилось. Обязательно это сделаю. Для начала хочу приобрести: базовый жакет, белую рубашку, тельняшку, юбку карандаш, платье футляр и конечно же побольше украшений!<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ishmaeva01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ishmaeva01.jpg" alt="" width="150" height="160" data-mce-width="150" data-mce-height="160" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ishmaeva02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ishmaeva02.jpg" alt="" width="150" height="145" data-mce-width="150" data-mce-height="145" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ishmaeva03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ishmaeva03.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava118.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Елена Раздоркина, город Ростов-на-Дону<span></span></div>
					<p style="text-align: justify;"><strong>Я как-то позволила себе на работу прийти в коротком платье-футляре (выше колена на ширину ладони) + ожерелье + сапоги без каблука. Честно говоря, не ожидала такую реакцию от своих коллег: все сказали, что мне обязательно нужно ходить в платьях.</strong> Проблема моего гардероба была в том, что вещи покупались по принципу «нравится-не нравится», в результате многие из них не могла сочетать между собой. Со временем, кое-что нашла в книгах по гардеробу, интернете и т.д. Самое важное, что для себя вынесла из тренинга — нужно мыслить образом, а не искать отдельно вещи. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('118')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow118" align="absmiddle"/></p><br/>
<div id="sc118" class="switchcontent">
<p style="text-align: justify;">Я пересмотрела свой гардероб и ужаснулась. В итоге нашла только 3 базовые вещи, остальное нужно приобретать и создавать заново свой образ, тем более, что хочу поменять стиль на элегантный и женственный (раньше придерживалась в основном спортивного стиля). Этот тренинг для меня просто находка. Огромное спасибо Екатерине за подачу материала.Очень структурировано.<br/><br/>

Эмоции при прохождении тренинга были разные: разочарование в том, как все неправильно в моем гардеробе; радость от полученных знаний; уверенность перед походом в магазины; стимул к действию; вдохновение к созданию нового образа.<br/><br/>

Я как-то позволила себе на работу прийти в коротком платье-футляре (выше колена на ширину ладони) + ожерелье + сапоги без каблука. Честно говоря, не ожидала такую реакцию от своих коллег: все сказали, что мне обязательно нужно ходить в платьях.<br/><br/>

Практически по каждой вещи я буду еще раз самостоятельно прорабатывать информацию. Планирую в ближайшее время купить юбку-карандаш, туфли-лодочки, белую рубашку, платье с запахом, джинсы и элегантную сумку и с этими вещами создать образы<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/razdorkina02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/razdorkina02.jpg" alt="" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/razdorkina03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/razdorkina03.jpg" alt="" width="300" height="400" data-mce-width="300" data-mce-height="400" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava119.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Мария Дрыгун, специалист по сертификации, город Минск<span></span></div>
					<p style="text-align: justify;"><strong>Реакция окружающих была какая-то необычная. Я одолжила у сестры белую блузку, одела её с юбкой-карандаш и достала старенькое колье (много-много мелкого разноцветного бисера). На работе все наперебой стали хвалить…мою новую прическу!! С которой я уже неделю ходила и вроде ни от кого не пряталась.</strong> Главная проблема с гардеробом, из-за которой я решила поучаствовать в тренинге: сейчас мне 28 лет, я уже понимаю, что давно не студентка и что выросла из джинсов с трикотажными кофточками, а если и покупаю «пиджаки<span class="td4 last">»</span> (до тренинга я их именно так и называла), то придя домой и померяв c тем, что имеется в шкафу, чувствую себя какой-то тетушкой и практически всегда жалею о покупке. За последний год я стала больше почти на размер, поэтому сейчас в моем гардеробе остались одни джинсы и кучка кофточек. Очень хочется одеваться по-другому, но я не знала, с чего начать. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('119')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow119" align="absmiddle"/></p><br/>
<div id="sc119" class="switchcontent">
<p style="text-align: justify;">Тренинг дал практическое представление о том, какой гардероб может быть у современной девушки. Некоторые комплекты я обязательно попытаюсь скопировать. Большая часть содержимого придется выбросить, т.к. оно устарело морально (хотя если честно я поняла это из разбора чужих ДЗ – некоторые девушки и женщины так упорно пытались пристроить в собранные комплекты вещи, которые уже давно вышли из моды, но выкинуть рука не подымается – ведь почти новые, наверное!).<br/><br/>

Ещё была бесценная информация про ботильоны (только благодаря Вам, Катя, я поняла, почему они мне раньше упорно не нравились — я всегда их брала с ровным краем, меряла с юбками и чувствовала себя в них, как в галошах. Ботильоны со скошенным вперед краем гораздо реже вижу в магазинах, но я обязательно найду нечто похожее как в презентации). И отдельное спасибо за рассказ о сумке – о том, что она должна быть жесткой формы – у меня есть одна такая, но раньше я в ней казалась себе “слишком деловой”, а теперь поняла – это самое то!, а большинство сумок мягкой формы похожи на какой-то вещь-мешок (опять спасибо фоткам из ДЗ).<br/><br/>

Главное, что сделано – анализ гардероба: я поняла, что из базовых вещей у меня только юбка-карандаш, все остальное оказалось небазовым, подходящим к одному комплекту. До тренинга я искрене верила, что обновить гардероб – это значит купить еще несколько новых кофточек. Сейчас я наметила к покупке джинсы и белую рубашку.<br/><br/>

Эмоции были разные: и удивление (почему именно эти вещи – базовые, а где брюки, пальто), и радость (наконец-то услышала обоснование, почему ботильоны с ровным краем так плохо смотрятся с юбками). И вообще, тренинг приятно удивил — никаких пространных рассуждений, все коротко и по делу. Ни капли не жалею о потраченных на тренинг средствах!<br/><br/>

Реакция окружающих была какая-то необычная. Я одолжила у сестры белую блузку, одела её с юбкой-карандаш и достала старенькое колье (много-много мелкого разноцветного бисера). На работе все наперебой стали хвалить…мою новую прическу!! С которой я уже неделю ходила и вроде ни от кого не пряталась.<br/><br/>

Из того, что я усвоила не очень хорошо – это выбор цветов (вот вчера была в магазине и перемеряла кучу пальто разных цветов – меня мучил вопрос “а точно ли оно будет сочетаться с одеждой по цвету?”, в итоге так я ничего не выбрала, черный цвет не люблю, серый мне не идет, а какой выбрать, чтобы в одежде было цветовое разнообразие – пока не знаю.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/drygun02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/drygun02.jpg" alt="" width="277" height="469" data-mce-width="277" data-mce-height="469" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/drygun03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/drygun03.jpg" alt="" width="300" height="469" data-mce-width="300" data-mce-height="469" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava121.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Наталья Штарк, Барнаул<span></span></div>
					<p style="text-align: justify;"><strong>После прослушивания тренинга у меня появилась четкая система и знания о базовых вещах! Эмоции от прослушивания Катиного тренинга остались самые положительные! с нетерпением ждала каждого дня!</strong> <br/>Основной проблемой моего гардероба было то, что я покупала чаще всего отдельно понравившуюся вещь. Полный шкаф, одеть нечего, не было понятия как составлять комплекты. Что-то слышала о базовом гардеробе, но четкого представления не было. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('121')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow121" align="absmiddle"/></p><br/>
<div id="sc121" class="switchcontent">
<p style="text-align: justify;">После прослушивания тренинга у меня появилась четкая система и знания о базовых вещах! теперь точно знаю, что нужно приобрести в первую очередь. К сожалению до своего гардероба пока не добралась, из одной поездки и через неделю опять отъезд. Дослушивала тренинг в другом городе. По приезду домой обязательно прослушаю еще раз и займусь своим гардеробом.<br/><br/>

Эмоции от прослушивания Катиного тренинга остались самые положительные! с нетерпением ждала каждого дня! Интересно посмотреть на реакцию окружающих, ведь со своим гардеробом я еще не работала, и новых вещей не покупала. В ближайшем будущем обязательно прослушаю все еще раз!!!!<br/><br/>

Катя! Выражаю Вам огромную благодарность и признательность за ваш потрясающий тренинг!!!<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/shtark.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/shtark.jpg" alt="" width="300" height="541" data-mce-width="300" data-mce-height="541" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava123.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Александра Пеффер, стилист, город Дубай (ОАЭ)<span></span></div>
					<p style="text-align: justify;"><strong>Полученные знания планирую применять в работе. Тренинг очень понравился. Нашла для себя много идей для внедрения в гардероб своих клиентов. Что касается лично меня, то для себя я тоже взяла несколько идей, которые буду применять к своему гардеробу.</strong> Я живу и работаю имиджмейкером в г.Дубай (ОАЭ). Я прошла несколько тренингов Екатерины Маляровой, в том числе и «школу имиджмейкеров». Сейчас я работаю по профессии и развиваю свой проект «имидж клуб Stylissimo» //www.stylissimoclub.com. Но я никогда не перестаю учиться и повышать свою квалификацию. Поэтому мне было очень интересно поучаствовать в тренинге «Гардероб на 100%. 20 базовых вещей и 200 комплектов с ними». <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('123')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow123" align="absmiddle"/></p><br/>
<div id="sc123" class="switchcontent">
<p style="text-align: justify;">У меня нет проблем с гардеробом. Полученные знания планирую применять в работе. Тренинг очень понравился. Нашла для себя много идей для внедрения в гардероб своих клиентов. Что касается лично меня, то для себя я тоже взяла несколько идей, которые буду применять к своему гардеробу. Очень понравились разнообразные комплекты с тельняшкой и белой рубашкой. На тренинге услышала для себя много ответов на вопросы, возникающие у меня в процессе работы с клиентами. Было интересно слушать не только информацию, но и слушать вопросы, возникающие у участниц в процессе живого тренинга и ответы Кати.<br/><br/>

К сожалению, не успела делать домашние задания, так как не хватало времени совмещать ДЗ с работой. В ближайшем будущем планирую выполнить все домашние задания. И так как я живу в стране, где вечное лето, базовые вещи у меня немного другие. Составила несколько коллажей, своего рода moodboard новых комплектов для себя.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer02.jpg" alt="" width="150" height="175" data-mce-width="150" data-mce-height="175" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer03.jpg" alt="" width="150" height="216" data-mce-width="150" data-mce-height="216" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer04.jpg" alt="" width="150" height="138" data-mce-width="150" data-mce-height="138" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer05.jpg" alt="" width="150" height="176" data-mce-width="150" data-mce-height="176" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer06.jpg" alt="" width="150" height="132" data-mce-width="150" data-mce-height="132" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer07.jpg" alt="" width="150" height="140" data-mce-width="150" data-mce-height="140" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer08.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer08.jpg" alt="" width="150" height="200" data-mce-width="150" data-mce-height="200" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer09.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer09.jpg" alt="" width="150" height="134" data-mce-width="150" data-mce-height="134" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer10.jpg" alt="" width="150" height="135" data-mce-width="150" data-mce-height="135" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/peffer11.jpg" alt="" width="150" height="178" data-mce-width="150" data-mce-height="178" /></a></td>
<td></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина И., город Москва<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции на тренинг - действительно это можно сделать самой! И это удивительно, что простые приемы дают такой зрительный эффект (я имею ввиду добавление нужных аксессуаров)! И это очень интересно!</strong> До тренинга решала проблему просто количеством вещей, скупая каждый год все подряд, что «налезало» и нравилось в магазине…. Итог: вещей огромное количество, а «надеть-нечего» и к каждому возникающему событию приходится в попыхах искать что-то новенькое….. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('124')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow124" align="absmiddle"/></p><br/>
<div id="sc124" class="switchcontent">
<p style="text-align: justify;">Прослушав тренинг, я взглянула на свой Гардероб другими глазами, скажу честно, с грустью….Базовые вещи (не все 20 даже есть), а те, что есть - исключительно черного (и немного белого) цвета. Скучно! — Расходные вещи между собой не связаны цветом, трудно их собрать в законченный образ (как это было у вас на примерах)… А после тренинга - очень захотелось собрать такие же образы для себя!<br/><br/>

Эмоции на тренинг - действительно это можно сделать самой! И это удивительно, что простые приемы дают такой зрительный эффект (я имею ввиду добавление нужных аксессуаров)! И это очень интересно! Пока реакции окружающих не получила, в силу отсутствия окружающих….<br/><br/>

Я еще не успела проработать вопрос своего цветотипа - поэтому не готова к цветовым решениям многих базовых вещей (сейчас платье-футляр есть только черного цвета, а элегантного жакета просто нет). И еще хотела бы узнать Приемы разбора Гардероба …. Пока не знаю с чего начать…</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Гуля, имиджмейкер, город Самара<span></span></div>
					<p style="text-align: justify;"><strong>При минимуме времени, которое я могла выделить на это обучение, под руководством Кати я смогла создать совершенно новый образ, который очень понравился мне, моим близким, клиентам. Но самое главное, моя одноклассница написала комментарий на новую фотографию, что я ей не нравлюсь в таком образе. Значит именно так надо одеваться — как нравлюсь молодым и не нравлюсь пенсионеркам!</strong> Живу в Самаре, своя студия имиджа 15 лет. Провожу консультации по цвету и стилю, парикмахеры все рекомендации воплощают на практике. За эти годы создали хорошую клиентскую базу. В последнее время стало очень востребована услуга шоппера. А я не могла подобрать гардероб даже себе из-за нестандартной фигуры. Шоппинг заканчивался разочарованием и в Москве, и в Италии. В Самаре в магазины я вообще не заходила.<span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('125')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc125" class="switchcontent">
<p style="text-align: justify;">Случайно подписалась на рассылки Екатерины. Все, что Катя давала не противоречило моим знаниям и поэтому я решилась на тренинг. То, что я получила на тренинге относительно шоппинга, информация о брендах, о модных тенденциях взорвало мозг! Такой объем новой информации сравним с институтской сессией!<br/><br/>

При минимуме времени, которое я могла выделить на это обучение, под руководством Кати я смогла создать совершенно новый образ, который очень понравился мне, моим близким, клиентам. Но самое главное, моя одноклассница написала комментарий на новую фотографию, что я ей не нравлюсь в таком образе. Значит именно так надо одеваться — как нравлюсь молодым и не нравлюсь пенсионеркам!<br/><br/>

Из-за недостатка времени (в это же время мы переезжали в новый дом) я не делала домашние задания в поливоре, мне очень хотелось подобрать реальную одежду на себя и получить оценку профессионала. Мне показалось, что процесс шоппинга мне начинает нравиться, и я теперь смогу помочь моим любимым клиентам. Катя, огромное Вам!!</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava05.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Коваль, г. Ялта, Украина. Работаю в ресторане пансионата<span></span></div>
					<p style="text-align: justify;"><strong>После тренинга стало понятно, что именно необходимо купить и как потом все это можно сочетать.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1255')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1255" class="switchcontent">
<p style="text-align: justify;">Хочу выразить огромную признательность вам за вдохновенную и очень интересную подачу материала и работу с участницами. До тренинга у меня было большое количество разрозненных вещей, которые очень сложно собрать в комплекты, отсутствие базовых вещей. Я слушала ваши бесплатные материалы, читала книги.

После тренинга стало понятно, что именно необходимо купить и как потом все это можно сочетать. Я внимательно слушала и анализировала, к сожалению, не хватает времени сделать ДЗ, буду выполнять постепенно. Есть понимание, что именно необходимо делать и как.

Я планирую выполнить все ДЗ, составить план покупки базовых и расходных вещей, стать красивой и ни на кого не похожей. Спасибо.
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/koval01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/koval01.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/koval02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/koval02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/koval03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/05/koval03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ксения Мэнц, г. Бохум, Германия. научная сотрудница в университете<span></span></div>
					<p style="text-align: justify;"><strong>Окружающие сильно реагировали уже на то, что я стала больше носить платья. В Германии это особенно бросается в глаза, т.к. женщины преимущественно ходят в брюках.</strong> Коллеги каждый раз спрашивали, что сегодня за особенный день, если я так шикарно оделась? Потом привыкли, но узнают меня издали и всегда улыбаются. Муж тоже очень доволен. Теперь планы развить успех в сторону сезонов осень-зима. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1256')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1256" class="switchcontent">
<p style="text-align: justify;">Как у многих участниц тренинга проблема моего гардероба — отсутствие ясности. Базовым и капсульным гардеробами интересуюсь уже около полугода. Информации в интернете можно найти очень много, вот только дается она по принципу «лебедь, рак и щука», что в конце концов не позволяет составить единую картину, а только сбивает с толку. В общем, базового гардероба на осень-зиму пока нет и в принципе.
<br/><br/>
С кусочками семинаров от Кати познакомилась год назад, и мне очень понравилась системность ее представления о гардеробе, а также форма изложения материала. А тут еще и целый тренинг, посвященный такой основополагающей теме! Пройти мимо не смогла и не жалею ни в коем случае.
<br/><br/>
Еще до тренинга начала под влиянием Кати пробовать «мыслить образом» и уже в магазине продумывать комплекты. Получалось не всегда, но если получалось, результат был потрясающий. Одни летние брюки удачного цвета — куча комплектов, комплименты, заинтересованные взгляды на улице… Результаты этого тренинга тоже обязательно будут.
<br/><br/>
У меня неожиданно в шкафу нашелся цветной жакет в стиле Шанель, который я ни разу (!) еще не надела, т.к. не знала, с чем его сочетать. И ботильоны нашлись черные и даже с правильным скошенным краем… В общем, планов на эти две вещи после тренинга очень много. Еще из того, что помогло перевернуть взгляд на базовые вещи — тельняшка + ожерелье. Живу в Европе, тельняшки здесь носят все, но с ожерельем не сочетает никто. Как только найду ожерелье «про меня», обязательно отважусь.
<br/><br/>
Планов огромное количество. Во-первых, ни в коем случае не поддаваться соблазну скидок и не покупать вещей похожих на те, которые уже есть! Во-вторых, искать и найти платье-футляр «вкусного» цвета с рукавом 3/4 (очень надо!). В-третьих, ожерелье — обязательный пункт программы. В-четвертых, прошлым летом уже получилось практически не носить черную обувь, а это сразу улучшает настроение! Этим летом хочу повторить. В-пятых, кожаная куртка своего цвета и сумка более элегантная на вид, чем мои теперешние. Если все получится, то можно и на сумку-инвестицию начать поглядывать. Думаю, мне понадобится время, чтобы до нее «дозреть».
<br/><br/>
Впечатления от тренинга очень хорошие. Думаю, его смело можно причислять к тренингам — инвестициям, которые направлены не на моду, меняющуюся каждый сезон, а на индивидуальный стиль каждой участницы. Очень хочется перебрать весь шкаф, сократить количество расходных вещей и дополнить базу. Руки чешутся!
<br/><br/>
Окружающие сильно реагировали уже на то, что я стала больше носить платья. В Германии это особенно бросается в глаза, т.к. женщины преимущественно ходят в брюках. Коллеги каждый раз спрашивали, что сегодня за особенный день, если я так шикарно оделась? Потом привыкли, но узнают меня издали и всегда улыбаются. Муж тоже очень доволен. Теперь планы развить успех в сторону сезонов осень-зима.
<br/><br/>
Недостаточно времени уделила домашним заданиям. Продумывала комплекты, но, попробовав их подобрать в поливоре, поняла, что не все так просто. Думаю, что через три недели сяду за них серьезно и все буду подбирать. Попробую использовать поливор в качестве дополнительной площадки. Захочется купить вещь — попробую ее сначала сочетать в коллажах. Глядишь, и сократятся бесполезные расходы на гардероб.
<br/><br/>
Спасибо Кате, а также всем, кто организовывал и посещал тренинги! Было очень интересно и познавательно!</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava06.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Алена, Мельбурн, Австралия, fashion стилист<span></span></div>
					<p style="text-align: justify;"><strong>Я научилась различать и видеть свои цвета, научилась составлять новые, необычные для меня комплекты. Пересмотрела свой гардероб и избавилась от вещей, которые мне не подходят по цвету, стилю, размеру.</strong>
Составила порядка 300 комплектов используя всего лишь 20 базовых вещей — это невероятно!!!!! Я каждый день одеваю новый комплект и получаю комплименты, несмотря на то, что базовых вещей в моем гардеробе совсем немного. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1257')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1257" class="switchcontent">
<p style="text-align: justify;">Здравствуйте, Екатерина и коллеги!
<br/><br/>
Я живу в Мельбурне, Австралия.
<br/><br/>
Работаю в fashion стилистом.
<br/><br/>
До тренинга мне было сложно составлять вкусные, интересные цветовые сочетания и совсем сложно было с выбором правильных аксессуаров (бижутерия). Я научилась различать и видеть свои цвета, научилась составлять новые, необычные для меня комплекты. Ожерелье стало моим самым любимым предметом гардероба и мне стало понятно, что именно украшения завершают образ в комплекте и могут увести его в разные стилевые направления в зависимости от того, что требуется в данный момент.
<br/><br/>
Пересмотрела свой гардероб и избавилась от вещей, которые мне не подходят по цвету, стилю, размеру.
<br/><br/>
Составила порядка 300 комплектов используя всего лишь 20 базовых вещей — это невероятно!!!!! Я каждый день одеваю новый комплект и получаю комплименты, несмотря на то, что базовых вещей в моем гардеробе совсем немного.
<br/><br/>
Эмоции — восторг, взрыв, эврика! Екатерина открыла для меня новый мир и понимание того, что даже при небольшом бюджете можно одеваться стильно и выглядеть дорого. Потрясающе! Учитывая то, что я создавала образы в нескольких стилях. Просто незнакомые люди на улице подходили и комментировали образ целиком или подобранные к образу аксессуары.
<br/><br/>
Я начинающий стилист и у меня заметно прибавилось клиентов после того, как я изменилась сама.
Кстати, муж тоже заметил изменения в моих образах, и ему это очень по вкусу.
<br/><br/>
Не знаю насколько хорошо или плохо я проработала данный в тренинге материал, но результаты меня поражают по сей день. Думаю, что мне теперь стоит пройти этот курс и составить комплекты для других цветотипов.
<br/><br/>
Хочу ещё раз выразить огромную благодарность Екатерине за потрясающий тренинг, доступную подачу материала, интересную подборку фотографий и поддержку. Я получила огромное удовольствие, проходя этот тренинг, и научилась многому из того, чем пользуюсь сейчас ежедневно!
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/f867c6a77d8428aeb232e2ee03df67ce.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/f867c6a77d8428aeb232e2ee03df67ce.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/f464f92bbd7d083695833cc8eb10b5ef.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/f464f92bbd7d083695833cc8eb10b5ef.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/e4a19e881554069b965044b63d779d1b.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/e4a19e881554069b965044b63d779d1b.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/b83daa65e99d500acb2fc3533c0c11a1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/b83daa65e99d500acb2fc3533c0c11a1.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/a4404517c909e6b46b284f452d487c92.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/a4404517c909e6b46b284f452d487c92.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/854017f3515cfe38292ff8e4802aa76e.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/854017f3515cfe38292ff8e4802aa76e.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava07.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга. Екатеринбург. Работает в сфере производственной логистики<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг в первую очередь определил направление для первого и, как известно, самого важного шага в создании гардероба именно для меня.</strong> Было собеседование на крупном производственном предприятии. Должность для меня очень интересная. Ездила в тельняшке и ожерелье с юбкой-карандашом - позвонили из HR службы и предложили пройти собеседование на более высокую руководящую должность. Считаю это реакцией не только на мое резюме, но и на мой образ. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1258')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1258" class="switchcontent">
<p style="text-align: justify;">Проблем с гардеробом у меня не было, т.к. нет гардероба — нет проблем Осознание того, что гардероба для МЕНЯ у меня нет, пришло еще при прослушивании дополнительных материалов до начала тренинга — все мои вещи почему-то оказались в весенней цветовой гамме (ну и черный, а я — Лето). Не удивительно, что я постоянно глядя в зеркало в этих нарядах мучилась вопросом: откуда такой болезненный вид, если я хорошо сплю, регулярно питаюсь и отлично себя чувствую?
<br/><br/>
Тренинг в первую очередь определил направление для первого и, как известно, самого важного шага в создании гардероба именно для меня. Разбор образов с каждой вещью базового гардероба и уникальная система домашних заданий позволили набить руку и глаз на комплектовании вещей, формах и узнавании «своих» цветов. Первый комплект в Polyvore я создавала 2 дня (аж до слез). Зато теперь — это хобби.
<br/><br/>
В результате создано 95 сетов с использованием базовых вещей. Расписан план покупок. Купила то, чего у меня в гардеробе вообще никогда не было — тельняшку (этот предмет для меня лично стал величайшим открытием!). Надела с джинсами и ожерельем, поехала на приятельскую встречу с бывшим директором (женщиной). Весь вечер она не сводила глаз с моего ожерелья (за 280 руб.! :)), вписанного в тельняшку.
<br/><br/>
Эмоции от прохождения менялись в процессе: от обиды на жизнь за то, что я узнаю все это только в 35, до ощущения начала новой жизни. После первых дней казалось, что древнему человеку, который верил в Бога-Солнце, выезжающего на своей колеснице на небосвод, чтобы начался новый день, объяснили про вращение Земли вокруг своей оси и вокруг Солнца. А в целом — получила огромное удовольствие от проведенного с Вами, Катя, времени (пусть и заочно). Огромное Вам за это СПАСИБО!
<br/><br/>
Получилось так, что последние полгода я работаю дома. Поэтому людей вокруг меня не так много. Из последних выходов было собеседование на крупном производственном предприятии. Должность для меня очень интересная, хотя и не руководящая. Ездила все в той же тельняшке и ожерелье только с юбкой-карандашом. Сегодня позвонили из HR службы и предложили пройти собеседование на более высокую руководящую должность. Считаю это реакцией не только на мое резюме, но и на мой образ.
<br/><br/>
С точки зрения теории проработан весь материал. Теперь осталась практика, практика и еще раз практика. Перед покупкой очередной вещи прослушиваю соответствующий день тренинга, отмечаю основные нюансы и смело иду в торговый центр.
<br/><br/>
Комплекты с пометкой «на внедрение». Особо хочу отметить, что, кроме приобретения знаний и навыков, в процессе тренинга появилось целых две мечты-цели: конечно, сумка-инвестиция и шопинг в Милане. Верю, что осуществлю их обе!
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/garderob-100-olgi-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/garderob-100-olgi-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/garderob-100-olgi-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/garderob-100-olgi-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/garderob-100-olgi-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/garderob-100-olgi-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Марина. Атланта, США, домохозяйка<span></span></div>
					<p style="text-align: justify;"><strong>После тренинг я составила для себя четкую карту покупок, с которой теперь буду ходить по магазинам и не тратить деньги на лишние вещи.</strong> Научилась создавать новые для себя образы из имеющихся вещей. Эмоции были самые положительные. В первую очередь изменения заметил муж и почти каждый день стал говорить мне комплементы (и это после 7 лет совместной жизни). Тренинг просто потрясающий. Я уже разрекламировала его среди своих подруг <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1259')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1259" class="switchcontent">
<p style="text-align: justify;">В моем гардеробе были три основные проблемы: 1. Обувь. Полное отсутствие стильной, яркой обуви, которая могла бы подойти ко многим комплектам. 2. Сумки. В наличие было большое количество рюкзаков и спортивных сумок, ни одной элегантной сумки и сумки на выход. 3. Количество низов (юбки, джинсы, брюки) преобладали над верхами. Очень мало топов, блузок, футболок и тд.
<br/><br/>
После тренинг я составила для себя четкую карту покупок, с которой теперь буду ходить по магазинам и не тратить деньги на лишние вещи. Научилась создавать новые для себя образы из имеющихся вещей. В результате: вещи, которые лежали долгое время «без дела» теперь носятся мною с большим удовольствием. Так же открыла для себя программу Поливор и научилась составлять в ней комплекты.
<br/><br/>
Эмоции были самые положительные. С огромным удовольствием слушала все семинары, в которых очень четко и подробно излагалась полезная информация. В первую очередь изменения заметил муж и почти каждый день стал говорить мне комплементы (и это после 7 лет совместной жизни).
<br/><br/>
В планах проработать вопрос сочетания цветов в образе. Пока «боюсь» брать более двух цветов в одном образе. Может это звучит не очень скромно, но мне понравились почти все собранные комплекты поэтому выкладываю несколько из первых домашних заданий.
<br/><br/>
Екатерина, еще раз огромное спасибо за вашу работу!!! Тренинг просто потрясающий. Я уже разрекламировала его среди своих подруг
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-1.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-5.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/04/garderob-100-mariny-6.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava08.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Людмила Филатова. Петрозаводск, главный бухгалтер<span></span></div>
					<p style="text-align: justify;"><strong>За 2,5 часа, купив четыре «верха» я, подобно снайперу, «закрыла» самые большие пробелы моего гардероба.</strong> Дочка (12 лет) с удивлением сказала: «Мама, ты теперь моднее,чем я!» И по реакции окружающих понимаю, что стала выглядеть гораздо лучше. В офисе со мной здороваются все арендаторы, даже те, кто раньше не здоровался ни с кем. Некоторые коллеги решили, что у меня роман и какие-то радостные перемены на личном фронте (я не замужем). <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1269')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1269" class="switchcontent">
<p style="text-align: justify;">Добрый день, Екатерина. Я живу в г.Петрозаводске работаю главным бухгалтером. Мне 43 года. Каких-то строгих ограничений по дресс-коду в нашем офисе нет, но тем не менее понятно, что главный бухгалтер должен всегда выглядеть по крайней мере прилично. Надеюсь, в какой-то степени мне это удавалось.
Но этой осенью я оказалась в некотором тупике. Вроде в шкафу что-то висит, вроде многое из этого еще можно носить, но в то же время одеть нечего. Спасали платья, но это лето было такое у нас холодное, что я все лето носила зимние платья и они мне очень надоели.
<br/><br/>
Зарабатываю я нормально, но никогда не трачу деньги неразумно, поэтому совершенно не понимала, что же мне нужно купить, чтобы собрать в кучу и довести до ума то, что висит у меня в шкафу. К счастью, в интернете случайно наткнулась на Ваш сайт и очень заинтересовалась. Послушала бесплатные материалы и записалась на тренинг.
<br/><br/>
Сразу хочу отметить, Екатерина, Ваш педагогический талант. Вы — прекрасный имджмейкер, стилист, но при всем этом — прекрасный педагог. Подача материала четкая, информация хорошо систематизирована, отлично подана и прекрасно проиллюстрирована примерами.
<br/><br/>
Про свой цветотип я поняла сразу в ходе семинара. Я — натуральное лето. Это подтвердил и отчет, который по моей фотографии был сделан очень оперативно. Правда, после первого дня был страх и неуверенность, что я не смогу достичь приличного результата. Все так сложно, и у меня ничего не получится.
<br/><br/>
Но я продолжала занятия, выполняла рекомендации. Пробовала мерить вещи, и стало приходить понимание, что же мне нужно. Во- первых джинсы. Почему я их не носила? Оказывается, прекрасная удобная вещь. Тем более, что с фигурой у меня проблем никогда не было. Всегда занималась спортом и вес стабильный с 17 лет. Потихоньку у меня сложилась картинка, какие конкретно вещи мне нужны именно сейчас, чтобы выправить мою печальную ситуацию.
<br/><br/>
В итоге — за 2,5 часа, купив четыре «верха» я, подобно снайперу, «закрыла» самые большие пробелы моего гардероба. Затем добавила аксессуары и в итоге за выходные, не сильно отвлекаясь от своих обычных дел, я решила текущий вопрос одежды. И с понедельника стала выходить в новых нарядах — 12 рабочих дней я не повторялась, создавая различные комбинации. Затем я поняла, что мне еще просто необходима юбка-карандаш брусничного цвета и как она прекрасно впишется в мой гардероб. Её я сшила сама дома на машинке из плотного трикотажа на подкладке. Получилось вполне прилично. Когда она была готова и я стала мерить её со всеми «верхами» моего гардероба, сестра, сбившись со счета, сколько получилось вариантов, спросила «как ты догадалась сшить именно такую юбку. Это же здорово!»
<br/><br/>
А я теперь понимаю, что именно мне нужно будет добавлять в гардероб и как это все сочетать. Похоже на решение судоку или складывание пазла, только гораздо интереснее, т.к. вариантов больше. Считаю, результат прекрасный! Хочу отметить, что все вещи, которые я купила, недорогие и очень простые. И комплекты, которые я составила, тоже простые, но ведь я только еще в начале пути. Впереди столько всего интересного! Дочка (12 лет) с удивлением сказала: «Мама, ты теперь моднее,чем я!» И по реакции окружающих понимаю, что стала выглядеть гораздо лучше. В офисе со мной здороваются все арендаторы, даже те, кто раньше не здоровался ни с кем. Некоторые коллеги решили, что у меня роман и какие-то радостные перемены на личном фронте (я не замужем).
<br/><br/>
Главный вопрос на перспективу (Вы отмечали это в разборе домашних заданий) — вопрос цвета. Несомненно, девушка в ахроме навряд ли покажется окружающим позитивной и жизнерадостной. На самом деле цвет появляется. Конечно, качество фотографий не позволяет передать полную картину (в жизни все смотрится лучше). Но над этим буду работать и дальше. И еще вопрос обуви. Чтобы не раздувать обувную полку и всегда была под рукой подходящая пара.
<br/><br/>
Да, еще подобрала недорогую сумку Labbra актуального винного цвета. Причем, очень практичную. Поместился формат А4 и не нужно таскать с собой разные пакетики и папочки непонятного цвета, которые никогда ни к чему не подходят.
<br/><br/>
Вобщем, подводя итог, хочу выразить огромную благодарность Вам, Екатерина и Вашей команде имиджмейкеров! Желаю Вам дальнейшего процветания и больших творческих успехов!
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lyudmily-filatovoj-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lyudmily-filatovoj-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lyudmily-filatovoj-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lyudmily-filatovoj-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lyudmily-filatovoj-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lyudmily-filatovoj-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava09.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Лейла Сакхабиева. Дубай. Советник по торговле и предпринимательству в СЭЗ эмирата Аджман<span></span></div>
					<p style="text-align: justify;"><strong>Все, что я пыталась систематизировать многие годы, я нашла в этом тренинге. Все систематизировано, все по плану, все разложено по полочкам.</strong> Для меня это сокровище, потому как я долго пыталась это сделать сама и у меня ничего не получалось. Представляете, многие подумали, что я похудела и сделала пластическую хирургию. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1279')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1279" class="switchcontent">
<p style="text-align: justify;">В последние 8 лет — проблема одна, в шкафу висят вещи по несколько месяцев с бирками, то есть покупается одежда, и почему то так и остается в шкафу. Пыталась решить многими способами — читала много интервью с Эвелиной Хромченко, купила около 10 fashion books, таких авторов как Isaak Mizrahi, мария дегг, Jennifer alfano, kim france,kathleen fifield, а вещи так и оставались висеть в гардеробе.
<br/><br/>
Как конкретно помог тренинг решению проблем? Я в восторге, то есть то что я пыталась систематизировать многие года, я нашла в этом тренинге. Все систематизировано, все по плану, все разложено по полочкам. Для меня это сокровище. потому как я долго пыталась это сделать сама и у меня не получилось по многим причинам.
<br/><br/>
Буквально, согласно тренингу поменяла 20% гардероба, сняла бирки с одежд, которые висели долгое время в шкафу, и составила комплекты. Еще много работы впереди, но я воодушевлена.
<br/><br/>
Эмоции от прохождения тренинга самые что ни на есть прекрасные. У меня уже была подборка аутфитов, которую я составила какое то время назад и была очень рада увидеть эти же аутфиты в тренинге, в основном Анн Винтур. Я уверена, что это колоссальный труд создать этот тренинг, и я очень рада, что приняла участие в этом тренинге.
<br/><br/>
Работа самой группы Гламурненко покорила меня профессионализмом. Я не думаю что есть аналоги таких тренингов, я давно их искала, но тщетно. Все мои коллеги тоже заинтересованы в таком же тренинге, но мы к сожалению не нашли английскую версию.
<br/><br/>
Какая реакция окружающих на ваши новые образы? Представляете, многие подумали, что я похудела и сделала пластическую хирургию
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-lejly-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-lejly-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-lejly-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-lejly-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-lejly.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-lejly.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava010.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Галина Викулова. Санкт-Петербург<span></span></div>
					<p style="text-align: justify;"><strong>Мама мужа позвонила ему и сказала, как я хорошо выгляжу))</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1800')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow125" align="absmiddle"/></p><br/>
<div id="sc1800" class="switchcontent">
<p style="text-align: justify;">До тренинга была обычная проблема — куча разрозненных вещей, плюс почти не использовала аксессуары. Не знала какие и как. Пыталась решить покупкой все новых вещей.
<br/><br/>
Тренинг помог понять, какие вещи помогут собрать комплект, как их выбирать. У меня даже план появился.
<br/><br/>
Мне очень помогли домашние задания в поливоре. Пока их выполняла, нашла множество марок и вещей, о которых и не задумывалась. Увидела, насколько базовые вещи действительно могут быть вариативны.
<br/><br/>
Главная эмоция — большое воодушевление! Ну и было немного страшно выкладывать домашки))
Мама мужа позвонила ему и сказала, как я хорошо выгляжу))
<br/><br/>
Не успела хорошенько подумать над коктейльным платьем. И нужно будет проработать замечания.
<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-galiny-vikulovoj-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-galiny-vikulovoj-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-galiny-vikulovoj-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-galiny-vikulovoj-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-galiny-vikulovoj-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2017/02/garderob-100-galiny-vikulovoj-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>


			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava120.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана Курочкина, домохозяйка, город Крымск<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг Екатерины стал для меня настоящей палочкой-выручалочкой в составлении комплектов одежды на все случаи жизни. Некоторые комплекты, составленные мной в процессе тренинга на поливоре, были хорошо оценены другими участницами сообщества. Уверена, что и реальные комплекты одежды, которые я приобрету в ближайшем будущем, очень понравятся моим родным и знакомым!</strong> После вторых родов я сильно поправилась, практически весь прежний гардероб пришлось выбросить. Возник вопрос, как составить новый гардероб из небольшого количества вещей,чтобы при этом вещи идеально подходили друг к другу и можно было бы каждую вещь обыгрывать по-новому в разных комбинациях. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('120')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow120" align="absmiddle"/></p><br/>
<div id="sc120" class="switchcontent">
<p style="text-align: justify;">Тренинг Екатерины стал для меня настоящей палочкой-выручалочкой в составлении комплектов одежды на все случаи жизни. Раньше, как и многие женщины, я покупала в основном расходные вещи «с изюминкой» (как мне тогда казалось). Но каждый раз сталкивалась с тем, что такие вещи очень трудно комплектовать с другими. Приходилось ломать голову, подыскивая подходящую «пару». Вещи не хотели «дружить» друг с другом, и это превращалось для меня в настоящую пытку. Тем более, что найти одежду на фигуру полнее 48 размера — довольно сложная задача. Благодаря профессиональным советам Екатерины я наконец-то обратила внимание на базовые вещи, которые раньше считала «скучными».<br/><br/>

Проверить знания на практике, полностью обновив свой гардероб, пока не успела. Думаю, это дело ближайшего будущего. Но изучив материалы тренинга, я начала составлять собственные сеты на Поливоре, стараясь следовать советам Екатерины.<br/><br/>

Мне очень понравилась эмоциональная атмосфера, царившая на тренинге: внимательное отношение к участницам и высокий профессионализм Екатерины, океан свежих творческих идей, которым она делилась с участницами… Это было потрясающе! Очень понравились многие комплекты, составленные девочками в процессе тренинга. Я подсмотрела немало интересных идей, которые, возможно, возьму себе на заметку.<br/><br/>

Окружающие пока не успели увидеть меня в новых образах. Но некоторые комплекты, составленные мной в процессе тренинга на поливоре, были хорошо оценены другими участницами сообщества. Уверена, что и реальные комплекты одежды, которые я приобрету в ближайшем будущем, очень понравятся моим родным и знакомым!<br/><br/>

О своих планах я уже немного написала: практика и ещё раз практика! Хочу научиться находить подходящие вещи в магазинах, мыслить образами и видеть готовые комплекты, которые можено составить из нужных вещей.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina02.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina03.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina04.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina05.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/kurochkina06.jpg" alt="" width="150" height="150" data-mce-width="150" data-mce-height="150" /></a></td>
<td></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Валерия Т., стилист-имиджмейкер, Санкт-Петербург<span></span></div>
					<p style="text-align: justify;"><strong>Было интересно пройти тренинг с целью пополнить багаж знаний и узнать что-то полезное и интересное.</strong> Проблем с гардеробом нет. Было интересно пройти тренинг с целью пополнить багаж знаний и узнать что-то полезное и интересное.<br/><br/> Домашние задания не делала, планирую это сделать в марте, так как была занята новыми проектами на работе. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('122')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow122" align="absmiddle"/></p><br/>
<div id="sc122" class="switchcontent">
<p style="text-align: justify;">Мне понравился тренинг, нравится подача Кати.<br/><br/>

Себе планирую взять новые комплекты. А 9 марта у меня назначена фотосессия для сайта.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/valerija01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/valerija01.jpg" alt="" width="150" height="145" data-mce-width="150" data-mce-height="145" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/valerija02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/valerija02.jpg" alt="" width="150" height="136" data-mce-width="150" data-mce-height="136" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/valerija03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/valerija03.jpg" alt="" width="150" height="148" data-mce-width="150" data-mce-height="148" /></a></td>
</tr>
</tbody></table></center></p>
</div>

				</div>
				<div class="break"></div>
			</div>



			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Анастасия Б., начинающий имиджмейкер, город Москва<span></span></div>
					<p style="text-align: justify;"><strong>На тренинге я получила новый заряд вдохновения и качественную структурированную информацию!</strong> Особых проблем с гардеробом у меня уже нет. Тренинг я прохожу с целью получения новых знаний, а так же потому, что мне очень нравиться участвовать в ваших тренингах. На тренинге я получила новый заряд вдохновения и качественную структурированную информацию!)))<br/><span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('126')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow126" align="absmiddle"/></p><br/>
<div id="sc126" class="switchcontent">
<p style="text-align: justify;">После тренинга я составила список Must have для себя, и собираюсь заняться приобретением вещей из него. Как всегда, сплошной позитив! И спасибо Вам за это!!! Реакция окружающих, однозначно, положительная. Я бы переслушала тренинг ещё раз)))<br/><br/>

Мне нравятся все комплекты, которые я собрала. Предвкушаю момент, когда соберу весь комплект базовых вещей и продолжу работу!)))
СПАСИБО, КАТЯ!!!</p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Евгения В., город Санкт-Петербург<span></span></div>
					<p style="text-align: justify;"><strong>После тренинга я составила список того, что нужно докупить в мой гардероб. Составила несколько образов из уже имеющихся вещей. Стала на прогулку с детьми надевать более яркие и подходящие мне вещи. Все оценили! Надоело носить только черную куртку и спортивные штаны.</strong> Я всегда любила «наряжаться», однако основной проблемой было составление комплектов. Большая масса вещей между собой не компоновалась. Таким образом получаем забитый шкаф вещами и не так много образов. Опять же не хватало верхов. Приходишь в магазин, понравилась вещь купил. Приходишь с ней домой, а одеть ее не с чем.<span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('127')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow127" align="absmiddle"/></p><br/>
<div id="sc127" class="switchcontent">
<p style="text-align: justify;">После тренинга, во-первых, я увидела сколько разных комплектов можно составить с небольшим количеством вещей. Во-вторых, в голове уже начинают формироваться образы. В-третьих, вспомнила про цветотипы. Когда-то уже определяла для себя, но напрочь забыла об этом. Поняла, что не все мои вещи мне по цветотипу подходят.<br/><br/>

После тренинга я составила список того, что нужно докупить в мой гардероб. Составила несколько образов из уже имеющихся вещей. Стала на прогулку с детьми надевать более яркие и подходящие мне вещи. Все оценили! Надоело носить только черную куртку и спортивные штаны.<br/><br/>

Было очень интересно. Очень вдохновляющие. Снова обратила внимание, как скучно одевается большинство людей вокруг. Захотелось их переодеть. Подумываю о Катиной школе имиджмейкеров.<br/><br/>

Образов новых пока не удалось много продемонстрировать в силу того, что основные мои выходы — это с детьми на прогулку. Но уже получаю комплименты, хотя бы из-за того, что сняла черную куртку и одела яркое пальто. Мне нужно еще тренироваться с комплектами. Также нужно более тщательно проработать свой цветотип. Планирую воспользоваться новым предложением от Кати по этому вопросу.</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Юлия Н, программист, город Москва<span></span></div>
					<p style="text-align: justify;"><strong>После Катиного тренинга стало понятнее, чего мне не хватает в гардеробе. Работы впереди еще много, я не успела применить свои знания на практике. У меня не хватает базовых вещей, поэтому я буду еще возвращаться много раз.</strong> Основная проблема была в том, что у меня был скучный гардероб, и проблемы с подбором аксессуаров. После Катиного тренинга стало понятнее, чего мне не хватает в гардеробе. Я уже купила два ожерелья и планирую докупить недостающие базовые вещи. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('128')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow128" align="absmiddle"/></p><br/>
<div id="sc128" class="switchcontent">
<p style="text-align: justify;">Было интересно. Хотя сначала я очень сомневалась, покупать ли тренинг. Мне казалось, что ничего нового не узнаю. Новое ожерелье все заметили и оценили. Но работы впереди еще много, я не успела применить свои знания на практике. У меня не хватает базовых вещей, поэтому я буду еще возвращаться много раз.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Мария Ахмедова, город Алма-Ата, Казахстан<span></span></div>
					<p style="text-align: justify;"><strong>Стала видеть нужные вещи в магазинах, покупать не тороплюсь, сначала доделаю домашние задания. Эмоции приятные. Главное впечатление для меня — ясность.</strong> Проблемы с гардеробом появились после второй беременности. Сначала пыталась их решить покупкой более дорогих вещей, а потом нашла ваш сайт. Тренинг помог понять ранее приобретенные семинары. Буду составлять больше комплектов внутри гардероба. Сделала часть домашних заданий в поливоре. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('130')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc130" class="switchcontent">
<p style="text-align: justify;">Нашла в магазине элегантную сумку, заказала мужу на 8 марта. Стала видеть нужные вещи в магазинах, покупать не тороплюсь, сначала доделаю домашние задания. Эмоции приятные. Главное впечатление для меня — ясность.<br/><br/>

Но уже год ношу с вашей подачи платья, дети в восторге от красивой мамы. Планирую сделать все домашние задания Поливор затягивает. Возвращаешься в детство, когда одевали бумажных куколок вырезая одежки. Я стала получать от этого удовольствие.<br/><br/>

Сначала составлю максимальное кол-во комплектов внутри гардероба, потом докуплю базовые вещи. И самое главное - я перестала бояться аксессуаров. Благодарю за работу.<br/><br/>

<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova01.jpg" alt="" width="150" height="155" data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova02.jpg" alt="" width="150" height="143" data-mce-width="150" data-mce-height="143" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova03.jpg" alt="" width="150" height="175" data-mce-width="150" data-mce-height="175" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova04.jpg" alt="" width="150" height="135" data-mce-width="150" data-mce-height="135" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova05.jpg" alt="" width="150" height="143" data-mce-width="150" data-mce-height="143" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova06.jpg" alt="" width="150" height="124" data-mce-width="150" data-mce-height="124" /></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/ahmedova07.jpg" alt="" width="150" height="138" data-mce-width="150" data-mce-height="138" /></a></td>
<td></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Елена Г.,домохозяйка, Москва<span></span></div>
					<p style="text-align: justify;"><strong>После прослушивания Катиного тренинга в голове наконец-то вся информация разложилась по полочкам. Я уже разобрала свой гардероб и оставила список будущих покупок.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1801')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1801" class="switchcontent">
<p style="text-align: justify;">До тренинга при большом выборе в магазинах я не могла ничего себе подобрать и не знала, что входит в базовый гардероб. После прослушивания Катиного тренинга в голове наконец-то вся информация разложилась по полочкам. Я уже разобрала свой гардероб и оставила список будущих покупок.
<br/><br/>
Всю информацию Катя дает очень интересно и доступно.. Я пока еще не купила базовые вещи, но буду работать над этим. Думаю, что теперь надо практиковаться в подборе базовых вещей в магазине.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Татьяна Посметухова<span></span></div>
					<p style="text-align: justify;"><strong>Обратила внимание, что теперь по-другому смотрю на то, как одеты другие, какая одежда стала привлекать моё внимание в магазинах.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1802')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1802" class="switchcontent">
<p style="text-align: justify;">Благодарна Вам, Екатерина, и Вашей команде. Мне было радостно принимать участие в Вашем тренинге «Гардероб на 100?. Обратила внимание, что теперь по-другому смотрю на то, как одеты другие, какая одежда стала привлекать моё внимание в магазинах. Никогда не жаловалась на отсутствие вкуса или чувства меры, но не хватало какого то «витамина» в подходе к формированию своего гардероба.
<br/><br/>
Теперь буду ждать начала Вашего нового тренинга «На 2 размера стройнее». Думаю, что и в нём я найду необходимые мне «витаминки», чтобы выглядеть элегантно и при большом размере.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Надежда Колеснина, г. Москва, воспитываю 3-их детей (9, 7, 5 лет)<span></span></div>
					<p style="text-align: justify;"><strong>Я пересмотрю весь тренинг еще раз-два-три, составлю список необходимых покупок и — по магазинам!!!</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1803')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1803" class="switchcontent">
<p style="text-align: justify;">До тренинга была проблема отсутствия сбалансированного, функционального, элегантного и в то же время модного гардероба. Во время прохождения тренинга в голове сформировалась схема дальнейших действий по выходу из затяжной депрессии, выбрасыванию старых вещей и построению новой себя.
<br/><br/>
Я пересмотрю весь тренинг еще раз-два-три, составлю список необходимых покупок и — по магазинам!!!
<br/><br/>
Эмоции от тренинга исключительно положительные. Екатерина подает информацию в доступной и интересной форме. Девочки безумно вдохновляют своей смелостью и оригинальностью.
<br/><br/>
Планов на будущее очень много. Решительно не хочется останавливаться!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Галина Синиченкова, г. Устюжна, Вологодская область работаю в области стоматологии<span></span></div>
					<p style="text-align: justify;"><strong>Наметила, что нужно купить в первую очередь. очень понравилась Катина система базовых вещей.</strong> У меня многого из этого списка нет, буду докупать. Уже представляю, как должно получиться. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1804')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1804" class="switchcontent">
<p style="text-align: justify;">Я поняла, что основной проблемой моего гардероба было то, что в нем не хватало базовых вещей и было много расходных, а также мало аксессуаров. Сейчас уже представляю, что нужно докупить. Благодаря Кате смогла разобраться, как лучше составлять комплекты, какие вещи покупать.
<br/><br/>
Сделала пока немного, т.к. сейчас очень занята на работе. Зато наметила, что нужно купить в первую очередь. При прохождении тренинга эмоции были только положительные, очень понравилась Катина система базовых вещей. У меня многого из этого списка нет, буду докупать. Уже представляю, как должно получиться.
<br/><br/>
На работе мне приходиться одевать спецодежду, а на улице пока холодно и приходится тепло одеваться, поэтому показать новые комплекты пока не удалось. Так что буду готовиться к лету.
<br/><br/>
Хочу, чтобы Катя помогла мне определить мой цветотип. Я считаю,что я контрастная осень. В зависимости от этого подкорректирую цвета покупаемых вещей. Хочу поучиться в школе имиджмейкеров у Кати. И в дальнейшем хочу попасть на шопинг с Катей в Москве.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Валентина Зайцева, г. Люберцы, Московская область. Домохозяйка, периодически сижу с маленькой внучкой<span></span></div>
					<p style="text-align: justify;"><strong>С помощью Вашего тренинга, я на вещи стала смотреть по другому. У меня появились ориентиры в подборе покупаемых вещей.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1805')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1805" class="switchcontent">
<p style="text-align: justify;">Проблема до тренинга Кати была в том, что я покупала вещи, которые были сами по себе и не подходили друг к другу. Я знала, что существует базовый гардероб, но у меня не было навыков и знаний по его созданию.
<br/><br/>
С помощью Вашего тренинга, я на вещи стала смотреть по другому. У меня появились ориентиры в подборе покупаемых вещей. Пока я только в начале пути и надеюсь с Вашей помощью решу свои проблемы. Катя, я очень рада что попала на этот тренинг!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Марина К., г. Москва<span></span></div>
					<p style="text-align: justify;"><strong>Окружающие, конечно же, старания замечают, даже 11-летняя дочка заметила, что мама стала выглядеть по-другому.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1806')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1806" class="switchcontent">
<p style="text-align: justify;">До тренинга покупала в магазинах понравившиеся вещи, которые к базовым отнести в большинстве своем было нельзя. Комплекты составлять в начале семинара реально было не из чего. Сейчас в магазин иду, понимая, что мне нужно. Часть вещей уже удалось купить. К сожалению, проблема с размером. Самое стильное и красивое все-таки до 46-48.
<br/><br/>
Тренинг проходить было очень интересно, еще интереснее после занятий подбирать вещи в магазине. Окружающие, конечно же, старания замечают, даже 11-летняя дочка заметила, что мама стала выглядеть по-другому.
<br/><br/>
Даже учитывая нехватку времени на выполнение домашних заданий, полученные знания стараюсь применять постоянно. Часть необходимых вещей уже куплена, они сочетаются между собой. Если раньше вечно была проблема, что шкаф битком, а одеть нечего, то теперь наряжаться одно удовольствие!
<br/><br/>
Огромное спасибо!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана П., Москва<span></span></div>
					<p style="text-align: justify;"><strong>Теперь у меня, наконец, сложилась картинка, что же такое базовый гардероб и как с ним жить.</strong> Я поняла, что у меня очень мало базовых вещей. Но, зато теперь я знаю в каком направлении мне двигаться. Отдельное спасибо за помощь в определении моего цветотипа. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1807')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1807" class="switchcontent">
<p style="text-align: justify;">Хотя у меня и был до этого опыт общения со стилистом, тем не менее, проблем с гардеробом не убавилось. Разве, что исчезли черные и серые вещи. Если коротко, то проблема была в том, что меня оставили с кучей разноцветных тряпок. Выкинув из гардероба все мрачное и получив, вроде бы новое и цветное, я поняла, что не совсем представляю, что с чем носить. Конечно же, у меня были попытки совместить одно с другим и иногда это даже получалось. Тем не менее есть часть вещей, которая висит до сих пор с бирками, т.к. я не нашла им применения.
<br/><br/>
Теперь у меня, наконец, сложилась картинка, что же такое базовый гардероб и как с ним жить. Я поняла, что у меня очень мало базовых вещей. Но, зато теперь я знаю в каком направлении мне двигаться. Отдельное спасибо за помощь в определении моего цветотипа.
<br/><br/>
К сожалению, мало было времени на ДЗ. Еще раз пересмотрела все свои вещи. Определила, какие из них были не для моего цветотипа. Сделала фото всех своих вещей, для наглядности, и начинаю составлять пазл. Затем сделаю список недостающих элементов.
<br/><br/>
На самом деле у меня двоякие чувства после прохождения тренинга. С одной стороны — это удовлетворение от полученных знаний. И за это Вам огромное спасибо! Теперь понятно, что как и почему. С другой стороны, некое чувство досады от того, что у меня практически нет базовых вещей. Получается, имеется много хорошей одежды, но она почти вся является расходным материалом.
<br/><br/>
В моих планах изучить более подробно подходящую именно мне цветовую палитру. Тоже самое касается и фасонов одежды. Екатерина, большое спасибо за тренинг! Почерпнула для себя много полезной информации. Вы мне открыли второе дыхание.
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/svetlana_p01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/svetlana_p01.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/svetlana_p02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/svetlana_p02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="143" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/svetlana_p03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/svetlana_p03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="175" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Виктория Щ, г. Керчь домохозяйка<span></span></div>
					<p style="text-align: justify;"><strong>С большим вдохновением смотрела, слушала и делилась с подругами. «С Вашего позволения» дала несколько советов подругам и отзывы самые положительные. Комплименты и эмоции зашкаливают! То ли еще будет, когда я в этом всем разберусь до конца!!!!</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1808')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1808" class="switchcontent">
<p style="text-align: justify;">До тренинга, как вы говорили, Катя, покупалась вещь, которая нравилась + к ней обувь. Итого: несколько вещей и ничего друг с другом не сочетается, а комплекты получаются неполные. Понимания «базовые вещи» не было, как такового, вообще.
<br/><br/>
Сейчас пока только собираю разрозненные пазлы в общую картинку. Появилось четкое желание разобраться в этих 20 базовых вещах и научиться создавать полные комплекты, и может быть даже составить свой собственный стиль. Очень захотелось тельняшку, хотя в начале тренинга не понимала, как она может быть базовой вещью.
<br/><br/>
Уже написала список приобретения необходимых в 1-ю очередь вещей: юбка-карандаш, белая блузка, ожерелье. С подбором аксессуаров (кольца, серьги, браслеты, шарфики-платочки) вообще проблема (что с чем и как сочетать). Но есть страстное желание этому научиться. Готовлюсь к шоппингу…
<br/><br/>
Катя,благодарю! Каждый день со спорт тренировки просто бежала к вам на тренинг. Все емко, конкретно излагаете. С большим вдохновением смотрела, слушала и делилась с подругами. «С Вашего позволения» дала несколько советов подругам и отзывы самые положительные. Комплименты и эмоции зашкаливают! То ли еще будет, когда я в этом всем разберусь до конца!!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Леся С, г. Дрогобыч (Украина, Львовская обл.). Преподаватель в педагогическом ВУЗе<span></span></div>
					<p style="text-align: justify;"><strong>А за эмоции отдельное спасибо!!! На фоне событий, которые у нас происходят, и быть от этого в стороне никак нельзя, занятия для меня были напоминанием, что жизнь продолжается и женщина всегда должна стремиться удерживать свой пьедестал «ЖЕНЩИНЫ».</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1809')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1809" class="switchcontent">
<p style="text-align: justify;">До тренинга проблем с гардеробом не было, поскольку сама и шью, и вяжу, и вышиваю. Но на семинаре познакомилась с совершенно новым подходом. До семинара покупала 3-4 новые вещи на сезон (капсула, объединенная определенным цветом) и, поскольку все это было в классическом стиле, вещи сочетались, за 3-4 года снашивала и образ всегда был свежим. Получалось, что вещей немного и всегда есть что одеть.
<br/><br/>
По ходу семинара увидела, что у меня почти совсем нет базовых вещей, рассмотренных Катей. Будет интересно попробовать новый подход к формированию гардероба.
<br/><br/>
Тренинг помог по новому увидеть много вещей. Понять формирование модных образов. Например, никогда бы не увидела себя в тельняшке и элегантных туфлях. А теперь попробую создать и такой образ (ведь у девочек получилось!!!).
<br/><br/>
А за эмоции отдельное спасибо!!! На фоне событий, которые у нас происходят, и быть от этого в стороне никак нельзя, занятия для меня были напоминанием, что жизнь продолжается и женщина всегда должна стремиться удерживать свой пьедестал «ЖЕНЩИНЫ». Хотя послушать удалось только несколько отрывков тренинга. Надеюсь, что очень скоро смогу пересмотреть все в записи.
<br/><br/>
В какой-то момент хотелось видеть больше разных картинок одежды (образов). Но потом поняла, что для формирования понятия гардероб так и нужно. Очень понравилась манера Кати излагать материал. Большое спасибо!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Оксана Б, г. Нижний Новгород, менеджер в IT-компании<span></span></div>
					<p style="text-align: justify;"><strong>Выбрала несколько вещей из прежнего гардероба, которые впишутся в будущий базовый правильный гардероб — куртка из кожи черного цвета, сумка подходящая по форме, джинсы темно-синего цвета, платья-футляры. Образы с футлярными платьями коллегам понравились</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1810')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1810" class="switchcontent">
<p style="text-align: justify;">Проблемы в гардеробе у меня были типичные: отсутствовал рациональный гардероб, не умела составлять интересные по цвету и законченные по стилю комплекты, не понимала какие аксессуары выбирать, в гардеробе практически не было базовых вещей, но много расходных, платьев было не достаточно.
<br/><br/>
Тренинг помог составить список на шоппинг, кое-что уже куплено, но законченных образов с аксессуарами нет. Зато абсолютно ясно, как действовать дальше. Эмоции у меня были исключительно положительные, но были и не очень приятные мысли:). Не один раз в ходе семинара я думала, зачем купила вещи, висящие в шкафу, хотя было несколько вещей в тему.
<br/><br/>
Выбрала несколько вещей из прежнего гардероба, которые впишутся в будущий базовый правильный гардероб — куртка из кожи черного цвета, сумка подходящая по форме, джинсы темно-синего цвета, платья-футляры. Образы с футлярными платьями коллегам понравились, как кажется, но сама я не вполне довольна. Не нашла подходящего ожерелья и туфель.
<br/><br/>
До сих пор сложно составлять комплекты в Polyvore и в магазинах, но я понимаю, что это недостаток моего знания магазинов и опыта примерок. Трудно подобрать в магазине вещи, подходящие по цвету, хотя свои цвета знаю хорошо, у меня ощущение, что преобладают цвета теплых оттенков.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана С., г.Вышний Волочек<span></span></div>
					<p style="text-align: justify;"><strong>Взглянула на свой гардероб свежим взглядом. Обновки приглядываю в магазинах, учитывая все рекомендации Екатерины, а пока стараюсь из того, что есть сделать красиво (где добавлю шарфик, где каблук).</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1811')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1811" class="switchcontent">
<p style="text-align: justify;">Проблема одна — шкаф забит, одеть нечего. Поняла, что из базовых вещей у меня только джинсы и кожаная куртка, да и та не моего цветотипа)))) Все вещи «жили» в моем шкафу сами по себе, плохо сочетаясь друг с другом. Откровенно говоря, шопинг для меня одно из не любимых занятий (теперь-то я понимаю почему).
<br/><br/>
Спасибо имиджмейкерам за то, что помогли определиться с цветотипом. Ура!! Тренинг слушала, затаив дыхание, боясь пропустить хоть слово, часто конспектировала. Наконец появилось понимание, ЖЕЛАНИЕ приобрести правильные базовые вещи, которые помогут составить стильные и модные образы. Уже составила для себя список вещей и аксессуаров, необходимых в первую очередь.
<br/><br/>
Эмоции через край!! Многие комплекты вызвали удивление и восторг своей простотой и актуальностью. Понравились примеры на реальных героинях (актрисах).
<br/><br/>
Взглянула на свой гардероб свежим взглядом. Обновки приглядываю в магазинах, учитывая все рекомендации Екатерины, а пока стараюсь из того, что есть сделать красиво (где добавлю шарфик, где каблук). Собираюсь заняться составлением комплектов в поливоре (во время тренинга не смогла-болели дети), и хочу еще раз прослушать весь курс, уверена, что там есть еще что почерпнуть. Хотелось бы еще поучиться у Екатерины…
<br/><br/>
Екатерина, огромное Вам «спасибо» за профессиональную и доступную подачу материала, за внимание ко всем участницам тренинга, за те знания которыми Вы с нами делитесь и делаете, тем самым, нас девушек и женщин еще прекраснее, а значит и счастливее.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Дарина, г. Анкара<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции восторга, появилось много энергии, хочется меняться, трансформация полная, появилась осознанность в выборе одежды.</strong> Еще я стала использовать свой цветотип в одежде и в макияже, выглядеть стала свежей и молодей. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1812')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1812" class="switchcontent">
<p style="text-align: justify;">До начала тренинга проблемы были в том, что шкафы забиты, а комплектов интересных мало. После тренинга пришло понимание как комбинировать вещи, что такое базовый гардероб. В итоге я пересмотрела свой гардероб и начала создавать базовый.
<br/><br/>
Как результат — эмоции восторга, появилось много энергии, хочется меняться, трансформация полная, появилась осознанность в выборе одежды. Еще я стала использовать свой цветотип в одежде и в макияже, выглядеть стала свежей и молодей.
<br/><br/>
Хочу еще раз все прослушать и составить список чего не хватает, то что есть составить комплекты
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/darina01.png" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/darina01.png" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/darina02.png" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/darina02.png" alt="" width="150"  data-mce-width="150" data-mce-height="143" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/darina03.png" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/06/darina03.png" alt="" width="150"  data-mce-width="150" data-mce-height="175" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана К., г. Уфа<span></span></div>
					<p style="text-align: justify;"><strong>Теперь знаю свои цвета, нюансы при подборе вещи, есть план покупки вещей, совершенно новой была информация о сумках и обуви. Также я вижу теперь тенденции сезона по цвету на рекламных щитах и витринах магазинов –семинар по 5 вещей «маст хев» помог.</strong>
<br/><br/>
Нужно было купить на весну новое пальто, взамен старого изношенного. Раньше я бы купила что-то темненькое, сейчас выбирая, сразу отметала не свои цвета без колебаний, и купила совершенно нового для себя цвета (на фото- серовато-сиреневый на самом деле, фотоаппарат немного искажает цвет) и сразу шарф к нему, в том же месте, где и пальто. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1813')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1813" class="switchcontent">
<p style="text-align: justify;">До тренинга, лет с 30-ти (а сейчас мне 45) я начала осознавать, что есть у меня проблема с гардеробом, т. к носила в сезон всего 5-6 вещей и долго не могла выбрать себе в магазине одежду, все время были сомнения на тему «идет-не идет», или не находилось нужной вещи, решалась на покупку, когда уже совсем «приперло». Раньше думала, что это из-за недостатка денег. Вот бы мне энное количество денег, уж я бы оделась! Однако доход увеличивался, а проблема продолжала меня мучать.
<br/><br/>
Реклама тренинга затронула все мои «болевые» точки, я поняла, что именно отсутствие этих знаний явилось причиной существования моей проблемы, и я решилась. И очень довольна, что купила этот тренинг, т. к теперь у меня есть стройная логичная система в отношении построения гардероба, появилась уверенность, что теперь смогу справиться со своей вечной проблемой, знаю с чего начать, и шоппинг будет приносить гораздо больше удовольствия.
<br/><br/>
Теперь знаю свои цвета, нюансы при подборе вещи, есть план покупки вещей, совершенно новой была информация о сумках и обуви. Раньше обращала внимание только на черные и коричневые сумки и обувь также, теперь стала замечать, что есть, оказывается, и цветные сумки, и не обязательно они должны быть с обувью одного цвета! С большим интересом сейчас изучаю их, планируя купить уже не черную сумку. На очереди и туфли тоже. На ботильоны тоже не обращала раньше внимания, думая что это для молодых. Также я вижу теперь тенденции сезона по цвету на рекламных щитах и витринах магазинов –семинар по 5 вещей «маст хев» помог.
<br/><br/>
Нужно было купить на весну новое пальто, взамен старого изношенного. Раньше я бы купила что-то темненькое, сейчас выбирая, сразу отметала не свои цвета без колебаний, и купила совершенно нового для себя цвета (на фото- серовато-сиреневый на самом деле, фотоаппарат немного искажает цвет) и сразу шарф к нему, в том же месте, где и пальто. Гамму шарфа подобрала заранее, поискав в интернете правильное сочетание, т. к пальто присмотрела раньше и держала в качестве запасного и предполагала найти еще вариант. Также теперь планирую в ближайшие дни купить сумку цветную. Результат – мне приятно смотреть на себя в зеркало в этом пальто, дочь 15 лет удивляется моей решительности.
<br/><br/>
Еще я заходила в магазин дорогих сумок, раньше думала, что это недоступно мне. После информации о сумке-инвестиции я уже без всякой робости прогулялась по бутику, разглядывая и примеряя сумки, и заложила в планы покупку подобной.
<br/><br/>
С большим интересом прослушала все дни (слушала в записи, т.к. для меня поздно заканчивалось, и сразу на след день не получалось прослушать). Прежде всего я устрашилась от осознания, что в 45 лет у меня гардероба НЕТ! Основную эмоцию я бы обозначила как облегчение от того, что я, наконец, нашла нужную информацию, и радостное предвкушение от предстоящих покупок. Буду теперь растрачивать деньги с большим удовольствием!
<br/><br/>
Удивилась сильно, когда в 10-м дне услышала, что юбка–карандаш для моего цветотипа Лето совсем не должна быть черного цвета!
<br/><br/>
Пока реакцию от других не получала (купила вчера), но дочь (15 лет) участвовала в покупке пальто и удивленно наблюдала за моим процессом выбора и практически впервые не было от неё комментариев про мою придирчивость.
<br/><br/>
Ясно, что надо, как минимум, еще раз прослушать тренинг.<br/>
-надо изучить и запомнить свои цвета,<br/>
-составить возможные цветовые сочетания базовых вещей<br/>
-изучить тему ожерелий поглубже, новая область для меня (впервые услышала про марки)<br/>
-сшить платье-футляр, т. к в магазинах не вижу нужного мне.<br/>
-недостаточно тренирована пока в составлении комплектов, в магазине выхватываю пока только какую-то одну базовую вещь.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Татьяна А, г. Москва<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг мне дал возможность по-новому скомпоновать вещи в моем гардеробе. Так, например, выяснилось, что черный жакет подходит под все мои платья, а красные замшевые туфли на каблуке являются базовыми</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1814')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1814" class="switchcontent">
<p style="text-align: justify;">.
Я живу в Москве, Воспитываю 2-х мальчишек, много путешествую, помогаю мужу с зарубежными проектами в качестве переводчика. Катины вебинары я прослушиваю уже почти 2-года.
<br/><br/>
Моя проблема была в том, что я собирала все комплекты с нуля, подбирая аксессуары и обувь под каждый. Теперь я покупаю только те вещи, которые смогу комбинировать с уже имеющимися, или дополняю уже имеющиеся комплекты. Благодаря Кате знаю свой цветотип, подбираю свои цвета, использую правила особенности фигуры.
<br/><br/>
Данный тренинг помог мне сделать вывод: почти все базовые вещи у меня есть. Осталось только подобрать платье с запахом, пиджак в стиле Шанель и купить пару ярких сумок на лето. В начале тренинга я сразу купила ожерелье и стала его носить с блузами и рубашками, потом оказалось, что оно подходит почти под все мои вещи, так как разноцветное.
<br/><br/>
Тренинг мне дал возможность по-новому скомпоновать вещи в моем гардеробе. Так, например, выяснилось, что черный жакет подходит под все мои платья, а красные замшевые туфли на каблуке являются базовыми. Еще мне очень понравилось работать в polyvori . Я пыталась составлять образы из вещей, похожих на те, которые у меня уже есть. Один придуманный образ я даже приобрела.
<br/><br/>
Я старалась прорабатывать все базовые вещи, составлять комплекты и выкладывать домашнее задание. Пришла к выводу, что джинсы меня мало интересуют, что я так и не поняла что такое ботильоны со скошенным краем, и что пиджак в силе Шанель должен быть удлиненным для моей фигуры. Буду продолжать следить за Катиными вебинарами и слушать их, а также буду оставаться стильной, красивой и ни на кого не похожей!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/tatiana_k.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/tatiana_k.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Д, г. Пермь<span></span></div>
					<p style="text-align: justify;"><strong>Появились конкретные образы и комплекты, готовый шаблон, по которому можно составить интересные образы.</strong> Появились новые сочетания моих вещей, которые раньше не использовала. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1815')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1815" class="switchcontent">
<p style="text-align: justify;">.
В моем гардеробе в основном однотипные серые вещи, конечно, цветотипу лето серый подходит, но благодаря этому тренингу я поняла, какие вещи лучше базовых, нейтральных цветов, а какие- более ярких. До тренинга я не знала, как интересно сочетать верх и низ комплектов, какая обувь и украшения лучше подходят.
<br/><br/>
Тема базового гардероба меня интересовала давно, а сейчас появились конкретные образы и комплекты, готовый шаблон, по которому можно составить интересные образы. Появились новые сочетания моих вещей, которые раньше не использовала.
<br/><br/>
Я выявила свои базовые вещи, их, конечно, не двадцать, а меньше, но есть к чему стремиться. Раньше я и не предполагала, что комплекты можно сочетать так интересно. О сумке инвестиции рассказано подробно, сейчас занимаюсь подбором модели сумки. Поняла, что нужно добавлять больше цвета, в моем гардеробе мало ярких, цветных вещей, но все равно получилось несколько вариантов цветовых сочетаний. Учусь делать комплекты в поливоре, пока не очень получается, но очень хочу освоить эту программу.
<br/><br/>
Эмоции от тренинга остались только положительные, все понравилось, тренинги и семинары Кати смотрю с интересом. Новые образы еще не использовала в гардеробе, так как больше на сезон весна-лето, с тренчем или туфлями, например.
<br/><br/>
Я пока только учусь составлять коллажи, технические моменты не позволяют хорошо составить и загрузить фотки. Сложно комбинировать комплекты с разными фактурами или принтами. В планах научиться делать коллажи в поливоре, а лучше – комплекты одежды в реальном гардеробе.
<br/><br/>
Составляю список базовых вещей для покупки с учетом цвета, фактуры, моей фигуры и роста. Появилось понимание, что конкретно нужно, будем искать). Буду пересматривать материалы тренинга до и после покупки базовых вещей, чтобы правильно и интересно их сочетать. Еще поняла, что очень мало аксессуаров использую, в планах приобрести подходящие ожерелье, сумки и интересные варианты обуви.
<br/><br/>
Катя, благодарю за интересный тренинг, почерпнула много новых идей и свежих решений, надеюсь большинство комплектов воплотить в своем гардеробе, большое спасибо!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_d_01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_d_01.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_d_02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_d_02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Л., г.Красноярск<span></span></div>
					<p style="text-align: justify;"><strong>В процессе тренинга открыла для себя новые предметы гардероба, на которые никогда не обращала внимания: кашемировый свитер и тельняшка.</strong> Особая благодарность за тему об ожерелье, обязательно сделаю его фишкой своего индивидуального стиля, а то раньше покупала только бусы. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1816')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1816" class="switchcontent">
<p style="text-align: justify;">.
Моей целью было научиться миксовать предметы гардероба между собой и довести этот навык до творческого автоматизма и профессионализма.
<br/><br/>
Принцип подбора в теории был ясен, но всё не «доходили руки» составлять комплекты по науке, а составлялись они обычно на интуиции. Например, очень давно у меня была кожаная куртка цвета беж и носила я её с длинным шелковым платьем с принтом цвета морской волны.
<br/><br/>
Мне хотелось уяснить принцип, а в прописанных на листке планах так и было заявлено: «Свой гардероб в polyvore». И мне это удалось. Теперь я вижу гардероб в картинках. Обнаружился большой пробел в базовых вещах, хотя об их существовании была осведомлена и считала, что часть из них у меня имеется.
<br/><br/>
В процессе тренинга открыла для себя новые предметы гардероба, на которые никогда не обращала внимания: кашемировый свитер и тельняшка. Особая благодарность за тему об ожерелье, обязательно сделаю его фишкой своего индивидуального стиля, а то раньше покупала только бусы.
<br/><br/>
За время тренинга просмотры моих сетов в поливоре увеличились с 1000 до 9 605 просмотров. Не ожидала такого внимания, я просто делала то, что мне нравится.
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_01.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_04.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_05.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_l_06.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava011.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Наталья Корнилова, врач-лаборант, инструктор по карате, город Харьков, Украина<span></span></div>
					<p style="text-align: justify;"><strong>Меня повернуло к некоторым вещам, которые я раньше считала более возрастными: шанель, футляр, карандаш.</strong> Очень нравится сочетания спортивного стиля с элегантным – прямо чувствую, что это моё надо только научится это всё правильно сочетать. Новостью было про элегантную сумку с четкими краями, вкусные цвета… раньше я не думала в таком ключе. Интересно, что сумка и ожерелье делают весь образ <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1817')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1817" class="switchcontent">
<p style="text-align: justify;">.
Проблема моего гардероба была в том, что в нем преобладает спортивный стиль, в основном, в сочетании с низким ростом – больше 16 не дают))))) В ходе семинара я поняла что беда у меня с гардеробом: базовых вещей — 30%) остальные разрозненные)
<br/><br/>
Раньше я считала, что все вещи должны быть сами по себе интересными, потому что не особо понимала варианты многообразия комплектов с использованием базовых вещей. В теории, всё ясно, что к классической вещи может подойти всё что угодно, но составить с ней интересный образ – проблема, всё скучное и чужое(((( Теперь многие вопросы отпали сами собой, так как они были объёмно рассмотрены в семинаре)))
<br/><br/>
Меня повернуло к некоторым вещам, которые я раньше считала более возрастными: шанель, футляр, карандаш. Очень нравится сочетания спортивного стиля с элегантным – прямо чувствую, что это моё надо только научится это всё правильно сочетать. Новостью было про элегантную сумку с четкими краями, вкусные цвета… раньше я не думала в таком ключе. Интересно, что сумка и ожерелье делают весь образ; их и планирую приобрести в первую очередь вместе с оксфордами (элегантнее чем кроссовки))))
<br/><br/>
Т.к. была загружена учебой, подготовкой к экзамену и тренировками, я успела сделать немного: некоторые комплекты в поливоре; очередной раз перетрясла гардероб; составила список покупок из базовых вещей и из вещей, которые будут трендовыми в этом сезоне))) Уже обзавелась ожерельем: подружка привезла из Англии, правда оно не особо многослойное, но намного лучше, чем бусы))) Одногрупницам понравилось)))
<br/><br/>
В первый день тренинга эмоции вообще были крутые, когда в последний момент я пыталась оплатить семинар, оббегала все банки, потом провела 4 тренировки и прилетела на такси домой и успела открыть семинар играла песня Zaz, она была как раз под настроение такой гонки, теперь на звонке стоит)))
<br/><br/>
Я очень рада, что попала на семинар несмотря на все возникающие трудности и загруженный график))) Все эмоции от семинара были позитивными, интерес, иногда удивление)))) Атмосфера у вас чудесная))))
<br/><br/>
Реакция окружающих была на кожаные шорты с высокими сапогами. Это не базовые вещи, но всё же я соорудила образ из того что было, вдохновленная семинаром)))
<br/><br/>
Точно планирую прослушать тренинг еще раз (и не раз) после сдачи экзамена, перед походом в магазин. Так же одно из первых в планах определение своего цветотипа.
<br/><br/>
Так как тема спорт актуальна, думаю добавить в свой спортивный гардероб элегантности (понимание о которой и пришло как раз на тренинге). Еще хотелось бы попасть в школу имиджмейкеров, когда появиться время)))
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova04.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova05.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova06.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/kornilova07.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Эрика Г., инженер-геолог, Москва<span></span></div>
					<p style="text-align: justify;"><strong>Если раньше для меня поход в магазин был пыткой, то 2 викенда тренинга я с удовольствием провела в магазинах, изучая ассортимент.</strong> И теперь на вещи смотрю не как на отдельные, а с мыслью «В какой комплект можно вписать эти джинсы/юбку/жакет/?». Поняла, что сфотографировать себя и посмотреть на фото — это намного больше дает, чем смотреть на себя в зеркале. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1818')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1818" class="switchcontent">
<p style="text-align: justify;">.
Подхожу с утра к шкафу, вроде вещи есть, а надеть нечего. Что-то уже маловато, что-то не сочетается. Просто не знала, как сочетать вещи, как скрыть недостатки фигуры. Решила проблему так: перестала сочетать вещи и уже года 4 ношу всякие разные платья. С ними куда меньше заморачиваться.
<br/><br/>
Раньше у меня было восприятие, что каждая вещь сама по себе, а все вместе — шмотки. Теперь в голове как-то все систематизируется: есть базовые вещи, есть расходные. И самое главное, что каждая вещь она не сама по себе, а составная часть какого-нибудь комплекта, более того — не одного комплекта, а нескольких при умелом подборе. Если раньше для меня поход в магазин был пыткой, то 2 викенда тренинга я с удовольствием провела в магазинах, изучая ассортимент. И теперь на вещи смотрю не как на отдельные, а с мыслью «В какой комплект можно вписать эти джинсы/юбку/жакет/?». Поняла, что сфотографировать себя и посмотреть на фото — это намного больше дает, чем смотреть на себя в зеркале. Еще сделала для себя открытие, что не только черная обувь может быть универсальной для комплектов
<br/><br/>
Я уже разобрала вещи на те, которые уже безнадежно устарели и с которыми надо расстаться, и те, которые являются базовыми и которые можно чем-то дополнить. Поняла, что действительно в моем гардеробе есть базовые вещи, но так как я не знала, что к чему и как, то эти базовые вещи не особо сочетаются. Но во время тренинга я составляла такие комплект, которые мне раньше и в голову не пришло бы составить. Где-то получилось не очень, а где-то очень даже)))
<br/><br/>
Эмоции на тренинге были самые положительные. Каждый день тренинга ждала с нетерпением. Каждый день все для меня было ново. Очень интересно. Очень понравилось, что Катя подробно отвечала на все вопросы. Подробно разбирала ДЗ. И с пониманием относилась к индивидуальным особенностям каждого человека. У меня было опасение, что имиджмейкер вне зависимости от социального положения и рода деятельности клиента будет настаивать на том, что одежду надо покупать только в хороших дорогих магазинах, а про Zara и Marks and Spencer можно забыть.
<br/><br/>
Молодому человеку очень понравились некоторые новые сочетания. В остальном как следует проверить не удалось, так как оказалось, что мои базовые вещи в основном все черного и черно-коричневого цвета, так что если их сочетать друг с другом, то получается мрак какой-то. К сожалению, ДЗ выполняла не на 100% из-за нехватки времени. Так что я думаю, что бОльшая часть работы еще впереди. Так что буду доделывать ДЗ, составлять больше комплектов, дополнять гардероб другими базовыми вещами. И буду учиться составлять комплекты. И обязательно куплю себе яркие туфли!!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Т., свой бутик по продаже женской одежды, город Липецк<span></span></div>
					<p style="text-align: justify;"><strong>После тренинга стала использовать Катины слова, такие, как: актуальность, яркость, острота, изюминка, стильность, перчинка, поняла, что, «это работает», так как у клиентки рисуется определенный образ, от этого усиливается желание купить вещь!</strong> Приобрела много полезной информации, как для себя, так и для своих клиентов. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1819')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1819" class="switchcontent">
<p style="text-align: justify;">.
Проблем с гардеробом не было. Пришла на тренинг с целью пополнения знаний по имиджу, было очень интересно, как Катя преподносит материал, все структурированно, конкретно, лаконично. Много интересуюсь этой темой, читаю специальную литературу.
<br/><br/>
После тренинга стала использовать Катины слова, такие, как: актуальность, яркость, острота, изюминка, стильность, перчинка, поняла, что, «это работает», так как у клиентки рисуется определенный образ, от этого усиливается желание купить вещь!
<br/><br/>
Приобрела много полезной информации, как для себя, так и для своих клиентов.
<br/><br/>
Поняла, что очень много в моем гардеробе вещей, платья, костюмы, а вот аксессуаров (ожерелья) нет, нет также цветных туфель (теперь в планах купить синие, зеленые и бордо). Большой позитив,огромное Вам, Катя спасибо!
<br/><br/>
Не хватало времени на проработку образов, комплекты составлю позже, сейчас, ну просто не хватает времени!
<br/><br/>
Огромное СПАСИБО, КАТЯ!!!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_01.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_04.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_05.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_t_06.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Людмила С, г.Токио, консультант в косметической компании<span></span></div>
					<p style="text-align: justify;"><strong>Подружки сказали, что стала более элегантной. А сама заметила, что вроде и одеваюсь как всегда, но с добавлением аксессуара становится комплект ярче, как Вы Катя говорите «вкуснее».</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1820')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1820" class="switchcontent">
<p style="text-align: justify;">.
Всегда старалась одеваться стильно и красиво, так как закончила технологический колледж по специальности портной верхней женской одежды. Но в последнее время не следила за новыми тенденциями и немного потерялась в мире моды. У меня всегда была проблема с аксессуарами. Как их носить? С чем сочетать? И поэтому всегда обходилась без шарфиков, платков и колье.
<br/><br/>
В каждом уроке тренинга давались комплекты в которых было видно, какие колье с чем сочетать, да и что модно в этом сезоне. Я стала носить шарфы, купила платок Hermes. В планах покупка колье. Очень жду ваш семинар чтобы сделать правильный выбор. (Раньше считала, что если украшение не из драг.метала, то и не стоит его покупать.)
<br/><br/>
Эмоции только положительные! Не смотря на то, что тренинги смотрела в записи, из-за разницы во времени. 10 день смотрела онлайн, хоть и было 3 часа ночи. Столько новых идей!
<br/><br/>
Подружки сказали, что стала более элегантной. А сама заметила, что вроде и одеваюсь как всегда, но с добавлением аксессуара становится комплект ярче, как Вы Катя говорите «вкуснее»
<br/><br/>
Не расписаны еще комплекты. В планах не только расписать их, но и сделать фото. Еще все это носить и применять! А то бывает , что все знаю, все имею, а одеваюсь как привыкла.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Галина С., г. Устюжна, Вологодская область<span></span></div>
					<p style="text-align: justify;"><strong>Сейчас уже представляю, что нужно докупить. Благодаря Кате смогла разобраться, как лучше составлять комплекты, какие вещи покупать.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1821')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1821" class="switchcontent">
<p style="text-align: justify;">.
В моем гардеробе не хватало базовых вещей и было много расходных, а также мало аксессуаров. Сейчас уже представляю, что нужно докупить. Благодаря Кате смогла разобраться, как лучше составлять комплекты, какие вещи покупать.
<br/><br/>
Сделала пока немного, т.к. сейчас очень занята на работе. Зато наметила, что нужно купить в первую очередь. Эмоции от тренинга остались только положительные, очень понравилась Катина система базовых вещей. У меня многого из этого списка нет, буду докупать . Уже представляю, как должно получиться.
<br/><br/>
На работе мне приходится одевать спецодежду, а на улице пока холодно и приходится тепло одеваться. Так что буду готовиться к лету. Также хочу, чтобы Катя помогла мне определить мой цветотип. Я считаю, что я контрастная осень. В зависимости от этого подкорректирую цвета покупаемых вещей. Хочу поучиться в школе имиджмейкеров у Кати. И в дальнейшем хочу попасть на шопинг с Катей в Москве.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Оксана Кузнецова, г. Иркутск, гос.служащая<span></span></div>
					<p style="text-align: justify;"><strong>Я, конечно, ещё не совсем поменяла гардероб, я только учусь.</strong> Но покупки, которые уже сделала, коллеги по работе оценили. Не могут понять, что со мной произошло. Им нравится то, что они видят. Ловлю на себе восторженные взгляды мужчин и вопросы в глазах женщин. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1822')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1822" class="switchcontent">
<p style="text-align: justify;">.
Во время семинара поняла, что у меня базовые вещи практически отсутствуют. Моими базовыми вещами были — черные брюки, чёрные юбки, трикотаж. (Кошмар!!! Хотя до этого как то ходила. Но как…) Джинсы только с трикотажем. Ранее видела джинсы + пиждак — смотрится хорошо, но не могла понять, почему. После тренинга поняла.
<br/><br/>
Как решала проблему гардероба? Перед каждым сезоном весна-лето и осень-зима шла в магазины с головной болью и мотала там себе нервы. Сейчас смешно об этом писать и вспоминать. Екатерина, спасибо за помощь.
<br/><br/>
Ездила в командировку и в магазины ходила уже с толком. Даже голова не болела. Оказывается, это очень приятно, только немного устаёшь. Совершила немного покупок, но все удачные. И даже внучке (1,5 года) купила вещи, как учили. Себе — джинсы, светлые брюки, джинсовую куртку, пиджак, платье, Внучке — джинсовую куртку, футболку, джинсы, платье.
<br/><br/>
С вашей помощью я поняла, что мне надо и как ходить по магазинам. Этому никто и никогда не научит. СПАСИБО ВАМ БОЛЬШОЕ.
<br/><br/>
Эмоции… Очень много полезной и нужной информации. Эмоции — через край. Я, конечно, ещё не совсем поменяла гардероб, я только учусь. Но покупки, которые уже сделала, коллеги по работе оценили. Не могут понять, что со мной произошло. Им нравится то, что они видят. Ловлю на себе восторженные взгляды мужчин и вопросы в глазах женщин.
<br/><br/>
У меня проблемы с ногами, не могу носить каблук, хотя очень его люблю и умею на нём ходить. Во время тренинга услышала хорошие советы, подсказки. Планирую выход в магазины уже с полученными знаниями. Буду мерить и смотреть. Теперь я знаю, что выбирать.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Сергеева Галина, г. Москва, учитель в средней школе.<span></span></div>
					<p style="text-align: justify;"><strong>Обязательно еще раз пересмотрю тренинг в записи. И до тренинга меня очень интересовали вопросы стиля, теперь критическая оценка стиля стала моим образом мыслей.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1823')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1823" class="switchcontent">
<p style="text-align: justify;">.
Проблемы с гардеробом: хочется иметь гардероб, состоящий из небольшого количества качественных вещей, которые мне идут и позволяют хорошо выглядеть в любой ситуации. Из-за большого размера и нехватки времени одеваюсь в одежду из немецких каталогов. Но и там выбор качественной одежды на большой размер невелик.
<br/><br/>
Еще до тренинга поняла, как важны в создании образа обувь, сумки, украшения. Теперь, когда просматриваю каталоги, взгляд падает только на те вещи, с которыми можно составить несколько интересных комплектов. Понимаю скрытое очарование неброских по декору вещей с четкими линиями кроя и из натуральных тканей.
<br/><br/>
С цветотипом определилась еще до тренинга. Недовольна тем, как на мне сидит юбка-карандаш. Всегда отбрасывала для себя идею носить ботильоны. Сомневалась в том, как обыграть тренч. Считала, что для полных женщин в возрасте больше подходит плащ-трапеция. После тренинга решила сделать еще одну попытку подобрать юбку-карандаш, более качественную. Очень захотелось поискать подходящие ботильоны, цветное футлярное платье.
<br/><br/>
Сейчас понимаю, что ботильоны выглядят более стильно, чем высокие сапоги. Жакет в стиле Шанель носила всегда, считаю, что это — моё. Бижутерию ношу, хотя в моем окружении ее не носит никто, но каждый раз сомневаюсь: по возрасту ли? Есть распространенное мнение, что женщина в возрасте может носить только ювелирные украшения. Стараюсь выбирать украшения, имитирующие полудрагоценные камни, эмаль, перламутр, драгоценные металлы. Платкам и шарфам всегда уделяла много внимания. Нужно докупить еще несколько шелковых платков пэйсли.
<br/><br/>
В планах все-таки начать посещать торговые центры (Катя и девочки-участницы тренинга дали много подсказок по брендам) и покупать вещи только после тщательной примерки. Думаю, что к следующей осени удастся создать более элегантный и цельный образ. Спасибо Кате за то, что чётко озвучила список «вечных» вещей, которые никогда не выйдут из моды.
<br/><br/>
Впечатления от тренинга самые положительные. Несмотря на то, что он заканчивался поздно, а после этого надо было сделать еще что-то по дому и подготовиться к следующему рабочему дню, я с нетерпением ждала 22:00 следующего дня.
<br/><br/>
Обязательно еще раз пересмотрю тренинг в записи. И до тренинга меня очень интересовали вопросы стиля, теперь критическая оценка стиля стала моим образом мыслей.
<br/><br/>
Спасибо Кате и всем участницам за очень полезные и приятные десять вечеров!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Оксана Б, г. Нижний Новгород, менеджер в IT-компании.<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг помог составить список на шоппинг, кое-что уже куплено, но законченных образов с аксессуарами нет.</strong> Зато абсолютно ясно, как действовать дальше. Эмоции у меня были исключительно положительные, но были и не очень приятные мысли :) Не один раз в ходе семинара я думала, зачем купила вещи, висящие в шкафу, хотя было несколько вещей в тему <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1824')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1824" class="switchcontent">
<p style="text-align: justify;">.
Проблемы в гардеробе у меня были типичные: отсутствовал рациональный гардероб, не умела составлять интересные по цвету и законченные по стилю комплекты, не понимала какие аксессуары выбирать, в гардеробе практически не было базовых вещей, но много расходных, платьев было не достаточно.
<br/><br/>
Тренинг помог составить список на шоппинг, кое-что уже куплено, но законченных образов с аксессуарами нет. Зато абсолютно ясно, как действовать дальше. Эмоции у меня были исключительно положительные, но были и не очень приятные мысли:). Не один раз в ходе семинара я думала, зачем купила вещи, висящие в шкафу, хотя было несколько вещей в тему.
<br/><br/>
Выбрала несколько вещей из прежнего гардероба, которые впишутся в будущий базовый правильный гардероб — куртка из кожи черного цвета, сумка подходящая по форме, джинсы темно-синего цвета, платья-футляры. Образы с футлярными платьями коллегам понравились, как кажется, но сама я не вполне довольна. Не нашла подходящего ожерелья и туфель.
<br/><br/>
До сих пор сложно составлять комплекты в Polyvore и в магазинах, но я понимаю, что это недостаток моего знания магазинов и опыта примерок. Трудно подобрать в магазине вещи, подходящие по цвету, хотя свои цвета знаю хорошо, у меня ощущение, что преобладают цвета теплых оттенков.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Леся С., г.Дрогобыче (Украина, Львовская обл.) преподаватель в педагогическом ВУЗе<span></span></div>
					<p style="text-align: justify;"><strong>Будет интересно попробовать новый подход к формированию гардероба. Тренинг помог по новому увидеть много вещей. Понять формирование модных образов. Например, никогда бы не увидела себя в тельняшке и элегантных туфлях. А теперь попробую создать и такой образ (ведь у девочек получилось!!!).</strong>
<br/><br/>
На фоне событий, которые у нас происходят, и быть от этого в стороне никак нельзя, занятия для меня были напоминанием, что жизнь продолжается и женщина всегда должна стремиться удерживать свой пьедестал «ЖЕНЩИНЫ». <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1825')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1825" class="switchcontent">
<p style="text-align: justify;">.
До тренинга как бы проблем с гардеробом не было, поскольку сама и шью, и вяжу, и вышиваю. Но на семинаре познакомилась с совершенно новым подходом. До семинара покупала 3-4 новые вещи на сезон (капсула, объединенная определенным цветом) и, поскольку все это было в классическом стиле, вещи сочетались, за 3-4 года снашивала и образ всегда был свежим. Получалось, что вещей немного и всегда есть что одеть.
<br/><br/>
По ходу семинара увидела, что у меня почти совсем нет базовых вещей, рассмотренных Катей. Будет интересно попробовать новый подход к формированию гардероба. Тренинг помог по новому увидеть много вещей. Понять формирование модных образов.
<br/><br/>
Например, никогда бы не увидела себя в тельняшке и элегантных туфлях. А теперь попробую создать и такой образ (ведь у девочек получилось!!!). Но не понимаю красоты рваных джинсовых шорт в сочетании с классическими туфлями и классической сумкой. Это оставлю для молодежи.
<br/><br/>
А за эмоции отдельное спасибо!!! На фоне событий, которые у нас происходят, и быть от этого в стороне никак нельзя, занятия для меня были напоминанием, что жизнь продолжается и женщина всегда должна стремиться удерживать свой пъедестал «ЖЕНЩИНЫ». Хотя послушать удалось только несколько отрывков тренинга. Надеюсь, что очень скоро смогу пересмотреть все в записи.
<br/><br/>
В какой-то момент хотелось видеть больше разных картинок одежды (образов). Но потом поняла, что для формирования понятия гардероб так и нужно. Очень понравилась манера Кати излагать материал. Большое спасибо!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Леся С., г.Дрогобыче (Украина, Львовская обл.) преподаватель в педагогическом ВУЗе<span></span></div>
					<p style="text-align: justify;"><strong>Будет интересно попробовать новый подход к формированию гардероба. Тренинг помог по новому увидеть много вещей. Понять формирование модных образов. Например, никогда бы не увидела себя в тельняшке и элегантных туфлях. А теперь попробую создать и такой образ (ведь у девочек получилось!!!).</strong>
<br/><br/>
На фоне событий, которые у нас происходят, и быть от этого в стороне никак нельзя, занятия для меня были напоминанием, что жизнь продолжается и женщина всегда должна стремиться удерживать свой пьедестал «ЖЕНЩИНЫ». <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1826')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1826" class="switchcontent">
<p style="text-align: justify;">.
До тренинга как бы проблем с гардеробом не было, поскольку сама и шью, и вяжу, и вышиваю. Но на семинаре познакомилась с совершенно новым подходом. До семинара покупала 3-4 новые вещи на сезон (капсула, объединенная определенным цветом) и, поскольку все это было в классическом стиле, вещи сочетались, за 3-4 года снашивала и образ всегда был свежим. Получалось, что вещей немного и всегда есть что одеть.
<br/><br/>
По ходу семинара увидела, что у меня почти совсем нет базовых вещей, рассмотренных Катей. Будет интересно попробовать новый подход к формированию гардероба. Тренинг помог по новому увидеть много вещей. Понять формирование модных образов.
<br/><br/>
Например, никогда бы не увидела себя в тельняшке и элегантных туфлях. А теперь попробую создать и такой образ (ведь у девочек получилось!!!). Но не понимаю красоты рваных джинсовых шорт в сочетании с классическими туфлями и классической сумкой. Это оставлю для молодежи.
<br/><br/>
А за эмоции отдельное спасибо!!! На фоне событий, которые у нас происходят, и быть от этого в стороне никак нельзя, занятия для меня были напоминанием, что жизнь продолжается и женщина всегда должна стремиться удерживать свой пъедестал «ЖЕНЩИНЫ». Хотя послушать удалось только несколько отрывков тренинга. Надеюсь, что очень скоро смогу пересмотреть все в записи.
<br/><br/>
В какой-то момент хотелось видеть больше разных картинок одежды (образов). Но потом поняла, что для формирования понятия гардероб так и нужно. Очень понравилась манера Кати излагать материал. Большое спасибо!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Виктория Щ, г. Керчь, бухгалтер<span></span></div>
					<p style="text-align: justify;"><strong>С большим вдохновением смотрела, слушала и делилась с подругами.</strong> «С Вашего позволения» дала несколько советов подругам и отзывы самые положительные. Комплименты и эмоции зашкаливают! То ли еще будет, когда я в этом всем разберусь до конца!!!! <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1827')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1827" class="switchcontent">
<p style="text-align: justify;">.
До тренинга, как вы говорили, Катя, покупалась вещь, которая нравилась + к ней обувь. Итого: несколько вещей и ничего друг с другом не сочетается, а комплекты получаются неполные. Понимания «базовые вещи» не было, как такового, вообще.
<br/><br/>
Сейчас пока только собираю разрозненные паззлы в общую картинку. Появилось четкое желание разобраться в этих 20 базовых вещах и научиться создавать полные комплекты, и может быть даже составить свой собственный стиль. очень захотелось тельняшку, хотя в начале тренинга не понимала, как она может быть базовой вещью.
<br/><br/>
Я уже написала список приобретения необходимых в 1-ю очередь вещей: юбка-карандаш, белая блузка, ожерелье. С подбором аксессуаров (кольца, серьги, браслеты, шарфики-платочки) вообще проблема (что с чем и как сочетать). Но есть страстное желание этому научиться. Готовлюсь к шоппингу…
<br/><br/>
Катя, благодарю! Каждый день со спорт тренировки просто бежала к вам на тренинг. Все емко, конкретно излагаете. С большим вдохновением смотрела, слушала и делилась с подругами.
<br/><br/>
«С Вашего позволения» дала несколько советов подругам и отзывы самые положительные. Комплименты и эмоции зашкаливают! То ли еще будет, когда я в этом всем разберусь до конца!!!!
<br/><br/>
Не люблю блейзер-жакет-жакет в стиле шанель. Блейзер и жакет считаю мужскими вещами, люблю более женственную одежду. Жакет в стиле шанель ассоциируется с «женщиной за 60-т».. Думаю, придет время, и я захочу эти вещи!!!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Сафронова, Иерусалим<span></span></div>
					<p style="text-align: justify;"><strong>Взяла на вооружение тельняшку — никогда не думала об этом предмете гардероба как о потенциале.</strong> Даже уже приобрела себе — спасибо за наводку. Также пересмотрела своё отношение к кардиганам… Кроме того поняла, что явно не хватает знаний о своих цветах, потому что несмотря на любовь к ярким цветам, появляются они в моём гардеробе спонтанно, и больше по принципу «нравится-не нравится», а не со знанием дела. Попробую воспользоваться вашей услугой определения цветотипа. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1828')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1828" class="switchcontent">
<p style="text-align: justify;">.
Я живу в Иерусалиме, работаю экскурсоводом в Израиле и Европе. И моя главная проблема — вещей всегда много, и казалось бы всегда удавалось сочетать несочетаемое и всегда получать комплименты по поводу своего внешнего вида. Но когда встаёт вопрос — что же положить в чемодан, проблема почти неразрешимая. Хочется всегда хорошо выглядеть, а готовых комплектов, так что бы на любой случай и погоду — не выходит. И всегда вечно чего-то не хватает, поэтому почти из каждой поездки приезжаю с кучей случайно купленных вещей по необходимости.
<br/><br/>
Ваш семинар мне в чём-то помог, в чём-то оказался не таким практичным. И объясню почему. Во-первых, это больше рассчитано на людей, работающих «стационарно», а не мобильно. Во-вторых, потому что несомненно есть разница в климатических условиях, и особенностях работы (на которой проводишь на ногах слишком много времени, чтобы быть на жаре и на каблуках.
<br/><br/>
Но я пришла к выводу, что просто надо попытаться составить свой «базовый» гардероб. те базовые вещи, которые были бы применимы к моей работе и климату. Пока не очень представляю чем заменить платье-футляр, или юбку-карандаш. Если есть какие-нибудь идеи — с удовольствием воспользуюсь подсказкой! Но буду об этом думать.
<br/><br/>
Взяла на вооружение тельняшку — никогда не думала об этом предмете гардероба как о потенциале. Даже уже приобрела себе — спасибо за наводку. Также пересмотрела своё отношение к кардиганам — мне всегда казалось в магазинах, что кардиганы выглядят как «бабушкины» кофты. Теперь обязательно куплю себе летние кардиганы. Туфли на каблуке всё равно остаются для меня только как зимний вечерний вариант (климат и работа выставляют свои требования).
<br/><br/>
Кроме того поняла, что явно не хватает знаний о своих цветах, потому что несмотря на любовь к ярким цветам, появляются они в моём гардеробе спонтанно, и больше по принципу «нравится-не нравится», а не со знанием дела. Попробую воспользоваться вашей услугой определения цветотипа.
<br/><br/>
Было приятно находится в компании с очень тёплой атмосферой (хоть и виртуальной — а говорят, что компьютер это машина)) Большое спасибо вам, большое спасибо всем участницам тренинга.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина Гладких, г. Москва<span></span></div>
					<p style="text-align: justify;"><strong>Во время тренинга я узнала о существовании новых базовых вещей, какие-то очень неожиданные, стильные, красивые их сочетания, теперь буду смело сочетать элеганс и спортиф, и, похоже, стала чувствовать цвета (очень помогли ещё советы Екатерины в предыдущих рассылках).</strong> Появилась тяга делать интересные цветовые сочетания. Много интересного узнала о сочетании аксессуаров, и разных мелочей о них <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1829')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1829" class="switchcontent">
<p style="text-align: justify;">.
Каких-то особо больших проблем с гардеробом не было, как-то на интуитивном уровне одевалась всё-таки правильно, но… иногда чувствовала, что какой-то косяк есть, а не пойму.., а теперь у меня есть и великолепная теория, и база.
<br/><br/>
Была склонность к чёрному цвету (вот это было большой проблемой), захожу в магазин и кроме чёрных вещей ничего не вижу, сразу их начинаю перебирать, не совсем понимала принципы сочетания цветов, почти не видела красивых цветовых сочетаний. И в гардеробе всё-таки есть не все базовые вещи. Сейчас понимаю, что не всегда образы были лаконичны.
<br/><br/>
Во время тренинга я узнала о существовании новых базовых вещей (обязательно приобрету), какие-то очень неожиданные, стильные, красивые их сочетания, теперь буду смело сочетать элеганс и спортиф, и, похоже, стала чувствовать цвета (очень помогли ещё советы Екатерины в предыдущих рассылках). Появилась тяга делать интересные цветовые сочетания. Много интересного узнала о сочетании аксессуаров, и разных мелочей о них, просто СПАСИБО.
<br/><br/>
После тренинга я пересмотрела свой гардероб, определила, какие вещи базовые, какие нет, нашла новые сочетания с ними, и ещё долго буду находить. Каждое занятие я ждала с нетерпением, с удовольствием слушала, ловила каждое слово. Очень профессиональная подача информации, всё чётко, по делу, доброжелательное отношение к ученикам, и даже раскрытие каких-то своих секретиков, что очень подкупает. Ещё раз, большое спасибо.
<br/><br/>
Теперь в планах прорабатывать цветовые сочетания, красивые сочетания разных стилей и совсем осознанно покупать вещи!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava012.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Анна Толмачева, коуч, бизнес-тренер, ученый. г. Красноярск<span></span></div>
					<p style="text-align: justify;"><strong>Муж сильно доволен — яркая и стильная жена — это его давняя мечта, хотя далеко не все образы (особенно смешение стилей, фактур и т.д.) он еще понимает и принимает.</strong> Коллеги начинают тихонько зеленеть, хотя и с интересом присматриваются, а подопечные запросто подходят за советом. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1830')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1830" class="switchcontent">
<p style="text-align: justify;">.
Проблем с гардеробом было несколько — после двух родов изменились пропорции фигуры, после почти 4-х лет декрета выпала из модной жизни, а выход на общественную работу, где ты не только все время на виду, но и на тебя ровняются — обязывает, до тренинга не могла внятно связать в один комплект вещи и расставить правильно акценты, а также были проблемы с подбором и использованием украшений. попытки разобраться самостоятельно, используя модные журналы и блоги, дали мало результата — общей картинки и готовых вариантов не складывалось.
<br/><br/>
Тренинг, во-первых, как хорошо структурированный и грамотно подобранный материал, помноженный на доступное объяснение Екатерины, помог не только реанимировать большую часть прежнего гардероба (оказалось, что много базовых вещей уже есть), собрать огромное количество комплектов, но и появилась определенная смелость в смешении стилей, разнообразии составляемых комплектов, можно сказать, что изменилось мое мировоззрение на себя в мире моды и красоты!
<br/><br/>
во-вторых, была решена проблема обновления гардероба — есть полное понимание какие первоочередные проблемы надо закрыть, чего действительно не хватает, а что можно заменить, перешить, сшить — креатив выпирает из всех щелей! Но самое главное — появились законченные образы-комплекты — можно одевать и не ломать голову что с чем сочетать!
<br/><br/>
А еще очень важная вещь, которая произошла во время тренинга — у меня появились комплекты для командировок (2-3 дня в месяц я в командировке) — минимум вещей, максимум комплектов, я разная и интересная (вкусная — как говорит Катя), а чемодан маленький и легкий! — мечта просто! — уже попробовала — очень впечатлило! Я уже собрала десятка два разных образа на все случаи жизни!
<br/><br/>
При прохождении тренинга было удивление (как же я раньше не видела таких сочетаний!, это же так просто! так у меня же все есть! какая экономия бюджета!), желание применять все на практике (вообще отдельное спасибо автору за жизненность и применимость идей и образов тренинга — это не только для длинноногих молодых красоток, у которых ни забот, ни хлопот — это для каждой из нас простой смертной! и это можно и нужно носить! — спасибо Катя).
<br/><br/>
Муж сильно доволен — яркая и стильная жена — это его давняя мечта, хотя далеко не все образы (особенно смешение стилей, фактур и т.д.) он еще понимает и принимает. Коллеги начинают тихонько зеленеть, хотя и с интересом присматриваются, а подопечные запросто подходят за советом.
<br/><br/>
Я уже не раз прослушивала повторно записи — перед походом в магазин особенно, четко понимаю за чем иду — сокращает время поисков и позволяет не отвлекаться на другое. так, что у меня процесс только начинается!
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Анна Г., г. Малмё, Швеция<span></span></div>
					<p style="text-align: justify;"><strong>В процессе тренинга у меня появилось такое системное мышление, и ясный план построения гардероба.</strong> Распечатала комплекты с особо актуальными для меня вещами и приклеила их на внутренюю поверхность дверцы шкафа, тренируюсь в составлении комплектов. Купила свитер крупной вязки. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1831')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1831" class="switchcontent">
<p style="text-align: justify;">.
У меня был неинтересный, скучный гардероб. Нечего надеть на выход: Пыталась покупать одежду более яркого, веселого цвета или с чем-нибудь интересненьким в дизайне. Прошла курс кройки и шитья, где сшила себе 3 новых платья, одно из которых футлярное, юбку-карандаш и брюки. Но все равно оставалось чувство разрозненности гардероба, и непонятности, чего же не хватает, или как все это привести «к общему знаменателю».
<br/><br/>
Последние два года гардероб был чисто фукциональным: джинсы, майки для кормления и кардиганчики (желательно с большими карманами) : тут ничего особо не пыталась делать.
<br/><br/>
В процессе тренинга у меня появилось такое системное мышление, и ясный план построения гардероба. Сделала я пока что маловато, поскольку ребенок мне оставляет около получаса личного времени в день, но в Швеции март считается зимним месяцем (не безосновательно), поэтому у меня ещё есть время подтянуться до прихода весны. Распечатала комплекты с особо актуальными для меня вещами и приклеила их на внутренюю поверхность дверцы шкафа, тренируюсь в составлении комплектов. Купила свитер крупной вязки.
<br/><br/>
Эмоции во время тренинга были очень положительные! Очень вдохновляюще и интересно. Великолепная подача материала. Мои образы пока не изменились радикально, может стали чуть посвежее и поинтереснее.
<br/><br/>
Хочу еще по-больше разобраться с цветом и с правилами сочетания цветов. Думаю о покупке тельняшки и жакета в стиле Шанель. Просто заболела идеей цветного жакета. Хочу купить розовый.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга С., г. Одесса<span></span></div>
					<p style="text-align: justify;"><strong>С тех пор как я всерьез занялась своим гардеробом, многие незнакомые люди стали более заинтересованно смотреть (даже рассматривать), особенно женщины.</strong> В кругу общения подруги и их мужья часто заводят со мной разговоры о моде и уточняют где и что лучше приобрести. Муж каждый день делает комплименты и дети не подходят к своим шкафам, пока не выяснят у меня, что им нужно надевать. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1832')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1832" class="switchcontent">
<p style="text-align: justify;">.
До этого тренинга о базовых вещах я проходила тренинг для имиджмейкеров. Поэтому особых вопросов у меня не было. Но тот материал, который Екатерина собрала в единый гардероб на базе базовых вещей — окончательно внес ясность — во что прежде всего нужно инвестировать деньги.
<br/><br/>
На интуитивном уровне многие вещи были понятны и раньше. Но все же услышать подтверждение своих собственных мыслей очень важно. Одно дело догадка, другое дело правило, которым нужно пользоваться. Сейчас я точно знаю, какие вещи мне нужно приобрести в ближайшем будущем и самое главное, я точно знаю, что они дадут мне возможность использовать уже имеющийся гардероб на 100 %.
<br/><br/>
Я уже составила массу вариантов комплектации из уже имеющихся вещей и написала список того, что необходимо докупить. Приятно было заметить, что большая часть существующих вещей – базовые вещи. А те отдельные элементы гардероба, которые долгое время висели без применения, теперь получат шанс выйти в свет в правильной подаче.
<br/><br/>
Спасибо Екатерине за то, что умеет правильно выделять в огромном потоке модной информации самую суть и доступно ее излагать.
<br/><br/>
С тех пор как я всерьез занялась своим гардеробом, многие незнакомые люди стали более заинтересованно смотреть (даже рассматривать), особенно женщины. В кругу общения подруги и их мужья часто заводят со мной разговоры о моде и уточняют где и что лучше приобрести. Муж каждый день делает комплименты и дети не подходят к своим шкафам, пока не выяснят у меня, что им нужно надевать. Я даже утром не могу выспаться (о, ужас!)
<br/><br/>
У меня пока нет зеркала, от которого я могу отойти на пять шагов. Этим и займусь в ближайшее время.
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_s_01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_s_01.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_s_02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_s_02.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_s_03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/olga_s_03.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava013.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Марина Куриннова, г. Иркутск<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг «базовый гардероб» был очень полезен для меня. Оказалось, что раньше, будучи работающей женщиной с размером 42-44, я примерно так и одевалась. Теперь, оказавшись в новом размере, в новом статусе и раздарив свой прежний гардероб (не люблю копить вещи), я обнаружила, что базовых вещей у меня как раз и нет, зато много длинных платьев, юбок и трикотажа к ним.</strong>
<br/><br/>
Я очень люблю покупать что-нибудь по случаю, т.е. когда это “не горит”, но вещь очень удачная, и, таким образом, мне всегда было что надеть, и, чудо! мои вещи очень сочетались между собой, даже если при покупке я к этому и не стремилась. Мне бы очень хотелось вернуться к этому состоянию. Думаю, тренинг мне в этом очень поможет. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1833')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1833" class="switchcontent">
<p style="text-align: justify;">.
Здравствуйте, дорогая Катя! Благодарю вас от всей души за две недели интересного рассказа про базовый гардероб. Я с удовольствием смотрела каждый день и с радостным предвкушением ждала следующий.
<br/><br/>
Я из Тюмени, но последние полгода мы живем временно в Иркутске. Уже 4 года я нахожусь в декретном отпуске, до этого я работала главным бухгалтером много и долго, и первые мои дети были рождены “без отрыва от производства”. Всего у меня 4 детей — сын 18 лет, доча 11 лет, мальчишки 4 и 1.5.
<br/><br/>
Мне очень нравится «не работать», т.к. очень люблю домашние дела и занимаюсь квилтингом, печворком, вышивкой и т.д. и т.п Единственное, что не нравится — это особенно некуда наряжаться, а я очень люблю офисные варианты одежды со шпильками. С детьми на руках хожу в спортивном или в длинных юбках, они мне идут. Мой рост 173 см, размер верха 44-46, размер низа 46-48, тонкая талия.
<br/><br/>
Тренинг «базовый гардероб» был очень полезен для меня. Оказалось, что раньше, будучи работающей женщиной с размером 42-44, я примерно так и одевалась. Теперь, оказавшись в новом размере, в новом статусе и раздарив свой прежний гардероб (не люблю копить вещи), я обнаружила, что базовых вещей у меня как раз и нет, зато много длинных платьев, юбок и трикотажа к ним.
<br/><br/>
Теперь я буду последовательно подбирать себе все двадцать вещей из базового гардероба, скорее даже в разных вариациях. За время тренинга я приобрела черно-белый кардиган Laurel, очень похожий на тот, что был в Ваших примерах, и жакет из тонкой шерсти графитового цвета Marc Саin. Закажу юбку-карандаш серо-синего цвета, платья-футляр нескольких цветов: темно-бирюзового, брусничного, черничного; платье с запахом с принтом, потому что никогда в жизни не подобрать готовых из-за большого перепада талия-бедра. Нашла здесь в Иркутске потрясные коллекции брендовых тканей и мастера, правда к ней очередь, но это нормально при отличном качестве.
<br/><br/>
Жакет в стиле Шанель у меня уже есть очень похожий на тот, что был в примерах. Ожерелье — в поиске, т.к. надо найти, чтобы не смотрелось дешево. Сумок у меня много, все классные, но инвестициями их не назовешь. Буду мечтать и присматривать себе такую.
<br/><br/>
Прошу прощения за отсутствие д/з — дети не оставляют никакой возможности — при виде ноутбука младший требует и кричит. Мой друг перфекционизм не дает сделать д/з абы как, а хорошо сделать не получается.
<br/><br/>
Вспомнила, что раньше у меня было приятное чувство, что всегда есть что одеть на любой случай. Я много заказывала вещей из итальянских тканей и очень любила каждую вещицу из своего шкафа. Одежды нужно ровно столько, чтобы о ней не думать. Я очень люблю покупать что-нибудь по случаю, т.е. когда это “не горит”, но вещь очень удачная, и, таким образом, мне всегда было что надеть, и, чудо! мои вещи очень сочетались между собой, даже если при покупке я к этому и не стремилась. Мне бы очень хотелось вернуться к этому состоянию. Думаю, тренинг мне в этом очень поможет.
<br/><br/>
Еще дело в том, что только родив 4-го ребенка в 36 лет я ощутила себя матерью семейства. А до этого я была девочкой-припевочкой. Потому и вещи все свои любимые раздала, потому что поняла, что никогда не буду прежней. Но хочу стать еще лучше.
<br/><br/>
В ходе тренинга поняла, что лучше всего использовать топы без принтов, шелковые. Джинсы я не ношу совсем уже три года благодаря Ольге Валяевой, сначала попробовала, потом понравилось, поэтому джинсы буду заменять длинной юбкой, конечно, это намного сложнее и ограниченнее по возможностям, но зато и намного комфортнее.
<br/><br/>
Недавно увидела в ВК фразу: “В наше время нужно иметь смелость не чтобы раздеться, а чтобы одеться». Это как раз тот случай. К тому же я обожаю этнику! К тому же сумки строгой формы не идут , как выяснилось, к моему бедру. Буду мечтать, чтобы Вы, Катя, сделали когда-нибудь семинар «Длинная юбка и К».
<br/><br/>
Катюша, мне очень нравится то, что Вы делаете и как Вы это делаете. Я желаю Вам здоровья и счастья!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/_d_improd_/kurinnova02_f_improf_300x534.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/07/_d_improd_/kurinnova02_f_improf_300x534.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Анна Д., г. Лунд, Швеция.<span></span></div>
					<p style="text-align: justify;"><strong>Разобрала имеющиеся вещи на «Убрать/оставить», решила что надо докупить.</strong> Собрала несколько комплектов (не с базовыми вещами, а на основе тех идей, которые прозвучали на тренинге). Результаты самые положительные: начала вырисовываться система, появился план, что надо сделать… Было очень интересно, информация систематизировалась, я прониклась каким-то чувством моды/стиля, появилось вдохновение, и это очень приятно. Мои мужчины рады, что комплекты стали менее возрастными, более острыми. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1834')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1834" class="switchcontent">
<p style="text-align: justify;">.
До тренинга проблема с гардеробом была одна: много разных, не сочетающихся друг с другом вещей, много одинакового (4 серых жакета, 5 черных брюк, все остальное тоже серое, черное, белое). Пыталась одна и с помощью подруг докупать что-то, что часто тоже было не впопад (не подходило к уже имеющимся вещам или было «не мое»). Много бабских вещей.
<br/><br/>
С помощью тренинга сформулировала для себя цель: собрать гардероб, подходящий для моего образа жизни, круга общения и принятых здесь неписаных правил (здесь не принято выделяться и «одеваться» в российском понятии. Поэтому всегда определяют человека из России). Помогли правила «70%/30%», «3-5 верха к 1 низу», «вещь должна подходить к 2-3 уже имеющимся». Составила список базовых и расходных вещей, которые хотелось бы иметь.
<br/><br/>
Разобрала имеющиеся вещи на «Убрать/оставить», решила что надо докупить. Собрала несколько комплектов (не с базовыми вещами, а на основе тех идей, которые прозвучали на тренинге). Результаты самые положительные: начала вырисовываться система, появился план, что надо сделать.
<br/><br/>
Было очень интересно, информация систематизировалась, я прониклась каким-то чувством моды/стиля, появилось вдохновение, и это очень приятно. Мои мужчины рады, что комплекты стали менее возрастными, более острыми.
<br/><br/>
Мне все еще надо проработать какие цвета мне идут, чтобы докупить подходящие вещи, а также учиться комбинировать вещи, работать на контрасте.
<br/><br/>
Большое спасибо Кате за чудесный семинар. Не думала, что это так интересно, полезно. Чудесная энергетика группы и большое обаяние Кати.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava014.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана, Красноярск<span></span></div>
					<p style="text-align: justify;"><strong>Теперь я понимаю, что подбор гардероба – это такое же нужное дело, как чтение, чистка зубов или прогулка на природе.</strong> Осознала, что внешний вид – это такой же труд, как знания или ведение хозяйства, потому что нужны навыки и опыт, которые приходят только на практике. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1835')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1835" class="switchcontent">
<p style="text-align: justify;">.
На самом деле у меня большие проблемы с гардеробом: как теперь понимаю, у меня его не было в принципе. То, что было, нельзя назвать гардеробом. Набор вещей чисто утилитарный – чтобы не мёрзнуть и голой не ходить. Правда, за всю жизнь у меня только 5 не носимых вещей, купленных импульсивно или потому что было нужно, а времени не было. Понимала, что что-то не то, но у меня всегда были какие-то более важные дела, чем гардероб. К тому же в связи с ростом (157) и весом (сейчас 56 -58 размер, а худой я не была никогда) покупки никогда не доставляли мне большого удовольствия.
<br/><br/>
Теперь я понимаю, что подбор гардероба – это такое же нужное дело, как чтение, чистка зубов или прогулка на природе. И это отдельное дело, которым нужно заниматься специально. Никогда не задумывалась о том, что пословица «по одежке встречают» настолько актуальна, провожают-то нормально.
<br/><br/>
Когда чувство, что что-то нужно делать, начинало беспокоить, ходила по магазинам одна или с кем-то, но удовольствия или радости это не давало. Когда в 3-5-7 магазинах говорят, что моего размера нет, желательного цвета нет, желательного фасона нет, а то что есть, выглядит как чехол от рояля… Кроме того, постоянно получала знаки, или то, что можно истолковать как знаки, что гардероб – моё слабое место. Долгое время их игнорировала.
<br/><br/>
Смотрела иногда передачи про переодевания женщин специалистами. Пробовала консультироваться у знакомых, которых считала стильными, но не воспринимала всё всерьёз. Какие-то советы считала разумными и пробовала подобрать подходящую одежду, но не получалось по разным причинам, чаще всего из-за отсутствия в магазинах того, что нужно. В общем, выбирала привычные для себя решения и образ действия.
<br/><br/>
Теперь думаю, что не получалось ещё и из-за отсутствия системного подхода и настоящей заинтересованности. Понимаю, что работа, командировки, семья и проч. – это только повод лениться и заниматься чем-то другим. Поэтому имею то, что имею. На тренинг попала довольно неожиданно: заполнила в Интернете тест, потом практически случайно вышла на сайт, получила бесплатные материалы «Как похудеть на 2 размера с помощью имиджмейкера».
<br/><br/>
Задумалась о гардеробе, разобрала шкаф. Сейчас понимаю, что разобрала недостаточно. Материалы от Екатерины продолжали приходить, я с удовольствием их читала – они невелики по объему, но красивы и подсказывали мне некоторые мысли. Рассылка о тренинге про гардероб убедила меня, что надо заняться собой. Рассылка очень грамотно построена психологически, она устыдила меня в том, как я выгляжу обычно и как к себе отношусь.
<br/><br/>
Знаете, самое главное, тренинг подтолкнул к мысли о том, что мало быть хорошим специалистом, хорошим человеком и проч. И заставил осознать, что мои представления о гардеробе неверны. Недостойный гардероб делает мою жизнь хуже, чем это могло бы быть. Чтение материалов от Екатерины Маляровой заставило взглянуть на себя с другой точки зрения и оценить усилия некоторых знакомых и коллег по работе, которые они прикладывают для достойного внешнего вида. Пока я считаю главным – толчок в нужном направлении. Думаю, что когда сделаю все домашние задания, результатом станет и новый гардероб, и выросшая уверенность в себе, и получение удовольствия от жизни.
<br/><br/>
Конкретно я разобрала гардероб ещё раз. Ликвидировала вещи, которые делают меня толще, старше или уже состарились и утратили вид. Ну, и то, что держала как память. Проверила сочетаемость вещей друг с другом. Поняла, что не хватает верхов, сходила в магазины. Купила мало, но перестала паниковать, что ничего не подходит. Екатерина понемногу внушила мысль, что одним набегом проблему гардероба не решить, это дело надо простроить и целенаправленно идти в нужную сторону. Поняла, что нужно сделать. Купила сумку необычного для себя цвета – цвета фуксии. В мой синий гардероб она внесла жизнерадостную ноту. Купила джинсовое платье. Сумка-инвестиция меня пока не зовет. Сходила померяла туфли и ботильоны. Жаль, что высокий каблук – это не моя история в связи со здоровьем коленных суставов, но поняла, что зря не пользовалась их преимуществами раньше. Присмотрела две пары обуви, обновлю в осенний сезон. Начало изменениям положено.
<br/><br/>
Какие эмоции были. Основные: что я балда и не уделяла должного внимания важной стороне жизни, которую недооценивала. Удивлялась, что можно сочетать вещи, о которых даже не задумывалась, например, джинсы и футболку с ожерельем. Ещё раз восхитилась коллегами и знакомыми, которых называю «женщина-праздник», потому что оценила то, что они делают для своего внешнего вида. Осознала, что внешний вид – это такой же труд, как знания или ведение хозяйства, потому что нужны навыки и опыт, которые приходят только на практике.
<br/><br/>
Поскольку новые образы только начаты, то реакции пока немного: коллеги отметили новинки в гардеробе, поощрили появляющийся гораздо чаще макияж. Ничего не осталось незамеченным. Но, думаю, основная реакция ещё впереди.
<br/><br/>
Недостаточно хорошо я выполнила домашние задания, которые сделаю непременно, потому что это тот самый опыт, который и даёт необходимые ощущения и подтверждает полученные на тренинге знания.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava015.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана Купи, Маглан, Франция, домохозяйка<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг мне помог разобрать гардероб, выбрать базовые вещи и по-новому посмотреть. как их можно носить.</strong> Я составила новые комплекты с футлярным платьем, которое я не носила. потому что думала, что оно для праздничных выходов. В течение недели я выходила в свет в этом платье в разных комплектах и муж решил, что я завела любовника. Результат после тренинга: я не покупаю новые вещи, а комплектую ансамбли по-новому из того, что есть. Экономно и разумно. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1836')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1836" class="switchcontent">
<p style="text-align: justify;">.
Я живу в Маглане, Верхние Савойи, Франция. Я домохозяйка на пенсии, мне 55 лет. Проблема, которая привела меня в тренинг, слишком много вещей. Проблемы с комплектацией у меня никогда не было: я умею сочетать вещи, и когда что-то покупаю, то всегда знаю, с чем буду носить. Я люблю покупать модные вещи, и гардероб увеличивается с каждым сезоном. Бывает, что новые вещи мне не удается одеть: я не работаю и выходы в свет ограничены. К своему стыду мои знания о базовом гардеробе ограничивались маленьким черным платьем и юбкой-карандаш.
<br/><br/>
Тренинг мне помог разобрать гардероб, выбрать базовые вещи и по-новому посмотреть. как их можно носить. Я составила новые комплекты с футлярным платьем, которое я не носила. потому что думала, что оно для праздничных выходов. Платье я надела с джинсовой курткой и летними сапогами. Получилось очень молодежно и стильно. В течение недели я выходила в свет в этом платье в разных комплектах и муж решил, что я завела любовника.
<br/><br/>
Результат после тренинга: я не покупаю новые вещи, а комплектую ансамбли по-новому из того, что есть. Экономно и разумно. Лишние вещи дарю подругам, которые такого же размера. что и я. Все довольны. Эмоции самые позитивные. Я теперь покупаю вещи «must have», а базовых вещей у меня достаточно, просто я об этом не знала до тренинга. Спасибо большое, что помогли мне рационализировать мой гардероб.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Лилия Ибрагимова, Ижевск, преподаватель в университете и фитнес-инструктор<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции от тренинга - удивление, удовольствие, позитив). Муж заметил и оценил новое платье (до этого он даже не замечал появления в гардеробе еще одного черного прямого), подруги оценили новые цвета и фасоны, появившиеся в гардеробе.</strong> Отдельное спасибо Екатерине за терпение при ответах на ВСЕ вопросы и комментарии по домашнему заданию. Это делает тренинг персонифицированным и особенно ценным, тк мы получаем советы лично для нас! <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1837')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1837" class="switchcontent">
<p style="text-align: justify;">.
У меня две профессии — преподаватель в университете и фитнес-инструктор. Соответственно вечная проблема: куда, в чем, чтобы уместно, красиво, недостатки скрыть (очень критически отношусь к ним).
<br/><br/>
Мой гардероб — это прямые черные платья, много черных платьев) для одной работы и джинсы + трикотаж для другой. Вещей много, понимания что с чем комбинировать не было совсем, поэтому в гардеробе не было ни одной юбки, ни одного жакета — платье надеть проще, особенно черное прямое)
После тренинга, во-первых, я начала смотреть на цветные вещи — это для меня колоссальный прогресс, особенно для зимнего гардеробы. Во-вторых, появилось понимание что вещи можно комбинировать), и самое главное — как это можно делать.
<br/><br/>
Открытием для меня стал цветовой круг), возможность носить клатч не только на выход и сочетать спортивное с элегантностью. Для одной работы у меня был один гардероб, для второй — другой. А сейчас (ура!) я понимаю, что я могу одни и те же вещи носить и туда, и туда).
<br/><br/>
Также очень ценно понимание того, что нужно приобрести — у меня есть конкретный список вещей (часть уже даже купила) и понимание того, с чем и как их буду носить.
<br/><br/>
Эмоции от тренинга — удивление, удовольствие, позитив).
<br/><br/>
Муж заметил и оценил новое платье (до этого он даже не замечал появления в гардеробе еще одного черного прямого), подруги оценили новые цвета и фасоны, появившиеся в гардеробе.
<br/><br/>
Мне бы хотелось научиться выбирать украшения и аксессуары — пока это сложно. Также интересно все про верхнюю одежду. И еще — в качестве идеи для будущих семинаров/статей — как, когда и с чем носить кеды/кроссовки.
<br/><br/>
Отдельное спасибо Екатерине за терпение при ответах на ВСЕ вопросы и комментарии по домашнему заданию. Это делает тренинг персонифицированным и особенно ценным, тк мы получаем советы лично для нас!
<br/><br/>
Планирую продлить возможность получать комментарии и оценку ДЗ, тк часть вещей планирую приобрести в ближайшее время.
<br/><br/>
Еще раз спасибо Кате и ее команде — интересно, ценно, полезно, индивидуальный подход. Здорово!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lilii-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lilii-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lilii-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lilii-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lilii-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-lilii-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava016.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">София Абдулаева, Бишкек, дизайнер интерьера<span></span></div>
					<p style="text-align: justify;"><strong>Спасибо что открыли мне глаза! Тренинги захватывающие, информативные, я испытала много положительных эмоций.</strong> Коллеги понимают что со мной что то происходит и, думаю, озадачены. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1838')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1838" class="switchcontent">
<p style="text-align: justify;">.
В гардеробе у меня сразу несколько проблем: комплекты вещей скучные, монохромные, зачастую верха сами по себе, низы сами по себе, есть вещи которые не носятся совсем, поэтому чтобы сэкономить, решила рационализировать свой гардероб обратившись к вам за помощью.
<br/><br/>
Тренинг помог мне понять что гардероб нельзя составлять стихийно, что необходимо прежде продумать комплект применяя формулы цвета, разность фактур, смешение стилей, деталировку. Узнала как много значат аксессуары, к ним я напрасно много меньше проявляла интерес.
<br/><br/>
На данный момент я составила список базовых вещей, которые необходимо будет приобрести, которые будут носится с полной окупаемостью и радостью носки.
<br/><br/>
В последнее время стала активно носить аксессуары, разные колье покупаю они мне стали интересны невероятно. Раньше я покупала свитшоты, свитера и платья с отделкой камнями на груди, надо сказать за это хорошо переплачивала в цене. Теперь меня интересуют лаконичные вещи без отделки, чтоб была возможность каждый раз менять образ с помощью различных ожерелий. Спасибо что открыли мне глаза!
<br/><br/>
Тренинги захватывающие, информативные, я испытала много положительных эмоций
<br/><br/>
Коллеги понимают что со мной что то происходит и, думаю, озадачены.
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava017.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Татьяна Ризен, Нюрнберг, Германия, домохозяйка<span></span></div>
					<p style="text-align: justify;"><strong>Была приятно удивлена, с каким точечным подходом Вы уделяете внимание каждому человеку, каждой мелочи и стараетесь подсказать, помочь. Тренинг помог абсолютно по-новому взглянуть на свой гардероб.</strong> Эмоции самые приятные, незабываемые, в этом тренинге участвовала не только я, но и моя семья, смотрели на меня с недоумением и вопросом в глазах: «а что происходит с мамой?». Реакция окружающих положительная, смотрят с интересом, говорят, что как-то изменилась, что появились вещи, на которые я раньше вообще не обращала никакого внимания. И это только начало… <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1839')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1839" class="switchcontent">
<p style="text-align: justify;">.
Здравствуйте, Екатерина и вся Ваша команда! Спасибо большое за Ваше терпение, поддержку, советы, комментарии, очень была рада с Вами познакомиться.
Живу я в Германии, в г. Нюрнберге. В России работала заведующей мед.сестрой отделения. В Германии по семейным обстоятельствам я домохозяйка.
<br/><br/>
Гардероб был в основном в монохромной гамме, скучный, без ярких включений , страшновато и как-то непонятно было покупать яркую обувь, сумки и т.д., проще ведь-чёрная юбка (брюки), чёрная сумка-ко всему подходят, много комплектов были для цветотипа зима, аксессуары неброские, скучноватые. Вообще сложно было начать сочетать разные стилистические направления: романтика+спорт, кэжуал.
<br/><br/>
В последнее время не всегда была довольна отражением в витринах, зеркалах в магазинах, стала находить информацию в интернете, что-то читать, смотреть, но информация была общая, а хотелось индивидуального подхода (цветотип, какой фасон подходит, новые тенденции, базовые вещи). Результаты были, в последнее время приобрела несколько хороших вещей, была довольна, но…недостаточно, мало было информации, пока не обнаружила Ваш сайт и была приятно удивлена, с каким точечным подходом Вы уделяете внимание каждому человеку, каждой мелочи и стараетесь подсказать, помочь.
<br/><br/>
Тренинг помог абсолютно по-новому взглянуть на свой гардероб, понять эффективность базовых вещей, по-новому научиться сочетать основные вещи и дополнительные; использовать необычные цветовые сочетания в комплекте, понять кто я по цветотипу и какие цвета мне подходят, интересно было посмотреть тренинг о сумках, обуви, аксессуарах. Первое время хотелось просто избавиться от большей половины гардероба, но..успокоившись, решила, что буду постепенно вытеснять старые вещи новыми.
<br/><br/>
Получив много разной информации от Вас и с учётом комментарий, советов к моим уже имеющимся фотографиям-избавилась без сожаления от некоторой части гардероба, купила новые вещи, украшения, сумки; постепенно составляю список для шоппинга, в общем вся в предвкушении сама не знаю чего-наверное ПЕРЕМЕН!
<br/><br/>
Эмоции самые приятные, незабываемые, в этом тренинге участвовала не только я, но и моя семья, смотрели на меня с недоумением и вопросом в глазах: «а что происходит с мамой?»
<br/><br/>
В первые дни комплекты были скучные, однообразные, а ближе к концу уже повеселее.
<br/><br/>
Реакция окружающих положительная, смотрят с интересом, говорят, что как-то изменилась, что появились вещи, на которые я раньше вообще не обращала никакого внимания. И это только начало…
<br/><br/>
Хочется ещё раз просмотреть тренинги, может что-то упустила, так же хочется в перспективе всё таки попробовать сочетать женственность и спорт, а то как-то все образы строгие, серьёзные; внести в свой гардероб новые краски, вкусные сочетания; обратить достаточное внимание на аксессуары: сумки, украшения, обувь, шарфы.
<br/><br/>
Спасибо!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-tatyany-rizen-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-tatyany-rizen-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-tatyany-rizen-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-tatyany-rizen-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-tatyany-rizen.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/08/garderob-100-tatyany-rizen.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Кристина Ш., Ульм, Германия, медсестра<span></span></div>
					<p style="text-align: justify;"><strong>Наконец-то!!! Я наконец-то знаю что мне есть что надеть!! Мои эмоции - как этого я не видела до сих пор!!! и огромная радость. Мой самый главный критик- моя мама меня оценила первой:-)) и это очень приятно.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1840')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1840" class="switchcontent">
<p style="text-align: justify;">.
До тренинга у меня была проблема — огромное количество вещей , купленных по настроению,и бессмысленно лежащих в шкафу…не умение их сочетать по стилю…как пыталась решить — да просто иногда кому-то дарила или покупала еще что нибудь > результат как вы понимаете это еще большее количество вещей!
<br/><br/>
Тренинг заставил меня пересмотреть весь гардероб, многое убрала и дополнила только нужными вещами, которые сочетаются между собой…и еще стала экспериментировать с цветом и акцентами …
в результате уменьшился обьем гардероба…наконец то!!! я наконец то знаю что мне есть что надеть!!а то что просто бяк кошмар> полный гардероб и нечего надеть:-))))
<br/><br/>
Мои эмоции — как этого я не видела до сих пор!!! и огромная радость ,потому что наконец то все начинает прояснятся.
<br/><br/>
Мой самый главный критик- моя мама меня оценила первой:-)) и это очень приятно….обычно я всегда слышала> что это ты опять надела? опять в черном? хочу признать, что уж очень много черных вещей у меня было в гардеробе, при всем при том , что я по цветотипу лето….очень уж мрачненько было…а все потому что , я думала > черный же супер…он под все подходит….
<br/><br/>
Я думаю, что у меня есть еще проблемка — рост у меня небольшой 161 см…обувь конечно лучше на каблучке носить , но есть проблемы со спиной…вот поэтому прийдется перейти плавно на обувь без каблука….пока что даже не знаю ,что на низком ходу мне подойдет….чтоб было стильно и интересно и я не казалась карликом…:-))так что в ближайшее время буду много ходить по магазинам и мерять…подскажите если знаете какие марки смотреть …огромное спасибо заранее!!!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/183.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Мария А. Альметьевск, Татарстан, репетитор английского<span></span></div>
					<p style="text-align: justify;"><strong>Зависала за ноутбуком часами, комбинируя. Появился аппетит на сумки. 20 базовых вещей дают явно больше 200 комплектов.</strong> Ощущение полета и безграничных возможностей! Совсем по-другому хожу по магазинам. У меня ощущение, что я попала в приключение с однозначно счастливым концом. Очень хочется увидеть, как это воплотится в реальности. В предвкушении сюрприза от себя и жизни. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1841')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1841" class="switchcontent">
<p style="text-align: justify;">.
До тренинга не было удовлетворения своим внешним видом, походы в магазин превращались в многочасовую пытку без всяких результатов. Если с вещами было какое-то представление о желаемом, то с аксессуарами – полный провал! К тому же самостоятельно решила по книгам, что я «Осень» по цветотипу, хотя еще 1.5 года назад мне говорили, к моему немалому удивлению, что я — «Натуральная зима», что собственно, подтвердили и Ваши имиджмейкеры. Это означает, что с прежним гардеробом мне придется распрощаться.
<br/><br/>
По мере выполнения Д.З. в Поливоре пришлось окунуться в море разнообразных предложений. Относилась к Д.З. как к определенной практике наработки вкуса. Не обращала внимания на ценники, интересовала только цвет и форма. Зависала за ноутбуком часами, комбинируя. Потом поняла, что многое могу себе позволить, чему приятно удивилась. Появился аппетит на сумки. 20 базовых вещей дают явно больше 200 комплектов. Ощущение полета и безграничных возможностей!
<br/><br/>
Пока приобрела одно платье-футляр моего оттенка. Совсем по-другому хожу по магазинам. Я знаю теперь что искать по порядку и определились критерии. Сейчас конкретно ищу ботильоны со скошенным верхом и тренч. Купила синюю (!) ткань и заказала платье с запахом. Была уверена, никогда не будет у меня вещей такого оттенка, но в магазине тканей именно этот цвет среди множества других, к моему величайшему удивлению, одобрили продавцы и покупатели. Присматриваю вещи на весну-лето.
<br/><br/>
У меня ощущение, что я попала в приключение с однозначно счастливым концом. Очень хочется увидеть, как это воплотится в реальности. В предвкушении сюрприза от себя и жизни.
<br/><br/>
Комплекты еще не сложились. Разве что, платье-футляр … Фото в нем высылаю. Заодно и приличный стимул постройнеть появился.
<br/><br/>
Пока искала базовые вещи, пришлось перелопатить много источников, научилась работать в Поливоре. У меня огромное чувство удовлетворения от проделанной работы. Были дни, когда с упоением сидела по 10-12 часов за компом. За кадром осталось много других вариантов комплектов с вещами, не вошедших в базовые, но очень интересных . Интересно, что пока окончательно сформировала свои базовые вещи, многие перешли в разряд «распродано». Переслушаю лекции на предмет списка рекомендуемых магазинов и компаний, которые в значительной мере пролетели мимо ушей за картинками. И хочу просмотреть их луки, возможно, появятся новые идеи. Плюс, у Кати много практичных советов, как сделать все бюджетно.
<br/><br/>
Поскольку, мой «осенний» гардероб только начал вытесняться «зимним», мне проще прислать особо понравившиеся сеты.
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/185-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/185-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/185-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/185-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/185.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/10/185.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Eva K. аудитор, Вильнюс, Литва<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции от тренинга только положительные! Плюс появилось больше уверенности в составлении нестандартных комплектов, больше уверенности в себе.</strong> Реакция окружающий на новые образы положительная! Изменения замечают и практически каждый день говорят комплименты, хотя я еще немного идей воплотила в жизнь. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1842')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1842" class="switchcontent">
<p style="text-align: justify;">.
Основные проблемы до тренинга:<br/>
Одежду покупала интуитивно, в основном то что понравилось, не задумываясь будет ли эта вещь сочетаться с другими вещами в гардеробе. Не знала, что такое базовые и расходные вещи, в гардеробе были в основном расходные вещи, которые было трудно сочетать между собой. Часть базовых вещей которая есть в гардеробе, не подходит к моему цветотипу. Украшения не носила вообще, не знала как их сочетать, как подбирать
<br/><br/>
После тренинга:<br/>
1. Поняла, что такое базовые и расходные вещи<br/>
2. Поняла по каким правилам надо выбирать базовые вещи, чтобы гардероб был универсальный<br/>
3. Поняла какие вещи базового гардероба надо заменить, какие докупить
<br/><br/>
Купила часть базовых вещей (тренч, ожерелья, яркие лодочки на каблуке). Начала носить ожерелье и составлять, носить комплекты по советам из тренинга.
<br/><br/>
Составила план покупок базовых вещей на весну-лето и осень/зиму, отметила какие рецепты буду использовать в первую очередь, какие пока не буду (может в будущем), расставила приоритеты
<br/><br/>
Эмоции от тренинга только положительные! Плюс появилось больше уверенности в составлении нестандартных комплектов, больше уверенности в себе.
<br/><br/>
Реакция окружающих на новые образы положительная! Изменения замечают и практически каждый день говорят комплименты, хотя я еще немного идей воплотила в жизнь.
<br/><br/>
Комплектов пока немного, так как много что надо докупать
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava018.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Светлана, экономист, Одесса<span></span></div>
					<p style="text-align: justify;"><strong>Тренинг мне помог конкретно ВО ВСЕМ. Я просто другими глазами посмотрела в свой шкаф и у меня постепенно все раскладывается по полочкам.</strong> Да сплошные положительные эмоции. Теперь я точно знаю, в каком направлении двигаться. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1843')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1843" class="switchcontent">
<p style="text-align: justify;">.
Меня зовут Светлана Я живу в Одессе, мне 52 года. Я экономист. Работаю в офисе. Дресс-код у нас не строгий — ходи, в чем хочешь. Возможно вы удивитесь, но одежда на моих фото ниже, при всей скромности, это революция в моем гардеробе. И это, действительно, мой новый образ.
<br/><br/>
До тренинга я думала, что у меня не было проблем с гардеробом. Я считала, что проблема у меня только с финансами, а сама я все делаю правильно. В результате я имела разнообразный гардероб с плохо комплектующимися между собой вещами. Решала я эту проблему просто: продолжала покупать все новые и новые вещи.
<br/><br/>
У меня в шкафу комплекты, в которых я могу надеть к одному низу только один верх и часто только одну пару обуви. Есть вещи, к которым я так и не подобрала ни низ, ни верх. Много каких то непонятных вещей, которые либо очень быстро выходят из моды, либо надоедают мне самой, либо я вообще их не ношу. У меня большое количество одежды, которую я надела только один раз. Ещё оказалось, что у меня слишком много одежды черного цвета. Короче говоря, все то, о чем вы говорили.
<br/><br/>
Тренинг мне помог конкретно ВО ВСЕМ. Я поняла, что мой гардероб это вообще не гардероб, потому что в нем практически нет базовых вещей. Я, наконец, поняла, почему мне так легко покупать вещи и так трудно все это потом носить. Я поняла, что трачу неразумно много денег и не получаю адекватной отдачи. Из 20-и рассматриваемых базовых вещей я с трудом смогла наскрести у себя 7, и это с учетом клатча и ожерелья!!!!!!! Поэтому могу сказать, что тренинг очень мне помог.
<br/><br/>
Я просто другими глазами посмотрела в свой шкаф и у меня постепенно все раскладывается по полочкам. Кстати, мне очень помогли и дополнительные тренинги, особенно «20 цветовых сочетаний». Я просто прозрела от этой информации. Я вообще не представляла, что так можно сочетать цвета!!! И ещё я поняла наконец, что такое кардиган, перемеряла кучу и поняла, какие именно кардиганы идут мне.
<br/><br/>
Сделала я уже следующее: я решила приобрести все базовые вещи. Пока что купила по нескольку жакетов, белых рубашек и курток, две пары туфель на каблуке, тельняшку.
<br/><br/>
Ещё я купила несколько довольно ярких, свитшотов один из них невероятного желтого цвета — такой цвет возле лица это безусловный прорыв в моем сознании;
<br/><br/>
по другому начала носить свитер крупной вязки;
<br/><br/>
пересмотрела и переписала свой гардероб, расписала комплекты из тех вещей, которые у меня уже есть и написала список одежды, которую надо докупить.
Ещё я пересмотрела свои отношения с обувью на каблуке.
<br/><br/>
В ближайших планах у меня намечены покупки блейзера и жакета в стиле Chanel.
<br/><br/>
Эмоции? Да сплошные положительные эмоции. Я вообще люблю шмотки, а тут мысли о собственном гардеробе приобрели смысл и теоретическую базу! Теперь я точно знаю, в каком направлении двигаться, так что эмоции самые яркие, и это я ещё в самом начале пути.
<br/><br/>
Особой реакции окружающих я, вообщем то, не ждала: у меня хорошая фигура, выгляжу я моложе своего возраста, всегда старалась одеваться модно и все привыкли видеть меня такой. Да и вообще, я давно уже не задумываюсь о реакции окружающих. Но моя дочь, с которой я делилась полученной информацией и сделанными мной выводами, оценила перемены, которые произошли пусть не радикально ещё в моем гардеробе, но уже в моей голове.
<br/><br/>
Что я недостаточно проработала? Есть такой момент. Считаю свою форму ног ужасной и не ношу из за этого юбки-карандаши и платья-футляры. Но после тренинга взглянула на это по другому. Сейчас я допускаю, что могу подобрать оптимальную длину юбки и обувь для того что бы позволить себе эту одежду. Но для большого количества примерок нужно много времени, я пока его не нашла. Поставила это в планы на осень. Спасибо вам огромное за ваш профессионализм!!
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-5.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/11/garderob-100-svetlany-2-6.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava_none.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Диана С. бухгалтер, Москва<span></span></div>
					<p style="text-align: justify;"><strong>Эмоции очень хорошие. Я «загорелась», увлеклась. Любое обучение и изучение чего-то нового дает большой толчок.</strong> И с этим тренингом получилось такое же ощущение. Реакция близких и коллег самая позитивная. Часто делают комплименты. Чем вдохновляют на дальнейшее совершенствование. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('1844')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow130" align="absmiddle"/></p><br/>
<div id="sc1844" class="switchcontent">
<p style="text-align: justify;">.
До тренинга гардероб приобретался «по случаю». Чаще всего тогда, когда уже ощущалась нехватка одежды. И даже не задумывалась о том, что часть вещей бывают базовыми. Раньше просто ходила по магазинам и покупала то, что хорошо сидело. Совсем без системы и продуманности. Из-за этого часть вещей носилась хорошо и долго, а часть одевалась один-два раза.
<br/><br/>
При прохождении тренинга задумалась о составе своего гардероба, проанализировала, что у меня есть из базовых вещей. Составила список того, что надо приобрести в первую очередь. Кроме базовых вещей, с удивлением «открыла» для себя и другие предметы гардероба: свитшоты, кожаные леггинсы, различные аксессуары.
<br/><br/>
Прежде всего приобрела базовые предметы, которых у меня не было. Или заменила устаревшие. Например, тренч, кардиган, белая рубашка и т.д. Составила новые комплекты. Стала намного больше обращать внимание на картинки в журналах, в интернете.
<br/><br/>
Эмоции очень хорошие. Я «загорелась», увлеклась. Любое обучение и изучение чего-то нового дает большой толчок. И с этим тренингом получилось такое же ощущение.
<br/><br/>
Реакция близких и коллег самая позитивная. Часто делают комплименты. Чем вдохновляют на дальнейшее совершенствование.
<br/><br/>
Не все базовые вещи еще приобрела. Не продумала комплекты с жакетом в стиле Шанель, блейзером, тельняшкой и платьем с запахом. Это все в планах. Но тоже очень хочу ввести эти вещи в свой гардероб.
<br/><br/>
<center><table><tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s-3.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s-4.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s-2.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/12/garderob-100-diany-s.jpg" alt="" width="150"  data-mce-width="150" data-mce-height="155" /></a></td>
</tr>
</tbody></table></center>
</p>
</div>

				</div>
				<div class="break"></div>
			</div>









			<div class="bl_name">Отзывы участниц тренингов Екатерины Маляровой</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava1.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Вера Шеремет, г.Киев<span></span></div>
					<p style="text-align: justify;"><strong>Теперь, после тренинга, я знаю свой цветотип, могу легко определить цвета и фасоны в одежде, которые мне подходят, составлять комплекты из вещей в определенном стиле и цветовом решении, у меня есть составленная, продуманная, прочувствованная мною схема, что делать дальше со своим гардеробом.</strong> После анализа и разбора гардероба, я знаю какие вещи уже есть, а какие нужно докупить, есть список ближайших покупок и виш-лист будущих покупок.
Я выбросила почти все вещи, которые были в моем шкафу раньше. Мне новой они не подходят! Я честно посмотрела на себя сегодняшнюю, в этом возрасте, весе и т.д., и я уже не пытаюсь одеваться как 10 лет назад. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('31')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow31" align="absmiddle"/></p><br/>
<div id="sc31" class="switchcontent">
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/441327448989_92.jpg" target="_blank">
<img class="size-medium wp-image-279 alignright" style="margin: 10px;" title="441327448989_92" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/441327448989_92-130x300.jpg" alt="" width="130" height="300" align="right" /></a>Нравится нам или нет, одежда всё равно за нас говорит, и гораздо приятнее когда она говорит то, что мы думаем сами или хотим, чтобы о нас подумали окружающие. Правила многослойности, деталей, составления комплектов, мышление образом, сочетания цветов, использование достоинств и скрытие недостатков своей фигуры - это те вещи, которым я научилась. Прошло время после тренинга, а осознание по прежнему происходит и это здорово!</p><br/>

<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/281327447440_67.jpg" target="_blank">
<img class="alignleft size-medium wp-image-280" style="margin: 10px;" title="281327447440_67" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/281327447440_67-200x300.jpg" alt="" width="200" height="300" align="left" /></a>У меня очень насыщенная и разнообразная жизнь и всё чему я научилась мне помогает реализовываться, создавать образы, отвечающие моему настроению, а не чувству безысходности и необходимости надеть просто тёплое по погоде. Я получаю удовольствие от того, что ношу. Вдруг появилась такая дополнительная радость в жизни, о которой раньше и в голову мысль не приходила, и которая, на самом деле, очень естественная.</p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/451326414303_64.jpg" target="_blank">
<img class="alignright size-medium wp-image-281" style="margin: 10px;" title="451326414303_64" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/451326414303_64-300x152.jpg" alt="" width="300" height="152" align="right" /></a>Во время тренинга эмоции посещали разные. Какие-то вещи мне не давались, от понимания материала, до чисто технических моментов, как его выполнять. На первые Екатерина всегда давала ответ и излагала материал по другому, что очень ценно. Со вторыми очень помогли другие участницы тренинга, которые всегда подсказывали, что конечно очень ценно и создает удивительную атмосферу. Вообще, честно скажу, не думала, что сам тренинг принесет столько удовольствия.</p><br/>
<p style="text-align: justify;"><strong>В некотором смысле для меня тренинг не закончился, он продолжается каждый раз, когда я задумываюсь о своем образе, покупаю вещи в магазине. Он стал для меня точкой не возврата. А в нашей жизни не возврат к чему-то плохому случается редко.</strong>
Огромное спасибо Екатерине. Я обязательно буду слушать и другие тренинги.<p style="text-align: justify;">
<a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/991326673297_77.jpg" target="_blank"><img class="alignnone size-thumbnail wp-image-312" title="991326673297_77" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/991326673297_77-150x150.jpg" alt="" width="150" height="150" /></a><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/291326673124_46.jpg" target="_blank"><img class="alignnone size-thumbnail wp-image-313" title="291326673124_46" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/291326673124_46-150x150.jpg" alt="" width="150" height="150" /></a><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/951327448859_682.jpg" target="_blank"><img class="alignnone size-thumbnail wp-image-321" title="951327448859_68" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/951327448859_682-150x150.jpg" alt="" width="150" height="150" /></a><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/741326414326_87.jpg" target="_blank"><img class="alignnone size-thumbnail wp-image-309" title="741326414326_87" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/741326414326_87-150x150.jpg" alt="" width="150" height="150" /></a><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/631327448004_21.png" target="_blank"><img class="alignnone size-thumbnail wp-image-317" title="631327448004_2" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/631327448004_21-150x150.png" alt="" width="150" height="150" /></a><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/301327449509_60.jpg" target="_blank"><img class="alignnone size-thumbnail wp-image-304" title="301327449509_60" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/301327449509_60-150x150.jpg" alt="" width="150" height="150" /></a></p>
</div>

				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava2.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина Королёва, г.Москва<span></span></div>
<p style="text-align: justify;">Когда в очередной раз искала информацию о стиле, случайно наткнулась на объявление об этом тренинге. Честно говоря, такого рода услуг сейчас много, но меня зацепило обещание научить «мыслить образом». И я рада, что рискнула и поучаствовала в цикле вебинаров – совершенно новом для меня формате обучения.</p><br/>
<p style="text-align: justify;">Каждый раз я с нетерпением ждала вебинара в 21.00 по московскому времени :) Работа была очень интенсивной, и новые знания утрясаются до сих пор. Домашние задания отнимали все свободное время, но я этому рада и не променяла бы это на что-то другое. Инвестиции в себя всегда оправдываются. <strong>Спасибо Кате за то, что открыла мне глаза на некоторые вещи, задала нужное направление. </strong><span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('32')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow32" align="absmiddle"/></p><br/>
<div id="sc32" class="switchcontent">
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/91327157660_44.jpg" target="_blank">
<img class="alignright size-medium wp-image-269" style="margin: 10px;" title="91327157660_44" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/91327157660_44-300x280.jpg" alt="" width="300" height="280" align="right" /></a>Например, я упорно игнорировала некоторые виды одежды, которые меня красят, зациклившись на неэффективном решении проблемы. Если быть конкретной, то: у меня не очень ровные колени, ноги худые и поэтому популярная длина по колено меня откровенно уродует.</p><br/>

<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/141327157489_6.jpg" target="_blank">
<img class="alignleft size-medium wp-image-270" style="margin: 10px;" title="141327157489_6" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/141327157489_6-300x222.jpg" alt="" width="300" height="222" align="left" /></a>Выходом была или длина мини, в которой на фоне длинных в целом красивых ног этот недостаток не бросается в глаза; или длина на ладонь ниже колена – что я выбрала и не замечала, что этот вариант прибавляет мне лет 15 возраста и вообще я выгляжу как тетенька-учительница средних лет, а не как молодая девушка. Меня отпустила моя невротическая привязанность к стилю ретро.</p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/421326901169_36.jpg" target="_blank">
</a>Вообще, перейдя рубеж в 20 лет, я стала задумывать о более элегантном и менее молодежном стиле, но никак не могла найти эту золотую середину.<a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/421326901169_36.jpg" target="_blank"><img class="alignright  wp-image-271" style="margin: 10px;" title="421326901169_36" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/421326901169_36-272x300.jpg" alt="" width="222" height="250" align="right" /></a> И каким открытием стала для меня Катина классификация стилей и возможность выбрать себе несколько приглянувшихся – на все случаи жизни, а не пытаться найти один идеальный, такой далекий и недостижимый.</p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/851327157495_68.jpg" target="_blank">
<img class="alignleft size-medium wp-image-272" style="margin: 10px;" title="851327157495_68" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/851327157495_68-300x222.jpg" alt="" width="300" height="222" align="left" /></a><strong>Тренинг стал для меня мощным стимулом, подтолкнул к дальнейшему развитию, что самое важное – развитию в нужном направлении.</strong> А то так бы и выбирала до сих пор «учительские юбки» и не понимала, что не так, чем конкретно в своем внешнем виде я недовольна. Когда есть основа, то дополнительные знания усваиваются легче, отсеиваются ненужные, а нужные присоединяются к уже имеющимся и не создают еще больший хаос мыслей. <strong>Я наконец поставила перед собой реальные цели, поняла, каких вещей не хватает и что нужно купить, чтобы «закрыть» как можно больше комплектов.</strong></p><br/>
<p style="text-align: justify;">За этот месяц у меня было очень много удачных покупок. Также я по-прежнему провожу много времени, совершенствуя стиль и набираясь новых знаний. Теперь я знаю, в каком направлении двигаться, это не вызывает паники и желания объять необъятное. Я спокойно и целенаправленно совершенствуюсь. Спасибо!</p><p style="text-align: justify;">
<a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/861326906114_771.png" target="_blank"><img class="alignnone size-thumbnail wp-image-300" title="861326906114_77" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/861326906114_771-150x150.png" alt="" width="150" height="150" /></a></p>
				</div>
				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava3.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Галина Галышина, г.Москва,<span></span></div>
<p style="text-align: justify;">Мода увлекает меня очень давно, поэтому попасть на подобный тренинг я хотела, но как-то не получалось, поэтому когда мне пришло письмо с предложением поучаствовать в семинаре я с радостью согласилась.</p><br/>
<p style="text-align: justify;"><strong>Тренинг был интересен для меня, т.к он обобщил множество разрозненных знаний и позволил взглянуть на себя чужими глазами.</strong> Я определилась с цветотипом и удостоверилась в своих знаниях о типе фигуры, о стилях. Но <strong>самыми ценными для меня стали знания о сочетании цветов.</strong> Можно сказать, я взглянула на цвета под другим углом, никогда раньше не задумывалась о логике в комбинации цветов.<span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('33')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow33" align="absmiddle"/></p><br/>
<div id="sc33" class="switchcontent">
<p style="text-align: justify;"><strong>Тренинг помог мне избавиться от вещей, которые на самом деле не красили меня.</strong> Теперь я все чаще мыслю образом. <a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/951326906440_36.png" target="_blank"><br style="text-align: justify;" /> <img class="alignright size-medium wp-image-266" style="margin: 10px;" title="951326906440_36" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/951326906440_36-300x190.png" alt="" width="300" height="190" align="right" /></a>Теперь каждое утро я стараюсь наполнить свой день цветом – в одежде. Конечно, это оказывает определенное влияние не только на меня, но и на окружающих – больше цвета – больше позитива.</p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/231326574135_91.jpg" target="_blank">
<img class="alignleft size-medium wp-image-268" style="margin: 10px;" title="231326574135_91" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/231326574135_91-229x300.jpg" alt="" width="229" height="300" align="left" /></a>Во время последнего похода по магазинам заметила, что я не купила ни одной серой или черной вещи. Зато купила целых 3 разноцветных платья, мимо которых раньше бы прошла! <strong>Я стала внимательнее смотреть кино и журналы, на проходящих мимо людей, стараюсь подметить интересные детали в одежде окружающих. Можно сказать, что у меня появилось еще одно хобби.</strong></p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/371326906568_51.png" target="_blank">
<img class="alignright size-medium wp-image-267" style="margin: 10px;" title="371326906568_51" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/371326906568_51-300x190.png" alt="" width="300" height="190" align="right" /></a> Выполнять ДЗ порой было очень трудно, но очень интересно. Тренинг увлек меня, заставил думать, смотреть, перерабатывать огромное количество информации. <strong>Я поняла где мои сильные и слабые стороны, что нужно менять и в каком направлении мне нужно двигаться.</strong> Воспоминания от этого курса однозначно останутся самими положительными.</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava4.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Пылаева Татьяна, г.Санкт-Петербург<span></span></div>
<p>
Приветствую Вас, Екатерина! Никогда не задумывалась об искусстве красиво
одеваться. Поиски интересной работы, образование, замужества, воспитание
ребенка, заработки, а еще строительство и обустройство дома. Не до правильного
гардероба :)<br>
<br>
Давно стала замечать, что отношение людей к правильно одетому человеку более
благожелательное. Вот тут я и задумалась о гардеробе и своем виде. Сразу,
буквально через пару дней, я получила Вашу рассылку, и тут же попала на тренинг.
СУДЬБА! Огромное спасибо, Екатерина! С огромным интересом и удовольствием прошла
тренинг. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('34')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow34" align="absmiddle"/></p><br/>
<div id="sc34" class="switchcontent">
<p style="text-align: justify;">
Многому научилась, на многое посмотрела другими глазами. Руки, вернее ноги
чешутся до шопинга))) Но я не спешу. Надо многое купить. Так как большую часть
времени провожу в машине (пешком редко), в моем гардеробе нет шуб, зимних
пальто, шляп (очень люблю), да и много чего отсутствует. Только последнее время
стала покупать платья. Обычно - юбка, водолазка, брюки, джемпер, спортивные
костюмы. Раньше были гонки за заработком, дом строили, а теперь работа более
спокойная и хочется красиво, стильно и правильно одеваться. Теперь по ДЗ на
сегодня)))<br>
<br>
<b>Определила свой цветотип, тип фигуры, уяснила какая одежда (оттенки, модели,
стиль) мне подходят, скрывают и подчеркивают то, что надо. Как пользоваться
аксессуарами и что к ним относится. Размеры аксессуаров и украшений, которые мне
подходят.<br>
</b><br>
<b>Появилось желание ходить по магазинам. С новыми знаниями (другими глазами)
смотреть на вещи. На примерку беру то, на что раньше не посмотрела бы. Стала
оценивать людей, определяю цветотип, фигуру. Очень интересно)))</b><br>
<br>
<b>Для меня тренинг полностью был очень познавательный. Но самое главное это
список идеального гардероба. &quot;Вешать некуда, а носить нечего&quot; - это про меня.</b>
Как я уже писала, большую часть своих вещей я отдала. Места в гардеробе уйма,
для новых, правильных вещей.<br>
<br>
<b>Я довольна, весела, счастлива, радостна. Много всяких идей в голове.
Например: мне нравятся очки, они мне идут. Думаю их можно использовать как
аксессуар. И мысли не только о гардеробе, одежде, стилях и шопингах. Думаю о
новых начинаниях! В новом-то облике...</b> Тренинг проходила в записи. Хотелось
в он-лайн, но не жалею)))<br>
<br>
Сложно сказать. Я впервые столкнулась с таким тренингом. Мне хотелось бы
по-больше комментариев к моим домашним заданиям. Я хоть и исправляла, но
уверенности в правильности выполнения ДЗ не прибавилось. А в остальном, все
понятно. лаконично и достаточно полно.<br>
</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava5.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Кравцова Ольга, г.Омск<span></span></div>
<p>
Катя, огромное спасибо Вам за тренинг «Искусство стильно одеваться» и за идею
таких тренингов в принципе. Честно скажу, боялась принимать в нем участие.
Боялась, что потрачу деньги зря и не смогу применить данный материал на практике. К счастью, я ошиблась. Что-то я
действительно уже знала, что-то узнала из Ваших прошлых тренингов, отдельные
части которых получала в качестве бонуса. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('35')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow35" align="absmiddle"/></p><br/>
<div id="sc35" class="switchcontent">
<p style="text-align: justify;"><b>Но самое ценное, что перевернуло мое сознание – это выполнения
		домашних заданий. Именно они дали самое необходимое - закрепление
		полученного материала. Еще никогда я не погружалась в тему преображения
		своего гардероба так глубоко, так надолго и так конкретно.</b> Раньше я
		не раз самостоятельно пыталась составлять гардероб, но он по-прежнему
		оставался безликим, потому, что я все делала хаотично, не зная правил и
		простых формул. Теперь все встало на свои места.
		</p><br>
		<p>Несколько не сложных правил и немного практики и ты уже никогда не
		будешь серой мышкой. <b>Ведь теперь я знаю, как мыслить образом, как
		вкусно сочетать цвета и как собрать законченный образ. Я получила
		огромное удовольствие от общения с Вами и участницами тренинга.</b> Как
		хорошо, что мы живем в 21 веке и нам доступно обучение on-line. Я
		никогда не смогла бы приехать на такой тренинг в Москву. Катя, мне было
		очень приятно слушать Вас, учиться с Вами, понравилось структурированное
		изложение материала.
		</p><br>
		<p><b>Конечно, очень не хватало проверки ДЗ, сейчас жалею, что не купила
		пакет с их проверкой. Поддерживаю идею продолжения этого семинара и идею
		встретиться на вашем сайте в форуме с одноименной тренингу темой.</b> И
		присоединяюсь к пожеланиям Барселоны по поводу технических моментов.
		Буду с нетерпение ждать новых виртуальных встреч с Вами! Желаю Вам
		творческого вдохновения. Ведь благодаря Вашей работе в мире с каждым
		днем становится на одну женщину краше и счастливее.<br>
		<br>
</p>

</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava20.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Анна Тимина, г.Самара<span></span></div>
<p style="text-align: justify;">На тренинг я попала неслучайно – давно читаю рассылку Екатерины и интересуюсь работой над собственным стилем. Но основным мотивом стало желание моего мужчины видеть меня более яркой и жизнерадостной. Прослушав несколько ее тренингов, я подумала, что мне такой учитель подходит – все понятно даже о сложных вещах, и работа над тренингом обещала решение моих задач.</p><br/>
<p style="text-align: justify;">Сомнение было только одно – взять пакет с проверкой домашних заданий или нет. Решила, что на инвестициях в себя точно не следует экономить и взяла полный пакет. В результате – более продуктивное прохождение тренинга, ибо дьявол, как и бог – в деталях, профессиональный взгляд Екатерины дает более глубокое понимание себя, своей природы и вещей, которые более мне соответствуют. Что было узнано, я старалась применять на собственном имидже. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('50')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow50" align="absmiddle"/></p><br/>
<div id="sc50" class="switchcontent">
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/201327394334_53.jpg" target="_blank">
<img class="alignright size-medium wp-image-274" style="margin: 10px;" title="201327394334_53" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/201327394334_53-300x225.jpg" alt="" width="300" height="225" align="right" /></a>После разбора своего гардероба у меня осталось 25% вещей – это был для меня шок, остальные откровенно требовали замены (не поднимались руки на любимые платья) или были не мои (или цвет, или крой, или длина, или все вместе взятое…), также ушли вещи «надеюсь, я похудею...». Я поняла, что, к сожалению, парой кофточек на новый сезон дело не обойдется, однако стало легко выбирать свои вещи – за 4 часа в одном торговом центре я собрала практически всю основу весенне-летнего гардероба из интересных вещей с удачными для меня цветовыми сочетаниями.</p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/241327394310_25.jpg" target="_blank">
<img class="alignleft size-medium wp-image-275" style="margin: 10px;" title="241327394310_25" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/241327394310_25-300x225.jpg" alt="" width="300" height="225" align="left" /></a><strong>При покупках я теперь не боюсь обращаться к продавцам, и они могут действительно подсказать новые идеи для моего гардероба.</strong> И всего 2 принципа (многослойность и детали) сотворили чудеса с моим шкафом. Во время тренинга основной эмоцией были интерес и досада на то, что в сутках всего 24 часа – не успеваешь проработать достаточно тему, как на нее наслаивается еще одна. Сначала это немного тревожило меня, для меня ритм тренинга был похож на достаточно жесткий интенсив – информация выдавалась огромными порциями.</p><br/>
<p style="text-align: justify;"><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/561327397604_91.jpg" target="_blank">
<img class="alignright size-medium wp-image-276" style="margin: 10px;" title="561327397604_91" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/561327397604_91-300x225.jpg" alt="" width="300" height="225" align="right" /></a>Но удивительно – многое укладывалось в голове тут же, остальные детали замечаешь при повторном прослушивании (что тоже, кстати, удобно, в любой момент можно еще раз пройтись по слабо усвоенным или трудным на практике вещам). Еще для меня было полезно просматривать домашние задания других участниц – очень помогает как новый взгляд на вещи и работа над типичными ошибками. В итоге <strong>при прохождении всех тем это слилось в единое понимание построения комплектов с учетом всех моих особенностей (цветотипа, роста, фигуры, проблемных зон, образа жизни).</strong></p><br/>
<p style="text-align: justify;"><strong>Могу сказать, что работа над тренингом дала поэтапный разбор своего текущего стиля и построение нового, который соответствует ритму жизни и поставленным задачам.</strong> Спасибо Екатерине!</p><p style="text-align: justify;">
<a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/931327394320_91.jpg" target="_blank"><img class="alignnone size-thumbnail wp-image-301" title="931327394320_9" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2012/02/931327394320_91-150x150.jpg" alt="" width="150" height="150" /></a></p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava6.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Эльвира, г.Тверь<span></span></div>
<p>
Екатерина, добрый день!<span lang="en-us"> </span>Хочу поделиться своими
впечатлениями от пройденного тренинга!<span lang="en-us"> <br>
<br>
</span>Во-первых, спасибо за чётко структурированную подачу материала! <b>Я
прошла очень много всевозможных тренингов, и хочу отметить, что в единицу
времени представлено максимум информации! Всё очень чётко, лаконично, без лишней
«воды»,с хорошей разговорной скоростью и поставленной речью!</b> (некоторых
спикеров просто невозможно слушать, а слова паразиты, размазанность и
растянутость речи делают повторное прослушивание просто невообразимо
дискомфортным!!)<br>
<br>
Во-вторых,<b>масса интереснейших фишек! Например,я бы никогда сама не догадалась
дома расчертить свою фигуру! </b> <br><br>
В-третьих, ну никак не думала, что в теме с одеждой может быть столько
неосознанного, не опознанного, интересного и одновременного сложного! Для меня
вопрос цветосочетания настолько оказался сложным, что д/з до сих пор в проекте!
Вроде всё понятно на словах, а как до дела, так не знаешь что к чему приладить! <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('36')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow36" align="absmiddle"/></p><br/>
<div id="sc36" class="switchcontent">
<p style="text-align: justify;">
В-четвёртых, в условиях рабочего графика и загруженности, лично меня, сначала
очень напрягали домашние задания, т.к. я не супер пользователь компьютера и это
отнимало колоссальное количество времени, то выполнить технически ДЗ для меня
составляет огромный труд, НО!! тут появляется положительный побочный эффект!!-
чтобы сделать ДЗ, надо сначала освоить хоть какой-то минимум в программах!
Теперь и ДЗ сделала и в программах стала разбираться значительно увереннее :)).
Отдельной спасибо девчёнкам, что откликнулись и помогли советами по работе с
сайтом и др. моментами тренинга.<br>
<br>
В-пятых, я никогда не уделяла своей персоне столько времени! <b>Я теперь поняла,
почему мой шопинг был для меня равен стрессу, как после ядерной войны!!!</b>
После каждого похода по магазинам меня туда не затянуть ещё минимум как пол
года! Для кого-то это может и показаться странным, но у меня весь процесс
покупок сводился к негативу! Я не знала зачем туда идти. Что-то надо одевать на
работу, праздник и т.д., только что? Кроме своего размера, я больше о себе
ничего не знала! <br>
<br>
Вот захожу в магазин с вещами и ничего не вижу! Прошу продавца помочь подобрать
что-нибудь, на все примеряемые варианты поддакивают, что мне это отлично
подходит, а я то вижу, что мне не идёт! И вот доходим до вещи, с которой я под
сомнением! Всё таки я её покупаю (нередко, из-за приченённого неудобства
продавцу, как глупо это не звучало), примеряю эту вещь дома, НЕ НРАВИТСЯ!!!<span lang="en-us"> </span>
и несу сдавать назад, с кучей неприятных разговоров, оправданий и
бюрократических процедур! Результат : ни нового гардероба, ни времени, ни
удовольствия! <br>
<br>
Спасибо Вам, Катя, глаза раскрыли! вы мне рассказали, что оказывается юбки и
брюки не только черного цвета бывают! И что продавцы-слуги, нам в помощь даны, а
не враги народа! И что <b>от покупок всё таки можно испытывать удовольствие!
Впервые я испытала удовольствие от магазинов, кода прошлась по ним во время
тренинга!</b> Оказывается действительно можно найти массу интересных сочетаний и
вариантов, вот только жаль, что раньше я их не замечала, давно ходила бы как
принцесса! <b><br>
<br>
Всегда искренне завидовала тем, у кого есть вкус и талант красиво одеваться!
Теперь у меня тоже такой зарождается и за это спасибо Катя Вам!!! :) </b>А ещё с
Вами я раскрыла для себя массу новых объектов гардероба, про которые до этого и
слыхом не слыхивала, а самое главное, что мне захотелось такие иметь и носить! В
общем <b>я стала другой в своём образе &quot;стильной и ни на кого не похожей&quot;(пока
ничего ещё не купила, но уже присмотрела в конкретных магазинах, конкретные
вещи).<br>
</b><br>
В рамках данного тренинга мне бы хотелось, что бы также присутствовали
дополнительные мастера разных профессий, только, что бы то что они хотят донести
и поведать было также структурировано, как и Ваш материал.<br>
<br>
Ещё, я хотела бы получать ссылки на каждый каст по почте ежедневно, иногда очень
не удобно в ворохе писем искать нужное! Мне бы хотелось, что бы было ещё больше
картинок! Я визуалист, поэтому мой мозг начинает разрабатывать свои идеи после
более массивной атаки образами (как бы визуальная практика). Больше пожеланий
никаких, лучшее враг хорошего! Мне всё очень и очень понравилась, а группа у нас
была сама лучшая, все девчёнки просто молодцы! У меня самые приятные
впечатления! Спасибо Вам Катя за проведенное вместе время!
</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava7.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Юлия Яковенко, г.Севастополь<span></span></div>
<p>
Большое спасибо, Катя, за тренинг. <br>
1. Я всегда любила хорошо одеваться, но, оказывается, не знала элементарных
правил, а лезть в Интернет и искать какие-то сведения в этом плане мне никогда в
голову не приходило. И о тренинге я узнала, получая рассылку по совсем другому
поводу. <br>
В результате <b>я получила не только очень полезные знания, но и желание совсем
по-другому взглянуть и на то, что есть в гардеробе, и уж конечно на будущий
шопинг.<br>
</b><br>
Конечно, затруднения вызывали ДЗ, особенно те, что предполагали работу с
программами. И выполнила я их пока не все. Тем не менее, жалею, что пакет у меня
был без проверки ДЗ, так как я чуть ли не вдвое старше большинства участниц, и
вопрос: «по возрасту ли мне это», - возникал у меня довольно часто. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('37')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow37" align="absmiddle"/></p><br/>
<div id="sc37" class="switchcontent">
<p style="text-align: justify;">
2. Не знаю, «потянет» ли это на изменения в жизни, но совет составлять список на
шопинг, продумывать образ и пр. – это как-то дисциплинирует и «собирает мозги».
То есть меняет подход к каким-то своим действиям. Впредь буду стараться
поступать именно таким образом. <br>
<br>
3. Полезное и ценное: если конкретно, то <b>определение цветотипа, стилей,
сочетаний цветов; дошло, что такое мыслить образом и т.д. Не было ни одного
занятия, которое в этом плане меня разочаровало.<br>
</b><br>
4. Эмоции очень приятные: <b>профессиональный тренер, правильное и интересное
изложение материала (как бывший преподаватель говорю), хорошая атмосфера на
вебинарах, доброжелательные участницы, – каждой встречи ждала с удовольствием,
перечитываю домашние задания девочек. Приятны добрые слова и советы в свой адрес
от коллег по вебинару. <br>
</b> <br>
5. По поводу улучшить: присоединюсь к большинству высказанных выше пожеланий.
Добавить хочу вот что: так как среди участниц попадаются люди возрастные,
хотелось бы слышать некоторые уточнения, по брендам, например, или по качеству
аксессуаров. Т.е. понятно, что должно быть более статусно, а конкретнее? Носить
ли бижутерию, к примеру, и если да, то какого уровня? Стильные и интересные
комплекты носить хочется, но не хочется выглядеть «молодящейся».<br>
<br>
Пусть это будет не проверка ДЗ, но если есть вопрос по ходу его выполнения, то
каких-то пару слов, как обратная связь.  <br>
В общем, я получила большое удовольствие от проведенного в таком совместном
обучении времени, получила подтверждение, что стильный образ – это творчество,
шопинг – это не стыдно и не пустая трата времени, а поэтому у меня впереди много
интересных и приятных минут. Правда живу я в небольшом городе, и товары в
основном для молодежи или невысокого уровня. Но было бы желание! А оно у меня
есть.<br>
<br>
Желаю всем успехов в создании своего имиджа и позитивных изменений в жизни.<br>
Желаю дальнейших успехов Кате в таком благородном деле – делать людей красивее,
увереннее в себе, счастливее. <br>
Буду рада встретиться со всеми на форуме, если такая возможность появится.
</p>

</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava8.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Полякова Фаина, г.Краснодар<span></span></div>
<p>
Добрый день всем!<br>
Екатерина, тренинг был для меня крайне полезным и сдвинул таки меня с нулевой
точке, в которой я оказалась. <br><br>
1. Я получила очень много информации четко структурированной: определила свой
цветотип (ранее не думала, что это так уж существенно), поняла принципы
составления комплектов, была приятно удивлена многим моментам, которые слышала
впервые, как не прискорбно… - про базовые вещи, про «Мыслить образом, а не
шмоткой», про то, что «не делать покупки на эмоциях – покупать вещь, когда есть
3-4 варианта с чем ее носить», «интересный образ делает многослойность и
деталировка». <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('38')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow38" align="absmiddle"/></p><br/>
<div id="sc38" class="switchcontent">
<p style="text-align: justify;">
2. <b>Я всегда подбирала себе одежду интуитивно и считаю, что вкус есть, но
последнее время как то выпала из активной жизни и уже не успевала за
тенденциями, было ощущение дезориентации, которое теперь растворилось. Я
понимаю, что многое еще нужно усвоить, знаю, что надо практиковаться, учитывая
полученные знания, но теперь я не теряюсь в магазинах, я пробую собирать образы
и теперь я уже не куплю отдельную вещь, не известно к чему.</b> Я всегда
обращала внимание на то, как люди одеты, но раньше это ограничивалось
нравится\не нравится, а теперь я «разбираю» комплекты на составляющие и могу
пофантазировать что можно заменить, добавить, или убрать лишнее, заинтересованно
определяю цветотип. Сейчас понимаю на сколько обогатилась и чем ранее была
обделена. <br><br>
3. <b>Ценной была все информация, которую вы и ваши гости нам щедро подарили - было
много открытий, общение на форуме с такими же, ищущими свой образ, девушками, и
ПОНИМАНИЕ ВОЗМОЖНОСТИ ПОСТИЧЬ И ВОПЛОТИТЬ В ЖИЗНЬ все полученное, что бы
радоваться своему отражению ежедневно! <br>
</b> <br>
4. <b>Я потрясена сией наукой – стильно одеваться не просто, но теперь и не пугающе
сложно, путь намечен, показаны ориентиры и я довольно смело иду вперед! Тренинг
был очень емкий, интересный, насыщенный!</b> Катя, я заражалась от вас энергией
и радостью, я запомнила ваши перлы и каждый день тренинга хотелось продлить еще
и еще. вы отлично подаете информацию, все доходчиво, просто, ясно и, безусловно,
чувствуется ваш высокий профессиональный уровень! Мне очень импонирует ваша
дружественность, доброта и даже ваша требовательность к домашним заданиям,
выполнять которые крайне важно, тогда материал закрепляется еще лучше! <br>
Немного жаль, что мой пакет не подразумевает проверку ДЗ, хочется получить
комментарии, но с другой стороны на некоторые я все же получила ответы, спасибо.
<br>
<br>
5. Хотелось бы некоторую структуру по ДЗ, иногда мы «теряли время» на
обсуждении ДЗ во время урока, поскольку они индивидуальны. И была некоторая
скомканность с приглашенными специалистами, много времени уходило на поиск фото
и обсуждение личного образа.<br>
<br>
<b>Дополнительно поясняла, для ясности.</b><br>
Мне думается было бы хорошо:<br>
1. Комментировать ДЗ письменно (не в эфире! Дабы не тратить дважды время на
индивидуальную работу). Исключение составляют доп. вопросы полезные другим тоже.<br>
<br>
2. Приглашенный гость заранее получает необходимый материал об участницах
(например, фото) и тогда может оперативно отвечать на личные вопросы (можно
участниц объединить в группы, например по цветотипам, или типу лица)<br>
<br>
3. Присланный материал должен соответствовать последовательности в записи. (В ДЗ
7, который я смогла слушать только в записи, картинки были по не порядку и не
все, например не было картинки «миндалевидные глаза», приходилось все время
останавливать запись, что бы найти соответствующую картинку)<br>
<br>
4. Предложить альтернативную (простую) программу для выполнения задания по
цветам. (та что была предложена вами сложновата и требует не только
определенного пользовательского уровня, но еще знание языка и установленных
программ на пк. (не одолела ее не только я, и время затраченное на изучение и
тех.возможности было огромным, хотелось бы его потратить на закрепление
материала. Я справлялась подручными средствами, а в дальнейших уроках прочла у
девчонок о простом Paint… жаль сама не додумалась… облегчила бы себе жизнь)<br>
<br>
5. Комментировать ДЗ по основным вопросам всем участницам (без спец. пакета хотя
бы коротко), чтобы понимать «правильной ли дорогой иду товарищи?» <br>
<br>
6. Технически сделать общение в ДЗ каждого дня удобнее, сначала текст, потом
картинки - не удобно, я описывала какие картинки к чему, и добавить ничего не
возможно, только в конец очереди и тогда поди разберись, где что и где кто…<br>
<br>
7. Возможность учитывать доп.вопросы от участниц на повестке след. дня,
например. Я не всегда успевала задать все интересующие вопросы во время урока,
или они оставались незамеченными на форуме. Можно просто отправлять вам
Екатерина, а вы бы важные, повторяющиеся собирали и отвечали на след.уроке.<br>
<br>
8. Подкреплять текстовыми материалами каждый из учебных дней. Например, 5, 8, 10
(не полностью) дни не имеют текстового материала, есть только картинки. Сейчас я
пытаюсь, например, стилевые направления перевести самостоятельно в текст, для
наглядности, далеко не всегда имея возможность прослушать запись. <br>
<br>
9. «Пролонгированный контроль» можно индивидуально, а лучше на форуме сайта.
Меня бы точно тонизировало ожидание\предвкушение проверки закрепленного
материала через какое то время – 3-6 мес..<br>
<br>
10. Сделать и вести тему на форуме сайта для тех, кто прошел тренинг на тему
«сложности» или чат раз в месяц про то, что все же не получается. Это позволит
выявить трудные места и возможно обращать на это больше внимание в будущих
тренингах.         <br>
<br>
Катя, спасибо вам огромное за опыт общения за информацию и за гостей. Буду
переслушивать записи с удовольствием и радостью! Успехов вам!<br>
<br>
Очень не хочется расставаться. Девчонки всем удачи и до встреч у Кати!
</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava9.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ирина Гуменко, Украина<span></span></div>
<p>
Добрый  день, Екатерина!! Я уже писала небольшой отзыв, но решила написать еще раз
вам благодарность и результат вашей работы. На данный момент, я снова прослушала
ваш курс, и это уже, конечно, было &quot;другими глазами&quot; вы знаете, я так многому
научилась...
<br>
<br>
Я девушка рациональная и у меня ко всему подход такой-же, но с гардеробом у меня
как то не складывалось....и спасибо вам за ваш тренинг, после которого я не
только научилась создавать свой рациональный гардероб но и многому, многому
другому....
<span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('39')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow39" align="absmiddle"/></p><br/>
<div id="sc39" class="switchcontent">
<p style="text-align: justify;">
Во-первых <strong>мне очень понравился ваш девиз, что цель - не шмотка, и полная
инструкция как достигнуть того, чтобы вещи которые мы покупали мы -носили с
удовольствием -любили эти вещи -не делали эмоциональных ненужных покупок -не
тратили кучу денег -покупали то что нам идет -покупали то,в чем будем выглядеть
интересно, вкусно и стильно<span lang="en-us">..</span></strong>
<br>
<br>До вашего тренинга, шопинг - был не самым любимым моим занятием, я была в
постоянном терзании, может это купить, а может мне идет другое и в итоге ты
выходишь без ничего или покупаешь то, что потом не носишь...
<strong>А теперь....я это делаю с удовольствием....потому, что знаю все секреты
«успешного шопинга»!!!! Спасибо вам огромное, Екатерина!!! вы настоящий
профессионал!!!</strong>
</p>

</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava10.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Екатерина Кусакина, г.Ярославль<span></span></div>
<p>
Всю жизнь я мечтаю выглядеть не только красиво, но и стильно. И теперь я
уверена, что с Вашей помощью я смогу осуществить свою мечту. Я прослушала Ваш
тренинг «Искусство стильно одеваться». Для меня этот тренинг оказался очень
познавательным. Раньше я вообще не задумывалась, что существуют стили и
направления в одежде, я считала, что стили связаны с миром моды. <b>Этот тренинг
стал для меня базовой ступенькой для понимания «стильно одеваться»</b>.
<span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('40')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow40" align="absmiddle"/></p><br/>
<div id="sc40" class="switchcontent">
<p style="text-align: justify;">
<b>Я стала понимать, как сочетать цвета и какие цвета мне подходят. Очень
впечатлило, что для создания комплекта нужно знать всего лишь несколько основных
правил. Очень полезно было узнать пропорции в одежде, которые подходят именно
мне, как выбирать аксессуары.<br>
После Вашего тренинга появилось очень много идей! ) Я получила море позитива!<br>
</b><br>
Я стала обращать внимание как одеваются люди на улицах, в кино. Иногда пытаюсь
понять, что мне нравится в их одежде, а что нет, что бы я добавила. Я стала
пытаться не просто одеваться, а собирать комплекты из вещей своего гардероба,
что раньше бы мне и в голову не пришло. И я очень довольна этим!<br>
<br>
Единственное, что для меня было очень сложно - обилие информации за небольшой
период времени. Хотя это наверное даже плюс. После того как тренинг закончился
буду в удобном для меня темпе прослушивать тренинг и учится, учится и ещё раз
учится. )))<br>
<br>
Екатерина, большое Вам спасибо за тренинг! С удовольствием буду и дальше
принимать участие в них.<br>
<br>
PS: напишу свое мнение по поводу необходимости на тренингах стилиста и
визажиста. На мой взгляд эти встречи были не лишними. Но мне кажется что это
очень индивидуально. Я не хотела бы коллективных занятий, все равно они сводятся
к обсуждению каждого человека в отдельности. <br>
<br>
Мне кажется. что можно в рамках
тренинга каждому участнику например задавать вопросы в письменном виде или
общаться по почте. Тем более что даже сами профессионалы сказали на тренинге,
что нужно видеть человека воочию. Но, все равно Екатерина, Вам огромное спасибо
за такие ценные контакты.</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava11.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Костина, г. Челябинск<span></span></div>
<p>
Хотелось бы сказать огромное спасибо Екатерине за проведенный тренинг. Когда читала информацию о нем, зацепила фраза: «Учтите, это будет «точкой невозврата». Для меня этот тренинг именно тем и стал.
<br /><br />

Это было удивительно для меня, потому что я давно увлекаюсь стилем и имиджем, <strong>прочитала массу литературы и не ждала так много получить</strong>. Екатерина расставила акценты, все выстроила в стройную систему. Всегда чувствуется, когда человек в материале плавает, а когда он пропустил его через себя, опробовал на практике и понимает все, вплоть до деталей. Так вот Екатерина в имидже и стиле как рыба в воде. А еще она отлично выглядит. У таких как она, хочется учится. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('41')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow41" align="absmiddle"/></p><br/>
<div id="sc41" class="switchcontent">
<p style="text-align: justify;">

Добавлю еще один плюс, очень большой. Нас было много, почти 40 человек, Екатерина находила время на каждого, очень много работы личной, работы над ошибками.
<br /><br />

Самым главным результатом для меня был взгляд на меня со стороны и огромный пласт хорошо изложенного, интересного материала.
<br /><br />

<strong>В конце тренинга я получила то, что обещали:<br /><br />
1. понимание, каким я хочу видеть себя и свой гардероб<br /><br />
2. как гардероб должен на меня работать<br /><br />
3. что мой гардероб представляет сейчас<br /><br />
4. почему мне нечего часто носить<br /><br />
5. четкий план, куда идти и что делать.</strong>
<br /><br />

Я надеюсь, что у меня хватит сил, целеустремленности доделать все до конца и применить все, что хотела в нас в вложить Екатерина.
<br /><br />

Спасибо Вам, Екатерина, что так внимательно, правдиво, с интересом отнеслись к каждой из нас. <strong>Для меня этот тренинг стал уже "точкой невозврата".</strong> Впереди меня ждет красивое будущее!</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava12.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Марина<span></span></div>
<p>
Мне всегда было не безразлично как я выгляжу.<br /> Я отношу себя к людям, которые следят за современными тенденциями, но не в коем случае не являются жертвами моды. Мне все время хотелось иметь свой неповторимый стиль. А как не потеряться среди такого разнообразия стилей, направлений, цветов и тенденций? Для меня это и оставалось всегда непостижимой задачей. Быть модной, но оставаться верной себе и своему неповторимому стилю. Вот за этим я и пришла на этот тренинг. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('42')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow42" align="absmiddle"/></p><br/>
<div id="sc42" class="switchcontent">
<p style="text-align: justify;">
 <strong>Я получила колоссальный опыт на семинаре! Никогда раньше я и представить не могла, что искусство отлично выглядеть подчинено рациональным правилам!<br /></strong> Что процесс выбора образа, подбора гардероба и процесс самого шопинга может принести столько удовольствия, а не только метаний, разочарований и, только в редких случаях, удовлетворений от покупок.
<br />
 <br />Екатерина научила мыслить не отдельными вещеми, как то юбки, брюки, свитера. <strong>Она научила мыслить образами</strong>, посмотреть на себя с другой стороны, под другим углом. Она дала понять нам, что мы все разные, но все имеем право достойно выглядеть, достойно себя подавать и подчеркивать то прекрасное, чем нас одарила природа!
 <br />
 <br /><strong>Она научила нас как грамотно подчеркнуть свои достоинства, как правильно выбирать вещи, и самое главное, как их правильно компоновать</strong>. Она научила правильно подбирать "свои" цвета и видеть "цвет", а не только черно-бело-серую гамму.
<br />
<br />Хочу отметить отличную эмоциональная атмосферу на семинаре! Все было сделано очень профессионально и четко. Хочу особенно отметить ту чуткость и терпеливость, которую проявляла Екатерина к участникам тренинга! Та деликатность и та заинтересованность в каждом участнике семинара, я считаю, заслуживает большого уважения! Также хочется отметить отличный уровень Вашего образования, эрудированности, умение общаться с людьми и деликатность в таком "деликатном" деле)
<br /><br />

Я еще раз хочу поблагодарить Екатерину и всех участников тренинга за прекрасно проведенное время и полученные знания. Всем большое спасибо.
</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava13.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ольга Розанова 32 года , г. Москва <span></span></div>
<p>
Честно могу сказать, что огромные! Я уже занималась со стилистом, была на шопинге, но все как-то закончилось чистым теоретизированием и, к сожалению, был подобран комплект, не соответствующий цветотипу.<br />
<br /><strong>На тренинге у Екатерины мы определили мой цветотип, наконец-то сориентировалась в стилях одежды, узнала о принципах базового гардероба, подбора украшений и аксессуаров лично для меня, потому что было много практических заданий, которые Катя тщательно проверяла и комментировала. Была возможность наблюдать за работой других участниц семинара – учиться.</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('43')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow43" align="absmiddle"/></p><br/>
<div id="sc43" class="switchcontent">
<p style="text-align: justify;">Методом проб и ошибок, продираясь через свою лень и некоторое невежество в вопросах подбора одежда, я поняла наконец, как мне сформировать свой гардероб, с учетом цвета, подходящих фасонов, используя грамотную компоновку элементов и деталей. В магазин теперь идти хочется и не страшно… Я вижу себя и, думаю, что начала понимать.
<br />
<br /><strong>Появилось вдохновение, положительный настрой. Для меня посещение магазинов было каторгой. А теперь есть интерес.</strong> Интересно смотреть на вещи, применяя к ним новые знания, и конечно мерить. Захотелось эстетически насытить жизнь – выставки, красивое французское и итальянское кино, путешествовать захотелось!
Во мне проснулась такая созидательная энергия… Это очень побуждает к действиям.
<br />
<br />Огромное отличие семинара Екатерины в том, что много теоретической информации, которая структурировано, последовательно подается дозированно каждый день! Много практических заданий, которые ВСЕ разбираются и комментируются Екатериной.
Катя не оставила без внимания ни одной участницы, пока не дошла до сути, пока не был получен ответ на поставленный вопрос. Формат семинара позволил участвовать очень разным людям из разных городов, а значит можно было увидеть важные для тебя вопросы, о которых даже не задумывалась.
Еще раз повторю, что <strong>очень много практики и она безусловно полезна. Даже не предполагала, что интернет-семинар, может пройти так продуктивно</strong>.<br />
<br />
<br />Эмоции самые положительные!
<br />Во-первых, благодаря Кате. В период обучения и завязывания новых знакомств, наверное, каждому человеку не хочется выглядеть глупо и некрасиво. О! У меня было много таких возможностей). И мне ни разу на семинаре не довелось этого почувствовать!!! Катя настолько корректно, терпеливо, без доли профессионального превосходства объясняла раз за разом казалось бы уже понятные вещи. И вообще приятно работать с образованным интеллигентным человеком!
<br />А девочки-участницы помогали преодолеть какие-то свои комплексы, у многих, между прочим надуманные!!! Благодаря им, я получила тоже уйму полезной информации.
<br /><br />
Я бы советовала посетить этот тренинг, только обязательно надо быть уверенной, что тебе это нужно, необходимо выделить на это время, не лениться выполнять задания Кати, и тогда точно будет результат!!! Филонить тут не удастся.
<br />Я а бы с удовольствием еще поработала с Екатериной.
<br />С уважением и пожеланием успехов, Ольга.</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava14.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Наталья Тигра (Чернова), Италия Милан<span></span></div>
<p>
<strong>Недельный тренинг с Екатериной это то, что девушки должны пройти, если они хотят действительно изменить имидж или стиль в одежде, или в жизни (это тоже возможно).<br /></strong>
<br />
После тренинга, нет, вру, во время тренинга, я увидела свой гардероб совсем другими глазами и тут возник вопрос «как я это могла раньше носить?», в моём гардеробе было много «не моих цветов», много черного-серого-белого, не моих фасонов, и, как и у многих девушек, была проблема «Нечего надеть!!!»))), Теперь я понимаю, почему при таком количестве вещей мне нечего было надеть! Я поняла, что для рационального гардероба совсем нет необходимости иметь шкаф, забитый вещами, <strong>достаточно знать, что и как надо покупать, на чем можно сэкономить и как скомбинировать вещи так, чтобы ты выглядела на все сто (или тысячу?))</strong>. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('44')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow44" align="absmiddle"/></p><br/>
<div id="sc44" class="switchcontent">
<p style="text-align: justify;">
Я решила изменить свой гардероб, я уже вижу и чувствую себя по-другому, когда я смотрю на себя в зеркало, помня обо всем, что говорила Екатерина, я могу проработать все детали (что, кстати, занимает не больше времени, чем я тратила на это до тренинга) и могу выйти из дома с уверенностью, что я выгляжу прекрасно, что люди могут видеть меня, а не только мое платье, например. Я чувствую себя по-другому, я чувствую себя так, как хотела чувствовать всегда: женственной, уверенной, привлекательной, легкой, яркой, весёлой, смелой!
<br /><br />
<br /><strong>На тренинге было много полезной и нужной информации, которую невозможно так просто найти в интернете, для того чтобы получить хотя бы 20% того, что было сказано надо прорыть горы книг и веб-сайтов и выделить из них самое главное, а это, как мы все понимаем очень непросто.</strong> Но это не всегда самое важное, там я нашла своих «коллег», друзей по несчастью или вернее счастью быть на тренинге, общаясь и помогая друг другу мы стали небольшой командой,) приятно заходить и знать, что тут ты найдешь понимание, взгляд со стороны, поддержку и помощь, причем людей, которые теперь, так же как и ты знают секреты рационального гардероба!</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava15.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Ройтенко Евгения, Санкт-Петербург<span></span></div>
<p>
<strong>Научилась правилам составления гардероба и способам коррекции фигуры, почерпнула много полезных нюансов, увидела по-другому состояние своего гардероба – как много в нем было лишнего и бесполезного, зато лишние были подарены:)<br /></strong>
Вздохнула с облегчением, такая обуза с плеч! Потому что появился четкий алгоритм действий по составлению гардероба. <br /><strong>Я люблю, чтобы все было четко и по правилам, а в этой области была как в тумане.<br /></strong> Еще с мужской стороной разобраться и все будет в шоколаде:) <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('45')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow45" align="absmiddle"/></p><br/>
<div id="sc45" class="switchcontent">
<p style="text-align: justify;">брендах и магазинах. Это очень ценно, потому что до этого я была захожанином в одни магазины и прохожанином в других, а они, оказывается, были очень даже хорошие и полезные, так что теперь не страшно:)
<br />
<br />Впечатления очень хорошие, была подписчицей у вас не первый год, а результата видимого не было, а здесь все прошло так гладко и весело.<br /> У вас чудный голос, моему сынишке тоже очень понравился, понравился ваш ответственный подход к работе, спасибо большое за ваши советы:) их было очень много. И ваш стиль общения, и продуманность с выставляемыми материалами тоже очень понравились. Жду продолжения:)

</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava16.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Екатерина Туринская, г.Новосибирск<span></span></div>
<p>
1. <strong>Поняла, что покупка вещей и составление комплектов на шопинг это практически тоже самое, что сходить в магазин за продуктами:<br /></strong>
«Также нужно посмотреть, что у тебя нет на кухне, составить список продуктов, твои вкусовые предпочтения, и прикинуть, что из них ты можешь приготовить, используя каждый продукт не в одном блюде, и подать на стол предварительно украсив».<br />
<br />2. Разобрала свой гардероб на сезон Осень-Зима. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('46')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow46" align="absmiddle"/></p><br/>
<div id="sc46" class="switchcontent">
<p style="text-align: justify;">3. <strong>Получила базу, основу для дальнейшей работой над собой, раскрытия себя изнутри. Теперь осталось только практиковаться, практиковаться, и еще раз практиковаться.</strong><br />
<br />4. Думаю, что теперь смогу попробовать более яркие сочетания цветов, и в принципе цветовую гамму гардероба.<br />
<br />
Главное и, наверное, единственное: <br /><strong>Я перестала бояться магазинов!<br /></strong> Я взглянула на них как то с другой стороны. Давно мечтала выбросить все старое из гардероба
<br /><br />
<strong>Самое ценное – это открыли глаза, что кроме черного и типичного серого, есть еще масса цветов и оттенков для базового гардероба. Разрушены стереотипы по цветам типа сумка+обувь или зимние вещи должны быть преимущественно черными.<br /></strong>
<br />Если често, принимая решение поучаствовать в тренинге, <strong>думала что покупаю кота в мешке</strong>. Но по моей личной статистике, за последние пол года, это третье спонтанное решение на пути изменить себя (сегодня придумала – завтра сделала). Предыдущие 2 были внешние (био-завивка и татуаж) , а этот тренинг я отнесла в первую очередь к внутреннему изменению себя. И не ошиблась.<strong> Нисколько не пожалела</strong>, появилась некая уверенность в том, что теперь смогу подобрать более яркие вещи, и особенно буду продолжать нарабатывать практику в подборе аксессуаров.<br /> Но с другой стороны все равно страшновато ошибиться, к тому, же не во всех магазинах компетентные продавцы, им лишь бы втюхать. А ведь грамотный взгляд со стороны тоже важен.
<br /><br />Еще понравилось, что были практические задания, которые, если честно нелегко было выполнять, наверное, потому что я не умею мыслить абстрактно, образами и пытаюсь все сразу сделать начистовую с деталями и мелочами. Хотя сначала надо сделать скелет, базу, а потом наращивать и оттачивать его. Но я не отчаиваюсь, буду стараться и практиковаться, активно общаться с продавцами.<br /><br />
Спасибо, Екатерина, огромное, буду рада поучаствовать еще!</p>
</div>
				</div>
				<div class="break"></div>
			</div>

			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava17.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Лидия Иванова, г.Москва<span></span></div>
<p>
Екатерина, добрый день!<br /><br />
Спасибо большое за это путешествие в стиль, элегантность и Францию!<br />
<br /><strong>На протяжении целой недели я узнала очень многое про себя, какой я цветотип, свои выигрышные цвета. Научилась сочетать цвета по правилам, а никак придется. Вместе на занятии мы подобрали мне стили, которые индивидуально подходят мне.<br /></strong> Я очень рада, что среди них женственный и французский стиль. Раньше очень сложно было мыслить образом, чаще покупались отдельные вещи. Таких вещей целый гардероб, т.к. все было куплено случайно, по настроению. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('47')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow47" align="absmiddle"/></p><br/>
<div id="sc47" class="switchcontent">
<p style="text-align: justify;">Теперь я буду стараться в магазинах думать, прикидывать с чем бы мне лучше сочетать ту или иную юбку или кофточку.<br />Также буду ходить в магазины со списком комплектов и цветокругом, чтобы собрать интересный и неординарный комплект. <strong>Раньше поход по магазинам не всегда доставлял радость, т.к. чаще ничего не покупала, а теперь для меня это будет некая игра.</strong> Мне интересно подбирать и искать цвета, которые мне идут, и, конечно,увидеть результат - полный комплект одежды и аксессуаров.<br /><br />
Я не умела носить аксессуары, покупала что-то неброское и нейтральное. <strong>Сейчас я чувствую,что смогу подобрать интересные украшения и аксессуары, с ними же так выигрышно и необычно смотрится весь образ.</strong><br /><br />
Отдельное спасибо за список магазинов, а то я все время ходила в магазины не по возрасту и выглядела старше своих лет.
Я жду не дождусь, как пойду в магазин - подбирать новые комплекты. Я в таком предвкушении, я хочу быть яркой и красивой, а самое главное индивидуальной. Я думаю, что после тренинга моя жизнь измениться, она будет красивой, элегантной и интригующей!
Еще у меня есть огромное желание посетить Италию, это давняя моя мечта. Хочу съездить туда на шопинг. Но сначала нужно потренироваться здесь, а то из-за обилия роскошной одежды, я растеряюсь.<br />
<br /><strong>Неделя тренинга оставила самые теплые и добрые воспоминания. Индивидуальный подход к каждому, личные советы, профессионализм Екатерины,все на высшем уровне и все очень ценно.
Огромное спасибо! Творческого успеха!</strong>

</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava18.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Кулешова Анна, г. Москва<span></span></div>
<p>
Хочу поблагодарить Екатерину за отличную работу! вы даёте людям не только знания, но и веру в себя, в свои силы, в свою женственность.<br /><br />
Раньше я обходила магазины стороной, или бесцельно слонялась между прилавками не зная куда смотреть и что выбрать. Все вещи казались какими-то одинаковыми, серыми, или наоборот «слишком не для меня» - ничего не радовало! вы просто открыли мне глаза – на цвет, на детали! <br /><br /><strong>Теперь, глядя на красиво одетых женщин, я начинаю понимать, а что именно привлекло моё внимание и беру это на вооружение – приятно :)</strong> <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('48')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow48" align="absmiddle"/></p><br/>
<div id="sc48" class="switchcontent">
<p style="text-align: justify;">Я и не думала, что знание своего цветотипа так важно и так облегчает поиски нужно вещи. <strong>Знания, которые вы нам дали, настолько полезны, универсальны и просты, что теперь я с радостью пойду в магазин и еще подруг буду консультировать.</strong> <br /><br />Курс был очень интенсивным, но это и хорошо, держал нас всех в тонусе, не давал бездельничать и расслабляться.<br /><br />
Спасибо! Ждём новых встреч с вами.
</p>
</div>
				</div>
				<div class="break"></div>
			</div>
			<div class="bl1">
				<div class="pic"><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/ava19.jpg" alt=""/></div>
				<div class="txt">
					<div class="name">Аксёнова Жанна Сергеевна<span></span></div>
<p>
С огромным удовольствием приняла участие в 7ми дневном тренинге! Очень много полезной информации. <br /><br /><strong>Прояснилась ситуация с восприятием цвета, правилами сочетания цветов и конкретными возможными вариантами лично для себя.<br /><br /></strong>
Появилось достаточно чёткое видение разных стилевых образов и решений, открылись разнообразные возможности по комплектации вещей. <span style="border-bottom: 1px dashed blue; cursor:pointer;" onclick="expandcontent('49')">читать дальше &nbsp;</span><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/garderob100new/images/arrow_down.png" class="arrow" id="arrow49" align="absmiddle"/></p><br/>
<div id="sc49" class="switchcontent">
<p style="text-align: justify;">
Очень полезным оказался день, в который предоставилась возможность задать Екатерине назревшие вопросы и услышать ответ.
<br /><br /><strong>Особо хочется отметить огромное внимание и терпение со стороны Екатерины, с каждым она взаимодействовала лично и никого не оставила без внимания! Спасибо, очень приятно общаться с таким человеком!<br /><br /></strong>
Надеюсь на дальнейшее общение и жду новых семинаров!
</p>
</div>
				</div>
				<div class="break"></div>
			</div>







		</div>
			<div class="bl_name">Отзывы в процессе добавления...</div>
	</div>

	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br>
		<a href="https://www.glamurnenko.ru">https://www.glamurnenko.ru/blog/contacts/</a> tel.: 8(800)707-05-13; +7(499)350-23-35<br>
		© 2017, ИП Косенко Андрей Владимирович, ОГРН 308614728400011
	</div>
</div>
</body>


</html>

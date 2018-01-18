<?
$user_email = APP::Module('DB')->Select(
    APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['email'], 'users',
    [['id', '=', $data['user_id'], PDO::PARAM_INT]]
);

$sendmail_578 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '578', PDO::PARAM_STR]
    ]
);

$sendmail_584 = APP::Module('DB')->Select(
    APP::Module('Tunnels')->settings['module_tunnels_db_connection'], ['fetch', PDO::FETCH_COLUMN], 
    ['UNIX_TIMESTAMP(cr_date)'], 'tunnels_tags',
    [
        ['user_tunnel_id', '=', $data['id'], PDO::PARAM_INT],
        ['label_id', '=', 'sendmail', PDO::PARAM_STR],
        ['token', '=', '584', PDO::PARAM_STR]
    ]
);

$action_start = $sendmail_584 ? $sendmail_584 : $sendmail_578;
$action_end = strtotime($sendmail_584 ? '+4 days' : '+5 days', $action_start);
?>
<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="robots" content="none"> 
        <title>онлайн-тренинг по имиджу &laquo;ИКОНА СТИЛЯ: +100 ОЧКОВ ВАШЕМУ ОБРАЗУ&raquo;</title>
        <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/css/style.css"> 
        <link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/css/zcallback_widget.css">  
        <script type="text/javascript"  src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/js/main.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
		$(document).ready(function() {
$('a[href^="#"]').click(function(){
var el = $(this).attr('href');
$('body').animate({
scrollTop: $(el).offset().top}, 2000);
return false;
});
});
</script>
<link rel="stylesheet" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/flashtimer/compiled/flipclock.css">
<script src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/flashtimer/compiled/flipclock.js"></script>
<script type="text/javascript">
var ZCallbackWidgetLinkId  = '04186fd0ac4e547f4591080328891999';
var ZCallbackWidgetDomain  = 'my.zadarma.com';
(function(){
   var lt = document.createElement('script');
   lt.type ='text/javascript';
   lt.charset = 'utf-8';
   lt.async = true;
   lt.src = 'https://' + ZCallbackWidgetDomain + '/callbackWidget/js/main.min.js?unq='+Math.floor(Math.random(0,1000)*1000);
   var sc = document.getElementsByTagName('script')[0];
   if (sc) sc.parentNode.insertBefore(lt, sc);
   else document.documentElement.firstChild.appendChild(lt);
})();
</script>

    </head>
    <body>

<div class="container">
	<div class="menu">
		<div class="inn">
			<div class="ins">
				<ul style="text-align: center;">
					<li style="padding-left: 0px;font-family: 'AGLettericaCond';"><a class="a1" href="#point10">Кто ведет?</a></li>
					<li style="font-family: 'AGLettericaCond';"><a class="a2" href="#point1">Формат тренинга</a></li>
					<li style="font-family: 'AGLettericaCond';"><a class="a3" href="#point2">Что мне даст тренинг</a></li>
					<li style="font-family: 'AGLettericaCond';"><a class="a4" href="#point6">Модули</a></li>
					<li style="font-family: 'AGLettericaCond';"><a class="a5" href="#point6">Заказать</a></li>
                    <li style="font-family: 'AGLettericaCond';"><a class="a5" href="#point5">Гарантия</a></li>
                    <li class="last" style="padding-right: 30px;font-family: 'AGLettericaCond';"><a class="a6" href="#point8">Отзывы</a></li>
					<li class="last" style="background-image: url(https://www.glamurnenko.ru/products/icon/images/phone.png);background-repeat: no-repeat;background-position-y: center;font-family: 'AGLettericaCond';"><strong style="padding-left:15px;font-weight: 900;">+7(499)350-23-35</strong></li>
				</ul>
			</div>	
		</div>
	</div>
	
	<div class="header">
		<div class="ins">
			<div class="txt">
				<div class="slogan1">онлайн-тренинг по имиджу<br><span>&laquo;ИКОНА СТИЛЯ: +100 ОЧКОВ ВАШЕМУ ОБРАЗУ&raquo;</span></div>
				<div class="slogan2" style="font-size:17px;">Вас будет обучать известный московский стилист. Каждую неделю вы будете получаете новые техники и секреты для применения в своем гардеробе. Стилисты нашей команды будут отвечать на ваши вопросы и давать рекомендации. Вам не надо отрываться от работы и семьи. И результат неизбежен: вы станете иконой стиля в вашем окружении. И точка. <br><br> 
			    <em>Не удивляйтесь, если к вам подойдут на улице и попросят разрешения сфотографировать для street fashion.</em></div>
			</div>
		</div>
	</div>


	<div class="block2" id="">
		<div class="ins">
			<div class="bg"></div>
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name1"><span>Прежде всего, ответьте на несколько вопросов...</span></div>
				<div class="leftcol">
					<div class="item">
						<div class="num">1</div>
						<div class="txt">
							<div class="inn">Вы прочитали кучу литературы про стили, регулярно читаете модные журналы, <strong>но не получается применить знания на практике?</strong></div>
						</div>
					</div>
					<div class="item">
						<div class="num">2</div>
						<div class="txt">
							<div class="inn">Вы считаете, что чувство стиля бывает только врожденным, а <strong>вам просто не повезло с ним?</strong></div>
						</div>
					</div>
					<div class="item">
						<div class="num">3</div>
						<div class="txt">
							<div class="inn">
								<span>Бывали ли у вас ситуации, когда вы подходили к зеркалу или ловили свое отражение в витрине магазина и <strong>были недовольны тем, что видите?</strong></span>
							
							</div>
						</div>
					</div>
					<div class="item">
						<div class="num">4</div>
						<div class="txt">
							<div class="inn">
								<span>Или открывали полный шкаф одежды и понимали, что <strong>надеть нечего?</strong></span>
							</div>
						</div>
					</div>
                    <div class="item">
						<div class="num">5</div>
						<div class="txt">
							<div class="inn">
								<span>Ваш гардероб кажется вам <strong>скучным и безликим</strong> и вы <strong>не знаете, в каком направлении двигаться</strong> и как его можно изменить?</strong></span>
							</div>
						</div>
					</div>
                    <div class="item">
						<div class="num">6</div>
						<div class="txt">
							<div class="inn">
								<span>Бывали ли случаи, когда вы <strong>отказывались от вечеринки, свидания, собеседования</strong> потому, что было нечего надеть?</span>
							</div>
						</div>
					</div>
				</div>
				<div class="rightcol">
					<div class="item">
						<div class="num">7</div>
						<div class="txt">
							<div class="inn">
								<span>Вы идете на шоппинг только когда «приперло» или грядет очередное мероприятие, на которое нечего надеть?</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="num">8</div>
						<div class="txt">
							<div class="inn">Помните случаи, когда вы часами ходили по торговому центру и уходили с чувством полного разочарования <strong>так ничего и не купив?</strong></div>
						</div>
					</div>
					<div class="item">
						<div class="num">9</div>
						<div class="txt">
							<div class="inn">
								<span>Вы не понимаете, какие цвета вам идут и как их можно сочетать?</span>
							</div>
						</div>
					</div>
                    <div class="item">
						<div class="num">10</div>
						<div class="txt">
							<div class="inn">
								<span>Вы не умеете выбирать аксессуары?</span>
							</div>
						</div>
					</div>
                    <div class="item">
						<div class="num">11</div>
						<div class="txt">
							<div class="inn">
								<span>Вам кажется, что в вашей фигуре полно недостатков, и вы не знаете, <strong>что с ними делать?</strong></span>
							</div>
						</div>
					</div>
                    <div class="item">
						<div class="num">12</div>
						<div class="txt">
							<div class="inn">
								<span>Вы приходите в магазин, видите бесконечные ряды вешалок, теряетесь и даже <strong>не знаете с чего начать?</strong></strong></span>
							</div>
						</div>
					</div>
				</div>
				<div class="break"></div>
				<div class="txt1">Если вы ответили &laquo;Да&raquo; хотя бы на один из этих вопросов &mdash; уверяю, вы не одиноки.
<br><br>
Любой человек, который не занимался вопросами анализа своей внешности, четкого понимания, что идет и рационализацией гардероба каждый день сталкивается с суровой реальностью... отражением в зеркале</div>
			</div>
		</div>
	</div>	
	
	<div class="block3">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>Есть ли решение?...</span></div>
				<div class="txt">
					<div class="inn">
						<div class="name">Вы ведь, наверняка, встречали людей, которые умеют одеваться? Вы считаете, что это врожденный дар? Совсем не обязательно!</div>
						<p>Открою вам секрет: есть простые правила, знания и навыки, а также их отработка на практике, которые позволяют составлять законченный гармоничный гардероб, создать свой уникальный стиль и образ.</p><br>
						<p>Вот некоторые из них: определение своего цветотипа; какие цвета, принты, фактуры, украшения подойдут именно вам; правила сочетания цветов; какие длины подойдут вам; как выбрать стиль и составлять комплекты в стилевом направлении; как сочетать одежду в «лук»; базовые и расходные вещи гардероба; использование аксессуаров и многое другое
<br><br>
Знание этих правил и их применение на практике позволит вам составить себе гармоничный, стильный и рациональный гардероб на ЦЕЛЫЙ СЕЗОН ВСЕГО ЗА 1 ДЕНЬ ШОППИНГА.</p><br>
						<p>Честно говоря, можно это сделать и существенно быстрее &mdash; за 4 часа, так что я еще даю вам фору ;-) но это не повод расслабляться!</p>
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
				<div class="bl_name"><span>Одна вещь, которую вы должны знать...</span></div>
				<div class="txt">
					<div class="inn">
                    <div class="name" style="font-family: 'Roboto', arial;font-size: 22px;line-height: 22px;color: #291e1c;text-align: left;letter-spacing: 1px;">По моему опыту — абсолютно все мои клиенты, кто начал применять полученные знания на практике, стали тратить намного меньше времени и денег на шоппинг, а результат — отражение в зеркале — каждый день приносит им радость и комплименты.</div>
<p>Открою также секрет, что один раз разобрав, поняв и усвоив правила, вы их сможете использовать всю оставшуюся жизнь!</p>
<br>
<p>Причем тренинг специально разработан так, что вы сможете проходить его без отрыва от работы и семьи. Я знаю, что у современной женщины мало времени и очень внимательно отношусь к тому, чтобы давать вам самые быстрые и работающие техники. Которые вы сразу можете применить на практике.
<br><br>
Под нашим четким и чутким руководством вы научитесь составлять законченные гармоничные комплекты на практике и мы разработаем ваш индивидуальный стиль!</p>
					</div>
				</div>
				<div class="break"></div>
				<div class="txt1">
					<div class="inn">
						<div class="name"><center><span style="
    display: block;
    font-family: 'AGLettericaExtra';
    font-size: 36px;
    line-height: 36px;
    color: #291e1c;
    text-transform: uppercase;
    letter-spacing: 1.5px;
  ">Готовы ли вы подняться на новый уровень, на котором:</span></center></div>
						<ul>
							<li>Вы будете уметь составлять себе законченный, стильный и гармоничный гардероб на целый сезон за один день!</li>
							<li>У вас будет собственный стиль в одежде: индивидуальный, интересный, актуальный, свежий, говорящий о вас. Вы сможете собирать интересные, свежие, стильные и нескучные комплекты для работы, а также для свободного времени.</li>
							<li>Вы будете просыпаться каждое утро в ожидании нового дня – нового дня для самой красивой женщины на свете – для вас!</li>
                            <li>Вы будете знать, какие цвета вам идут, как их сочетать между собой.</li>
                            <li>Ваш гардероб будет разнообразным, ярким, интересным, но при этом сочетающимся между собой.</li>
                            <li>Вы узнаете секреты составления гардероба, научитесь мыслить «образом», а не «шмоткой». Вы будете понимать, какие ткани, рисунки, деталировка возможны в каждом стилевом направлении.</li>
                            <li>Вы сможете «собирать» комплекты в разных стилевых направлениях.</li>
                            <li>Вы поймете, как подбирать аксессуары к одежде.</li>
                            <li>Вы, наконец, сможете видеть «свои» вещи в магазине и лучше ориентироваться в магазинах.</li>
                            <li>Ваш гардероб будет рациональным: максимальное количество комбинаций при минимальном количестве вещей.</li>
                            <li>Вы будете понимать и уметь отслеживать тенденции моды.</li>
						</ul><br>
                        <div style="padding: 10px 100px 20px 130px;font-family: 'Roboto', arial;font-size: 22px;line-height: 26px;color: #291e1c;letter-spacing: 1.5px;">
						<p>Это простой фокус, узнав который однажды, вы сможете его повторять, как бы ни менялась мода!</p><br>
						<p>Вам кажется, что это просто шмотки? Нет! Есть поговорка: измените себя, и мир вокруг вас изменится! И это коснется всех сфер вашей жизни: работы, личной жизни, увлечений, и что самое главное – настроения!</p>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>	
    
    
  <div class="block7" id="point10">
		<div class="ins">
			<div class="bl_name">Кто проводит тренинг?</div>
			<div class="txt">
				<div class="inn">
					<div class="name"><span style="
    display: block;
    font-family: 'AGLettericaExtra';
    font-size: 36px;
    line-height: 36px;
    color: #291e1c;
    text-transform: uppercase;
    letter-spacing: 1.5px;
">Меня зовут ЕКАТЕРИНА МАЛЯРОВА</span></div>
					<p>С 2007 года я работаю стилистом-имиджмейкером. У меня уже было свыше 500 клиентов и более 5000 человек проходили мои тренинги и семинары через интернет (ниже вы сможете почитать их отзывы). </p><br>
					<p>Я старюсь не просто смотреть на своих клиентов, а видеть их, не слушать, а слышать, найти в них самое важное, &laquo;изюминку&raquo; и показать ее во внешнем образе. Ведь одежда это не просто &laquo;шмотки&raquo;, а способ рассказать миру какая ты на самом деле или соврать ;-).</p><br>
                    <p>С радостью поделюсь с вами своими знаниями и навыками в области имиджа, которые помогут вам каждый день радоваться своему отражению в зеркале! <strong>Улыбайтесь чаще, потому что улыбка &mdash; это главный аксессуар женщины.</strong></p>
                   
			  </div>
			</div>
		</div>
	</div>	
    
    <div class="block122">
		<div class="ins">
			<div class="txt">
				<div class="bl_name" style="
    display: block;
    /* padding: 15px 0 0 240px; */
    font-family: 'AGLettericaExtra';
    font-size: 36px;
    line-height: 36px;
    color: #fdfefe;
    text-transform: uppercase;
    letter-spacing: 1.5px;
">А это образ, с которым вы меня знаете в интернет-жизни: по сайту и рассылкам.</div>
				<p>С 2011 года каждую осень и весну езжу с клиентами на шоппинг в Милан. В результате я работаю в Милане целый месяц весной и месяц осенью.</p><br>
				<p>Я сторонник практических советов, которые может применить каждая женщина. Именно ими я и хочу поделиться с вами!</p>
			</div>	
		</div>
	</div>
    <div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/bg4.jpg') repeat;    border-bottom: 2px dotted #cacbca;height: 500px;padding: 50px 0 0px 0;">
		<div class="ins">
        <center><div class="name"><span style="
    display: block;
    font-family: 'AGLettericaExtra';
    font-size: 36px;
    line-height: 36px;
    color: #291e1c;
    text-transform: uppercase;
    letter-spacing: 1.5px;
">НЕМНОГО ЗВЕЗД</span></div></center>
			<div class="pic" style="margin-bottom: 50px;margin-top: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/ava4.png" alt=""></center></div>
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
                        ">«Женщина любого размера и любого возраста может выглядеть великолепно. Главное — правильно подобрать одежду»</p>
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
    <div class="block3" style="background: url('<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/bg4.jpg') repeat; height: 400px;padding: 50px 0 0px 0;">
		<div class="ins">
			<div class="pic" style="margin-bottom: 50px;"><center><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/ava3.png" alt=""></center></div>
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
    
    <div class="block5">
		<div class="ins">
			<div class="bg"></div>
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span style="font-size: 36px; font-family: 'AGLettericaExtra'; text-transform:uppercase; font-weight: normal; letter-spacing:1.5px;">ПРЕССА И ТЕЛЕВИДЕНИЕ</span></div>
				<div class="bl_name1">
                <p style="color:#291e1c; margin-bottom: 35px;font-size: 17px;">Первый канал</p>
<center>                
<table align="center">
<tbody><tr><td colspan="3">
<center><iframe class="aligncenter size-small wp-image-10922" src="https://www.youtube.com/embed/VCoiWt-roBc" allowfullscreen="allowfullscreen" width="480" height="385" frameborder="0"></iframe></center>
</td></tr>
<tr><td colspan="3"><center><p style="color:#291e1c; margin-bottom: 35px;margin-top: 15px; font-size: 17px;"><br>Прямой эфир на канале ТДК<br>
Тема: Учимся составлять гардероб на каждый день</p></center></td></tr>

<tr><td><center><p style="color:#291e1c;margin-bottom: 10px;font-size: 17px;">Часть 1:</p></center></td><td width="10px"></td><td><center><p style="color:#291e1c;margin-bottom: 10px;font-size: 17px;">Часть 2:</p></center></td></tr>
<tr align="center"><td align="center">
<center><iframe class="aligncenter size-small wp-image-10922" src="https://www.youtube.com/embed/8xNaaM050OY" allowfullscreen="allowfullscreen" width="450" height="355" frameborder="0"></iframe></center>
</td><td width="40px"></td><td>
<center><iframe class="aligncenter size-small wp-image-10922" src="https://www.youtube.com/embed/hJYiIYv39g4" allowfullscreen="allowfullscreen" width="450" height="355" frameborder="0"></iframe></center>
</td></tr></tbody></table>
</center>

<div class="containerz">
  <div class="box">
    <div style="width:260px;"><a href="https://www.glamurnenko.ru/newshopper/media/streetfashion.jpg" target="_blank"><img src="https://www.glamurnenko.ru/newshopper/media/streetfashion-smal.jpg" width="" border="0" height=""></a>
 <p>Засветилась в street fashion <br/> на woman.ru</p></div> 
<div style="width:400px;"><a href="https://www.glamurnenko.ru/newshopper/media/liza.jpg" target="_blank"><img src="https://www.glamurnenko.ru/newshopper/media/liza-small.jpg"  width="" border="0" height=""></a> <a href="https://www.glamurnenko.ru/newshopper/media/liza2.jpg" target="_blank"> <img src="https://www.glamurnenko.ru/newshopper/media/liza2-small.jpg"  width="" border="0" height=""></a>
<p>Статья в журнале &laquo;Лиза&raquo;<br/><br/></p></div> 
<div style="width:260px;"><a href="https://www.glamurnenko.ru/newshopper/media/122015_ob.jpg" target="_blank"><img src="https://www.glamurnenko.ru/newshopper/media/122015_ob-smal.jpg"  width="" border="0" height=""></a>
<a href="https://www.glamurnenko.ru/newshopper/media/122015.jpg" target="_blank"><img src="https://www.glamurnenko.ru/newshopper/media/122015-smal.jpg"  width="" border="0" height=""></a>
<p>Статья в журнале &laquo;Домашний&raquo;<br/><br/></p></div>
<br><br><br>
<div style="width:400px; margin-bottom: 50px;"><a href="https://www.glamurnenko.ru/newshopper/media/1_012016.jpg" target="_blank"><img src="https://www.glamurnenko.ru/newshopper/media/1_012016-smal.jpg"  width="" border="0" height=""></a>
<a href="https://www.glamurnenko.ru/newshopper/media/2_012016.jpg" target="_blank"><img src="https://www.glamurnenko.ru/newshopper/media/2_012016-smal.jpg"  width="" border="0" height=""></a>
<p>Статья в журнале &laquo;Домашний&raquo;</p>
</div> 
  </div>
</div>




				  </div>
				</div>
			</div>
		</div>
 
    
    
    <div class="block6" id="">
		<div class="ins">
			<div class="bl_name">Чем уникален тренинг?</div>
			<div class="week">
				<div class="item"><div class="inn"><p>Я разработала для вас подробную пошаговую программу, что и как делать, в какой последовательности и с наглядными примерами. Вы не только узнаете новую информацию, но с первого же дня начнете ее активно применять на практике!</p><br>
<p>Это как с изучением иностранного языка — практика дает быстрый и максимальный результат. &laquo;Узнали - сказали&raquo; - &laquo;Узнали - сделали&raquo;. За моей программой стоит образование имиджмейкера, практический опыт работы с 2007 года, более 500 клиентов на шоппингах, свыше 5000 женщин, прошедших обучение через интернет и горы прочитанных книг и пройденных тренингов.</p><br>
</div></div>
				
				<div class="item">
				  <div class="inn">
                  <div style="padding: 10px 100px 10px 130px;font-family: 'Roboto', arial;font-size: 22px;line-height: 26px;color: #291e1c;letter-spacing: 1.5px;">
						Хватит жаловаться на то, что опять нечего надеть! 
<br>Начните, наконец, действовать! 
<br>Вы можете намного больше, чем то, что висит в вашем шкафу!!!
                        </div>
</div></div>
			</div>
		</div>
	</div>	
    
  <div class="block9" id="point1">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="txt">
					<div class="inn">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="td2"><br><div class="name"><strong style="font-size: 36px; font-family: 'AGLettericaExtra'; text-transform:uppercase; font-weight: normal; letter-spacing:1.5px;">Формат тренинга</strong></div><br><p>Тренинг проходит через ИНТЕРНЕТ. Вам не надо никуда ехать. Достаточно просто иметь доступ к компьютеру и интернету.</p><br>
<p>Вам будет выдан доступ в закрытый раздел. Раз в неделю я буду выкладывать для вас новое занятие с техниками и домашним заданием. Задания спланированы таким образом, чтобы вы могли выполнять их наряду с обычной жизнью — работой, семьей, детьми, спортом, хобби... Никаких сверхусилий. Но чтобы при этом вы видели результаты в своем гардеробе.</p><br>
<p>Там же вы можете видеть домашние задания других участников тренинга и учиться на их ситуациях. А это усилит и ваши результаты - потому что вы видите со стороны вопросы и ситуации других участников!</p><br>
<br><div class="name"><strong style="    font-size: 36px;
    font-family: 'AGLettericaExtra';
    text-transform: uppercase;
    font-weight: normal;
    letter-spacing: 1.5px;line-height: 1;">Почему удобно проходить тренинг через интернет?</strong></div><br>
<p>Вам не нужно никуда ехать, стоять в пробках или ждать пока наберется группа.</p><br>
<p>Вы можете скачать и просматривать материалы в любое удобное для вас время: когда ждете заказ в кафе или свой рейс в аэропорту, в перерыве на работе или выделив хотя бы раз в неделю имидж-час для своего удовольствия. Можете даже слушать аудио-версию в машине.</p><br>
<p style="padding-left: 120px;"><em>Рассказывала одна из клиенток: "Я частенько слушаю твои семинары уже в постели перед сном. И муж, когда ложится спать, обращается к ноутбуку: "Привет, Катя" )))</em></p><br>
<p>Вы можете вернуться к любому занятию когда захотите и освежить материал - у вас будет постоянный доступ. </p><br>
<p>Также в любое время вы можете выложить свой комментарий для проверки и наш стилист в 7-дневный срок даст ответ. </p>
<br><div class="name"><strong style="    font-size: 36px;
    font-family: 'AGLettericaExtra';
    text-transform: uppercase;
    font-weight: normal;
    letter-spacing: 1.5px;line-height: 1;">Сколько времени мне потребуется на выполнение домашних заданий?</strong></div><br>
<p>От 30 минут до часа-полтора в неделю.</p><br>
<p>К тому же вы можете пропускать некоторые задания, если не успеваете и потом возвращаться к ним при необходимости.</p>
</td>
							</tr>
						</table>		
					</div>
				</div>
                
				<div class="break"></div>
			</div>
		</div>
	</div>
  <div class="block1" id="point2">
    <div class="ins">
      <div class="block">
        
                        <div class="corn"></div>
                        <div class="block">
                          <div class="block">
                            <div class="bl_name"><span>ЧТО МНЕ ДАСТ ЭТОТ ТРЕНИНГ?</span></div>
                         
                           <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px; margin-top: 10px;">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы сможете собирать законченный, стильный и гармоничный гардероб на сезон всего за 1 день и с минимальными затратами! Представляете, сколько времени и денег это вам сэкономит?</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Мы разработаем ваш индивидуальный стиль для работы (стильный, элегантный, актуальный, нескучный) и свободного времени (актуальный, свежий, легкий, женственный или романтичный).</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы, наконец, будете довольны своим гардеробом и отражением в зеркале.</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы приобретете знания по составлению гардероба, которые будете применять всю жизнь – это как научиться кататься на велосипеде.</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы на практике научитесь собирать комплекты в разных стилевых направлениях, будете понимать какие ткани, рисунки, деталировка и компоновка в костюмный ансамбль возможны в каждом стиле, какими аксессуарами можно дополнить.</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы научитесь грамотно использовать аксессуары.</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы, наконец, поймете, как использовать свою внешность на 100%!</span>
							</div>
						</div>
					</div>
                    <div class="item" style="width: 100%;background: url(https://www.glamurnenko.ru/products/icon/images/bg111.png) repeat-y;margin-bottom: 10px;
">
						<div class="txt">
<div class="inn" style="display: table-cell;height: 70px;width: 915px;padding: 10px 10px;border: 1px dotted #a1a09d;font-size: 17px;line-height: 21px;color: #291e1c;text-align: left;vertical-align: middle;">
								<span>Вы будете чувствовать себя более радостной, счастливой и уверенной! Цель не шмотки, а настроение и самоощущение.</span>
							</div>
						</div>
					</div>
                            
                          </div>
                        </div>
                        <div class="break"></div>
                      </div>
                      </div>
                    </div>
                 
  </div>
  
  <div class="block1333">
		<div class="ins">
			<div class="bl_name" style="font-family:'AGLettericaExtra';font-size: 36px;
    line-height: 36px;
    color: #291e1c;letter-spacing: 1.5px;
}">Бонусы для участников тренинга</div>
			<div class="item i4">
				<div class="label"></div>
				<div class="left"><img src="https://www.glamurnenko.ru/images/coverss1.png" alt="" style="margin-top: 50px;"></div>
				<div class="right">
					<div class="name">Тенденции сезона осень-зима 2017-2018 и как их применить для вашего гардероба</div>
					<p style="font-size: 17px;line-height: 17px;">На этом семинаре:
<br><br>
&ndash; вы узнаете, какие тенденции актуальны в сезоне осень-зима 2017-2018;
<br><br>
&ndash; вы изучите актуальные цвета, фасоны, фактуры, компановки в костюмный ансамбль и узнаете, как применить их к своему гардеробу;
<br><br>
&ndash; сможете выбрать из них то, что подходит именно вам;
<br><br>
&ndash; узнаете, как с помощью тенденций &laquo;разбавить&raquo; имеющийся гардероб, сделав его более модным и актуальным.</p><br>
				</div>
				<div class="break"></div>
			</div>
			<div class="break"></div>
                        
			<div class="item i5">
				<div class="label"></div>
				<div class="left"><img src="https://www.glamurnenko.ru/images/coverss2.png" alt="" style="margin-top: 35px;"></div>
				<div class="right" style="padding-top: 40px;">
					<div class="name">Top-10 цветов сезона осень-зима 2017-2018 с идеями для вашего гардероба</div>
					<p style="font-size: 17px;line-height: 17px;">На этом семинаре:
<br><br>
&ndash; вы узнаете TOP-10 цветов сезона осень-зима 2017-2018;
<br><br>
&ndash; мы подробно разберем их на примерах коллекций этого сезона;
<br><br>
&ndash; вы узнаете, с какими цветами они сочетаются;
<br><br>
&ndash; вы сможете выбрать из них те, что подходят именно вам;
<br><br>
&ndash; вы узнаете, как с их помощью сделать свой осенне-зимний гардероб более актуальным, стильным и "вкусным" с точки зрения цветовых решений;
<br><br>
&ndash; вы сможете сделать текущий гардероб более актуальным и эффектным, добавив в него лишь несколько оттенков нового сезона.</p>
				</div>
				<div class="break"></div>
			</div>
			<div class="break"></div>
            
		</div>
	</div> 
    
    <div class="block12" id="point5">
		<div class="ins">
			<div class="corn"></div>
			<div class="block">
				<div class="bl_name"><span>ПРИМИТЕ УЧАСТИЕ В ТРЕНИНГЕ, <br>
НИЧЕМ НЕ РИСКУЯ!</span></div>
				<div class="txt">
					<div class="inn">
                    <div class="name" style="font-family: 'Roboto', arial;font-size: 22px;line-height: 22px;color: #291e1c;text-align: left;letter-spacing: 1px;padding-bottom: 18px; margin-bottom: 15px; background: url(https://www.glamurnenko.ru/products/icon/images/line2.png) center bottom no-repeat;">Тренинг окупится уже после первой-второй вашей покупки.</div>
					    <p>Цена ошибки при покупке вещей гораздо выше. Попробуйте заглянуть в свой шкаф и посмотреть сколько там вещей, которые вы не носите. А сколько они вам стоили?</p><br>
                      <p>Мой тренинг - это гарантия того, что вы не потратите неправильно деньги на следующем шоппинге.</p><br>
                      <p>Мой тренинг также гарантия того, что комплекты, которые вы соберете будут рациональными, сочетающимися, стильными и вы будете чувствовать себя в них уверенно и будете нравиться себе - а это уже бесценно.</p><br>
                      <strong style="font-size: 36px; line-height: 36px; font-family: 'AGLettericaExtra'; text-transform:uppercase; font-weight: normal; letter-spacing:1.5px;">Но что более важно - это безусловная гарантия.</strong><br><br>
                      <p>Я понимаю, что вам в тренинге важно всё, что я обещаю на этой странице. Поэтому я даю вам возможность пройти первый месяц тренинга полностью без риска!</p><br>
                      <p>Если в конце первого месяца вы не будете удовлетворены, тогда я просто верну вам деньги. Без лишних вопросов и обид. Только вы судья!</p><br>
                      <p>Почему я даю такую гарантию? С 2011 года мои тренинги прошло свыше 5000 женщин и возврат попросили не больше 1%.</p><br>
                      <p>Таким образом, для вас это безрисковая инвестиция.</p><br>
                      <strong style="font-size: 36px; line-height: 36px; font-family: 'AGLettericaExtra'; text-transform:uppercase; font-weight: normal; letter-spacing:1.5px;">А ведь вы получите навыки по составлению гардероба и эффективному шоппингу, которые останутся с вами навсегда!</strong><br><br>
                      <p>Более того, гарантирую, если вы полноценно выполните все упражнения, вы уже не вернетесь к прежнему гардеробу. Это переход на новый уровень. Это «точка невозврата»! Вы готовы?</p>
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
            <div class="bl_name"><span>ЗАПИСАТЬСЯ НА ТРЕНИНГ</span></div>
            <br>
            <br>
            <br>
                <div class="txt">
                                    <div class="innn"><center><br>
						<p>Успейте выписать счет, пока время на таймере не истекло.</p><br>
                                                </center>
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
</script> </center>
					</div>
				</div>
				<br>
            <br>
            <br>
				<div class="price">
					<div class="inn">
                        
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr class="tr1">
								<td class="td1"></td>
								<td class="td3">Standart</td>
                                <td class="td3">Gold</td>
                                <td class="td3">Platinum</td>
							</tr>
							<tr>
								<td class="td1"><span>МОДУЛИ:</span></td>
								<td></td>
                                <td></td>
                                <td></td>
								
							</tr>
							<tr>
								<td class="td1">Модуль «Икона стиля: Базовый» <br/> 
								Продолжительность: 2,5 месяца<br/> 
								Стандартная цена: 15 000 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
                          <tr>
								<td class="td1">Модуль «20 базовых вещей и 200 комплектов с ними» <br/> Продолжительность: 2,5 месяца<br/> Стандартная цена: 9900 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «101 Рецепт стильного гардероба в офис» <br/> Продолжительность: 2,5 месяца<br/> Стандартная цена: 9900 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «Как похудеть на 2 размера с помощью имиджмейкера» <br/> 
								Продолжительность: 2,5 месяца<br/>
								 Стандартная цена: 9900 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «Революция цвета» <br/> 
								Продолжительность: 2,5 месяца<br/>
								 Стандартная цена: 10500 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «Верхняя одежда под контролем стилиста» <br/> 
								Продолжительность: 1 месяц<br/> 
								Стандартная цена: 9970 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «Головные уборы под контролем стилиста» <br/> 
								Продолжительность: 1 месяц<br/>
								 Стандартная цена: 9900 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «Шоппинг весна-лето под контролем стилиста» <br/> Продолжительность: 1 месяц<br/> Стандартная цена: 10500 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
							
                            <tr>
								<td class="td1">Модуль «Шоппинг осень-зима под контролем стилиста» <br/> 
								Продолжительность: 1 месяц<br/> 
								Стандартная цена: 9970 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
                          <tr>
								<td class="td1">Модуль «MakeUp Must Have: идеально подходящий вам макияж за 15 минут в день» <br/> 
								Продолжительность: 1 месяц<br/> 
								Стандартная цена: 9875 руб</td>
                                
								<td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/no.png" alt=""/></td>
                                <td><img src="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/images/yes.png" alt=""/></td>
								
						  </tr>
                          <tr>
								<td class="td1"></td>
								<td></td>
								<td></td>
                                <td></td>
							</tr>
                          
                          <tr>
								<td class="td1">Проверка ДЗ<br><b style="font-size:12px;font-weight: normal;">* имиджмейкером команды Гламурненько.ру</b></td>
								<td>2,5 месяца</td>
                                <td>10 месяцев</td>
                                <td>17,5 месяцев</td>
								
							</tr>
                            <tr>
								<td class="td1"></td>
								<td></td>
								<td></td>
                                <td></td>
							</tr>
							
                            <tr class="tr2">
						<td class="td1" id="point7"><span>ПРОДОЛЖИТЕЛЬНОСТЬ</span></td>
						<td>2,5 месяца</td>
                        <td>10 месяцев</td>
                        <td>17,5 месяцев</td>
					</tr>
                    
                    <tr class="tr2">
						<td class="td1"><span>СТАНДАРТНАЯ ЦЕНА</span></td>
						<td><strike>15 000 руб</strike></td>
                        <td><strike>44 700 руб</strike></td>
                        <td><strike>105 415 руб</strike></td>
					</tr>
                    	
					<tr class="tr2">
						<td class="td1"><span>ВАША ЦЕНА</span></td>
						<td>9 900 руб</td>
                        <td>12 900 руб</td>
                        <td>29 900 руб</td>
					</tr>
							<tr class="tr3">
								<td class="td1"></td>
				<td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53341"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>&f=1" target="_blank"></a></td>
                                <td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53342"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>&f=1" target="_blank"></a></td>
                                <td><a href="https://www.glamurnenko.ru/order/?p=<?= APP::Module('Crypt')->Encode('{"id":"53343"}') ?>&t=<?= APP::Module('Crypt')->Encode('{"email":"' . APP::Module('DB')->Select(APP::Module('Users')->settings['module_users_db_connection'], ['fetch', PDO::FETCH_COLUMN], ['email'], 'users', [['id', '=', $data['user_id'], PDO::PARAM_INT]]) . '"}') ?>&f=1" target="_blank"></a></td>
							</tr>
						</table>
                        
					</div>
				</div>	
				<div class="note"></div>
			</div>
		</div>
	</div>	
	<link rel="stylesheet" type="text/css" href="<?= APP::Module('Routing')->root ?>public/modules/pages/products/icon/css/style_1.css?t=1409284522"/>


</section>	
<section class="whiteBg" style="background: white;">
    <section class="page" id="faq_block">
        <h1 style="font-size: 36px;
    line-height: 36px;
    font-family: 'AGLettericaExtra';
    text-transform: uppercase;
    font-weight: normal;
    letter-spacing: 1.5px;">Часто задаваемые вопросы:</h1>
       
        <h2><span class="questSymbol">?</span> Тренинг будет проходит через интернет или вживую надо куда-то идти?</h2>
        <p>Только через интернет. И этот формат дает ряд преимуществ для вас:<br>
- вам не надо никуда ехать, достаточно иметь компьютер<br>
- вы можете скачать запись и просматривать её сколько угодно и когда угодно<br>
- цена тренинга намного ниже, чем цены живых мероприятий</p>
        
        <h2><span class="questSymbol">?</span> Могу ли я купить тренинг сейчас, а проходить через месяц / полгода / год?</h2>
        <p>Да, вы можете проходить тренинг в любое удобное для вас время. Вместе с тренингом идет гарантированный период сопровождения стилистом для проверки ваших домашних заданий. Как только вы купили &mdash; этот период начался. Заморозить его, к сожалению, нельзя. Но вы можете потом продлить этот срок или включить, когда захотите. Стоимость продления/включения = 1 000 рублей/мес </p>
        <h2><span class="questSymbol">?</span> Мне обязательно присутствовать онлайн или можно будет скачать записи?</h2>
        <p>Вы получаете доступ в закрытую систему тренинга. Раз в неделю вам будем открывать записи очередного блока. Вы можете их скачивать и просматривать в любое удобное время. Будут несколько онлайн-втреч, на которых придет отдельное приглашение. Если вы не сможете присутствовать - не страшно, их записи тоже будут доступны. </p>
       <h2><span class="questSymbol">?</span> Нужно ли мне в процессе тренинга покупать одежду?</h2>
        <p>Что-то вы сможете "дотянуть" из уже имеющейся у вас одежды. А что-то надо будет докупать. Но эти покупки будут очень рациональными и оправданными. Без покупки новых вещей сложно сделать что-то кардинально новое и интересное. Но в любом случае вы потратите намного меньше денег, чем просто самостоятельно закупая одежду без нашей поддержки.</p>
        <h2><span class="questSymbol">?</span> Как будет происходить обратная связь со стилистом?</h2>
        <p>В каждом занятии у вас будет домашнее задание. Вы выкладываете выполненное задание и вопросы в закрытом разделе. В течение недели стилист-куратор проверяет и дает вам свой комментарий голосом. Под вашим комментарием появится онлайн-проигрыватель и вы сможете прослушать ответ стилиста.</p>


           
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
						<p><a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a></p>
					</div>
				</div>
				<div class="break"></div>
			</div>
		</div>
	</div>
	<div class="block15" id="point8">
		<div class="ins">
			<div class="bl_name">Некоторые отзывы на модуль <br>
		    &laquo;20 базовых вещей и 200 комплектов с ними&raquo;</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava01.png"></div>
						<div class="txt">В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Гардероб у меня был скучным и неинтересным, потом прошла базовый тренинг по имиджу у Екатерины в 2011 году и ситуация улучшилась. Сейчас поняла, что немного застопорилась в составлении более интересных комплектов, поэтому снова пришла к Кате.
<br><br>
Тренинг помог мне понять, что такое базовый гардероб. До этого ясности не было. Теперь сконцентрируюсь на том, чтобы сформировать правильный гардероб из того, что есть, и докупить то, чего не хватает. Поразило внесение ожерелья в базовые вещи (и то, насколько это верно), понравилась тельняшка (у меня ее нет, но, думаю, что обязательно появится).
<br><br>
Я наверное как те клиенты Екатерины, у которых весь гардероб состоит из расходных вещей, хотя я у себя отметила в наличии более половины из списка базовых, но не было знаний для формирования целостного гардероба.
<br><br>
В процессе прослушивания тренинга я составила список базовых вещей и отметила, что у меня есть в гардеробе. Кроме того, подобрала несколько новых комплектов из имеющихся вещей. За один образ получила на этой неделе три комплимента (один из них от очень придирчивого коллеги-мужчины).
<br><br>
Эмоции от Екатерины всегда положительные, она очень вдохновляет. Я очень рада, что приняла решение пройти этот тренинг! (уже не единожды ловила себя на этой мысли)
<br><br>
Еще планирую дослушать все дни тренинга, выписать цвета для всех вещей и понемногу докупать необходимое (для начала ожерелье и тренч, о котором давно мечтаю). Я еще недостаточно хорошо проработала создание образов, необходимо будет этим заняться.</p>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker01.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker02.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker03.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker04.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker05.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker06.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/paker07.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td></td>
</tr>
</tbody>
</table>
						</center>
				  </div>
					<div class="bot">Светлана Пакер, Санкт-Петербург, юрист</div>
				</div>	
				</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava02.png"></div>
						<div class="txt">Эмоции непередаваемые — сплошной восторг! Одна моя очень хорошая знакомая сказала, что я похудела и как хорошо я выгляжу, я также получила много комплиментов от мужа и сына.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>За последние 7 лет после рождения двух деток я побывала в 4-х размерах и у меня накопилось огромное количество одежды с которой я не знала что делать. Благодаря Базовому Тренингу по Имиджу, который я прошла у Кати я узнала много полезной информации и начала применять полученные знания на практике. Но в силу занятости мне не хватало полного погружения в вопросы стиля и имиджа, не было времени пересмотреть весь гардероб, перебрать вещи, составить побольше комплектов на разные случаи жизни.
<br><br>
Сейчас я также понимаю, что мне не хватало многих базовых вещей. Кроме того было много расходных вещей вышедших из моды.
<br><br>
На тренинге я усвоила что такое базовые и расходные вещи и в чем их роль, как с минимумом вещей можно составить очень много стильных комплектов. Теперь я лучше понимаю что делает образ интересным и законченным, как строить образ на контрасте, как можно корректировать фигуру при помощи базовых вещей.
<br><br>
Я наконец-то навела порядок у себя в шкафу и избавилась от приличной стопки шмоток, купила некоторые недостающие базовые вещи, составила список базовых вещей которые со временем нужно докупить. Я еще лучше подготовлена к наступлению весны! Теперь у меня составлено множество комплектов на разные случаи жизни.
<br><br>
Мне очень импонирует Катин стиль подачи информации и я с нетерпением ждала каждого дня и проверки моих домашних заданий.
<br><br>
Иногда в силу недостатка времени я проходила какие-то темы «голопам по Европам». Спустя пару недель я обязательно прослушаю тренинг еще раз и просмотрю разбор домашних задании? других участниц, так как я не успевала это делать.
<br><br>
Еще мне нужно поменять свое ежедневное отношение к вещам, мне часто «жалко» наряжаться. В последние годы я отдавала предпочтение практичной, зачастую никакой одежде, не покупала ничего что нельзя постирать и нужно отдавать в химчистку.
<br><br>
Я собираюсь распечатать фотки удачных образов и использовать их как шпаргалки когда нет времени и нужно «схватить, одеть и бежать»</p>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant1.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant2.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant3.jpg" alt="" width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant5.jpg" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant6.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant7.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant7.jpg" alt="" width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant9.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant9.jpg" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant10.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant10.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant11.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant11.jpg" alt="" width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant4.jpg" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant13.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant13.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant14.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant14.jpg" alt="" width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant12.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant12.jpg" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/garlant8.jpg" alt="" width="150"/></a></td>
<td></td>
</tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bot">Татьяна Гарлант, Питерсфилд, Англия</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava03.png"></div>
						<div class="txt">Я очень рада, что могу помогать сестре и маме подбирать вещи, они всегда ко мне обращаются теперь за советом. Недавно подобрала маме жакет и юбку (на то, чтобы носить ожерелье, мне пока ее убедить не удалось), и после выхода на работу в новом комплекте, она мне звонила и делилась, что все ей делали комплименты.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Пару дней назад на ДР у подруги встретила знакомую, которая недавно прошла мастер класс по имиджу, и когда я поделилась тем, что увлечена составлением своего гардероба после ваших тренингов, она отметила мой внешний вид, и интересно подобранный комплект. А еще я очень рада, что могу помогать сестре и маме подбирать вещи, они всегда ко мне обращаются теперь за советом. Недавно подобрала маме жакет и юбку (на то, чтобы носить ожерелье, мне пока ее убедить не удалось), и после выхода на работу в новом комплекте, она мне звонила и делилась, что все ей делали комплименты. Это здорово, спасибо вам, Катя.
<br><br>
До тренинга понятия о базовых вещах было только по наитию, и, конечно же многие базовые вещи были для меня открытием — теперь они точно будут в моем гардеробе.
<br><br>
Тренинг помог сосредоточиться на базовых вещах, которые по сути и делают весь гардероб, а потом уже добавлять изюминки к образу. Раньше как мне кажется я больше чем нужно уделяла расходным вещам, теперь мой фокус будет на базовых.
<br><br>
А еще у меня появилось радостная уверенность перед походом по магазинам.
<br><br>
Большое спасибо!
</p>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan02.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan02.jpg" alt="" width="150"></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan03.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan03.jpg" alt="" width="150"></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan04.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan04.jpg" alt="" width="150"></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan05.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan05.jpg" alt="" width="150"></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan06.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan06.jpg" alt="" width="150"></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan07.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan07.jpg" alt="" width="150"></a></td>
</tr>
<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan08.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2014/04/sholpan08.jpg" alt="" width="150"></a></td>
<td></td>
</tr>
</tbody>
</table>
</center>
				  </div>
					<div class="bot">Шолпан Абдилда, Алматы, Казахстан</div>
				</div>	
</div>
		
		<div class="bl_name">Некоторые отзывы на модуль <br>
		  «Как похудеть на 2 размера с помощью имиджмейкера»</div>
		
		
		  <div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava04.png"></div>
						<div class="txt">Когда мне пришло оповещение на почту, что готовится тренинг и было предложено задать вопросы, а впоследствии пришло предложение записаться на этот тренинг – я с удовольствием согласилась. Кроме того, привлекла цена вопроса, как правильно заметила Екатерина, — это стоимость очередной купленной вещи, которая опять повиснет в шкафу, если снова подойти к ее покупке неправильно.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Меня зовут Наталья Гусарова, мне 41 год, я из Москвы. Работаю в крупной московской организации, возглавляю структурное подразделение в двух филиалах. Работа офисная, статус должности подразумевает определенный дресс-код – не жесткий, но чтобы было респектабельно. В принципе, мне никто не запрещает придти на работу в джинсах, но я сама как-то решила, что джинсы – это одежда для свободного времени, а не для работы.
<br><br>
Поскольку значительную часть жизни я провожу именно на работе, в первую очередь расскажу о трудностях с подбором офисного гардероба. У меня в арсенале платья, юбки, брюки, топы, пиджаки и кардиганы, а также немного трикотажа.
<br><br>
Проблема первая – цвет, цвет и еще раз цвет! Я знаю, что мне идут яркие, насыщенные цвета, но у меня мало вещей таких цветов. В основном цвета темные — темно-синий, бутылочно-зеленый, темно-фиолетовый, черный, серый, коричневый. Более яркие цвета для летнего периода – бирюзовый, ярко-желтый, розовый, сиреневый. Но все равно как-то скучно. Мне скучно, хотя мои коллеги говорят, что я хорошо выгляжу.
<br><br>
Проблема вторая – однообразные фасоны. Моя проблема в фигуре – выступающий животик. И хотя на самом деле он не такой уж и огромный, но вкупе с крупным бюстом я сама себе кажусь очень монументальной в верхней части. При этом у меня стройные бедра, поэтому мои фасоны – прямые узкие юбки, юбки-карандаши, платья-футляры, облегающие бедра брюки, в общем все достаточно строгое и типичное. В результате впечатление такое, что у меня одна юбка (темная), одни брюки (темные) и одно платье (темное), хотя на самом деле шкаф уже не вмещает все вешалки.
<br><br>
Проблема третья – мне крайне тяжело избавляться от вещей!!! Вот лежит у меня юбка, я уже два года вообще ни разу ее не носила, а выкинуть рука не поднимается. Ну футболки допустим я на дачу увезу, а как поступать с платьями, юбками, брюками? Понимаю, что надо раз в год проводить чистку гардероба, а заставить себя не могу, а вдруг пригодится? И ведь знаю, что не пригодится, а все равно – лежит…..
<br><br>
Откуда узнала о тренинге и почему решила пройти обучение. Дело в том, что я уже достаточно давно посещаю сайт Гламурненько.ру, участвовала во многих встречах Имидж-клуба, слушала в записи тренинг по имиджу и семинар по шоппингу, и мне нравится, как доступным языком, подчас буквально разжевывая сложные моменты, вы, Екатерина, даете информацию своим клиентам. Я сама являюсь экспертом в своей профессиональной области, поэтому понимаю, что изобрести велосипед уже в принципе невозможно, все так или иначе уже было кем-то придумано, написано или рассказано. Но собрать эти знания, выделить из многообразия этой информации самое основное, и донести до слушателей, при этом не вгоняя их в комплекс неполноценности, — для этого нужен талант. Поэтому когда мне пришло оповещение на почту, что готовится тренинг и было предложено задать вопросы, а впоследствии пришло предложение записаться на этот тренинг – я с удовольствием согласилась. Кроме того, привлекла цена вопроса, как правильно заметила Екатерина, — это стоимость очередной купленной вещи, которая опять повиснет в шкафу, если снова подойти к ее покупке неправильно.
<br><br>
Успехи и эмоции. Тут все просто – во время тренинга я мысленно прокрутила в голове все имеющиеся у меня вещи. Именно мысленно, поскольку до реального разбора руки пока не дошли – все вечера уходили на проработку домашних заданий ))))) Что-то из вещей я уже наметила на окончательное изгнание из своего шкафа за ненадобностью, некоторые лягут в основу моего нового гардероба. Очень приятно было осознавать, что многое из того, что я сама для себя выбирала при выполнении ДЗ, оказывалось правильным либо требовало очень незначительной корректировки. Наибольшая проблема у меня возникла с подбором цветовой палитры для себя, она у меня получилась слишком блеклая, но это вопрос зрительной тренировки и освоения программы по подбору цветов. И я обратила внимание, что листая модные журналы, я уже по-другому рассматриваю одежду и аксессуары, я не просто смотрю на картинку, а уже вижу некий образ применительно к себе.
<br><br>
Исходя из этого, планы на ближайшее время – освободиться от ненужных вещей в своем гардеробе и составить возможные варианты комбинирования имеющихся вещей, которые войдут в новый гардероб. Соответственно это ляжет в основу шоппинг-листа.
<br><br>
Во время прохождения тренинга у меня изменилось восприятие своей фигуры. Т.е. я поняла, что имею гораздо больше вариантов по фасонам и цветовым решениям, чем использовала до сих пор. Некоторые фасоны одежды, которые интуитивно мне нравились и привлекали меня, но которые мне самой казались не совсем подходящими, оказались вполне приемлемыми для моей фигуры, если правильно сочетать их с другими вещами или аксессуарами.
<br><br>
По поводу изменений и улучшений в тренинге могу сказать следующее. Как показала моя практика, выполнение ДЗ занимает подчас очень много времени, далеко не всегда есть возможность заняться этим на работе, а вечером уже следующее занятие. Поэтому если ДЗ выкладываешь с опозданием на 1 день, и вдруг оказывается, что его надо переделать, а переделать сразу тоже не всегда удается, и снова опаздываешь на 1 день – в результате выделенные 3 дня на проверку уже проходят. Все остальное – прекрасно!
<br><br>
Екатерина, огромное спасибо за Ваш труд!!!
</p>
				  </div>
					<div class="bot">Наталья Гусарова</div>
				</div>	
</div>
		
		<div class="bl_name">Некоторые отзывы на модуль <br>
		  «101 Рецепт стильного гардероба в офис» </div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava05.png"></div>
						<div class="txt">Практически каждый день я получала комплименты от коллег, зам. генерального директора «оценила» мой внешний вид, сказав, что выгляжу элегантно, со вкусом и по-деловому. На одной деловой поездке с директором, получив от него комплимент, состоялся разговор, что мне надо сделать, чтобы получить повышение! На работе – комплименты; стали относиться серьезнее, что очень важно для молодого специалиста! Очень чувствуется мужское внимание!</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>
Здравствуйте, Катя и команда Glamurnenko!
<br><br>
Я работаю в Москве в сфере строительства специалистом по согласованию. Мое представление об офисном гардеробе ограничивалось белыми рубашками, черными аксессуарами и бесформенным скучным костюмом. Чтобы получить какой-то карьерный рост, нужно выглядеть «с иголочки», поэтому я решила кардинально заняться своим имиджем.
<br><br>
До тренинга в моем гардеробе были только белые рубашки, черная обувь, 2 сумки: бежевая и черная, практически вся одежда бесформенная и не интересная. Настроение и уверенность в себе были на соответствующем уровне. Вещи покупались из раза в раз одинаковые, серые и безликие.
<br><br>
По мере прохождения тренинга, я составляла комплекты, добавляя какие-то украшения, делая образы лаконичными, женственными и насколько возможно интересными. Практически каждый день я получала комплименты от коллег, зам. генерального директора «оценила» мой внешний вид, сказав, что выгляжу элегантно, со вкусом и по-деловому.
<br><br>
На одной деловой поездке с директором, получив от него комплимент, состоялся разговор, что мне надо сделать, чтобы получить повышение! Теперь я очень хорошо прочувствовала, как важен стиль, дресс-код и аккуратность в одежде.
<br><br>
Я основательно почистила гардероб, отдала все вещи, которые подчеркивают какие-то мои недостатки. Избавилась примерно от 2/3 своих вещей! Сейчас составила список must have, буду потихоньку добавлять их в свой гардероб, предстоит большооой shoooopping Теперь при виде вещи в голове рождается образ, какие комплекты можно составить.
<br><br>
Тренинг помог мне не только с разбором гардероба, но и появилось «чуткость к цветам»: в ванной была сделана интересная переделка, всего лишь с помощью баллончика краски и капельки фантазии. Хочется добавить цветов в интерьер. Хочется заниматься своей внешностью: ноготочки; делать прически ежедневно, а не только по праздникам; макияж. В общем, есть, где развернуться и применять новые знания!
<br><br>
Тренинг погрузил меня в совершенно другой мир: жакеты, блейзеры, футлярные платья и лодочки. Раньше в моем лексиконе даже таких слов не было. Были совершенно новыми материалы по цветотипу: никогда не следовала этим правилам, хотя и замечала, что некоторые цвета совершенно не идут к лицу. Информации очень много, интересной и разнообразной.
<br><br>
На работе – комплименты; стали относиться серьезнее, что очень важно для молодого специалиста! Очень чувствуется мужское внимание!
<br><br>
Тема с подходящими цветами довольно глубокая. За одно занятие все не изучить. Буду переслушивать занятия, учиться составлять интересные образы не только в офис, но и в повседневной жизни.
 <br><br>
Я очень благодарна Екатерине за интересный результативный тренинг!

</p>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-3.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-4.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-5.jpg" alt="" width="150"/></a></td>
</tr>

<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-6.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/06/Evgenia-Bocharova-6.jpg" alt="" width="150"/></a></td>
<td></td>
</tr>

</tbody>
</table>
</center>
				  </div>
					<div class="bot">Евгения Бочарова, Москва, Работает в сфере строительства специалистом по согласованию</div>
				</div>	
</div>
		
		<div class="bl_name">Некоторые отзывы на модуль <br>
		  «Революция цвета» </div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava06.png"></div>
						<div class="txt">Проблемы с гардеробом я пыталась решить с помощь тренинга и кажется уже вижу свет в конце тоннеля, процентов 40 от того, что лежало мертвым грузом собирается в свежие интересные комплекты. Огромное спасибо Кате, ее советы просто неоценимы, ее внимание к деталям просто восхищает.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Я живу в маленьком районном городке всего 16 тысяч населения,выбора одежды практически никакого нет, нужно ездить за 230км, я предприниматель и могу себе это позволить, но времени на покупки очень мало, все берется на бегу, по совету продавцов, а потом пылится оттого, что либо не идет, либо неизвестно, с чем компоновать.
<br><br>
Эти проблемы я и пыталась решить с помощь тренинга и кажется уже вижу свет в конце тоннеля, процентов 40 от того, что лежало мертвым грузом собирается в свежие интересные комплекты. В планах докупить аксессуары-платки, браслеты, ремни, а обувь нужно обновить полностью.
<br><br>
Огромное спасибо Кате, ее советы просто неоценимы, ее внимание к деталям просто восхищает.
</p>
<center>
<table>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-1.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-3.jpg" alt="" width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-4.jpg" alt="" width="150"/></a></td>
	</tr>
	<tr>
<td></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-5.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-anny-5.jpg" alt="" width="150"/></a></td>
<td></td>
</tr>
</table>
</center>  
	  
		  
			  
				  </div>
					<div class="bot">Анна Лавданская, предприниматель</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava_none.png"></div>
						<div class="txt">Знакомые и коллеги говорят ооооо какая элегантная и красивая, а люди на улицах просто рассматривают с интересом. Теперь я не боюсь использовать яркие цвета и смелые сочетания. Эмоции суперположительные и огромный заряд позитива и настрой на успех спасибо вам всем большое!!!</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>До тренинга подбирала гардероб в скучных тонах так как не знала как можно сочетать цвета и еще чтобы было интересно и разнообразно. Покупала 1 яркую вещь и то на лето и этим ограничивалась.
<br><br>
Тренинг помог определить цветотип в первую очередь, научилась выбирать вещи в соответствии с ним, составила новые комплекты на весну лето, получились вкусные. Теперь я не боюсь использовать яркие цвета и смелые сочетания.
<br><br>
Эмоции суперположительные и огромный заряд позитива и настрой на успех спасибо вам всем большое!!!
<br><br>
Знакомые и коллеги говорят ооооо какая элегантная и красивая а люди на улицах просто рассматривают с интересом
<br><br>
Не достаточно хорошо еще проработана тема аксесуаров и хочу делать комплекты в разных стилях но пока трудновато. Переслушиваю тренинг просматриваю информацию на вашем сайте а так же в журналах моды.
</p>
<center>
<table>
<tbody>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-olgi-2-1.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-olgi-2-1.jpg" alt="" width="150" align="left" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-olgi-2-3.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-olgi-2-3.jpg" alt="" width="150" align="left" /></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-olgi-2-2.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bigcolor-olgi-2-2.jpg" alt="" width="150" align="left" /></a></td>
</tr>
</tbody>
</table>

</center>
				  </div>
					<div class="bot">Ольга, г. Овьедо, Испания, врач приемного отделения, центральный госпиталь Астуриаса</div>
				</div>	
</div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava07.png"></div>
						<div class="txt">Теперь я профессионал в сочетании цветов:))) Эмоции самые положительные. И это доказывает количество тренингов, которые я уже купила у вас!!! :))) Видя, как я составляю комплекты, мама сразу подхватила: и мне! и мне! Собрала в программе гардероб для нее — теперь радуется и ищет в магазинах похожие вещи. Дочка (5 лет), кстати, теперь компьютер отбирает: «Мама, хочу комплекты составлять!» Любимое занятие её:)))</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Непосредственно перед началом тренинга была проблема с определением цветотипа. В другой школе стиля мне определили совершенно не тот цветотип, начала покупать вещи в соответствии с их рекомендациями и ничего не могла понять — надеваю и вижу, что не идут! Так, в целом, интуитивно чувствовала свои цвета. Ругала себя за черный, но тут, успокоили, что как раз мне он идет (хотя, редко кому). Но всё равно… для зимы стандартно черные сапоги, черная сумка — теперь понимаю, что скучно. В плане летней одежды цветов никогда не боялась, но не особо умела их сочетать.
<br><br>
Теперь я профессионал в сочетании цветов:))) (не знаю, как на практике — наверно, еще нужен опыт, — но по личным ощущениям — точно:))))
Сделала не много. Под зеленый пуховик купила темно красный палантин. Получилось очень красиво. Даже пуховик залюбила после этого (хотя перед этим думала что-то другое из верхней одежды купить). Из остального: провела ревизию в шкафу и выкинула почти все вещи — осталась маленькая полочка вещей, которые я ношу. Когда буду покупать что-то взамен выкинутому — даже не знаю. Пока денег нет:)) Ну, на компьютере в программе натренировалась составлять комплекты — надеюсь, в жизни будет так же легко теперь.
<br><br>
Эмоции самые положительные. И это доказывает количество тренингов, которые я уже купила у вас!!! :)))
<br><br>
Реакции окружающих особо не было по причине того, что не было денег на новые образы. Но видя, как я составляю комплекты, мама сразу подхватила: и мне! и мне! Собрала в программе гардероб для нее — теперь радуется и ищет в магазинах похожие вещи. Дочка (5 лет), кстати, теперь компьютер отбирает: «Мама, хочу комплекты составлять!» Любимое занятие её:)))
<br><br>
Думаю, что практика нужна теперь. И хочу еще подробнее в других цветотипах разобраться, чтоб не только для себя одежду подбирать, но и для других.
</p>
				  <center>
				  	<table>
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-2.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-2.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-3.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-3.jpg" alt="" width="150" align="left" /></a></td>
				  		</tr>
				  		
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-4.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-4.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-5.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-5.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-6.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-6.jpg" alt="" width="150" align="left" /></a></td>
				  		</tr>
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-7.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-7.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-8.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-8.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-9.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/09/188-9.jpg" alt="" width="150" align="left" /></a></td>
				  		</tr>
				  	</table>
				  </center>

				  </div>
					<div class="bot">Татьяна Рожкова, Ростов-на-Дону, домохозяйка</div>
				</div>	
</div>
		
		<div class="bl_name">Некоторые отзывы на модуль <br>
		  «Верхняя одежда под контролем стилиста» </div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava08.png"></div>
						<div class="txt">Мои три пользы от происхождения имидж-практики: чувство уверенности в том что при любой погоде ты можешь выглядеть красиво. Возможность составить новые комплекты. И еще одно избавиться от ненужных вещей в гардеробе и посмотреть по-новому на старые.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Года два назад мне казалось, что у верхней одежды самая главная функция защита от холода, даже подумать не могла что она может быть красивой и разнообразной. И что зимой ты можешь быть красивой. Без определённых знаний было не обойтись, покупая новые вещи без определённого ориентира сложно и это не приносило результата.
<br><br>
На практике я купила 2 новые вещи это шуба жёлтого цвета и пальто короткое на весну, составила новые интересные комплекты, не только на зиму, но и на весну. Благодаря имидж практике по головным уборам добавила в комплекты и новые головные уборы.
<br><br>
Мои три пользы от происхождения имидж-практики: чувство уверенности в том что при любой погоде ты можешь выглядеть красиво. Возможность составить новые комплекты. И еще одно избавиться от ненужных вещей в гардеробе и посмотреть по-новому на старые.
<br><br>
Много информации и картинок. Я проходила имидж практику в очень скоростном режиме, не успела составить коллажи, мало вариантов комплектов хотелось еще больше. Мало времени потратила на магазины и примерку.
</p>
				  <center>
				  	<table>
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-1.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-1.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-2.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-2.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-3.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-3.jpg" alt="" width="150" align="left" /></a></td>
				  		</tr>
				  		
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-4.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-4.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-5.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-5.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-6.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-6.jpg" alt="" width="150" align="left" /></a></td>
				  		</tr>
				  		
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-7.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-7.jpg" alt="" width="150" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-8.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/outerwear-iriny-8.jpg" alt="" width="150" align="left" /></a></td>
				  			<td></td>
				  		</tr>
				  	</table>
				  </center>

				  </div>
					<div class="bot">Ирина Рубио, Москва, художник по костюмам</div>
				</div>	
</div>
		
		<div class="bl_name">Некоторые отзывы на модуль <br>
		  «Шоппинг осень-зима под контролем стилиста» </div>
			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava09.png"></div>
						<div class="txt">Имидж-практика, во-первых, напомнила, что любить себя необходимо. Мой образ в красном, который я составила на международный бизнес-форум, очень обрадовал и воодушевил мужа. Вот уж не думала, что ему не всё равно, как я одета на деловых мероприятиях. На встречах коллеги отмечают изменения в моем стиле — делают комплименты мелочам, которые я раньше практически не использовала. Оказывается, окружающие нас люди радуются, когда мы чем-то радуем их взор.</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Я живу прямо на границе с Китаем — Благовещенск Амурской области.
<br><br>
Для того, чтобы участвовать в имидж-практике, я вставала в четыре часа утра. И это было очень правильно — атмосфера живого он-лайн общения несравнима с прослушиванием семинаров в записи. Кроме того, я имела возможность задавать свои вопросы профессионалу.
<br><br>
Я врач, юрист и предприниматель в сфере электронной коммерции. Поэтому стиль моей одежды был весьма консервативен и да — скучен.
<br><br>
Ходить по магазинам в России я не люблю в принципе — меня возмущают цены. В США у меня проблем с шопингом не бывает. Проблема лишь в том, что в США я бываю не ежегодно, а в связи с выросшим курсом доллара покупки и там теперь не дешевы, но по-прежнеу куда разумнее иных альтернатив.
<br><br>
Имидж-практика, во-первых, напомнила, что любить себя необходимо. Многослойность, больше красок и разнообразия — то, чего мне так не хватало! Составление комплектов, смелое использование украшений и аксессуаров… Смешение стилей и примеры его были так же очень важны.
<br><br>
Сегодня мы с мужем и друзьями уезжаем на международный бизнес-форум в другой город, и вчера я составляла комплекты для похода на мероприятие. Хотелось взять минимум одежды, но при этом чтобы она звучала каждый раз по-разному. Мой образ в красном очень обрадовал и воодушевил мужа. Вот уж не думала, что ему не всё равно, как я одета на деловых мероприятиях.
<br><br>
На встречах коллеги отмечают изменения в моем стиле — делают комплементы мелочам, которые я раньше практически не использовала — серьги, заколочка для волос, шарфик… Оказывается, окружащие нас люди радуются, когда мы чем-то радуем их взор.
<br><br>
Я купила себе с китайского сайта тоненький пуховичок брусничного цвета, и он великолепно подошёл аж к четырем моим черным пальто — под них! Даже к пальто-бушлату. Мне очень понравилась идея многослойности в верхней одежде, и на Дальнем Востоке теплой одежды просто много не бывает.
<br><br>
Вчера зашла в магазин за разноцветныйми колготками (а раньше не позволяла себе такого, потому что читала уж слишком несовершенной форму своих ног) и ушла из магазина еще и с тремя парами обуви, шапкой, шарфом и перчатками. Катя сказала — нельзя экономить на себе, эдак всем захочется экономить на нас.:)))
<br><br>
Все три пары — абсолютно разные. Наконец нашла лодочки беж на шпильке, очень приглянулись ботиночки цвета седла на скрытой платформе, ну а корраловые туфли мне завернули в подарок.
<br><br>
Однако, это был спонтанный шопинг.
<br><br>
Я еще на научилась ходить в магазин с четкой картой покупок. Потому что если бы я пришла со списком необходимой обуви, то я должна была уйти из магазина с туфлями-оксфордами и полуботинками на тракторной подошве — что кстати в нашем климате куда необходимее. Туфли беж слишком долго искались, без них уйти было нельзя, и это в списке must have было давно.
<br><br>
Вот над этим я и буду работать — больше планирования, больше дисциплины.
</p>

				  </div>
					<div class="bot">Валерия, Благовещенск, врач, юрист и предприниматель в сфере электронной коммерции</div>
				</div>	
</div>


			<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/ava010.png"></div>
						<div class="txt">После имидж-практики все встало на свои места. Теперь у меня супер красивый и модный гардероб на весь сезон! Я с минимальными затратами составила себе полноценный, модный, острый гардероб на весь сезон. Очень понравилась имидж-практика. Сама практика и последующая работа с гардеробом доставили массу удовольствия. Женщины стали советоваться со мной по поводу одежды! Считаю это лучше любых комплиментов ))</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Проблемы с шопингом были стандартные — если нравилась вещь, я покупала ее и не думала о том, с чем буду ее носить. Так мой гардероб составляли вещи разрозненные, которые никак не удавалось собрать в красивые острые комплекты.
<br><br>
После имидж-практики все встало на свои места. Я пересмотрела весь свой гардероб, очень многое убрала. То, что осталось собрала в комплекты, поняла, что надо докупить. Теперь у меня супер красивый и модный гардероб на весь сезон! И еще: благодаря вам, Катя, я поняла, что гардероб надо обновлять каждый сезон! Несмотря на всю очевидность, это стало для меня открытием ))) Раньше я по несколько лет носила одни и те же вещи (при этом я постоянно что-то себе покупала), и не поднималась рука убрать их из гардероба. Теперь эта проблема решена!
<br><br>
Проработала гардероб, сделала карту шопинга и планомерно ее воплотила в жизнь, без лишних покупок! Купила очень красивое темно-зеленое теплое платье, оксфорды, брюки 7/8, жакет цвета сезона, много аксессуаров (браслет, 2 пары сережек, ожерелье), 2 сумки, пальто-бушлат, и самое главное впервые в жизни — шляпу. Вписала в комплекты давно лежащие без движения платки и шарфы, которые оказались очень актуальными! То есть оказалось, что я с минимальными затратами составила себе полноценный, модный, острый гардероб на весь сезон.
<br><br>
Очень понравилась имидж-практика. Сама практика и последующая работа с гардеробом доставили массу удовольствия.
<br><br>
Женщины стали советоваться со мной по поводу одежды! Считаю это лучше любых комплиментов ))
<br><br>
Недостаточно проработала верхнюю одежду, буду делать это в следующем осенне-зимнем сезоне.
<br><br>
Огромное спасибо за прекрасный семинар! Очень надеюсь на подобные имидж-практики каждый сезон!
</p>
				  <center>
				  	<table>
				  		<tr>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/shopping-osen-zima-niny-2.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/shopping-osen-zima-niny-2.jpg" alt="" width="250" align="left" /></a></td>
				  			<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/shopping-osen-zima-niny-3.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2016/01/shopping-osen-zima-niny-3.jpg" alt="" width="250" align="left" /></a></td>
				  		</tr>
				  	</table>
				  </center>

				  </div>
					<div class="bot">Нина, Гамбург, Руководитель отдела</div>
				</div>	
</div>
			
			<div class="bl_name">Некоторые отзывы на модуль <br>
		  «Шоппинг весна-лето под контролем стилиста» </div>
		  
		  <div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/shopping-ss-ekateriny.png"></div>
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
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bbf632690e2f15ebe7188a6831cf4fc1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/bbf632690e2f15ebe7188a6831cf4fc1.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/a86af92aa6d89ef3d7b601468f82d641.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/a86af92aa6d89ef3d7b601468f82d641.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/7158c927078477f7c02626c5dc6463c2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/7158c927078477f7c02626c5dc6463c2.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/662b2046fa53e75f2c07a81b02b26c3f.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/662b2046fa53e75f2c07a81b02b26c3f.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/83ba7212f1d6706efdafba280febf5dc.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/83ba7212f1d6706efdafba280febf5dc.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/61fbb9ef134addcc1197fa9221958c99.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/61fbb9ef134addcc1197fa9221958c99.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/8ce010b7ac2df4a60ee19391bba9b584.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/8ce010b7ac2df4a60ee19391bba9b584.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/01d8dfa8c6ac52796439bbc336c404c8.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/01d8dfa8c6ac52796439bbc336c404c8.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td></td>
</tr>
</tbody>
</table>
						</center>
				  </div>
					<div class="bot">Екатерина, Киев, предприниматель</div>
				</div>	
				</div>
				
				<div class="item">
				<div class="inn">
					<div class="top">
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/shopping-ss-anny.png"></div>
						<div class="txt">Имидж-практика помогла проанализировать свой гардероб, составить список покупок на шоппинг, начать мыслить образами, найти «свои» магазины. У мужа реакция положительная. Советуется, что ему купить и что надеть)</div>
						<div class="break"></div>
					</div>
					<div class="center">
						<p>Добрый день, Екатерина.</br>
Меня зовут Анна, г. Москва. Работаю начальником отдела продаж. Дресс-код &mdash; свободный стиль.
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
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-1.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-1.jpg" alt="" width="400"  data-mce-width="400"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-2.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-anny-2.jpg" alt="" width="400"  data-mce-width="400"/></a></td>
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
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/shopping-ss-natalii-3.png"></div>
						<div class="txt">После имидж-практики разобрала гардероб и научилась составлять карту покупок!! Я была в восторге от простого и понятного изложения. Карта покупок &mdash; очень нужная и полезная схема. За это отдельное спасибо!  Я чувствую себя уверенно и комфортно в новых комплектах.</div>
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
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-1.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-1.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-2.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-2.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-3.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-3.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-4.jpg" target="_blank"><img class="alignleft"  title="" src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/08/shopping-ss-natalii-3-4.jpg" alt="" width="250" align="left" style="padding:20px"/></a></td>
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
						<div class="pic"><img src="https://www.glamurnenko.ru/products/icon/images/shopping-ss-iriny-3.png"></div>
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
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/93eb706382af1adc14ed0236ff6ccc49.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/93eb706382af1adc14ed0236ff6ccc49.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/9361f25b964f5f11eb7f3c35e39b7010.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/9361f25b964f5f11eb7f3c35e39b7010.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/7a2362a5a416c156d819aadeed850273.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/7a2362a5a416c156d819aadeed850273.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/d003645b2f96e097ef08ce582a1bc3a4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/d003645b2f96e097ef08ce582a1bc3a4.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/27c8c48a95a9bd5c01986cc527575eb4.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/27c8c48a95a9bd5c01986cc527575eb4.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/67ba480bc2cbc33a5b09063c46413593.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/67ba480bc2cbc33a5b09063c46413593.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
</tr>
<tr>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/be90238c6c03d085e9483008fc800aff.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/be90238c6c03d085e9483008fc800aff.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/ec902c51c30b7f7df40dab513cda15a3.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/ec902c51c30b7f7df40dab513cda15a3.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
<td><a href="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/3767ce3a22ef5f03a8232c936ea3239b.jpg" target="_blank"><img src="https://www.glamurnenko.ru/blog/wp-content/uploads/2015/09/3767ce3a22ef5f03a8232c936ea3239b.jpg" alt="" width="150"  data-mce-width="150"/></a></td>
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
                      <center><a href="https://www.glamurnenko.ru/blog/reviews/" target="_blank">прочитать все отзывы ( <?=$C; ?> шт. )</a></center>
					  <div class="break"></div></div></div>	
			</div>
		</div>
	</div>

	<div class="footer">
		По всем вопросам вы можете писать в службу поддержки:<br>
		<a href="https://www.glamurnenko.ru/blog/contacts/">https://www.glamurnenko.ru/blog/contacts/</a> tel.: +7(<strong><span itemprop="telephone">499</span></strong>)350-23-35<br>
		© 2005-2017, ИП Косенко Андрей Владимирович, ОГРН 308614728400011<br>
	</div>

</div>
</body>
</html>
  

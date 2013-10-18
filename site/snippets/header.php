<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="no-js ie6 oldie"><![endif]-->
<!--[if IE 7]><html lang="ru" class="no-js ie7 oldie"><![endif]-->
<!--[if IE 8]><html lang="ru" class="no-js ie8 oldie"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<title><? if(!$page->isHomePage()): ?><? echo html($page->title()) ?> — <? endif ?><? echo html($site->title()) ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="/styles/screen.css">
</head>
<body>
	<header class="header" role="banner">
		<div class="header-wrap">
			<div class="header-title">
<? if(!$page->isHomePage()): ?>
				<a href="/">
<? endif ?>
					<h1>Dev.<span>Opera</span></h1>
<? if(!$page->isHomePage()): ?>
				</a>
<? endif ?>
			</div>
			<form action="http://google.com/" method="get">
				<fieldset class="header-search">
					<input type="text" name="q" placeholder="Search Dev.Opera">
					<input type="hidden" name="site" value="dev.opera.com">
				</fieldset>
			</form>
		</div>
	</header>
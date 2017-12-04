<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>
    <title>Projekt IIS</title>
    <style type="text/css">
    	table { border-collapse: collapse; }
    	td, th { border: 1px solid black; padding: 0.3em 0.5em; text-align: left; }
    	dt { font-weight: bold; margin-top: 0.5em; }
    </style>
</head>
<body>

<!-- Zkontrolujte prosím nastavení kódování v hlavičce dokumentu 
     podle použitého editoru -->

<h1>Hudební festivaly a koncerty</h1> <!-- Nahradte názvem svého zadání -->
<p>Zadání IUS č. 47</p>

<dl>
	<dt>Autoři</dt>
	<dd>David Illichmann <!-- Nahraďte skutečným jménem a e-mailem autora a popisem činnosti -->
	    <a href="mailto:xillic00@stud.fit.vutbr.cz">xillic00@stud.fit.vutbr.cz</a> -
		Search,Interpret, Festival, Uživatelé kontrolery a repozitáře s nimi pracující, Dokumentace
	</dd>
	<dd>Tomáš Fryč <!-- Nahraďte skutečným jménem a e-mailem autora a popisem činnosti -->
	    <a href="mailto:xfryct00@stud.fit.vutbr.cz">xfryct00@stud.fit.vutbr.cz</a> -
		Tickety, TicketType, Concert kontrolery a repozitáře s nimi pracující, Migrace, Seedy
	</dd>
	<dt>URL aplikace</dt>
	<dd><a href="http://www.stud.fit.vutbr.cz/~xillic00/">http://www.stud.fit.vutbr.cz/~xillic00/</a></dd>
</dl>

<h2>Uživatelé systému pro testování</h2>
<table>
<tr><th>Login</th><th>Heslo</th><th>Role</th></tr>
<tr><td>admin@admin.com</td><td>secret</td><td>Administrátor</td></tr>
<tr><td>organiser@organiser.com</td><td>secret</td><td>Pořadatel</td></tr>
<tr><td>user@user.com</td><td>secret</td><td>Zákazník</td></tr>
</table>

<h2>Implementace</h2>
<p>Pro implementaci naší aplikace jsme použili framework Laravel ve verzi 5.5, dále pak Bootstrap. Pro práci s databází jsme použili MySQL. Pro vývoj byl využita služba Github.</p>
<p>Naše aplikace funguje na modelu MVC. Routy, které se následně odkazují na dané kontrollery jsou popsány v iis-project55/routes/web/.
	V iis-project55/app/Http/Controllers/ můžeme najít všechny kontrollery řídící přechody mezi stránkami naší aplikace. Tyto kontrollery poté získávají data
	z repozitářů. Všechny repozitáře jsou registrovány jedním ServiceProviderem iis-project55/app/Providers/IisServiceProvider/. Na tyto repozitáře jsou
	v souboru iis-project55/app/helpers=repositories.php vytvořeny helper funkce pro jednoduché volání funkcí. Všechny repozitáře jsou ve adresáři iis-project55/app/Repositories/.
	Repozitáře pracují s databází - tzn. mažou, updatují a hlavně získávají data z databázových tabulek, tyto data poté jsou využity k naplnění Itemů (modelů).
	Všechny tyto itemy jsou pod namespacem app/ v adresáři iis-project55/app/. Získané naplněné itemy jsou vráceny kontroleru. Ten poté rozhodujé jaké view je zvoleno.
	Do tohoto view je zpravidla vložen i naplněný item. Ve view jsou používány public funkce pro přístupu k datům uloženým v itemu.
	Všechny views jsou v adresáři iis-project55/resources/views a v podadresářích.
</p>
<h2>Instalace</h2>
<h3>Postup instalace na server</h3>
<ul>
	<li>Pro stažení git clone https://github.com/xillic00/iis-projekt.git </li>
	<li>Spustíme příkaz 'composer update' </li>
	<li>Do souboru .env nakonfigurujeme potřebné proměnné viz <a href="https://laravel.com/docs/5.5/configuration">dokumentace laravelu</a> </li>
	<li>Pro vytvoření tabulek použijte terminálový příkaz 'php artisan migrate'. Pro spuštění seed dat potom 'php artisan db:seed'. </li>
	<li>Případně lze využít sql skript pro namigrování tabulek. /iis-project55/database/iis-project_2017-12-04.sql </li>
	<li>Pro spuštění na serveru eva bzl ještě upraven soubor .htaccess </li>
</ul>
<h3>Softwarové požadavky (verze PHP apod.)</h3>
<ul>
	<li>Verze php: >=7.0</li>
</ul>

<h2>Známé problémy</h2>
<p>Dle našeho modelu případu užití jsme neimplementovali administrátorskou akci - Tisk informací pro pořadatele -
	nevěděli jsme jak toto implementovat jelikož všechny informace mají pořadatele již na webu. </p>
<p>Platba vstupného byla jen simulována mezistránkou, v reálném nasazení by byla určitě použita nějaká z platebních bran typu GoPay, ČSOB  a podobně. </p>

</body>
</html>

<!DOCTYPE html SYSTEM "about:legacy-compat">
<html xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<head>
<title> خريطة الموقع | رقمى البريدى أية ؟ </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="robots" content="noindex">
<title> Sitemap</title>
<style>
html, body, h1, p, a {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 1em;
	font: inherit;
	line-height: 1;
	vertical-align: baseline;
	}

body {
	color: #333;
	font: 10px 'Helvetica Neue', Helvetica, Arial sans-serif;
	margin: 0 auto;
	max-width: 1000px;
	min-width: 600px;
	padding: 30px 20px 20px;
	}

h1 {
	color: #000;
	font-size: 30px;
	font-weight: 300;
	margin-bottom: 15px;
	}

p {
	font-size: 14px;
	line-height: 24px;
	padding: 5px 0;
	}

a {
	color: #0578B2;
	text-decoration: none;
}
a:hover { text-decoration: underline; }

table {
	border-collapse: collapse;
	margin-top: 30px;
	font-size: 13px;
	}

th {
	padding-bottom: 8px;
	text-align: left;
	vertical-align: bottom;
	min-width: 80px;
	width: 80px;
}
th:first-child {
	padding-left: 6px;
	width: 100%;
	}

tr:nth-child(2n) {
	background: #F5F5F5;
	border-bottom: #EEE 1px solid;
	border-top: #EEE 1px solid;
	}

td { 
	line-height: 18px;
	padding: 2px 0;
}
td:first-child {
	padding-left: 6px;
	padding-right: 40px;
	}
	td a { color: #16406F; }
	td a:hover { color: #000; }
	td a:active, td a:visited { color: #989898; }

#chfreq-head {
	min-width: 100px;
	width: 100px;
	}

#lastmod-head {
	min-width: 125px;
	width: 125px;
	}
</style>
</head>


<body>

<table>

<thead><tr>
<th>URL</th>
<th>Priority</th>
<th id="chfreq-head"><abbr title="Update Frequency">Update Freq.</abbr></th>
<th id="lastmod-head">Last Modified</th>
</tr></thead>
   <?php foreach($urls as $url) { ?>
    <tr>
        <td><a href="<?= $url['route'] ?>" target='_blank'> <?= $url['route'] ?> </a></td>
        <td><?= $url['priority'] ?></td>
        <td><?= $url['changefreq'] ?></td>
        <td><?= $url['date'] ?></td>
        
    </tr>
    <?php } ?>


</table>




</body>
</html>
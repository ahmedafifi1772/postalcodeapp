 <urlset version="1.0" encoding="UTF-8" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

     
	 <?php foreach($urls as $url) { ?>
   <url>

      <loc>        <?= $url['route'] ?>    		</loc>

      <lastmod>    <?= $url['date'] ?>     		</lastmod>

      <changefreq> <?= $url['changefreq'] ?> 	</changefreq>

      <priority>   <?= $url['priority'] ?>      </priority>

  </url>

	 <?php } ?>


</urlset> 


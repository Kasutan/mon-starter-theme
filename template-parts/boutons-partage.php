<?php 


	$link=str_replace(":", "%3A", get_the_permalink());?>
	<div class="boutons-partage">
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link;?>"  class="icone-partage"
		title="Cliquez pour partager sur Facebook" rel="noopener noreferrer" target="blank"   >
		<img src="<?php echo kasutan_get_picto_social_url('facebook');?>" alt=Facebook" heigh="20" width="20"/>
		<span class="screen-reader-text">Cliquez pour partager sur Facebook (ouvre dans une nouvelle fenêtre)</span></a>

		<a href="https://twitter.com/home?status=<?php echo $link;?>"  class="icone-partage"
		title="Cliquez pour partager sur Twitter" rel="noopener noreferrer" target="blank"   >
		<img src="<?php echo kasutan_get_picto_social_url('twitter');?>" alt="Twitter" heigh="20" width="20"/>
		<span class="screen-reader-text">Cliquez pour partager sur Twitter (ouvre dans une nouvelle fenêtre)</span></a>

		<a href="https://api.whatsapp.com/send?text=<?php echo $link;?>" class="icone-partage"
		title="Cliquez pour partager sur Whatsapp" rel="noopener noreferrer" target="blank"   >
		<img src="<?php echo kasutan_get_picto_social_url('whatsapp');?>" alt="Whatsapp" heigh="20" width="20"/>
		<span class="screen-reader-text">Cliquez pour partager sur Whatsapp (ouvre dans une nouvelle fenêtre)</span></a>

		<a href="#" class="icone-partage"
		title="Cliquez pour partager sur un autr réseau" rel="noopener noreferrer" target="blank"   >
		<img src="<?php echo kasutan_get_picto_social_url('share');?>" alt="Partager" heigh="20" width="20"/>
		<span class="screen-reader-text">Cliquez pour partager sur un autre réseau (ouvre dans une nouvelle fenêtre)</span></a>


		<a href="mailto:?&body=<?php echo $link;?>" class="icone-partage"
		title="Cliquez pour partager par email" rel="noopener noreferrer" target="blank"   >
		<img src="<?php echo kasutan_get_picto_url('email');?>" alt="email" heigh="20" width="20"/>
		<span class="screen-reader-text">Cliquez pour partager par email (ouvre dans une nouvelle fenêtre)</span></a>
            
	</div>

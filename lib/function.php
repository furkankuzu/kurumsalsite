<?php
	
	//VERITABANINA BAGLANMA KISMI.

	try{
			
		$baglanti=new PDO("mysql:host=localhost; dbname=kurumsal; charset=utf8", "root","");
		$baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}
	catch(PDOException $e) {
	
		die($e ->getMessage());
	}



class kurumsal{
	
	public $normalTitle,$metaTitle,$metaDesc,$metaKey,$metaAuthor,$metaOwner,$metaCopy,$logo,$twit,$face,
		$insta,$phoneNumber,$normalAddress,$mailAddress,$slogan,$mapAdress,
		$referenceContent,$fleetContent,$customerContent,$contactContent,$hizmetlerbaslik;

	
	
	
	//Ayarları veritabanından çekiyor.
	function __construct(){

		try{
			
			$baglanti=new PDO("mysql:host=localhost; dbname=kurumsal; charset=utf8", "root","");
			$baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
			}
		catch(PDOException $e) {
			
			die($e ->getMessage());
			}
	
		$ayarCek=$baglanti->prepare("select * from settings");
		$ayarCek->execute();
		$sorguSon=$ayarCek->fetch();

		$this->normalTitle=$sorguSon["title"];
		$this->metaTitle=$sorguSon["metatitle"];
		$this->metaDesc=$sorguSon["metadesc"];
		$this->metaKey=$sorguSon["metakey"];
		$this->metaAuthor=$sorguSon["metaauthor"];
		$this->metaOwner=$sorguSon["metaowner"];
		$this->metaCopy=$sorguSon["metacopy"];
		$this->logo=$sorguSon["logo"];
		$this->twit=$sorguSon["twit"];
		$this->face=$sorguSon["face"];
		$this->insta=$sorguSon["insta"];
		$this->phoneNumber=$sorguSon["phoneno"];
		$this->normalAddress=$sorguSon["address"];
		$this->mailAddress=$sorguSon["mailaddress"];
		$this->slogan=$sorguSon["slogan"];
		$this->mapAdress=$sorguSon["mapAdress"];
		$this->referenceContent=$sorguSon["referenceContent"];
		$this->fleetContent=$sorguSon["fleetContent"];
		$this->customerContent=$sorguSon["customerContent"];
		$this->contactContent=$sorguSon["contactContent"];
		$this->hizmetlerbaslik=$sorguSon["hizmetlerbaslik"];
		
	}	
	
	
	//Carousel Resimlerini çekiyor.
	function carouselPicture($baglanti){
		
		$introAl=$baglanti->prepare("select * from carousel");
		$introAl->execute();

		while($sonucum=$introAl->fetch(PDO::FETCH_ASSOC)):
			
			echo '<div class="item" style="background-image: url('.$sonucum["picPath"].')"></div>';

		endwhile;
	}
	
	//hakkimizda kisminin her seyini veritabanından ceker.
	function aboutUs($baglanti){
		
		$introAl=$baglanti->prepare("select * from aboutUs");
		$introAl->execute();

		
		$sonucum=$introAl->fetch();
		 

		echo '
		<div class="row">
		
			<div class="col-lg-6 hakkimizda-img">
			
			<img src="'.$sonucum["picture"].'" alt="'.$sonucum["picture"].'-Hakkında"/>
			
			
			</div>
	
	
			<div class="col-lg-6 content">
	
			<h2>'.$sonucum["header"].'</h2>
			<h3>'.$sonucum["content"].'</h3>
			
	
			</div>
		</div>';
	
	}
	
	
	// Hizmetler bölümünün tamamını veritabanından ceker.
	function services($baglanti){
		
		$introAl=$baglanti->prepare("select * from services");
		$introAl->execute();

		echo'<div class="section-header">
				
				<h2>Hizmetlerimiz</h2>
				<p>'; echo $this->hizmetlerbaslik ; echo'</p>
			
			</div>

		<div class="row">';
		while($sonucum=$introAl->fetch(PDO::FETCH_ASSOC)):

			echo'<div class="col-lg-6">
					<div class="box wow fadeInTop">
				
						<div class="icon"><i class="fa fa-certificate"></i></div>
						<h4 class="title"><a href="#">'.$sonucum["baslik"].'</a></h4>
						<p class="description">'.$sonucum["icerik"].' </p>
					</div>
				</div>';

		endwhile;

		echo '</div>';
	}


	//referanslar kısmı veritabanından geliyor.
	function references($baglanti){
		
		$introAl=$baglanti->prepare("select * from referanslar");
		$introAl->execute();

		echo 
		'<div class="section-header">
				
		<h2>Referanslar</h2>
		<p>';echo $this->referenceContent; echo '</p>
		</div>

		<div class="owl-carousel clients-carousel">';

		while($sonucum=$introAl->fetch(PDO::FETCH_ASSOC)):

			echo '<img src="'.$sonucum["picturePath"].'" alt="'.$sonucum["id"].'-Referans" />';

		endwhile;

		echo '</div>';
	}


	//FILO KISMI
	function fleet($baglanti){
		
		$introAl=$baglanti->prepare("select * from fleet");
		$introAl->execute();

		echo '<div class="container">
			
		<div class="section-header">
			
			<h2>Araç Filomuz</h2>
			<p>'; echo $this->fleetContent;   echo '</p>
			
		</div>
		</div>


		<div class="container-fluid">
		<div class="row no-gutters">';
				
		while($sonucum=$introAl->fetch(PDO::FETCH_ASSOC)):



			echo '<div class="col-lg-3 col col-md-4">
				<div class="filo-item wow fadeInUp">
					<a href="'.$sonucum["picPath"].'" class="filo-popup">
					<img src="'.$sonucum["picPath"].'" alt="'.$sonucum["id"].'-Filo"/>
						<div class="filo-overlay">
								
						</div>
					</a>
				</div>
			</div>';

		endwhile;
		
		
		echo '</div></div> ';

	}

	//MUSTERI YORUMU KISMI
	function comment($baglanti){
		
		$introAl=$baglanti->prepare("select * from comment");
		$introAl->execute();

		echo '<div class="section-header">
		<h2>Müşteri Memnuniyeti</h2>
		<p>'; echo $this->customerContent;  echo'</p>
		</div>
	
	
		<div class="owl-carousel testimonials-carousel">';

		while($sonucum=$introAl->fetch(PDO::FETCH_ASSOC)):


			
		echo '
		<div class="testimonial-item">
			<p>
				<img src="img/sol.png" class="quote-sign-left"  />
				'.$sonucum["content"].'
				<img src="img/sag.png" class="quote-sign-right" />
			</p>
			<img src="img/yorum.jpg" class="testimonial-img" alt=""/>
			<h3>'.$sonucum["name"].'</h3>
		</div>
		';
		endwhile;

		echo '</div>';
		

	}
}
?>





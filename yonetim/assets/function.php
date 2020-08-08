<?php  ob_start();


	try{
			
		$baglanti=new PDO("mysql:host=localhost; dbname=kurumsal; charset=utf8", "root","");
		$baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		

	}
	catch(PDOException $e) {
	
		die($e ->getMessage());
	}


	class yonetim{

		//genel sorgu.
		function sorgum ($vt,$sorgu,$tercih=0){
			$al=$vt->prepare($sorgu);
			$al->execute();

			if($tercih==1):
				return	$al->fetch();

			elseif($tercih==2):
				return $al;
			endif;
		}
		//site ayar.
		function siteAyar($baglanti){

			$sonuc=$this->sorgum($baglanti,"select * from settings",1);

			if($_POST):

				//form input elemanlarının 'name' değerleri ile değişkenlerimiz eşitleniyor.
				
				$title = htmlspecialchars($_POST["title"]);
				$metatitle = htmlspecialchars($_POST["metaTitle"]);
				$metadesc = htmlspecialchars($_POST["metaDesc"]);
				$metakey = htmlspecialchars($_POST["metaKey"]);
				$metaauthor = htmlspecialchars($_POST["metaAuthor"]);
				$metaowner = htmlspecialchars($_POST["metaOwner"]);
				$metacopy = htmlspecialchars($_POST["metaCopy"]);
				$logo = htmlspecialchars($_POST["logo"]);
				$twit = htmlspecialchars($_POST["twit"]);
				$face = htmlspecialchars($_POST["face"]);
				$insta = htmlspecialchars($_POST["insta"]);
				$phoneno = htmlspecialchars($_POST["phoneNo"]);
				$address = htmlspecialchars($_POST["address"]);
				$mailaddress = htmlspecialchars($_POST["mail"]);
				$slogan = htmlspecialchars($_POST["slogan"]);
				$referenceContent = htmlspecialchars($_POST["reference"]);
				$fleetContent = htmlspecialchars($_POST["fleet"]);
				$customerContent = htmlspecialchars($_POST["comment"]);
				$contactContent = htmlspecialchars($_POST["contact"]);
				//$hizmetlerbaslik = htmlspecialchars($_POST["hizmetlerbaslik"]);


				//bu kısımda değişkenlerin doluluk,boşluk kontrolleri yapılabilir.
				//if(title=="") gibi.

				
				//veritabanındaki sütunlarımız set edilmek için guncelleme degişkeninde tutuluyor.
				$guncelleme=$baglanti->prepare("update settings set title=?,metatitle=?,
				metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logo=?,twit=?,
				face=?,insta=?,phoneno=?,address=?,mailaddress=?,slogan=?,referenceContent=?,
				fleetContent=?,customerContent=?,contactContent=?");

				//değişkenlerimizdeki değerleri sütunlarımızın yanındaki '?' simgelerine sıralarıyla atıyoruz.
				$guncelleme->bindParam(1,$title,PDO::PARAM_STR);
				$guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
				$guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
				$guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
				$guncelleme->bindParam(5,$metaauthor,PDO::PARAM_STR);
				$guncelleme->bindParam(6,$metaowner,PDO::PARAM_STR);
				$guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
				$guncelleme->bindParam(8,$logo,PDO::PARAM_STR);
				$guncelleme->bindParam(9,$twit,PDO::PARAM_STR);
				$guncelleme->bindParam(10,$face,PDO::PARAM_STR);
				$guncelleme->bindParam(11,$insta,PDO::PARAM_STR);
				$guncelleme->bindParam(12,$phoneno,PDO::PARAM_STR);
				$guncelleme->bindParam(13,$address,PDO::PARAM_STR);
				$guncelleme->bindParam(14,$mailaddress,PDO::PARAM_STR);
				$guncelleme->bindParam(15,$slogan,PDO::PARAM_STR);
				$guncelleme->bindParam(16,$referenceContent,PDO::PARAM_STR);
				$guncelleme->bindParam(17,$fleetContent,PDO::PARAM_STR);
				$guncelleme->bindParam(18,$customerContent,PDO::PARAM_STR);
				$guncelleme->bindParam(19,$contactContent,PDO::PARAM_STR);
				
				

				$guncelleme->execute();

				echo '<div class="alert alert-success" role="alert">
				
				<strong>Site ayarları </strong>başarıyla güncellendi.
				
				</div>';
				header("refresh:1.5,url=control.php?sayfa=settings");

			else:
			?>
			<form action="control.php?sayfa=settings" method="post">

				<div class="row" >
				<div class="col-lg-7 mx-auto mt-3">

				
					<h3 class="text-info">Site Ayarları</h3>
				</div>
				<!---**************************---->
				<div class="col-lg-7 mx-auto mt-3 border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
						<span style="font-size: 18px;">Başlık</span>
						
					</div>
					<div class="col-lg-9 p-1">
						<input type="text" name="title" class="form-control" value="<?php echo $sonuc["title"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Meta Başlık</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="metaTitle" class="form-control"value="<?php echo $sonuc["metatitle"]?>"  />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Site Açıklama</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="metaDesc" class="form-control" value="<?php echo $sonuc["metadesc"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Meta Key</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="metaKey" class="form-control" value="<?php echo $sonuc["metakey"]?>"  />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Meta Author</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="metaAuthor" class="form-control" value="<?php echo $sonuc["metaauthor"]?>"  />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Owner</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="metaOwner" class="form-control" value="<?php echo $sonuc["metaowner"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Meta Copyright</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="metaCopy" class="form-control" value="<?php echo $sonuc["metacopy"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Logo yazısı</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="logo" class="form-control" value="<?php echo $sonuc["logo"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Twitter</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="twit" class="form-control" value="<?php echo $sonuc["twit"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Facebook</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="face" class="form-control" value="<?php echo $sonuc["face"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Instagram</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="insta" class="form-control" value="<?php echo $sonuc["insta"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Telefon No</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="phoneNo" class="form-control" value="<?php echo $sonuc["phoneno"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Adres</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="address" class="form-control" value="<?php echo $sonuc["address"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Mail</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="mail" class="form-control" value="<?php echo $sonuc["mailaddress"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Slogan</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="slogan" class="form-control" value="<?php echo $sonuc["slogan"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Referans Başlık</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="reference" class="form-control" value="<?php echo $sonuc["referenceContent"]?>" />
					</div>

					</div>
				</div><!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Filo Başlık</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="fleet" class="form-control" value="<?php echo $sonuc["fleetContent"]?>" />
					</div>

					</div>
				</div><!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">Yorum Başlık</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="comment" class="form-control" value="<?php echo $sonuc["customerContent"]?>" />
					</div>

					</div>
				</div>

				<!---**************************---->
				<div class="col-lg-7 mx-auto border">
					<div class="row">

					<div class="col-lg-3 border-right pt-3 text-left">
					<span style="font-size: 18px;">İletişim başlık</span>
					</div>

					<div class="col-lg-9 p-1">
						<input type="text" name="contact" class="form-control" value="<?php echo $sonuc["contactContent"]?>" />
					</div>

					</div>
				</div>


				</div>

				<div class="col-lg-7 mx-auto mt-3 border-bottom">
				<input type="submit" name="buton" class="btn btn-rounded btn-info m-1" value="Güncelle">
				</div>

			</form>


				<?php

			endif;

		}

		//-----------------------ADMİN GİRİŞİ--------------------------------------
		
		function sifrele($veri){
			return base64_encode(gzdeflate(gzcompress(serialize($veri))));
		}

		function coz($veri){

			return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
			
		}
		//kullanici adi aliniyor.
		function kuladial($vt){

			$cookid=$_COOKIE["kulbilgi"];
			$cozduk=$this->coz($cookid);

			$sorgusonuc=$this->sorgum($vt,"select * from yonetim where id=$cozduk",1);
			return $sorgusonuc["kulad"];

		}
		//giris kontrol.
		function giriskontrol($kulad,$sifre,$vt){

			$sifrelihal=md5(sha1(md5($sifre)));
			$sor=$vt->prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'");
			$sor->execute();
			

			if($sor->rowCount()==0):

				echo'
				<div class="container-fluid bg-white">
					<div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-danger font-14 font-weight-bold">
					<img src="loading.gif" width="150" /><br>GİRDİĞİNİZ BİLGİLER HATALIDIR !
					</div>
				</div>';
				header("refresh:2,url=index.php");
			else:
				$gelendeger=$sor->fetch();
				$sor=$vt->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
				$sor->execute();
				

				echo'
      			<div class="container-fluid bg-white">
        			<div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-info font-14 font-weight-bold">
          				<img src="loading.gif" width="150" /><br>GİRİŞ YAPILIYOR...
        			</div>
      			</div>';
				header("refresh:2,url=control.php");

				//cookie
				$id=$this->sifrele($gelendeger["id"]);
				setcookie("kulbilgi",$id, time()+60*60*24);

			endif;

		}
		//cikis fonksiyonu.
		function cikis($vt){

			$cookid=$_COOKIE["kulbilgi"];
			$cozduk=$this->coz($cookid);

			
			$this->sorgum($vt,"update yonetim set aktif=0 where id=$cozduk",0);

			setcookie("kulbilgi",$cookid, time()-5);

			echo'
				<div class="container-fluid bg-white">
					<div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-14 font-weight-bold">
					<img src="loading.gif" width="150" /><br>BİLGİLER BOŞ BIRAKILAMAZ !
					</div>
				</div>';
				header("refresh:0,url=index.php");

		}
		//cookie kontrol.
		function kontrolet($sayfa){

			if(isset($_COOKIE["kulbilgi"])):

				if($sayfa=="ind"): header("Location:control.php"); endif;

				

			else:
				if($sayfa=="cot"): header("Location:index.php"); endif;

			endif;
		}

		//-----------------------CAROUSEL--------------------------------------


		//mevcut carousel resimleri geliyor.
		function introayar($vt){

			echo'<div class="row text-center">
					<div class="col-lg-12 border-bottom">
						<h3 class="float-left mx-auto m-4 text-info">CAROUSEL RESİMLERİ</h3>
						<a href="control.php?sayfa=carouselekle" class="btn btn-success m-4 float-right"><i class="fa fa-plus-square"></i></a>
					</div>';


			$introbilgiler=$this->sorgum($vt,"select * from carousel",2);

			while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

				echo'<div class="col-lg-4">
						<div class="row border border-light p-1 m-1">
							<div class="col-lg-12">
								<img src="../'.$sonbilgi["picPath"].'">
							</div>

							<div class="col-lg-6 text-right">
								<a href="control.php?sayfa=carouselguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px"></a>
							</div>

							<div class="col-lg-6 text-left">
								<a href="control.php?sayfa=carouselsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px"></a>
							</div>
						</div>
					</div>';
			endwhile;

			echo '</div>';

		}
		//carousel resmi ekleme
		function carouselekle($vt){

			echo'<div class="row text-center">
					<div class="col-lg-12">
			';

			if($_POST):

				//dosya boş mu ?
				//dosya boyutu ? 
				//dosya uzantısı ?
				//tamamdır

				if($_FILES["dosya"]["name"]==""): //dosya boş ise

					echo'<div class="alert alert-danger mt-3">Dosya Yüklenmedi.Boş olamaz.</div>';
					header("refresh:1.5,url=control.php?sayfa=carouselekle");



				else://dosya boş değilse

					if($_FILES["dosya"]["size"]>(1024*1024*5))://boyut 5mb dan büyükse 

						echo'<div class="alert alert-danger mt-3">DOSYA BOYUTU ÇOK FAZLA. FARKLI BİR DOSYA SEÇİN.</div>';
						header("refresh:1.5,url=control.php?sayfa=carouselekle");

					else://boyut problemi yoksa

						$izinverilen=array("image/png","image/jpeg","video/mp4","video/mpg",
						"video/mpeg","video/mov","video/avi","video/flv");

						if(!in_array($_FILES["dosya"]["type"],$izinverilen))://uzantısı sağlanmıyorsa

							echo'<div class="alert alert-danger mt-3">DOSYA UZANTISI İSTENİLENİN DIŞINDA.LÜTFEN JPG YA DA PNG SEÇİNİZ.</div>';
							header("refresh:1.5,url=control.php?sayfa=carouselekle");

						else://artık her şey tamam.

							//copy komutu kullanılabilir.
							//move_uplodaed_file() komutu kullanılabilir.

							$dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];

							move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
							
							echo'<div class="alert alert-success mt-3">DOSYA BAŞARIYLA YÜKLENDİ.</div>';
							header("refresh:1.5,url=control.php?sayfa=carousel");

							//dosya yüklendikten sonra veritabanına eklenmesi gerek

							$dosyaminyolu2=str_replace('../',"",$dosyaminyolu);

							$kayitekle=$this->sorgum($vt,"insert into carousel(picPath) VALUES('$dosyaminyolu2')",0);


						endif;


					endif;


				endif;

				
			else:
			?>
				<div class="col-lg-4 mx-auto mt-2">
					<div class="card card-bordered">
						<div class="card-body">
							<h5 class="title border-bottom">Carousel resim yükleme formu</h5>

							<form action="" method="post" enctype="multipart/form-data">
								<p class="card-text"><input type="file" name="dosya"></p>
								<input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1">
							</form>

							<p class="card-text text-left text-danger border-top">
								* İzin verilen formatlar : jpg,png<br>
								* İzin verilen max boyut : 5 MB
							</p>
						</div>
					</div>
				</div>



			<?php
			endif;

			echo'</div></div></div>';

		}
		//carousel resmi silme
		function carouselsil($vt){

			$introid=$_GET["id"];
			$verial=$this->sorgum($vt,"select * from carousel where id=$introid",1);

			echo'<div class="row text-center">
					<div class="col-lg-12">
			';

			//dosyadan silme işlemi
			unlink("../".$verial["picPath"]);

			//veritabanından sil
			$this->sorgum($vt,"delete from carousel where id=$introid",0);			

			echo'<div class="alert alert-success mt-3">RESİM BAŞARIYLA SİLİNDİ.</div>';
			echo '</div></div>';

			header("refresh:1.5,url=control.php?sayfa=carousel");

		}
		//carousel resmi güncelleme
		function carouselguncelle($vt){

			$gelencarouselid=$_GET["id"];

			echo'<div class="row text-center">
					<div class="col-lg-12">
			';

			if($_POST):

				//dosya boş mu ?
				//dosya boyutu ? 
				//dosya uzantısı ?
				//tamamdır

				$formdangelenid=$_POST["carouselid"];

				if($_FILES["dosya"]["name"]==""): //dosya boş ise

					echo'<div class="alert alert-danger mt-3">Dosya Yüklenmedi.Boş olamaz.</div>';
					header("refresh:1.5,url=control.php?sayfa=carousel");



				else://dosya boş değilse

					if($_FILES["dosya"]["size"]>(1024*1024*5))://boyut 5mb dan büyükse 

						echo'<div class="alert alert-danger mt-3">DOSYA BOYUTU ÇOK FAZLA. FARKLI BİR DOSYA SEÇİN.</div>';
						header("refresh:1.5,url=control.php?sayfa=carousel");

					else://boyut problemi yoksa

						$izinverilen=array("image/png","image/jpeg","video/mp4","video/mpg",
						"video/mpeg","video/mov","video/avi","video/flv");

						if(!in_array($_FILES["dosya"]["type"],$izinverilen))://uzantısı yanlış ise

							echo'<div class="alert alert-danger mt-3">DOSYA UZANTISI İSTENİLENİN DIŞINDA.LÜTFEN JPG YA DA PNG SEÇİNİZ.</div>';
							header("refresh:1.5,url=control.php?sayfa=carousel");

						else://artık işler legal.

							//dbden mevcut veriyi çektik ve dosyayı sildik.
							$resimyolunabak=$this->sorgum($vt,"select * from carousel where id=$gelencarouselid",1);
							$dbgelenyol='../'.$resimyolunabak["picPath"];							
							unlink($dbgelenyol);


							//dosyanın yeni yolunu belirtip oraya upload ediyoruz.
							$dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
							move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

							//dosya yüklendikten sonra veritabanında güncellenmesi gerek.
							$dosyaminyolu2=str_replace('../',"",$dosyaminyolu);
							$this->sorgum($vt,"update carousel set picPath='$dosyaminyolu2' where id=$gelencarouselid",0);
							
							echo'<div class="alert alert-success mt-3">DOSYA BAŞARIYLA GÜNCELLENDİ.</div>';
							header("refresh:1.5,url=control.php?sayfa=carousel");

							


						endif;


					endif;


				endif;

				
			else://HENÜZ POST EDİLMEDİYSE YANİ SAYFAYI İLK AÇTIĞINDA BU EKRAN GÖZÜKECEK.
			?>
				<div class="col-lg-4 mx-auto mt-2">
					<div class="card card-bordered">
						<div class="card-body">
							<h5 class="title border-bottom">Carousel resim güncelleme formu</h5>

							<form action="" method="post" enctype="multipart/form-data">
								<p class="card-text"><input type="file" name="dosya"></p>
								<p class="card-text"><input type="hidden" name="carouselid" value="<?php echo $gelencarouselid; ?>"></p>
								<input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1">
							</form>

							<p class="card-text text-left text-danger border-top">
								* İzin verilen formatlar : jpg,png<br>
								* İzin verilen max boyut : 5 MB
							</p>
						</div>
					</div>
				</div>



			<?php
			endif;

			echo'</div></div></div>';

		}

		//-----------------------FİLO--------------------------------------

		//mevcut filo fotoğrafları geliyor.
		function aracfilo($vt){

			echo'<div class="row text-center">
					<div class="col-lg-12 border-bottom">
						<h3 class="float-left mx-auto m-4 text-info">FİLO RESİMLERİ</h3>
						<a href="control.php?sayfa=filoekle" class="btn btn-success m-4 float-right"><i class="fa fa-plus-square"></i></a>
					</div>';


			$introbilgiler=$this->sorgum($vt,"select * from fleet",2);

			while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

				echo'<div class="col-lg-4">
						<div class="row border border-light p-1 m-1">
							<div class="col-lg-12">
								<img src="../'.$sonbilgi["picPath"].'">
							</div>

							<div class="col-lg-6 text-right">
								<a href="control.php?sayfa=filoguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px"></a>
							</div>

							<div class="col-lg-6 text-left">
								<a href="control.php?sayfa=filosil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px"></a>
							</div>
						</div>
					</div>';
			endwhile;

			echo '</div>';

		}
		//filo ekleme
		function filoekle($vt){

			echo'<div class="row text-center">
					<div class="col-lg-12">
			';

			if($_POST):

				//dosya boş mu ?
				//dosya boyutu ? 
				//dosya uzantısı ?
				//tamamdır

				if($_FILES["dosya"]["name"]==""): //dosya boş ise

					echo'<div class="alert alert-danger mt-3">Dosya Yüklenmedi.Boş olamaz.</div>';
					header("refresh:1.5,url=control.php?sayfa=filoekle");



				else://dosya boş değilse

					if($_FILES["dosya"]["size"]>(1024*1024*5))://boyut 5mb dan büyükse 

						echo'<div class="alert alert-danger mt-3">DOSYA BOYUTU ÇOK FAZLA. FARKLI BİR DOSYA SEÇİN.</div>';
						header("refresh:1.5,url=control.php?sayfa=filoekle");

					else://boyut problemi yoksa

						$izinverilen=array("image/png","image/jpeg","video/mp4","video/mpg",
						"video/mpeg","video/mov","video/avi","video/flv");

						if(!in_array($_FILES["dosya"]["type"],$izinverilen))://uzantısı sağlanmıyorsa

							echo'<div class="alert alert-danger mt-3">DOSYA UZANTISI İSTENİLENİN DIŞINDA.LÜTFEN JPG YA DA PNG SEÇİNİZ.</div>';
							header("refresh:1.5,url=control.php?sayfa=filoekle");

						else://artık her şey tamam.

							//copy komutu kullanılabilir.
							//move_uplodaed_file() komutu kullanılabilir.

							$dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];

							move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
							
							echo'<div class="alert alert-success mt-3">DOSYA BAŞARIYLA YÜKLENDİ.</div>';
							header("refresh:1.5,url=control.php?sayfa=aracfilo");

							//dosya yüklendikten sonra veritabanına eklenmesi gerek

							$dosyaminyolu2=str_replace('../',"",$dosyaminyolu);

							$this->sorgum($vt,"insert into fleet(picPath) VALUES('$dosyaminyolu2')",0);


						endif;


					endif;


				endif;

				
			else:
			?>
				<div class="col-lg-4 mx-auto mt-2">
					<div class="card card-bordered">
						<div class="card-body">
							<h5 class="title border-bottom">Araç resim yükleme formu</h5>

							<form action="" method="post" enctype="multipart/form-data">
								<p class="card-text"><input type="file" name="dosya"></p>
								<input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1">
							</form>

							<p class="card-text text-left text-danger border-top">
								* İzin verilen formatlar : jpg,png<br>
								* İzin verilen max boyut : 5 MB
							</p>
						</div>
					</div>
				</div>



			<?php
			endif;

			echo'</div></div></div>';

		}
		//filo silme
		function filosil($vt){

			$introid=$_GET["id"];
			$verial=$this->sorgum($vt,"select * from fleet where id=$introid",1);

			echo'<div class="row text-center">
					<div class="col-lg-12">
			';

			//dosyadan silme işlemi
			unlink("../".$verial["picPath"]);

			//veritabanından sil
			$this->sorgum($vt,"delete from fleet where id=$introid",0);			

			echo'<div class="alert alert-success mt-3">RESİM BAŞARIYLA SİLİNDİ.</div>';
			echo '</div></div>';

			header("refresh:1.5,url=control.php?sayfa=aracfilo");

		}
		//filo güncelleme
		function filoguncelle($vt){

			$gelencarouselid=$_GET["id"];

			echo'<div class="row text-center">
					<div class="col-lg-12">
			';

			if($_POST):

				//dosya boş mu ?
				//dosya boyutu ? 
				//dosya uzantısı ?
				//tamamdır

				$formdangelenid=$_POST["carouselid"];

				if($_FILES["dosya"]["name"]==""): //dosya boş ise

					echo'<div class="alert alert-danger mt-3">Dosya Yüklenmedi.Boş olamaz.</div>';
					header("refresh:1.5,url=control.php?sayfa=aracfilo");



				else://dosya boş değilse

					if($_FILES["dosya"]["size"]>(1024*1024*5))://boyut 5mb dan büyükse 

						echo'<div class="alert alert-danger mt-3">DOSYA BOYUTU ÇOK FAZLA. FARKLI BİR DOSYA SEÇİN.</div>';
						header("refresh:1.5,url=control.php?sayfa=aracfilo");

					else://boyut problemi yoksa

						$izinverilen=array("image/png","image/jpeg","video/mp4","video/mpg",
						"video/mpeg","video/mov","video/avi","video/flv");

						if(!in_array($_FILES["dosya"]["type"],$izinverilen))://uzantısı yanlış ise

							echo'<div class="alert alert-danger mt-3">DOSYA UZANTISI İSTENİLENİN DIŞINDA.LÜTFEN JPG YA DA PNG SEÇİNİZ.</div>';
							header("refresh:1.5,url=control.php?sayfa=aracfilo");

						else://artık işler legal.

							//dbden mevcut veriyi çektik ve dosyayı sildik.
							$resimyolunabak=$this->sorgum($vt,"select * from fleet where id=$gelencarouselid",1);
							$dbgelenyol='../'.$resimyolunabak["picPath"];							
							unlink($dbgelenyol);


							//dosyanın yeni yolunu belirtip oraya upload ediyoruz.
							$dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
							move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

							//dosya yüklendikten sonra veritabanında güncellenmesi gerek.
							$dosyaminyolu2=str_replace('../',"",$dosyaminyolu);
							$this->sorgum($vt,"update fleet set picPath='$dosyaminyolu2' where id=$gelencarouselid",0);
							
							echo'<div class="alert alert-success mt-3">DOSYA BAŞARIYLA GÜNCELLENDİ.</div>';
							header("refresh:1.5,url=control.php?sayfa=aracfilo");

							


						endif;


					endif;


				endif;

				
			else://HENÜZ POST EDİLMEDİYSE YANİ SAYFAYI İLK AÇTIĞINDA BU EKRAN GÖZÜKECEK.
			?>
				<div class="col-lg-4 mx-auto mt-2">
					<div class="card card-bordered">
						<div class="card-body">
							<h5 class="title border-bottom">Filo resim güncelleme formu</h5>

							<form action="" method="post" enctype="multipart/form-data">
								<p class="card-text"><input type="file" name="dosya"></p>
								<p class="card-text"><input type="hidden" name="carouselid" value="<?php echo $gelencarouselid; ?>"></p>
								<input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1">
							</form>

							<p class="card-text text-left text-danger border-top">
								* İzin verilen formatlar : jpg,png<br>
								* İzin verilen max boyut : 5 MB
							</p>
						</div>
					</div>
				</div>



			<?php
			endif;

			echo'</div></div></div>';

		}

		//-----------------------HAKKIMIZDA--------------------------------

		function hakkimizda($vt){

			echo'<div class="row text-center">
					<div class="col-lg-12 border-bottom">
						<h3 class="mt-3 text-info">HAKKIMIZDA AYARLARI</h3></div>';

			if(!$_POST):

			$sonbilgi=$this->sorgum($vt,"select * from aboutus",1);

				echo'<div class="col-lg-6 mx-auto">
						<div class="row card-bordered p-1 m-1">



							<div class="col-lg-3 border-bottom border-right bg-light" id="hakkimizdayazilar">
								Resim
							</div>

							<div class="col-lg-9 border-bottom">
								<img src="../'.$sonbilgi["picture"].'"> <br>

								<form action="" method="post" enctype="multipart/form-data">
								<input type="file" name="dosya">
							</div>

							<div class="col-lg-3 bg-light border-bottom border-right pt-3" id="hakkimizdayazilarn">
								Başlık
							</div>

							<div class="col-lg-9 text-center border-bottom">
							<input type="text" name="baslik" class="form-control m-2" value="'.$sonbilgi["header"].'">
								
							</div>

							<div class="col-lg-3 bg-light border-bottom border-right" id="hakkimizdayazilar">
								İçerik
							</div>

							<div class="col-lg-9 border-bottom">
							<textarea name="icerik" class="form-control" rows="8">'.$sonbilgi["content"].'</textarea> 
								
							</div>

							<div class="col-lg-12 border-top">
							<input type="submit" name="guncel" class="btn btn-primary m-2" value="GÜNCELLE">
							</form>
							</div>
						</div>
					</div>
				';

			else:
				@$resim=$_FILES["dosya"]["name"];
				$baslik=$_POST["baslik"];
				$icerik=$_POST["icerik"];

				if(@$_FILES["dosya"]["name"]!=""): //dosya boş değilse
					if($_FILES["dosya"]["size"]<(1024*1024*5))://boyut 5mb dan küçükse

						$izinverilen=array("image/png","image/jpeg","video/mp4","video/mpg",
						"video/mpeg","video/mov","video/avi","video/flv");

						if(in_array($_FILES["dosya"]["type"],$izinverilen))://uzantısı sağlanıyorsa

							//copy komutu kullanılabilir.
							//move_uplodaed_file() komutu kullanılabilir.

							$dosyaminyolu='../img/'.$_FILES["dosya"]["name"];

							move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
							
							$veritabaniadi=str_replace('../',"",$dosyaminyolu);
						endif;
					endif;
				endif;

				if(@$_FILES["dosya"]["name"]!=""):

					$this->sorgum($vt,"update aboutus set header='$baslik',content='$icerik',picture='$veritabaniadi'",0);

					echo'<div class="col-lg-6 mx-auto">
							<div class="alert alert-success mt-3">DOSYA BAŞARIYLA GÜNCELLENDİ.</div>
						</div>';
								header("refresh:1.5,url=control.php?sayfa=hakkimizda");

				else:

					$this->sorgum($vt,"update aboutus set header='$baslik',content='$icerik'",0);

					echo'<div class="col-lg-6 mx-auto">
							<div class="alert alert-success mt-3">DOSYA BAŞARIYLA GÜNCELLENDİ.</div>
						</div>';
							header("refresh:1.5,url=control.php?sayfa=hakkimizda");

				endif;
			endif;

			echo'</div>';

		}

		//-----------------------HİZMETLERİMİZ--------------------------------
		function hizmetler($vt){

			echo'<div class="row text-center">
					<div class="col-lg-12 border-bottom">
						<h3 class="float-left mx-auto m-4 text-info">HİZMETLERİMİZ</h3>
						<a href="control.php?sayfa=hizmetekle" class="btn btn-success m-4 float-right"><i class="fa fa-plus-square"></i></a>
					</div>';


			$introbilgiler=$this->sorgum($vt,"select * from services",2);

			while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

				echo'<div class="col-lg-6">
						<div class="row border border-light p-1 m-1">
							<div class="col-lg-12">
							'.$sonbilgi["baslik"].'
							</div>
							<div class="col-lg-12">
							'.$sonbilgi["icerik"].'
							</div>

							<div class="col-lg-6 text-right">
								<a href="control.php?sayfa=hizmetguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px"></a>
							</div>

							<div class="col-lg-6 text-left">
								<a href="control.php?sayfa=hizmetsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px"></a>
							</div>
						</div>
					</div>';
			endwhile;

			echo '</div>';

		}

	}

?>
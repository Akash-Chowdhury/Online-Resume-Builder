<?php
$resume['contact'] = str_replace('\\', "", $resume['contact']);
$contact = json_decode($resume['contact']);
$resume['skills'] = str_replace('\\', "", $resume['skills']);
$skills = json_decode($resume['skills']);
$resume['work'] = str_replace('\\', "", $resume['experience']);
$work = json_decode($resume['work']);
$resume['education'] = str_replace('\\', "", $resume['education']);
$education = json_decode($resume['education']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title??'CV Online'?></title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
    <link rel="stylesheet" href="<?=$action->helper->loadcss("cvbuilder_content_1.css")?>">

    <link rel="stylesheet" href="<?=$action->helper->loadcss("main.css")?>">
    <link rel="icon" href="<?=$action->helper->loadimage("cv.png")?>">

</head>
<body>
<div id="content">

<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?=@$resume['name']?></h1>
					<h2><?=@$resume['headline']?></h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3><a style="text-decoration:none;" href="#"><?=@$contact->mobile?></a></h3><br>
						<h3><a style="text-decoration:none;" href="mailto:<?=@$contact->email?>"><?=@$contact->email?></a></h3><br>
						<h3><?=@$contact->address?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Objective</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
							<?=@$resume['objectives']?>
							</p>
						</div>
					</div><!--// .yui-gf -->


					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							<?php
							foreach($skills as $skill){
							?>
							<ul class="talent">
								<li><?=$skill?></li>
							</ul>

							<?php
							}
							?>
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div>
						<?php
						if(count($work)<1){
						?>
						<div class="yui-u" >
							<h3>Fresher</h3>
							</div>
						<?php
						}
						?>
						<div class="yui-u" style="padding:10px 0;">
						<?php
							foreach($work as $work){
							?>
							<div class="job">
								<h2><?=$work->company?></h2>
								<h3><?=$work->jobrule?></h3>
								<h4><?=$work->c_duration?></h4>
								<p><?=$work->work_desc?></p>
							</div>

							<?php
							}
							?>

							

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<?php
						if(count($education)<1){
						?>
						<div class="yui-u" >
							<h3>no Education</h3>
							</div>
						<?php
						}
						?>
						<?php
							foreach($education as $education){
							?>
							<div class="yui-u" style="padding:10px 0; border-bottom:1px solid lightgrey">
							<h2><?=$education->college?></h2>
							<h4><?=$education->course?> &mdash; <strong>(<?=$education->e_duration?>)</strong> </h4>
							</div>

							<?php
							}
							?>
					</div>


				</div>
			</div>
		</div>

		<div id="ft">
			<p><?=@$resume['name']?> &mdash; <a href="mailto:<?=@$contact->email?>"><?=@$contact->email?></a> &mdash; <?=@$contact->mobile?></p>
		</div>

	</div>


</div>


</div>

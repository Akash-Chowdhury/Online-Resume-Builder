
<div class="container">
<a href="<?=$action->helper->url('select-template')?>" class="btn btn-sm btn-primary my-2"><i class="bi bi-file-earmark-plus"></i> Create New Resume</a>
<?php
foreach($resumes as $resume){
?>
<div class="card my-3">
  <div class="card-body">
    <h5 class="card-title"><?=$resume['headline']?></h5>
    <p class="card-text"><?=$resume['objectives']?></p>
    <a href="#" class="btn btn-sm btn-info my-1"><i class="bi bi-pencil-square"></i> Update</a>
    <a href="<?=$action->helper->url("action/delete/".$resume['url'])?>" class="btn btn-sm btn-danger my-1"> <i class="bi bi-trash3-fill"></i> Delete</a>
    <a href="<?=$action->helper->url("resume/".$resume['url'])?>" class="btn btn-sm btn-success my-1"><i class="bi bi-binoculars"></i> View</a>
    <a href="#" class="btn btn-sm btn-secondary my-1" onclick="copyurl('<?=$action->helper->url("resume/".$resume['url'])?>')"><i class="bi bi-clipboard"></i> Copy Url</a>
  </div>
</div>
<?php
}

if(count($resumes)<1){
?>

<div class="card my-3">
  <div class="card-body">
    <h1 class="text-center text-muted"><i class="bi bi-cloud-drizzle"></i> No Resume Created</h1>
</div>
<?php
}
?>
</div>
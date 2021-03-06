<?php $this->title = "Mon Blog - Admin"; ?>
<?php include 'adminNav.php'?>

<!--  Content  -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <h2>Ajouter un post</h2>
      
      <form method="post" action="addPost" id="addPostForm" novalidate>
        <div class="control-group error">
          <div class="form-group floating-label-form-group controls">
            <label>Titre</label>
              <label for="titre"></label><input name="title" type="text" class="form-control" placeholder="Titre" id="titre" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group error">
          <div class="form-group floating-label-form-group controls">
            <label>Chapo</label>
              <label for="chapo"></label><input name="chapo" type="text" class="form-control" placeholder="Chapo" id="chapo" required data-validation-required-message="Veuillez renseigner ce champ.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group error">
          <div class="form-group floating-label-form-group controls">
            <label>Contenu</label>
              <label for="content"></label><textarea rows="10" name="content" class="form-control" placeholder="Contenu" id="content" required data-validation-required-message="Veuillez renseigner ce champ."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Publier le post</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
<br/><h5 class="red-text">Ajouter un etudiant</h5><hr>
<div class="row">
    <div class="input-field col s3">
        <input type="text" name="nom" id="nom" required="required" />
        <label for="nom"  class="center-align">Nom de l'etudiant</label>
    </div>
    <div class="input-field col s3">
        <input type="number" name="num" id="tele" required="required" /> 
        <label for="tele"  class="center-align">Telephone</label>
    </div>
    <div class="input-field col s3">
        <select name="class">
            <option value="" disabled selected>Choisissez la classe</option>
            <option value="GL1B">GL1B</option>
            <option value="GL2B">GL2B</option>
            <option value="GL3B">GLB</option>
        </select>
        <label>Choix de la classe</label>
    </div>
    <div class="input-field col s3">
        <button class="btn red waves-effect waves-yellow" id="btn_add">Ajouter</button>
    </div>
</div>



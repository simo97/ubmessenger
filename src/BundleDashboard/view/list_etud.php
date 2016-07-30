<h5 class="red-text">Liste des etudiants</h5><hr>
<div class="row">
    <form id="list">
        <table class="bordered striped  responsive-table" id="table_" style="max-height: 500px">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="chk_all"  />
                        <label for="chk_all">Select</label>
                    </th>
                    <th data-field='nom'>Nom</th>
                    <th data-field='class' >Classe</th>
                    <th data-field='tel' >Telephone</th>
                </tr>
            </thead>
            <!-- on entame la boucle ici -->
            <tbody>
            <?php 
                echo $data;
            ?>
            </tbody>
        </table>
        <h5 class="red-text">Message</h5><hr>
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <textarea id="message" class="materialize-textarea" id="msg"></textarea>
                <label for="message">Votre message ici</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s3 right">
                <input id="sub" type="submit" class="btn red waves-effect waves-yellow " />
            </div>
        </div>
    </form>
</div>
$(".dropdown-button").dropdown();
$(".button-collapse").sideNav();

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 ,// Creates a dropdown of 15 years to control year
    format : 'yyyy/mm/dd'
  });
   
$('.g').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 ,// Creates a dropdown of 15 years to control year
    format : 'yyyy/mm/dd'
  });
  
  $('.h').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 ,// Creates a dropdown of 15 years to control year
    format : 'yyyy/mm/dd'
  });
  
  $(document).ready(function(){
    $('ul.tabs').tabs();
    $('.modal-trigger').leanModal();
    $('select').material_select();
  });
  
  
  //la partie pour AJAX
  $('#btn_add').click(function(){
      if($('#nom').val() == ''|| $('#tele').val() == '' || $('#class').val()== ''){
          alert('Vous devez remplir tout les champs');
          $('p#val_ret').val('test');
          $('#modal1').openModal();
          return;
      }
    $.post(
        'dashboard/default/addEtudiant',
        {
            nom : $('#nom').val(),
            tel : $('#tele').val(),
            class : $('select option:selected').val()
        },
        function(data,status){
            alert(data.toString());
            location.reload();
            //$('body').html(data);
        });
        $('#nom').val('');
        $('#tele').val('');
        $('#class').val('');
  });
  
$('#sub').click(function(){
    var ids = [];
    $('input:checked[name=ids]').each(function(){-
        ids.push($(this).val());
    });
    if(ids.length === 0){
        alert('vous devez choisir au moins un etudiant');
        return;
    }
    
    $.post(
      'dashboard/default/sendByTwilio',
      {
          ids : ids,
          msg : $('textarea').val()
      },
      function(data,status){
          alert(data.toString());
      });
});

$('#chk_all').click(function(){
   
    if($('#chk_all').is(':checked') === true){//si c'est check
        $('input[type=checkbox]').each(function(){
            $(this).prop('checked',true);
        });
    }else{//le cas contraire ici
        $('input[type=checkbox]').each(function(){
            $(this).prop('checked',false);
        });
    }
})
  
  
 
$('.x').click(function(){
   $('.modal').removeClass('show');
   $('.modal').attr('style', 'display: none');
})

$('.delete').click(function(e){
   $('.delete_action').attr('href', "./delete.php?id=" + $(this).attr('value'))
})


$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

//http://localhost/crud/delete.php?maSV=<?php echo $data[$i]["maSV"]; ?>

$('.xoa').click(function(){
   let text = "Bạn thực sự muốn xóa sinh viên này?";
   const maSV = $('.xoa').attr('value');
   if (confirm(text) == true) {
      window.location.href = "http://localhost/crud/delete.php?maSV=" + maSV;
   }
})
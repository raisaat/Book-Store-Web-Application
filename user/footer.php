<style type="text/css">
footer {
  margin-top: : 250px !important;
  background: red !important;
}

.fluid-container {
  margin-top: 250px !important;
}
</style>

<div class="fluid-container">
<footer class="page-footer">
  <div class="text-center py-3">
    <p class="m-0 text-center text-white">Copyright &copy; www.utdallas.edu 2020</p>
    <p class="m-0 text-center text-white">This site is developed by Humayoon, Faraz and Raisaat</p>
  </div>
</footer>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('.login').click(function(event){

      event.stopPropagation();
      event.stopImmediatePropagation();
      $('#LoginModal').modal('show');
      return false;
    });


  $('#login').click(function(){
    var email = $('#email').val();
    var password = $('#password').val();

    if (email == '' || password == '') {
      $('#help').html("All fields must be filled!");
    }else {
      $.ajax({
        url: "loginprocess.php",
        method: "POST",
        dataType: "text",
        data: {email:email,password:password},
        success: function(msg){
          if (msg == 1) {
            window.location.href = window.location.href;
          }else {
            $('#help').html("Email or Password is INVALID!");
          }
        }
      });
    }

 });


 cart_count();
    function cart_count(){
      $.ajax({
        url: 'countcart.php',
        method: 'POST',
        dataType: 'text',
        success:function(data){
          $('#countcart').html(data);
        }
      });
    }


    $('button[type=button]').click(function(){
      var id = $(this).attr("id");
      var book_id = $('#book_id'+id+'').val();
      var book_name = $('#book_name'+id+'').val();
      var price = $('#price'+id+'').val();
      var image = $('#image'+id+'').val();
      var quantity = 1;
      var action = "add_to_cart";
      $.ajax({
        url: 'cart_process.php',
        method: 'POST',
        data: {book_id:book_id, book_name:book_name, price:price, image:image, quantity:quantity, action:action},
        dataType: 'text',
        success:function(data){
          console.log(data);
          cart_count();
          $('#status').html(data);

          window.setTimeout(function(){
            $(".alert").fadeTo(500,0).slideUp(500,function(){
              $(this).remove();
            });
          }, 2000);
        }
      });


    });

    $('#checkout').click(function(){
      $('#checkoutform').addClass('was-validated');
    });

    window.setTimeout(function(){
      $(".alert").fadeTo(500,0).slideUp(500,function(){
        $(this).remove();
      });
    }, 10000);


  });
</script>
</body>
</html>

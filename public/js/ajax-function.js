<!-- Begin select Category -->


$("select[name='first_category_id']").change(function(){
      var first_category_id = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-first-cat') ?>",
          method: 'POST',
          data: {first_category_id:first_category_id, _token:token},
          success: function(data) {
            console.log('success');
            $("select[name='second_category_id'").html('');
            $("select[name='second_category_id'").html(data.options);
          }
      });
  });


  $("select[name='second_category_id']").change(function(){
        var second_category_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-second-cat') ?>",
            method: 'POST',
            data: {second_category_id:second_category_id, _token:token},
            success: function(data) {
              console.log('success');
              $("select[name='thrid_category_id'").html('');
              $("select[name='thrid_category_id'").html(data.options);
            }
        });
    });



 <!-- end select category -->

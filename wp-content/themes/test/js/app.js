jQuery(function($){
$(".replace_update").click(function(e) {
              jQuery("#publish").click();
          });
$(".clear_fields").click(function(e) {
              e.preventDefault();
              
              $('input[name="acf[field_1]"]').val('');
              $('.show-if-value').hide();
              $('.hide-if-value').css('display','block');
              
              $('input[name="acf[field_2]"]').val('');
              $('.hasDatepicker').val('');
              
              $('#acf-field_3 option').attr('selected', false);
              $('#acf-field_3 option:eq(0)').attr('selected', true)
          });
$(".clear_fields_template").click(function(e) {
              e.preventDefault();
              $('input[name="product_image"]').val('');
              $('input[name="publish-date"]').val('');
              $('#product_rarity option').attr('selected', false);
              $('#product_rarity option:eq(0)').attr('selected', true)
          });
$('.publish_product_template').on('click', function(event){
    var product_title = document.getElementById("product_title").value;
    var product_content = document.getElementById("product_content").value;
    var product_date = document.getElementById("product_date").value;
    var product_rarity = document.getElementById("product_rarity").value;

    $.ajax({
        type: "POST",
        url: '/wp-content/themes/test/create_product.php',
        data: { 
            product_title : product_title, 
            product_content : product_content, 
            product_date : product_date, 
            product_rarity : product_rarity,
        },
        success: function (msg) {
            swal({
                title: 'SUCCESS',
                text: 'A New Product Has Been Created!',
                type: 'success'
            });
        event.preventDefault();
        },
    });
    event.preventDefault();     
});
});


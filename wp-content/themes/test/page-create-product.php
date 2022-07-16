<?php /* Template Name: Create Product */ ?>

<?php
get_header();
?>
<div class="modal__scroll-area">
        <div class="modal__inner">
          <div class="modal__body" data-prevent-modal-close="">
<div class="modal__form">
<form class="form" method="post" enctype="multipart/form-data">
    <div class="form__fields">
        <div class="form__field">Product Title
            <label class="label"><input id="product_title" class="label__input" type="text" required="required" />
            </label>
        </div>
        <div class="form__field">
            <label class="label">Product Description
            	<textarea id="product_content" class="label__input" required="required" rows="10" cols="50"></textarea>
            </label>
        </div>
        <div class="form__field">
            <label class="label">Product image:
            	<input id="product_image" type="file" name="product_image" accept="image/*">
            </label>
        </div>
        <div class="form__field">
            <label class="label">Product Published:	
            	<input id="product_date" type="date" name="publish-date">
            </label>
        </div>
        <div class="form__field">
            <label class="label">Product Type:		
            	<select id="product_rarity" name="rarity">
				  <option value=" "> </option>
				  <option value="rare">Rare</option>
				  <option value="frequent">Frequent</option>
				  <option value="unusual">Unusual</option>
				</select>
            </label>
        </div>
    </div>
    <div class="form__footer">
    	<div class="form__submit" style="margin:unset">
            <button class="btn clear_fields_template">Clear
            </button>
        </div>
        <div class="form__submit">
            <button class="btn publish_product_template" type="submit">Publish
            </button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
<?php
get_footer();

<!--
    Form displayed if no product type is selected
-->

<div class="form-group">
    <label class="form-control-name" for="type-switcher">Type Switcher:</label>
    <select name="type-switcher" id="productType" onchange="this.form.submit()" 
            required oninvalid="this.setCustomValidity('Please, select a valid product type')" oninput="setCustomValidity('')">
        <option value="" id="#default_option" disabled selected>Type Switcher</option>
        <option value="Dvd" id="#DVD">DVD</option>
        <option value="Furniture" id="#Furniture">Furniture</option>
        <option value="Book" id="#Book">Book</option>
    </select>
</div>
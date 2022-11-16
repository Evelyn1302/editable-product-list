<!--
    Form displayed if the product type Furniture is selected
-->

<div class="form-group">
    <label class="form-control-name" for="type-switcher">Type Switcher:</label>
    <select name="type-switcher" id="productType" onchange="this.form.submit()" 
            required oninvalid="this.setCustomValidity('Please, select a valid product type')" oninput="setCustomValidity('')">
        <option value="" id="#default_option" disabled>Type Switcher</option>
        <option value="Dvd" id="#DVD">DVD</option>
        <option value="Furniture" id="#Furniture" selected>Furniture</option>
        <option value="Book" id="#Book">Book</option>
    </select>
</div>

<div class="form-group">
    <label class="form-control-name" for="size">Height (cm):</label>
    <input type="number" name="height" id="height" step="0.01" min="0.01" value="<?= $_SESSION['height'] ?>" 
            required oninvalid="this.setCustomValidity('Please submit a valid height in number form, up to two decimal places.')" oninput="setCustomValidity('')">
</div>

<div class="form-group">
    <label class="form-control-name" for="size">Width (cm):</label>
    <input type="number" name="width" id="width" step="0.01" min="0.01" value="<?= $_SESSION['width'] ?>" 
            required oninvalid="this.setCustomValidity('Please submit a valid width in number form, up to two decimal places.')" oninput="setCustomValidity('')">
</div>

<div class="form-group">
    <label class="form-control-name" for="size">Length (cm):</label>
    <input type="number" name="length" id="length" step="0.01" min="0.01" value="<?= $_SESSION['length'] ?>" 
            required oninvalid="this.setCustomValidity('Please submit a valid length in number form, up to two decimal places.')" oninput="setCustomValidity('')">
</div>

<div class="description">
    <p>Please, provide the dimensions of the furniture in centimeters(cm).</p>
</div>
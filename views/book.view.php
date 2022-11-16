<!--
    Form displayed if the product type Book is selected
-->

<div class="form-group">
    <label class="form-control-name" for="type-switcher">Type Switcher:</label>
    <select name="type-switcher" id="productType" onchange="this.form.submit()" 
            required oninvalid="this.setCustomValidity('Please, select a valid product type')" oninput="setCustomValidity('')">
        <option value="" id="#default_option" disabled>Type Switcher</option>
        <option value="Dvd" id="#DVD">DVD</option>
        <option value="Furniture" id="#Furniture">Furniture</option>
        <option value="Book" id="#Book" selected>Book</option>
    </select>
</div>

<div class="form-group">
    <label class="form-control-name" for="size">Weight (kg):</label>
    <input type="number" name="weight" id="weight" step="0.01" min="0.01" value="<?= $_SESSION['weight'] ?>" 
            required oninvalid="this.setCustomValidity('Please submit a valid weight in number form, up to two decimal places.')" oninput="setCustomValidity('')">
</div>

<div class="description">
    <p>Please, provide weight of the book in kilograms(kg).</p>
</div>
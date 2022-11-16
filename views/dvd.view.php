<!--
    Form displayed if the product type Dvd is selected
-->

<div class="form-group">
    <label class="form-control-name" for="type-switcher">Type Switcher:</label>
    <select name="type-switcher" id="productType" onchange="this.form.submit()" 
            required oninvalid="this.setCustomValidity('Please, select a valid product type')" oninput="setCustomValidity('')">
        <option value="" id="#default_option" disabled>Type Switcher</option>
        <option value="Dvd" id="#DVD" selected>DVD</option>
        <option value="Furniture" id="#Furniture">Furniture</option>
        <option value="Book" id="#Book">Book</option>
    </select>
</div>

<div class="form-group">
    <label class="form-control-name" for="size">Size (MB):</label>
    <input type="number" name="size" id="size" step="0.01" min="0.01" value="<?= $_SESSION['size'] ?>" 
            required oninvalid="this.setCustomValidity('Please submit a valid disc size in number form, up to two decimal places.')" oninput="setCustomValidity('')">
</div>

<div class="description">
    <p>Please, provide size of the DVD in megabytes(MB).</p>
</div>
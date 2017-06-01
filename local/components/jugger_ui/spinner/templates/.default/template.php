<div class="ui-spinner">
    <div class="input-group">
        <span class="input-group-btn">
            <button class="btn btn-secondary ui-spinner__minus" type="button">-</button>
        </span>

        <?php
        $tmp = "";
        $attrs = [
            'max' => $arParams['max'] ?? 9999,
            'min' => $arParams['min'] ?? -999,
            'name' => $arParams['name'],
            'step' => $arParams['step'],
            'value' => $arParams['value'],
        ];
        $attrs = array_filter($attrs);
        foreach ($attrs as $name => $value) {
            $tmp .= " {$name}='{$value}' ";
        }
        echo "<input type='text' class='form-control ui-spinner__input' {$tmp}>";
        ?>

        <span class="input-group-btn">
            <button class="btn btn-secondary ui-spinner__plus" type="button">+</button>
        </span>
    </div>
</div>

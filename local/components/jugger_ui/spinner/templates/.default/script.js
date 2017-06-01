$(document).ready(function(){

    var spinner = function(input) {
        var $input = $(input);
        var min = +$input.attr("min");
        if (!min) {
            min = -999;
        }

        var max = +$input.attr("max");
        if (!max) {
            max = 9999;
        }

        var step = +$input.attr("step");
        if (!step) {
            step = 1;
        }

        return {
            plus: function() {
                this.setValue(
                    this.getValue() + step
                )
            },
            minus: function() {
                this.setValue(
                    this.getValue() - step
                )
            },
            getValue: function() {
                return +$input.val()
            },
            setValue: function(value) {
                if (value == null || isNaN(value)) {
                    $input.val(min)
                }
                else if (value < min) {
                    $input.val(min)
                }
                else if (value > max) {
                    $input.val(max)
                }
                else {
                    $input.val(+value)
                }

                $input.trigger(
                    $.Event("spinner:change")
                );
            }
        }
    }

    $(".ui-spinner__input").on("change", function(){
        spinner(this).setValue(this.value)
    })
    $(".ui-spinner__plus").on("click", function(){
        var input = $(this).parents(".ui-spinner").last().find(".ui-spinner__input");
        spinner(input).plus()
    })
    $(".ui-spinner__minus").on("click", function(){
        var input = $(this).parents(".ui-spinner").last().find(".ui-spinner__input");
        spinner(input).minus()
    })
})

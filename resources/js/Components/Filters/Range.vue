<template>
    <div class="mx-4">
        <div id="arbitrary-values-slider" class="my-16"></div>
    </div>

</template>

<script>
import noUiSlider from 'noUiSlider'
import 'nouislider/dist/nouislider.css'

export default {
    name: "Range",
    mounted() {
        let _this = this;
        const arbitraryValuesSlider = document.getElementById('arbitrary-values-slider');

        noUiSlider.create(arbitraryValuesSlider, {
            start: [this.start,this.end],
            range: { min: 1900, max: 2000 },
            step: 1,
            connect: true,
            tooltips: {
                to: function(numericValue) {
                    return numericValue.toFixed(0);
                }
            },
            // format: format,
            // pips: { mode: 'steps', format: format, density: 50 },
            pips: { mode: 'range', density: 1000 },
        });

        arbitraryValuesSlider.noUiSlider.on('change', function (values) {
            _this.$store.commit('setYear',values)
            _this.$store.dispatch('updateCheckboxStates')
        });
    },
    computed: {
        start() {
            return this.$store.state.start;
        },
        end() {
            return this.$store.state.end;
        }
    }
}
</script>

<style>
.noUi-horizontal {
    height: 1px;
    border: red;
    background: red;
    box-shadow: none;
}
.noUi-horizontal .noUi-handle {
    width: 1px;
    right: 0;
    top: -14px;
}
.noUi-handle:before, .noUi-handle:after {
    display: none;
}
.noUi-horizontal .noUi-tooltip {
    bottom: unset;
    background-color: #000000;
    color: #ffffff;
    border: none;
}
.noUi-value-horizontal {
    transform: translate(-50%, 0%);
    color: red;
}

.noUi-marker {
    display: none;
}
.noUi-connect {
    background: #ffffff;
}
</style>

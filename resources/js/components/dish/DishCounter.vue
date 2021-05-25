<template>
    <div class="dish-counter-template">
        <div class="dish-counter-template-row">
            <span @click="minus()">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="124px" height="124px" viewBox="0 0 124 124" style="enable-background:new 0 0 124 124;" xml:space="preserve"><g>	<path d="M112,50H12C5.4,50,0,55.4,0,62c0,6.6,5.4,12,12,12h100c6.6,0,12-5.4,12-12C124,55.4,118.6,50,112,50z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </span>
            <input v-model="count">
            <span @click="plus()">
                <svg height="24px" viewBox="0 0 448 448" width="24px" xmlns="http://www.w3.org/2000/svg"><path
                    d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0"/></svg>
            </span>
        </div>
        <p>{{ servingTitle }} - {{ price }} грн</p>
    </div>
</template>

<script>
export default {
    name: "DishCounter",
    props: {
        servingTitle: {
            type: String,
            default: ''
        },
        minCount: {
            type: Number,
            default: 0
        },
        maxCount: {
            type: Number,
            default: 100
        },
        price: {
            type: Number,
            default: 0
        }
    },
    data: function () {
        return {
            count: 0,
        }
    },
    methods: {
        plus: function () {
            this.count++;
        },
        minus: function () {
            this.count--;
        }
    },
    watch: {
        count: function (newVal, oldVal) {
            let newCount = parseInt(newVal);
            let formatMinMaxCont = function (count, min, max) {
                if (count < min) {
                    return min;
                } else if (count > max) {
                    return max;
                }
                return count;
            }
            let resultCount = (Number.isNaN(newCount) ? this.minCount : formatMinMaxCont(newCount, this.minCount, this.maxCount));
            this.count = resultCount;
            this.$emit('countChange', this.count);
        },
    }
}
</script>

<style scoped>

</style>

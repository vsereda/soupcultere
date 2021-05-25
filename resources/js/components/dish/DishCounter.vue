<template>
<div class="dish-counter-template">
    <div class="dish-counter-template-row">
        <span>-</span>
        <input v-model="count">
        <span>+</span>
    </div>
    <p>{{ servingTitle }} - 86 грн</p>
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
        }
    },
    data: function () {
        return {
            count: 0,
            minCount: 0,
            maxCount: 1000,
        }
    },
    watch: {
        count: function (newVal, oldVal) {
            let newCount = parseInt(newVal);
            let absNewCount = (count) => Math.abs(count);
            let formatMinMaxCont = function (count, min, max) {
                if (count < min) {
                    return min;
                }
                else if (count > max)
                {
                    return max;
                }
                return count;
            }
            this.count = (Number.isNaN(newCount) ? 0 : formatMinMaxCont(absNewCount(newCount), this.minCount, this.maxCount));
        },
    }
}
</script>

<style scoped>
    .dish-counter-template {
        margin: 0;
        padding: 15px 0 0 0;
    }

    .dish-counter-template p {
        padding-top: 4px;
    }

    .dish-counter-template-row {
        display: flex;
        flex-direction: row;
    }

    .dish-counter-template span,
    .dish-counter-template input {
        display: flex;
        font-size: 24px;
        border: 2px solid #b5692a;
        padding-top: 5px;
        padding-bottom: 5px;
        background: rgba(0, 0, 0, 0);
        color: inherit;
        outline: none;
    }

    .dish-counter-template span:first-child,
    .dish-counter-template span:last-child {
        padding-left: 20px;
        padding-right: 20px;
        cursor: pointer;
    }

    .dish-counter-template span:first-child:hover,
    .dish-counter-template span:last-child:hover {
        color: #ffed4a;
    }

    .dish-counter-template span:first-child:active,
    .dish-counter-template span:last-child:active {
        border-color: rgba(181, 105, 42, 0.5);
    }

    .dish-counter-template span:first-child {
        border-bottom-left-radius: 22px;
        border-top-left-radius: 22px;
        border-right: 0;
    }

    .dish-counter-template span:last-child {
        border-bottom-right-radius: 22px;
        border-top-right-radius: 22px;
        border-left: 0;
    }

    .dish-counter-template input {
        display: inline;
        text-align: center;
        width: 70px;
    }

</style>

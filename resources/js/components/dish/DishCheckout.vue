<template>
    <div id="dish-detail-wrapper">
        <p>{{ description }}</p>
        <p>Состав: {{ composition }}</p>
        <div class="dish-counter-template" v-if="!disabled">
            <dish-counter
                v-for="dishServing in dishServings"
                v-bind:key="parseInt('' + dishServing.dish_id + dishServing.serving_id)"
                :serving-title="dishServing.serving.title"
                :price="dishServing.price"
                :dish-id="dishServing.dish_id"
                :serving-id="dishServing.serving_id"
                v-on:countChange="changeCounts($event, dishServing.dish_id, dishServing.serving_id)"
            >
            </dish-counter>
            <button>Заказать</button>
        </div>
        <div class="dish-counter-template" v-else>
            <h2>Не доступен к заказу</h2>
        </div>
        <p>{{ dishServingCounts }}</p>
    </div>
</template>

<script>
export default {
    name: "DishCheckout",
    props: {
        disabled: {
            type: Boolean,
            default: false,
        },
        dishServings: {
            default: []
        },
        description: {
            type: String,
            default: ''
        },
        composition: {
            type: String,
            default: ''
        },
    },
    data: function () {
        return {
            dishServingCounts: {}
        }
    },
    methods: {
        changeCounts: function (event, dishId, servingId) {
            this.dishServingCounts[dishId + '-' + servingId] = event.count;
        }
    },
    mounted() {
        let result = {};
        this.dishServings.forEach(function (item, i, dishServings) {
            result[item.dish_id + '-' + item.serving_id] = 0;
        });
        this.dishServingCounts = result;
    }
}
</script>

<style scoped>

</style>

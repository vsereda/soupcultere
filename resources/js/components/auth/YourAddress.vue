<template>
    <div class="form_group_login">
        <div>
            <label for="your-address">{{ labelValue }}</label>
        </div>
        <div>
            <input
                id="your-address"
                type="text"
                name="your-address"
                autocomplete="soupcultere-your-address"
                placeholder="example: StreetName and number"
                v-model="yourDeliveryAddress"
                :title="yourDeliveryAddress"
            >
        </div>
    </div>
</template>

<script>
export default {
name: "YourAddress",
    props: {
        labelValue: {
            type: String,
            required: true,
        },
        oldValue: {
            type: String,
            required: true,
        },
        resetValue: {
            type: String,
            required: true,
        },
    },
    data: function () {
        return {
            yourDeliveryAddress: ''
        }
    },
    watch: {
        yourDeliveryAddress: function (newValue, oldValue) {
            if (newValue !== '') {
                this.$emit('your_address_result', newValue);
            }
        },
        resetValue:  function (newValue, oldValue) {
            if (newValue !== oldValue) {
                this.yourDeliveryAddress = '';
            }
        },
    },
    mounted() {
        this.yourDeliveryAddress = this.oldValue;
    }
}
</script>

<style scoped>

</style>

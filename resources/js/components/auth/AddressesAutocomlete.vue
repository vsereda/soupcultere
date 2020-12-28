<template>
    <div class="form_group_login">
        <div>
            <label :for="inputNameValue">
                {{ labelValue + (isLoadingOutside ? ' (загрузка...)' : '') }}
            </label>
        </div>
        <div>
            <input
                autocomplete="off"
                :disabled="isLoadingOutside || disableOutside"
                :title="search"
                v-bind:class="ymlAutocompleteBackground"
                v-bind:name="inputNameValue"
                v-bind:id="inputNameValue"
                type="text"
                @input="onChange"
                v-model="search"
                @keydown.down="onArrowDownDown"
                @keyup.down="onArrowDownUp"
                @keydown.up="onArrowUpDown"
                @keyup.up="onArrowUpUp"
                @keydown.enter.prevent="onEnter"
                @keydown.esc.prevent="onESC"
                @focus="setActiveInput"
                v-on:keydown.tab="clickOutSideTask()"
            />
            <ul :id="'autocomplete_ul_' + labelIDValue" v-show="isOpen" class="autocomplete-results">
                <li class="" v-if="isLoading">
                    Loading results...
                </li>
                <li
                    v-else
                    v-for="(result, i) in results" :key="i"
                    :id="'autocomplete_li_' + labelIDValue + '_' + i"
                    @click="setResult(result)" class="yml-autocomplete-result"
                    :class="{ 'is-active': i === arrowCounter }"
                    :title="result.name"
                >
                    {{ result.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "CitiesAutocomlete",
    props: {
        items: {
            type: Array,
            required: false,
            default: () => []
        },
        isAsync: {
            type: Boolean,
            required: false,
            default: false
        },
        isLoadingOutside: {
            type: Boolean,
            required: false,
            default: false
        },
        disableOutside: {
            type: Boolean,
            required: false,
            default: false
        },
        labelValue: {
            type: String,
            required: true,
            default: false
        },
        labelIDValue: {
            type: String,
            required: true,
            default: false
        }, inputNameValue: {
            type: String,
            required: true,
            default: false
        },
        resetValue: {
            type: String,
            required: false,
            default: ''
        },
    },
    data() {
        return {
            isOpen: false,
            result: null,
            results: [],
            search: "",
            isLoading: false,
            arrowCounter: 0,
            onOutsideValue: [],
            isAutocompleteBackground: false,
            downTimerGo: false,
            downTimer: 0,
            downSlowTimer: 600,
            downFastTimer: 100,
            upTimerGo: false,
            upTimer: 0,
            upSlowTimer: 600,
            upFastTimer: 100,
        };
    },
    methods: {
        onChange() {
            // Let's warn the parent that a change was made
            this.$emit("input", this.search);

            // Is the data given by an outside ajax request?
            if (this.isAsync) {
                this.isLoading = true;
            } else {
                this.result = null;
                // Let's search our flat array
                this.filterResults();
                this.isOpen = true;
            }
        },

        filterResults() {
            // first uncapitalize all the things
            this.results = this.items.filter(item => {
                return item.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
            });
        },
        filterResultsFinal() {
            this.onOutsideValue = this.items.filter(item => {
                return (item.name.toLowerCase() === this.search.toLowerCase());
            });
        },
        setResult(result) {
            this.search = result.name;
            this.result = result;
            this.isOpen = false;
        },
        onArrowDownDown(evt) {
            this.downTimerGo = true;
        },
        onArrowDownUp(evt) {
            this.downTimer = this.downSlowTimer;
            this.downTimerGo = false;
        },
        onArrowUpDown(evt) {
            this.upTimerGo = true;
        },
        onArrowUpUp(evt) {
            this.upTimer = this.upSlowTimer;
            this.upTimerGo = false;
        },
        onEnter(evt) {
            // if (this.isOpen = true) {
            this.result = this.results[this.arrowCounter];
            this.search = this.results[this.arrowCounter].name;
            this.isOpen = false;
            // this.arrowCounter = -1;
            // }
        },
        handleClickOutside(evt) {
            if (!this.$el.contains(evt.target)) {
                this.clickOutSideTask();
            }
        },
        onESC(evt) {
            evt.target.blur();
            this.clickOutSideTask();
        },
        clickOutSideTask() {
            this.checkInputOnOutside();
            this.isOpen = false;
            this.arrowCounter = -1;
            this.isAutocompleteBackground = false;
        },
        checkInputOnOutside() {
            this.filterResultsFinal();
            if (!(typeof this.onOutsideValue === 'object' && Object.keys(this.onOutsideValue).length)) {
                this.search = '';
            } else {
                this.result = this.onOutsideValue[0];
            }
        },
        setActiveInput() {
            this.isAutocompleteBackground = true;
            this.results = this.items;
            this.isOpen = true;
        },
        async increaseCounter() {
            if (this.arrowCounter < this.results.length - 1) {
                this.arrowCounter++;
                let list = document.getElementById("autocomplete_ul_" + this.labelIDValue),
                    targetLi = document.getElementById("autocomplete_li_" + this.labelIDValue + "_" + (this.arrowCounter));
                list.scrollTop = (targetLi.offsetTop - 0);
                let timeoutID = window.setTimeout(function (vmm) {
                    if (vmm.downTimerGo) {
                        vmm.downTimer = vmm.downFastTimer;
                        vmm.increaseCounter();
                    }
                }, this.downTimer, this)
            }
        },
        async decreaseCounter() {
            if (this.arrowCounter > 0) {
                this.arrowCounter--;
                let list = document.getElementById("autocomplete_ul_" + this.labelIDValue),
                    targetLi = document.getElementById("autocomplete_li_" + this.labelIDValue + "_" + (this.arrowCounter));
                list.scrollTop = (targetLi.offsetTop - 0);
                let timeoutID = window.setTimeout(function (vmm) {
                    if (vmm.upTimerGo) {
                        vmm.upTimer = vmm.upFastTimer;
                        vmm.decreaseCounter();
                    }
                }, this.upTimer, this)
            }
        }
    },
    watch: {
        items: function (val, oldValue) {
            // actually compare them
            if (val.length !== oldValue.length) {
                this.results = val;
                this.isLoading = false;
            }
        },
        result: function (val, oldVal) {
            if (val !== '' && val !== null) {
                this.$emit('autocomlete_change', Math.random().toString(36).substring(7));
            }
        },
        resetValue: function () {
            this.search = ''
            this.results = []
            this.result = null
            this.onOutsideValue = []
        },
        downTimerGo: function (val, oldVal) {
            if (val) {
                this.increaseCounter();
            } else {

            }
        },
        upTimerGo: function (val, oldVal) {
            if (val) {
                this.decreaseCounter();
            } else {

            }
        },
    },
    computed: {
        ymlAutocompleteBackground: function () {
            return {
                'yml-autocomplete-background': this.isAutocompleteBackground
            }
        }
    },
    mounted() {
        document.addEventListener("click", this.handleClickOutside);
        this.downTimer = this.downSlowTimer;
        this.upTimer = this.upSlowTimer;
    },
    destroyed() {
        document.removeEventListener("click", this.handleClickOutside);
    },
}
</script>

<style scoped>

</style>

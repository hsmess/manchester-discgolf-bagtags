<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="rounded border-gray-300 text-yellow-400 shadow-sm focus:border-yellow-100 focus:ring focus:ring-yellow-100 focus:ring-opacity-50">
</template>

<script>
    export default {
        model: {
            prop: "checked",
            event: "change",
        },

        props: {
            checked: {
                type: [Array, Boolean],
                default: false,
            },
            value: {
                default: null,
            },
        },

        computed: {
            proxyChecked: {
                get() {
                    return this.checked;
                },
                set(val) {
                    this.$emit("change", val);
                },
            },
        },
    }
</script>


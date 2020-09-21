<template>
    <form class="w-full max-w-lg" @submit.prevent="checkForm" novalidate="true">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    for="grid-first-name"
                >
                    Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    :class="{ 'border-red-500': errors.name }"
                    id="grid-first-name"
                    type="text"
                    placeholder="Jane Doe"
                    v-model="name"
                />
                <p class="text-red-500 text-xs" v-if="errors.name">
                    {{ errors.name }}
                </p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    for="grid-address"
                >
                    Address
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    :class="{ 'border-red-500': errors.address }"
                    id="grid-address"
                    type="text"
                    placeholder="Albuquerque, New Mexico"
                    v-model="address"
                />
                <p class="text-red-500 text-xs mb-3" v-if="errors.address">
                    {{ errors.address }}
                </p>
                <p class="text-gray-600 text-xs">
                    Shipping Address will match your Billing Address
                </p>
            </div>
        </div>
        <div class="rounded shadow-lg mb-6">
            <div class="p-6 bg-white shadow rounded-lg my-6">
                <p class="py-4">
                    <span class="font-semibold">Shipping cost:</span>
                    {{ sign }} 5
                </p>
                <p class="py-4">
                    <span class="font-semibold">Payment method:</span>
                    on delivery
                </p>
                <p class="py-4">
                    <span class="font-semibold">Total cost:</span>
                    {{ sign }} {{ total() }}
                </p>
                <button
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-6 rounded my-4"
                    :class="[disabled ? disabledClass : '']"
                    :disabled="disabled"
                >
                    Create order
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "ShippingForm",
    data() {
        return {
            errors: {},
            name: "",
            address: "",
            disabledClass: "opacity-50 cursor-not-allowed"
        };
    },
    computed: {
        disabled() {
            return !this.$store.getters.cartQty;
        },
        sign() {
            return this.$store.getters.currencySign;
        },
        totalValue() {
            return (
                (this.$store.getters.amount + 5) *
                this.$store.getters.currencyMultiplier
            );
        }
    },
    methods: {
        total() {
            return Number(
                (this.$store.getters.amount + 5) *
                    this.$store.getters.currencyMultiplier
            ).toFixed(2);
        },
        shippingCost() {
            return Number(5 * this.$store.getters.currencyMultiplier).toFixed(
                2
            );
        },
        checkForm(e) {
            this.errors = {};

            if (!this.name) {
                this.errors.name = "Please enter a first name.";
            }
            if (!this.address) {
                this.errors.address = "Enter the address.";
            }
            if (!_.isEmpty(this.errors)) {
                return false;
            }

            const formData = new FormData();
            formData.append("cost", this.totalValue);
            formData.append("currency", this.$store.state.currency);
            formData.append(
                "items",
                JSON.stringify(_.keys(this.$store.getters.cartItems))
            );
            this.axios.post("/orders/store", formData).then(({ data }) => {
                this.$router.push({ name: "thanks", params: { id: data.id } });
                this.$store.commit("cart", {});
            });
        }
    }
};
</script>

<template>
    <form class="w-full max-w-lg" @submit="checkForm" novalidate="true">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    for="grid-first-name"
                >
                    First Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    :class="{ 'border-red-500': errors.firstName }"
                    id="grid-first-name"
                    type="text"
                    placeholder="Jane"
                    v-model="firstName"
                />
                <p class="text-red-500 text-xs" v-if="errors.firstName">
                    {{ errors.firstName }}
                </p>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    :class="{ 'border-red-500': errors.lastName }"
                    for="grid-last-name"
                >
                    Last Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3"
                    :class="{ 'border-red-500': errors.lastName }"
                    id="grid-last-name"
                    type="text"
                    placeholder="Doe"
                    v-model="lastName"
                />
                <p class="text-red-500 text-xs" v-if="errors.firstName">
                    {{ errors.firstName }}
                </p>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    for="grid-city"
                >
                    City
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3"
                    :class="{ 'border-red-500': errors.city }"
                    id="grid-city"
                    type="text"
                    placeholder="Albuquerque"
                    v-model="city"
                />
                <p class="text-red-500 text-xs" v-if="errors.city">
                    {{ errors.city }}
                </p>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    for="grid-state"
                >
                    State
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3"
                        :class="{ 'border-red-500': errors.state }"
                        id="grid-state"
                        v-model="state"
                    >
                        <option>New Mexico</option>
                        <option>Missouri</option>
                        <option>Texas</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2"
                    >
                        <svg
                            class="fill-current h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-red-500 text-xs" v-if="errors.state">
                    {{ errors.state }}
                </p>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label
                    class="block uppercase tracking-wide text-xs font-bold mb-2"
                    for="grid-zip"
                >
                    Zip
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3"
                    :class="{ 'border-red-500': errors.zip }"
                    id="grid-zip"
                    type="text"
                    placeholder="90210"
                    v-model="zip"
                />
                <p class="text-red-500 text-xs" v-if="errors.zip">
                    {{ errors.zip }}
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
                    placeholder=""
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
                    $5
                </p>
                <p class="py-4">
                    <span class="font-semibold">Payment method:</span>
                    on delivery
                </p>
                <p class="py-4">
                    <span class="font-semibold">Total price:</span>
                    ${{ total }}
                </p>
                <button
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-6 rounded my-4"
                    :class="[disabled ? disabledClass  : '']"
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
            firstName: "",
            lastName: "",
            city: "",
            state: "",
            zip: "",
            address: "",
            disabledClass: "opacity-50 cursor-not-allowed"
        };
    },
    computed: {
        total() {
            return this.$store.getters.amount + 5;
        },
        disabled() {
            return !this.$store.getters.cartQty;
        }
    },
    methods: {
        checkForm(e) {
            this.errors = {};

            if (!this.firstName) {
                this.errors.firstName = "Please enter a first name.";
            }
            if (!this.lastName) {
                this.errors.lastName = "Please enter a last name.";
            }
            if (!this.city) {
                this.errors.city = "Specify city.";
            }
            if (!this.state) {
                this.errors.state = "Specify state.";
            }
            if (!this.zip) {
                this.errors.zip = "Specify zip.";
            }
            if (!this.address) {
                this.errors.address = "Enter the address.";
            }
            if (_.isEmpty(this.errors)) {
                return true;
            }

            e.preventDefault();
        }
    }
};
</script>

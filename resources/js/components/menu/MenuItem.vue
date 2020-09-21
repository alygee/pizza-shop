<template>
    <div
        class="max-w-sm rounded overflow-hidden shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4"
    >
        <img
            class="object-scale-down w-full"
            :src="product.image"
            alt="Sunset in the mountains"
        />
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ product.name }}</div>
            <p class="text-gray-700 text-base">
                {{ product.description }}
            </p>
        </div>
        <div class="px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-xl text-center py-2 m-2 font-bold">
                    {{ $store.getters.currencySign }}
                    {{ price() }}
                </div>
                <div class="text-center py-2 m-2">
                    <button
                        class="bg-transparent hover:bg-orange-500 text-orange-500 font-semibold hover:text-white py-2 px-4 border border-orange-500 hover:border-transparent rounded"
                        @click="add"
                    >
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MenuItem",
    props: {
        product: Object
    },
    methods: {
        add() {
            this.$store.dispatch("addToCart", this.product);
        },
        price() {
            return Number(
                this.product.price * this.$store.getters.currencyMultiplier
            ).toFixed(2);
        }
    }
};
</script>

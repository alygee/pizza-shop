<template>
    <section
        class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg mb-6"
    >
        <header
            class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
        >
            Menu
        </header>

        <div class="w-full p-6 flex flex-wrap">
            <menu-item
                v-for="product in products"
                :product="product"
                :key="product.id"
            ></menu-item>
        </div>
    </section>
</template>

<script>
import MenuItem from "./MenuItem.vue";

export default {
    name: "MenuGrid",
    components: { MenuItem },
    data() {
        return {
            products: {},
            cart: {},
            showModal: false,
            selectedProduct: {}
        };
    },
    created() {
        this.fetchData();
    },
    mounted() {},
    methods: {
        fetchData() {
            this.axios.get("/api/products").then(({ data }) => {
                this.products = data;
            });
        }
    }
};
</script>

<template>
    <div class="catalog">
        <div class="categories">
            <button
                v-for="{ name, value } in categories"
                :key="value"
                class="gray-button"
                :class="{ active: value === activeCategory }"
                type="button"
                @click="activeCategory = value"
            >
                {{ name }}
            </button>
        </div>
        <div class="products">
            <ProductItem
                v-for="product in activeProducts"
                :product="product"
                :key="product.id"
            />
        </div>
    </div>
</template>

<script>
import ProductItem from "./ProductItem.vue";

export default {
    name: "Products",
    components: { ProductItem },
    data() {
        return {
            activeCategory: "all",
            categories: [
                {
                    value: "all",
                    name: "All Tools",
                },
                {
                    value: "transitions",
                    name: "Transitions",
                },
                {
                    value: "luts",
                    name: "Luts",
                },
                {
                    value: "light-leaks",
                    name: "Light Leaks",
                },
            ],
            products: [],
        };
    },
    created() {
        this.fetchData();
    },
    computed: {
        activeProducts() {
            if (this.activeCategory === "all") {
                return this.products;
            }

            return this.products.filter(
                ({ category }) => category === this.activeCategory
            );
        },
    },
    methods: {
        fetchData() {
            this.axios.get("/api/products").then(({ data }) => {
                this.products = data;
            });
        },
    },
};
</script>

<style>
.catalog .product-card {
    width: 175px;
    background: radial-gradient(
            89.97% 41.34% at 28.49% 34.42%,
            #504d5b 0%,
            rgba(30, 29, 34, 0) 100%
        ),
        #090909;
    padding: 0 20px 15px 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.catalog .products {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-row-gap: 20px;
}

.catalog .product-card .product-card-price {
    font-size: 9px;
    font-weight: 700;
}

.catalog .product-card .product-card-action {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.catalog .product-card .product-card-action button {
    border-radius: 5px;
    background: #ffbd19;
    color: #fff;
    text-align: center;
    font-family: Montserrat;
    font-size: 7px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    text-transform: uppercase;
    padding: 4px 14px;
    border: none;
    cursor: pointer;
}
.catalog .product-card .product-card-action button:hover {
    background-color: #ff8a00;
}

.catalog .product-card .product-card-description {
    margin: 10px 0;
}

.catalog .product-card .product-card-name {
    color: #fff;
    font-family: Montserrat;
    font-size: 9px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin: 0 0 2px;
}

.catalog .product-card .product-card-label {
    color: #fff;
    font-family: Montserrat;
    font-size: 9px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin: 0;
}

.catalog .product-card .product-card-image img {
    object-fit: cover;
    height: 100%;
    width: 100%;
}

.catalog .categories {
    text-align: right;
    margin: 38px 0 26px;
}

.catalog .categories button {
    color: #fff;
    text-align: center;
    font-family: Montserrat;
    font-size: 10px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    border-radius: 5px;
    border: 1px solid #504d5b;
    background-color: transparent;
    padding: 4px 14px;
    margin-right: 15px;
}

.catalog .categories button:hover,
.catalog .categories button.active {
    background: #504d5b;
}
</style>

<template>
    <div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
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
            <div class="px-6 pb-2">
                <div class="flex justify-between items-center">
                    <div class="text-xl text-center py-2 m-2">
                        from {{ product.price }} $
                    </div>
                    <div class="text-center py-2 m-2">
                        <button
                            class="bg-transparent hover:bg-orange-500 text-orange-500 font-semibold hover:text-white py-2 px-2 border border-orange-500 hover:border-transparent rounded"
                        >
                            Add to cart
                        </button>
                    </div>
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
    }
};
</script>

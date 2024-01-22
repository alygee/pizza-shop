<template>
    <transition name="modal">
        <div class="modal-mask flex items-center">
            <div class="w-1/2 my-0 mx-auto">
                <div class="max-w-sm w-full lg:max-w-full lg:flex">
                    <div
                      :title="'http://localhost:8000/storage/uploads/images/karbonara-s-syrnym-bortom3_1600449720.jpeg'"
                        class="h-48 lg:h-auto lg:w-1/2 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden"
                        :style="{ 'background-image':  'url(/storage' + product.image + ')' }"
                    ></div>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal"
                    >
                        <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg
                                    class="fill-current text-gray-500 w-3 h-3 mr-2"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"
                                    ></path>
                                </svg>
                                Members only
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">
                                Can coffee make you a better developer?
                            </div>
                            <p class="text-gray-700 text-base">
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Voluptatibus quia, nulla!
                                Maiores et perferendis eaque, exercitationem
                                praesentium nihil.
                            </p>
                        </div>
                        <div class="flex items-center">
                            <img
                                class="w-10 h-10 rounded-full mr-4"
                                src="http://tailwindcss.com/img/jonathan.jpg"
                                alt="Avatar of Jonathan Reinink"
                            />
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">
                                    Jonathan Reinink
                                </p>
                                <p class="text-gray-600">Aug 18</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<style>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    transition: opacity 0.3s ease;
}

.modal-container {
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>

<script>
export default {
    name: "AddToCartModal",
    props: {
        product: Object
    }
};
</script>

<script setup>
import { ref, watch } from 'vue';


const props = defineProps({
    inWaiting: Object,
    requests: Object,
});
const requests = ref(props.requests);
const isWaiting = ref(props.inWaiting);
watch(
    () =>props.inWaiting,
    (updateData) =>(isWaiting.value = updateData)
);
</script>

<template>
    <div class="flex flex-col  justify-center min-h-screen bg-black sm:items-center sm:pt-0">
        <div>
            <h1 class="font-bold text-2xl text-white">Live</h1>

        </div>

        <div class="mt-5 flex flex-row">

            <div class="p-10 m-2 bg-gray-900 shadow-xl rounded-2xl">
                <div>
                    <div class="flex flex-row">
                        <div>
                            <div>
                                <p class="text-white font-bold leading-normal text-sm">In waiting
                                </p>
                                <h5 class="font-bold text-white">{{isWaiting}}</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-10 m-2 bg-gray-900 shadow-xl rounded-2xl">
                <div>
                    <div class="flex flex-row">
                        <div>
                            <div>
                                <p class="text-white font-bold leading-normal text-sm">To wait
                                </p>
                                <h5 class="font-bold text-white">10m</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 " v-for="request in requests">

            <div class="flex flex-row">


                <div class="ml-5">
                    <h1 class="font-bold text-2xl text-white">{{ request.name }}</h1>

                </div>
                <div v-if="request.email" class="ml-5">
                    <h1 class="font-bold text-2xl text-white">{{ request.email }}</h1>

                </div>
                <div v-if="request.phone_number" class="ml-5">
                    <h1 class="font-bold text-2xl text-white">{{ request.phone_number }}</h1>

                </div>
            </div>
            <div class="mt-5">
                <button type="submit"
                    class="w-full text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">confirm</button>
            </div>
        </div>


    </div>
</template>

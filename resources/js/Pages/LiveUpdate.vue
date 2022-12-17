<script setup>
import { Inertia } from '@inertiajs/inertia';
import { isBooleanAttr } from '@vue/shared';
import { ref, watch } from 'vue';


const props = defineProps({
    inWaiting: Number,
    requests: Object,
    confirm: Boolean,
});
const requests = ref(props.requests);
const isWaiting = ref(props.inWaiting);
function confirm($id){
Inertia.put(route('request.confirmRequest',{id:$id}));
}
watch(
    () => props.inWaiting,
    (updateData) => (isWaiting.value = updateData)
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
                    <div class="p-5">
                        <p class="text-white font-bold leading-normal text-md">In waiting
                        </p>
                        <h5 class="font-bold text-white">{{ isWaiting }}</h5>

                    </div>
                </div>
            </div>

            <div class="p-10 m-2 bg-gray-900 shadow-xl rounded-2xl">
                <div>
                    <div class="p-5">
                        <p class="text-white font-bold leading-normal text-md">To wait
                        </p>
                        <h5 class="font-bold text-white">10m</h5>
                    </div>
                </div>
            </div>
        </div>

        <div v-for="request in requests">
        <div class="mt-5 flex flex-row" >
            <div class="p-10 m-2 bg-gray-900 shadow-xl rounded-2xl">

                <div class="p-5">
                    <p class="text-white font-bold leading-normal text-md">Info
                    </p>
                    <h5 class="font-bold text-white">{{ request.name }}</h5>
                    <h5 v-if="request.email" class="font-bold text-white">{{ request.email }}</h5>
                    <h5 v-if="request.phone_number" class="font-bold text-white">{{ request.phone_number }}}</h5>
                </div>
            </div>
            <div class="p-10 m-2 bg-gray-900 shadow-xl rounded-2xl">
                <div class="p-5">
                    <p class="text-white font-bold leading-normal text-md">Total
                    </p>
                    <h5 class="font-bold text-white">{{ request.persons_number }}</h5>
                </div>

            </div>
            
        </div>
        <div v-if="confirm" class="mt-5 flex-initial">
            <button class="w-full text-white bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            @click="confirm(request.id)">confirm</button>
        </div>
    </div>
    </div>
</template>

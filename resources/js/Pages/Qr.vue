<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import QrcodeVue from 'qrcode.vue'
const toQr = ref();

</script>

<template>
    <AuthenticatedLayout>
        <h1 class="font-bold text-2xl text-white">Generate Qr Code</h1>

        <div class="m-10">
            <label class="block text-white font-bold mb-1">URL</label>
        <div class="flex flex-row">
            <input type="text" v-model="toQr" placeholder="https://example.com"
                class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-1/2"
                required />
                <button v-if="toQr != ''" type="submit"
                            class=" ml-3 w-50 py-2 px-3 inline-flex items-center justify-center bg-blue-600  rounded-md  text-white"
                            @click="add">Download</button>
                </div>

            <div class="mt-10 visible-print text-center">
                <qrcode-vue :value="toQr" level="H" size="200" />
            </div>
        </div>



    </AuthenticatedLayout>
</template>
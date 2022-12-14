<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { CheckCircleIcon, XCircleIcon, PlusIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    requests: Object,
});


</script>

<template>

    <Head title="Requests" />
    <AuthenticatedLayout>
        <div class="relative flex-row p-5">
            <div>
                <h1 class="font-bold text-2xl text-white">Requests</h1>
            </div>
            <div class="absolute top-5 right-0">
                <PlusIcon class="w-10 h-10 shrink-0 text-white hover:cursor-pointer hover:bg-gray-600 hover:rounded-md"
                     />
            </div>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            id
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Phone Number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Persons Number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            is Confirmed
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody >

                    <tr v-for="request in requests" class=" bg-gray-900  hover:bg-gray-800">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ request.id }}
                        </th>
                        <td class="py-4 px-6">
                            {{ request.name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ request.phone_number ?? '-' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ request.email ?? '-' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ request.persons_number }}
                        </td>
                        <td class="py-4 px-6">
                            {{ request.is_confirmed ?? '-' }}
                        </td>
                        

                        <td class="flex flex-row py-4 px-6">
                            <div class="m-5">
                                <CheckCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-green-600"
                                   />
                            </div>
                            <div class="m-5">
                                <XCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-rose-600"
                                    />
                            </div>
                        </td>
                    
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
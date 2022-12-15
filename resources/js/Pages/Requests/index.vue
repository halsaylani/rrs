<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { CheckCircleIcon, XCircleIcon, PlusIcon, CheckIcon, XMarkIcon} from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import add from '@/Pages/Requests/add.vue';

const props = defineProps({
    requests: Object,
});

function done($id){
    Inertia.put(route('request.done',{ id: $id}),{
    });
}
function cancele($id){
    Inertia.put(route('request.cancele',{ id: $id}),{
    });
}
const isopen = ref(false);
function openModal(){
    isopen.value = !isopen.value;
}
cancele
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
                     @click="openModal"/>
            </div>
        </div>
        <add v-if="isopen" />
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

                    <tr v-for="request in requests" class="bg-gray-900  hover:bg-gray-800">
                        <th scope="row" class="py-4 px-6 font-medium text-white text-gray-90 whitespace-nowrap">
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
                            {{ request.is_confirmed == true ? 'confirmed' :'pending..' }}
                        </td>
                        

                        <td v-if="!request.is_done && !request.is_canceled" class="flex flex-row py-4 px-6">
                            <div class="m-5">
                                <CheckCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-green-600"
                                   @click="done(request.id)" />
                            </div>
                            <div class="m-5">
                                <XCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-rose-600"
                                @click="cancele(request.id)" />
                            </div>
                        </td>
                        <td v-if="request.is_done" class="py-4 px-6 ">
                            <CheckIcon class="ml-10 w-7 h-7 shrink-0 text-green-600"
                                  />
                        </td>
                        <td v-if="request.is_canceled" class="py-4 px-6">
                            <XMarkIcon class="ml-10 w-7 h-7 shrink-0 text-rose-600"
                                  />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
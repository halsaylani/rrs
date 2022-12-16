<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { ref,watch } from 'vue';
import { CheckCircleIcon, XCircleIcon, PlusIcon, CheckIcon, XMarkIcon} from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import add from '@/Pages/Requests/add.vue';

const props = defineProps({
    results: Object,
});
const results = ref(props.results?.data);

function done($id){
    Inertia.put(route('request.done',{ id: $id}),{
    });
}
function cancele($id){
    Inertia.put(route('request.cancele',{ id: $id}),{
    });
}
watch(
    () => props.results?.data,
    (updateData) => (results.value = updateData)
  );
</script>

<template>
    <AuthenticatedLayout>

        <div class=" flex flex-row relative">
            <div>
                <h1 class="font-bold text-2xl text-white">Search result:</h1>
            </div>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            idss
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
                    <tr v-for="result in results" class="bg-gray-900  hover:bg-gray-800">
                        <th scope="row" class="py-4 px-6 font-medium text-white text-gray-90 whitespace-nowrap">
                            {{ result.id }}
                        </th>
                        <td class="py-4 px-6">
                            {{ result.name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ result.phone_number ?? '-' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ result.email ?? '-' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ result.persons_number }}
                        </td>
                        <td class="py-4 px-6">
                            {{ result.is_confirmed == true ? 'confirmed' :'pending..' }}
                        </td>
                        <td v-if="!result.is_done && !result.is_canceled" class="flex flex-row py-4 px-6">
                            <div class="m-5">
                                <CheckCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-green-600"
                                   @click="done(result.id)" />
                            </div>
                            <div class="m-5">
                                <XCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-rose-600"
                                @click="cancele(result.id)" />
                            </div>
                        </td>
                        <td v-if="result.is_done" class="py-4 px-6 ">
                            <CheckIcon class="ml-10 w-7 h-7 shrink-0 text-green-600"
                                  />
                        </td>
                        <td v-if="result.is_canceled" class="py-4 px-6">
                            <XMarkIcon class="ml-10 w-7 h-7 shrink-0 text-rose-600"
                                  />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>

</template>
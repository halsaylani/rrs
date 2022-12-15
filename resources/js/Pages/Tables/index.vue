<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { TrashIcon, PencilSquareIcon, CheckCircleIcon, XCircleIcon, PlusIcon } from '@heroicons/vue/24/outline';
import { Inertia } from '@inertiajs/inertia';
import add from '@/Pages/Tables/add.vue';

const props = defineProps({
    tables: Object,
});

const tables = ref(props.tables);
const currentTable = ref();
const isEditing = ref(false);

function openEdit($id, $tNumber, $sNumber) {
    isEditing.value = true;
    currentTable.value = $id;
    console.log($id);
    console.log($tNumber);
    console.log($sNumber);
}
function closeEdit() {
    isEditing.value = false;
}
const form = useForm({
    table_number: props.tables.table_number,
    seats_number: props.tables.seats_number,
});
const isopen = ref(false);
function openModal() {
    isopen.value = !isopen.value;
}
function updateTable($id) {
    Inertia.put(route('tables.edit', { id: $id }), {
        table_number: form.table_number,
        seats_number: form.seats_number
    });
    isEditing.value = false;
}
function deleteTable($id) {
    Inertia.delete(route('tables.delete', { id: $id }),);
}

</script>

<template>

    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="relative flex-row">
            <div>
                <h1 class="font-bold text-2xl text-white">Tables</h1>
            </div>
            <div class="absolute top-0 right-0">
                <PlusIcon class="w-10 h-10 shrink-0 text-white hover:cursor-pointer hover:bg-gray-800 hover:rounded-md"
                    @click="openModal()" />
            </div>
        </div>
        <add v-if="isopen" />
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            id
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Table Number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Seats Number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody v-for="table, index in tables" :key="index">

                    <tr class=" bg-gray-900  hover:bg-gray-800">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ table.id }}
                        </th>
                        <td v-if="!isEditing" class="py-4 px-6">
                            {{ table.table_number }}
                        </td>
                        <td v-else class="py-4 px-6">
                            <form class="inline-flex px-5" @focusout="updateTable(table.id)"
                                @submit.prevent="updateTable(table.id)">
                                <input type="text" v-model="form.table_number" class="bg-gray-700 border border-gray-700
                                 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
                                  " :placeholder="table.table_number" required>
                            </form>
                        </td>
                        <td v-if="!isEditing" class="py-4 px-6">
                            {{ table.seats_number }}
                        </td>
                        <td v-else class="py-4 px-6">
                            <form class="inline-flex px-5" @focusout="updateTable(table.id)"
                                @submit.prevent="updateTable(table.id)">
                                <input type="text" v-model="form.seats_number" class="bg-gray-700 border border-gray-700
                                 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
                                 " :placeholder="table.seats_number" required>

                            </form>
                        </td>

                        <td v-if="!isEditing" class="flex flex-row py-4 px-6">
                            <div class="m-5">
                                <PencilSquareIcon class="w-4 h-4 shrink-0 hover:cursor-pointer hover:text-blue-600"
                                    @click="openEdit(table.id, table.table_number, table.seats_number)" />
                            </div>
                            <div class="m-5">
                                <TrashIcon class="w-4 h-4 shrink-0 hover:cursor-pointer hover:text-blue-600"
                                    @click="deleteTable(table.id)" />
                            </div>
                        </td>
                        <td v-else class="flex flex-row py-4 px-6">
                            <div class="m-5">
                                <CheckCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-green-600"
                                    @click="updateTable(table.id)" />
                            </div>
                            <div class="m-5">
                                <XCircleIcon class="w-5 h-5 shrink-0 hover:cursor-pointer hover:text-rose-600"
                                    @click="closeEdit(table.id)" />
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
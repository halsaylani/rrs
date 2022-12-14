<script setup>
import { ref } from 'vue';
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
} from '@headlessui/vue'
import { useForm } from '@inertiajs/inertia-vue3';
import { XCircleIcon } from '@heroicons/vue/24/outline';
import { computed, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const isEditing = ref(true);
function closeModal() {
  isEditing.value = !isEditing.value;
}
const form = useForm({
  table_number: '',
  seats_number: '',
});
function addTable() {
  Inertia.put(route('tables.add'), {
    table_number: form.table_number,
    seats_number: form.seats_number
  });
  isEditing.value = !isEditing.value;

}
</script>

<template>
  <TransitionRoot appear :show="isEditing" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-10">
      <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
        leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>
      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
          <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <DialogPanel
              class="w-full max-w-md transform overflow-hidden rounded-2xl bg-gray-900 p-6 text-left align-middle shadow-xl transition-all">
              <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative rounded-lg ">
                  <div class="relative flex-row p-5">
                    <div>
                      <label class="block mb-2 text-3xl  text-white font-bold">Add</label>
                    </div>
                    <div class="absolute top-5 right-0">
                      <XCircleIcon class="w-9 h-9 shrink-0 text-white hover:cursor-pointer" @click="closeModal" />
                    </div>
                  </div>
                  <div class="px-6 py-6 lg:px-8">
                    <form class="space-y-6" action="#">
                      <div>
                        <label class="block mb-2 text-xl  text-white font-bold">Table Number</label>
                        <input type="text" v-model="form.table_number"
                          class="bg-gray-600 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5 "
                          required>
                      </div>
                      <div>
                        <label class="block mb-2 text-xl  text-white font-bold">Seats Number</label>
                        <input type="text" v-model="form.seats_number"
                          class="bg-gray-600 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 block w-full p-2.5"
                          required>
                      </div>

                      <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                        @click="addTable()">Add</button>
                    </form>
                  </div>
                </div>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
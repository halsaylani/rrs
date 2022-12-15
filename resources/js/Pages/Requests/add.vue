<script setup>
import { ref } from 'vue';
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
} from '@headlessui/vue'
import { useForm, Link } from '@inertiajs/inertia-vue3';
import { XCircleIcon } from '@heroicons/vue/24/outline';
import { computed, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const isEditing = ref(true);
function closeModal() {
  isEditing.value = !isEditing.value;
}
const showEmail = ref(false);
function showEmailInput(){
    showEmail.value = !showEmail.value;
}
const form = useForm({
  name: '',
  email: '',
  phone_number: '',
  persons_number:'',
});
function addRequest() {
  Inertia.put(route('request.add'), {
    name: form.name,
    email: form.email,
    phone_number: form.phone_number,
    persons_number: form.persons_number
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
                    <form>
                    <div class="mb-4">
                        <label class="block text-white font-bold mb-1" >Name</label>
                        <input  type="text"
                        v-model="form.name"
                        class="bg-gray-600 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 mt-1 block w-full py-2 px-3" />
                    </div>

                    <div class="flex flex-row">
                        <div>
                        <label v-if="!showEmail" class="block text-white font-bold mb-1" >Phone Number</label>
                        <label v-if="showEmail" class="block text-white font-bold mb-1" >Email</label>
                    </div>
                    <div class="pl-2">
                        <a v-if="!showEmail" class="text-sm text-blue-500 mb-1 font-bold hover:cursor-pointer" @click="showEmailInput">or email</a>
                        <a v-if="showEmail" class="text-sm text-blue-500 mb-1 font-bold hover:cursor-pointer" @click="showEmailInput">or phone number</a>

                    </div>
                     </div>
                     <input v-if="!showEmail" type="text" v-model="form.phone_number"
                     class="mb-4 bg-gray-600 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 mt-1 block w-full py-2 px-3" />
                            <input v-if="showEmail" type="email" v-model="form.email"
                            class="mb-4 bg-gray-600 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 mt-1 block w-full py-2 px-3" />
                        <div class="mb-4">
                          <label class="block text-white font-bold mb-1" >Persons Number</label>
                          <input type="text" v-model="form.persons_number"
                          class="bg-gray-600 border border-gray-600 text-white text-sm rounded-lg focus:ring-gray-700 focus:border-gray-700 mt-1 block w-full py-2 px-3" />
                    </div>
                    <div class="mt-6">
                        <button class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600  rounded-md  text-white" @click="addRequest">Start</button>
                    </div>
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
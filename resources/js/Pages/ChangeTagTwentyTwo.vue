<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Tag
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Update Tag
                    </h2>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                       <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                           Update Tag Owner
                       </h3>
                       <div class="mt-2">
                           <p class="text-sm text-gray-500">
                               Select who just won tag number {{tag.tag_number}} from {{tag.owner}}...
                           </p>
                           <div class="flex-1 truncate">
                               <div class="mt-1">
                                   <select v-model="new_user" id="location" name="location" class="mt-1 block w-100 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md">
                                       <option :value="null" :selected="true">-</option>
                                       <option v-for="user in parsed_users" :value="user.id">{{user.name}}</option>
                                   </select>
                               </div>
                          </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Layouts/Layout'

    export default {
        components: {
            Layout,
        },
        computed:{
            user(){
                return this.$page.props.user;
            }
        }
    }
</script>

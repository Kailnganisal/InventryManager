<template>
    <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">

                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">{{title}}</h3>
                    </div>

                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <input class="border border-gray-400 pl-1 rounded-lg" v-model="searchKey"  placeholder="Search.." @input="onSearch">
                        <button @click="$emit('isShow')" class="bg-yellow-400 font-bold rounded-lg shadow px-1.5 py-0.5 ml-10">Add Component</button>
                    </div>

                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                    <tr>
                        <th
                            v-for="header in headers"
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                        >
                            {{header}}
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <slot name="content"></slot>
                    </tbody>

                </table>

            </div>
            <div class="flex justify-between m-4">
                <v-pagination
                    v-model="page"
                    :pages= "pages"
                    :range-size="2"
                    active-color="#fbbf24"
                    @update:modelValue="updateHandler"
                />
                <div class="w-24">
                    <Multiselect
                        v-model="value"
                        :options="pageCountOptions"
                        label="count"
                        value-prop="count"
                        :can-clear="false"
                    />

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VPagination from "@hennge/vue3-pagination";
import Multiselect from '@vueform/multiselect';
import "@hennge/vue3-pagination/dist/vue3-pagination.css";

export default {
    name: "Table",

    props:{
        title:String,
        headers: Array,
        total:Number,
    },

    components:{
      VPagination, Multiselect,
    },

    data(){
        return{
            searchKey:null,
            page:1,
            pageCountOptions: [
                {count: 5},
                {count: 10},
                {count: 15},
            ],
            value: 5,
        }
    },

    watch: {
        value() {
            this.page =1
            this.updateHandler(this.page)
            console.log("value changed"+this.value)
        }
    },
    computed:{
        pages(){
            return Math.ceil(this.total/this.value);
        }
    },
    methods:{
        onSearch(){
            this.$emit('onSearch', this.searchKey)
        },

        updateHandler(page) {
            this.$emit('refreshPage',page, this.value);
        },
    }

}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

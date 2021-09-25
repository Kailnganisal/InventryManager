<template>
<div>

    <Table title="Pneumatic Components" :headers="headers" @onSearch="onSearch" @isShow="showModal">
        <template v-slot:content>
            <tr v-for="pneumaticRow in data">
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                    {{pneumaticRow.id}}
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                    {{pneumaticRow.quantity}}
                </td>
                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    {{pneumaticRow.part}}
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    {{pneumaticRow.tube_size}}
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    {{pneumaticRow.description}}
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    {{pneumaticRow.warranty}}
                </td>
                <td class=" flex justify-between border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <button @click="onEdit(pneumaticRow.id)" class="bg-transparent hover:bg-yellow-200 border border-yellow-500 font-bold rounded-lg pt-0.5 pb-0.5 pl-1.5 pr-1.5 shadow">
                        Edit
                    </button>
                    <button @click="onDelete(pneumaticRow.id)" class="bg-transparent hover:bg-red-200 font-bold border border-red-600 rounded-lg pt-0.5 pb-0.5 pl-1.5 pr-1.5 shadow">
                        Delete
                    </button>
                </td>
            </tr>
        </template>
    </Table>
    <Modal  v-show="isModalVisible" @close="closeModal" @onSubmit="onSubmit">
        <template v-slot:header>
            <h6 class="font-bold text-yellow-100" >{{ isEdit ? 'Edit' : 'Add new' }} Pneumatic Component</h6>
        </template>
        <template v-slot:body>
            <div class="px-10 bg-white">
                <div class="mb-6">
                    <label class="block mb-3 text-gray-900" for="">Part</label>
                    <input type="text" v-model="part" name="part" class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider"/>
                </div>
                <div class="mb-6">
                    <label class="block mb-3 text-gray-900" for="">Description</label>
                    <input
                        type="text" v-model="description" name="description" class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest"/>
                </div>
                <div class="mb-6">
                    <label class="block mb-3 text-gray-900" for="">Tube Size</label>
                    <input
                        type="text" v-model="tubesize" name="tubesize" class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest"/>
                </div>
                <div class="mb-6">
                    <label class="block mb-3 text-gray-900" for="">Quantity</label>
                    <input
                        type="text" v-model="quantity" name="quantity" class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest"/>
                </div>
                <div class="flex mb-6 justify-between">
                    <label class="flex block mb-3 text-gray-900" for="">Warranty</label>
                    <div class="flex space-x-4">
                    <label class="block mb-3 text-gray-900" for="">
                        <input v-model="warranty" type="radio" value="1" class="form-radio" name="warranty">
                        <span class="ml-2">Yes</span>
                    </label>

                    <label class="block mb-3 text-gray-900" for="">
                        <input v-model="warranty" type="radio"  value="0" class="form-radio" name="warranty">
                        <span class="ml-2">No</span>
                    </label>
                    </div>

                </div>

            </div>
        </template>
    </Modal>
</div>
</template>

<script>
import Table from "../Table/Table";
import Modal from "../Modal/Modal";

import Notifications from "../../mixins/Notifications.js";

export default {
    name: "Pneumatic",
    components: {
        Table, Modal
    },

    mixins: [Notifications],

    props:{

    },
    data(){
        return{
            headers: [
                'ID',
                'Quantity',
                'Part',
                'Tube Size',
                'Description',
                'Warranty',
                'Action'
            ],
            searchKey:null,
            data:[],
            isModalVisible:false,
            part:'',
            description:'',
            tubesize:0,
            quantity:0,
            warranty: 0,
            isEdit: false,
            newPart:[],
            editID:'',
        }
    },

    mounted() {
        this.fetchPneumaticData();
    },

    methods:{
        showModal() {
            console.log(this.isModalVisible)
            this.isModalVisible = true;
        },

        closeModal() {
            this.isModalVisible = false;
            this.clearFields();
        },

        async fetchPneumaticData(){
            let response = await this.axios.get('/pneumatics', {
                params:{
                    search_key: this.searchKey
                }
            });
            this.data = response.data;
        },

        onSearch(searchKey){
            this.searchKey = searchKey
            this.fetchPneumaticData()
            console.log(this.searchKey)
        },

        async onDelete(id){
            if(confirm("Do you want to delete the component")){
                let response = await this.axios.delete(`pneumatics/${id}`)

                if(response.data.status === "success"){
                    await this.fetchPneumaticData();
                    this.showSuccessMessage("Component Successfully Deleted");
                }
            }
        },

        onEdit(id){
            this.isEdit = true;
            this.editID = id;

            let response = this.data.find(part => part.id === id)

            this.part = response.part;
            this.description = response.description;
            this.tubesize = response.tube_size;
            this.quantity = response.quantity;
            this.warranty = response.warranty
            this.isModalVisible = true;

        },

        async onSubmit(){
            this.newPart={
                part: this.part,
                description: this.description,
                quantity: this.quantity,
                tubesize: this.tubesize,
                warranty: this.warranty
            }

            if(this.isEdit) {
                this.handleEditPart(this.newPart)
                return;
            }

            this.handleAddPart(this.newPart)
        },

        async handleAddPart(newPart) {

            try {
                let response = await this.axios.post('pneumatics/store', newPart);

                console.log("response "+JSON.stringify(response))

                if (response.data.status === 'success') {
                    await this.fetchPneumaticData();
                    this.showSuccessMessage("Component Successfully Added")
                }

                this.clearFields();
            } catch (error) {
                Object.values(error.response.data.errors).forEach(error => {
                   this.showErrorMessage(error);
                });
            }
        },

        async handleEditPart(newPart) {
            try{
                let response = await this.axios.post(`pneumatics/${this.editID}`,newPart);
                if(response.data.status === 'success'){
                    await this.fetchPneumaticData();
                    this.showSuccessMessage("Component Successfully Updated")
                    this.closeModal();
                }
            }
            catch (error){
                Object.values(error.response.data.errors).forEach(error=>{
                    this.showErrorMessage(error);
                })
            }

        },

        clearFields(){
            this.isEdit = false;
            this.editID ='';
            this.part = '';
            this.description='';
            this.quantity=0;
            this.tubesize=0;
            this.warranty=0;
        }

    }
}
</script>

<style scoped>

</style>

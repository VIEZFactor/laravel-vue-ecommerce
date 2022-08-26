<template>
    <div class="container mt-20 flex justify-center">         
        <div class="w-full sm:w-8/12 md:w-8/12 p-5 bg-white">
            
            <h1 class="text-3xl text-center mb-4">My checkout</h1>    

            <table class="table-auto w-full mt-6">
                <thead>
                    <tr class="bg-blue-200">
                        <th class="border border-blue-600 py-2 px-2">Name</th>
                        <th class="border border-blue-600 py-2 px-2">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>                        
                        <td class="border border-blue-600 py-2 px-2 text-center">Delicious Watermelon</td>
                        <td class="border border-blue-600 py-2 px-2 text-center">$1111</td>
                    </tr>
                </tbody>
            </table>



        <p v-if="errors.length">
            <b>Please fix this next errors</b>
            <ul>
            <li v-for="error in errors">{{ error }}</li>
            </ul>
        </p>
                
            
        <form id="saveProduct" class="mt-4" method="POST" v-on:submit.prevent="checkForm()">
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="name"
                placeholder="My name" name="name"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="address"
                placeholder="My address" name="address"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="state"
                placeholder="State" name="state"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="country"
                placeholder="Country" name="country"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="number" v-model="creditCardNumber"
                placeholder="Credit Card Number" name="creditCardNumber"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="number" v-model="creditCardExpiration"
                placeholder="Credit Card Expiration" name="creditCardExpiration"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="number" v-model="creditCardCvv"
                placeholder="Credit Card CVV" name="creditCardCvv"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>

            <button type="submit" class="bg-green-500 w-full text-white py-3">Save</button>
        </form>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data () {
            return {
                errors: [],
                name: '',
                address: '',
                state: '',
                country: '',
                creditCardNumber: '',
                creditCardExpiration: '',
                creditCardCvv: '',
            }
        },
        methods:{       
            checkOut(){                
                this.$router.push('/');      
                this.$toasted.show('You bought successfully');
            },   
            checkForm: function (e) {
                if (this.name && this.age) {
                    return true;
                }

                this.errors = [];

                if (!this.name) {
                    this.errors.push('Name is required.');
                }
                if (!this.address) {
                    this.errors.push('Address is required.');
                }

                if (!this.state) {
                    this.errors.push('State is required.');
                }

                if (!this.country) {
                    this.errors.push('Country is required.');
                }

                if (!this.creditCardNumber) {
                    this.errors.push('Credit Card is required.');
                }

                if (!this.creditCardExpiration) {
                    this.errors.push('Credit Card Expiration is required.');
                }

                if (!this.creditCardCvv) {
                    this.errors.push('Credit Card CVV is required.');
                }

                if(this.errors == 0){
                    this.checkOut();
                }else{                    
                    this.$toasted.show('Check your data for any errors');
                }

                console.log(this.errors);
            }
        },
    }
</script>
